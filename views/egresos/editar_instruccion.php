<? $this->load->view('templates/header') ?>
<script src="scripts/calendario/dhtmlxcalendar.js"></script>
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar.css" type="text/css"> 
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

<script type="text/javascript" >
    $(function () {

        myCalendar = new dhtmlXCalendarObject(["fecha_factura"], true, {isYearEditable: true, isMonthEditable: true});
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
    $(document).ready(function () {
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
        <? $this->load->view('templates/menu_left'); ?>
        <div id="middle">
            <?
            if ($this->session->flashdata('result')) {
                echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                echo $this->session->flashdata('result');
                echo "</div>";
            }
            ?>
            <div class="form_main">
                <form action="./egresos/editar_instruccion/<?= sha1($instruccion['id_instruccion']); ?>/1" method="post" class="form" id="validate-form" onSubmit="return validator(this);" >
                    <table class="table_main_form">
                        <tr>
                            <td><p class="sub_tit_form">Datos del Beneficiario</p></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="first" width="172">Beneficiario Existente?</td>
                            <td class="last">
                                <input type="radio" class="beneficiario_exist" name="existe" value="0"  /> No
                                <input type="radio" class="beneficiario_exist" name="existe" value="1" checked="checked"/> Si
                            </td>
                        </tr>

                        <script>
                            $(function () {
                                $('.beneficiario_exist').click(function () {
                                    if ($(this).val() == '1') {
                                        $('#beneficiario').empty();
                                        $('#beneficiario').append('<tr>\n\
                                                                <td class="first" width="172">Beneficiario</td>\n\
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
                                    <td class="first">Beneficiario</td>\n\
                                    <td class="last"><input name="nombre_proveedor" id="last_name" class="text imput_form1" value="<?= $instruccion['nombre_proveedor'] ?>" type="text" data-required="true" onkeypress="return permite(event, \'soloLetras\')"></td>\n\
                                </tr>\n\
                                <tr>\n\
                                <td class="first" width="172">Numero de Identificacion</td>\n\
                                <td class="last">\n\
                                    <select name="pre_id_number"  style="width: 25%; float: left;">\n\
                                        <option <?= $instruccion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>\n\
                                        <option <?= $instruccion['pre_id_number'] == 'CI' ? '_selected selected="selected"' : '' ?> value="CI">CI</option>\n\
                                    </select>\n\
                                    <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $instruccion['id_number_proveedor']; ?>" type="text" data-required="true">\n\
                                    <input name="id_proveedor" value="<?= $instruccion['id_proveedor'] ?>" type="hidden" />\n\
                                </td>\n\
                            </tr>\n\\n\
                            <tr>\n\
                                <td class="first" width="172">Telefonos</td><td class="last">\n\
                                <input style="width: 68%; float: left;" name="telefonos_proveedor" class="text imput_form1" id="telefonos_proveedor" value="<?= $instruccion['telefonos_proveedor'] ?>" type="text" data-required="true"></td>\n\
                            </tr><tr>\n\
                                <td class="first" width="172">Direccion Fiscal</td><td class="last">\n\
                                <input style="width: 68%; float: left;" name="direccion_proveedor" value="<?= $instruccion['direccion_proveedor'] ?>" class="text imput_form1" id="direccion_proveedor" value="" type="text" data-required="true"></td>\n\
                            </tr>');
                                    }
                                });
                            });
                        </script>

                        <tbody id="beneficiario">
                            <tr class="bg">
                                <td class="first">Beneficiario</td>
                                <td class="last"><input name="nombre_proveedor" value="<?= $instruccion['nombre_proveedor'] ?>" id="last_name" class="text imput_form1" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                            </tr>
                            <tr>
                                <td class="first" width="172">Numero de Identificacion</td>
                                <td class="last">
                                    <select name="pre_id_number"  style="width: 25%; float: left;">
                                        <option <?= $instruccion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>
                                        <option <?= $instruccion['pre_id_number'] == 'CI' ? '_selected selected="selected"' : '' ?> value="CI">CI</option>
                                    </select>
                                    <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $instruccion['id_number_proveedor']; ?>" type="text" data-required="true">
                                    <input name="id_proveedor" value="<?= $instruccion['id_proveedor'] ?>" type="hidden" />
                                </td>
                            </tr>
                        </tbody>  

                        <? // debug($instruccion); ?>
                        <tr>
                            <th class="full" colspan="2">Datos del Pago</th>
                        </tr>
                        <tr>
                            <td><p>Detalles del Pago:</p></td>
                            <td><input type="text" data-required="true" class="text imput_form1" value="<?= $instruccion['detalles_concepto'] ?>" name="detalles_concepto" />
                        </tr>
                        <tr class="bg">
                            <td class="first">N&deg; Factura</td>
                            <td class="last"><input name="n_factura" value="<?= $instruccion['n_factura'] ?>" id="n_factura" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <tr class="bg">
                            <td class="first">N&deg; de Control de la Factura</td>
                            <td class="last"><input name="n_control_factura" value="<?= $instruccion['n_control_factura'] ?>" id="n_control_factura" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <tr class="bg">
                            <td class="first">Fecha de la Factura</td>
                            <td class="last"><input name="fecha_factura" value="<?= $instruccion['fecha_factura'] ?>" id="fecha_factura" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <input name="fecha_elaboracion_instruccion" value="<?= $instruccion['fecha_elaboracion_instruccion'] ?>"  class="text imput_form1" type="hidden" data-required="true"></td>

                        <tr class="bg">
                            <td class="first">Tipo de Instrumento</td>
                            <td class="last">
                                <select name="t_instrumento" id="t_instru">
                                    <option <?= $instruccion['t_instrumento'] == 'Cheque' ? '_selected selected="selected"' : '' ?> value="Cheque">Cheque</option>
                                    <option <?= $instruccion['t_instrumento'] == 'Transferencia' ? '_selected selected="selected"' : '' ?> value="Transferencia">Transferencia</option>
                                    <option <?= $instruccion['t_instrumento'] == 'Efectivo' ? '_selected selected="selected"' : '' ?> value="Efectivo">Efectivo</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="bg">
                            <td class="first">Banco</td>
                            <td class="last">
                                <select name="id_banco" id="id_banco" <?= $instruccion['t_instrumento'] == 'Efectivo' ? 'disabled="disabled"' : '' ?>>
                                    <option>Seleccione...</option>
                                    <? foreach ($bancos as $row) { ?>
                                        <option <?= $instruccion['id_banco'] == $row['id_banco'] ? '_selected selected="selected"' : '' ?>value="<?= $row['id_banco'] ?>" n_cuenta="<?= $row['n_cuenta'] ?>" moneda="<?= $row['moneda'] ?>"  t_banco="<?= $row['t_banco'] ?>" ><?= ucwords($row['nombre_banco']); ?></option>
                                    <? } ?>
                                </select>
                                <script>
                                    $(function () {
                                        $('#id_banco').change(function () {
                                            $('#moneda').val($(this).find("option:selected").attr('moneda'));
                                            $('#n_cuenta').val($(this).find("option:selected").attr('n_cuenta'));
                                            $('#t_banco').val($(this).find("option:selected").attr('t_banco'));

                                        });
                                    });
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td class="first">Cuenta a Debitar</td>
                            <td class="last"><input name="n_cuenta" value="<?= $instruccion['n_cuenta'] ?>" id="n_cuenta" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>
                        <tr class="bg" id="moneda_select">
                            <? if ($instruccion['t_instrumento'] == 'Efectivo') { ?>
                                <td class="first">Moneda</td>
                                <td class="last">
                                    <select name="moneda">
                                        <option <?= $instruccion['moneda'] == 'USD' ? '_selected selected="selected"' : '' ?> value="USD">USD</option>
                                        <option <?= $instruccion['moneda'] == 'VEF' ? '_selected selected="selected"' : '' ?> value="VEF">VEF</option>
                                    </select></td>
                            <? } else { ?>
                                <td class="first">Moneda</td>
                                <td class="last"><input name="moneda" value="<?= $instruccion['moneda'] ?>" id="moneda" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                            <? } ?>
                        </tr>
<!--                            <tr class="bg">
                            <td class="first">Propietario de la Cuenta</td>
                            <td class="last"><input name="t_banco" value="<?= $instruccion['t_banco'] ?>" id="t_banco" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>-->
                        <tr class="bg">
                            <td class="first">Total Base Imponible</td>
                            <td class="last"><input name="monto_instruccion" value="<?= $instruccion['monto_instruccion'] ?>" id="monto_instruccion" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>

                        <tr>
                            <td class="first">Total Monto Excento</td>
                            <td class="last"><input name="monto_exento" value="<?= $instruccion['monto_exento'] ?>" id="monto_exento" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <input name="n_cheque" value="<?= $instruccion['n_cheque'] ?>"  class="text imput_form1" type="hidden" />

                        <tr>
                            <td class="first">IVA</td>
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
                            <td class="first">Total</td>
                            <td class="last"><input name="total_monto_pagar" value="<?= $instruccion['total_monto_pagar'] ?>" id="total_monto_pagar" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>


                    </table>
                    <p>&nbsp;</p>
                    <script>
                        $(function () {
                            $('#iva').change(function () {
                                refresh();
                            });
                            $('#monto_instruccion').keyup(function () {
                                refresh();
                            });
                            $('#monto_exento').keyup(function () {
                                refresh();
                            });
                            function refresh() {
                                iva = $('#iva').find('option:selected').val();
                                monto_instruccion = $('#monto_instruccion').val();
                                monto_exento = $('#monto_exento').val();

                                if (iva == '') {
                                    iva = 0;
                                } else if (monto_instruccion == '') {
                                    monto_instruccion = 0;
                                } else if (monto_exento == '') {
                                    monto_exento = 0;
                                }

                                total = parseFloat(monto_exento) + parseFloat(monto_instruccion) + parseFloat(monto_instruccion * iva / 100);
                                $('#total_monto_pagar').val(total.toFixed(2));
                            }
                        });
                    </script>

                    <script>
                        $('#t_instru').change(function () {
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
                                $('#moneda_select').append('  <td class="first">Moneda</td>\n\
                               <td class="last"><input name="moneda" value="" id="moneda" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>');

                            } else {
                                $('#moneda_select').empty();
                                $('#moneda_select').append('  <td class="first">Moneda</td>\n\
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
                </form>
                <div class="tips_form1">
                    <p style="font-weight: bold;color: #747474;font-size: 10px;margin: 16px 0 0 0;">
                        <img src="images/icons/tips.png" style="margin: -6px 4px 0 8px; float: left;"/>
                        Tips Informativo:
                    </p>  
                    <p>&nbsp;</p>
                    <p style="text-align: center; color: #747474;">
                        Registre aqui todas las entradas de
                        dinero a las cuentas bancarias de la
                        compa&ntilde;ia (Depositos o Transferencias).
                    </p>
                    <p>&nbsp;</p>
                    <p style="text-align: center; color: #747474;">
                        Para consultar depositos
                        realizados en los meses pasados
                        ingrese en el Panel principal
                        y luego en Consultas.
                        o haga Click aqui!
                    <p>&nbsp;</p>
                </div>
                <div class="div_botonform1">
                    <!--<input type="reset" value="Limpiar" style="float: left;" />-->
                    <button type="button" onclick="valida_select();"  id="boton_form1">Registrar Pago</button>
                </div>

                <script>
                    function valida_select() {
                        var $validacion = validator($('#validate-form'));
                        if ($validacion) {
                            $('#validate-form').submit();
                        }
                    }
                </script>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>