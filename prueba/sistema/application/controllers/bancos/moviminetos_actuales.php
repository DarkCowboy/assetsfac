<?php

class Moviminetos_Actuales extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('bancos_model'), array('1', '10', '2', '3', '0'));
    }

    public function index($id_banco) {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $form['query'] = " instrucciones.status >= 0 and  SHA(instrucciones.id_banco) = '" . $id_banco . "' and Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
            $this->data['banco'] = $this->bancos_model->busqueda_avanzada($form);

            $query_ant = " SHA(id_banco) = '" . $id_banco . "' and mes_year = '" . date('m/Y', strtotime("-1 month")) . "'";
            $this->data['corte_mes_anterior'] = $this->bancos_model->comprueba_corte($query_ant);

            $query_aho = " SHA(id_banco) = '" . $id_banco . "' and mes_year = '" . date('m/Y') . "'";
            $this->data['corte_mes_actual'] = $this->bancos_model->comprueba_corte($query_aho);

            $this->data['datos_banco'] = $this->bancos_model->get_banco_by_id($id_banco);

            $this->descarga('bancos/movimientos_actuales', $this->data, 'Movimientos');
        }
    }

}
