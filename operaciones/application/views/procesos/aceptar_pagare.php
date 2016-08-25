<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <script type="text/javascript" src="js/scripts/jquery.min.js"></script>
    <link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
    <script src="js/calendario/dhtmlxcalendar.js"></script>
    <link rel="stylesheet" href="js/calendario/dhtmlxcalendar.css" type="text/css"> 
    <link rel="stylesheet" href="js/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

    <script type="text/javascript" >
        $(function() {

            myCalendar = new dhtmlXCalendarObject(["fecha_solicitud_aprobado", "fecha_vcto"], true, {isYearEditable: true, isMonthEditable: true});
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
        <div class="wrap">
            <form action="./clientes/aceptar_pagare_pj/<?= $id_solicitud; ?>" id="validate-form" onSubmit="return valida(this);" method="post">
                <div class="titulo">
                    PROCESAR PAGARE
                </div>
                <div class="contenido">
                    <div class="bloque_izquierdo" style="min-height:170px;">
                        <div class="contenido_marcos">
                            <h4>Monto aprobado:</h4> 
                            <input value="<?= @$planilla["monto_solicitud"]; ?>" type="text" name="monto_solicitud_aprobado" style="width: 100%;" data-required="true" onkeypress="return permite(event, 'num')" />

                            <h4>Porcentaje en Compra:</h4> 
                            <input class="required" value="" type="text" name="porcentaje_compra" style="width: 10%;" data-required="true" onkeypress="return permite(event, 'numpunto')" />

                            <h4>Plazo en dias a pagar:</h4> 
                            <input class="required" value="" type="text" name="plazo_solicitud_aprobado" style="width: 10%;" data-required="true" onkeypress="return permite(event, 'num')" />

                            <h4>N&deg; de Comite:</h4> 
                            <input class="required" value="" type="text" name="num_comite" style="width: 100%;" data-required="true" onkeypress="return permite(event, 'num')" />

                        </div>
                    </div>
                    <div class="bloque_derecho" style="min-height:170px;">
                        <div class="contenido_marcos">
                            <h4 style="line-height: 1;">Seleccione a los Codeudores:</h4> 
                            <? foreach ($planilla['nomina_accionista'] as $row) { ?>
                            <div class="evenRow">
                                <input type="checkbox" class="codeudor" name="avales[]id_nom_accionista[]" value="<?= $row['id_nom_accionista']; ?>" data-required="true" /> <?= $row['nom_raz_na']; ?>
                            </div>

                                <script>

                                    function valida(form) {

                                        var check = $("input[type='checkbox']:checked").length;
                                        if (check == "") {
                                            $(".evenRow").addClass('error');
                                            mostrarError();
                                            $('.msgErrorValidator').html('Debe Seleccionar al menos un Codeudor');
                                            error = 1;
                                            return false;
                                        } else {
                                            $(".evenRow").removeClass('error');
                                            return validator(form);
                                        }
                                    }

                                </script>

                                </br>
                            <? } ?>
                        </div>
                    </div>
                </div>
                <input class="boton" type="submit" value="Aceptar Pagare">
            </form>
            <? //debug($planilla); ?>
        </div>
    </body>
</html>