
<style>
    input{
        border: 1px solid #9c9c9c;
    }

    .center{
        text-align: center;
        width: 119px;
        border: solid 1px green;
    }
    .izquierda{
        text-align: left;
    }
    .derecha{
        text-align: derecha;
    }
    .main_ret_iva > table {
        width: 100%;
    }

    .td_iva_tit_ret {
        font-size: 8px;
        text-align: center;
        background: #9c9c9c;
        color:white;
        font-weight: bold;
    }

    .td_iva_body_ret > input{
        width: 100%;
        text-align: center;
        font-size: 9px;
    }
    .boton_div{
        width: 118px;
        text-align: center;
        position: absolute;
        margin-left: auto;
        margin-right: auto;
        left:0;
        right:0;
        bottom: 0;
    }
    .boton_div input{
        background: none repeat scroll 0 0 #e0ff84;
        border-color: #7ba8bd;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
        padding: 11px 15px;
    }
</style>    

<div class="main_ret_iva" style="display: none; max-width:980px; width: 100%; margin: 0 auto; ">
    <?
    $fecha = explode('-', $instruccion['fecha_factura']);
    $dia = $fecha['2'];
    $dia = explode(' ', $dia);
    $instruccion['fecha_factura'] = $dia['0'] . '-' . $fecha['1'] . '-' . $fecha['0'];
    ?>

    <table style=" width: 100%;">
        <tr><td colspan="6" style="color: white; background: #006600; font-weight: bold;  text-align: center;">Retencion de IVA</td></tr>
        <tr>
            <td style="font-weight: bold;">Comprobante N&deg;:</td>
            <td style="font-weight: bold;"><input class="center" name="ret_iva[comprobante]" value="<?= date('Yd') ?>00000000"/></td>
            <td style="font-weight: bold;">fecha de Emisi&oacute;n:</td>
            <td style="font-weight: bold;"><input class="center" name="ret_iva[f_emision]" value="<?= date('d-m-Y') ?>"/></td>
            <td style="font-weight: bold;">fecha de Entrega:</td>
            <td style="font-weight: bold;"><input class="center" name="ret_iva[f_entrega]" value="<?= date('d-m-Y') ?>"/></td>
        </tr>
        <tr>
            <td colspan="6" style="text-align: center;font-weight: bold;">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;font-weight: bold;">Periodo Fiscal A&ntilde;o</td>
            <td colspan="3" style="text-align: center;font-weight: bold;">Periodo Fiscal Mes</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center;font-weight: bold;"><input class="center" name="ret_iva[fiscal_year]" value="<?= date('Y') ?>" /></td>
            <td colspan="3" style="text-align: center;font-weight: bold;"><input class="center" name="ret_iva[fiscal_year]" value="<?= date('m') ?>" /></td>
        </tr>
    </table>
    <table style=" width: 100%;">
        <tr>
            <td class="td_iva_tit_ret" style="width: 24px;">OPER</td>
            <td class="td_iva_tit_ret" style="width: 42px;">FECHA FACTURA</td>
            <td class="td_iva_tit_ret" style="width: 41px;">N&deg; FACTURA</td>
            <td class="td_iva_tit_ret" style="width: 41px;">N&deg; CONTROL FACTURA</td>
            <td class="td_iva_tit_ret" style="width: 41px;">N&deg; NOTA DEBITO</td>
            <td class="td_iva_tit_ret" style="width: 41px;">N&deg; NOTA CREDITO</td>
            <td class="td_iva_tit_ret" style="width: 41px;">N&deg; FACTURA AFECTADA</td>
            <td class="td_iva_tit_ret" style="width: 51px;">TOTAL COMPRA INCLUYENDO IVA</td>
            <td class="td_iva_tit_ret" style="width: 51px;">COMPRAS SIN DERECHO A CREDITO FISCAL</td>
            <td class="td_iva_tit_ret" style="width: 51px;">BASE IMPONIBLE</td>
            <td class="td_iva_tit_ret" style="width: 46px;">% ALICUOTA</td>
            <td class="td_iva_tit_ret" style="width: 51px;">IMPUESTO IVA</td>
            <td class="td_iva_tit_ret" style="width: 51px;">IVA RETENIDO</td>
        </tr>
        <tr>
            <td class="td_iva_body_ret"><input name="ret_iva[operacion]" class="operacion" value="1" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[ri_fecha_factura]" class="fecha_factura" value="<?= $instruccion['fecha_factura'] ?>" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[ri_n_factura]" class="n_factura" value="<?= $instruccion['n_factura'] ?>" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[ri_n_control_factura]" class="n_control" value="<?= $instruccion['n_control_factura'] ?>" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[n_n_debito]" class="n_n_debito" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[n_n_credito]" class="n_n_credito" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[n_factura_afectada]" class="n_factura_afectada" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[total_compra_civa]" class="total_compra_civa" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[compra_sdcf]" class="compra_sdcf" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[base_imponible]" class="base_imponible" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[alicuota]" class="alicuota" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[impuesto_iva]" class="impuesto_iva" value="" /></td>
            <td class="td_iva_body_ret"><input name="ret_iva[iva_retenido]" class="iva_retenido" value="" /></td>
        </tr>
    </table>
