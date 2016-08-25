<!DOCTYPE html>
<html lang="es">
    <head>
        <base href="<?php echo base_url() ?>"/>
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" />
        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./scripts/jquery-1.8.0.min.js"><'+'/script>')</script>-->
        <script type="text/javascript" src="./scripts/jquery.min.js"></script>
        <link type="text/css" href="./scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
        <script type="text/javascript" src="./scripts/lib.validator/lib.validator.js"></script>   
        <link rel="stylesheet" type="text/css" href="css/typography.css">

    </head>

    <body>
        <div id="main">
            <div id="middle">
                <div style="width: 688px; margin: 0 auto;">
                    <div class="">
                        <br/>
                        <br/>
                        <h1 style="width: 688px; text-align: center;">Cheque <?= $datos_banco['nombre_banco'] ?></h1>
                        <br/>
                        <br/>
                    </div>
                    <div class="table" style="float: none; margin: 0 auto; width: 471px;">
                        <img src="images/cheques/<?= $datos_banco['nombre_cheque'] . $datos_banco['extension_imagen_cheque'] ?>" alt="" class="left" width="471">
                    </div>


                    <div style="bottom: 28px; left: 0;margin-left: auto; margin-right: auto; position: absolute; right: 0; width: 107px;">
                        <img src="images/icon_menu/Atras.png" style="cursor: pointer; float:left;" onclick="history.back()">
                        <a href="./bancos/ver_cheque/imprimir/<?= sha1($datos_banco['id_banco']); ?>">
                            <img src="images/icons/pdf.gif" style="cursor: pointer; float:left;">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </body></html>