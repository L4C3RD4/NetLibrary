<?php

class Rel_reservas_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
            if($perfil=="gestor"){
                
                $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_reservas_view', "", FALSE);
                $this->template->render();
                
            } 
        } else {
            redirect('login_controller');
        }
        
            
        
    }

    

   

    function listar_bibliotecas() {
 $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            if($perfil=='bibliotecario'){
                  $this->load->model('bibliotecas_model');
                  $idbiblioteca= $session_data['biblioteca'];
        $bibliotecas = $this->bibliotecas_model->listabibliotecaespecifica($idbiblioteca);        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
                
                
            }else{
                $this->load->model('bibliotecas_model');
        $bibliotecas = $this->bibliotecas_model->listabibliotecas();        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
        
        }
        
    }
    
     function listar_reservas() {
        $biblioteca = $this->input->post('biblioteca');
        $perfil = $this->input->post('perfil');
        $serie = $this->input->post('serie');
        $this->load->model('relatorios/rel_reservas_model');
        $reservas = $this->rel_reservas_model->listareservas($biblioteca,$perfil,$serie);        
        $reservasArray = array();
        if ($reservas) {
            $conteudo = " ";
                foreach ($reservas as $reserva) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$reserva->idreserva."</td>";
                       $conteudo .= "<td>".$reserva->titulo."</td>";
                       $conteudo .= "<td>".$reserva->nome."</td>"; 
                       $conteudo .= "<td>".strftime("%d/%m/%Y %H:%I", strtotime($reserva->data_solicitacao))."</td>";
                       $conteudo .= "<td>".strftime("%d/%m/%Y %H:%I", strtotime($reserva->data_vencimento))."</td>";
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }  else {
            if(empty($reservas)){
                $conteudo = " ";
                $conteudo .= "<tr>";
                $conteudo .= "<td colspan='5'><center>Não existem registros cadastros com esses filtros</center></td>";
                $conteudo .= "</tr>";
                echo $conteudo;                                                 
            }
            else
            {    
                $mensagem = array('tipo' => 'error');
                echo json_encode($mensagem);
            }
        }
        //echo json_encode(array("data" => $reservasArray));

    }  
    
    
}

