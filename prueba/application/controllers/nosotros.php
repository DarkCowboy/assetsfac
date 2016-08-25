<?php
	
    class Nosotros extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
             $this->data['menu'] = 'nosotros';
            $this->load->view("nosotros", $this->data);
        }
    
    }
