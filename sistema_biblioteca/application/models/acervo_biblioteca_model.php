<?php

class Acervo_biblioteca_model extends CI_Model{
        
    const TABELA = "acervo_biblioteca";
    
    function __construct() {
        parent::__construct();
    }
 
    /*
     *  0 - Emprestado
     *  1 - Disponível
     *  2 - Baixa / Indisponível
     *  3 - Reservado
     */
    function cadastra_acervo_biblioteca($idacervo,$biblioteca,$material,$codigo_exemplar,$numero_exemplar,$data_aquisicao,$tipo_aquisicao,$data_registro,$baixa,$data_baixa,$motivo_baixa,$observacoes,$status){
    $arrayInsert = array(
        'idacervo' => 'null',
        'biblioteca' => $biblioteca,
        'material' => $material,
        'codigo_exemplar'=>$codigo_exemplar,
        'numero_exemplar'=>$numero_exemplar,
        'data_aquisicao' => $data_aquisicao,
        'tipo_aquisicao' => $tipo_aquisicao,
//        'qtd_total_exemplares' => $qtd_total_exemplares,
        'data_registro' => $data_registro,
        'baixa' => $baixa,
        'data_baixa' => $data_baixa,
        'motivo_baixa' => $motivo_baixa,
        'observacoes' => $observacoes,
        'status' => $status
            
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    }
    
      function lista_acervo_biblioteca($biblioteca) {
         
        $sql = " SELECT ab.idacervo, ab.biblioteca, ab.material, ab.codigo_exemplar, ab.data_aquisicao, ab.tipo_aquisicao,ab.status,b.descricao, a.titulo, a.tipo, ab.observacoes, ab.baixa, ab.data_baixa, ab.motivo_baixa, ab.data_registro, at.nome as nome_autor "
                . " FROM acervo_biblioteca as ab, acervo as a, biblioteca as b, autores as at, autores_acervo as aa "
                . " WHERE ab.material = a.idacervo "
                . " AND ab.biblioteca = b.idbiblioteca "
                . " AND aa.acervo = a.idacervo "
                . " AND aa.autor = at.idautor "
                . " AND ab.biblioteca = $biblioteca "
                . " GROUP BY ab.idacervo "
                . " ORDER BY ab.material, ab.data_aquisicao desc ";
       
        $query = $this->db->query($sql);
        if($query){
           
        return $query->result();
        }
        
    }

    function exclui_acervo_biblioteca($idacervo) {
        $this->db->where('idacervo', $idacervo);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
    function altera_acervo_biblioteca($idacervo,$biblioteca,$material,$codigo_exemplar,$numero_exemplar,$data_aquisicao,$tipo_aquisicao,$data_registro,$baixa,$data_baixa,$motivo_baixa,$observacoes,$status) {
        $arrayUpdate = array(        
        'biblioteca' => $biblioteca,
        'material' => $material,
        'codigo_exemplar'=>$codigo_exemplar,
        'numero_exemplar'=>$numero_exemplar,
        'data_aquisicao' => $data_aquisicao,
        'tipo_aquisicao' => $tipo_aquisicao,
//        'qtd_total_exemplares' => $qtd_total_exemplares,
        'data_registro' => $data_registro,
        'baixa' => $baixa,
        'data_baixa' => $data_baixa,
        'motivo_baixa' => $motivo_baixa,
        'observacoes' => $observacoes,
        'status' => $status
        );
        $atualizar = $this->db->where('idacervo', $idacervo);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 
    function altera_status_acervo_biblioteca($idacervo,$biblioteca) {
        $sql = " UPDATE acervo_biblioteca "
                . " SET status = 3 "
                . " WHERE idacervo = $idacervo "
                . " AND biblioteca = $biblioteca";
        $query = $this->db->query($sql);
        if ($query){
            
            return true;
        }else
            return false;
    } 
    //Alterar o Status do Acervo com DisponÃ­vel
    function altera_status_acervo_biblioteca_emprestimo($idacervo) {
        $sql = " UPDATE acervo_biblioteca "
                . " SET status = 1 "
                . " WHERE idacervo = $idacervo ";

        $query = $this->db->query($sql);
        if ($query){
            
            return true;
        }else
            return false;
    } 
    function altera_status_acervo_biblioteca_emprestimo_cadastrar($idacervo) {
        $sql = " UPDATE acervo_biblioteca "
                . " SET status = 0 "
                . " WHERE idacervo = $idacervo ";

        $query = $this->db->query($sql);
        if ($query){
            return true;
        
        }else{
            return false;
    } 
}
    function alterar_status_acervo_biblioteca_reserva_excluida($idacervo,$biblioteca) {
        $sql = " UPDATE acervo_biblioteca "
                . " SET status = 1 "
                . " WHERE idacervo = $idacervo "
                . " AND biblioteca = $biblioteca";

        $query = $this->db->query($sql);
        if ($query){
            return true;
        
        }else{
            return false;
    } 
}
    function lista_sem_acervo() {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from "
                . "  biblioteca b "
                . " where idbiblioteca not in (select distinct(biblioteca) from acervo_biblioteca) ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    function pesquisar_codigo_ou_isbn($valor,$tipo,$biblioteca){
          $sql = " SELECT * FROM acervo as a, bibliotecarios  as bib, acervo_biblioteca as ab "
                . " WHERE ab.biblioteca = $biblioteca "
                . " AND ab.material = a.idacervo "
                . " AND ((bib.data_termino is null) or (bib.data_termino = '0000-00-00')) ";   
        if($tipo=="codigo"){
        
            $sql.= " AND ab.idacervo = $valor ";
        }else{
            $sql.= " AND a.isbn = $valor ";
        }
        
        
       
         $query = $this->db->query($sql);
        return $query->result();
        
    }
    
    function altera_status_reserva_atrasada(){
        $sql = " UPDATE acervo_biblioteca SET acervo_biblioteca.status = 1 "
                . " WHERE acervo_biblioteca.idacervo "
                . " IN(     "
                . " SELECT acervo FROM reservas WHERE data_vencimento < CURDATE() "
                . " )";
         $query = $this->db->query($sql);
        if($query){
            return true;
            
        }else{
            return false;
        }
        
    }
}
 ?>