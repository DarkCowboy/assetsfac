<?php

class Main extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model'), array('0', '1', '10', '2'));
        $this->data['title'] = 'Instrucciones de Pagos MsFactoring';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->data['menu_top'] = 'bancos';
            $this->data['lista_bancos'] = $this->bancos_model->get_bancos();
            $this->load->view('bancos/index', $this->data);
        }
    }

    public function eliminar_banco($id_banco) {
        $this->bancos_model->eliminar_banco($id_banco);
        $this->session->set_flashdata('result', 'El Banco se ha Eliminado correctamente');
        redirect('./bancos/panel_bancos/', 'location');
    }

    public function habilitar($id_banco) {
        $this->bancos_model->habilitar($id_banco);
        $this->session->set_flashdata('result', 'El Banco se ha Habilitado correctamente');
        redirect('./bancos/panel_bancos/', 'location');
    }

    public function deshabilitar($id_banco) {
        $this->bancos_model->deshabilitar($id_banco);
        $this->session->set_flashdata('result', 'El Banco se ha Deshabilitado correctamente');
        redirect('./bancos/panel_bancos/', 'location');
    }

}
