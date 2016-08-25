<?php

class listar_Usuarios extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('10', '0'));
        $this->data['menu'] = 'usuarios';
        $this->data['sub_menu'] = 'listar_usuarios';
    }

    public function index() {
        $this->data['menu_top'] = 'usuarios';
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['lista_usuario'] = $this->users_model->get_users();
            $this->load->view('usuarios/listar_usuarios', $this->data);
        }
    }

}
