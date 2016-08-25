<? $this->load->view('templates/header') ?>
<script src="scripts/calendario/dhtmlxcalendar.js"></script>
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar.css" type="text/css"> 
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

<script type="text/javascript" >
    $(function() {

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
                <form action="./egresos/agregar_instruccion/" method="post" class="form" id="validate-form" onSubmit="return validator(this);" >
                    <table class="table_main_form">
                        <tr>
                            <td><p class="sub_tit_form">Datos del Beneficiario</p></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td class="first" width="172">Beneficiario Existente?</td>
                            <td class="last">
                                <input type="radio" class="beneficiario_exist" name="existe" value="0" checked="checked" /> No
                                <input type="radio" class="beneficiario_exist" name="existe" value="1" /> Si
                            </td>
                        </tr>

                        <script>
                            $(function() {
                                $('.beneficiario_exist').click(function() {
                                    if ($(this).val() == '1') {
                                        $('#beneficiario').empty();
                                        $('#beneficiario').append('<tr>\n\
                                                            <td class="first" width="172">Beneficiario</td>\n\
                                                            <td class="last">\n\
                                                                <select name="id_proveedor" id="id_proveedor_select">\n\
                                                                   <option>Seleccione...</option>\n\
<? foreach ($proveedores as $row) { ?>\n\
                                                                                                                                     <option value="<?= $row['id_proveedor'] ?>" nombre_proveedor="<?= strtoupper($row['nombre_proveedor']); ?>"><?= strtoupper($row['nombre_proveedor']); ?></option>\n\
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
                                        $('#beneficiario').append('\n\
                                                        <tr class="bg">\n\
                                                            <td class="first">Beneficiario</td>\n\
                                                            <td class="last"><input name="nombre_proveedor" id="last_name" class="text imput_form1" type="text" data-required="true" onkeypress="return permite(event, \'soloLetras\')"></td>\n\
                                                        </tr>\n\
                                                        <tr>\n\
                                                            <td class="first" width="172">Numero de Identificacion</td>\n\
                                                            <td class="last">\n\
                                                                <select name="pre_id_number"  style="width: 25%; float: left;">\n\
                                                                    <option value="RIF">RIF</option>\n\
                                                                    <option value="CI">CI</option>\n\
                                                                </select>\n\
                                                                <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="" type="text" data-required="true"></td>\n\
                                                        </tr>\n\
                                            <tr>\n\
                                <td class="first" width="172">Telefonos</td><td class="last">\n\
                                <input style="width: 68%; float: left;" name="telefonos_proveedor" class="text imput_form1" id="telefonos_proveedor" value="" type="text" data-required="true"></td>\n\
                            </tr><tr>\n\
                                <td class="first" width="172">Direccion Fiscal</td><td class="last">\n\
                                <input style="width: 68%; float: left;" name="direccion_proveedor" class="text imput_form1" id="direccion_proveedor" value="" type="text" data-required="true"></td>\n\
                            </tr>');
                                    }
                                });
                            });
                        </script>

                        <tbody id="beneficiario">
                            <tr class="bg">
                                <td class="first">Beneficiario</td>
                                <td class="last"><input name="nombre_proveedor" id="last_name" class="text imput_form1" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                            </tr>
                            <tr>
                                <td class="first" width="172">Numero de Identificacion</td>
                                <td class="last">
                                    <select name="pre_id_number"  style="width: 25%; float: left;">
                                        <option value="RIF">RIF</option>
                                        <option value="CI">CI</option>
                                    </select>
                                    <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="" type="text" data-required="true"></td>
                            </tr>
                            <tr>
                                <td class="first" width="172">Telefonos</td><td class="last">
                                <input style="width: 68%; float: left;" name="telefonos_proveedor" class="text imput_form1" id="telefonos_proveedor" value="" type="text" data-required="true"></td>
                            </tr>
                            <tr>
                                <td class="first" width="172">Direccion Fiscal</td>
                                <td class="last">
                                    <input style="width: 68%; float: left;" name="direccion_proveedor" class="text imput_form1" id="direccion_proveedor" value="" type="text" data-required="true"></td>

                            </tr>
                        </tbody>    


                        <tr>
                            <td><p class="sub_tit_form">Datos de Pago</p></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><p>Detalle del Pago (Descripcion):</p></td>
                            <td><input type="text" data-required="true" class="text imput_form1" value="" name="detalles_concepto" />
                        </tr>
                        <tr class="bg">
                            <td class="first">N&deg; Factura</td>
                            <td class="last"><input name="n_factura" id="email" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <tr class="bg">
                            <td class="first">N&deg; de Control de la Factura</td>
                            <td class="last"><input name="n_control_factura" id="email" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <tr class="bg">
                            <td class="first">Fecha de la Factura</td>
                            <td class="last"><input name="fecha_factura" id="fecha_factura" class="text fecha_factura" type="text" data-required="true"></td>
                        </tr>
                        <input name="fecha_elaboracion_instruccion" readonly="readonly" class="text imput_form1" type="hidden" value="<?= date('Y-m-d'); ?>" data-required="true">
                        <tr class="bg">
                            <td class="first">Tipo de Instrumento de pago</td>
                            <td class="last">
                                <select name="t_instrumento" id="t_instru">
                                    <option value="Cheque">Cheque</option>
                                    <option value="Transferencia">Transferencia</option>
                                    <option value="Efectivo">Efectivo</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="first">Banco</td>
                            <td class="last">
                                <select name="id_banco" id="id_banco">
                                    <option>Seleccione...</option>
                                    <? foreach ($bancos as $row) { ?>
                                    <option value="<?= $row['id_banco'] ?>" t_banco="<?= $row['t_banco'] ?>" n_cuenta="<?= $row['n_cuenta'] ?>" moneda="<?= $row['moneda'] ?>" ><?= $row['nombre_banco'] . ' (' . $row['t_banco'] . ')' ?></option>
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
                        <tr class="bg">
                            <td class="first">Cuenta a Debitar</td>
                            <td class="last"><input name="n_cuenta" id="n_cuenta" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>
                        <tr id="moneda_select">
                            <td class="first">Moneda</td>
                            <td class="last"><input name="moneda" id="moneda" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>
                        <tr>
                            <td class="first">Total Base Imponible</td>
                            <td class="last"><input name="monto_instruccion" id="monto_instruccion" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <tr>
                            <td class="first">Total Monto Excento</td>
                            <td class="last"><input name="monto_exento" id="monto_exento" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>

                        <input name="n_cheque" id="n_cheque" value="0" class="text imput_form1" type="hidden" >
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
                                    <option><?= $i . $j; ?></option>
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
                        compañia (Depositos o Transferencias).
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
        <style>
            .select2-container{
                width: 99% !important;
            }
        </style>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>