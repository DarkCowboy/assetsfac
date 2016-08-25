<?PHP

class Pagos extends My_Controller {

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
                $this->data['id_cliente'] = $id_cliente;
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

    public function index($id_solicitud) {
        
    }

    public function facturas() {
        $this->data['user_name'] = $this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
        $ventas = $this->cupos_model->get_ventas($this->data['id_cliente']);
        foreach ($ventas as &$row) {
            if ($row['status'] == 2 || $row['status'] == 6) {
                $row['facturas'] = $this->facturas_model->get_facturas($row['id_solicitud']);
            }
        }
        $this->data['operaciones'] = $ventas;
        $this->load->view('pagos/facturas', $this->data);
    }
    
    
    public function pagare(){
        $this->data['operaciones'] = $this->pagare_model->get_pagare($this->data['id_cliente']);
        
        $this->load->view('pagos/pagare', $this->data);
    }

    public function cargar_pago() {

        $form = $this->input->post();

        $n_factura = explode('; ', $form['numero_facturas']);
        $id_factura = explode('; ', $form['id_factura']);
        $facturas = array();

        for ($i = 0; $i < count($n_factura); $i++) {
            if ($id_factura[$i]) {
                $facturas[$i] = array('id_factura' => $id_factura[$i], 'n_factura' => $n_factura[$i]);
            }
        }
        $config['upload_path'] = './recibos/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = md5(microtime());

        $this->load->library('upload', $config);
        if ($form['id_factura']) {
            if ($this->upload->do_upload('recibo')) {
                $archivo = $this->upload->data();
                $this->datos['nombre_recibo'] = $archivo['file_name'];
                $this->datos['tipo'] = $archivo['file_type'];
                $this->datos['facturas'] = serialize($facturas);
                $id_recibo = $this->facturas_model->guarda_recibo($this->datos);
                $facturas['id_recibo'] = $id_recibo;
                $facturas['fecha_pausado'] = $form['fecha_pago'];
                $this->facturas_model->pause_facturas($facturas);
                $this->session->set_flashdata('result', 'La notificacion de pago se ha mandado correctamente');
            } else {
                $this->session->set_flashdata('error', 'No ha adjuntado ningun archivo o imagen demasiada pesada');
            }
        } else {
            $this->session->set_flashdata('error', 'No ha seleccionada ninguna Factura');
        }
        redirect('./pagos/facturas', 'location');
    }
    
    public function carga_pago_pagare(){
//        debug($this->input->post());
        $form = $this->input->post();
        
        $n_operaciones = explode('; ', $form['numero_facturas']);
        $id_solicitud = explode('; ', $form['id_factura']);
        $operaciones = array();

        for ($i = 0; $i < count($n_operaciones); $i++) {
            if ($id_solicitud[$i]) {
                $operaciones[$i] = array('id_solicitud' => $id_solicitud[$i], 'n_operacion' => $n_operaciones[$i]);
            }
        }
        
//        debug($operaciones, false);
        
        $config['upload_path'] = './recibos/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['file_name'] = md5(microtime());

        $this->load->library('upload', $config);
        if ($form['id_factura']) {
            if ($this->upload->do_upload('recibo')) {
                $archivo = $this->upload->data();
                $this->datos['nombre_recibo'] = $archivo['file_name'];
                $this->datos['tipo'] = $archivo['file_type'];
                $this->datos['facturas'] = serialize($operaciones);
                $id_recibo = $this->pagare_model->guarda_recibo($this->datos);
                $operaciones['id_recibo'] = $id_recibo;
                $operaciones['fecha_pausado'] = $form['fecha_pago'];
                
//                debug($operaciones);
                
                $this->pagare_model->pause_operacion($operaciones);
                
                
                
                $this->session->set_flashdata('result', 'La notificacion de pago se ha mandado correctamente');
            } else {
                $this->session->set_flashdata('error', 'No ha adjuntado ningun archivo o imagen demasiada pesada');
            }
        } else {
            $this->session->set_flashdata('error', 'No ha seleccionada ningun Pagare');
        }
        redirect('./pagos/pagare', 'location');
    }

}
