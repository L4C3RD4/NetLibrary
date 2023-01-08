<?php

class Bibliotecario_model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');

        error_reporting(-1);
        ini_set('display_errors', 1);
    }

    
    function lista_local() {
        $query = $this->db->get("biblioteca");
        return $query->result();
    }

}
