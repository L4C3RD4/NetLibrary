<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Logs{

    public function inserirLog($tabela, $id_registro, $usuario, $descricao){
    	$CI =& get_instance();
	$CI->load->model('logs_model');
	$dataAtual = date('Y-m-d');
	$horaAtual = date('H:i');
	$arrayLogs = array( 'idlog'=>null,
            		    'tabela'=>$tabela,
            		    'id_registro'=>$id_registro,
            		    'data'=>$dataAtual,
            		    'hora'=>$horaAtual,
			    'usuario'=>$usuario,			    
			    'descricao'=>$descricao );
		
	$insereLog = $CI->logs_model->inserirLogs($arrayLogs);
		
	if($insereLog){
	   // echo "Certo";
	}else{
	   // echo "Faslse";
	}
    }

}