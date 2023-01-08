<?php

class Rel_emprestimos_controller extends CI_Controller {
   function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
            if($perfil=="gestor"){
                
                $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_emprestimos_view', "", FALSE);
                $this->template->render();
                
            } else {
               if($perfil=="bibliotecario" ||$perfil=="auxiliar" ){
                   $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_emprestimos_view', "", FALSE);
                $this->template->render();
                   
               } 
            }
        } else {
            redirect('login_controller');
        }
    
    }
    
    
    
    function listar_emprestimo() {
        
        $session_data = $this->session->userdata('logged_in'); 
        $biblioteca = $session_data['biblioteca'];
        $usuario = $session_data['idusuario'];
        $this->load->model('relatorios/rel_emprestimos_model');
        $emprestimo = $this->rel_emprestimos_model->lista_emprestimo($biblioteca,$usuario);        
        $emprestimosArray = array();
        
        foreach ($emprestimo as $Emprestimos) {
            
            
            array_push($emprestimosArray, $Emprestimos);
            
        }
        echo json_encode(array("data" => $emprestimosArray));
    }
    
      function relatorio_geral_emprestimos() {
        $perfil= $this->input->post('perfil');
        $data_inicial = $this->input->post("data_inicial");
        $data_final = $this->input->post("data_final");
        $serie = $this->input->post('serie');
        $unidade_educacional = $this->input->post('unidade_educacional');
//        $session_data = $this->session->userdata('logged_in'); 
//        $biblioteca = $session_data['biblioteca'];
        $this->load->model('relatorios/rel_emprestimos_model');
        $emprestimo_parametro = $this->rel_emprestimos_model->lista_emprestimo_parametro($unidade_educacional,$perfil,$data_inicial,$data_final,$serie);        
        if ($emprestimo_parametro) {
            $conteudo = " ";
                foreach ($emprestimo_parametro as $emprestimo) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$emprestimo->nome_biblioteca."</td>";
                       $conteudo .= "<td>".$emprestimo->idemprestimo."</td>";
                       $conteudo .= "<td>".$emprestimo->titulo."</td>";
                       $conteudo .= "<td>".$emprestimo->nome."</td>"; 
                       $conteudo .= "<td>".strftime("%d/%m/%Y", strtotime($emprestimo->data_emprestimo))."</td>"; 
                       $conteudo .= "<td>".strftime("%d/%m/%Y", strtotime($emprestimo->data_devolucao))."</td>"; 
                       if($emprestimo->status==1){
                           $emprestimo->status = " Finalizado ";
                       }else{
                           $emprestimo->status = " Não Finalizado ";
                       }
                       $conteudo .= "<td>".$emprestimo->status."</td>";  
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }          
        else {
            if(empty($emprestimo_parametro)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='7'><center>Não existem empréstimos com esses filtros</center></td>";
               $conteudo .= "</tr>";
               echo $conteudo;    
            }
            else
            {    
                $mensagem = array('tipo' => 'error');
                echo json_encode($mensagem);
            }
        }
    }
    
    function relatorio_emprestimos_unidade() {
        $perfil= $this->input->post('perfil');
        $data_inicial = $this->input->post("data_inicial");
        $data_final = $this->input->post("data_final");
        $serie = $this->input->post('serie');
        $biblioteca = $this->input->post('biblioteca');
        $this->load->model('relatorios/rel_emprestimos_model');
        $emprestimo_parametro = $this->rel_emprestimos_model->lista_emprestimo_parametro($biblioteca,$perfil,$data_inicial,$data_final,$serie);        
        if ($emprestimo_parametro) {
            $conteudo = " ";
                foreach ($emprestimo_parametro as $emprestimo) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$emprestimo->idemprestimo."</td>";
                       $conteudo .= "<td>".strftime("%d/%m/%Y", strtotime($emprestimo->data_emprestimo))."</td>";
                       $conteudo .= "<td>".$emprestimo->usuario_nome."</td>";
                       $conteudo .= "<td>".$emprestimo->titulo."</td>"; 
                       $conteudo .= "<td>".$emprestimo->nome_leitor."</td>"; 
                       $conteudo .= "<td>".strftime("%d/%m/%Y", strtotime($emprestimo->data_devolucao))."</td>"; 
                       if($emprestimo->status==1){
                           $emprestimo->status = " Finalizado ";
                       }else{
                           $emprestimo->status = " Não Finalizado ";
                       }
                       $conteudo .= "<td>".$emprestimo->status."</td>";  
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }          
        else {
            if(empty($emprestimo_parametro)){
                $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='7'><center>Não existem empréstimos com esses filtros</center></td>";
               $conteudo .= "</tr>";
               echo $conteudo;    
            }
            else
            {    
                $mensagem = array('tipo' => 'error');
                echo json_encode($mensagem);
            }
        }
    }
    
    
}

