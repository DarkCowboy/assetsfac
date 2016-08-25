<?php

class Crear_Banco extends MY_Controller{
    
    private $data = array();
    
    public function __construct(){
        parent::__construct(array(),array('10','1','0','2'));
        $this->data['title'] = 'Bancos';
        $this->data['menu'] = 'bancos';
        $this->data['sub_menu'] = 'crear_banco';
        
    }
    
    public function index(){
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            $this->data['menu_top'] = 'bancos';
            $this->load->view('bancos/crear_banco', $this->data);
        }
    }
    
}