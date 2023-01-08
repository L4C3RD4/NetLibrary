<?php

class Emprestimo_finalizados_controller extends CI_Controller {

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
                    $this->template->write_view('content','bibliotecario/emprestimo_finalizados_view',"",FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'leitores/emprestimos_finalizados_view', "", FALSE);
                        $this->template->render();
                        }
                    }
                }
            }           
        else{
             redirect('login_controller');
        }
        
    }
//    function listar_emprestimo() {
//        
//        $session_data = $this->session->userdata('logged_in'); 
//        $biblioteca = $session_data['biblioteca'];
//        $usuario = $session_data['idusuario'];
//        $this->load->model('emprestimo_model');
//        $emprestimo = $this->emprestimo_model->lista_emprestimo($biblioteca,$usuario);        
//        $emprestimosArray = array();
//        
//        foreach ($emprestimo as $Emprestimos) {
//            
//            
//            array_push($emprestimosArray, $Emprestimos);
//            
//        }
//        echo json_encode(array("data" => $emprestimosArray));
//    }
    
    function listar_emprestimo_parametro() {
        $perfil= $this->input->post('perfil');
        $tipo= $this->input->post('tipo');
        $situacao= $this->input->post('situacao');
//        echo $chave_emprestimo_leitor;
//        $chave_emprestimo= $this->input->post('chave_emprestimo');
        $session_data = $this->session->userdata('logged_in'); 
        $biblioteca = $session_data['biblioteca'];
        $this->load->model('emprestimo_finalizados_model');
        $emprestimo_parametro = $this->emprestimo_finalizados_model->lista_emprestimo_parametro($biblioteca,$perfil,$tipo,$situacao);        
        $emprestimos_Array = array();
        foreach ($emprestimo_parametro as $Emprestimos_parametro) {
            
                if($Emprestimos_parametro->status_emprestimo==1){
                $Emprestimos_parametro->status_2_emprestimo="EmprÃ©stimo Finalizado";
            }else{
                if($Emprestimos_parametro->status_emprestimo==0){
                $Emprestimos_parametro->status_2_emprestimo="NÃ£o Finalizado";
            }
            }
            array_push($emprestimos_Array, $Emprestimos_parametro);
        }
        echo json_encode(array("data" => $emprestimos_Array));
    }
    
        
     function listar_emprestimos_leitor_finalizado() {
       $session_data = $this->session->userdata('logged_in'); 
        $usuario = $session_data['idusuario'];
        $this->load->model('emprestimo_finalizados_model');
        $emprestimos = $this->emprestimo_finalizados_model->lista_emprestimos_leitor_finalizado($usuario);        
        $emprestimosArray = array();
        foreach ($emprestimos as $emprestimo) {
            if($emprestimo->status==0){
                $emprestimo->status_2="Não Finalizado";
            }else{
                if($emprestimo->status==1){
                    $emprestimo->status_2="Finalizado";
                 }
            } 
            $emprestimo->data_devolucao = strftime("%d/%m/%Y", strtotime($emprestimo->data_devolucao));
            $emprestimo->data_emprestimo = strftime("%d/%m/%Y", strtotime($emprestimo->data_emprestimo));
            array_push($emprestimosArray, $emprestimo);
        }
        echo json_encode(array("data" => $emprestimosArray));
    }
    
}

