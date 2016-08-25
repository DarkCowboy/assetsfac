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
            <div><b>ASSETS FACTORING INC.</b></div>
            <div><b>Reporte Tipo de Operacion / Vencimiento</b></div>
            <div>Posicion al: <b><?= fecha(date('Y-m-d')); ?></b></div><br>
            <div class="contenido">
                <table class="tabla">
                    <tr class="titulo_tabla">
                        <td class="contenido_td" style="width: 7px;">Operc</td>
                        <td class="contenido_td" style="width: 7px;">Tipo</td>
                        <td class="contenido_td" style="width: 270px;">Nombre del Cliente</td>
                        <td class="contenido_td" style="width: 7px;">Nominal</td>
                        <td class="contenido_td" style="width: 7px;">F. Liqui.</td>
                        <td class="contenido_td" style="width: 7px;">F. Vto.</td>
                        <td class="contenido_td" style="width: 7px;">Plazo</td>
                        <td class="contenido_td" style="width: 7px;">Precio</td>
                        <td class="contenido_td" style="width: 2px;">Pagado</td>
                        <td class="contenido_td" style="width: 2px;">Dif.</td>
                        <td class="contenido_td" style="width: 2px;">Mora/dias</td>
                        <!--<td class="contenido_td" style="width: 7px;">Mora/BsF.</td>-->
                        <td class="contenido_td" style="width: 2px;">Dif.Act.</td>
                        <td class="contenido_td" style="width: 2px;">Total</td>
                        <td class="contenido_td" style="width: 14px;">Status</td>
                    </tr>
                    <?
                    $tot_nom = 0;
                    $tot_pag = 0;
                    $tot_dif = 0;
                    $tot_mora_bs = 0;
                    $tot_dif_act = 0;
                    $tot_tot = 0;
                    $operacion_fin = false;
                    ?>
                    <? foreach ($operaciones as $row) { ?>
                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                            
                            <?
                            if ($operacion_tipo != $row['tipo_solicitud']) {

                                if ($operacion_fin) {
                                    echo'<tr class="sub_titulo_tabla">
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_izquierda"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_nom, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_pag, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_dif, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_dif_act, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_tot, '2', ', ', ' . ') . '</b></td>
                                    <td class="contenido_td"></td>
                                </tr>';

                                    $sub_tot_nom = 0;
                                    $sub_tot_pag = 0;
                                    $sub_tot_dif = 0;
                                    $sub_tot_mora_bs = 0;
                                    $sub_tot_dif_act = 0;
                                    $sub_tot_tot = 0;
                                }


                                $operacion_tipo = $row['tipo_solicitud'];
                                switch ($operacion_tipo){
                                    case 1:
                                        $nombre_operacion='Cupos';
                                        break;
                                    case 2:
                                        $nombre_operacion='Ventas';
                                        break;
                                    case 3:
                                        $nombre_operacion='Pagares';
                                        break;
                                    case 4:
                                        $nombre_operacion='Prestamos';
                                        break;
                                }
                                echo'<tr class = "titulo_tabla">
                                <td colspan="14" class = "contenido_td" style = "width: 7px;"><b>' . $nombre_operacion . '</b></td>
                                </tr>';
                                $operacion_fin = true;
                            }
                            ?>
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
                            $tot_pag = $tot_pag + $pagado;
                            $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];
                            $tot_dif = $tot_dif + $dif;
                            $tot_dif_act = $tot_dif_act + $dif_act;
                            $tot_tot = $tot_tot + $tot;

                            $sub_tot_nom = $sub_tot_nom + $row['monto_solicitud_aprobado'];
                            $sub_tot_pag = $sub_tot_pag + $pagado;
                            $sub_tot_mora_bs = $sub_tot_mora_bs + $row['mora_monto'];
                            $sub_tot_dif = $sub_tot_dif + $dif;
                            $sub_tot_dif_act = $sub_tot_dif_act + $dif_act;
                            $sub_tot_tot = $sub_tot_tot + $tot;
                            ?>
                            
                            <tr>
                                <td class="contenido_td"><?= $row['n_operacion'] . $row['tipo']; ?></td>
                                <td class="contenido_td">
                                    <?
                                    if ($row['tipo_solicitud'] == 2) {
                                        echo 'Venta';
                                    } else if ($row['tipo_solicitud'] == 3) {
                                        echo 'Pagare';
                                    } else {
                                        echo 'Prestamo';
                                    }
                                    ?>
                                </td>
                                <td class="contenido_izquierda"><?= @$row['nombre_razon_social_pn_pj']; ?></td>
                                <td class="contenido_numero"><?= number_format($row['monto_solicitud_aprobado'], '2', ',', '.'); ?></td>
                                <td class="contenido_td"><?= date("d", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_solicitud_aprobado'])); ?></td>
                                <td class="contenido_td"><?= date("d", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_vcto_solicitud_aprobado'])); ?></td>
                                <td class="contenido_td"><?= number_format($row['plazo_solicitud_aprobado'], 0, ',', '.'); ?></td>
                                <td class="contenido_td"><?= number_format($row['porcentaje_compra'],2,',','.'); ?>%</td>
                                <td class="contenido_numero"><?= number_format($pagado, '2', ',', '.'); ?></td>
                                <td class="contenido_numero"><?= number_format($dif, '2', ',', '.'); ?></td>
                                <td class="contenido_td"><?= $row['mora_dias']; ?></td>
                                <!--<td class="contenido_numero"><?= $row['mora_monto'] ? number_format($row['mora_monto'], '2', ',', '.') : '0'; ?></td>-->
                                <td class="contenido_numero"><?= number_format($dif_act, '2', ',', '.'); ?></td>
                                <td class="contenido_numero"><?= number_format($tot, '2', ',', '.'); ?></td>
                                <td class="contenido_td"><?= $row['status'] == '2' ? 'Vigente' : 'Vencido'; ?></td>
                            </tr>
                        <? } ?>
                    <? } echo'<tr class="sub_titulo_tabla">
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_izquierda"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_nom, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_pag, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_dif, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_dif_act, '2', ', ', '.') . '</b></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_tot, '2', ', ', ' . ') . '</b></td>
                                    <td class="contenido_td"></td>
                                </tr>';?>
                            
                    <tr class="sub_titulo_tabla">
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_izquierda"></td>
                        <td class="contenido_numero"><b><?= number_format($tot_nom, '2', ',', '.'); ?></b></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"></td>
                        <td class="contenido_numero"><b><?= number_format($tot_pag, '2', ',', '.'); ?></b></td>
                        <td class="contenido_numero"><b><?= number_format($tot_dif, '2', ',', '.'); ?></b></td>
                        <td class="contenido_td"></td>
                        <!--<td class="contenido_numero"><b><?= number_format($tot_mora_bs, '2', ',', '.'); ?></b></td>-->
                        <td class="contenido_numero"><b><?= number_format($tot_dif_act, '2', ',', '.'); ?></b></td>
                        <td class="contenido_numero"><b><?= number_format($tot_tot, '2', ',', '.'); ?></b></td>
                        <td class="contenido_td"></td>
                    </tr>

                </table>
            </div>
        </div>
    </body>
</html>