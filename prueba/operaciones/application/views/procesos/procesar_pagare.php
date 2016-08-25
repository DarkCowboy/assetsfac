<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <script type="text/javascript" src="js/scripts/jquery.min.js"></script>
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
            <form action="./clientes/procesar_pagare" method="post">
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
                            <input value="<?= date('Y-m-d')?>" type="hidden" name="fecha_elab_prop" id="fecha_elab_prop" />

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
                                }
                                ?>  
                            </textarea>

                        </div>
                    </div>
                    <div class="bloque_derecho">
                        <div class="contenido_marcos">
                            <table>
                                <tr>
                                    <td colspan="3">Estado Financiero</td>
                                </tr>
                                <input name="id_pj" value="<?= @$planilla['id_pj']; ?>" type="hidden" />
                                <input name="id_solicitud" value="<?= @$planilla['id_solicitud']; ?>" type="hidden" />
                                <tr>
                                    <td></td>
                                    <td>
                                        <select name="nom_acc_resumen[]" style="width: 100%;">
                                            <option><?= strtoupper(@$planilla['nom_acc_resumen'][0]); ?></option> 
                                            <? foreach (@$planilla['junta_directiva'] as $row) { ?>
                                                <option value="<?=  strtoupper($row['nombres_dir']) ?>"><?=  strtoupper($row['nombres_dir']) ?></option> 
                                            <? } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="nom_acc_resumen[]" style="width: 100%;">
                                            <option><?= strtoupper(@$planilla['nom_acc_resumen'][1]); ?></option> 
                                            <? foreach (@$planilla['junta_directiva'] as $row) { ?>
                                                <option value="<?=  strtoupper($row['nombres_dir']) ?>"><?=  strtoupper($row['nombres_dir']) ?></option> 
                                            <? } ?>
                                        </select>
                                    </td>
                                </tr>
                                <!-- ingresos netos -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Ingresos Netos</td>
                                    <td><input value="<?= @$planilla['ing_netos_accio'][0]; ?>" tabindex="1" class="cuentas" id="ing_netos_accio0" placeholder="Ingresos Netos" type="text" name="ing_netos_accio[]"/></td>
                                    <td><input value="<?= @$planilla['ing_netos_accio'][1]; ?>" tabindex="15" class="cuentas" id="ing_netos_accio1" placeholder="Ingresos Netos" type="text" name="ing_netos_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Utilidad Neta</td>
                                    <td><input value="<?= @$planilla['utl_neta_accio'][0]; ?>" tabindex="2" class="cuentas" id="utl_neta_accio0" placeholder="Utilidad Neta" type="text" name="utl_neta_accio[]"/></td>
                                    <td><input value="<?= @$planilla['utl_neta_accio'][1]; ?>" tabindex="16" class="cuentas" id="utl_neta_accio1" placeholder="Utilidad Neta" type="text" name="utl_neta_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Activo Circulante</td>
                                    <td><input value="<?= @$planilla['act_cir_accio'][0]; ?>" tabindex="3" class="cuentas" id="act_cir_accio0" placeholder="Activo Circulante" type="text" name="act_cir_accio[]"/></td>
                                    <td><input value="<?= @$planilla['act_cir_accio'][1]; ?>" tabindex="17" class="cuentas" id="act_cir_accio1" placeholder="Activo Circulante" type="text" name="act_cir_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Activo Fijo Neto</td>
                                    <td><input value="<?= @$planilla['act_fij_accio'][0]; ?>" tabindex="4" class="cuentas" id="act_fij_accio0" placeholder="Activo Fijo Neto" type="text" name="act_fij_accio[]"/></td>
                                    <td><input value="<?= @$planilla['act_fij_accio'][1]; ?>" tabindex="18" class="cuentas" id="act_fij_accio1" placeholder="Activo Fijo Neto" type="text" name="act_fij_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Otros Activos</td>
                                    <td><input value="<?= @$planilla['otr_act_accio'][0]; ?>" tabindex="5" class="cuentas" id="otr_act_accio0" placeholder="Otros Activos" type="text" name="otr_act_accio[]"/></td>
                                    <td><input value="<?= @$planilla['otr_act_accio'][1]; ?>" tabindex="19" class="cuentas" id="otr_act_accio1" placeholder="Otros Activos" type="text" name="otr_act_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Total Activo</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['tot_act_accio'][0]; ?>" id="tot_act_accio0" placeholder="Total Activo" type="text" name="tot_act_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['tot_act_accio'][1]; ?>" id="tot_act_accio1" placeholder="Total Activo" type="text" name="tot_act_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Pasivo Corto Plazo</td>
                                    <td><input value="<?= @$planilla['pas_cp_accio'][0]; ?>" tabindex="6" id="pas_cp_accio0" class="cuentas" placeholder="Pasivo Corto Plazo" type="text" name="pas_cp_accio[]"/></td>
                                    <td><input value="<?= @$planilla['pas_cp_accio'][1]; ?>" tabindex="20" id="pas_cp_accio1" class="cuentas" placeholder="Pasivo Corto Plazo" type="text" name="pas_cp_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Pasivo Largo Plazo</td>
                                    <td><input value="<?= @$planilla['pas_lp_accio'][0]; ?>" tabindex="7" id="pas_lp_accio0" class="cuentas" placeholder="Pasivo Largo Plazo" type="text" name="pas_lp_accio[]"/></td>
                                    <td><input value="<?= @$planilla['pas_lp_accio'][1]; ?>" tabindex="21" id="pas_lp_accio1" class="cuentas" placeholder="Pasivo Largo Plazo" type="text" name="pas_lp_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Otros Pasivos</td>
                                    <td><input value="<?= @$planilla['otr_pas_accio'][0]; ?>" tabindex="8" id="otr_pas_accio0" placeholder="Otros Pasivos" class="cuentas" type="text" name="otr_pas_accio[]"/></td>
                                    <td><input value="<?= @$planilla['otr_pas_accio'][1]; ?>" tabindex="22" id="otr_pas_accio1" placeholder="Otros Pasivos" class="cuentas" type="text" name="otr_pas_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Total Pasivos</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['tot_pas_accio'][0]; ?>" id="tot_pas_accio0" placeholder="Total Pasivos" type="text" name="tot_pas_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['tot_pas_accio'][1]; ?>" id="tot_pas_accio1" placeholder="Total Pasivos" type="text" name="tot_pas_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Capital Social</td>
                                    <td><input value="<?= @$planilla['cap_soc_accio'][0]; ?>" tabindex="9" id="cap_soc_accio0" placeholder="Capital Social" class="cuentas" type="text" name="cap_soc_accio[]"/></td>
                                    <td><input value="<?= @$planilla['cap_soc_accio'][1]; ?>" tabindex="23" id="cap_soc_accio1" placeholder="Capital Social" class="cuentas" type="text" name="cap_soc_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Capital Contable Neto</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['cap_con_nt_accio'][0]; ?>"  id="cap_con_nt_accio0" placeholder="Capital Contable Neto"  type="text" name="cap_con_nt_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['cap_con_nt_accio'][1]; ?>"  id="cap_con_nt_accio1" placeholder="Capital Contable Neto"  type="text" name="cap_con_nt_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Total Pasivo Capital</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['tot_pas_cap_accio'][0]; ?>" id="tot_pas_cap_accio0"  placeholder="Total Pasivo Capital" type="text" name="tot_pas_cap_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['tot_pas_cap_accio'][1]; ?>" id="tot_pas_cap_accio1"  placeholder="Total Pasivo Capital" type="text" name="tot_pas_cap_accio[]"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Indicadores Financieros</td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Capital de Trabajo</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['cap_trab_accio'][0]; ?>" tabindex="10" id="cap_trab_accio0" placeholder="Capital de Trabajo" type="text" name="cap_trab_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['cap_trab_accio'][1]; ?>" tabindex="24" id="cap_trab_accio1" placeholder="Capital de Trabajo" type="text" name="cap_trab_accio[]"/></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">Solvencia</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['solve_accio'][0]; ?>" tabindex="11" id="solve_accio0" placeholder="Solvencia" type="text" name="solve_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['solve_accio'][1]; ?>" tabindex="25" id="solve_accio1" placeholder="Solvencia" type="text" name="solve_accio[]"/></td>
                                </tr>
                                <tr>
                                    <td style="font-size: 10px;text-align: -moz-left;">liquidez</td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['liq_accio'][0]; ?>" tabindex="12" id="liq_accio0" placeholder="liquidez" type="text" name="liq_accio[]"/></td>
                                    <td><input style="background:#9c9c9c;" readonly="readonly" value="<?= @$planilla['liq_accio'][1]; ?>" tabindex="26" id="liq_accio1" placeholder="liquidez" type="text" name="liq_accio[]"/></td>
                                </tr>
                            </table>

                            <script>
                                $(function() {

                                    $('.cuentas').on({
                                        keyup: function() {
                                            refresca();
                                        },
                                        blur: function() {
                                            refresca();
                                        }
                                    });

                                    function valida_nan(valor) {
                                        if (isNaN(valor)) {
                                            console.debug('validado');
                                            return parseFloat(0);
                                        }else if (valor == '0'){
                                            console.debug('validado');
                                            return parseFloat(0);
                                        }else if (valor == ''){
                                            console.debug('validado');
                                            return parseFloat(0);
                                        } else {
                                            return parseFloat(valor);
                                        }
                                    }

                                    function refresca() {
//                                        var a = parseFloat($("#ing_netos_accio0").val());
//                                        var b = parseFloat($("#utl_neta_accio0").val());
                                        var c = parseFloat($("#act_cir_accio0").val());
                                        var d = parseFloat($("#act_fij_accio0").val());
                                        var e = parseFloat($("#otr_act_accio0").val());

//                                        a = valida_nan(a);
//                                        b = valida_nan(b);
                                        c = valida_nan(c);
                                        d = valida_nan(d);
                                        e = valida_nan(e);


                                        $("#tot_act_accio0").val(c + d + e); 
                                        
//                                        var f = parseFloat($("#ing_netos_accio1").val());
//                                        var g = parseFloat($("#utl_neta_accio1").val());
                                        var h = parseFloat($("#act_cir_accio1").val());
                                        var i = parseFloat($("#act_fij_accio1").val());
                                        var j = parseFloat($("#otr_act_accio1").val());

//                                        f = valida_nan(f);
//                                        g = valida_nan(g);
                                        h = valida_nan(h);
                                        i = valida_nan(i);
                                        j = valida_nan(j);

                                        
                                        $("#tot_act_accio1").val(h + i + j);

                                        var k = $("#pas_cp_accio0").val();
                                        var l = $("#pas_lp_accio0").val();
                                        var m = $("#otr_pas_accio0").val();

                                        k = valida_nan(k);
                                        l = valida_nan(l);
                                        m = valida_nan(m);

                                        
                                        $("#tot_pas_accio0").val(k + l + m);

                                        var n = $("#pas_cp_accio1").val();
                                        var o = $("#pas_lp_accio1").val();
                                        var p = $("#otr_pas_accio1").val();

                                        n = valida_nan(n);
                                        o = valida_nan(o);
                                        p = valida_nan(p);
                                        
                                        console.debug(n + ' ' + o + ' ' +p);

                                        $("#tot_pas_accio1").val(n + o + p);


                                        $("#cap_soc_accio0").val();
                                        $("#cap_soc_accio1").val();

                                        $("#cap_con_nt_accio0").val(parseFloat($("#tot_act_accio0").val()) - parseFloat($("#tot_pas_accio0").val()));
                                        $("#cap_con_nt_accio1").val(parseFloat($("#tot_act_accio1").val()) - parseFloat($("#tot_pas_accio1").val()));



                                        $("#tot_pas_cap_accio0").val(parseFloat($("#cap_con_nt_accio0").val()) + parseFloat($("#tot_pas_accio0").val()));
                                        $("#tot_pas_cap_accio1").val(parseFloat($("#cap_con_nt_accio1").val()) + parseFloat($("#tot_pas_accio1").val()));



                                        $("#cap_trab_accio0").val(parseFloat($("#act_cir_accio0").val()) - parseFloat($("#pas_cp_accio0").val()));
                                        $("#cap_trab_accio1").val(parseFloat($("#act_cir_accio1").val()) - parseFloat($("#pas_cp_accio1").val()));

                                        var aa = $("#act_cir_accio0").val();
                                        var bb = $("#pas_cp_accio0").val();
                                        
                                        var cc = $("#act_cir_accio1").val();
                                        var dd = $("#pas_cp_accio1").val();
                                        
                                        if(bb == '0'){
                                            bb=1;
                                        }
                                        if(dd == '0'){
                                            dd=1;
                                        }
                                           
                                        $("#solve_accio0").val((parseFloat(aa) / parseFloat(bb)).toFixed(2));
                                        $("#solve_accio1").val((parseFloat(cc) / parseFloat(dd)).toFixed(2));

                                        $("#liq_accio0").val((parseFloat(aa) / parseFloat(bb)).toFixed(2));
                                        $("#liq_accio1").val((parseFloat(cc) / parseFloat(dd)).toFixed(2));

                                    }
                                    ;

                                    $('.cuentas').each(function() {

                                        if ($(this).val() == '') {
                                            $(this).val('0');
                                        }

                                    });
                                    $('.cuentas').focus(function() {

                                        if ($(this).val() == '0') {
                                            $(this).val('');
                                        }

                                    });
                                    $('.cuentas').blur(function() {

                                        if ($(this).val() == '') {
                                            $(this).val('0');
                                        }

                                    });

                                });
                            </script>
                            <style>
                                td > input {
                                    font-size: 10px !important;
                                    text-align: right;
                                }
                            </style>
                            <? // debug(@$planilla); ?>
                        </div>
                    </div>
                </div>
                <input class="boton" type="submit" value="Procesar">
            </form>
        </div>
    </body>
</html>