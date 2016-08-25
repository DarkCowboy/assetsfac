<?php

class Pagos_Procesados extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('10', '1', '0', '2'));
        $this->data['title'] = 'Pagos Procesados';
        $this->data['menu_top'] = 'pagos_procesados';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['instrucciones'] = $this->instrucciones_model->get_instrucciones_procesadas();
            $this->load->view('egresos/pagos_procesados',$this->data);
        }
    }

}