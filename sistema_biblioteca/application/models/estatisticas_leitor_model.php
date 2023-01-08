<?php

class Estatisticas_leitor_model extends CI_Model{
        
    const TABELA = "";
    
    function __construct() {
        parent::__construct();

    }
 
    function retorna_numero_reservas_solicitadas_leitor($usuario){
        $sql="SELECT count(idreserva) as qtd "
                . " FROM reservas as re, leitores as le"
                . " WHERE re.leitor = le.idleitor"
                . " AND le.idleitor = $usuario ";       
        $query = $this->db->query($sql);  
        return $query->result();
        
    }
 
    function retorna_numero_acervos_emprestados_leitor($usuario){
        $sql="SELECT count(idemprestimo) as qtd "
                . " FROM emprestimo as e, leitores as le"
                . " WHERE e.leitor = le.idleitor"
                . " AND le.idleitor = $usuario "
                . " AND e.status = 1"; //empréstimos já finalizados       
        $query = $this->db->query($sql);  
        return $query->result();        
    }
 
    function retorna_numero_bibliotecas(){
        $sql=" SELECT count(idbiblioteca) as qtd FROM biblioteca";       
        $query = $this->db->query($sql);  
        return $query->result();        
    }
}
 ?>