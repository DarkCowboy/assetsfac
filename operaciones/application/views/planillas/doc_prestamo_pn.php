<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="css/style_mandato.css" />
    </head>
    <body>
        <div class="cuerpo">
            <p class="title">
                <b> <b>CONTRATO DE PRESTAMO MERCANTIL POR TIEMPO DETERMINADO</b>
            </p>
<!--            <br/>
            <p>
                Entre <b>ASSETS FACTORING INC</b>, sociedad mercantil domiciliada en la ciudad de Caracas, inscrita ante el 
                Registro Mercantil Segundo de la Circunscripci&oacute;n  Judicial del Distrito Capital y Estado Miranda, el 25 
                de Febrero de 2009, bajo el No. 37, Tomo 32-A-Sgdo, expediente No. 221-3428, en lo adelante denominada <b>LA ACREEDORA</b>, 
                representada en este acto por, <b>WILLIAN D. RAMIREZ M. y YAMIR JOSE URBINA</b>, Venezolanos, mayores de edad, de este
                domicilio y titulares de la C&eacute;dulas de Identidad No.<b> V-5.011.205 y V-6.728.621</b>, actuando en este acto en el car&aacute;cter de
                Directores  y debidamente facultados en el Acta de Asamblea Extraordinaria de Accionistas de la referida empresa celebrada
                el 01 de junio de 2009 e inscrita en el Registro Mercantil Segundo de la Circunscripci&oacute;n  Judicial del Distrito Capital y
                Estado Miranda, el 03 de Agosto de 2009, bajo el No. 34, Tomo 162-A-Sgdo, y <b><?= strtoupper($solicitud['nom_apell_pn']); ?></b>, de nacionalidad
                <?= $solicitud['nacionalidad_pn'] == 'v' ? 'Venezolano' : 'Extrajero'; ?>, mayor de edad, de este domicilio, y titular de la de la cedula de 
                identidad  <b><?= ucwords($solicitud['nacionalidad_pn']) . '.- ' . number_format($solicitud['cedula_pn'], '0', ',', '.'); ?></b>, 
                quien en lo en lo adelante se denominara <b>EL DEUDOR</b>,  se ha convenido en celebrar el presente <b>CONTRATO DE PRESTAMO MERCANTIL 
                    POR  TIEMPO DETERMINADO</b> por el cual EL DEUDOR declara: Que debe y pagar&aacute; sin aviso y sin protesto, en la cuidad de Caracas y en 
                moneda de curso legal, a la orden de <b>LA ACREEDORA</b>, la cantidad de <b><?
                    $V = new EnLetras();
                    echo strtoupper($V->ValorEnLetras(($solicitud['monto_solicitud_aprobado']), 'Bolivares'));
                    ?>
                    (Bs. <? echo number_format($solicitud['monto_solicitud_aprobado'], 2, ',', '.'); ?>)</b> los cuales ser&aacute;n pagados dentro del plazo de 
                <?= strtolower($V->ValorEnLetras($solicitud['plazo_solicitud'], '(' . number_format($solicitud['plazo_solicitud'], 0, '', '') . ') dias')) ?> 
                continuos contados a partir del <?= fecha($solicitud['fecha_solicitud_aprobado']) ?> hasta el <?= fecha($solicitud['fecha_vcto_solicitud_aprobado']) ?> 
                ambas fechas inclusive, cantidad esta que ha recibido <b>EL DEUDOR</b> de <b>LA ACREEDORA</b>, en calidad de pr&eacute;stamo y en dinero efectivo. <b>EL DEUDOR</b>  
                se compromete a pagar, en el plazo que se la he concedido para el reintegro total del monto aqu&iacute; convenido,   someti&eacute;ndose <b>EL DEUDOR</b> a 
                las condiciones que fije <b>LA ACREEDORA</b>. En caso que EL DEUDOR  tuviese la intenci&oacute;n de renovar el presente <b>CONTRATO DE PRESTAMO</b> a la 
                fecha de su culminaci&oacute;n, deber&aacute; 1) notificar a <b>LA ACREEDORA</b> su intenci&oacute;n de renovar el pr&eacute;stamo con por lo menos cinco (5) d&iacute;as antes 
                a la fecha de culminaci&oacute;n del termino de pago del pr&eacute;stamo original, 2) Solicitar prorroga una vez y exclusivamente por un periodo de 
                Diez (10) d&iacute;as, 3) cancelar la penalidad que estime <b>LA ACREEDORA</b>. Todos los gastos que ocasione este CONTRATO son por cuenta de <b>EL DEUDOR</b>,
                inclusive los gastos por honorarios profesionales causados de abogados respecto a la de cobranza judicial y/o extrajudicial, si se diese el caso.  En todo lo relativo al cumplimiento de este contrato, queda 
                sometido <b>EL DEUDOR</b> a los tribunales de la ciudad de Caracas. 
                <br/>
                <b>LA ACREEDORA</b> podr&aacute; considerar exigible esta obligaci&oacute;n aun cuando estuviere de plazo pendiente, cuando ocurra alguno de los siguientes casos: 
                1) si <b>EL DEUDOR</b> fuere objeto de alguna medida ejecutiva o preventiva de embargo o de prohibici&oacute;n de enajenar y gravar. 
                2) si <b>EL DEUDOR</b> incurriere en suspensi&oacute;n de pago aunque ella no fuere declarada por un tribunal. En ninguno de estos casos
                <b>LA ACREEDORA</b> est&aacute; obligado a hacer ning&uacute; tipo de descuento en virtud de la precoz exigibilidad de la operaci&oacute;n. Es 
                convenido que el plazo para el pago principal de este pr&eacute;stamo est&aacute; establecido en beneficio de <b>LA ACREEDORA</b>. 
                <br/>
                Y Nosotros, <b>WILLIAN D. RAMIREZ M. y YAMIR JOSE URBINA</b>, Venezolanos, mayores de edad, de este
                domicilio y titulares de la C&eacute;dulas de Identidad No.<b> V-5.011.205 y V-6.728.621</b>, actuando en este acto en el car&aacute;cter de
                Directores de <b>ASSETS FACTORING INC</b>, declaramos: que los recursos utilizados en la presente operaci&oacute;n de Pr&eacute;stamo son provenientes 
                de actividades y operaciones de l&iacute;cito comercio. <br/>
                En la ciudad de Caracas, <?= fecha($solicitud['fecha_solicitud_aprobado']) ?>.
                <br/>
                <br/>
                <br/>
                <br/>
            <div style="float: left; width: 48%; text-align: center;">
                <p>POR EL DEUDOR</p>
                <br/><br/>
                <p style="text-align: center;"> <b><?= strtoupper($solicitud['nom_apell_pn']); ?></b> </p>
                <br/>
                <p style="text-align: center;"> <?= ucwords($solicitud['nacionalidad_pn']) . '.- ' . number_format($solicitud['cedula_pn'], '0', ',', '.'); ?></p>

            </div>
            <div style="float: right; width: 48%;  text-align: center;">
                <p>Por  ASSETS FACTORING INC</p>
                <br/><br/>
                <p><b>Willian Ram&iacute;rez &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yamir Urbina</b></p>
            </div>-->
        </div>
    </body>
</html>            
