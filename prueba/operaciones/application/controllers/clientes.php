<?php

class Clientes extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('personas_model', 'empresa_model', 'prestamo_model', 'clientes_model', 'pla_inscrip_model', 'cupos_model', 'pagare_model', 'config_model', 'facturas_model', 'reclasificacion_model'));


        $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];

        $this->data['datos_empresa'] = $this->empresa_model->get_datos_empresa();
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index() {
        
    }

    public function add_cliente() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->load->view('clientes/agregar', $this->data);
        }
    }

    public function delete_cliente() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function disable_cliente() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function enable_cliente() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function edit_cliente() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function listar_clientes() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['clientes'] = $this->clientes_model->get_clientes_datos();
            $this->load->view('clientes/index', $this->data);
        }
    }

    public function cambio_pass() {
        if ($this->input->post()) {
            $valida_reset = $this->clientes_model->valid_reset($this->input->post('reset'));
            if (count($valida_reset) > 1) {
                $existe = $valida_reset;
                if ($existe != false) {
                    $edicion = $this->clientes_model->edit_pass();

                    if ($edicion == true) {
                        $this->data['msg'] = 1;
                        $this->load->view('sesion/resultado', $this->data);
                    }
                } else {
                    $this->data['msg'] = 1;
                    $this->load->view('sesion/recordar_pass', $this->data);
                }
            }
        } else {
            $this->load->view('sesion/recordar_pass', $this->data);
        }
    }

    public function agregar() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $result = $this->clientes_model->save();
            if ($result == false) {
                $this->data['mensaje'] = 'El correo ingresado ya se encuentra asociado a un cliente';
                $this->data['error'] = 1;
            } else {
                $this->data['mensaje'] = 'El Cliente se ha registrado correctamente';
            }
            $this->load->view('redirect', array('destino' => base_url() . 'clientes/listar_clientes'));
        }
    }

    public function cliente_panel($id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $data_cliente = $this->clientes_model->get_clientes($id_cliente);
            if ($data_cliente['tipo'] == '1') {
                $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
                
                foreach($this->data['operaciones'] as &$row){
                    if($row['tipo_solicitud']  == 2){
                        $row['facturas'] = $this->facturas_model->get_facturas($row['id_solicitud']);
                    }
                } 
                
                $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
                $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
                $this->data['data_ventas'] = $this->cupos_model->get_ventas($id_cliente);
//                debug($this->data['data_ventas']);
                $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
                $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
                $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
                $this->load->view('cliente_panel/panel_empresa', $this->data);
            } else {

                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones_pn($id_cliente);
                $this->data['declaracion_jurada'] = $this->config_model->get_declaracion_pn();
                $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
                $this->data['data_pn'] = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
                $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
                $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
                $this->load->view('cliente_panel/panel_pn', $this->data);
            }
        }
    }

    public function editar_facturas($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->input->post()) {
                $form = $this->input->post();
                $monto_aprobado = $form['monto_solicitud_aprobado'];
                unset($form['monto_solicitud_aprobado']);
                $form = arreglo_facturas($form);

                foreach ($form as &$row) {
                    unset($row['result_iva_input']);
                    $row['id_solicitud'] = $id_solicitud;
                }
                $this->facturas_model->editar_facturas($id_solicitud, $form);

                $this->cupos_model->edit_monto_aprobado($id_solicitud, $monto_aprobado);

                $solicitud = $this->cupos_model->get_venta_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['facturas'] = $this->facturas_model->get_facturas($id_solicitud);
                $this->load->view('procesos/listar_facturas', $this->data);
            }
        }
    }

    public function eliminar_factura($id_factura, $monto_aprobado, $id_solicitud) {
        $this->facturas_model->eliminar_factura($id_factura);
        $this->cupos_model->edit_monto_aprobado($id_solicitud, $monto_aprobado);
    }

    public function undo_elimina($id_factura, $monto_aprobado, $id_solicitud) {
        $this->facturas_model->undo_elimina($id_factura);
        $this->cupos_model->edit_monto_aprobado($id_solicitud, $monto_aprobado);
    }

    public function descarga_ficha_pj($id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion();
            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->descarga('planillas/ficha_juridica', $this->data, 'ficha_persona_juridica.pdf');
        }
    }

    public function descarga_ficha_pn($id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion_pn();
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
            $this->descarga('planillas/ficha_natural', $this->data, 'ficha_persona_natural.pdf');
        }
    }

    public function descarga_ficha_pn_pj($id_directivo) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion_pn();
            $this->data['planilla'] = $this->pla_inscrip_model->get_ficha_pn_pj($id_directivo);
            if (!$this->data['planilla']) {
                $directivo = $this->pla_inscrip_model->get_directivo($id_directivo);
                $this->data['directivo'] = $directivo;
                $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn_cedula($directivo['cedula_dir']);
            }
            $this->descarga('planillas/ficha_natural', $this->data, 'ficha_persona_natural.pdf');
        }
    }

    public function planilla_solicitud_cupo($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->descarga('planillas/solicitud_cupo', $this->data, 'solicitud de cupo.pdf');
        }
    }

    public function planilla_solicitud_pagare($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);
            if ($this->data['planilla']['rollover'] > 0) {
                $this->data['rollover'] = $this->cupos_model->get_solicitud_pagare($this->data['planilla']['rollover']);
            }
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->descarga('planillas/solicitud_pagare', $this->data, 'solicitud de Pagare.pdf');
        }
    }

    public function planilla_solicitud_prestamo($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);
            if ($this->data['planilla']['rollover'] > 0) {
                $this->data['rollover'] = $this->prestamo_model->get_solicitud_prestamo($this->data['planilla']['rollover']);
            }
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->descarga('planillas/solicitud_prestamo', $this->data, 'solicitud de Prestamo.pdf');
        }
    }

    public function planilla_solicitud_pagare_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['solicitud'] = $this->pagare_model->pagare_pn_by_id($id_solicitud);
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn($this->data['solicitud']['id_cliente']);
            if ($this->data['solicitud']['rollover'] > 0) {
                $this->data['rollover'] = $this->cupos_model->get_solicitud_pagare($this->data['solicitud']['rollover']);
            }
            $this->descarga('planillas/solicitud_pagare_pn', $this->data, 'solicitud de Pagare.pdf');
        }
    }

    public function planilla_solicitud_prestamo_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['solicitud'] = $this->prestamo_model->prestamo_pn_by_id($id_solicitud);
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_pn($this->data['solicitud']['id_cliente']);
            if ($this->data['solicitud']['rollover'] > 0) {
                $this->data['rollover'] = $this->prestamo_model->get_solicitud_prestamo($this->data['solicitud']['rollover']);
            }
            $this->descarga('planillas/solicitud_prestamo_pn', $this->data, 'solicitud de Prestamo.pdf');
        }
    }

    public function planilla_operacion_cupo($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->data['reclasificacion'] = $this->cupos_model->get_reclasificacion($this->data['planilla']['id_pj']);
            $this->data['res_finan_acc'] = $this->cupos_model->get_resumen_acc($this->data['planilla']['id_pj']);
            $this->descarga('planillas/operacion_cupo', $this->data, 'operacion de cupo.pdf');
        }
    }

    public function planilla_operacion_pagare($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->data['reclasificacion'] = $this->cupos_model->get_reclasificacion($this->data['planilla']['id_pj']);
            $this->data['res_finan_acc'] = $this->cupos_model->get_resumen_acc($this->data['planilla']['id_pj']);
            $this->data['exp_interna'] = $this->cupos_model->get_exp_interna($this->data['planilla']['id_pj'], $id_solicitud);
            $this->descarga('planillas/operacion_pagare', $this->data, 'operacion de pagare.pdf');
        }
    }

    public function planilla_operacion_prestamo($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->data['reclasificacion'] = $this->cupos_model->get_reclasificacion($this->data['planilla']['id_pj']);
            $this->data['res_finan_acc'] = $this->cupos_model->get_resumen_acc($this->data['planilla']['id_pj']);
            $this->data['exp_interna'] = $this->cupos_model->get_exp_interna($this->data['planilla']['id_pj'], $id_solicitud);
            $this->descarga('planillas/operacion_prestamo', $this->data, 'operacion de Prestamo.pdf');
        }
    }

    public function planilla_operacion_venta($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_venta_by_id_planilla($id_solicitud);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->data['reclasificacion'] = $this->cupos_model->get_reclasificacion($this->data['planilla']['id_pj']);
//            $this->data['cupo_activo'] = $this->cupos_model->get_cupo_activo($this->data['planilla']['id_pj']);
            $this->data['res_finan_acc'] = $this->cupos_model->get_resumen_acc($this->data['planilla']['id_pj']);
            $this->data['exp_interna'] = $this->cupos_model->get_exp_interna($this->data['planilla']['id_pj'], $id_solicitud);
            $this->descarga('planillas/operacion_venta', $this->data, 'operacion de venta.pdf');
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

    public function descargar_reclasificacion($id_pj) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
            $this->descarga('planillas/reclasificacion', $this->data, 'reclasificacion.pdf');
        }
    }

    public function descargar_contrato($id_pj, $id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
            $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
            $this->descarga_contrato('planillas/contrato', $this->data, 'Contrato.pdf');
        }
    }

    public function descargar_pagare($id_pj, $id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($id_pj);
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
//            debug($this->data['avales'] );
            $this->descarga_pagare('planillas/pagare_pj', $this->data, 'Pagare.pdf');
        }
    }

    public function descargar_prestamo($id_pj, $id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['solicitud'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
            $this->descarga_giro_prestamo('planillas/giro_prestamo', $this->data, 'Prestamo.pdf');
        }
    }

    public function descargar_prestamo_pn($id_cliente, $id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['solicitud'] = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
            $this->descarga_giro_prestamo_pn('planillas/giro_prestamo_pn', $this->data, 'Prestamo.pdf');
        }
    }

    public function descargar_giro($id_pj, $id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($id_pj);

            $this->data['planilla'] = $this->cupos_model->get_venta_by_id_planilla($id_solicitud);
            $this->data['solicitud'] = $this->data['planilla'];
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
            $this->data['cupo_activo'] = $this->cupos_model->get_cupo_activo($id_pj);

            $this->data['facturas'] = $this->facturas_model->get_facturas($id_solicitud);
            $this->descarga_giro('planillas/giro', $this->data, 'Convenio y Giro.pdf');
        }
    }

    public function procesar_cupo($id_solicitud = NULL) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $post = $this->input->post();
                // se verifica si es un rollover
                $verifica = $this->cupos_model->get_cupo_by_id($post['id_solicitud']);
                $solicitud = array();
                $solicitud['fecha_solicitud'] = $post['fecha_solicitud'];
                $solicitud['fecha_elab_prop'] = $post['fecha_elab_prop'];
                if ($verifica['rollover']) {
                    $solicitud['fecha_solicitud'] = $verifica['fecha_pago'];
                    $solicitud['fecha_solicitud_aprobado'] = $verifica['fecha_pago'];
                    //verifico si existe mora
                    $rollover = $this->cupos_model->get_cupo_by_id($verifica['rollover']);

                    if ($rollover['mora_dias']) {
                        //Dia de Pago
                        $D_pago = explode(' ', $verifica['fecha_pago']);
                        //dia de aprobacion de la operacion
                        $D_aprob = explode(' ', $rollover['fecha_solicitud_aprobado']);
                        //dia de vencimiento de la operacion
                        $D_vcto = explode(' ', $rollover['fecha_vcto_solicitud_aprobado']);

                        $plazo_mora = diferenciaEntreFechas($D_pago[0], $D_aprob[0]);
                        $plazo = diferenciaEntreFechas($D_vcto[0], $D_aprob[0]);
                        $mora_dia_pago = $plazo_mora - $plazo;

                        $reverso['mora_dias'] = $mora_dia_pago;
                    }
                    $reverso['id_solicitud'] = $rollover['id_solicitud'];
                    $reverso['status'] = 5;
                    $this->cupos_model->reverso($reverso);
                }

                $id_solicitud = $post['id_solicitud'];
                $resumen_finan = array();
                $solicitud['id_solicitud'] = $post['id_solicitud'];
                $solicitud['n_operacion'] = $post['n_operacion'];
                $solicitud['codigo_solicitud'] = $post['codigo_solicitud'];
                $solicitud['modalidad'] = $post['modalidad'];
                $solicitud['rep_riesgo'] = $post['rep_riesgo'];
                $solicitud['ana_comentarios'] = $post['ana_comentarios'];
                $solicitud['status'] = 1;

                $resumen_finan['id_pj'] = $post['id_pj'];
                $resumen_finan['nom_acc_resumen'] = serialize($post['nom_acc_resumen']);
                $resumen_finan['ing_netos_accio'] = serialize($post['ing_netos_accio']);
                $resumen_finan['utl_neta_accio'] = serialize($post['utl_neta_accio']);
                $resumen_finan['act_cir_accio'] = serialize($post['act_cir_accio']);
                $resumen_finan['act_fij_accio'] = serialize($post['act_fij_accio']);
                $resumen_finan['otr_act_accio'] = serialize($post['otr_act_accio']);
                $resumen_finan['tot_act_accio'] = serialize($post['tot_act_accio']);
                $resumen_finan['pas_cp_accio'] = serialize($post['pas_cp_accio']);
                $resumen_finan['pas_lp_accio'] = serialize($post['pas_lp_accio']);
                $resumen_finan['otr_pas_accio'] = serialize($post['otr_pas_accio']);
                $resumen_finan['tot_pas_accio'] = serialize($post['tot_pas_accio']);
                $resumen_finan['cap_soc_accio'] = serialize($post['cap_soc_accio']);
                $resumen_finan['cap_con_nt_accio'] = serialize($post['cap_con_nt_accio']);
                $resumen_finan['tot_pas_cap_accio'] = serialize($post['tot_pas_cap_accio']);
                $resumen_finan['cap_trab_accio'] = serialize($post['cap_trab_accio']);
                $resumen_finan['solve_accio'] = serialize($post['solve_accio']);
                $resumen_finan['liq_accio'] = serialize($post['liq_accio']);

                $this->cupos_model->procesar_cupo($solicitud);
                $this->cupos_model->guardar_estado_financiero_acc($resumen_finan);

                $solicitud = $this->cupos_model->get_cupo_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {

                $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
                $this->data['planilla']['nom_acc_resumen'] = unserialize($this->data['planilla']['nom_acc_resumen']);
                $this->data['planilla']['ing_netos_accio'] = unserialize($this->data['planilla']['ing_netos_accio']);
                $this->data['planilla']['utl_neta_accio'] = unserialize($this->data['planilla']['utl_neta_accio']);
                $this->data['planilla']['act_cir_accio'] = unserialize($this->data['planilla']['act_cir_accio']);
                $this->data['planilla']['act_fij_accio'] = unserialize($this->data['planilla']['act_fij_accio']);
                $this->data['planilla']['otr_act_accio'] = unserialize($this->data['planilla']['otr_act_accio']);
                $this->data['planilla']['tot_act_accio'] = unserialize($this->data['planilla']['tot_act_accio']);
                $this->data['planilla']['pas_cp_accio'] = unserialize($this->data['planilla']['pas_cp_accio']);
                $this->data['planilla']['pas_lp_accio'] = unserialize($this->data['planilla']['pas_lp_accio']);
                $this->data['planilla']['otr_pas_accio'] = unserialize($this->data['planilla']['otr_pas_accio']);
                $this->data['planilla']['tot_pas_accio'] = unserialize($this->data['planilla']['tot_pas_accio']);
                $this->data['planilla']['cap_soc_accio'] = unserialize($this->data['planilla']['cap_soc_accio']);
                $this->data['planilla']['cap_con_nt_accio'] = unserialize($this->data['planilla']['cap_con_nt_accio']);
                $this->data['planilla']['tot_pas_cap_accio'] = unserialize($this->data['planilla']['tot_pas_cap_accio']);
                $this->data['planilla']['cap_trab_accio'] = unserialize($this->data['planilla']['cap_trab_accio']);
                $this->data['planilla']['solve_accio'] = unserialize($this->data['planilla']['solve_accio']);
                $this->data['planilla']['liq_accio'] = unserialize($this->data['planilla']['liq_accio']);
                $this->load->view('procesos/procesar_cupo', $this->data);
            }
        }
    }

    public function procesar_pagare($id_solicitud = NULL) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $post = $this->input->post();
                // se verifica si es un rollover
                $verifica = $this->cupos_model->get_pagare_by_id($post['id_solicitud']);
                $solicitud = array();
                $solicitud['fecha_solicitud'] = $post['fecha_solicitud'];
                $solicitud['fecha_elab_prop'] = $post['fecha_elab_prop'];
                if ($verifica['rollover']) {
                    $solicitud['fecha_solicitud'] = $verifica['fecha_pago'];
                    $solicitud['fecha_solicitud_aprobado'] = $verifica['fecha_pago'];
                    //verifico si existe mora
                    $rollover = $this->cupos_model->get_pagare_by_id($verifica['rollover']);

                    if ($rollover['mora_dias']) {
                        //Dia de Pago
                        $D_pago = explode(' ', $verifica['fecha_pago']);
                        //dia de aprobacion de la operacion
                        $D_aprob = explode(' ', $rollover['fecha_solicitud_aprobado']);
                        //dia de vencimiento de la operacion
                        $D_vcto = explode(' ', $rollover['fecha_vcto_solicitud_aprobado']);

                        $plazo_mora = diferenciaEntreFechas($D_pago[0], $D_aprob[0]);
                        $plazo = diferenciaEntreFechas($D_vcto[0], $D_aprob[0]);
                        $mora_dia_pago = $plazo_mora - $plazo;

                        $reverso['mora_dias'] = $mora_dia_pago;
                    }
                    $reverso['id_solicitud'] = $rollover['id_solicitud'];
                    $reverso['status'] = 5;
                    $this->cupos_model->reverso($reverso);
                }

                $id_solicitud = $post['id_solicitud'];
                $resumen_finan = array();
                $solicitud['id_solicitud'] = $post['id_solicitud'];
                $solicitud['n_operacion'] = $post['n_operacion'];
                $solicitud['codigo_solicitud'] = $post['codigo_solicitud'];
                $solicitud['modalidad'] = $post['modalidad'];
                $solicitud['rep_riesgo'] = $post['rep_riesgo'];
                $solicitud['ana_comentarios'] = $post['ana_comentarios'];
                $solicitud['ana_comentarios'] = $post['ana_comentarios'];
                $solicitud['status'] = 1;

                $resumen_finan['id_pj'] = $post['id_pj'];
                $resumen_finan['nom_acc_resumen'] = serialize($post['nom_acc_resumen']);
                $resumen_finan['ing_netos_accio'] = serialize($post['ing_netos_accio']);
                $resumen_finan['utl_neta_accio'] = serialize($post['utl_neta_accio']);
                $resumen_finan['act_cir_accio'] = serialize($post['act_cir_accio']);
                $resumen_finan['act_fij_accio'] = serialize($post['act_fij_accio']);
                $resumen_finan['otr_act_accio'] = serialize($post['otr_act_accio']);
                $resumen_finan['tot_act_accio'] = serialize($post['tot_act_accio']);
                $resumen_finan['pas_cp_accio'] = serialize($post['pas_cp_accio']);
                $resumen_finan['pas_lp_accio'] = serialize($post['pas_lp_accio']);
                $resumen_finan['otr_pas_accio'] = serialize($post['otr_pas_accio']);
                $resumen_finan['tot_pas_accio'] = serialize($post['tot_pas_accio']);
                $resumen_finan['cap_soc_accio'] = serialize($post['cap_soc_accio']);
                $resumen_finan['cap_con_nt_accio'] = serialize($post['cap_con_nt_accio']);
                $resumen_finan['tot_pas_cap_accio'] = serialize($post['tot_pas_cap_accio']);
                $resumen_finan['cap_trab_accio'] = serialize($post['cap_trab_accio']);
                $resumen_finan['solve_accio'] = serialize($post['solve_accio']);
                $resumen_finan['liq_accio'] = serialize($post['liq_accio']);

                $this->cupos_model->procesar_pagare($solicitud);
                $this->cupos_model->guardar_estado_financiero_acc($resumen_finan);
                $solicitud = $this->cupos_model->get_pagare_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {

                $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);
                $this->data['planilla']['nom_acc_resumen'] = unserialize($this->data['planilla']['nom_acc_resumen']);
                $this->data['planilla']['ing_netos_accio'] = unserialize($this->data['planilla']['ing_netos_accio']);
                $this->data['planilla']['utl_neta_accio'] = unserialize($this->data['planilla']['utl_neta_accio']);
                $this->data['planilla']['act_cir_accio'] = unserialize($this->data['planilla']['act_cir_accio']);
                $this->data['planilla']['act_fij_accio'] = unserialize($this->data['planilla']['act_fij_accio']);
                $this->data['planilla']['otr_act_accio'] = unserialize($this->data['planilla']['otr_act_accio']);
                $this->data['planilla']['tot_act_accio'] = unserialize($this->data['planilla']['tot_act_accio']);
                $this->data['planilla']['pas_cp_accio'] = unserialize($this->data['planilla']['pas_cp_accio']);
                $this->data['planilla']['pas_lp_accio'] = unserialize($this->data['planilla']['pas_lp_accio']);
                $this->data['planilla']['otr_pas_accio'] = unserialize($this->data['planilla']['otr_pas_accio']);
                $this->data['planilla']['tot_pas_accio'] = unserialize($this->data['planilla']['tot_pas_accio']);
                $this->data['planilla']['cap_soc_accio'] = unserialize($this->data['planilla']['cap_soc_accio']);
                $this->data['planilla']['cap_con_nt_accio'] = unserialize($this->data['planilla']['cap_con_nt_accio']);
                $this->data['planilla']['tot_pas_cap_accio'] = unserialize($this->data['planilla']['tot_pas_cap_accio']);
                $this->data['planilla']['cap_trab_accio'] = unserialize($this->data['planilla']['cap_trab_accio']);
                $this->data['planilla']['solve_accio'] = unserialize($this->data['planilla']['solve_accio']);
                $this->data['planilla']['liq_accio'] = unserialize($this->data['planilla']['liq_accio']);
                $this->data['rollover'] = $this->cupos_model->get_solicitud_pagare($this->data['planilla']['rollover']);
                $this->load->view('procesos/procesar_pagare', $this->data);
            }
        }
    }

    public function procesar_prestamo($id_solicitud = NULL) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $post = $this->input->post();
                $id_solicitud = $post['id_solicitud'];
                $solicitud = array();
                $resumen_finan = array();
                $solicitud['id_solicitud'] = $post['id_solicitud'];
                $solicitud['n_operacion'] = $post['n_operacion'];
                $solicitud['codigo_solicitud'] = $post['codigo_solicitud'];
                $solicitud['modalidad'] = $post['modalidad'];
                $solicitud['rep_riesgo'] = $post['rep_riesgo'];
                $solicitud['ana_comentarios'] = $post['ana_comentarios'];
                $solicitud['status'] = 1;

                $resumen_finan['id_pj'] = $post['id_pj'];
                $resumen_finan['nom_acc_resumen'] = serialize($post['nom_acc_resumen']);
                $resumen_finan['ing_netos_accio'] = serialize($post['ing_netos_accio']);
                $resumen_finan['utl_neta_accio'] = serialize($post['utl_neta_accio']);
                $resumen_finan['act_cir_accio'] = serialize($post['act_cir_accio']);
                $resumen_finan['act_fij_accio'] = serialize($post['act_fij_accio']);
                $resumen_finan['otr_act_accio'] = serialize($post['otr_act_accio']);
                $resumen_finan['tot_act_accio'] = serialize($post['tot_act_accio']);
                $resumen_finan['pas_cp_accio'] = serialize($post['pas_cp_accio']);
                $resumen_finan['pas_lp_accio'] = serialize($post['pas_lp_accio']);
                $resumen_finan['otr_pas_accio'] = serialize($post['otr_pas_accio']);
                $resumen_finan['tot_pas_accio'] = serialize($post['tot_pas_accio']);
                $resumen_finan['cap_soc_accio'] = serialize($post['cap_soc_accio']);
                $resumen_finan['cap_con_nt_accio'] = serialize($post['cap_con_nt_accio']);
                $resumen_finan['tot_pas_cap_accio'] = serialize($post['tot_pas_cap_accio']);
                $resumen_finan['cap_trab_accio'] = serialize($post['cap_trab_accio']);
                $resumen_finan['solve_accio'] = serialize($post['solve_accio']);
                $resumen_finan['liq_accio'] = serialize($post['liq_accio']);

                $this->prestamo_model->procesar_prestamo($solicitud);
                $this->cupos_model->guardar_estado_financiero_acc($resumen_finan);
                $solicitud = $this->cupos_model->get_pagare_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {

                $this->data['planilla'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);
                $this->data['planilla']['nom_acc_resumen'] = unserialize($this->data['planilla']['nom_acc_resumen']);
                $this->data['planilla']['ing_netos_accio'] = unserialize($this->data['planilla']['ing_netos_accio']);
                $this->data['planilla']['utl_neta_accio'] = unserialize($this->data['planilla']['utl_neta_accio']);
                $this->data['planilla']['act_cir_accio'] = unserialize($this->data['planilla']['act_cir_accio']);
                $this->data['planilla']['act_fij_accio'] = unserialize($this->data['planilla']['act_fij_accio']);
                $this->data['planilla']['otr_act_accio'] = unserialize($this->data['planilla']['otr_act_accio']);
                $this->data['planilla']['tot_act_accio'] = unserialize($this->data['planilla']['tot_act_accio']);
                $this->data['planilla']['pas_cp_accio'] = unserialize($this->data['planilla']['pas_cp_accio']);
                $this->data['planilla']['pas_lp_accio'] = unserialize($this->data['planilla']['pas_lp_accio']);
                $this->data['planilla']['otr_pas_accio'] = unserialize($this->data['planilla']['otr_pas_accio']);
                $this->data['planilla']['tot_pas_accio'] = unserialize($this->data['planilla']['tot_pas_accio']);
                $this->data['planilla']['cap_soc_accio'] = unserialize($this->data['planilla']['cap_soc_accio']);
                $this->data['planilla']['cap_con_nt_accio'] = unserialize($this->data['planilla']['cap_con_nt_accio']);
                $this->data['planilla']['tot_pas_cap_accio'] = unserialize($this->data['planilla']['tot_pas_cap_accio']);
                $this->data['planilla']['cap_trab_accio'] = unserialize($this->data['planilla']['cap_trab_accio']);
                $this->data['planilla']['solve_accio'] = unserialize($this->data['planilla']['solve_accio']);
                $this->data['planilla']['liq_accio'] = unserialize($this->data['planilla']['liq_accio']);
                $this->data['rollover'] = $this->cupos_model->get_pagare_by_id($this->data['planilla']['rollover']);
                $this->load->view('procesos/procesar_prestamo', $this->data);
            }
        }
    }

    public function procesar_pagare_pn($id_solicitud = NULL) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $post = $this->input->post();

                // se verifica si es un rollover
                $verifica = $this->cupos_model->get_pagare_pn_by_id($post['id_solicitud']);
                $solicitud = array();
                $solicitud['fecha_solicitud'] = $post['fecha_solicitud'];
                $solicitud['fecha_elab_prop'] = $post['fecha_elab_prop'];
                if ($verifica['rollover']) {
                    $solicitud['fecha_solicitud'] = $verifica['fecha_pago'];
                    $solicitud['fecha_solicitud_aprobado'] = $verifica['fecha_pago'];
                    //verifico si existe mora
                    $rollover = $this->cupos_model->get_pagare_pn_by_id($verifica['rollover']);

                    if ($rollover['mora_dias']) {
                        //Dia de Pago
                        $D_pago = explode(' ', $verifica['fecha_pago']);
                        //dia de aprobacion de la operacion
                        $D_aprob = explode(' ', $rollover['fecha_solicitud_aprobado']);
                        //dia de vencimiento de la operacion
                        $D_vcto = explode(' ', $rollover['fecha_vcto_solicitud_aprobado']);

                        $plazo_mora = diferenciaEntreFechas($D_pago[0], $D_aprob[0]);
                        $plazo = diferenciaEntreFechas($D_vcto[0], $D_aprob[0]);
                        $mora_dia_pago = $plazo_mora - $plazo;

                        $reverso['mora_dias'] = $mora_dia_pago;
                    }
                    $reverso['status'] = 5;
                    $reverso['id_solicitud'] = $rollover['id_solicitud'];

                    $this->cupos_model->reverso($reverso);
                }

                $id_solicitud = $post['id_solicitud'];

                $resumen_finan = array();
                $solicitud['id_solicitud'] = $post['id_solicitud'];
                $solicitud['n_operacion'] = $post['n_operacion'];
                $solicitud['codigo_solicitud'] = $post['codigo_solicitud'];
                $solicitud['modalidad'] = $post['modalidad'];
                $solicitud['rep_riesgo'] = $post['rep_riesgo'];
                $solicitud['ana_comentarios'] = $post['ana_comentarios'];
                $solicitud['status'] = 1;

                $resumen_finan['id_cliente'] = $post['id_cliente'];
                $resumen_finan['ing_netos_pn'] = serialize($post['ing_netos_pn']);
                $resumen_finan['utl_neta_pn'] = serialize($post['utl_neta_pn']);
                $resumen_finan['act_cir_pn'] = serialize($post['act_cir_pn']);
                $resumen_finan['act_fij_pn'] = serialize($post['act_fij_pn']);
                $resumen_finan['otr_act_pn'] = serialize($post['otr_act_pn']);
                $resumen_finan['tot_act_pn'] = serialize($post['tot_act_pn']);
                $resumen_finan['pas_cp_pn'] = serialize($post['pas_cp_pn']);
                $resumen_finan['pas_lp_pn'] = serialize($post['pas_lp_pn']);
                $resumen_finan['otr_pas_pn'] = serialize($post['otr_pas_pn']);
                $resumen_finan['tot_pas_pn'] = serialize($post['tot_pas_pn']);
                $resumen_finan['cap_soc_pn'] = serialize($post['cap_soc_pn']);
                $resumen_finan['cap_con_nt_pn'] = serialize($post['cap_con_nt_pn']);
                $resumen_finan['tot_pas_cap_pn'] = serialize($post['tot_pas_cap_pn']);
                $resumen_finan['cap_trab_pn'] = serialize($post['cap_trab_pn']);
                $resumen_finan['solve_pn'] = serialize($post['solve_pn']);
                $resumen_finan['liq_pn'] = serialize($post['liq_pn']);
                $this->cupos_model->procesar_pagare($solicitud);
                $this->cupos_model->guardar_resumen_financiero_pn($resumen_finan);



                $solicitud = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {

                $this->data['planilla'] = $this->pagare_model->get_pagare_pn_by_id($id_solicitud);
                $this->data['planilla']['ing_netos_pn'] = unserialize($this->data['planilla']['ing_netos_pn']);
                $this->data['planilla']['utl_neta_pn'] = unserialize($this->data['planilla']['utl_neta_pn']);
                $this->data['planilla']['act_cir_pn'] = unserialize($this->data['planilla']['act_cir_pn']);
                $this->data['planilla']['act_fij_pn'] = unserialize($this->data['planilla']['act_fij_pn']);
                $this->data['planilla']['otr_act_pn'] = unserialize($this->data['planilla']['otr_act_pn']);
                $this->data['planilla']['tot_act_pn'] = unserialize($this->data['planilla']['tot_act_pn']);
                $this->data['planilla']['pas_cp_pn'] = unserialize($this->data['planilla']['pas_cp_pn']);
                $this->data['planilla']['pas_lp_pn'] = unserialize($this->data['planilla']['pas_lp_pn']);
                $this->data['planilla']['otr_pas_pn'] = unserialize($this->data['planilla']['otr_pas_pn']);
                $this->data['planilla']['tot_pas_pn'] = unserialize($this->data['planilla']['tot_pas_pn']);
                $this->data['planilla']['cap_soc_pn'] = unserialize($this->data['planilla']['cap_soc_pn']);
                $this->data['planilla']['cap_con_nt_pn'] = unserialize($this->data['planilla']['cap_con_nt_pn']);
                $this->data['planilla']['tot_pas_cap_pn'] = unserialize($this->data['planilla']['tot_pas_cap_pn']);
                $this->data['planilla']['cap_trab_pn'] = unserialize($this->data['planilla']['cap_trab_pn']);
                $this->data['planilla']['solve_pn'] = unserialize($this->data['planilla']['solve_pn']);
                $this->data['planilla']['liq_pn'] = unserialize($this->data['planilla']['liq_pn']);
                $this->data['rollover'] = $this->cupos_model->get_solicitud_pagare($this->data['planilla']['rollover']);
                $this->load->view('procesos/procesar_pagare_pn', $this->data);
            }
        }
    }

    public function procesar_prestamo_pn($id_solicitud = NULL) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $post = $this->input->post();
                // se verifica si es un rollover
                $verifica = $this->prestamo_model->get_prestamo_pn_by_id($post['id_solicitud']);
                $solicitud = array();
                $solicitud['fecha_solicitud'] = $post['fecha_solicitud'];
                $solicitud['fecha_elab_prop'] = $post['fecha_elab_prop'];
                if ($verifica['rollover']) {
                    $solicitud['fecha_solicitud'] = $verifica['fecha_pago'];
                    $solicitud['fecha_solicitud_aprobado'] = $verifica['fecha_pago'];
                    //verifico si existe mora
                    $rollover = $this->prestamo_model->get_prestamo_pn_by_id($verifica['rollover']);
                    if ($rollover['mora_dias']) {
                        //Dia de Pago
                        $D_pago = explode(' ', $verifica['fecha_pago']);
                        //dia de aprobacion de la operacion
                        $D_aprob = explode(' ', $rollover['fecha_solicitud_aprobado']);
                        //dia de vencimiento de la operacion
                        $D_vcto = explode(' ', $rollover['fecha_vcto_solicitud_aprobado']);

                        $plazo_mora = diferenciaEntreFechas($D_pago[0], $D_aprob[0]);
                        $plazo = diferenciaEntreFechas($D_vcto[0], $D_aprob[0]);
                        $mora_dia_pago = $plazo_mora - $plazo;

                        $reverso['mora_dias'] = $mora_dia_pago;
                    }
                    $reverso['status'] = 5;
                    $reverso['id_solicitud'] = $rollover['id_solicitud'];
                    $this->cupos_model->reverso($reverso);
                }

                $id_solicitud = $post['id_solicitud'];
                $resumen_finan = array();
                $solicitud['id_solicitud'] = $post['id_solicitud'];
                $solicitud['n_operacion'] = $post['n_operacion'];
                $solicitud['codigo_solicitud'] = $post['codigo_solicitud'];
                $solicitud['modalidad'] = $post['modalidad'];
                $solicitud['rep_riesgo'] = $post['rep_riesgo'];
                $solicitud['ana_comentarios'] = $post['ana_comentarios'];
                $solicitud['status'] = 1;

                $resumen_finan['id_cliente'] = $post['id_cliente'];
                $resumen_finan['ing_netos_pn'] = serialize($post['ing_netos_pn']);
                $resumen_finan['utl_neta_pn'] = serialize($post['utl_neta_pn']);
                $resumen_finan['act_cir_pn'] = serialize($post['act_cir_pn']);
                $resumen_finan['act_fij_pn'] = serialize($post['act_fij_pn']);
                $resumen_finan['otr_act_pn'] = serialize($post['otr_act_pn']);
                $resumen_finan['tot_act_pn'] = serialize($post['tot_act_pn']);
                $resumen_finan['pas_cp_pn'] = serialize($post['pas_cp_pn']);
                $resumen_finan['pas_lp_pn'] = serialize($post['pas_lp_pn']);
                $resumen_finan['otr_pas_pn'] = serialize($post['otr_pas_pn']);
                $resumen_finan['tot_pas_pn'] = serialize($post['tot_pas_pn']);
                $resumen_finan['cap_soc_pn'] = serialize($post['cap_soc_pn']);
                $resumen_finan['cap_con_nt_pn'] = serialize($post['cap_con_nt_pn']);
                $resumen_finan['tot_pas_cap_pn'] = serialize($post['tot_pas_cap_pn']);
                $resumen_finan['cap_trab_pn'] = serialize($post['cap_trab_pn']);
                $resumen_finan['solve_pn'] = serialize($post['solve_pn']);
                $resumen_finan['liq_pn'] = serialize($post['liq_pn']);

                $this->prestamo_model->procesar_prestamo($solicitud);
                $this->cupos_model->guardar_resumen_financiero_pn($resumen_finan);


                $solicitud = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {

                $this->data['planilla'] = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
                $this->data['planilla']['ing_netos_pn'] = unserialize($this->data['planilla']['ing_netos_pn']);
                $this->data['planilla']['utl_neta_pn'] = unserialize($this->data['planilla']['utl_neta_pn']);
                $this->data['planilla']['act_cir_pn'] = unserialize($this->data['planilla']['act_cir_pn']);
                $this->data['planilla']['act_fij_pn'] = unserialize($this->data['planilla']['act_fij_pn']);
                $this->data['planilla']['otr_act_pn'] = unserialize($this->data['planilla']['otr_act_pn']);
                $this->data['planilla']['tot_act_pn'] = unserialize($this->data['planilla']['tot_act_pn']);
                $this->data['planilla']['pas_cp_pn'] = unserialize($this->data['planilla']['pas_cp_pn']);
                $this->data['planilla']['pas_lp_pn'] = unserialize($this->data['planilla']['pas_lp_pn']);
                $this->data['planilla']['otr_pas_pn'] = unserialize($this->data['planilla']['otr_pas_pn']);
                $this->data['planilla']['tot_pas_pn'] = unserialize($this->data['planilla']['tot_pas_pn']);
                $this->data['planilla']['cap_soc_pn'] = unserialize($this->data['planilla']['cap_soc_pn']);
                $this->data['planilla']['cap_con_nt_pn'] = unserialize($this->data['planilla']['cap_con_nt_pn']);
                $this->data['planilla']['tot_pas_cap_pn'] = unserialize($this->data['planilla']['tot_pas_cap_pn']);
                $this->data['planilla']['cap_trab_pn'] = unserialize($this->data['planilla']['cap_trab_pn']);
                $this->data['planilla']['solve_pn'] = unserialize($this->data['planilla']['solve_pn']);
                $this->data['planilla']['liq_pn'] = unserialize($this->data['planilla']['liq_pn']);
                $this->data['rollover'] = $this->prestamo_model->get_prestamo_pn_by_id($this->data['planilla']['rollover']);
                $this->load->view('procesos/procesar_prestamo_pn', $this->data);
            }
        }
    }

    public function planilla_operacion_pagare_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
            $this->data['res_finan_acc'] = $this->cupos_model->get_resumen_pn($this->data['planilla']['id_cliente']);
            $this->data['exp_interna'] = $this->cupos_model->get_exp_interna_pagare_pn($this->data['planilla']['id_cliente'], $id_solicitud);
            $this->descarga('planillas/operacion_pagare_pn', $this->data, 'operacion de pagare.pdf');
        }
    }

    public function planilla_operacion_prestamo_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
            $this->data['res_finan_acc'] = $this->cupos_model->get_resumen_pn($this->data['planilla']['id_cliente']);
            $this->data['exp_interna'] = $this->cupos_model->get_exp_interna_pagare_pn($this->data['planilla']['id_cliente'], $id_solicitud);
            $this->data['exp_interna'] = $this->prestamo_model->get_exp_interna_prestamo_pn($this->data['planilla']['id_cliente'], $id_solicitud);
            $this->descarga('planillas/operacion_prestamo_pn', $this->data, 'operacion de prestamo.pdf');
        }
    }

    public function descargar_pagare_pn($id_cliente, $id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
            $this->descarga_pagare('planillas/pagare_pn', $this->data, 'Pagare.pdf');
        }
    }

    public function aceptar_solicitud($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
            if ($this->input->post()) {
                $form = $this->input->post();
                $this->cupos_model->aprobar_solicitud($id_solicitud, $form);
                $solicitud = $this->cupos_model->get_cupo_by_id($id_solicitud);

//                $this->email_contrato_aprobado($id_solicitud, $solicitud['id_cliente']);

                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_cupo', $this->data);
            }
        }
    }

    public function activar_solicitud($id_solicitud, $fecha) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
