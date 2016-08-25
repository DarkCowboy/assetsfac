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
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('bancos/menu_interno_banco') ?>            


            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Lista de Bancos</h1>
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
                                <th class="first" width="177">&nbsp;&nbsp;Banco</th>
                                <th class="">Numero de Cuenta</th>
                                <th class="">Moneda</th>
                                <th class="last">Opciones</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <? foreach ($lista_bancos as $row) { ?> 
                                <tr class="bg">
                                    <td class="first "><?= $row['nombre_banco'] . ' (' . $row['t_banco'] . ')'; ?></td>
                                    <td class="first separador"><?= $row['n_cuenta']; ?></td>
                                    <td class="first separador"><?= $row['moneda']; ?></td>
                                    <td class="last separador">
                                        <a href="./bancos/editar_banco/<?= sha1($row['id_banco']); ?>"><img width="16" height="16" title="Editar" alt="Editar" src="images/edit-icon.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <? if ($row['status'] == '0') { ?> 
                                            <a href="./bancos/panel_bancos/habilitar/<?= sha1($row['id_banco']); ?>"><img width="16" height="16" title="Habilitar" alt="Habilitar" src="images/yes.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <? } else { ?>
                                            <a href="./bancos/panel_bancos/deshabilitar/<?= sha1($row['id_banco']); ?>"><img width="16" height="16" title="Desabilitar" alt="Desabilitar" src="images/no.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <? } ?>
                                        <a href="./bancos/panel_bancos/eliminar_banco/<?= sha1($row['id_banco']); ?>"><img width="16" height="16" title="Eliminar" alt="Eliminar" src="images/trash.png"></a>
                                    </td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>

            </div>

        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>