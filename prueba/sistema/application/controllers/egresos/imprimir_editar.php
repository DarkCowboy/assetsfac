<?php

class Imprimir_Editar extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('0', '1', '10', '2'));
        $this->data['title'] = 'Instrucciones de Pagos';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['instrucciones'] = $this->instrucciones_model->get_instrucciones();
            $this->data['menu_top'] = 'instruccion';
            $this->load->view('egresos/imprimir_editar', $this->data);
        }
    }
}