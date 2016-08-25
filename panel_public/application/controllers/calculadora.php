<?php

class Calculadora extends MY_Controller {

    private $data = array();

    public function __construct() {

        parent::__construct(array('clientes_model', 'pla_inscrip_model', 'cupos_model', 'facturas_model', 'config_model', 'pagare_model', 'prestamo_model'));
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');

        if ($this->session->userdata('logged_in_cliente')) {
            $this->data['user_name'] = $this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
        }
        $this->data['menu'] = 'home';
        //verificacion de planillas
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['tipo'] = $this->session->userdata['user_data_cliente']['tipo'];
            $id_cliente = $this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['pagare'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            if ($id_pj != null) {
                $x = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
                if (count($x > 0)) {
                    $this->data['planilla'] = $x;
                }
                $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
                // $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
                $accionistas = $this->data['planilla']['nomina_accionista'];
                // debug($accionistas);
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
                //debug($accionistas);
                $this->data['accionistas'] = $accionistas;
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            }

            //confirmo si tiene cupo activo para la venta de facturas
            $cupo_activo = $this->cupos_model->get_cupos($id_cliente);
            if (count($cupo_activo) > 0) {
                foreach ($cupo_activo as $row2) {
                    if ($row2['status'] == 2) {
                        $this->data['cupo_activo'] = true;
                        break;
                    } else {
                        $this->data['cupo_activo'] = false;
                    }
                }
            } else {
                $this->data['cupo_activo'] = false;
            }
        }
        if ($this->data['tipo'] == 0) {
            $valida_planilla_pn = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
            if ($valida_planilla_pn) {
                $this->data['planilla'] = $valida_planilla_pn;
                $this->data['id_pn'] = $valida_planilla_pn['id_pn'];
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones_pn($id_cliente);
            }
        }
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->load->view('calculadora/calculadora_pago', $this->data);
        }
    }

}