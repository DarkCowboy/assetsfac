<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>
<link type="text/css" href="css/style_planilla_empresa.css" rel="stylesheet" />
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
                <? // debug($planilla, false) ?>
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
                            <a href="./panel_clientes/descarga_ficha_pj">
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
                                <h1>Datos de la Empresa</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group">

                                    <div class="row-form">
                                        <div class="span3">Pais de Registro:</div>                 
                                        <div class="span9">
                                            <select data-required="true,select" name="nacionalidad_emp" id="nacionalidad_emp">
                                                <option value="0">Seleccione...</option>
                                                <option <?= @$planilla['nacionalidad_emp'] == 'p' ? 'selected="selected"' : '' ?> value="p">Panama</option>
                                                <option <?= @$planilla['nacionalidad_emp'] == 'v' ? 'selected="selected"' : '' ?> value="v">Venezuela</option>
                                            </select>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div id="nac_empresa_datos">
                                        <?
                                        if ($planilla) {
                                            if ($planilla['nacionalidad_emp'] == 'p') {
                                                $this->load->view('planilla_inscripcion/empresa_panama_datos_empresa');
                                            } elseif ($planilla['nacionalidad_emp'] == 'v') {
                                                $this->load->view('planilla_inscripcion/empresa_venezolana_datos_empresa');
                                            }
                                        }
                                        ?>
                                    </div>



                                    <div id="nac_empresa_registro">
                                        <?
                                        if ($planilla) {
                                            if ($planilla['nacionalidad_emp'] == 'p') {
                                                $this->load->view('planilla_inscripcion/empresa_panama_registro');
                                            } elseif ($planilla['nacionalidad_emp'] == 'v') {
                                                $this->load->view('planilla_inscripcion/empresa_venezolana_registro');
                                            }
                                        }
                                        ?>
                                    </div>


                                    <div class="row-form">
                                        <div class="span3">Telefonos:</div>                 
                                        <div class="span9">
                                            <input type="text" name="telefono_pj" id="inputfirstname" data-required="true" value="<?= @$planilla['telefono_pj'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Email:</div>                 
                                        <div class="span9">
                                            <input type="text" name="email_pj" id="inputemail"  data-required="false,mail" value="<?= @$planilla['email_pj'] ?>" />                
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Direccion:</div>                 
                                        <div class="span9">
                                            <textarea name="direccion_pj" data-required="true" ><?= @$planilla['direccion_pj'] ?></textarea>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                </div>
                            </div>
                            <br/><br/>
                            <!-- datos del Representante Legal  -->

                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos del Representante Legal de la Empresa</h1>

                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group">
                                    <div class="row-form">
                                        <div class="span3">Nombres y Apellidos:</div>                 
                                        <div class="span9">
                                            <input type="text" name="nom_apell_repl" id="nom_apell_repl" data-required="true" value="<?= @$planilla['nom_apell_repl'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Nacionalidad:</div>                 
                                        <div class="span9">
                                            <select data-required="true, select" name="nacionalidad_repl" id="nacionalidad_repl">
                                                <option value="0">Seleccione...</option>
                                                <option <?= @$planilla['nacionalidad_repl'] == 'PA' ? '_selected="" selected="selected"' : '' ?> value="PA">Paname&ntilde;o(a)</option> 
                                                <option <?= @$planilla['nacionalidad_repl'] != 'PA' ? '_selected="" selected="selected"' : '' ?>  value="EX">Extranjero</option>
                                            </select>
                                            <span id="nac_extran">
                                                <? if ($planilla['nacionalidad_repl'] != 'PA') { ?>
                                                    <input type="text" placeholder="Escriba aqui su Nacionalidad" value="<?= @$planilla['nacionalidad_repl']; ?>" name="nacionalidad_repl" data-required="true, nacionalidad" id="nacionalidad_repl2" />
                                                <? } ?>
                                            </span>
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form" id="wrap_id" style="<? if(!$planilla){ echo 'display: none;';} ?>">
                                        <div class="span3" id="titulo_id">N&deg; de Cedula</div>                 
                                        <div class="span9">
                                            <input type="text" name="cedula_repl"  id="cedula_repl" value="<?= @$planilla['cedula_repl'] ?>" data-required="true" onkeypress="return permite(event, 'num')" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Genero:</div>                 
                                        <div class="span9">
                                            <select data-required="true" name="sexo_repl" id="sexo_repl">
                                                <option <?= @$planilla['sexo_repl'] == 'Varon' ? 'selected="selected"' : '' ?> value="Varon">Masculino</option>
                                                <option <?= @$planilla['sexo_repl'] == 'Mujer' ? 'selected="selected"' : '' ?> value="Mujer">Femenino</option>
                                            </select>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3">Cargo</div>                 
                                        <div class="span9">
                                            <input type="text" name="cargo_repl" id="cargo_repl" value="<?= @$planilla['cargo_repl'] ?>" data-required="true" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--principales_clientes-->
                        <div class="span6">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Principales Clientes</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group">
                                    <div class="row-form">
                                        <div class="span3">Cliente 1:</div>                 
                                        <div class="span9">
                                            Nombre o Razon Social: <input type="text" name="nombre_rz_pc[]" id="nombre_rz_pc" value="<?= @$planilla['nombre_rz_pc'][0] ?>"  data-required="true" />  
                                            N&deg; de RIF / RUC: <input type="text" name="num_rif_pc[]" id="num_rif_pc" value="<?= @$planilla['num_rif_pc'][0] ?>" data-required="true" />  
                                            Persona de Contacto: <input type="text" name="persona_contacto_pc[]" id="persona_contacto_pc" value="<?= @$planilla['persona_contacto_pc'][0] ?>" />  
                                            Telefono / Email: <input type="text" name="tel_email_pc[]" id="tel_email_pc" value="<?= @$planilla['tel_email_pc'][0] ?>" data-required="true" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span3">Cliente 2:</div>                 
                                        <div class="span9">
                                            Nombre o Razon Social: <input type="text" name="nombre_rz_pc[]" id="nombre_rz_pc" value="<?= @$planilla['nombre_rz_pc'][1] ?>"  />  
                                            N&deg; de RIF / RUC: <input type="text" name="num_rif_pc[]" id="num_rif_pc" value="<?= @$planilla['num_rif_pc'][1] ?>"  />  
                                            Persona de Contacto: <input type="text" name="persona_contacto_pc[]" id="persona_contacto_pc" value="<?= @$planilla['persona_contacto_pc'][1] ?>" />  
                                            Telefono / Email: <input type="text" name="tel_email_pc[]" id="tel_email_pc" value="<?= @$planilla['tel_email_pc'][1] ?>"  />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="row-form">
                                        <div class="span3">Cliente 3:</div>                 
                                        <div class="span9">
                                            Nombre o Razon Social: <input type="text" name="nombre_rz_pc[]" id="nombre_rz_pc" value="<?= @$planilla['nombre_rz_pc'][2] ?>"   />  
                                            N&deg; de RIF / RUC: <input type="text" name="num_rif_pc[]" id="num_rif_pc" value="<?= @$planilla['num_rif_pc'][2] ?>"  />  
                                            Persona de Contacto: <input type="text" name="persona_contacto_pc[]" id="persona_contacto_pc" value="<?= @$planilla['persona_contacto_pc'][2] ?>" />  
                                            Telefono / Email: <input type="text" name="tel_email_pc[]" id="tel_email_pc" value="<?= @$planilla['tel_email_pc'][2] ?>"  />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <!-- datos de los accionistas -->
                        <div class="span6 accionistas_block">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos de los Accionistas</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid"> 
                                <div class="cuerpo_accionista">

                                    <?
                                    if (isset($planilla['nomina_accionista']) and count($planilla['nomina_accionista']) > 0) {
                                        foreach ($planilla['nomina_accionista'] as $row) {
                                            ?>
                                            <a href="./panel_clientes/delete_accionista/<?= $row['id_nom_accionista'] ?>"><div class="eliminar"></div></a>
                                            <div class="row-form">
                                                <div class="span3" style="line-height: 16px;">Nombres o Razon Social:</div>                 
                                                <div class="span9">
                                                    <input type="text" name="nom_raz_na[]" value="<?= $row['nom_raz_na'] ?>" id="nom_raz_na" data-required="true" />  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3">Nacionalidad:</div>                 
                                                <div class="span9">
                                                    <input type="text" data-required="true" name="nacionalidad_na[]" id="nacionalidad_dir" value="<?= $row['nacionalidad_na'] ?>" />  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3">Genero:</div>                 
                                                <div class="span9">
                                                    <select data-required="true" name="genero_na[]" id="genero_dir">
                                                        <option <?= $row['genero_na'] == 'Varon' ? 'selected="selected"' : ''; ?> value="Varon">Masculino</option>
                                                        <option <?= $row['genero_na'] == 'Mujer' ? 'selected="selected"' : ''; ?> value="Mujer">Femenino</option>
                                                    </select>  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3">Cedula o Pasaporte:</div>                 
                                                <div class="span9">
                                                    <input type="text" name="cedula_na[]"  value="<?= $row['cedula_na'] ?>" data-required="true" />  
                                                    <? if($row) { ?><input type="hidden"  name="cedula_na_valida[]" value="<?= $row['cedula_na'] ?>" /> <? } ?>
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <? if ($planilla['nacionalidad_emp'] == 'p') { ?>
                                                <div class="row-form">
                                                    <div class="span3">Capital Suscrito</div>                 
                                                    <div class="span9">
                                                        <input type="text" class="monto"  value="<?= $row['cap_sus_na'] ?>" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_sus_na[]" id="cap_sus_na" data-required="true" onkeypress="return permite(event, 'numpunto')"/>  
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>

                                                <div class="row-form">
                                                    <div class="span3">Capital Pagado</div>                 
                                                    <div class="span9">
                                                        <input type="text" class="monto" value="<?= $row['cap_pag_na'] ?>" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_pag_na[]" id="cap_pag_na" data-required="true" onkeypress="return permite(event, 'numpunto')"/>  
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            <? } ?>

                                            <?
                                        }
                                    } else {
                                        ?>
                                        <div class="row-form">
                                            <div class="span3" style="line-height: 16px;">Nombres o Razon Social:</div>                 
                                            <div class="span9">
                                                <input type="text" name="nom_raz_na[]"  id="nom_raz_na" data-required="true" />  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">Nacionalidad:</div>                 
                                            <div class="span9">
                                                <input type="text" data-required="true" name="nacionalidad_na[]" id="nacionalidad_dir" value="<?= $row['nacionalidad_na'] ?>" />  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">Genero:</div>                 
                                            <div class="span9">
                                                <select data-required="true" name="genero_na[]" id="genero_dir">
                                                    <option <?= $row['genero_na'] == 'Varon' ? 'selected="selected"' : ''; ?> value="Varon">Masculino</option>
                                                    <option <?= $row['genero_na'] == 'Mujer' ? 'selected="selected"' : ''; ?> value="Mujer">Femenino</option>
                                                </select>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">N&deg; ID</div>                 
                                            <div class="span9">
                                                <input type="text" name="cedula_na[]"  value="<?= $row['cedula_na'] ?>" data-required="true" />  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">Capital Suscrito</div>                 
                                            <div class="span9">
                                                <input type="text" class="monto"  placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_sus_na[]" id="cap_sus_na" data-required="true" onkeypress="return permite(event, 'numpunto')"/>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">Capital Pagado</div>                 
                                            <div class="span9">
                                                <input type="text" class="monto" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_pag_na[]" id="cap_pag_na" data-required="true" onkeypress="return permite(event, 'numpunto')"/>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    <? } ?>
                                </div>

                                <div class="head" style="border-radius: 0px !important;">                            
                                    <a class="button grey" id="agregar_acc" href="" >
                                        <div class="isw-plus" style="display: inline-block; line-height: 22px; margin-left: 20px !important; margin-right: 5px; margin-top: 10px; padding: 1px 0 0;"></div>
                                        <h1 style="margin: 0 0 0 2px !important;">
                                            Agregar nuevo Accionista</h1>
                                    </a><script type="text/javascript">

                                        $('#agregar_acc').click(function(event) {
                                            event.preventDefault();
                                            document.title = '';
                                            var cuerpo = '<div class="clear"></div> <div class="eliminar eliminar_agg"></div><div><div class="row-form"><div class="span3" style="line-height: 16px;">Nombres o Razon Social:</div>' + document.title;
                                            cuerpo += '<div class="span9"><input type="text" name="nom_raz_na[]" id="nom_raz_na" data-required="true" />' + document.title;
                                            cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Nacionalidad:</div>' + document.title;
                                            cuerpo += '<div class="span9"><input type="text" data-required="true" name="nacionalidad_na[]" id="nacionalidad_dir" value="" />' + document.title;
                                            cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Genero:</div>' + document.title;
                                            cuerpo += '<div class="span9"><select data-required="true" name="genero_na[]" id="genero_dir">' + document.title;
                                            cuerpo += '<option  value="Varon">Masculino</option><option  value="Mujer">Femenino</option>' + document.title;
                                            cuerpo += '</select></div><div class="clear"></div></div><div class="row-form">' + document.title;
                                            cuerpo += '<div class="span3">N&deg; ID</div><div class="span9">' + document.title;
                                            cuerpo += '<input type="text" name="cedula_na[]" value="" data-required="true" />' + document.title;
                                            cuerpo += '</div><div class="clear"></div>' + document.title;
                                            cuerpo += '</div>' + document.title;
                                            cuerpo += '<div class="row-form"><div class="span3">Capital Suscrito</div><div class="span9">' + document.title;
                                            cuerpo += '<input type="text" class="monto" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_sus_na[]" id="cap_sus_na" data-required="true" onkeypress="return permite(event, \'numpunto\')"/>' + document.title;
                                            cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Capital Pagado</div><div class="span9">' + document.title;
                                            cuerpo += '<input type="text" class="monto" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_pag_na[]" id="cap_pag_na" data-required="true" onkeypress="return permite(event, \'numpunto\')"/>' + document.title;
                                            cuerpo += '</div></div><div class="clear"></div><div class="clear"></div>' + document.title;
                                            cuerpo += '</div>';
                                            $(".cuerpo_accionista").append(cuerpo);

                                            $(".eliminar_agg").live('click', function() {
                                                $(this).next().remove();
                                                $(this).remove();

                                            });

                                            $('.monto').priceFormat({
                                                prefix: '',
                                                suffix: '',
                                                centsLimit: 2,
                                                centsSeparator: ','

                                            });
                                        });
                                    </script>
                                    <div class="clear"></div>
                                </div> 
                            </div>
                        </div>

                        <!-- datos de la junta Directiva -->
                        <div class="span6 directivos_block" >
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos de los Directivos</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid" style="margin-bottom: 30px;"> 
                                <div class="cuerpo_direct">
                                    <? if (isset($planilla['junta_directiva'])) { ?>
                                        <? foreach ($planilla['junta_directiva'] as $row) { ?>
                                            <a href="./panel_clientes/delete_directivo/<?= $row['id_jun_directiva'] ?>"><div class="eliminar_dir"></div></a>
                                            <div class="row-form">
                                                <div class="span3" style="line-height: 16px;">Nombres:</div>                 
                                                <div class="span9">
                                                    <input type="text" name="nombres_dir[]" value="<?= $row['nombres_dir'] ?>" id="nombres_dir" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3" style="line-height: 16px;">Apellidos:</div>                 
                                                <div class="span9">
                                                    <input type="text" name="apellidos_dir[]" value="<?= $row['apellidos_dir'] ?>" id="apellidos_dir" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3">Nacionalidad:</div>                 
                                                <div class="span9">
                                                    <input type="text" data-required="true" name="nacionalidad_dir[]" id="nacionalidad_dir" value="<?= $row['nacionalidad_dir'] ?>" />  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3">Genero:</div>                 
                                                <div class="span9">
                                                    <select data-required="true" name="genero_dir[]" id="genero_dir">
                                                        <option <?= $row['genero_dir'] == 'Varon' ? 'selected="selected"' : ''; ?> value="Varon">Masculino</option>
                                                        <option <?= $row['genero_dir'] == 'Mujer' ? 'selected="selected"' : ''; ?> value="Mujer">Femenino</option>
                                                    </select>  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3">N&deg; ID:</div>                 
                                                <div class="span9">
                                                    <input type="text"  name="cedula_dir[]" value="<?= $row['cedula_dir'] ?>" id="cedula_dir" data-required="true" onkeypress="return permite(event, 'num')"/>  
                                                    <? if($row) { ?><input type="hidden"  name="cedula_dir_valida[]" value="<?= $row['cedula_dir'] ?>" /> <? } ?> 
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3" style="line-height: 16px;">Cargo:</div>                 
                                                <div class="span9">
                                                    <input type="text" name="cargo_dir[]"  value="<?= $row['cargo_dir'] ?>" id="cargo_dir" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                                </div>
                                                <div class="clear"></div>
                                            </div>

                                            <div class="row-form">
                                                <div class="span3" style="line-height: 16px;">Tipo de Firma que posee dentro de la compa&ntilde;ia:</div>                 
                                                <div class="span9">
                                                    <select name="tipo_firma_dir[]">
                                                        <option <?= $row['tipo_firma_dir'] == 'Unica' ? 'selected="selected"' : '' ?> value="Unica">Unica</option>
                                                        <option <?= $row['tipo_firma_dir'] == 'Conjunta' ? 'selected="selected"' : '' ?> value="Conjunta">Conjunta</option>
                                                    </select>
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            <hr/>
                                        <? } ?>
                                    <? } else { ?>

                                        <div class="row-form">
                                            <div class="span3" style="line-height: 16px;">Nombres:</div>                 
                                            <div class="span9">
                                                <input type="text" name="nombres_dir[]" id="nombres_dir" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3" style="line-height: 16px;">Apellidos:</div>                 
                                            <div class="span9">
                                                <input type="text" name="apellidos_dir[]" id="apellidos_dir" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">Nacionalidad:</div>                 
                                            <div class="span9">
                                                <input type="text" data-required="true" name="nacionalidad_dir[]" id="nacionalidad_dir" />
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">Genero:</div>                 
                                            <div class="span9">
                                                <select data-required="true" name="genero_dir[]" id="genero_dir">
                                                    <option <?= $row['genero_dir'] == 'Varon' ? 'selected="selected"' : ''; ?> value="Varon">Masculino</option>
                                                    <option <?= $row['genero_dir'] == 'Mujer' ? 'selected="selected"' : ''; ?> value="Mujer">Femenino</option>
                                                </select>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3">N&deg; de Cedula o Pasaporte:</div>                 
                                            <div class="span9">
                                                <input type="text" name="cedula_dir[]" id="cedula_dir" data-required="true" onkeypress="return permite(event, 'num')"/>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3" style="line-height: 16px;">Cargo:</div>                 
                                            <div class="span9">
                                                <input type="text" name="cargo_dir[]" id="cargo_dir" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                        <div class="row-form">
                                            <div class="span3" style="line-height: 16px;">Seleccione el Tipo de Firma que posee dentro de la compa&ntilde;ia:</div>                 
                                            <div class="span9">
                                                <select name="tipo_firma_dir[]">
                                                    <option value="Unica">Unica</option>
                                                    <option value="Conjunta">Conjunta</option>
                                                </select>
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    <? } ?>
                                </div>

                                <div class="head" style="border-radius: 0px !important;">                            
                                    <a class="button grey" id="agregar_dir" href="" >
                                        <div class="isw-plus" style="display: inline-block; line-height: 22px; margin-left: 20px !important; margin-right: 5px; margin-top: 10px; padding: 1px 0 0;"></div>
                                        <h1 style="margin: 0 0 0 2px !important;">
                                            Agregar nuevo Directivo</h1>
                                    </a>
                                    <div class="clear"></div>
                                </div> 
                            </div>
                        </div> 

                        <!-- Datos Bancarios -->
                        <div class="span6">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos Bancarios</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid"> 
                                <div class="">
                                    <div class="row-form">
                                        <div class="span10">
                                            <span style="width: 25%; display: block; float: left;">Banco:</span> <input style="width: 75%; float: left;" type="text" name="banco_ref_pj[]" id="banco_ref_pj" value="<?= @$planilla['banco_ref_pj'][0] ?>"data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                            <br>
                                            <span style="width: 25%; display: block; float: left;">N de Cuenta:</span> <input style="width: 75%; float: left;" type="text" name="n_cuenta_ref_pj[]"  value="<?= @$planilla['n_cuenta_ref_pj'][0] ?>" data-required="true" onkeypress="return permite(event, 'num')"/>  
                                            <br>
                                            <span style="width: 25%; display: block; float: left;">Tipo de Cuenta:</span> <input style="width: 75%; float: left;" type="text" name="cuenta_ref_pj[]" id="cuenta_ref_pj" value="<?= @$planilla['cuenta_ref_pj'][0] ?>"data-required="true" onkeypress="return permite(event, 'soloLetras')"/>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-fluid"> 
                                <div class="">
                                    <div class="row-form">
                                        <div class="span10">
                                            <span style="width: 25%; display: block; float: left;">Banco:</span> <input style="width: 75%; float: left;" type="text" name="banco_ref_pj[]" id="banco_ref_pj" value="<?= @$planilla['banco_ref_pj'][1] ?>" onkeypress="return permite(event, 'soloLetras')"/>  
                                            <br>
                                            <span style="width: 25%; display: block; float: left;">N de Cuenta:</span> <input style="width: 75%; float: left;" type="text" name="n_cuenta_ref_pj[]"  value="<?= @$planilla['n_cuenta_ref_pj'][1] ?>" data-required="false" onkeypress="return permite(event, 'num')"/>  
                                            <br>
                                            <span style="width: 25%; display: block; float: left;">Tipo de Cuenta:</span> <input style="width: 75%; float: left;" type="text" name="cuenta_ref_pj[]" id="cuenta_ref_pj" value="<?= @$planilla['cuenta_ref_pj'][1] ?>" onkeypress="return permite(event, 'soloLetras')"/>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-fluid"> 
                                <div class="">
                                    <div class="row-form">
                                        <div class="span10">
                                            <span style="width: 25%; display: block; float: left;">Banco:</span> <input style="width: 75%; float: left;" type="text" name="banco_ref_pj[]" id="banco_ref_pj" value="<?= @$planilla['banco_ref_pj'][2] ?>" onkeypress="return permite(event, 'soloLetras')"/>  
                                            <br>
                                            <span style="width: 25%; display: block; float: left;">N de Cuenta:</span> <input style="width: 75%; float: left;" type="text" name="n_cuenta_ref_pj[]"  value="<?= @$planilla['n_cuenta_ref_pj'][2] ?>" data-required="false" onkeypress="return permite(event, 'num')"/>  
                                            <br>
                                            <span style="width: 25%; display: block; float: left;">Tipo de Cuenta:</span> <input style="width: 75%; float: left;" type="text" name="cuenta_ref_pj[]" id="cuenta_ref_pj" value="<?= @$planilla['cuenta_ref_pj'][2] ?>" onkeypress="return permite(event, 'soloLetras')"/>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
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
                </div>
            </form>
        </div>

    </div>

</body>
<? if (!$planilla) { ?>
    <script>
        $(function() {
            $('#nacionalidad_repl').prop('selectedIndex', 0);
            $('#nacionalidad_emp').prop('selectedIndex', 0);
        });
    </script>
<? } ?>
<script>
    $('.n_cuenta_ref_pj').keyup(function() {
        if ($(this).val().length == 4 || $(this).val().length == 9 || $(this).val().length == 12) {
            $(this).val($(this).val() + '-');
        }
        limitText(this, 23);
    });
    $('.n_cuenta_ref_pj').keydown(function() {
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

    $('.n_cuenta_ref_pj').blur(function() {
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

    $(function() {
        $('#nacionalidad_repl').change(function() {
            x = $("option:selected", this).val();

            $('#wrap_id').css('display', 'block');
            if (x == 'PA') {
                $('#titulo_id').html('N&deg; de Cedula');
                $('#nac_extran').html('');
            } else {
                $('#titulo_id').html('N&deg; de Pasaporte');
                $('#nac_extran').html('<input type="text" placeholder="Escriba aqui su Nacionalidad" name="nacionalidad_repl" data-required="true, nacionalidad" id="nacionalidad_repl2" />');
            }
        });

        $('#nacionalidad_emp').change(function() {
            x = $("option:selected", this).val();

            if (x == 'p') {
                $url = './panel_clientes/empresa_panama_datos_empresa';
                $url2 = './panel_clientes/empresa_panama_registro';
                $.get($url, function(data) {
                    $('#nac_empresa_datos').html(data);
                });
                $.get($url2, function(data) {
                    $('#nac_empresa_registro').html(data);
                });
                $('#nomina_accionista_venezuela').html('');

            } else if (x == 'v') {
                $url = './panel_clientes/empresa_venezolana_datos_empresa';
                $url2 = './panel_clientes/empresa_venezolana_registro';
                $url3 = './panel_clientes/nomina_accionista_venezuela';
                $.get($url, function(data) {
                    $('#nac_empresa_datos').html(data);
                });
                $.get($url2, function(data) {
                    $('#nac_empresa_registro').html(data);
                });
                $.get($url3, function(data) {
                    $('#nomina_accionista_venezuela').html(data);
                });
            } else {
                $('#nac_empresa_datos').html('');
            }
        });
    });


    $('#agregar_dir').click(function(event) {
        event.preventDefault();
        document.title = '';
        var cuerpo = '<div class="eliminar_dir eliminar_dir_agg"></div><div><div class="row-form"><div class="span3" style="line-height: 16px;">Nombres:</div><div class="span9">' + document.title;
        cuerpo += '<input type="text" name="nombres_dir[]" id="nombres_dir" data-required="true" onkeypress="return permite(event, \'soloLetras\')"/>' + document.title;
        cuerpo += '</div><div class="clear"></div></div>' + document.title;
        cuerpo += '<div class="row-form"><div class="span3" style="line-height: 16px;">Apellidos:</div><div class="span9">' + document.title;
        cuerpo += '<input type="text" name="apellidos_dir[]" id="apellidos_dir" data-required="true" onkeypress="return permite(event, \'soloLetras\')"/>' + document.title;
        cuerpo += '</div><div class="clear"></div></div>' + document.title;
        cuerpo += '<div class="row-form"><div class="span3">Nacionalidad:</div><div class="span9"><input type="text" data-required="true" name="nacionalidad_dir[]" id="nacionalidad_dir" />' + document.title;
        cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Genero:</div><div class="span9">' + document.title;
        cuerpo += '<select data-required="true" name="genero_dir[]" id="genero_dir">' + document.title;
        cuerpo += '<option value="Varon">Masculino</option><option value="Mujer">Femenino</option></select></div><div class="clear"></div>' + document.title;
        cuerpo += '</div><div class="row-form"><div class="span3">N&deg; de Cedula o Pasaporte:</div><div class="span9">' + document.title;
        cuerpo += '<input type="text"   name="cedula_dir[]" id="cedula_dir" data-required="true" onkeypress="return permite(event, \'num\')"/>' + document.title;
        cuerpo += '</div><div class="clear"></div></div>' + document.title;
        cuerpo += '<div class="row-form"><div class="span3" style="line-height: 16px;">Cargo:</div>' + document.title;
        cuerpo += '<div class="span9"><input type="text" name="cargo_dir[]" id="cargo_dir" data-required="true" onkeypress="return permite(event, \'soloLetras\')"/>' + document.title;
        cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3" style="line-height: 16px;">Seleccione el Tipo de Firma que posee dentro de la compa&ntilde;ia:</div>' + document.title;
        cuerpo += '<div class="span9"><select name="tipo_firma_dir[]"><option value="Unica">Unica</option><option value="Conjunta">Conjunta</option>' + document.title;
        cuerpo += '</select></div></div><div class="clear"></div></div>';

        $(".cuerpo_direct").append(cuerpo);

        $(".eliminar_dir_agg").live('click', function() {
            $(this).next().remove();
            $(this).remove();

        });

        $('.cedula').priceFormat({
            prefix: '',
            suffix: '',
            centsLimit: 0,
            centsSeparator: ''

        });

        $('.monto').priceFormat({
            prefix: '',
            suffix: '',
            centsLimit: 2,
            centsSeparator: ','

        });
    });
</script>

<style>
    .row-form {
        border-top: 1px solid white;
        padding: 7px 19px;
        vertical-align: baseline;
    }
</style>

<? $this->load->view('templates/footer'); ?>

</html>
