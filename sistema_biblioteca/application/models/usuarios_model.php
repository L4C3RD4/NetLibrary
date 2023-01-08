<?php

class Usuarios_model extends CI_Model{
        
        const TABELA = 'usuarios';
    
    function __construct() {
     parent::__construct(); 
        date_default_timezone_set('America/Sao_Paulo');
        
        error_reporting(-1);
	ini_set('display_errors', 1);
    
    }

function cadastrar_usuario($idusuario,$nome,$endereco,$celular,$email){
    $arrayInsert = array(
           
                  
            'idusuario' => $idusuario,         
            'nome' => $nome,         
            'endereco' => $endereco,         
            'celular' => $celular, 
             'email' => $email  
           
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        return true;
    else
        return false;
}
    function busca_id($nome,$email){
    $sql="select idusuario from usuarios where nome='$nome' and email='$email'";
    $query= $this->db->query($sql);
    return $query->result();
    
    }
    
     
    function excluiusuario($idusuario) {
       $this->db->where('idusuario', $idusuario);
        $delete = $this->db->delete(self::TABELA);
         
        if ($delete)
            return true;
        else
            return false;
    }
 function alterausuarios($idusuario,$nome,$endereco,$celular,$email) {
         $arrayUpdate = array(  
            'idusuario' => $idusuario,
            'nome' =>$nome,
            'endereco' =>$endereco,
            'celular' =>$celular,
            'email' =>$email
        );
        $atualizar = $this->db->where('idusuario', $idusuario);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    }
 function bloqueia_usuario($idusuario,$status) {
         $arrayUpdate = array(  
            'status' => $status
        );
        $atualizar = $this->db->where('idusuario', $idusuario);
        if ($this->db->update(self::TABELA, $arrayUpdate))            
            return true;
        else
            return false;
    }
    
     function listausuarios() {
//        $query = $this->db->get(self::TABELA);
//        return $query->result();
        $sql = " SELECT * "
                . " FROM usuarios, login  "
                . " WHERE usuarios.idusuario = login.usuario ";
        
    $query = $this->db->query($sql);
    return $query->result();
    }
    
    
    function pesquisa_usuario( $chave_pesquisa,$filtro_perfil) {
        $sql = " SELECT * "
                . " FROM usuarios as u, login as l "
                . " WHERE l.usuario = u.idusuario and u.nome like '%$chave_pesquisa%' AND l.perfil = '$filtro_perfil' ";

        //echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    function busca_idusuario($nome,$email){
    $sql="select max(idusuario) as max_idusuario from usuarios where nome='$nome' and email = '$email'";
    $query = $this->db->query($sql);
    return $query->result();
    
    }
    
    function lista_profissionais() {
        $sql = " SELECT * "
                . " FROM usuarios u, login l  "
                . " WHERE u.idusuario = l.usuario "
                . " AND ((l.perfil = 'bibliotecario') or (l.perfil = 'auxiliar') ) "
                . " AND u.status = 1 "
                . " ORDER BY u.nome asc ";
        
        $query = $this->db->query($sql);
        return $query->result();
    }

}


  


