<?php

class Facturas extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('cupos_model', 'pla_inscrip_model', 'config_model', 'facturas_model', 'pagare_model', 'prestamo_model'));
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
            $this->data['id_pj'] = $id_pj;

            // confirmo si existe planilla o se encuentra llena
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $accionistas = $this->data['planilla']['nomina_accionista'];

            //confirmo si existen accionistas o si estan llenas sus planillas
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
            //debug($accionistas);
            //confirmo si tiene cupo activo para la venta de facturas

            $cupo_activo = $this->cupos_model->get_cupos($id_cliente);
            if (count($cupo_activo) > 0) {
                foreach ($cupo_activo as $row2) {
                    if ($row2['status'] == 2) {
                        $this->data['id_solicitud'] = $row2['id_solicitud'];
                        $this->data['n_operacion'] = $row2['n_operacion'];
                        $this->data['destino_solicitud'] = $row2['destino_solicitud'];
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
        $this->data['menu'] = 'facturas';
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function panel_facturas() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['solicitudes'] = $this->cupos_model->get_ventas($id_cliente);
            $this->load->view('facturas/panel_facturas', $this->data);
        }
    }

    public function cargar_facturas() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->input->post()) {
                if ($_FILES['sel_file']['name'] != '') {
                    $fname = $_FILES['sel_file']['name'];
                    $chk_ext = explode(".", $fname);
                    if (strtolower(end($chk_ext)) == "csv") {
                        $filename = $_FILES['sel_file']['tmp_name'];
                        $handle = fopen($filename, "r");
                        $i = 0;
                        $j =0;
                        
                        if(count(fgetcsv($handle, 1000, ";")) >= 9) {
                            fclose($handle);
                            $handle = fopen($filename, "r");
                            while ($data = fgetcsv($handle, 1000, ";")) {
                                $factura[$i]['numero'] = $data[0];
                                $factura[$i]['numero_factura'] = $data[1];
                                $factura[$i]['deudor'] = $data[2];
                                $factura[$i]['rif'] = $data[3];
                                $factura[$i]['fecha_emision'] = $data[4];
                                $factura[$i]['fecha_vencimiento'] = $data[5];
                                $factura[$i]['valor_nominal'] = $data[6];
                                $factura[$i]['iva'] = $data[7];
                                $factura[$i]['valor_con_iva'] = $data[8];
                                $i++;
                            }
                        } else {
                            fclose($handle);
                            $handle = fopen($filename, "r");
                            while ($data = fgetcsv($handle, 1000, ",")) {
                                $factura[$j]['numero'] = $data[0];
                                $factura[$j]['numero_factura'] = $data[1];
                                $factura[$j]['deudor'] = $data[2];
                                $factura[$j]['rif'] = $data[3];
                                $factura[$j]['fecha_emision'] = $data[4];
                                $factura[$j]['fecha_vencimiento'] = $data[5];
                                $factura[$j]['valor_nominal'] = $data[6];
                                $factura[$j]['iva'] = $data[7];
                                $factura[$j]['valor_con_iva'] = $data[8];
                                $j++;
                            }
                            $this->data['formato'] = true;
                        }
                        fclose($handle);
                         
                        $this->data['faturas'] = $factura;
                    } else {
                        $this->data['error'] = 'El archivo Cargado no esta en formato CSV.';
                    }
                } else {
                    $this->data['error'] = 'Usted no ha seleccionado ningun archivo.';
                }
                $this->load->view('facturas/facturas_cargar', $this->data);
            } else {
                $this->load->view('facturas/facturas_cargar', $this->data);
            }
        }
    }

    public function refinanciar() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->input->post()) {
                if ($_FILES['sel_file']['name'] != '') {
                    $fname = $_FILES['sel_file']['name'];
                    $chk_ext = explode(".", $fname);
                    if (strtolower(end($chk_ext)) == "csv") {
                        $filename = $_FILES['sel_file']['tmp_name'];
                        $handle = fopen($filename, "r");
                        $i = 0;
                        $j = 0;
                         if(count(fgetcsv($handle, 1000, ";")) >= 9) {
                            fclose($handle);
                            $handle = fopen($filename, "r");
                            while ($data = fgetcsv($handle, 1000, ";")) {
                                $factura[$i]['numero'] = $data[0];
                                $factura[$i]['numero_factura'] = $data[1];
                                $factura[$i]['deudor'] = $data[2];
                                $factura[$i]['rif'] = $data[3];
                                $factura[$i]['fecha_emision'] = $data[4];
                                $factura[$i]['fecha_vencimiento'] = $data[5];
                                $factura[$i]['valor_nominal'] = $data[6];
                                $factura[$i]['iva'] = $data[7];
                                $factura[$i]['valor_con_iva'] = $data[8];
                                $i++;
                            }
                        } else {
                            fclose($handle);
                            $handle = fopen($filename, "r");
                            while ($data = fgetcsv($handle, 1000, ",")) {
                                $factura[$j]['numero'] = $data[0];
                                $factura[$j]['numero_factura'] = $data[1];
                                $factura[$j]['deudor'] = $data[2];
                                $factura[$j]['rif'] = $data[3];
                                $factura[$j]['fecha_emision'] = $data[4];
                                $factura[$j]['fecha_vencimiento'] = $data[5];
                                $factura[$j]['valor_nominal'] = $data[6];
                                $factura[$j]['iva'] = $data[7];
                                $factura[$j]['valor_con_iva'] = $data[8];
                                $j++;
                            }
                            $this->data['formato'] = true;
                        }
                        fclose($handle);
                        // debug($factura);
                        $this->data['faturas'] = $factura;
                    } else {
                        $this->data['error'] = 'El archivo Cargado no esta en formato CSV.';
                    }
                } else {
                    $this->data['error'] = 'Usted no ha seleccionado ningun archivo.';
                }
                $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
                $this->data['ope_activas'] = $this->cupos_model->get_ventas($id_cliente);
                $this->load->view('facturas/refinanciamiento', $this->data);
            } else {
                $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
                $this->data['ope_activas'] = $this->cupos_model->get_ventas($id_cliente);
                $this->load->view('facturas/refinanciamiento', $this->data);
            }
        }
    }

    public function guardar_lote() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->input->post()) {
                $form = $this->input->post();
                if (count($form) > 1) {
                    $solicitud = array();
                    $solicitud['tipo_solicitud'] = 2;
                    $solicitud['monto_solicitud'] = $form['result_iva_input'];
                    $solicitud['destino_solicitud'] = $this->data['destino_solicitud'];
                    $solicitud['id_cliente'] = $this->data['id_cliente'];
                    $solicitud['id_pj'] = $this->data['id_pj'];
                    unset($form['result_iva_input']);

                    //valido que no exista una factura ya en el sistema
                    $valida_facturas = $this->facturas_model->valida_facturas(arreglo($form));
                    if ($valida_facturas == 'validado') {
                        //realizo primerio la soicitud de venta para obtener el id de la solicitud
                        $id_solicitud = $this->cupos_model->nueva_venta($solicitud);
                        //guardo por ultimo las facturas bajo el numero de solicitud de venta obtenido
                        $form = arreglo($form);
                        foreach ($form as &$row) {
                            $row['id_solicitud'] = $id_solicitud;
                        }
                        $confirma_lote = $this->facturas_model->cargar_lote($form);
                    }


                    if ($confirma_lote == 'guardado') {
                        $this->load->view('redirect', array('destino' => base_url() . 'facturas/panel_facturas'));
                    } else {
                        $this->data['error'] = 'Una de las facturas que intenta cargar ya se encuentra en nuestro sistema';
                        $this->load->view('facturas/facturas_cargar', $this->data);
                    }
                } else {
                    $this->data['error'] = 'Debe cargar por lo menos una factura';
                    $this->load->view('facturas/facturas_cargar', $this->data);
                }
            } else {
                $this->data['error'] = 'Debe cargar por lo menos una factura';
                $this->load->view('facturas/facturas_cargar', $this->data);
            }
        }
    }

    public function guardar_lote_refinanciar() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->input->post()) {
                $form = $this->input->post();
                if (count($form) > 1) {
                    $solicitud = array();
                    $solicitud['tipo_solicitud'] = 2;
                    $solicitud['rollover'] = $form['rollover'];
                    $solicitud['monto_solicitud'] = $form['result_iva_input'];
                    $solicitud['destino_solicitud'] = $this->data['destino_solicitud'];
                    $solicitud['id_cliente'] = $this->data['id_cliente'];
                    $solicitud['id_pj'] = $this->data['id_pj'];
                    $solicitud['fecha_pago'] = date('Y-m-d');
                    unset($form['result_iva_input']);
                    unset($form['rollover']);
                    //valido que no exista una factura ya en el sistema
                    $valida_facturas = $this->facturas_model->valida_facturas(arreglo($form));
                    if ($valida_facturas == 'validado') {
                        //realizo primerio la soicitud de venta para obtener el id de la solicitud
                        $id_solicitud = $this->cupos_model->nueva_venta($solicitud);
                        //guardo por ultimo las facturas bajo el numero de solicitud de venta obtenido
                        $form = arreglo($form);
                        foreach ($form as &$row) {
                            $row['id_solicitud'] = $id_solicitud;
                        }
                        $confirma_lote = $this->facturas_model->cargar_lote($form);
                    }


                    if ($confirma_lote == 'guardado') {
                        $this->load->view('redirect', array('destino' => base_url() . '/facturas/panel_facturas'));
                    } else {
                        $this->data['error'] = 'Una de las facturas que intenta cargar ya se encuentra en nuestro sistema';
                        $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
                        $this->data['ope_activas'] = $this->cupos_model->get_ventas($id_cliente);
                        $this->load->view('facturas/refinanciamiento', $this->data);
                    }
                } else {
                    $this->data['error'] = 'Debe cargar por lo menos una factura';
                    $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
                    $this->data['ope_activas'] = $this->cupos_model->get_ventas($id_cliente);
                    $this->load->view('facturas/refinanciamiento', $this->data);
                }
            } else {
                $this->data['error'] = 'Debe cargar por lo menos una factura';
                $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
                $this->data['ope_activas'] = $this->cupos_model->get_ventas($id_cliente);
                $this->load->view('facturas/refinanciamiento', $this->data);
            }
        }
    }

    public function solicitud_de_venta_planilla($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_solicitud_venta($id_solicitud);
            if ($this->data['planilla']['rollover'] > 0) {
                $this->data['rollover'] = $this->cupos_model->get_solicitud_venta($this->data['planilla']['rollover']);
            }
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->data['cupo_activo'] = $this->cupos_model->get_cupo_activo($this->data['planilla']['id_pj']);
            $this->data['facturas'] = $this->facturas_model->get_facturas($this->data['planilla']['id_solicitud']);
            $this->descarga('planillas/solicitud_venta', $this->data, 'solicitud de venta.pdf');
        }
    }

}
