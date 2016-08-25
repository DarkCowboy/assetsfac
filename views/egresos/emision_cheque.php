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
        <br/>
        <table  class="tabla">
            <tr>
                <td class="td"><b>PARA:</b> ADMINISTRACION - MS FACTORING C.A.</td>
            </tr>
            <tr>
                <td class="td"><b>ASUNTO</b>: <?= $instruccion['detalles_concepto']; ?></td>
            </tr>
            <tr>
                <td class="td"></td>
            </tr>
            <tr>
                <td class="td" style="font-style: italic;">
                    Factura n&uacute;mero: <?= $instruccion['n_factura']; ?><br/>
                    N&uacute;mero de control: <?= $instruccion['n_control_factura']; ?><br/>
                    Fecha: <?= $instruccion['fecha_factura']; ?>
                </td>
            </tr>
        </table>
        
        <table  class="tabla">
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" colspan="2" style="text-align: center;"><b>INSTRUCCI&Oacute;N DE EMISION DE CHEQUE</b></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td"><b>CARGO A CUENTA DE:</b></td>
                <td class="td">MS FACTORING, C.A.</td>
            </tr>
            <tr>
                <td class="td"><b>CUENTA <?= $instruccion['t_de_cuenta']; ?> N&deg;.:</b></td>
                <td class="td"><?= $instruccion['n_cuenta'] ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr class="">
                <td class="td"><b>BENEFICIARIO</b></td>
                <td class="td"><?= strtoupper($instruccion['nombre_proveedor']); ?></td>
            </tr>
            <tr>
                <td class="td"><b><?= $instruccion['pre_id_number']; ?></b></td>
                <td class="td"><?= $instruccion['id_number_proveedor']; ?></td>
            </tr>
            <tr>
                <td class="td"><b>MONTO TOTAL FACTURA:</b></td>
                <td class="td"><?= number_format($instruccion['total_monto_pagar'],2,',','.') ?></td>
            </tr>
            <tr class="">
                <td class="td"><b>BASE IMPONIBLE:</b></td>
                <td class="td"><?= number_format($instruccion['base_imponible'],2,',','.') ?></td>
            </tr>
            <tr>
                <td class="td"><b>IVA:</b></td>
                <td class="td"><?= number_format($instruccion['impuesto_iva'],2,',','.') ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr class="">
                <td class="td"><b>RETENCION I.S.R.L.:</b></td>
                <td class="td"><?= $instruccion['monto_retenido']; ?></td>
            </tr>
            <tr>
                <td class="td"><b>RETENCION I.V.A.:</b></td>
                <td class="td"><?= $instruccion['iva_retenido']; ?></td>
            </tr>
            <tr class="">
                <td class="td"><b>TOTAL A PAGAR:</b></td>
                <td class="td"><?= number_format($instruccion['monto_real_pagado'],2,',','.') ?></td>
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
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Atentamente,</td>
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
                <td colspan="2" style="text-align: center;">Paula Pacheco Armas<br/>Administradora</td>
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