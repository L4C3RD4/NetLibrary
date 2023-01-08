<?php

class Acervo_model extends CI_Model{
        
    const TABELA = "acervo";
    
    function __construct() {
        parent::__construct();

    }
//    Cadastrar Biblioteca
    function cadastra_acervo($idacervo,$titulo,$tipo,$local,$editora,$edicao,$volume,$tipo_material,$anopublicacao,$assunto,$genero,$resumo,$isbn,$idioma,$serie_colecao,$detalhes,$numeropg){
    $arrayInsert = array(
        'idacervo' => 'null',
        'titulo' => $titulo,
        'tipo'=>$tipo,
        'local' => $local,
        'editora' => $editora,
        'edicao' => $edicao,
        'volume' => $volume,
        'tipo_material' => $tipo_material,
        'ano_publicacao' => $anopublicacao,
        'assunto' => $assunto,
        'genero' => $genero,
        'resumo_informacoes' => $resumo,
        'isbn' => $isbn,
        'idioma' => $idioma,
        'num_paginas' => $numeropg,
        'serie_colecao' => $serie_colecao,
        'detalhes' => $detalhes
       
            
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    }
   function pegaId(){
       $sql = "SELECT * FROM acervo ORDER BY idacervo DESC LIMIT 1";
       $query = $this->db->query($sql);
       return $query->result();
   }
  
  function busca_idacervo($titulo,$tipo,$local){
    $sql="select max(idacervo) as max_idacervo from acervo where titulo='$titulo' and tipo='$tipo'and local='$local'";
    $query = $this->db->query($sql);
    return $query->result();
    
    }

//    Listar Bibliotecas
     function listaacervo($tipo_pesquisa,$chave) {
         $condicao = "";
         if($tipo_pesquisa=="titulo"){
             $condicao = " titulo like '%$chave%' ";                
         }else{
             if($tipo_pesquisa=="autor"){
                 $condicao = " autores like '%$chave%' ";                     
             }else{
                 if($tipo_pesquisa=="editora"){
                     $condicao = " editora like '%$chave%' "; 
                 }
             }
         }
          $sql = " select * from acervo where "
               .$condicao 
               . " order by titulo asc  ";  
          $query = $this->db->query($sql);
          return $query->result();
        
    }
     function listaacervo_emprestimo($tipo_pesquisa,$chave,$biblioteca) {
         $condicao = "";
         if($tipo_pesquisa=="titulo"){
             $condicao = " a.titulo like '%$chave%' ";                
         }else{
             if($tipo_pesquisa=="autor"){
                 $condicao = " at.nome like '%$chave%' ";                     
             }else{
                 if($tipo_pesquisa=="editora"){
                     $condicao = " a.editora like '%$chave%' "; 
                 }
             }
         }
         
          $sql = " SELECT * from acervo as a, acervo_biblioteca as ab, autores as at, autores_acervo as ac "
                  . " WHERE ab.material = a.idacervo "
                  . " AND ac.autor = at.idautor AND "
               .$condicao 
               . " AND ab.biblioteca = $biblioteca  "
                  . " group by a.idacervo "
               . " order by a.titulo asc  ";  
          $query = $this->db->query($sql);
          return $query->result();
    ;
    }
      function listaacervo_sem_paremetro() {
        $sql = " select * "
             . " from acervo a, acervo_biblioteca ab, autores_acervo aa, autores au "
             . " where a.idacervo = ab.material and "
             . " a.idacervo = aa.acervo and "
             . " aa.autor = au.idautor "
             . " order by a.titulo asc ";  
        $query = $this->db->get(self::TABELA);
        return $query->result();
    }
// Excluir os Dados da tabela biblioteca
        function exclui_acervo($idacervo) {
        $this->db->where('idacervo', $idacervo);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
//Atualizar os dados da Tabela Biblioteca
    function alteraAcervo($idacervo,$titulo,$tipo,$local,$editora,$edicao,$volume,$tipo_material,$anopublicacao,$assunto,$genero,$resumo,$isbn,$idioma,$serie_colecao,$detalhes,$numeropg)	
 {
        $arrayUpdate = array(        
         'titulo' => $titulo,
        'tipo'=>$tipo,
        'local' => $local,
        'editora' => $editora,
        'edicao' => $edicao,
        'volume' => $volume,
        'tipo_material' => $tipo_material,
        'ano_publicacao' => $anopublicacao,
        'assunto' => $assunto,
        'genero' => $genero,
        'resumo_informacoes' => $resumo,
        'isbn' => $isbn,
        'idioma' => $idioma,
         'num_paginas' => $numeropg,
        'serie_colecao' => $serie_colecao,
        'detalhes' => $detalhes
        );
        $atualizar = $this->db->where('idacervo', $idacervo);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 
   
    function lista_sem_acervo() {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from autores a where idautor not in (select distinct(autores) from acervo)";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function listar_editoras(){
    
        $sql = " SELECT DISTINCT(editora) FROM acervo ORDER BY editora ASC ";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
 ?>