<?php

class Comprobar_pago extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('empresa_model', 'clientes_model', 'cupos_model', 'config_model', 'pausa_model', 'facturas_model'));

//        $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];

        $this->data['datos_empresa'] = $this->empresa_model->get_datos_empresa();
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
        $this->data['moneda'] = $this->config_model->get_parameter_sistema('moneda');
    }

    public function index($id_solicitud, $id_cliente) {
        $this->data['operacion'] = $this->cupos_model->get_solicitud_by_id($id_solicitud);
        if ($this->data['operacion']['tipo_solicitud'] == 2) {
            $this->data['operacion']['facturas'] = $this->facturas_model->get_facturas($this->data['operacion']['id_solicitud']);
        }
//        debug($this->data['operacion']['tipo_solicitud']);


        $this->data['id_cliente'] = $id_cliente;
        $this->load->view('procesos/comprobar_pago', $this->data);
    }

    public function registra_pago($id_cliente) {

        $form = $this->input->post();

        $this->db->where('id_solicitud', $form['id_solicitud']);
        $x = $this->db->get('pagos');

        if (!$x->num_rows) {
            $this->data['operacion'] = $this->cupos_model->get_solicitud_by_id($form['id_solicitud']);
            $data['id_solicitud'] = $this->data['operacion']['id_solicitud'];
            $data['n_operacion'] = $this->data['operacion']['n_operacion'];
            $data['tipo_solicitud'] = $this->data['operacion']['tipo_solicitud'];
            $data['fecha_solicitud'] = $this->data['operacion']['fecha_solicitud'];
            $data['monto_solicitud_aprobado'] = $this->data['operacion']['monto_solicitud_aprobado'];
            $data['plazo_solicitud_aprobado'] = $this->data['operacion']['plazo_solicitud_aprobado'];
            $data['fecha_solicitud_aprobado'] = $this->data['operacion']['fecha_solicitud_aprobado'];
            $data['fecha_vcto_solicitud_aprobado'] = $this->data['operacion']['fecha_vcto_solicitud_aprobado'];
        } else {
            $data = null;
        }

        $Post['dif_actual'] = number_format($form['dif_actual'], 2, '.', '');
        $Post['ingreso_diferencial'] = str_replace('.', '', $form['monto_diferencial']);
        $Post['ingreso_diferencial'] = str_replace(',', '.', $Post['ingreso_diferencial']);
        $Post['pago_capital'] = str_replace('.', '', $form['monto_capital']);
        $Post['pago_capital'] = str_replace(',', '.', $Post['pago_capital']);
        $Post['total_depositado'] = str_replace('.', '', $form['monto_depositado']);
        $Post['total_depositado'] = str_replace(',', '.', $Post['total_depositado']);
        $Post['fecha_pago'] = $form['fecha_pago'];
        $Post['status'] = 1;

        $this->pausa_model->registrar_pago($Post, $form['id_solicitud'], $data);
        $this->cupos_model->cierra_operacion($form['id_solicitud']);

        $this->load->view('procesos/procesado_correctamente', array('id_pj' => $id_cliente));
    }

    public function registra_pago_facturas($id_cliente, $fin = null) {

        $form = $this->input->post();
        $count_fact = $form['count_fact'];
//        debug($form, false);
        
        unset($form['count_fact']);
        
        $n_factura = explode('; ', $form['numero_facturas']);
        $id_factura = explode('; ', $form['id_factura']);
        $facturas = array();
        
//        debug($facturas, false);

        for ($i = 0; $i < count($n_factura); $i++) {
            if ($id_factura[$i]) {
                $facturas[$i] = array('id_factura' => $id_factura[$i], 'n_factura' => $n_factura[$i]);
            }
        }
//        debug($count_fact, false);
//        debug(count($facturas), false);
//        debug($count_fact == count($facturas));
        
        if($count_fact == count($facturas)){
            $fin = True;
        }
        
//        debug($fin);
        
//        Datos Tabla pagos
        $operacion = $this->cupos_model->get_solicitud_by_id($form['id_solicitud']);
        $pagos['id_solicitud'] = $form['id_solicitud'];
        $pagos['tipo_solicitud'] = 2;
        $pagos['n_operacion'] = $form['n_operacion'];
        $pagos['facturas'] = serialize($facturas);
        $pagos['fecha_solicitud'] = $operacion['fecha_solicitud'];
        $pagos['monto_solicitud_aprobado'] = $operacion['monto_solicitud_aprobado'];
        $pagos['plazo_solicitud_aprobado'] = $operacion['plazo_solicitud_aprobado'];
        $pagos['fecha_solicitud_aprobado'] = $operacion['fecha_solicitud_aprobado'];
        $pagos['fecha_vcto_solicitud_aprobado'] = $operacion['plazo_solicitud_aprobado'];
        $pagos['total_depositado'] = $form['monto_depositado'];
        $pagos['fecha_pago'] = $form['fecha_pago'];
        $pagos['ingreso_diferencial'] = $form['monto_diferencial'];
        $pagos['pago_capital'] = $form['monto_capital'];
        $pagos['status'] = 1;

        $this->facturas_model->registrar_pago_factura($pagos);
        
        foreach ($facturas as $row) {
            $this->facturas_model->cancelar_facturas($row['id_factura']);
        }


        if ($fin) {
            $this->cupos_model->cierra_operacion($form['id_solicitud']);
        }

        $this->load->view('procesos/procesado_correctamente', array('id_pj' => $id_cliente));
    }

}
