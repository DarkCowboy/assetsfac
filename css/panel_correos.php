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
        $('#correos_tabla').dataTable();
    });
</script>

<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('correos/menu_interno_correos') ?>            


            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Lista de Correo de Clientes</h1>
                </div><br>
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>

                <table cellpadding="0" cellspacing="0" border="0" class="display" id="correos_tabla">
                    <thead>
                        <tr>
                            <th class="first">Nombre del Cliente</th>
                            <th>Correo Electronico</th>
                            <th class="last">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($correos as $row) { ?> 
                            <tr>
                                <td class="first style2"><?= ucwords($row['nombre_cliente']); ?></td>
                                <td class="separador"><?= $row['correo_cliente']; ?></td>
                                <td class="separador">
                                    
                                    <a href="./correos/editar_correo/<?= sha1($row['id_correo']); ?>">
                                        <img src="images/permisos.png" alt="Editar Permisos" title="Editar" height="16" width="16">
                                    </a>
                                    
                                    <? if ($row['status'] == 0) { ?>
                                        <a href="./correos/opciones/habilitar/<?= sha1($row['id_correo']); ?>">
                                            <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar" height="16" width="16">
                                        </a>
                                    <? } else if ($row['status'] == 1) { ?>
                                        <a href="./correos/opciones/inabilitar/<?= sha1($row['id_correo']); ?>">
                                            <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar" height="16" width="16">
                                        </a>
                                    <? } ?>
                                    
                                    <a href="./correos/opciones/eliminar/<?= sha1($row['id_correo']); ?>">
                                        <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar" height="16" width="16">
                                    </a>
                                
                                </td>
                            </tr>
                        <? } ?>
                </table>

            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>