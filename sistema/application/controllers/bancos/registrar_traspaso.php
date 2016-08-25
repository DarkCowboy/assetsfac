<?php

class Registrar_traspaso extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model', 'traspasos_model', 'registros_model', 'instrucciones_model'), array('10', '1', '0', '2'));
        $this->data['menu'] = 'bancos';
        $this->data['sub_menu'] = 'registrar_traspaso';
    }

    public function index() {
        if ($this->centinela) {
            if ($this->rol) {
                if ($this->input->post()) {
                    $form = $this->input->post();

                    $emisor['id_banco'] = $form['id_banco_emisor'];
                    $emisor['id_banco_receptor'] = $form['id_banco_receptor'];
                    $emisor['total_monto_pagar'] = $form['total_monto_pagar'];
                    $emisor['t_instrumento'] = $form['t_instrumento'];
                    $emisor['detalles_concepto'] = $form['detalles_concepto'];
                    $emisor['id_t_operacion'] = 2;
                    $emisor['fecha_pago'] = $form['fecha_pago'];
                    $emisor['n_cheque'] = $form['n_cheque'];
                    $emisor['traspaso'] = 1;
                    $emisor['status'] = 1;

                    $this->instrucciones_model->agregar_traspaso($emisor);

                    $this->bancos_model->update_corte($emisor);
                    
                    $receptor = $emisor;
                    $receptor['id_t_operacion'] = 3;
                    $receptor['id_banco'] = $form['id_banco_receptor'];
                    $receptor['id_banco_receptor'] = 0;
                    $this->instrucciones_model->agregar_ingreso($receptor);

                    $this->bancos_model->update_corte($receptor);
                    

                    $this->session->set_flashdata('result', 'La el traspaso fue registrado correctamente');
                    redirect('./bancos/registrar_traspaso', 'location');
                }
                $this->data['bancos'] = $this->bancos_model->get_bancos();
                $this->load->view('bancos/registrar_traspaso', $this->data);
            }
        }
    }

}
