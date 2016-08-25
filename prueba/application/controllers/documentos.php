<?php
	
    class Documentos extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
             $this->data['menu'] = 'documentos';
            $this->load->view("documentos", $this->data);
        }
    
    }
