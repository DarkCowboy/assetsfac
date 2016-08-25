<?php

class Editar_Permiso extends My_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('10', '0'));
        $this->data['menu'] = 'usuarios';
        $this->data['sub_menu'] = 'crear_usuario';
    }

    public function index($codigo = null) {
        $this->data['menu_top'] = 'usuarios';
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form['id_rol'] = $this->input->post('id_rol');
                $form['code'] = $this->input->post('code');

                $result = $this->users_model->edita_usr_sin_pass($form);
                if ($result) {
                    $this->session->set_flashdata('result', 'Se ha Editado el Usuario correctamente');
                    redirect('./usuarios/listar_usuarios/', 'location');
                } else {
                    $this->session->set_flashdata('result', 'Error en el cambio por favor refresque la pagina e intentelo de nuevo');
                    redirect('./usuarios/listar_usuarios/', 'location');
                }
            }
            $this->data['list_rol'] = $this->users_model->get_rols();
            $this->data['usuario'] = $this->users_model->get_by_code($codigo);
            $this->load->view('usuarios/editar_permiso', $this->data);
        }
    }

}
