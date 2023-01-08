<?php

class Configuracoes_model extends CI_Model{
        
    const TABELA = "configuracoes";
    
    function __construct() {
        parent::__construct();

    }
//    Cadastrar ConfiguraÃ§Ã£o
    function cadastra_configuracao($idconfiguracoes,$biblioteca,$dias_empres_aluno,$qtd_mat_aluno,$dias_empres_prof,$qtd_mat_prof,$dias_empres_funcionario,$qtd_mat_funcionario,$dias_empres_comunidade,$qtd_mat_comunidade){
    $arrayInsert = array(
        'idconfiguracoes' => 'null',
        'biblioteca' => $biblioteca,
        'dias_empres_aluno'=>$dias_empres_aluno,
        'qtd_mat_aluno' => $qtd_mat_aluno,
        'dias_empres_prof' => $dias_empres_prof,
        'qtd_mat_prof' => $qtd_mat_prof,
        'dias_empres_funcionario'=>$dias_empres_funcionario,
        'qtd_mat_funcionario' => $qtd_mat_funcionario,
        'dias_empres_comunidade' => $dias_empres_comunidade,
        'qtd_mat_comunidade' => $qtd_mat_comunidade
            
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    }
//    Listar ConfiguraÃ§Ãµes
     function listaconfiguracoes() {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from "
                . "  configuracoes c, biblioteca b "
                . " where c.biblioteca = b.idbiblioteca  ";
        $query = $this->db->query($sql);
        return $query->result();
    }
     function listaconfiguracao($biblioteca) {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from "
                . "  configuracoes c, biblioteca b "
                . " where c.biblioteca = b.idbiblioteca  "
                . " and c.biblioteca = $biblioteca ";
//        echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }
//    Listar ConfiguraÃ§Ãµes
     function lista_sem_configuracao() {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from "
                . "  biblioteca b "
                . " where idbiblioteca not in (select distinct(biblioteca) from configuracoes) ";
        $query = $this->db->query($sql);
        return $query->result();
    }
// Excluir os Dados da tabela ConfiguraÃ§Ãµes
        function exclui_configuracao($idconfiguracoes) {
        $this->db->where('idconfiguracoes', $idconfiguracoes);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
//Atualizar os dados da Tabela ConfiguraÃ§Ãµes
    function altera_configuracao($idconfiguracoes,$dias_empres_aluno,$qtd_mat_aluno,$dias_empres_prof,$qtd_mat_prof,$dias_empres_funcionario,$qtd_mat_funcionario,$dias_empres_comunidade,$qtd_mat_comunidade) {
        $arrayUpdate = array(        
        'dias_empres_aluno'=>$dias_empres_aluno,
        'qtd_mat_aluno' => $qtd_mat_aluno,
        'dias_empres_prof' => $dias_empres_prof,
        'qtd_mat_prof' => $qtd_mat_prof,
        'dias_empres_funcionario'=>$dias_empres_funcionario,
        'qtd_mat_funcionario' => $qtd_mat_funcionario,
        'dias_empres_comunidade' => $dias_empres_comunidade,
        'qtd_mat_comunidade' => $qtd_mat_comunidade
        );
        $atualizar = $this->db->where('idconfiguracoes', $idconfiguracoes);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 

    function busca_configuracoes($biblioteca){
        $sql = "select * from "
                . "  configuracoes "
                . " where biblioteca = $biblioteca ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function verfica_configuracao($biblioteca){
        $sql = "select * from "
                . "  configuracoes "
                . " where biblioteca = $biblioteca ";
        $query = $this->db->query($sql);
        $qtd = $query->num_rows();
        if($qtd>0){
           //Retornou um registro 
            return 1;
        }else{
            return 0;
        }
        
    }
    function busca_qtd_dias($perfil,$biblioteca){
        
        $sql = " SELECT dias_empres_$perfil as qtd "
                . "FROM configuracoes "
                . " WHERE configuracoes.biblioteca = $biblioteca ";
//        echo $aql;
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
}
 ?>