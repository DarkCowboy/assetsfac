<?php

class Editar_Proveedor extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('proveedores_model'), array('10', '1', '2', '0'));
        $this->data['title'] = 'Editar Beneficiarios';
    }

    public function index($id_proveedor) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'proveedores';
            if ($this->input->post()) {
                $form = $this->input->post();
                $form['id_proveedor'] = $id_proveedor;
                $this->proveedores_model->editar_proveedor($form);
                $this->session->set_flashdata('result', 'El Beneficiario se ha Editado correctamente');
                redirect('./proveedores/panel_proveedores/main', 'location');
            }
            $this->data['proveedor'] = $this->proveedores_model->get_proveedor_by_id($id_proveedor);
            $this->load->view('proveedores/editar_proveedor', $this->data);
        }
    }



}