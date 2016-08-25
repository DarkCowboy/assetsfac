<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
        <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
    </head>
    <body>
        <div class="cuerpo">
            <div class="logo"><img src="images/general/logo.png"/></div>
            <div class="titulo">SOLICITUD DE PRESTAMO PERSONA NATURAL</div>
            <div class="contenido">

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS PERSONALES</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS</td>
                        <td class="sub_titulo_tabla" >NACIONALIDAD</td>
                        <td class="sub_titulo_tabla">N&deg; DE <?= $planilla['nacionalidad_pn'] == 'PA' ? 'CEDULA' : 'PASAPORTE'; ?></td>
                    </tr>
                    <tr>
                        <td class="contenido_td" ><?php echo $planilla['nom_apell_pn']; ?></td>
                        <td class="contenido_td"><?
                            if ($planilla['nacionalidad_pn'] == 'PA' || strstr(strtolower($planilla['nacionalidad_pn']), 'paname')) {
                                if ($planilla['sexo_pn'] == 'Varon') {
                                    echo 'PANAME&Ntilde;O';
                                } else {
                                    echo 'PANAME&Ntilde;A';
                                }
                            } else {
                                echo $planilla['nacionalidad_pn'];
                            }
                            ?>
                        </td>
                        <td class="contenido_td"><? if(strstr(strtolower($planilla['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA' ){
                            echo 'CED.-';
                            
                        }else{ 
                        echo 'PASS.-';
                        }
                            echo $planilla['cedula_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">TELEFONOS</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                        <td class="sub_titulo_tabla">ESTADO CIVIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['telefono_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['email_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['e_civil_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla" colspan="3">DIRECCION DE HABITACION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td" colspan="3"><?php echo $planilla['direccion_pn']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS LABORALES</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES DE LA EMPRESA</td>
                        <td class="sub_titulo_tabla">ACTIVIDAD ECONOMICA</td>
                        <td class="sub_titulo_tabla">TELEFONOS</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['nom_rz_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['act_aeco_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['telefono_dl_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla" colspan="3">DIRECCION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td" colspan="3"><?php echo $planilla['direccion_dl_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">CARGO</td>
                        <td class="sub_titulo_tabla">ANTIGUEDAD</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['cargo_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['ant_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['email_dl_pn']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">CUENTAS BANCARIAS</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" colspan="3">Los pagos de dinero que ASSETS FACTORING INC. deba efectuar al cliente con motivo de
                            la liquidacion de operaciones, serán efectuados unicamente mediante depositos en una de las cuentas 
                            bancarias del cliente, en el siguiente orden de prelacion:</td>
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
                        <td class="titulo_tabla" colspan="4">DATOS FINANCIEROS</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">ACTIVOS</td>
                        <td class="sub_titulo_tabla">PASIVOS</td>
                        <td class="sub_titulo_tabla">INGRESOS ANUALES</td>
                        <td class="sub_titulo_tabla">PATRIMONIO</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo number_format($planilla['activo_pn'], '2', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['pasivo_pn'], '2', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['ing_anua_pn'], '2', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['pat_total_pn'], '2', ',', '.'); ?></td>
                    </tr>
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
                        <td class="contenido_td"><?php echo number_format(@$solicitud['monto_solicitud'], '2', ',', '.') . ' ' . $moneda['value']; ?></td>
                        <td class="contenido_td"><?php echo number_format(@$solicitud['plazo_solicitud'], '0', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo @$solicitud['destino_solicitud']; ?></td>
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
                <div class="titulo">TOTAL A DEPOSITADO PARA <br/>EL REFINANCIAMIENTO DE LA OPERACION <?= $rollover['n_operacion']; ?></div>
                <br/><br/>
                <div class="contenido_justificado"  style="margin: 0 auto; width: 90%; font-size: 14px;">
                    Uds. ha seleccionado la Operacion N&deg; <?= $rollover['n_operacion']; ?> para refinanciarla con la solicitud de prestamo actual, 
                    a continuacion le presentamos los datos de pago:
                </div>
                <br/><br/>
                <div class="contenido" >
                    <?
                   $dif_fac_consignadas = $rollover['monto_solicitud'] - $solicitud['monto_solicitud'];
                    $pagado = $rollover['monto_solicitud'] * $rollover['porcentaje_compra'] / 100;
                    $dif = $rollover['monto_solicitud'] - $pagado;


                    $plazo_act = diferenciaEntreFechas(@$solicitud['fecha_pago'], $rollover['fecha_solicitud_aprobado']);
                    $rendimiento = number_format(((100 / $rollover['porcentaje_compra'] - 1) * (360 / $rollover['plazo'])) * 100, 2, '.', '');
                    $precio = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
                    $monto = ($rollover['monto_solicitud_aprobado'] * $precio);
                    $dif_act = $rollover['monto_solicitud_aprobado'] - $monto;
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
                                <td class="contenido_numero"><?= $rollover['mora_dias']=='' ?'0' : $rollover['mora_dias']; ?> Dia(s)</td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;"><b>DIFERENCIAL ACTUAL</b></td>
                                <td class="contenido_numero"><b><?= number_format($dif_act, '2', ',', '.'); ?></b></td>
                            </tr>
                            <tr>
                                <td class="sub_titulo_tabla" style="text-align: left;"><b>DIFERENCIAL ABONO CONSIGNADO</b></td>
                                <td class="contenido_numero"><b><?= number_format($dif_fac_consignadas, '2', ',', '.'); ?></b></td>
                            </tr>
                            <? $tot = $dif_act + $dif_fac_consignadas; ?>
                            <tr>
                                <td class="titulo_tabla" colspan="2">DATOS DEL DEPOSITO O TRANSFERENCIA</td>
                            </tr>
                            <tr>
                                <td class="contenido_numero"><b>TOTAL DEPOSITADO</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?= number_format(@$solicitud['monto_depositado'], '2', ',', '.'); ?></b></td>
                            </tr>
                            <tr>
                                <td class="contenido_numero"><b>REFERENCIA BANCARIA</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?php echo @$solicitud['ref_bancaria']; ?></b></td>
                            </tr>
                            <tr>
                                <td class="contenido_numero"><b>BANCO</b></td>
                                <td class="sub_titulo_tabla" style="text-align: right;"><b><?php echo @$solicitud['banco']; ?></b></td>
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