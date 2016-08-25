<?php

class Agregar_proveedor extends MY_Controller{
    
    private $data= array();
    
    public function __construct(){
        parent::__construct(array('proveedores_model'),array('10','1','2','0'));
       $this->data['title'] =  'Agregar Proveedor';
    }
    
    public function index(){
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            if($this->input->post()){
                $this->proveedores_model->agregar_proveedor($this->input->post());
                $this->session->set_flashdata('error', 'Se ha agregado correctamente el Beneficiario');
                redirect('./proveedores/panel_proveedores/main', 'location');
            }
        }
    }
    
}