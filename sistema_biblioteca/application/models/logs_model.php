<?php
class Logs_model extends CI_Model {

	const TABELA = 'logs';


	function __construct() {
		parent::__construct();
	}
    
    function inserirLogs($arrayLogs){
    	$insereLog = $this->db->insert(self::TABELA, $arrayLogs);
	if($insereLog){
	    return true;
	}else{
	    return false;	
	}
    }
    
    function buscarLogs($tabela,$id_registro,$data_inicial,$data_final){
    	
        $condicao = " ";
        
        if($tabela != ""){
            $condicao .= " tabela = '$tabela' and ";
        }
        if($id_registro != ""){
            $condicao .= " id_registro = $id_registro and ";
        }
        
        $sql = " select * from logs where "
             .  $condicao 
             . " data >= '$data_inicial' and "
             . " data <= '$data_final' ";
        
	$query = $this->db->query($sql);
        return $query->result();
         
    }
    
}