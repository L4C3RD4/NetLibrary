<?php

class Bibliotecas_controller extends CI_Controller {

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
                    $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'gestor/bibliotecas_view', "", FALSE);
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

     function cadastrar_biblioteca() {
        $idbiblioteca = isset($id) ? $id : NULL;
        $descricao= $this->input->post('descricao');
        $logradouro= $this->input->post('logradouro');
        $complemento= $this->input->post('complemento');
        $bairro= $this->input->post('bairro');
        $municipio= $this->input->post('municipio');
        $cep = $this->input->post('cep');
        $email = $this->input->post('email');
        $telefone = $this->input->post('telefone');
        $observacoes = $this->input->post('observacoes');
        
        $this->load->model('bibliotecas_model');
        
        $inserir = $this->bibliotecas_model->cadastra_biblioteca($idbiblioteca,$logradouro,$descricao,$complemento,$bairro,$municipio,$cep,$email,$telefone,$observacoes);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
            /*LOG*/
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome_usuario = $session_data["nome"];          
            $resposta = $this->bibliotecas_model->retorna_idbiblioteca($descricao,$logradouro);
            $idbiblioteca = $resposta[0]->idbiblioteca;
            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("bibliotecas",$idbiblioteca,$usuario." - ".$nome_usuario," cadastrou a biblioteca  ".$idbiblioteca." - ".$descricao." no sistema!");

             
        }else{
             $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
//    Listar os dados na Tabela
  function listar_bibliotecas() {

        $this->load->model('bibliotecas_model');
        $bibliotecas = $this->bibliotecas_model->listabibliotecas();        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
    }
    
    //Atualizar dados da tabela biblioteca
     function alterar_biblioteca() {
        //$idopcao = $this->input->post('idopcao');
        $idbiblioteca = $this->input->post('idbiblioteca');
        $descricao= $this->input->post('descricao');
        $logradouro= $this->input->post('logradouro');
        $complemento= $this->input->post('complemento');
        $bairro= $this->input->post('bairro');
        $municipio= $this->input->post('municipio');
        $cep = $this->input->post('cep');
        $email = $this->input->post('email');
        $telefone = $this->input->post('telefone');
        $observacoes = $this->input->post('observacoes');
        
        $this->load->model('bibliotecas_model');
        
        $inserir = $this->bibliotecas_model->altera_biblioteca($idbiblioteca,$logradouro,$descricao,$complemento,$bairro,$municipio,$cep,$email,$telefone,$observacoes);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("biblioteca",$idbiblioteca,$usuario." - ".$nome,"Alterou a biblioteca ".$idbiblioteca."-".$descricao." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
//    Excluir dados da Tabela Biblioteca
    function excluir_biblioteca() {
        $idbiblioteca = $this->input->post('idbiblioteca');        
		$dados_exclusao = $this->input->post('dados_exclusao');        

        $this->load->model('bibliotecas_model');        
        $inserir = $this->bibliotecas_model->exclui_biblioteca($idbiblioteca);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];   
        
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("biblioteca",$idbiblioteca,$usuario." - ".$nome,"Apagou a biblioteca ".$dados_exclusao." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
     function listarbibliotecas(){
        $this->load->model('bibliotecas_model');
        $bibliotecas = $this->bibliotecas_model->listabibliotecas_rel();        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
    }
    function retorna_biblioteca(){
        $idbiblioteca = $this->input->post('biblioteca');  
        $this->load->model('bibliotecas_model');
        $bibliotecas = $this->bibliotecas_model->retorna_biblioteca($idbiblioteca);
          $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray)); 
        
    }
    
}

