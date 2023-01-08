<?php

class Rel_leitura_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
            if($perfil=="gestor"){
                
                $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_leitura_view', "", FALSE);
                $this->template->render();
                
            } else {
               if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                   $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_leitura_view', "", FALSE);
                $this->template->render();
                   
               } 
            }
        } else {
            redirect('login_controller');
        }
        
            
        
    }

    
    function relatorio_leitores_unidade() {
        $unidade_educacional = $this->input->post('unidade_educacional');
        $perfil = $this->input->post('perfil');
        $serie = $this->input->post('serie');
        
        $this->load->model('relatorios/rel_leitura_model');               
        $resultado = $this->rel_leitura_model->relatorio_leitor_unidade($unidade_educacional,$perfil,$serie);
        if ($resultado) {
            $conteudo = " ";
                foreach ($resultado as $matricula) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$matricula->nome."</td>";
                       $conteudo .= "<td>".$matricula->serie."</td>";
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
                $conteudo .= "<td colspan='4'><center>Não existem registros cadastros com esses filtros</center></td>";
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
    
    function relatorio_ranking_leitura() {
        
        $data_inicial= $this->input->post('data_inicial');
        $data_final= $this->input->post('data_final');
        $this->load->model('relatorios/rel_leitura_model');
        $resultado = $this->rel_leitura_model->relatorio_ranking_leitura($data_inicial,$data_final);
        if ($resultado) {
            $conteudo = " ";
               foreach ($resultado as $acervo) {
                       $conteudo .= "<tr>";
                       $conteudo .= "<td>".$acervo->descricao."</td>"; 
                       $conteudo .= "<td>".$acervo->nome."</td>"; 
                       $conteudo .= "<td>".$acervo->qtd."</td>";
                       $conteudo .= "</tr>";
                }                  
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
                $conteudo .= "<tr>";
                $conteudo .= "<td colspan='3'><center>Não existem registros cadastros com esses filtros</center></td>";
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
    
    function relatorio_leitura_unidade() {
        $idleitor= $this->input->post('idleitor');
        $data_inicial= $this->input->post('data_inicial');
        $data_final= $this->input->post('data_final');
        
        $session_data = $this->session->userdata('logged_in'); 
       // $biblioteca = $session_data['biblioteca'];
        $this->load->model('relatorios/rel_leitura_model');
        $resultado = $this->rel_leitura_model->relatorio_leitura($idleitor,$data_inicial,$data_final);
        if ($resultado) {
            $conteudo = " ";
               foreach ($resultado as $acervo) {
                       $conteudo .= "<tr>";
                       /*$conteudo .= "<td>".$acervo->idemprestimo."</td>";
                       $conteudo .= "<td>".$acervo->nome."</td>";*/
                       $conteudo .= "<td>".$acervo->titulo."</td>"; 
                       $conteudo .= "<td>".$acervo->tipo."</td>"; 
                       $conteudo .= "<td>".strftime("%d/%m/%Y", strtotime($acervo->data_emprestimo))."</td>";
                       $conteudo .= "<td>".strftime("%d/%m/%Y", strtotime($acervo->data_devolucao))."</td>";
                       $conteudo .= "<td>".$acervo->dias_emprestimo."</td>";
                       $conteudo .= "</tr>";
                }                  
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
                      $conteudo = "<tr>";
                       /*$conteudo .= "<td>".$acervo->idemprestimo."</td>";
                       $conteudo .= "<td>".$acervo->nome."</td>";*/
                       $conteudo .= "<td colspan='5'><center>Sem dados para essa consulta</center></td>"; 
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
      function pesquisar() {
          
     $unidade_educacional= $this->input->post('unidade_educacional');
     $chave_pesquisa = $this->input->post('chave_pesquisa');
     $filtro_perfil = $this->input->post('filtro_perfil');
        $this->load->model('relatorios/rel_leitura_model');
        $pesquisa = $this->rel_leitura_model->pesquisa_leitor($chave_pesquisa,$filtro_perfil,$unidade_educacional);   
       
        $pesquisaArray = array();
        foreach ($pesquisa as $search) {
            array_push($pesquisaArray, $search);
        }
        echo json_encode(array("data" => $pesquisaArray));
        
    }
}

?>