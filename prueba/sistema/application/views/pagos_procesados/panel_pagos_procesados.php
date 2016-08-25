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
            <? $this->load->view('pagos_procesados/menu_interno_pagos_procesados') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Lista de pagos procesados</h1>
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
                            <th class="first" style="margin: 0; padding: 0; width: 1%;"></th>
                            <th class="first" style="margin: 0; padding: 0; width: 152px;">Beneficiario</th>
                            <th class="" style="margin: 0; padding: 0; width: 121px;">Fecha</th>
                            <th class="" style="margin: 0; padding: 0; width: 34px;">Banco</th>
                            <th class="" style="margin: 0; padding: 0; width: 40px;">Monto</th>
                            <th class="" style="margin: 0; padding: 0; width: 45px">Moneda</th>
                            <th class="last" style="margin: 0; padding: 0; width: 60px;">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($instrucciones as $row) { ?> 
                            <tr class="bg">
                                <td class="first "></td>
                                <td class="first "><?= ucwords($row['nombre_proveedor']); ?></td>
                                <td class="first separador"><?= fecha($row['fecha_pago']); ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['nombre_banco']; ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['total_monto_pagar']; ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['moneda']; ?></td>
                                <td class="last separador" ><a href="./pagos_procesados/ver_pago/<?= sha1($row['id_instruccion']); ?>">Ver</a></td>
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