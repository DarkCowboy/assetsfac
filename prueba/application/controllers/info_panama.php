<?php
	
    class Info_Panama extends MY_Controller{
        
        private $data = array();
    
        public function __construct(){
            parent::__construct();
            
            
        }
        
        function index(){
            $this->load->view("info_panama", $this->data);
        }
    
    }
