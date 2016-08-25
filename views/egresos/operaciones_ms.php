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
    $(document).ready(function () {
        $('#table').dataTable();
    });
</script>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left'); ?>        
        <div id="middle">
            <div style="padding: 15px;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Operaciones MS por Procesar</h1><br/>
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
                            <th class="">fecha</th>
                            <th class="">Operacion</th>
                            <th class="">Inst.liquidacion</th>
                            <th class="last">Eliminar</th>
                            <th class="">Procesar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($instrucciones as $row) { ?> 
                            <tr class="bg">
                                <td class="first "><?= ucwords($row['nombre_proveedor']); ?></td>
                                <td class="first separador" style="text-align: center;"><?= fecha($row['fecha_factura']); ?></td>
                                <td class="first separador" style="text-align: center;"><?= $row['numoperacion']; ?></td>
                                <td class="first separador" style="text-align: center;">
                                    <a target="_blank" href="./egresos/instruccion_liquidacion_oms/<?= sha1($row['id_instruccion']); ?>"><img width="16" height="16" title="Descargar/imprimir" alt="Descargar/imprimir" src="images/icons/pdf.gif"></a>
                                </td>
                                <td class="last separador"  style="text-align: center;">
                                    <a href="./egresos/editar_instruccion/eliminar/<?= sha1($row['id_instruccion']); ?>"><img width="16" height="16" title="Eliminar" alt="Eliminar" src="images/trash.png"></a>
                                </td>
                                <td class="first separador" style="text-align: center;">
                                    <a href="./egresos/editar_instruccion/<?= sha1($row['id_instruccion']); ?>"><img width="30" height="30" title="Editar" alt="Editar" src="images/icons/icono.engranajes.png"></a>
                                    <!--<div title="Procesar" alt="Procesar" onclick="$.fancybox({type: 'iframe', width: '980', minHeight: '610', href: './egresos/procesar/<?= sha1($row['id_instruccion']); ?>'});" style="margin: 0 auto; cursor: pointer; width: 42px; height: 34px; background: url('./images/icons/icono.engranajes.png')" ></div>-->
                                </td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <? $this->load->view('templates/footer') ?>
        <script>
            function closeFancyboxAndRedirectToUrl(url) {
                redirect = '<?= base_url(); ?>' + 'egresos/operaciones_ms';
                $.fancybox.close();
                window.location = redirect;
            }
        </script>
    </div>
</body></html>