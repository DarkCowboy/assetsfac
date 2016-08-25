<?php

class Ingresar_Deposito extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model', 'instrucciones_model'), array('0', '1', '2', '10'));
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $form = $this->input->post();
            if ($form['concepto'] == 'Deposito') {
                $form['concepto'] = 'DEP' . $form['n_ref'];
            }
            
            
            $this->bancos_model->update_corte($form);
            
            $operacion['id_banco'] = $form['id_banco'];
            $operacion['total_monto_pagar'] = $form['saldo'];
            $operacion['id_t_operacion'] = 3;
            $operacion['fecha_pago'] = $form['fecha'];
            $operacion['n_cheque'] = $form['n_ref'];
            $operacion['Concepto_pago'] = $form['concepto'];

            $this->instrucciones_model->agregar_instruccion($operacion);
            
            
            $this->session->set_flashdata('result', 'El Deposito/Transferencia se ha Registrado correctamente');
            redirect('./bancos/panel_bancos', 'location');
            
        }
    }

}