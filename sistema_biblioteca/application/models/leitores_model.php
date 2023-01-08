<?php

class Leitores_model extends CI_Model{
        
    const TABELA = "leitores";
    
    function __construct() {
        parent::__construct();

    }
//    Cadastrar Leitores
    function cadastra_leitor($idleitor,$nome,$cpf,$serie,$logradouro,$complemento,$bairro,$municipio,$cep,$matricula,$celular,$email,$nome_usuario,$data,$biblioteca){
    $arrayInsert = array(
        'idleitor' => 'null',
        'responsavel_cadastro'=>$nome_usuario,
        'nome'=>$nome,
        'cpf'=>$cpf,
        'serie'=>$serie,
        'logradouro'=>$logradouro,
        'complemento' => $complemento,
        'bairro' => $bairro,
        'municipio' => $municipio,
        'cep' => $cep,
        'matricula' => $matricula,
        'celular' => $celular,
        'email' => $email,
        'data_cadastro'=> $data,
        'unidade_cadastro'=> $biblioteca
            
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    }
    
     function busca_id($nome,$email){
    $sql="select idleitor from leitores where nome='$nome' and email='$email'";
    $query= $this->db->query($sql);
    return $query->result();
    
    }
//    Listar os dados da Tabela de Leitores
     function listaleitores($biblioteca) {
         $sql = "SELECT leitores.*, biblioteca.descricao, login_leitor.perfil "
                 . " FROM leitores, login_leitor, biblioteca "
                 . " WHERE leitores.idleitor = login_leitor.leitor "
                 . " AND leitores.unidade_cadastro = biblioteca.idbiblioteca"
                 . " AND leitores.unidade_cadastro = $biblioteca"
                 . " group by leitores.idleitor ";
        $query = $this->db->query($sql);
       return $query->result();
        }
// Excluir os Dados da tabela Leitores
        function exclui_leitor($idleitor) {
        $this->db->where('idleitor', $idleitor);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
//Atualizar os dados da Tabela Leitor
    function altera_leitor($idleitor,$nome,$cpf,$serie,$logradouro,$complemento,$bairro,$municipio,$cep,$matricula,$celular,$email) {
        $arrayUpdate = array(        
        'nome'=>$nome,
        'cpf'=>$cpf,
        'serie'=>$serie,
        'logradouro'=>$logradouro,
        'complemento' => $complemento,
        'bairro' => $bairro,
        'municipio' => $municipio,
        'cep' => $cep,
        'matricula' => $matricula,
        'celular' => $celular,
        'email' => $email
        );
        $atualizar = $this->db->where('idleitor', $idleitor);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 
     function pesquisa_matricula_ou_id($valor,$tipo){
         
        $sql = " SELECT * from leitores,login_leitor WHERE ";
         if($tipo == "matricula"){
             $sql.=" matricula = $valor ";
             
         }else{
             $sql .=" idleitor = $valor";
         }
         
        $sql .= " AND leitores.idleitor = login_leitor.leitor ";
       $query = $this->db->query($sql);
       return $query->result();
    }
    
      function lista_leitor($tipo_pesquisa_leitor,$chave_leitor) {
         $condicao = "";
         if($tipo_pesquisa_leitor=="nome"){
             $condicao = " nome like '%$chave_leitor%' ";                
         }else{
             if($tipo_pesquisa_leitor=="matricula"){
                 $condicao = " matricula like '%$chave_leitorve%' ";                     
             }else{
                 if($tipo_pesquisa_leitor=="email"){
                     $condicao = " email like '%$chave_leitorve%' "; 
                 }
             }
         }
          $sql = " select * from leitores,login_leitor where "
               .$condicao 
               . " and leitores.idleitor = login_leitor.leitor "
                  . "group by idleitor "
               . " order by nome asc  ";  
          $query = $this->db->query($sql);
          return $query->result();
        
    }
    function PegarId_leitor($cpf,$email){
        $sql = " select * from leitores,login_leitor "
                . " where leitores.cpf = '$cpf' "
                . "and leitores.email = '$email' "
                . " and login_leitor.leitor = leitores.idleitor";
          $query = $this->db->query($sql);
          return $query->result();
//    echo $sql;
        
    }
    
    function verifca_atrasos_leitor($idleitor){
        
       $sql = "SELECT COUNT(le.idleitor)as qtd "
               . " FROM leitores as le,emprestimo as e "
               . " WHERE le.idleitor = e.leitor  "
               . " AND e.status = 0 "
               . " AND DATEDIFF(CURDATE(), data_devolucao) >0 "
               . " AND le.idleitor = $idleitor ";
        $query = $this->db->query($sql);
        return $query->result();
          
        
    }
    
}
 ?>