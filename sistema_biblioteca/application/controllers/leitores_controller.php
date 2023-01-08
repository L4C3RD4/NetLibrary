<?php

class Leitores_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {
           
      if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                    $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                    $this->template->write_view('content', 'bibliotecario/leitores_view', "", FALSE);
                    $this->template->render();;
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
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

    //Cadastrar Leitores
     function cadastrar_leitor() {
        //$idopcao = $this->input->post('idopcao');
        $idleitor = isset($id) ? $id : NULL;
        $nome= $this->input->post('nome');
        $cpf= $this->input->post('cpf');
        $serie= $this->input->post('serie');
        $logradouro= $this->input->post('logradouro');
        $complemento= $this->input->post('complemento');
        $bairro= $this->input->post('bairro');
        $municipio= $this->input->post('municipio');
        $cep = $this->input->post('cep');
        $matricula = $this->input->post('matricula');
        $celular = $this->input->post('celular');
        $email = $this->input->post('email');
        $senha= $this->input->post('senha');
        $session_data = $this->session->userdata('logged_in');
        $nome_usuario = $session_data['nome'];
        $biblioteca = $session_data['biblioteca'];
        $data = date("Y-m-d");

         if(($nome==null)||($cep==null)||($logradouro==null)||($municipio==null)||($celular==null)||($email==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{

        $this->load->model('leitores_model');
        
        $inserir = $this->leitores_model->cadastra_leitor($idleitor,$nome,$cpf,$serie,$logradouro,$complemento,$bairro,$municipio,$cep,$matricula,$celular,$email,$nome_usuario,$data,$biblioteca);	
        
        
          if($inserir){
            $resultado= $this->leitores_model->busca_id($nome,$email);
            
           $leitor=$resultado[0]->idleitor;
       
           $senha= md5($senha);
           $perfil= $this->input->post('perfil');
           $this->load->model('login_leitor_model');
     $inserir= $this->login_leitor_model->cadastrar_login($leitor,$senha,$perfil);
          
     if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
             //LOG
             
                $this->load->model('leitores_model');
                $resposta = $this->leitores_model->busca_id($nome, $email);
                $idcadastrado = $resposta[0]->idleitor;

                $session_data = $this->session->userdata('logged_in');
                $usuario = $session_data["idusuario"];
                $nome_usuario = $session_data["nome"];

                require_once(APPPATH . "libraries/Logs.php");
                $log = new Logs();
                $log->inserirLog("leitores", $idcadastrado, $usuario . " - " . $nome_usuario, " cadastrou o leitor  " . $idcadastrado . " - " . $nome . " no sistema!");
                
            }else{
             $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    
          }
            
        else{
            $mensagem = array('tipo' => 'erroC');
                echo json_encode($mensagem);
        }
        
        
        }
    
        
        
        
        
        
    }
//    Listar os dados na Tabela Leitores
  function listar_leitores() {

        $this->load->model('leitores_model');
        $session_data = $this->session->userdata('logged_in');
        $biblioteca = $session_data['biblioteca'];
        $leitores = $this->leitores_model->listaleitores($biblioteca);        
        $leitoresArray = array();
        foreach ($leitores as $leitor) {
            array_push($leitoresArray, $leitor);
        }
        echo json_encode(array("data" => $leitoresArray));
    }
  function listar_leitor() {
        $tipo_pesquisa_leitor= $this->input->post('tipo_pesquisa_leitor');
        $chave_leitor= $this->input->post('chave_leitor');
        $this->load->model('leitores_model');
        $leitores = $this->leitores_model->lista_leitor($tipo_pesquisa_leitor,$chave_leitor);        
        $leitoresArray = array();
        foreach ($leitores as $leitor) {
            array_push($leitoresArray, $leitor);
        }
        echo json_encode(array("data" => $leitoresArray));
    }
    
    //Atualizar dados da tabela Leitores
     function alterar_leitor() {
        //$idopcao = $this->input->post('idopcao');
        $idleitor = $this->input->post('idleitor');
        $nome= $this->input->post('nome');
        $cpf= $this->input->post('cpf');
        $serie= $this->input->post('serie');
        $logradouro= $this->input->post('logradouro');
        $complemento= $this->input->post('complemento');
        $bairro= $this->input->post('bairro');
        $municipio= $this->input->post('municipio');
        $cep = $this->input->post('cep');
        $celular = $this->input->post('celular');
        $matricula = $this->input->post('matricula');
        $email = $this->input->post('email');
        if(($nome==null)||($cep==null)||($logradouro==null)||($municipio==null)||($celular==null)||($email==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{        $this->load->model('leitores_model');
        
        $inserir = $this->leitores_model->altera_leitor($idleitor,$nome,$cpf,$serie,$logradouro,$complemento,$bairro,$municipio,$cep,$matricula,$celular,$email);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
             //LOG
             
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome = $session_data["nome"];

            require_once(APPPATH . "libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("leitores", $idleitor, $usuario . " - " . $nome, "Alterou o leitor " . $idleitor . " - " . $nome . " no sistema!");
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }
    
    function atualiza_login(){
    
        $this->load->model('login_leitor_model');
        $leitor = $this->input->post('leitor');
        $altpass = $this->input->post('altpass');
        $altsenha = md5($altpass);
        $atualizar = $this->login_leitor_model->alteraSenha($leitor,$altsenha);        
        if ($atualizar) {
            $mensagem = array('tipo' => 'success');
            echo json_encode($mensagem);
            
            
        } else {
            $mensagem = array('tipo' => 'error'); //comentado errorL
            echo json_encode($mensagem);
        }             
    }
//    Excluir dados da Tabela Leitor
    function excluir_leitor() {
        $idleitor = $this->input->post('idleitor');        
        $this->load->model('leitores_model');        
        $this->load->model('login_leitor_model');        
        $delete_log = $this->login_leitor_model->excluilog($idleitor);	
        $delete = $this->leitores_model->exclui_leitor($idleitor);	
        if($delete&&$delete_log){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
             //LOG
             
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome = $session_data["nome"];

            require_once(APPPATH . "libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("leitores", $idleitor, $usuario . " - " . $nome, "Apagou o leitor " . $idleitor . " - " . $nome . " no sistema!");
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    function pesquisar_matricula_ou_id(){

        $valor = $this->input->post('valor');
        $tipo = $this->input->post('tipo');
       
       $this->load->model('leitores_model');
        $leitores = $this->leitores_model->pesquisa_matricula_ou_id($valor, $tipo);
        
        $leitores_Array = array();
           foreach ($leitores as $leitor){
           array_push($leitores_Array, $leitor);
           }
           echo json_encode(array("data" => $leitores_Array));
       
    }
    function PegarId_leitor(){
        $cpf = $this->input->post('cpf');
        $email = $this->input->post('email');
        $this->load->model('leitores_model');
        $leitores = $this->leitores_model->PegarId_leitor($cpf,$email);
        $leitores_Array = array();
           foreach ($leitores as $leitor){
           array_push($leitores_Array, $leitor);
           }
           echo json_encode(array("data" => $leitores_Array));
        
    }
    
    function verifca_atrasos_leitor(){
        $idleitor = $this->input->post('idleitor');
        $this->load->model('leitores_model');
        $leitores = $this->leitores_model->verifca_atrasos_leitor($idleitor);
        $qtd = $leitores[0]->qtd;
        echo $qtd;
        
    
    }
}

