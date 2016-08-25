<?php ?>
<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <script type="text/javascript" src="scripts/jquery.min.js"></script>
        <style>
            body{
                font-family: verdana;
                font-size: 12px;
            }
            td{
                font-size: 12px;
            }
            main {
                border: 1px solid black;
                margin: 0 auto;
                max-width: 494px;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <form name="MyForm" action="./egresos/procesar/<?= sha1($instruccion['id_instruccion']); ?>" method="post" id="my_form">
            <input type="text" name="fecha_procesado" value="<?= date('Y-m-d') ?>" />
            <div style="width: 540px; margin: 0 auto; border: 1px green solid;">
                <table  style="width: 100%;">
                    <tr>
                        <td style="font-weight: bold;">
                            Nombre del Beneficiario
                        </td>
                        <td>
                            <?= $instruccion['nombre_proveedor'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">
                            Concepto
                        </td>
                        <td>
                            <?= $instruccion['detalles_concepto'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-weight: bold;">
                            N&deg; de Factura
                        </td>
                        <td>
                            <?= $instruccion['n_factura'] ?>
                        </td>
                    </tr>

                </table>
                <br/>
                <table style="width: 317px;">
                    <tr>
                        <td class="td" style="width:200px;"><b>MONTO EXENTO</b></td>
                        <td class="td" style="text-align: right;"><?= number_format($instruccion['monto_exento'], 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td class="td" style="width:200px;"><b>BASE IMPONIBLE</b></td>
                        <td class="td" style="text-align: right;"><?= number_format($instruccion['monto_instruccion'], 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td class="td" style="width:200px;"><b>MONTO CON IVA (<?= $instruccion['iva'] ?> %)</b></td>
                        <td class="td" style="text-align: right;"><?= number_format(($instruccion['monto_instruccion'] * $instruccion['iva']) / 100, 2, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td class="td" style="width:200px;"><b>TOTAL DE FACTURA:</b></td>
                        <td class="td" style="text-align: right;"><b><?= number_format($instruccion['total_monto_pagar'] + $instruccion['monto_exento'], 2, ',', '.') ?></b></td>
                    </tr>
                </table>
                <br/>

                <table style="text-align: center; width: 100%;">

                    <tr>
                        <td style="font-weight: bold;">Retencion de Iva</td>
                        <td style="font-weight: bold;">Retencion ISRL</td>
                    </tr>
                    <tr>
                        <td>
                            No <input class="ret_iva" checked="true" type="radio" name="ret_iva[valida]" value="0"/>&nbsp;&nbsp;&nbsp;
                            Si <input class="ret_iva" type="radio" name="ret_iva[valida]" value="1"/>
                        </td>
                        <td>
                            No <input class="ret_isrl" checked="true" type="radio" name="ret_isrl[valida]" value="0"/>&nbsp;&nbsp;&nbsp;
                            Si <input class="ret_isrl" type="radio" name="ret_isrl[valida]" value="1"/>
                        </td>
                    </tr>

                </table>
            </div>
            <br/>
            <? $this->load->view('egresos/retenciones'); ?>


        </form>
        <footer>

        </footer>
    </body>
</html>