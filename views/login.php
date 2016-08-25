<? $this->load->view('templates/login/head'); ?>
<? $this->load->view('templates/header') ?>
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
    .block-header {
        background: url("http://www.assetsfactoring.com/operaciones/images/container/block/block-header-bg.png") repeat-x scroll top left #cfdee5;
        min-height: 38px;
        border: 1px solid #4b5e6b;
        border-bottom: 1px solid #9ba6ab;
        margin-bottom: -2px;
        position: relative;
        z-index: 5;
    }
    .block-header h1 {
        margin: 0;
        padding: 0;
        font-size: 16px;
        padding-left: 10px;
        line-height: 37px;
    }
    body.special-page {
        background: none repeat scroll 0 0 #F0F0F0 !important;
    }
    element.style {
        text-align: center;
        width: 100%;
        padding: 0;
    }
    .block-header h1 {
        margin: 0;
        padding: 0;
        font-size: 16px;
        padding-left: 10px;
        line-height: 37px;
    }
    .block-header h1 {
        float: left;
    }
    h1 {
        font-size: 22px;
    }
    h1, h2, h3, h4, h5, h6 {
        color: #475d68;
        text-shadow: 0 1px 0 #fff;
        line-height: 10px;
    }
    user agent stylesheet:-webkit-any(article,aside,nav,section) h1 {
        font-size: 1.5em;
        -webkit-margin-before: 0.83em;
        -webkit-margin-after: 0.83em;
    }
    user agent stylesheeth1 {
        display: block;
        font-size: 2em;
        -webkit-margin-before: 0.67em;
        -webkit-margin-after: 0.67em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
        font-weight: bold;
    }
    Pseudo element
    ::selection {
        background: #8EACB7;
        color: #fff;
        text-shadow: none;
    }
    Inherited from body.special-page
    body, button, input, select, textarea {
        font-family: 'PT Sans', 'Tahoma', sans-serif !important;
        font-family: 'PT Sans', 'Tahoma', sans-serif !important;
        color: #222;
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
                    <h1 style="text-align: center; width: 100%; padding: 0; font-family: 'PT Sans', 'Tahoma', sans-serif !important;">Control de Acceso, Panel Administrativo</h1>
                </div>
                <form id="login-form" class="block-content form" method="post">
                    <? if (isset($error_message)) { ?>
                        <div id="alertBox-generated" style="" class="alert error no-margin top">Nombre de Usuario o cantrase&ntilede;a invalida, intente nuevamente</div>
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
