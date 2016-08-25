<?php

class Main extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('1','2','3','10'));
        $this->data['manu_left'] = 'ingresos';
    }

    public function index() {
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            $this->load->view('ingresos/index', $this->data);
        }
    }

}
