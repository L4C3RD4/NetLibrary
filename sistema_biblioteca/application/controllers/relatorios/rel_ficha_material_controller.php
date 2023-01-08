<?php

class Rel_ficha_material_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    function index() {
        if ($this->session->userdata('logged_in')) {
            $session_data = $this->session->userdata('logged_in');
            $perfil = $session_data['perfil'];
            if($perfil=="bibliotecario"||$perfil=="auxiliar"){
                
                $this->template->write_view('menu', 'bibliotecario/menu', "", FALSE);
                $this->template->write_view('content', 'relatorios/rel_ficha_material_view', "", FALSE);
                $this->template->render();
            } else {
                redirect('login_controller');
            }
        }
    }

    
    function fichas_material() {
        $biblioteca = $this->input->post('biblioteca');
        $this->load->model('relatorios_model');               
        $resultado = $this->relatorios_model->relatorio_acervo_biblioteca($biblioteca);
        if ($resultado) {
            $conteudo = " ";
               foreach ($resultado as $acervo) {
                       $conteudo .= "<div class='ficha_catalografica'>";
                       $conteudo .= "<table>";
                       $conteudo .= "<tr>";
                       $conteudo .= "<td colspan='2'><img src='".base_url()."utils/img/icone-biblioteca-maior.png' style='width: 52px;'><label>&nbsp;&nbsp;Net Library</label>"
                               . " <br/><b>FICHA CATALOGRÁFICA</b> </td>";
                       $conteudo .= "</tr>";
                       $conteudo .= "<tr>";
                       $conteudo .= "<td colspan='2'><b>Bibioteca</b></td>";
                       $conteudo .= "</tr>";
                       $conteudo .= "<td colspan='2'>".$acervo->descricao.""
                               . " <br>$acervo->logradouro - $acervo->complemento "
                               . " bairro $acervo->bairro , $acervo->municipio "
                               . " $acervo->email , $acervo->telefone </td>";                        
                       $conteudo .= "</tr>";
                       $conteudo .= "<tr>";
                       $conteudo .= "<td><b>Número de Classificação<b></td>";
                       $conteudo .= "<td>".$acervo->assunto."</td>";
                       $conteudo .= "</tr>";
                       $conteudo .= "<td><b>Número de Registro</b></td>";
                       $conteudo .= "<td>".$acervo->codigo_exemplar."</td>";
                       $conteudo .= "</tr>";
                       $conteudo .= "<td><b>Autor</b></td>";
                       $conteudo .= "<td>".$acervo->formato_citacao."</td>";
                       $conteudo .= "</tr>";
                       $conteudo .= "<tr>";
                       $conteudo .= "<td colspan='2'><b>Título</b></td>";
                       $conteudo .= "</tr>";
                       $conteudo .= "<td colspan='2'>".$acervo->titulo."</td>";                        
                       $conteudo .= "</tr>";
                       $conteudo .= "</table>";
                       $conteudo .= "</div> &nbsp;&nbsp;";
                }                  
                echo $conteudo;                   
        }          
        else {
            if(empty($resultado)){
               $conteudo = " ";
               $conteudo .= "<tr>";
               $conteudo .= "<td colspan='9'><center>Não existem materiais cadastros com esses filtros</center></td>";
               $conteudo .= "</tr>";
               echo $conteudo;                     
            }
            else
            {    
                $mensagem = array('tipo' => 'error');
                echo json_encode($mensagem);
            }
        }
    }
    
      
}

?>