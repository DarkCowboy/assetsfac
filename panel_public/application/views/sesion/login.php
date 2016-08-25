<?php $this->load->view('templates/head'); ?>
<body class="secc_home secc_caprichosas">
    <?php $this->load->view('templates/menu'); ?>

    <div id="contenedor_columnas">
        
        <?php $this->load->view('templates/anuncios-lat'); ?>

        <div class="col_izq" style="margin:0 0 0 10px; background:none;">
            <?php $this->load->view('templates/bloq-publicacion'); ?>
        </div>	

<!--        <div class="col_der" style="background:white;" >
            <inicio del cuerpo>

            <h2 class="titulo-secc1"><img src="images/flecha-anuncio.png"/>Login de Usuario</h2>

            <div class="bloq-registro">
                <h2 class="titulo">iniciar Sesion</h2>
                <p style="font-size:16px;">Si ya se encuentra registrado rellena el siguiente formulario para iniciar sesi&oacute;n como cliente de Caprichoos.es
                    y empieza a publicar tus anuncios.<br/><br/>
                    Si prefieres que te echemos una mano, ll&aacute;manos al 951 248 288. <br/>
                    <span style="color:#ff0000; font-size:16px;">¡Estamos para ayudarte!</span></p>
                <br/>
            </div>    

            <div style="margin-left: 29%" class="bloq-login">


                <form action="" method="POST">

                    <ul class="nomarginright">
                        <li><p>Email<span>*</span></p><input type="text" name="email" /></li>
                        <li><p>Password</p><input type="password" name="pass"  /></li>
                        <li><p>&nbsp;</p><input type="submit" value=" Iniciar Sesion " /></li>

                    </ul>

                </form>
                <p>&nbsp;</p>
                <p><a href="./welcome/olvide_pass/">Olvide Contraseña</a></p>


            </div><br/><br/>
<script>
                $(window).load(function(){
                    $('#reg_particular').click(function(){
                        $url='./personas/bloque_reg_particular/';
                        var imagen = $('<img>').attr('src','images/cargando.gif').attr('id','id').attr('style', 'margin-left: 37%;');
            
                        $('#registros').empty();
                        $('#registros').append(imagen);
            
                        $.get($url,function(data){
                            $('#registros').html(data); 
                        });
                    });
                
                    $('#reg_agencia').click(function(){
                        $url='./agencias/bloque_reg_agencia/';
                        var imagen = $('<img>').attr('src','images/cargando.gif').attr('id','id').attr('style', 'margin-left: 37%;');
            
                        $('#registros').empty();
                        $('#registros').append(imagen);
                        $.get($url,function(data){
                            $('#registros').empty();
                            $('#registros').html(data); 
                        });
                    });
                });
                    
            </script>
            <div class="bloq-registro">
                <h2 class="titulo">Aun no es Usuario de Caprichoos registrese aqui!!!</h2>
                <p style="font-size:16px;">Si desea publicar un anuncio y aun no se ha registrado seleccione el tipo de registro segun su preferencia
                    y disfrute de los servicios que le ofrece Caprichoos.es<br/><br/>
                    ¡Empieza a publicar tus anuncios!.<br/>
                </p>

            </div> 

            <div id="reg_particular" style="text-align: center;float: left; margin-left: 25px;"> 
                <a href="javascript:void(0)"> <img src="images/btn_particular.jpg" /></a></div>


            <div id="reg_agencia" style="text-align: center;float: left; margin-left: 100px;"> 
                <a href="javascript:void(0)"> <img src="images/btn_agencias.jpg" /></a></div>
            <div id="registros">

            </div>

            <fin del cuerpo>-->
        </div>

        <div class="clearboth"></div>
    </div>
    <?php $this->load->view('templates/footer'); ?>
    <div class="clearboth"></div>
</div>
<div class="clearboth"></div>
</div>
</body>
</html>