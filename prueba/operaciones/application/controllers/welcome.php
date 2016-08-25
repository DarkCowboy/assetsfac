<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

    private $data = array();

    public function __construct() {
        parent::__construct(array('users_model', 'config_model', 'clientes_model', 'personas_model', 'empresa_model', 'pla_inscrip_model', 'cupos_model', 'pagare_model', 'facturas_model', 'reclasificacion_model'));
        if ($this->session->userdata('logged_in')) {
            $this->data['user_name'] = @$this->session->userdata['user_data']['first_name'] . ' ' . @$this->session->userdata['user_data']['last_name'];
        }
        $this->data['ventas'] = $this->cupos_model->get_all_ventas();
        $this->data['pagare'] = $this->cupos_model->get_all_pagares();
        $this->data['prestamo'] = $this->cupos_model->get_all_prestamo();
        $this->data['num_clientes'] = $this->clientes_model->num_clientes();

//        para trabajar localmente
//        $this->data['ruta_imagen_publicidades'] = @symlink('C:\\wamp\\www\\caprichoos\\caprichoos_public\\images\\chicas', 'C:\\wamp\\www\\caprichoos\\caprichoos_admin\\images\\chicas');
        //debug($this->data['ruta_imagen_publicidades']);
        //para trabajar en el servidor
        $this->data['ruta_imagen_destino'] = @symlink('/home/assetsfa/public_html/prueba/panel_public/recibos', '/home/assetsfa/public_html/prueba/operaciones/recibos');
//        debug($this->data['ruta_imagen_destino']);
    }

    public function index() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->data['cupos'] = $this->cupos_model->get_all_cupos();
            $this->data['user_name'] = $this->session->userdata['user_data']['first_name'] . ' ' . $this->session->userdata['user_data']['last_name'];
            $this->data['title'] = 'Inicio';
            $this->data['page'] = 'inicio';
            $this->notificaciones();
            $this->load->view('home', $this->data);
        }
    }

    public function calculadora() {
        $valida = $this->valida_usuario();
        if ($valida == true) {
            $this->load->view('calculadora/calculadora');
        }
    }

    public function notificaciones() {
        $this->cupos_model->automatico();
        $ventas = $this->data['ventas'];
        $pagare = $this->data['pagare'];
        $prestamo = $this->data['prestamo'];

        $operaciones = array_merge($ventas, $pagare, $prestamo);


        foreach ($operaciones as $key => $row) {
            if ($row['status'] != '6' and $row['status'] != '2') {
                unset($operaciones[$key]);
            }
        }
        foreach ($operaciones as $row) {
            $this->casos_notificacion($row);
        }
    }

    public function casos_notificacion($row) {
        switch ($row['dias_restantes']) {
            case 10:
                $this->not_vcto_pximo($row, 10);
                break;
            case 8:
                $this->not_vcto_pximo($row, 8);
                break;
            case 6:
                $this->not_vcto_pximo($row, 6);
                break;
            case 5:
                $this->not_vcto_pximo($row, 5);
                break;
            case 4:
                $this->not_vcto_pximo($row, 4);
                break;
            case 3:
                $this->not_vcto_pximo($row, 3);
                break;
            case 2:
                $this->not_vcto_pximo($row, 2);
                break;
            case 1:
                $this->not_vcto_pximo($row, 1);
                break;
            case 0:
                $this->not_vcto_pximo($row, 0);
                break;
            case ($row['dias_restantes'] < 0):
                $this->not_vcto($row, $row['dias_restantes']);
                break;
        }
    }

    public function not_vcto_pximo($row, $dias) {

        $x = explode("-", $row['notificacion']);
        $num_not = $x[0] + 1;
        $dia = $x[1];
        $notificacion = $num_not . '-' . date(d);
        if ($dia <> date(d)) {

            $tot_nom = 0;
            $tot_pag = 0;
            $tot_dif = 0;
            $tot_mora_bs = 0;
            $tot_dif_act = 0;
            $tot_tot = 0;


            $pagado = $row['monto_solicitud_aprobado'] * ($row['porcentaje_compra'] / 100);
            $dif = $row['monto_solicitud_aprobado'] - $pagado;
            //$dif_act = $dif + $row['mora_monto'];
            //nueva logica de negocio
            $plazo_act = diferenciaEntreFechas(date('Y-m-d'), $row['fecha_solicitud_aprobado']);
            $precio = number_format(((1 / (1 + ((0.5217 * $plazo_act) / 360))) * 100), 2, '.', '');
            $monto = (($row['monto_solicitud_aprobado'] * $precio) / 100);
            $dif_act = $row['monto_solicitud_aprobado'] - $monto;
            // fin nueva logica de negocio


            $tot = $dif_act + $pagado;
            $tot_ref = $dif_act;
            $tot_nom = $tot_nom + $row['monto_solicitud_aprobado'];
            $tot_pag = $tot_pag + $row['monto_solicitud_aprobado'];
            $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];
            $tot_dif = $tot_dif + $dif;
            $tot_dif_act = $tot_dif_act + $dif_act;
            $tot_tot = $tot_tot + $tot;


            if ($row['tipo_solicitud'] == '2') {

                $correo = $row['email_pj'];
                $asunto = 'Notificacion de proximo Vencimiento Operacion ' . $row['n_operacion'];
                $cuerpo = '
               <html>
                    <body>
                        <div style="width:100%;">
                            <div style="max-width: 500px; width: 94%;  border:solid 1px black; margin: 0 auto; padding:10px;">
                            <p style="text-align:justify;">Estimado Cliente la presente es para Notificarle que tiene una <b>Operacion de Venta de Facturas</b> Proxima a vencer,
                            al realizar el pago le agradecemos nos haga llegar el reporte de la transferencia o deposito a nuestro correo
                            "info@assetsfactoring.com" con el asunto "Pago de Operacion ' . $row['n_operacion'] . '"</p>
                                <table>
                                    <tr>
                                        <td colspan="2" style="text-align:center; background:green; padding: 4px; color:white;border:solid 1px black;">
                                        Notificacion de Proximo Vencimieto de la Operacion N&deg; ' . $row['n_operacion'] . '
                                        </td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Fecha de Vencimiento</td>
                                        <td style="border:solid 1px black;text-align:center;">' . fecha($row['fecha_vcto_solicitud_aprobado']) . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Monto Solicitado</td>
                                        <td style="border:solid 1px black;text-align:right;">' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Monto pagado</td>
                                        <td style="border:solid 1px black;text-align:right;">' . number_format($pagado, '2', ',', '.') . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Diferencial</td>
                                        <td style="border:solid 1px black;text-align:right;">' . number_format($dif, 2, ',', '.') . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Mora / Dias</td>
                                        <td style="border:solid 1px black;text-align:right;">&nbsp;' . $row['mora_dias'] . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;"><b>Total a Pagar</b></td>
                                        <td style="border:solid 1px black;text-align:right;"><b>' . number_format($tot, 2, ',', '.') . '</b></td>
                                    </tr>
                                </table>
                                

                            </div>
                        </div>
                    </body>
                <html> 
            ';
            } else if ($row['tipo_solicitud'] == '3') {
                if (!$row['mora_dias'] > 0) {
                    $tot = $row['monto_solicitud_aprobado'];
                }
                $correo = $row['email_pn_pj'];
                $asunto = 'Notificacion de proximo Vencimiento Operacion ' . $row['n_operacion'];
                $cuerpo = '
                        <html>
                            <body>
                                <div style="width:100%;">
                                    <div style="max-width: 500px; width: 94%;  border:solid 1px black; margin: 0 auto; padding:10px;">
                                    <p style="text-align:justify;">Estimado Cliente la presente es para Notificarle que tiene una <b>Operacion de Pagare</b> Proxima a vencer,
                                    al realizar el pago le agradecemos nos haga llegar el reporte de la transferencia o deposito a nuestro correo
                                    "info@assetsfactoring.com" con el asunto "Pago de Operacion ' . $row['n_operacion'] . '"</p>
                                        <table>
                                            <tr>
                                                <td colspan="2" style="text-align:center; background:green; padding: 4px; color:white;border:solid 1px black;">
                                                Notificacion de Proximo Vencimieto de la Operacion N&deg; ' . $row['n_operacion'] . '
                                                </td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Fecha de Vencimiento</td>
                                                <td style="border:solid 1px black;text-align:center;">' . fecha($row['fecha_vcto_solicitud_aprobado']) . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Monto del Pagare</td>
                                                <td style="border:solid 1px black;text-align:right;">' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Mora / Dias</td>
                                                <td style="border:solid 1px black;text-align:right;">&nbsp;' . $row['mora_dias'] . '</td>
                                            </tr>
                                            
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;"><b>Total a Pagar</b></td>
                                                <td style="border:solid 1px black;text-align:right;"><b>' . number_format($tot, 2, ',', '.') . '</b></td>
                                            </tr>
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                            </body>
                        <html>
                    ';
            } else if ($row['tipo_solicitud'] == '4') {

                if (!$row['mora_dias'] > 0) {
                    $tot = $row['monto_solicitud_aprobado'];
                }

                $correo = $row['email_pn_pj'];
                $asunto = 'Notificacion de proximo Vencimiento Operacion ' . $row['n_operacion'];
                $cuerpo = '
                        <html>
                            <body>
                                <div style="width:100%;">
                                    <div style="max-width: 500px; width: 94%;  border:solid 1px black; margin: 0 auto; padding:10px;">
                                    <p style="text-align:justify;">Estimado Cliente la presente es para Notificarle que tiene una <b>Operacion de Prestamo</b> Proxima a vencer,
                                    al realizar el pago le agradecemos nos haga llegar el reporte de la transferencia o deposito a nuestro correo
                                    "info@assetsfactoring.com" con el asunto "Pago de Operacion ' . $row['n_operacion'] . '"</p>
                                        <table>
                                            <tr>
                                                <td colspan="2" style="text-align:center; background:green; padding: 4px; color:white;border:solid 1px black;">
                                                Notificacion de Proximo Vencimieto de la Operacion N&deg; ' . $row['n_operacion'] . '
                                                </td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Fecha de Vencimiento</td>
                                                <td style="border:solid 1px black;text-align:center;">' . fecha($row['fecha_vcto_solicitud_aprobado']) . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Monto del Prestamo</td>
                                                <td style="border:solid 1px black;text-align:right;">' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Mora / Dias</td>
                                                <td style="border:solid 1px black;text-align:right;">&nbsp;' . $row['mora_dias'] . '</td>
                                            </tr>
                                            
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;"><b>Total a Pagar</b></td>
                                                <td style="border:solid 1px black;text-align:right;"><b>' . number_format($tot, 2, ',', '.') . '</b></td>
                                            </tr>
                                        </table>
                                        
                                        
                                    </div>
                                </div>
                            </body>
                        <html>
                    ';
            }
            $this->cupos_model->notificacion_enviada($notificacion, $row['id_solicitud']);
//            echo $correo . ' ' . $asunto . ' ' . $cuerpo;
            $this->email($correo, $asunto, $cuerpo);
        }
    }

    public
            function not_vcto($row) {
        $x = explode("-", $row['notificacion']);
        $num_not = $x[0] + 1;
        $dia = $x[1];
        $notificacion = $num_not . '-' . date(d);
        if ($dia <> date(d)) {
            $tot_nom = 0;
            $tot_pag = 0;
            $tot_dif = 0;
            $tot_mora_bs = 0;
            $tot_dif_act = 0;
            $tot_tot = 0;

            $pagado = $row['monto_solicitud_aprobado'] * ($row['porcentaje_compra'] / 100);
            $dif = $row['monto_solicitud_aprobado'] - $pagado;
            $dif_act = $dif + $row['mora_monto'];
            $tot = $dif_act + $pagado;
            $tot_ref = $dif_act;

            $tot_nom = $tot_nom + $row['monto_solicitud_aprobado'];
            $tot_pag = $tot_pag + $row['monto_solicitud_aprobado'];
            $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];
            $tot_dif = $tot_dif + $dif;
            $tot_dif_act = $tot_dif_act + $dif_act;
            $tot_tot = $tot_tot + $tot;

            if ($row['tipo_solicitud'] == '2') {

                $correo = $row['email_pj'];
                $asunto = 'Notificacion de Vencimiento Operacion ' . $row['n_operacion'];
                $cuerpo = '
               <html>
                    <body>
                        <div style="width:100%;">
                            <div style="max-width: 500px; width: 94%;  border:solid 1px black; margin: 0 auto; padding:10px;">
                            <p style="text-align:justify;">Estimado Cliente la presente es para Notificarle que la <b>Operacion de Venta</b> N&deg; ' . $row['n_operacion'] . ', 
                            <b>se ha vencido</b> usted debera realizar el pago de esta, le agradecemos nos haga llegar el reporte de la transferencia o deposito a nuestro correo
                            "info@assetsfactoring.com" con el asunto "Pago de Operacion ' . $row['n_operacion'] . '"</p>
                                <table style="width = 100%; margin:0 auto;">
                                    <tr>
                                        <td colspan="2" style="text-align:center; background:green; padding: 4px; color:white;border:solid 1px black;">
                                        Notificacion de Vencimieto de la Operacion N&deg; ' . $row['n_operacion'] . '
                                        </td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Fecha de Vencimiento</td>
                                                <td style="border:solid 1px black;text-align:center;">' . fecha($row['fecha_vcto_solicitud_aprobado']) . '</td>
                                            </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Monto de la Operacion</td>
                                        <td style="border:solid 1px black;text-align:right;">' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Monto pagado</td>
                                        <td style="border:solid 1px black;text-align:right;">' . number_format($pagado, '2', ',', '.') . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Diferencial</td>
                                        <td style="border:solid 1px black;text-align:right;">' . number_format($dif, 2, ',', '.') . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;">Mora / Dias</td>
                                        <td style="border:solid 1px black;text-align:right;">&nbsp;' . $row['mora_dias'] . '</td>
                                    </tr>
                                    <tr style="border:solid 1px black;">
                                        <td style="border:solid 1px black;"><b>Total a Pagar</b></td>
                                        <td style="border:solid 1px black;text-align:right;"><b>' . number_format($tot, 2, ',', '.') . '</b></td>
                                    </tr>
                                </table>
                                

                            </div>
                        </div>
                    </body>
                <html> 
            ';
            } else if ($row['tipo_solicitud'] == '3') {

                $correo = $row['email_pn_pj'];
                $asunto = 'Notificacion de Vencimiento Operacion ' . $row['n_operacion'];
                $cuerpo = '
                        <html>
                            <body>
                                <div style="width:100%;">
                                    <div style="max-width: 500px; width: 94%;  border:solid 1px black; margin: 0 auto; padding:10px;">
                                    <p style="text-align:justify;">Estimado Cliente la presente es para Notificarle que la <b>Operacion de Pagare</b> N&deg; ' . $row['n_operacion'] . ', 
                                    <b>se ha vencido</b> usted debera realizar el pago de esta, le agradecemos nos haga llegar el reporte de la transferencia o deposito a nuestro correo
                                    "info@assetsfactoring.com" con el asunto "Pago de Operacion ' . $row['n_operacion'] . '"</p>
                                        <table style="width = 100%; margin:0 auto;">
                                            <tr>
                                                <td colspan="2" style="text-align:center; background:green; padding: 4px; color:white;border:solid 1px black;">
                                                Notificacion de Vencimieto de la Operacion N&deg; ' . $row['n_operacion'] . '
                                                </td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Fecha de Vencimiento</td>
                                                <td style="border:solid 1px black;text-align:center;">' . fecha($row['fecha_vcto_solicitud_aprobado']) . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Monto del Pagare</td>
                                                <td style="border:solid 1px black;text-align:right;">' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Mora / Dias</td>
                                                <td style="border:solid 1px black;text-align:right;">&nbsp;' . $row['mora_dias'] . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;"><b>Total a Pagar</b></td>
                                                <td style="border:solid 1px black;text-align:right;"><b>' . number_format($tot, 2, ',', '.') . '</b></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                </div>
                            </body>
                        <html>
                    ';
            } else if ($row['tipo_solicitud'] == '4') {

                $correo = $row['email_pn_pj'];
                $asunto = 'Notificacion de Vencimiento Operacion ' . $row['n_operacion'];
                $cuerpo = '
                        <html>
                            <body>
                                <div style="width:100%;">
                                    <div style="max-width: 500px; width: 94%;  border:solid 1px black; margin: 0 auto; padding:10px;">
                                    <p style="text-align:justify;">Estimado Cliente la presente es para Notificarle que la <b>Operacion de Prestamo</b> N&deg; ' . $row['n_operacion'] . ', 
                                    <b>se ha vencido</b> usted debera realizar el pago de esta, le agradecemos nos haga llegar el reporte de la transferencia o deposito a nuestro correo
                                    "info@assetsfactoring.com" con el asunto "Pago de Operacion ' . $row['n_operacion'] . '"</p>
                                        <table style="width = 100%; margin:0 auto;">
                                            <tr>
                                                <td colspan="2" style="text-align:center; background:green; padding: 4px; color:white;border:solid 1px black;">
                                                Notificacion de Vencimieto de la Operacion N&deg; ' . $row['n_operacion'] . '
                                                </td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Fecha de Vencimiento</td>
                                                <td style="border:solid 1px black;text-align:center;">' . fecha($row['fecha_vcto_solicitud_aprobado']) . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Monto del Prestamo</td>
                                                <td style="border:solid 1px black;text-align:right;">' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;">Mora / Dias</td>
                                                <td style="border:solid 1px black;text-align:right;">&nbsp;' . $row['mora_dias'] . '</td>
                                            </tr>
                                            <tr style="border:solid 1px black;">
                                                <td style="border:solid 1px black;"><b>Total a Pagar</b></td>
                                                <td style="border:solid 1px black;text-align:right;"><b>' . number_format($tot, 2, ',', '.') . '</b></td>
                                            </tr>
                                        </table>
                                        
                                    </div>
                                </div>
                            </body>
                        <html>
                    ';
            }

            $this->cupos_model->notificacion_enviada($notificacion, $row['id_solicitud']);
//            echo $correo . ' ' . $asunto . ' ' . $cuerpo;
            $this->email($correo, $asunto, $cuerpo);
        }
    }

}

/* End of file welcome.php */
    /* Location: ./application/controllers/welcome.php */