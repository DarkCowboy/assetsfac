<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?= $title ?></title>
        <base href="<?php echo base_url() ?>"/>
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" />
        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./scripts/jquery-1.8.0.min.js"><'+'/script>')</script>-->
        <script type="text/javascript" src="./scripts/jquery.min.js"></script>

        <!-- Soporte para html5 en IE -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="./scripts/fancybox/jquery.fancybox.css?v=2.1.2" media="screen" />
        <script type="text/javascript" src="./scripts/fancybox/jquery.fancybox.js?v=2.1.3"></script>
        <link type="text/css" href="./scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
        <script type="text/javascript" src="./scripts/lib.validator/lib.validator.js"></script>    
        <link rel="stylesheet" type="text/css" href="css/typography.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">

    </head>
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
    <body style="background: none !important;">
        <div id="main" style="margin: 0 ;">       
            <div id="middle" style="margin: 0; padding: 0 ; float: none; width: 713px;">

                <div id="center-column"  class="mi_vista_clasica" style="float: left; margin: 0 auto; width: 704px !important; min-height: 0 !important;">
                    <div class="top-bar">
                        <br/><br/><br/>
                        <h1 style="text-align: center;">
                            <? if ($instruccion['traspaso'] == '0') { ?>
                                Pago para <?= $instruccion['nombre_proveedor']; ?></h1>
                        <? } else { ?>
                            Transferencia entre cuentas
                        <? } ?>
                    </div><br/><br/>
                    <br/><? // debug($instruccion['nombre_imagen_cheque']);    ?>
                    <? if ($instruccion['t_instrumento'] == 'Cheque') { ?>
                        <? if ($instruccion['nombre_imagen_cheque']) { ?>
                            <? if (eregi('balboa', strtolower(trim($instruccion['nombre_banco'])))) { ?>
                                <div style="position: relative; background: url('./images/cheques/vista_<?= $instruccion['nombre_imagen_cheque']; ?>') no-repeat; width: 614px; height: 297px; margin:  32px auto 0;">
                                    <?
                                    $numero = strlen($instruccion['n_cheque']);
                                    $restante = 6 - $numero;
                                    for ($i = 1; $i <= $restante; $i++) {
                                        $instruccion['n_cheque'] = '0' . $instruccion['n_cheque'];
                                    }
                                    ?>
                                    <p style="position: absolute; left: 430px; top: 3px;"><?= $instruccion['n_cheque']; ?></p>

                                    <p style="position: absolute; left: 420px; top: 33px;">
                                        <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                                        <?= fecha($fecha[0]); ?>
                                    </p>

                                    <p style="left: 76px; position: absolute; text-align: center; top: 78px; width: 372px;">** <?= ucwords($instruccion['nombre_proveedor']); ?> **</p>

                                    <p style="position: absolute; left: 480px; top: 74px;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></p>

                                    <p style="position: absolute; left: 85px; top: 104px;">
                                        <? $V = new EnLetras(); ?>
                                        <?= $V->ValorEnLetras($instruccion['monto_real_pagado'], ''); ?>
                                    </p>
                                </div>
                            <? } ?>
                        <? } ?>

                        <table style="width: 618px; margin: 0 auto;">
                            <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                                <tr>
                                    <td>Cheque No.</td>
                                    <td>Banco</td>
                                    <td>Codigo Banco</td>
                                    <td>Cuenta Contable</td>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td><?= $instruccion['n_cheque']; ?></td>
                                    <td><?= $instruccion['nombre_banco']; ?></td>
                                    <td><?= $instruccion['n_cuenta']; ?></td>
                                    <td><?= $instruccion['codigo']; ?></td>
                                </tr>

                                <tr style="border: 1px solid black;">
                                    <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                                </tr>
                                <tr>
                                    <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                        <?= 'Beneficiario: ' . ucwords($instruccion['nombre_proveedor']) . '<br/> Detalles del concepto: ' . $instruccion['detalles_concepto'] . ' <br/> Soporte: ' . $instruccion['n_factura'] . ' <br/> N&deg; de cheque: ' . $instruccion['n_cheque'] ?>
                                    </td>
                                    <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></td>
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
                                    <td colspan="3" style="text-align: right;">Total <?= $instruccion['moneda'] ?></td>
                                    <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>

                        <table style="width: 618px; margin: 0 auto;">
                            <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                                <tr>
                                    <td style="width: 24.33%;">Instruccion de pago</td>
                                    <td style="width: 19.33%;">Emision de cheque</td>
                                    <td style="width: 24.33%;">Comprobante de Egreso</td>
                                    <td style="width: 33.33%;">Cheque</td>
                                </tr>
                            </thead>
                            <tr>
                                <td style="width: 24.33%; text-align: center;">
                                    <a target="_blank" href="./egresos/instruccion_pago/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>
                                <td style="width: 19.33%; text-align: center;">
                                    <a target="_blank" href="./egresos/emision_cheque/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>
                                <td style="width: 24.33%; text-align: center;">
                                    <a target="_blank" href="./egresos/comprobante_egreso/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>
                                <? if ($instruccion['nombre_imagen_cheque']) { ?>
                                    <td style="width: 33.33%; text-align: center;">
                                        <a target="_blank" href="./cheque/imprimir_cheque/<?= sha1($instruccion['id_instruccion']) ?>">
                                            <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                        </a>

                                        <a href="#divForm" id="btnForm">
                                            <img width="16" height="16" title="Anular Cheque" alt="Anular Cheque" src="images/no.png">
                                        </a>

                                    </td>
                                <? } else { ?>
                                    <td style="width: 33.33%; text-align: center;">
                                        No hay plantilla de cheque para este banco
                                    </td>
                                <? } ?>
                            </tr>
                        </table>

                    <? } else if ($instruccion['t_instrumento'] == 'Transferencia') { ?>
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
                                    <td><?= $instruccion['n_cheque']; ?></td>
                                    <td><?= $instruccion['nombre_banco']; ?></td>
                                    <td><?= $instruccion['n_cuenta']; ?></td>
                                    <td><?= $instruccion['codigo']; ?></td>
                                </tr>

                                <tr style="border: 1px solid black;">
                                    <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                                </tr>

                                <tr>
                                    <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                        <?= 'Detalles del concepto: ' . $instruccion['detalles_concepto'] . ' <br/> Soporte: ' . $instruccion['n_factura'] . ' <br/> N&deg; trasfrencia: ' . $instruccion['n_cheque'] ?>
                                    </td>
                                    <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></td>
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
                                    <td colspan="3" style="text-align: right;">Total <?= $instruccion['moneda'] ?></td>
                                    <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width: 618px; margin: 0 auto;">
                            <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                                <tr>
                                    <td style="width: 50%;">Instruccion de pago</td>
                                    <td style="width: 50%;"><? if ($instruccion['traspaso'] == '0') { ?>    
                                            Comprobante de Egreso
                                        <? } else { ?>
                                            Comprobante de Traspaso
                                        <? } ?>
                                    </td>
                                </tr>
                            </thead>
                            <tr>
                                <td style="width: 50%; text-align: center;">
                                    <a target="_blank" href="./egresos/instruccion_pago/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>
                                <td style="width: 50%; text-align: center;">
                                    <a target="_blank" href="./egresos/comprobante_egreso/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    <? } else if ($instruccion['t_instrumento'] == 'Efectivo') { ?>
                        <table style="width: 618px; margin: 0 auto;">
                            <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                                <tr>
                                    <td colspan="4" >Pago en Efectivo</td>
                                </tr>
                            </thead>
                            <tbody style="text-align: center;">
                                <tr>
                                    <td colspan="4" ></td>
                                </tr>

                                <tr>
                                    <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                        <?= $instruccion['Concepto_pago'] ?>
                                    </td>
                                    <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></td>
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
                                    <td colspan="3" style="text-align: right;">Total <?= $instruccion['moneda'] ?></td>
                                    <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <table style="width: 618px; margin: 0 auto;">
                            <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                                <tr>
                                    <!--<td style="width: 50%;">Instruccion de pago</td>-->
                                    <td style="width: 50%;"><? if ($instruccion['traspaso'] == '0') { ?>    
                                            Comprobante de Egreso
                                        <? } else { ?>
                                            Comprobante de Traspaso
                                        <? } ?>
                                    </td>
                                </tr>
                            </thead>
                            <tr>
    <!--                                <td style="width: 50%; text-align: center;">
                                    <a target="_blank" href="./egresos/instruccion_pago/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>-->
                                <td style="width: 50%; text-align: center;">
                                    <a target="_blank" href="./egresos/comprobante_egreso/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    <? } ?>
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
                                    <? if ($instruccion['traspaso'] == '0') { ?>
                                        <img style="cursor: pointer;" id="vista_avanzada" src="images/icon_menu/vista_avanzada.png" alt="Vista Avanzada" title="Vista Avanzada">
                                    <? } ?>
                                <? } ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <? if ($this->rol_number == '10' || $this->rol_number == '0') { ?>
                    <? if ($instruccion['traspaso'] == '0') { ?>
                        <div class="form_main mi_vista_avanzada" style="background: none; border: none; display: none;">
                            <form action="./egresos/editar_instruccion/<?= sha1($instruccion['id_instruccion']); ?>" style=" max-width: 464px; float: left;" method="post" class="form" id="validate-form" onSubmit="return validator(this);" >
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
                                                    <option <?= $instruccion['pre_id_number'] == 'RUC' ? '_selected selected="selected"' : '' ?> value="RUC">RUC</option>\n\
                                                    <option <?= $instruccion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>\n\
                                                    <option <?= $instruccion['pre_id_number'] == 'CED' ? '_selected selected="selected"' : '' ?> value="CED">CED</option>\n\
                                                    <option <?= $instruccion['pre_id_number'] == 'PAS' ? '_selected selected="selected"' : '' ?> value="PAS">PAS</option>\n\
                                                </select>\n\
                                                <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $instruccion['id_number_proveedor']; ?>" type="text" data-required="true">\n\
                                                <input name="id_proveedor" value="<?= $instruccion['id_proveedor'] ?>" type="hidden" />\n\
                                            </td>\n\
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
                                                    <option <?= $instruccion['pre_id_number'] == 'RUC' ? '_selected selected="selected"' : '' ?> value="RUC">RUC</option>
                                                    <option <?= $instruccion['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>
                                                    <option <?= $instruccion['pre_id_number'] == 'CED' ? '_selected selected="selected"' : '' ?> value="CED">CED</option>
                                                    <option <?= $instruccion['pre_id_number'] == 'PAS' ? '_selected selected="selected"' : '' ?> value="PAS">PAS</option>
                                                </select>
                                                <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $instruccion['id_number_proveedor']; ?>" type="text" data-required="true">
                                                <input name="id_proveedor" value="<?= $instruccion['id_proveedor'] ?>" type="hidden" />
                                            </td>
                                        </tr>
                                    </tbody>  


                                    <tr>
                                        <th class="full" colspan="2">Datos del Pago</th>
                                    </tr>
                                    <tr>
                                        <td><p>Detalles del Pago:</p></td>
                                        <td><input type="text" data-required="true" class="text imput_form1" value="<?= $instruccion['detalles_concepto'] ?>" name="detalles_concepto" />
                                    </tr>
                                    <tr class="bg">
                                        <td class="first">Soporte</td>
                                        <td class="last"><input name="n_factura" value="<?= $instruccion['n_factura'] ?>"  class="text imput_form1" type="text" data-required="true"></td>
                                    </tr>
                                    <tr class="bg">
                                        <td class="first">Fecha de Pago</td>
                                        <td class="last">
                                            <?
                                            $instruccion['fecha_pago'] = explode(' ', $instruccion['fecha_pago']);
                                            ?>
                                            <input name="fecha_pago" id="fecha_pago" value="<?= $instruccion['fecha_pago'][0] ?>"  class="text imput_form1" readonly="readonly" data-required="true"></td>
                                        </td>
                                    </tr>

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
                                    <tr class="bg">
                                        <td class="first">Monto a Pagar</td>
                                        <td class="last"><input name="monto_instruccion" value="<?= $instruccion['monto_instruccion'] ?>" id="monto_instruccion" class="text imput_form1" type="text" data-required="true"></td>
                                    </tr>
                                    <input name="n_cheque" value="<?= $instruccion['n_cheque'] ?>"  class="text imput_form1" type="hidden" />

                                    <tr>
                                        <td class="first">ITBMS/IVA</td>
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
                                    <tr>
                                        <td colspan="2">
                                            <br/>
                                            <div class="div_botonform1" style="display: none;">
                                                <!--<input type="reset" value="Limpiar" style="float: left;" />-->
                                                <button type="button" onclick="valida_select();"  id="boton_form1">Editar Pago</button>
                                            </div>
                                        </td>
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
                                        <td><img style="cursor: pointer" onclick="window.parent.open('./egresos/comprobante_egreso/<?= sha1($instruccion['id_instruccion']); ?>', '_blank')" src="images/icon_menu/imprimir.png"></td>
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

                            <script>

                                function le_parece(formObj) {

                                    if (confirm("Esta seguro(a) que desea eliminar esta operacion?")) {

                                        if (confirm("Confirme para eliminar la operacion...")) {
                                            console.log('as');
                                            self.location = './egresos/elimina_egreso/<?= sha1($instruccion['id_instruccion']) ?>';
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


                        </div>
                    <? } ?>
                <? } ?>
            </div>

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

            <? $this->load->view('templates/footer') ?>
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
    </body></html>