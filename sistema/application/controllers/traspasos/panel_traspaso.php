<?php

class Panel_Traspaso extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct('traspasos_model', array('10', '1', '0', '2'));
        $this->data['menu_top'] = 'traspasos';
    }

    public function index() {
        $this->data['traspasos'] = $this->traspasos_model->get_all_traspasos_limit();
        $this->load->view('traspasos/panel_traspaso', $this->data);
    }

    public function main() {
        if ($this->centinela) {
            if ($this->rol) {
                $this->load->view('traspasos/index', $this->data);
            }
        }
    }

}
