<?php $this->load->view('templates/head'); ?>
<body class="secc_home secc_caprichosas">
    <?php $this->load->view('templates/menu'); ?>

    <div id="contenedor_columnas">
        
        <?php $this->load->view('templates/anuncios-lat'); ?>

        <div class="col_izq" style="margin:0 0 0 10px; background:none;">
            <?php $this->load->view('templates/bloq-publicacion'); ?>
        </div>	

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
        <div class="col_der" style="background:white;" >
            <!--<inicio del cuerpo>-->
                <h2 class="titulo-secc1"><img src="images/flecha-anuncio.png"/>Registro de Usuario</h2>
            <div id="registros">

                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div id="reg_particular" style="text-align: center;float: left; margin-left: 25px;"> 
                    <a href="javascript:void(0)"> <img src="images/btn_particular.jpg" /></a></div>


                <div id="reg_agencia" style="text-align: center;float: left; margin-left: 100px;"> 
                   <a href="javascript:void(0)"> <img src="images/btn_agencias.jpg" /></a></div>


            </div>
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