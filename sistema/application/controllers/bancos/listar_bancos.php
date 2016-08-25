<?php

class Listar_bancos extends MY_Controller{
    
    private $data = array();
    
    public function __construct(){
        parent::__construct(array('bancos_model'),array('1','10','2','0'));
        $this->data['menu'] = 'bancos';
        $this->data['sub_menu'] = 'listar_bancos';
    }
    public function index(){
       if($this->centinela){
           if(!$this->rol){
               show_404();
           }
           $this->data['bancos'] = $this->bancos_model->get_bancos();
           $this->load->view('bancos/listar_bancos',$this->data);
       } 
    }
    
    
}