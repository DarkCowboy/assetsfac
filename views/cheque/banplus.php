<?
$V = new EnLetras();
$monto = strtoupper($V->ValorEnLetras(($instruccion['monto_real_pagado']), ' BOLIVARES '));
$fecha = explode(' ',fecha($instruccion['fecha_procesado']));
?>
<html>
    <head></head>
    <body style="font-family: Verdana !important;">
        <div style="position: absolute; top: 18px; right: 157px; text-align: center; width: 155px; border: 1px solid white;"><?= number_format($instruccion['monto_real_pagado'], 2, ',', '.'); ?></div>
        <div style="position: absolute; top: 82px; left: 80px; font-size: 8.5px; text-align: center; border: 1px solid white;">
            <?= strtoupper($instruccion['nombre_proveedor']); ?>
        </div>
        <div style="position: absolute; top: 102px; left: 91px; font-size: 8.2px; text-align: center; border: 1px solid white;">
            <?= $monto ?>
        </div>
        <div style="position: absolute; top: 125px; left: 20px; font-size: 8.5px; text-align: center; border: 1px solid white;">
            - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
        </div>
        <div style="position: absolute; top: 150px; left: 20px; width: 250px; font-size: 8.5px; text-align: center; border: 1px solid white;">
            CARACAS, <?= $fecha[0].' DE '.strtoupper($fecha[2]) ?> 
        </div>
        <div style="position: absolute; top: 150px; left: 268px; width: 50px; font-size: 8.5px; text-align: center; border: 1px solid white;">
           <?= $fecha[4] ?> 
        </div>
        
    </body>    
</html>
