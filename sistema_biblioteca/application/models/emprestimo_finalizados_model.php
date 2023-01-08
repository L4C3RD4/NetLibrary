<?php

class Emprestimo_finalizados_model extends CI_Model{
    
    
    const TABELA = 'emprestimo';
             
    function __construct(){
  	parent::__construct();  		
    }

//    function lista_emprestimo($biblioteca, $usuario){
//        
//        $sql = " SELECT idemprestimo, e.material, e.usuario, leitor, data_emprestimo, hora_emprestimo, data_devolucao, hora_devolucao, ab.status, a.titulo, le.nome, u.nome as usuario_nome, e.status "
//                . ", DATEDIFF(CURDATE(), data_devolucao) as dias_atraso "
//                . "FROM emprestimo as e, acervo_biblioteca as ab , bibliotecarios as bib, acervo as a, usuarios as u, biblioteca as b, leitores as le "
//                . " WHERE ab.material = a.idacervo "
//                . " AND e.material = ab.idacervo "
//                . " AND b.idbiblioteca = ab.biblioteca "
//                . " AND ab.biblioteca = $biblioteca "
//                . " AND e.usuario = $usuario "
//                . " AND e.leitor = le.idleitor "
//                . " AND e.usuario = bib.usuario "
//                . " AND e.usuario = u.idusuario "
//                . " AND e.status = 0"
//                . "";
//         
//        $query = $this->db->query($sql);        
//        return $query->result();
//    }

    
    
function lista_emprestimo_parametro($biblioteca,$perfil,$tipo,$situacao){
//    echo $chave_emprestimo_leitor;
        $condicao_leitor="";
        $condicao_material="";
        $condicao_situacao="";
        
        if($perfil != ""){
            $condicao_leitor = " AND log.perfil = '$perfil'";
        }    
        if($tipo != ""){
            $condicao_material = " AND a.tipo = '$tipo'";
        }    
      if($situacao =="entregues"){
            $condicao_situacao = " AND e.status = 1 ";
        }
        $sql = " SELECT e.idemprestimo, e.material, e.usuario, e.leitor, e.data_emprestimo, e.hora_emprestimo, e.data_devolucao, e.hora_devolucao, ab.status, a.titulo, le.nome, u.nome as usuario_nome, e.status as status_emprestimo,"
                . " DATEDIFF(CURDATE(), data_devolucao) as dias_atraso, ab.idacervo as idacervo_biblioteca, ab.status as status_acervo_biblioteca"
                . " FROM emprestimo as e, acervo_biblioteca as ab , bibliotecarios as bib, acervo as a, usuarios as u, biblioteca as b, leitores as le, login_leitor as log "
                . " WHERE e.material = ab.idacervo "
                . " AND a.idacervo = ab.material "
                . " AND ab.biblioteca = b.idbiblioteca "
                . " AND bib.biblioteca = b.idbiblioteca "
                . " AND bib.usuario = u.idusuario "
                . " AND e.leitor = le.idleitor "
                . " AND le.idleitor = log.leitor "
                . " AND ab.biblioteca = $biblioteca"
                . " $condicao_leitor "
                . " $condicao_material "
                . " $condicao_situacao "
                . " GROUP by e.idemprestimo ";
         
        $query = $this->db->query($sql);        
        return $query->result();
        
    }
    
      function lista_emprestimos_leitor_finalizado($usuario) {
      $sql = "SELECT e.idemprestimo,e.material,e.usuario,e.leitor,e.data_emprestimo,e.hora_emprestimo,e.data_devolucao,e.hora_devolucao,e.status, b.descricao, u.nome as bibliotecario, a.titulo,DATEDIFF(CURDATE(), data_devolucao) as dias_atraso  "
              . " FROM emprestimo as e, acervo_biblioteca as ab, acervo as a, biblioteca as b, usuarios as u, bibliotecarios as bib, leitores as l "
              . " WHERE a.idacervo = ab.material "
              .  "AND ab.idacervo = e.material "
              . " AND ab.biblioteca = b.idbiblioteca "
              . " AND u.idusuario = e.usuario "
              . " AND bib.usuario = u.idusuario "
              . " AND bib.biblioteca = b.idbiblioteca "
              . " AND l.idleitor = e.leitor "
              . " AND l.idleitor = $usuario"
              . " AND e.status = 1";
       $query = $this->db->query($sql);
        return $query->result();
    }

      
}


?>