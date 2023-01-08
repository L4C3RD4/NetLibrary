<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autores_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');   
        error_reporting(-1);
	ini_set('display_errors', 1);
        
        if (!$this->session->userdata('logged_in')) {
            redirect('login_controller');
        }
    }
    
    
    
    
    public function index(){
            if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                 
                $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                 $this->template->write_view('content','bibliotecario/autores_view',"",FALSE);
                $this->template->render();
                }else{
                    if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")||($perfil=="gestor")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                        }
                    }
                
            }           
        else{
             redirect('login_controller');
        }
        
    }
    function cadastrar_autor() {
      
        $idautor = isset($idautor) ? $idautor : NULL;
        $nome = $this->input->post('nome');
        $sobrenome = $this->input->post('sobrenome');
        $citacao = $this->input->post('citacao');
      
         if(($nome==null)||($sobrenome==null)||($citacao==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
     
       
        $this->load->model('autores_model');
        $inserir = $this->autores_model->cadastra_autor($idautor,$nome,$sobrenome,$citacao);	
      
   
        if($inserir){
           $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
              //LOG    
              $this->load->model('autores_model');
            $resposta = $this->autores_model->busca_id($nome,$citacao);
            $idcadastrado = $resposta[0]->idautor;
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("autores",$idcadastrado,$usuario." - ".$nome,"Cadastrou o autor ".$idcadastrado." no sistema!");
            
          }
            
        else{
            $mensagem = array('tipo' => 'erroC');
                echo json_encode($mensagem);
        }
        }

    }
    
    function cadastrar_autor_acervo() {
      
        $material = $this->input->post('material');
        $dados_material = $this->input->post('dados_material');
        $autor = $this->input->post('autor');
        $dados_autor = $this->input->post('dados_autor');
        $principal = 0;
      
         if(($material==null)||($autor==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
     
       
        $this->load->model('autores_acervo_model');
        $inserir = $this->autores_acervo_model->cadastra_autores_acervo($material,$autor,$principal);	
      
   
        if($inserir){
           $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        //LOG    
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("autores",null,$usuario." - ".$nome,"Cadastrou um autor ".$dados_autor." para o acervo ".$dados_material." no sistema!");
            
          }
            
        else{
            $mensagem = array('tipo' => 'erroC');
                echo json_encode($mensagem);
        }
        }

    }
    
     function excluirautores() {
        $idautor = $this->input->post('idautor');     
        $this->load->model('autores_model');   
          
            
        $deletar = $this->autores_model->excluiautor($idautor);	
        if($deletar){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
          
             //LOG
             
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("autores",$idautor,$usuario." - ".$nome,"Apagou o autor ".$idautor." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    function excluir_autor_material() {
        $autor = $this->input->post('autor');     
        $material = $this->input->post('material');     
        $dados_autor = $this->input->post('dados_autor');     
        $dados_material = $this->input->post('dados_material');     
        $this->load->model('autores_acervo_model');   
        $deletar = $this->autores_acervo_model->excluir_autor_material($autor,$material);	
        if($deletar){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
          
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("autores",$autor,$usuario." - ".$nome,"Apagou o autor".$dados_autor." do material ".$dados_material." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    function principal_autor_acervo() {
        $autor = $this->input->post('autor');     
        $material = $this->input->post('material');     
        $dados_autor = $this->input->post('dados_autor');     
        $dados_material = $this->input->post('dados_material');     
        $this->load->model('autores_acervo_model');   
        $deletar = $this->autores_acervo_model->principal_autor_acervo($autor,$material);	
        if($deletar){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
          
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("autores",$autor,$usuario." - ".$nome,"Definiu o autor".$dados_autor." como principal para o material ".$dados_material." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }

    function alterarAutores() {
         
        $idautor= $this->input->post('idautor');
        $nome= $this->input->post('nome');
        $sobrenome= $this->input->post('sobrenome');
        $citacao= $this->input->post('citacao');
        
        if(($nome==null)||($sobrenome==null)||($citacao==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $this->load->model('autores_model');
        
        $inserir = $this->autores_model->alteraAutor($idautor,$nome,$sobrenome,$citacao);	
            if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
         //LOG     
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("autores",$idautor,$usuario." - ".$nome,"Alterou o autor ".$idautor." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }
    function listar_autores() {

        $this->load->model('autores_model');
        $autores = $this->autores_model->listaautores();        
        $autoresArray = array();
        foreach ($autores as $autor) {
            array_push($autoresArray, $autor);
        }
        echo json_encode(array("data" => $autoresArray));
    }
    
    function listar_autores_do_acervo() {
        $tipo_pesquisa= $this->input->post('tipo_pesquisa');
        $chave= $this->input->post('chave');
       $this->load->model('autores_model');
       $autores_acervo = $this->autores_model->lista_autores($tipo_pesquisa,$chave);        
       $autores_Array = array();
        foreach ($autores_acervo as $autor_acervo) {
            array_push($autores_Array, $autor_acervo);
        }
        echo json_encode(array("data" => $autores_Array));
    }
    
    function lista_autores_material() {
        $material= $this->input->post('material');
        $this->load->model('autores_model');
        $autores_acervo = $this->autores_model->lista_autores_material($material);        
        $autores_Array = array();
        foreach ($autores_acervo as $autor_acervo) {
            array_push($autores_Array, $autor_acervo);
        }
       echo json_encode(array("data" => $autores_Array));
    }
       
    
    function listar_sem_autores_acervo() {

        $this->load->model('autores_model');
        $autores = $this->autores_model->lista_sem_autores_acervo();        
        $autoresArray = array();
        foreach ($autores as $autor) {
            array_push($autoresArray, $autor);
        }
        echo json_encode(array("data" => $autoresArray));
            }  
    
    function pegarId() {
       
        $this->load->model('acervo_model');
        $acervos = $this->acervo_model->pegaId();
        $acervos_Array = array();
           foreach ($acervos as $acervo){
           array_push($acervos_Array, $acervo);
           }
           echo json_encode(array("data" => $acervos_Array));
    }
            
}





