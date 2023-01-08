<?php

class Emprestimo_leitor_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {
        
      if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            
             if(($perfil=="bibliotecario")||($perfil=="auxiliar")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                }else{
                    if($perfil=="gestor"){
                        $this->template->write_view('menu', 'gestor/menu', "", FALSE);
                        $this->template->write_view('content', 'acesso_negado_view', "", FALSE);
                        $this->template->render();
                        
                    }else{
                        if(($perfil=="aluno")||($perfil=="professor")||($perfil=="funcionario")||($perfil=="comunidade")){
                        $this->template->write_view('menu', 'leitores/menu', "", FALSE);
                        $this->template->write_view('content', 'leitores/emprestimo_leitor_view', "", FALSE);
                        $this->template->render();
                        }
                    }
                }
            }           
        else{
             redirect('login_controller');
        }
    }

  function listar_emprestimos_leitor() {
       $session_data = $this->session->userdata('logged_in'); 
        $usuario = $session_data['idusuario'];
        $this->load->model('emprestimo_leitor_model');
        $emprestimos = $this->emprestimo_leitor_model->lista_emprestimos_leitor($usuario);        
        $emprestimosArray = array();
        foreach ($emprestimos as $emprestimo) {
            $data = $emprestimo->data_devolucao;
            $emprestimo->next_date = date('Y-m-d', strtotime("+ 1 week",strtotime($data)));
            if($emprestimo->status_emprestimo==0){ 
                $emprestimo->status_2="Não Finalizado";
            }else{
                if($emprestimo->status_emprestimo==1){
                    $emprestimo->status_2="Finalizado";
                 }
            } 
            $emprestimo->data_devolucao2 = strftime("%d/%m/%Y", strtotime($emprestimo->data_devolucao));
            $emprestimo->data_emprestimo2 = strftime("%d/%m/%Y", strtotime($emprestimo->data_emprestimo));
            array_push($emprestimosArray, $emprestimo);
        }
        echo json_encode(array("data" => $emprestimosArray));
    }
    
    
  function verifica_renovacao_emprestimo_leitor() {
//       $session_data = $this->session->userdata('logged_in'); 
//        $idleitor = $session_data['idleitor'];
        
        $idemprestimo = $this->input->post('idemprestimo');
        $material= $this->input->post('material');
        $leitor= $this->input->post('leitor');
        
        $this->load->model('emprestimo_leitor_model');
        $emprestimos = $this->emprestimo_leitor_model->verifica_renovacao_emprestimo_leitor($idemprestimo,$material,$leitor);     
        $data_renovacao = $emprestimos[0]->data_renovacao;
        echo $data_renovacao;
    }
    
    
     function renovar_emprestimo_leitor() {
       
        $idemprestimo = $this->input->post('idemprestimo');
        $material= $this->input->post('material');
        $usuario= $this->input->post('usuario');
        $leitor= $this->input->post('leitor');
        $data_emprestimo = $this->input->post('data_emprestimo');
        $hora_emprestimo = $this->input->post('hora_emprestimo');
        $data_devolucao = $this->input->post('data_devolucao');
        $hora_devolucao = $this->input->post('hora_devolucao');
        
        $data_renovacao = $this->input->post('data_renovacao');
        $hora_renovacao = $this->input->post('hora_renovacao');

        $this->load->model('emprestimo_leitor_model');
             
        $inserir = $this->emprestimo_leitor_model->altera_emprestimo_leitor($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_renovacao,$hora_renovacao,$data_devolucao,$hora_devolucao);	
       
        if($inserir){
             $mensagem = array('tipo' => 'success');
             echo json_encode($mensagem);
             
//        $session_data = $this->session->userdata('logged_in');
//        $usuario = $session_data["idusuario"];
//        $nome = $session_data["nome"];        
//       
//        require_once(APPPATH."libraries/Logs.php");
//        $log = new Logs();
//        $log->inserirLog("emprestimo",$idemprestimo,$usuario." - ".$nome,"Alterou registro ".$idemprestimo." no sistema!");
            
             
        }else{
           $mensagem = array('tipo' => 'error');
             echo json_encode($mensagem);
        }
        
    }
    
    
}