//            debug($fecha, false);
            $this->data['planilla'] = $this->cupos_model->get_solicitud_by_id($id_solicitud);
//            debug($this->data['planilla'], false);
            $form['plazo_solicitud_aprobado'] = $this->data['planilla']['plazo_solicitud_aprobado'];
//                debug($form['plazo'],false);
            $form['fecha_solicitud_aprobado'] = $fecha;
//            debug($form);
            $this->cupos_model->aprobar_solicitud($id_solicitud, $form);
            $solicitud = $this->cupos_model->get_solicitud_by_id($id_solicitud);
            redirect('./clientes/cliente_panel/' . $solicitud['id_cliente'], 'location');
        }
    }

    public function aceptar_pagare_pj($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $form = $this->input->post();
                $this->cupos_model->aceptar_pagare_pj($id_solicitud, $form);
                $solicitud = $this->cupos_model->get_cupo_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_cupo', $this->data);
            }
        }
    }

    public function aceptar_pagare_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $form = $this->input->post();
                $this->cupos_model->aceptar_pagare_pn($id_solicitud, $form);
                $solicitud = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_solicitud_pagare_pn', $this->data);
            }
        }
    }

    public function aceptar_solicitud_pagare($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);

            if ($this->input->post()) {
                $form = $this->input->post();

                $this->cupos_model->aprobar_solicitud($id_solicitud, $form);
                $solicitud = $this->cupos_model->get_cupo_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_pagare', $this->data);
            }
        }
    }

    public function aceptar_solicitud_pagare_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
            if ($this->input->post()) {
                $form = $this->input->post();
                $this->cupos_model->aprobar_solicitud($id_solicitud, $form);
                $solicitud = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_pagare_pn', $this->data);
            }
        }
    }

    public function aceptar_solicitud_prestamo($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);

            if ($this->input->post()) {
                $form = $this->input->post();
                $this->cupos_model->aprobar_solicitud($id_solicitud, $form);
                $solicitud = $this->cupos_model->get_cupo_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_prestamo', $this->data);
            }
        }
    }

    public function aceptar_solicitud_prestamo_pn($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
            if ($this->input->post()) {
                $form = $this->input->post();
                $this->cupos_model->aprobar_solicitud($id_solicitud, $form);
                $solicitud = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
                $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
            } else {
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_prestamo_pn', $this->data);
            }
        }
    }

    public function agrgar_aval($id_solicitud) {
        $form = $this->input->post();
        $datos = $this->cupos_model->get_solicitud_venta($id_solicitud);
        $form['id_pj'] = $datos['id_pj'];
        $id_jun_directiva = $this->cupos_model->agregar_aval($form);
        $this->load->view('redirect', array('destino' => base_url() . 'clientes/aceptar_solicitud_v/' . $id_solicitud));
    }

    public function aceptar_solicitud_v($id_solicitud) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['planilla'] = $this->cupos_model->get_venta_by_id($id_solicitud);
            if ($this->input->post()) {

                if (count($this->input->post()) <= 1) {
                    $this->data['facturas'] = $this->facturas_model->get_facturas($id_solicitud);
                    $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
                    $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
                    $this->data['id_solicitud'] = $id_solicitud;
                    $this->data['rendimiento'] = $this->input->post('rendimiento');
//                    debug($this->data['rendimiento']);
                    $this->load->view('procesos/aceptar_venta', $this->data);
                } else {
                    
                    $form = $this->input->post();
                    $facturas = arreglo($form['facturas']);
                    $this->facturas_model->aceptar_facturas($facturas);
                    
                    unset($form['facturas']);
                    
                    $this->cupos_model->aceptar_solicitud_venta($id_solicitud, $form);
                    $solicitud = $this->cupos_model->get_cupo_by_id($id_solicitud);
                    $this->load->view('procesos/procesado_correctamente', array('id_pj' => $solicitud['id_cliente']));
                    
                    
                }
            } else {
                $this->data['facturas'] = $this->facturas_model->get_facturas($id_solicitud);
                $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
                $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
//                $this->data['avales'] = $this->cupos_model->get_directivos($this->data['id_pj']);
                $this->data['id_solicitud'] = $id_solicitud;
                $this->load->view('procesos/aceptar_venta', $this->data);
            }
        }
    }

    public function acepta_pagare($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->cupos_model->acepta_pagare($id_solicitud);
            $this->load->view('redirect', array('destino' => base_url() . 'clientes/cliente_panel/' . $id_cliente));
        }
    }

    public function cierra_operacion($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->cupos_model->cierra_operacion($id_solicitud);
            $this->load->view('redirect', array('destino' => base_url() . 'clientes/cliente_panel/' . $id_cliente));
        }
    }

    public function rechazar($id_solicitud, $id_cliente) {
        $id_solicitud = (int) $id_solicitud;
        $id_cliente = (int) $id_cliente;
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->cupos_model->rechazar($id_solicitud);
            $this->load->view('redirect', array('destino' => base_url() . 'clientes/cliente_panel/' . $id_cliente));
        }
    }

    public function eliminar($id_solicitud) {
        $id_solicitud = (int) $id_solicitud;
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $this->cupos_model->eliminar($id_solicitud);
        }
    }

    public function calculadora() {
        $this->load->view('calculadora/calculadora');
    }

    public function email_pagare_pn($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion_pn();
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones_pn($id_cliente);
            $this->data['planilla'] = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
            $this->data['data_pn'] = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['tipo'] = 0;
            $this->data['enviado'] = $this->enviar_pagare('planillas/pagare_pn', $this->data, 'Pagare.pdf');

             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_prestamo_pn($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones_pn($id_cliente);
            $this->data['solicitud'] = $this->prestamo_model->get_prestamo_pn_by_id($id_solicitud);
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion_pn();
            $this->data['planilla'] = $this->cupos_model->get_pagare_pn_by_id($id_solicitud);
            $this->data['data_pn'] = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['tipo'] = 0;
            $this->data['enviado'] = $this->enviar_prestamo_pn('planillas/giro_prestamo_pn', $this->data, 'Prestamo.pdf');
             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_prestamo_pj($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['solicitud'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);

            $this->data['enviado'] = $this->enviar_prestamo('planillas/giro_prestamo', $this->data, 'Prestamo.pdf');

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
            $this->data['data_ventas'] = $this->cupos_model->get_ventas($id_cliente);

            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);

             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_prestamo($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['solicitud'] = $this->prestamo_model->get_prestamo_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
            $this->data['enviado'] = $this->enviar_prestamo('planillas/giro_prestamo', $this->data, 'Prestamo.pdf');

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
            $this->data['data_ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);

             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_pagare_pj($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
            $this->data['data_ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
            $this->data['tipo'] = 1;
            $this->data['enviado'] = $this->enviar_pagare('planillas/pagare_pj', $this->data, 'Pagare.pdf');

             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_convenio($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);

            $this->data['planilla'] = $this->cupos_model->get_venta_by_id_planilla($id_solicitud);
            $this->data['solicitud'] = $this->data['planilla'];
            $this->data['planilla'] = $this->cupos_model->get_pagare_by_id($id_solicitud);

            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($id_pj);
            $this->data['facturas'] = $this->facturas_model->get_facturas($id_solicitud);

            $this->data['email'] = $this->data['solicitud'][0]['email_pj'];
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);

            $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
            $this->data['tipo'] = 1;

            $this->data['enviado'] = $this->enviar_convenio('planillas/pagare_pj', $this->data, 'Convenio y Giro.pdf');

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
            $this->data['data_ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_contrato($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);

            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
            $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);

//            debug($id_solicitud, false);   
//            debug($id_cliente, false);   
            $this->data['enviado'] = $this->enviar_contrato('planillas/contrato', $this->data, 'Contrato.pdf');

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['data_cupos'] = $this->cupos_model->get_cupos($id_cliente);
            $this->data['data_ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['data_pagares'] = $this->pagare_model->get_pagare($id_cliente);
            $this->data['data_prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);

             redirect('./clientes/cliente_panel/' . $id_cliente, 'location');
        }
    }

    public function email_contrato_aprobado($id_solicitud, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);

            $this->data['data_empresa'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['reclasifi'] = $this->reclasificacion_model->get_reclasificacion($id_pj);
            $this->data['planilla'] = $this->cupos_model->get_cupo_by_id($id_solicitud);
            $this->data['firma_cont'] = $this->cupos_model->get_firmantes_contrato($id_solicitud);
            $this->data['avales'] = $this->cupos_model->get_avales_contrato($id_solicitud);

            $this->data['enviado'] = $this->enviar_contrato('planillas/contrato', $this->data, 'Contrato.pdf');
        }
    }

    public function agregar_codeudor($id_cliente, $id_solicitud) {
        $this->data['id_cliente'] = $id_cliente;
        $this->data['id_solicitud'] = $id_solicitud;

        if ($this->input->post()) {
            $form = $this->input->post();
            $form['id_solicitud'] = $id_solicitud;
            $this->data['id_pj'] = $id_cliente;
            if ($form['cedula_codeudor'] == '' || $form['nom_apell_codeudor'] == '') {
                $this->load->view('procesos/agregar_codeudor', $this->data);
            } else {
                $this->cupos_model->agregar_codeudor($form);
                $this->load->view('procesos/procesado_correctamente', $this->data);
            }
        } else {
            $this->load->view('procesos/agregar_codeudor', $this->data);
        }
    }

}
