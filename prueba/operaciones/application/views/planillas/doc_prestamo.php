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
            <br/>
            <p>
                Entre <b>ASSETS FACTORING INC</b>, sociedad mercantil domiciliada en la ciudad de Caracas, inscrita ante el 
                Registro Mercantil Segundo de la Circunscripción  Judicial del Distrito Capital y Estado Miranda, el 25 
                de Febrero de 2009, bajo el No. 37, Tomo 32-A-Sgdo, expediente No. 221-3428, en lo adelante denominada <b>LA ACREEDORA</b>, 
                representada en este acto por, <b>WILLIAN D. RAMIREZ M. y YAMIR JOSE URBINA</b>, Venezolanos, mayores de edad, de este
                domicilio y titulares de la Cédulas de Identidad No.<b> V-5.011.205 y V-6.728.621</b>, actuando en este acto en el carácter de
                Directores  y debidamente facultados en el Acta de Asamblea Extraordinaria de Accionistas de la referida empresa celebrada
                el 01 de junio de 2009 e inscrita en el Registro Mercantil Segundo de la Circunscripción  Judicial del Distrito Capital y
                Estado Miranda, el 03 de Agosto de 2009, bajo el No. 34, Tomo 162-A-Sgdo, y <b><?= strtoupper($solicitud['nom_rz_pj']); ?></b>. También 
                una sociedad mercantil domiciliada en <?= $solicitud['direccion_pj']; ?> e inscrita ante el 
                <?php
                echo $solicitud['of_reg_pj'] . ', bajo el N&deg; ' .
                $solicitud['num_reg_pj'] . ', Tomo ' .
                $solicitud['tomo_reg_pj'] . ', en fecha ' .
                fecha($solicitud['fecha_reg_pj']) . ' en ' .
                $solicitud['ciudad_reg_pj'] . ' - ' .
                $solicitud['estado_reg_pj'];
                ?>, 
                y representada en este acto por 
                <?
                if (count($firma_cont) == 1) {
                    echo '<b>' . strtoupper($firma_cont[0]['nombres_dir'] . ' ' . $firma_cont[0]['apellidos_dir']) . '</b>';
                }if (count($firma_cont) == 2) {
                    echo '<b>' . strtoupper($firma_cont[0]['nombres_dir'] . ' ' . $firma_cont[0]['apellidos_dir']) . '</b> y ' . '<b>' . strtoupper($firma_cont[1]['nombres_dir'] . ' ' . $firma_cont[1]['apellidos_dir']) . '</b>';
                }
                ?>,

                <?
                if (count($firma_cont) == 1) {
                    echo ' titular de la cédula de identidad No.<b>' . strtoupper($firma_cont[0]['nacionalidad_dir']) . '.- ' . number_format($firma_cont[0]['cedula_dir'], 0, ',', '.') . '</b>, debidamente facultados';
                }if (count($firma_cont) == 2) {
                    echo ' titulares de las cédulas de identidad No.<b>' . strtoupper($firma_cont[0]['nacionalidad_dir']) . '.- ' . number_format($firma_cont[0]['cedula_dir'], 0, ',', '.') . '</b> y <b>' .
                    strtoupper($firma_cont[1]['nacionalidad_dir']) . '.- ' . number_format($firma_cont[1]['cedula_dir'], 0, ',', '.') . '</b> respectivamente';
                    ;
                }
                ?>
                , 
                quien en lo en lo adelante se denominara <b>EL DEUDOR</b>,  se ha convenido en celebrar el presente <b>CONTRATO DE PRESTAMO MERCANTIL 
                    POR  TIEMPO DETERMINADO</b> por el cual EL DEUDOR declara: Que debe y pagará sin aviso y sin protesto, en la cuidad de Caracas y en 
                moneda de curso legal, a la orden de <b>LA ACREEDORA</b>, la cantidad de <b><?
                $V = new EnLetras();
                echo strtoupper($V->ValorEnLetras(($solicitud['monto_solicitud_aprobado']), 'Bolivares'));
                ?>
                    (Bs. <? echo number_format($solicitud['monto_solicitud_aprobado'], 2, ',', '.'); ?>)</b> los cuales serán pagados dentro del plazo de 
                <?= strtolower($V->ValorEnLetras($solicitud['plazo_solicitud'], '(' . number_format($solicitud['plazo_solicitud'], 0, '', '') . ') dias')) ?> 
                continuos contados a partir del <?= fecha($solicitud['fecha_solicitud_aprobado']) ?> hasta el <?= fecha($solicitud['fecha_vcto_solicitud_aprobado']) ?> 
                ambas fechas inclusive, cantidad esta que ha recibido <b>EL DEUDOR</b> de <b>LA ACREEDORA</b>, en calidad de préstamo y en dinero efectivo. <b>EL DEUDOR</b>  
                se compromete a pagar, en el plazo que se la he concedido para el reintegro total del monto aquí convenido,   sometiéndose <b>EL DEUDOR</b> a 
                las condiciones que fije <b>LA ACREEDORA</b>. En caso que EL DEUDOR  tuviese la intención de renovar el presente <b>CONTRATO DE PRESTAMO</b> a la 
                fecha de su culminación, deberá 1°) notificar a <b>LA ACREEDORA</b> su intención de renovar el préstamo con por lo menos cinco (5) días antes 
                a la fecha de culminación del termino de pago del préstamo original, 2°) Solicitar prorroga una vez y exclusivamente por un periodo de 
                Diez (10) días, 3°) cancelar la penalidad que estime <b>LA ACREEDORA</b>. Todos los gastos que ocasione este CONTRATO son por cuenta de <b>EL DEUDOR</b>,
                inclusive los gastos por honorarios profesionales causados de abogados respecto a la de cobranza judicial y/o extrajudicial, si se diese el caso.  En todo lo relativo al cumplimiento de este contrato, queda 
                sometido <b>EL DEUDOR</b> a los tribunales de la ciudad de Caracas. 
                <br/>
                <b>LA ACREEDORA</b> podrá considerar exigible esta obligación aun cuando estuviere de plazo pendiente, cuando ocurra alguno de los siguientes casos: 
                1) si <b>EL DEUDOR</b> fuere objeto de alguna medida ejecutiva o preventiva de embargo o de prohibición de enajenar y gravar. 
                2) si <b>EL DEUDOR</b> incurriere en suspensión de pago aunque ella no fuere declarada por un tribunal. En ninguno de estos casos
                <b>LA ACREEDORA</b> está obligado a hacer ningún tipo de descuento en virtud de la precoz exigibilidad de la operación. Es 
                convenido que el plazo para el pago principal de este préstamo está establecido en beneficio de <b>LA ACREEDORA</b>. 
                <br/>

                <?
                if (count($avales) == 1) {
                    echo 'Yo <b>' . $avales[0]['nombres_dir'] . ' ' . $avales[0]['apellidos_dir'];
                    echo '</b> de nacionalidad ';
                    echo $avales[0]['nacionalidad_dir'] == 'v' ? 'Venezolana' : 'Extrajero';
                    echo ' mayor de edad, y titular de la c&eacute;dula de identidad No. <b>' . strtoupper($avales[0]['nacionalidad_dir']) .
                    '.- ' . number_format($avales[0]['cedula_dir'], 0, ',', '.') . '</b>';
                    echo 'declaro que constituyo el fiador solidario, responsable y principal pagador, de 
                        todas las obligaciones contraídas por <b>EL DEUDOR</b> antes identificado, en virtud del presente Documento de Prestamo.';

                    if ($avales[0]['cedula_cony'] != '') {
                        
                        echo 'Y yo, <b>' . ucwords(strtolower($avales[0]['nom_apell_cony'])) . '</b> de nacionalidad ';
                        echo $avales[0]['nacionalidad_cony'] == 'v' ? 'Venezolana' : 'Extrajero';
                        echo ', mayor de edad, de este domicilio y titular de la cedula de identidad';
                        echo '<b>' . strtoupper($avales[0]['nacionalidad_cony']) . '.- ' . number_format($avales[0]['cedula_cony'], 0, ',', '.') . '</b>';
                        echo ', actuando en este acto en mi carácter de Conyuge de ' . $avales[0]['nombres_dir'] . ' ' . $avales[0]['apellidos_dir'] . ',
                        por el presente documento declaro, que acepto las condiciones en que mi Conyuge se constituye en fiador.';
                    }
                }if (count($avales) == 2) {
                    echo 'Nosotros <b>' . $avales[0]['nombres_dir'] . ' ' . $avales[0]['apellidos_dir'] . ' y ' .
                    $avales[1]['nombres_dir'] . ' ' . $avales[1]['apellidos_dir'];
                    echo '</b> de nacionalidades  ';
                    echo $avales[0]['nacionalidad_dir'] == 'v' ? 'Venezolana y ' : 'Extrajero y ';
                    echo $avales[1]['nacionalidad_dir'] == 'v' ? 'Venezolana' : 'Extrajero';
                    echo ' mayores de edad, y titulares de la c&eacute;dulas de identidad No. <b>' . strtoupper($avales[0]['nacionalidad_dir']) .
                    '.- ' . number_format($avales[0]['cedula_dir'], 0, ',', '.') . '</b>' . ' y <b>' .
                    strtoupper($avales[1]['nacionalidad_dir']) . '.- ' . number_format($avales[1]['cedula_dir'], 0, ',', '.') . '</b> respectivamente ';
                    echo 'declaramos que constituimos en fiadores solidarios, responsables y principales pagadores, de 
                        todas las obligaciones contraídas por <b>EL DEUDOR</b> antes identificado, en virtud del presente Documento de Prestamo.';

                    if ($avales[0]['cedula_cony'] != '') {
                        echo 'Y yo, <b>' . ucwords(strtolower($avales[0]['nom_apell_cony'])) . '</b> de nacionalidad ';
                        echo $avales[0]['nacionalidad_cony'] == 'v' ? 'Venezolana' : 'Extrajero';
                        echo ', mayor de edad, de este domicilio y titular de la cedula de identidad';
                        echo '<b>' . strtoupper($avales[0]['nacionalidad_cony']) . '.- ' . number_format($avales[0]['cedula_cony'], 0, ',', '.') . '</b>';
                        echo ', actuando en este acto en mi carácter de Conyuge de ' . $avales[0]['nombres_dir'] . ' ' . $avales[0]['apellidos_dir'] . ',
                        por el presente documento declaro, que acepto las condiciones en que mi Conyuge se constituye en fiador.';
                    }
                    if ($avales[1]['cedula_cony'] != '') {
                        echo 'Y yo, <b>' . ucwords(strtolower($avales[1]['nom_apell_cony'])) . '</b> de nacionalidad ';
                        echo $avales[1]['nacionalidad_cony'] == 'v' ? 'Venezolana' : 'Extrajero';
                        echo ', mayor de edad, de este domicilio y titular de la cedula de identidad';
                        echo '<b>' . strtoupper($avales[1]['nacionalidad_cony']) . '.- ' . number_format($avales[1]['cedula_cony'], 0, ',', '.') . '</b>';
                        echo ', actuando en este acto en mi carácter de Conyuge de ' . $avales[1]['nombres_dir'] . ' ' . $avales[1]['apellidos_dir'] . ',
                        por el presente documento declaro, que acepto las condiciones en que mi Conyuge se constituye en fiador.';
                    }
                }
                ?>

                <br/>
                Es entendido que dicha garantía subsistirá hasta la definitiva y total cancelación de las obligaciones garantizadas 
                quedando <b>LA ACREEDORA</b>, relevada de toda responsabilidad en relación con el artículo 1.815 del Código Civil. 
                Renuncio expresamente al beneficio de exclusión y división establecido en los artículos 1.812 y 1.819 del Código
                Civil y me adhiero a la elección de domicilio convenida en este documento. Queda entendido que <b>LA ACREEDORA</b>, 
                podrá hacer valer en forma simultánea el aval y la fianza solidaria aquí constituida, una de dichas 
                garantías como subsidiaria de la otra.

                <br/>

                Y Nosotros, <b>WILLIAN D. RAMIREZ M. y YAMIR JOSE URBINA</b>, Venezolanos, mayores de edad, de este
                domicilio y titulares de la Cédulas de Identidad No.<b> V-5.011.205 y V-6.728.621</b>, actuando en este acto en el carácter de
                Directores de <b>ASSETS FACTORING INC</b>, declaramos: que los recursos utilizados en la presente operación de Préstamo son provenientes 
                de actividades y operaciones de lícito comercio. <br/>
                En la ciudad de Caracas, <?= fecha($solicitud['fecha_solicitud_aprobado']) ?>.
                <br/>
                <br/>

            <div style="float: left; width: 48%; text-align: center;">
                <p>Por <?= strtoupper($data_empresa['nom_rz_pj']); ?></p>
                <br/><br/>

                <?
                if (count($firma_cont) == 1) {
                    echo '<p style="text-align: left;">' . ucwords(strtolower($firma_cont[0]['nombres_dir'] . ' ' . $firma_cont[0]['apellidos_dir'])) . '</p>';
                }if (count($firma_cont) == 2) {
                    echo '<p style="text-align: left;">' . ucwords(strtolower($firma_cont[0]['nombres_dir'] . ' ' . $firma_cont[0]['apellidos_dir'])) . '</p> <br/><br/>
                          <p style="text-align: left;">' . ucwords(strtolower($firma_cont[1]['nombres_dir'] . ' ' . $firma_cont[1]['apellidos_dir'])) . '</p>';
                }
                ?>
                <br/><br/>
                <p style="text-align: center;">BUENO POR AVAL</p>
                <br/>
                <?
                if (count($avales) == 1) {
                    echo '<p style="text-align: left;">' . ucwords(strtolower(@$avales[0]['nombres_dir'] . ' ' . $avales[0]['apellidos_dir'])) . '</p>';
                }if (count($avales) == 2) {
                    echo '<p style="text-align: left;">' . ucwords(strtolower(@$avales[0]['nombres_dir'] . ' ' . $avales[0]['apellidos_dir'])) . '</p> <br/><br/>';
                    echo '<p style="text-align: left;">' . ucwords(strtolower(@$avales[1]['nombres_dir'] . ' ' . $avales[1]['apellidos_dir'])) . '</p> <br/><br/>';
                }
                echo '<p style="text-align: left;">' . ucwords(strtolower(@$avales[0]['nom_apell_cony'])) .'</p> <br/><br/>';
                echo '<p style="text-align: left;">' . ucwords(strtolower(@$avales[1]['nom_apell_cony'])) .'</p> <br/><br/>';
                ?>
            </div>
            <div style="float: right; width: 48%;  text-align: center;">
                <p>Por  ASSETS FACTORING INC</p>
                <br/><br/>
                <p>Willian Ramírez &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Yamir Urbina</p>

            </div>
            <p>

            </p>
            <br/>
            <p>

            </p>
        </div>
    </body>
</html>            









