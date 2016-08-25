<?php

class Ver_Pago extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('10', '0', '1', '2'));
        $this->data['title'] = 'Pagos Procesados';
        $this->data['menu_top'] = 'pagos_procesados';
    }

    public function index($id_instruccion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
            $this->load->view('egresos/ver_pago', $this->data);
        }
    }

}