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
                    <h1 style="text-align: center;">Lista de Bancos</h1>
                </div><br>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
                    <thead>
                        <tr>
                            <th class="first" width="">Banco</th>
                            <th class="first" width="">Numero de cuenta</th>
                            <th class="first" width="">Tipo de Cuenta</th>
                            <th class="first" width="">Moneda</th>
                            <th class="last" width="">Saldo Actual</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? $saldo_total_usd = 0; ?>
                        <? $saldo_total_vef = 0; ?>
                        <? foreach ($bancos as $row) { ?> 
                            <? if ($row['moneda'] == 'VEF') { ?>
                                <? $saldo_total_vef = $row['saldo'] + $saldo_total_vef; ?>
                            <? } else if ($row['moneda'] == 'USD') { ?>
                                <? $saldo_total_usd = $row['saldo'] + $saldo_total_usd; ?>
                            <? } ?>
                            <tr style="cursor:pointer;" onclick="$.fancybox({type: 'iframe', 'padding': 0, 'autoSize': false, 'width': 730, 'height': 460, href: './bancos/ver_banco/<?= sha1($row['id_banco']); ?>'});">
                                <td class="first style2"><?= strtoupper($row['nombre_banco']); ?></td>
                                <td class="first style2 separador" ><?= strtoupper($row['n_cuenta']); ?></td>
                                <td class="first style2 separador" style="text-align: center"><?= $row['t_de_cuenta']; ?></td>                                
                                <td class="last style2 separador"><?= $row['moneda']; ?></td>  
                                <td class="first style2 separador" style="text-align: right"><?= number_format($row['saldo'], 2, ',', '.'); ?></td>                                
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
                <br/>
                <p>&nbsp;</p>
                <br/>
                <div style="width: 242px; ">
                    <table style="width: 242px; ">
                        <tbody><tr>
                            <td><b>Total en VEF</b></td>
                            <td><?= number_format($saldo_total_vef, 2, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td><b>Total en USD</b></td>
                            <td><?= number_format($saldo_total_usd, 2, ',', '.'); ?></td>
                        </tr>
                    </tbody></table>
                </div>
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