<?php

class Crear_Contraparte extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('proveedores_model'), array('10', '0', '1', '2'));
            $this->data['menu'] = 'contrapartes';
        $this->data['sub_menu'] = 'agregar_contraparte';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'proveedores';
            $this->load->view('contrapartes/crear_contraparte', $this->data);
        }
    }

}
