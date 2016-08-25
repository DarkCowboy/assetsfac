
<? $this->load->view('templates/header') ?>

<style type="text/css" title="currentStyle">
    @import "css/demo_page.css";
    @import "css/demo_table.css";
    .separador{
        border-left: solid 1px #9c9c9c;
    }
</style>
<script type="text/javascript" language="javascript" src="scripts/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#tableasd').dataTable();
    });
</script>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('pagos_procesados/menu_interno_pagos_procesados') ?>
            <div id="center-column" style="float: left; margin: 0 auto; width: 750px !important">
                <div class="top-bar">
                    <h1 style="text-align: center;">Pago para <?= $instruccion['nombre_proveedor']; ?></h1>
                </div><br/><br/>
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>
                <br/>
                <? if ($instruccion['t_instrumento'] == 'Cheque') { ?>
                    <? if ($instruccion['nombre_imagen_cheque']) { ?>
                        <? if (strtolower(trim($instruccion['nombre_banco'])) == 'balboa bank') { ?>
                            <div style="position: relative; background: url('./images/cheques/vista_<?= $instruccion['nombre_imagen_cheque']; ?>') no-repeat; width: 614px; height: 297px; margin-top: 10px;">
                                <?
                                $numero = strlen($instruccion['n_cheque']);
                                $restante = 6 - $numero;
                                for ($i = 1; $i <= $restante; $i++) {
                                    $instruccion['n_cheque'] = '0' . $instruccion['n_cheque'];
                                }
                                ?>
                                <p style="position: absolute; left: 430px; top: 3px;"><?= $instruccion['n_cheque']; ?></p>

                                <p style="position: absolute; left: 420px; top: 33px;">
                                    <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                                    <?= fecha($fecha[0]); ?>
                                </p>

                                <p style="left: 76px; position: absolute; text-align: center; top: 78px; width: 372px;">** <?= ucwords($instruccion['nombre_proveedor']); ?> **</p>

                                <p style="position: absolute; left: 480px; top: 74px;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></p>

                                <p style="position: absolute; left: 85px; top: 104px;">
                                    <? $V = new EnLetras(); ?>
                                    <?= $V->ValorEnLetras($instruccion['total_monto_pagar'], ''); ?>
                                </p>
                            </div>
                        <? } elseif (strtolower(trim($instruccion['nombre_banco'])) == 'credicorp bank') { ?>
                            <?
                            $numero = strlen($instruccion['n_cheque']);
                            $restante = 6 - $numero;
                            for ($i = 1; $i <= $restante; $i++) {
                                $instruccion['n_cheque'] = '0' . $instruccion['n_cheque'];
                            }
                            ?>
                            <div style="position: relative; background: url('./images/cheques/vista_<?= $instruccion['nombre_imagen_cheque']; ?>') no-repeat; width: 614px; height: 297px; margin-top: 10px;">

                                <p style="position: absolute; font-weight: bold; font-size: 14px; left: 521px; top: 10px;"><?= $instruccion['n_cheque']; ?></p>

                                <p style="position: absolute; left: 378px; width: 203px; text-align: center; top: 61px;">
                                    <? $fecha = explode(' ', $instruccion['fecha_pago']); ?>
                                    <?= fecha($fecha[0]); ?>
                                </p>

                                <p style="position: absolute; text-align: center; left: 97px; top: 114px; width: 361px;">** <?= ucwords($instruccion['nombre_proveedor']); ?> **</p>

                                <p style="position: absolute; left: 490px; top: 112px; width: 90px; text-align: center;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></p>

                                <p style="position: absolute; top: 148px; left: 44px; width: 479px;">
                                    <? $V = new EnLetras(); ?>
                                    <?= $V->ValorEnLetras($instruccion['total_monto_pagar'], ''); ?> *
                                </p>
                            </div>
                        <? } ?>
                    <? } ?>

                    <table style="width: 618px;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td>Cheque No.</td>
                                <td>Banco</td>
                                <td>Codigo Banco</td>
                                <td>Cuenta Contable</td>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <tr>
                                <td><?= $instruccion['n_cheque']; ?></td>
                                <td><?= $instruccion['nombre_banco']; ?></td>
                                <td><?= $instruccion['n_cuenta']; ?></td>
                                <td></td>
                            </tr>

                            <tr style="border: 1px solid black;">
                                <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                            </tr>

                            <tr>
                                <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                    <?= $instruccion['Concepto_pago'] ?>
                                </td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;">Total <?= $instruccion['moneda'] ?></td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <table style="width: 618px;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td style="width: 33.33%;">Instruccion de pago</td>
                                <td style="width: 33.33%;">Comprobante de Egreso</td>
                                <td style="width: 33.33%;">Cheque</td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="width: 33.33%; text-align: center;">
                                <a target="_blank" href="./instruccion_pago/instruccion_pago/<?= sha1($instruccion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                            <td style="width: 33.33%; text-align: center;">
                                <a target="_blank" href="./comprobante_egreso/comprobante_egreso/<?= sha1($instruccion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                            <? if ($instruccion['nombre_imagen_cheque']) { ?>
                                <td style="width: 33.33%; text-align: center;">
                                    <a target="_blank" href="./cheque/imprimir_cheque/<?= sha1($instruccion['id_instruccion']) ?>">
                                        <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                    </a>

                                    <a href="#divForm" id="btnForm">
                                        <img width="16" height="16" title="Anular Cheque" alt="Anular Cheque" src="images/no.png">
                                    </a>

                                </td>
                            <? } else { ?>
                                <td style="width: 33.33%; text-align: center;">
                                    No hay plantilla de cheque para este banco
                                </td>
                            <? } ?>
                        </tr>
                    </table>

                <? } else if ($instruccion['t_instrumento'] == 'Transferencia') { ?>
                    <table style="width: 618px;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td>Transferencia No.</td>
                                <td>Banco</td>
                                <td>Codigo Banco</td>
                                <td>Cuenta Contable</td>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <tr>
                                <td><?= $instruccion['n_cheque']; ?></td>
                                <td><?= $instruccion['nombre_banco']; ?></td>
                                <td><?= $instruccion['n_cuenta']; ?></td>
                                <td></td>
                            </tr>

                            <tr style="border: 1px solid black;">
                                <td style="background: #9c9c9c; height: 15px;" colspan="4"></td>
                            </tr>

                            <tr>
                                <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                    <?= $instruccion['Concepto_pago'] ?>
                                </td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;">Total <?= $instruccion['moneda'] ?></td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 618px;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td style="width: 50%;">Instruccion de pago</td>
                                <td style="width: 50%;">Comprobante de Egreso</td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="width: 50%; text-align: center;">
                                <a target="_blank" href="./instruccion_pago/instruccion_pago/<?= sha1($instruccion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                            <td style="width: 50%; text-align: center;">
                                <a target="_blank" href="./comprobante_egreso/comprobante_egreso/<?= sha1($instruccion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                        </tr>
                    </table>
                <? } else if ($instruccion['t_instrumento'] == 'Efectivo') { ?>
                    <table style="width: 618px;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td colspan="4" >Pago en Efectivo</td>
                            </tr>
                        </thead>
                        <tbody style="text-align: center;">
                            <tr>
                                <td colspan="4" ></td>
                            </tr>

                            <tr>
                                <td colspan="3" rowspan="6" style="border: 1px solid black; text-align: justify; vertical-align: text-top; padding: 5px;">
                                    <?= $instruccion['Concepto_pago'] ?>
                                </td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="border: 1px solid black;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="text-align: right;">Total <?= $instruccion['moneda'] ?></td>
                                <td style="border: 1px solid black; text-align: right;"><?= number_format($instruccion['total_monto_pagar'], 2, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width: 618px;">
                        <thead style="text-align: center; background: #9c9c9c; font-weight: bold; color: white; height: 25px;" >
                            <tr>
                                <td style="width: 50%;">Instruccion de pago</td>
                                <td style="width: 50%;">Comprobante de Egreso</td>
                            </tr>
                        </thead>
                        <tr>
                            <td style="width: 50%; text-align: center;">
                                <a target="_blank" href="./instruccion_pago/instruccion_pago/<?= sha1($instruccion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                            <td style="width: 50%; text-align: center;">
                                <a target="_blank" href="./comprobante_egreso/comprobante_egreso/<?= sha1($instruccion['id_instruccion']) ?>">
                                    <img width="16" height="16" src="images/icons/pdf.gif" alt="Descargar/imprimir" title="Descargar/imprimir">
                                </a>
                            </td>
                        </tr>
                    </table>
                <? } ?>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>


    <div id="divForm" style="display:none">
        <div style="width: 520px; height: 300px; background: white;">
            <p style="font-size: 19px; margin: 0; padding: 0; text-align: center;">Anular Cheque</p>
            <br/><br/>
            <form method="post" action="" id="validate-form" onSubmit="return validator(this);">
                <table style="width: 430px; margin: 0 auto; ">
                    <tr>
                        <td style="width: 25%">Seleccione el Motivo</td>
                        <td style="width: 70%">
                            <select name="motivo" data-required="true" >
                                <option value="0">Seleccione...</option>
                                <option Value="1">Error en Datos (numero de cheque, soporte, monto de operacion, Etc.)</option>
                                <option Value="2">Falta de Fondos en la Cuenta</option>
                                <option Value="3">Daño del Cheque por Impresion</option>
                                <option Value="4">Otros</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Observacion</td>
                        <td style="width: 70%"><textarea data-required="true"  style="width: 400px; height: 79px;"></textarea></td>
                    </tr>
                    <tr>
                        <td style="width: 25%">Acciones</td>
                        <td style="width: 70%">
                            <select name="acciones" id="acciones">
                                <option value="0">Seleccione...</option>
                                <option value="1">Anular cheque actual y asignar nuevo cheque a la Operacion</option>
                                <option value="2">Anular cheque actual y enviar operacion a pagos por procesar</option>
                                <option value="3">Asignar nuevo cheque a la Operacion sin Anular Numero de Cheque Actual</option>
                                <option value="4">Enviar operacion a pagos por procesar sin Anular Numero de Cheque Actual</option>
                            </select>
                        </td>
                    </tr>
                    <tr id="accion_result"></tr>
                    <tr>
                        <td style="width: 25%">Clave</td>
                        <td style="width: 70%"><input name="codigo" data-required="true"  placeholder="Clave de Autorizacion" /></td>
                    </tr>
                    <tr>
                        <td colspan="2"style="text-align: center;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2"style="text-align: center;"><input type="submit" value="Anular" /></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script type="text/javascript">
        $("#btnForm").fancybox();
        
        $('#acciones').change(function(){
           $x = $(this).find('option:selected').val();
           $('#accion_result').empty();
           if($x == '1' || $x == '3'){
               $('#accion_result').append('\n\
                    <td>\n\
                        N&deg; Cheque\n\
                    </td>\n\
                    <td>\n\
                        <input name="n_cheque" />\n\
                    </td>\n\
                    \n\
                ');
           }
    });
    </script>


</body>
</html>