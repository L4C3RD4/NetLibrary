<?php

class Contato_controller extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Sao_Paulo');
    }

    function index() {
        $this->template->write_view('menu', "menu_pesquisa", "", FALSE);
        $this->template->write_view('content','contato_view',"",FALSE);
        $this->template->render();
    }

}

