<?
$rol = rol_usuario();
?>
<div id="header">
    <a href="http://www.webresourcesdepot.com/wp-content/uploads/file/admin-template/index.html" class="logo">
        <img src="images/logo_portada.png" alt="">
    </a> 
    <ul id="top-navigation">
        <li class="<?= $menu_top == 'index' ? 'active' : '' ?>" ><span><span><a href="#">Principal </a></span></span></li>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
            <li class="<?= $menu_top == 'proveedores' ? 'active' : '' ?>" ><span><span><a href="./proveedores/panel_proveedores/main">Beneficiarios</a></span></span></li>
        <? } ?>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
            <li class="<?= $menu_top == 'bancos' ? 'active' : '' ?>" ><span><span><a href="./bancos/panel_bancos/main">Bancos</a></span></span></li>
        <? } ?>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
            <li class="<?= $menu_top == 'traspasos' ? 'active' : '' ?>" ><span><span><a href="./traspasos/panel_traspaso/main">Traspaso entre Cuentas</a></span></span></li>
        <? } ?>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
            <li class="<?= $menu_top == 'instruccion' ? 'active' : '' ?>" ><span><span><a href="./instruccion_pago/panel_instrucciones/main">Instrucciones de Pago</a></span></span></li>
        <? } ?>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
            <li class="<?= $menu_top == 'pagos_procesar' ? 'active' : '' ?>" ><span><span><a href="./pagos_procesar/panel_pagos_procesar/main">Pagos por Procesar</a></span></span></li>
        <? } ?>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
            <li class="<?= $menu_top == 'pagos_procesados' ? 'active' : '' ?>" ><span><span><a href="./pagos_procesados/panel_pagos_procesados/main">Pagos Procesados</a></span></span></li>
        <? } ?>
        <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2 or $rol == 50) { ?>
            <li class="<?= $menu_top == 'reportes' ? 'active' : '' ?>" ><span><span><a href="./reportes/reporte/">Reportes</a></span></span></li>
        <? } ?>
        <? if ($rol == 10) { ?>
            <li class="<?= $menu_top == 'usuarios' ? 'active' : '' ?>" ><span><span><a href="./usuarios/panel_usuarios">Usuarios </a></span></span></li>
        <? } ?>
        <li><span><span><a href="./usuarios/logout">Cerrar Sesion </a></span></span></li>
    </ul>
</div>