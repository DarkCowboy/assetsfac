<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
    <script src="js/calendario/dhtmlxcalendar.js"></script>
    <link rel="stylesheet" href="js/calendario/dhtmlxcalendar.css" type="text/css"> 
    <link rel="stylesheet" href="js/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

    <script type="text/javascript" >
        $(function() {

            myCalendar = new dhtmlXCalendarObject(["fecha_solicitud", "fecha_vcto"], true, {isYearEditable: true, isMonthEditable: true});
            myCalendar.setSkin('dhx_terrace');
            myCalendar.hideTime();
            dhtmlXCalendarObject.prototype.langData["es"] = {
                dateformat: '%d.%m.%Y',
                monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
                daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                weekstart: 1
            }
            myCalendar.loadUserLanguage('es');

        });




    </script>
    <body>
        <div class="wrap">
            <form action="./clientes/procesar_pagare_pn" method="post">
                <div class="titulo">
                    PROCESAR SOLICITUD
                </div>
                <?
                $x = strlen(@$planilla['id_solicitud']);
                if ($x == '2') {
                    $num_control = '0' . @$planilla['id_solicitud'];
                } elseif ($x == '1') {
                    $num_control = '00' . @$planilla['id_solicitud'];
                } else {
                    $num_control = @$planilla['id_solicitud'];
                }
                ?>
                <div class="contenido">
                    <div class="bloque_izquierdo">
                        <div class="contenido_marcos">
                            <h4>Codigo:</h4> 
                            <select value="codigo_solicitud" name="codigo_solicitud">
                                <option <?= @$planilla['codigo_solicitud'] == '1' ? 'selected="selected"' : '' ?> value="1">1</option>
                                <option <?= @$planilla['codigo_solicitud'] == '2' ? 'selected="selected"' : '' ?> value="2">2</option>
                                <option <?= @$planilla['codigo_solicitud'] == '3' ? 'selected="selected"' : '' ?> value="3">3</option>
                            </select>
                            <h4>Fecha solicitud:</h4> 
                            <input value="<?= $planilla['fecha_solicitud'] ?>" type="text" name="fecha_solicitud" id="fecha_solicitud" />
                            <input value="<?= date('Y-m-d') ?>" type="hidden" name="fecha_elab_prop" id="fecha_elab_prop" />    
                            <h4>N&deg; solicitud:</h4> 
                            <input value="<?= 'ASSPG' . date(Y) . '-' . $num_control; ?>" type="text" name="n_operacion" />

                            <h4>Modalidad:</h4> 
                            <input value="<?= @$planilla['modalidad'] == '' ? 'Pagare' : @$planilla['modalidad']; ?>" type="text" name="modalidad" style="width: 100%;"/>

                            <h4>Reporte de Riesgo:</h4> 
                            <textarea name="rep_riesgo" style="width: 100%;height: 124px;"><?= @$planilla['rep_riesgo']; ?></textarea>

                            <h4>Analisis y comentarios:</h4> 
                            <textarea name="ana_comentarios" style="width: 100%;height: 124px;">
                                <?
                                if ($planilla['ana_comentarios'] == '') {
                                    if ($rollover) {
                                        echo 'Esta Operacion cancela la operacion anterior N°' . $rollover['n_operacion'];
                                    } else {
                                        echo $planilla['ana_comentarios'];
                                    }
                                } else {
                                    echo $planilla['ana_comentarios'];
                                }
                                ?>
                            </textarea>

                        </div>
                    </div>
                    <div class="bloque_derecho">
                        <div class="contenido_marcos">
                            <table>
                                <tr>
                                    <td colspan="2">Estado Financiero</td>
                                </tr>
                                <input name="id_cliente" value="<?= @$planilla['id_cliente']; ?>" type="hidden" />
                                <input name="id_solicitud" value="<?= @$planilla['id_solicitud']; ?>" type="hidden" />

                                <!-- ingresos netos -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Ingresos Anuales 
                                        <input value="<?= @$planilla['ing_netos_pn'][0]; ?>"  type="text" name="ing_netos_pn[]" id="ing_netos_pn" /></td>
                                </tr>
                                <!-- Activo Circulante -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Activo Circulante 
                                        <input value="<?= @$planilla['act_cir_pn'][0]; ?>"  type="text" name="act_cir_pn[]" class="activos" id="act_cir_pn"/></td>
                                </tr>
                                <!-- Activo Fijo Neto -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Activo Fijo Neto 
                                        <input value="<?= @$planilla['act_fij_pn'][0]; ?>"  type="text" name="act_fij_pn[]" class="activos" id="act_fij_pn"/></td>
                                </tr>
                                <!-- Utilidad Neta -> Inversiones -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Inversiones 
                                        <input value="<?= @$planilla['utl_neta_pn'][0]; ?>"  type="text" name="utl_neta_pn[]" class="activos" id="utl_neta_pn"/></td>
                                </tr>
                                <!-- Otros Activos -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Otros Activos 
                                        <input value="<?= @$planilla['otr_act_pn'][0]; ?>"  type="text" name="otr_act_pn[]" class="activos" id="otr_act_pn"/></td>
                                </tr>
                                <!-- Total Activo -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Total Activo 
                                        <input value="<?= @$planilla['tot_act_pn'][0]; ?>"  type="text" name="tot_act_pn[]" class="activos" id="tot_act_pn" readonly="readonly" style="background: #DCE2FF;"/></td>
                                </tr>

                                <!-- Pasivo Corto Plazo -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Pasivo Corto Plazo 
                                        <input value="<?= @$planilla['pas_cp_pn'][0]; ?>"  type="text" name="pas_cp_pn[]" id="pas_cp_pn" class="pasivo"/></td>
                                </tr>
                                <!-- Pasivo Largo Plazo -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Pasivo Largo Plazo 
                                        <input value="<?= @$planilla['pas_lp_pn'][0]; ?>"  type="text" name="pas_lp_pn[]" id="pas_lp_pn" class="pasivo"/></td>
                                </tr>
                                <!-- Otros Pasivos -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Otros Pasivos 
                                        <input value="<?= @$planilla['otr_pas_pn'][0]; ?>"  type="text" name="otr_pas_pn[]" id="otr_pas_pn" class="pasivo"/></td>
                                </tr>
                                <!-- Total Pasivos -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Total Pasivos 
                                        <input value="<?= @$planilla['tot_pas_pn'][0]; ?>"  type="text" name="tot_pas_pn[]" id="tot_pas_pn" class="pasivo" readonly="readonly" style="background: #DCE2FF;"/></td>
                                </tr>
                                <!-- Capital Contable Neto -> Patrimonio neto -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Patrimonio Neto 
                                        <input value="<?= @$planilla['cap_con_nt_pn'][0]; ?>"  type="text" name="cap_con_nt_pn[]" id="cap_con_nt_pn" readonly="readonly" style="background: #DCE2FF;"/></td>
                                </tr>
                                <!-- Total Pasivo Capital -> Total Pasivo y Patrimonio -->
                                <tr>
                                    <td style="font-size: 10px; text-align: right;">Total Pasivo y Patrimonio 
                                        <input value="<?= @$planilla['tot_pas_cap_pn'][0]; ?>"  type="text" name="tot_pas_cap_pn[]" id="tot_pas_cap_pn" readonly="readonly" style="background: #DCE2FF;"/></td>
                                </tr>

                                <script>

                                    $(window).load(function() {

                                        if ($('#otr_act_pn').val() == '') {
                                            $('#otr_act_pn').val('0');
                                        }
                                        if ($('#utl_neta_pn').val() == '') {
                                            $('#utl_neta_pn').val('0');
                                        }
                                        if ($('#act_fij_pn').val() == '') {
                                            $('#act_fij_pn').val('0');
                                        }
                                        if ($('#act_cir_pn').val() == '') {
                                            $('#act_cir_pn').val('0');
                                        }
                                        if ($('#ing_netos_pn').val() == '') {
                                            $('#ing_netos_pn').val('0');
                                        }

                                        if ($('#pas_cp_pn').val() == '') {
                                            $('#pas_cp_pn').val('0');
                                        }
                                        if ($('#utl_neta_pn').val() == '') {
                                            $('#utl_neta_pn').val('0');
                                        }
                                        if ($('#cap_con_nt_pn').val() == '') {
                                            $('#cap_con_nt_pn').val('0');
                                        }
                                        if ($('#pas_lp_pn').val() == '') {
                                            $('#pas_lp_pn').val('0');
                                        }
                                        if ($('#otr_pas_pn').val() == '') {
                                            $('#otr_pas_pn').val('0');
                                        }


                                        otr_act_pn = $('#otr_act_pn').val();
                                        utl_neta_pn = $('#utl_neta_pn').val();
                                        act_fij_pn = $('#act_fij_pn').val();
                                        act_cir_pn = $('#act_cir_pn').val();
                                        ing_netos_pn = $('#ing_netos_pn').val();

                                        pas_cp_pn = $('#pas_cp_pn').val();
                                        pas_lp_pn = $('#utl_neta_pn').val();
                                        otr_pas_pn = $('#otr_pas_pn').val();

                                        cap_con_nt_pn = $('#cap_con_nt_pn').val();


                                        tot_act_pn = (parseFloat(otr_act_pn) + parseFloat(utl_neta_pn) + parseFloat(act_fij_pn) + parseFloat(act_cir_pn)).toFixed(2);
                                        tot_pas_pn = (parseFloat(pas_cp_pn) + parseFloat(pas_lp_pn) + parseFloat(otr_pas_pn)).toFixed(2);

                                        $('#tot_act_pn').val(tot_act_pn);
                                        $('#tot_pas_pn').val(tot_pas_pn);

                                        $('#cap_con_nt_pn').val(($('#tot_act_pn').val() - $('#tot_pas_pn').val()).toFixed(2));
                                        $('#tot_pas_cap_pn').val((parseFloat(tot_pas_pn) + parseFloat(cap_con_nt_pn)).toFixed(2));
                                    });

                                    $('.activos').blur(function() {
                                        if ($(this).val() == '') {
                                            $(this).val('0');
                                        }
                                    });
                                    $('.pasivo').blur(function() {
                                        if ($(this).val() == '') {
                                            $(this).val('0');
                                        }
                                    });

                                    $('.activos').click(function() {
                                        if ($(this).val() == '0') {
                                            $(this).val('');
                                        }
                                    });
                                    $('.pasivo').click(function() {
                                        if ($(this).val() == '0') {
                                            $(this).val('');
                                        }
                                    });

                                    $('.activos').keyup(function() {

                                        otr_act_pn = $('#otr_act_pn').val();
                                        utl_neta_pn = $('#utl_neta_pn').val();
                                        act_fij_pn = $('#act_fij_pn').val();
                                        act_cir_pn = $('#act_cir_pn').val();
                                        ing_netos_pn = $('#ing_netos_pn').val();
                                        tot_act_pn = (parseFloat(otr_act_pn) + parseFloat(utl_neta_pn) + parseFloat(act_fij_pn) + parseFloat(act_cir_pn)).toFixed(2);
                                        $('#tot_act_pn').val(tot_act_pn);

                                        $('#cap_con_nt_pn').val(($('#tot_act_pn').val() - $('#tot_pas_pn').val()).toFixed(2));
                                        $('#tot_pas_cap_pn').val((parseFloat($('#tot_pas_pn').val()) + parseFloat($('#cap_con_nt_pn').val())).toFixed(2));
                                    });

                                    $('.pasivo').keyup(function() {
                                        pas_cp_pn = $('#pas_cp_pn').val();
                                        pas_lp_pn = $('#pas_lp_pn').val();
                                        otr_pas_pn = $('#otr_pas_pn').val();
                                        tot_pas_pn = (parseFloat(pas_cp_pn) + parseFloat(pas_lp_pn) + parseFloat(otr_pas_pn)).toFixed(2);
                                        $('#tot_pas_pn').val(tot_pas_pn);

                                        $('#cap_con_nt_pn').val(($('#tot_act_pn').val() - $('#tot_pas_pn').val()).toFixed(2));
                                        $('#tot_pas_cap_pn').val((parseFloat($('#tot_pas_pn').val()) + parseFloat($('#cap_con_nt_pn').val())).toFixed(2));
                                    });


                                </script>

                            </table>
                        </div>
                    </div>
                </div>
                <input class="boton" type="submit" value="Procesar">
            </form>
        </div>
    </body>
</html>