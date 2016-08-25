<? $this->load->view('templates/head'); ?>
<?
if (isset($datos_empresa['mensaje'])) {
    $mensaje = $datos_empresa['mensaje'];
}
?>
<style>
    .form label, .form .label {
        /*font-size: 11px !important;*/
    }
</style>
<body id="top">

    <!-- Begin of #container -->
    <div id="container">
        <!-- Begin of #header -->
        <div id="header-surround">
            <? $this->load->view('templates/header') ?>    
        </div> <!--! end of #header -->

        <div class="fix-shadow-bottom-height"></div>

        <? $this->load->view('templates/aside_bar') ?>

        <!-- Begin of #main -->
        <div id="main" role="main">

            <!-- Begin of titlebar/breadcrumbs -->
            <div id="title-bar">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
                    <li class="no-hover">Empresa</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content">
                <div class="container_12">

                    <div class="grid_12">
                        <h1>Empresa</h1>
                        <p>En este panel se configura los datos de la compa&ntilde;ia de Factoring.</p>
                        <? if (isset($mensaje)) { ?>
                            <div class="alert success"><strong><? echo $mensaje; ?></strong></div>
                        <? } ?>
                    </div>

                    <div class="grid_6" style="display: block !important;">
                        <div class="block-border">
                            <div class="block-header">
                                <h1>Datos de la Empresa</h1><span></span>
                            </div>
                            <form id="validate-form" class="block-content form" action="./empresa/agrega_edita" method="post">
                                <div class="_100">
                                    <p><label for="textfield">Nombre de la Compa&ntilde;ia</label>
                                        <input id="nombre_empresa" class="required" name="nombre_empresa" type="text" value="<?= @$datos_empresa['nombre_empresa'] ?>" /></p>
                                </div>

                                <div class="_100">
                                    <p><label for="datepicker">Numero de RUC:</label>
                                        <input id="rif_empresa" name="rif_empresa" class="required" type="text" value="<?= @$datos_empresa['rif_empresa'] ?>" /></p>
                                </div>

                                <div class="_100">
                                    <p><label for="datepicker">Telefonos:</label>
                                        <input id="telefonos_empresa" name="telefonos_empresa" class="required" type="text" value="<?= @$datos_empresa['telefonos_empresa'] ?>" /></p>
                                </div>  

                                <div class="_100" style="background: url('images/container/block/block-header-bg.png') repeat-x scroll top left #cfdee5;min-height: 38px;border: none;margin-bottom: -2px;">
                                    <h1 style="margin: 0;padding: 0;font-size: 16px;padding-left: 10px;line-height: 37px;">Datos de Registro de la Empresa</h1><span style="background: none;"></span>
                                </div>  

                                <div class="_25">
                                    <p><label for="datepicker">Numero de Documento:</label>
                                        <input style="text-align: center;" id="numero_registro" name="numero_registro" class="required" type="text" value="<?= @$datos_empresa['numero_registro'] ?>" /></p>
                                </div>   

                                <div class="_25">
                                    <p><label for="datepicker">Numero de<br/> Ficha:</label>
                                        <input style="text-align: center;" id="tomo_registro" name="tomo_registro" class="required" type="text" value="<?= @$datos_empresa['tomo_registro'] ?>" /></p>
                                </div>  

                                <div class="_50">
                                    <p><label for="datepicker"><br>Fecha de Registro:</label>
                                        <input style="text-align: center;" id="fecha_registro" name="fecha_registro" class="required" type="text" value="<?= @$datos_empresa['fecha_registro'] ?>" /></p>
                                </div>  

                                <div class="_100"></div>

                                <div class="_50">
                                    <p><label for="datepicker"><br>Ciudad de Registro:</label>
                                        <input id="ciudad_registro" name="ciudad_registro" class="required" type="text" value="<?= @$datos_empresa['ciudad_registro'] ?>" /></p>
                                </div>  

                                <div class="_50">
                                    <p><label for="datepicker"><br>Nombre del Registro:</label>
                                        <input id="nombre_registro" name="nombre_registro" class="required" type="text" value="<?= @$datos_empresa['nombre_registro'] ?>" /></p>
                                </div>  

                                <div class="clear"></div>
                                <div class="block-actions">
                                    <ul class="actions-left">
                                        <li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Limpiar Formulario</a></li>
                                    </ul>
                                    <ul class="actions-right">
                                        <li><input type="submit" class="button" value="Guardar los datos de la Empresa"></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="grid_6" style="display: block !important;">
                        <div class="block-border">
                            <div class="block-header">
                                <h1>Datos de la Junta Directiva</h1><span></span>
                            </div>
                            <form id="validate-form-2" class="block-content form" action="./empresa/agrega_edita_j_d" method="post">
                                <div class="j_directiva">

                                    <?
                                    $ultimo = end($junta_directiva);

                                    foreach ($junta_directiva as $row) {
                                        ?>
                                        <div class="boton_elimiar_jd"><a href="./empresa/delete_jd/<?= @$row['id_directivo_empresa']; ?>">
                                                <img src="images/icons/packs/silk/16x16/delete.png">Eliminar
                                            </a></div>
                                        <div class="_100">
                                            <p><label for="textfield">Nombre del Directivo</label>
                                                <input id="nombre_directivo_empresa" class="required" name="nombre_directivo_empresa[]" type="text" value="<?= @$row['nombre_directivo_empresa'] ?>" /></p>
                                        </div>

                                        <div class="_100">
                                            <p><label for="textfield">Apellido del Directivo</label>
                                                <input id="apellido_directivo_empresa" class="required" name="apellido_directivo_empresa[]" type="text" value="<?= @$row['apellido_directivo_empresa'] ?>" /></p>
                                        </div>

                                        <div class="_100">
                                            <p><label for="textfield">Tipo del documento del Directivo</label>

                                                <select id="t_document_directivo_empresa" name="t_document_directivo_empresa[]" class="valid required">
                                                    <option <?= @$row == 'v' ? 'selected="selected"' : ''; ?> value="v">Venezolano</option>
                                                    <option <?= @$row == 'e' ? 'selected="selected"' : ''; ?> value="e">Extranjero</option>
                                                </select>
                                        </div>

                                        <div class="_100">
                                            <p><label for="textfield">Numero de Cedula / R.I.F.</label>
                                                <input id="ci_rif_directivo_empresa" class="required" name="ci_rif_directivo_empresa[]" type="text" value="<?= @$row['ci_rif_directivo_empresa'] ?>" /></p>
                                        </div>

                                        <div class="_100">
                                            <p><label for="textfield">Cargo</label>
                                                <input id="cargo_directivo_empresa" class="required" name="cargo_directivo_empresa[]" type="text" value="<?= @$row['cargo_directivo_empresa'] ?>" /></p>
                                        </div>

                                        <div class="_100">
                                            <p><label for="textfield">Tipo de Firma que posee dentro de la compañia</label>
                                                <select id="tip_firma" name="tip_firma[]" class="valid required">
                                                    <option <?= @$row['tip_firma'] == 'conjunta' ? 'selected="selected"' : ''; ?> value="conjunta">Conjunta</option>
                                                    <option <?= @$row['tip_firma'] == 'unica' ? 'selected="selected"' : ''; ?> value="unica">Unica</option>
                                                </select>
                                        </div>

                                    <? } ?>
                                </div>

                                <script type="text/javascript">
                                    function agregar() {
                                        document.title = '';
                                        var cuerpo = '</div><div class="_100">' + document.title;
                                        cuerpo += '<p><label for="textfield">Nombre del Directivo</label>' + document.title;
                                        cuerpo += '<input id="nombre_directivo_empresa2" class="required" name="nombre_directivo_empresa[]" type="text" value="" /></p>' + document.title;
                                        cuerpo += '</div><div class="_100"><p><label for="textfield">Apellido del Directivo</label>' + document.title;
                                        cuerpo += '<input id="apellido_directivo_empresa2" class="required" name="apellido_directivo_empresa[]" type="text" value="" /></p>' + document.title;
                                        cuerpo += '</div><div class="_100"><p><label for="textfield">Tipo del documento del Directivo</label>' + document.title;
                                        cuerpo += '<select id="t_document_directivo_empresa2" name="t_document_directivo_empresa[]" class="valid required">' + document.title;
                                        cuerpo += '<option value="v">Venezolano</option><option value="e">Extranjero</option></select></div>' + document.title;
                                        cuerpo += '<div class="_100"><p><label for="textfield">Numero de Cedula / R.I.F.</label>' + document.title;
                                        cuerpo += '<input id="ci_rif_directivo_empresa2" class="required" name="ci_rif_directivo_empresa[]" type="text" value="" /></p>' + document.title;
                                        cuerpo += '</div><div class="_100"><p><label for="textfield">Cargo</label>' + document.title;
                                        cuerpo += '<input id="cargo_directivo_empresa2" class="required" name="cargo_directivo_empresa[]" type="text" value="" /></p>' + document.title;
                                        cuerpo += '</div><div class="_100"><p><label for="textfield">Tipo de Firma que posee dentro de la compañia</label>' + document.title;
                                        cuerpo += '<select id="tip_firma2" name="tip_firma[]" class="valid required"><option value="conjunta">Conjunta</option>' + document.title;
                                        cuerpo += ' <option value="unica">Unica</option></select></div>';
                                        $(".j_directiva").append(cuerpo);


                                        $('.menu').initMenu();
                                        $('.menu li a').slideList();
                                        $('a[href*=#]').bind("click", function(event) {
                                            event.preventDefault();
                                            var target = $(this).attr("href");

                                            if (target == '#top') {
                                                $.jGrowl("Scrolling to the top.", {theme: 'information'});
                                            }

                                            $('html,body').animate({
                                                scrollTop: $(target).offset().top
                                            }, 1000, function() {
                                            });
                                        });
                                        $("select, input:checkbox, input:text, input:password, input:radio, input:file, textarea").uniform();
                                        $('span.hide').click(function() {
                                            $(this).parent().slideUp();
                                        });
                                        $('.toolbox-action').click(function() {
                                            $('.toolbox-content').fadeOut();
                                            $(this).next().fadeIn();
                                            return false;
                                        });
                                        $('.close-toolbox').click(function() {
                                            $(this).parents('.toolbox-content').fadeOut();
                                        });
                                        $('.user-button').click(function() {
                                            $('.dropdown-username-menu').slideToggle();
                                        });
                                        $(document).click(function(e) {
                                            if (!$(e.target).is('.user-button, .arrow-link-down, .dropdown-username-menu *')) {
                                                $('.dropdown-username-menu').slideUp();
                                            }
                                        });
                                        var ddumTimer;
                                        $('.user-button, ul.dropdown-username-menu').mouseleave(function(e) {
                                            ddumTimer = setTimeout(function() {
                                                $('.dropdown-username-menu').slideUp();
                                            }, 400);
                                        });
                                        $('.user-button, ul.dropdown-username-menu').mouseenter(function(e) {
                                            clearTimeout(ddumTimer);
                                        });
                                        $('.block-border .block-header span').click(function() {
                                            if ($(this).hasClass('closed')) {
                                                $(this).removeClass('closed');
                                            } else {
                                                $(this).addClass('closed');
                                            }

                                            $(this).parent().parent().children('.block-content').slideToggle();
                                        });
                                        $('a[rel=tooltip]').tipsy({fade: true});
                                        $('a[rel=tooltip-bottom]').tipsy({fade: true});
                                        $('a[rel=tooltip-right]').tipsy({fade: true, gravity: 'w'});
                                        $('a[rel=tooltip-top]').tipsy({fade: true, gravity: 's'});
                                        $('a[rel=tooltip-left]').tipsy({fade: true, gravity: 'e'});
                                        $('a[rel=tooltip-html]').tipsy({fade: true, html: true});
                                        $('div[rel=tooltip]').tipsy({fade: true});
                                    }
                                </script>
                                <? //debug($junta_directiva) ?>
                                <div class="clear"></div>
                                <div class="block-actions">
                                    <ul class="actions-left">
                                        <li><a class="button red" id="reset-validate-form" href="javascript:void(0);">Limpiar Formulario</a></li>
                                    </ul>
                                    <ul class="actions-left">
                                        <li><a class="button grey" href="#" onclick="agregar();">Agregar Nuevo</a></li>
                                    </ul>
                                    <ul class="actions-right">
                                        <li><input type="submit" class="button" value="Guardar"></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="clear height-fix"></div>
                </div></div> <!--! end of #main-content -->
        </div> <!--! end of #main -->
       
 <? $this->load->view('templates/footer'); ?>
        <? $this->load->view('templates/foot'); ?>
        <style>
            #uniform-t_document_directivo_empresa span, #uniform-tip_firma span{
                width: 163px !important;
            }
        </style>
    </body>
</html>