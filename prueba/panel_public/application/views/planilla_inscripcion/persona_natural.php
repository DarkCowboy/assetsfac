<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>

<script type="text/javascript" >
    $(function() {

        myCalendar = new dhtmlXCalendarObject(["fecha_nac_pn", "fecha_vcto"], true, {isYearEditable: true, isMonthEditable: true});
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

<style>
    .botonera{
        margin: 0 auto;
        width: 181px;
        color: white;
        margin-bottom: 20px;
    }

    .botonera a{
        color: white;
    }
    .editar{
        background: url("img/backgrounds/menu-item.jpg") repeat-x scroll left top transparent;
        height: 31px;
        margin: 0;
        padding: 7px 0 0;
        text-align: center;
        width: 181px;
        cursor: pointer;
        float: left;
        margin-right: 10px;
        border-radius: 10px;

    }

    .descargar_f{
        background: url("img/backgrounds/menu-item.jpg") repeat-x scroll left top transparent;
        height: 31px;
        margin: 0;
        padding: 7px 0 0;
        text-align: center;
        width: 181px;
        cursor: pointer;
        float: left;
        border-radius: 10px;
    }

    .cancelar_edicion{
        background: url("img/backgrounds/menu-item.jpg") repeat-x scroll left top transparent;
        display: none;
        height: 31px;
        margin: 0;
        padding: 7px 0 0;
        text-align: center;
        width: 181px;
        cursor: pointer;
        float: left;
        margin-right: 10px;
        border-radius: 10px;
    }

    .editar:hover, .descargar_f:hover, .cancelar_edicion:hover{
        background: url("img/backgrounds/menu-item-active.jpg") repeat-x scroll left top transparent;
    }

</style>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">
            <div class="row-fluid">
                <div class="span12">
                    <div class="head">
                        <div class="isw-documents"></div>
                        <h1><?= $act == 1 ? 'Actualizacion de Datos de Registro' : 'Datos de Registo'; ?></h1>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <form method="post" action="./panel_clientes/planilla_inscripcion/" class="form" id="validate-form" onSubmit="return validator(this);">
                <div class="dr"><span></span></div>


                <? if (isset($planilla)) { ?>
                    <? if ($act != 1) { ?>
                        <div style="background: none repeat scroll 0 0 lawngreen;color: teal;font-weight: bold;height: 19px;margin-bottom: 20px;padding: 5px 19px;width: 100%;">Sus datos se han guardado Correctamente</div>
                    <? } ?>
                    <div class="botonera">
                        <?
                        if ($act == 1) {
                            $display = 'block';
                        } else {
                            ?>
                            <? $display = 'none'; ?>

                            <a href="./panel_clientes/descarga_ficha_pn">
                                <div class="descargar_f">
                                    Ver / Imprimir Ficha 
                                </div>
                            </a>    

                        <? } ?>
                    </div>
                <? } ?>
                <div class="dr"><span></span></div>


                <div class="editar_formulario" style="display: <?= $display; ?>;">

                    <div class="row-fluid">
                        <!-- datos de la Empresa -->
                        <div class="span6">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos de la Persona Natural</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group datos_personales">
                                    <div class="row-form">
                                        <div class="span3">Nombres y Apellidos:</div>                 
                                        <div class="span9">
                                            <input type="text" name="nom_apell_pn" id="nom_apell_pn" data-required="true" value="<? echo @$planilla['nom_apell_pn']; ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Genero:</div>                 
                                        <div class="span9">
                                            <select data-required="true" name="sexo_pn" id="sexo_pn">
                                                <option <?= @$planilla['sexo_pn'] == 'Varon' ? 'selected="selected"' : '' ?> value="Varon">Masculino</option>
                                                <option <?= @$planilla['sexo_pn'] == 'Mujer' ? 'selected="selected"' : '' ?> value="Mujer">Femenino</option>
                                            </select>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Nacionalidad:</div>                 
                                        <div class="span9">
                                            <select data-required="true, select" name="nacionalidad_pn" id="nacionalidad_pn">
                                                <option value="0">Seleccione...</option>
                                                <option <?= @$planilla['nacionalidad_pn'] != 'PA' ? '_selected="" selected="selected"' : '' ?>  value="EX">Extranjero</option>
                                                <option <?= @$planilla['nacionalidad_pn'] != 'EX' ? '_selected="" selected="selected"' : '' ?> value="PA">Paname&ntilde;o(a)</option> 
                                            </select>
                                            <span id="nac_extran">
                                                <? if($planilla){if ($planilla['nacionalidad_pn'] != 'PA') { ?>
                                                    <input type="text" placeholder="Escriba aqui su Nacionalidad" value="<?= @$planilla['nacionalidad_pn']; ?>" name="nacionalidad_pn" data-required="true, nacionalidad" id="nacionalidad_pn" />
                                                <? }} ?>
                                            </span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    
                                    <div class="row-form">
                                        <div class="span3" id="titulo_id">N&deg; ID o Pasaporte:</div>           
                                        <div class="span9">
                                            <input type="text" name="cedula_pn" id="cedula_pn" value="<?
                                            if (isset($planilla['cedula_dir'])) {
                                                echo $planilla['cedula_dir'] . '"';
                                            } else {
                                                echo $planilla['cedula_pn'] . '"';
                                            }
                                            ?>" data-required="true" onkeypress="return permite(event, 'num')" /> 


                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <script>
                                        $(function() {
                                            $('#nacionalidad_pn').change(function() {
                                                x = $("option:selected", this).val();

                                                $('#wrap_id').css('display', 'block');
                                                if (x == 'PA' || x== '0') {
                                                    $('#titulo_id').html('N&deg; de Cedula');
                                                    $('#nac_extran').html('');
                                                } else {
                                                    $('#titulo_id').html('N&deg; de Pasaporte');
                                                    $('#nac_extran').html('<input type="text" placeholder="Escriba aqui su Nacionalidad" name="nacionalidad_pn" data-required="true, nacionalidad" id="nacionalidad_pn" />');
                                                }
                                            });
                                        });
                                    </script>

                                    <div class="row-form">
                                        <div class="span3">Lugar de Nacimiento:</div>                 
                                        <div class="span9">
                                            <input type="text" name="lug_nac_pn" id="lug_nac_pn" value="<?= @$planilla['lug_nac_pn'] ?>" data-required="true" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Fecha de Nacimiento:</div>                 
                                        <div class="span9">
                                            <input type="text" readonly="readonly" name="fecha_nac_pn" id="fecha_nac_pn" readonly="readonly" value="<?= @$planilla['fecha_nac_pn'] ?>" data-required="true" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Otras Nacionalidades:</div>                 
                                        <div class="span9">
                                            <input type="text" name="o_naciona_pn" id="o_naciona_pn" value="<?= @$planilla['o_naciona_pn'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Telefonos:</div>                 
                                        <div class="span9">
                                            <input type="text" name="telefono_pn" id="telefono_pn" data-required="true" value="<?= @$planilla['telefono_pn'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Email:</div>                 
                                        <div class="span9">
                                            <input type="text" name="email_pn" id="email_pn"  data-required="false,mail" value="<?= @$planilla['email_pn'] ?>" />                
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Direccion:</div>                 
                                        <div class="span9">
                                            <textarea name="direccion_pn" data-required="true" ><?= @$planilla['direccion_pn'] ?></textarea>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Estado Civil:</div>                 
                                        <div class="span9">
                                            <select data-required="true" name="e_civil_pn" id="e_civil_pn">
                                                <option <? echo @$planilla['e_civil_pn'] == 'Soltero' ? 'selected="selected"' : ''; ?>  value="Soltero">Soltero</option>
                                                <option <? echo @$planilla['e_civil_pn'] == 'Casado' ? 'selected="selected"' : ''; ?> value="Casado">Casado</option>
                                                <option <? echo @$planilla['e_civil_pn'] == 'Viudo' ? 'selected="selected"' : ''; ?> value="Viudo">Viudo</option>
                                                <option <? echo @$planilla['e_civil_pn'] == 'Divorciado' ? 'selected="selected"' : ''; ?> value="Divorciado">Divorciado</option>
                                            </select>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <!--Datos Bancarios -->
                        <div class="span6">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos Bancarios</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid" style="min-height: 372px;"> 
                                <div class="">


                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">Banco:</div>
                                        <div class="span9">
                                            <input type="text" name="banco_ref_pn[]" class="banco_ref_pn" value="<?= @$planilla['banco_ref_pn'][0] ?>"data-required="true" />  
                                        </div>

                                    </div>
                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">N de Cuenta:</div>
                                        <div class="span9">
                                            <input type="text" name="n_cuenta_ref_pn[]" class="" value="<?= @$planilla['n_cuenta_ref_pn'][0] ?>"data-required="true" />  
                                        </div>

                                    </div>
                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">Tipo de Cuenta:</div>
                                        <div class="span9">
                                            <input type="text" name="cuenta_ref_pn[]" class="cuenta_ref_pn" value="<?= @$planilla['cuenta_ref_pn'][0] ?>"data-required="true" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>




                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">Banco:</div>
                                        <div class="span9">
                                            <input type="text" name="banco_ref_pn[]" class="banco_ref_pn" value="<?= @$planilla['banco_ref_pn'][1] ?>" data-required="" />  
                                        </div>

                                    </div>
                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">N de Cuenta:</div>
                                        <div class="span9">
                                            <input type="text" name="n_cuenta_ref_pn[]" class="" value="<?= @$planilla['n_cuenta_ref_pn'][1] ?>" data-required="false" />  
                                        </div>

                                    </div>
                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">Tipo de Cuenta:</div>
                                        <div class="span9">
                                            <input type="text" name="cuenta_ref_pn[]" class="cuenta_ref_pn" value="<?= @$planilla['cuenta_ref_pn'][1] ?>" data-required="" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>




                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">Banco:</div>
                                        <div class="span9">
                                            <input type="text" name="banco_ref_pn[]" class="banco_ref_pn" value="<?= @$planilla['banco_ref_pn'][2] ?>" data-required="" />  
                                        </div>

                                    </div>
                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">N de Cuenta:</div>
                                        <div class="span9">
                                            <input type="text" name="n_cuenta_ref_pn[]" class="" value="<?= @$planilla['n_cuenta_ref_pn'][2] ?>" data-required="false" />  
                                        </div>

                                    </div>
                                    <div class="row-form" style="padding: 15px 16px;">
                                        <div class="span3">Tipo de Cuenta:</div>
                                        <div class="span9">
                                            <input type="text" name="cuenta_ref_pn[]" class="cuenta_ref_pn" value="<?= @$planilla['cuenta_ref_pn'][2] ?>" data-required="" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <script>
                            $('.n_cuenta_ref_pn').keyup(function() {
                                if ($(this).val().length == 4 || $(this).val().length == 9 || $(this).val().length == 12) {
                                    $(this).val($(this).val() + '-');
                                }
                                limitText(this, 23);
                            });
                            $('.n_cuenta_ref_pn').keydown(function() {
                                limitText(this, 23);
                            });

                            function limitText(field, maxChar) {
                                var ref = $(field),
                                        val = ref.val();
                                if (val.length >= maxChar) {
                                    ref.val(function() {
                                        console.log(val.substr(0, maxChar))
                                        return val.substr(0, maxChar);
                                    });
                                }
                            }

                            $('.n_cuenta_ref_pn').blur(function() {
                                var cuenta = $(this).val();
                                cuenta = cuenta.replace('-', '');
                                cuenta = cuenta.replace('-', '');
                                cuenta = cuenta.replace('-', '');

                                var cuenta1 = cuenta.substring(0, 4);
                                var cuenta2 = cuenta.substring(4, 8);
                                var cuenta3 = cuenta.substring(8, 10);
                                var cuenta4 = cuenta.substring(10, 20);

                                cuenta = cuenta1 + '-' + cuenta2 + '-' + cuenta3 + '-' + cuenta4;

                                if (cuenta == '---') {
                                    $(this).val('');
                                } else {
                                    $(this).val(cuenta1 + '-' + cuenta2 + '-' + cuenta3 + '-' + cuenta4);
                                }

                            });
                        </script>


                    </div>

                    <div class="row-fluid">
                        <!-- Datos Laborales -->
                        <div class="span6">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos Laborales</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group">

                                    <div class="row-form">
                                        <div class="span3">Razon Social:</div>                 
                                        <div class="span9">
                                            <input type="text" name="nom_rz_dl_pn" id="nom_rz_dl_pn" data-required="true" value="<?= @$planilla['nom_rz_dl_pn'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">N&deg; de RUC / RIF:</div>                 
                                        <div class="span9">
                                            <input type="text" name="rif_dl_pn" id="rif_dl_pn" data-required="true" value="<?= @$planilla['rif_dl_pn'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Telefonos:</div>                 
                                        <div class="span9">
                                            <input type="text" name="telefono_dl_pn" id="telefono_dl_pn" data-required="true" value="<?= @$planilla['telefono_dl_pn'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Email:</div>                 
                                        <div class="span9">
                                            <input type="text" name="email_dl_pn" id="email_dl_pn"  data-required="false,mail" value="<?= @$planilla['email_dl_pn'] ?>" />                
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Direccion:</div>                 
                                        <div class="span9">
                                            <textarea name="direccion_dl_pn" data-required="true" ><?= @$planilla['direccion_dl_pn'] ?></textarea>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Actividad Economica:</div>                 
                                        <div class="span9">
                                            <input type="text" name="act_aeco_dl_pn" id="act_aeco_dl_pn"  data-required="true" value="<?= @$planilla['act_aeco_dl_pn'] ?>" />                
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Cargo:</div>                 
                                        <div class="span9">
                                            <input type="text" name="cargo_dl_pn" id="cargo_dl_pn"  data-required="true" value="<?= @$planilla['cargo_dl_pn'] ?>" />                
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Antiguedad:</div>                 
                                        <div class="span9">
                                            <input type="text" name="ant_dl_pn" id="ant_dl_pn"  data-required="true" value="<?= @$planilla['ant_dl_pn'] ?>" />                
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Perfil del Cliente -->
                        <div class="span6">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Perfil del Cliente</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid"> 
                                <div class="cuerpo_accionista">

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 28px; width: 33.077%;">Conocimiento en el negocio:</div>                 
                                        <div class="span9" style=" width: 64.359%;">
                                            <select data-required="true" name="exp_con_neg_pc" id="exp_con_neg_pn">
                                                <option <?= @$planilla['exp_con_neg_pc'] == 'n' ? 'selected="selected"' : ''; ?> value="n">Ninguna</option>
                                                <option <?= @$planilla['exp_con_neg_pc'] == 'l' ? 'selected="selected"' : ''; ?> value="l">Limitada</option>
                                                <option <?= @$planilla['exp_con_neg_pc'] == 'b' ? 'selected="selected"' : ''; ?> value="b">Buena</option>
                                                <option <?= @$planilla['exp_con_neg_pc'] == 'e' ? 'selected="selected"' : ''; ?> value="e">Excelente</option>
                                            </select>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <!--                                    <div class="row-form">
                                                                            <div class="span3" style="line-height: 28px; width: 33.077%;">Objetivo de la Inversion:</div>                 
                                                                            <div class="span9" style=" width: 64.359%;">
                                                                                <select data-required="true" name="o_inversion_pn" id="o_inversion_pn">
                                                                                    <option <?= @$planilla['o_inversion_pn'] == 'a' ? 'selected="selected"' : ''; ?> value="a">Agresivo</option>
                                                                                    <option <?= @$planilla['o_inversion_pn'] == 'mo' ? 'selected="selected"' : ''; ?> value="mo">Moderado</option>
                                                                                    <option <?= @$planilla['o_inversion_pn'] == 'm' ? 'selected="selected"' : ''; ?> value="m">Medio</option>
                                                                                    <option <?= @$planilla['o_inversion_pn'] == 'c' ? 'selected="selected"' : ''; ?> value="c">Conservador</option>
                                                                                </select>  
                                                                            </div>
                                                                            <div class="clear"></div>
                                                                        </div>-->

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 28px; width: 33.077%;">Nivel Academico</div>                 
                                        <div class="span9" style=" width: 64.359%;">
                                            <select data-required="true" name="n_academico_pn" id="n_academico_pn">
                                                <option <?= @$planilla['n_academico_pn'] == 'p' ? 'selected="selected"' : ''; ?> value="p">Educacion Primaria</option>
                                                <option <?= @$planilla['n_academico_pn'] == 's' ? 'selected="selected"' : ''; ?> value="s">Educacion Secundaria</option>
                                                <option <?= @$planilla['n_academico_pn'] == 'u' ? 'selected="selected"' : ''; ?> value="u">Educacion Universitaria</option>
                                            </select>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 28px; width: 33.077%;">Total Activos</div>                 
                                        <div class="span9" style=" width: 64.359%;">
                                            <input data-required="true" type="text" class="monto" name="activo_pn" id="activo_pn" value="<?= @$planilla['activo_pn'] ?>" />
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 28px; width: 33.077%;">Total Pasivos</div>                 
                                        <div class="span9" style=" width: 64.359%;">
                                            <input data-required="true" type="text" class="monto" name="pasivo_pn" id="pasivo_pn" value="<?= @$planilla['pasivo_pn'] ?>" />
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 28px; width: 33.077%;">Ingresos Anuales</div>                 
                                        <div class="span9" style=" width: 64.359%;">
                                            <input data-required="true" type="text" class="monto" name="ing_anua_pn" id="ing_anua_pn" value="<?= @$planilla['ing_anua_pn'] ?>" />
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 28px; width: 33.077%;">Patrimonio Total</div>                 
                                        <div class="span9" style=" width: 64.359%;">
                                            <input data-required="true" type="text" class="monto" name="pat_total_pn" readonly="readonly" id="pat_total_pn" value="<?= @$planilla['pat_total_pn'] ?>" />
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <script>




                                        $('#activo_pn').keyup(function() {
                                            activo_pn = $('#activo_pn').val();
                                            pasivo_pn = $('#pasivo_pn').val();

                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace(/\,/i, '.');

                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace(/\,/i, '.');

                                            $('#pat_total_pn').val(activo_pn - pasivo_pn);
                                        });
                                        $('#pasivo_pn').keyup(function() {
                                            activo_pn = $('#activo_pn').val();
                                            pasivo_pn = $('#pasivo_pn').val();

                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace(/\,/i, '.');

                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace(/\,/i, '.');

                                            $('#pat_total_pn').val(dar_formato((activo_pn - pasivo_pn).toFixed(2)));
                                        });
                                        $('.monto').blur(function() {
                                            activo_pn = $('#activo_pn').val();
                                            pasivo_pn = $('#pasivo_pn').val();

                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace('.', '');
                                            activo_pn = activo_pn.replace(/\,/i, '.');

                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace('.', '');
                                            pasivo_pn = pasivo_pn.replace(/\,/i, '.');

                                            $('#pat_total_pn').val(dar_formato((activo_pn - pasivo_pn).toFixed(2)));
                                        });

                                        function dar_formato(num) {
                                            var cadena = "";
                                            var aux;
                                            var cont = 1, m, k;
                                            if (num < 0)
                                                aux = 1;
                                            else
                                                aux = 0;
                                            num = num.toString();
                                            for (m = num.length - 1; m >= 0; m--) {
                                                cadena = num.charAt(m) + cadena;
                                                if (cont % 3 == 0 && m > aux)
                                                    cadena = "." + cadena;
                                                else
                                                    cadena = cadena;
                                                if (cont == 3)
                                                    cont = 1;
                                                else
                                                    cont++;
                                            }
                                            cadena = cadena.replace('..', ',');
                                            return cadena;
                                        }

                                    </script>
                                </div>
                            </div>
                        </div>


                    </div>



                    <div class="row-fluid">
                    </div>
                    <div class="dr"><span></span></div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="head" style="width: 226px;">
                                <button type="submit" class="btn btn-block">Guardar Datos de Registro</button>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>
<? if (!$planilla) { ?>
    <script>
        $(function() {
            $('#nacionalidad_repl').prop('selectedIndex', 0);
            $('#nacionalidad_emp').prop('selectedIndex', 0);
        });
    </script>
<? } ?>

</html>
