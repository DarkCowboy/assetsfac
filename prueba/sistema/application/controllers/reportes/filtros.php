<?php

class Filtros extends MY_Controller{
    
    private $data = array();
    
    public function __construct(){
        parent::__construct(array(),array('10','1','2','0','50'));
    }
    
    public function index(){
        $this->load->view('reportes/filtro');
    }
    
}