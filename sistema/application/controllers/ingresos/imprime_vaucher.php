<?php

class Imprime_Vaucher extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('0', '1', '2', '3', '10'));
    }

    public function index($id_operacion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['operacion'] = $this->instrucciones_model->get_ingresos_by_id($id_operacion);
            $this->data['usuarios'] = $this->log_model->get_usuario_by_id($id_operacion);

            $this->descarga('ingresos/imprime_vaucher', $this->data, 'Vaucher de ingreso');
        }
    }

}
