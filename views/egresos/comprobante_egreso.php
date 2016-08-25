<html>
    <head></head>
    <body style="font-family: Verdana !important; font-size: 9px;">
        <br/>
        <br/>
        <br/>
        <div class="top-bar">
            <h1 style="text-align: center; font-size: 14px;">
                <? if ($instruccion['traspaso'] == '0') { ?>    
                    Comprobante de Egreso
                <? } else { ?>
                    Comprobante de Traspaso
                <? } ?>
            </h1>
        </div><br>
        <br/>
        <br/>
        <br/>
        <div id="center-column" style="float: left; margin: 0 auto; border: solid 1px black; width: 750px !important">
            <br/>

            <? if ($instruccion['t_instrumento'] == 'Cheque') { ?>


                <table style="width: 618px;">
                    <thead style="text-align: center; height: 25px;" >
                        <tr>
                            <td style=" text-align: left;" rowspan="3" colspan="2">
                                <img src="images/general/logo_portada.png" width="150" />
                                <p>J-29719322-7</p>
                            </td>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style=""></td>
                            <td style="border: solid 1px black;">***  <?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?>  ***</td>
                        </tr>
                        <tr>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-weight: bold;">Beneficiario:</td>
                            <td style="border: solid 1px black; text-align: center;" colspan="3">***** <?= ucwords($instruccion['nombre_proveedor']); ?> *****</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-weight: bold;">Monto:</td>
                            <td style="border: solid 1px black; text-align: center;" colspan="3">***** <? $V = new EnLetras(); ?>
                                <?= $V->ValorEnLetras($instruccion['monto_real_pagado'], 'Bol&iacute;vares'); ?> *****</td>
                        </tr>
                        <tr>
                            <td style="text-align: right; font-weight: bold;">Fecha:</td>
                            <td style="border: solid 1px black; text-align: center;"><?= fecha($instruccion['fecha_elaboracion_instruccion']); ?></td>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                            <td style="">&nbsp;</td>
                        </tr>
                    </thead>
                    <thead style="text-align: center; height: 25px;" >
                        <tr>
                            <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold; ">Cheque No.</td>
                            <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;">Banco</td>
                            <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;">Codigo Banco</td>
                            <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;">Cuenta Contable</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;"><?= $instruccion['n_cheque']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['nombre_banco']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['n_cuenta']; ?></td>
                            <td style="text-align: center;"><?= $instruccion['codigo']; ?></td>
                        </tr>

                        <tr style="border: 1px solid black;">
                            <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                        </tr>

                        <tr>
                            <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                <?=
                                'Concepto: ' . $instruccion['detalles_concepto']
                                . '<br/> Soporte: ' . $instruccion['n_factura']
                                . '<br/> N&deg; de cheque: ' . $instruccion['n_cheque']
                                ?>
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
                            <td style="text-align: center;"><?= $instruccion['codigo']; ?></td>
                        </tr>

                        <tr style="border: 1px solid black;">
                            <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                        </tr>

                        <tr>
                            <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                <?=
                                'Concepto: ' . $instruccion['detalles_concepto']
                                . '<br/> Soporte: ' . $instruccion['n_factura']
                                . '<br/> N&deg; de Transferencia: ' . $instruccion['n_cheque']
                                ?>
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
                                <?= $instruccion['detalles_concepto'] ?>
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
            <table style="width: 618px">
                <tfoot style="text-align: center; height: 25px; width: 618px;" >
                    <tr>
                        <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;width: 25%;">Preparado</td>
                        <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;width: 25%;">Revisado</td>
                        <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;width: 25%;">Recibi Conforme</td>
                        <td style="border: 1px solid #3e3e3e;background: #9c9c9c;color: white;font-weight: bold;width: 25%;">Firma</td>
                    </tr>
                    <tr>
                        <td style="height: 30px;border: 1px solid #3e3e3e;">&nbsp;</td>
                        <td style="height: 30px;border: 1px solid #3e3e3e;">&nbsp;</td>
                        <td style="height: 30px;border: 1px solid #3e3e3e;">&nbsp;</td>
                        <td style="height: 30px;border: 1px solid #3e3e3e;">&nbsp;</td>
                    </tr>
                </tfoot>
            </table>

        </div>
    </body>    
</html>
