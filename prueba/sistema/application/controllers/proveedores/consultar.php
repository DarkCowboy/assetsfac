<?php

class Consultar extends MY_Controller{
    
    private $data = array();
    
    public function __construct(){
        parent::__construct(array('proveedores_model'),array('10','1','2','0'));
        $this->data['title'] = 'Consulta de Cliente';        
    }
    
    public function index($id_proveedor){
        if($this->centinela){
            if(!$this->rol){
                show_404();
            }
            $this->data['historico'] =  $this->proveedores_model->get_all_info_provee($id_proveedor);
            $this->descarga_reporte('proveedores/consultar', $this->data, 'Consulta de Cliente');
        }
    }
    
}