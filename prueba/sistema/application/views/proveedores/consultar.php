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
            <div><b>Cliente: <?= $historico[0]['nombre_proveedor']; ?></b></div>
            <div><b>Numero de Identificacion: <?= $historico[0]['pre_id_number'] . ' ' . $historico[0]['id_number_proveedor']; ?></b></div>
            <div>Posicion al: <b><?= fecha(date('Y-m-d')); ?></b></div><br>
            <div class="contenido">
                <table class="tabla">
                    <tr class="titulo_tabla">
                        <td class="contenido_td" style="width: 170px;">Concepto de Pago</td>
                        <td class="contenido_td" style="width: 7px;">F. Liqui.</td>
                        <td class="contenido_td" style="width: 7px;">Entidad Bancaria</td>
                        <td class="contenido_td" style="width: 7px;">Moneda</td>
                        <td class="contenido_td" style="width: 7px;">N&deg; de Cuenta</td>
                        <td class="contenido_td" style="width: 7px;">Monto Pagado</td>
                    </tr>

                    <? foreach ($historico as $row) { ?>
                    <?
                        $total = $total + $row['total_monto_pagar'];
                    ?>
                        <tr>
                            <td class="contenido_td"><?= $row['Concepto_pago'] ?></td>
                            <td class="contenido_td">
                                <? if ($row['fecha_pago'] != null) { ?>
                                    <?= fecha($row['fecha_pago'], 'corta'); ?>
                                <? } ?>
                            </td>
                            <td class="contenido_td"><?= $row['nombre_banco'] ?></td>
                            <td class="contenido_td"><?= $row['moneda']; ?></td>
                            <td class="contenido_numero"><?= $row['n_cuenta'] ?></td>
                            <td class="contenido_numero"><?= number_format($row['total_monto_pagar'], '2', ',', '.'); ?></td>
                        </tr>
                    <? } ?>
                    <tr class="sub_titulo_tabla">
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><b><?= $total; ?></b></td>
                    </tr>

                </table>
            </div>
        </div>
    </body>
</html>