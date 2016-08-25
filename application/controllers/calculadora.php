<?php
	
    class Calculadora extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
            $this->load->view("calculadora", $this->data);
        }
    
    }
