<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <script type="text/javascript" src="js/scripts/jquery.min.js"></script>

    <body>
        <div class="wrap">
            <form action="./clientes/agregar_codeudor/<?= $id_cliente.'/'.$id_solicitud ?>" method="post">
                <div class="titulo">
                    AGREGAR CODEUDOR
                </div>

                <div class="contenido">
                    <div style="width: 424px; margin: 0 auto;">
                        <div class="contenido_marcos">
                            <h4>Nombres y Apellidos:</h4> 
                            <input type="text" style="width:100%;" name="nom_apell_codeudor" id="nom_apell_codeudor" data-required="true" value="<?= @$planilla['nom_apell_codeudor'] ?>" />

                            <h4>Nacionalidad:</h4> 
                            <select data-required="true, select" name="nacionalidad_codeudor" id="nacionalidad_codeudor">
                                <option value="0">Seleccione...</option>
                                <option <?= @$planilla['nacionalidad_codeudor'] == 'PA' ? '_selected="" selected="selected"' : '' ?> value="PA">Paname&ntilde;o(a)</option> 
                                <option <?= @$planilla['nacionalidad_codeudor'] != 'PA' ? '_selected="" selected="selected"' : '' ?>  value="EX">Extranjero</option>
                            </select>
                            <span id="nac_extran">
                                <? if ($planilla['nacionalidad_codeudor'] != 'PA') { ?>
                                    <input style="width: 100%;" type="text" placeholder="Escriba aqui su Nacionalidad" value="<?= @$planilla['nacionalidad_codeudor']; ?>" name="nacionalidad_codeudor" data-required="true, nacionalidad" id="nacionalidad_repl2" />
                                <? } ?>
                            </span>

                            <div id="wrap_id" style="display: none;">
                                <h4 id="titulo_id">N&deg; de Cedula</h4>                 
                                <div>
                                    <input type="text" name="cedula_codeudor"  id="cedula_repl" value="<?= @$planilla['cedula_codeudor'] ?>" data-required="true" onkeypress="return permite(event, 'num')" />  
                                </div>
                            </div>

                            <h4>Genero:</h4>                 
                            <select data-required="true" name="genero_codeudor" id="sexo_repl">
                                <option <?= @$planilla['genero_codeudor'] == 'Varon' ? 'selected="selected"' : '' ?> value="Varon">Masculino</option>
                                <option <?= @$planilla['genero_codeudor'] == 'Mujer' ? 'selected="selected"' : '' ?> value="Mujer">Femenino</option>
                            </select>  

                        </div>
                    </div>
                    
                </div>
                <input class="boton" type="submit" value="Agregar">
            </form>
        </div>
    </body>
</html>
<script>
    $(function() {
        $('#nacionalidad_codeudor').prop('selectedIndex', 0);
        $('#nacionalidad_emp').prop('selectedIndex', 0);
        $('#nac_extran').css('display', 'none');
    });
</script>
<script>

    $('#nacionalidad_codeudor').change(function() {
        x = $("option:selected", this).val();

        $('#wrap_id').css('display', 'block');
        if (x == 'PA') {
            $('#titulo_id').html('N&deg; de Cedula');
            $('#nac_extran').html('');
        } else {
            $('#nac_extran').css('display', 'block');
            $('#titulo_id').html('N&deg; de Pasaporte');
            $('#nac_extran').html('<input type="text"  style="width: 100%;" placeholder="Escriba aqui su Nacionalidad" name="nacionalidad_codeudor" data-required="true, nacionalidad" id="nacionalidad_repl2" />');
        }
    });
</script>