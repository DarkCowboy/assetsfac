<?php
	
    class Contactos extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
             $this->data['menu'] = 'contactos';
            $this->load->view("contacto", $this->data);
        }
    
    }
