<? $this->load->view('templates/header') ?>


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
                <form action="./ingresos/ingresar_deposito/" method="post" class="form" style="" id="validate-form" onSubmit="return validator(this);" >

                    <table class="table_main_form">
                        <tr>
                            <td><p class="sub_tit_form">Datos del Deudor:</p></td>
                            <td></td>
                        </tr>



                        <tr class="bg">
                            <td class="first" width="172">El Deudor Existente?</td>
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
                                                            <td class="first" width="172">Nombre del Deudor:</td>\n\
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
                                    placeholder: {id: "", text: "Seleccione al Deudor"}\n\
                                });\n\
                                $("#nombre_proveedor_select").select2({\n\
                                    placeholder: {id: "", text: "Seleccione al Deudor"}\n\
                                });\n\
                                $(\'.select2-result\').click(function(){\n\
                                        \n\
                        })\n\
                                                                        <\/script>');
            } else {
                $('#beneficiario').empty();
                $('#beneficiario').append('\n\
                                                        <tr>\n\
                    <td><p>Nombre del Deudor: </p></td>\n\
                    <td><input type="text" onkeypress="return permite(event, \'soloLetras\')" data-required="true" class="text imput_form1" id="last_name" name="nombre_proveedor"></td>\n\
                </tr>\n\
                          <tr>\n\
                    <td><p>Numero de Identificacion:</p></td>\n\
                    <td><select style="width: 25%; float: left;" name="pre_id_number">\n\
                            <option value="RUC">RUC</option>\n\
                            <option value="RIF">RIF</option>\n\
                            <option value="CED">CED</option>\n\
                            <option value="PAS">PAS</option>\n\
                        </select><input type="text" data-required="true" value="" id="id_number_proveedor" class="text imput_form1" name="id_number_proveedor" style="width: 68%; float: left;"></td>\n\
                </tr>');
            }
        });
    });
                        </script>
                        <tbody id="beneficiario">

                            <tr>
                                <td><p>Nombre del Deudor: </p></td>
                                <td><input type="text" onkeypress="return permite(event, 'soloLetras')" data-required="true" class="text imput_form1" id="last_name" name="nombre_proveedor"></td>
                            </tr>
                            <tr>
                                <td><p>Numero de Identificacion:</p></td>
                                <td><select style="width: 25%; float: left;" name="pre_id_number">
                                        <option value="RUC">RUC</option>
                                        <option value="RIF">RIF</option>
                                        <option value="CED">CED</option>
                                        <option value="PAS">PAS</option>
                                    </select><input type="text" data-required="true" value="" id="id_number_proveedor" class="text imput_form1" name="id_number_proveedor" style="width: 68%; float: left;"></td>
                            </tr>
                        </tbody>
                        <tr>
                            <td colspan="2"><p class="sub_tit_form">Datos del Deposito o Transferencia:</p></td>
                        </tr>
                        <tr>
                            <td><p>Detalles del Ingreso:</p></td>
                            <td><input type="text" data-required="true" class="text imput_form1" name="detalles_concepto" />
                        </tr>
                        <tr>
                            <td><p>Soporte:</p></td>
                            <td><input type="text" data-required="true" class="text imput_form1" id="email" name="n_factura"></td>
                        </tr>
                        <tr>
                            <td><p>Tipo de Instrumento:</p></td>
                            <td>
                                <select id="t_instru" name="t_instrumento">
                                    <option value="Deposito">Deposito</option>
                                    <option value="Transferencia">Transferencia</option>
                                </select>
                                <script>
    $(function() {
        $('#t_instru').change(function() {
            if ($(this).find('option:selected').html() == 'Deposito') {
                $('.result_t_operacion').html('del Deposito');
            } else {
                $('.result_t_operacion').html('De la Transferencia');
            }
        });
    });
                                </script>
                            </td>
                        </tr>
                        <tr>
                            <td class="first">Referencia <span class="result_t_operacion">del Deposito</span></td>
                            <td class="last"><input name="n_ref" class="text imput_form1" data-required="true"></td>
                        </tr>
                        <tr>
                            <td class="first">Fecha del Deposito</td>
                            <td class="last"><input type="text" readonly="readonly" data-required="true" class="text" id="fecha_pago" name="fecha_pago"></td>
                        </tr>
                        <tr>
                            <td><p>Banco a Depositar:</p></td>
                            <td><select name="id_banco" id="id_banco">
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
                        <tr>
                            <td><p>Numero de Cuenta:</p></td>
                            <td><input name="n_cuenta" id="n_cuenta" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>
                        <tr>
                            <td><p>Moneda:</p></td>
                            <td><input name="moneda" id="moneda" class="text imput_form1" type="text" readonly="onlyread" data-required="true"></td>
                        </tr>
                        <tr>
                            <td><p>Monto Depositado:</p></td>
                            <td><input name="monto_instruccion" id="monto_instruccion" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                    </table>
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
                    <button type="button" onclick="valida_select();"  id="boton_form1">Registrar Ingreso</button>
                </div>

                <script>
                                    function valida_select() {
                                        if ($('#concepto_pago').find('option:Selected').html() == 'Seleccione...') {
                                            alert('Debe seleccionar el Concepto');
                                        } else if ($('#id_banco').find('option:Selected').html() == 'Seleccione...') {
                                            alert('Debe seleccionar el banco');
                                        } else {
                                            var $validacion = validator($('#validate-form'));
                                            if ($validacion) {
                                                $('#validate-form').submit();
                                            }

                                        }

                                    }
                </script>
            </div>
        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>