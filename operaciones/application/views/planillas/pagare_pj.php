<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="css/style_mandato.css" />
    </head>
    <body style="font-family: verdana;">
        <div class="cuerpo" style="text-align: justify; font-family: Arial; font-size: 11pt; line-height: 17px;">

            <p class="title" style="font-family: Arial; font-size: 11pt;">
                <b><b>PAGARE</b>
            </p>

            <br/>
            <p>
                <b>Numero:</b> <?= $planilla['n_operacion']; ?>
            </p>
            <p>
                <b>Lugar y Fecha de Emisi&oacute;n:</b> Panam&aacute;, <?
                if ($planilla['fecha_solicitud_aprobado'] == '1899-11-30 00:00:00' || $planilla['fecha_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha(@$planilla['fecha_solicitud_aprobado']);
                }
                ?>
            </p>
            <p>
                <b>Vencimiento:</b> <?
                if ($planilla['fecha_vcto_solicitud_aprobado'] == '1899-11-30 00:00:00' || $planilla['fecha_vcto_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha(@$planilla['fecha_vcto_solicitud_aprobado']);
                }
                ?>
            </p> 
            <p>
                <b>Valor:</b> USD. <? echo number_format($planilla['monto_solicitud_aprobado'], 2, ',', '.'); ?>
            </p>
            <br> 

            <p>
                Por  VALOR RECIBIDO. <b><?= strtoupper($data_empresa['nom_rz_pj']); ?></b>,
                <?
                if ($data_empresa['nacionalidad_emp'] == 'p') {
                    $V = new EnLetras();
                    echo ' sociedad an&oacute;nima organizada y existente de 
                conformidad con las leyes de la Rep&uacute;blica de Panam&aacute; e inscrita a la ficha ' . strtolower($V->ValorEnLetras($data_empresa['num_ficha_pj'], '')) .
                    ' (' . $data_empresa['num_ficha_pj'] .
                    '), documento ' . strtolower($V->ValorEnLetras($data_empresa['num_doc_pj'], '')) . ' (' . $data_empresa['num_doc_pj'] . '),'
                    . ' de la Secci&oacute;n de Micropel&iacute;culas (Mercantil) del Registro P&uacute;blico, '
                    . 'con domicilio en Ciudad de Panam&aacute;';
                } else {
                    echo 'inscrita ante el ' . $data_empresa['of_reg_pj'] . ', bajo el N&deg; ' .
                    $data_empresa['num_reg_pj'] . ', Tomo ' .
                    $data_empresa['tomo_reg_pj'] . ', en fecha ' .
                    fecha($data_empresa['fecha_reg_pj']) . ' en ' .
                    $data_empresa['ciudad_reg_pj'] . ' - ' .
                    $data_empresa['estado_reg_pj'] . ' - Venezuela, ';
                }
                ?>
                debidamente representada en este acto por 
                <b><?= strtoupper($data_empresa['nom_apell_repl']) ?></b>, 
                <?= $data_empresa['sexo_repl'] ?>, 
                <?
                if (strstr(strtolower($data_empresa['nacionalidad_repl']), 'paname') || strtoupper($data_empresa['nacionalidad_repl']) == 'PA') {
                    if ($data_empresa['sexo_repl'] == 'Varon') {
                        echo 'Paname&ntilde;o';
                    } else if ($data_empresa['sexo_repl'] == 'Mujer') {
                        echo 'Paname&ntilde;a';
                    }
                } else {
                    echo $data_empresa['nacionalidad_repl'];
                }
                ?>
                mayor de edad, con <?
                if (strstr(strtolower($data_empresa['nacionalidad_repl']), 'paname') || strtoupper($data_empresa['nacionalidad_repl']) == 'PA') {
                    echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                } else {
                    echo 'pasaporte n&uacute;mero ';
                }
                ?> 
                <?= $data_empresa['cedula_repl']; ?>, y debidamente autorizado para este acto,
                en adelante <b>LA PARTE DEUDORA</b>, y  
                <? // debug($avales[0]['cedula_na'], false); debug($data_empresa['cedula_repl'], false); debug($avales[0]['cedula_na'] != $data_empresa['cedula_repl'], false); ?>
                <? // debug($avales[1]['cedula_na'], false); debug($data_empresa['cedula_repl'], false); debug($avales[1]['cedula_na'] != $data_empresa['cedula_repl'], false); ?>
                <? // debug($avales[2]['cedula_na'], false); debug($data_empresa['cedula_repl'], false); debug($avales[2]['cedula_na'] != $data_empresa['cedula_repl']); ?>


                <? if ($avales[0]) { ?>
                    <? if ($avales[0]['cedula_na'] != $data_empresa['cedula_repl']) { ?>
                        <b><?= strtoupper($avales[0]['nom_raz_na']) ?></b>, 
                        <?= $avales[0]['genero_na'] ?>, 
                        <?
                        if (strstr(strtolower($avales[0]['nacionalidad_na']), 'paname') || strtoupper($avales[0]['nacionalidad_na']) == 'PA') {
                            if ($avales[0]['genero_na'] == 'Varon') {
                                echo 'Paname&ntilde;o';
                            } else if ($avales[0]['genero_na'] == 'Mujer') {
                                echo 'Paname&ntilde;a';
                            }
                        } else {
                            echo ucfirst($avales[0]['nacionalidad_na']);
                        }
                        ?>
                        mayor de edad, con <?
                        if (strstr(strtolower($avales[0]['nacionaldidad_na']), 'paname') || strtoupper($avales[0]['nacionalidad_na']) == 'PA') {
                            echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                        } else {
                            echo 'pasaporte n&uacute;mero ';
                        }
                        ?> 
                        <?= $avales[0]['cedula_na']; ?>
                    <? } else { ?>
                        <b><?= strtoupper($avales[0]['nom_raz_na']) ?></b>, de generales ya descritas actuando en su propio nombre y representaci&oacute;n,
                    <? } ?>
                <? } ?>



                <? if ($avales[1]) { ?>
                    <? if ($avales[1]['cedula_na'] != $data_empresa['cedula_repl']) { ?>
                        y <b><?= strtoupper($avales[1]['nom_raz_na']) ?></b>, 
                        <?= $avales[1]['genero_na'] ?>, 
                        <?
                        if (strstr(strtolower($avales[1]['nacionalidad_na']), 'paname') || strtoupper($avales[1]['nacionalidad_na']) == 'PA') {
                            if ($avales[1]['genero_na'] == 'Varon') {
                                echo 'Paname&ntilde;o';
                            } else if ($avales[1]['genero_na'] == 'Mujer') {
                                echo 'Paname&ntilde;a';
                            }
                        } else {
                            echo ucfirst($avales[1]['nacionalidad_na']);
                        }
                        ?>
                        mayor de edad, con <?
                        if (strstr(strtolower($avales[1]['nacionalidad_na']), 'paname') || strtoupper($avales[1]['nacionalidad_na']) == 'PA') {
                            echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                        } else {
                            echo 'pasaporte n&uacute;mero ';
                        }
                        ?> 
                        <?= $avales[1]['cedula_na'] . ', '; ?>
                    <? } else { ?>
                        y <b><?= strtoupper($avales[1]['nom_raz_na']) ?></b>, de generales ya descritas actuando en su propio nombre y representaci&oacute;n,
                    <? } ?>
                <? } ?> 

                <? if ($avales[2]) { ?>
                    <? if ($avales[2]['cedula_na'] != $data_empresa['cedula_repl']) { ?>
                        y <b><?= strtoupper($avales[2]['nom_raz_na']) ?></b>, 
                        <?= $avales[2]['genero_na'] ?>, 
                        <?
                        if (strstr(strtolower($avales[2]['nacionalidad_na']), 'paname') || strtoupper($avales[2]['nacionalidad_na']) == 'PA') {
                            if ($avales[2]['genero_na'] == 'Varon') {
                                echo 'Paname&ntilde;o';
                            } else if ($avales[2]['genero_na'] == 'Mujer') {
                                echo 'Paname&ntilde;a';
                            }
                        } else {
                            echo ucfirst($avales[2]['nacionalidad_na']);
                        }
                        ?>
                        mayor de edad, con <?
                        if (strstr(strtolower($avales[2]['nacionalidad_na']), 'paname') || strtoupper($avales[2]['nacionalidad_na']) == 'PA') {
                            echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                        } else {
                            echo 'pasaporte n&uacute;mero ';
                        }
                        ?> 
                        <?= $avales[2]['cedula_na'] . ', '; ?>
                    <? } else { ?>
                        y <b><?= strtoupper($avales[2]['nom_raz_na']) ?></b>, de generales ya descritas actuando en su propio nombre y representaci&oacute;n,
                    <? } ?>
                <? } ?> en adelante <?
                if ($avales[1]) {
                    echo '<b> LOS CODEUDORES SOLIDARIOS </b>';
                } else {
                    echo '<b>EL CODEUDOR SOLIDARIO</b>';
                }
                ?> se obligan 
                incondicionalmente a pagar a la orden de
                <b>ASSETS FACTORING INC.</b> sociedad an&oacute;nima organizada de
                conformidad con las leyes de la Rep&uacute;blica de Panam&aacute;, inscrita a la Ficha ochocientos treinta y dos mil seiscientos sesenta y 
                nueve (832669), Documento dos millones quinientos noventa y tres mil cuatrocientos cincuenta (2593450) de la Secci&oacute;n de Micropel&iacute;culas
                (Mercantil), del Registro P&uacute;blico, con domicilio en la Ciudad de Panam&aacute;, Rep&uacute;blica de Panam&aacute;,
                (en adelante <b>EL ACREEDOR</b>), la suma de  
                <b><?
                    $V = new EnLetras();
                    echo strtoupper($V->ValorEnLetras(($planilla['monto_solicitud_aprobado']), 'Dolares'));
                    ?>
                    (USD. <? echo number_format($planilla['monto_solicitud_aprobado'], 2, ',', '.'); ?>)</b> 
                moneda de curso legal de los Estados Unidos de Am&eacute;rica.
            </p>
            <br/>

            <p>
                En caso de ejecuci&oacute;n, se tendr&aacute; por correcta, l&iacute;quida y exigible la suma 
                que <b>EL ACREEDOR</b> se&ntilde;ale en la demanda que <b>LA PARTE DEUDORA Y <?
                    if ($avales[1]) {
                        echo 'LOS CODEUDORES SOLIDARIOS';
                    } else {
                        echo 'EL CODEUDOR SOLIDARIO';
                    }
                    ?></b>  le deben
                en concepto de capital e intereses y, a partir de la fecha de presentaci&oacute;n de la demanda,
                la tasa de inter&eacute;s ser&aacute; la permitida por la ley.
            </p>
            <br/>

            <p>
                El importe de este pagar&eacute; y sus intereses se pagar&aacute;n en d&oacute;lares,
                moneda de curso legal de los Estados Unidos de Am&eacute;rica, y no en otra moneda, 
                en fondos disponibles de inmediato, libres de cualquier tasa, impuesto, carga, gravamen
                o imposici&oacute;n fiscal. La deuda representada por este pagar&eacute; 
                podr&aacute; ser declarada exigible a su vencimiento y ser requerido 
                judicial o extrajudicialmente su pago total, incluyendo intereses, costas y gastos de cobranzas.
            </p>
            <br/>

            <p>
                El hecho de que el tenedor no exija el cumplimiento de cualquiera de las obligaciones
                aqu&iacute; estipuladas, no podr&aacute; interpretarse como una renuncia al derecho de exigirlas cuando a bien lo tenga.
            </p>
            <br/>

            <p>
                <b>LA PARTE DEUDORA Y <?
                    if ($avales[1]) {
                        echo 'LOS CODEUDORES SOLIDARIOS';
                    } else {
                        echo 'EL CODEUDOR SOLIDARIO';
                    }
                    ?></b> renuncian al fuero 
                de su domicilio, 
                a la presentaci&oacute;n de este documento, para la aceptaci&oacute;n o el pago,
                a todos los avisos y notificaciones que les pudiere corresponder en caso de
                desatenci&oacute;n, al protesto y a los tr&aacute;mites del juicio ejecutivo,
                relevando desde ahora y por este medio al tenedor de este documento, de la 
                obligaci&oacute;n de prestar fianza en caso de ejecuci&oacute;n o juicio por raz&oacute;n
                de este pagar&eacute;, aceptando <b>LA PARTE DEUDORA Y <?
                    if ($avales[1]) {
                        echo 'LOS CODEUDORES SOLIDARIOS';
                    } else {
                        echo 'EL CODEUDOR SOLIDARIO';
                    }
                    ?></b> que
                correr&aacute;n por su cuenta todos los gastos judiciales y extrajudiciales
                que motive el cobro de esta obligaci&oacute;n, incluyendo honorarios de abogado.
            </p>
            <br/>

            <p>
                <b>EL ACREEDOR</b> queda autorizado por este medio y en cualquier tiempo, ya sea antes
                o despu&eacute;s del vencimiento de este pagar&eacute; sin necesidad de darle aviso a 
                los obligados principales, a deducir cualquier suma que tengan en dep&oacute;sito o al 
                cr&eacute;dito, ya sea a t&iacute;tulo individual o conjunto, y aplicar la misma al pago 
                de las sumas adeudadas.
            </p>
            <br/>

            <p>
                <b>LA PARTE DEUDORA Y <?
                    if ($avales[1]) {
                        echo 'LOS CODEUDORES SOLIDARIOS';
                    } else {
                        echo 'EL CODEUDOR SOLIDARIO';
                    }
                    ?></b> se someten irrevocablemente a la 
                jurisdicci&oacute;n de cualquier tribunal de la Ciudad de Panam&aacute;, 
                Rep&uacute;blica de Panam&aacute;, seg&uacute;n <b>EL ACREEDOR</b> o el tenedor de este 
                Pagar&eacute; elija, en cualquier acci&oacute;n o procedimiento derivado de o relativo
                al presente Pagar&eacute;, e irrevocablemente convienen en que todas las reclamaciones 
                en relaci&oacute;n con dichas acciones o procedimientos podr&aacute;n ser o&iacute;das 
                y resueltas en cualquiera de dichos tribunales.
            </p>
            <br/>

            <p>
                Este pagar&eacute; queda sujeto a las leyes de la Rep&uacute;blica de Panam&aacute; y 
                se interpretar&aacute; de acuerdo con las leyes de dicho pa&iacute;s.
            </p>
            <br/>
            <p>Panam&aacute;, <?
                if ($planilla['fecha_solicitud_aprobado'] == '1899-11-30 00:00:00' || $planilla['fecha_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha(@$planilla['fecha_solicitud_aprobado']);
                }
                ?></p>
            <br/><br/><br/><br/>

            <table style="width: 100%;">
                <tr>
                    <td  style="text-align: center"><b>Por: LA SOCIEDAD DEUDORA</b></td>
                    <td  style="text-align: center"><b>Por: <?
                            if ($avales[1]) {
                                echo 'LOS CODEUDORES SOLIDARIOS';
                            } else {
                                echo 'EL CODEUDOR SOLIDARIO';
                            }
                            ?></b></td>
                </tr>
                <tr>
                    <td style=""><b></b></td>
                    <td style=""><b></b></td>
                </tr>
                <tr>
                    <td style=""><b>&nbsp;</b></td>
                    <td style=""><b>&nbsp;</b></td>
                </tr>
                <tr>
                    <td style=""><b>&nbsp;</b></td>
                    <td style=""><b>&nbsp;</b></td>
                </tr>
                <tr>
                    <td style=""><b>&nbsp;</b></td>
                    <td style=""><b>&nbsp;</b></td>
                </tr>
                <tr>
                    <td style="text-align: center"><b><?= strtoupper($data_empresa['nom_apell_repl']) ?></b></td>
                    <td style="text-align: center"><b><?= strtoupper($avales[0]['nom_raz_na']) ?></b></td>
                </tr>
                <tr>
                    <td style="text-align: center"><b><?
                            if (strstr(strtolower($data_empresa['nacionalidad_repl']), 'paname') || strtoupper($data_empresa['nacionalidad_repl']) == 'PA') {
                                echo 'CED.- ';
                            } else {
                                echo 'PASS.- ';
                            }
                            ?> 
                            <?= $data_empresa['cedula_repl']; ?></b></td>
                    <td style="text-align: center"><b><?
                            if (strstr(strtolower($avales[0]['nacionalidad_na']), 'paname') || strtoupper($avales[0]['nacionalidad_na']) == 'PA') {
                                echo 'CED.- ';
                            } else {
                                echo 'PASS.- ';
                            }
                            ?> 
                            <?= $avales[0]['cedula_na']; ?></b></td>
                </tr>

                <? if ($avales[1]) { ?>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                    </tr>

                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b><?= strtoupper($avales[1]['nom_raz_na']) ?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b><?
                                if (strstr(strtolower($avales[1]['nacionalidad_na']), 'paname') || strtoupper($avales[0]['nacionalidad_na']) == 'PA') {
                                    echo 'CED.- ';
                                } else {
                                    echo 'PASS.- ';
                                }
                                ?> 
                                <?= $avales[1]['cedula_na']; ?></b></td>
                    </tr>
                <? } ?>

                <? if ($avales[2]) { ?>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                    </tr>

                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b><?= strtoupper($avales[2]['nom_raz_na']) ?></b></td>
                    </tr>
                    <tr>
                        <td style="text-align: center"><b>&nbsp;</b></td>
                        <td style="text-align: center"><b><?
                                if (strstr(strtolower($avales[2]['nacionalidad_na']), 'paname') || strtoupper($avales[2]['nacionalidad_na']) == 'PA') {
                                    echo 'CED.- ';
                                } else {
                                    echo 'PASS.- ';
                                }
                                ?> 
                                <?= $avales[2]['cedula_na']; ?></b></td>
                    </tr>
                <? } ?>

            </table>
        </div>
    </body>
</html>            
