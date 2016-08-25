<?php

class Empresa extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('empresa_model', 'users_model', 'clientes_model'));
        if ($this->session->userdata('logged_in')) {
            $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];
            $this->data['datos_empresa'] = $this->empresa_model->get_datos_empresa();
            $this->data['junta_directiva'] = $this->empresa_model->get_junta_direct();
        }
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->load->view('empresa/index', $this->data);
        }
    }

    public function agrega_edita() {
        $valida = $this->valida_usuario();
        if ($valida == true) {

            if ($this->input->post()) {
                $datos_empresa = $this->empresa_model->add_edit();
                $datos_empresa['mensaje'] = 'Datos cargados y actualizados correctamente';
                $this->data['datos_empresa'] = $datos_empresa;
            }
            $this->load->view('empresa/index', $this->data);
        }
    }

    public function agrega_edita_j_d() {
        $valida = $this->valida_usuario();
        if ($valida==true){
            
        $x = $this->input->post();
        foreach ($x as $key => $value) {
            $dim = count($value);
            $keys[] = $key;
            $values[] = $value;
        }
        $j = 0;
        for ($i = 1; $i <= $dim; $i++) {
            $arreglo[$j] = $keys;
            $j++;
        }
        $j = 0;
        foreach ($arreglo as &$row) {
            $din_row = count($row);
            for ($i = 0; $i < $din_row; $i++) {
                $row[$row[$i]] = $values[$i][$j];
                unset($row[$i]);
            }
            $j++;
        }
        $this->data['junta_directiva'] = $this->empresa_model->add_edit_j_d($arreglo);
        $this->load->view('empresa/index', $this->data);
        }
    }
    
    public function delete_jd($id_jd){
        $this->empresa_model->delete_jd($id_jd);
        $this->index();
    }

}