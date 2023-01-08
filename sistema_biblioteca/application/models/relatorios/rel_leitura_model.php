<?php

class Rel_leitura_model extends CI_Model {

    
    function __construct() {
        parent::__construct();
    }

    
    
    //Lista de Leitores por Geral
    function relatorio_leitor_geral(){
        $query = $this->db->query("SELECT * FROM leitores");
        return $query->result();                
    }
    
  
    
  function pesquisa_leitor( $chave_pesquisa,$filtro_perfil,$unidade_educacional) {
    $sql = " SELECT le.idleitor,le.nome,le.serie,le.matricula,le.email,l.perfil "
                . " FROM leitores as le, login_leitor as l "
                . " WHERE l.leitor = le.idleitor and le.nome like '%$chave_pesquisa%'  ";

        
        if($filtro_perfil!="todos"){
            $sql .= " and l.perfil = '$filtro_perfil' ";
        }
        if($unidade_educacional !="")
        {
            $sql.= " and unidade_cadastro = $unidade_educacional ";
        }
        $sql.= " GROUP BY idleitor ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
function relatorio_leitura($idleitor,$data_inicial,$data_final){
             $sql = "select e.idemprestimo,e.data_emprestimo,ac.titulo,ac.tipo,e.data_devolucao,le.nome, TIMESTAMPDIFF(DAY,e.data_emprestimo,e.data_devolucao) as dias_emprestimo
                     from emprestimo e, acervo ac, acervo_biblioteca ab, leitores le 
                     where e.material = ab.idacervo 
                     and ab.material = ac.idacervo 
                     and e.data_emprestimo >= '$data_inicial'
                     and e.data_emprestimo <= '$data_final' 
                     and e.leitor = '$idleitor'";
                         
                      
                         
                $sql.= " GROUP BY e.idemprestimo";
         
        $query = $this->db->query($sql);        
        return $query->result();
     //  echo $sql;
        
    }
    
function relatorio_ranking_leitura($data_inicial,$data_final){
        $sql = "  SELECT b.descricao, l.nome, count(e.idemprestimo) as qtd
                  FROM biblioteca b, acervo_biblioteca ac, leitores l, emprestimo e
                  WHERE b.idbiblioteca = ac.biblioteca
                  AND e.material = ac.idacervo
                  AND e.leitor = l.idleitor
                  AND e.data_emprestimo >= '$data_inicial'
                  AND e.data_emprestimo <= '$data_final' 
                  GROUP BY e.leitor
                  ORDER BY qtd DESC ";
        $query = $this->db->query($sql);        
        return $query->result();
     //  echo $sql;
        
    }
    
}

