</div>


<div class="main_ret_isrl" style="display: none; max-width:980px; width: 100%; margin: 0 auto;">
    <table class="table tabla_isrl" style=" width: 100%;">
        <thead>
            <tr><td colspan="8" style="color: white; background: #006600; font-weight: bold; text-align: center;">Retencion de ISLR</td></tr>
            <tr>
                <td class="td_iva_tit_ret">Factura N&deg;</td>
                <td class="td_iva_tit_ret">Fecha de Emision</td>
                <td class="td_iva_tit_ret">Fecha de Retencion</td>
                <td class="td_iva_tit_ret" style="width: 212px;">Concepto</td>
                <td class="td_iva_tit_ret">Monto Objeto de Retencion</td>
                <td class="td_iva_tit_ret">% de Retencion</td>
                <td class="td_iva_tit_ret">Sustraendo</td>
                <td class="td_iva_tit_ret">Monto Retenido</td>
            </tr>
        </thead>

        <tbody>

            <tr>
                <td class="td_iva_body_ret"><input name="ret_isrl[is_n_factura]" class="n_factura" value="<?= $instruccion['n_factura'] ?>" /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[is_fecha_emision]" class="fecha_emision" value="<?= $instruccion['fecha_factura'] ?>" /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[fecha_retencion]" value="<?= date("d-m-Y") ?>" class="fecha_retencion"  /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[concepto_ret]" class="concepto_ret"  /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[monto_ob_retencion]" class="monto_ob_retencion"  /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[porc_retencion]" class="porc_retencion"  /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[sustraendo]" class="sustraendo"  /></td>
                <td class="td_iva_body_ret"><input name="ret_isrl[monto_retenido]" class="monto_retenido"  /></td>                           
            </tr>

        </tbody>

    </table>
</div>

<div class="boton_div">
    <input value="Procesar Pago" type="submit" /> 
</div>
<script>
    $(function() {
        document.MyForm.reset();
    });

    var alicuota = <?= $instruccion['iva'] ?>;
    var total_compra_civa = <?= $instruccion['total_monto_pagar'] ?>;
    var base_imponible = <?= $instruccion['monto_instruccion'] ?>;
    var impuesto_iva = base_imponible * alicuota / 100;
    var iva_retenido = impuesto_iva * 0.75;
    var monto_ob_retencion = <?= $instruccion['monto_instruccion'] ?>;
    var concepto_ret = "<?= $instruccion['detalles_concepto'] ?>";
    var sustraendo = $('.sustraendo').val();

    $('.ret_iva').click(function() {



        if ($(this).val() == '1') {
            $('.main_ret_iva').css('display', 'block');

            $('.total_compra_civa').val(total_compra_civa.toFixed(2));
            $('.alicuota').val(alicuota.toFixed(2) + "%");
            $('.base_imponible').val(base_imponible.toFixed(2));
            $('.impuesto_iva').val(impuesto_iva.toFixed(2));
            $('.iva_retenido').val(iva_retenido.toFixed(2));
        } else {
            $('.main_ret_iva').css('display', 'none');
        }
    });


    $('.ret_isrl').click(function() {
        if ($(this).val() == '1') {
            $('.main_ret_isrl').css('display', 'block');

            $('.monto_ob_retencion').val(monto_ob_retencion.toFixed(2));
            $('.concepto_ret').val(concepto_ret);

        } else {
            $('.main_ret_isrl').css('display', 'none');
        }
    });

    $('.tabla_isrl').on({blur: function() {
            if ($(this).val() != "") {
                x = $(this).val();
                x = x.replace('%', "");
                if (sustraendo == "" || sustraendo == null) {
                    sustraendo = 0;
                    $('.sustraendo').val(sustraendo);
                }
                monto_retenido = ((monto_ob_retencion * x) / 100) - sustraendo;
                $('.monto_retenido').val(monto_retenido.toFixed(2));
                $('.porc_retencion').val(x + "%");
            }
        }}, "input.porc_retencion");


    $('.tabla_isrl').on({blur: function() {
            if ($(this).val() != "") {
                sustraendo = $(this).val();
            } else {
                $(this).val('0');
                sustraendo = 0;
            }

            porc_retencion = $('.porc_retencion').val();
            if (porc_retencion == "" || porc_retencion == null) {
                $('.porc_retencion').val('0%');
            } else {
                porc_retencion = porc_retencion.replace('%', "");
            }
            monto_retenido = ((monto_ob_retencion * porc_retencion) / 100) - sustraendo;
            $('.monto_retenido').val(monto_retenido.toFixed(2));
            $('.porc_retencion').val(x + "%");
        }}, "input.sustraendo");

</script>
