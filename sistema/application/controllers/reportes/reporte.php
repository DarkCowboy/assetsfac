<?php

class Reporte extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('reportes_model', 'bancos_model', 'proveedores_model'), array('10', '1', '0', '2', '50'));
        $this->data['menu_top'] = 'reportes';
    }

    public function index() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            $this->load->view('reportes/panel_reportes', $this->data);
        }
    }

    public function por_fecha() {
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
                        $this->data['reporte'] = $this->reportes_model->reporte_por_fecha($form);
                        $this->data['titulo_reporte'] = 'Por Fecha desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;
                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_fecha($form);
                        $this->data['titulo_reporte'] = 'Por Fecha Mes Actual';
                        break;
                    case 'n': //Mes anterior
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_fecha($form);
                        $this->data['titulo_reporte'] = 'Por Fecha Mes Anterior';
                        break;
                    case 'u': //Últimos 12 meses
                        $form['query'] = ' `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_fecha($form);
                        $this->data['titulo_reporte'] = 'Por Fecha Ultimos 12 meses';
                        break;
                }
                if ($excel) {
                    $data = $this->data['reporte'];
                    $excel = array();
                    $excel[] = array('BENEFICIARIO',
                        'ID',
                        'N° ID',
                        'CONCEPTO DE PAGO',
                        'F. ELABORACION',
                        'BANCO',
                        'MONEDA',
                        'N° DE CUENTA',
                        'IVA',
                        'MONTO');
                    foreach ($data as &$row) {
                        $row['fecha_pago'] = fecha($row['fecha_pago']);
                        $row['n_cuenta'] = (int) $row['n_cuenta'];

                        $arreglo = array(
                            $row['nombre_proveedor'],
                            $row['pre_id_number'],
                            $row['id_number_proveedor'],
                            $row['Concepto_pago'],
                            $row['fecha_pago'],
                            $row['nombre_banco'],
                            $row['moneda'],
                            $row['n_cuenta'],
                            number_format($row['iva'], 1, ',', '.') . '%',
                            number_format($row['monto_instruccion'], 2, ',', '.')
                        );
                        $excel[] = $arreglo;
                    }
                    $this->WriteMatriz($excel);
                    $this->Download("reporte_por_fecha");
                } else {
                    $this->descarga_reporte('reportes/reporte_por_fecha', $this->data, 'Reporte por Fecha');
                }
            }
            $this->data['fecha'] = '0';
            $this->data['action'] = './reportes/reporte/por_fecha';
            $this->data['titulo'] = 'Filtro de Reporte por Fecha';
            $this->load->view('reportes/filtro', $this->data);
        }
    }

    public function por_banco() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form = $this->input->post();
                $excel = $form['excel'];
                unset($form['excel']);
                $id_banco = $form['id_banco'];
                $form = $form['data']['BusquedaCuenta'];

                switch ($form['periodo']) {
                    case 'o': //Otro
                        $form['desde'] = $form['fechaDesde']['year'] . '-' . $form['fechaDesde']['month'] . '-' . $form['fechaDesde']['day'] . ' 00:00:00';
                        $form['hasta'] = $form['fechaHasta']['year'] . '-' . $form['fechaHasta']['month'] . '-' . $form['fechaHasta']['day'] . ' 00:00:00';
                        $form['query'] = ' DATE(fecha_pago) BETWEEN \'' . $form['desde'] . '\' AND \'' . $form['hasta'] . '\' ';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_banco($id_banco, $form);
                        $this->data['titulo_reporte'] = 'Por Banco desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;
                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_banco($id_banco, $form);
                        $this->data['titulo_reporte'] = 'Por Banco Mes Actual';
                        break;
                    case 'n': //Mes anterior
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_banco($id_banco, $form);
                        $this->data['titulo_reporte'] = 'Por Banco Mes Anterior';
                        break;
                    case 'u': //Últimos 12 meses
                        $form['query'] = ' `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_banco($id_banco, $form);
                        $this->data['titulo_reporte'] = 'Por Banco Ultimos 12 meses';
                        break;
                }
                if ($excel) {
                    $data = $this->data['reporte'];
                    $excel = array();
                    $excel[] = array('BENEFICIARIO',
                        'ID',
                        'N° ID',
                        'CONCEPTO DE PAGO',
                        'F. ELABORACION',
                        'BANCO',
                        'MONEDA',
                        'N° DE CUENTA',
                        'IVA',
                        'MONTO');
                    foreach ($data as &$row) {
                        $row['fecha_pago'] = fecha($row['fecha_pago']);
                        $row['n_cuenta'] = (int) $row['n_cuenta'];

                        $arreglo = array(
                            $row['nombre_proveedor'],
                            $row['pre_id_number'],
                            $row['id_number_proveedor'],
                            $row['Concepto_pago'],
                            $row['fecha_pago'],
                            $row['nombre_banco'],
                            $row['moneda'],
                            $row['n_cuenta'],
                            number_format($row['iva'], 1, ',', '.') . '%',
                            number_format($row['monto_instruccion'], 2, ',', '.')
                        );
                        $excel[] = $arreglo;
                    }
                    $this->WriteMatriz($excel);
                    $this->Download("reporte_por_banco");
                } else {

                    $this->descarga_reporte('reportes/reporte_por_banco', $this->data, 'Reporte por Banco');
                }
            }
            $this->data['lista_bancos'] = $this->bancos_model->get_bancos();
            $this->data['action'] = './reportes/reporte/por_banco';
            $this->data['titulo'] = 'Filtro de Reporte por Banco';
            $this->load->view('reportes/filtro', $this->data);
        }
    }

    public function por_beneficiario() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form = $this->input->post();
                $excel = $form['excel'];
                unset($form['excel']);
                $id_proveedor = $form['id_proveedor'];
                $form = $form['data']['BusquedaCuenta'];

                switch ($form['periodo']) {
                    case 'o': //Otro
                        $form['desde'] = $form['fechaDesde']['year'] . '-' . $form['fechaDesde']['month'] . '-' . $form['fechaDesde']['day'] . ' 00:00:00';
                        $form['hasta'] = $form['fechaHasta']['year'] . '-' . $form['fechaHasta']['month'] . '-' . $form['fechaHasta']['day'] . ' 00:00:00';
                        $form['query'] = ' DATE(fecha_pago) BETWEEN \'' . $form['desde'] . '\' AND \'' . $form['hasta'] . '\' ';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_beneficiario($id_proveedor, $form);
                        $this->data['titulo_reporte'] = 'Por Beneficiario desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;
                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_beneficiario($id_proveedor, $form);
                        $this->data['titulo_reporte'] = 'Por Beneficiario Mes Actual';
                        break;
                    case 'n': //Mes anterior
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_beneficiario($id_proveedor, $form);
                        $this->data['titulo_reporte'] = 'Por Beneficiario Mes Anterior';
                        break;
                    case 'u': //Últimos 12 meses
                        $form['query'] = ' `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_beneficiario($id_proveedor, $form);
                        $this->data['titulo_reporte'] = 'Por Beneficiario Ultimos 12 meses';
                        break;
                }
                if ($excel) {
                    $data = $this->data['reporte'];
                    $excel = array();
                    $excel[] = array('BENEFICIARIO',
                        'ID',
                        'N° ID',
                        'CONCEPTO DE PAGO',
                        'F. ELABORACION',
                        'BANCO',
                        'MONEDA',
                        'N° DE CUENTA',
                        'IVA',
                        'MONTO');
                    foreach ($data as &$row) {
                        $row['fecha_pago'] = fecha($row['fecha_pago']);
                        $row['n_cuenta'] = (int) $row['n_cuenta'];

                        $arreglo = array(
                            $row['nombre_proveedor'],
                            $row['pre_id_number'],
                            $row['id_number_proveedor'],
                            $row['Concepto_pago'],
                            $row['fecha_pago'],
                            $row['nombre_banco'],
                            $row['moneda'],
                            $row['n_cuenta'],
                            number_format($row['iva'], 1, ',', '.') . '%',
                            number_format($row['monto_instruccion'], 2, ',', '.')
                        );
                        $excel[] = $arreglo;
                    }
                    $this->WriteMatriz($excel);
                    $this->Download("reporte_por_beneficiario");
                } else {

                    $this->descarga_reporte('reportes/reporte_por_beneficiario', $this->data, 'Reporte por Beneficiario');
                }
            }

            $this->data['lista_proveedores'] = $this->proveedores_model->get_proveedores();
            $this->data['action'] = './reportes/reporte/por_beneficiario';
            $this->data['titulo'] = 'Filtro de Reporte por Beneficiario';
            $this->load->view('reportes/filtro', $this->data);
        }
    }

    public function por_instrumento() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form = $this->input->post();
                $excel = $form['excel'];
                unset($form['excel']);
                $t_instrumento = $form['t_instrumento'];
                $form = $form['data']['BusquedaCuenta'];

                switch ($form['periodo']) {
                    case 'o': //Otro
                        $form['desde'] = $form['fechaDesde']['year'] . '-' . $form['fechaDesde']['month'] . '-' . $form['fechaDesde']['day'] . ' 00:00:00';
                        $form['hasta'] = $form['fechaHasta']['year'] . '-' . $form['fechaHasta']['month'] . '-' . $form['fechaHasta']['day'] . ' 00:00:00';
                        $form['query'] = ' DATE(fecha_pago) BETWEEN \'' . $form['desde'] . '\' AND \'' . $form['hasta'] . '\' ';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_instrumento($t_instrumento, $form);
                        $this->data['titulo_reporte'] = 'Por Instrumento desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;
                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_instrumento($t_instrumento, $form);
                        $this->data['titulo_reporte'] = 'Por Instrumento Mes Actual';
                        break;
                    case 'n': //Mes anterior
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_instrumento($t_instrumento, $form);
                        $this->data['titulo_reporte'] = 'Por Instrumento Mes Anterior';
                        break;
                    case 'u': //Últimos 12 meses
                        $form['query'] = ' `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_instrumento($t_instrumento, $form);
                        $this->data['titulo_reporte'] = 'Por Instrumento Ultimos 12 meses';
                        break;
                }
                if ($excel) {
                    $data = $this->data['reporte'];
                    $excel = array();
                    $excel[] = array('BENEFICIARIO',
                        'ID',
                        'N° ID',
                        'CONCEPTO DE PAGO',
                        'F. ELABORACION',
                        'BANCO',
                        'MONEDA',
                        'N° DE CUENTA',
                        'IVA',
                        'MONTO');
                    foreach ($data as &$row) {
                        $row['fecha_pago'] = fecha($row['fecha_pago']);
                        $row['n_cuenta'] = (int) $row['n_cuenta'];

                        $arreglo = array(
                            $row['nombre_proveedor'],
                            $row['pre_id_number'],
                            $row['id_number_proveedor'],
                            $row['Concepto_pago'],
                            $row['fecha_pago'],
                            $row['nombre_banco'],
                            $row['moneda'],
                            $row['n_cuenta'],
                            number_format($row['iva'], 1, ',', '.') . '%',
                            number_format($row['monto_instruccion'], 2, ',', '.')
                        );
                        $excel[] = $arreglo;
                    }
                    $this->WriteMatriz($excel);
                    $this->Download("reporte_por_instrumento");
                } else {

                    $this->descarga_reporte('reportes/reporte_por_instrumento', $this->data, 'Reporte por Instrumento');
                }
            }

            $this->data['lista_instrumento'] = 1;
            $this->data['action'] = './reportes/reporte/por_instrumento';
            $this->data['titulo'] = 'Filtro de Reporte por Instrumento';
            $this->load->view('reportes/filtro', $this->data);
        }
    }

    public function por_moneda() {
        if ($this->centinela) {
            if (!$this->rol) {
                show_404();
            }
            if ($this->input->post()) {
                $form = $this->input->post();
                $excel = $form['excel'];
                unset($form['excel']);
                $moneda = $form['moneda'];
                $form = $form['data']['BusquedaCuenta'];

                switch ($form['periodo']) {
                    case 'o': //Otro
                        $form['desde'] = $form['fechaDesde']['year'] . '-' . $form['fechaDesde']['month'] . '-' . $form['fechaDesde']['day'] . ' 00:00:00';
                        $form['hasta'] = $form['fechaHasta']['year'] . '-' . $form['fechaHasta']['month'] . '-' . $form['fechaHasta']['day'] . ' 00:00:00';
                        $form['query'] = ' DATE(fecha_pago) BETWEEN \'' . $form['desde'] . '\' AND \'' . $form['hasta'] . '\' ';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_moneda($moneda, $form);
                        $this->data['titulo_reporte'] = 'Por Moneda desde el ' . fecha($form['desde'], 'corta') . ' hasta ' . fecha($form['hasta'], 'corta');
                        break;
                    case 'a': //Mes actual
                        unset($form['montoDesde']);
                        unset($form['montoHasta']);
                        unset($form['periodo']);
                        unset($form['tipoBusq']);
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( NOW( ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_moneda($moneda, $form);
                        $this->data['titulo_reporte'] = 'Por Moneda Mes Actual';
                        break;
                    case 'n': //Mes anterior
                        $form['query'] = " Date_format( fecha_pago, '%m' ) = Date_format( DATE_SUB( NOW( ) , INTERVAL 1 MONTH ) , '%m' )";
                        $this->data['reporte'] = $this->reportes_model->reporte_por_moneda($moneda, $form);
                        $this->data['titulo_reporte'] = 'Por Moneda Mes Anterior';
                        break;
                    case 'u': //Últimos 12 meses
                        $form['query'] = ' `fecha_pago` BETWEEN DATE_SUB( NOW( ) , INTERVAL 12 MONTH ) AND NOW( )';
                        $this->data['reporte'] = $this->reportes_model->reporte_por_moneda($moneda, $form);
                        $this->data['titulo_reporte'] = 'Por Moneda Ultimos 12 meses';
                        break;
                }
                if ($excel) {
                    $data = $this->data['reporte'];
                    $excel = array();
                    $excel[] = array('BENEFICIARIO',
                        'ID',
                        'N° ID',
                        'CONCEPTO DE PAGO',
                        'F. ELABORACION',
                        'BANCO',
                        'MONEDA',
                        'N° DE CUENTA',
                        'IVA',
                        'MONTO');
                    foreach ($data as &$row) {
                        $row['fecha_pago'] = fecha($row['fecha_pago']);
                        $row['n_cuenta'] = (int) $row['n_cuenta'];

                        $arreglo = array(
                            $row['nombre_proveedor'],
                            $row['pre_id_number'],
                            $row['id_number_proveedor'],
                            $row['Concepto_pago'],
                            $row['fecha_pago'],
                            $row['nombre_banco'],
                            $row['moneda'],
                            $row['n_cuenta'],
                            number_format($row['iva'], 1, ',', '.') . '%',
                            number_format($row['monto_instruccion'], 2, ',', '.')
                        );
                        $excel[] = $arreglo;
                    }
                    $this->WriteMatriz($excel);
                    $this->Download("reporte_por_moneda");
                } else {

                    $this->descarga_reporte('reportes/reporte_por_moneda', $this->data, 'Reporte por Moneda');
                }
            }

            $this->data['lista_moneda'] = 1;
            $this->data['action'] = './reportes/reporte/por_moneda';
            $this->data['titulo'] = 'Filtro de Reporte por Moneda';
            $this->load->view('reportes/filtro', $this->data);
        }
    }

}