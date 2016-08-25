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
            <label for="titulo" style="text-align: center; color: #000;">Para resetear su contrase&ntilde;a por favor llene los campos</label>      

            <div class="form_box">    
                <form method="post" action="./clientes/cambio_pass/" class="form" id="validate-form" onSubmit="return validator(this);">
                    <div class="tipo_head">
                        <label for="titulo" style="text-align: center; color: white">Resetear contrase&ntilde;a Contrase&ntilde;a</label>      
                    </div>         
                    <div class="control-group">
                        <label for="inputpass">Escribe la nueva Contrase&ntilde;a</label>                
                        <input type="password" name="pass" id="pass1" />                
                    </div>

                    <div class="control-group">
                        <label for="inputpass">Repita la Contrase&ntilde;a</label>                
                        <input type="password" id="pass2"/>                
                    </div>

                    <div class="form-actions">
                        <input type="hidden" name="reset" value="<? echo @$persona['reset']; ?>"  /> 
                        <button type="submit" class="btn btn-block">Cambiar contrase&ntilde;a</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

<? $this->load->view('templates/footer'); ?>
</body>
</html>


