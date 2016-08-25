<?php

class Pausa_Operacion extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('empresa_model', 'clientes_model', 'cupos_model', 'config_model', 'pausa_model'));

        $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];

        $this->data['datos_empresa'] = $this->empresa_model->get_datos_empresa();
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index($id_solicitud) {

        $this->data['operacion'] = $this->cupos_model->get_solicitud_by_id($id_solicitud);
        $data['id_solicitud'] = $this->data['operacion']['id_solicitud'];
        $data['n_operacion'] = $this->data['operacion']['n_operacion'];
        $data['tipo_solicitud'] = $this->data['operacion']['tipo_solicitud'];
        $data['fecha_solicitud'] = $this->data['operacion']['fecha_solicitud'];
        $data['monto_solicitud_aprobado'] = $this->data['operacion']['monto_solicitud_aprobado'];
        $data['plazo_solicitud_aprobado'] = $this->data['operacion']['plazo_solicitud_aprobado'];
        $data['fecha_solicitud_aprobado'] = $this->data['operacion']['fecha_solicitud_aprobado'];
        $data['fecha_vcto_solicitud_aprobado'] = $this->data['operacion']['fecha_vcto_solicitud_aprobado'];
        $this->pausa_model->pausar_solicitud($data);
        redirect('./clientes/cliente_panel/' . $this->data['operacion']['id_cliente'], 'location');
    }

    public function reanudar($id_solicitud) {
        $this->pausa_model->reanudar($id_solicitud);
        $this->data['operacion'] = $this->cupos_model->get_solicitud_by_id($id_solicitud);
        redirect('./clientes/cliente_panel/' . $this->data['operacion']['id_cliente'], 'location');
    }

}
