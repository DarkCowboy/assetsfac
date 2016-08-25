<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>

<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">
            <? if (isset($error)) { ?>
                <div class="alert alert-error">                
                    <h4>Error!</h4>
                    <?= $error; ?> 
                </div>
            <? } ?>
            <div class="dr"><span></span></div>            

            <div class="row-fluid">
                <div class="span6" style="width: 100%;">
                    <div class="head">
                        <div class="isw-target"></div>
                        <h1>Seleccione el Archivo CSV para cargar las facturas</h1>
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid">                        

                        <div class="row-form">
                            <div class="span5"><a target="_blank" href="./Formato de Facturas ASSETS.xlsm" title="Formato de Facturas"><b>Descargue aqui</b></a> y guarde en <b>Escritorio o Documentos</b> (OPCIONAL / RECOMENDADO) el Formato 
                                Para realizar la carga de las facturas y <b>convertirlas a CSV</b>. <span style="color: red;"><b>NOTA: </b></span>Para realizar el refinanciamiento debera cargar facturas por el monto exacto o menor de 
                                la operacion a refinanciar, en el caso de que sea menor el costo, la diferencia debera ser depositada en 
                                efectivo en los numeros de cuentas de Assets Factoring INC. y presentar el Vaucher o Recibo de la Transferencia o deposito junto 
                                al nuevo lote de Facturas cargadas en este proceso.</div>
                            <div class="span7" style="float: right; display: block;float: right; margin-top: 27px; position: relative; right: 13%; width: 328px;">   
                                <form action='./facturas/refinanciar/' method='post' enctype="multipart/form-data" id="facturas_file">

                                    <input type='file' accept='doc/docx' name='sel_file' id="file"/>

                                    <input type='submit' name='submit' value='Cargar facturas' />

                                </form>
                            </div>
                            <div class="clear"></div>
                        </div> 
                        <div id="facturas_lista">
                        </div>


                    </div>
                </div> 
            </div> 

            <div class="dr"><span></span></div>

            <div class="row-fluid">
                <!-- form  -->
                <form action="./facturas/guardar_lote_refinanciar" method="post" id="validate-form" onSubmit="return valida(this);
                      ">
                    <div class="span12">                    
                        <div class="head">
                            <div class="isw-grid"></div>
                            <h1 style="margin-top: -4px;">Seleccione la Operacion a Refinanciar: 
                                <select name="rollover" id="id_solicitud" style="width: 143px;">
                                    <option>Seleccione...</option>
                                    <? foreach ($ope_activas as $row) { ?>
                                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                            <option value="<?= $row['id_solicitud']; ?>" monto="<?= $row['monto_solicitud']; ?>"><?= $row['n_operacion']; ?></option>
                                        <? } ?>
                                    <? } ?>
                                </select>
                                Monto maximo de Facturas a Presentar:
                                <input value="" id="monto_activo" readonly="readonly" style="background: none repeat scroll 0 0 transparent; height: 18px;margin-top: -2px;text-align: right;width: 93px;font-weight: bold;border: medium none;color: white;"/>
                                <script>
                                    $(function() {
                                        $('#id_solicitud').change(function() {
                                            $('#monto_activo').val($(this + 'option:selected').attr('monto'));
                                        });
                                        $(window).load(function() {
                                            $('#monto_activo').val($(this + 'option:selected').attr('monto'));
                                        });
                                    });
                                </script>
                            </h1> 
                            <div onclick="$('#validate-form').submit();" class="agregar_cupo_btn" style="float: right; cursor: pointer;">
                                <ul style="">
                                    <li style="list-style:none;"> <img width="20" src="img/icons/wb/ic_plus.png"> Aceptar y Enviar </li>
                                </ul>
                            </div>
                            <div class="agregar_cupo_btn" id="id_add_nueva" style="float: right; cursor: pointer;">
                                <ul style="">
                                    <li style="list-style:none;"> <img width="20" src="img/icons/wb/ic_plus.png"> Agregar Nueva </li>
                                </ul>
                            </div>

                            <div class="clear"></div>
                        </div>
                        <div class="block-fluid table-sorting">
                            <table cellpadding="0" cellspacing="0" width="100%" class="table" id="">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;"  width="10%">Numero</th>
                                        <th style="text-align: center;"  width="10%">Numero de Factura</th>
                                        <th style="text-align: center;"  width="28%">Deudor</th>
                                        <th style="text-align: center;"  width="10%">Rif</th>
                                        <th style="text-align: center;"  width="10%">Fecha de Emision</th>
                                        <th style="text-align: center;"  width="10%">Fecha de Vencimiento</th>
                                        <th style="text-align: center;"  width="10%">Valor Nominal</th>
                                        <th style="text-align: center;"  width="2%">ITBMS(%)</th>
                                        <th style="text-align: center;"  width="10%">Valor con ITBMS</th>
                                    </tr>
                                </thead>
                                <tbody class="body_tablas_facturas">

                                    <?
                                    if (isset($faturas)) {
                                        foreach ($faturas as $row) {
                                            ?>
                                            <tr>
                                                <td  style="text-align: center;" ><span class="eli" style="cursor: pointer; display: block; float: left; margin: 5px 4px 0 0;"><img src="img/icons/bs/ic_cancel.png" title="Eliminar Factura"></span><input value="<?= $row['numero'] ?>" type="text" name="numero[]" data-required="true" onkeypress="return permite(event, 'num')" readonly="readonly" style="width: 57% !important;text-align: center;  float: right;" /></td>
                                                <td  style="text-align: center;" ><input value="<?= $row['numero_factura'] ?>" type="text" name="numero_factura[]" data-required="true" onkeypress="return permite(event, 'num')" style="width: 82% !important;text-align: center;" /></td>
                                                <td  style="text-align: center;" ><input value="<?= $row['deudor'] ?>" type="text" name="deudor[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                                <td  style="text-align: center;" ><input value="<?= $row['rif'] ?>" type="text" name="rif[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                                <td  style="text-align: center;" ><input value="<?= $row['fecha_emision'] ?>"  placeholder="dd-mm-yyyy" name="fecha_emision[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                                <td  style="text-align: center;" ><input value="<?= $row['fecha_vencimiento'] ?>"  placeholder="dd-mm-yyyy" type="date" name="fecha_vencimiento[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                                <? if ($formato) { ?>
                                                    <? $valor_nominal = str_replace(',', '', $row['valor_nominal']) ?>
                                                    <? $valor_con_iva = str_replace(',', '', $row['valor_con_iva']) ?>
                                                    <? $iva = $row['iva'] ?>
                                                <? } else { ?>
                                                    <? $valor_nominal = str_replace(',', '.', str_replace('.', '', $row['valor_nominal'])) ?>
                                                    <? $valor_con_iva = str_replace(',', '.', str_replace('.', '', $row['valor_con_iva'])) ?>
                                                    <? $iva = str_replace(',', '.', str_replace('.', '', $row['iva'])) ?> 
                                                <? } ?>
                                                <td  style="text-align: center;" ><input value="<?= $valor_nominal ?>" class="valor_nominal" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="valor_nominal[]" style="width: 82% !important;text-align: center;"/></td>
                                                <td  style="text-align: center;" >

                                                    <select class="iva" name="iva[]" style="width: 73px !important;">
                                                        <option value="<?= $iva ?>"><?= $iva ?></option>
                                                        <option>0</option>
                                                        <? for ($i = 4; $i <= 14; $i++) { ?>
                                                            <? for ($x = 0; $x <= 1; $x++) { ?>
                                                                <?
                                                                if ($dec) {
                                                                    $j = '.50';
                                                                    $dec = false;
                                                                } else {
                                                                    $j = '.00';
                                                                    $dec = true;
                                                                }
                                                                ?>
                                                                <option value="<?= $i . $j; ?>"><?= $i . $j; ?></option>
                                                            <? } ?>
                                                        <? } ?>

                                                    </select>
                                                    <!--<input value="<?= $iva ?>" class="iva" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="iva[]" style="width: 82% !important;text-align: center;"/>-->

                                                </td>
                                                <td  style="text-align: center;" ><input value="<?= $valor_con_iva ?>" class="valor_con_iva" readonly="readonly" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="valor_con_iva[]" style="width: 82% !important;text-align: center;"/></td>                                    
                                            </tr>
                                        <? }
                                        ?>
                                    <? }
                                    ?>

                                    <tr>
                                        <td  style="text-align: center;" ></td>
                                        <td  style="text-align: center;" ></td>
                                        <td  style="text-align: center;" ></td>
                                        <td  style="text-align: center;" ></td>
                                        <td  style="text-align: center;" ></td>
                                        <td  style="text-align: center;" ><input name="result_iva_input" id="result_iva_input" type="hidden"/></td>
                                        <td  style="text-align: center;" ><span id="result_nominal"></span></td>
                                        <td  style="text-align: center;" ><span id="iva"></span></td>
                                        <td  style="text-align: center;" ><span id="result_iva"></span></td>
                                    </tr>
                                </tbody>

                            </table>


                            <div class="clear"></div>
                        </div>
                    </div>   
                </form>
                <!-- form  -->

            </div>
        </div>
    </div>   

    <script>
        $(window).load(function() {
            var totalvalor_nominal = 0;
            var totalresult_iva = 0;
            $('.valor_nominal').focus(function() {
                if ($(this).val() == "0") {
                    $(this).val('');
                }
            });


            $('.valor_nominal').each(function() {
                totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                $('#result_nominal').html(totalvalor_nominal);
            });
            $('.valor_con_iva').each(function() {
                totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                $('#result_iva').html(totalresult_iva);
                $('#result_iva_input').val(totalresult_iva.toFixed(2));
            });

            $('.iva').blur(function() {
                var totalvalor_nominal = 0;
                var totalresult_iva = 0;
                vn = $(this).parent().parent().find('.valor_nominal').val();
                vt = (parseFloat(vn) + parseFloat((vn * $(this).val()) / 100)).toFixed(2);
                $(this).parent().parent().find('.valor_con_iva').val(vt);
                $('.valor_con_iva').each(function() {
                    totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                    $('#result_iva_input').val(totalresult_iva.toFixed(2));
                    $('#result_iva').html(totalresult_iva.toFixed(2));
                });
            });

            $('.eli').click(function() {
                var totalvalor_nominal = 0;
                var totalresult_iva = 0;
                $(this).parent().parent().remove();
                $('.valor_nominal').each(function() {
                    totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                    $('#result_nominal').html(totalvalor_nominal.toFixed(2));
                });
                $('.valor_con_iva').each(function() {
                    totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                    $('#result_iva').html(totalresult_iva.toFixed(2));
                    $('#result_iva_input').val(totalresult_iva.toFixed(2));
                });

            });


            $('.valor_nominal').blur(function() {
                if ($(this).val() == "") {
                    $(this).val('0');
                }
                iva = $(this).parent().parent().find('.iva').val();
                vt = (parseFloat($(this).val()) + parseFloat((iva * $(this).val()) / 100)).toFixed(2);
                $(this).parent().parent().find('.valor_con_iva').val(vt);

                var totalvalor_nominal = 0;
                var totalresult_iva = 0;

                $('.valor_nominal').each(function() {
                    totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                    $('#result_nominal').html(totalvalor_nominal.toFixed(2));
                });
                $('.valor_con_iva').each(function() {
                    totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                    $('#result_iva_input').val(totalresult_iva.toFixed(2));
                    $('#result_iva').html(totalresult_iva.toFixed(2));
                });
            });


            $('.valor_con_iva').blur(function() {
                var totalvalor_nominal = 0;
                var totalresult_iva = 0;

                $('.valor_nominal').each(function() {
                    totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                    $('#result_nominal').html(totalvalor_nominal.toFixed(2));
                });
                $('.valor_con_iva').each(function() {
                    totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                    $('#result_iva').html(totalresult_iva.toFixed(2));
                    $('#result_iva_input').val(totalresult_iva.toFixed(2));
                });
            });

            $('#id_add_nueva').click(function() {
                document.title = '';
                var cuerpo = '<tr><td  style="text-align: center;" ><span class="eli" style="cursor: pointer; display: block; float: left; margin: 5px 4px 0 0;"><img src="img/icons/bs/ic_cancel.png" title="Eliminar Factura"></span><input type="text" name="numero[]" data-required="true" onkeypress="return permite(event, \'num\')" style="width: 57% !important;text-align: center;  float: right;" /></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input type="text" name="numero_factura[]" data-required="true" onkeypress="return permite(event, \'num\')" style="width: 82% !important;text-align: center;" /></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input type="text" name="deudor[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input type="text" name="rif[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input type="date"  placeholder="dd-mm-yyyy" name="fecha_emision[]" data-required="true"  style="width: 90% !important;text-align: left;"/></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input type="date"  placeholder="dd-mm-yyyy" name="fecha_vencimiento[]" data-required="true"  style="width: 90% !important;text-align: left;"/></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input class="valor_nominal" value="0" type="text" name="valor_nominal[]" data-required="true" onkeypress="return permite(event, \'numpunto\')" style="width: 82% !important;text-align: center;"/></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><select class="iva" name="iva[]" style="width: 73px !important;">' + document.title;
                cuerpo += '<option>0</option><? for ($i = 4; $i <= 14; $i++) { ?><? for ($x = 0; $x <= 1; $x++) { ?>' + document.title;
                        cuerpo += '<?
                                            if ($dec) {
                                                $j = '.50';
                                                $dec = false;
                                            } else {
                                                $j = '.00';
                                                $dec = true;
                                            }
                                            ?>' + document.title;
                        cuerpo += '<option value="<?= $i . $j; ?>"><?= $i . $j; ?></option><? } ?><? } ?></select></td>' + document.title;
                cuerpo += '<td  style="text-align: center;" ><input class="valor_con_iva" value="0" type="text" readonly="readonly" name="valor_con_iva[]" data-required="true" onkeypress="return permite(event, \'numpunto\')" style="width: 82% !important;text-align: center;"/></td></tr>';
                $(".body_tablas_facturas").prepend(cuerpo).first();
                var totalvalor_nominal = 0;
                var totalresult_iva = 0;

                $('.valor_nominal').each(function() {
                    totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                    $('#result_nominal').html(totalvalor_nominal);
                });


                $('.valor_con_iva').each(function() {
                    totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                    $('#result_iva_input').val(totalresult_iva.toFixed(2));
                    $('#result_iva').html(totalresult_iva);

                });
                $('.eli').click(function() {
                    var totalvalor_nominal = 0;
                    var totalresult_iva = 0;
                    $(this).parent().parent().remove();
                    $('.valor_nominal').each(function() {
                        totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                        $('#result_nominal').html(totalvalor_nominal.toFixed(2));
                    });
                    $('.valor_con_iva').each(function() {
                        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                        $('#result_iva_input').val(totalresult_iva.toFixed(2));
                        $('#result_iva').html(totalresult_iva.toFixed(2));
                    });

                });
                $('.valor_nominal').blur(function() {
                    if ($(this).val() == '') {
                        $(this).val('0');
                    }
                    iva = $(this).parent().parent().find('.iva').val();
                    vt = (parseFloat($(this).val()) + parseFloat((iva * $(this).val()) / 100)).toFixed(2);
                    $(this).parent().parent().find('.valor_con_iva').val(vt);

                    var totalvalor_nominal = 0;
                    var totalresult_iva = 0;

                    $('.valor_nominal').each(function() {
                        totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                        $('#result_nominal').html(totalvalor_nominal.toFixed(2));
                    });
                    $('.valor_con_iva').each(function() {
                        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                        $('#result_iva').html(totalresult_iva.toFixed(2));
                        $('#result_iva_input').val(totalresult_iva.toFixed(2));
                    });
                });
                $('.valor_nominal').focus(function() {
                    console.debug($(this).val());
                    if ($(this).val() == '0') {
                        $(this).val('');
                    }
                });
                $('.iva').change(function() {
                    var totalvalor_nominal = 0;
                    var totalresult_iva = 0;
                    vn = $(this).parent().parent().find('.valor_nominal').val();
                    vt = (parseFloat(vn) + parseFloat((vn * $(this).val()) / 100)).toFixed(2);
                    $(this).parent().parent().find('.valor_con_iva').val(vt);
                    $('.valor_con_iva').each(function() {
                        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                        $('#result_iva_input').val(totalresult_iva.toFixed(2));
                        $('#result_iva').html(totalresult_iva.toFixed(2));
                    });
                });


                $('.valor_con_iva').blur(function() {
                    var totalvalor_nominal = 0;
                    var totalresult_iva = 0;
                    $('.valor_nominal').each(function() {
                        totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                        $('#result_nominal').html(totalvalor_nominal.toFixed(2));
                    });
                    $('.valor_con_iva').each(function() {
                        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                        $('#result_iva_input').val(totalresult_iva.toFixed(2));
                        $('#result_iva').html(totalresult_iva.toFixed(2));
                    });
                });
            });

        });



































        function valida(form) {

            x = $('#result_iva').html();
            y = $('#monto_activo').val();
            console.log(y);
            if (y == '') {
                alert('Debe Seleccionar la operacion que desea refinanciar');
                return false;
            } else {
                if (parseFloat(x) > parseFloat(y)) {
                    alert('Recuerde que el Monto maximo de Facturas a Presenta es de ' + y);
                    return false;
                } else {
                    return validator(form);
                }
            }
        }
    </script>
</body>
<? $this->load->view('templates/footer'); ?>
</html>
