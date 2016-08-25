<?php

class Configuraciones extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('config_model', 'users_model', 'clientes_model'));
        if ($this->session->userdata('logged_in')) {
            $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];
        }
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->load->view('configuraciones/index', $this->data);
        }
    }

    public function agregar_monedas() {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                //debug($this->input->post());
                $this->data['moneda'] = $this->config_model->agregar_config();
                $this->load->view('configuraciones/editar_monedas', $this->data);
            } else {
                $this->data['moneda'] = $this->config_model->get_moneda();
                $this->load->view('configuraciones/editar_monedas', $this->data);
            }
        }
    }

}