<html>
    <head></head>
    <body style="font-family: Verdana !important;">
        <div id="center-column" style="float: left; margin: 0 auto; width: 750px !important">
            <div class="top-bar">
                <h1 style="text-align: center; font-size: 14px;">Comprobante de Ingreso</h1>
            </div><br>
            <br/>

            <table style="width: 618px; margin: 0 auto;">
                <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                    <tr>
                        <td style="text-align: center;">Transferencia No.</td>
                        <td style="text-align: center;">Banco</td>
                        <td style="text-align: center;">Codigo Banco</td>
                        <td style="text-align: center;">Cuenta Contable</td>
                    </tr>
                </thead>
                <tbody style="text-align: center;">
                    <tr>
                        <td style="text-align: center;"><?= $operacion['n_cheque']; ?></td>
                        <td style="text-align: center;"><?= $operacion['nombre_banco']; ?></td>
                        <td style="text-align: center;"><?= $operacion['n_cuenta']; ?></td>
                        <td style="text-align: center;"><?= $operacion['codigo']; ?></td>
                    </tr>

                    <tr style="border: 1px solid black;">
                        <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                    </tr>

                    <tr>
                        <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                            <?
                            if ($operacion['traspaso'] == '1') {
                                echo 'Traspaso entre Cuentas';
                            } else {
                                echo 'Deudor: ' . $operacion['nombre_proveedor'];
                            }
                            ?> 
                            <?= '<br/> Detalles del concepto: ' . $operacion['detalles_concepto'] ?> 
                            <?= '<br/> Soporte: ' . $operacion['t_documento'] ?>
                            <?= '<br/> N&deg; deposito o trasfrencia: ' . $operacion['n_cheque'] ?>
                        </td>
                        <td style="border: 1px solid black; text-align: right;"><?= number_format($operacion['total_monto_pagar'], 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: right;">Total <?= $operacion['moneda'] ?></td>
                        <td style="border: 1px solid black; text-align: right;"><?= number_format($operacion['total_monto_pagar'], 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
            <br/>
            <br/>
            <br/>
            <br/>
            <table style="width: 618px;">
                <tr>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </div>
    </body>    
</html>
