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
                <td class="td" colspan="2" style="text-align: center;"><b>INSTRUCCI&Oacute;N DE LIQUIDACI&Oacute;N</b></td>
            </tr>
        </table>

        <table>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;<b>CLIENTE:</b></td>
                <td class="td"><b><?= strtoupper($instruccion['nombre_proveedor']); ?></b></td>
            </tr>
        </table>


        <table>
            <tr>
                <td class="td">&nbsp;</td>
                <td class="td">&nbsp;</td>
            </tr>
            <tr>
                <td class="td" colspan="2" style="text-align: center;"><b>DATOS DE LA CUENTA A SER ABONADA</b></td>
            </tr>
        </table>


        <table>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;BENEFICIARIO:</td>
                <td class="td"><?= strtoupper($instruccion['nombre_proveedor']); ?></td>
            </tr>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;RIF:</td>
                <td class="td"><?= strtoupper($instruccion['id_number_proveedor']); ?></td>
            </tr>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;BANCO:</td>
                <td class="td"><?= strtoupper($instruccion['banco_proveedor']); ?></td>
            </tr>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;TIPO DE CTA.:</td>
                <td class="td"><?= strtoupper($instruccion['t_cuenta_proveedor']); ?></td>
            </tr>
            <tr class="">
                <td class="td">&nbsp;&nbsp;&nbsp;NUMERO:</td>
                <td class="td"><?= strtoupper($instruccion['n_cuenta_proveedor']); ?></td>
            </tr>
        </table>

        

        <table style="width: 600px">
            
            <? $fecha = explode(' ', $instruccion['fecha_procesado']); ?>
            <? $fecha = explode('-', $fecha[0]); ?>
            
            <tr style="background: lightgray;">
                <td class="td">&nbsp;&nbsp;&nbsp;FECHA DE LIQUIDACION</td>
                <td class="td" style="text-align: right;"><?= $fecha[2].'/'.$fecha[1].'/'.$fecha[0]; ?></td>
            </tr>
            
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;MONTO NOMINAL</td>
                <td class="td" style="text-align: right;"><?= number_format($instruccion['montonominal'],2,',','.'); ?></td>
            </tr>
            
            <tr style="background: lightgray;">
                <td class="td">&nbsp;&nbsp;&nbsp;PRECIO</td>
                <td class="td" style="text-align: right;"><?= $instruccion['precio']*100 .'%'; ?></td>
            </tr>
            
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;<b>MONTO A LIQUIDAR</b></td>
                <td class="td" style="text-align: right;"><b><?= number_format($instruccion['monto_real_pagado'],2,',','.'); ?></b></td>
            </tr>
            
            <tr style="background: lightgray;">
                <td class="td">&nbsp;&nbsp;&nbsp;PLAZO (DIAS)</td>
                <td class="td" style="text-align: right;"><?= $instruccion['plazo']; ?></td>
            </tr>
            <? $fecha = explode(' ', $instruccion['fechavencimiento']); ?>
            <? $fecha = explode('-', $fecha[0]); ?>
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;FECHA DE VENCIMIENTO</td>
                <td class="td" style="text-align: right;"><?= $fecha[2].'/'.$fecha[1].'/'.$fecha[0] ?></td>
            </tr>
            
            <tr style="background: lightgray;">
                <td class="td">&nbsp;&nbsp;&nbsp;<b>MONTO A CANCELAR CLIENTE</b></td>
                <td class="td" style="text-align: right;"><b><?= number_format($instruccion['montonominal'],2,',','.'); ?></b></td>
            </tr>
            
            <tr>
                <td class="td">&nbsp;&nbsp;&nbsp;<b>TOTAL ABONAR CLIENTE</b></td>
                <td class="td" style="text-align: right;"><b><?= number_format($instruccion['monto_real_pagado'],2,',','.'); ?></b></td>
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
                <td class="td" style="text-align: center" colspan="2"><b>YAMIR JOSE URBINA</b></td>
            </tr>
            <tr>
                <td class="td" style="text-align: center" colspan="2"><b>DIRECTOR</b></td>
            </tr>
        </table>
    </body>
</htm>