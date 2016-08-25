<?php

class Pagare extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('cupos_model', 'pla_inscrip_model', 'config_model', 'pagare_model', 'prestamo_model'));
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

            if ($this->data['tipo'] == 1) {
                $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
                $this->data['id_pj'] = $id_pj;
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
            } else {
                $valida_planilla_pn = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
                if ($valida_planilla_pn) {
                    $this->data['planilla'] = $valida_planilla_pn;
                    $this->data['id_pn'] = $valida_planilla_pn['id_pn'];
                }
            }
        }


        $this->data['menu'] = 'pagare';
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function panel_pagare() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['solicitudes'] = $this->pagare_model->get_pagare($this->data['id_cliente']);
            $this->load->view('pagare/panel_pagare', $this->data);
        }
    }

    public function nuevo_pagare() {
        if ($this->input->post()) {
            $form = $this->input->post();
            $form['id_cliente'] = $this->data['id_cliente'];
            $form['tipo_solicitud'] = 3;
            $form['monto_solicitud'] = str_replace('.', '', $form['monto_solicitud']);
            $form['monto_solicitud'] = str_replace(',', '.', $form['monto_solicitud']);
            if ($this->data['tipo'] == 1) {
                $form['id_pj'] = $this->data['id_pj'];
            } else {
                $form['id_pn'] = $this->data['id_pn'];
            }
            $this->pagare_model->save_pagare($form);
            $this->load->view('redirect', array('destino' => base_url() . 'pagare/panel_pagare'));
        }
        if ($this->data['tipo'] == 1) {
            $this->load->view('pagare/nuevo_pagare', $this->data);
        } else {
            $this->load->view('pagare/nuevo_pagare_pn', $this->data);
        }
    }

    public function descarga_solicitud_pagare($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->data['tipo'] == 1) {
                $this->data['planilla'] = $this->pagare_model->get_pagare_by_id_planilla($id_solicitud, '');
                if ($this->data['planilla']['rollover'] > 0) {
                    $this->data['rollover'] = $this->cupos_model->get_solicitud_pagare($this->data['planilla']['rollover']);
                }
                $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
                $this->descarga('planillas/solicitud_pagare', $this->data, 'solicitud de pagare.pdf');
            } else {
                $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn($this->data['id_cliente']);
                $this->data['solicitud'] = $this->pagare_model->pagare_pn_by_id($id_solicitud);
                if ($this->data['solicitud']['rollover'] > 0) {
                    $this->data['rollover'] = $this->cupos_model->get_solicitud_pagare($this->data['solicitud']['rollover']);
                }
                $this->descarga('planillas/solicitud_pagare_pn', $this->data, 'solicitud de pagare.pdf');
            }
        }
    }

    public function refinanciar($id_solicitud = null) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $id_cliente = $this->data['id_cliente'];

            if ($id_solicitud == null) {
                if ($this->input->post()) {
                    $form = $this->input->post();
                    $form['id_cliente'] = $this->data['id_cliente'];
                    $form['tipo_solicitud'] = 3;
                    if ($this->data['tipo'] == 1) {
                        $form['id_pj'] = $this->data['id_pj'];
                    } else {
                        $form['id_pn'] = $this->data['id_pn'];
                    }
                    unset($form['abonar_op']);
                    unset($form['cantidad_a_abonar_op']);
                    unset($form['abonar']);
                    unset($form['monto_sol_apr']);
                    unset($form['fecha_vcto']);
                    unset($form['porcentaje_compra']);
                    unset($form['fecha_liqu']);
                    $form['monto_depositado'] = str_replace('.', '', $form['monto_depositado']);
                    $form['monto_depositado'] = str_replace('.', '', $form['monto_depositado']);
                    $form['monto_depositado'] = str_replace('.', '', $form['monto_depositado']);
                    $form['monto_depositado'] = str_replace(',', '.', $form['monto_depositado']);
                    $this->pagare_model->save_pagare($form);
                    $this->load->view('redirect', array('destino' => base_url() . 'pagare/panel_pagare'));
                } else {
                    if ($this->data['tipo'] == 1) {
                        $this->data['ope_activas'] = $this->pagare_model->get_pagare_by_id('', $id_cliente);
                    } else {
                        $this->data['ope_activas'] = $this->pagare_model->get_pagare_pn_by_id('', $id_cliente);
                    }
                }
            } else {
                if ($this->input->post()) {
                    $form = $this->input->post();

                    $form['id_cliente'] = $this->data['id_cliente'];
                    $form['tipo_solicitud'] = 3;
                    if ($this->data['tipo'] == 1) {
                        $form['id_pj'] = $this->data['id_pj'];
                    } else {
                        $form['id_pn'] = $this->data['id_pn'];
                    }
                    unset($form['abonar']);
                    $this->pagare_model->save_pagare($form);
                    $this->load->view('redirect', array('destino' => base_url() . 'pagare/panel_pagare'));
                } else {
                    if ($this->data['tipo'] == 1) {
                        $this->data['ope_activas'] = $this->pagare_model->get_pagare_by_id($id_solicitud, '');
                    } else {
                        $this->data['ope_activas'] = $this->pagare_model->get_pagare_pn_by_id($id_solicitud, '');
                    }
                }
            }
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->load->view('pagare/refinancia_pagare', $this->data);
        }
    }

    public function editar_pagare($id_solicitud) {
        if ($this->input->post()) {
            $form = $this->input->post();
            $form['id_cliente'] = $this->data['id_cliente'];
            $form['tipo_solicitud'] = 3;
            $form['monto_solicitud'] = str_replace('.', '', $form['monto_solicitud']);
            $form['monto_solicitud'] = str_replace(',', '.', $form['monto_solicitud']);

            $this->pagare_model->edit_pagare($id_solicitud, $form);
            $this->load->view('redirect', array('destino' => base_url() . 'pagare/panel_pagare'));
        }
        $this->data['solicitud'] = $this->pagare_model->pagare_pn_by_id($id_solicitud);
        $this->load->view('pagare/editar_pagare_pn', $this->data);
    }

    public function eliminar_operacion($id_solicitud) {
        $id_solicitud = explode('fed', $id_solicitud);
        $id_solicitud = $id_solicitud[1];
        $id_solicitud = $id_solicitud[0] . $id_solicitud[1];

        $this->pagare_model->elimina_pagare($id_solicitud);
        $this->load->view('redirect', array('destino' => base_url() . 'pagare/panel_pagare'));
    }

}