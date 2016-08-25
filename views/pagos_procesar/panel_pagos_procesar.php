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
        $('#table').dataTable();
    });
</script>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('pagos_procesar/menu_interno_pagos_procesar') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Lista de pagos por procesar</h1>
                </div><br>
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>
                <table class="display" cellpadding="0" cellspacing="0" id="table">
                    <thead>
                        <tr>
                            <th class="first">Beneficiario</th>
                            <th class="">Fecha</th>
                            <th class="">Banco</th>
                            <th class="">Monto</th>
                            <th class="">Moneda</th>
                            <th class="last">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($instrucciones as $row) { ?> 
                            <tr class="bg">
                                <td class="first "><?= ucwords($row['nombre_proveedor']); ?></td>
                                <td class="first separador"><?= fecha($row['fecha_pago']); ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['nombre_banco']; ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['total_monto_pagar']; ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['moneda']; ?></td>
                                <td class="last separador" >
                                    <div title="Procesar" alt="Procesar" onclick="$.fancybox({type: 'iframe', href: './pagos_procesar/procesar/<?= sha1($row['id_instruccion']); ?>'});" style="cursor: pointer; width: 42px; height: 34px; background: url('./images/icons/icono.engranajes.png')" ></div>
                                </td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>

            </div>

        </div>
        <script>
            function closeFancyboxAndRedirectToUrl(url) {
                redirect = '<?= base_url(); ?>' + url;
                $.fancybox.close();
                window.location = redirect;
            }
        </script>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>