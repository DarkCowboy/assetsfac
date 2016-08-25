<?php
	
    class Preguntas extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
             $this->data['menu'] = 'preguntas';
            $this->load->view("preguntas", $this->data);
        }
    
    }
