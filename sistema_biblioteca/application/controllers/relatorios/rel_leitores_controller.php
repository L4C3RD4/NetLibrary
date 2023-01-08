<?php

class Rel_leitores_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
            if($perfil=="gestor"){
                
                $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_leitores_view', "", FALSE);
                $this->template->render();
                
            } else {
               if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                   $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_leitores_view', "", FALSE);
                $this->template->render();
                   
               } 
            }
        } else {
            redirect('login_controller');
        }
        
            
        
    }

    
    function relatorio_leitores_unidade() {
        $biblioteca = $this->input->post('biblioteca');
        $perfil = $this->input->post('perfil');
        $serie = $this->input->post('serie');
        
        $this->load->model('relatorios/rel_leitores_model');               
        $resultado = $this->rel_leitores_model->relatorio_leitor_unidade($biblioteca,$perfil,$serie);
        if ($resultado) {
            $conteudo = " ";
                foreach ($resultado as $matricula) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$matricula->nome."</td>";
                       $conteudo .= "<td>".$matricula->logradouro."</td>";
                       $conteudo .= "<td>".$matricula->complemento."</td>"; 
                       $conteudo .= "<td>".$matricula->bairro."</td>";
                       $conteudo .= "<td>".$matricula->municipio."</td>";
                       $conteudo .= "<td>".$matricula->cep."</td>";
                       $conteudo .= "<td>".$matricula->matricula."</td>";
                       $conteudo .= "<td>".$matricula->email."</td>";
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
                $conteudo = " ";
                $conteudo .= "<tr>";
                $conteudo .= "<td colspan='8'><center>Não existem leitores cadastros com esses filtros</center></td>";
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
    
    function relatorio_leitores_geral() {
        $biblioteca = $this->input->post('biblioteca');
        $perfil = $this->input->post('perfil');
        $serie = $this->input->post('serie');
        
        $this->load->model('relatorios/rel_leitores_model');               
        $resultado = $this->rel_leitores_model->relatorio_leitor_unidade($biblioteca,$perfil,$serie);
        if ($resultado) {
            $conteudo = " ";
                foreach ($resultado as $matricula) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$matricula->nome_biblioteca."</td>";
                       $conteudo .= "<td>".$matricula->nome."</td>";
                       $conteudo .= "<td>".$matricula->logradouro."</td>";
                       $conteudo .= "<td>".$matricula->complemento."</td>"; 
                       $conteudo .= "<td>".$matricula->bairro."</td>";
                       $conteudo .= "<td>".$matricula->municipio."</td>";
                       $conteudo .= "<td>".$matricula->cep."</td>";
                       $conteudo .= "<td>".$matricula->matricula."</td>";
                       $conteudo .= "<td>".$matricula->email."</td>";
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='9'><center>Não existem leitores cadastros com esses filtros</center></td>";
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
}

?>