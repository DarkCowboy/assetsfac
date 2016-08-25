<!DOCTYPE html>
<html lang="es">
    <head>
        <base href="<?php echo base_url() ?>"/>
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" />

        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./scripts/jquery-1.8.0.min.js"><'+'/script>')</script>-->
        <script type="text/javascript" src="./scripts/jquery.min.js"></script>

        <!-- Soporte para html5 en IE -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link type="text/css" href="./scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
        <script type="text/javascript" src="./scripts/lib.validator/lib.validator.js"></script>    
        <link rel="stylesheet" type="text/css" href="css/typography.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

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
            });</script>

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
            });</script>
    </head>
    <body style="background: none !important;">
        <div id="main" style="margin: 0 ;">       
            <div id="middle" style="margin: 0; padding: 0 ; float: none; width: 713px;">

                <div id="center-column"  class="mi_vista_clasica" style="float: left; margin: 0 auto; width: 704px !important; min-height: 0 !important;">
                    <div class="top-bar">
                        <br/><br/><br/>
                        <h1 style="text-align: center;">
                            <? if ($operacion['traspaso'] == '0') { ?>
                                Pago de <?= $operacion['nombre_proveedor']; ?>
                            <? } else { ?>
                                Transferencia entre Cuentas
                            <? } ?>
                        </h1>

                    </div><br/><br/>
                    <br/>
                    <table style="width: 618px; margin: 0 auto;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td>Transferencia No.</td>
                                <td>Banco</td>
                                <td>Codigo Banco</td>
                                <td>Cuenta Contable</td>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <tr>
                                <td><?= $operacion['n_cheque']; ?></td>
                                <td><?= $operacion['nombre_banco']; ?></td>
                                <td><?= $operacion['n_cuenta']; ?></td>
                                <td><?= $operacion['codigo']; ?></td>
                            </tr>

                            <tr style="border: 1px solid black;">
                                <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                            </tr>

                            <tr>
                                <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                    <?=
                                    'Detalles del concepto: ' . $operacion['detalles_concepto'] .
                                    ' <br/> Soporte: ' . $operacion['n_factura'] .
                                    ' <br/> N&deg; trasfrencia o deposito: ' . $operacion['n_cheque']
                                    ?>
                                </td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($operacion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;">Total <?= $operacion['moneda'] ?></td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($operacion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table style="width: 618px; margin: 0 auto;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td style="">Comprobante de Ingreso</td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="text-align: center;">
                                <a target="_blank" href="./ingresos/imprime_vaucher/<?= sha1($operacion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                        </tr>
                    </table>
                    <table style="width: 618px; margin: 0 auto;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 4px;" >
                            <tr>
                                <td style="width: 100%;"></td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="width: 100%; text-align: center;">
                                <img style="cursor: pointer;" onclick="parent.$.fancybox.close();" src="images/icon_menu/Atras.png" alt="Atras" title="Atras">
                                <? if ($this->rol_number == '10' || $this->rol_number == '0') { ?>
                                    <? if ($operacion['traspaso'] == '0') { ?>
                                        <img style="cursor: pointer;" id="vista_avanzada" src="images/icon_menu/vista_avanzada.png" alt="Vista Avanzada" title="Vista Avanzada">
                                    <? } ?>
                                <? } ?>
                            </td>
                        </tr>
                    </table>
                </div>



                <? if ($this->rol_number == '10' || $this->rol_number == '0') { ?>
                    <? if ($operacion['traspaso'] == '0') { ?>
                        <div class="form_main mi_vista_avanzada" style="background: none; border: none; display: none;">
                            <form action="./ingresos/editar_deposito/<?= sha1($operacion['id_instruccion']); ?>" style=" max-width: 464px; float: left;" method="post" class="form" style="" id="validate-form" onSubmit="return validator(this);" >

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
                                <td><input type="text" value="<?= $operacion['nombre_proveedor'] ?>" onkeypress="return permite(event, \'soloLetras\')" data-required="true" class="text imput_form1" id="last_name" name="nombre_proveedor"></td>\n\
                            </tr>\n\
                                      <tr>\n\
                                <td><p>Numero de Identificacion:</p></td>\n\
                                <td><select style="width: 25%; float: left;" name="pre_id_number">\n\
                                        <option <?= $operacion['pre_id_number'] == 'RUC' ? '_selected selected="selected"' : '' ?> value="RUC">RUC</option>\n\
                                                    <option <?= $operacion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>\n\
                                                    <option <?= $operacion['pre_id_number'] == 'CED' ? '_selected selected="selected"' : '' ?> value="CED">CED</option>\n\
                                                    <option <?= $operacion['pre_id_number'] == 'PAS' ? '_selected selected="selected"' : '' ?> value="PAS">PAS</option>\n\
                                                </select>\n\
                                                <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $operacion['id_number_proveedor']; ?>" type="text" data-required="true">\n\
                                                <input name="id_proveedor" value="<?= $operacion['id_proveedor'] ?>" type="hidden" />\n\
                            </tr>');
                                                }
                                            });
                                        });</script>
                                    <tbody id="beneficiario">

                                        <tr>
                                            <td><p>Nombre del Deudor: </p></td>
                                            <td><input type="text" value="<?= $operacion['nombre_proveedor'] ?>" onkeypress="return permite(event, 'soloLetras')" data-required="true" class="text imput_form1" id="last_name" name="nombre_proveedor"></td>
                                        </tr>
                                        <tr>
                                            <td><p>Numero de Identificacion:</p></td>
                                            <td><select name="pre_id_number"  style="width: 25%; float: left;">
                                                    <option <?= $operacion['pre_id_number'] == 'RUC' ? '_selected selected="selected"' : '' ?> value="RUC">RUC</option>
                                                    <option <?= $operacion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>
                                                    <option <?= $operacion['pre_id_number'] == 'CED' ? '_selected selected="selected"' : '' ?> value="CED">CED</option>
                                                    <option <?= $operacion['pre_id_number'] == 'PAS' ? '_selected selected="selected"' : '' ?> value="PAS">PAS</option>
                                                </select>
                                                <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $operacion['id_number_proveedor']; ?>" type="text" data-required="true">
                                                <input name="id_proveedor" value="<?= $operacion['id_proveedor'] ?>" type="hidden" />
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tr>
                                        <td colspan="2"><p class="sub_tit_form">Datos del Deposito o Transferencia:</p></td>
                                    </tr>
                                    <tr>
                                        <td><p>Detalles del Ingreso:</p></td>
                                        <td><input type="text" data-required="true" class="text imput_form1" value="<?= $operacion['detalles_concepto'] ?>" name="detalles_concepto" />
                                    </tr>
                                    <tr>
                                        <td><p>Soporte:</p></td>
                                        <td><input type="text" value="<?= $operacion['n_factura'] ?>" data-required="true" class="text imput_form1" id="email" name="n_factura"></td>
                                    </tr>
                                    <tr>
                                        <td><p>Tipo de Instrumento:</p></td>
                                        <td>
                                            <select id="t_instru" name="t_instrumento">
                                                <option <?= $operacion['t_instrumento'] == 'Deposito' ? '_selected selected="selected"' : '' ?> value="Deposito">Deposito</option>
                                                <option <?= $operacion['t_instrumento'] == 'Transferencia' ? '_selected selected="selected"' : '' ?> value="Transferencia">Transferencia</option>
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
                                                });</script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first">Referencia <span class="result_t_operacion">del Deposito</span></td>
                                        <td class="last"><input name="n_ref" value="<?= $operacion['n_cheque'] ?>" class="text imput_form1" data-required="true"></td>
                                    </tr>
                                    <tr>
                                        <td class="first">Fecha del Deposito</td>
                                        <? $operacion['fecha_pago'] = explode(' ', $operacion['fecha_pago']) ?>
                                        <td class="last"><input type="text" readonly="readonly"  value="<?= $operacion['fecha_pago'][0] ?>" data-required="true" class="text" id="fecha_pago" name="fecha_pago"></td>
                                    </tr>
                                    <tr>
                                        <td><p>Banco a Depositar:</p></td>
                                        <td><select name="id_banco" id="id_banco">
                                                <option n_cuenta="" moneda="">Seleccione...</option>
                                                <? foreach ($bancos as $row) { ?>
                                                    <option <?= $operacion['id_banco'] == $row['id_banco'] ? '_selected selected="selected"' : '' ?>value="<?= $row['id_banco'] ?>" n_cuenta="<?= $row['n_cuenta'] ?>" moneda="<?= $row['moneda'] ?>"  t_banco="<?= $row['t_banco'] ?>" ><?= ucwords($row['nombre_banco']); ?></option>
                                                <? } ?>
                                            </select>
                                            <script>
                                                $(function() {
                                                    $('#id_banco').change(function() {
                                                        $('#moneda').html($(this).find("option:selected").attr('moneda'));
                                                        $('#n_cuenta').html($(this).find("option:selected").attr('n_cuenta'));
                                                        $('#t_banco').val($(this).find("option:selected").attr('t_banco'));
                                                    });
                                                });</script>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><p>Numero de Cuenta:</p></td>
                                        <td><span id="n_cuenta" class="text imput_form1"><?= $operacion['n_cuenta'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><p>Moneda:</p></td>
                                        <td><span id="moneda" class="text imput_form1"><?= $operacion['moneda'] ?></span></td>
                                    </tr>
                                    <tr>
                                        <td><p>Monto Depositado:</p></td>
                                        <td><input name="monto_instruccion"  value="<?= $operacion['total_monto_pagar'] ?>" id="monto_instruccion" class="text imput_form1" type="text" data-required="true"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <br/>
                                            <div class="div_botonform1" style="display: none;">
                                                <!--<input type="reset" value="Limpiar" style="float: left;" />-->
                                                <button type="button" onclick="valida_select();"  id="boton_form1">Editar Ingreso</button>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </form>
                            <div>
                            <? } ?>
                        <? } ?>
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
                        <? if ($operacion['traspaso'] == '0') { ?>
                            <div style="display: block;  margin: 0 auto;  overflow: hidden;  width: 111px;">
                                <table>
                                    <? if ($this->rol_number == '10' || $this->rol_number == '0' || $this->rol_number == '1') { ?> 
                                        <tr style="border: solid 1px #9c9c9c;">
                                            <td><img class="editar" style="cursor: pointer" src="images/icon_menu/editar.png"></td>
                                        </tr>
                                    <? } ?>
                                    <tr style="border: solid 1px #9c9c9c;">
                                        <td><img class="cancelar"  style="cursor: pointer; display:none;" src="images/icon_menu/cancelar.png"></td>
                                    </tr>
                                    <tr style="border: solid 1px #9c9c9c;">
                                        <td><img style="cursor: pointer" onclick="window.parent.open('./ingresos/imprime_vaucher/<?= sha1($operacion['id_instruccion']); ?>', '_blank')" src="images/icon_menu/imprimir.png"></td>
                                    </tr>
                                    <? if ($this->rol_number == '10' || $this->rol_number == '0' || $this->rol_number == '1') { ?> 
                                        <tr style="border: solid 1px #9c9c9c;">
                                            <td><img onclick='return le_parece(this);' style="cursor: pointer"  src="images/icon_menu/eliminar.png"></td>
                                        </tr>
                                    <? } ?>
                                    <tr style="border: solid 1px #9c9c9c;">
                                        <td><img id="vista_clasica"  style="cursor: pointer;" src="images/icon_menu/vista_clasica.png"></td>
                                    </tr>

                                </table>
                            </div>
                        <? } ?>

                        <script>

                            function le_parece(formObj) {

                                if (confirm("Esta seguro(a) que desea eliminar esta operacion?")) {

                                    if (confirm("Confirme para eliminar la operacion...")) {
                                        console.log('as');
                                        self.location = './ingresos/elimina_ingreso/<?= sha1($operacion['id_instruccion']) ?>';
                                    }
                                }

                            }
                            $(function() {
                                $('input').attr('disabled', 'disabled');
                                $('select').attr('disabled', 'disabled');
                                $('.editar').click(function() {
                                    $('.cancelar').css('display', 'block');
                                    $('.div_botonform1').css('display', 'block');
                                    $(this).css('display', 'none');
                                    $('input').attr('enabled', 'enabled');
                                    $('input').removeAttr('disabled', 'disabled');
                                    $('select').removeAttr('disabled', 'disabled');
                                });
                                $('.cancelar').click(function() {
                                    $('.editar').css('display', 'block');
                                    $('.div_botonform1').css('display', 'none');
                                    $(this).css('display', 'none');
                                    $('input').attr('disabled', 'disabled');
                                    $('select').attr('disabled', 'disabled');
                                });

                            });

                        </script>

                        <script>
                            $(function() {
                                $('#vista_avanzada').click(function() {
                                    $('.mi_vista_clasica').css('display', 'none');
                                    $('.mi_vista_avanzada').css('display', 'block');
                                });
                                $('#vista_clasica').click(function() {
                                    $('.mi_vista_clasica').css('display', 'block');
                                    $('.mi_vista_avanzada').css('display', 'none');
                                });
                            });
                        </script>
                    </div>
                    <? $this->load->view('templates/footer') ?>
                </div>
            </div>
            <style>
                .div_botonform1{
                    border-radius: 6px !important;
                    max-width: 174px !important;
                    min-height: 50px !important;
                    overflow: hidden !important;
                    width: 100% !important;
                    float: none !important;
                    margin: 0 auto;
                }
                .table_main_form {
                    float: none !important;
                    max-width: 458px;
                }
            </style>
    </body>
</html>