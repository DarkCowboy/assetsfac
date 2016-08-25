<? $this->load->view('templates/header') ?>
<script src="scripts/calendario/dhtmlxcalendar.js"></script>
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar.css" type="text/css"> 
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

<script type="text/javascript" >
    $(function() {

        myCalendar = new dhtmlXCalendarObject(["fecha_pago"], true, {isYearEditable: true, isMonthEditable: true});
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

<link href="scripts/select/select2.css" rel="stylesheet" >
<script src="scripts/select/select2-1.js"></script>
<script id="script_e2">
    $(document).ready(function() {
        $("#id_proveedor_select").select2({
            placeholder: {id: "", text: "Select a State"}
        });
        $("#nombre_proveedor_select").select2({
            placeholder: {id: "", text: "Select a State"}
        });
    });
</script>

<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('instruccion_pago/menu_interno_instrucciones') ?>     

            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Editar Instruccion</h1>
                </div><br>
                <?
                if ($error) {
                    echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $error;
                    echo "</div>";
                }
                ?>
                <form action="./instruccion_pago/editar_instruccion/<?= sha1($instruccion['id_instruccion']) ?>" method="post" class="form" style="margin: 17px;" id="validate-form" onSubmit="return validator(this);" >
                    <div class="table" style="margin: 0 auto; overflow: hidden; width: 472px; float: none;">
                        <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                        <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th class="full" colspan="2">Datos del Beneficiario</th>
                                </tr>
                                <tr class="bg">
                                    <td class="first" width="172">Beneficiario Existente?</td>
                                    <td class="last">
                                        <input type="radio" class="beneficiario_exist" name="existe" value="0" checked="checked" /> No
                                        <input type="radio" checked="checked" class="beneficiario_exist" name="existe" value="1" /> Si
                                    </td>
                                </tr>

                            <script>
    $(function() {
        $('.beneficiario_exist').click(function() {
            if ($(this).val() == '1') {
                $('#beneficiario').empty();
                $('#beneficiario').append('<tr>\n\
                                                                <td class="first" width="172"><strong>Beneficiario</strong></td>\n\
                                                                <td class="last">\n\
                                                                    <select name="id_proveedor" id="id_proveedor_select">\n\
                                                                       <option>Seleccione...</option>\n\
<? foreach ($proveedores as $row) { ?>\n\
                                                                                         <option value="<?= $row['id_proveedor'] ?>" nombre_proveedor="<?= $row['nombre_proveedor'] ?>"><?= $row['nombre_proveedor'] ?></option>\n\
<? } ?>\n\
                                                                    </select>\n\
                                                                </td>\n\
                                                            </tr>\n\
                                                             <script>\n\
                                                                $(\'#id_proveedor_select\').change(function() { \n\
                                                                $(\'#nombre_proveedor\').val($(this).find("option:selected").attr(\'nombre_proveedor\')); \n\
                                                                });\n\
                                                                $("#id_proveedor_select").select2({\n\
                                        placeholder: {id: "", text: "Seleccione el Beneficiario"}\n\
                                    });\n\
                                    $("#nombre_proveedor_select").select2({\n\
                                        placeholder: {id: "", text: "Seleccione el Beneficiario"}\n\
                                    });\n\
                                    $(\'.select2-result\').click(function(){\n\
                                            \n\
                            })\n\
                                                                            <\/script>');
            } else {
                $('#beneficiario').empty();
                $('#beneficiario').append('<tr>\n\
                                    <td class="first"><strong>Beneficiario</strong></td>\n\
                                    <td class="last"><input name="nombre_proveedor" id="last_name" class="text" type="text" data-required="true" onkeypress="return permite(event, \'soloLetras\')"></td>\n\
                                </tr>\n\
                                <tr>\n\
                                    <td class="first" width="172"><strong>Numero de Identificacion</strong></td>\n\
                                    <td class="last">\n\
                                        <select name="pre_id_number"  style="width: 25%; float: left;">\n\
                                            <option value="RUC">RUC</option>\n\
                                            <option value="RIF">RIF</option>\n\
                                            <option value="CED">CED</option>\n\
                                            <option value="PAS">PAS</option>\n\
                                        </select>\n\
                                        <input style="width: 68%; float: left;" name="id_number_proveedor" class="text" id="id_number_proveedor" value="" type="text" data-required="true"></td>\n\
                                </tr>');
            }
        });
    });
                            </script>

                            <tbody id="beneficiario">
                                <tr class="bg">
                                    <td class="first"><strong>Beneficiario</strong></td>
                                    <td class="last"><input name="nombre_proveedor" value="<?= $instruccion['nombre_proveedor'] ?>" id="last_name" class="text" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                                </tr>
                                <tr>
                                    <td class="first" width="172"><strong>Numero de Identificacion</strong></td>
                                    <td class="last">
                                        <select name="pre_id_number"  style="width: 25%; float: left;">
                                            <option <?= $instruccion['pre_id_number'] == 'RUC' ? '_selected selected="selected"' : '' ?> value="RUC">RUC</option>
                                            <option <?= $instruccion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>
                                            <option <?= $instruccion['pre_id_number'] == 'CED' ? '_selected selected="selected"' : '' ?> value="CED">CED</option>
                                            <option <?= $instruccion['pre_id_number'] == 'PAS' ? '_selected selected="selected"' : '' ?> value="PAS">PAS</option>
                                        </select>
                                        <input style="width: 68%; float: left;" name="id_number_proveedor" class="text" id="id_number_proveedor" value="<?= $instruccion['id_number_proveedor']; ?>" type="text" data-required="true">
                                        <input name="id_proveedor" value="<?= $instruccion['id_proveedor'] ?>" type="hidden" />
                                    </td>
                                </tr>
                            </tbody>  


                            <tr>
                                <th class="full" colspan="2">Datos del Pago</th>
                            </tr>
                            <tr>
                                <td class="first"><strong>Concepto de pago</strong></td>
                                <td class="last"><input name="Concepto_pago" value="<?= $instruccion['Concepto_pago'] ?>"  class="text" type="text" data-required="true"></td>
                            </tr>
                            <tr class="bg">
                                <td class="first"><strong>Soporte</strong></td>
                                <td class="last"><input name="t_documento" value="<?= $instruccion['t_documento'] ?>"  class="text" type="text" data-required="true"></td>
                            </tr>
<input name="fecha_pago" value="<?= $instruccion['fecha_pago'] ?>"  class="text" type="hidden" data-required="true"></td>

                            <tr class="bg">
                                <td class="first"><strong>Tipo de Instrumento</strong></td>
                                <td class="last">
                                    <select name="t_instrumento" id="t_instru">
                                        <option <?= $instruccion['t_instrumento'] == 'Cheque' ? '_selected selected="selected"' : '' ?> value="Cheque">Cheque</option>
                                        <option <?= $instruccion['t_instrumento'] == 'Transferencia' ? '_selected selected="selected"' : '' ?> value="Transferencia">Transferencia</option>
                                        <option <?= $instruccion['t_instrumento'] == 'Efectivo' ? '_selected selected="selected"' : '' ?> value="Efectivo">Efectivo</option>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg">
                                <td class="first"><strong>Banco</strong></td>
                                <td class="last">
                                    <select name="id_banco" id="id_banco" <?= $instruccion['t_instrumento']=='Efectivo' ? 'disabled="disabled"' : ''?>>
                                        <option>Seleccione...</option>
                                        <? foreach ($bancos as $row) { ?>
                                        <option <?= $instruccion['id_banco'] == $row['id_banco'] ? '_selected selected="selected"' : '' ?>value="<?= $row['id_banco'] ?>" n_cuenta="<?= $row['n_cuenta'] ?>" moneda="<?= $row['moneda'] ?>"  t_banco="<?= $row['t_banco'] ?>" ><?= ucwords($row['nombre_banco']); ?></option>
                                        <? } ?>
                                    </select>
                                    <script>
    $(function() {
        $('#id_banco').change(function() {
            $('#moneda').val($(this).find("option:selected").attr('moneda'));
            $('#n_cuenta').val($(this).find("option:selected").attr('n_cuenta'));
            $('#t_banco').val($(this).find("option:selected").attr('t_banco'));

        });
    });
                                    </script>
                                </td>
                            </tr>
                            <tr>
                                <td class="first"><strong>Cuenta a Debitar</strong></td>
                                <td class="last"><input name="n_cuenta" value="<?= $instruccion['n_cuenta'] ?>" id="n_cuenta" class="text" type="text" readonly="onlyread" data-required="true"></td>
                            </tr>
                            <tr class="bg" id="moneda_select">
                                <? if ($instruccion['t_instrumento'] == 'Efectivo') { ?>
                                    <td class="first"><strong>Moneda</strong></td>
                                    <td class="last">
                                        <select name="moneda">
                                            <option <?= $instruccion['moneda'] == 'USD' ? '_selected selected="selected"' : ''?> value="USD">USD</option>
                                            <option <?= $instruccion['moneda'] == 'VEF' ? '_selected selected="selected"' : ''?> value="VEF">VEF</option>
                                        </select></td>
                                <? } else { ?>
                                    <td class="first"><strong>Moneda</strong></td>
                                    <td class="last"><input name="moneda" value="<?= $instruccion['moneda'] ?>" id="moneda" class="text" type="text" readonly="onlyread" data-required="true"></td>
                                <? } ?>
                            </tr>
<!--                            <tr class="bg">
                                <td class="first"><strong>Propietario de la Cuenta</strong></td>
                                <td class="last"><input name="t_banco" value="<?= $instruccion['t_banco'] ?>" id="t_banco" class="text" type="text" readonly="onlyread" data-required="true"></td>
                            </tr>-->
                            <tr class="bg">
                                <td class="first"><strong>Monto a Pagar</strong></td>
                                <td class="last"><input name="monto_instruccion" value="<?= $instruccion['monto_instruccion'] ?>" id="monto_instruccion" class="text" type="text" data-required="true"></td>
                            </tr>
                            <input name="n_cheque" value="<?= $instruccion['n_cheque'] ?>"  class="text" type="hidden" />

                            <tr>
                                <td class="first"><strong>ITBMS/IVA</strong></td>
                                <td class="last">
                                    <select name="iva" id="iva">
                                        <option>0</option>
                                        <? for ($i = 4; $i <= 14; $i++) { ?>
                                            <? for ($x = 0; $x <= 1; $x++) { ?>
                                                <?
                                                if ($dec) {
                                                    $j = '.5';
                                                    $dec = false;
                                                } else {
                                                    $j = '';
                                                    $dec = true;
                                                }
                                                ?>
                                                <option <?= $instruccion['iva'] == $i . $j ? '_selected selected="selected"' : '' ?> ><?= $i . $j; ?></option>
                                            <? } ?>
                                        <? } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="first"><strong>Total</strong></td>
                                <td class="last"><input name="total_monto_pagar" value="<?= $instruccion['total_monto_pagar'] ?>" id="total_monto_pagar" class="text" type="text" readonly="onlyread" data-required="true"></td>
                            </tr>

                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                    </div>
                    <script>
                        $(function() {
                            $('#iva').change(function() {
                                refresh();
                            });
                            $('#monto_instruccion').keyup(function() {
                                refresh();
                            });
                            function refresh() {
                                iva = $('#iva').find('option:selected').val();
                                monto_instruccion = $('#monto_instruccion').val();
                                total = parseFloat(monto_instruccion) + parseFloat(monto_instruccion * iva / 100);
                                $('#total_monto_pagar').val(total.toFixed(2));
                            }
                        });
                    </script>

                    <script>
                        $('#t_instru').change(function() {
                            if ($(this).find("option:selected").attr('value') != 'Efectivo') {
                                $('#id_instrumento').html($(this).find("option:selected").attr('value'));
                                $('#n_cheque').removeAttr("readonly");
                                $('#moneda').attr("readonly", "readonly");
                                $('#n_cheque').val("");

                                $('#n_cuenta').attr("data-required", "true");
                                $('#moneda').attr("data-required", "true");
                                $('#t_banco').attr("data-required", "true");
                                $('#id_banco').removeAttr("disabled");

                                $('#n_cuenta').val("");
                                $('#moneda').val("");
                                $('#id_banco').val("");
                                $('#t_banco').val("");
                                $('#moneda_select').empty();
                                $('#moneda_select').append('  <td class="first"><strong>Moneda</strong></td>\n\
                               <td class="last"><input name="moneda" value="" id="moneda" class="text" type="text" readonly="onlyread" data-required="true"></td>');

                            } else {
                                $('#moneda_select').empty();
                                $('#moneda_select').append('  <td class="first"><strong>Moneda</strong></td>\n\
                               <td class="last"><select name="moneda"><option value="USD">USD</option><option value="VEF">VEF</option></select></td>');
                                $('#n_cheque').val("N/A");
                                $('#n_cheque').attr("readonly", "readonly");

                                $('#n_cuenta').val("Efectivo");
                                $('#n_cuenta').attr("data-required", "true");

                                $('#moneda').val('');
                                $('#moneda').removeAttr("readonly");
                                $('#moneda').attr("data-required", "true");

                                $('#id_banco').val("N/A");
                                $('#id_banco').attr("disabled", "true");

                                $('#t_banco').val("N/A");
                                $('#t_banco').attr("data-required", "true");
                            }
                        });
                    </script>

                    <div style="width: 113px; margin: 0 auto;">
                        <button type="submit"  style="height: 26px; padding: 0; width: 113px;">Procesar</button>
                    </div>
                </form>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>