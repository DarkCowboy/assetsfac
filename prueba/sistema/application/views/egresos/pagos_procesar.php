<? $this->load->view('templates/header') ?>
<?
$rol = rol_usuario();
?>
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
        <? $this->load->view('templates/menu_left'); ?>        
        <div id="middle">
            <div style="padding: 15px;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Pagos para procesar</h1><br/>
                    <?
                    if ($this->session->flashdata('result')) {
                        echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                        echo $this->session->flashdata('result');
                        echo "</div>";
                    }
                    ?>
                </div><br>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
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
                                <td class="first separador" style="text-align: center;"><?= fecha($row['fecha_pago']); ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['nombre_banco']; ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['total_monto_pagar']; ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['moneda']; ?></td>
                                <td class="last separador"  style="text-align: center;">
                                    <div title="Procesar" alt="Procesar" onclick="$.fancybox({type: 'iframe', href: './egresos/procesar/<?= sha1($row['id_instruccion']); ?>'});" style="margin: 0 auto; cursor: pointer; width: 42px; height: 34px; background: url('./images/icons/icono.engranajes.png')" ></div>
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