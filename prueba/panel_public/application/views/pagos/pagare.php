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
            $(this).datepicker({dateFormat: 'dd/mm/yy'}).datepicker("setDate", new Date());
//            $(this).datepicker().datepicker("setDate", new Date());
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

                <h4>Seleccione Pagare a Cancelar </h4>

                <div>
                    <? foreach ($operaciones as $row) { ?>
                        <? if ($row['tipo_solicitud'] == 3) { ?>
                            <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                <table style="width: 100%; font-size: 11px; line-height: 18px; border: none; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%" >
                                    <tr>
                                        <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="11">

                                            Operacion de Venta <?= $row['n_operacion']; ?>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Nominal</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">F. Liqui.</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">F. Vto.</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Plazo</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Precio</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Pagado</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Dif.</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Mora/dias</td>
                                        <!--<td class="contenido_td" style="text-align: center;">Mora/BsF.</td>-->
                                        <td class="sub_titulo_tabla" style="text-align: center;">Dif. Act.</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Total</td>
                                        <td class="sub_titulo_tabla" style="text-align: center;">Status</td>
                                    </tr>
                                    <?
                                    $i = 1;

                                    $tot_val_nom = 0;
                                    $liquidado = 0;
                                    $tot_dif = 0;
                                    $tot_dif_act = 0;
                                    $tot_tot = 0;
                                    $data_fact = $row;
//                                    debug($data_fact, false);


                                    $pagado = $row['monto_solicitud_aprobado'] * ($row['porcentaje_compra'] / 100);
                                    $dif = $row['monto_solicitud_aprobado'] - $pagado;
                                    $plazo_act = diferenciaEntreFechas(date('Y-m-d'), $row['fecha_solicitud_aprobado']);
                                    $rendimiento = number_format(((100 / $row['porcentaje_compra'] - 1) * (360 / $row['plazo_solicitud_aprobado'])) * 100, 2, '.', '');
                                    $precio = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
                                    $monto = ($row['monto_solicitud_aprobado'] * $precio);
                                    $dif_act = $row['monto_solicitud_aprobado'] - $monto;
                                    $tot = $dif_act + $pagado;
                                    $tot_nom = $tot_nom + $row['monto_solicitud_aprobado'];
                                    $tot_pag = $tot_pag + $row['monto_solicitud_aprobado'];
                                    $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];
                                    $tot_dif = $tot_dif + $dif;
                                    $tot_dif_act = $tot_dif_act + $dif_act;
                                    $tot_tot = $tot_tot + $tot;
//                                    debug($row['mora_dias'], false);
                                    if ($row['mora_dias'] > 0) {
                                        $mora = true;
                                    }
//                                    debug($mora, false);

                                    if ($row['pause'] == '1') {
                                        $status = 'Pausado';
                                        $mora = false;
                                    } else {
                                        if ($row['status'] == 3) {
                                            $status = 'Cancelado';
                                        } else if ($row['status'] == 2) {
                                            $status = 'Vigente';
                                            $mora = True;
                                        } else if ($row['status'] == 6) {
                                            $status = 'Vencido';
                                            $mora = True;
                                        }
                                    }
                                    ?>
                                    <tr class="<?= $data_fact['pause'] == 1 ? ' ' : 'operacion' ?>" id_factura="<?= $row['id_solicitud'] ?>" dif_act="<?= $dif_act ?>" tot="<?= $tot ?>" valor_nominal="<?= $row['monto_solicitud_aprobado'] ?>" numero_factura ="<?= $row['id_solicitud'] ?>"  style="<?= $mora == false ? 'color:black;' : 'color:red;' ?> <?= $row['pause'] == 1 ? 'background:#ffff7e;' : '' ?>" >
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>" class="contenido_td"><?= number_format($row['monto_solicitud_aprobado'], '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= date("d", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_solicitud_aprobado'])); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= date("d", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_vcto_solicitud_aprobado'])); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($row['plazo_solicitud_aprobado'], '0', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($row['porcentaje_compra'], 2, ',', '.'); ?>%</td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($pagado, '2', ',', '.'); ?></td> 
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($dif, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= $row['mora_dias']; ?></td>
                                        <!--<td class="contenido_numero"><?= $row['mora_monto'] ? number_format($row['mora_monto'], '2', ',', '.') : '0'; ?></td>--> 
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($dif_act, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td"><?= number_format($tot, '2', ',', '.'); ?></td>
                                        <td style="<?= $row['status'] == '2' ? 'color:black;' : 'color:red;' ?>"  class="contenido_td">
                                            <?
                                            echo $status;
                                            ?>
                                        </td>
                                    </tr>
                                    <?
                                    $i = $i + 1;
                                    ?>
<!--                                    <tr>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"><b><?php echo number_format($tot_val_nom, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"><b><?php echo number_format($liquidado, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"><b><?php echo number_format($tot_dif, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"></td>
                                        <td class="contenido_td"><b><?php echo number_format($tot_dif_act, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"><b><?php echo number_format($tot_tot, 2, ',', '.'); ?></b></td>
                                        <td class="contenido_td"></td>
                                    </tr>-->
                                    <tr>
                                        <td class="contenido_td" colspan="11">&nbsp;</td>
                                    </tr>

                                </table>

                            <? } ?>
                        <? } ?>
                    <? } ?>

                </div>
                <br/>
                <p>
                    <b style="color: red;">NOTA: </b> Los datos de pago presentados a continuaci&oacute;n estan actualizados al dia
                    de <b>HOY <?= fecha(date('d-m-Y')); ?></b>, si desea hacer la cancelacion de alguna de los pagare seleccionados debera 
                    realizar el pago antes que finalice el dia y realizar la notificacion de pago, de lo contrario para el dia de ma&ntilde;    ana 
                    debera realizar el calculo nuevamente para conocer su deuda actualizada.
                </p>
                <h4>Datos del pago</h4>
                <div>
                    <table id="facturas_cancelar" style="width: 100%; font-size: 11px; line-height: 18px; border: none; border-collapse: collapse;" border="0" cellspacing="0" cellpadding="0" width="100%" >

                        <tr>
                            <td style="text-align: left; background: #9C9C8B;  font-weight: bold;" colspan="14">
                                Pagares seleccionados para cancelar
                            </td>
                        </tr>
                        <tr>
                            <td class="sub_titulo_tabla" style="text-align: center;">Nominal</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">F. Liqui.</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">F. Vto.</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Plazo</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Precio</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Pagado</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Dif.</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Mora/dias</td>
                            <!--<td class="contenido_td" style="text-align: center;">Mora/BsF.</td>-->
                            <td class="sub_titulo_tabla" style="text-align: center;">Dif. Act.</td>
                            <td class="sub_titulo_tabla" style="text-align: center;">Total</td>
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
                    <form action="./pagos/carga_pago_pagare" enctype="multipart/form-data" method="post"  id="validate-form" onSubmit="return validator(this);" >
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

            <style>
                contenido_td{
                    text-align: right !important;
                }
            </style>
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
                            console.debug(row);

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
