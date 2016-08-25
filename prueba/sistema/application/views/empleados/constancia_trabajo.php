<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="css/constancia_trabajo.css" />
    </head>
    <body>
        <div class="header">
            <div class="div_50">
                <img src="images/logo_portada.png" width="240"/>
            </div>
            <div class="div_50">
                <div class="direccion_cabecera">
                    <br/><br/><br/>
                    Av. Tamanaco, Torre ATLANTIC, Piso 7, Oficina 7-B, El Rosal, <br/>Caracas, Venezuela<br/>
                    Web: www.msfactoring.com.ve <br/>
                    Email: ms.factoring@hotmail.com<br/>
                    Teléfonos: 0212-9525573 / 9525321<br/>
                </div>
            </div>    
        </div>
        <div class="contenido">
            <br/><br/><br/>
            <h1>CONSTANCIA DE TRABAJO</h1>
            <br/>  
            <p class="parrafo_1">
                Por medio de la presente hacemos constar que <?= $datos_empleado['sexo_emp'] == 'm' ? 'el ciudadano' : 'la ciudadana'; ?> que se menciona a continuación presta sus servicios en esta empresa.
            </p>
            <table>
                <tr>
                    <td>APELLIDOS</td>
                    <td><?= $datos_empleado['primer_apellido_emp'] . ' ' . $datos_empleado['segundo_apellido_emp'] ?></td>
                </tr>
                <tr>
                    <td>NOMBRES</td>
                    <td><?= $datos_empleado['primer_nombre_emp'] . ' ' . $datos_empleado['segundo_nombre_emp'] ?></td>
                </tr>
                <tr>
                    <td>CEDULA DE IDENTIDAD</td>
                    <td><?= $datos_empleado['nacionalidad_emp'] . '.- ' . number_format($datos_empleado['cedula_emp'], '0', ',', '.') ?></td>
                </tr>
                <tr>
                    <td>FECHA DE INGRESO</td>
                    <td><?= fecha($datos_empleado['fecha_ingreso_empleado']); ?></td>
                </tr>
                <tr>
                    <td>CARGO</td>
                    <td><?= $datos_empleado['cargo_empleado']; ?></td>
                </tr>
                <tr>
                    <td>DIRECCION</td>
                    <td><?= $datos_empleado['name_departamento']; ?></td>
                </tr>
                <tr>
                    <td>SUELDO MENSUAL</td>
                    <td>Bs. <?= number_format($datos_empleado['sueldo_emp'], '2', ',', '.'); ?></td>
                </tr>
                <tr>
                    <td>BONO ALIMENTACION</td>
                    <td>Bs. <?= number_format($datos_empleado['ticket_emp'], '2', ',', '.'); ?></td>
                </tr>
            </table>
            <p class="parrafo_1">
                <? $V = new EnLetras(); ?>
                Constancia que se expide a solicitud de la parte interesada en la ciudad de Caracas a los
                <?= $V->ValorEnLetras(date('d'), dias) . '(' . date('d') . ')'; ?> 
                <?= fecha(date('Y-m-d'), 'mes'); ?> 
                <?= strtolower($V->ValorEnLetras(date('Y'), '')) . '(' . date('Y') . ')'; ?>.
            </p>
            <p class="parrafo_2">
                Atentamente,
            </p>
            <br/><br/><br/>
            <p class="parrafo_3">
                YAMIR JOSE URBINA <br/>
                DIRECTOR
            </p>
        </div>
    </body>
</html>