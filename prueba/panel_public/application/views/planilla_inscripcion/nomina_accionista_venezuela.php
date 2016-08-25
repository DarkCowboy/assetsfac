<div class="span6 accionistas_block" style="margin-right: 2.5641%;">
    <div class="head">
        <div class="isw-documents"></div>
        <h1>Datos de los Accionistas</h1>
        <div class="clear"></div>
    </div>
    <div class="block-fluid"> 
        <div class="cuerpo_accionista">

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
                    <input type="text"  data-required="true" name="nacionalidad_na[]" id="nacionalidad_na"/>
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
                <div class="span3">N&deg; de Cedula o Pasaporte:</div>                 
                <div class="span9">
                    <input type="text"   name="cedula_na[]" id="cedula_na" data-required="true" onkeypress="return permite(event, 'num')"/>  
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

        </div>

         
    </div>
</div>