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
            <div class="titulo">SOLICITUD DE PRESTAMO</div>
            <div class="contenido">

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="2">DATOS DE LA EMPRESA</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">N&deg; DE RIF</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$planilla['nom_rz_pj']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['rif_pj']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DE CONTACTO</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">DIRECCION</td>
                        <td class="sub_titulo_tabla">TELEFONO</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$planilla['direccion_pj']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['telefono_pj']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['email_pj']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla">DATOS DE REGISTRO</td>
                    </tr>
                    <tr>
                        <td class="contenido_td">
                            <?php
                            echo @$planilla['of_reg_pj'] . ', bajo el N&deg; ' .
                            @$planilla['num_reg_pj'] . ', Tomo ' .
                            @$planilla['tomo_reg_pj'] . ', en fecha ' .
                            fecha(@$planilla['fecha_reg_pj']) . ' en ' .
                            @$planilla['ciudad_reg_pj'] . ' - ' .
                            @$planilla['estado_reg_pj'];
                            ?></td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="5">NOMINA DE ACCIONISTA</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">N&deg; de RIF / CI</td>
                        <td class="sub_titulo_tabla">CAPITAL SUSCRITO</td>
                        <td class="sub_titulo_tabla">%</td>
                        <td class="sub_titulo_tabla">CAPITAL PAGADO</td>
                    </tr>
                    <?
                    $i = 0;
                    $porcent = 0;
                    $tot_cap_sus = 0;
                    $tot_cap_pag = 0;
                    foreach (@$planilla['nomina_accionista'] as $row) {
                        $tot_cap_sus = $tot_cap_sus + $row['cap_sus_na'];
                        $tot_cap_pag = $tot_cap_pag + $row['cap_pag_na'];
                    }
                    foreach (@$planilla['nomina_accionista'] as $row) {
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo $row['nom_raz_na'] ?></td>
                            <td class="contenido_td">
                                <?php
                                if (strstr(strtolower($row['nacionalidad_na']), 'paname') || $row['nacionalidad_na'] == 'PA') {
                                    echo 'CED.-';
                                } else {
                                    echo 'PASS.-';
                                }
                                echo $row['cedula_na']
                                ?>
                            </td>
                            <td class="contenido_numero cap_sus"><?php echo number_format($row['cap_sus_na'], 2, ',', '.') ?></td>
                            <td class="contenido_numero"><?= number_format((($row['cap_pag_na'] * 100) / $tot_cap_pag), 1, ',', '.'); ?> %</td>
                            <td class="contenido_numero"><?php echo number_format($row['cap_pag_na'], 2, ',', '.') ?></td>
                        </tr>
                        <?
                        $i++;
                        if ($i == 4) {
                            break;
                        }
                        ?>
                    <? } ?>
                    <tr class="resultados">
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><?php echo number_format($tot_cap_sus, 2, ',', '.') ?></td>
                        <td class="contenido_numero">100%</td>
                        <td class="contenido_numero"><?php echo number_format($tot_cap_pag, 2, ',', '.') ?></td>
                    </tr>
                </table>

                <script>
                    $(window).load(function(){
                        var totalcapsus = 0;
                        $('.cap_sus').each(function(){
                            totalcapsus = parseFloat(totalcapsus) + parseFloat($(this).html());
                        });
                        $('.totpasus').html(parseFloat(totalcapsus));
                    });    
                </script>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">JUNTA DIRECTIVA</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">CEDULA</td>
                        <td class="sub_titulo_tabla">TIPO DE FIRMA</td>
                        <td class="sub_titulo_tabla">CARGO</td>
                    </tr>
                    <?
                    $i = 0;
                    foreach (@$planilla['junta_directiva'] as $row) {
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo $row['nombres_dir'] .' '. $row['apellidos_dir']; ?></td>
                            <td class="contenido_td">
                            <?php
                                if (strstr(strtolower($row['nacionalidad_dir']), 'paname') || $row['nacionalidad_dir'] == 'PA') {
                                    echo 'CED.-';
                                } else {
                                    echo 'PASS.-';
                                }
                                echo $row['cedula_dir']
                                ?>
                            </td>
                            <td class="contenido_td"><?php echo $row['tipo_firma_dir']; ?></td>
                            <td class="contenido_td"><?php echo $row['cargo_dir']; ?></td>
                        </tr>
                        <?
                        $i++;
                        if ($i == 4) {
                            break;
                        }
                        ?>
                    <? } ?>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">REFERENCIAS BANCARIAS</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">BANCO</td>
                        <td class="sub_titulo_tabla">N&deg; DE CUENTA</td>
                        <td class="sub_titulo_tabla">TIPO DE CUENTA</td>
                    </tr>
                    <? for ($i = 0; $i <= 2; $i++) { ?>
                        <tr>
                            <td class="contenido_td"><?php echo @$planilla['banco_ref_pj'][$i]; ?></td>
                            <td class="contenido_td"><?php echo @$planilla['n_cuenta_ref_pj'][$i]; ?></td>
                            <td class="contenido_td"><?php echo @$planilla['cuenta_ref_pj'][$i]; ?></td>
                        </tr>
                    <? } ?>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">PRINCIPALES CLIENTES</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">N&deg; DE RIF</td>
                        <td class="sub_titulo_tabla">PERSONA DE CONTACTO</td>
                        <td class="sub_titulo_tabla">TELEFONO / EMAIL</td>
                    </tr>
                    <? for ($i = 0; $i <= 2; $i++) { ?>
                        <tr>
                            <td class="contenido_td"><?php echo @$planilla['nombre_rz_pc'][$i]; ?></td>
                            <td class="contenido_td"><?php echo @$planilla['num_rif_pc'][$i]; ?></td>
                            <td class="contenido_td"><?php echo @$planilla['persona_contacto_pc'][$i]; ?></td>
                            <td class="contenido_td"><?php echo @$planilla['tel_email_pc'][$i]; ?></td>
                        </tr>
                    <? } ?>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DE LA SOLICITUD</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">MONTO SOLICITADO</td>
                        <td class="sub_titulo_tabla">PLAZO</td>
                        <td class="sub_titulo_tabla">DESCRIPCION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo number_format(@$planilla['monto_solicitud'], '2', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo number_format(@$planilla['plazo_solicitud'], '0', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo @$planilla['destino_solicitud']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" style="width: 20%;">LUGAR</td>
                        <td class="titulo_tabla" style="width: 20%;">FECHA</td>
                        <td class="titulo_tabla" style="width: 60%;">FIRMA DEL (LOS) SOLICITANTE(S)</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 45px;"></td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 45px;"></td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 45px;"></td>
                    </tr>
                </table>

            </div>
        </div>
        
         <? if (isset($rollover)) { ?>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <div class="cuerpo">
                <div class="logo"><img src="images/general/logo.png"/></div>
                <div class="titulo">TOTAL DEPOSITADO PARA <br/>EL REFINANCIAMIENTO DE LA OPERACION <?= $rollover['n_operacion']; ?></div>
                <br/><br/>
                <div class="contenido_justificado"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Uds. ha seleccionado la Operacion N&deg; <?= $rollover['n_operacion']; ?> para refinanciarla con la solicitud de Pagare actual, 
                    a continuacion le presentamos los datos de pago:
                </div>
                <br/><br/>
                <div class="contenido" >
                    <?
                    $dif_fac_consignadas = $rollover['monto_solicitud_aprobado'] - @$planilla['monto_solicitud'];
                    $pagado = $rollover['monto_solicitud_aprobado'] * $rollover['porcentaje_compra'] / 100;
                    $dif = $rollover['monto_solicitud_aprobado'] - $pagado;
                    ?>
                    <div style="margin: 0 auto; width: 500px; border: solid 1px black;">
                        <table class="tabla" style="width: 100%;" >
                            <tr>
                                <td class="titulo_tabla" colspan="2">DATOS DE LA OPERACION <?= $rollover['n_operacion']; ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">MONTO SOLICITADO</td>
                                <td class="contenido_numero"><?= number_format($rollover['monto_solicitud_aprobado'], '2', ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;">MONTO PAGADO</td>
                                <td class="contenido_numero"><?= number_format($pagado, '2', ',', '.'); ?></td>
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
                                <td class="sub_titulo_tabla" style="text-align: left;"><b>DIFERENCIAL ABONO CONSIGNADO</b></td>
                                <td class="contenido_numero"><b><?= number_format($dif_fac_consignadas, '2', ',', '.'); ?></b></td>
                            </tr>
                            <? $tot = $rollover['mora_monto'] + $dif + $dif_fac_consignadas; ?>
                            <tr>
                                <td class="contenido_numero"><b>TOTAL DEPOSITADO</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?= number_format(@$planilla['monto_depositado'], '2', ',', '.'); ?></b></td>
                            </tr>
                            <tr>
                                <td class="contenido_numero"><b>REFERENCIA BANCARIA</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?php echo @$planilla['ref_bancaria']; ?></b></td>
                            </tr>
                            <tr>
                                <td class="contenido_numero"><b>BANCO</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?php echo @$planilla['banco']; ?></b></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br/><br/>
                <div class="contenido_justificado"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Le recordamos que al momento de la emision de 
                    la presente solicitud debe traer anexo el vaucher o recibo de la transferencia o deposito 
                    del monto dicho previamente.
                </div>
                <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                <div class="contenido_td"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Attm: ASSETS FACTORING INC.
                </div>
            </div>
        <? } ?>
    </body>
</html>