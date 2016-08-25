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
        <? $this->load->view('templates/menu_left') ?>            
        <div id="middle">
            <div style="padding: 15px;">
                <div class="top-bar">
                </div><br>

                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
                    <thead>
                        <tr>
                            <th class="first" width="177">Nombre</th>
                            <th class="first" width="177">Numero de Identificacion</th>
                            <th class="first" width="177">Telefonos</th>
                            <th class="last">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($lista_contrapartes as $row) { ?> 
                            <tr>
                                <td class="first style2"><?= strtoupper($row['nombre_proveedor']); ?></td>
                                <td class="first style2 separador"><?= $row['pre_id_number'] . ' ' . $row['id_number_proveedor']; ?></td>
                                <td class="first style2 separador"><?= $row['telefonos_proveedor']; ?></td>
                                <td class="last separador" style="text-align: center;">
                                    <a target="_blank" href="./contrapartes/consultar/<?= sha1($row['id_proveedor']); ?>"><img width="16" height="16" title="Consultar" alt="Consultar" src="images/login-icon.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="./contrapartes/editar_contraparte/<?= sha1($row['id_proveedor']); ?>"><img width="16" height="16" title="Editar" alt="Editar" src="images/edit-icon.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="./contrapartes/listar_contrapartes/eliminar_contraparte/<?= sha1($row['id_proveedor']); ?>"><img width="16" height="16" title="Eliminar" alt="Eliminar" src="images/trash.png"></a>
                                </td>
                            </tr>
                        <? } ?>
                    </tbody>
                </table>

            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>