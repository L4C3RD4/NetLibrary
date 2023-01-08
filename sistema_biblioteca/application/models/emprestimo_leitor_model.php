<?php

class Emprestimo_leitor_model extends CI_Model{
        
    const TABELA = "emprestimo";
    
    function __construct() {
        parent::__construct();

    }


     function lista_emprestimos_leitor($usuario) {
      $sql = "SELECT e.idemprestimo,e.material,e.usuario,e.leitor,e.data_emprestimo,e.hora_emprestimo,e.data_devolucao,e.hora_devolucao,e.status as status_emprestimo, b.descricao, u.nome as bibliotecario, a.titulo,DATEDIFF(CURDATE(), data_devolucao) as dias_atraso, l.nome as nome_leitor  "
              . " FROM emprestimo as e, acervo_biblioteca as ab, acervo as a, biblioteca as b, usuarios as u, bibliotecarios as bib, leitores as l "
              . " WHERE a.idacervo = ab.material "
              .  "AND ab.idacervo = e.material "
              . " AND ab.biblioteca = b.idbiblioteca "
              . " AND u.idusuario = e.usuario "
              . " AND bib.usuario = u.idusuario "
              . " AND bib.biblioteca = b.idbiblioteca "
              . " AND l.idleitor = e.leitor "
              . " AND e.status = 0 "
              . " AND l.idleitor = $usuario";
       $query = $this->db->query($sql);
        return $query->result();
    }

      function altera_emprestimo_leitor($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_renovacao,$hora_renovacao,$data_devolucao,$hora_devolucao){
        
        $arrayUpdate = array(        
        'idemprestimo' => $idemprestimo,
        'material' => $material,
        'leitor' => $leitor,
        'data_emprestimo' => $data_emprestimo,
        'hora_emprestimo' => $hora_emprestimo,
        'data_renovacao' => $data_renovacao,
        'hora_renovacao' => $hora_renovacao,
        'data_devolucao' => $data_devolucao,
        'hora_devolucao' => $hora_devolucao
        );
        $atualizar = $this->db->where('idemprestimo', $idemprestimo);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
     
    }
    
    function verifica_renovacao_emprestimo_leitor($idemprestimo,$material,$leitor){
        
        $sql = "SELECT data_renovacao "
                . " FROM emprestimo "
                . " WHERE idemprestimo = $idemprestimo "
                . " AND material = $material "
                . " AND leitor = $leitor ";  
        
        $query = $this->db->query($sql);
        return $query->result();
        
//        if($query){
//            return true;
//            
//        }else{
//            return false;
//        }
    }
   
}
 ?>