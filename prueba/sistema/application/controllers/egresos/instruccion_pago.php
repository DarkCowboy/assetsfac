<?php

class Instruccion_pago extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model', 'bancos_model', 'proveedores_model'), array('10', '1', '2', '0'));
        $this->data['title'] = 'Instruccion de Pago';
    }

    public function index($id_instruccion) {
        $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
        $this->data['usuarios'] = $this->log_model->get_usuario_by_id($id_instruccion);
        $this->descarga('egresos/instruccion_pago', $this->data, 'Instruccion de Pago');
    }

}
