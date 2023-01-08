<?php

class Bibliotecarios_model extends CI_Model {

      const TABELA = 'bibliotecarios';
    
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');

        error_reporting(-1);
        ini_set('display_errors', 1);
    }

    
    function lista_local() {
        $query = $this->db->get("biblioteca");
        return $query->result();
    }
    
    function listagem_geral() {
        $sql = "  select * "
               ." from  biblioteca b, usuarios u, bibliotecarios bib  "
               ." where  b.idbiblioteca = bib.biblioteca and "
               ." u.idusuario = bib.usuario ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
     function lista_sem_acervo() {
        //$query = $this->db->get(self::TABELA);
   $sql = "select * from "
                . "  biblioteca ";
        $query = $this->db->query($sql);
        return $query->result();
     }
     
     
     
     function cadastrar_bibliotecario($idbibliotecario,$biblioteca,$profissional,$data_inicio,$horario_trabalho,$observacoes){
         
             $arrayInsert = array(
                             
            'idbibliotecario' => $idbibliotecario,         
            'biblioteca' => $biblioteca,         
            'usuario' => $profissional,         
            'data_inicio' => $data_inicio,         
            'horario_trabalho' => $horario_trabalho,
            'observacoes' => $observacoes
            );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        return true;
    else
        return false;
         
     }
     
     function excluibibliotecario($idbibliotecario) {
       $this->db->where('idbibliotecario', $idbibliotecario);
        $delete_bib = $this->db->delete(self::TABELA);
         
        if ($delete_bib)
            return true;
        else
            return false;
    }
    
    function alterabib($idbibliotecario,$data_inicio,$horario_trabalho,$data_termino,$observacoes) {
         $arrayUpdate = array(  
            'idbibliotecario' => $idbibliotecario,
            'data_termino' =>$data_termino,
            'data_inicio' =>$data_inicio,
            'horario_trabalho' =>$horario_trabalho,
            'observacoes' =>$observacoes            
        );
        $alterar_bibliotecario = $this->db->where('idbibliotecario', $idbibliotecario);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    }
    
    function retorna_biblioteca($usuario){
  
    $sql = " SELECT b.*, bib.* "
            . " from biblioteca b, bibliotecarios bib "
            . " WHERE b.idbiblioteca = bib.biblioteca "
            . " AND bib.usuario = $usuario "
            . " AND bib.data_termino IS NULL";
    $query = $this->db->query($sql);
    return $query->result();
        }
        
        function retorna_bibliotecario($usuario,$biblioteca,$email,$descricao){
            
            $sql = " SELECT idbibliotecario, usuario, biblioteca, descricao, nome "
                    . " FROM bibliotecarios bib, biblioteca b, usuarios u "
                    . " WHERE bib.biblioteca = b.idbiblioteca  "
                    . " AND bib.usuario = u.idusuario "
                    . " AND bib.usuario = '$usuario' "
                    . " AND bib.biblioteca = '$biblioteca'"
                    . " AND u.email = '$email'"
                    . " AND b.descricao = '$descricao'"
                    . " AND bib.data_termino is null ";
                   
        
            $query = $this->db->query($sql);
            return $query->result();
            
        }
     function busca_id($biblioteca,$usuario){
    $sql="select idbibliotecario from bibliotecarios where biblioteca='$biblioteca' and usuario='$usuario'";
    $query= $this->db->query($sql);
    return $query->result();
    
    }
}
