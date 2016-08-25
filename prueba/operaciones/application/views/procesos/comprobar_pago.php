<? ?>

<html>

    <head>
        <base href="<?= base_url(); ?>" >
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
        <script type="text/javascript" src="js/jquery.numberformatter-1.2.3.min.js"></script>
        <script src="js/calendario/dhtmlxcalendar.js"></script>
        <script type="text/javascript" >
            $(function () {
                myCalendar = new dhtmlXCalendarObject(["fecha_pago_total", "fecha_pago_ref"], true, {isYearEditable: true, isMonthEditable: true});
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

        <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
        <link rel="stylesheet" href="js/calendario/dhtmlxcalendar.css" type="text/css"> 
        <link rel="stylesheet" href="js/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

        <link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
        <style>
            h1 {
                font-size: 16px;
                line-height: 37px;
                margin: 0 auto;
                color: #475d68;
                text-shadow: 0 1px 0 #fff;
                background: #8eacb7 none repeat scroll 0 0;
                color: #fff;
                text-shadow: none;
                font-family: Arial Unicode MS;
                text-align: center;
            }
            body {
                font-family: Arial Unicode MS;
            }

            p {
                font-size: 11px;
                line-height: 9px;
            }

            #motivo_div > span {
                font-size: 14px;
            }
        </style>
    </head>



    <?
    $pagado = $operacion['monto_solicitud_aprobado'] * ($operacion['porcentaje_compra'] / 100);
    $dif = $operacion['monto_solicitud_aprobado'] - $pagado;
    $plazo_act = diferenciaEntreFechas(date('Y-m-d'), $operacion['fecha_solicitud_aprobado']);
    $rendimiento = number_format(((100 / $operacion['porcentaje_compra'] - 1) * (360 / $operacion['plazo_solicitud_aprobado'])) * 100, 2, '.', '');
    $precio = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
    $monto = ($operacion['monto_solicitud_aprobado'] * $precio);
    $dif_act = $operacion['monto_solicitud_aprobado'] - $monto;
    $tot = $dif_act + $pagado;
    $tot_nom = $tot_nom + $operacion['monto_solicitud_aprobado'];
    $tot_pag = $tot_pag + $pagado;
    $tot_mora_bs = $tot_mora_bs + $operacion['mora_monto'];
    $tot_dif = $tot_dif + $dif;
    $tot_dif_act = $tot_dif_act + $dif_act;
    $tot_tot = $tot_tot + $tot;
    ?>
    <body>


        <? if ($operacion['tipo_solicitud'] == 2) { ?>

            <div style="max-width: 784px; margin: 0 auto;">
                <h1>Finalizar Operacion</h1>

                <div>
                    <table style="width: 100%; font-size: 11px; line-height: 18px;">
                        <tr>
                            <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="11">

                                Operacion de Venta <?= $operacion['n_operacion']; ?>

                            </td>
                        </tr>


                        <tr>
                            <td class="titulo_tabla" style="text-align: left;" colspan="11">Seleccione las facturas Pagadas</td>
                        </tr>
                        <tr>
                            <td class="sub_titulo_tabla" style="text-align: center;">N&deg; Fact.</td>
                            <!--<td class="sub_titulo_tabla" style="text-align: left;">Deudor</td>-->
                            <!--<td class="sub_titulo_tabla" style="text-align: center;">RUC</td>-->
                            <td class="sub_titulo_tabla" style="text-align: center;">Emision</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Vencimiento</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Monto</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Plazo</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Precio</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Pagado</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Dif.</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Mora/Dias</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Dif. Act.</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Total deuda</td>
                            <!--<td class="sub_titulo_tabla" style="text-align: center;">Status</td>-->
                            <!--<td class="sub_titulo_tabla">MONTO CON ITBMS</td>-->
                        </tr>
                        <?
                        $i = 1;

                        $tot_val_nom = 0;
                        $liquidado = 0;
                        $tot_dif = 0;
                        $tot_dif_act = 0;
                        $tot_tot = 0;



                            $count_fact = 0;
                        foreach ($operacion['facturas'] as $data_fact) {
                            if ($data_fact['status'] != 2) {
                                $count_fact = $count_fact + 1;
//                                debug($count_fact, false);
                                $FV = $data_fact['fecha_vencimiento'];
                                $date2 = explode('/', $FV);
                                $fecha_vencimiento = $date2['2'] . '-' . $date2['1'] . '-' . $date2['0'] . ' 00:00:00';
                                $FV = date_create($fecha_vencimiento);

                                $FE = new DateTime();
                                $FE->format('Y-m-d H:i:s');
                                $interval = date_diff($FE, $FV);
                                $x = $interval->format('%R%a');

                                if (strpos($x, '+') === false) {
                                    $mora_dias = str_replace('-', '', $x);
                                    if ($data_fact['status'] == 3) {
                                        $status = 'Cancelado';
                                    } else {
                                        $status = 'Vencido';
                                        $mora = True;
                                    }
                                } else {
                                    $mora_dias = 0;
                                    if ($data_fact['status'] == 3) {
                                        $status = 'Cancelado';
                                    } else {
                                        $status = 'Vigente';
                                        $mora = false;
                                    }
                                }

                                if ($data_fact['status'] == 1) {
                                    $FE = NULL;
                                    $FE = $data_fact['fecha_pausado'];
                                    $date1 = explode('/', $FE);
                                    $fecha_emision = $date1['2'] . '-' . $date1['1'] . '-' . $date1['0'] . ' 00:00:00';
                                    $FE = date_create($fecha_emision);
//                                            debug($FE, false);;
                                }


                                $dif = $data_fact['valor_nominal'] - $data_fact['liquidado_compra'];
                                $plazo_act = date_diff(date_create($operacion['fecha_solicitud_aprobado']), $FE);
                                $plazo_act = $plazo_act->format('%a');

                                $pagado = $data_fact['liquidado_compra'];
//                                                                $rendimiento = $data_fact['rendimiento_compra'];

                                $rendimiento = number_format(((100 / $data_fact['precio_compra'] - 1) * (360 / $data_fact['plazo_compra'])) * 100, 2, '.', '');



                                $precio_actual = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
                                $monto = ($data_fact['valor_nominal'] * $precio_actual);


                                $dif_act = $data_fact['valor_nominal'] - $monto;
                                $tot = $dif_act + $data_fact['valor_nominal'];
                                $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];



                                $tot_tot = $tot_tot + $tot;
                                $tot_dif_act = $tot_dif_act + $dif_act;
                                $tot_dif = $dif + $tot_dif;
                                $liquidado = $liquidado + $data_fact['liquidado_compra'];
                                $tot_val_nom = $tot_val_nom + $data_fact['valor_nominal'];
                                $fecha_pago = $data_fact['fecha_pausado'];
                                ?>
                                <tr class="<?= $data_fact['status'] == 1 ? 'operacion' : '' ?>" id_factura="<?= $data_fact['id_factura'] ?>" monto_diferencial="<?= $dif_act ?>" tot="<?= $tot ?>" monto_capital="<?= $data_fact['valor_nominal'] ?>" numero_factura ="<?= $data_fact['numero_factura'] ?>" style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>  <?= $data_fact['status'] == 1 ? 'background:#ffff7e;' : '' ?>" >
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?php echo $data_fact['numero_factura']; ?></td>
                                    <!--<td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td" style="text-align: left !important; font-size: 10px;"><?php echo text_limit($data_fact['deudor'], 20); ?></td>-->
                                    <!--<td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $data_fact['rif']; ?></td>-->
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $data_fact['fecha_emision']; ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $data_fact['fecha_vencimiento']; ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($data_fact['valor_nominal'], 2, ',', '.'); ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo $data_fact['plazo_compra'] ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo $data_fact['precio_compra'] ?>%</td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($data_fact['liquidado_compra'], 2, ',', '.'); ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($dif, 2, ',', '.'); ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?= $mora_dias ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($dif_act, 2, ',', '.'); ?></td>
                                    <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?php echo number_format($tot, 2, ',', '.'); ?></td>
                                    <!--<td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?= $status; ?></td>-->
                                    <!--<td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"></td>-->
                                </tr>
                                <?
                                $i = $i + 1;
                            }
                        }
                        ?>

                        <tr>
                            <!--<td class="contenido_td"></td>-->
                            <td class="contenido_td"></td>
                            <td class="contenido_td"></td>
                            <!--<td class="contenido_td"></td>-->
                            <td class="contenido_td"></td>
                            <td class="contenido_numero"><b><?php echo number_format($tot_val_nom, 2, ',', '.'); ?></b></td>
                            <td class="contenido_td"></td>
                            <td class="contenido_td"></td>
                            <td class="contenido_numero"><b><?php echo number_format($liquidado, 2, ',', '.'); ?></b></td>
                            <td class="contenido_numero"><b><?php echo number_format($tot_dif, 2, ',', '.'); ?></b></td>
                            <td class="contenido_td"></td>
                            <td class="contenido_numero"><b><?php echo number_format($tot_dif_act, 2, ',', '.'); ?></b></td>
                            <td class="contenido_numero"><b><?php echo number_format($tot_tot, 2, ',', '.'); ?></b></td>
                            <!--<td class="contenido_td"></td>-->
                            <!--<td class="contenido_td"></td>-->
                        </tr>


                    </table>
                </div>
                <div>
                    <div id="motivo_div" >
                        <h4>Datos del pago:</h4>
                        <div id="pago_total" style="border: 1px solid transparent; display: block">
                            <form autocomplete="off" method="post" action="./comprobar_pago/registra_pago_facturas/<?= $id_cliente; ?>" id="validate-form" onSubmit="return validator(this);">
                                <input value="<?= $operacion['id_solicitud'] ?>" name="id_solicitud" hidden="hidden" style="display: none; visibility: hidden;" >
                                <input value="<?= $count_fact ?>" name="count_fact" hidden="hidden" style="display: none; visibility: hidden;" >
                                <input value="<?= $operacion['n_operacion'] ?>" name="n_operacion" hidden="hidden" style="display: none; visibility: hidden;" >
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-size: 14px;">Facturas a Finalizar</td>
                                        <td><input id="numero_facturas" name="numero_facturas" data-required="true" readonly="readonly" type="text"/></td>
                                        <td rowspan="6" style="font-size: 14px; text-align: center">
                                            <div style="height: 129px; overflow-y: scroll;">
                                                <?
                                                foreach ($operacion['facturas'] as $row) {
                                                    if ($row['nombre_recibo']) {
                                                        ?>

                                                        <a href="<?= base_url() . '/recibos/' . $row['nombre_recibo']; ?>" target="_blank"> 
                                                            Ver Recibo pago Factura N&deg; <?= $row['numero_factura']; ?>
                                                        </a>
                                                        <br/>

                                                        <?
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">Monto Diferencial Pagado</td>
                                        <td><input id="monto_diferencial" name="monto_diferencial" class="numeric" value="0,00" data-required="true" placeholder="0,00"  type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">Monto Capital Pagado</td>
                                        <td><input id="monto_capital" name="monto_capital" class="numeric" value="0,00" placeholder="0,00"  type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">Monto tatal depositado por el cliente</td>
                                        <td><input id="monto_depositado" name="monto_depositado" readonly="readonly" value="0,00" class="numeric" data-required="true" placeholder="0,00"  type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td >Fecha de pago</td>
                                        <td><input id="fecha_pago_total" name="fecha_pago" value="" data-required="true" type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input id="id_factura" name="id_factura" readonly="readonly" type="hidden"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" value="Finaliza la operacion" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                        <? // debug($operacion['facturas']); ?>

                    </div>
                </div>
            </div>



            <script>
                $('.operacion').click(function () {
                    x = $('#numero_facturas').val();
                    y = $('#id_factura').val();

                    DifA = $('#monto_diferencial').val();
                    ValN = $('#monto_capital').val();
                    Tot = $('#monto_depositado').val();

                    DifA = DifA.replace('$', '');
                    DifA = DifA.replace('.', '');
                    DifA = DifA.replace('.', '');
                    DifA = DifA.replace('.', '');
                    DifA = DifA.replace('.', '');
                    DifA = DifA.replace(/\,/i, '.');

                    ValN = ValN.replace('$', '');
                    ValN = ValN.replace('.', '');
                    ValN = ValN.replace('.', '');
                    ValN = ValN.replace('.', '');
                    ValN = ValN.replace('.', '');
                    ValN = ValN.replace(/\,/i, '.');

                    Tot = Tot.replace('$', '');
                    Tot = Tot.replace('.', '');
                    Tot = Tot.replace('.', '');
                    Tot = Tot.replace('.', '');
                    Tot = Tot.replace('.', '');
                    Tot = Tot.replace(/\,/i, '.');

                    dif_act = $(this).attr('monto_diferencial');
                    valor_nominal = $(this).attr('monto_capital');
                    tot_pagar = $(this).attr('monto_depositado');
                    tot_pagar_full = $(this).attr('tot');


                    if (x.indexOf($(this).attr('numero_factura')) >= 0) {
                        x = x.replace($(this).attr('numero_factura') + '; ', "");
                        y = y.replace($(this).attr('id_factura') + '; ', "");
                        $(this).css('background', '#ffff7e');

                        $('#monto_diferencial').val(dar_formato(parseFloat(parseFloat(DifA) - parseFloat(dif_act)).toFixed(2)).replace('-', ''));
                        $('#monto_capital').val(dar_formato(parseFloat(parseFloat(ValN) - parseFloat(valor_nominal)).toFixed(2)).replace('-', ''));
                        $('#monto_depositado').val(dar_formato(parseFloat(parseFloat(Tot) - parseFloat(tot_pagar_full)).toFixed(2)).replace('-', ''));

                    } else {
                        x = $(this).attr('numero_factura') + '; ' + x;
                        y = $(this).attr('id_factura') + '; ' + y;
                        $(this).css('background', '#a0ffa3');

                        $('#monto_diferencial').val(dar_formato(parseFloat(parseFloat(DifA) + parseFloat(dif_act)).toFixed(2)).replace('-', ''));
                        $('#monto_capital').val(dar_formato(parseFloat(parseFloat(ValN) + parseFloat(valor_nominal)).toFixed(2)).replace('-', ''));
                        $('#monto_depositado').val(dar_formato(parseFloat(parseFloat(Tot) + parseFloat(tot_pagar_full)).toFixed(2)).replace('-', ''));
                    }
                    $('#numero_facturas').val(x);
                    $('#id_factura').val(y);
                });
            </script>
















        <? } else { ?>

<? // debug($operacion); ?>


            <div style="max-width: 784px; margin: 0 auto;">
                <h1>Finalizar Operacion</h1>

                <div>
                    <div id="motivo_div" style="float: left; width: 60%;">
                        <br/>
                        <br/>
                        <h4>Datos del pago:</h4>
                        <div id="pago_total" style="border: 1px solid transparent; display: block">
                            <form autocomplete="off" method="post" action="./comprobar_pago/registra_pago/<?= $id_cliente; ?>" id="validate-form" onSubmit="return validator(this);">
                                <input value="<?= $operacion['id_solicitud'] ?>" name="id_solicitud" hidden="hidden" style="display: none; visibility: hidden;" >
                                <input value="<?= $dif_act ?>" name="dif_actual" hidden="hidden" style="display: none; visibility: hidden;" >
                                <table>
                                    <tr>
                                        <td style="font-size: 14px;">Monto Diferencial Pagado</td>
                                        <td><input id="monto_diferencial" name="monto_diferencial" class="numeric" data-required="true" placeholder="0,00"  type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">Monto Capital Pagado</td>
                                        <td><input id="monto_capital" name="monto_capital" class="numeric" placeholder="0,00"  type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">Monto tatal depositado por el cliente</td>
                                        <td><input id="monto_depositado" name="monto_depositado" readonly="readonly" class="numeric" data-required="true" placeholder="0,00"  type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td style="font-size: 14px;">Fecha de pago</td>
                                        <td><input id="fecha_pago_total" name="fecha_pago" data-required="true" type="text"/></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><input type="submit" value="Finaliza la operacion" /></td>
                                    </tr>
                                </table>
                            </form>
                        </div>

                    </div>

                    <div style="width: 35%; float: left; border: 1px solid transparent;  display: block">
                        <h4>Datos de la Operacion</h4>
                        <div>
                            <p>Tipo de Operacion: <?
                                if ($operacion['tipo_solicitud'] == 2) {
                                    echo 'Venta';
                                } else if ($operacion['tipo_solicitud'] == 3) {
                                    echo 'Pagare';
                                } else {
                                    echo 'Prestamo';
                                }
                                ?></p>
                            <p>Numero de Operacion: <?= $operacion['n_operacion']; ?></p>
                            <p>Fecha de solicitud: <?= $operacion['fecha_solicitud']; ?></p>
                            <p>Fecha de Liquidacion: <?= date("d/m/Y", strtotime($operacion['fecha_solicitud_aprobado'])); ?></p>
                            <p>Fecha de Vencimiento: <?= date("d/m/Y", strtotime($operacion['fecha_vcto_solicitud_aprobado'])); ?></p>
                            <p>Plazo aprobado: <?= $operacion['plazo_solicitud_aprobado']; ?> dias</p>
                            <p>Monto aprobado: <?= number_format($operacion['monto_solicitud_aprobado'], 2, ',', '.'); ?></p>
                            <p>Precio de compra: <?= number_format($operacion['porcentaje_compra'], 2, ',', '.'); ?>%</p>
                            <p>diferencial actual: <?= number_format($dif_act, '2', ',', '.'); ?></p>
                            <p><a href="<?= base_url() . '/recibos/' . $operacion['nombre_recibo']; ?>" target="_blank">Ver Recibo de Pago</a></p>
                        </div>
                    </div>
                </div>
            </div>
        <? } ?>
    </body>


</html>



<script>
    $(function () {

        $('#monto_capital').click(function () {
            x = $(this).val();
            if (x == '0,00') {
                $(this).val('');
            }
        });

        $('#monto_capital').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0,00');
            }
            refresh();
        });
        $('#monto_diferencial, #monto_capital, #monto_depositado').priceFormat({
            prefix: '',
            suffix: ''

        });
        $('#monto_diferencial, #monto_capital, #monto_depositado').keyup(function () {
            refresh();
        });

    })

    function refresh() {

        x = $('#monto_diferencial').val();
        y = $('#monto_capital').val();

        x = x.replace('.', '');
        x = x.replace('.', '');
        x = x.replace('.', '');
        x = x.replace(/\,/i, '.');

        y = y.replace('.', '');
        y = y.replace('.', '');
        y = y.replace('.', '');
        y = y.replace(/\,/i, '.');

        if (y == '') {
            y = 0;
        }
        if (x == '') {
            x = 0;
        }
        console.clear();
        console.debug('x= ' + x);
        console.debug('y= ' + y);
        z = parseFloat(x) + parseFloat(y);

        console.debug('z= ' + z);
        $('#monto_depositado').val(dar_formato(z.toFixed(2)));
    }

    function dar_formato(num) {
        var cadena = "";
        var aux;
        var cont = 1, m, k;
        if (num < 0)
            aux = 1;
        else
            aux = 0;
        num = num.toString();
        for (m = num.length - 1; m >= 0; m--) {
            cadena = num.charAt(m) + cadena;
            if (cont % 3 == 0 && m > aux)
                cadena = "." + cadena;
            else
                cadena = cadena;
            if (cont == 3)
                cont = 1;
            else
                cont++;
        }
        cadena = cadena.replace('..', ',');
        return cadena;
    }


</script>
<style>
    .operacion{
        cursor: pointer;
    }
</style>
