<?php

class Egresos_Actuales extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('0','1', '2', '3', '10'));
        $this->data['menu'] = 'egresos';
        $this->data['sub_menu'] = 'egresos_actuales';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['egresos'] = $this->instrucciones_model->consulta_egresos_actuales();
            $this->load->view('egresos/egresos_actuales', $this->data);
        }
    }

}