<?php

class Reservas_leitor_controller extends CI_Controller {

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
                     $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu','gestor/menu','',FALSE);
                         $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                            $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                            $this->template->write_view('content', 'leitores/reservas_leitor_view', "", FALSE);
                            $this->template->render();
                        }
                    }
                }
            }           
        else{
             redirect('login_controller');
        }
   
    }

  function listar_reservas_leitor() {
       $session_data = $this->session->userdata('logged_in'); 
        $usuario = $session_data['idusuario'];
        $this->load->model('reservas_leitor_model');
        $reservas = $this->reservas_leitor_model->lista_reservas_leitor($usuario);        
        $reservasArray = array();
        foreach ($reservas as $reserva) {
//            if($reserva->status==0){
//                $reserva->status_2="Não Finalizado";
//            }else{
//                if($reserva->status==1){
//                    $reserva->status_2="Finalizado";
//                 }
//            } 
            $reserva->data_solicitacao = strftime("%d/%m/%Y", strtotime($reserva->data_solicitacao));
            $reserva->data_vencimento = strftime("%d/%m/%Y", strtotime($reserva->data_vencimento));
            array_push($reservasArray, $reserva);
        }
        echo json_encode(array("data" => $reservasArray));
    }
    
}

