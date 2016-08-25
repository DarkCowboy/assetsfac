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
            <? $this->load->view('bancos/menu_interno_banco') ?>     

            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;"></h1>
                </div><br>
                <?
                if ($error) {
                    echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $error;
                    echo "</div>";
                }
                ?>
                <form action="./bancos/ingresar_deposito/" method="post" class="form" style="margin: 17px;" id="validate-form" onSubmit="return validator(this);" >
                    <div class="table" style="margin: 0 auto; overflow: hidden; width: 472px; float: none;">
                        <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                        <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th class="full" colspan="2">Datos del deposito o tranferencia</th>
                                </tr>
                                <tr>
                                    <td class="first" width="172"><strong>Seleccione el banco</strong></td>
                                    <td class="last">
                                        <select name="id_banco" >
                                            <option>Seleccione...</option>
                                            <? foreach ($lista_bancos as $row) { ?> 
                                                <option value="<?= $row['id_banco'] ?>"><?= $row['nombre_banco'] . ' (' . $row['t_banco'] . ')' ?></option>
                                            <? } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="bg">
                                    <td class="first"><strong>Tipo de Operacion</strong></td>
                                    <td class="last">
                                        <input type="radio" name="concepto" value="Deposito" checked="checked" class="t_operacion"> Deposito
                                        <input type="radio" name="concepto" value="Transferencia" class="t_operacion"> Transferencia
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Referencia <span class="result_t_operacion">del Deposito</span></strong></td>
                                    <td class="last"><input name="n_ref" ></td>
                                </tr>
                                <tr class="bg">
                                    <td class="first"><strong>Monto Depositado</strong></td>
                                    <td class="last"><input name="saldo"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Fecha del Deposito</strong></td>
                                    <td class="last"><input name="fecha" id="fecha"></td>
                                </tr>
                            <input type="hidden" name="t_movimiento" value="1" />
                            <script>
                                $(function() {
                                    $('.t_operacion').click(function() {
                                        if ($(this).val() == 'Deposito') {
                                            $('.result_t_operacion').html('del Deposito');
                                        } else {
                                            $('.result_t_operacion').html('De la Transferencia');
                                        }
                                    });
                                });
                            </script>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                    </div>
                    <div style="width: 113px; margin: 0 auto;">
                        <button type="submit" style="height: 26px; padding: 0; width: 113px;">Agregar</button>
                    </div>
                </form>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>