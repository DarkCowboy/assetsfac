<?php

class Crear_Proveedor extends MY_Controller{
    
    private $data = array();
    
    public function __construct(){
        parent::__construct(array('proveedores_model'),array('10','0','1','2'));
        $this->data['title'] =  'Beneficiarios';
    }
    
    public function index(){
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            $this->data['menu_top'] = 'proveedores';
            $this->load->view('proveedores/crear_proveedor', $this->data);
        }
    }
    
}