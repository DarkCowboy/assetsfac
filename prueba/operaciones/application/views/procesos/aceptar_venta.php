<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <script type="text/javascript" src="js/scripts/jquery.min.js"></script>
    <link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
    <script src="js/calendario/dhtmlxcalendar.js"></script>
    <link rel="stylesheet" href="js/calendario/dhtmlxcalendar.css" type="text/css"> 
    <link rel="stylesheet" href="js/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

    <script type="text/javascript" >
        $(function () {

            myCalendar = new dhtmlXCalendarObject(["fecha_solicitud_aprobado", "fecha_vcto"], true, {isYearEditable: true, isMonthEditable: true});
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

            <div class="titulo">
                PROCESAR VENTA
            </div>
            <form action="" method="post">
                <p>Cambiar Rendimiento de Compra:  <input value="" name="rendimiento" /><input type="submit" value="Cambiar" /></p>
            </form>
            <form action="./clientes/aceptar_solicitud_v/<?= $id_solicitud; ?>" id="validate-form" onSubmit="return valida(this);" method="post">
                <div class="contenido" style="width: 781px !important">

                    <table cellpadding="0" cellspacing="0" width="720px" class="table" id="" style="margin: 0 auto; width: 780px;">
                        <thead>
                            <tr>
                                <!--<th style="text-align: center;"  width=""></th>-->
                                <!--<th style="text-align: center;"  width="5%"></th>-->
                                <th style="text-align: center;"  width="">N&deg;Factura</th>
                                <th style="text-align: center;"  width="">Deudor</th>
                                <!--<th style="text-align: center;"  width="11%">RUC</th>-->
                                <th style="text-align: center;"  width="">Emision</th>
                                <th style="text-align: center;"  width="">Vencimiento</th>
                                <th style="text-align: center;"  width="">Nominal</th>
                                <th style="text-align: center;"  width="">Plazo</th>
                                <th style="text-align: center;"  width="">Rendimiento</th>
                                <th style="text-align: center;"  width="">Precio</th>
                                <th style="text-align: center;"  width="">Desembolso</th>
                            </tr>
                        </thead>
                        <tbody class="body_tablas_facturas">
                            <?
                            $tot_desembolso = 0;
                            $solicitado = 0;
                            $plazo_lote = 0;
                            foreach ($facturas as $row) {
                                ?>
                                    <? if ($row['status'] == '0') { ?>
                                    <tr>
                                        <?
                                        $FE = $row['fecha_emision'];
                                        $date1 = explode('/', $FE);

                                        $FV = $row['fecha_vencimiento'];
                                        $date2 = explode('/', $FV);
                                        $fecha_emision = $date1['2'] . '-' . $date1['1'] . '-' . $date1['0'] . ' 00:00:00';
                                        $fecha_vencimiento = $date2['2'] . '-' . $date2['1'] . '-' . $date2['0'] . ' 00:00:00';
//                                        debug($fecha_vencimiento);
                                        
                                        $FE = date_create($fecha_emision);
                                        $FV = date_create($fecha_vencimiento);
                                        $FE = new DateTime();
                                        $FE->format('Y-m-d H:i:s');
                                        
                                        $hoy = date('Y-m-d').' 00:00:00';
                                        $Fh = date_create($hoy);
                                        $Fh = new DateTime();
                                        $Fh->format('Y-m-d H:i:s'); 
//                                        debug($FE, false);
//                                        debug($FV);
                                        $interval = date_diff($Fh, $FV);
//                                        debug($Fh, false);
//                                        debug($FV, false);
//                                    debug($interval);

                                        $x = $interval->format('%a');



                                        //nueva logica de negocio
                                        if ($rendimiento) {
                                            $rendimiento = $rendimiento;
                                        } else {
                                            $rendimiento = 0.5217;
                                        }
                                        
                                        $plazo = $x;
                                        if ($plazo > $plazo_lote) {
                                            $plazo_lote = $plazo;
                                        }
                                        $precio = number_format(((1 / (1 + (($rendimiento * $plazo) / 360))) * 100), 2, '.', '');
                                        $monto = (($row['valor_nominal'] * $precio) / 100);
                                        $tot_desembolso = $monto + $tot_desembolso;
                                        $solicitado = $row['valor_nominal'] + $solicitado;


                                        // fin nueva logica de negocio
                                        ?>
                                        <!--<td  style="text-align: center;" ><span id_fac ="<?= $row['id_factura'] ?>" class="eli" style="cursor: pointer; display: block; float: left; margin: 5px 4px 0 0;"><img class="icon_elimina" src="images/general/rechazada.png" width="16" title="Eliminar Factura"><img class="icon_add" src="images/general/ic_ok.png" width="16" title="Agregar Factura" style="display: none;"></span></td>-->
                                        <!--<td  style="text-align: center;" ><input class="numero" value="<?= $row['numero'] ?>" type="text" name="numero[]" data-required="true" onkeypress="return permite(event, 'num')" style="width: 100% !important;text-align: center;  " /></td>-->
                                        <td  style="text-align: center;" ><?= $row['numero_factura'] ?></td>
                                        <td  style="text-align: center;" ><?= $row['deudor'] ?></td>
                                        <!--<td  style="text-align: center;" ><?= $row['rif'] ?></td>-->
                                        <td  style="text-align: center;" ><?= $row['fecha_emision'] ?></td>
                                        <td  style="text-align: center;" ><?= $row['fecha_vencimiento'] ?></td>
                                        <td  style="text-align: center;" ><?= $row['valor_nominal'] ?></td>
                                        <td  style="text-align: center;" ><?= $plazo ?></td>
                                        <td  style="text-align: center;" ><?= $rendimiento ?></td>
                                        <td  style="text-align: center;" ><?= $precio ?>%</td>
                                        <td  style="text-align: center;" ><?= number_format($monto,2,',','.') ?></td>
                                    </tr>
                                        <input type="hidden" value="<?= $row['id_factura'] ?>" name="facturas[id_factura][]" />
                                        <input type="hidden" value="<?= $plazo ?>" name="facturas[plazo_compra][]" />
                                        <input type="hidden" value="<?= $rendimiento ?>" name="facturas[rendimiento_compra][]" />
                                        <input type="hidden" value="<?= $precio ?>" name="facturas[precio_compra][]" />
                                        <input type="hidden" value="<?= number_format($monto,2,',','.') ?>" name="facturas[liquidado_compra][]" />
                                <? } ?>
                            <? } ?>

                            <? $precio_lote = $tot_desembolso * 100 / $solicitado ?>
                            <tr>
                                <!--<td  style="text-align: center;" ></td>-->
                                <!--<td  style="text-align: center;" ></td>-->
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <!--<td  style="text-align: center;" ></td>-->
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ><input id="result_iva_input" type="hidden"/></td>
                                <td  style="text-align: center;" ><b><span id="result_nominal"></span></b></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ><b><?= number_format($tot_desembolso,2,',','.'); ?></b></td>
                            </tr>
                        </tbody>

                    </table>


                    <div class="bloque_izquierdo" style="min-height:170px;">
                        <div class="contenido_marcos">
                            <h4>Monto Solicitud:</h4> 
                            <? if (@$planilla["monto_solicitud_aprobado"] == "0.00" || @$planilla["monto_solicitud_aprobado"] == "") { ?>
                                <input value="<?= @$planilla["monto_solicitud"]; ?>"  readonly="readonly" type="text" name="monto_solicitud_aprobado" style="width: 100%;" data-required="true" onkeypress="return permite(event, 'num')" />
                            <? } else { ?>
                                <input value="<?= @$planilla["monto_solicitud_aprobado"]; ?>" readonly="readonly" type="text" name="monto_solicitud_aprobado" style="width: 100%;" data-required="true" onkeypress="return permite(event, 'num')" />
                            <? } ?>


                            <h4>Porcentaje en Compra:</h4> 
                            <input class="required" value="<?= number_format($precio_lote, 2, '.', ',') ?>%" type="text" name="porcentaje_compra" style="width: 20%;" data-required="true" onkeypress="return permite(event, 'numpunto')" />

                            <h4>Plazo en dias a pagar:</h4> 
                            <input class="required" value="<?= $plazo_lote ?>" type="text" name="plazo_solicitud_aprobado" style="width: 10%;" data-required="true" onkeypress="return permite(event, 'num')" />

                            <h4>N&deg; de Comite:</h4> 
                            <input class="required" value="" type="text" name="num_comite" style="width: 100%;" data-required="true" onkeypress="return permite(event, 'num')" />
                            <h3>Monto a liquidar: <?= number_format($tot_desembolso,2,',','.') ?></h3> 

                        </div>
                    </div>
                    <div class="bloque_derecho" style="min-height:170px;">
                        <div class="contenido_marcos">
                            <h4 style="line-height: 1;">Seleccione a los Codeudores:</h4> 
                            <? foreach ($planilla['nomina_accionista'] as $row) { ?>
                                <div class="evenRow">
                                    <input type="checkbox" class="codeudor" name="avales[]id_nom_accionista[]" value="<?= $row['id_nom_accionista']; ?>" /> <?= $row['nom_raz_na']; ?>
                                </div>

                                <script>

                                    function valida(form) {

                                        var check = $("input[type='checkbox']:checked").length;
                                        if (check == "") {
                                            $(".evenRow").addClass('error');
                                            mostrarError();
                                            $('.msgErrorValidator').html('Debe Seleccionar al menos un Codeudor');
                                            error = 1;
                                            return false;
                                        } else {
                                            $(".evenRow").removeClass('error');
                                            return validator(form);
                                        }
                                    }

                                </script>

                                </br>
                            <? } ?>
                        </div>
                    </div>
                </div>





                <input class="boton" type="submit" value="Aceptar Venta de Facturas" style=";">
            </form>

            <script defer src="js/facturas/script_listar.js"></script>


            <script>

                                    function refresh1() {
                                        console.log('estoy en refresh1');
                                        var precio = 0;
                                        var monto = 0;
                                        var rendimiento = 0;
                                        var tefectiva = 0;
                                        var plazo = $('#plazo').val();
                                        var nominal = $('#nominal').val();
                                        nominal = nominal.replace('.', '');
                                        nominal = nominal.replace('.', '');
                                        nominal = nominal.replace('.', '');
                                        nominal = nominal.replace(/\,/i, '.');
                                        var precio = $('#precio').val();
                                        precio = precio.replace('%', '');
                                        precio = precio.replace('.', '');
                                        precio = precio.replace('.', '');
                                        precio = precio.replace('.', '');
                                        precio = precio.replace(/\,/i, '.');
//        precio = ((1 / (1+((0.5217*plazo)/360)))*100).toFixed(2);
                                        monto = ((nominal * precio) / 100).toFixed(2);
                                        rendimiento = (((100 / (precio) - 1) * (360 / plazo)) * 100).toFixed(2);
                                        dif = nominal - monto;
                                        rendimiento = (((100 / (precio) - 1) * (360 / plazo)));
                                        x = (360 / plazo);
                                        y = (1 + (rendimiento / x));
                                        tefectiva = (((Math.pow(y, x) - 1) * 100)).toFixed(2);
                                        ganancia = ((monto * rendimiento)).toFixed(2);
                                        sfinal = (parseFloat(monto) + parseFloat(ganancia)).toFixed(2);
                                        $('#precio').val(dar_formato(precio) + '%');
                                        $('#monto').val(dar_formato(monto));
                                        $('#inversion').val(dar_formato(monto));
                                        $('#rendimiento').val(dar_formato((rendimiento * 100).toFixed(2)) + '%');
                                        $('#tefectiva').val(dar_formato(tefectiva) + '%');
                                        $('#ganancia').val(dar_formato((dif).toFixed(2)));
                                        $('#sfinal').val(dar_formato(sfinal));
                                    }

            </script>

        </div>
    </body>
</html>