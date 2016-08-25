<? $this->load->view('templates/header'); ?>

<body>

    <div class="wrap_tipo">
        <div class="content_tipo">
            <label for="titulo" style="text-align: center; color: #000;">Seleccione el tipo de persona que desea registrar en el sistema </label>      

            <a href="./clientes/registro/natural">
                <div class="tipo_box_pj">        
                    <div class="tipo_head">
                        <label for="titulo" style="text-align: center; color: white">Persona Natural</label>      
                        <div style="margin-top: 15px;"><img src="images/general/natural.jpg"></div>
                    </div>         
                </div>
            </a>

            <a href="./clientes/registro/juridica">
                <div class="tipo_box_pn">        
                    <div class="tipo_head">
                        <label for="titulo" style="text-align: center; color: white">Persona Juridica</label>      
                        <div style="margin-top: 15px;"><img style="margin-top: 10px;" src="images/general/juridica.jpg"></div>
                    </div>         
                </div>
            </a>

            <br>
            <label for="titulo" style="text-align: center;color: #000;padding: 42px 0px 57px 0px;clear: both;">
                Volver al Formulario de inicio de sesi&oacute;n haciendo <a href="#" onclick="window.close()" >click aqu&iacute;</a> 
            </label>      
        </div>    
    </div>    
</body>
<? $this->load->view('templates/footer'); ?>
</html>
