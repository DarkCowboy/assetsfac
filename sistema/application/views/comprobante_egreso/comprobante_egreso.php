<html>
    <head></head>
    <body style="font-family: Verdana !important;">
        <div id="center-column" style="float: left; margin: 0 auto; width: 750px !important">
            <div class="top-bar">
                <h1 style="text-align: center; font-size: 14px;">Comprobante de Egreso</h1>
            </div><br>
            <br/>

            <? if ($instruccion['t_instrumento'] == 'Cheque') { ?>
                <? if ($instruccion['nombre_imagen_cheque']) { ?>
                    <?
                    $numero = strlen($instruccion['n_cheque']);
                    $restante = 6 - $numero;
                    for ($i = 1; $i <= $restante; $i++) {
                        $instruccion['n_cheque'] = '0' . $instruccion['n_cheque'];
                    }
                    ?>
                    <? if (strtolower(trim($instruccion['nombre_banco'])) == 'balboa bank trust') { ?>
                        <div style=" background: url('./images/cheques/vista_<?= $instruccion['nombre_imagen_cheque']; ?>') no-repeat; width: 614px; height: 297px; margin-top: 10px;">

                            <div style="float:right; width: 187px; margin-top: 9px;">
                                <?= $instruccion['n_cheque']; ?>
                            </div>

                            <p style="float: right; position: relative; width: 200px; margin-top: 10px; overflow: hidden; clear: both; ">
                                <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                                <?= fecha($fecha[0]); ?>
                            </p>

                            <p style="font-size: 11px; float: left; margin-left: 77px; width: 370px; margin-top: 12px; overflow: hidden; clear: both;  ">
                                ** <?= $instruccion['nombre_proveedor']; ?> **
                            </p>

                            <p style="font-size: 12px; float: right; margin-top: -29px; width: 137px; overflow: hidden; clear: both;">
                                <?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?>
                            </p>

                            <p style="font-size: 12px; float: left; margin-left: 84px; width: 501px; margin-top: -2px; overflow: hidden; clear: both; ">
                                <? $V = new EnLetras(); ?>
                                <?= $V->ValorEnLetras($instruccion['total_monto_pagar'], ''); ?>
                            </p>
                        </div>
                    <? } elseif (strtolower(trim($instruccion['nombre_banco'])) == 'credicorp bank trust') { ?>
                        
                        <div style="position: relative; background: url('./images/cheques/vista_<?= $instruccion['nombre_imagen_cheque']; ?>') no-repeat; width: 614px; height: 297px; margin-top: 10px;">

                            <div style="float:right; width: 87px; margin-top: 20px;">
                                <?= $instruccion['n_cheque']; ?>
                            </div>

                            <p style="float: right; position: relative; width: 220px; margin-top: 25px; overflow: hidden; clear: both;">
                                <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                                <?= fecha($fecha[0]); ?>
                            </p>

                            <p style="text-align: center;  font-size: 11px; float: left; margin-left: 95px; width: 360px; margin-top: 21px; overflow: hidden; clear: both;">
                                ** <?= strtoupper($instruccion['nombre_proveedor']); ?> **
                            </p>

                            <p style=" text-align: center; padding-right: 30px; font-size: 12px; float: right; margin-top: -29px; width: 105px; overflow: hidden; clear: both; ">
                                <?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?>
                            </p>

                            <p style="font-size: 12px; float: left; margin-left: 30px; width: 501px; margin-top: 8px; overflow: hidden; clear: both; ">
                                <? $V = new EnLetras(); ?>
                                <?= $V->ValorEnLetras($instruccion['total_monto_pagar'], ''); ?> *
                            </p>
                        </div>
                    <? } ?>
                <? } ?>

                <table style="width: 618px;">
                    <thead style="text-align: center; height: 25px;" >
                        <tr>
                            <td style="border: 1px solid #3e3e3e;">Cheque No.</td>
                            <td style="border: 1px solid #3e3e3e;">Banco</td>
                            <td style="border: 1px solid #3e3e3e;">Codigo Banco</td>
                            <td style="border: 1px solid #3e3e3e;">Cuenta Contable</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;"><?= $instruccion['n_cheque']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['nombre_banco']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['n_cuenta']; ?></td>
                            <td style="text-align: center;"></td>
                        </tr>

                        <tr style="border: 1px solid black;">
                            <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                        </tr>

                        <tr>
                            <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                <?= $instruccion['Concepto_pago'] ?>
                            </td>
                            <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
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
                            <td colspan="3" style="text-align: right;">Total Bs.</td>
                            <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            <? } else if ($instruccion['t_instrumento'] == 'Transferencia') { ?>
                <table style="width: 618px;">
                    <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                        <tr>
                            <td style="border: 1px solid #3e3e3e;">Transferencia No.</td>
                            <td style="border: 1px solid #3e3e3e;">Banco</td>
                            <td style="border: 1px solid #3e3e3e;">Codigo Banco</td>
                            <td style="border: 1px solid #3e3e3e;">Cuenta Contable</td>
                        </tr>
                    </thead>
                    <tbody style="text-align: center;">
                        <tr>
                            <td style="text-align: center;"><?= $instruccion['n_cheque']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['nombre_banco']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['n_cuenta']; ?></td>
                            <td style="text-align: center;"></td>
                        </tr>

                        <tr style="border: 1px solid black;">
                            <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                        </tr>

                        <tr>
                            <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                <?= $instruccion['Concepto_pago'] ?>
                            </td>
                            <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
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
                            <td colspan="3" style="text-align: right;">Total Bs.</td>
                            <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            <? } else if ($instruccion['t_instrumento'] == 'Efectivo') { ?>
                <table style="width: 618px;">
                    <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                        <tr>
                            <td colspan="4" style="border: 1px solid #3e3e3e; text-align: center;">Pago en Efectivo</td>
                        </tr>
                    </thead>
                    <tbody style="">
                        <tr>
                            <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                <?= $instruccion['Concepto_pago'] ?>
                            </td>
                            <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
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
                            <td colspan="3" style="text-align: right;">Total Bs.</td>
                            <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                        </tr>
                    </tbody>
                </table>
            <? } ?>
            <br/>
            <br/>
            <br/>
            <br/>
            <table style="width: 618px;">
                <tr>
                    <td style="width: 50%; font-size: 18px; text-align: center;">Recibi Conforme</td>
                    <td style="width: 50%; font-size: 18px; text-align: center;">Firma</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                </tr>

            </table>
        </div>
    </body>    
</html>
