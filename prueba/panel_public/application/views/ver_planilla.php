<? $this->load->view('templates/header'); ?>
<script>
    window.moveTo(0, 0);
    window.resizeTo(screen.availWidth, screen.availHeight);
</script>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">
        <div class="workplace">
            <div style="margin: 0 auto; text-align: justify; width: 694px;n font-size: 17px;">
                <? $date = date("H"); ?>
                <? if ($date < 12) { ?> 
                    Buenos dias!
                <? } else if ($date < 18) { ?>
                    Buenas tardes!
                <? } else { ?>
                    Buenas noches!
                <? } ?>
                <br/>    
                <br/>    
                Su Solicitud de <?= $tipo_soli ?> se ha generado correctamente!, a coninuacion se muestra la planilla
                de la solicitud por favor imprir, firmar y enviar con la documentacion Requerida.
                <br/>
                <br/>
                Muchas Gracias
                <br/>
                <br/>
            </div>
            <iframe src="<?= $href ?>" style="display: block;
                    margin: 0 auto;
                    overflow: hidden;
                    width: 99%;
                    min-height:630px; ">
            </iframe>
        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>

</html>