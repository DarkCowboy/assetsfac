<?php

class Procesar extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model', 'registros_model', 'bancos_model'), array('10', '0', '1', '2'));
    }

    public function index($id_instruccion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
            if ($this->input->post()) {
                $form = $this->input->post();
                
                $this->bancos_model->update_corte($this->data['instruccion']);
                            
                $form['status'] = 1;
                $form['id_instruccion'] = $id_instruccion;
                $this->log_procesa($this->data['instruccion']['id_instruccion']);
                $this->instrucciones_model->editar_instruccion($form);
                $this->load->view('egresos/procesado_listo', $this->data);
            } else {

                switch ($this->data['instruccion']['t_instrumento']) {
                    case 'Cheque':
                        $this->load->view('egresos/proce_pago_cheq', $this->data);
                        break;
                    case 'Transferencia':
                        $this->load->view('egresos/proce_pago_trans', $this->data);
                        break;
                    case 'Efectivo':
                        $this->load->view('egresos/proce_pago_efectivo', $this->data);
                        break;
                }
            }
        }
    }

}
