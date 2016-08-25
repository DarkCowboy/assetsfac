<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends CI_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('users_model');
        $this->data['title'] = 'Usuarios';
        $this->data['page'] = 'users';
    }

    public function index() {
        if (!$this->session->userdata('logged_in'))
            $this->load->view('redirect', array('destino' => base_url()));

        $this->data['users'] = $this->users_model->get_users();
        $this->load->view('users/home', $this->data);
    }

    public function new_user() {
        $this->data['sm_item'] = 'new';
        $this->data['new_user'] = true;

        $this->edit();
    }

    public function edit($id_user = false) {
        if (!$this->session->userdata('logged_in'))
            $this->load->view('redirect', array('destino' => base_url()));

        if ($this->input->post()) {
            if ($this->input->post('action') == 'new') {
                $this->users_model->save();
                $this->load->view('redirect', array('destino' => base_url() . 'users/'));
            } elseif ($this->input->post('action') == 'update') {
                $this->users_model->update($id_user);
                $this->load->view('redirect', array('destino' => base_url() . 'users/'));
            }
        }

        if ($id_user) {
            $this->data['user_data'] = $this->users_model->get_users($id_user);
        }

        $this->load->view('users/user_edit', $this->data);
    }

    public function create() {
        if (!$this->session->userdata('logged_in'))
            $this->load->view('redirect', array('destino' => base_url()));

        if ($this->input->post()) {
            $this->users_model->save();
            $this->load->view('redirect', array('destino' => base_url() . 'users'));
        }
    }

    public function reset($id_user) {
        if (!$this->session->userdata('admin_logged_in'))
            $this->load->view('redirect', array('destino' => base_url() . 'admin'));

        $this->users_model->reset($id_user);
        $this->load->view('redirect', array('destino' => '../'));
    }

    /**
     * Habilita un usuario
     * @param int $id_user Id del usuario
     */
    public function enable($id_user) {
        if (!$this->session->userdata('admin_logged_in'))
            $this->load->view('redirect', array('destino' => base_url() . 'admin'));

        $this->users_model->status($id_user, 1);
        $this->load->view('redirect', array('destino' => '../'));
    }

    /**
     * Deshabilita un usuario
     * @param int $id_user Id del usuario
     */
    public function disable($id_user) {
        if (!$this->session->userdata('logged_in'))
            $this->load->view('redirect', array('destino' => base_url()));

        $this->users_model->status($id_user, 0);
        $this->load->view('redirect', array('destino' => '../'));
    }

    public function delete($id_user) {
        $this->users_model->status($id_user, -1);
        $this->load->view('redirect', array('destino' => '../'));
    }

    /**
     * Cierra sesión y redirige al home administrativo
     */
    public function logout() {
//		$this->session->sess_destroy();
        $this->session->unset_userdata('user_data');
        $this->session->unset_userdata('logged_in');
        $this->load->view('redirect', array('destino' => base_url()));
    }

    public function check_email() {
        if (!$this->session->userdata('logged_in'))
            $this->load->view('redirect', array('destino' => base_url()));

        $result = 'ok';

        $exist = $this->users_model->get_user_by_email($this->input->post('email'));

        if ($exist) {
            $user_data = $this->users_model->user_data->result_array();

            if ($this->input->post('action') === 'update' && $this->input->post('id_user') != $user_data[0]['id_user']) {
                $this->load->view('users/login_result', array('error_message' => 'Email ya existente'));
                $result = '';
            } elseif ($this->input->post('action') === 'new') {
                $result = '';
                $this->load->view('users/login_result', array('error_message' => 'Email ya existente'));
            }
        }

        $exist = $this->users_model->get_user_by_id_number($this->input->post('id_number'));

        if ($exist) {
            $user_data = $this->users_model->user_data->result_array();

            if ($this->input->post('action') === 'update' && $this->input->post('id_number') != $user_data[0]['id_number']) {
                $this->load->view('users/login_result', array('error_message' => 'Cédula existente'));
                $result = '';
            } elseif ($this->input->post('action') === 'new') {
                $this->load->view('users/login_result', array('error_message' => 'Cédula existente'));
                $result = '';
            }
        }

        echo $result;
    }

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */