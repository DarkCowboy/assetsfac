<?php

class Registrar_traspaso extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model', 'traspasos_model', 'registros_model', 'instrucciones_model'), array('10', '1', '0', '2'));
        $this->data['menu_top'] = 'traspasos';
    }

    public function index() {
        if ($this->centinela) {
            if ($this->rol) {
                if ($this->input->post()) {
                    $form = $this->input->post();
//                    debug($form);
                    ////                    SE GUARDA EL TRASPASO EN LA TABLA
//                    DE TRASPASOS Y SE OBTIENE EL ID DE LA OPERACION
//                    $registro['id_operacion'] = $this->traspasos_model->add_traspaso();
//                    SE AGREGEGA UNA VARIABLE CON EL TIPO DE OPERACION
//                    TRASPASO PARA GUARDAR EL REGISTRO EN LA TABLA PARA Y
//                    ASI OBTENER EL ID DEL REGISTRO 
//                    $registro['t_operacion'] = 'traspaso';
//                    $id_registro = $this->registros_model->add_registro($registro);
//                    SE AGREGA AHORA LOS MOVIMIENTOS DE LA CUENTA
//                    COMO ES UN TRASPASO EXISTEN 2 MOVIMIENTOS 
//                    EL DE ENTRADA Y EL DE SALIDA

                    $emisor['id_banco'] = $form['id_banco_emisor'];
                    $emisor['id_banco_receptor'] = $form['id_banco_receptor'];
                    $emisor['total_monto_pagar'] = $form['total_monto_pagar'];
                    $emisor['Concepto_pago'] = $form['Concepto_pago'];
                    $emisor['id_t_operacion'] = 2;
                    $emisor['fecha_pago'] = $form['fecha_pago'];
                    $emisor['n_cheque'] = $form['n_cheque'];
                    $emisor['status'] = 1;

                    $this->instrucciones_model->agregar_traspaso($emisor);

                    $receptor = $emisor;
                    $receptor['id_t_operacion'] = 3;

                    $this->instrucciones_model->agregar_ingreso($receptor);

                    $this->session->set_flashdata('result', 'La el traspaso fue registrado correctamente');
                    redirect('./traspasos/panel_traspaso/main', 'location');
                }
                $this->data['bancos'] = $this->bancos_model->get_bancos();
                $this->load->view('traspasos/registrar_traspaso', $this->data);
            }
        }
    }

}
