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
            <label for="titulo" style="text-align: center; color: #000;"></label>      

            <div class="form_box" style="min-height: 233px;">    
                    <div class="tipo_head">
                        <label for="titulo" style="text-align: center; color: white">Resultado de la solicitud</label>      
                    </div>         

                    <div class="control-group">
                        <? if ($msg== 1) { ?>
                        <label for="inputemail" style="color:green;">Password cambiada con exito haga <a href="#" onclick="window.close();">click aqui</a> para iniciar sesion</label>                
                        <? } ?>        
                    </div>
                
            </div>

        </div>
    </div>

<? $this->load->view('templates/footer'); ?>
</body>
</html>


  