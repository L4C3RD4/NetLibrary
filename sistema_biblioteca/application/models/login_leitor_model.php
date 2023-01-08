<?php

class Login_leitor_model extends CI_Model{
    
    
    const TABELA = 'login_leitor';
             
    function __construct(){
  	parent::__construct();  		
    }
    
      
    function verifica_login($email,$senha){
      
                       
        $sql = " select * from "
                    . "  login_leitor l, leitores ls "
                    . " where ls.idleitor = l.leitor "
                    . " and ls.email = '$email' "
                    . " and l.senha = '$senha' ";
              
        $query = $this->db->query($sql);        
        if($query->num_rows() > 0 )
        {    
            return $query->result();
        }    
        else            
        {    
            return false;
            
        }
    }
    
     function cadastrar_login($leitor,$senha,$perfil){
        
        
    $arrayInsert = array(
           
                  
            'leitor' => $leitor,         
            'senha' => $senha,         
            'perfil' => $perfil
              
           
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir){
    return true;
    
    }
    else{
    return false;
    
    }
    
}
  function alteraSenha($leitor,$altsenha) {
        $arrayUpdate = array(
            'senha' =>$altsenha
        );
        $atualizar = $this->db->where('leitor', $leitor);
        $this->db->update(self::TABELA, $arrayUpdate);
        if ($this->db->affected_rows()>0){
            return true;
        }            
        else{ //cadastra a senha do usuário
            $sql = " insert into login_leitor (leitor, senha) values "
                 . " ($leitor,'". md5($altsenha)."')";
            $query = $this->db->query($sql);
            if($query){
                return true;
            }else{
                return false;
            }            
        }
            
    }
    
        function busca_perfil_leitor($leitor){
        $sql = " select perfil "
              ." from login_leitor "
              ." where leitor = $leitor ";              
        $query = $this->db->query($sql);        
        return $query->result();
        
        
    }
    
     
     public function atualiza_ultimo_login($usuario,$data,$hora,$host){
       $arrayUpdate = array(
          'data'=>$data,
          'hora'=>$hora,
          'host'=>$host
        );
        
        $this->db->where('leitor',$usuario);
        $update = $this->db->update(self::TABELA,$arrayUpdate);
//        var_dump($arrayUpdate);
        if ($update) {
          return true;
        }else{
          return false;
        }

  }
 function excluilog($idleitor) {
       $this->db->where('leitor', $idleitor);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
}

?>