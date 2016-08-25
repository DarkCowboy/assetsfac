<div class="span6 accionistas_block" style="margin-right: 2.5641%;">
    <div class="head">
        <div class="isw-documents"></div>
        <h1>Datos de los Accionistas</h1>
        <div class="clear"></div>
    </div>
    <div class="block-fluid"> 

            <div class="cuerpo_accionista">

                    <a href="./panel_clientes/delete_accionista/<?= $row['id_nom_accionista'] ?>"><div class="eliminar"></div></a>
                    <div class="row-form">
                        <div class="span3" style="line-height: 16px;">Nombres o Razon Social:</div>                 
                        <div class="span9">
                            <input type="text" name="nom_raz_na[]" value="" id="nom_raz_na" data-required="true" />  
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row-form">
                        <div class="span3">Nacionalidad:</div>                 
                        <div class="span9">
                            <input type="text" value="" data-required="true" name="nacionalidad_na[]" id="nacionalidad_na"/>
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row-form">
                        <div class="span3">Genero:</div>                 
                        <div class="span9">
                            <select data-required="true" name="genero_na[]" id="genero_dir">
                                <option value="Varon">Masculino</option>
                                <option value="Mujer">Femenino</option>
                            </select>  
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row-form">
                        <div class="span3">Capital Suscrito</div>                 
                        <div class="span9">
                            <input type="text" class="monto"  value="" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_sus_na[]" id="cap_sus_na" data-required="true" onkeypress="return permite(event, 'numpunto')"/>  
                        </div>
                        <div class="clear"></div>
                    </div>

                    <div class="row-form">
                        <div class="span3">Capital Pagado</div>                 
                        <div class="span9">
                            <input type="text" class="monto" value="" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_pag_na[]" id="cap_pag_na" data-required="true" onkeypress="return permite(event, 'numpunto')"/>  
                        </div>
                        <div class="clear"></div>
                    </div>
                    <hr/>
               
                <script>
                    $(function() {
                        $('#nacionalidad_na').change(function() {
                            x = $("option:selected", this).val();

                            if (x == 'PA') {
                                $('#titulo_cedula_na').html('N&deg; de Cedula');
                            } else {
                                $('#titulo_cedula_na').html('N&deg; de Pasaporte');
                            }
                        });
                    });
                </script>
            </div>
            <div class="head" style="border-radius: 0px !important;">                            
                <a class="button grey" id="agregar_acc" href="" >
                    <div class="isw-plus" style="display: inline-block; line-height: 22px; margin-left: 20px !important; margin-right: 5px; margin-top: 10px; padding: 1px 0 0;"></div>
                    <h1 style="margin: 0 0 0 2px !important;">
                        Agregar nuevo Accionista</h1>
                </a>

                <script type="text/javascript">

                    $('#agregar_acc').click(function(event) {
                        event.preventDefault();
                        document.title = '';
                        var cuerpo = '<div class="row-form"><div class="span3" style="line-height: 16px;">Nombres o Razon Social:</div>' + document.title;
                        cuerpo += '<div class="span9"><input type="text" name="nom_raz_na[]" id="nom_raz_na" data-required="true" />' + document.title;
                        cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Nacionalidad:</div><div class="span9">' + document.title;
                        cuerpo += '<input data-required="true" name="nacionalidad_na[]" id="nacionalidad_na"/></div><div class="clear"></div>' + document.title;
                        cuerpo += '</div><div class="row-form"><div class="span3">Genero:</div><div class="span9">' + document.title;
                        cuerpo += '<select data-required="true" name="genero_na[]" id="genero_dir">' + document.title;
                        cuerpo += '<option value="Varon">Masculino</option><option value="Mujer">Femenino</option>' + document.title;
                        cuerpo += '</select></div><div class="clear"></div></div><div class="row-form"><div class="span3">N&deg; de Cedula o Pasaporte:</div>' + document.title;
                        cuerpo += '<div class="span9"><input type="text"   name="cedula_na[]" id="cedula_na" data-required="true" onkeypress="return permite(event, \'num\')"/>' + document.title;
                        cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Capital Suscrito</div><div class="span9">' + document.title;
                        cuerpo += '<input type="text" class="monto" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_sus_na[]" id="cap_sus_na" data-required="true" onkeypress="return permite(event, \'numpunto\')"/>' + document.title;
                        cuerpo += '</div><div class="clear"></div></div><div class="row-form"><div class="span3">Capital Pagado</div><div class="span9">' + document.title;
                        cuerpo += '<input type="text" class="monto" placeholder="Capital registrado en el acta constitutiva ejem: 200000.75" name="cap_pag_na[]" id="cap_pag_na" data-required="true" onkeypress="return permite(event, \'numpunto\')"/>' + document.title;
                        cuerpo += '</div><div class="clear"></div></div>';
                        $(".cuerpo_accionista").append(cuerpo);

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
                <div class="clear"></div>
            </div>  
    </div>
</div>