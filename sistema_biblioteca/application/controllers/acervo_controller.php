<?php

class Acervo_controller extends CI_Controller {

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
                $this->template->write_view('content','bibliotecario/acervo_view',"",FALSE);
                $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        //$this->template->write_view('content','gestor/acervo_view',"",FALSE);
                        $this->template->write_view('content','bibliotecario/acervo_view',"",FALSE);
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
  
   
     function cadastrar_acervo() {
        $idacervo = isset($id) ? $id : NULL;
        $titulo= $this->input->post('titulo');
        
        if(($titulo==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $tipo= $this->input->post('tipo');
        $local= $this->input->post('local');
        $editora= $this->input->post('editora');
        $edicao = $this->input->post('edicao');
        $volume = $this->input->post('volume');
        $tipo_material = $this->input->post('tipo_material');
        $anopublicacao= $this->input->post('ano_publicacao');
        $assunto = $this->input->post('assunto');
        $genero = $this->input->post('genero');
        $resumo = $this->input->post('resumo_informacoes');
        $isbn = $this->input->post('isbn');
        $idioma = $this->input->post('idioma');
        $serie_colecao = $this->input->post('serie_colecao');
        $detalhes = $this->input->post('detalhes');
        $numeropg = $this->input->post('num_paginas');
        $status = $this->input->post('status');
        
        $this->load->model('acervo_model');   
        $inserir = $this->acervo_model->cadastra_acervo($idacervo,$titulo,$tipo,$local,$editora,$edicao,$volume,$tipo_material,$anopublicacao,$assunto,$genero,$resumo,$isbn,$idioma,$serie_colecao,$detalhes,$numeropg,$status);	
        if($inserir){
            
            //descibrur o id do Ãºltimo livro
            $busca_idacervo = $this->acervo_model->busca_idacervo($titulo,$tipo,$local);
            $idacervo = $busca_idacervo[0]->max_idacervo;
            $autores = $this->input->post('autores');
            $principal = $this->input->post('principal');
            $autores = explode(";",$autores);
            $sql = "insert into autores_acervo values ( ";
            foreach($autores as $autor){
            if($autor!=""){    
            $sql .= $autor.",".$idacervo.",";
            if($principal==$autor){
		$sql .="1),(";
            }else{
		$sql .="0),(";
            }
            }
            }
            $sql = substr($sql,0,strlen($sql)-2);
            $sql .=";";
            //echo $sql;
            
            $query = $this->db->query($sql);     
            if($query){
                $mensagem = array('tipo' => 'success');
                echo json_encode($mensagem);
            }else{
               $mensagem = array('tipo' => 'errorAut');
                echo json_encode($mensagem); 
            }
                    
             
        }else{
             $mensagem = array('tipo' => 'errorAce');
             echo json_encode($mensagem);
        }
        }
    }
//     function CadastrarAcervo() {
//        $idacervo = isset($id) ? $id : NULL;
//        $titulo= $this->input->post('titulo');
//        $tipo= $this->input->post('tipo');
//        $local= $this->input->post('local');
//        $editora= $this->input->post('editora');
//        $anopublicacao= $this->input->post('ano_publicacao');
//        $assunto = $this->input->post('assunto');
//        $genero = $this->input->post('genero');
//        $resumo = $this->input->post('resumo_informacoes');
//        $isbn = $this->input->post('isbn');
//        $idioma = $this->input->post('idioma');
//        $serie_colecao = $this->input->post('serie_colecao');
//        $detalhes = $this->input->post('detalhes');
//        $numeropg = $this->input->post('num_paginas');
//
//        
//        $this->load->model('acervo_model');   
//        $inserir = $this->acervo_model->cadastra_acervo($idacervo,$titulo,$tipo,$local,$editora,$anopublicacao,$assunto,$genero,$resumo,$isbn,$idioma,$serie_colecao,$detalhes,$numeropg);	
//        if($inserir){
//           $mensagem = array('tipo' => 'success');
//             echo json_encode($mensagem);
//            
//        }
//        else{
////             $mensagem = array('tipo' => 'error');
////             echo json_encode($mensagem);
//        }
//    }
    
    function pegarId() {
       
        $this->load->model('acervo_model');
        $acervos = $this->acervo_model->pegaId();
        $acervos_Array = array();
           foreach ($acervos as $acervo){
           array_push($acervos_Array, $acervo);
           }
           echo json_encode(array("data" => $acervos_Array));
                 
            
    }

  function listar_acervos() {
        $tipo_pesquisa= $this->input->post('tipo_pesquisa');
        $chave= $this->input->post('chave');
        $this->load->model('acervo_model');
        $acervos = $this->acervo_model->listaacervo($tipo_pesquisa,$chave);        
        $acervosArray = array();
        foreach ($acervos as $acervo) {
            array_push($acervosArray, $acervo);
        }
        echo json_encode(array("data" => $acervosArray));
    }
    
  function listar_acervos_emprestimo() {
        $tipo_pesquisa= $this->input->post('tipo_pesquisa');
        $chave= $this->input->post('chave');
        $session_data = $this->session->userdata('logged_in');
        $biblioteca = $session_data['biblioteca'];
        $this->load->model('acervo_model');
        $acervos = $this->acervo_model->listaacervo_emprestimo($tipo_pesquisa,$chave,$biblioteca);        
        $acervosArray = array();
        foreach ($acervos as $acervo) {
            if($acervo->status==1){
                $acervo->status_2="Disponível";
            }else{
                if($acervo->status==0){
                $acervo->status_2="Emprestado";
            }else{
                 $acervo->status_2="Indisponível";
            }
            }
            array_push($acervosArray, $acervo);
        }
        echo json_encode(array("data" => $acervosArray));
    }
    
    function listar_acervos_sem_parametro() {

        $this->load->model('acervo_model');
        $acervos = $this->acervo_model->listaacervo_sem_paremetro();        
        $acervosArray = array();
        foreach ($acervos as $acervo) {
            array_push($acervosArray, $acervo);
        }
        echo json_encode(array("data" => $acervosArray));
    }
    
     function alterarAcervo() {
         
        $idacervo= $this->input->post('idacervo');
        $titulo= $this->input->post('titulo');
        
        if(($titulo==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $tipo= $this->input->post('tipo');
        $local= $this->input->post('local');
        $editora= $this->input->post('editora');
        $edicao= $this->input->post('edicao');
        $volume = $this->input->post('volume');
        $tipo_material = $this->input->post('tipo_material');
        $anopublicacao= $this->input->post('ano_publicacao');
        
        $assunto = $this->input->post('assunto');
        $genero = $this->input->post('genero');
        $resumo = $this->input->post('resumo_informacoes');
        $isbn = $this->input->post('isbn');
        $idioma = $this->input->post('idioma');
        $serie_colecao = $this->input->post('serie_colecao');
        $detalhes = $this->input->post('detalhes');
        $numeropg = $this->input->post('num_paginas');
      
        
        $this->load->model('acervo_model');
        
        $inserir = $this->acervo_model->alteraAcervo($idacervo,$titulo,$tipo,$local,$editora,$edicao,$volume,$tipo_material,$anopublicacao,$assunto,$genero,$resumo,$isbn,$idioma,$serie_colecao,$detalhes,$numeropg);	
            if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
              
             $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo",$idacervo,$usuario." - ".$nome,"Alterou registro ".$idacervo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }

    function excluir_acervo() {
        $idacervo = $this->input->post('idacervo');        
        $this->load->model('acervo_model');        
        $inserir = $this->acervo_model->exclui_acervo($idacervo);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
             
       $session_data = $this->session->userdata('logged_in');
      $usuario = $session_data["idusuario"];
      $nome = $session_data["nome"];        
      
       require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo",$idacervo,$usuario." - ".$nome,"Apagou registro ".$idacervo." no sistema!");
         
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    
        function listar_sem_acervo() {

        $this->load->model('acervo_model');
        $autores = $this->acervo_model->lista_sem_acervo();        
        $autoresArray = array();
        foreach ($autores as $autor) {
            array_push($autoresArray, $autor);
        }
        echo json_encode(array("data" => $autoresArray));
    }
     function listar_editoras(){
        $this->load->model('acervo_model');
        $editoas = $this->acervo_model->listar_editoras();        
        $editoasArray = array();
        foreach ($editoas as $editora) {
           array_push($editoasArray, $editora);
        }
        echo json_encode(array("data" => $editoasArray));
        
    }
    
}



 