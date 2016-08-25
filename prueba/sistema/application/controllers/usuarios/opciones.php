<?php

class Opciones extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('10', '0'));
        $this->data['title'] = 'Nomina MsFactoring - Usuarios';
    }

    public function index() {
        
    }

    public function cambiar_calve($codigo = null) {
        $this->data['menu_top'] = 'usuarios';
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $result = $this->users_model->cambia_password();
                if ($result) {
                    $this->session->set_flashdata('result', 'Se ha cambiado la contraseña correctamente');
                    redirect('./usuarios/listar_usuarios/', 'location');
                } else {
                    $this->session->set_flashdata('result', 'Error en el cambio por favor refresque la pagina e intentelo de nuevo');
                    redirect('./usuarios/listar_usuarios/', 'location');
                }
            }
            $this->data['codigo'] = $codigo;
            $this->load->view('usuarios/cambio_clave', $this->data);
        }
    }

    public function habilitar($codigo) {
        $result = $this->users_model->habilitar($codigo);
        if ($result) {
            $this->session->set_flashdata('result', 'Se habilito correctamente al Usuario');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al Usuario');
        }
        redirect('./usuarios/listar_usuarios/', 'location');
    }

    public function inabilitar($codigo) {
        $result = $this->users_model->inabilitar($codigo);
        if ($result) {
            $this->session->set_flashdata('result', 'Se inabilito correctamente al Usuario');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al Usuario');
        }
        redirect('./usuarios/listar_usuarios/', 'location');
    }

    public function eliminar($codigo) {
        $result = $this->users_model->eliminar($codigo);
        if ($result) {
            $this->session->set_flashdata('result', 'Se ha eliminado correctamente al Usuario');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al Usuario');
        }
        redirect('./usuarios/listar_usuarios/', 'location');
    }

}