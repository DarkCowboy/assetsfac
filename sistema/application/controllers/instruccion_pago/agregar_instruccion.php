<?php

class Agregar_Instruccion extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model', 'proveedores_model', 'instrucciones_model'), array('10', '1', '2', '0'));
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $form = $this->input->post();
            $form['id_t_operacion'] = 1;
            
            
            if (!$form['existe']) {
                $proveedor['id_number_proveedor'] = $form['id_number_proveedor'];
                $proveedor['nombre_proveedor'] = $form['nombre_proveedor'];
                $instruccion['id_proveedor'] = $this->proveedores_model->agregar_proveedor($proveedor);
            } else {
                $instruccion['id_proveedor'] = $form['id_proveedor'];
            }
            if ($form['t_instrumento'] == 'Efectivo' and $form['moneda'] == 'VEF') {
                $form['id_banco'] = -2;
            } else if ($form['t_instrumento'] == 'Efectivo' and $form['moneda'] == 'USD') {
                $form['id_banco'] = -1;
            }
            $instruccion['id_t_operacion'] = 1;
            $instruccion['Concepto_pago'] = $form['Concepto_pago'];
            $instruccion['t_documento'] = $form['t_documento'];
            $instruccion['fecha_pago'] = $form['fecha_pago'];
            $instruccion['id_banco'] = $form['id_banco'];
            $instruccion['t_instrumento'] = $form['t_instrumento'];
            $instruccion['monto_instruccion'] = $form['monto_instruccion'];
            $instruccion['total_monto_pagar'] = $form['total_monto_pagar'];
            $instruccion['n_cheque'] = $form['n_cheque'];
            $instruccion['iva'] = $form['iva'];
            $id_instruccion = $this->instrucciones_model->agregar_instruccion($instruccion);
            $this->log_crear($id_instruccion);
            $this->session->set_flashdata('result', 'La instruccion se ha agregado correctamente');
            redirect('./instruccion_pago/panel_instrucciones/main', 'location');
        }
    }

}