<htm>
    <head>
        <link type="text/css" rel="stylesheet" href="css/style_comprobante.css" />
        <style>
            body, td, tr, div, p, a{
                font-family: verdana;
            }
        </style>
    </head>
    <body>
        <? // debug($instruccion); ?>
        <div>
            <div class="logo" style="float: left; width: 200px;">
                <img width="200" src="images/logo_portada.png" />
            </div>

            <div class="direccion" style="float: right; text-align: center;width: 200px; font-size: 8px; font-family: Arial;">
                <b> <br/>Av. Tamanaco, Torre ATLANTIC, Piso 7, Oficina 7-B, El Rosal,<br/>
                    Caracas, Venezuela.<br/>
                    Web: www.msfactoring.com.ve<br/>
                    Email: ms.factoring@hotmail.com<br/>
                    Telefonos: 0212-9525573 / 9525321</b>
            </div>
            <div class="fecha" style="width: 100%; text-align: right; font-size: 14px;"><br/>Caracas, <?= fecha($instruccion['fecha_elaboracion_instruccion']); ?></div>
        </div>
        <br/>
        <table  class="tabla">
            <tr>
                <td class="td" colspan="2"><b>PARA: </b>ADMINISTRACION - MS FACTORING C.A.</td>
            </tr>
            <tr>
                <td class="td" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" colspan="2"><b>ASUNTO: </b><?= $instruccion['detalles_concepto']; ?></td>
            </tr>
            <tr>
                <td class="td" colspan="2">&nbsp;</td>
            </tr>
           

            <tr>
                <td class="td" colspan="2"><p style="font-style: italic;">Factura N&uacute;mero: <?= $instruccion['n_factura']; ?></p></td>
            </tr>
            <tr>
                <td class="td" colspan="2"><p style="font-style: italic;">N&uacute;mero de control: <?= $instruccion['n_control_factura']; ?></p></td>
            </tr>
            <tr>
                <td class="td" colspan="2"><p style="font-style: italic;">Fecha: <?= fecha($instruccion['fecha_factura']); ?></p></td>
            </tr>
            <tr>
                <td class="td" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" colspan="2" style="text-align: center;"><b>INSTRUCCI&Oacute;N DE PAGO</b></td>
            </tr>


            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;<b>CARGO A CUENTA DE:</b></td>
                <td class="td">MS FACTORING, C.A.</td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;<b>CUENTA <?= strtoupper($instruccion['t_de_cuenta'])  ; ?> N&deg;:</b></td>
                <td class="td"><?= $instruccion['nombre_banco'] . ' ' . $instruccion['n_cuenta'] ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>


            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;<b>BENEFICIARIO:</b></td>
                <td class="td"><b><?= strtoupper($instruccion['nombre_proveedor']); ?></b></td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;<b><?= $instruccion['pre_id_number']; ?>:</b></td>
                <td class="td"><?= $instruccion['id_number_proveedor']; ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
        </table>

        <table style="width: 317px;">
            <tr>
                <td class="td" style="width:200px;">&nbsp;&nbsp;&nbsp;<b>MONTO EXENTO</b></td>
                <td class="td" style="text-align: right;"><?= number_format($instruccion['monto_exento'], 2, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="td" style="width:200px;">&nbsp;&nbsp;&nbsp;<b>BASE IMPONIBLE</b></td>
                <td class="td" style="text-align: right;"><?= number_format($instruccion['monto_instruccion'], 2, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="td" style="width:200px;">&nbsp;&nbsp;&nbsp;<b>MONTO CON IVA (<?= $instruccion['iva'] ?> %)</b></td>
                <td class="td" style="text-align: right;"><?= number_format(($instruccion['monto_instruccion'] * $instruccion['iva']) / 100, 2, ',', '.') ?></td>
            </tr>
            <tr>
                <td class="td" style="width:200px;">&nbsp;&nbsp;&nbsp;<b>TOTAL DE FACTURA:</b></td>
                <td class="td" style="text-align: right;"><b><?= number_format($instruccion['total_monto_pagar'] + $instruccion['monto_exento'], 2, ',', '.') ?></b></td>
            </tr>
        </table>

        <table style="width: 100%;">
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" style="text-align: center" colspan="2">Atentamente,</td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" style="text-align: center" colspan="2"><b><? foreach ($usuarios as $row) {
                        if (@$row['creada'] == '1') {
                            echo ucfirst(@$row['first_name'] . ' ' . @$row['last_name']);
                        }
                        } ?></b></td>
            </tr>
            <tr>
                <td class="td" style="text-align: center" colspan="2"><b><? foreach ($usuarios as $row) {
                        if (@$row['creada'] == '1') {
                            echo ucfirst(@$row['cargo']);
                        }
                        } ?></b></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
        </table>



    </body>
</htm>