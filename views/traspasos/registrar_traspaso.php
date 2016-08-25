<? $this->load->view('templates/header') ?>
<script src="scripts/calendario/dhtmlxcalendar.js"></script>
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar.css" type="text/css"> 
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

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
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('traspasos/menu_interno_traspaso') ?>     

            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Registro de Traspaso</h1>
                </div><br>

                <form action="./traspasos/registrar_traspaso" method="post" class="form" style="margin: 17px;" id="validate-form" >
                    <div class="table" style="margin: 0 auto; overflow: hidden; width: 472px; float: none;">
                        <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                        <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th class="full" colspan="2">Datos de la Transferencia</th>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Banco Emisor</strong></td>
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
                                    <td class="first"><strong>Banco Receptor</strong></td>
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
                                    <td class="first"><strong>Tipo de Instrumento</strong></td>
                                    <td class="last">
                                        <select name="t_instrumento" id="t_instru">
                                            <option value="Transferencia">Transferencia</option>
                                            <option value="Cheque">Cheque</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>N&deg; de operacion </strong></td>
                                    <td class="last"><input name="n_cheque" id="n_ref" class="text" type="text" data-required="true" ></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Fecha</strong></td>
                                    <td class="last"><input name="fecha_procesado" id="fecha" class="text" type="text" data-required="true" readonly="readonly"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Monto a Traspasar</strong></td>
                                    <td class="last"><input name="total_monto_pagar" id="monto" class="text" type="text" data-required="true"  onkeypress="return permite(event, 'numpunto')"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Descripcion</strong></td>
                                    <td class="last"><input name="Concepto_pago" id="descripcion" class="text" type="text" data-required="true" </td>
                                </tr>
                        </table>
                    </div>
                    <div style="width: 213px; margin: 0 auto;">
                        <input type="reset" value="Limpiar" style="float: left;" />
                        <button type="button" onclick="valida_select();"  style="height: 26px; padding: 0; width: 113px; float: left; margin-left: 30px;">Procesar</button>
                    </div>
                </form>
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
                          if($validacion){
                             $('#validate-form').submit();
                          }

                    }

                }
            </script>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>