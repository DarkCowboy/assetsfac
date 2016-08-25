<?php

class Depositos extends MY_Controller{
    
    private $data = array();
    
    public function __construct(){
        parent::__construct(array('bancos_model'),array('0','1','2','10'));
        $this->data['title'] = 'Depositos / Transferencias';  
    }
    
    public function index(){
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            $this->data['menu_top'] = 'bancos';
            $this->data['lista_bancos'] = $this->bancos_model->get_bancos();
            $this->load->view('bancos/depositos', $this->data);
        }
    }
}