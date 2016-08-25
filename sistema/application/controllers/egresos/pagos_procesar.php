<?php

class Pagos_Procesar extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('10', '1', '0', '2'));
        $this->data['title'] = 'Procesar Pagos';
        $this->data['menu'] = 'egresos';
        $this->data['sub_menu'] = 'pagos_procesar';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['instrucciones'] = $this->instrucciones_model->get_instrucciones();
            $this->load->view('egresos/pagos_procesar', $this->data);
        }
    }

}