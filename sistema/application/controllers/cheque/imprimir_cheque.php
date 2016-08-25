<?php

class Imprimir_cheque extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model', 'bancos_model', 'proveedores_model'), array('10', '1', '2', '0'));
        $this->data['title'] = 'Comprobante de Egreso';
    }

    public function index($id_instruccion) {
        $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
        $this->descarga_cheque('cheque/imprimir_cheque', $this->data, 'Cheque');
    }


}