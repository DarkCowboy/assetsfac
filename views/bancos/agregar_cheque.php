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
                        <h1 style="width: 688px; text-align: center;">Agregar cheque</h1>
                        <br/>
                        <br/>
                    </div>
                    <form action="./bancos/agregar_cheque/<?= sha1($banco['id_banco']) ?>" method="post" class="form" style="" id="validate-form" onSubmit="return validator(this);" >
                        <div class="table" style="float: none; margin: 0 auto; width: 471px;">
                            <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                            <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                            <table class="listing form" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th class="full" colspan="2">Datos del Cheque digitalizado</th>
                                    </tr>
                                    <tr>
                                        <td class="first" width="172"><strong>Nombre del cheque digitalizado</strong></td>
                                        <td class="last"><input name="nombre_cheque" value="<?= $banco['nombre_cheque'] ?>" class="text" id="first_name" type="text" data-required="true"></td>
                                    </tr>
                                    <tr>
                                        <td class="first"><strong>Extension de la imagen</strong></td>
                                        <td class="last">
                                            <select name="extension_imagen_cheque">
                                                <option <?= $banco['extension_imagen_cheque'] == '.jpg' ? '_selected selected="selected"' : '' ?>>.jpg</option>
                                                <option <?= $banco['extension_imagen_cheque'] == '.png' ? '_selected selected="selected"' : '' ?>>.png</option>
                                            </select>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <p>&nbsp;</p>
                        </div>


                        <div style="width: 232px; margin: 0 auto;">
                            <img src="images/icon_menu/Atras.png" style="cursor: pointer; float:left;" onclick="history.back()">
                            <button type="submit" style="height: 26px; padding: 0; width: 113px; float:left;  margin-left: 11px;">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body></html>