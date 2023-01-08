<?php

class Rel_acervo_cadastrado_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
            if($perfil=="gestor"){
                
                $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_acervo_cadastrado_view', "", FALSE);
                $this->template->render();
            }else {
            if($perfil=="bibliotecario"||$perfil=="auxiliar"){
                
                $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_acervo_cadastrado_view', "", FALSE);
                $this->template->render();
            } else {
                redirect('login_controller');
            }
        }
               
        
    }
    }

    
    function relatorio_ag() {
        $this->load->model('relatorios_model');               
        $resultado = $this->relatorios_model->relatorio_acervogeral();
        if ($resultado) {
            $conteudo = " ";
                foreach ($resultado as $acervo) {
                       $conteudo .= "<tr>";
                       $conteudo .= "<td>".$acervo->material."</td>";
                       $conteudo .= "<td>".$acervo->titulo."</td>"; 
                       $conteudo .= "<td>".$acervo->tipo."</td>";
                       $conteudo .= "<td>".$acervo->descricao."</td>";
                       $conteudo .= "<td>".$acervo->assunto."</td>";
                       $conteudo .= "<td>".$acervo->editora."</td>";
                       $conteudo .= "<td>".$acervo->ano_publicacao."</td>";
                       $conteudo .= "<td>".$acervo->isbn."</td>";
                       $conteudo .= "<td>".$acervo->data_aquisicao."</td>";
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='9'><center>Não existem materiais cadastros com esses filtros</center></td>";
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
       
    
    
    
    function relatorio_bib() {
        //$iddemanda = $this->input->post('iddemanda');
        $biblioteca = $this->input->post('biblioteca');
        $this->load->model('relatorios_model');               
        $resultado = $this->relatorios_model->relatorio_acervo_biblioteca($biblioteca);
        if ($resultado) {
            $conteudo = " ";
               foreach ($resultado as $acervo) {
                       $conteudo .= "<tr>";
                       $conteudo .= "<td>".$acervo->material."</td>";
                       $conteudo .= "<td>".$acervo->titulo."</td>"; 
                       $conteudo .= "<td>".$acervo->tipo."</td>";
                       $conteudo .= "<td>".$acervo->assunto."</td>";
                       $conteudo .= "<td>".$acervo->editora."</td>";
                       $conteudo .= "<td>".$acervo->ano_publicacao."</td>";
                       $conteudo .= "<td>".$acervo->isbn."</td>";
                       $conteudo .= "<td>".$acervo->data_aquisicao."</td>";
                       $conteudo .= "</tr>";
                }                  
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='9'><center>Não existem materiais cadastros com esses filtros</center></td>";
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

function gera_arquivo_acervo_geral(){
   // file name 
   $filename = 'relatorio_acervo_geral'." -  ". date('d/m/Y').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; charset=utf-8; ");
   // get data 
   $this->load->model('relatorios_model');               
   $resultados = $this->relatorios_model->relatorio_acervogeral();         
   // file creation 
   $file = fopen('php://output', 'w');
   $header = array(utf8_decode("Biblioteca;Número_Registro;Data;Autor;Título;Edição;Editora;Data_Publicação;Volume;Exemplar;Tipo_Aquisição;Tipo_Documento;Série;Baixa")); 
   fputcsv($file, $header); 
   foreach ($resultados as $resultado) {            
       if($resultado->baixa){
           $baixa = "sim";
       }else{
           $baixa = "não";
       }
       echo utf8_decode($resultado->descricao.";".$resultado->codigo_exemplar.";".$resultado->data_registro.";".$resultado->nome." ".$resultado->sobrenome.";".$resultado->titulo.";".$resultado->edicao.";".
               $resultado->editora.";".$resultado->ano_publicacao.";".$resultado->volume.";".$resultado->numero_exemplar.";".   
               $resultado->tipo_aquisicao.";".$resultado->tipo_material.";".$resultado->serie_colecao.";".$baixa.";"."\n");       
//       $total = $total + $resultado;
   }
    fclose($file); 
    exit; 
  }

  
  function gera_arquivo_acervo_unidade(){
   // file name 
     
      
   $filename = 'Relatório Acervo Unidade: '." -  ". date('d/m/Y').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; charset=utf-8; ");
   // get data 
   $biblioteca = $this->input->get('biblioteca');  
   $this->load->model('relatorios_model');               
   $resultados = $this->relatorios_model->relatorio_acervo_biblioteca($biblioteca); 
   
   // file creation 
   $file = fopen('php://output', 'w');
   $header = array(utf8_decode("Número_Registro;Data;Autor;Título;Edição;Editora;Data_Publicação;Volume;Exemplar;Tipo_Aquisição;Tipo_Documento;Série;Baixa")); 
   fputcsv($file, $header); 
   foreach ($resultados as $resultado) {            
       if($resultado->baixa){
           $baixa = "sim";
       }else{
           $baixa = "não";
       }
       echo utf8_decode($resultado->codigo_exemplar.";".$resultado->data_registro.";".$resultado->nome." ".$resultado->sobrenome.";".$resultado->titulo.";".$resultado->edicao.";".
               $resultado->editora.";".$resultado->ano_publicacao.";".$resultado->volume.";".$resultado->numero_exemplar.";".   
               $resultado->tipo_aquisicao.";".$resultado->tipo_material.";".$resultado->serie_colecao.";".$baixa.";"."\n");       
//       $total = $total + $resultado;
   }
    fclose($file); 
    exit; 
  }
  
}

?>