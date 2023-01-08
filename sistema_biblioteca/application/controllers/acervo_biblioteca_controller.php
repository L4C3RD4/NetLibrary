<?php

class Acervo_biblioteca_controller extends CI_Controller {

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
                $this->template->write_view('content','bibliotecario/acervo_biblioteca_view',"",FALSE);
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

     function cadastrar_acervo_biblioteca() {
        $idacervo = isset($id) ? $id : NULL;
        $biblioteca= $this->input->post('biblioteca');
        $material= $this->input->post('material');
        
         if(($biblioteca==null)||($material==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $codigo_exemplar= $this->input->post('codigo_exemplar');
        $numero_exemplar= $this->input->post('numero_exemplar');
        $data_aquisicao= $this->input->post('data_aquisicao');
        $tipo_aquisicao= $this->input->post('tipo_aquisicao');
        $data_registro = $this->input->post('data_registro');
        $baixa= $this->input->post('baixa');
        $data_baixa= $this->input->post('data_baixa');
        $motivo_baixa = $this->input->post('motivo_baixa');
        $observacoes = $this->input->post('observacoes');
//        $qtd_total_exemplares= $this->input->post('qtd_total_exemplares');
        $status= $this->input->post('status');
        $this->load->model('acervo_biblioteca_model');
        
        $inserir = $this->acervo_biblioteca_model->cadastra_acervo_biblioteca($idacervo,$biblioteca,$material,$codigo_exemplar,$numero_exemplar,$data_aquisicao,$tipo_aquisicao,$data_registro,$baixa,$data_baixa,$motivo_baixa,$observacoes,$status);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
        }else{
             $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }

    function listar_acervo_bibliotecas() {
        $session_data = $this->session->userdata('logged_in');
        $biblioteca = $session_data["biblioteca"];
        $this->load->model('acervo_biblioteca_model');
        $acervo_bibliotecas = $this->acervo_biblioteca_model->lista_acervo_biblioteca($biblioteca);        
        $acervo_bibliotecasArray = array();
        foreach ($acervo_bibliotecas as $AcervoBiblioteca) {
               if($AcervoBiblioteca->status==1){
                $AcervoBiblioteca->status_2="Disponível";
            }else{
                if($AcervoBiblioteca->status==0){
                $AcervoBiblioteca->status_2="Emprestado";
            }else{
                 $AcervoBiblioteca->status_2="Indisponível";
            }
            }
            $AcervoBiblioteca->data_aquisicao2 = strftime("%d/%m/%Y", strtotime($AcervoBiblioteca->data_aquisicao));
            array_push($acervo_bibliotecasArray, $AcervoBiblioteca);
        }
        echo json_encode(array("data" => $acervo_bibliotecasArray));
    }
    

     function alterar_acervo_biblioteca() {
       
        $idacervo= $this->input->post('idacervo'); 
        $biblioteca= $this->input->post('biblioteca'); 
        $material= $this->input->post('material'); 
        
         if(($biblioteca==null)||($material==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $codigo_exemplar= $this->input->post('codigo_exemplar');
        $numero_exemplar= $this->input->post('numero_exemplar');
        $data_aquisicao= $this->input->post('data_aquisicao');
        $tipo_aquisicao= $this->input->post('tipo_aquisicao');
//        $qtd_total_exemplares= $this->input->post('qtd_total_exemplares');
        $data_registro = $this->input->post('data_registro');
        $baixa= $this->input->post('baixa');
        $data_baixa= $this->input->post('data_baixa');
        $motivo_baixa = $this->input->post('motivo_baixa');
        $observacoes = $this->input->post('observacoes');
        $status= $this->input->post('status');
        
        $this->load->model('acervo_biblioteca_model');
             
        $inserir = $this->acervo_biblioteca_model->altera_acervo_biblioteca($idacervo,$biblioteca,$material,$numero_exemplar,$codigo_exemplar,$data_aquisicao,$tipo_aquisicao,$data_registro,$baixa,$data_baixa,$motivo_baixa,$observacoes,$status);
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
               $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo_biblioteca",$idacervo,$usuario." - ".$nome,"Alterou registro ".$idacervo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }
     function alterar_status_acervo_biblioteca() {
       
        $idacervo= $this->input->post('idacervo'); 
        $biblioteca= $this->input->post('biblioteca'); 
        
        $this->load->model('acervo_biblioteca_model');
             
        $inserir = $this->acervo_biblioteca_model->altera_status_acervo_biblioteca($idacervo,$biblioteca);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo_biblioteca",$idacervo,$usuario." - ".$nome,"Alterou status registro ".$idacervo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
     function alterar_status_acervo_biblioteca_emprestimo() {
       
        $idacervo= $this->input->post('idacervo'); 
        $biblioteca= $this->input->post('biblioteca'); 
        
        $this->load->model('acervo_biblioteca_model');
             
        $inserir = $this->acervo_biblioteca_model->altera_status_acervo_biblioteca_emprestimo($idacervo);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
               $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo_biblioteca",$idacervo,$usuario." - ".$nome,"Alterou status registro ".$idacervo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
     function alterar_status_acervo_biblioteca_emprestimo_cadastrar() {
       
        $idacervo= $this->input->post('idacervo'); 
        $biblioteca= $this->input->post('biblioteca'); 
        
        $this->load->model('acervo_biblioteca_model');
             
        $inserir = $this->acervo_biblioteca_model->altera_status_acervo_biblioteca_emprestimo_cadastrar($idacervo);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
               $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo_biblioteca",$idacervo,$usuario." - ".$nome,"Alterou status registro ".$idacervo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
     function alterar_status_acervo_biblioteca_reserva_excluida() {
       
        $idacervo= $this->input->post('idacervo_biblioteca_ex'); 
        $biblioteca= $this->input->post('biblioteca_ex'); 
//        echo $idacervo;
        
        $this->load->model('acervo_biblioteca_model');
             
        $inserir = $this->acervo_biblioteca_model->alterar_status_acervo_biblioteca_reserva_excluida($idacervo,$biblioteca);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
               $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo_biblioteca",$idacervo,$usuario." - ".$nome,"Alterou status registro ".$idacervo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }

    function excluir_acervo_biblioteca() {
        $idacervo = $this->input->post('idacervo');        
        $this->load->model('acervo_biblioteca_model');        
        $inserir = $this->acervo_biblioteca_model->exclui_acervo_biblioteca($idacervo);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
               $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("acervo_biblioteca",$idacervo,$usuario." - ".$nome,"Apagou registro ".$idacervo." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
    
    function listar_sem_acervo() {

        $this->load->model('acervo_biblioteca_model');
        $acervo_bibliotecas = $this->acervo_biblioteca_model->lista_sem_acervo();        
        $acervo_bibliotecasArray = array();
        foreach ($acervo_bibliotecas as $acervo_biblioteca) {
            array_push($acervo_bibliotecasArray, $acervo_biblioteca);
        }
        echo json_encode(array("data" => $acervo_bibliotecasArray));
    }
    
    function pesquisar_codigo_ou_isbn(){
        $session_data = $this->session->userdata('logged_in');
        $valor = $this->input->post('valor');
        $tipo = $this->input->post('tipo');
        
        $biblioteca = $session_data['biblioteca'];
        $this->load->model('acervo_biblioteca_model');
        $acervo_bibliotecas = $this->acervo_biblioteca_model->pesquisar_codigo_ou_isbn($valor,$tipo,$biblioteca);        
        $acervo_bibliotecasArray = array();
        foreach ($acervo_bibliotecas as $acervo_biblioteca) {
            array_push($acervo_bibliotecasArray, $acervo_biblioteca);
        }
        echo json_encode(array("data" => $acervo_bibliotecasArray));
         
     }
    
    function alterar_status_reserva_atrasada(){
        $this->load->model('acervo_biblioteca_model');
        $acervo_bibliotecas = $this->acervo_biblioteca_model->altera_status_reserva_atrasada();        
        if($acervo_bibliotecas){
           $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        
    }
}

