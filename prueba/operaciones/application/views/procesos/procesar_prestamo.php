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
            <form action="./clientes/procesar_cupo" method="post">
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
                            <input value="<?= 'ASSPR' . date(Y) . '-' . $num_control; ?>" type="text" name="n_operacion" />

                            <h4>Modalidad:</h4> 
                            <input value="<?= @$planilla['modalidad'] == '' ? 'Prestamo' : @$planilla['modalidad']; ?>" type="text" name="modalidad" style="width: 100%;"/>

                            <h4>Reporte de Riesgo:</h4> 
                            <textarea name="rep_riesgo" style="width: 100%;height: 124px;"><?= @$planilla['rep_riesgo']; ?></textarea>

                            <h4>Analisis y comentarios:</h4> 
                            <textarea name="ana_comentarios" style="width: 100%;height: 124px;"><?= @$planilla['ana_comentarios']; ?></textarea>

                        </div>
                    </div>
                    <div class="bloque_derecho">
                        <div class="contenido_marcos">
                            <table>
                                <tr>
                                    <td colspan="2">Estado Financiero</td>
                                </tr>
                                <input name="id_pj" value="<?= @$planilla['id_pj']; ?>" type="hidden" />
                                <input name="id_solicitud" value="<?= @$planilla['id_solicitud']; ?>" type="hidden" />
                                <tr>

                                    <td>
                                        <select name="nom_acc_resumen[]" style="width: 100%;">
                                            <option><?= @$planilla['nom_acc_resumen'][0]; ?></option> 
                                            <? foreach (@$planilla['nomina_accionista'] as $row) { ?>
                                                <option value="<?=  strtoupper($row['nom_raz_na']) ?>"><?=  strtoupper($row['nom_raz_na']) ?></option> 
                                            <? } ?>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="nom_acc_resumen[]" style="width: 100%;">
                                            <option><?= @$planilla['nom_acc_resumen'][1]; ?></option> 
                                            <? foreach (@$planilla['nomina_accionista'] as $row) { ?>
                                            <option value="<?= strtoupper($row['nom_raz_na']) ?>"><?=  strtoupper($row['nom_raz_na']) ?></option> 
                                            <? } ?>
                                        </select>
                                    </td>
                                </tr>
                                <!-- ingresos netos -->
                                <tr>
                                    <td><input value="<?= @$planilla['ing_netos_accio'][0]; ?>" placeholder="Ingresos Netos" type="text" name="ing_netos_accio[]"/></td>
                                    <td><input value="<?= @$planilla['ing_netos_accio'][1]; ?>" placeholder="Ingresos Netos" type="text" name="ing_netos_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['utl_neta_accio'][0]; ?>" placeholder="Utilidad Neta" type="text" name="utl_neta_accio[]"/></td>
                                    <td><input value="<?= @$planilla['utl_neta_accio'][1]; ?>" placeholder="Utilidad Neta" type="text" name="utl_neta_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['act_cir_accio'][0]; ?>" placeholder="Activo Circulante" type="text" name="act_cir_accio[]"/></td>
                                    <td><input value="<?= @$planilla['act_cir_accio'][1]; ?>" placeholder="Activo Circulante" type="text" name="act_cir_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['act_fij_accio'][0]; ?>" placeholder="Activo Fijo Neto" type="text" name="act_fij_accio[]"/></td>
                                    <td><input value="<?= @$planilla['act_fij_accio'][1]; ?>" placeholder="Activo Fijo Neto" type="text" name="act_fij_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['otr_act_accio'][0]; ?>" placeholder="Otros Activos" type="text" name="otr_act_accio[]"/></td>
                                    <td><input value="<?= @$planilla['otr_act_accio'][1]; ?>" placeholder="Otros Activos" type="text" name="otr_act_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['tot_act_accio'][0]; ?>" placeholder="Total Activo" type="text" name="tot_act_accio[]"/></td>
                                    <td><input value="<?= @$planilla['tot_act_accio'][1]; ?>" placeholder="Total Activo" type="text" name="tot_act_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['pas_cp_accio'][0]; ?>" placeholder="Pasivo Corto Plazo" type="text" name="pas_cp_accio[]"/></td>
                                    <td><input value="<?= @$planilla['pas_cp_accio'][1]; ?>" placeholder="Pasivo Corto Plazo" type="text" name="pas_cp_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['pas_lp_accio'][0]; ?>" placeholder="Pasivo Largo Plazo" type="text" name="pas_lp_accio[]"/></td>
                                    <td><input value="<?= @$planilla['pas_lp_accio'][1]; ?>" placeholder="Pasivo Largo Plazo" type="text" name="pas_lp_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['otr_pas_accio'][0]; ?>" placeholder="Otros Pasivos" type="text" name="otr_pas_accio[]"/></td>
                                    <td><input value="<?= @$planilla['otr_pas_accio'][1]; ?>" placeholder="Otros Pasivos" type="text" name="otr_pas_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['tot_pas_accio'][0]; ?>" placeholder="Total Pasivos" type="text" name="tot_pas_accio[]"/></td>
                                    <td><input value="<?= @$planilla['tot_pas_accio'][1]; ?>" placeholder="Total Pasivos" type="text" name="tot_pas_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['cap_soc_accio'][0]; ?>" placeholder="Capital Social" type="text" name="cap_soc_accio[]"/></td>
                                    <td><input value="<?= @$planilla['cap_soc_accio'][1]; ?>" placeholder="Capital Social" type="text" name="cap_soc_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['cap_con_nt_accio'][0]; ?>" placeholder="Capital Contable Neto" type="text" name="cap_con_nt_accio[]"/></td>
                                    <td><input value="<?= @$planilla['cap_con_nt_accio'][1]; ?>" placeholder="Capital Contable Neto" type="text" name="cap_con_nt_accio[]"/></td>
                                </tr>
                                <!-- Utilidad Neta -->
                                <tr>
                                    <td><input value="<?= @$planilla['tot_pas_cap_accio'][0]; ?>" placeholder="Total Pasivo Capital" type="text" name="tot_pas_cap_accio[]"/></td>
                                    <td><input value="<?= @$planilla['tot_pas_cap_accio'][1]; ?>" placeholder="Total Pasivo Capital" type="text" name="tot_pas_cap_accio[]"/></td>
                                </tr>
                                <tr>
                                    <td colspan="2">Indicadores Financieros</td>
                                </tr>
                                <tr>
                                    <td><input value="<?= @$planilla['cap_trab_accio'][0]; ?>" placeholder="Capital de Trabajo" type="text" name="cap_trab_accio[]"/></td>
                                    <td><input value="<?= @$planilla['cap_trab_accio'][1]; ?>" placeholder="Capital de Trabajo" type="text" name="cap_trab_accio[]"/></td>
                                </tr>
                                <tr>
                                    <td><input value="<?= @$planilla['solve_accio'][0]; ?>" placeholder="Solvencia" type="text" name="solve_accio[]"/></td>
                                    <td><input value="<?= @$planilla['solve_accio'][1]; ?>" placeholder="Solvencia" type="text" name="solve_accio[]"/></td>
                                </tr>
                                <tr>
                                    <td><input value="<?= @$planilla['liq_accio'][0]; ?>" placeholder="liquidez" type="text" name="liq_accio[]"/></td>
                                    <td><input value="<?= @$planilla['liq_accio'][1]; ?>" placeholder="liquidez" type="text" name="liq_accio[]"/></td>
                                </tr>
                            </table>

                            <? // debug(@$planilla); ?>
                        </div>
                    </div>
                </div>
                <input class="boton" type="submit" value="Procesar">
            </form>
        </div>
    </body>
</html>