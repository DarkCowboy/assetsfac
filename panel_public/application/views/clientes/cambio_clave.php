<? $this->load->view('templates/header'); ?>
<script>
    window.moveTo(0, 0);
    window.resizeTo(screen.availWidth, screen.availHeight);
</script>

<link href="js/password/style/demo.css" rel="stylesheet" type="text/css" />

<link href="js/password/style/style.css" rel="stylesheet" type="text/css" />
<script src="js/password/js/pschecker.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
           
        //Demo code
        $('.password-container').pschecker({ onPasswordValidate: validatePassword, onPasswordMatch: matchPassword });

        var submitbutton = $('.btn');
        var errorBox = $('.error');
        errorBox.css('visibility', 'hidden');
        submitbutton.attr("disabled", "disabled");

        //this function will handle onPasswordValidate callback, which mererly checks the password against minimum length
        function validatePassword(isValid) {
            if (!isValid){
                errorBox.css('visibility', 'visible');
            }
            else{
                errorBox.css('visibility', 'hidden');
            }
        }
        //this function will be called when both passwords match
        function matchPassword(isMatched) {
            if (isMatched) {
                visible = $('.error').css('visibility');
                if(visible == 'visible'){
                    submitbutton.attr("disabled", "disabled");
                    submitbutton.addClass('locked').removeClass('unlocked');
                }else{
                    submitbutton.addClass('unlocked').removeClass('locked');
                    submitbutton.removeAttr("disabled", "disabled");
                }
            }
            else {
                submitbutton.attr("disabled", "disabled");
                submitbutton.addClass('locked').removeClass('unlocked');
            }
        }
        
    });
</script>
<style>
    .form_box .control-group{
        padding: 0px 20px 0px;
        margin-bottom: 0px;
    }
    .notify{
        background: none repeat scroll 0 0 rgba(0, 255, 0, 0.3) !important;
        border: 1px solid green !important;
        color: black;
        display: block;
        margin-left: 0;
        text-align: center;
    }
    .error_pass{
        color: Red;
        display: block;
        margin-left: 0;
        text-align: center;
        background: none repeat scroll 0 0 rgba(255, 0, 0, 0.3) !important;
        border: 1px solid red !important;
    }
</style>
<body style="padding-top:0!important; ">
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">   

            <div class="row-fluid">
                <div class="span12">
                    <div class="head">
                        <div class="isw-documents"></div>
                        <h1>Cambio de Contraseña</h1>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>

            <form method="post" action="./welcome/cambiar_password" style="width: 300px; text-align: center; margin: 0 auto; border: 1px #9c9c9c solid;">

                <? if ($notify_pass) { ?>
                    <span class="notify"><?= $notify_pass; ?></span>
                <? } ?>
                <? if ($error_pass) { ?>
                    <span class="error_pass"><?= $error_pass; ?></span>
                <? } ?>

                <div class="password-container">

                    <div class="control-group">
                        <label for="inputpass">Contraseña Actual</label>                
                        <input type="password" name="pass_old"  />                
                    </div>

                    <div class="control-group">
                        <label for="inputpass">Nueva Contraseña</label>                
                        <input class="strong-password" type="password" name="pass" id="pass1" />                
                    </div>

                    <div class="control-group">
                        <label for="inputpass">Repita la Contraseña</label>                
                        <input class="strong-password" type="password" id="pass2"/>                
                    </div>


                    <div class="strength-indicator">
                        <div class="meter">
                        </div>
                        Las contraseñas seguras contienen entre 6 y 16 caracteres, no incluya palabras ni nombres comunes,
                        y combine letras mayúsculas, letras minúsculas, números y símbolos.
                    </div>

                    <div class="form-actions">
                        <input name="tipo" type="hidden" value="<?= $tipo; ?>"/>
                        <button type="submit" disabled="disabled" class="btn btn-block">Cambiar la Contrase&ntilde;a</button>
                    </div>
                </div>

            </form>

        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>

</html>
