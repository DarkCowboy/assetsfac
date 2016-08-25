<?php $this->load->view('templates/head'); ?>
<body class="secc_home secc_caprichosas">
    <?php $this->load->view('templates/menu'); ?>

    <div id="contenedor_columnas">
        
        <?php $this->load->view('templates/anuncios-lat'); ?>

        <div class="col_izq" style="margin:0 0 0 10px; background:none;">
            <?php $this->load->view('templates/bloq-publicacion'); ?>
        </div>	

        <div class="col_der" style="background:white;">
            <!--<inicio del cuerpo>-->
            
<!--			<div style="width: 384px;border: 2px solid red;border-radius: 19px;text-align: center;margin: 26px 0px 0px 24%;">
			 Bienvenido!!!, usted se ha registrado en Caprichoos correctamente.
			 Inicie sesion haciendo <a href="./welcome/panel/">click aqui</a>.
			 
			</div>-->

             <!--<fin del cuerpo>-->
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