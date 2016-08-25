<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reportes extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('users_model', 'config_model', 'clientes_model', 'personas_model', 'empresa_model', 'pla_inscrip_model', 'cupos_model', 'pagare_model', 'facturas_model', 'reclasificacion_model'));


        if ($this->session->userdata('logged_in')) {
            $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];
        }

        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
    }

    public function index($tipo) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            switch ($tipo){
                case 1:
                    $tipo = 'reporte_vencimiento';
                    break;
                case 2:
                    $tipo = 'reporte_cliente_vcto';
                    break;
                case 3:
                    $tipo = 'reporte_tipo_vcto';
                    break;
                case 4:
                    $tipo = 'cartera_actual';
                    break;
            }
            $this->data['tipo'] = $tipo;
            $this->load->view('reportes', $this->data);
        }
    }

    public function reporte_vencimiento() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['operaciones'] = $this->cupos_model->get_operaciones_reportes_vcto();
            $this->descarga_reporte('reportes/reporte_vencimiento', $this->data, 'Reporte_Vencimiento.pdf');
        }
    }
    
    public function cartera_actual() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['operaciones'] = $this->cupos_model->get_operaciones_reportes_vcto();
            $this->descarga_reporte('reportes/cartera_actual', $this->data, 'Reporte_Vencimiento.pdf');
        }
    }
    
    public function reporte_cliente_vcto() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['operaciones'] = $this->cupos_model->get_operaciones_reportes_cliente_vcto();
            $this->descarga_reporte('reportes/reporte_cliente_vencimiento', $this->data, 'Reporte_Cliente_Vencimiento.pdf');
        }
    }
    public function reporte_tipo_vcto() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['operaciones'] = $this->cupos_model->get_operaciones_reportes_tipo_vcto();
            $this->descarga_reporte('reportes/reporte_tipo_vencimiento', $this->data, 'Reporte_Tipo_Vencimiento.pdf');
        }
    }

    public function prueba() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['operaciones'] = $this->cupos_model->get_operaciones_reportes();
            $this->descarga_reporte('reportes/reporte_cliente_vencimiento', $this->data, 'Reporte_Cliente_Vencimiento.pdf');
        }
    }

}