<? $this->load->view('templates/header'); ?>
<script>
    window.moveTo(0, 0);
    window.resizeTo(screen.availWidth, screen.availHeight);
</script>
<script src="js/calendario/dhtmlxcalendar.js"></script>
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script type="text/javascript">
    $(window).load(function () {
        $('body').on('focus', ".datepicker_multi_start", function () {
            $(this).datepicker({dateFormat: 'dd/mm/yy'});
        });
        $('.mensaje').delay(6000).fadeOut(300);
        $('.error').delay(6000).fadeOut(300);
    });
</script>
<style>
    .mensaje {
        background: darkseagreen none repeat scroll 0 0;
        color: white;
        font-size: 15px;
        padding: 6px 14px;
    }
    .error {
        background: red none repeat scroll 0 0;
        color: white;
        font-size: 15px;
        padding: 6px 14px;
    }
</style>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">


        <div class="workplace">


            <div style="margin: 0 auto;">
                <? if ($this->session->flashdata('result')) { ?>
                    <h4 class="mensaje"><? echo $this->session->flashdata('result'); ?></h4>
                <? } ?>
                <? if ($this->session->flashdata('error')) { ?>
                    <h4 class="error"><? echo $this->session->flashdata('error'); ?></h4>
                <? } ?>

                <h4>Seleccione Facturas a Cancelar </h4>

                <div>
                    <? foreach ($operaciones as $row) { ?>
                        <? if ($row['tipo_solicitud'] == 2) { ?>
                            <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                <table style="width: 100%; font-size: 11px; line-height: 18px; border: none; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%" >
                                    <tr>
                                        <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="14">

                                            Operacion de Venta <?= $row['n_operacion']; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sub_titulo_tabla" style="text-align: center;">N&deg; Fact.</td>
                                        <td class="sub_titulo_tabla" style="text-align: left;">Deudor</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">RUC</td>
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
                                        <td class="sub_titulo_tabla" style="text-align: center;">Status</td>
                                    </tr>
                                    <?
                                    $i = 1;

                                    $tot_val_nom = 0;
                                    $liquidado = 0;
                                    $tot_dif = 0;
                                    $tot_dif_act = 0;
                                    $tot_tot = 0;

                                    foreach ($row['facturas'] as $data_fact) {
                                        if ($data_fact['status'] != 2) {
                                            $FV = $data_fact['fecha_vencimiento'];
                                            $date2 = explode('/', $FV);
                                            $fecha_vencimiento = $date2['2'] . '-' . $date2['1'] . '-' . $date2['0'] . ' 00:00:00';
                                            $FV = date_create($fecha_vencimiento);

                                            $FE = new DateTime();
                                            $FE->format('Y-m-d H:i:s');
                                            $interval = date_diff($FE, $FV);
                                            $x = $interval->format('%R%a');

                                            if ($data_fact['status'] == 1) {
                                                $status = 'Pausado';
                                                $mora = false;
                                            } else {
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
                                            $plazo_act = date_diff(date_create($row['fecha_solicitud_aprobado']), $FE);
                                            $plazo_act = $plazo_act->format('%a');
//                                        debug($plazo_act, false);

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
                                            ?>
                                            <tr class="<?= $data_fact['status'] == 1 ? ' ' : 'operacion' ?>" id_factura="<?= $data_fact['id_factura'] ?>" dif_act="<?= $dif_act ?>" tot="<?= $tot ?>" valor_nominal="<?= $data_fact['valor_nominal'] ?>" numero_factura ="<?= $data_fact['numero_factura'] ?>"  style="<?= $mora == false ? 'color:black;' : 'color:red;' ?> <?= $data_fact['status'] == 1 ? 'background:#ffff7e;' : '' ?>" >
                                                <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?php echo $data_fact['numero_factura']; ?></td>
                                                <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="" style="text-align: left !important; font-size: 10px;"><?php echo $data_fact['deudor']; ?></td>
                                                <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?php echo $data_fact['rif']; ?></td>
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
                                                <td style="<?= $mora == false ? 'color:black;' : 'color:red;' ?>" class="contenido_numero"><?= $status; ?></td>
                                            </tr>
                                            <?
                                            $i = $i + 1;
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_numero"><b><?php echo number_format($tot_val_nom, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_numero"><b><?php echo number_format($liquidado, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_numero"><b><?php echo number_format($tot_dif, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_numero"><b><?php echo number_format($tot_dif_act, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_numero"><b><?php echo number_format($tot_tot, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"></td>
                                    </tr>
                                    <tr>
                                        <td class="contenido_td" colspan="14">&nbsp;</td>
                                    </tr>

                                </table>



                            <? } ?>
                        <? } ?>
                    <? } ?>

                </div>
                <br/>
                <p>
                    <b style="color: red;">NOTA: </b> Los datos de pago presentados a continuaci&oacute;n estan actualizados al dia
                    de <b>HOY <?= fecha(date('d-m-Y')); ?></b>, si desea hacer la cancelacion de alguna de las facturas seleccionada debera 
                    realizar el pago antes que finalice el dia y realizar la notificacion de pago, de lo contrario para el dia de ma&ntilde;    ana 
                    debera realizar el calculo nuevamente para conocer su deuda actualizada.
                </p>
                <h4>Datos del pago</h4>
                <div>
                    <table id="facturas_cancelar" style="width: 100%; font-size: 11px; line-height: 18px; border: none; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%" >

                        <tr>
                            <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="14">
                                Facturas seleccionadas para cancelar
                            </td>
                        </tr>
                        <tr>
                            <td class="sub_titulo_tabla" style="text-align: center;">N&deg; Fact.</td>
                            <td class="sub_titulo_tabla" style="text-align: left;">Deudor</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">RUC</td>
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
                            <td class="sub_titulo_tabla" style="text-align: center;">Status</td>
                        </tr>
                    </table>
                    <br/>   
                    <div style="margin: 0 20px;">
                        <table style="width: 400px;">
                            <tr>
                                <td>
                                    Total Diferencial Actual
                                </td>
                                <td>
                                    <span id="dif_act" style="float: right">0</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Total Monto 
                                </td>
                                <td>
                                    <span id="valor_nominal" style="float: right">0</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h5>Total a Pagar</h5>
                                </td>
                                <td>
                                    <h5><span id="tot" style="float: right">0</span></h5>
                                </td>
                            </tr>


                        </table>
                    </div>

                </div>
                <h4>Reportar pago</h4>
                <div>
                    <form action="./pagos/cargar_pago" enctype="multipart/form-data" method="post"  id="validate-form" onSubmit="return validator(this);" >
                        Para Notificar el pago de las facturas seleccionadas por favor envienos a traves del siguiente formulario los datos del deposito o
                        la transferencia para realizar el descuento de las mismas.

                        <table style="width: 790px;">
                            <tr>
                                <td>Monto depositado:</td>
                                <td><input id="monto_depositado" style="text-align: right;" name="monto_depositado" width="40" readonly="" type="text"  data-required="true"/></td>
                            </tr>
                            <tr>
                                <td>Fecha de pago</td>
                                <td><input type="text"  class="datepicker_multi_start" data-required="true" width="40" name="fecha_pago" id="fecha_pago_total"></td>
                            </tr>
                            <tr>
                                <td>Adjuntar recibo de deposito o Transferencia</td>
                                <td><input type="file" onlyaccept="image/gif, image/jpeg, image/png" accept="image/gif, image/jpeg, image/png"  data-required="true"  name="recibo" /></td>
                            </tr>    
                            <tr>
                                <td> 
                                    <input id="numero_facturas" name="numero_facturas" readonly="readonly" type="hidden"/>
                                    <input id="id_factura" name="id_factura" readonly="readonly" type="hidden"/>
                                </td>
                                <td>
                                    <h5><input type="submit" value="Notificar Pago" /></h5>
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>

            <script>
                $(function () {
                    $('.operacion').click(function () {
                        x = $('#numero_facturas').val();
                        y = $('#id_factura').val();

                        DifA = $('#dif_act').html();
                        ValN = $('#valor_nominal').html();
                        Tot = $('#tot').html();

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

                        dif_act = $(this).attr('dif_act');
                        valor_nominal = $(this).attr('valor_nominal');
                        tot_pagar = $(this).attr('tot');

//                        console.debug('DifA   ' + DifA + '   dif_act   ' + $(this).attr('dif_act'));
//                        console.debug('ValN   ' + ValN + '   valor_nominal   ' + $(this).attr('valor_nominal'));
//                        console.debug('Tot   ' + Tot + '   tot   ' + $(this).attr('tot'));
                        console.debug(dar_formato(
                                parseFloat(
                                        parseFloat(DifA) - parseFloat(dif_act)

                                        ).toFixed(2)
                                )
                                );
                        console.debug(parseFloat(DifA));
                        console.debug(parseFloat(dif_act));

                        if (x.indexOf($(this).attr('numero_factura')) >= 0) {
                            rowID = $(this).attr('numero_factura');
                            x = x.replace($(this).attr('numero_factura') + '; ', "");
                            y = y.replace($(this).attr('id_factura') + '; ', "");
                            $('#facturas_cancelar tr[numero_factura=' + rowID + ']').remove();
                            $(this).css('background', 'none');

                            $('#dif_act').html(dar_formato(parseFloat(parseFloat(DifA) - parseFloat(dif_act)).toFixed(2)).replace('-', '') + ' $');
                            $('#valor_nominal').html(dar_formato(parseFloat(parseFloat(ValN) - parseFloat(valor_nominal)).toFixed(2)).replace('-', '') + ' $');
                            $('#tot').html(dar_formato(parseFloat(parseFloat(Tot) - parseFloat(tot_pagar)).toFixed(2)).replace('-', '') + ' $');
                            $('#monto_depositado').val(dar_formato(parseFloat(parseFloat(Tot) - parseFloat(tot_pagar)).toFixed(2)).replace('-', ''));

                        } else {
                            x = $(this).attr('numero_factura') + '; ' + x;
                            y = $(this).attr('id_factura') + '; ' + y;
                            row = $(this).clone();

                            $('#facturas_cancelar').append(row.removeClass('operacion'));
                            $(this).css('background', '#a0ffa3');


                            $('#dif_act').html(dar_formato(parseFloat(parseFloat($(this).attr('dif_act')) + parseFloat(DifA)).toFixed(2)) + ' $');
                            $('#valor_nominal').html(dar_formato(parseFloat(parseFloat($(this).attr('valor_nominal')) + parseFloat(ValN)).toFixed(2)) + ' $');
                            $('#tot').html(dar_formato(parseFloat(parseFloat($(this).attr('tot')) + parseFloat(Tot)).toFixed(2)) + ' $');

                            $('#monto_depositado').val(dar_formato(parseFloat(parseFloat($(this).attr('tot')) + parseFloat(Tot)).toFixed(2)));
                        }
                        $('#numero_facturas').val(x);
                        $('#id_factura').val(y);
                    });
                });




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
                td {
                    border: medium none !important;
                }
            </style>
























        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>

</html>
