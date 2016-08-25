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
    $(document).ready(function () {
        $('#tableasd').dataTable();
    });
</script>
<body>
    <div id="main">       
        <? $this->load->view('templates/menu_left'); ?>
        <div id="middle">
            <div style="padding: 15px;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Cheques por imprimir</h1>
                </div><br>
                <table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
                    <thead>
                        <tr>
                            <th class="first" width="177">Beneficiario</th>
                            <th class="first" width="177">Detalle de Pago</th>
                            <th class="first" width="177">Banco</th>
                            <th class="first" width="77">Monto</th>
                            <th class="last" width="200">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($instrucciones as $row) { ?> 
                            <tr>
                                <td class="first style2"><?= strtoupper($row['nombre_proveedor']); ?></td>
                                <td class="first style2 separador" style="text-align: center"><?= ucwords($row['detalles_concepto']); ?></td>
                                <td class="first style2 separador" style="text-align: center"><?= ucwords($row['nombre_banco']); ?></td>
                                <td class="first style2 separador" style="text-align: right"><?= number_format($row['monto_real_pagado'], 2, ',', '.'); ?></td>                                
                                <td class="last style2 separador" style="text-align: center">
                                    <img title="Ver Instruccion" alt="Ver Instruccion" src="images/general/ver.png" width="30" style="cursor:pointer; width: 30px; margin: 0 3px;" onclick="$.fancybox({type: 'iframe', 'padding': 0, 'autoSize': false, 'width': 730, 'height': 460,  href: './egresos/ver_operacion/<?= sha1($row['id_instruccion']); ?>'});" />
                                    <img title="Generar cheque" alt="Generar cheque" src="images/general/cheque_icon.png" width="30" style="cursor:pointer; width: 30px; margin: 0 3px;" onclick="$.fancybox({type: 'iframe', 'padding': 0, 'autoSize': false, 'width': 730, 'height': 460, showCloseButton: false, 'closeBtn': false, href: './egresos/genera_cheque/<?= sha1($row['id_instruccion']); ?>'});" /></td>  
                            </tr>
                        <? } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <? $this->load->view('templates/footer') ?>
        <script>
            function closeFancyboxAndRedirectToUrl(url) {
                $.fancybox.close();
                console.debug('aqui');
                redirect = '<?= base_url(); ?>' + url;
                $.fancybox.close();
                window.location = redirect;
            }
            function closeFancy() {
                $.fancybox.close();
            }
        </script>
    </div>
</body></html>