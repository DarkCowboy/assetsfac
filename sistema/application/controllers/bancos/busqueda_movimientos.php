<?php

class Busqueda_Movimientos extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('instrucciones_model', 'bancos_model'), array('1', '2', '3', '10'));
        $this->data['menu_top'] = 'bancos';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {

                $form = $this->input->post();
                $id_banco = $form['id_banco'];
                $excel = $form['excel'];
                unset($form['excel']);
                $form = $form['data']['BusquedaCuenta'];
                switch ($form['periodo']) {
                    case 'o': //Otro
                        $form['desde'] = $form['fechaDesde']['year'] . '-' . $form['fechaDesde']['month'] . '-' . $form['fechaDesde']['day'] . ' 00:00:00';
                        $form['hasta'] = $form['fechaHasta']['year'] . '-' . $form['fechaHasta']['month'] . '-' . $form['fechaHasta']['day'] . ' 00:00:00';
                        $form['query'] = ' id_banco = ' . $id_banco . ' and DATE(fecha_pago) BETWEEN \'' . $form['desde'] . '\' AND \'' . $form['hasta'] . '\' ';

                        $query_ant = " id_banco = " . $id_banco . " and mes_year = '" . date('m/Y', strtotime("-1 month")) . "'";
                        $this->data['corte_mes_anterior'] = $this->bancos_model->comprueba_corte($query_ant);

                        $query_aho = " id_banco = " . $id_banco . " and mes_year = '" . date('m/Y') . "'";
                        $this->data['corte_mes_actual'] = $this->bancos_model->comprueba_corte($query_aho);

                        $this->data['reporte'] = $this->bancos_model->busqueda_avanzada($form);
                        $this->data['titulo_reporte'] = ' desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;


                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);

                        $form['query'] = " id_banco = " . $id_banco . " and Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->bancos_model->busqueda_avanzada($form);

                        $query_ant = " id_banco = " . $id_banco . " and mes_year = '" . date('m/Y', strtotime("-1 month")) . "'";
                        $this->data['corte_mes_anterior'] = $this->bancos_model->comprueba_corte($query_ant);

                        $query_aho = " id_banco = " . $id_banco . " and mes_year = '" . date('m/Y') . "'";
                        $this->data['corte_mes_actual'] = $this->bancos_model->comprueba_corte($query_aho);

                        $this->data['titulo_reporte'] = ' Mes Actual';
                        break;


                    case 'n': //Mes anterior

                        $form['query'] = " id_banco = " . $id_banco . " and Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->bancos_model->busqueda_avanzada($form);

                        $query_ant = " id_banco = " . $id_banco . " and mes_year = '" . date('m/Y', strtotime("-2 month")) . "'";
                        $this->data['corte_mes_anterior'] = $this->bancos_model->comprueba_corte($query_ant);

                        $query_aho = " id_banco = " . $id_banco . " and mes_year = '" . date('m/Y', strtotime("-1 month")) . "'";
                        $this->data['corte_mes_actual'] = $this->bancos_model->comprueba_corte($query_aho);

                        $this->data['titulo_reporte'] = ' Mes Anterior';
                        break;


                    case 'u': //Últimos 12 meses
                        $form['query'] = ' id_banco = ' . $id_banco . ' and `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->bancos_model->busqueda_avanzada($form);
                        $this->data['titulo_reporte'] = ' Ultimos 12 meses';
                        break;
                }
                if ($excel) {
                    $data = $this->data['reporte'];
                    $excel = array();
                    $excel[] = array(
                        'Banco Emisor',
                        'Banco Receptor',
                        'Monto',
                        'N° de Ref.',
                        'Fecha');
                    foreach ($data as &$row) {
                        $row['fecha'] = fecha($row['fecha']);
                        $row['n_cuenta'] = (int) $row['n_cuenta'];

                        $arreglo = array(
                            $row['nombre_banco_emisor'],
                            $row['nombre_banco_receptor'],
                            number_format($row['total_monto_pagar'], 2, ',', '.'),
                            $row['n_cheque'],
                            fecha($row['fecha_pago'])
                        );
                        $excel[] = $arreglo;
                    }
                    $this->WriteMatriz($excel);
                    $this->Download("Traspasos entre bancos");
                } else {
                    $this->data['reporte'];
                }
            }
            $this->data['lista_bancos'] = $this->bancos_model->get_bancos();
            $this->load->view('bancos/busqueda_movimiento', $this->data);
        }
    }

}