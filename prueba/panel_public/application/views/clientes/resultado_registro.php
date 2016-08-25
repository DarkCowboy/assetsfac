<? $this->load->view('templates/header'); ?>

<body>
    <div class="wrap_tipo">
        <div class="content_tipo"  style="width: 400px !important;" >
            <label for="titulo" style="text-align: center; color: #000;"><?= $mensaje; ?></label>      

            <div class="form_box" style="width: 100% !important ">    
                <? if (isset($error)){ ?>
                <p style="font-size: 15px;padding: 19px;">Su correo ya se encuentra registrado si desea iniciar sesion haga <a href="#" onclick="window.close()">click aqui</a></p>
                <div style="margin: -29px -7px 35px 97px;"><a href="#" onclick="window.close()"><img style="margin-top: 10px; width: 67% !important;" src="images/general/login.png"></a></div>
                <p style="font-size: 15px;padding: 19px;">Si usted ha olvidado la contraseña haga <a href="./clientes/olvide_pass">click aqui</a></p>
                <div style="margin: -29px -7px 35px 97px;"><a href="./clientes/olvide_pass"><img style="margin-top: 10px; width: 67% !important;" src="images/general/olvide_pass.png"></a></div>
                <? }else{?>
                <p style="font-size: 15px;padding: 19px;">Se ha Registrado Correctamente Para Ingresar por primera vez al sistema haga <a href="#" onclick="window.close()">click aqui</a> para volver a la pagina principal e iniciar sesion</p>
                <div style="margin: -29px -7px 35px 97px;"><a href="#" onclick="window.close()"><img style="margin-top: 10px; width: 67% !important;" src="images/general/login.png"></a></div>
                    <? } ?>
                
            </div>

        </div>
    </div>


</body>
<? $this->load->view('templates/footer'); ?>
</html>

