<? $this->load->view('templates/head'); ?>
<style>
    element.style {
    }
    .block-actions {
        margin: 0 -19px -10px -19px;
        background: url("http://www.assetsfactoring.com/operaciones/images/container/block/block-actions-bg.png") repeat-x scroll bottom left transparent;
        border-radius: 0px 0px 5px 5px;
        height: 44px;
        overflow: hidden;
    }
    body.special-page {
        background: none repeat scroll 0 0 #F0F0F0 !important;
    }
</style>
    <body class="special-page">

        <!-- Begin of #container -->
        <div id="container">
            <!-- Begin of LoginBox-section -->
            <section id="login-box">
                <div style="margin: 0px auto; width: 306px;">
                    <img width="300"  src="images/general/logo_portada.png"/>
                </div>

                <div class="block-border">
                    
                    <div class="block-header">
                        <h1 style="text-align: center; width: 100%; padding: 0;">Control de Acceso, Panel de Operaciones</h1>
                    </div>
                    <form id="login-form" class="block-content form" method="post">
                        <? if(isset($error_message)){ ?>
                        <div id="alertBox-generated" style="" class="alert error no-margin top">Nombre de Usuario o cantraseña invalida, intente nuevamente</div>
                        <? } ?>
                        <p class="inline-small-label">
                            <label for="username">Usuario</label>
                            <input type="text" name="email" value="" class="required">
                        </p>
                        <p class="inline-small-label">
                            <label for="password">Contrase&ntilde;a</label>
                            <input type="password" name="pass" value="" class="required">
                        </p>
                        <p>
                            <label>&nbsp;</label>
                        </p>

                        <div class="clear"></div>

                        <!-- Begin of #block-actions -->
                        <div class="block-actions">
                            <ul class="actions-right">
                                <li><input type="submit" class="button" value="Iniciar Sesion"></li>
                            </ul>
                        </div> <!--! end of #block-actions -->
                    </form>


                </div>
            </section> <!--! end of #login-box -->
        </div> <!--! end of #container -->


        <!-- JavaScript at the bottom for fast page loading -->

        <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


        <!-- scripts concatenated and minified via ant build script-->
        <script defer src="js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
        <script defer src="js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
        <script defer src="js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
        <script defer src="js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
        <script defer src="js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
        <script defer src="js/common.js"></script> <!-- Generic functions -->
        <script defer src="js/script.js"></script> <!-- Generic scripts -->

        <script type="text/javascript">
            $().ready(function() {
		
                /*
                 * Validate the form when it is submitted
                 */
                var validatelogin = $("#login-form").validate({
                    invalidHandler: function(form, validator) {
                        var errors = validator.numberOfInvalids();
                        if (errors) {
                            var message = errors == 1
                                ? 'Todos los campos son requeridos por favor intente nuevamente'
                            : 'No se ha llenado ' + errors + ' campo del formulario.';
                            $('#login-form').removeAlertBoxes();
                            $('#login-form').alertBox(message, {type: 'error'});
        			
                        } else {
                            $('#login-form').removeAlertBoxes();
                        }
                    }
                });
		
                jQuery("#reset-login").click(function() {
                    validatelogin.resetForm();
                });
				
            });
        </script>
        <!-- end scripts-->

        <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
             chromium.org/developers/how-tos/chrome-frame-getting-started -->
        <!--[if lt IE 7 ]>
          <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
          <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
        <![endif]-->

    </body>
</html>
