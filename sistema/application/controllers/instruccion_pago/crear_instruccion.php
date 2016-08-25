<?php

class Crear_Instruccion extends MY_Controller{
    private $data = array();
    
    public function __construct(){
        parent::__construct(array('bancos_model','proveedores_model'),  array('10','1','2','0'));
    }
    
    public function index(){
        if ($this->centinela){
            if(!$this->rol){
                show_404();
            }
            $this->data['menu_top'] = 'instruccion';
            $this->data['bancos'] = $this->bancos_model->get_bancos();
            $this->data['proveedores'] = $this->proveedores_model->get_proveedores();
            $this->load->view('instruccion_pago/crear_instruccion', $this->data);
        }
    }
}