<?php

class Panel_Proveedores extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('proveedores_model'), array('1', '10', '2', '0'));
        $this->data['title'] = 'Proveedores';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'proveedores';
            $this->data['lista_proveedores'] = $this->proveedores_model->get_proveedores();
            $this->load->view('proveedores/panel_proveedores', $this->data);
        }
    }

    public function main() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'proveedores';
            $this->data['lista_proveedores'] = $this->proveedores_model->get_proveedores();
            $this->load->view('proveedores/index', $this->data);
        }
    }

    public function desabilitar_proveedor($id_proveedor) {
        $result = $this->proveedores_model->desabilitar($id_proveedor);
        if ($result) {
            $this->session->set_flashdata('result', 'Se desabilito correctamente al Usuario');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al Usuario');
        }
        redirect('./proveedores/panel_proveedores/', 'location');
    }

    public function habilitar_proveedor($id_proveedor) {
        $result = $this->proveedores_model->habilitar($id_proveedor);
        if ($result) {
            $this->session->set_flashdata('result', 'Se habilito correctamente al Usuario');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al Usuario');
        }
        redirect('./proveedores/panel_proveedores/', 'location');
    }

    public function eliminar_proveedor($id_proveedor) {
        $result = $this->proveedores_model->eliminar($id_proveedor);
        if ($result) {
            $this->session->set_flashdata('result', 'Se elimino correctamente al Usuario');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al Usuario');
        }
        redirect('./proveedores/panel_proveedores/', 'location');
    }

}