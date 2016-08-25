<? $this->load->view('templates/header') ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<!--<link rel="stylesheet" type="text/css" href="scripts/filtro/style.css" />-->	
<script type="text/javascript" src="scripts/filtro/jquery-1.js"></script>
<script type="text/javascript" src="scripts/filtro/script.js"></script>	
<script type="text/javascript" src="scripts/filtro/jquery.js"></script>	
<script type="text/javascript" src="scripts/filtro/additional-methods.js"></script>	

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
        <? $this->load->view('templates/menu_left'); ?>
        <div id="middle">
            <div style="padding: 15px;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Movimientos de Egreso</h1>
                </div><br>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
                    <thead>
                        <tr>
                            <th class="first" width="177">Beneficiario</th>
                            <th class="first" width="177">Banco</th>
                            <th class="first" width="77">Monto</th>
                            <th class="first" width="77">N&deg; de Ref.</th>
                            <th class="last" width="200">Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($egresos as $row) { ?> 
                            <tr style="cursor:pointer;" onclick="$.fancybox({type: 'iframe', 'padding': 0, 'autoSize': false, 'width': 730, 'height': 460, href: './egresos/ver_operacion/<?= sha1($row['id_instruccion']); ?>'});">
                                <td class="first style2"><?= strtoupper($row['nombre_proveedor']); ?></td>
                                <td class="first style2 separador" style="text-align: center"><?= strtoupper($row['nombre_banco']); ?></td>
                                <td class="first style2 separador" style="text-align: right"><?= number_format($row['total_monto_pagar'], 2, ',', '.'); ?></td>                                
                                <td class="first style2 separador" style="text-align: center"><?= $row['n_cheque']; ?></td>                                
                                <td class="last style2 separador" style="text-align: center"><?= fecha($row['fecha_procesado']); ?></td>  
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <? $this->load->view('templates/footer') ?>
        <script>
    function closeFancyboxAndRedirectToUrl(url) {
        redirect = '<?= base_url(); ?>' + url;
        $.fancybox.close();
        window.location = redirect;
    }
        </script>
    </div>
</body></html>