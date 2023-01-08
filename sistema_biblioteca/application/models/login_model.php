<?php

class Login_model extends CI_Model{
    
    
    const TABELA = 'login';
             
   function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');   
        error_reporting(-1);
	ini_set('display_errors', 1);
    }
    
      
    function verifica_login($email,$senha){
      
                       
        $sql = " select * from "
                    . "  login l, usuarios u "
                    . " where u.idusuario = l.usuario "
                    . " and u.email = '$email' "
                    . " and l.senha = '$senha' "
                    . " and u.status = '1' ";
              
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
    
    
    
    function cadastrar_login($usuario,$senha,$perfil){
        
        
    $arrayInsert = array(
           
                  
            'usuario' => $usuario,         
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
      function excluilog($idusuario) {
       $this->db->where('usuario', $idusuario);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
    function alterasenha($idusuario,$senha) {
         $arrayUpdate = array(  
            'senha' => $senha,

        );
        $atualizar = $this->db->where('usuario', $idusuario);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    }
    
     public function atualiza_ultimo_login($usuario,$data,$hora,$host){
       $arrayUpdate = array(
          'data'=>$data,
          'hora'=>$hora,
          'host'=>$host
        );

        $this->db->where('usuario',$usuario);
        $update = $this->db->update(self::TABELA,$arrayUpdate);

        if ($update) {
          return true;
        }else{
          return false;
        }

  }
  
  function atualiza_proprio_login($usuario,$nova_senha,$senha_atual){
      
                       
        $sql = "  update LOGIN set "
             . "  senha = '$nova_senha' "
             . " where usuario = $usuario "
             . " and senha = '$senha_atual' ";
              
        $query = $this->db->query($sql);        
        if($this->db->affected_rows() > 0 )
        {    
            return true;
        }    
        else            
        {    
            return false;
            
        }
    }
    
}
  

