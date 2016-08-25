<html>
    <head>
        <base href="<? base_url(); ?>">
        <link rel="stylesheet" type="text/css" href="css/style_contrato.css" />
        <title>CONTRATO MARCO</title>
    </head>
    <body>
        <div class="cuerpo">
            <p class="titulo">
                <br/>
                <br/>
                <b>CONTRATO MARCO ASSETS FACTORING INC</b>
                <br/>
            </p>

            <br>

            <p>
                Entre los suscritos a saber <b>WILLIAN DIONICIO RAM&Iacute;REZ MONTES</b>, var&oacute;n, venezolano, mayor de edad,
                con pasaporte n&uacute;mero 054896299, actuando en su condici&oacute;n de Director y Representante
                Legal de ASSETS FACTORING INC. sociedad an&oacute;nima inscrita a la ficha ochocientos treinta y dos mi 
                seiscientos sesenta y nueve (832669), documento dos millones quinientos noventa y tres mil cuatrocientos 
                cincuenta (2593450) de la Secci&oacute;n de Micropel&iacute;culas (Mercantil) del Registro P&uacute;blico, 
                con domicilio en la Ciudad de Panam&aacute;, Rep&uacute;blica de Panam&aacute;, en lo sucesivo  <b>EL FACTOR</b> , por una parte y por la otra, 
                <b><?= strtoupper($data_empresa['nom_apell_repl']) ?></b>, 
                <?= $data_empresa['sexo_repl'] ?>, 
                <?
                if (strstr(strtolower($data_empresa['nacionalidad_repl']), 'paname') || $data_empresa['nacionalidad_repl'] == 'PA') {
                    if ($data_empresa['sexo_repl'] == 'Varon') {
                        echo 'Paname&ntilde;o';
                    } else if ($data_empresa['sexo_repl'] == 'Mujer') {
                        echo 'Paname&ntilde;a';
                    }
                } else {
                    echo $data_empresa['nacionalidad_repl'];
                }
                ?>
                mayor de edad, con <?
                if (strstr(strtolower($data_empresa['nacionalidad_repl']), 'paname') || $data_empresa['nacionalidad_repl'] == 'PA') {
                    echo 'c&eacute;dula de identidad personal n&uacute;mero ';
                } else {
                    echo 'pasaporte n&uacute;mero ';
                }
                ?> 
                <?= $data_empresa['cedula_repl']; ?>, actuando en nombre y representaci&oacute;n de la sociedad an&oacute;nima.
                <b><?= strtoupper($data_empresa['nom_rz_pj']); ?></b>,
                <?
                if ($data_empresa['nacionalidad_emp'] == 'p') {
                    $V = new EnLetras();
                    echo 'inscrita a la ficha ' . strtolower($V->ValorEnLetras($data_empresa['num_ficha_pj'], '')) .
                    ' (' . $data_empresa['num_ficha_pj'] .
                    '), documento ' . strtolower($V->ValorEnLetras($planilla['num_doc_pj'], '')) . ' (' . $planilla['num_doc_pj'] . '),'
                    . ' de la Secci&oacute;n de Micropel&iacute;culas (Mercantil) del Registro P&uacute;blico, '
                    . 'con domicilio en Ciudad de Panam&aacute;';
                } else {
                    echo 'inscrita ante el ' . $data_empresa['of_reg_pj'] . ', bajo el N&deg; ' .
                    $data_empresa['num_reg_pj'] . ', Tomo ' .
                    $data_empresa['tomo_reg_pj'] . ', en fecha ' .
                    fecha($data_empresa['fecha_reg_pj']) . ' en ' .
                    $data_empresa['ciudad_reg_pj'] . ' - ' .
                    $data_empresa['estado_reg_pj'] . ' - Venezuela, ';
                }
                ?>
                quien en lo sucesivo se denominar&aacute; EL <b>CLIENTE</b>, y quienes en forma conjunta se
                denominaran <b>LAS PARTES</b>, han convenido celebrar un Contrato de Factoring sujeto a las siguientes cl&aacute;usulas:
            </p>

            <p>
                <b>PRIMERA</b>.- (DEFINICIONES): <b>LAS PARTES</b> establecen que para todos los prop&oacute;sitos y efectos del presente
                contrato, los siguientes t&eacute;rminos tendr&aacute;n el significado que se les atribuye a continuaci&oacute;n, que 
                le ser&aacute;n aplicables indistintamente bien sea en singular o en plural, femenino o masculino, salvo que del propio 
                texto del contrato se desprenda evidentemente lo contrario:
            </p>

            <div style="padding-left: 30px;">
                <ol style="text-align: justify;">
                    <li style="list-style: none;">1.1 <b>FACTOR</b>: Es la persona jur&iacute;dica identificada como tal en el encabezado de este contrato, quien adquiere los derechos de cr&eacute;dito que se originan de Facturas u otros t&iacute;tulos de cr&eacute;dito de similares caracter&iacute;sticas tales como son descritos en el inciso 1.4 de la presente clausula ,debidamente emitidos por el <b>CLIENTE</b>  con sujeci&oacute;n a las leyes y normas legales que rigen la transmisi&oacute;n de cr&eacute;ditos nominativos, a la orden o al portador.</li>
                    <li style="list-style: none;">1.2 <b>CLIENTE</b> : Es la persona natural o jur&iacute;dica identificada como tal en el encabezado de este contrato, quien emite los derechos de cr&eacute;dito que se originan de Facturas u otros t&iacute;tulos de cr&eacute;dito de similares caracter&iacute;sticas tales como son descritos en el inciso 1.4 de la presente clausula por la venta de bienes o servicios prestados. Asimismo, el <b>CLIENTE</b>  puede tambi&eacute;n adquirir de cualquier forma legal los derechos de cr&eacute;dito representados en facturas u otros t&iacute;tulos de cr&eacute;dito emitidos por terceras personas para luego traspasarlas al FACTOR; en ambos casos el <b>CLIENTE</b>  queda obligado de manera expresa frente al <b>FACTOR</b> al pago de los derechos de cr&eacute;dito representados en facturas u otros t&iacute;tulos de cr&eacute;dito, para el caso de que el <b>DEUDOR</b> de los mismos no cumpla con sus obligaciones al momento de los respectivos vencimientos, por lo que el <b>CLIENTE</b>  por medio del presente documento se convierte en obligado principal frente al <b>FACTOR</b> de la obligaci&oacute;n del <b>DEUDOR</b> de pagar los derechos de cr&eacute;dito representados en facturas u otros t&iacute;tulos de cr&eacute;dito de similares caracter&iacute;sticas tales como son descritos en el inciso 1.4 de la presente clausula. </li>
                    <li style="list-style: none;">1.3 <b>DEUDORES</b>: Son las personas naturales o jur&iacute;dicas que contraten con el <b>CLIENTE</b>  o con una tercera persona, la adquisici&oacute;n de bienes o la prestaci&oacute;n de servicios por una contraprestaci&oacute;n en dinero efectivo, la cual queda documentada mediante la emisi&oacute;n de facturas u otros t&iacute;tulos de cr&eacute;dito de similares caracter&iacute;sticas tales como son descritos en el inciso 1.4 de la presente clausula. </li>
                    <li style="list-style: none;">1.4 <b>FACTURA</b>: A los efectos del presente contrato este t&eacute;rmino incluye no s&oacute;lo las facturas propiamente dichas emitidas conforme a la ley, sino tambi&eacute;n todos aquellos otros t&iacute;tulos valores, tales como letras de cambio, pagar&eacute;s, obligaciones, as&iacute; como tambi&eacute;n valuaciones, contratos de venta a plazo de bienes y servicios, y cualesquiera otros instrumentos o efectos de comercio negociables, elaborados de conformidad con la legislaci&oacute;n vigente, bien sean emitidos o adquiridos por el <b>CLIENTE</b>  y aceptados o suscritos seg&uacute;n sea el caso por el <b>DEUDOR</b>, los cuales documentan las obligaciones asumidas por el <b>DEUDOR</b> frente al <b>CLIENTE</b>  emisor o adquirente de las Facturas, con motivo de los bienes adquiridos o servicios prestados por el <b>DEUDOR</b>, mediante una operaci&oacute;n comercial a cr&eacute;dito. Queda entendido que toda Factura, a los efectos de este contrato deber&aacute; ser ver&iacute;dica, leg&iacute;tima, v&aacute;lida, exigible y l&iacute;quida a su vencimiento, no sujeta a compensaci&oacute;n, retenci&oacute;n (con expresa excepci&oacute;n de las retenciones de los impuestos que fueren aplicables), oposici&oacute;n, excepciones, grav&aacute;menes o condici&oacute;n alguna. Igualmente, el <b>CLIENTE</b>  declara y garantiza que dichas Facturas no han sido en ning&uacute;n caso cedidas a otra persona natural o jur&iacute;dica y que han sido debidamente aceptadas por personas con capacidad para representar y obligar al <b>DEUDOR</b>.</li>
                    <li style="list-style: none;">1.5 <b>SOLICITUD DE VENTA</b>: Es el documento por medio del cual el <b>CLIENTE</b>  ofrece vender al <b>FACTOR</b> los derechos de cr&eacute;dito documentados en las Facturas que se detallan en dicha solicitud, sin que esto signifique un compromiso para adquirirlos en todo o en parte por el <b>FACTOR</b>. Se anexa un modelo de la <b>SOLICITUD DE VENTA </b> quedando expresamente entendido que, cada vez que sea suscrita una de estas <b>SOLICITUDES DE VENTA </b>, elaborada con base al modelo aqu&iacute; suministrado, se considerar&aacute; parte integrante del presente contrato. </li>
                    <li style="list-style: none;">1.6 <b>CONVENIO DE ACEPTACI&Oacute;N</b>: Es el documento complementario suscrito por el <b>FACTOR</b> y aceptado por el <b>CLIENTE</b>  de acuerdo con lo previsto en la Cl&aacute;usula Cuarta, Numeral 5, mediante el cual el <b>FACTOR</b> notifica al <b>CLIENTE</b>  su aceptaci&oacute;n total o parcial de la oferta hecha por el <b>CLIENTE</b>  mediante la Solicitud de Venta y se establece el Precio de la Compra a Descuento, as&iacute; como las condiciones de pago. Se anexa un modelo del referido <b>CONVENIO DE ACEPTACI&Oacute;N</b>, quedando expresamente entendido, que cada vez que sea suscrito por  <b>LAS PARTES</b> uno de estos Convenios, se considerar&aacute; parte integrante del presente documento. El Convenio de Aceptaci&oacute;n deber&aacute; contener una relaci&oacute;n detallada de aquellas Facturas que habiendo sido ofrecidas por el <b>CLIENTE</b>  en la Solicitud de Venta, el <b>FACTOR</b> manifiesta su voluntad de compra, as&iacute; como el Precio por el cual est&aacute; dispuesto a adquirir cada una de las Facturas relacionadas.</li>
                    <li style="list-style: none;">1.7 <b>COMPRA A DESCUENTO</b>: Se refiere a la operaci&oacute;n mercantil mediante la cual el <b>CLIENTE</b>  vende al <b>FACTOR</b> los derechos de cr&eacute;ditos que se originan de las <b>FACTURAS</b>  y <b>EL FACTOR</b> a cambio del pago anticipado de las mismas y teniendo como referencia el plazo de vencimiento de las facturas o el plazo pactado entre las partes para el pago de las <b>FACTURAS</b> por parte del <b>CLIENTE</b>  al <b>FACTOR</b>, establece un precio de compra representado por un porcentaje del MONTO NOMINAL de las <b>FACTURAS</b> convenido entre las PARTES y establecido en el <b>CONVENIO DE ACEPTACI&Oacute;N</b>.</li>
                    <li style="list-style: none;">1.8 <b>PLAZO DE VIGENCIA DE LA FACTURA</b>: A los efectos del presente contrato se refiere al plazo comprendido entre la fecha de compra de cada Factura por parte del <b>FACTOR</b> y la fecha de vencimiento respectiva. </li>
                    <li style="list-style: none;">1.9 <b>MONTO DE LA FACTURA</b>: Es el monto total de la Factura incluyendo lo correspondiente al ITBMS o cualquier otro impuesto o tributo de cualquier naturaleza que afecte o pudiere afectar el total a pagar por parte del <b>DEUDOR</b>. </li>
                    <li style="list-style: none;">1.10 <b>DIFERENCIAL DE PRECIO</b>: Es el monto en t&eacute;rminos monetarios que resulta de la diferencia entre el monto nominal de la factura y el precio de compra pactado entre el <b>FACTOR</b> y el <b>CLIENTE</b>  tomando como referencia el plazo establecido en el <b>CONVENIO DE ACEPTACI&Oacute;N</b> .</li>
                    <li style="list-style: none;">1.11 <b>MODELO FINANCIERO</b>: Se refiere al m&eacute;todo de c&aacute;lculo para establecer el <b>DIFERENCIAL DE PRECIO</b>  y el cual esta funcionalmente establecido para determinar el <b>DIFERENCIAL DE PRECIO</b> de acuerdo al plazo acordado en el <b>CONVENIO DE ACEPTACI&Oacute;N</b> y que en definitiva determina el porcentaje de descuento en la compra de  facturas u otros t&iacute;tulos de cr&eacute;dito de similares caracter&iacute;sticas tales como son descritos en el inciso 1.4 de la presente clausula. Por lo tanto el <b>DIFERENCIAL DE PRECIO</b> variara en su c&aacute;lculo original y monto si el nominal de la (as) <b>FACTURA</b> (as) son canceladas al <b>FACTOR</b> antes o despu&eacute;s de la fecha de vencimiento establecida en el <b>CONVENIO DE ACEPTACI&Oacute;N</b> .</li>
                    <li style="list-style: none;">1.12 <b>CHEQUE</b> : Es la forma de pago en la que el <b>CLIENTE</b>  debe cancelar al <b>FACTOR</b> y mantener a los fines de que se realicen en ella los pagos que se generen conforme a los t&eacute;rminos de este contrato. </li>
                    <li style="list-style: none;">1.13 <b>FECHA DE VENCIMIENTO</b> : Es la fecha en la que el <b>DEUDOR</b> debe pagar la Factura conforme a los t&eacute;rminos y condiciones de la misma. </li>
                </ol>
            </div>

            <p>
                <b>SEGUNDA</b>.- (SUMINISTRO DE RECAUDOS y EVALUACI&Oacute;N DE INFORMACI&Oacute;N): A los fines de que el <b>FACTOR</b> pueda
                conocer en forma continua la estructura legal, financiera y comercial del <b>CLIENTE</b>  y de la cartera de <b>DEUDORES</b>
                ofrecidos, el <b>CLIENTE</b>  se compromete a facilitar toda la informaci&oacute;n solicitada por el <b>FACTOR</b> con
                respecto al curso normal de sus negocios. El <b>CLIENTE</b>  adicionalmente se compromete a facilitar al <b>FACTOR</b> el acceso
                a su cartera de <b>DEUDORES</b> y a toda la informaci&oacute;n relacionada con los mismos, incluyendo la experiencia de pago
                hist&oacute;rico, con el objeto de que el <b>FACTOR</b> pueda:  
            </p>

            <div style="padding-left: 30px;">
                <ol style="text-align: justify;">
                    <li style="list-style: none;">a) Analizar, investigar y evaluar en forma continua el riesgo crediticio que asume el <b>CLIENTE</b> con los <b>DEUDORES</b>; </li>
                    <li style="list-style: none;">b) Estudiar y evaluar el comportamiento de pago de las obligaciones de los <b>DEUDORES</b> con el <b>CLIENTE</b>; </li>
                    <li style="list-style: none;">c) Realizar eficientemente la gesti&oacute;n de la cobranza comercial, tomando en cuenta los v&iacute;nculos y relaciones comerciales que mantiene el <b>CLIENTE</b> con sus propios <b>CLIENTES</b> <b>DEUDORES</b>. </li>
                </ol>
            </div>

            <p>
                <b>TERCERA</b>.- (RELACI&Oacute;N JUR&Iacute;DICA): <b>El FACTOR</b> y el <b>CLIENTE</b>  convienen en establecer, por medio de este
                contrato y sus anexos, una relaci&oacute;n jur&iacute;dica la cual se basara &uacute;nica y exclusivamente en la compra-venta a 
                descuento de los t&iacute;tulos de cr&eacute;ditos (<b>FACTURAS</b>). A los fines de dar inicio al presente contrato, 
                el <b>FACTOR</b> ha completado un estudio detallado de los distintos tipos de Deudores del <b>CLIENTE</b> , su capacidad de 
                pago, su estabilidad financiera, costumbres crediticias y otros datos financieros de inter&eacute;s para el <b>FACTOR.</b> 
                Con base en este estudio, el <b>FACTOR</b> en este mismo acto aprueba un Cupo Rotativo para Compra a Descuento de Facturas 
                a favor del <b>CLIENTE</b> , quien podr&aacute; hacer uso de ella en la forma y condiciones que se establecen en este contrato. 
            </p>

            <p>
                <b>CUARTA</b>.- (ASPECTOS OPERATIVOS): Para los aspectos operativos tenemos los siguientes puntos: 
            </p>

            <div style="padding-left: 30px;">
                <ol style="text-align: justify;">

                    <li style="list-style: none;">1. Dentro de los cinco (5) d&iacute;as h&aacute;biles siguientes a la suscripci&oacute;n del presente contrato, el <b>CLIENTE</b>  se obliga informar por escrito, al <b>FACTOR</b> el n&uacute;mero de cuenta correspondiente, de acuerdo con lo establecido en el presente contrato.</li>
                    <li style="list-style: none;">2. Una vez que el <b>CLIENTE</b>  haya notificado al <b>FACTOR</b> el n&uacute;mero de cuenta, podr&aacute; presentar una oferta de venta de Facturas, para lo cual se compromete a utilizar exclusivamente el formulario elaborado por el <b>FACTOR</b>, denominado "SOLICITUD DE VENTA� para ofrecer en venta al <b>FACTOR</b> los derechos de propiedad de los cr&eacute;ditos representados en las Facturas, conviniendo de una sola vez que dicha solicitud deber&aacute; estar suscrita por persona o personas legalmente autorizadas para representar y obligar al <b>CLIENTE</b> . Si la Solicitud de Venta es entregada al <b>FACTOR</b> sin anexar la documentaci&oacute;n necesaria para verificar la autenticidad y validez de cada Factura, el <b>FACTOR</b> no estar&aacute; obligado a considerar la oferta contenida en la Solicitud de Venta y pondr&aacute; la misma con sus anexos a disposici&oacute;n del <b>CLIENTE</b> , mediante notificaci&oacute;n escrita, remitida dentro de un m&aacute;ximo de los cinco (5) d&iacute;as h&aacute;biles siguientes a la recepci&oacute;n de la Solicitud de Venta, indic&aacute;ndole al <b>CLIENTE</b>  que puede retirar toda la documentaci&oacute;n en la oficina del <b>FACTOR</b>, cuya direcci&oacute;n el <b>CLIENTE</b>  declara conocer, siendo responsabilidad del <b>CLIENTE</b>  la falta de retiro de dichos documentos de las oficinas del <b>FACTOR</b>. De igual forma se proceder&aacute; con aquellas Facturas ofrecidas por el <b>CLIENTE</b>  que el <b>FACTOR</b> no dese&eacute; Comprar a Descuento, las cuales estar&aacute;n a disposici&oacute;n del <b>CLIENTE</b>  en los mismos t&eacute;rminos aqu&iacute; descritos.</li>
                    <li style="list-style: none;">3. Recibida la Solicitud de Venta con sus respectivos anexos, el <b>FACTOR</b> determinar&aacute; cu&aacute;les Facturas Comprar&aacute; a Descuento con base en la documentaci&oacute;n presentada, las condiciones de mercado y la reputaci&oacute;n y solvencia de los <b>DEUDORES</b> respectivos, para luego emitir el Convenio de Aceptaci&oacute;n, detallando cada Factura aceptada y el Precio a pagar por la misma. El <b>FACTOR</b> tiene un plazo de hasta un m&aacute;ximo cinco (5) d&iacute;as h&aacute;biles para dar respuesta a la Solicitud de Venta. </li>
                    <li style="list-style: none;">4. Recibido el Convenio de Aceptaci&oacute;n por el <b>CLIENTE</b> , &eacute;ste puede rechazar los t&eacute;rminos previstos en el mismo, devolviendo de inmediato el Convenio de Aceptaci&oacute;n y requiriendo la devoluci&oacute;n de las Facturas de la Solicitud de Venta a que se refiere el referido Convenio de Aceptaci&oacute;n. Si una vez transcurrido cinco (5) d&iacute;as h&aacute;biles desde la recepci&oacute;n del Convenio de Aceptaci&oacute;n, sin que el <b>CLIENTE</b>  haya notificado la aceptaci&oacute;n del mismo de manera escrita, se entender&aacute; que el <b>CLIENTE</b>  rechaza el Convenio de Aceptaci&oacute;n. En este caso se asumir&aacute; que no se ha materializado la Venta de las Facturas y el <b>FACTOR</b> deber&aacute; poner toda la documentaci&oacute;n respectiva a disposici&oacute;n del <b>CLIENTE</b> , para que &eacute;ste la retire dentro de un plazo no mayor a cinco (5) d&iacute;as h&aacute;biles. Asimismo una vez que el <b>CLIENTE</b>  haya aceptado los t&eacute;rminos de la Compra a Descuento de las Facturas, este deber&aacute; notificarlo por escrito al <b>FACTOR</b>, quien a su vez le notificara al <b>CLIENTE</b>  la fecha y el lugar en el que deber&aacute; comparecer para firmar el correspondiente Convenio de Aceptaci&oacute;n. En caso que el <b>CLIENTE</b>  no compareciese a la hora y fecha indica para la firma de los documentos correspondientes, se entender&aacute; que no se ha materializado la Venta de las Facturas, el <b>CLIENTE</b>  deber&aacute; correr con los gastos incurridos en el proceso y el <b>FACTOR</b> deber&aacute; poner toda la documentaci&oacute;n respectiva a disposici&oacute;n del <b>CLIENTE</b> , para que &eacute;ste la retire dentro de un plazo no mayor a cinco (5) d&iacute;as h&aacute;biles. </li>
                    <li style="list-style: none;">5. El <b>CLIENTE</b>  se obliga a efectuar todos aquellos actos materiales y jur&iacute;dicos exigidos por la Ley, necesarios para la v&aacute;lida transmisi&oacute;n, cesi&oacute;n o endoso de las Facturas, seg&uacute;n sea el caso y a entregar al <b>FACTOR</b> los originales de las Facturas respectivas, con sus respectivos anexos en caso de haberlos, con lo cual garantiza, en los t&eacute;rminos del presente contrato y de una vez que todas y cada una de las Facturas son ciertas, leg&iacute;timas, v&aacute;lidas, exigibles y l&iacute;quidas a su vencimiento, no sujetas a compensaci&oacute;n, oposici&oacute;n, retenci&oacute;n, excepciones, grav&aacute;menes o condici&oacute;n alguna por parte del <b>DEUDOR</b>, quien ser&aacute; notificado por <b>EL CLIENTE</b>de la venta de las facturas descritas en el <b>CONVENIO DE ACEPTACI&Oacute;N</b> .</li>
                    <li style="list-style: none;">6. El <b>CLIENTE</b>  garantiza la solvencia del <b>DEUDOR</b> y se constituye en fiador solidario y principal pagador frente al <b>FACTOR</b>, por la autenticidad, validez y pago oportuno de las Facturas vendidas. Como tal, el <b>CLIENTE</b>  deber&aacute; garantizar que las Facturas Compradas a Descuento no ser&aacute;n objeto de anulaci&oacute;n por parte suya. En caso que las facturas objeto del presente contrato deban de ser modificadas o anuladas para ser remplazadas por unas facturas nuevas, el <b>CLIENTE</b>  deber&aacute; notificar al <b>FACTOR</b> sobre las modificaciones y/o reemplazos realizados en un plazo no mayor de tres (3) d&iacute;as h&aacute;biles a partir del d&iacute;a en que ocurra la modificaci&oacute;n y/o el reemplazo. En el supuesto de que alguna Factura sea anulada por el <b>CLIENTE</b> , y no emita una nueva para su reemplazo, &eacute;ste deber&aacute; reintegrar al <b>FACTOR</b> la cantidad pagada por este, m&aacute;s una indemnizaci&oacute;n correspondiente al Veinticinco por ciento (25%) del valor nominal de la factura. En el supuesto de que alguna Factura sea modificada por el <b>CLIENTE</b>  sin que este lo notifique al <b>FACTOR</b> dentro del plazo estipulado en el presente contrato, &eacute;ste deber&aacute; reintegrar al <b>FACTOR</b> la cantidad pagada por este, m&aacute;s una indemnizaci&oacute;n correspondiente al Veinticinco por ciento (25%) del valor nominal de la factura. En el supuesto de que alguna Factura sea modificada por el <b>CLIENTE</b> , y que luego de modificada, el valor nominal de la misma no sea igual al de la factura vendida al <b>FACTOR</b>, &eacute;ste deber&aacute; reintegrar al <b>FACTOR</b> la diferencia pagada por este, m&aacute;s una indemnizaci&oacute;n correspondiente al Veinticinco por ciento (25%) del valor nominal de la factura. </li>
                    <li style="list-style: none;">7. En la eventualidad de que las Facturas Compradas a Descuento seg&uacute;n este contrato no hubiesen sido aceptadas en forma debida por el <b>DEUDOR</b>, y sea cuestionada su aceptaci&oacute;n por &eacute;ste, el <b>CLIENTE</b>  responde solidariamente frente al <b>FACTOR</b> por el pronto reembolso de las sumas adelantadas. </li>
                    <li style="list-style: none;">8. <b>LAS PARTES</b> acuerdan que las Facturas deber&aacute;n contener los siguientes requisitos:  </li>

                    <ol  style="text-align: justify;">
                        <li style="list-style: none;">a) En cuanto a las Facturas propiamente dichas: La denominaci&oacute;n Factura; el n&uacute;mero correlativo, el nombre, registro &uacute;nico de contribuyente y cualesquiera otras exigencias relativas a la materia impositiva, domicilio, direcci&oacute;n y tel&eacute;fono del <b>CLIENTE</b> ; la fecha de emisi&oacute;n y de vencimiento de la Factura; el importe del cr&eacute;dito existente, tanto en n&uacute;mero como en letras; descripci&oacute;n del bien o servicio que se factura, incluyendo cantidad y precio unitario; denominaci&oacute;n, nombre o raz&oacute;n social, domicilio, direcci&oacute;n y tel&eacute;fono del <b>DEUDOR</b>; la aceptaci&oacute;n pura y simple por parte del <b>DEUDOR</b> de la Factura y la firma, nombre y n&uacute;mero de c&eacute;dula de identidad del aceptante de la Factura; el importe del impuesto o tributo que grave la venta del bien o el servicio. Asimismo, las Facturas no podr&aacute;n tener tachaduras ni enmendaduras. En caso de que la normativa aplicable y vigente para la oportunidad respectiva requiera el cumplimiento de otros requisitos, las Facturas deber&aacute;n cumplir adicionalmente con los mismos. </li>
                        <li style="list-style: none;">b) En cuanto a otros T&iacute;tulos, valores o contratos, queda claramente entendido que deber&aacute;n llenar todos los extremos establecidos en el   C&oacute;digo de Comercio, C&oacute;digo Civil y dem&aacute;s leyes aplicables de la Republica de Panam&aacute;, incluso de naturaleza fiscal, as&iacute; como con los requisitos establecidos por el <b>FACTOR</b> para cada caso en particular, garantizando el <b>CLIENTE</b> , por su propia cuenta y riesgo, de manera expresa que se cumplir&aacute;n con todas las previsiones legales y convencionales para todas las Facturas que sean transmitidas por el <b>CLIENTE</b>  al <b>FACTOR</b>.</li>
                    </ol>

                    <li style="list-style: none;">9. Vencido el Plazo de Vigencia de la Factura, el <b>CLIENTE</b>  proceder&aacute; directamente seg&uacute;n Mandato otorgado por el <b>FACTOR</b>, a presentar la misma para el cobro al <b>DEUDOR</b>, quien deber&aacute; pagar la Factura de inmediato. En caso de que el <b>DEUDOR</b> no pague la Factura al ser presentada, el <b>CLIENTE</b>  notificar&aacute;, de tal circunstancia por escrito y de forma inmediata, al FACTOR; dicha notificaci&oacute;n deber&aacute; contener la siguiente informaci&oacute;n: </li>

                    <ol  style="text-align: justify;">
                        <li style="list-style: none;">a) Identificaci&oacute;n de la Factura en cuesti&oacute;n;</li>
                        <li style="list-style: none;">b) Fecha en que fue presentada para su cobro; y</li>
                        <li style="list-style: none;">c) Queda expresamente entendido entre  <b>LAS PARTES</b> que el <b>FACTOR</b>, podr&aacute; recibir abonos parciales, establecer acuerdos de pago y exigir garant&iacute;as especiales al <b>DEUDOR</b>, cuando &eacute;ste no proceda al pago de la Factura en la fecha de vencimiento, siempre y cuando el <b>FACTOR</b> lo haya autorizado previamente por escrito. </li>
                    </ol>


                    <li style="list-style: none;">10. <b>LAS PARTES</b> acuerdan respecto de todas las cobranzas realizadas en virtud de este contrato, que si, por alguna circunstancia llegaren a incluir alg&uacute;n tipo de impuesto, el monto de &eacute;ste, que ha de ser sufragado por el <b>DEUDOR</b>, ser&aacute; entregado por el <b>DEUDOR</b> al <b>CLIENTE</b> , al mismo tiempo que la totalidad del monto de la factura, a los fines de que &eacute;ste cumpla con su obligaci&oacute;n impositiva. Lo anterior se aplicar&aacute;, especialmente para el supuesto del impuesto general a las ventas, o el impuesto al valor agregado o sus sustitutos, siendo responsable en definitiva el <b>CLIENTE</b>  de enterar dicho impuesto al fisco. </li>
                    <li style="list-style: none;">11. En caso de que el <b>DEUDOR</b> se oponga a pagar la Factura al <b>CLIENTE</b>  en virtud de cualquier reclamaci&oacute;n, oposici&oacute;n, o excepci&oacute;n que tuviere el <b>DEUDOR</b> contra el <b>CLIENTE</b>, &eacute;ste como fiador solidario y principal pagador de las Facturas cedidas deber&aacute; pagar las mismas al <b>FACTOR</b> al primer aviso m&aacute;s los Intereses Moratorios que se generen desde la fecha de vencimiento del Plazo de Vigencia de la Factura hasta la fecha efectiva de pago. </li>
                </ol>

                <p>
                    <b>QUINTA</b>:  (OBLIGACIONES): Adem&aacute;s de lo estipulado en las Cl&aacute;usulas anteriores y en otras de este convenio, el <b>CLIENTE</b>  asume por medio de este documento las obligaciones siguientes:
                </p>

                <div style="padding-left: 30px;">
                    <ol style="text-align: justify;">
                        <li style="list-style: none;">a) Garantiza al <b>FACTOR</b> la existencia, validez y legitimidad de cada una de las Facturas que le fueren cedidas o endosadas seg&uacute;n lo establecido en este convenio o por cualquier otro documento, y por ende la existencia, validez y legitimidad de los cr&eacute;ditos que de ellos se deriven, seg&uacute;n lo establecido en este documento.</li>
                        <li style="list-style: none;">b) Garantiza al <b>FACTOR</b> la solvencia del <b>DEUDOR</b>, en cada caso de las Facturas cedidas conforme a este contrato y sus anexos.</li>
                        <li style="list-style: none;">c) En los casos de instrumentos transferibles por endoso, el <b>CLIENTE</b>  garantiza al <b>FACTOR</b> la aceptaci&oacute;n y el pago de los mismos. </li>
                    </ol>
                </div>

                <p>
                    EL <b>CLIENTE</b> declara y le garantiza a <b>EL FACTOR</b> que los cr&eacute;ditos cedidos:
                </p>

                <div style="padding-left: 30px;">
                    <ol style="text-align: justify;">
                        <li style="list-style: none;"> a) No se encuentran prescritos.</li>
                        <li style="list-style: none;"> b) Son l&iacute;quidos, puros y exigibles a la fecha de vencimiento;</li>
                        <li style="list-style: none;"> c) No tienen ning&uacute;n tipo de retenciones, compensaciones, grav&aacute;menes, reclamos pendientes originados directa o indirectamente de la transacci&oacute;n que lo origin&oacute; o de cualquier tipo de incidencia que dificulte o imposibilite el cobro de &eacute;stos;</li>
                        <li style="list-style: none;"> d) Han sido debidamente aceptados por <b>LOS DEUDORES</b>;</li>
                        <li style="list-style: none;"> e) Cumplen con todos los requisitos legales exigidos por las leyes de la Rep&uacute;blica de Panam&aacute; en cuanto a su validez, forma y ejecutabilidad.</li>
                        <li style="list-style: none;"> f) Han sido cedidos mediante entrega a <b>EL FACTOR</b> de los documentos &uacute;nicos y originales representativos de dichos cr&eacute;ditos.</li>
                    </ol>
                </div>
                <p>
                    <b>PAR&Aacute;GRAFO PRIMERO</b>: Adicionalmente  <b>LAS PARTES</b> podr&aacute;n pactar la constituci&oacute;n de
                    garant&iacute;as adicionales a las previstas en este contrato, tomando en cuenta la solvencia y estabilidad financiera
                    de los <b>DEUDORES</b>. Particularmente, el <b>FACTOR</b> podr&aacute; exigir la constituci&oacute;n de 
                    fianzas o avales personales del o los representantes del <b>CLIENTE</b> , cuando as&iacute; lo consider&eacute; prudente.
                </p>

                <p>
                    <b>SEXTA</b>.- (EJECUCI&Oacute;N y DELEGACI&Oacute;N DE ACTIVIDADES): Es expresamente entendido entre  <b>LAS PARTES</b> que el 
                    <b>FACTOR</b> puede ejecutar todas las actividades que se refiere el presente contrato directamente o por intermedio 
                    de terceras personas naturales o jur&iacute;dicas, quienes podr&aacute;n actuar por su cuenta y orden. 
                </p>

                <p>
                    <b>SEPTIMA</b>.- (AUTORIZACIONES): Por medio de este documento el <b>CLIENTE</b>  autoriza en forma irrevocable, amplia 
                    y suficiente al <b>FACTOR</b>, para que verifique, utilice, intercambie, disponga, transfiera o reporte a terceros y
                    en especial a las centrales de riesgo toda la informaci&oacute;n bancaria, financiera, crediticia o comercial referida 
                    a sus personas o la que les sea suministrada por ellos, al inicio o durante la relaci&oacute;n contractual que mantiene
                    el <b>CLIENTE</b>  o que a futuro establezcan con el <b>FACTOR</b> y/o con las instituciones financieras relacionadas
                    directamente con el <b>FACTOR</b>. Igualmente, el <b>CLIENTE</b>  autoriza al <b>FACTOR</b>, a consultar, en 
                    cualquier tiempo, en las centrales de riesgo, toda la informaci&oacute;n relevante para conocer su desempe&ntilde;o 
                    como <b>DEUDOR</b>, su capacidad de pago o para valorar el riesgo futuro dentro del marco de este contrato, siempre 
                    dentro de las limitaciones de Ley. 
                </p>
                <p>
                    <b>OCTAVA</b>: En caso de que el <b>CLIENTE</b>  no entregue el dinero recibido como pago de acuerdo al mandato otorgado
                    por el <b>FACTOR</b> de las Facturas vendidas, a m&aacute;s tardar el d&iacute;a h&aacute;bil siguiente, el diferencial de
                    precio comenzara a variar de acuerdo a lo establecido en el modelo
                    financiero, sin perjuicio de las acciones penales, civiles y mercantiles que tenga el <b>FACTOR</b> en contra del <b>CLIENTE</b>.
                </p>
                <p>
                    <b>NOVENA</b>: En caso de que una cualquiera de  <b>LAS PARTES</b> no de cumplimiento a cualesquiera de las obligaciones 
                    derivadas del presente contrato, la otra parte tendr&aacute; derecho a terminarlo unilateralmente, mediante una simple 
                    notificaci&oacute;n dirigida a la otra Parte, sin necesidad de preaviso,
                    ni de pago de indemnizaci&oacute;n alguna. Esta terminaci&oacute;n unilateral por incumplimiento podr&aacute; ser invocada:
                </p>

                <div style="padding-left: 30px;">
                    <ol style="text-align: justify;">
                        <li style="list-style: none;">a) Por el <b>CLIENTE</b> , si el <b>FACTOR</b> no le paga el Precio conforme a lo previsto en el Convenio de Aceptaci&oacute;n o no cumple con alguno de los pasos que corresponde cumplir al <b>FACTOR</b> conforme a la cl&aacute;usula cuarta de este contrato; </li>
                        <li style="list-style: none;">b) Por el <b>FACTOR</b>, si el <b>CLIENTE</b>  no le provee las Facturas conforme a lo previsto en este contrato, no cumple con alguno de los pasos que corresponde cumplir al <b>CLIENTE</b>  conforme a la cl&aacute;usula cuarta de este contrato, no paga las Facturas que le corresponde pagar al <b>FACTOR</b> conforme a lo previsto en las cl&aacute;usulas cuarta y quinta de este contrato, no da al <b>FACTOR</b> la colaboraci&oacute;n e informaci&oacute;n previstas en la cl&aacute;usula s&eacute;ptima de este contrato, o no le paga al <b>FACTOR</b> cualquier monto que le haya de pagar conforme al presente contrato. Esta terminaci&oacute;n unilateral por incumplimiento opera sin perjuicio del derecho de la Parte que la invoca a exigir el pago de los da&ntilde;os y perjuicios sufridos. </li>
                    </ol>
                </div>
                <p>
                    Resuelto el presente contrato por expiraci&oacute;n del plazo o por mutuo acuerdo, <b>EL FACTOR</b> continuar&aacute; la operaci&oacute;n 
                    pactada hasta la terminaci&oacute;n de sus servicios con respecto de los t&iacute;tulos de cr&eacute;ditos que se encuentren pendientes de
                    pago por parte del <b>CLIENTE</b> .  Si el contrato se resuelve por incumplimiento de  <b>EL CLIENTE</b> a cualquiera de las obligaciones
                    que impone el presente contrato.  <b>EL FACTOR</b> practicar&aacute; la liquidaci&oacute;n de cierre de cuenta con <b>EL CLIENTE</b>,  
                    quien estar&aacute; obligado a devolver dentro de los ocho (8) d&iacute;as laborables calendarios siguientes, los anticipos recibidos, 
                    remuneraciones y a pagar los cargos efectuados por <b>EL FACTOR</b>;  Lo anterior, independientemente del derecho que le asiste a <b>EL FACTOR</b>
                    de ejecutar, en cualquier tiempo, los documentos,
                    facturas, t&iacute;tulos valores y cualesquiera garant&iacute;as que amparen los cr&eacute;ditos cedidos.
                </p>
                <p>
                    De igual manera el presente contrato podr&aacute; terminarse antes del vencimiento del plazo arriba
                    estipulado, en los siguientes casos:
                </p>

                <div style="padding-left: 30px;">
                    <ol style="text-align: justify;">
                        <li style="list-style: none;">a. Mutuo acuerdo de las partes, manifestado por escrito.</li>
                        <li style="list-style: none;">b. Por inmovilizaci&oacute;n o inoperancia de las transacciones de factoring con <b>EL CLIENTE</b>,  durante noventa (90) d&iacute;as consecutivos o por inexistencia de transmisiones de cr&eacute;ditos en el mismo lapso.</li>
                        <li style="list-style: none;">c. Cuando la situaci&oacute;n financiera de <b>EL CLIENTE </b>se encontrase amenazada, ya sea por cierre temporal o indefinido de sus establecimientos; en el caso de muerte, disoluci&oacute;n  o liquidaci&oacute;n, seg&uacute;n sea persona natural o jur&iacute;dica; cuando incurra en Suspensi&oacute;n de Pagos, Insolvencia o Quiebra; si soportare huelga de sus trabajadores por un tiempo que exceda de treinta (30) d&iacute;as; si sus bienes son afectados por secuestros, embargos, retenciones, prohibiciones de enajenar toda la anterior enunciaci&oacute;n a t&iacute;tulo de ejemplo; o en evento de fusi&oacute;n o consolidaci&oacute;n de <b>EL CLIENTE</b> .</li>
                        <li style="list-style: none;">d. Si los fondos de  <b>EL CLIENTE</b> por la compra de su cartera son retenidos por <b>EL FACTOR</b> en cumplimiento de disposiciones judiciales.</li>
                        <li style="list-style: none;">e. En caso de que el Gobierno de Panam&aacute; decrete una moratoria general o particular en el pago de cr&eacute;ditos.</li>
                    </ol>
                </div>
                <p>
                    <b>D&Eacute;CIMA</b>: El <b>CLIENTE</b>  acepta y autoriza, de forma amplia y suficiente en cuanto a derecho se 
                    requiera para que el <b>FACTOR</b>, si as&iacute; lo estimare conveniente, proceda a ceder libremente, todas o parte 
                    de las Facturas Compradas a Descuento a cualquier tercero interesado y muy particularmente a instituciones autorizadas
                    para actuar como FIDUCIARIOS o sociedades dedicada a operaciones de titularizaci&oacute;n, para procesos
                    de oferta p&uacute;blica y a readquirir tales Facturas de ser necesario. En dicho caso, el <b>CLIENTE</b> 
                    acepta que el presente contrato podr&aacute; ser invocado por el nuevo acreedor de la cartera de Facturas, 
                    en especial por las instituciones autorizadas para actuar como FIDUCIARIOS o las sociedades de titularizaci&oacute;n
                    en todas sus PARTES. Para ello, el <b>FACTOR</b> se compromete a notificar al <b>CLIENTE</b>  por escrito de la
                    cesi&oacute;n efectuada de ser el caso. En lo que se refiere al <b>CLIENTE</b>, &eacute;ste no podr&aacute; ceder, ni sustituir, total o parcialmente, los derechos y obligaciones derivados de este contrato en terceras personas.
                </p>

                <p>
                    <b>D&Eacute;CIMA PRIMERA</b>.- (NOTIFICACIONES): toda notificaci&oacute;n o documentaci&oacute;n que deba ser cursada por cualquiera de las partes por raz&oacute;n del presente contrato, deber&aacute; ser entregadas en las direcciones correspondientes y/o  a trav&eacute;s de los respectivos correos electr&oacute;nicos:
                </p>

                <br/>
                <p><b>EL FACTOR</b></p>
                <p>Contacto: <b>WILLIAN DIONICIO RAM&Iacute;REZ MONTES</b></p>
                <p>Direcci&oacute;n: Torre de las Américas, Torre C, piso 17, Oficina 1703, Punta Pacífica, Panamá City, Panamá</p>
                <p>Tel&eacute;fono: +507 6635-1579</p>
                <p>e-mail: info@assetsfactoring.com</p>

                <br/>
                <p>EL <b>CLIENTE</b></p>
                <p>Contacto: <b><?= strtoupper($data_empresa['nom_apell_repl']); ?></b></p>
                <p>Direcci&oacute;n. <?= ucfirst($data_empresa['direccion_pj']); ?></p>
                <p>Tel&eacute;fono: <?= ucfirst($data_empresa['telefono_pj']); ?></p>
                <p>e-mail: <?= ucfirst($data_empresa['email_pj']); ?></p>

                <br/>
                <p>
                    Queda expresamente entendido que en los casos de cambio de direcci&oacute;n  o tel&eacute;fonos, los mismos se deber&aacute;n notificar por escrito y con acuse de recibo. En caso contrario, el cambio de direcci&oacute;n o de tel&eacute;fono no podr&aacute; oponerse a la otra Parte.
                </p>

                <p>
                    <b>D&Eacute;CIMA SEGUNDA</b>: En caso de que cualquier <b>DEUDOR</b> o un tercero hagan cualquier
                    reclamaci&oacute;n al <b>FACTOR</b> con motivo de alguna de las actuaciones a que se refiere el presente contrato, el <b>CLIENTE</b>  se obliga: 
                </p>
                <div style="padding-left: 30px;">
                    <ol style="text-align: justify;">
                        <li style="list-style: none;">a) A defender al <b>FACTOR</b> con respecto a dicha reclamaci&oacute;n, y </li>
                        <li style="list-style: none;">b) A pagar los montos a que haya lugar si este reclamo prospera. </li>
                    </ol>
                </div>
                <p>
                    En la defensa del <b>FACTOR</b>, que ser&aacute; sufragada por el <b>CLIENTE</b> , est&eacute; deber&aacute; atender las exigencias
                    razonables de El <b>FACTOR</b> en cuanto a qui&eacute;nes ser&aacute;n los
                    abogados a cargo del caso y cu&aacute;l ser&aacute; la estrategia defensiva.  
                </p>
                <p>
                    <b>DECIMA TERCERA</b>: (GASTOS): Declara <b>EL FACTOR</b> y acepta  <b>EL CLIENTE</b> que todos los gastos que genere la 
                    ejecuci&oacute;n del presente CONTRATO, por concepto de impuestos, honorarios profesionales y/o derechos notariales, los
                    gastos judiciales en el supuesto de que se d&eacute; surjan conflictos por las partes contratantes, y cualesquiera otros
                    gastos no espec&iacute;ficamente contemplado en esta cl&aacute;usula, ser&aacute;n de exclusiva cuenta EL <b>CLIENTE</b>.
                </p>
                <p>
                    <b>DECIMA CUARTA</b>:  <b>EL CLIENTE</b> y <b>EL FACTOR</b> convienen en que si algunas de las estipulaciones del presente
                    contrato resultase nula seg&uacute;n las leyes de la Rep&uacute;blica de Panam&aacute;, tal nulidad no invalidar&aacute;
                    el contrato en su totalidad, sino que &eacute;ste se interpretar&aacute; como si no incluyera la estipulaci&oacute;n o 
                    estipulaciones que se declaren nulas y los derechos y obligaciones de las partes contratantes ser&aacute;n interpretadas
                    y observadas en la forma en que en derecho proceda.
                </p>
                <p>
                    <b>D&Eacute;CIMA QUINTA</b>: El hecho de que <b>EL FACTOR</b> permita, una o varias veces a  <b>EL CLIENTE</b> que incumpla
                    con sus obligaciones o las cumpla imperfectamente o en forma distinta de la pactadas o no insista en el cumplimiento
                    exacto de las obligaciones o no ejerza oportunamente los derechos contractuales o legales que le corresponden, no 
                    se reputar&aacute; ni equivaldr&aacute; a modificaci&oacute;n del presente contrato y no ser&aacute; obst&aacute;culo 
                    en ning&uacute;n caso, para que  <b>EL FACTOR</b> en cualquier momento insistiera en el cumplimiento fiel y espec&iacute;fico 
                    de las obligaciones que corren a cargo de  <b>EL CLIENTE</b> o ejerza los derechos convencionales o legales de que es titular.
                </p>
                <p>
                    <b>D&Eacute;CIMA SEXTA</b>: El <b>CLIENTE</b> declara haber le&iacute;do y entendido con anterioridad a la fecha de 
                    la firma de este contrato, el contenido del mismo, el cual declara aceptar en todas y cada una de sus partes. 
                </p>
                <p>
                    <b>D&Eacute;CIMA S&Eacute;PTIMA</b>: La duraci&oacute;n de presente contrato es de un (1) a&ntilde;o, sujeto a 
                    renovaci&oacute;n por iguales t&eacute;rminos sucesivos, de com&uacute;n acuerdo de las partes.
                </p>
                <p>
                    <b>D&Eacute;CIMA OCTAVA</b>: Declaran las partes que se regir&aacute;n por las disposiciones contempladas 
                    en este contrato y en lo no previsto, por las normas del C&oacute;digo de Comercio y  Civil de la 
                    Rep&uacute;blica de Panam&aacute; que le sean aplicables.
                </p>
                <p>
                    <b>D&Eacute;CIMA NOVENA</b>: Las partes contratantes se&ntilde;alan como su domicilio la Ciudad de Panam&aacute;,
                    Rep&uacute;blica de Panam&aacute; y acuerdan someterse para el conocimiento y resoluci&oacute;n de cualquier 
                    controversia que pudiera surgir en la interpretaci&oacute;n o cumplimiento de este contrato, a la jurisdicci&oacute;n 
                    de los Juzgados y Tribunales de la Ciudad de Panam&aacute;, Rep&uacute;blica de Panam&aacute;, con renuncia a su propio fuero, si lo tuvieran.
                </p>

                <p>EN FE DE LO CUAL, se firma el presente Contrato, en dos (2) ejemplares del mismo tenor y efecto, en la Ciudad 
                    de Panam&aacute;, Rep&uacute;blica de Panam&aacute;, a la fecha de su autenticaci&oacute;n.
                </p>

                <br/>
                <br/>
                <br/>
                <table style="width: 100%;">
                    <tr>
                        <td style=""><b>POR EL CLIENTE</b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>Por <?= strtoupper($data_empresa['nom_rz_pj']); ?></b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>_______________________________________</b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b><?= strtoupper($data_empresa['nom_apell_repl']); ?></b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>$data_empresa['nacionalidad_repl'] == 'PA')
                        <td style=""><b><? if (strstr(strtolower($data_empresa['nacionalidad_repl']), 'paname') || $data_empresa['nacionalidad_repl'] == 'PA') { ?>
                                    Cedula No. <?= $data_empresa['cedula_repl']; ?>, 
                                <? } else { ?>
                                    Pasaporte No. <?= $data_empresa['cedula_repl']; ?>, 
                                <? } ?>
                                <? if ($data_empresa['nacionalidad_repl'] == 'CED') { ?>
                                <? } else { ?>
                                <? } ?>
                            </b>
                        </td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>EL FACTOR</b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>Por ASSETS FACTORING INC.</b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>&nbsp;</b></td>
                        <td style=""><b>&nbsp;</b></td>
                    </tr>
                    <tr>
                        <td style=""><b>_______________________________________</b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>WILLIAN DIONICIO RAM&Iacute;REZ MONTES</b></td>
                        <td style=""><b></b></td>
                    </tr>
                    <tr>
                        <td style=""><b>Pasaporte No. 054896299</b></td>
                        <td style=""><b>   </b>
                        </td>
                    </tr>


                </table>


            </div>
    </body>
</html>
