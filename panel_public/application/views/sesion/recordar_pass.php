<? $this->load->view('templates/header'); ?>
<script type="text/javascript" src="js/scripts/jquery.min.js"></script>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>    
<style>
    .form_box .control-group{
        padding: 0px 20px 0px;
        margin-bottom: 10px;
    }
</style>
<body>
    <div class="wrap_tipo">
        <div class="content_tipo"  style="width: 342px !important;" >
            <label for="titulo" style="text-align: center; color: #000;">Para resetear su contraseña por favor ingrese su correo electronico en el campo y haga click en enviar</label>      

            <div class="form_box" style="min-height: 233px;">    
                <form method="post" action="./clientes/olvide_pass/" class="form" id="validate-form" onSubmit="return validator(this);">
                    <div class="tipo_head">
                        <label for="titulo" style="text-align: center; color: white">Resetear contraseña Contrase&ntilde;a</label>      
                    </div>         

                    <div class="control-group" style="text-align: center;">
                        <? if (@$msg == 1) { ?>
                            <label for="inputemail" style="color:green;">Codigo de reseteo ya usado ingrese su correo electronico para enviar nuevo codigo</label>                
                        <? } ?>
                        <? if (@$msg == 2) { ?>
                            <label for="inputemail" style="color:red;">Correo electronico no existe</label>                
                        <? } ?>
                        <? if (@$msg == 3) { ?>
                            <label for="inputemail" style="color:green;">Revise su correo Electronico dentro del buzon de Entrada o Span, Se le ha enviado un email con la informacion del cambio de password</label>                
                        <? } ?>
                        <label for="inputemail">Correo Electronico</label>                
                        <input type="text" name="email" id="inputemail"  data-required="false,mail"/>                
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-block">Enviar</button>
                        <div onclick="window.close();" class="btn btn-block">Volver</div>
                    </div>
                </form>
            </div>

        </div>
    </div>

<? $this->load->view('templates/footer'); ?>
</body>
</html>


