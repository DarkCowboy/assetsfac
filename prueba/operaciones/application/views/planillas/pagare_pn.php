<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="css/style_mandato.css" />
    </head>
    <body>
        <div class="cuerpo" style="text-align: justify; font-family: Arial; font-size: 11pt; line-height: 18px;">

            <p class="title" style="font-family: Arial; font-size: 11pt;">
                <b><b>PAGARE</b>
                    <? // debug($planilla); ?>
            </p>
            <br/>
            <p>
                <b>Numero:</b> <?= $planilla['n_operacion']; ?>
            </p>
            <p>
                <b>Lugar y Fecha de Emisi&oacute;n:</b> Panam&aacute;, <?
                if ($planilla['fecha_solicitud_aprobado'] == '1899-11-30 00:00:00' || $planilla['fecha_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha(@$planilla['fecha_solicitud_aprobado']);
                }
                ?>
            </p>
            <p>
                <b>Vencimiento:</b> <?
                if ($planilla['fecha_vcto_solicitud_aprobado'] == '1899-11-30 00:00:00' || $planilla['fecha_vcto_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha(@$planilla['fecha_vcto_solicitud_aprobado']);
                }
                ?>
            </p> 
            <p>
                <b>Valor:</b> USD. <? echo number_format($planilla['monto_solicitud_aprobado'], 2, ',', '.'); ?>
            </p>
            <br>    
            
            <p>
                Por  VALOR RECIBIDO, Yo <b><?= strtoupper($planilla['nom_apell_pn']); ?></b>, <?
                if ($planilla['sexo_pn'] == 'Varon') {
                    echo 'Varon';
                } else {
                    echo 'Mujer';
                }
                ?>, <?
                if (strstr(strtolower($planilla['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA') {
                    if ($planilla['sexo_pn'] == 'Varon') {
                        echo 'Paname&ntilde;o';
                    } else {
                        echo 'Paname&ntilde;a';
                    }
                } else {
                    echo $planilla['nacionalidad_pn'];
                }
                ?>, mayor de edad, <?
                if ($planilla['sexo_pn'] == 'Varon') {
                    echo 'vecino';
                } else {
                    echo 'vecina';
                }
                ?> de la provincia de Panam&aacute;, 
                con <? if(strstr(strtolower($planilla['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA'){
                            echo 'c&eacute;dula de identidad personal n&uacute;mero';
                        }else{ 
                            echo 'Pasaporte n&uacute;mero'; } ?> <?= $planilla['cedula_pn']; ?>, y para este acto, en adelante <b>EL DEUDOR</b>, y 
                            <b><?= strtoupper($planilla['nom_apell_codeudor'])?></b>, <?= $planilla['genero_codeudor'] ?>, 
                <?
                if (strstr(strtolower($planilla['nacionalidad_codeudor']), 'paname') || strtoupper($planilla['nacionalidad_codeudor'])== 'PA') {
                    if ($planilla['genero_codeudor'] == 'Varon') {
                        echo 'Paname&ntilde;o';
                    } else if ($planilla['genero_codeudor'] == 'Mujer') {
                        echo 'Paname&ntilde;a';
                    }
                } else {
                    echo $planilla['nacionalidad_codeudor'];
                } 
                ?>, 
                mayor de edad, con <?
                if (strstr(strtolower($planilla['nacionalidad_codeudor']), 'paname') || strtoupper($planilla['nacionalidad_codeudor'])== 'PA') {
                    echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                } else {
                    echo 'pasaporte n&uacute;mero ';
                }
                ?> 
                <?= $planilla['cedula_codeudor']; ?>, actuando en su propio 
                nombre y representaci&oacute;n en adelante EL <b>CODEUDOR SOLIDARIO</b> se obligan incondicionalmente a pagar a la orden de  ASSETS  FACTORING INC.., 
                sociedad an&oacute;nima organizada de conformidad con las leyes de la Rep&uacute;blica 
                de Panam&aacute;, inscrita a la ficha 832669, documento 2593450 de la
                Secci&oacute;n de Micropel&iacute;culas (Mercantil), del Registro P&uacute;blico, en adelante EL ACREEDOR, la suma de 
                USD  (<? echo number_format($planilla['monto_solicitud_aprobado'], 2, ',', '.'); ?>) moneda de curso legal 
                de los Estados Unidos de Am&eacute;rica.
            </p>
            <br>    
            <p>
                En caso de ejecuci&oacute;n, se tendr&aacute; por correcta, l&iacute;quida y exigible la suma que <b>EL ACREEDOR</b> se&ntilde;ale en la demanda que <b>EL DEUDOR</b>
                Y <b>EL CODEUDOR SOLIDARIO</b>  le deben en concepto de capital e intereses y, a partir de la fecha de presentaci&oacute;n de la demanda, 
                la tasa de inter&eacute;s ser&aacute; el permitido por la ley. 
            </p>
            <br>    
            <p>
                El importe de este pagar&eacute; y sus intereses se pagar&aacute;n en d&oacute;lares, moneda de curso legal de los Estados Unidos de Am&eacute;rica, y no en otra
                moneda, en fondos disponibles de inmediato, libres de cualquier tasa, impuesto, carga, gravamen o imposici&oacute;n fiscal.  La deuda 
                representada por este pagar&eacute; podr&aacute; ser declarada exigible a su vencimiento y ser requerido judicial o extrajudicialmente su pago total,
                incluyendo intereses, costas y gastos de cobranzas.
            </p> 
            <br>    
            <p>
                El hecho de que el tenedor no exija el cumplimiento de cualquiera de las obligaciones aqu&iacute; estipuladas, no podr&aacute; interpretarse como una renuncia al
                derecho de exigirlas cuando a bien lo tenga.
            </p> 
            <br>    
            <p>
                <b>EL DEUDOR Y EL CODEUDOR SOLIDARIO</b>, expresamente renuncian : al fuero de su domicilio, a la presentaci&oacute;n de este documento, para 
                la aceptaci&oacute;n o el pago, a todos los avisos y notificaciones que les pudiere corresponder en caso de desatenci&oacute;n, al protesto y 
                a los tr&aacute;mites del juicio ejecutivo, relevando desde ahora y por este medio al tenedor de este documento, de la obligaci&oacute;n de prestar 
                fianza en caso de ejecuci&oacute;n o juicio por raz&oacute;n de este pagar&eacute;, aceptando <b>EL DEUDOR  Y EL CODEUDOR SOLIDARIO</b> que 
                correr&aacute;n por su cuenta todos los gastos judiciales y extrajudiciales que motive el cobro de esta obligaci&oacute;n, incluyendo honorarios de abogado.
            </p> 
            <br/>
            <p>
                <b>EL ACREEDOR</b> queda autorizado por este medio y en cualquier tiempo, ya sea antes o despu&eacute;s del vencimiento de este pagar&eacute; 
                    sin necesidad de darle aviso a los obligados principales, a deducir cualquier suma que tengan en dep&oacute;sito o 
                    al cr&eacute;dito, ya sea a t&iacute;tulo individual o conjunto, y aplicar la misma al pago de las sumas adeudadas.
            </p> 
            <br/>
            <p>
                <b>LA PARTE DEUDORA Y EL CODEUDOR SOLIDARIO</b> se someten irrevocablemente a la jurisdicci&oacute;n de cualquier tribunal
                de la Ciudad de Panam&aacute;, Rep&uacute;blica de Panam&aacute;, seg&uacute;n EL ACREEDOR o el tenedor de este Pagar&eacute; elija, en cualquier 
                acci&oacute;n o procedimiento derivado de o relativo al presente Pagar&eacute;, e irrevocablemente convienen en que todas las 
                reclamaciones en relaci&oacute;n con dichas acciones o procedimientos podr&aacute;n ser o&iacute;das y resueltas en cualquiera de dichos tribunales.
            </p> 
            <br/>
            <p>
               Este pagar&eacute; queda sujeto a las leyes de la Rep&uacute;blica de Panam&aacute; y se interpretar&aacute; de acuerdo con las leyes de dicho pa&iacute;s.
            </p> 
            <br/>
            <p>
               Panam&aacute;, <?
                if ($planilla['fecha_solicitud_aprobado'] == '1899-11-30 00:00:00' || $planilla['fecha_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha(@$planilla['fecha_solicitud_aprobado']);
                }
                ?>
            </p> 
            <br/>

            <div style="float: left; width: 48%; text-align: center;">
                <br/><br/>
                <p style="text-align: center;"><b><?= strtoupper($planilla['nom_apell_pn']); ?></b></p>
                <br/>
                <p style="text-align: center;"> <? if(strstr(strtolower($planilla['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA'){
                            echo 'CED.-';
                        }else{ 
                            echo 'PASS.-'; } ?> <?= $planilla['cedula_pn']; ?></p>

            </div>
            <div style="float: right; width: 48%;  text-align: center;">
                <br/><br/>
                <p style="text-align: center;"><b><?= strtoupper($planilla['nom_apell_codeudor'])?></b></p>
                <br/>
                <p style="text-align: center;"><? if (strstr(strtolower($planilla['nacionalidad_codeudor']), 'paname') || strtoupper($planilla['nacionalidad_codeudor'])== 'PA') {
                    echo 'CED.-';
                } else {
                    echo 'PASS.-';
                }
                ?> <?= $planilla['cedula_codeudor']; ?></p>

            </div>
        </div>
    </body>
</html>            
