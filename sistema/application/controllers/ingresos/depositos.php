<?php

class Depositos extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model','proveedores_model'), array('0', '1', '2', '10'));
        $this->data['title'] = 'Depositos / Transferencias';
        $this->data['menu'] = 'ingresos';
        $this->data['sub_menu'] = 'depositos';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['cuentas_ingresos'] = $this->config_model->get_cuentas_ingresos();
            $this->data['bancos'] = $this->bancos_model->get_bancos();
            $this->data['proveedores'] = $this->proveedores_model->get_proveedores();
            $this->data['lista_bancos'] = $this->bancos_model->get_bancos();
            $this->load->view('ingresos/depositos', $this->data);
        }
    }

}