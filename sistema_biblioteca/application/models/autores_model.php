<?php

class Autores_model extends CI_Model{
        
        const TABELA = 'autores';
    
    function __construct() {
     parent::__construct(); 
        date_default_timezone_set('America/Sao_Paulo');
        
        error_reporting(-1);
	ini_set('display_errors', 1);
    
    }

function cadastra_autor($idautor,$nome,$sobrenome,$citacao){
    $arrayInsert = array(
           
                  
            'idautor' => $idautor,         
            'nome' => $nome,         
            'sobrenome' => $sobrenome,         
            'formato_citacao' => $citacao
 
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir){
        
    return true;
    
    }
    else{
        
    return false;
    
    }
}

 function excluiautor($idautor) {
       $this->db->where('idautor', $idautor);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
 
    
    function lista_autores($tipo_pesquisa,$chave) {
         $condicao = "";
         if($tipo_pesquisa=="nome"){
             $condicao = " nome like '%$chave%' ";                
         }else{
             if($tipo_pesquisa=="sobrenome"){
                 $condicao = " sobrenome like '%$chave%' ";                     
             }else{
                 if($tipo_pesquisa=="formato_citacao"){
                     $condicao = " formato_citacao like '%$chave%' "; 
                 }
             }
         }
          $sql = " select * from autores where "
               .$condicao 
               . " order by nome asc ";  
          $query = $this->db->query($sql);
          return $query->result();
        
    }
       function alteraAutor($idautor,$nome,$sobrenome,$citacao){
        $arrayUpdate = array(        
        'idautor'=> $idautor,
        'nome' => $nome,
        'sobrenome'=>$sobrenome,
        'formato_citacao' => $citacao
       
        );
        $atualizar = $this->db->where('idautor', $idautor);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 
   function listaautores() {
        $query = $this->db->get(self::TABELA);
        return $query->result();
    }
    
    function lista_sem_autores_acervo() {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from "
                . "  autores a "
                . " where idautor not in (select distinct(autor) from autores_acervo) ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function lista_autores_material($material) {
        $sql = "SELECT * FROM "
             . "  autores a, autores_acervo ac "
             . " WHERE  a.idautor = ac.autor "
             . " AND ac.acervo = $material "
             . " GROUP BY idautor "
             . " ORDER BY a.nome asc ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
       function lista_todos_autores() {
        $sql = "select idautor, nome from "
                . "  autores";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function busca_id($nome,$citacao){
    $sql="select idautor from autores where nome='$nome' and formato_citacao='$citacao'";
    $query= $this->db->query($sql);
    return $query->result();
    
    }
}
    

  



  


