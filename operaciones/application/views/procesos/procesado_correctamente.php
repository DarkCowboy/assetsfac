

<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <body>
        <div class="wrap">
           
                <div class="titulo">
                    Se ha Procesado Correctamente
                </div>
            <a href="" style="text-decoration: none;" onclick="parent.closeFancyboxAndRedirectToUrl('clientes/cliente_panel/<?= $id_pj; ?>');">
                <div class="contenido">
                    <div style="clear: both;    display: block;    margin: 0 auto;    position: relative;    text-align: center;    width: 69px;">
                    <img src="images/general/ic_ok.png"/>
                    <a href="" style="text-decoration: none;" onclick="parent.closeFancyboxAndRedirectToUrl('clientes/cliente_panel/<?= $id_pj; ?>');">Aceptar y volver</a>
                    </div>
                </div>
            </a>
                
        </div>
    </body>
</html>