<?php

class listar_contrapartes extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('proveedores_model'), array('1', '10', '2', '0'));
        $this->data['menu'] = 'contrapartes';
        $this->data['sub_menu'] = 'listar_contrapartes';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['lista_contrapartes'] = $this->proveedores_model->get_proveedores();
            $this->load->view('contrapartes/listar_contrapartes', $this->data);
        }
    }

    public function desabilitar_contraparte($id_proveedor) {
        $result = $this->proveedores_model->desabilitar($id_proveedor);
        if ($result) {
            $this->session->set_flashdata('result', 'Se desabilito correctamente al contraparte');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al contraparte');
        }
        redirect('./contrapartes/listar_contrapartes/', 'location');
    }

    public function habilitar_contraparte($id_proveedor) {
        $result = $this->proveedores_model->habilitar($id_proveedor);
        if ($result) {
            $this->session->set_flashdata('result', 'Se habilito correctamente al contraparte');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al contraparte');
        }
        redirect('./contrapartes/listar_contrapartes/', 'location');
    }

    public function eliminar_contraparte($id_proveedor) {
        $result = $this->proveedores_model->eliminar($id_proveedor);
        if ($result) {
            $this->session->set_flashdata('result', 'Se elimino correctamente al contraparte');
        } else {
            $this->session->set_flashdata('result', 'No se han realizado cambios al contraparte');
        }
        redirect('./contrapartes/listar_contrapartes/', 'location');
    }

}
