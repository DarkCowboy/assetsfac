<?php

class Agregar_contraparte extends MY_Controller{
    
    private $data= array();
    
    public function __construct(){
        parent::__construct(array('proveedores_model'),array('10','1','2','0'));

        }
    
    public function index(){
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            if($this->input->post()){
                $this->proveedores_model->agregar_proveedor($this->input->post());
                $this->session->set_flashdata('result', 'Se ha agregado correctamente la Contraparte');
                redirect('./contrapartes/crear_contraparte', 'location');
            }
        }
    }
    
}