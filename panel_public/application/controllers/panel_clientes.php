<?php

class Panel_Clientes extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('pla_inscrip_model', 'cupos_model', 'facturas_model', 'config_model', 'pagare_model', 'prestamo_model'));
        $this->data['tipo'] = @$this->session->userdata['user_data_cliente']['tipo'];
        if ($this->session->userdata('logged_in_cliente')) {
            $this->data['user_name'] = @$this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
            $this->data['id_cliente'] = @$this->session->userdata['user_data_cliente']['id_cliente'];
        }
        $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];

        $this->data['ventas'] = $this->cupos_model->get_ventas($id_cliente);
        $this->data['pagare'] = $this->pagare_model->get_pagare($id_cliente);
        $this->data['prestamo'] = $this->prestamo_model->get_prestamo($id_cliente);
        $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);

        //Verifico si existen todas las planillas de Persona natural
        if ($id_pj != null) {
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
//            debug($this->data['planilla']);
            $directivos = $this->data['planilla']['junta_directiva'];
            if (count($directivos) > 0) {
                foreach ($directivos as &$row) {

                    $row['ficha_pn_pj'] = $this->pla_inscrip_model->get_ficha_pn_pj($row['id_jun_directiva']);
                    if (!$row['ficha_pn_pj']) {
                        $row['ficha_pn_pj'] = $this->pla_inscrip_model->get_planilla_pn_cedula($row['cedula_dir']);
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
            $this->data['directivos'] = $directivos;
        }
        //fin verificacion planilla persona natural
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
        //fin confirmacion de cupo
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            
        }
    }

    public function planilla_inscripcion($act=0) {
        
//        debug($this->input->post());
        $this->data['act'] = $act;
        $this->data['menu'] = 'planilla';
        $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
        $valida = $this->valida_usuario();
        if ($valida == true) {
            //si es Compañia entonces
            if ($this->data['tipo'] == 1) {
                //veo si es un post para editar o guardar los datos de la planilla de la compañia
                if ($this->input->post()) {
                    
                    $this->data['planilla'] = $this->pla_inscrip_model->salvar_planilla_inscripcion($id_cliente);
                    $this->load->view('redirect', array('destino' => base_url() . 'panel_clientes/planilla_inscripcion'));
                } else {
                    //si no entonces reviso si existe ya la planilla y me traigo los datos
                    $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
                    if ($id_pj != null) {
                        $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
                    }
                    $this->load->view('planilla_inscripcion/planilla_empresa', $this->data);
                }
            } else {
                //veo si es un post para editar o guardar los datos de la planilla de persona natural
                if ($this->input->post()) {
                    $this->data['planilla'] = $this->pla_inscrip_model->salvar_planilla_inscripcion_pn();
                    $this->load->view('redirect', array('destino' => base_url() . 'panel_clientes/planilla_inscripcion'));
                } else {
                    //si no entonces reviso si existe ya la planilla y me traigo los datos
                    $valida_planilla_pn = $this->pla_inscrip_model->get_planilla_pn($id_cliente);

                    if ($valida_planilla_pn) {
                        $this->data['planilla'] = $valida_planilla_pn;
                    }
                }
                $this->load->view('planilla_inscripcion/persona_natural', $this->data);
            }
        }
    }

    public function ficha_persona_natural($id_directivo = null) {
        $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->data['tipo'] == 1) {
                $this->data['directivo'] = $this->pla_inscrip_model->get_directivo($id_directivo);
                $this->data['menu'] = 'ficha';
                if ($this->input->post()) {
                    $this->data['ficha_pn_pj'] = $this->pla_inscrip_model->salvar_ficha_pn_pj();
                    $this->load->view('redirect', array('destino' => base_url() . 'panel_clientes/fichas_pj'));
                } else {
                    $this->data['ficha_pn_pj'] = $this->pla_inscrip_model->get_ficha_pn_pj($id_directivo);
                    if (!$this->data['ficha_pn_pj']) {
                        $this->data['ficha_pn_pj'] = $this->pla_inscrip_model->get_planilla_pn_cedula($this->data['directivo']['cedula_dir']);
                    }
                }

                $this->load->view('fichas/ficha_persona_natural_pj', $this->data);
            } else {
                debug('usted no esta autorizado para realizar esta operacion');
            }
        }
    }

    public function fichas_pj() {
        $this->data['menu'] = 'ficha_pj';
        $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
        $valida = $this->valida_usuario();
        if ($valida == true) {
            if ($this->data['tipo'] == 1) {
                $this->load->view('fichas/panel_ficha_pj', $this->data);
            } else {
                debug('usted no esta autorizado para realizar esta operacion');
            }
        }
    }

    public function delete_directivo($id_jun_directiva) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['ficha_pn_pj'] = $this->pla_inscrip_model->delete_directivo($id_jun_directiva);
            $this->load->view('redirect', array('destino' => base_url() . 'panel_clientes/planilla_inscripcion'));
        }
    }

    public function delete_accionista($id_nom_accionista) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['ficha_pn_pj'] = $this->pla_inscrip_model->delete_accionista_by_id($id_nom_accionista);
            $this->load->view('redirect', array('destino' => base_url() . 'panel_clientes/planilla_inscripcion'));
        }
    }

    public function descarga_ficha_pj() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion();
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $id_pj = $this->pla_inscrip_model->get_id_pj($id_cliente);
            $this->data['planilla'] = $this->pla_inscrip_model->get_planilla_empresa($id_pj);
            $this->data['rep_legal'] = $this->cupos_model->get_rep_legal($this->data['planilla']['id_pj']);
            $this->descarga('planillas/ficha_juridica', $this->data, 'ficha_persona_juridica.pdf');
        }
    }

    public function descarga_ficha_pn() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['declaracion_jurada'] = $this->config_model->get_declaracion_pn();
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
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
    
    public function empresa_panama_datos_empresa(){
        $this->load->view('planilla_inscripcion/empresa_panama_datos_empresa');
    }
    public function empresa_venezolana_datos_empresa(){
        $this->load->view('planilla_inscripcion/empresa_venezolana_datos_empresa');
    }
    public function empresa_panama_registro(){
        $this->load->view('planilla_inscripcion/empresa_panama_registro');
    }
    public function empresa_venezolana_registro(){
        $this->load->view('planilla_inscripcion/empresa_venezolana_registro');
    }
    public function nomina_accionista_venezuela(){
        $this->load->view('planilla_inscripcion/nomina_accionista_venezuela');
    }

}