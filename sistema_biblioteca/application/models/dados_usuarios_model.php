<?php

class Dados_usuarios_model extends CI_Model{
        
    const TABELA = "";
    
    function __construct() {
        parent::__construct();

    }

    function exibir_dados_leitor($idleitor){
        
        $sql = "SELECT * FROM leitores,login_leitor WHERE idleitor = $idleitor AND login_leitor.leitor = leitores.idleitor ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function exibir_dados_bibliotecario($idusuario){
        
        $sql = " SELECT usuarios.*,login.*, biblioteca.*"
                . " FROM usuarios, login, bibliotecarios, biblioteca "
                . " WHERE usuarios.idusuario = login.usuario "
                . " AND bibliotecarios.usuario = usuarios.idusuario "
                . " AND biblioteca.idbiblioteca = bibliotecarios.biblioteca "
                . " AND usuarios.idusuario = $idusuario";
        $query = $this->db->query($sql);
        return $query->result();
    }
    function exibir_dados_gestor($idusuario){
        
        $sql = " SELECT * FROM usuarios,login WHERE login.usuario = usuarios.idusuario AND usuarios.idusuario = $idusuario";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
 ?>