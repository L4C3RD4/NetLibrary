<?php

class Relatorios_model extends CI_Model {

    
    function __construct() {
        parent::__construct();
    }

    function relatorio_acervogeral(){
        $query = $this->db->query(
                " select ab.*, a.*, au.*, b.descricao "
                . " FROM acervo as a, acervo_biblioteca as ab, biblioteca as b, autores au, autores_acervo auc "
                . " WHERE ab.material = a.idacervo "
                . " AND ab.biblioteca = b.idbiblioteca "
                . " AND auc.acervo = a.idacervo "
                . " AND au.idautor = auc.autor "
                . " AND auc.principal = 1 "                
                . " GROUP BY a.idacervo "                
                . " ORDER by a.titulo ASC");
        return $query->result();                
    }
    
    function relatorio_acervo_biblioteca($biblioteca){
        $query = $this->db->query(" select ab.*, a.*, au.*, b.*
                from acervo_biblioteca ab, acervo a, autores au, autores_acervo auc, biblioteca as b
                where ab.material = a.idacervo
                and ab.biblioteca = b.idbiblioteca 
                and auc.acervo = a.idacervo
                and au.idautor = auc.autor
                and auc.principal = 1
                and ab.biblioteca = $biblioteca
                GROUP BY a.idacervo     
                ORDER by a.titulo ASC");
        return $query->result();                
    }
    
    function planilha_acervogeral(){
        $query = $this->db->query(
            " SELECT ab.codigo_exemplar,ab.data_registro,at.formato_citacao, ac.titulo, ac.tipo, ab.tipo_aquisicao, ac.ano_publicacao, a.assunto, a.editora,a.ano_publicacao, a.isbn, ab.data_aquisicao "
            . " FROM acervo as ac, acervo_biblioteca as ab, biblioteca as b, autores at "
            . " WHERE ab.material = ac.idacervo "
            . " AND ab.biblioteca = b.idbiblioteca "
            . " ORDER by a.titulo ASC");
        return $query->result();                
    }
    
    function planilha_acervo_biblioteca(){
        $query = $this->db->query(
                " SELECT ab.material,a.titulo, a.tipo, b.descricao, a.assunto, a.editora,a.ano_publicacao, a.isbn, ab.data_aquisicao "
                . " FROM acervo as a, acervo_biblioteca as ab, biblioteca as b "
                . " WHERE ab.material = a.idacervo "
                . " AND ab.biblioteca = b.idbiblioteca "
                . " ORDER by a.titulo ASC");
        return $query->result();                
    }

    function relatorio_leitor_geral(){
        $query = $this->db->query(
                " SELECT idleitor, unidade_cadastro, nome, logradouro, bairro, municipio,cep ,matricula, email, data_cadastro "
                . " FROM leitores "
                . " ORDER by nome ASC");
        return $query->result();
    }
    function relatorio_leitores_unidade($biblioteca){
        $query = $this->db->query(
                " SELECT idleitor, unidade_cadastro, nome, logradouro, bairro, municipio,cep ,matricula, email, data_cadastro "
                . " FROM leitores "
                . " WHERE unidade_cadastro = $biblioteca "
                . " ORDER by nome ASC");
        return $query->result();
    }
}
?>

















