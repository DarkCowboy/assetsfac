<?php

class Elimina_Ingreso extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model','instrucciones_model'), array('10','0'));
    }

    public function index($id_operacion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $operacion_eliminar = $this->instrucciones_model->get_ingresos_by_id($id_operacion);
            $this->bancos_model->update_corte($operacion_eliminar, 1);
            $this->instrucciones_model->eliminar_instruccion($id_operacion);
            $this->load->view('ingresos/editado_correctamente');
        }
    }

}