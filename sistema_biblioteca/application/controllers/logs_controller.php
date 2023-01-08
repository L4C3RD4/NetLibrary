<?php

class Logs_controller extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }
	
    function index(){
        
         if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                     $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu','gestor/menu','',FALSE);
                        $this->template->write_view('content','gestor/logs_view','',FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                        }
                    }
                }
            }           
        else{
             redirect('login_controller');
        }
        
    }

    public function buscarLogs() {
        $tabela = $this->input->post("tabela");
        $id_registro = $this->input->post("id_registro");
        $data_inicial = $this->input->post("data_inicial");
        $data_final = $this->input->post("data_final");
        $this->load->model('logs_model');
        $Logs = $this->logs_model->buscarLogs($tabela,$id_registro,$data_inicial,$data_final);        
        $logsArray = array();
        foreach($Logs as $log){
                $log->data = strftime("%d/%m/%Y", strtotime($log->data));
                array_push($logsArray, $log);
        }
        echo json_encode(array("data" => $logsArray));
        
    }
    

    
}

?>