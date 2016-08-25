<?php

class Conciliar_Banco extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array(1, 2, 3, 0, 10));
        $this->data['menu'] = 'bancos';
        $this->data['sub_menu'] = 'conciliar';
    }

    public function index() {
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            if($this->input->post()){
                
            }
            $this->load->view('bancos/conciliar_banco', $this->data);
        }
    }

}
