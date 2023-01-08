<?php

class Reserva_controller extends CI_Controller {

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
                    $this->template->write_view('content','bibliotecario/reserva_view',"",FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu','gestor/menu','',FALSE);
                         $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
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

     function cadastrar_reserva() {
        $idreserva = isset($idreserva) ? $idreserva : NULL;
        $acervo = $this->input->post('acervo');
        $leitor= $this->input->post('leitor');
        $data_solicitacao = $this->input->post('data_solicitacao');
        $data_vencimento = $this->input->post('data_vencimento');
        
        $this->load->model('reserva_model');
        $inserir = $this->reserva_model->cadastra_reserva($idreserva,$acervo,$leitor,$data_solicitacao,$data_vencimento);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
            
             //LOG
                $session_data = $this->session->userdata('logged_in');
                $nome = $session_data["nome"];        
                require_once(APPPATH."libraries/Logs.php");
                $log = new Logs();
                $log->inserirLog("reservas",$leitor,$leitor." - ".$nome,"Fez uma reserva!");

        }else{
             $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }


     function alterar_emprestimo() {
       
        $idemprestimo = $this->input->post('idemprestimo');
        $material= $this->input->post('material');
        $usuario= $this->input->post('usuario');
        $leitor= $this->input->post('leitor');
        $data_emprestimo= $this->input->post('data_emprestimo');
        $hora_emprestimo= $this->input->post('hora_emprestimo');
        $data_devolucao= $this->input->post('data_devolucao');
        $hora_devolucao= $this->input->post('hora_devolucao');
        $status= $this->input->post('status');

        $this->load->model('emprestimo_model');
             
        $inserir = $this->emprestimo_model->altera_emprestimo($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_devolucao,$hora_devolucao,$status);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             //LOG
              $session_data = $this->session->userdata('logged_in');
              $usuario = $session_data["idusuario"];
              $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("reservas",$idemprestimo,$usuario." - ".$nome,"Alterou o empréstimo ".$idemprestimo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }


    
    function listar_reservas() {
        $this->load->model('reserva_model');
        $session_data = $this->session->userdata('logged_in');
        $biblioteca = $session_data["biblioteca"];
        $reservas = $this->reserva_model->listareservas($biblioteca);        
        $reservasArray = array();
        foreach ($reservas as $reserva) {
              if($reserva->dias_atraso==0){
                $reserva->status_2="Vence Hoje";
            }else{
                if($reserva->dias_atraso>=1){
                $reserva->status_2="Atrasada";
            }else{
                 $reserva->status_2="Em dia";
            }
            }
            array_push($reservasArray, $reserva);
            
        }
        echo json_encode(array("data" => $reservasArray));

    }  
    function verifcar_reservas() {

          $codigo_acervo= $this->input->post('idacervo');
        $this->load->model('reserva_model');
      
        $reservas = $this->reserva_model->verifca_reservas($codigo_acervo);        
        $reservasArray = array();
        foreach ($reservas as $reserva) {
            array_push($reservasArray, $reserva);
        }
        echo json_encode(array("data" => $reservasArray));

    }  
     function excluir_reserva() {
        $idreserva = $this->input->post('idreserva');        
        $this->load->model('reserva_model');        
        $inserir = $this->reserva_model->exclui_reserva($idreserva);
        
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
           //LOG  
              $session_data = $this->session->userdata('logged_in');
              $usuario = $session_data["idusuario"];
              $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("reservas",$idreserva,$usuario." - ".$nome,"Apagou a reserva ".$idreserva." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    function exclui_todas_reservas() {
         $this->load->model('reserva_model');        
        $excluir = $this->reserva_model->exclui_todas_reservas();
        
        if($excluir){
           $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
        }else{
           $mensagem = array('tipo' => 'erro');
             echo json_encode($mensagem);
        }
    }
    
    
}

