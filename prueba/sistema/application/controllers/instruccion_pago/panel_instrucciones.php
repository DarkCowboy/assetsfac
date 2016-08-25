<?php

class panel_instrucciones extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model'), array('0', '1', '10', '2'));
        $this->data['title'] = 'Instrucciones de Pagos MsFactoring';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['instrucciones'] = $this->instrucciones_model->get_instrucciones();
            $this->data['menu_top'] = 'instruccion';
            $this->load->view('instruccion_pago/panel_instrucciones', $this->data);
        }
    }

    public function main() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'instruccion';
            $this->load->view('instruccion_pago/index', $this->data);
        }
    }

    public function eliminar_instruccion($id_instruccion) {
        $this->instrucciones_model->eliminar_instruccion($id_instruccion);
        
        $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
        $this->log_elimina($this->data['instruccion']['id_instruccion']);

        $this->session->set_flashdata('result', 'La instruccion se ha Eliminado correctamente');
        redirect('./instruccion_pago/panel_instrucciones/', 'location');
    }

}
