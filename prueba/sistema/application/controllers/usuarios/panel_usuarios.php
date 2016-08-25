<?php

class Panel_Usuarios extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('10', '0'));
        $this->data['title'] = 'Nomina MsFactoring - Usuarios';
    }

    public function index() {
        $this->data['menu_top'] = 'usuarios';
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['lista_usuario'] = $this->users_model->get_users();
            $this->load->view('usuarios/panel_usuarios', $this->data);
        }
    }

    public function crear_usuario() {
        $this->data['menu_top'] = 'usuarios';
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }

            if ($this->session->flashdata('errors')) {
                $this->data['error'] = $this->session->flashdata('errors');
            }
            $this->data['list_rol'] = $this->users_model->get_rols();
            $this->load->view('usuarios/crear_usuario', $this->data);
        }
    }

}