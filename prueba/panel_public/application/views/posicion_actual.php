<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_reportes.css" />
        <script type='text/javascript' src='js/plugins/jquery.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/Jquery/jquery.mousewheel-3.0.6.pack.js'></script>
    </head>
    <body>
        <div class="cuerpo">
            <div><b>ASSETS FACTORING INC</b></div>
            <div><b>Posicion Actual</b></div>
            <div>Posicion al: <b><?= fecha(date('Y-m-d')); ?></b></div><br>
            <div class="contenido">

                <? if ($cupo_activo) { ?>
                    <table class="tabla">
                        <tr class = "titulo_tabla">
                            <td colspan="4" class = "contenido_td" style = "width: 7px;"><b>Cupo <?= @$operaciones[0]['nombre_razon_social_pn_pj'] ?></b></td>
                        </tr>
                        <tr class="titulo_tabla">
                            <td class="contenido_td" style="width: 7px;">Operc</td>
                            <td class="contenido_td" style="width: 7px;">Monto</td>
                            <td class="contenido_td" style="width: 7px;">F. Aprobacion</td>
                            <td class="contenido_td" style="width: 7px;">Status</td>
                        </tr>
                        <tr>
                            <td class="contenido_td"><?= $cupo_activo['n_operacion'] ?></td>
                            <td class="contenido_td"><?= number_format($cupo_activo['monto_solicitud_aprobado'], 2, ',', '.') ?></td>
                            <td class="contenido_td"><?= date("d/m/Y", strtotime($cupo_activo['fecha_solicitud_aprobado'])) ?></td>
                            <td class="contenido_td">
                                <?
                                switch ($cupo_activo['status']) {
                                    case 2:
                                        echo'Activo';
                                        break;
                                    case 4:
                                        echo 'Inactivo';
                                        break;
                                }
                                ?>
                            </td>
                        </tr>
                    </table>
                    <br/>
                <? } ?>
























                <? foreach ($operaciones as $row) { ?>
                    <? if ($row['tipo_solicitud'] == 2) { ?>
                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                            <table style="width: 100%; font-size: 11px; line-height: 18px;">
                                <tr>
                                    <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="14">

                                        Operacion de Venta <?= $row['n_operacion']; ?>

                                    </td>
                                </tr>


                                <tr>
                                    <td class="titulo_tabla" style="text-align: left;" colspan="13">RELACI&Oacute;N DE FACTURAS</td>
                                </tr>
                                <tr>
                                    <td class="sub_titulo_tabla" style="text-align: center;">N&deg; Fact.</td>
                                    <td class="sub_titulo_tabla" style="text-align: left;">Deudor</td>
                                    <!--<td class="sub_titulo_tabla" style="text-align: center;">RUC</td>-->
                                    <td class="sub_titulo_tabla" style="text-align: center;">Liquidacion</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Vencimiento</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Monto</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Plazo</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Precio</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Pagado</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Dif.</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Mora/Dias</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Dif. Act.</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Total deuda</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Status</td>
                                    <!--<td class="sub_titulo_tabla">MONTO CON ITBMS</td>-->
                                </tr>
                                <?
                                $i = 1;

                                $tot_val_nom = 0;
                                $liquidado = 0;
                                $tot_dif = 0;
                                $tot_dif_act = 0;
                                $tot_tot = 0;



                                foreach ($row['facturas'] as $data_fact) {
                                    if ($data_fact['status'] != 2) {
//                                                                debug($data_fact);
                                    $FV = $data_fact['fecha_vencimiento'];
                                    $date2 = explode('/', $FV);
                                    $fecha_vencimiento = $date2['2'] . '-' . $date2['1'] . '-' . $date2['0'] . ' 00:00:00';
                                    $FV = date_create($fecha_vencimiento);
                                    
                                    $fechaliqu = explode('-', $row['fecha_solicitud_aprobado']);
//                                    debug($fechaliqu, false);
                                    $dialiqu = explode(' ', $fechaliqu['2']);
//                                    debug($dialiqu, false);
                                    $fechaliquidacion = $dialiqu['0'] . '/' . $fechaliqu['1'] . '/' . $fechaliqu['0'];
//                                    debug($fechaliquidacion);
                                    $FE = new DateTime();
                                    $FE->format('Y-m-d H:i:s');
                                    $interval = date_diff($FE, $FV);
                                    $x = $interval->format('%R%a');

                                    if (strpos($x, '+') === false) {
                                        $mora_dias = str_replace('-', '', $x);
                                        if ($data_fact['status'] == 3) {
                                            $status = 'Cancelado';
                                        } else {
                                            $status = 'Vencido';
                                            $mora = True;
                                        }
                                    } else {
                                        $mora_dias = 0;
                                        if ($data_fact['status'] == 3) {
                                            $status = 'Cancelado';
                                        } else {
                                            $status = 'Vigente';
                                            $mora = false;
                                        }
                                    }


                                    $dif = $data_fact['valor_nominal'] - $data_fact['liquidado_compra'];
                                    $plazo_act = date_diff(date_create($row['fecha_solicitud_aprobado']), $FE);
                                    $plazo_act = $plazo_act->format('%a');

                                    $pagado = $data_fact['liquidado_compra'];
//                                                                $rendimiento = $data_fact['rendimiento_compra'];

                                    $rendimiento = number_format(((100 / $data_fact['precio_compra'] - 1) * (360 / $data_fact['plazo_compra'])) * 100, 2, '.', '');



                                    $precio_actual = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
                                    $monto = ($data_fact['valor_nominal'] * $precio_actual);


                                    $dif_act = $data_fact['valor_nominal'] - $monto;
                                    $tot = $dif_act + $data_fact['valor_nominal'];
                                    $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];



                                    $tot_tot = $tot_tot + $tot;
                                    $tot_dif_act = $tot_dif_act + $dif_act;
                                    $tot_dif = $dif + $tot_dif;
                                    $liquidado = $liquidado + $data_fact['liquidado_compra'];
                                    $tot_val_nom = $tot_val_nom + $data_fact['valor_nominal'];
                                    ?>
                                    <tr style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" >
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?php echo $data_fact['numero_factura']; ?></td>
                                        <td style="text-align: left; <?= $mora == false ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?php echo $data_fact['deudor']; ?></td>
                                        <!--<td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $data_fact['rif']; ?></td>-->
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $fechaliquidacion; ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $data_fact['fecha_vencimiento']; ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($data_fact['valor_nominal'], 2, ',', '.'); ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo $data_fact['plazo_compra'] ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo $data_fact['precio_compra'] ?>%</td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($data_fact['liquidado_compra'], 2, ',', '.'); ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($dif, 2, ',', '.'); ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?= $mora_dias ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($dif_act, 2, ',', '.'); ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($tot, 2, ',', '.'); ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?= $status; ?></td>
                                        <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"></td>
                                    </tr>
                                    <?
                                    $i = $i + 1;
                                }
                                }
                                ?>
                                <tr>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <!--<td class="contenido_td"></td>-->
                                    <td class="contenido_numero"><b><?php echo number_format($tot_val_nom, 2, ',', '.'); ?></b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"><b><?php echo number_format($liquidado, 2, ',', '.'); ?></b></td>
                                    <td class="contenido_numero"><b><?php echo number_format($tot_dif, 2, ',', '.'); ?></b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"><b><?php echo number_format($tot_dif_act, 2, ',', '.'); ?></b></td>
                                    <td class="contenido_numero"><b><?php echo number_format($tot_tot, 2, ',', '.'); ?></b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                </tr>
                                <tr>
                                    <td class="contenido_td" colspan="13">&nbsp;</td>
                                </tr>

                            </table>



                        <? } ?>
                    <? } elseif ($row['tipo_solicitud'] == 3) { ?>
                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>


                            <table style="width: 100%; font-size: 11px; line-height: 18px;">
                                <tr>
                                    <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="11">

                                        Operacion de Pagare <?= $row['n_operacion']; ?>

                                    </td>
                                </tr>
                                <tr style="text-align: center; background: #9C9C8B; color: white; font-weight: bold;">
                                    <td class="sub_titulo_tabla" style="text-align: center;">Nominal</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">F. Liqui.</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">F. Vto.</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Plazo</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Precio</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Pagado</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Dif.</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Mora/dias</td>
                                    <!--<td class="contenido_td" style="text-align: center;">Mora/BsF.</td>-->
                                    <td class="sub_titulo_tabla" style="text-align: center;">Dif. Act.</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Total</td>
                                    <td class="sub_titulo_tabla" style="text-align: center;">Status</td>
                                </tr>
                                <?
                                $tot_nom = 0;
                                $tot_pag = 0;
                                $tot_dif = 0;
                                $tot_mora_bs = 0;
                                $tot_dif_act = 0;
                                $tot_tot = 0;
                                ?>

                                <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                    <?
                                    $pagado = $row['monto_solicitud_aprobado'] * ($row['porcentaje_compra'] / 100);
                                    $dif = $row['monto_solicitud_aprobado'] - $pagado;
                                    $plazo_act = diferenciaEntreFechas(date('Y-m-d'), $row['fecha_solicitud_aprobado']);
                                    $rendimiento = number_format(((100 / $row['porcentaje_compra'] - 1) * (360 / $row['plazo_solicitud_aprobado'])) * 100, 2, '.', '');
                                    $precio = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
                                    $monto = ($row['monto_solicitud_aprobado'] * $precio);
                                    $dif_act = $row['monto_solicitud_aprobado'] - $monto;
                                    $tot = $dif_act + $pagado;
                                    $tot_nom = $tot_nom + $row['monto_solicitud_aprobado'];
                                    $tot_pag = $tot_pag + $row['monto_solicitud_aprobado'];
                                    $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];
                                    $tot_dif = $tot_dif + $dif;
                                    $tot_dif_act = $tot_dif_act + $dif_act;
                                    $tot_tot = $tot_tot + $tot;
                                    ?>
                                    <tr style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>" >

                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?= number_format($row['monto_solicitud_aprobado'], '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= date("d", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_solicitud_aprobado'])); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= date("d", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_vcto_solicitud_aprobado'])); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($row['plazo_solicitud_aprobado'], '0', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($row['porcentaje_compra'], 2, ',', '.'); ?>%</td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($pagado, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($dif, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= $row['mora_dias']; ?></td>
                                        <!--<td class="contenido_numero"><?= $row['mora_monto'] ? number_format($row['mora_monto'], '2', ',', '.') : '0'; ?></td>-->
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($dif_act, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($tot, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td">
                                            <?
                                            if ($row['pause']) {
                                                echo 'Pausada';
                                            } else {
                                                if ($row['status'] == '2') {
                                                    echo 'Vigente';
                                                } else {
                                                    echo 'Vencido';
                                                }
                                            }
                                            ?>
                                        </td>
                                    </tr>

                                    <td style="text-align: center;  font-weight: bold;" colspan="11">&nbsp;</td>

                                <? } ?>
                            </table>


                        <? } ?>
                    <? } ?>
                <? } ?>   





            </div>
        </div>
    </body>
</html>