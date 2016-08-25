<?PHP

class Ver_Planilla extends My_Controller {

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
    
    public function index($id_solicitud){
        
            $this->data['user_name'] = $this->session->userdata['user_data_cliente']['first_name'] . ' ' . $this->session->userdata['user_data_cliente']['last_name'];
            $this->data['title'] = 'Planilla de Solicitud';
            $this->data['page'] = 'Planila de solicitud';
            $id_cliente = @$this->session->userdata['user_data_cliente']['id_cliente'];
            $this->data['operacion'] = $this->cupos_model->get_venta_by_id($id_solicitud);
            
            if($this->data['operacion']['tipo_solicitud'] == 1){
                $this->data['href'] = 'cupos/planilla_solicitud_cupo/'.$id_solicitud;
                $this->data['tipo_soli'] = 'Cupo';
            }elseif($this->data['operacion']['tipo_solicitud'] == 2){
                $this->data['href'] = 'cupos/solicitud_de_venta_planilla/'.$id_solicitud;
                $this->data['tipo_soli'] = 'Venta';
            }elseif($this->data['operacion']['tipo_solicitud'] == 3){
                $this->data['href'] = 'pagare/descarga_solicitud_pagare/'.$id_solicitud;
                $this->data['tipo_soli'] = 'Pagare';
            }
            
            
            $this->load->view('ver_planilla', $this->data);
        
    }
    
}
