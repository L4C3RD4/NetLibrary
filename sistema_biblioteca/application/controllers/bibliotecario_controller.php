<?php

class Bibliotecario_controller extends CI_Controller {

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
                        $this->template->write_view('content', 'gestor/bibliotecario_view', "", FALSE);
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

   function pesquisar() {

     $chave_pesquisa = $this->input->post('chave_pesquisa');
     $filtro_perfil = $this->input->post('filtro_perfil');
        $this->load->model('usuarios_model');
        $pesquisa = $this->usuarios_model->pesquisa_usuario($chave_pesquisa,$filtro_perfil);   
       
        $pesquisaArray = array();
        foreach ($pesquisa as $search) {
            array_push($pesquisaArray, $search);
        }
        echo json_encode(array("data" => $pesquisaArray));
        
    }
   
    function listagem_geral() {

    $this->load->model('bibliotecarios_model');
    $bibliotecarios = $this->bibliotecarios_model->listagem_geral();   
    //var_dump($pesquisa);
    $bibliotecariosArray = array();
        foreach ($bibliotecarios as $bibliotecario) {
            $bibliotecario->data_inicio2 = strftime("%d/%m/%Y", strtotime($bibliotecario->data_inicio));
            if(($bibliotecario->data_termino!=null)&&($bibliotecario->data_termino!="0000-00-00")){
                $bibliotecario->data_termino2 = strftime("%d/%m/%Y", strtotime($bibliotecario->data_termino));
            }else{
                $bibliotecario->data_termino2 = "profissional ainda em atuação";
            }            
            
            array_push($bibliotecariosArray, $bibliotecario);
        }
        echo json_encode(array("data" => $bibliotecariosArray));
        
    }
    
        function listar_sem_acervo() {

     $this->load->model('bibliotecarios_model');
        $bibliotecas = $this->bibliotecarios_model->lista_sem_acervo();        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
  
    }
        
    
      
    function cadastrar_bibliotecario(){
          $idbibliotecario = isset($idbibliotecario) ? $idbibliotecario : NULL;
        $biblioteca = $this->input->post('biblioteca');
        $profissional = $this->input->post('profissional');
        $data_inicio = $this->input->post('data_inicio');
        $horario_trabalho = $this->input->post('horario_trabalho');
        $observacoes = $this->input->post('observacoes');
        
        
         if(($biblioteca==null)||($profissional==null)||($data_inicio==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
         $this->load->model('bibliotecarios_model');
        $inserir = $this->bibliotecarios_model->cadastrar_bibliotecario($idbibliotecario,$biblioteca,$profissional,$data_inicio,$horario_trabalho,$observacoes);	 
        if($inserir){
          $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
              /*LOG*/
            $this->load->model('bibliotecarios_model');
            $resposta = $this->bibliotecarios_model->busca_id($biblioteca,$profissional);
            $idcadastrado = $resposta[0]->idbibliotecario;
            
            $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome_usuario = $session_data["nome"];        

            require_once(APPPATH."libraries/Logs.php");
            $log = new Logs();
            $log->inserirLog("bibliotecarios",$idcadastrado,$usuario." - ".$nome_usuario," atribuiu o bibliotecário  ".$idcadastrado." no sistema!");

          
          
      }else{
   
              $mensagem = array('tipo' => 'erro');
                echo json_encode($mensagem);
      }
        }
        
    }
    
        function excluirbibliotecario() {
        
        $idbibliotecario = $this->input->post('idbibliotecario');     
        $dados = $this->input->post('dados');     
        $this->load->model('bibliotecarios_model');   
        $deletar_bib = $this->bibliotecarios_model->excluibibliotecario($idbibliotecario);	
        if($deletar_bib){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             //LOG
             $this->load->model('bibliotecarios_model');
             $session_data = $this->session->userdata('logged_in');
            $usuario = $session_data["idusuario"];
            $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("bibliotecarios",$idbibliotecario,$usuario." - ".$nome,"Apagou o bibliotecário ".$dados." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    function alterarBibliotecario() {

     
     $idbibliotecario = $this->input->post('idbibliotecario');
     $data_inicio = $this->input->post('data_inicio');
     $data_termino = $this->input->post('data_termino');
     $horario_trabalho = $this->input->post('horario_trabalho');
     $observacoes = $this->input->post('observacoes');
        
        
        if(($idbibliotecario==null)||($data_inicio==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $this->load->model('bibliotecarios_model');
        $alterar_bibliotecario = $this->bibliotecarios_model->alterabib($idbibliotecario,$data_inicio,$horario_trabalho,$data_termino,$observacoes);
        
        if ($alterar_bibliotecario) {
            $mensagem = array('tipo' => 'success');
            echo json_encode($mensagem);
            
             $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("bibliotecarios",$idbibliotecario,$usuario." - ".$nome,"Alterou o bibliotecário ".$idbibliotecario." no sistema!");
            
            
                       
        } else {
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }
        }
    }
    
    
  function retornar_bibliotecario() {
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data['idusuario'];
        $email = $session_data['email'];
        $descricao = $session_data['descricao'];
        $biblioteca = $session_data['biblioteca'];
        $this->load->model('bibliotecarios_model');        
        $acervos = $this->bibliotecarios_model->retorna_bibliotecario($usuario,$biblioteca,$email,$descricao);        
        //var_dump($acervos);
        $acervosArray = array();
        foreach ($acervos as $acervo) {
            array_push($acervosArray, $acervo);
        }
        echo json_encode(array("data" => $acervosArray));
    }

}
