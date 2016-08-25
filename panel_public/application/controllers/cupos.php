<?php

class Cupos extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('cupos_model', 'pla_inscrip_model', 'config_model', 'facturas_model','prestamo_model','pagare_model'));
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['tipo'] = @$this->session->userdata['user_data_cliente']['tipo'];
            $id_cliente = $this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['pagare'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            if ($this->session->userdata('logged_in_cliente')) {
                $this->data['user_name'] = @$this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
                $this->data['id_cliente'] = @$this->session->userdata['user_data_cliente']['id_cliente'];
            }
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $accionistas = $this->data['planilla']['nomina_accionista'];

            if (count($accionistas) > 0) {
                foreach ($accionistas as &$row) {
                    $row['ficha_pn_pj'] = $this->pla_inscrip_model->get_ficha_pn_pj($row['id_nom_accionista']);
                    if (!$row['ficha_pn_pj']) {
                        $row['ficha_pn_pj'] = $this->pla_inscrip_model->get_planilla_pn_cedula($row['cedula_na']);
                    }
                    if (count($row['ficha_pn_pj']) > 0) {
                        $this->data['falta_ficha'] = '1';
                    } else {
                        $this->data['falta_ficha'] = '0';
                    }
                }
            } else {
                $this->data['falta_ficha'] = '0';
            }
            $this->data['accionistas'] = $accionistas;
        }
        //confirmo si tiene cupo activo para la venta de facturas

        $cupo_activo = $this->cupos_model->get_cupos($id_cliente);
        if (count($cupo_activo) > 0) {
            foreach ($cupo_activo as $row) {
                if ($row['status'] == 2) {
                    $this->data['cupo_activo'] = true;
                    break;
                } else {
                    $this->data['cupo_activo'] = false;
                }
            }
        } else {
            $this->data['cupo_activo'] = false;
        }
        $this->data['menu'] = 'cupo';
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function panel_cupos() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['solicitudes'] = $this->cupos_model->get_cupos($id_cliente);
            $this->load->view('panel_cupos/panel_cupos', $this->data);
        }
    }

    public function nueva_solicitud($id_solicitud = null) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->input->post()) {
                $form = $this->input->post();
                $form['id_cliente'] = @$this->session->userdata['user_data_cliente']['id_cliente'];
                $form['id_pj'] = $this->pla_inscrip_model->get_id_pj($form['id_cliente']);
                $form['monto_solicitud'] = str_replace('.', '', $form['monto_solicitud']);
                $form['monto_solicitud'] = str_replace(',', '.', $form['monto_solicitud']);
                $this->cupos_model->nuevo_cupo($form);
//                $this->load->view('redirect', array('destino' => base_url() . '/cupos/panel_cupos'));
                redirect('./welcome/status_solicitudes', 'location');
            }
            $this->data['rollover'] = $id_solicitud;
            $this->load->view('panel_cupos/nueva_solicitud', $this->data);
        }
    }

    public function planilla_solicitud_cupo($id_solicitud) {
        $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
        $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
        $this->descarga('planillas/solicitud_cupo', $this->data, 'solicitud de cupo.pdf');
    }

//    public function solicitud_de_venta_planilla($id_solicitud) {
//        $this->data['planilla'] = $this->cupos_model->get_solicitud_venta($id_solicitud);
//        $this->data['facturas'] = $this->facturas_model->get_facturas($this->data['planilla']['id_solicitud']);
//        $this->descarga('planillas/solicitud_venta', $this->data, 'solicitud de cupo.pdf');
//    }

    public function solicitud_de_venta_planilla($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_solicitud_venta($id_solicitud);
                if($this->data['planilla']['rollover']>0){
                    $this->data['rollover'] = $this->cupos_model->get_solicitud_venta($this->data['planilla']['rollover']);
                }
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->data['cupo_activo'] = $this->cupos_model->get_cupo_activo($this->data['planilla']['id_pj']);
            $this->data['facturas'] = $this->facturas_model->get_facturas($this->data['planilla']['id_solicitud']);
            $this->descarga('planillas/solicitud_venta', $this->data, 'solicitud de venta.pdf');
        }
    }
    
}