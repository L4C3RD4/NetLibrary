<?php

class Reserva_model extends CI_Model{
    
    
    const TABELA = 'reservas';
             
    function __construct(){
  	parent::__construct();  		
    }
    


 function cadastra_reserva($idreserva,$acervo,$leitor,$data_solicitacao,$data_vencimento){
    $arrayInsert = array(
        'idreserva' => 'null',
        'acervo' => $acervo,
        'leitor' => $leitor,
        'data_solicitacao' => $data_solicitacao,
        'data_vencimento' => $data_vencimento,
        );
     $inserir = $this->db->insert(self::TABELA, $arrayInsert);		
    
    if($inserir){
        
        return true;
    }else{
        return false;
    
    }
 }
function listareservas ($biblioteca) {
             $sql = " SELECT re.*,le.idleitor,le.nome,le.unidade_cadastro,le.matricula, a.titulo,a.tipo, b.descricao,b.idbiblioteca "
                . ", DATEDIFF(CURDATE(), re.data_vencimento) as dias_atraso , ab.idacervo as idacervo_biblioteca "
                . " FROM reservas as re, leitores as le, acervo_biblioteca as ab, acervo as a, biblioteca as b "
                . " WHERE re.leitor = le.idleitor "
                . " AND ab.idacervo = re.acervo "
                . " AND a.idacervo = ab.material "
                . " AND b.idbiblioteca = ab.biblioteca "
                . " AND b.idbiblioteca = $biblioteca ";
        $query = $this->db->query($sql);       
         return $query->result();
    }
    
    
    
    function verifca_reservas($codigo_acervo){
    $sql="SELECT re.idreserva, re.acervo,re.leitor, le.idleitor, le.nome, a.idacervo,a.titulo "
            . " FROM reservas as re, acervo_biblioteca as ab, leitores as le, acervo as a "
            . " WHERE re.acervo = ab.idacervo "
            . " AND ab.material = a.idacervo "
            . " AND re.leitor = le.idleitor "
            . " AND re.acervo = $codigo_acervo";
        
        $query = $this->db->query($sql);        
        if($query->num_rows() > 0 )
        {    
            return $query->result();
        }    
        else            
        {    
            return $query->result();
            
        }
        
    }
    
        function exclui_reserva($idreserva) {
        $this->db->where('idreserva', $idreserva);
        $delete = $this->db->delete(self::TABELA);
        if ($delete)
            return true;
        else
            return false;
    
    
    }
    
    function exclui_todas_reservas() {
               $sql_alterar_status = " UPDATE acervo_biblioteca SET acervo_biblioteca.status = 1 "
                . " WHERE acervo_biblioteca.idacervo "
                . " IN(     "
                . " SELECT acervo FROM reservas WHERE data_vencimento < CURDATE() "
                . " )";
          $query_alterar_status = $this->db->query($sql_alterar_status); 
        if($query_alterar_status){
            
                $sql = "DELETE reservas.*"
               . " FROM acervo_biblioteca,reservas,leitores,acervo  "
               . " WHERE acervo_biblioteca.idacervo = reservas.acervo "
               . " AND leitores.idleitor = reservas.leitor "
               . " AND acervo.idacervo = acervo_biblioteca.material "
               . " AND reservas.data_vencimento < CURDATE()" ;
               $query = $this->db->query($sql); 
//               return true;
                if($query){
                    return true;
                }else{
                    return false;
                }
        }else{
            
            return false;
        }

}
}
?>