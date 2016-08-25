<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
            if ($this->session->userdata['user_data_cliente']['id_cliente']) {
                $this->data['tipo'] = $this->session->userdata['user_data_cliente']['tipo'];
                $id_cliente = $this->session->userdata['user_data_cliente']['id_cliente'];
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
            }
            if ($this->data['tipo'] == 0) {
                $valida_planilla_pn = $this->pla_inscrip_model->get_planilla_pn($id_cliente);
                if ($valida_planilla_pn) {
                    $this->data['planilla'] = $valida_planilla_pn;
                    $this->data['id_pn'] = $valida_planilla_pn['id_pn'];
                }
            }
        }
    }

    public function panel_cliente_admin($id_cliente) {
        if ($this->session->userdata('logged_in')) {
            $cliente = $this->clientes_model->get_clientes($id_cliente);
            $valida = $this->valida_usuario($cliente);
            $this->load->view('redirect', array('destino' => base_url()));
        }
    }

    public function index($pos = 0) {
        $this->data['pos'] = $pos;
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['user_name'] = $this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
            $this->data['title'] = 'Inicio';
            $this->data['page'] = 'inicio';
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['ventas'] = $this->cupos_model->get_ventas($id_cliente);
            $this->data['pagare'] = $this->pagare_model->get_pagare($id_cliente);
            if ($this->data['tipo'] == 1) {
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente);
            } else {
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones_pn($id_cliente);
            }
            $this->load->view('home', $this->data);
        } else {
            if ($this->input->post()) {
                echo '<script>alert(\'Nombre de Usuario o Contraseña Incorrecta, verifique e intente nuevamente\');</script>';
            }
            echo '<script>window.close();</script>';
        }
    }

    public function posicion_actual() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $id_cliente = $this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['operaciones'] = $this->cupos_model->get_operaciones_reportes_vcto($id_cliente);
            $this->descarga_reporte('posicion_actual', $this->data, 'Reporte_Vencimiento.pdf');
        }
    }

    public function status_solicitudes() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['user_name'] = $this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
            $this->data['title'] = 'Estatus de Solicitudes';
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            if ($this->data['tipo'] == 1) {
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones($id_cliente, 1);
            } else {
                $this->data['operaciones'] = $this->cupos_model->get_all_operaciones_pn($id_cliente);
            }
            $this->load->view('clientes/operaciones_pendientes', $this->data);
        }
    }

    public
            function cambiar_password() {
        $valida = $this->valida_usuario();
        $email = $this->session->userdata['user_data_cliente']['email'];
        $pass = $this->session->userdata['user_data_cliente']['pass'];

        if ($valida == true) {

            if ($this->input->post()) {
                $form = $this->input->post();
                $password_old = $form['pass_old'];
                $password_enc_old = md5($email . $password_old);
                if ($password_enc_old == $pass) {
                    //asd
                    $new_pass = md5($email . $form['pass']);
                    $this->clientes_model->cambia_password($email, $new_pass);
                    $this->data['notify_pass'] = 'El Password se ha cambiado correctamente';
                } else {
                    $this->data['error_pass'] = 'El Password Actual introducido no es correcto intente nuevamente';
                }
            }

            $this->data['user_name'] = $this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
            $this->data['title'] = 'Cambio de Clave';
            $this->load->view('clientes/cambio_clave', $this->data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */