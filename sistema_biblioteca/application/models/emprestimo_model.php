<?php

class Emprestimo_model extends CI_Model{
    
    
    const TABELA = 'emprestimo';
             
    function __construct(){
  	parent::__construct();  		
    }
    
function busca_qtd_material($leitor){
    
     $sql = " select count(*) as qtd "
              ." from emprestimo "
              ." where leitor = $leitor and "
             . " status != 1 ";
              
        $query = $this->db->query($sql);        
        return $query->result();
}

 function cadastra_emprestimo($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_devolucao,$hora_devolucao,$status){
    $arrayInsert = array(
        'idemprestimo' => 'null',
        'material' => $material,
        'usuario'=>$usuario,
        'leitor' => $leitor,
        'data_emprestimo' => $data_emprestimo,
        'hora_emprestimo' => $hora_emprestimo,
        'data_devolucao' => $data_devolucao,
        'hora_devolucao' => $hora_devolucao,
        'status' => $status
            
        );
     $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    
    }
    function lista_emprestimo($biblioteca, $usuario){
        
        $sql = " SELECT idemprestimo, e.material, e.usuario, leitor, data_emprestimo, hora_emprestimo, data_devolucao, hora_devolucao, ab.status, a.titulo, le.nome, u.nome as usuario_nome, e.status "
                . ", DATEDIFF(CURDATE(), data_devolucao) as dias_atraso "
                . "FROM emprestimo as e, acervo_biblioteca as ab , bibliotecarios as bib, acervo as a, usuarios as u, biblioteca as b, leitores as le "
                . " WHERE ab.material = a.idacervo "
                . " AND e.material = ab.idacervo "
                . " AND b.idbiblioteca = ab.biblioteca "
                . " AND ab.biblioteca = $biblioteca "
                . " AND e.usuario = $usuario "
                . " AND e.leitor = le.idleitor "
                . " AND e.usuario = bib.usuario "
                . " AND e.usuario = u.idusuario "
                . " AND e.status = 0"
                . "";
         
        $query = $this->db->query($sql);        
        return $query->result();
    }

    
    
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
        if($situacao == "atrasado"){
            $condicao_situacao  = " AND DATEDIFF(CURDATE(), data_devolucao)  >= 1 AND e.status = 0";
        }else{
           if($situacao == "prazo_limite"){
                $condicao_situacao = " AND DATEDIFF(CURDATE(), data_devolucao)  = 0 AND e.status = 0 ";
            }else{
                if($situacao =="em_dia"){
                    $condicao_situacao = " AND DATEDIFF(CURDATE(), data_devolucao)  < 0 AND e.status = 0";
                }else{
                    if($situacao =="entregues"){
                         $condicao_situacao = "AND e.status = 1";
                    }else{
                        $condicao_situacao = "AND e.status = 0";
                    }
                }
            }
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
//                . " AND bib.idbibliotecario = $bibliotecario "
                . " GROUP by e.idemprestimo ";
         
        $query = $this->db->query($sql);        
        return $query->result();
        
    }

    function altera_emprestimo($idemprestimo,$material,$usuario,$leitor,$data_emprestimo,$hora_emprestimo,$data_devolucao,$hora_devolucao,$status){
        
        $arrayUpdate = array(        
        'idemprestimo' => $idemprestimo,
        'material' => $material,
        'usuario'=>$usuario,
        'leitor' => $leitor,
        'data_emprestimo' => $data_emprestimo,
        'hora_emprestimo' => $hora_emprestimo,
        'data_devolucao' => $data_devolucao,
        'hora_devolucao' => $hora_devolucao,
        'status' => $status
        );
        $atualizar = $this->db->where('idemprestimo', $idemprestimo);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
     
    }
    //Quando o emprÃ©stimo Ã© devolivdo fica stats = 1, que significa entregeue
    function confirma_emprestimo($idemprestimo,$hora_devolucao,$data_devolucao){
        $sql = " UPDATE emprestimo "
                . " SET hora_devolucao = '$hora_devolucao', "
                . " status = 1,data_devolucao = '$data_devolucao' "
                . " WHERE idemprestimo = $idemprestimo ";
        
       $query = $this->db->query($sql);   
      // var_dump($sql);
      if($query){
           return true;
      }else{
           return false;
       }
        //echo $data_devolucao;
        
    }
    
    function verifica_emprestimo_leitor($leitor){
        
       $sql = "SELECT count(idemprestimo) as qtd FROM emprestimo WHERE leitor = $leitor AND status = 0";
       $query = $this->db->query($sql);
       return $query->result();
    }
    
    function verifca_material($perfil,$biblioteca){        
        $sql = "SELECT qtd_mat_$perfil as qtd FROM configuracoes WHERE biblioteca = $biblioteca ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    

}
        



?>