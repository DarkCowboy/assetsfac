<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>

<script type="text/javascript" >
    $(function() {

        myCalendar = new dhtmlXCalendarObject(["fecha_nac_pn", "fecha_vcto"]);

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
    input[placeholder], [placeholder], *[placeholder]
    {
        color:lightslategrey !important;
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
                        <h1><?= 'Ficha de Persona Natural'; ?></h1>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <form method="post" action="./panel_clientes/ficha_persona_natural/" class="form" id="validate-form" onSubmit="return validator(this);">
                <div class="dr"><span></span></div>
                <? if (count($ficha_pn_pj) > 0) { ?>
                    <div style="margin: 0 auto; width: 100%; text-align: center;">
                        <a href="./panel_clientes/descarga_ficha_pn_pj/<?= $ficha_pn_pj['id_jun_directiva']; ?>">
                            <img src="images/general/descarga_fpn.png" title="Descarga Ficha de Persona Natural" alt="Descarga Ficha de Persona Natural" /> 
                        </a>    
                    </div>
                    <div class="dr"><span></span></div>
                <? } ?>
                <input type="hidden" value="<?
                if (isset($directivo['id_jun_directiva'])) {
                    echo $directivo['id_jun_directiva'];
                } else {
                    echo @$ficha_pn_pj['id_jun_directiva'];
                }
                ?>" name="id_jun_directiva" />

                <div class="row-fluid">
                    <!-- datos de la Empresa -->
                    <div class="span6">
                        <div class="head">
                            <div class="isw-documents"></div>
                            <h1>Datos de la Persona Natural</h1>
                            <div class="clear"></div>
                        </div>
                        <? // debug($directivo, false);  ?> 
                        <div class="block-fluid">                        
                            <div class="control-group datos_personales">
                                <div class="row-form">
                                    <div class="span3">Nombres y Apellidos:</div>                 
                                    <div class="span9">
                                        <input type="text" name="nom_apell_pn"  id="nom_apell_pn" data-required="true" value="<?
                                        if (isset($ficha_pn_pj['nom_apell_pn'])) {
                                            echo strtoupper($ficha_pn_pj['nom_apell_pn']);
                                        } else {
                                            echo strtoupper($directivo['nombres_dir'] . ' ' . $directivo['apellidos_dir']);
                                        }
                                        ?>" />  
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
                                        <input type="text" name="nacionalidad_pn" id="nacionalidad_pn"  value="<? if (isset($ficha_pn_pj['nacionalidad_pn'])) { ?><?= $ficha_pn_pj['nacionalidad_pn'] == 'PA' ? 'Paname&ntilde;o' : $ficha_pn_pj['nacionalidad_pn'] ?><? } else { ?><?= @$directivo['nacionalidad_dir'] == 'PA' ? 'Paname&ntilde;o' : $directivo['nacionalidad_dir'] ?><? } ?>" />
                                    </div>
                                    <div class="clear"></div>
                                </div>



                                <div class="row-form">
                                    <div class="span3">
                                        <? if (isset($ficha_pn_pj['nacionalidad_pn'])) { ?>
                                            <?= $ficha_pn_pj['nacionalidad_pn'] != 'PA' ? 'Pasaporte' : 'Cedula de Identidad' ?>
                                        <? } else { ?>
                                            <?= $directivo['nacionalidad_dir'] != 'PA' ? 'Pasaporte' : 'Cedula de Identidad' ?>
                                        <? } ?>
                                    </div>                 
                                    <div class="span9">
                                        <input type="text"  name="cedula_pn" id="cedula_pn" value="<?
                                        if (isset($ficha_pn_pj['cedula_pn'])) {
                                            echo @$ficha_pn_pj['cedula_pn'] . '"';
                                        } else {
                                            echo $directivo['cedula_dir'] . '"';
                                        }
                                        ?>" data-required="true" onkeypress="return permite(event, 'num')" /> 


                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Lugar de Nacimiento:</div>                 
                                    <div class="span9">
                                        <input type="text" name="lug_nac_pn" id="lug_nac_pn" value="<?= @$ficha_pn_pj['lug_nac_pn'] ?>" data-required="true" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Fecha de Nacimiento:</div>                 
                                    <div class="span9">
                                        <input type="text" name="fecha_nac_pn" id="fecha_nac_pn" value="<?= @$ficha_pn_pj['fecha_nac_pn'] ?>" data-required="true" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Otras Nacionalidades:</div>                 
                                    <div class="span9">
                                        <input type="text" name="o_naciona_pn" id="o_naciona_pn" value="<?= @$ficha_pn_pj['o_naciona_pn'] ?>" data-required="" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Telefonos:</div>                 
                                    <div class="span9">
                                        <input type="text" name="telefono_pn" id="telefono_pn" data-required="true" value="<?= @$ficha_pn_pj['telefono_pn'] ?>" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Email:</div>                 
                                    <div class="span9">
                                        <input type="text" name="email_pn" id="email_pn"  data-required="false,mail" value="<?= @$ficha_pn_pj['email_pn'] ?>" />                
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Direccion:</div>                 
                                    <div class="span9">
                                        <textarea name="direccion_pn" data-required="true" ><?= @$ficha_pn_pj['direccion_pn'] ?></textarea>  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px;">Estado Civil:</div>                 
                                    <div class="span9">
                                        <select data-required="true" name="e_civil_pn" id="e_civil_pn">
                                            <option <? echo @$ficha_pn_pj['e_civil_pn'] == 'Soltero' ? 'selected="selected"' : ''; ?>  value="Soltero">Soltero</option>
                                            <option <? echo @$ficha_pn_pj['e_civil_pn'] == 'Casado' ? 'selected="selected"' : ''; ?> value="Casado">Casado</option>
                                            <option <? echo @$ficha_pn_pj['e_civil_pn'] == 'Viudo' ? 'selected="selected"' : ''; ?> value="Viudo">Viudo</option>
                                            <option <? echo @$ficha_pn_pj['e_civil_pn'] == 'Divorciado' ? 'selected="selected"' : ''; ?> value="Divorciado">Divorciado</option>
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
                        <div class="block-fluid"> 
                            <div class="">
                                <div class="row-form">
                                    <div class="span9">
                                        Banco: <input type="text" name="banco_ref_pn[]" id="banco_ref_pn" value="<?= @$ficha_pn_pj['banco_ref_pn'][0] ?>"data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                        N de Cuenta: <input type="text" name="n_cuenta_ref_pn[]" value="<?= @$ficha_pn_pj['n_cuenta_ref_pn'][0] ?>"data-required="true" onkeypress="return permite(event, 'num')"/>  
                                        Tipo de Cuenta: <input type="text" name="cuenta_ref_pn[]" id="cuenta_ref_pn" value="<?= @$ficha_pn_pj['cuenta_ref_pn'][0] ?>"data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-fluid"> 
                            <div class="">
                                <div class="row-form">
                                    <div class="span9">
                                        Banco: <input type="text" name="banco_ref_pn[]" id="banco_ref_pn" value="<?= @$ficha_pn_pj['banco_ref_pn'][1] ?>"data-required="" onkeypress="return permite(event, 'soloLetras')"/>  
                                        N de Cuenta: <input type="text" name="n_cuenta_ref_pn[]" value="<?= @$ficha_pn_pj['n_cuenta_ref_pn'][1] ?>" data-required="" onkeypress="return permite(event, 'num')"/>  
                                        Tipo de Cuenta: <input type="text" name="cuenta_ref_pn[]" id="cuenta_ref_pn" value="<?= @$ficha_pn_pj['cuenta_ref_pn'][1] ?>"data-required="" onkeypress="return permite(event, 'soloLetras')"/>  
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="block-fluid"> 
                            <div class="">
                                <div class="row-form">
                                    <div class="span9">
                                        Banco: <input type="text" name="banco_ref_pn[]" id="banco_ref_pn" value="<?= @$ficha_pn_pj['banco_ref_pn'][2] ?>"data-required="" onkeypress="return permite(event, 'soloLetras')"/>  
                                        N de Cuenta: <input type="text" name="n_cuenta_ref_pn[]" value="<?= @$ficha_pn_pj['n_cuenta_ref_pn'][2] ?>"data-required="" onkeypress="return permite(event, 'num')"/>  
                                        Tipo de Cuenta: <input type="text" name="cuenta_ref_pn[]" id="cuenta_ref_pn" value="<?= @$ficha_pn_pj['cuenta_ref_pn'][2] ?>"data-required="" onkeypress="return permite(event, 'soloLetras')"/>  
                                    </div>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                        <input type="text" name="nom_rz_dl_pn" id="nom_rz_dl_pn" data-required="true" value="<?
                                        if (isset($planilla['nom_rz_pj'])) {
                                            echo $planilla['nom_rz_pj'];
                                        } else {
                                            echo @$ficha_pn_pj['nom_rz_dl_pn'];
                                        }
                                        ?>" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Numero de R.I.F.:</div>                 
                                    <div class="span9">
                                        <input type="text" name="rif_dl_pn" id="rif_dl_pn" data-required="true" value="<?
                                        if (isset($planilla['rif_pj'])) {
                                            echo $planilla['rif_pj'];
                                        } else {
                                            echo @$ficha_pn_pj['rif_dl_pn'];
                                        }
                                        ?>" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Telefonos:</div>                 
                                    <div class="span9">
                                        <input type="text" name="telefono_dl_pn" id="telefono_dl_pn" data-required="true" value="<?
                                        if (isset($planilla['telefono_pj'])) {
                                            echo $planilla['telefono_pj'];
                                        } else {
                                            echo @$ficha_pn_pj['telefono_dl_pn'];
                                        }
                                        ?>" />  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Email:</div>                 
                                    <div class="span9">
                                        <input type="text" name="email_dl_pn" id="email_dl_pn"  data-required="false,mail" value="<?
                                        if (isset($planilla['email_pj'])) {
                                            echo $planilla['email_pj'];
                                        } else {
                                            echo @$ficha_pn_pj['email_dl_pn'];
                                        }
                                        ?>" />                
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Direccion:</div>                 
                                    <div class="span9">
                                        <textarea name="direccion_dl_pn" data-required="true" ><?
                                            if (isset($planilla['direccion_pj'])) {
                                                echo $planilla['direccion_pj'];
                                            } else {
                                                echo @$ficha_pn_pj['direccion_dl_pn'];
                                            }
                                            ?></textarea>  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Actividad Economica:</div>                 
                                    <div class="span9">
                                        <input type="text" name="act_aeco_dl_pn" id="act_aeco_dl_pn"  data-required="true" value="<?= @$ficha_pn_pj['act_aeco_dl_pn'] ?>" />                
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3">Cargo:</div>                 
                                    <div class="span9">
                                        <input type="text" name="cargo_dl_pn" id="cargo_dl_pn"  data-required="true" value="<?= @$ficha_pn_pj['cargo_dl_pn'] ?>" />                
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px;">Antiguedad:</div>                 
                                    <div class="span9">
                                        <input type="text" name="ant_dl_pn" id="ant_dl_pn"  data-required="true" value="<?= @$ficha_pn_pj['ant_dl_pn'] ?>" />                
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
                                    <div class="span3" style="line-height: 16px; width: 33.077%;">Conocimiento en el negocio:</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <select data-required="true" name="exp_con_neg_pc" id="exp_con_neg_pn">
                                            <option <?= @$ficha_pn_pj['exp_con_neg_pc'] == 'n' ? 'selected="selected"' : ''; ?> value="n">Ninguna</option>
                                            <option <?= @$ficha_pn_pj['exp_con_neg_pc'] == 'l' ? 'selected="selected"' : ''; ?> value="l">Limitada</option>
                                            <option <?= @$ficha_pn_pj['exp_con_neg_pc'] == 'b' ? 'selected="selected"' : ''; ?> value="b">Buena</option>
                                            <option <?= @$ficha_pn_pj['exp_con_neg_pc'] == 'e' ? 'selected="selected"' : ''; ?> value="e">Excelente</option>
                                        </select>  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px; width: 33.077%;">Objetivo de la Inversion:</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <select data-required="true" name="o_inversion_pn" id="o_inversion_pn">
                                            <option <?= @$ficha_pn_pj['o_inversion_pn'] == 'a' ? 'selected="selected"' : ''; ?> value="a">Agresivo</option>
                                            <option <?= @$ficha_pn_pj['o_inversion_pn'] == 'mo' ? 'selected="selected"' : ''; ?> value="mo">Moderado</option>
                                            <option <?= @$ficha_pn_pj['o_inversion_pn'] == 'm' ? 'selected="selected"' : ''; ?> value="m">Medio</option>
                                            <option <?= @$ficha_pn_pj['o_inversion_pn'] == 'c' ? 'selected="selected"' : ''; ?> value="c">Conservador</option>
                                        </select>  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px; width: 33.077%;">Nivel Academico</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <select data-required="true" name="n_academico_pn" id="n_academico_pn">
                                            <option <?= @$ficha_pn_pj['n_academico_pn'] == 'p' ? 'selected="selected"' : ''; ?> value="p">Educacion Primaria</option>
                                            <option <?= @$ficha_pn_pj['n_academico_pn'] == 's' ? 'selected="selected"' : ''; ?> value="s">Educacion Secundaria</option>
                                            <option <?= @$ficha_pn_pj['n_academico_pn'] == 'u' ? 'selected="selected"' : ''; ?> value="u">Educacion Universitaria</option>
                                        </select>  
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px; width: 33.077%;">Total de Activos</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <input data-required="true" type="text" class="monto" name="activo_pn" id="activo_pn" value="<?= @$ficha_pn_pj['activo_pn'] ?>" />
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px; width: 33.077%;">Total de Pasivos</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <input data-required="true" type="text" class="monto" name="pasivo_pn" id="pasivo_pn" value="<?= @$ficha_pn_pj['pasivo_pn'] ?>" />
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 16px; width: 33.077%;">Ingresos Anuales</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <input data-required="true" type="text" class="monto" name="ing_anua_pn" id="ing_anua_pn" value="<?= @$ficha_pn_pj['ing_anua_pn'] ?>" />
                                    </div>
                                    <div class="clear"></div>
                                </div>

                                <div class="row-form">
                                    <div class="span3" style="line-height: 28px; width: 33.077%;">Patrimonio Total</div>                 
                                    <div class="span9" style=" width: 64.359%;">
                                        <input data-required="true" type="text" class="monto" name="pat_total_pn"  id="pat_total_pn" value="<?= @$ficha_pn_pj['pat_total_pn'] ?>" />
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
                            <button type="submit" class="btn btn-block">Guardar / Editar Cambios en la Planilla</button>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>   
</body>

<? $this->load->view('templates/footer'); ?>

</html>
