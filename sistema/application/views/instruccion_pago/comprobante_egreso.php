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
        <br/>
        <br/>
        <br/>
        <br/>
        <table  class="tabla">
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td"><b>&nbsp;&nbsp;&nbsp;INSTRUCCI&Oacute;N DE PAGO</b></td>
                <td class="td"></td>
            </tr>
            <tr>
                <td class="td"><b>&nbsp;&nbsp;&nbsp;FECHA: <?= fecha($instruccion['fecha_pago']); ?></b></td>
                <td class="td"></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr class="td_oscuro">
                <td class="td">&nbsp;&nbsp;&nbsp;BENEFICIARIO</td>
                <td class="td"><?= strtoupper($instruccion['nombre_proveedor']); ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;RUC / RIF / CED /PAS</td>
                <td class="td"><?= $instruccion['id_number_proveedor']; ?></td>
            </tr>
            <tr class="td_oscuro">
                <td class="td">&nbsp;&nbsp;&nbsp;CONCEPTO</td>
                <td class="td"><?= $instruccion['Concepto_pago']; ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;SOPORTE</td>
                <td class="td"><?= $instruccion['t_documento']; ?></td>
            </tr>
            <tr class="td_oscuro">
                <td class="td">&nbsp;&nbsp;&nbsp;FECHA</td>
                <td class="td"><?= fecha($instruccion['fecha_pago']) ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;CUENTA A DEBITAR</td>
                <td class="td"><?= $instruccion['n_cuenta']; ?></td>
            </tr>
            <tr class="td_oscuro">
                <td class="td">&nbsp;&nbsp;&nbsp;BANCO</td>
                <td class="td"><?= $instruccion['nombre_banco']; ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;MONEDA</td>
                <td class="td"><?= $instruccion['moneda'] ?></td>
            </tr>
            <tr class="td_oscuro">
                <td class="td">&nbsp;&nbsp;&nbsp;INSTRUMENTO</td>
                <td class="td"><?= $instruccion['t_instrumento']; ?></td>
            </tr>
<!--            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;NUMERO</td>
                <td class="td"><? $instruccion['n_cheque']; ?></td>
            </tr>-->
            <tr class="td_oscuro">
                <td class="td">&nbsp;&nbsp;&nbsp;MONTO</td>
                <td class="td"><?= number_format($instruccion['monto_instruccion'],2,',','.') ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;ITBMS/IVA</td>
                <td class="td"><?= $instruccion['iva'] ?> %</td>
            </tr>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;MONTO ITBMS/IVA</td>
                <td class="td"><?= number_format(($instruccion['monto_instruccion']*$instruccion['iva'])/100,2,',','.') ?></td>
            </tr>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr class="td_oscuro">
                <td class="td"><b>&nbsp;&nbsp;&nbsp;TOTAL</b></td>
                <td class="td"><?= number_format($instruccion['total_monto_pagar'],2,',','.') ?></td>
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
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center;">ELABORADO POR</td>
                <td style="text-align: center;">APROBADO POR</td>
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