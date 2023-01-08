<?php

class Estatisticas_gestor_model extends CI_Model{
        
    const TABELA = "";
    
    function __construct() {
        parent::__construct();

    }
    
    function retorna_numero_acervos_cadastrados(){
        $sql="SELECT count(idacervo) as qtd FROM acervo";
       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    function retorna_numero_leitores_cadastrados(){
        $sql="SELECT count(idleitor) as qtd FROM leitores ";
                       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    function retorna_numero_acervos_emprestados(){
        $sql="SELECT count(idemprestimo) as qtd "
                . " FROM emprestimo as e "
                . " WHERE e.status = 0 ";
       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    function retorna_numero_reservas_solicitadas(){
        $sql="SELECT count(idreserva) as qtd FROM reservas as re ";       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
 
    
}
 ?>