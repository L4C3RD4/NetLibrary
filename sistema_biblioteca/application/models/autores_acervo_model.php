<?php

class Autores_acervo_model extends CI_Model{
        
    const TABELA = "autores_acervo";
    
    function __construct() {
        parent::__construct();

    }

    function cadastra_autores_acervo($acervo,$autor,$principal){
    $arrayInsert = array(
        'acervo' => $acervo,
        'autor' => $autor,
        'principal' => $principal
            
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    }
    
      function lista_autores_acervo() {
        $query = $this->db->get(self::TABELA);
        return $query->result();
    }

    function exclui_autores_acervo($idacervo) {
        $this->db->where('acervo', $idacervo);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
    
    function excluir_autor_material($autor,$material) {
        $this->db->where('acervo', $material);
        $this->db->where('autor', $autor);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
    
    function altera_autores_acervo($acervo,$autor,$principal) {
        $arrayUpdate = array(        
        'principal' => $principal
        );
      $atualizar = $this->db->where('acervo', $acervo);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    }
    
    function principal_autor_acervo($autor,$material) {
      
    $sql="update autores_acervo set principal = 0 where acervo = $material ";
    $query= $this->db->query($sql);
    if($query){
        $sql="update autores_acervo set principal = 1 where acervo = $material and autor = $autor ";
        $query= $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
    
      $arrayUpdate = array(        
        'principal' => $principal
        );
      $atualizar = $this->db->where('acervo', $acervo);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 
       
    
    
}
 ?>