<? $this->load->view('templates/header') ?>
<?
$rol = rol_usuario();
?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<link rel="stylesheet" type="text/css" href="scripts/filtro/style.css" />	
<script type="text/javascript" src="scripts/filtro/jquery-1.js"></script>
<script type="text/javascript" src="scripts/filtro/script.js"></script>	
<script type="text/javascript" src="scripts/filtro/jquery.js"></script>	
<script type="text/javascript" src="scripts/filtro/additional-methods.js"></script>	
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left') ?>            
        <div id="middle">

            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                </div><br>
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>

                <div class="container">
                    <div class="espacio_vertical_10"></div>
                    <table class="tabla_principal" border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tbody>
                            <tr>
                                <td class="segunda_columna" valign="top">
                                    <div class="contenedor_formulario">

                                        <form novalidate="novalidate" action="<?= $action; ?>" id="BusquedaCuentaBuscarForm" method="post" target="_blank" accept-charset="iso-8859-1">

                                            <table class="formulario" align="center" border="0" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td colspan="2">Seleccione las opciones para su Reporte</td>
                                                    </tr>

                                                    <tr style="display: none;">
                                                        <td class="etiqueta" colspan="2">
                                                            <input checked="checked" autocomplete="off" name="data[BusquedaCuenta][tipoBusq]" value="t" type="radio" />&nbsp;Por combinación
                                                        </td>
                                                    </tr>
                                                    <? if ($lista_bancos) { ?>
                                                        <tr>
                                                            <td class="etiqueta">
                                                                <label for="BusquedaCuentaPeriodo">
                                                                    <span class="requerido">*</span>Seleccione el Banco:
                                                                </label>
                                                            </td>
                                                            <td class="campo">
                                                                <select select name="id_banco" class="combinacion valid" id="id_banco">
                                                                    <option selected="selected" value="">Seleccione</option>
                                                                    <? foreach ($lista_bancos as $row) { ?>
                                                                    <option value="<?= sha1($row['id_banco']); ?>"><?= $row['nombre_banco'] ?></option>
                                                                    <? } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    <? if ($lista_proveedores) { ?>
                                                        <tr>
                                                            <td class="etiqueta">
                                                                <label for="BusquedaCuentaPeriodo">
                                                                    <span class="requerido">*</span>Seleccione el Beneficiario:
                                                                </label>
                                                            </td>
                                                            <td class="campo">
                                                                <select name="id_proveedor">
                                                                    <option selected="selected" value="0">Todos</option>
                                                                    <? foreach ($lista_proveedores as $row) { ?>
                                                                        <option value="<?= $row['id_proveedor']; ?>"><?= $row['nombre_proveedor'] ?></option>
                                                                    <? } ?>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    <? if ($lista_instrumento) { ?>
                                                        <tr>
                                                            <td class="etiqueta">
                                                                <label for="BusquedaCuentaPeriodo">
                                                                    <span class="requerido">*</span>Seleccione el Instrumento:
                                                                </label>
                                                            </td>
                                                            <td class="campo">
                                                                <select id="t_instru" name="t_instrumento">
                                                                    <option selected="selected" value="0">Todos</option>
                                                                    <option value="Cheque">Cheque</option>
                                                                    <option value="Transferencia">Transferencia</option>
                                                                    <option value="Efectivo">Efectivo</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    <? if ($lista_moneda) { ?>
                                                        <tr>
                                                            <td class="etiqueta">
                                                                <label for="BusquedaCuentaPeriodo">
                                                                    <span class="requerido">*</span>Seleccione la Moneda:
                                                                </label>
                                                            </td>
                                                            <td class="campo">
                                                                <select name="moneda">
                                                                    <option selected="selected" value="0">Todas</option>
                                                                    <option value="USD">USD</option>
                                                                    <option value="VEF">VEF</option>
                                                                    <option value="B/.">B/.</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                    <tr>
                                                        <td class="etiqueta">
                                                            <label for="BusquedaCuentaPeriodo">
                                                                <span class="requerido">*</span>Período:
                                                            </label>
                                                        </td>
                                                        <td class="campo">
                                                            <select name="data[BusquedaCuenta][periodo]" class="combinacion valid" id="BusquedaCuentaPeriodo">
                                                                <option selected="selected" value="">Seleccione</option>
                                                                <option value="a">Mes actual</option>
                                                                <option value="n">Mes anterior</option>
                                                                <option value="u">Últimos 12 meses</option>
                                                                <option value="o">Otro</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="etiqueta">
                                                            <label for="BusquedaCuentaFechaDesdeMonth">
                                                                <span class="estiloTexto">Fecha desde:</span>
                                                            </label>
                                                        </td>
                                                        <td style="width:250px;">
                                                            <select disabled="disabled" name="data[BusquedaCuenta][fechaDesde][day]" id="BusquedaCuentaFechaDesdeDay">
                                                            </select>-<select disabled="disabled" name="data[BusquedaCuenta][fechaDesde][month]" id="BusquedaCuentaFechaDesdeMonth">
                                                                <option value="01" <?= date('m') == '01' ? '_selected selected="selected"' : ''; ?>>Enero</option>
                                                                <option value="02" <?= date('m') == '02' ? '_selected selected="selected"' : ''; ?>>Febrero</option>
                                                                <option value="03" <?= date('m') == '03' ? '_selected selected="selected"' : ''; ?>>Marzo</option>
                                                                <option value="04" <?= date('m') == '04' ? '_selected selected="selected"' : ''; ?>>Abril</option>
                                                                <option value="05" <?= date('m') == '05' ? '_selected selected="selected"' : ''; ?>>Mayo</option>
                                                                <option value="06" <?= date('m') == '06' ? '_selected selected="selected"' : ''; ?>>Junio</option>
                                                                <option value="07" <?= date('m') == '07' ? '_selected selected="selected"' : ''; ?>>Julio</option>
                                                                <option value="08" <?= date('m') == '08' ? '_selected selected="selected"' : ''; ?>>Agosto</option>
                                                                <option value="09" <?= date('m') == '09' ? '_selected selected="selected"' : ''; ?>>Septiembre</option>
                                                                <option value="10" <?= date('m') == '10' ? '_selected selected="selected"' : ''; ?>>Octubre</option>
                                                                <option value="11" <?= date('m') == '11' ? '_selected selected="selected"' : ''; ?>>Noviembre</option>
                                                                <option value="12" <?= date('m') == '12' ? '_selected selected="selected"' : ''; ?>>Diciembre</option>
                                                            </select>-<select disabled="disabled" name="data[BusquedaCuenta][fechaDesde][year]" id="BusquedaCuentaFechaDesdeYear">
                                                                <? $year_var = date('Y'); ?>
                                                                <? for ($i = 0; $i <= 5; $i++) { ?>
                                                                    <? $year = $year_var - $i; ?>
                                                                    <option value="<?= $year; ?>" <?= $year == date('Y') ? '_selected selected="selected"' : ''; ?>><?= $year; ?></option>
                                                                <? } ?>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="etiqueta">
                                                            <label for="BusquedaCuentaFechaHastaMonth">
                                                                <span class="estiloTexto">Fecha hasta:</span>
                                                            </label>
                                                        </td>
                                                        <td style="width:250px;">
                                                            <select disabled="disabled" name="data[BusquedaCuenta][fechaHasta][day]" id="BusquedaCuentaFechaHastaDay">

                                                            </select>-<select disabled="disabled" name="data[BusquedaCuenta][fechaHasta][month]" class="automatic_month" id="BusquedaCuentaFechaHastaMonth">
                                                                <option value="01" <?= date('m') == '01' ? '_selected selected="selected"' : ''; ?>>Enero</option>
                                                                <option value="02" <?= date('m') == '02' ? '_selected selected="selected"' : ''; ?>>Febrero</option>
                                                                <option value="03" <?= date('m') == '03' ? '_selected selected="selected"' : ''; ?>>Marzo</option>
                                                                <option value="04" <?= date('m') == '04' ? '_selected selected="selected"' : ''; ?>>Abril</option>
                                                                <option value="05" <?= date('m') == '05' ? '_selected selected="selected"' : ''; ?>>Mayo</option>
                                                                <option value="06" <?= date('m') == '06' ? '_selected selected="selected"' : ''; ?>>Junio</option>
                                                                <option value="07" <?= date('m') == '07' ? '_selected selected="selected"' : ''; ?>>Julio</option>
                                                                <option value="08" <?= date('m') == '08' ? '_selected selected="selected"' : ''; ?>>Agosto</option>
                                                                <option value="09" <?= date('m') == '09' ? '_selected selected="selected"' : ''; ?>>Septiembre</option>
                                                                <option value="10" <?= date('m') == '10' ? '_selected selected="selected"' : ''; ?>>Octubre</option>
                                                                <option value="11" <?= date('m') == '11' ? '_selected selected="selected"' : ''; ?>>Noviembre</option>
                                                                <option value="12" <?= date('m') == '12' ? '_selected selected="selected"' : ''; ?>>Diciembre</option>
                                                            </select>-<select disabled="disabled" name="data[BusquedaCuenta][fechaHasta][year]" id="BusquedaCuentaFechaHastaYear">
                                                                <? $year_var = date('Y'); ?>
                                                                <? for ($i = 0; $i <= 5; $i++) { ?>
                                                                    <? $year = $year_var - $i; ?>
                                                                    <option value="<?= $year; ?>" <?= $year == date('Y') ? '_selected selected="selected"' : ''; ?>><?= $year; ?></option>
                                                                <? } ?>
                                                            </select>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td class="etiqueta" colspan="2">
                                                            <input name="excel" value="1" type="checkbox" />Solo Descargar Excel
                                                        </td>
                                                    </tr>
<!--                                                    <tr>
                                                        <td class="etiqueta">
                                                            <label for="BusquedaCuentaMontoDesde">
                                                                <span class="estiloTexto">Monto desde:</span>
                                                            </label>
                                                        </td>
                                                        <td class="campo">
                                                            <input autocomplete="off" name="data[BusquedaCuenta][montoDesde]" class="monto combinacion" maxlength="17" id="BusquedaCuentaMontoDesde" type="text" />
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="etiqueta">
                                                            <label for="BusquedaCuentaMontoHasta">
                                                                <span class="estiloTexto">Monto hasta:</span>
                                                            </label>
                                                        </td>
                                                        <td class="campo">
                                                            <input autocomplete="off" name="data[BusquedaCuenta][montoHasta]" class="monto combinacion" maxlength="17" id="BusquedaCuentaMontoHasta" type="text" />
                                                        </td>
                                                    </tr>-->
                                                    <tr>
                                                        <td colspan="2" style="border:0;">
                                                            <span class="requerido">*</span>
                                                            <span class="requerido2">Campo obligatorio</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" class="submit">
                                                            <input autocomplete="off" class="button" id="accept" value="Aceptar" type="submit" />
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>

                                    <script type="text/javascript">

                                        function acomodar() {

                                            $('label.error').remove();

                                            var tipoBusqueda = $('input[name="data[BusquedaCuenta][tipoBusq]"]:checked').val();

                                            switch (tipoBusqueda) {
                                                case 'f':
                                                    // Busqueda por referencia
                                                    $('#BusquedaCuentaReferencia').removeAttr('disabled');
                                                    $('#BusquedaCuentaPeriodo, select[name^="data[BusquedaCuenta][fecha"], #BusquedaCuentaMontoDesde, #BusquedaCuentaMontoHasta').attr('disabled', 'disabled');
                                                    $('input[name="data[BusquedaCuenta][montoHasta]"]').val('');
                                                    $('input[name="data[BusquedaCuenta][montoDesde]"]').val('');
                                                    break;
                                                case 't':
                                                    // Busqueda por combinación
                                                    $('#BusquedaCuentaReferencia').attr('disabled', 'disabled');
                                                    $('#BusquedaCuentaPeriodo, #BusquedaCuentaMontoDesde, #BusquedaCuentaMontoHasta').removeAttr('disabled');
                                                    $('input[name="data[BusquedaCuenta][referencia]"]').val('');

                                                    var periodo = $('#BusquedaCuentaPeriodo').val();

                                                    if (periodo == 'o') {
                                                        $('select[name^="data[BusquedaCuenta][fecha"],')
                                                                .removeAttr('disabled');
                                                    } else {
                                                        $('select[name^="data[BusquedaCuenta][fecha"]')
                                                                .attr('disabled', 'disabled');
                                                    }

                                                    break;
                                            }
                                        }

                                        $(function() {
                                            var d = new Date();
                                            var month = d.getMonth() + 1;
                                            var day = d.getDate();
                                            var output = month + '/' + day + '/' + d.getFullYear();

                                            acomodar();

                                            $('#BusquedaCuentaPeriodo').change(acomodar);
                                            $('input[name="data[BusquedaCuenta][tipoBusq]"]').change(acomodar);


                                            $('#BusquedaCuentaBuscarForm').validate({
                                                onkeyup: false,
                                                rules: {
                                                    'id_banco': {
                                                        required: true
                                                    },
                                                    'data[BusquedaCuenta][periodo]': {
                                                        required: true
                                                    },
                                                    'data[BusquedaCuenta][referencia]': {
                                                        required: {
                                                            depends: function(e) {
                                                                return $('input[name="data[BusquedaCuenta][tipoBusq]"]:checked').val() == 'f';
                                                            }
                                                        },
                                                        digits: true
                                                    },
                                                    'data[BusquedaCuenta][montoDesde]': {
                                                        numberVE: true
                                                    },
                                                    'data[BusquedaCuenta][montoHasta]': {
                                                        numberVE: true,
                                                        mayorIgual: '#BusquedaCuentaMontoDesde'
                                                    },
                                                    'data[BusquedaCuenta][fechaDesde][year]': {
                                                        'fechaMenorIgualQueFijo': output
                                                    },
                                                    'data[BusquedaCuenta][fechaHasta][year]': {
                                                        'fechaMayorIgualQue': '#BusquedaCuentaFechaDesdeYear',
                                                        'fechaMenorIgualQueFijo': output
                                                    }
                                                },
                                                messages: {
                                                    'id_banco': {
                                                        required: "Estimado Cliente, debe seleccionar un Banco. Por favor verifique e intente de nuevo."},
                                                    'data[BusquedaCuenta][periodo]': {
                                                        required: "Estimado Cliente, debe seleccionar el per\u00edodo. Por favor verifique e intente de nuevo."},
                                                    'data[BusquedaCuenta][referencia]': {
                                                        required: "Estimado Cliente, por favor introduzca un valor para la referencia.",
                                                        digits: "Estimado Cliente, la referencia es inv\u00e1lido. Por favor verifique e intente de nuevo."},
                                                    'data[BusquedaCuenta][montoDesde]': {
                                                        numberVE: "Estimado Cliente, el monto es inv\u00e1lido. Por favor verifique e intente de nuevo."},
                                                    'data[BusquedaCuenta][montoHasta]': {
                                                        numberVE: "Estimado Cliente, el monto es inv\u00e1lido. Por favor verifique e intente de nuevo.",
                                                        mayorIgual: "Estimado cliente, el monto desde no puede ser superior al monto hasta"},
                                                    'data[BusquedaCuenta][fechaDesde][year]': {
                                                        'fechaMenorIgualQueFijo': "Estimado Cliente, no puede seleccionar una fecha mayor que la fecha actual"},
                                                    'data[BusquedaCuenta][fechaHasta][year]': {
                                                        'fechaMayorIgualQue': "Estimado Cliente, la fecha hasta debe ser mayor o igual que la fecha desde",
                                                        'fechaMenorIgualQueFijo': "Estimado Cliente, no puede seleccionar una fecha mayor que la fecha actual"}
                                                }
                                            });
                                        });
                                    </script>	

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>