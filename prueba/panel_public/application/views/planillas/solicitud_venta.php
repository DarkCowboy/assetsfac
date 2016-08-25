<? // ini_set('memory_limit', '12M');                 ?>
<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
        <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
        <script type='text/javascript' src='js/plugins/jquery.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery/jquery.mousewheel.min.js'></script>
    </head>
    <body>
        <div class="cuerpo">
            <div class="logo"><img src="images/general/logo.png"/></div>
            <div class="titulo">SOLICITUD DE VENTA</div>
            <div class="contenido">
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DEL SOLICITANTE</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">RUC/RIF</td>
                        <td class="sub_titulo_tabla">REPRESENTANTE LEGAL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['nom_rz_pj']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['rif_pj']; ?></td>
                        <td class="contenido_td"><?= $rep_legal['nom_apell_repl']; ?></td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">
                            DATOS REPRESENTANTE LEGAL
                        </td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE</td>
                        <td class="sub_titulo_tabla">NACIONALIDAD</td>
                        <td class="sub_titulo_tabla">N&deg; ID</td>
                        <td class="sub_titulo_tabla">CARGO</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$rep_legal['nom_apell_repl']; ?></td>
                        <td class="contenido_td">
                            <?
                            if (strstr(strtolower(@$rep_legal['nacionalidad_repl']), 'paname') || @$rep_legal['nacionalidad_repl'] == 'PA') {
                                if (@$rep_legal['sexo_repl'] == 'Varon') {
                                    echo 'Paname&ntilde;o';
                                } else if (@$rep_legal['sexo_repl'] == 'Mujer') {
                                    echo 'Paname&ntilde;a';
                                }
                            } else {
                                echo @$rep_legal['nacionalidad_repl'];
                            }
                            ?>
                        </td>
                        <td class="contenido_td">
                            <?
                            if (strstr(strtolower(@$rep_legal['nacionalidad_repl']), 'paname') || @$rep_legal['nacionalidad_repl'] == 'PA') {
                                echo 'CED.-' . @$rep_legal['cedula_repl'];
                            } else {
                                echo 'PASS.-' . @$rep_legal['cedula_repl'];
                            }
                            ?>
                        </td>
                        <td class="contenido_td"><?php echo @$rep_legal['cargo_repl']; ?></td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DE LA SOLICITUD</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">FECHA DE LA SOLICITUD</td>
                        <td class="sub_titulo_tabla">MONTO</td>
                        <td class="sub_titulo_tabla">DESTINO DE LA SOLICITUD</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo fecha($planilla['fecha_solicitud']); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['monto_solicitud'], '2', '.', ',') . ' ' . $moneda['value']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['destino_solicitud']; ?>wdfsdf</td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="7" >RELACI&Oacute;N DE FACTURAS</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">Nro.</td>
                        <td class="sub_titulo_tabla">Factura</td>
                        <td class="sub_titulo_tabla" style="width: 190px;">Deudor</td>
                        <td class="sub_titulo_tabla" style="width: 80px;">RUC/RIF</td>
                        <td class="sub_titulo_tabla" style="width: 80px;">Emision</td>
                        <td class="sub_titulo_tabla" style="width: 70px;">Vencimiento</td>
                        <td class="sub_titulo_tabla" style="width: 50px;">Monto</td>
<!--                        <td class="sub_titulo_tabla" style="width: 40px;">ITBMS</td>
                        <td class="sub_titulo_tabla" style="width: 50px;">CON ITBMS</td>-->
                    </tr>
                    <?
                    $tot_val_nom = 0;
                    $tot_val_con_iva = 0;
                    ?>
                    <?
                    $i = 1;
                    foreach ($facturas as $row) {
                        ?>
                        <?
                        $tot_val_nom = $tot_val_nom + $row['valor_nominal'];
                        $tot_val_con_iva = $tot_val_con_iva + $row['valor_con_iva'];
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo @$i; ?></td>
                            <td class="contenido_td"><?php echo @$row['numero_factura']; ?></td>
                            <td class="contenido_td"><?php echo @$row['deudor']; ?></td>
                            <td class="contenido_td"><?php echo @$row['rif']; ?></td>
                            <td class="contenido_td"><?php echo @$row['fecha_emision']; ?></td>
                            <td class="contenido_td"><?php echo @$row['fecha_vencimiento']; ?></td>
                            <td class="contenido_numero"><?php echo number_format(@$row['valor_nominal'], 2, ',', '.'); ?></td>
<!--                            <td class="contenido_numero"><?php echo number_format(@$row['iva'], 2, ',', '.'); ?>%</td>
                            <td class="contenido_numero"><?php echo number_format(@$row['valor_con_iva'], 2, ',', '.'); ?></td>-->
                        </tr>
                        <?
                        $i = $i + 1;
                    }
                    ?>
                    <tr>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><b><?php echo number_format(@$tot_val_nom, 2, ',', '.'); ?></b></td>
