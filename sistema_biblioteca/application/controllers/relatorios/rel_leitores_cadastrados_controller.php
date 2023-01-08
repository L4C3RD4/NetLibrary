<?php

class Rel_leitores_cadastrados_controller extends CI_Controller {

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
            }else {
            redirect('login_controller');
        }
               
        
    }
    }

    
    function relatorio_leitores_geral() {
        $this->load->model('relatorios_model');               
        $resultado = $this->relatorios_model->relatorio_leitor_geral();
        if ($resultado) {
            $conteudo = " ";
                foreach ($resultado as $leitor) {
                       $conteudo .= "<tr>";
                       $conteudo .= "<td>".$leitor->idleitor."</td>";
                       $conteudo .= "<td>".$leitor->unidade_cadastro."</td>"; 
                       $conteudo .= "<td>".$leitor->nome."</td>";
                       $conteudo .= "<td>".$leitor->logradouro."</td>";
                       $conteudo .= "<td>".$leitor->bairro."</td>";
                       $conteudo .= "<td>".$leitor->municipio."</td>";
                       $conteudo .= "<td>".$leitor->cep."</td>";
                       $conteudo .= "<td>".$leitor->matricula."</td>";
                       $conteudo .= "<td>".$leitor->email."</td>";
                       $conteudo .= "<td>".$leitor->data_cadastro."</td>";
                       $conteudo .= "</tr>";
                }         
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='10'><center>Não existem leitores cadastros com esses filtros</center></td>";
               $conteudo .= "</tr>";
               echo $conteudo;   
                gera_arquivo_acervo_geral();
            }
            else
            {    
                $mensagem = array('tipo' => 'error');
                echo json_encode($mensagem);
            }
        }
    }
       
    
    
    
    function relatorio_leitor_unidade() {
        //$iddemanda = $this->input->post('iddemanda');
        $biblioteca = $this->input->post('biblioteca');
        $this->load->model('relatorios_model');               
        $resultado = $this->relatorios_model->relatorio_leitores_unidade($biblioteca);
        if ($resultado) {
            $conteudo = " ";
               foreach ($resultado as $leitor) {
                      $conteudo .= "<tr>";
                       $conteudo .= "<td>".$leitor->idleitor."</td>";
                       $conteudo .= "<td>".$leitor->unidade_cadastro."</td>"; 
                       $conteudo .= "<td>".$leitor->nome."</td>";
                       $conteudo .= "<td>".$leitor->logradouro."</td>";
                       $conteudo .= "<td>".$leitor->bairro."</td>";
                       $conteudo .= "<td>".$leitor->municipio."</td>";
                        $conteudo .= "<td>".$leitor->cep."</td>";
                       $conteudo .= "<td>".$leitor->matricula."</td>";
                       $conteudo .= "<td>".$leitor->email."</td>";
                       $conteudo .= "<td>".$leitor->data_cadastro."</td>";
                       $conteudo .= "</tr>";
                }                  
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='10'><center>Não existem leitores cadastros com esses filtros</center></td>";
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

function gera_arquivo_leitores_geral(){
   // file name 
   $filename = 'Relatório Leitores Geral'." -  ". date('d/m/Y').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; charset=utf-8; ");
   // get data 
   $this->load->model('relatorios_model');               
   $resultados = $this->relatorios_model->relatorio_leitor_geral();         
   // file creation 
   $file = fopen('php://output', 'w');
   $header = array("ID_Leitor;Unidade;Nome;Logradouro;Bairro;Municipio;CEP;Matricula;Email_do_leitor;Data_de_cadastro"); 
   fputcsv($file, $header); 
   foreach ($resultados as $resultado) {            
       echo utf8_decode($resultado->idleitor.";".$resultado->unidade_cadastro.";".$resultado->nome.";".$resultado->logradouro.";".$resultado->bairro.";".
               $resultado->municipio.";".$resultado->cep.";".$resultado->matricula.";".$resultado->email.";".$resultado->data_cadastro.";"."\n");       
//       $total = $total + $resultado;
   }
//    echo "Total de Inscritos;".$total.";\n";    
    fclose($file); 
    exit; 
  }

  
  function gera_arquivo_leitores_unidade(){
   // file name 
   $biblioteca = $this->input->post('biblioteca');  
   $this->load->model('relatorios_model');               
   $resultados = $this->relatorios_model->relatorio_leitores_unidade($biblioteca); 
   
   $filename = 'Relatório Leitor Unidade: '." -  ". date('d/m/Y').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; charset=utf-8; ");
   // get data 
  
   // file creation 
   $file = fopen('php://output', 'w');
    $header = array("ID_Leitor;Unidade;Nome;Logradouro;Bairro;Municipio;CEP;Matricula;Email_do_leitor;Data_de_cadastro"); 
   fputcsv($file, $header); 
   foreach ($resultados as $resultado) {            
       echo utf8_decode($resultado->idleitor.";".$resultado->unidade_cadastro.";".$resultado->nome.";".$resultado->logradouro.";".$resultado->bairro.";".
               $resultado->municipio.";".$resultado->cep.";".$resultado->matricula.";".$resultado->email.";".$resultado->data_cadastro.";"."\n");       
//       $total = $total + $resultado;
   }
//    echo "Total de Inscritos;".$total.";\n";    
    fclose($file); 
    exit; 
  }
    
}

?>