<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="css/style_giro.css" />
        <title>GIRO <?= $solicitud['nom_rz_pj'] ?></title>
    </head>
    <body style="font-family: arial;">

        <?
        $fecha = explode('-', $solicitud['fecha_solicitud_aprobado']);
        $fecha_vcto = explode('-', $solicitud['fecha_vcto_solicitud_aprobado']);
        ?>
        <div style="margin-left: 90px; padding-top: 100px;">
            <div class="marco">
                <table style="border: 1px solid black;">
                    <tr>
                        <td style="text-rotate:90; font-size: 9px; width: 33px; height: 330px;">
                            <p>ACEPTADA PARA SER PAGADA A SU VENCIMIENTO SIN AVISO Y SIN PROTESTO</p>
                        </td>
                        <td style="text-rotate:90; vertical-align: bottom;font-size: 9px; width: 33px;">
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FIRMA: Por <?= $solicitud['nom_rz_pj'] ?></b></p>
                        </td>
                        <td style="text-rotate:90; vertical-align: top;font-size: 9px; width: 33px; border-right: 1px solid black; ">
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha: <?= (int) $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0] ?></b></p>
                        </td>

                        <td style="text-rotate:90; font-size: 9px; width: 25px;">
                            <p>BUENO POR AVAL POR CUENTA DEL LIBRADO</p>
                        </td>
                        <td style="text-rotate:90; vertical-align: bottom;font-size: 9px; width: 25px;">
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EL AVAL: Por 
                                    <?
                                    if (count($firma_cont) == 1) {
                                        $nombres = explode(' ', $firma_cont[0]['nombres_dir']);
                                        $apellidos = explode(' ', $firma_cont[0]['apellidos_dir']);
                                        echo $nombres[0] . ' ' . $apellidos[0];
                                    }if (count($firma_cont) == 2) {
                                        $nombres = explode(' ', $firma_cont[0]['nombres_dir']);
                                        $apellidos = explode(' ', $firma_cont[0]['apellidos_dir']);
                                        $nombres2 = explode(' ', $firma_cont[1]['nombres_dir']);
                                        $apellidos2 = explode(' ', $firma_cont[1]['apellidos_dir']);
                                        echo $nombres[0] . ' ' . $apellidos[0] . ' y ' . $nombres2[0] . ' ' . $apellidos2[0];
                                    }
                                    ?>
                                </b></p>
                        </td>
                        <td style="text-rotate:90; vertical-align: top;font-size: 9px; width: 25px; border-right: 1px solid black; ">
                            <p><b>C.I.N&deg;: 
                                    <?
                                    if (count($firma_cont) == 1) {
                                        echo $firma_cont[0]['nacionalidad_dir'] . '.- ' . number_format($firma_cont[0]['cedula_dir'], 0, ',', '.');
                                    }if (count($firma_cont) == 2) {
                                        echo strtoupper($firma_cont[0]['nacionalidad_dir']) . '.- ' . number_format($firma_cont[0]['cedula_dir'], 0, ',', '.') . ' y ' .
                                        strtoupper($firma_cont[1]['nacionalidad_dir']) . '.- ' . number_format($firma_cont[1]['cedula_dir'], 0, ',', '.');
                                        ;
                                    }
                                    ?>
                                </b></p>
                            <p><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha: <?= (int) $fecha[2] . '/' . $fecha[1] . '/' . $fecha[0] ?></b></p>
                        </td>
                        <td style="font-size: 12px; width: 730px; vertical-align: top; padding-top: 20px">
                            <div style="border: 1px solid black;">

                                <table>
                                    <tr>
                                        <td style="width: 30px;"></td>
                                        <td style="font-size: 11px; border: solid 0.5px black; padding: 1px" colspan="2">NUMERO</td>
                                        <td rowspan="2" style="width: 150px; text-align: center;">CARACAS</td>
                                        <td style="font-size: 11px; width: 30px; border: solid 0.5px black; text-align: center;">DIA</td>
                                        <td style="font-size: 11px; width: 30px; border: solid 0.5px black; text-align: center;">MES</td>
                                        <td style="font-size: 11px; width: 50px; border: solid 0.5px black; text-align: center;">A&Ntilde;O</td>
                                        <td style="width: 120px; vertical-align: bottom;">

                                            <? //debug($solicitud['fecha_vcto_solicitud_aprobado']) ?>
                                        </td>
                                        <td rowspan="2" style="font-size: 11px; border: solid 0.5px black;  width: 50px; text-align: center; font-size: 14px;"><b>US$</b></td>
                                        <td rowspan="2" style="font-size: 11px; border: solid 0.5px black;  width: 150px; text-align: center; font-size: 14px;"><b>
                                                <?= number_format(($solicitud['monto_solicitud_aprobado'] + ($solicitud['monto_solicitud_aprobado'] * 0.20)), 2, ',', '.'); ?>
                                            </b></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td style="border: solid 0.5px black; width: 10px; height: 25px;text-align: center;">1</td>
                                        <td style="border: solid 0.5px black; width: 15px; height: 25px;text-align: center;">1</td>
                                        <td style="border: solid 0.5px black; width: 30px; height: 25px;text-align: center;"><?= (int) $fecha[2] ?></td>
                                        <td style="border: solid 0.5px black; width: 30px; height: 25px;text-align: center;"><?= $fecha[1] ?></td>
                                        <td style="border: solid 0.5px black; width: 50px; height: 25px;text-align: center;"><?= $fecha[0] ?></td>
                                    </tr>
                                </table>

                                <table>
                                    <tr><td>&nbsp;</td></tr>
                                    <tr>
                                        <td style="width: 30px; text-align: center;"></td>
                                        <td style="font-size: 12px; text-align: center; width:620px;">
                                            EL <b><?= (int) $fecha_vcto[2] . '/' . $fecha_vcto[1] . '/' . $fecha_vcto[0]; ?></b> SE SERVIRA(N) UD.(S) MANDAR PAGAR POR ESTA UNICA DE CAMBIO
                                        </td>
                                    </tr>
                                </table>

                                <table>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>A LA ORDEN DE ASSETS FACTORING INC</b></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>

                                <table>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td style="font-size: 11px; vertical-align: top;">LA CANTIDAD DE:</td>
                                        <td style="border: solid 1px black; width: 620px; height: 45px;">
                                            <b>
                                                <?
                                                $V = new EnLetras();
                                                echo strtoupper($V->ValorEnLetras(($solicitud['monto_solicitud_aprobado'] + ($solicitud['monto_solicitud_aprobado'] * 0.20)), 'Dolares'));
                                                ?>
                                            </b>
                                        </td>
                                    </tr>
                                </table>

                                <table>
                                    <tr><td>&nbsp;</td><td></td><td>&nbsp;</td></tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td><b>VALOR ENTENDIDO</b></td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>

                                <table>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td style="font-size: 11px;">A:</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>

                                <table>
                                    <tr><td>&nbsp;</td><td><b><?= $solicitud['nom_rz_pj'] ?></b></td><td></td><td>&nbsp;</td></tr>
                                    <tr>
                                        <td style="width: 9px;"></td>
                                        <td style="font-size: 11px; width: 300px; text-align: justify;">DIRECCION:  
                                            <?= $solicitud['direccion_pj'] ?>
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </div>
                        </td>

                    </tr>
                </table>
                <div style="width: 300px; height: 100px; position: absolute; float: right; margin-top: -100px;text-align: center; font-size: 12px; margin-right: 20px;">
                    <p>&nbsp;</p>
                    <p>&nbsp;_____________________________________________________&nbsp;</p>
                    <p><b>Por ASSETS FACTORING INC.</b></p>
                </div>
            </div>
        </div>
    </body>
</html>