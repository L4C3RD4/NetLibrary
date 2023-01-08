<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesquisa_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');   
        error_reporting(E_ALL);
	ini_set('display_errors', 1);

    }
    
    
    public function index(){  

            if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                    $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                    $this->template->write_view('content', 'bibliotecario/pesquisa_bibliotecario_view', "", FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu','gestor/menu','',FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'leitores/pesquisa_leitores_view', "", FALSE);
                        $this->template->render();
                        }
                    }
                }
            }           
        else{
            $this->template->write_view('menu', 'menu_pesquisa', "", FALSE);
            $this->template->write_view('content', 'pesquisa_view', "", FALSE);
            $this->template->render();
        }
    }   
    function pesquisar() {

        $tipo_busca = $this->input->post('tipo_busca');
        $chave_pesquisa = $this->input->post('chave_pesquisa');
        $tipo_material = $this->input->post('tipo_material');
        $localizacao = $this->input->post('localizacao');
        $editora = $this->input->post('editora');
        $assunto = $this->input->post('assunto');
        $genero = $this->input->post('genero');
        $this->load->model('pesquisa_model');
        $pesquisa = $this->pesquisa_model->pesquisa($tipo_busca,$chave_pesquisa,$tipo_material,$localizacao,$editora,$assunto,$genero);        
        $setoresArray = array();
        foreach ($pesquisa as $search) {
            array_push($setoresArray, $search);
        }
        echo json_encode(array("data" => $setoresArray));
    }
      
    function listar_local() {

        $this->load->model('pesquisa_model');
        $locais = $this->pesquisa_model->lista_local();        
        $locaisArray = array();
        foreach ($locais as $local) {
           array_push($locaisArray, $local);
        }
        echo json_encode(array("data" => $locaisArray));
    }
    
    
//    function listar_sem_acervo() {
//
//        $this->load->model('pesquisa_model');
//        $unidades = $this->pesquisa_model->lista_sem_acervo();        
//        $unidadesArray = array();
//        foreach ($unidades as $unidade) {
//            array_push($unidadesArray, $unidade);
//        }
//        echo json_encode(array("data" => $unidadesArray));
//    }
    
        
    function pesquisar_leitores() {

        $tipo_busca= $this->input->post('tipo_busca');
        $chave_pesquisa = $this->input->post('chave_pesquisa');
        $tipo_material = $this->input->post('tipo_material');
        $editora = $this->input->post('editora');
        $localizacao = $this->input->post('localizacao');
        $assunto = $this->input->post('assunto');
        $genero = $this->input->post('genero');
        $this->load->model('pesquisa_model');
        $pesquisa = $this->pesquisa_model->pesquisa_leitores($tipo_busca,$chave_pesquisa,$tipo_material,$localizacao,$editora,$assunto,$genero);   
        
        $setoresArray = array();
        foreach ($pesquisa as $search) {
            array_push($setoresArray, $search);
        }
        echo json_encode(array("data" => $setoresArray));
    }
      

    function logout() {

        //registra o log da aÃ§Ã£o
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
        $perfil = $session_data['perfil'];
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
       if(($perfil=="bibliotecario")|| ($perfil=="gestor")){
            $log->inserirLog("login",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
           
        }else{
             $log->inserirLog("login_leitor",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
        }
            
        $this->session->sess_destroy();
        redirect("pesquisa_controller");                           

    }
    
    
    
    }  




