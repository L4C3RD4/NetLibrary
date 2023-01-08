<?php

class Admin extends CI_Controller {

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
            $perfil = $acesso[0]->perfil;   
           
            
            if(($acesso[0]->perfil=="bibliotecario")||($acesso[0]->perfil=="auxiliar")){
                
                $this->load->model('bibliotecarios_model');
                $resultado = $this->bibliotecarios_model->retorna_biblioteca($usuario);
                $biblioteca = $resultado[0]->biblioteca;
                $email = $this->input->post('email');
                $descricao = $resultado[0]->descricao;
//                $resultado = $this->emprestimo_model->lista_emprestimos($usuario);
                $this->load->model('configuracoes_model');
                $resultado = $this->configuracoes_model->busca_configuracoes($biblioteca);
                $qtd_mat_aluno = $resultado[0]->qtd_mat_aluno;
                $qtd_mat_prof = $resultado[0]->qtd_mat_prof;
                $dias_empres_aluno = $resultado[0]->dias_empres_aluno;
                $dias_empres_prof = $resultado[0]->dias_empres_prof;
                $qtd_mat_funcionario = $resultado[0]->qtd_mat_funcionario;
                $qtd_mat_comunidade = $resultado[0]->qtd_mat_comunidade;
                $dias_empres_funcionario = $resultado[0]->dias_empres_funcionario;
                $dias_empres_comunidade = $resultado[0]->dias_empres_comunidade;
               

                 $sess_array = array(
                'idusuario' => $acesso[0]->idusuario,
                'nome' => $acesso[0]->nome,
                'email' => $acesso[0]->email,                
                'perfil' => $acesso[0]->perfil, 
                'biblioteca' => $biblioteca, 
                'descricao' => $descricao, 
                'endereco' => $acesso[0]->endereco,
                'celular' => $acesso[0]->celular,
                'qtd_mat_aluno' => $qtd_mat_aluno,
                'qtd_mat_prof' => $qtd_mat_prof,
                'dias_empres_aluno' => $dias_empres_aluno,
                'dias_empres_prof' => $dias_empres_prof,
                'qtd_mat_funcionario' => $qtd_mat_funcionario,
                'qtd_mat_comunidade' => $qtd_mat_comunidade,
                'dias_empres_funcionario' => $dias_empres_funcionario,
                'dias_empres_comunidade' => $dias_empres_comunidade,
                'data' => $acesso[0]->data,                     
                'hora' => $acesso[0]->hora,                     
                'host' => $acesso[0]->host );
                
                 
            }else{
                
                
                
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
            
            //atualiza a data e a hora do Ãºltimo login
            $usuario = $acesso[0]->idusuario;
            $data = date("Y-m-d");
            $hora = date("h:i");
            $host = $_SERVER["REMOTE_ADDR"];
            
            $this->load->model("login_model");
	    $atualiza = $this->login_model->atualiza_ultimo_login($usuario,$data,$hora,$host);
            
            redirect('index_controller');
        } else {
            redirect('admin');
            
        }
                
        
    }

    function logout() {

        //registra o log da aÃ§Ã£o
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("login",$usuario,$usuario." - ".$nome,"Fez logout no sistema!");
            
        $this->session->sess_destroy();
        redirect("pesquisa_controller");                           

    }
    
     
    
}
