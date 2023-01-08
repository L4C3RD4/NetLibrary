<?php

class Reservas_leitor_model extends CI_Model{
        
    const TABELA = "reservas";
    
    function __construct() {
        parent::__construct();

    }


     function lista_reservas_leitor($usuario) {
     $sql = "SELECT re.idreserva,re.acervo,re.leitor,re.data_solicitacao,re.data_vencimento, bib.descricao, a.titulo, le.nome as nome_leitor, ab.idacervo as idacervobiblioteca, ab.status, "
             . " DATEDIFF(CURDATE(), data_vencimento) as dias_atraso"
             . " FROM reservas as re, leitores as le, acervo_biblioteca as ab, biblioteca as bib, acervo as a "
             . " WHERE re.leitor=le.idleitor  "
             . " AND ab.idacervo = re.acervo "
             . " AND bib.idbiblioteca = ab.biblioteca "
             . " AND a.idacervo = ab.material "
             . " AND le.idleitor = $usuario ";
             
       $query = $this->db->query($sql);
        return $query->result();
    }

   
}
 ?>