<?php

class Login_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {
        $this->load->view('login_view');
    }

    function verifica_login() {

        $email = $this->input->post('email');
        $senha = md5($this->input->post('senha'));
        
        $this->load->model('login_model');
        $acesso = $this->login_model->verifica_login($email, $senha);
     
        if ($acesso) {
            
            $usuario = $acesso[0]->idusuario;
            $nome = $acesso[0]->nome;
                
            if(($acesso[0]->perfil=="bibliotecario")||($acesso[0]->perfil=="auxliar")){
                
                $this->load->model('bibliotecarios_model');
                $resultado = $this->bibliotecarios_model->retorna_biblioteca($usuario);
                echo resultado;
                $biblioteca = $resultado[0]->biblioteca;
                $email = $resultado[0]->email;
                $descricao = $resultado[0]->descricao;
//$result = $result->bibliotecarios_model->retorna_bibliotecario($usuario,$biblioteca,$email,$descricao);
               
                
                echo $biblioteca."-".$descricao;
                 $sess_array = array(
                'idusuario' => $acesso[0]->idusuario,
                'nome' => $acesso[0]->nome,
                'email' => $acesso[0]->email,                
                'perfil' => $acesso[0]->perfil, 
                'biblioteca' => $biblioteca, 
                'descricao' => $descricao, 
                'endereco' => $acesso[0]->endereco,
                'celular' => $acesso[0]->celular,
                'data' => $acesso[0]->data,                     
                'hora' => $acesso[0]->hora,                     
                'host' => $acesso[0]->host );
                
                 
            }
            else{
                
                
                
                 $sess_array = array(
                'idusuario' => $acesso[0]->idusuario,
                'nome' => $acesso[0]->nome,
                'email' => $acesso[0]->email,                
                'perfil' => $acesso[0]->perfil,                
                'endereco' => $acesso[0]->endereco,
                'celular' => $acesso[0]->celular,
                'data' => $acesso[0]->data,                     
                'hora' => $acesso[0]->hora,                     
                'host' => $acesso[0]->host                    
            );
            }
            
           
            
            $this->session->set_userdata('logged_in', $sess_array);
            
            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("login",$usuario,$usuario." - ".$nome,"Fez login no sistema!");
        
            
            redirect('index_controller');
        } else {
            redirect('login_controller');
            
        }
    }

    function logout() {

        //registra o log da ação
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
        $perfil = $session_data["perfil"];        
       
        
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        if(($perfil=="bibliotecario")|| ($perfil=="gestor")){
            $log->inserirLog("login",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
           
        }else{
             $log->inserirLog("login_leitor",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
        }
        
            
        $this->session->sess_destroy();
        redirect("login_controller");                           

    }
    
}