<!--                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><b><?php echo number_format(@$tot_val_con_iva, 2, ',', '.'); ?></b></td>-->
                    </tr>
                </table>
                <table class="tabla" style="border: none;">
                    <tr>
                        <td class="titulo_tabla">CONDICIONES</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" style="font-size: 12px;">
                            <br>1.	La solo recepci&oacute;n de la presente Solicitud y sus respectivos anexos no constituye de manera alguna la aceptaci&oacute;n de la oferta por parte de ASSETS FACTORING INC.,  Los documentos adjuntos son recibidos sujetos a su verificaci&oacute;n, analisis, evaluaci&oacute;n y aprobaci&oacute;n por parte de ASSETS FACTORING INC.<br>
                            <br>2.	Bajo Fe de Juramento nosotros declaramos que las Facturas identificadas en el cuadro son veridicas, legitimas, validas, exigibles y liquidas a su vencimiento, no sujetas a compensaci&oacute;n, oposici&oacute;n, excepciones, gravamenes, condici&oacute;n o retenci&oacute;n (con expresa excepci&oacute;n de las retenciones de los impuestos que fueren aplicables) y han sido debidamente aceptadas por sus respectivos Deudores.<br>
                            <br>3.	Asimismo, Nosotros declaramos que los originales y sus respectivos anexos, en los casos en que corresponda, han sido anexados a la presente solicitud.<br>
                            <br>4.	ASSETS FACTORING INC., se reserva el derecho de devolver sin responsabilidad para el, cuando del resultado de la verificaci&oacute;n se determine que las Facturas no reunen los requisitos establecidos por la Ley, o que las mismas no son del interes de ASSETS FACTORING INC.<br>
                            <br>5.	De ser aceptada la presente solicitud, Nosotros Vendemos, cedemos y traspasamos a ASSETS FACTORING INC. todos los derechos que se derivan de dichas Facturas, a los fines de que ASSETS FACTORING INC. reciba el pago de la misma por parte del Deudor.<br>
                        </td>
                    </tr>
                </table>
                <table class="tabla" style="border: none;">
                    <tr>
                        <td class="titulo_tabla">FIRMAS DE ACEPTACION DE TERMINOS</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" style="font-size: 12px;" >
                            <br>                        
                            Y yo <b><?= strtoupper($rep_legal['nom_apell_repl']) ?></b>, 
                            <?= strtolower($rep_legal['sexo_repl']); ?>, 
                            <?
                            if (strstr(strtolower($rep_legal['nacionalidad_repl']), 'paname') || @$rep_legal['nacionalidad_repl'] == 'PA') {
                                if ($rep_legal['sexo_repl'] == 'Varon') {
                                    echo 'Paname&ntilde;o';
                                } else if ($rep_legal['sexo_repl'] == 'Mujer') {
                                    echo 'Paname&ntilde;a';
                                }
                            } else {
                                echo ucfirst(strtolower($rep_legal['nacionalidad_repl']));
                            }
                            ?>
                            mayor de edad, con <?
                            if (strstr(strtolower($rep_legal['nacionalidad_repl']), 'paname') || @$rep_legal['nacionalidad_repl'] == 'PA') {
                                echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                            } else {
                                echo 'pasaporte n&uacute;mero ';
                            }
                            ?> 
                            <?= $rep_legal['cedula_repl']; ?>, 
                            actuando en nombre y representaci&oacute;n de <b><?php echo strtoupper($planilla['nom_rz_pj']); ?></b> 
                            en mi car&aacute;cter de <?php echo @$rep_legal['cargo_repl']; ?> , 
                            debidamente autorizado por los estatutos sociales de la empresa <?php echo strtoupper($planilla['nom_rz_pj']); ?>, 
                            de conformidad con lo previsto en el Contrato Marco suscrito entre mi representada y <b>ASSETS FACTORING INC.</b>, 
                            debidamente autenticado en fecha <?= fecha($cupo_activo['fecha_solicitud_aprobado']) ?>,
                            certifico la Solicitud de Venta y su condiciones arriba mencionadas. 
                        </td>



                    </tr>
                    <tr>
                        <td class="contenido_td">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="contenido_td">&nbsp;</td>
                    </tr>
                    <tr >
                        <td class="contenido_td" style="font-size: 12px;">Atentamente,</td>
                    </tr>
                    <tr>
                        <td class="contenido_td">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="contenido_td">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="contenido_td" style="font-size: 12px;">FIRMA DE (LOS) REPRESENTANTE(S) LEGAL(ES) Y SELLO DE LA EMPRESA <br> <br> </td>
                    </tr>
                    <tr>
                        <td class="contenido_td">&nbsp;</td>
                    </tr>
                    <tr>
                        <td class="contenido_td">&nbsp;</td>
                    </tr>
                </table>
            </div>
        </div>
        <? if (isset($rollover)) { ?>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <div class="cuerpo">
                <div class="logo"><img src="images/general/logo.png"/></div>
                <div class="titulo">TOTAL A DEPOSITAR PARA <br/>EL REFINANCIAMIENTO DE LA OPERACION <?= $rollover['n_operacion']; ?></div>
                <br/><br/>
                <div class="contenido_justificado"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Uds. ha seleccionado la Operacion N&deg; <?= $rollover['n_operacion']; ?> para refinanciarla con la solicitud de venta actual, 
                    a continuacion le presentamos el total a pagar:
                </div>
                <br/><br/>
                <div class="contenido" >
                    <?
                    $dif_fac_consignadas = $rollover['monto_solicitud'] - $planilla['monto_solicitud'];
                    $pagado = $rollover['monto_solicitud'] * $rollover['porcentaje_compra'] / 100;
                    $dif = $rollover['monto_solicitud'] - $pagado;
                    ?>
                    <div style="margin: 0 auto; width: 500px; border: solid 1px black;">
                        <table class="tabla" style="width: 100%;" >
                            <tr>
                                <td class="titulo_tabla" colspan="2">DATOS DE LA OPERACION <?= $rollover['n_operacion']; ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">MONTO SOLICITADO</td>
                                <td class="contenido_numero"><?= number_format($rollover['monto_solicitud'], '2', ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">MONTO PAGADO</td>
                                <td class="contenido_numero"><?= number_format($pagado['monto_solicitud_aprobado'], '2', ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">PRECIO DE COMPRA</td>
                                <td class="contenido_numero"><?= number_format($rollover['porcentaje_compra'], '2', ',', '.'); ?> %</td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">FECHA DE APROBACION</td>
                                <td class="contenido_td"><?= fecha($rollover['fecha_solicitud_aprobado']); ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">FECHA DE VENCIMIENTO</td>
                                <td class="contenido_td"><?= fecha($rollover['fecha_vcto_solicitud_aprobado']); ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">MORA / DIAS</td>
                                <td class="contenido_numero"><?= $rollover['mora_dias']; ?> Dia(s)</td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;"><b>MORA / <?= $moneda['value']; ?></b></td>
                                <td class="contenido_numero"><b><?= number_format($rollover['mora_monto'], '2', ',', '.'); ?></b></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;"><b>DIFERENCIAL ACTUAL</b></td>
                                <td class="contenido_numero"><b><?= number_format($dif, '2', ',', '.'); ?></b></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;"><b>DIFERENCIAL FACTURAS CONSIGNADAS</b></td>
                                <td class="contenido_numero"><b><?= number_format($dif_fac_consignadas, '2', ',', '.'); ?></b></td>
                            </tr>
                            <? $tot = $rollover['mora_monto'] + $dif + $dif_fac_consignadas; ?>
                            <tr>
                                <td class="contenido_numero"><b>TOTAL A DEPOSITAR</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?= number_format($tot, '2', ',', '.'); ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br/><br/>
                <div class="contenido_justificado"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Le recordamos que al momento de la emision de 
                    la presente solicitud debe traer anexo el vaucher o recibo de la transferencia o deposito del monto dicho previamente y la(s) copia(s) de facturas vendidas 
                    en la presente solicitud en fisico.
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <div class="contenido_td"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Attm: ASSETS FACTORING INC.
                </div>
            </div>
        <? } ?>
    </body>
</html>