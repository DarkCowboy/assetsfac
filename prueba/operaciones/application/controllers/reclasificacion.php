<?php

class Reclasificacion extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('personas_model', 'empresa_model', 'clientes_model', 'pla_inscrip_model', 'cupos_model', 'pagare_model', 'config_model','reclasificacion_model'));

        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];
        }

        $this->data['datos_empresa'] = $this->empresa_model->get_datos_empresa();
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index() {
        
    }

    public function guardar_p_e($id_pj, $id_cliente) {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $reclasificacion = $this->input->post();
            $reclasificacion['id_pj'] = $id_pj;
            $this->reclasificacion_model->save_reclasificacion($reclasificacion);
            $this->load->view('redirect', array('destino' => base_url().'clientes/cliente_panel/'.$id_cliente));
        }
    }

}