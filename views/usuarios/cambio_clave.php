<? $this->load->view('templates/header') ?>

<link href="scripts/password/style/demo.css" rel="stylesheet" type="text/css" />
<link href="scripts/password/style/style.css" rel="stylesheet" type="text/css" />
<script src="scripts/password/js/pschecker.js" type="text/javascript"></script>

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

    span.error, span#error{
        color: Red;
        display: block;
        margin-left: 0;
        text-align: center;
        background: none repeat scroll 0 0 rgba(255, 0, 0, 0.3) !important;
        border: 1px solid red !important;
    }
    .error_{
        color: Red;
        display: block;
        margin-left: 0;
        text-align: center;
        background: none repeat scroll 0 0 rgba(255, 0, 0, 0.3) !important;
        border: 1px solid red !important;
    }

    .control-group {
        margin: 0 auto;
        text-align: right;
        width: 252px;
    }
</style>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left') ?>            
        <div id="middle">
            <?
            if ($this->session->flashdata('result')) {
                echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                echo $this->session->flashdata('result');
                echo "</div>";
            }
            ?>
            <div class="form_main">
                <form action="./usuarios/opciones/cambiar_calve" method="post" class="form" style="margin: 17px;" id="validate-form" onSubmit="return validator(this);" >
                    <input type="hidden" name="code" value="<?= $codigo; ?>" />
                           
                    <div class="table " style="margin: 0 auto; overflow: hidden; width: 472px; float: none;">
                  
                        <span class="error" id="error">El Password debe de tener entre 6 o mas caracteres</span>
                        <div class="password-container">
                            <div class="control-group">
                                <label for="inputpass">Contraseña</label>                
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
                        </div>
                    </div>

                    <div style="width: 113px; margin: 0 auto;">
                        <button type="submit" disabled="disabled" class="btn btn-block" style="height: 26px; padding: 0; width: 113px;">Cambiar</button>
                    </div>
                </form>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>