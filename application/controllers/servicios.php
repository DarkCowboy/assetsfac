<?php
	
    class Servicios extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
             $this->data['menu'] = 'servicios';
            $this->load->view("servicios", $this->data);
        }
    
    }
