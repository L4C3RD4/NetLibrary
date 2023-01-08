<?php

class Emprestimo_controller extends CI_Controller {

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
                    $this->template->write_view('content','bibliotecario/emprestimo_view',"",FALSE);
                    $this->template->render();
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

     function cadastrar_emprestimo() {
        $idemprestimo = isset($idemprestimo) ? $idemprestimo : NULL;
        $material= $this->input->post('material');
        $leitor= $this->input->post('leitor');
        $usuario= $this->input->post('usuario');
        
        if(($leitor==null)||($leitor==null)||($material==null)){
            $mensagem = array('tipo' => 'error');
            echo json_encode($mensagem);
        }else{
        
        $data_emprestimo= $this->input->post('data_emprestimo');
        $hora_emprestimo= $this->input->post('hora_emprestimo');
        $data_devolucao= $this->input->post('data_devolucao');
        $hora_devolucao= $this->input->post('hora_devolucao');
        $status= $this->input->post('status');
        
        $this->load->model('emprestimo_model');
        
        $inserir = $this->emprestimo_model->cadastra_emprestimo($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_devolucao,$hora_devolucao,$status);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
        }else{
             $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        }
    }

    function listar_emprestimo() {
        
        $session_data = $this->session->userdata('logged_in'); 
        $biblioteca = $session_data['biblioteca'];
        $usuario = $session_data['idusuario'];
        $this->load->model('emprestimo_model');
        $emprestimo = $this->emprestimo_model->lista_emprestimo($biblioteca,$usuario);        
        $emprestimosArray = array();
        
        foreach ($emprestimo as $Emprestimos) {
            
            
            array_push($emprestimosArray, $Emprestimos);
            
        }
        echo json_encode(array("data" => $emprestimosArray));
    }
    
    function listar_emprestimo_parametro() {
        $perfil= $this->input->post('perfil');
        $tipo= $this->input->post('tipo');
        $situacao= $this->input->post('situacao');
                
        $session_data = $this->session->userdata('logged_in'); 
        $biblioteca = $session_data['biblioteca'];
        //$usuario = $session_data['idusuario'];
        $this->load->model('emprestimo_model');
        $emprestimo_parametro = $this->emprestimo_model->lista_emprestimo_parametro($biblioteca,$perfil,$tipo,$situacao);        
        $emprestimos_Array = array();
        foreach ($emprestimo_parametro as $Emprestimos_parametro) {
            $Emprestimos_parametro->data_devolucao2 = strftime("%d/%m/%Y", strtotime($Emprestimos_parametro->data_devolucao));
            $Emprestimos_parametro->data_emprestimo2 = strftime("%d/%m/%Y", strtotime($Emprestimos_parametro->data_emprestimo));
            if($Emprestimos_parametro->status_emprestimo==1){
                $Emprestimos_parametro->status_2_emprestimo="Empréstimo Finalizado";
            }else{
                if($Emprestimos_parametro->status_emprestimo==0){
                    $Emprestimos_parametro->status_2_emprestimo="Não Finalizado";
                }
            }
            array_push($emprestimos_Array, $Emprestimos_parametro);
        }
        echo json_encode(array("data" => $emprestimos_Array));
    }
    

     function alterar_emprestimo() {
       
        $idemprestimo = $this->input->post('idemprestimo');
        $material= $this->input->post('material');
        $usuario= $this->input->post('usuario');
        $leitor= $this->input->post('leitor');
        $data_emprestimo= $this->input->post('data_emprestimo');
        $hora_emprestimo= $this->input->post('hora_emprestimo');
        $data_devolucao= $this->input->post('data_devolucao');
        $hora_devolucao= $this->input->post('hora_devolucao');
        $status= $this->input->post('status');

        $this->load->model('emprestimo_model');
             
        $inserir = $this->emprestimo_model->altera_emprestimo($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_devolucao,$hora_devolucao,$status);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
              $session_data = $this->session->userdata('logged_in');
        $usuario = $session_data["idusuario"];
        $nome = $session_data["nome"];        
       
        require_once(APPPATH."libraries/Logs.php");
        $log = new Logs();
        $log->inserirLog("emprestimo",$idemprestimo,$usuario." - ".$nome,"Alterou registro ".$idemprestimo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
    }

    function confirmar_emprestimo() {
        $idemprestimo = $this->input->post('idemprestimo');        
        $hora_devolucao = $this->input->post('hora_devolucao');
        $data_devolucao = $this->input->post('data_devolucao');
        
        $this->load->model('emprestimo_model');        
        $inserir = $this->emprestimo_model->confirma_emprestimo($idemprestimo,$hora_devolucao,$data_devolucao);	
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
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
    
    function busca_qtd_material() {

        $this->load->model('emprestimo_model');
        $leitor = $this->input->post('leitor'); 
        $qtd_material = $this->emprestimo_model->busca_qtd_material($leitor);        
        echo $qtd_material[0]->qtd;
    }
    function verifica_emprestimos_leitor() {

     
        $leitor = $this->input->post('idleitorAutoriza'); 
        $perfil = $this->input->post('perfil'); 
        $session_data = $this->session->userdata('logged_in'); 
        $biblioteca = $session_data['biblioteca'];
        $this->load->model('emprestimo_model');
        $qtd_mat_perfil = $this->emprestimo_model->verifca_material($perfil,$biblioteca); 
        $qtd_mat_perfil = $qtd_mat_perfil[0]->qtd;
        $result = $this->emprestimo_model->verifica_emprestimo_leitor($leitor);
        $qtd = $result[0]->qtd;
        $resultado = ($qtd_mat_perfil-$qtd);
        echo  $resultado;
    }
    
     function calcula_data_entrega() {
        
         
        $perfil = $this->input->post('perfil');
        $biblioteca = $this->input->post('biblioteca');
        $this->load->model("configuracoes_model");
        $qtd_dias = $this->configuracoes_model->busca_qtd_dias($perfil,$biblioteca);    
        $qtd_dias = $qtd_dias[0]->qtd;
//        echo $qtd_dias;
        $data_entrega = date('d/m/Y', strtotime('+'.$qtd_dias.' days'));      
        $weekDay = date('w', strtotime($data_entrega));
        if(($weekDay == 0 || $weekDay == 6)){
            
            if($weekDay == 0){
                $data_entrega = date('d/m/Y', strtotime('+1 days'));  
            }else{
                $data_entrega = date('d/m/Y', strtotime('+2 days'));  
            }
            
        } 
        
        $data_devolucao = explode("/", $data_entrega);
        echo $data_devolucao[2]."-".$data_devolucao[1]."-".$data_devolucao[0];
//        echo $data_devolucao_renvoar = $data_devolucao + $data_devolucao;
            
        }
        
        
    
    
}

