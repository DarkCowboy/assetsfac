<?php

class Ingresos_Actuales extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('0','1', '2', '3', '10'));
        $this->data['menu'] = 'ingresos';
        $this->data['sub_menu'] = "ingresos_actuales";
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['ingresos'] = $this->instrucciones_model->consulta_ingresos_actuales();
            $this->load->view('ingresos/ingresos_actuales', $this->data);
        }
    }

}