<?php

class Prestamo extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('cupos_model', 'pla_inscrip_model', 'config_model', 'pagare_model', 'prestamo_model'));
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['tipo'] = @$this->session->userdata['user_data_cliente']['tipo'];
            $id_cliente = $this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['id_cliente'] = $id_cliente;
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


        $this->data['menu'] = 'prestamo';
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function panel_prestamo() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['solicitudes'] = $this->prestamo_model->get_prestamo($this->data['id_cliente']);
            $this->load->view('prestamo/panel_prestamo', $this->data);
        }
    }

    public function nuevo_prestamo() {
        if ($this->input->post()) {
            $form = $this->input->post();
            $form['id_cliente'] = $this->data['id_cliente'];
            $form['tipo_solicitud'] = 4;
            $form['monto_solicitud'] = str_replace('.', '', $form['monto_solicitud']);
            $form['monto_solicitud'] = str_replace(',', '.', $form['monto_solicitud']);
            if ($this->data['tipo'] == 1) {
                $form['id_pj'] = $this->data['id_pj'];
            } else {
                $form['id_pn'] = $this->data['id_pn'];
            }
            $this->prestamo_model->save_prestamo($form);
            $this->load->view('redirect', array('destino' => base_url() . 'prestamo/panel_prestamo'));
        }
        if ($this->data['tipo'] == 1) {
            $this->load->view('prestamo/nuevo_prestamo', $this->data);
        } else {
            $this->load->view('prestamo/nuevo_prestamo_pn', $this->data);
        }
    }

    public function descarga_solicitud_prestamo($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->data['tipo'] == 1) {
                $this->data['planilla'] = $this->prestamo_model->get_prestamo_by_id_planilla($id_solicitud,'');
                if ($this->data['planilla']['rollover'] > 0) {
                    $this->data['rollover'] = $this->prestamo_model->get_solicitud_prestamo($this->data['planilla']['rollover']);
                }
                $this->descarga('planillas/solicitud_prestamo', $this->data, 'solicitud de prestamo.pdf');
            } else {
                $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn($this->data['id_cliente']);
                $this->data['solicitud'] = $this->prestamo_model->get_prestamos_pn($id_solicitud,'');
                if ($this->data['solicitud']['rollover'] > 0) {
                    $this->data['rollover'] = $this->prestamo_model->get_solicitud_prestamo($this->data['solicitud']['rollover']);
                }
                $this->descarga('planillas/solicitud_prestamo_pn', $this->data, 'solicitud de Prestamo.pdf');
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
                    $form['id_cliente'] = $id_cliente;
                    $form['tipo_solicitud'] = 4;
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
                    $this->prestamo_model->save_prestamo($form);
                    $this->load->view('redirect', array('destino' => base_url() . 'prestamo/panel_prestamo'));
                } else {
                    if ($this->data['tipo'] == 1) {
                        $this->data['ope_activas'] = $this->prestamo_model->get_prestamos('', $id_cliente);
                    } else {
                        $this->data['ope_activas'] = $this->prestamo_model->get_prestamos_pn('', $id_cliente);
                    }
                }
            } else {
                if ($this->input->post()) {
                    $form = $this->input->post();

                    $form['id_cliente'] = $id_cliente;
                    $form['tipo_solicitud'] = 4;
                    if ($this->data['tipo'] == 1) {
                        $form['id_pj'] = $this->data['id_pj'];
                    } else {
                        $form['id_pn'] = $this->data['id_pn'];
                    }
                    unset($form['abonar']);
                    $this->prestamo_model->save_prestamo($form);
                    $this->load->view('redirect', array('destino' => base_url() . 'prestamo/panel_prestamo'));
                } else {
                    if ($this->data['tipo'] == 1) {
                        $this->data['ope_activas'] = $this->prestamo_model->get_prestamos($id_solicitud, '');
                    } else {
                        $this->data['ope_activas'] = $this->prestamo_model->get_prestamos_pn($id_solicitud, '');
                    }
                }
            }
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->load->view('prestamo/refinancia_prestamo', $this->data);
        }
    }
    
     public function editar_prestamo($id_solicitud) {
        if ($this->input->post()) {
            $form = $this->input->post();
            $form['id_cliente'] = $this->data['id_cliente'];
            $form['tipo_solicitud'] = 4;
            $form['monto_solicitud'] = str_replace('.', '', $form['monto_solicitud']);
            $form['monto_solicitud'] = str_replace(',', '.', $form['monto_solicitud']);

            $this->prestamo_model->edit_prestamo($id_solicitud, $form);
            $this->load->view('redirect', array('destino' => base_url() . 'prestamo/panel_prestamo'));
        }
        $this->data['solicitud'] = $this->prestamo_model->prestamo_pn_by_id($id_solicitud);
        $this->load->view('prestamo/editar_prestamo_pn', $this->data);
    }

    public function eliminar_operacion($id_solicitud) {
        $id_solicitud = explode('fed', $id_solicitud);
        $id_solicitud = $id_solicitud[1];
        $id_solicitud = $id_solicitud[0] . $id_solicitud[1];

        $this->prestamo_model->elimina_prestamo($id_solicitud);
        $this->load->view('redirect', array('destino' => base_url() . 'prestamo/panel_prestamo'));
    }

}