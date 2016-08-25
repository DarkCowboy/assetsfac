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
                        <h1 style="width: 688px; text-align: center;">Editar Banco</h1>
                        <br/>
                        <br/>
                    </div>
                    <form action="./bancos/editar_banco/<?= sha1($banco['id_banco']) ?>" method="post" class="form" style="" id="validate-form" onSubmit="return validator(this);" >
                        <div class="table" style="float: none; margin: 0 auto; width: 471px;">
                            <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                            <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                            <table class="listing form" cellpadding="0" cellspacing="0">
                                <tbody>
                                    <tr>
                                        <th class="full" colspan="2">Datos de la Entidad Financiera</th>
                                    </tr>
                                    <tr>
                                        <td class="first" width="172"><strong>Nombre del Banco</strong></td>
                                        <td class="last"><input name="nombre_banco" value="<?= $banco['nombre_banco'] ?>" class="text" id="first_name" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                                    </tr>
                                    <tr class="bg">
                                        <td class="first"><strong>Tipo de Cuenta</strong></td>
                                        <td class="last">
                                            <select name="t_de_cuenta" id="t_de_cuenta">
                                                <option <?= $banco['t_de_cuenta'] == 'Corriente' ? '_selected selected="selected"' : '' ?> value="Corriente">Corriente</option>
                                                <option <?= $banco['t_de_cuenta'] == 'Ahorro' ? '_selected selected="selected"' : '' ?> value="Ahorro">Ahorro</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="first"><strong>Numero de Cuenta</strong></td>
                                        <td class="last"><input name="n_cuenta" value="<?= $banco['n_cuenta'] ?>" id="email" class="text" type="text" data-required="true"></td>
                                    </tr>
                                    <tr>
                                        <td class="first"><strong>Condicion</strong></td>
                                        <td class="last"><select name="t_banco">
                                                <option <?= $banco['t_banco'] == 'Propio' ? '_selected selected="selected"' : '' ?> value="Propio">Propio</option>
                                                <option <?= $banco['t_banco'] == 'Tercero' ? '_selected selected="selected"' : '' ?> value="Tercero">Tercero</option>
                                            </select></td>
                                    </tr>
                                    <tr>
                                        <td class="first"><strong>Moneda</strong></td>
                                        <td class="last">
                                            <select name="moneda">
                                                <option <?= $banco['moneda'] == 'USD' ? '_selected selected="selected"' : '' ?>>USD</option>
                                                <option <?= $banco['moneda'] == 'VEF' ? '_selected selected="selected"' : '' ?>>VEF</option>
                                                <option <?= $banco['moneda'] == 'B/.' ? '_selected selected="selected"' : '' ?>>B/.</option>
                                            </select>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                            <p>&nbsp;</p>
                        </div>


                        <div style="width: 232px; margin: 0 auto;">
                            <img src="images/icon_menu/Atras.png" style="cursor: pointer; float:left;" onclick="history.back()">
                            <button type="submit" style="height: 26px; padding: 0; width: 113px; float:left;  margin-left: 11px;">Editar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body></html>