<?php

class Editar_Instruccion extends MY_Controller {

    private $data = Array();

    public function __construct() {
        parent::__construct(array('instrucciones_model', 'bancos_model', 'proveedores_model'), array('10', '1', '2', '0'));
        $this->data['title'] = 'Editar Instruccion';
    }

    public function index($id_instruccion) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form = $this->input->post();
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
                $instruccion['Concepto_pago'] = $form['Concepto_pago'];
                $instruccion['t_documento'] = $form['t_documento'];
                $instruccion['fecha_pago'] = $form['fecha_pago'];
                $instruccion['id_banco'] = $form['id_banco'];
                $instruccion['t_instrumento'] = $form['t_instrumento'];
                $instruccion['monto_instruccion'] = $form['monto_instruccion'];
                $instruccion['total_monto_pagar'] = $form['total_monto_pagar'];
                $instruccion['n_cheque'] = $form['n_cheque'];
                $instruccion['iva'] = $form['iva'];
                $instruccion['id_instruccion'] = $id_instruccion;
                $this->instrucciones_model->editar_instruccion($instruccion);
                
                $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
                $this->log_edita($this->data['instruccion']['id_instruccion']);
                
                $this->session->set_flashdata('result', 'La instruccion se ha Editado correctamente');
                redirect('./instruccion_pago/panel_instrucciones/main', 'location');
            }
            $this->data['menu_top'] = 'instruccion';
            $this->data['bancos'] = $this->bancos_model->get_bancos();
            $this->data['proveedores'] = $this->proveedores_model->get_proveedores();
            $this->data['instruccion'] = $this->instrucciones_model->get_instrucciones_by_id($id_instruccion);
            $this->load->view('instruccion_pago/editar_instruccion', $this->data);
        }
    }

}