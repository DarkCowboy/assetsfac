<?
$planilla['banco_ref_pn'] = unserialize($planilla['banco_ref_pn']);
$planilla['n_cuenta_ref_pn'] = unserialize($planilla['n_cuenta_ref_pn']);
$planilla['cuenta_ref_pn'] = unserialize($planilla['cuenta_ref_pn']);
?>
<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_venta_op.css" />
        <script type='text/javascript' src='js/plugins/jquery.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/Jquery/jquery.mousewheel-3.0.6.pack.js'></script>
    </head>
    <body>
        <div class="cuerpo">

            <div class="contenido">

                <div class="header_solicitud">
                    <div>

                        <div class="logo"><img src="images/general/logo.png"/></div>
                        <div class="titulo">PROPUESTA DE OPERACION DE PRESTAMO</div>
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
                                <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo @$planilla['n_cuenta_ref_pn'][0] ?></td>
                                <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo fecha(@$planilla['fecha_solicitud']); ?></td>
                                <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo fecha(@$planilla['fecha_elab_prop']); ?></td>
                                <td class="contenido_td" style="border: 1px solid grey; text-align: center;"><?php echo @$planilla['n_operacion']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DE LA SOLICITUD DE PRESTAMO</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">MONTO SOLICITADO</td>
                        <td class="sub_titulo_tabla">PLAZO</td>
                        <td class="sub_titulo_tabla">DESCRIPCION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo number_format(@$planilla['monto_solicitud'], 2, ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo number_format(@$planilla['plazo_solicitud'], 0, ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo @$planilla['destino_solicitud']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DEL SOLICITANTE</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla" colspan="2">NOMBRES Y APELLIDOS</td>
                        <td class="sub_titulo_tabla">CEDULA DE IDENTIDAD</td>
                    </tr>
                    <tr>
                        <td class="contenido_td" colspan="2"><?php echo @$planilla['nom_apell_pn']; ?></td>
                        <td class="contenido_td">
                            <?
                            if (strstr(strtolower(@$planilla['nacionalidad_pn']), 'paname') || @$planilla['nacionalidad_pn'] == 'PA') {
                                echo 'CED.-';
                            } else {
                                echo 'PASS.-';
                            }
                            echo @$planilla['cedula_pn'];
                            ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">DIRECCION</td>
                        <td class="sub_titulo_tabla">TELEFONO</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$planilla['direccion_pn']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['telefono_pn']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['email_pn']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">CUENTAS BANCARIAS</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" colspan="3">Los pagos de dinero que ASSETS FACTORING INC. deba efectuar al cliente con motivo de
                            la liquidación de operaciones, serán efectuados únicamente mediante depósitos en una de las cuentas 
                            bancarias del cliente, en el siguiente orden de prelación:</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">BANCO</td>
                        <td class="sub_titulo_tabla">N&deg; DE CUENTA</td>
                        <td class="sub_titulo_tabla">TIPO DE CUENTA</td>
                    </tr>
                    <?
                    for ($i = 0; $i <= 2; $i++) {
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo $planilla['banco_ref_pn'][$i]; ?></td>
                            <td class="contenido_td"><?php echo $planilla['n_cuenta_ref_pn'][$i]; ?></td>
                            <td class="contenido_td"><?php echo $planilla['cuenta_ref_pn'][$i]; ?></td>
                        </tr>
                    <? } ?>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">RESUMEN ECONOMICO FINANCIERO</td>
                    </tr>
                    <tr>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">INGRESOS ANUALES</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['ing_netos_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['ing_netos_pn'][0], 2, ',', '.'); ?></td>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">PASIVO CORTO PLAZO</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['pas_cp_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['pas_cp_pn'][0], 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ACTIVO CIRCULANTE</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['act_cir_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['act_cir_pn'][0], 2, ',', '.'); ?></td>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">PASIVO LARGO PLAZO</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['pas_lp_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['pas_lp_pn'][0], 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">ACTIVO FIJO NETO</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['act_fij_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['act_fij_pn'][0], 2, ',', '.'); ?></td>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">OTROS PASIVOS</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['otr_pas_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['otr_pas_pn'][0], 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">INVERSIONES</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['utl_neta_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['utl_neta_pn'][0], 2, ',', '.'); ?></td>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;"><b>TOTAL PASIVO</b></td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <b><?= @$res_finan_acc['tot_pas_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_pas_pn'][0], 2, ',', '.'); ?></b></td>
                    </tr>
                    <tr>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;">OTROS ACTIVOS</td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <?= @$res_finan_acc['otr_act_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['otr_act_pn'][0], 2, ',', '.'); ?></td>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;"><b>PATRIMONIO NETO</b></td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <b><?= @$res_finan_acc['cap_con_nt_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['cap_con_nt_pn'][0], 2, ',', '.'); ?></b></td>
                    </tr>
                    <tr>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;"><b>TOTAL ACTIVO</b></td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <b><?= @$res_finan_acc['tot_act_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_act_pn'][0], 2, ',', '.'); ?></b></td>
                        <td class="contenido_izquierda" style="border:1px solid #c9c9c9; width: 25%;"><b>TOTAL PASIVO Y PATRIMONIO</b></td>
                        <td class="contenido_resu" style="border:1px solid #c9c9c9; text-align: right; ">
                            <b><?= @$res_finan_acc['tot_pas_cap_pn'][0] = '' ? '&nbsp;' : number_format(@$res_finan_acc['tot_pas_cap_pn'][0], 2, ',', '.'); ?></b></td>
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
                    </tr><tr>
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