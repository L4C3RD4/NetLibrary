<?php

class Estatisticas_bibliotecario_model extends CI_Model{
        
    const TABELA = "";
    
    function __construct() {
        parent::__construct();

    }
    
    function retorna_qtd_materiais($biblioteca){
        $sql="SELECT count(ab.idacervo) as qtd"
            . " FROM acervo_biblioteca as ab, biblioteca as b "
                . " WHERE ab.biblioteca = b.idbiblioteca "
                . " AND ab.biblioteca = $biblioteca";
       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    function retorna_numero_emprestimos($biblioteca){
        $sql="SELECT count(e.idemprestimo) as qtd "
                . " FROM emprestimo as e, biblioteca as b, acervo_biblioteca as ab, bibliotecarios as bib "
                . " WHERE ab.biblioteca = b.idbiblioteca "
                . " AND e.material = ab.idacervo "
                . " AND bib.biblioteca = b.idbiblioteca "
                . " AND e.status = 0"
                . " AND ab.status = 0"
                . " AND b.idbiblioteca = $biblioteca";
       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    function retorna_numero_leitores($biblioteca){
        $sql=" SELECT count(*) as qtd "
                . " FROM leitores "
                . " WHERE unidade_cadastro = $biblioteca";                
       
        $query = $this->db->query($sql);  
        return $query->result();
            
    }
        
    
    function retorna_numero_reservas($biblioteca){
        $sql="SELECT count(re.idreserva) as qtd "
                . " FROM reservas as re, acervo_biblioteca as ab, biblioteca as b "
                . " WHERE ab.idacervo = re.acervo "
                . " AND b.idbiblioteca = ab.biblioteca "
                . " AND b.idbiblioteca = $biblioteca";
       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
    
}
 ?>