<html>
    <head></head>
    <body style="font-family: Verdana !important;">
        <div id="center-column" style="position: relative; height: 215px !important;  width: 570px !important; border: solid 1px white;" >

            <? if ($instruccion['nombre_imagen_cheque']) { ?>
                <? if (strtolower(trim($instruccion['nombre_banco'])) == 'balboa bank trust') { ?>
                    <div style="width: 570px; height: 215px;">

                        <div style="float:right; width: 187px; margin-top: 9px;">
                            &nbsp;
                        </div>
                        <p style="float: right;  text-align: center; margin-right: 10px; position: relative; width: 190px; margin-top: 8px; overflow: hidden; clear: both;  border: solid 1px white;">
                            <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                            <?= fecha($fecha[0]); ?>
                        </p>
                        <? ?>
                        <p style="font-size: 11px; text-align: center; float: left; margin-left: 52px; width: 369px; margin-top: 11px; overflow: hidden; clear: both;  border: solid 1px white;">
                            ** <?= $instruccion['nombre_proveedor']; ?> **
                        </p>

                        <p style="font-size: 11px; text-align: center; float: right; margin-right: 10px; margin-top: -29px; width: 110px; overflow: hidden; clear: both;  border: solid 1px white;">
                            <?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?>
                        </p>

                        <p style="font-size: 11px; float: left;  text-align: center; margin-left: 52px; width: 497px; margin-top: -7px; overflow: hidden; clear: both;   border: solid 1px white;">
                            <? $V = new EnLetras(); ?>
                            * <?= $V->ValorEnLetras($instruccion['total_monto_pagar'], ''); ?> *
                        </p>
                    </div>
                <? } elseif (strtolower(trim($instruccion['nombre_banco'])) == 'credicorp bank trust') { ?>
                    <!--<div style="position: relative; background: url('./images/cheques/vista_<? //echo $instruccion['nombre_imagen_cheque']; ?>') no-repeat; width: 614px; height: 297px; margin-top: 10px;">-->
                    <div style="position: relative; width: 614px; height: 215px; margin-top: 10px;">
                        <div style="float:right; width: 187px; margin-top: 10px;height: 10px;">
                            
                        </div>

                        <p style="float: right; position: relative; width: 218px; margin-top: 30px; text-align: center; overflow: hidden; clear: both;  border: solid 1px white;">
                            <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                            <?= fecha($fecha[0]); ?>
                        </p>

                        <p style="text-align: center;  font-size: 11px; float: left; margin-left: 79px; width: 360px; margin-top: 20px; overflow: hidden; clear: both; border: solid 1px white;">
                            ** <?= strtoupper($instruccion['nombre_proveedor']); ?> **
                        </p>

                        <p style=" text-align: center; font-size: 11px; float: right; margin-top: -33px; width: 100px; overflow: hidden; clear: both; border: solid 1px white; ">
                            <?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?>
                        </p>

                        <p style="font-size: 11px; float: left; text-align: center; margin-left: 10px; width: 501px; margin-top: 5px; overflow: hidden; clear: both;  border: solid 1px white;  ">
                            <? $V = new EnLetras(); ?>
                            * <?= $V->ValorEnLetras($instruccion['total_monto_pagar'], ''); ?> *
                        </p>
                    </div>
                <? } ?>
            <? } ?>
        </div>
    </body>    
</html>
