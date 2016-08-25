<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array(), array('0', '1', '2', '3', '10', '50'));
        $this->data['title'] = 'Nomina MsFactoring';
    }

    public function index() {
//            debug('aqui1', false);
        $this->data['menu_top'] = 'index';
        if ($this->centinela) {
//            debug('aqui2', false);
            if (!$this->rol) {
//            debug('aqui3', false);
                show_404();
            }
//            debug('aqui');
            $this->load->view('welcome_message', $this->data);
        }
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */