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
            <? $this->load->view('traspasos/menu_interno_traspaso') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Traspasos del mes actual</h1>
                </div><br>


                    <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
                        <thead>
                            <tr>
                                <th class="first" width="177">Banco Emisor</th>
                                <th class="first" width="177">Banco Receptor</th>
                                <th class="first" width="77">Monto</th>
                                <th class="first" width="77">N&deg; de Ref.</th>
                                <th class="last" width="200">Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                        <? foreach ($traspasos as $row) { ?> 
                            <tr  onclick="" style="cursor:pointer;">
                                <td class="first style2"><?= strtoupper($row['nombre_banco_emisor']); ?></td>
                                <td class="first style2 separador" ><?= strtoupper($row['nombre_banco_receptor']); ?></td>
                                <td class="first style2 separador" style="text-align: right"><?= number_format($row['total_monto_pagar'],2,',','.'); ?></td>                                
                                <td class="first style2 separador" style="text-align: center"><?= $row['n_cheque']; ?></td>                                
                                <td class="last style2 separador"><?= fecha($row['fecha_pago']); ?></td>                                
                            </tr>
                        <? } ?>
                        </tbody>
                    </table>

            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>