<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="css/style_mandato.css" />
    </head>
    <body>
        <div class="cuerpo">

            <p class="title">
                <b> <b>CONVENIO DE ACEPTACION</b>
            </p>
            <br/>
            <p>
                Entre los suscritos a saber <b>WILLIAN DIONICIO RAM&Iacute;REZ MONTES</b>, var&oacute;n, Venezolano, mayor de edad, con pasaporte n&uacute;mero 054896299,
                actuando en su condici&oacute;n de Secretario y Representante Legal de <b>ASSETS FACTORING INC.</b>  sociedad an&oacute;nima organizada de conformidad con las leyes de 
                la Rep&uacute;blica de Panam&aacute;, inscrita a la Ficha ochocientos treinta y dos mil seiscientos sesenta y nueve (832669), Documento dos millones quinientos 
                noventa y tres mil cuatrocientos cincuenta (2593450) de la Secci&oacute;n de Micropel&iacute;culas (Mercantil), del Registro P&uacute;blico, en fecha 05 de Mayo de 2014,
                en lo sucesivo <b>EL FACTOR</b>, por una parte; y por la
                otra 
                <b><?= strtoupper($rep_legal['nom_apell_repl']); ?></b>, <?= $rep_legal['sexo_repl']; ?>, 
                <?
                if (strstr(strtolower($rep_legal['nacionalidad_repl']), 'paname') || $rep_legal['nacionalidad_repl'] == 'PA') {
                    if ($rep_legal['sexo_repl'] == 'Varon') {
                        echo 'Paname&ntilde;o';
                    } else {
                        echo 'Paname&ntilde;a';
                    }
                } else {
                    echo $rep_legal['nacionalidad_repl'];
                }
                ?>, mayor de edad, con 
                <?
                if (strstr(strtolower($rep_legal['nacionalidad_repl']), 'paname') || $rep_legal['nacionalidad_repl'] == 'PA') {
                    echo 'c&eacute;dula de identidad personal ';
                } else {
                    echo 'Pasaporte ';
                }
                ?>
                n&uacute;mero <?= $rep_legal['cedula_repl']; ?>, actuando en nombre y representaci&oacute;n de la sociedad an&oacute;nima.
                <b><?= strtoupper($solicitud['nom_rz_pj']); ?></b>, 
                <?
                if ($solicitud['nacionalidad_emp'] == 'p') {
                    $V = new EnLetras();
                    echo 'inscrita a la ficha ' . strtolower($V->ValorEnLetras($solicitud['num_ficha_pj'], '')) .
                    ' (' . $solicitud['num_ficha_pj'] .
                    '), documento ' . strtolower($V->ValorEnLetras($solicitud['num_doc_pj'], '')) . ' (' . $solicitud['num_doc_pj'] . '),'
                    . ' de la Secci&oacute;n de Micropel&iacute;culas (Mercantil) del Registro P&uacute;blico, '
                    . 'con domicilio en Ciudad de Panam&aacute;';
                } else {
                    echo 'inscrita ante el ' . $solicitud['of_reg_pj'] . ', bajo el N&deg; ' .
                    $solicitud['num_reg_pj'] . ', Tomo ' .
                    $solicitud['tomo_reg_pj'] . ', en fecha ' .
                    fecha($solicitud['fecha_reg_pj']) . ' en ' .
                    $solicitud['ciudad_reg_pj'] . ' - ' .
                    $solicitud['estado_reg_pj'] . ' - Venezuela, ';
                }
                ?>
                quien en lo sucesivo se denominar&aacute; <b>EL CLIENTE</b>, y quienes 
                en forma conjunta se denominaran <b>LAS PARTES</b>, declaran que han convenido en celebrar, mediante la suscripci&oacute;n de este 
                documento, el presente Convenio de Aceptaci&oacute;n conforme a las estipulaciones y clausulas siguientes: 
            </p>
            <br/>
            <p>
                <b>PRIMERA</b>: En fecha <?= fecha($cupo_activo['fecha_solicitud_aprobado']); ?>, <b>LAS PARTES</b> suscribieron un <b>CONTRATO DE FACTORING</b> en 
                adelante <b>CONTRATO MARCO</b> el cual fue debidamente autenticado por Notario P&uacute;blico. 
            </p>
            <br/>
            <p>
                <b>SEGUNDA</b>: Los t&eacute;rminos utilizados con may&uacute;sculas no definidos de otra forma en el presente Convenio de Aceptaci&oacute;n,
                tendr&aacute;n el significado que se desprende del <b>CONTRATO MARCO</b>.
            </p>
            <br/>  
            <p>
                <b>TERCERA</b>: En fecha <?= fecha($solicitud['fecha_solicitud']) ?>, el <b>CLIENTE</b> remiti&oacute; una <b>SOLICITUD DE VENTA</b> 
                por la cantidad de <b><?
                $V = new EnLetras();
                echo strtoupper($V->ValorEnLetras(($solicitud['monto_solicitud']), 'Dolares'));
                ?>
                    (US$ <?= number_format($solicitud['monto_solicitud'], '2', ',', '.'); ?>)</b>,
                conforme con los t&eacute;rminos del "<b>CONTRATO</b>",
                y a los fines de que <b>EL FACTOR</b> procediera a considerar la posibilidad de Comprar a Descuento las 
                <b>FACTURAS</b> a que se refiere dicha <b>SOLICITUD DE VENTA</b>. 
            </p>
            <br/>
            <p>
                <b>CUARTA</b>: <b>El CLIENTE</b> Certifica mediante <b>DECLARACION JURADA</b> que todas y cada uno de los Cr&eacute;ditos documentados 
                en las Facturas presentadas para su venta al <b>FACTOR</b>, son ver&iacute;dicos, leg&iacute;timos, validos, exigibles y l&iacute;quidos 
                a su vencimiento, no sujetos a compensaci&oacute;n, retenci&oacute;n (con expresa excepci&oacute;n de las retenciones de Impuestos 
                que le fueren aplicables), oposici&oacute;n, excepciones, grav&aacute;menes o condici&oacute;n alguna. As&iacute; mismo el <b>CLIENTE</b> declara
                que los Cr&eacute;ditos documentados en las <b>FACTURAS</b> no han sido en ning&uacute;n caso cedidos a otra persona Natural o jur&iacute;dica. 
            </p>
            <br/>
            <p>
                <b>QUINTA</b>: <b>El FACTOR</b> declara que ha estudiado y analizado cuidadosamente cada una de las Facturas incluidas en la 
                <b>SOLICITUD DE VENTA</b> y en virtud de ello ha decidido Comprar a Descuento las siguientes Facturas:
            </p>
            <br/>
            <p>


                <br/>

            <p>
            <table class="tabla">
                <tr>
                    <td class="titulo_tabla" colspan="9">RELACI&Oacute;N DE FACTURAS</td>
                </tr>
                <tr>
                    <td class="sub_titulo_tabla">N&deg; Fact.</td>
                    <td class="sub_titulo_tabla">Deudor</td>
                    <td class="sub_titulo_tabla">RUC</td>
                    <td class="sub_titulo_tabla">Emision</td>
                    <td class="sub_titulo_tabla">Vencimiento</td>
                    <td class="sub_titulo_tabla">Monto</td>
                    <td class="sub_titulo_tabla">Plazo</td>
                    <td class="sub_titulo_tabla">Precio</td>
                    <td class="sub_titulo_tabla">Pagado</td>
                    <!--<td class="sub_titulo_tabla">MONTO CON ITBMS</td>-->
                </tr>
                <?
                $tot_val_nom = 0;
                $liquidado = 0;
                ?>
                <?
                $i = 1;
                foreach ($facturas as $row) {
                    ?>
                    <?
                    if ($row['status'] >= "0") {
                        $tot_val_nom = $tot_val_nom + $row['valor_nominal'];
                        $liquidado = $liquidado + $row['liquidado_compra'];
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo @$row['numero_factura']; ?></td>
                            <td class="contenido_td"><?php echo @$row['deudor']; ?></td>
                            <td class="contenido_td"><?php echo @$row['rif']; ?></td>
                            <td class="contenido_td"><?php echo @$row['fecha_emision']; ?></td>
                            <td class="contenido_td"><?php echo @$row['fecha_vencimiento']; ?></td>
                            <td class="contenido_numero"><?php echo number_format(@$row['valor_nominal'], 2, ',', '.'); ?></td>
                            <td class="contenido_numero"><?php echo $row['plazo_compra'] ?></td>
                            <td class="contenido_numero"><?php echo $row['precio_compra'] ?>%</td>
                            <td class="contenido_numero"><?php echo number_format($row['liquidado_compra'], 2, ',', '.'); ?></td>
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
                        <td class="contenido_numero"><b><?php echo number_format(@$tot_val_nom, 2, ',', '.'); ?></b></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><b><?php echo number_format($liquidado, 2, ',', '.'); ?></b></td>
                    </tr>
                </table>
            </p>
            <br/>
            <p>
                Conviniendo la Compra a Descuento de las facturas en un <?
                    $V = new EnLetras();
                    echo $V->ValorEnLetras($solicitud['porcentaje_compra'], 'por ciento')
                    ?> (<?= $solicitud['porcentaje_compra'] ?>%) del Valor Nominal
                de las mismas presentadas para su venta por el <b>CLIENTE</b>, lo que equivale a 
                <b><?
                $equivalente = $liquidado;
                echo strtoupper($V->ValorEnLetras(($equivalente), 'Dolares'));
                ?>
                    (US$. <? echo number_format($equivalente, 2, ',', '.'); ?>)
                </b>.
            </p>
            <br/>    
            <p>
                <b>SEXTA</b>: El plazo para que el factor haga efectivo el cobro de las <b>FACTURAS</b>  se ha convenido a un plazo
                de <?
                echo $V->ValorEnLetras(($solicitud['plazo_solicitud_aprobado']), '');
                ?> (<?= number_format($solicitud['plazo_solicitud_aprobado'], 0, '', ''); ?>) d&iacute;as continuos a partir de la firma del presente Convenio, es decir 
                el <b>
                <?
                if ($solicitud['fecha_vcto_solicitud_aprobado'] == '1899-11-30 00:00:00' || $solicitud['fecha_vcto_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha($solicitud['fecha_vcto_solicitud_aprobado']);
                }
                ?></b>. Para lo cual el <b>CLIENTE</b> deber&aacute; realizar todas las diligencias
                necesarias para que el (los) deudor (es) de las <b>FACTURAS</b> objeto del presente convenio y cumpliendo con el Mandato
                Especial establecido en la Clausula OCTAVA, cancelen los debidos importes de todas y cada una de las <b>FACTURAS</b>.                  

            </p>    
            <br/>


            <p>
                <b>SEPTIMA: DE LA CUSTODIA DE LAS FACTURAS</b>: Que en nombre de nuestra representada <b>ASSETS FACTORING INC</b>., en este mismo acto
                otorgamos y <b><?= strtoupper($solicitud['nom_rz_pj']); ?></b>., acepta mantener la Custodia de los <b>ORIGINALES</b> de las <b>FACTURAS</b> objeto de la presente operaci&oacute;n.
                La custodia de dichas facturas ser&aacute; ejercida por <b><?= strtoupper($solicitud['nom_rz_pj']); ?></b>, hasta la fecha en que dicha empresa realice el
                cobro de las mismas. 
            </p>
            <br/>
            <p>
                <b>OCTAVA</b>: <b>MANDATO ESPECIAL DE COBRO</b>: Que en nombre de nuestra representada <b>ASSETS FACTORING INC</b>., en este mismo
                acto otorgamos; y <b><?= strtoupper($solicitud['nom_rz_pj']); ?></b> acepta un <b>MANDATO ESPECIAL DE COBRO</b> de las <b>FACTURAS</b> objeto de la presente negociaci&oacute;n,
                a los respectivos <b>DEUDORES</b>.
                y Yo, <b><?= strtoupper($rep_legal['nom_apell_repl']); ?></b> debidamente identificado y facultado para celebrar este <b>CONVENIO DE ACEPTACION</b> 
                por los Estatutos Sociales de la Empresa declaro: que acepto todas y cada una de las <b>CLAUSULAS</b> del presente
                <b>CONVENIO DE ACEPTACION</b> y me obligo a notificar a cada <b>DEUDOR</b> de las <b>FACTURAS</b> que en este acto doy en
                venta al <b>FACTOR</b> y que han sido aceptadas por este para su Compra a Descuento, y por lo cual 
                le pertenecen, a realizar todas las gestiones necesarias para garantizar que cada <b>DEUDOR</b> pague
                efectivamente al vencimiento cada <b>FACTURA</b> seg&uacute;n corresponda, y que el producto de la cobranza
                hecha por mi representada, de acuerdo al <b>MANDATO ESPECIAL DE COBRO</b>, que me ha sido otorgado, 
                le sea abonado a la cuenta que para tales efectos indique el <b>FACTOR</b>. 
            </p>
            <br/>

            <p>
                EN FE DE LO CUAL, se firma el presente <b>CONVENIO DE ACEPTACION</b>, en dos (2) ejemplares del mismo tenor y efecto, 
                en la Ciudad de Panam&aacute;, Rep&uacute;blica de Panam&aacute;, a los 
                <?
                if ($solicitud['fecha_solicitud_aprobado'] == '1899-11-30 00:00:00' || $solicitud['fecha_solicitud_aprobado'] == '0000-00-00 00:00:00') {
                    echo '';
                } else {
                    echo fecha($solicitud['fecha_solicitud_aprobado']);
                }
                ?>.
            </p>

            <br/><br/>
            <b><p style="text-align: center;">
                    Por EL FACTOR. 
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    Por EL CLIENTE.
            </p></b>



    </div>
</body>
</html>            
