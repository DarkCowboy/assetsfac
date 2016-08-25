<? $this->load->view('templates/header') ?>
<script type="text/javascript" >
    $(function() {

        myCalendar = new dhtmlXCalendarObject(["fecha"], true, {isYearEditable: true, isMonthEditable: true});
        myCalendar.setSkin('dhx_terrace');
        myCalendar.hideTime();
        dhtmlXCalendarObject.prototype.langData["es"] = {
            dateformat: '%d.%m.%Y',
            monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            weekstart: 1
        }
        myCalendar.loadUserLanguage('es');

    });
</script>

<body>
    <div id="main">
        <? $this->load->view('templates/menu_left') ?>            
        <div id="middle">
            <?
            if ($this->session->flashdata('result')) {
                echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                echo $this->session->flashdata('result');
                echo "</div>";
            }
            ?>
            <div class="form_main">

                <form action="./bancos/registrar_traspaso" method="post" class="form" style="" id="validate-form" >

                    <table class="table_main_form">
                        <tbody>
                            <tr>
                                <td><p class="sub_tit_form">Datos de la Transferencia:</p></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="first"><p>Banco Emisor</p></td>
                                <td class="last">
                                    <select name="id_banco_emisor" id="id_banco_emisor">
                                        <option>Seleccione...</option>
                                        <? foreach ($bancos as $row) { ?>
                                            <option value="<?= $row['id_banco'] ?>" t_banco="<?= $row['t_banco'] ?>" n_cuenta="<?= $row['n_cuenta'] ?>" moneda="<?= $row['moneda'] ?>" ><?= $row['nombre_banco'] . ' (' . $row['t_banco'] . ')' ?></option>
                                        <? } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr class="bg">
                                <td class="first"><p>Banco Receptor</p></td>
                                <td class="last">
                                    <select name="id_banco_receptor" id="id_banco_receptor">
                                        <option>Seleccione...</option>
                                        <? foreach ($bancos as $row) { ?>
                                            <option value="<?= $row['id_banco'] ?>" t_banco="<?= $row['t_banco'] ?>" n_cuenta="<?= $row['n_cuenta'] ?>" moneda="<?= $row['moneda'] ?>" ><?= $row['nombre_banco'] . ' (' . $row['t_banco'] . ')' ?></option>
                                        <? } ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="first"><p>Tipo de Instrumento</p></td>
                                <td class="last">
                                    <select name="t_instrumento" id="t_instru">
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="first"><p>N&deg; de operacion </p></td>
                                <td class="last"><input name="n_cheque" id="n_ref" class="text imput_form1" type="text" data-required="true" ></td>
                                </td>
                            </tr>
                            <tr>
                                <td class="first"><p>Fecha</p></td>
                                <td class="last"><input name="fecha_pago" id="fecha" class="text imput_form1" type="text" data-required="true" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td class="first"><p>Monto a Traspasar</p></td>
                                <td class="last"><input name="total_monto_pagar" id="monto" class="text imput_form1" type="text" data-required="true"  onkeypress="return permite(event, 'numpunto')"></td>
                            </tr>
                            <tr>
                                <td class="first"><p>Descripcion</p></td>
                                <td class="last"><input name="detalles_concepto" id="descripcion" class="text imput_form1" type="text" data-required="true" </td>
                            </tr>
                    </table>
                </form>
                <div class="div_botonform1">
                        <!--<input type="reset" value="Limpiar" style="float: left;" />-->
                    <button type="button" onclick="valida_select();"  id="boton_form1">Registrar Traspaso</button>
                </div>
            </div>
        </div>

        <script>
            function valida_select() {
                if ($('#id_banco_emisor').find('option:Selected').html() == 'Seleccione...') {
                    alert('Debe seleccionar el banco emisor');
                } else if ($('#id_banco_receptor').find('option:Selected').html() == 'Seleccione...') {
                    alert('Debe seleccionar el banco receptor');
                } else if ($('#t_instru').find('option:Selected').html() == 'Seleccione...') {
                    alert('Debe seleccionar el tipo de instrumento');
                } else if ($('#id_banco_receptor').find('option:Selected').html() == $('#id_banco_emisor').find('option:Selected').html()) {
                    alert('El Banco emisor y el receptor no pueden ser los mismos');
                } else {
                    var $validacion = validator($('#validate-form'));
                    if ($validacion) {
                        $('#validate-form').submit();
                    }

                }

            }
        </script>
    <? $this->load->view('templates/footer') ?>
</div>
</body></html>