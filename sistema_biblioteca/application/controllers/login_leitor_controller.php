<?php

class Login_leitor_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {
        $this->load->view('leitores/login_leitores_view');
    }

    function verifica_login() {

        $email = $this->input->post('email');
        $senha = md5($this->input->post('senha'));
    //    $perfil= $this->input->post('perfil');
 
        $this->load->model('login_leitor_model');
        $acesso = $this->login_leitor_model->verifica_login($email,$senha);
     
        if ($acesso) {

             $sess_array = array(
                'idusuario' => $acesso[0]->idleitor,
                'nome' => $acesso[0]->nome,              
                'perfil' => $acesso[0]->perfil,                
                'data' => $acesso[0]->data,                     
                'hora' => $acesso[0]->hora,                     
                'host' => $acesso[0]->host                    
            );
            //LOG
             
             $this->session->set_userdata('logged_in', $sess_array);
                         $nome = $sess_array["nome"]; 
                         $idusuario= $acesso[0]->idleitor; 
            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("login_leitor",$idusuario,$usuario." - ".$nome,"Fez login no sistema!");
        
            
            $this->session->set_userdata('logged_in', $sess_array);
            
            $usuario = $acesso[0]->idleitor;
            $data = date("Y-m-d");
            $hora =  date("H:i");
            $host = $_SERVER["REMOTE_ADDR"];
            $this->load->model("login_leitor_model");
	    $atualiza = $this->login_leitor_model->atualiza_ultimo_login($usuario,$data,$hora,$host);
            
            redirect('index_controller');
        } else {
            redirect('login_leitor_controller');
              
    }

}

 function busca_perfil_leitor(){
        
        $leitor = $this->input->post('leitor');
        $this->load->model('login_leitor_model');
        $perfil = $this->login_leitor_model->busca_perfil_leitor($leitor);
        echo $perfil[0]->perfil;
        
        
    }
    
    function logout() {

        $session_data = $this->session->userdata('logged_in');
        $perfil = $session_data['perfil'];
        $controller_saida = "";
        if(($perfil=="aluno")||($perfil=="professor")){
            $controller_saida = "login_leitor_controller";
        }else{
            $controller_saida = "admin";
        }
        
        //registra o log da ação
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        
        if(($perfil=="bibliotecario")|| ($perfil=="bibliotecario")){
            $log->inserirLog("login",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
           
        }else{
             $log->inserirLog("login_leitor",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
        }            
        $this->session->sess_destroy();
        redirect($controller_saida);                           

    }
    
        }
