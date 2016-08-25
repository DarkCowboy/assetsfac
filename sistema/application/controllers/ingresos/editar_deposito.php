<?php

class Editar_deposito extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model', 'proveedores_model', 'bancos_model'), array('1', '0', '2', '3', '10'));
    }

    public function index($id_operacion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form = $this->input->post();
                $form['id_instruccion'] = $id_operacion;

                if (!$form['existe']) {
                    $proveedor['id_number_proveedor'] = $form['id_number_proveedor'];
                    $proveedor['pre_id_number'] = $form['pre_id_number'];
                    $proveedor['nombre_proveedor'] = $form['nombre_proveedor'];
                    $operacion['id_proveedor'] = $this->proveedores_model->agregar_proveedor($proveedor);
                } else {
                    $operacion['id_proveedor'] = $form['id_proveedor'];
                }

                $operacion_editar = $this->instrucciones_model->get_ingresos_by_id($id_operacion);
                $this->bancos_model->update_corte($operacion_editar, 1);
                $this->bancos_model->update_corte($form);
                $operacion['id_t_operacion'] = 3;
                $operacion['Concepto_pago'] = $form['Concepto_pago'];
                $operacion['detalles_concepto'] = $form['detalles_concepto'];
                $operacion['t_documento'] = $form['t_documento'];
                $operacion['fecha_pago'] = $form['fecha_pago'];
                $operacion['id_banco'] = $form['id_banco'];
                $operacion['t_instrumento'] = $form['t_instrumento'];
                $operacion['total_monto_pagar'] = $form['monto_instruccion'];
                $operacion['n_cheque'] = $form['n_ref'];
                $operacion['status'] = 1;
                $operacion['id_instruccion'] = $id_operacion;
                $this->instrucciones_model->editar_instruccion($operacion);
                $this->load->view('ingresos/editado_correctamente');
            }
        }
    }

}