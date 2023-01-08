<?php

class Rel_leitores_model extends CI_Model {

    
    function __construct() {
        parent::__construct();
    }

    
    
    //Lista de Leitores por Geral
    function relatorio_leitor_geral(){
        $query = $this->db->query("SELECT * FROM leitores group by unidade_cadastro order by nome asc");
        return $query->result();                
    }
    
    //Lista de Leitores por Unidade
    function relatorio_leitor_unidade($biblioteca,$perfil,$serie){
        
        $sql = " SELECT l.nome,l.logradouro,l.complemento,l.bairro,l.municipio,l.cep,l.matricula,l.email,b.descricao as nome_biblioteca "
             . " FROM leitores l, login_leitor log, biblioteca b "
             . " WHERE l.idleitor = log.leitor "
             . " AND b.idbiblioteca = l.unidade_cadastro ";
        
        if($perfil!="todos"){
            $sql .= " and log.perfil = '$perfil' ";
        }
        
        if($serie!="todas"){
            $sql .= " and l.serie = '$serie' ";
        }
        
        if($biblioteca!="todas"){
            $sql .= " and l.unidade_cadastro = $biblioteca";
        }
        $sql .= " order by nome_biblioteca,nome asc ";
        
        $query = $this->db->query($sql);
        
         return $query->result();        
    }
    
  
    
    
    
}

















