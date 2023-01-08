<?php

class Pesquisa_model extends CI_Model {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');

        error_reporting(-1);
        ini_set('display_errors', 1);
    }

    function pesquisa($tipo_busca, $chave_pesquisa, $tipo_material, $localizacao,$editora,$assunto,$genero) {

    $condicao = "";
        $sql = "select acb.material,acb.biblioteca, acb.idacervo as idacervo_biblioteca, acb.status as status_acervo_biblioteca, ac.*, b.idbiblioteca,au.autor,au.acervo, at.nome as nome_autor, b.descricao "
          . " from biblioteca as b, acervo_biblioteca as acb, acervo as ac, autores_acervo as au, autores as at "
          . " where acb.material = ac.idacervo "
          . " and acb.biblioteca = b.idbiblioteca "
          . " and au.autor = at.idautor "
          . " and au.acervo = ac.idacervo";


        if ($tipo_material != "todos") {
            $condicao .= " and ac.tipo = '$tipo_material'  ";
        }else{
             $condicao .= "";
        }
        
        if ($localizacao != "todas") {
            $condicao .= " and b.idbiblioteca = '$localizacao' ";
        }else{
            $condicao .= "";
        }

    
        
         if ($assunto != "") {
                    $condicao .= " and ac.assunto = '$assunto' ";
        }else{
             $condicao .= "";
        }

        if ($tipo_busca != "todos") {
            if ($tipo_busca == "autor") {
                $condicao .= " and at.nome like '%$chave_pesquisa%' ";
            } else {
                    $condicao .= " and ac.titulo like '%$chave_pesquisa%' ";
            }
            
        }else{
            $condicao .= "";;
        }

         if($editora=="todas"){
         
        }else{
            $condicao .=" and ac.editora = '$editora' ";
        }
        if($genero==""){
         
        }else{
            $condicao .=" and ac.genero = '$genero' ";
        }
        
        $sql .= $condicao;
        $sql .= " group by acb.idacervo order by ac.titulo asc ";
//        echo $sql;
        $query = $this->db->query($sql);
        return $query->result();
    }

    
     function pesquisa_leitores($tipo_busca, $chave_pesquisa, $tipo_material, $localizacao,$editora,$assunto,$genero) {

        $condicao = "";
        $sql = "select acb.material,acb.biblioteca, acb.idacervo as idacervo_biblioteca, acb.status as status_acervo_biblioteca, ac.*, b.idbiblioteca,au.autor,au.acervo, at.nome as nome_autor, b.descricao "
          . " from biblioteca as b, acervo_biblioteca as acb, acervo as ac, autores_acervo as au, autores as at "
          . " where acb.material = ac.idacervo "
          . " and acb.biblioteca = b.idbiblioteca "
          . " and au.autor = at.idautor "
          . " and au.acervo = ac.idacervo";


        if ($tipo_material != "todos") {
            $condicao .= " and ac.tipo = '$tipo_material'  ";
        }else{
             $condicao .= "";
        }
        
        if ($localizacao != "todas") {
            $condicao .= " and b.idbiblioteca = '$localizacao' ";
        }else{
            $condicao .= "";
        }

    
        
         if ($assunto != "") {
                    $condicao .= " and ac.assunto = '$assunto' ";
        }else{
             $condicao .= "";
        }

        if ($tipo_busca != "todos") {
            if ($tipo_busca == "autor") {
                $condicao .= " and at.nome like '%$chave_pesquisa%' ";
            } else {
                    $condicao .= " and ac.titulo like '%$chave_pesquisa%' ";
            }
            
        }else{
            $condicao .= "";;
        }

        
        if($editora=="todas"){
         
        }else{
            $condicao .=" and ac.editora = '$editora' ";
        }
        
        if($genero==""){
         
        }else{
            $condicao .=" and ac.genero = '$genero' ";
        }
        
        $sql .= $condicao;
        $sql .= " group by acb.idacervo order by ac.titulo asc ";
//        echo $editora;
        $query = $this->db->query($sql);
        return $query->result();
        

     }
    
    function lista_local() {
        $query = $this->db->get("biblioteca");
        return $query->result();
    }

}
