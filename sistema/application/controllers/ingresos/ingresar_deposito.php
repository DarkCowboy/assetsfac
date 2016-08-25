<?php

class Ingresar_Deposito extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model', 'instrucciones_model','proveedores_model'), array('0', '1', '2', '10'));
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $form = $this->input->post();
            $form['id_t_operacion'] = 3;
            $form['total_monto_pagar'] = $form['monto_instruccion'];

            if (!$form['existe']) {
                $proveedor['id_number_proveedor'] = $form['id_number_proveedor'];
                $proveedor['pre_id_number'] = $form['pre_id_number'];
                $proveedor['nombre_proveedor'] = $form['nombre_proveedor'];
                $operacion['id_proveedor'] = $this->proveedores_model->agregar_proveedor($proveedor);
            } else {
                $operacion['id_proveedor'] = $form['id_proveedor'];
            }
            
            
            $this->bancos_model->update_corte($form);
            
            $operacion['id_t_operacion'] = 3;
            $operacion['detalles_concepto'] = $form['detalles_concepto'];
            $operacion['t_documento'] = $form['t_documento'];
            $operacion['fecha_pago'] = $form['fecha_pago'];
            $operacion['id_banco'] = $form['id_banco'];
            $operacion['t_instrumento'] = $form['t_instrumento'];
            $operacion['total_monto_pagar'] = $form['monto_instruccion'];
            $operacion['n_cheque'] = $form['n_ref'];
            $operacion['status'] = 1;
            

            $this->instrucciones_model->agregar_instruccion($operacion);
            
            
            $this->session->set_flashdata('result', 'El Deposito/Transferencia se ha Registrado correctamente');
            redirect('./ingresos/depositos', 'location');
            
        }
    }

}