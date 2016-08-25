<? $this->load->view('templates/header'); ?>

<script type="text/javascript" src="js/scripts/jquery.min.js"></script>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>    

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
    span{
        color: Red;
        display: block;
        margin-left: 0;
        text-align: center;
        background: none repeat scroll 0 0 rgba(255, 0, 0, 0.3) !important;
        border: 1px solid red !important;
    }
</style>

<body style=" padding-top: 7px;">
    <div class="wrap_tipo">
        <div class="content_tipo"  style="width: 342px;margin: 0% auto" >
            <label for="titulo" style="text-align: center; color: #000;">Llene todos los campos para realizar su registro</label>      

            <div class="form_box">    
                <form method="post" action="./clientes/agregar/" class="form" id="validate-form" onSubmit="return validator(this);">
                    <div class="tipo_head">
                        <label for="titulo" style="text-align: center; color: white">Formulario de Registro de Cliente <?= $tipo == 0 ? 'Natural' : 'Juridico'; ?></label>      
                    </div>         

                    <div class="control-group">
                        <label for="inputfirstname">Nombre</label>                
                        <input type="text" name="first_name" id="inputfirstname" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>                
                    </div>

                    <div class="control-group">
                        <label for="inputlastname">Apellido</label>                
                        <input type="text" name="last_name" id="inputlastname" data-required="true" onkeypress="return permite(event, 'soloLetras')"/>                
                    </div>

                    <div class="control-group">
                        <label for="inputemail">Correo Electronico</label>                
                        <input type="text" name="email" id="inputemail"  data-required="false,mail"/>                
                    </div>

                    <span class="error">El Password debe de tener entre 6 o mas caracteres</span>
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


                    <div class="form-actions">
                        <input name="tipo" type="hidden" value="<?= $tipo; ?>"/>
                        <button type="submit" disabled="disabled" class="btn btn-block">Registrarse</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


</body>
<? $this->load->view('templates/footer'); ?>
</html>


