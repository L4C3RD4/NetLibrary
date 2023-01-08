<?php

class Bibliotecas_model extends CI_Model{
        
    const TABELA = "biblioteca";
    
    function __construct() {
        parent::__construct();

    }
//    Cadastrar Biblioteca
    function cadastra_biblioteca($idbiblioteca,$logradouro,$descricao,$complemento,$bairro,$municipio,$cep,$email,$telefone,$observacoes){
    $arrayInsert = array(
        'idbiblioteca' => 'null',
        'descricao' => $descricao,
        'logradouro'=>$logradouro,
        'complemento' => $complemento,
        'bairro' => $bairro,
        'municipio' => $municipio,
        'cep' => $cep,
        'email' => $email,
        'telefone' => $telefone,
        'observacoes' => $observacoes
            
        );
    
    $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir)
        
        return true;
    else
        return false;
    }
    
     function listabibliotecaespecifica($idbiblioteca){
        
           $query = $this->db->query( "SELECT * FROM biblioteca WHERE idbiblioteca=$idbiblioteca;");
        return $query->result();
        
    }
    
//    Listar Bibliotecas
     function listabibliotecas() {
        $query = $this->db->get(self::TABELA);
        return $query->result();
    }
// Excluir os Dados da tabela biblioteca
        function exclui_biblioteca($idbiblioteca) {
        $this->db->where('idbiblioteca', $idbiblioteca);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    }
//Atualizar os dados da Tabela Biblioteca
    function altera_biblioteca($idbiblioteca,$logradouro,$descricao,$complemento,$bairro,$municipio,$cep,$email,$telefone,$observacoes) {
        $arrayUpdate = array(        
            'logradouro' =>$logradouro,
            'descricao' =>$descricao,
            'complemento' =>$complemento,
            'bairro' =>$bairro,
            'municipio' =>$municipio,
            'cep' =>$cep,
            'email' =>$email,
            'telefone' =>$telefone,
            'observacoes' =>$observacoes
        );
        $atualizar = $this->db->where('idbiblioteca', $idbiblioteca);
        if ($this->db->update(self::TABELA, $arrayUpdate))
            //echo $this->db->last_query();
            return true;
        else
            return false;
    } 
    function listabibliotecas_rel() {
        //$query = $this->db->get(self::TABELA);
        $sql = "select * from "
                . "  biblioteca b ";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
   
    function retorna_idbiblioteca($descricao,$logradouro){
        $sql = " SELECT idbiblioteca FROM biblioteca "
                . " WHERE descricao = '$descricao' and logradouro = '$logradouro'";
        $query = $this->db->query($sql);
        return $query->result();
    }
}
 ?>