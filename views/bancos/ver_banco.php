<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?= $title ?></title>
        <base href="<?php echo base_url() ?>"/>
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" />
        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./scripts/jquery-1.8.0.min.js"><'+'/script>')</script>-->
        <script type="text/javascript" src="./scripts/jquery.min.js"></script>

        <!-- Soporte para html5 en IE -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/typography.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body style="background: none !important;">
        <div id="main" style="margin: 0 ;">       
            <div id="middle" style="margin: 0; padding: 0 ; float: none; width: 704px;">

                <div id="center-column"  class="mi_vista_clasica" style="float: left; margin: 0 auto; width: 703px !important; min-height: 0 !important;">
                    <div style="width: 618px; margin: 0 auto;">
                        <br/><br/><br/>
                        <h1 style="text-align: center; width: 618px;">Banco <?= $datos_banco['nombre_banco']; ?> - <?= $datos_banco['t_banco']; ?></h1>
                    </div>

                    <br/>
                    <table style="width: 618px; margin: 0 auto;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td>Tipo de Cuenta</td>
                                <td>N&deg; de Cuenta</td>
                                <td>Moneda</td>
                                <td>Saldo Actual</td>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <tr>
                                <td><?= $datos_banco['t_de_cuenta']; ?></td>
                                <td><?= $datos_banco['n_cuenta']; ?></td>
                                <td><?= $datos_banco['moneda']; ?></td>
                                <td><?= number_format($corte_mes_actual['saldo'],2,',','.') ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table style="width: 618px; margin: 0 auto;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td style="width: 33%">Movimientos actuales</td>
                                <td style="width: 33%">Editar Banco</td>
                                <td style="">Cheque</td>
                                <!--<td style="">Eliminar</td>-->
                            </tr>
                        </thead>
                        <tr>
                            <td style="width: 33%; text-align: center;">
                                <a target="_blank" href="./bancos/moviminetos_actuales/<?= sha1($datos_banco['id_banco']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                            <td style="width: 33%; text-align: center;">
                                <a href="./bancos/editar_banco/<?= sha1($datos_banco['id_banco']) ?>">
                                    <img width="16" height="16" src="images/icons/edit-icon.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a href="./bancos/agregar_cheque/<?= sha1($datos_banco['id_banco']) ?>">
                                    <img width="16" height="16" src="images/add-icon.gif" alt="Agregar cheque" title="Agregar cheque">
                                </a>
                                
                                <a style="margin: 0 5px;" href="./bancos/ver_cheque/<?= sha1($datos_banco['id_banco']) ?>">
                                    <img width="16" height="16" src="images/general/cheque_icon.png" alt="Ver Cheque" title="Ver Cheque">
                                </a>
                                
                            </td><!--
                            <td style="text-align: center;">
                            </td>-->

                        </tr>
                    </table>

                    <div style="width: 618px; margin: 0 auto;">

                        <hr>
                        <h1 style="text-align: center; width: 618px;">Movimientos del mes</h1>
                        <hr>
                        <br>
                        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
                            <thead>
                                <tr>
                                    <th class="first" width="75">Fecha</th>
                                    <th class="first" width="77">N&deg; de Ref.</th>
                                    <th class="first" width="275">Concepto</th>
                                    <th class="first" width="77">Debe</th>
                                    <th class="first" width="77">Haber</th>
                                    <th class="last" width="77">Saldo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? $saldo = 0; ?>
                                <? foreach ($banco as $row) { ?> 
                                    <tr>
                                        <?
                                        $fecha = explode('-', $row['fecha_procesado']);
                                        $dia = $fecha['2'];
                                        $dia = explode(' ', $dia);
                                        ?>

                                        <? if ($row['id_t_operacion'] == 1 & $row['status'] == '0') { ?>
                                        <? } else { ?>
                                            <td class="last style2 "  style="text-align: center"><?= $dia['0'] . '-' . $fecha['1'] . '-' . $fecha['0'] ?></td>  
                                            <td class="first style2 separador" style="text-align: center">
                                                <? if ($row['id_t_operacion'] == '1' || $row['id_t_operacion'] == '2') { ?>
                                                    <a href="./egresos/ver_operacion/<?= sha1($row['id_instruccion']) ?>" >
                                                        <?= $row['n_cheque']; ?>
                                                    </a>
                                                <? } elseif ($row['id_t_operacion'] == '3' and $row['detalles_concepto'] != 'Saldo de Inicio de Cuenta') { ?>
                                                    <a href="./ingresos/ver_operacion/<?= sha1($row['id_instruccion']) ?>" >
                                                        <?= $row['n_cheque']; ?>
                                                    </a>
                                                <? } ?>
                                            </td>                                
                                            <td class="first style2 separador" style="text-align: left"><?= $row['detalles_concepto']; ?></td>                                
                                            <td class="first style2 separador" style="text-align: right"><?= $row['id_t_operacion'] == 3 ? number_format($row['monto_real_pagado'], 2, ',', '.') : ''; ?></td>                                
                                            <td class="first style2 separador" style="text-align: right"><?= $row['id_t_operacion'] == 1 || $row['id_t_operacion'] == 2 ? number_format($row['monto_real_pagado'], 2, ',', '.') : ''; ?></td> 
                                            <?
                                            if ($row['id_t_operacion'] == 3) {
                                                $saldo = $saldo + $row['monto_real_pagado'];
                                            } else if ($row['id_t_operacion'] == 1 || $row['id_t_operacion'] == 2) {
                                                $saldo = $saldo - $row['monto_real_pagado'];
                                            }
                                            ?>
                                            <td class="first style2 separador" style="text-align: right;"><?= number_format($saldo, 2, ',', '.'); ?></td>                                
                                        <? } ?>


                                    </tr>
                                <? } ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: right; height: 25px;"><b><?= number_format($corte_mes_actual['saldo'], 2, ',', '.'); ?></b></td>
                                </tr>
                            </tbody>
                        </table>


                    </div>

                </div>
                <? $this->load->view('templates/footer') ?>
            </div>

    </body></html>