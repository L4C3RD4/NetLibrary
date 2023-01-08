<?php

class Dados_usuario_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {
        
        
             if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                    $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                    $this->template->write_view('content', 'bibliotecario/dados_bibliotecario_view', "", FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'gestor/dados_gestor_view', "", FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'leitores/dados_leitor_view', "", FALSE);
                        $this->template->render();
                        }
                    }
                }
            }           
        else{
             redirect('login_controller');
        }

}

function exibir_dados(){
     $session_data = $this->session->userdata('logged_in');
        $idleitor = $session_data["idusuario"];
        $this->load->model('dados_usuarios_model');
        $leitores = $this->dados_usuarios_model->exibir_dados_leitor($idleitor);        
        $leitorArray = array();
        foreach ($leitores as $leitor) {
          
            array_push($leitorArray, $leitor);
        }
        echo json_encode(array("data" => $leitorArray));
    
}
function exibir_dados_bibliotecario(){
     $session_data = $this->session->userdata('logged_in');
        $idusuario = $session_data["idusuario"];
        $this->load->model('dados_usuarios_model');
        $bibliotecarios = $this->dados_usuarios_model->exibir_dados_bibliotecario($idusuario);        
        $bibliotecarioArray = array();
        foreach ( $bibliotecarios as $bibliotecario) {
          
            array_push($bibliotecarioArray, $bibliotecario);
        }
        echo json_encode(array("data" => $bibliotecarioArray));
    
}
function exibir_dados_gestor(){
     $session_data = $this->session->userdata('logged_in');
        $idusuario = $session_data["idusuario"];
        $this->load->model('dados_usuarios_model');
        $gestor_ = $this->dados_usuarios_model->exibir_dados_gestor($idusuario);        
        $gestorArray = array();
        foreach ( $gestor_ as $gestor) {
          
            array_push($gestorArray, $gestor);
        }
        echo json_encode(array("data" => $gestorArray));
    
}

}