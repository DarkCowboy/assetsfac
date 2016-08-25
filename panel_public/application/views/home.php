<? $this->load->view('templates/header'); ?>
<script>
    window.moveTo(0, 0);
    window.resizeTo(screen.availWidth, screen.availHeight);
</script>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">


        <div class="workplace">

            <? if ($pos == 1) { ?>
                <iframe src="./welcome/posicion_actual/" style="display: block;
                        margin: 0 auto;
                        overflow: hidden;
                        width: 99%;
                        min-height:630px; ">
                </iframe>
                
                

            <? } else { ?>
                <div style=" width: 100%; margin: 0 auto; ">
                    <h1 style="color:#15624E; font-size: 28px; line-height: 6px;">Bienvenidos a la Plataforma de Clientes de ASSETS FACTORING INC</h1>
                    <div class="dr"><span></span></div>            
                    <p>A traves de este panel usted podra registrar y modificar sus datos, realizar las siguientes operaciones segun su necesidad:</p>
                    <ol>
                        <? if ($tipo == '1') { ?>
                            <li>Solicitar cupo</li>
                            <li>Vender Facturas</li>
                            <li>Solicitar Pagare</li>
                            <li>Solicitar Prestamos Comerciales</li>
                            <li>Consultar los Status de las solicitudes pendientes</li>
                            <li>Consultar su Posicion Actual</li>
                            <li>Imprimir las planillas de sus solicitudes</li>
                        <? } else { ?>
                            <li>Solicitar Pagare</li>
                            <li>Solicitar Prestamos Comerciales</li>
                            <li>Consultar los Status de las solicitudes pendientes</li>
                            <li>Consultar su Posicion Actual</li>
                            <li>Imprimir las planillas de sus solicitudes</li>
                        <? } ?>
                    </ol>
                    <br/>
                    <p>Para sujerencias escribanos al correo <a href="mailto:rhonalejandro@gmail.com" >rhonalejandro@gmail.com</a></p>
                </div>
            <div class="dr"><span></span></div>            
            <? } ?>
        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>

</html>
