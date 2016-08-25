<?php

class Busqueda extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct('traspasos_model', array('1', '2', '3', '10'));
        $this->data['menu_top'] = 'traspasos';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {

                $form = $this->input->post();
                $excel = $form['excel'];
                unset($form['excel']);
                $form = $form['data']['BusquedaCuenta'];
                switch ($form['periodo']) {
                    case 'o': //Otro
                        $form['desde'] = $form['fechaDesde']['year'] . '-' . $form['fechaDesde']['month'] . '-' . $form['fechaDesde']['day'] . ' 00:00:00';
                        $form['hasta'] = $form['fechaHasta']['year'] . '-' . $form['fechaHasta']['month'] . '-' . $form['fechaHasta']['day'] . ' 00:00:00';
                        $form['query'] = ' DATE(fecha_pago) BETWEEN \'' . $form['desde'] . '\' AND \'' . $form['hasta'] . '\' ';
                        $this->data['reporte'] = $this->traspasos_model->busqueda_avanzada($form);
                        $this->data['titulo_reporte'] = ' desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;
                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->traspasos_model->busqueda_avanzada($form);
                        $this->data['titulo_reporte'] = ' Mes Actual';
                        break;
                    case 'n': //Mes anterior
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->traspasos_model->busqueda_avanzada($form);
                        $this->data['titulo_reporte'] = ' Mes Anterior';
                        break;
                    case 'u': //Últimos 12 meses
                        $form['query'] = ' `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->traspasos_model->busqueda_avanzada($form);
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
            $this->load->view('traspasos/busqueda', $this->data);
        }
    }

}