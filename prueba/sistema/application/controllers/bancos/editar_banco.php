<?php

class Editar_Banco extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model'), array('10', '1', '2', '0'));
        $this->data['title'] = 'Editar Banco';
    }

    public function index($id_banco) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'bancos';
            if ($this->input->post()) {
                $form = $this->input->post();
                $form['id_banco'] = $id_banco;
                $this->bancos_model->editar_banco($form);
                $this->session->set_flashdata('result', 'El Banco se ha Editado correctamente');
                redirect('./bancos/ver_banco/'.$id_banco, 'location');
            }
            $this->data['banco'] = $this->bancos_model->get_banco_by_id($id_banco);
            $this->load->view('bancos/editar_banco', $this->data);
        }
    }

}