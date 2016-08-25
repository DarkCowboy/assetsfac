<?php

class Agregar_banco extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model', 'instrucciones_model'), array('10', '1', '0', '2'));
        $this->data['title'] = 'Bancos';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $banco = $this->input->post();
            $form = $banco;
            unset($banco['saldo_actual']);
            unset($banco['codigo']);
            $id_banco = $this->bancos_model->guardar_banco($banco);
            $form['id_banco'] = $id_banco;
            $operacion['id_banco'] = $id_banco;
            $operacion['total_monto_pagar'] = $form['saldo_actual'];
            $operacion['id_t_operacion'] = 3;
            $operacion['detalles_concepto'] = 'Saldo de Inicio de Cuenta';
            $operacion['n_cheque'] = '0';

            $this->instrucciones_model->agregar_instruccion($operacion);
            $this->bancos_model->update_corte($form);

            $this->session->set_flashdata('result', 'El Banco se ha agregado correctamente');
            redirect('./bancos/listar_bancos', 'location');
        }
    }

}