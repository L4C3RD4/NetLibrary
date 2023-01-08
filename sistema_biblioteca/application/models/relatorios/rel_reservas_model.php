<?php

class Rel_reservas_model extends CI_Model {

    
    function __construct() {
        parent::__construct();
    }
    
   
  
    function listareservas ($unidade_educacional,$perfil,$serie) {
        $sql = "SELECT re.*, le.nome , a.titulo ,ab.idacervo as idacervo_biblioteca "
                . " FROM reservas as re, leitores as le, acervo_biblioteca as ab, acervo as a, login_leitor as log"
                . " WHERE re.acervo = ab.idacervo "
                . " AND ab.material = a.idacervo"
                . " AND re.leitor = le.idleitor "
                . " AND log.leitor = le.idleitor  ";
        
        if($perfil!="todos"){
            $sql .= " and log.perfil like '%$perfil%' ";
        }
        
        if($serie!="todas"){
            $sql .= " and le.serie = '$serie' ";
        }
        
        if($unidade_educacional!="todas"){
            $sql .= " and le.unidade_cadastro = $unidade_educacional ";
        }
       
          $sql.= " group by idreserva ";  
        
        // echo $sql;
          
        $query = $this->db->query($sql);       
         return $query->result();
    }
    
   
}

















