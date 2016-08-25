<?php

class Ver_Operacion extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model','bancos_model','proveedores_model'), array('0', '1', '2', '3', '10'));
    }

    public function index($id_instruccion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'bancos';
            $this->data['cuentas_ingresos'] = $this->config_model->get_cuentas_ingresos();
            $this->data['bancos'] = $this->bancos_model->get_bancos();
            $this->data['proveedores'] = $this->proveedores_model->get_proveedores();
            $this->data['lista_bancos'] = $this->bancos_model->get_bancos();
            $this->data['operacion'] = $this->instrucciones_model->get_ingresos_by_id($id_instruccion);
            $this->load->view('ingresos/ver_operacion', $this->data);
        }
    }

}