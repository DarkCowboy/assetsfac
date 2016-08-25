<?php

class Crear_Usuario extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('10', '0'));
        $this->data['menu'] = 'usuarios'; 
        $this->data['sub_menu'] = 'crear_usuario'; 
    }

    public function index() {
        $this->data['menu_top'] = 'usuarios';
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $result = $this->users_model->crear_nuevo();
                if ($result) {
                    $this->session->set_flashdata('result', 'El usuario fue creado correctamente');
                    redirect('./usuarios/listar_usuarios', 'lacation');
                } else {
                    $this->session->set_flashdata('result', 'El nombre de usuario ingresado ya existe');
                    redirect('./usuarios/crear_usuario', 'location');
                }
            } else {
                $this->data['list_rol'] = $this->users_model->get_rols();
                $this->load->view('usuarios/crear_usuario', $this->data);
            }
        }
    }

}
