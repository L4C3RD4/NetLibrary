<?php

class Configuracoes_controller extends CI_Controller {

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
                    $this->template->write_view('content','bibliotecario/configuracoes_view',"",FALSE);
                    $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'gestor/configuracoes_view', "", FALSE);
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
    //Cadastrar Configuração
     function cadastrar_configuracao() {
        //$idopcao = $this->input->post('idopcao');
        $idconfiguracoes = isset($id) ? $id : NULL;
        $biblioteca= $this->input->post('biblioteca');
        $dias_empres_aluno= $this->input->post('dias_empres_aluno');
        $qtd_mat_aluno= $this->input->post('qtd_mat_aluno');
        $dias_empres_prof= $this->input->post('dias_empres_prof');
        $qtd_mat_prof= $this->input->post('qtd_mat_prof');
        $dias_empres_funcionario= $this->input->post('dias_empres_funcionario');
        $qtd_mat_funcionario= $this->input->post('qtd_mat_funcionario');
        $dias_empres_comunidade= $this->input->post('dias_empres_comunidade');
        $qtd_mat_comunidade= $this->input->post('qtd_mat_comunidade');
        
        if(($biblioteca==null)||($dias_empres_aluno==null)||($qtd_mat_aluno==null)||($dias_empres_prof==null)||($qtd_mat_prof==null)||($dias_empres_funcionario==null)||($qtd_mat_funcionario==null)||($dias_empres_comunidade==null)||($qtd_mat_comunidade==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $this->load->model('configuracoes_model');
        
        $inserir = $this->configuracoes_model->cadastra_configuracao($idconfiguracoes,$biblioteca,$dias_empres_aluno,$qtd_mat_aluno,$dias_empres_prof,$qtd_mat_prof,$dias_empres_funcionario,$qtd_mat_funcionario,$dias_empres_comunidade,$qtd_mat_comunidade);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        //LOG
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];
        $biblioteca = $session_data["biblioteca"];
        $nome_biblioteca=$session_data["descricao"];       
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("configuracoes",$idconfiguracoes,$usuario." - ".$nome,"Cadastrou as configurações da biblioteca: ".$biblioteca."-".$nome_biblioteca." no sistema!");
            
        }else{
             $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }
//    Listar os dados na Tabela
  function listar_configuracoes() {

        $this->load->model('configuracoes_model');
        $configuracoes = $this->configuracoes_model->listaconfiguracoes();        
        $configuracoesArray = array();
        foreach ($configuracoes as $configuracao) {
            array_push($configuracoesArray, $configuracao);
        }
        echo json_encode(array("data" => $configuracoesArray));
    }
  function listar_configuracao() {
       $session_data = $this->session->userdata('logged_in');
        $biblioteca = $session_data['biblioteca'];
        $this->load->model('configuracoes_model');
        //$biblioteca= $this->input->post('biblioteca');
        $configuracoes = $this->configuracoes_model->listaconfiguracao($biblioteca);        
        $configuracoesArray = array();
        foreach ($configuracoes as $configuracao) {
            array_push($configuracoesArray, $configuracao);
        }
        echo json_encode(array("data" => $configuracoesArray));
    }
    
    //    Listar os dados na Tabela sem COnfigurações
  function listar_sem_configuracao() {

        $this->load->model('configuracoes_model');
        $bibliotecas = $this->configuracoes_model->lista_sem_configuracao();        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
    }
  function verfica_configuracao() {
        $biblioteca= $this->input->post('biblioteca_v');
        $this->load->model('configuracoes_model');
        $bibliotecas = $this->configuracoes_model->verfica_configuracao($biblioteca);   
        echo json_encode($bibliotecas);
    }
    
    //Atualizar dados da tabela Configuração
     function alterar_configuracao() {
        //$idopcao = $this->input->post('idopcao');
        $idconfiguracoes = $this->input->post('idconfiguracoes');
        $dias_empres_aluno= $this->input->post('dias_empres_aluno');
        $qtd_mat_aluno= $this->input->post('qtd_mat_aluno');
        $dias_empres_prof= $this->input->post('dias_empres_prof');
        $qtd_mat_prof= $this->input->post('qtd_mat_prof');
        $dias_empres_funcionario= $this->input->post('dias_empres_funcionario');
        $qtd_mat_funcionario= $this->input->post('qtd_mat_funcionario');
        $dias_empres_comunidade= $this->input->post('dias_empres_comunidade');
        $qtd_mat_comunidade= $this->input->post('qtd_mat_comunidade');
        
        if(($idconfiguracoes==null)||($dias_empres_aluno==null)||($qtd_mat_aluno==null)||($dias_empres_prof==null)||($qtd_mat_prof==null)||($dias_empres_funcionario==null)||($qtd_mat_funcionario==null)||($dias_empres_comunidade==null)||($qtd_mat_comunidade==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        
        $this->load->model('configuracoes_model');
        $inserir = $this->configuracoes_model->altera_configuracao($idconfiguracoes,$dias_empres_aluno,$qtd_mat_aluno,$dias_empres_prof,$qtd_mat_prof,$dias_empres_funcionario,$qtd_mat_funcionario,$dias_empres_comunidade,$qtd_mat_comunidade);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        //LOG
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];  
        $nome_biblioteca=$session_data["descricao"];
		require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("configuracoes",$idconfiguracoes,$usuario." - ".$nome,"Alterou a configuração da biblioteca: ".$nome_biblioteca." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }
//    Excluir dados da Tabela Configurações
    function excluir_configuracao() {
        $idconfiguracoes = $this->input->post('idconfiguracoes');
        $this->load->model('configuracoes_model');        
        $inserir = $this->configuracoes_model->exclui_configuracao($idconfiguracoes);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
        //LOG
        $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];
        $biblioteca = $session_data['biblioteca'];        
        $nome_biblioteca=$session_data["descricao"];
	   
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("configuracoes",$idconfiguracoes,$usuario." - ".$nome,"Apagou as configurações da biblioteca: ".$nome_biblioteca."-".$descricao." no sistema!");
            
             
        }else{
            $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }
}

