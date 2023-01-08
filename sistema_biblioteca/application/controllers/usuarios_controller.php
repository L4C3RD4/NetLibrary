<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios_controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');   
        error_reporting(-1);
	ini_set('display_errors', 1);
        
        if (!$this->session->userdata('logged_in')) {
//            redirect('login_controller');
        }
    }
    
    
    public function index(){

          if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                     $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                     $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'gestor/usuarios_view', "", FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                            $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                            $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                            $this->template->render();
                        }
                    }
                }
            }           
        else{
             redirect('login_controller');
        }
    
    }
    
        
      
    function cadastrar_usuario() {
      
        $idusuario = isset($idusuario) ? $idusuario : NULL;
        $nome = $this->input->post('nome');
        $endereco = $this->input->post('endereco');
        $celular = $this->input->post('celular');
        $email = $this->input->post( 'email');
     
        /*LOG*/
        $senha= $this->input->post('senha');
        $this->load->model('usuarios_model');
        $inserir = $this->usuarios_model->cadastrar_usuario($idusuario,$nome,$endereco,$celular,$email);	
      
   
        if($inserir){
            $resultado= $this->usuarios_model->busca_id($nome,$email);
            
           $usuario=$resultado[0]->idusuario;
       
           $senha= md5($senha);
           $perfil=$this->input->post( 'perfil');
           $this->load->model('login_model');
            $inserir= $this->login_model->cadastrar_login($usuario,$senha,$perfil);
          if($inserir){ 
              $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
                         
            /*LOG*/
            $this->load->model('usuarios_model');
            $resposta = $this->usuarios_model->busca_id($nome,$email);
            $idcadastrado = $resposta[0]->idusuario;
            
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome_usuario = $session_data["nome"];        

            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("usuarios",$idcadastrado,$usuario." - ".$nome_usuario," cadastrou o usuário  ".$idcadastrado." - ".$nome." no sistema!");

        
//        $result = $this->usuarios_model->busca_idusuario($nome,$email);
//        $id = $result->max_idusuario;
//        $session_data = $this->session->userdata('logged_in');
//        $usuario = $session_data["idusuario"];
//        $nome = $session_data["nome"];        
//       
//        require_once(APPPATH."libraries/Logs.php");
//        $log = new Logs();
//        $log->inserirLog("usuarios",$idusuario,$usuario." - ".$nome,"Cadastrou um usuário ".$id." no sistema!");
//            
             
          } 
             else {  
              $mensagem = array('tipo' => 'erroL');
                echo json_encode($mensagem);
                
             }
    
          }
            
        else{
            $mensagem = array('tipo' => 'erroC');
                echo json_encode($mensagem);
        }
   // } else {
   // echo 'senhas não são iguais';
   // }*/
    }
    
    function bloquear_usuarios() {
                
        $idusuario = $this->input->post('idusuario');     
        $status = $this->input->post('status');     
        $dados_usuario = $this->input->post('dados_usuario');     
        $this->load->model('usuarios_model');   
        $bloquear = $this->usuarios_model->bloqueia_usuario($idusuario,$status);	
        if($bloquear){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
            /*LOG*/
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome = $session_data["nome"];        

            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("usuarios",$idusuario,$usuario." - ".$nome,"Bloqueou o acesso do usuário : ".$dados_usuario." no sistema!");

             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
function alterarUsuarios() {

     
     $idusuario = $this->input->post('idusuario');
        $nome = $this->input->post('nome');
        $password = $this->input->post('senha');
        $senha= md5($password);
        $email = $this->input->post('email');
//        $this->load->model('login_model');
//        $alterar_senha = $this->login_model->alterasenha($idusuario,$senha);
        $endereco = $this->input->post('endereco');
        $celular = $this->input->post('celular');
        $this->load->model('usuarios_model');
        $alterar = $this->usuarios_model->alterausuarios($idusuario,$nome,$endereco,$celular,$email);
        if ($alterar) {
            $mensagem = array('tipo' => 'success');
            echo json_encode($mensagem);
            
        /*LOG*/    
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("usuarios",$idusuario,$usuario." - ".$nome,"Alterou o usuário id: ".$idusuario." no sistema!");
            
                       
        } else {
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }
    }
    
    function atualiza_login(){
    
        $this->load->model('login_model');
        $idusuario = $this->input->post('idusuario');
        $altpass = $this->input->post('altpass');
        //secho $altpass;
        $altsenha = md5($altpass);
//        echo $altsenha;
        $atualizar = $this->login_model->alteraSenha($idusuario,$altsenha);        
        if ($atualizar) {
            $mensagem = array('tipo' => 'success');
            echo json_encode($mensagem);
            
            /*LOG*/
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome = $session_data["nome"];        

            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("usuarios",$idusuario,$usuario." - ".$nome,"Atualizou o login do usuário id: ".$idusuario." no sistema!");

            
        } else {
            $mensagem = array('tipo' => 'error'); //comentado errorL
            echo json_encode($mensagem);
        }             
    }
    
    function atualiza_proprio_login(){
    
        /*LOG*/
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        

        
        $this->load->model('login_model');
        $nova_senha = $this->input->post('altpass');
        $senha_atual = $this->input->post('senha_atual');
        $nova_senha = md5($nova_senha);
        $senha_atual = md5($senha_atual);

        $atualizar = $this->login_model->atualiza_proprio_login($usuario,$nova_senha,$senha_atual);        
        if ($atualizar) {
            $mensagem = array('tipo' => 'success');
            echo json_encode($mensagem);
            
            
            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("usuarios",$usuario,$usuario." - ".$nome,"Atualizou o login do usuário id: ".$usuario." no sistema!");

            
        } else {
            $mensagem = array('tipo' => 'error'); //comentado errorL
            echo json_encode($mensagem);
        }             
    }
    
function listar_usuarios() {

        $this->load->model('usuarios_model');
        $usuarios = $this->usuarios_model->listausuarios();        
        $setoresArray = array();
        foreach ($usuarios as $cargo) {
            array_push($setoresArray, $cargo);
        }
        echo json_encode(array("data" => $setoresArray));
}

function lista_profissionais() {

        $this->load->model('usuarios_model');
        $usuarios = $this->usuarios_model->lista_profissionais();        
        $setoresArray = array();
        foreach ($usuarios as $cargo) {
            array_push($setoresArray, $cargo);
        }
        echo json_encode(array("data" => $setoresArray));
}
    
    
}  


