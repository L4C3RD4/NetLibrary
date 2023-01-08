<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
}

function index() {

        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
            if($perfil=="aluno"){
                $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                $this->template->write_view('content', 'leitores/content', "", FALSE);
                $this->template->render();
            }else{
            if($perfil=="gestor"){
                $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                $this->template->write_view('content', 'gestor/content', "", FALSE);
                $this->template->render();
            }else{
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                $this->template->write_view('content', 'bibliotecario/content', "", FALSE);
                $this->template->render();
                
      
                
            }   else{
                 if($perfil=="professor"){
                $this->template->write_view('menu', 'leitores/menu_pesquisa', "", FALSE);
                $this->template->write_view('content', 'leitores/content', "", FALSE);
                $this->template->render();
            }
                
            }
            }
            }
                    
            
        }           
        else{
             redirect('login_leitor_controller');
        }


    }
//   Bibliotecário 
    
    function retorna_qtd_materiais() {
                $session_data = $this->session->userdata('logged_in'); 
                $biblioteca = $session_data['biblioteca'];
                $this->load->model('estatisticas_bibliotecario_model');
                $materiais = $this->estatisticas_bibliotecario_model->retorna_qtd_materiais($biblioteca);        
                echo $materiais[0]->qtd;
    }
    
    function retornar_numero_emprestimos() {
                $session_data = $this->session->userdata('logged_in'); 
                $biblioteca = $session_data['biblioteca'];
                $this->load->model('estatisticas_bibliotecario_model');
                $emprestimos = $this->estatisticas_bibliotecario_model->retorna_numero_emprestimos($biblioteca);        
                echo $emprestimos[0]->qtd;
    }
    function retornar_numero_leitores() {
                $session_data = $this->session->userdata('logged_in'); 
                $biblioteca = $session_data['biblioteca'];
                $this->load->model('estatisticas_bibliotecario_model');
                $num_leitores = $this->estatisticas_bibliotecario_model->retorna_numero_leitores($biblioteca);        
                echo $num_leitores[0]->qtd;
    }
    function retornar_numero_reservas() {
                $session_data = $this->session->userdata('logged_in'); 
                $biblioteca = $session_data['biblioteca'];
                $this->load->model('estatisticas_bibliotecario_model');
                $num_reservas = $this->estatisticas_bibliotecario_model->retorna_numero_reservas($biblioteca);        
                echo $num_reservas[0]->qtd;
    }
//    Gestor
    
    function retornar_numero_acervos_cadastrados() {
                $this->load->model('estatisticas_gestor_model');
                $num_acervos = $this->estatisticas_gestor_model->retorna_numero_acervos_cadastrados();        
                echo $num_acervos[0]->qtd;
    }
    function retornar_numero_leitores_cadastrados() {
                $this->load->model('estatisticas_gestor_model');
                $num_leitores = $this->estatisticas_gestor_model->retorna_numero_leitores_cadastrados();        
                echo $num_leitores[0]->qtd;
    }
    function retornar_numero_acervos_emprestados() {
                $this->load->model('estatisticas_gestor_model');
                $num_emprestimos = $this->estatisticas_gestor_model->retorna_numero_acervos_emprestados();        
                echo $num_emprestimos[0]->qtd;
    }
    function retornar_numero_reservas_solicitadas() {
                $this->load->model('estatisticas_gestor_model');
                $num_reservas = $this->estatisticas_gestor_model->retorna_numero_reservas_solicitadas();        
                echo $num_reservas[0]->qtd;
    }
    
    //Leitor
      function retornar_numero_reservas_solicitadas_leitor() {
          $session_data = $this->session->userdata('logged_in'); 
            $usuario = $session_data['idusuario'];
            $this->load->model('estatisticas_leitor_model');
            $reservas_leitor = $this->estatisticas_leitor_model->retorna_numero_reservas_solicitadas_leitor($usuario);        
            echo $reservas_leitor[0]->qtd;;
    }
      function retornar_numero_acervos_emprestados_leitor() {
          $session_data = $this->session->userdata('logged_in'); 
            $usuario = $session_data['idusuario'];
            $this->load->model('estatisticas_leitor_model');
            $acervos_emprestados = $this->estatisticas_leitor_model->retorna_numero_acervos_emprestados_leitor($usuario);        
            echo $acervos_emprestados[0]->qtd;
    }
      function retornar_numero_bibliotecas() {
            $this->load->model('estatisticas_leitor_model');
            $num_bib = $this->estatisticas_leitor_model->retorna_numero_bibliotecas();        
            echo $num_bib[0]->qtd;
    }
}
?>