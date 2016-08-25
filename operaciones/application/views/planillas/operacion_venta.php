<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_cupo.css" />
        <script type='text/javascript' src='js/plugins/jquery.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/Jquery/jquery.mousewheel-3.0.6.pack.js'></script>
    </head>
    <body>
        <div class="contenido">
            <div class="header_solicitud">
                <div>
                    <div class="logo"><img src="images/general/logo.png"/></div>
                    <div class="titulo">PROPUESTA DE OPERACION DE VENTA</div>
                </div>
                <div>
                    <table class="tabla" style="border: none;">
                        <tr>
                            <td class="sub_titulo_tabla" style="background: none; text-align: center;">CODIGO</td>
                            <td class="sub_titulo_tabla" style="background: none; text-align: center;">N&deg; DE CUENTA A ABONAR</td>
                            <td class="sub_titulo_tabla" style="background: none; text-align: center;">FECHA SOLICITUD</td>
                            <td class="sub_titulo_tabla" style="background: none; text-align: center;">FECHA ELABORACION</td>
                            <td class="sub_titulo_tabla" style="background: none; text-align: center;">N&deg; DE SOLICITUD</td>
                        </tr>
                        <tr>
                            <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo @$planilla['codigo_solicitud']; ?></td>
                            <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo @$planilla['n_cuenta_ref_pj'][0]; ?></td>
                            <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo fecha(@$planilla['fecha_solicitud']); ?></td>
                            <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo fecha(@$planilla['fecha_elab_prop']); ?></td>
                            <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo @$planilla['n_operacion']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
            <table class="tabla">
                <tr>
                    <td class="titulo_tabla" colspan="3">DATOS DE LA SOLICITUD DE VENTA</td>
                </tr>
                <tr>
                    <td class="sub_titulo_tabla">MONTO SOLICITADO</td>
                    <td class="sub_titulo_tabla">FECHA DE LA SOLICITUD</td>
                    <td class="sub_titulo_tabla">DESCRIPCION</td>
                </tr>
                <tr>
                    <td class="contenido_td"><?php echo number_format(@$planilla['monto_solicitud'], 2, ',', '.'); ?></td>
                    <td class="contenido_td"><?php echo fecha($planilla['fecha_solicitud']); ?></td>
                    <td class="contenido_td"><?php echo @$planilla['destino_solicitud']; ?></td>
                </tr>
            </table>
            <table class="tabla">
                <tr>
                    <td class="titulo_tabla" colspan="3">DATOS DEL SOLICITANTE</td>
                </tr>
                <tr>
                    <td class="sub_titulo_tabla" colspan="2">NOMBRE O RAZON SOCIAL</td>
                    <td class="sub_titulo_tabla">N&deg; DE RUC / RIF</td>
                </tr>
                <tr>
                    <td class="contenido_td" colspan="2"><?php echo @$planilla['nom_rz_pj']; ?></td>
                    <td class="contenido_td"><?php echo @$planilla['rif_pj']; ?></td>
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
                <tr>
                    <td class="sub_titulo_tabla" colspan="3">DATOS DE REGISTRO</td>
                </tr>
                <tr>
                    <td class="contenido_td" colspan="3">
                        <?php
                        if ($planilla['nacionalidad_emp'] == 'p') {
                            $V = new EnLetras();
                            echo 'Ficha ' . strtolower($V->ValorEnLetras($planilla['num_ficha_pj'], '')) . ' (' . $planilla['num_ficha_pj'] . '), Documento ' . strtolower($V->ValorEnLetras($planilla['num_doc_pj'], '')) . ' (' . $planilla['num_doc_pj'] . ') de la Seccion de Micropeliculas (Mercantil), del Registro Publico, en fecha ' . fecha($planilla['fecha_reg_pj']);
                        } else {
                            echo @$planilla['of_reg_pj'] . ', bajo el N&deg; ' .
                            @$planilla['num_reg_pj'] . ', Tomo ' .
                            @$planilla['tomo_reg_pj'] . ', en fecha ' .
                            fecha(@$planilla['fecha_reg_pj']) . ' en ' .
                            @$planilla['ciudad_reg_pj'] . ' - ' .
                            @$planilla['estado_reg_pj'];
                        }
                        ?>
                    </td>
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
                    <td class="titulo_tabla" colspan="5">NOMINA DE ACCIONISTA</td>
                </tr>
                <tr>
                    <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS O RAZON SOCIAL</td>
                    <td class="sub_titulo_tabla">RIF / CI</td>
                    <td class="sub_titulo_tabla">CAPITAL SUSCRITO</td>
                    <td class="sub_titulo_tabla" style="text-align: center;">%</td>
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
                        <td class="contenido_td"><?
                            if (strstr(strtolower($row['nacionalidad_na']), 'paname') || $row['nacionalidad_na'] == 'PA') {
                                echo 'CED.-';
                            } else {
                                echo 'PASS.-';
                            }
                            echo $row['cedula_na'];
                            ?></td></td>
                        <td class="contenido_numero cap_sus"><?php echo number_format($row['cap_sus_na'], 2, ',', '.') ?></td>
                        <td class="contenido_numero"><?= number_format((($row['cap_pag_na'] * 100) / $tot_cap_pag), 2, ',', '.'); ?> %</td>
                        <td class="contenido_numero"><?php echo number_format($row['cap_pag_na'], 2, ',', '.') ?></td>
                    </tr>
                    <?
                    $i++;
                    if ($i == 4) {
                        break;
                    }
                    ?>
                <? } if ($i < 4) { ?>
                    <? $x = 4 - $i; ?>
                    <? for ($i = 0; $i <= $x; $i++) { ?>
                        <tr>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                        </tr>
                        <?
                    }
                }
                ?>
                <tr class="resultados">
                    <td class="contenido_td" ></td>
                    <td class="contenido_td" style="text-align: right;">Totales</td>
                    <td class="contenido_numero"><?php echo number_format($tot_cap_sus, 2, ',', '.') ?></td>
                    <td class="contenido_numero">100%</td>
                    <td class="contenido_numero"><?php echo number_format($tot_cap_pag, 2, ',', '.') ?></td>
                </tr>
            </table>
            <script>
                $(window).load(function() {
                    var totalcapsus = 0;
                    $('.cap_sus').each(function() {
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
                        <td class="contenido_td"><?php echo $row['nombres_dir'] . ' ' . $row['apellidos_dir']; ?></td>
                        <td class="contenido_td">
                            <?
                            if (strstr(strtolower($row['nacionalidad_dir']), 'paname') || $row['nacionalidad_dir'] == 'PA') {
                                echo 'CED.-';
                            } else {
                                echo 'PASS.-';
                            }
                            echo $row['cedula_dir'];
                            ?></td>
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
                <? } if ($i < 4) { ?>
                    <? $x = 4 - $i; ?>
                    <? for ($i = 0; $i <= $x; $i++) { ?>
                        <tr>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                            <td class="contenido_td">--</td>
                        </tr>
                        <?
                    }
                }
                ?>
            </table>

            <table class="tabla">
                <tr>
                    <td class="titulo_tabla" colspan="4">PRINCIPALES CLIENTES</td>
                </tr>
                <tr>
                    <td class="sub_titulo_tabla">NOMBRE O RAZON SOCIAL</td>
                    <td class="sub_titulo_tabla">RIF</td>
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
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
            <table class="tabla">
                <tr>
                    <td class="titulo_tabla" colspan="7">RESUMEN ECONOMICO FINANCIERO</td>
                </tr>
                <tr>
                    <td class="sub_titulo_tabla" style="border:1px solid #c9c9c9; width: 25%;">CONCEPTO / FECHA</td>
                    <td class="sub_titulo_tabla" style="border:1px solid #c9c9c9; text-align: right;"><?= @$reclasificacion['fecha1']; ?></td>
                    <td class="sub_titulo_tabla" style="border:1px solid #c9c9c9; text-align: right; "><?= @$reclasificacion['fecha2']; ?></td>
                    <td class="sub_titulo_tabla" style="border:1px solid #c9c9c9; text-align: right; "><?= @$reclasificacion['fecha3']; ?></td>
                    <td class="contenido_resu" style=" width: 3%;"></td>
                    <td class="sub_titulo_tabla" style="border:1px solid #c9c9c9; width: 15%;"><?= @$res_finan_acc['nom_acc_resumen'][0]; ?></td>
                    <td class="sub_titulo_tabla" style="border:1px solid #c9c9c9; width: 15%;"><?= @$res_finan_acc['nom_acc_resumen'][1]; ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">INGRESOS NETOS</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtVentasNetas'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtVentasNetas2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtVentasNetas3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['ing_netos_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['ing_netos_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['ing_netos_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['ing_netos_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%; font-size: 9px;"><b>UTILIDAD NETA</b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtAumDismCapContable'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtAumDismCapContable2'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtAumDismCapContable3'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= @$res_finan_acc['utl_neta_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['utl_neta_accio'][0], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= @$res_finan_acc['utl_neta_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['utl_neta_accio'][1], 2, ',', '.'); ?></b></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ACTIVO CIRCULANTE</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalActCirc'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalActCirc2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalActCirc3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['act_cir_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['act_cir_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['act_cir_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['act_cir_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ACTIVO FIJO NETO</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalActFijo'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalActFijo2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalActFijo3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['act_fij_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['act_fij_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['act_fij_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['act_fij_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">OTROS ACTIVOS</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalOtrosAct'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalOtrosAct2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalOtrosAct3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['otr_act_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['otr_act_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['otr_act_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['otr_act_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%; font-size: 9px;"><b>TOTAL ACTIVO</b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtTotalAct'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtTotalAct2'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtTotalAct3'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= @$res_finan_acc['tot_act_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_act_accio'][0], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= @$res_finan_acc['tot_act_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_act_accio'][1], 2, ',', '.'); ?></b></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">PASIVO CORTO PLAZO</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalPasivoCirc'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalPasivoCirc2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalPasivoCirc3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['pas_cp_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['pas_cp_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['pas_cp_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['pas_cp_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">PASIVO LARGO PLAZO</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalPasivoLP'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalPasivoLP2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalPasivoLP3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['pas_lp_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['pas_lp_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['pas_lp_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['pas_lp_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">OTROS PASIVOS</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtotrospasivos'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtotrospasivos2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtotrospasivos3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['otr_pas_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['otr_pas_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['otr_pas_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['otr_pas_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%; font-size: 9px;"><b>TOTAL PASIVO</b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtTotalPasivos'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtTotalPasivos2'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; "><b><?= number_format(@$reclasificacion['txtTotalPasivos3'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= @$res_finan_acc['tot_pas_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_pas_accio'][0], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= @$res_finan_acc['tot_pas_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_pas_accio'][1], 2, ',', '.'); ?></b></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">CAPITAL SOCIAL</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtcapitalsocial'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtcapitalsocial2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtcapitalsocial3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['cap_soc_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_soc_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['cap_soc_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_soc_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">CAPITAL CONTABLE NETO</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalCapital'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalCapital2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotalCapital3'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; font-weight: bold;"><?= @$res_finan_acc['cap_con_nt_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_con_nt_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; font-size: 9px; font-weight: bold;"><?= @$res_finan_acc['cap_con_nt_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_con_nt_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%; font-size: 9px;"><b>TOTAL PASIVO CAPITAL</b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= number_format(@$reclasificacion['txtTotalPasCap'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= number_format(@$reclasificacion['txtTotalPasCap2'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= number_format(@$reclasificacion['txtTotalPasCap3'], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= @$res_finan_acc['tot_pas_cap_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_pas_cap_accio'][0], 2, ',', '.'); ?></b></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right;  font-size: 9px;"><b><?= @$res_finan_acc['tot_pas_cap_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_pas_cap_accio'][1], 2, ',', '.'); ?></b></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" colspan="7" style=" font-size: 9px;"><b>INDICADORES FINANCIEROS</b></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">CAPITAL DE TRABAJO</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtCapitalTrabajo0'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtCapitalTrabajo1'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtCapitalTrabajo2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['cap_trab_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_trab_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['cap_trab_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_trab_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">SOLVENCIA</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtSolvencia0'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtSolvencia1'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtSolvencia2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['solve_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['solve_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['solve_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['solve_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">LIQUIDEZ</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtLiquidez0'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtLiquidez1'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtLiquidez2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['liq_accio'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['liq_accio'][0], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= @$res_finan_acc['liq_accio'][1] = '' ? '&nbsp;' : number_format(@$res_finan_acc['liq_accio'][1], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">VARIACION EN VENTAS</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtVarVentasNetas0'], 2, ',', '.'); ?>%</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtVarVentasNetas1'], 2, ',', '.'); ?>%</td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ROTACION CTAS. POR COBRAR</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotacionCuentasCobrar0'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotacionCuentasCobrar1'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtTotacionCuentasCobrar2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ROTACION CTAS. POR PAGAR</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtRotacionCuentasPagar0'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtRotacionCuentasPagar1'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtRotacionCuentasPagar2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ENDEUDAMIENTO CIRCULANTE</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtEndeudamientoCirculante0'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtEndeudamientoCirculante1'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtEndeudamientoCirculante2'], 2, ',', '.'); ?></td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">RENTABILIDAD S/ VENTAS</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtRentaSobreVentas0'], 2, ',', '.'); ?>%</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtRentaSobreVentas1'], 2, ',', '.'); ?>%</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; "><?= number_format(@$reclasificacion['txtRentaSobreVentas2'], 2, ',', '.'); ?>%</td>
                    <td class="contenido_resu"></td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                    <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">&nbsp;</td>
                </tr>
            </table>
            <table class="tabla">
                <tr>
                    <td class="titulo_tabla">REPORTE DE RIESGO</td>
                </tr>
                <tr>
                    <td class="contenido_resu reporte_ries"><?php echo @$planilla['rep_riesgo']; ?></td>
                </tr>
            </table>
            <table class="tabla">
                <tr>
                    <td class="titulo_tabla">ANALISIS Y COMENTARIOS</td>
                </tr>
                <tr>
                    <td class="contenido_resu analisis_coment"><?php echo @$planilla['ana_comentarios']; ?></td>
                </tr>
            </table>
            <table class="tabla" style="border:1px solid #c9c9c9; background: #dddddd;">
                <tr>
                    <td class="titulo_tabla" style="background: none; border: none;"colspan="6">RESOLUCION</td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                    <td class="contenido_izquierda" style="width: 23%">APROBADO&nbsp;&nbsp;&nbsp;  <img src="images/general/cuadrito.png"/></td>
                    <td class="contenido_izquierda" style="width: 23%">NEGADO&nbsp;&nbsp;&nbsp;  <img src="images/general/cuadrito.png"/></td>
                    <td class="contenido_izquierda" style="width: 23%">DIFERIDO&nbsp;&nbsp;&nbsp;  <img src="images/general/cuadrito.png"/></td>
                    <td class="contenido_izquierda" style="width: 23%">MONTO  _______________________</td>
                    <td class="contenido_izquierda" style="width: 4%"></td>

                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                    <td class="contenido_izquierda" style="width: 23%">CONDICIONES</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                    <td class="contenido_izquierda" style="width: 24%">FIRMAS AUTORIZADAS</td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 26%">COMITE ______________________</td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 26%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 26%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 24%"></td>
                    <td class="contenido_izquierda" style="width: 26%">FECHA  _______/_______/____________</td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
                <tr>
                    <td class="contenido_izquierda" style="width: 4%">&nbsp;</td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 23%"></td>
                    <td class="contenido_izquierda" style="width: 4%"></td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>