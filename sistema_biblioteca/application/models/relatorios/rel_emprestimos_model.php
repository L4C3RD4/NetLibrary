<?php

class Rel_emprestimos_model extends CI_Model{
    
    
    const TABELA = 'emprestimo';
             
    function __construct(){
  	parent::__construct();  		
    }
    
 
    function lista_emprestimo_parametro($biblioteca,$perfil,$data_inicial,$data_final,$serie){
        $sql = "SELECT e.idemprestimo, e.material, e.usuario, e.leitor, e.data_emprestimo, e.hora_emprestimo, e.data_devolucao, e.hora_devolucao, ab.status, a.titulo, le.nome as nome_leitor, u.nome as usuario_nome, e.status, DATEDIFF(CURDATE(), data_devolucao) as dias_atraso, ab.idacervo as idacervo_biblioteca, ab.status as status_acervo_biblioteca, le.unidade_cadastro, b.descricao as nome_biblioteca "
                . " FROM emprestimo as e, acervo_biblioteca as ab , bibliotecarios as bib, acervo as a, usuarios as u, biblioteca as b, leitores as le, login_leitor as log "
                . " WHERE e.material = ab.idacervo "
                . " AND a.idacervo = ab.material "
                . " AND ab.biblioteca = b.idbiblioteca "
                . " AND bib.biblioteca = b.idbiblioteca "
                . " AND bib.usuario = u.idusuario "
                . " AND e.leitor = le.idleitor "
                . " AND le.idleitor = log.leitor "
                . " AND e.data_emprestimo "
                . " BETWEEN '$data_inicial' and '$data_final' ";
                   //    $sql = " SELECT e.idemprestimo, e.material, e.usuario, e.leitor, e.data_emprestimo, e.hora_emprestimo, e.data_devolucao, e.hora_devolucao, ab.status, a.titulo, le.nome, u.nome as usuario_nome, e.status, DATEDIFF(CURDATE(), data_devolucao) as dias_atraso, ab.idacervo as idacervo_biblioteca, ab.status as status_acervo_biblioteca FROM emprestimo as e, acervo_biblioteca as ab , bibliotecarios as bib, acervo as a, usuarios as u, biblioteca as b, leitores as le, login_leitor as log WHERE e.material = ab.idacervo AND a.idacervo = ab.material AND ab.biblioteca = b.idbiblioteca AND bib.biblioteca = b.idbiblioteca AND bib.usuario = u.idusuario AND e.leitor = le.idleitor AND le.idleitor = log.leitor AND e.data_emprestimo >= '$data_inicial' and e.data_emprestimo <= '$data_final' GROUP by e.idemprestimo";
        
         if($perfil!="todos"){
            $sql .= " and log.perfil = '$perfil' ";
        }
        
        if($serie!="todas"){
            $sql .= " and le.serie = '$serie' ";
        }
        
        if($biblioteca!="todas"){
            $sql .= " and ab.biblioteca = $biblioteca";
        }
        
        $sql .= " GROUP by e.idemprestimo "
             . "  ORDER BY b.descricao,e.data_emprestimo asc ";
        $query = $this->db->query($sql);        
        return $query->result();
      
        
    }
    function listar_bibliotecas() {
 $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            if($perfil=='bibliotecario'){
                  $this->load->model('bibliotecas_model');
                  $idbiblioteca= $session_data['biblioteca'];
        $bibliotecas = $this->bibliotecas_model->listabibliotecaespecifica($idbiblioteca);        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
                
                
            }else{
                $this->load->model('bibliotecas_model');
        $bibliotecas = $this->bibliotecas_model->listabibliotecas();        
        $bibliotecasArray = array();
        foreach ($bibliotecas as $biblioteca) {
            array_push($bibliotecasArray, $biblioteca);
        }
        echo json_encode(array("data" => $bibliotecasArray));
        
        }
        
    }
    
}
