<? $this->load->view('templates/header'); ?>
<script>
setInterval(function()
    {
        window.close();
    }, 10);

</script>
<!--<body>
    <div id="load"></div>
    <div class="loginBox">        
        <div class="loginHead">
            <label for="error" style="text-align: center; color: white">Panel de Cliente ASSETS FACTORING INC</label>      
        </div>
        <form class="form-horizontal" action="" method="POST">        
            <div class="control-group">
                <? if (isset($error_message)) { ?>
                    <label for="error" style="color: red;">La clave o correo introducidos son invalidos intente nuevamente</label>      
                <? } ?>
                <label for="inputEmail">Email</label>                
                <input type="text" name="email" id="inputEmail"/>
            </div>
            <div class="control-group">
                <label for="inputPassword">Password</label>                
                <input type="password" name="pass" id="inputPassword"/>                
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-block">Iniciar sesion</button>
            </div>

            <div class="form-actions">
                Si usted no se encuentra reistrado en nuestro sistema haga click en el boton de Registrese
            </div>
            <div class="form-actions">
                <div onclick="top.location.href='./clientes/registrarse'" class="btn btn-block">Registrese</div>
            </div>


            <div class="form-actions">
                Si usted ha olvidado su contraseña haga click en Olvido su contrase&ntilde;a?
            </div>
            <div class="form-actions">
                <div onclick="top.location.href='./clientes/olvide_pass'" class="btn btn-block">Olvido contrase&ntilde;a?</div>
            </div>
        </form>        

    </div> -->


</body>
<? $this->load->view('templates/footer'); ?>
</html>
