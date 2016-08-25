<?php

class Logout extends CI_Controller {

    public function index() {
//        $this->session->sess_destroy();

        $this->session->unset_userdata('user_data_cliente');
        $this->session->unset_userdata('logged_in_cliente');
        redirect(base_url(), 'location');
    }

}
