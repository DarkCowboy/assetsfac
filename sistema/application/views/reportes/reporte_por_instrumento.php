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
            <div><b><?= $reportes_tipo; ?> </b></div>
            <div><b><?= $titulo_reporte ?></b></div>
            <div><b> al: <?= fecha(date('Y-m-d')); ?></b></div><br>
            <div class="contenido">
                <table class="tabla">
                    <tr class="titulo_tabla">
                        <td class="" style="width: 14%;"><?= $contraparte  ?></td>
                        <td class="contenido_td" style="width:  5%;">ID</td>
                        <td class="contenido_td" style="width: 7%;">N&deg; ID</td>
                        <td class="contenido_td" style="width: 22%;">Concepto de Pago</td>
                        <td class="contenido_td" style="width: 11%;">F. Elaboracion</td>
                        <td class="contenido_td" style="width: 11%;">Banco</td>
                        <td class="contenido_td" style="width: 5%;">Moneda</td>
                        <td class="contenido_td" style="width: 15%;">N&deg; de Cuenta</td>
                        <td class="contenido_td" style="width: 8%;">Monto</td>
                    </tr>

                    <? foreach ($reporte as $row) { ?>

                        <?
                        if ($t_instrumento != $row['t_instrumento'] or $moneda != $row['moneda']) {
                            if ($instrumento_fin) {
                                echo'<tr class="sub_titulo_tabla">
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_td"></td>
                                    <td class="contenido_numero"><b>' . number_format($sub_tot_tot, '2', ',', '.') . '</b></td>
                                </tr>';
                            }


                            $t_instrumento = $row['t_instrumento'];
                            $moneda = $row['moneda'];
                            echo'<tr class = "titulo_tabla">
                                <td colspan="9" class = "" style = "width: 7px;"><b>' . $row['t_instrumento'] . '(' . $row['moneda'] . ')' . '</b></td>
                                </tr>';
                            $instrumento_fin = true;
                            $sub_tot_tot = 0;
                        }
                        $sub_tot_tot = $sub_tot_tot + $row['total_monto_pagar'];
                        ?>

                        <tr>
                            <td class=""><?= $row['nombre_proveedor']; ?></td>
                            <td class="contenido_td"><?= $row['pre_id_number']; ?></td>
                            <td class=""><?= $row['id_number_proveedor']; ?></td>
                            <td class=""><?= $row['detalles_concepto'] ?></td>
                            <td class=""><?= fecha($row['fecha_pago'], 'corta'); ?></td>
                            <td class=""><?= $row['nombre_banco'] ?></td>
                            <td class="contenido_td"><?= $row['moneda']; ?></td>
                            <td class=""><?= $row['n_cuenta'] ?></td>
                            <td class="contenido_numero"><?= number_format($row['total_monto_pagar'], '2', ',', '.'); ?></td>
                        </tr>
                    <? } ?>
                    <tr class="sub_titulo_tabla">
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><b><?= number_format($sub_tot_tot, '2', ',', '.') ?></b></td>
                    </tr>

                </table>
            </div>
        </div>
    </body>
</html>