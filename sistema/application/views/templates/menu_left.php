<?
$rol = rol_usuario();
?>
<div id="container">
    <aside id="sidebar" >
        <nav id="nav" class="menu_left ">
            <ul class="li_menu_left menu collapsible shadow-bottom">
                <li onclick="location.href = './';" class="title_menu_left"> 
                    <a href="#" class="non-active-icon" style="color: white;"><img style="float: left;"  src="images/icon_menu/home.png">Menu Principal<span class="arrow"></span></a>
                </li>

                <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
                    <li class="ul_left" style="<?= $menu == 'ingresos' ? 'background:#B8B8B8;' : '' ?>">
                        <a class="<?= $menu == 'ingresos' ? 'active-icon active !important' : 'non-active-icon' ?>" href="javascript:void(0);"><img  style="float: left;" src="images/icon_menu/ingresos.png">Ingresos<span class="arrow"></span></a>
                        <ul style="display: <?= $menu == 'ingresos' ? 'block !important' : 'none' ?>;" class="sub">
                            <li style="<?= $sub_menu == 'depositos' ? 'background:#284860; !important' : '' ?>;"><a href="./ingresos/depositos">Registrar Ingresos</a></li>
                            <li style="<?= $sub_menu == 'ingresos_actuales' ? 'background:#284860; !important' : '' ?>;"><a href="./ingresos/ingresos_actuales">Consultar Ingresos</a></li>
                        </ul>
                    </li>
                <? } ?>
                    
                <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
                    <li class="ul_left" style="<?= $menu == 'egresos' ? 'background:#B8B8B8;' : '' ?>">
                        <a class="<?= $menu == 'egresos' ? 'active-icon active !important' : 'non-active-icon' ?>" href="javascript:void(0);"><img  style="float: left;" src="images/icon_menu/egresos.png">Egresos<span class="arrow"></span></a>
                        <ul style="display: <?= $menu == 'egresos' ? 'block !important' : 'none' ?>;" class="sub">
                            <li style="<?= $sub_menu == 'crear_instruccion' ? 'background:#284860; !important' : '' ?>;"><a href="./egresos/crear_instruccion">Instruccion de pago</a></li>
                            <li style="<?= $sub_menu == 'pagos_procesar' ? 'background:#284860; !important' : '' ?>;"><a href="./egresos/pagos_procesar">Procesar Pagos</a></li>
                            <li style="<?= $sub_menu == 'egresos_actuales' ? 'background:#284860; !important' : '' ?>;"><a href="./egresos/egresos_actuales">Consultar Pagos</a></li>
                        </ul>
                    </li>
                <? } ?>
                    
                <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
                    <li class="ul_left" style="<?= $menu == 'bancos' ? 'background:#B8B8B8;' : '' ?>">
                        <a class="<?= $menu == 'bancos' ? 'active-icon active !important' : 'non-active-icon' ?>" href="javascript:void(0);"><img  style="float: left;" src="images/icon_menu/bancos.png">Bancos<span class="arrow"></span></a>
                        <ul style="display: <?= $menu == 'bancos' ? 'block !important' : 'none' ?>;" class="sub">
                            <li style="<?= $sub_menu == 'crear_banco' ? 'background:#284860; !important' : '' ?>;"><a href="./bancos/crear_banco">Agregar Banco</a></li>
                            <li style="<?= $sub_menu == 'listar_bancos' ? 'background:#284860; !important' : '' ?>;"><a href="./bancos/listar_bancos">Listar Bancos</a></li>
                            <li style="<?= $sub_menu == 'registrar_traspaso' ? 'background:#284860; !important' : '' ?>;"><a href="./bancos/registrar_traspaso">Registrar Traspaso</a></li>
                            <li style="<?= $sub_menu == 'consulta_movimientos' ? 'background:#284860; !important' : '' ?>;"><a href="./bancos/consulta_movimientos">Consultar Movimientos</a></li>
                            <!--<li style="<?= $sub_menu == 'conciliar' ? 'background:#284860; !important' : '' ?>;"><a href="./bancos/conciliar_banco">Conciliar Bancos</a></li>-->
                        </ul>
                    </li>
                <? } ?>
                    
                <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2) { ?>
                    <li class="ul_left" style="<?= $menu == 'contrapartes' ? 'background:#B8B8B8;' : '' ?>">
                        <a class="<?= $menu == 'contrapartes' ? 'active-icon active !important' : 'non-active-icon' ?>" href="javascript:void(0);"><img  style="float: left;" src="images/icon_menu/contrapartes.png">Contrapartes<span class="arrow"></span></a>
                        <ul style="display: <?= $menu == 'contrapartes' ? 'block !important' : 'none' ?>;" class="sub">
                            <li style="<?= $sub_menu == 'agregar_contraparte' ? 'background:#284860; !important' : '' ?>;"><a href="./contrapartes/crear_contraparte">Agregar Contraparte</a></li>
                            <li style="<?= $sub_menu == 'listar_contrapartes' ? 'background:#284860; !important' : '' ?>;"><a href="./contrapartes/listar_contrapartes">Listar Contrapartes</a></li>
                        </ul>
                    </li>
                <? } ?>
                    
                <? if ($rol == 10 or $rol == 0 or $rol == 1 or $rol == 2 or $rol == 50) { ?>
                    <li class="ul_left" style="<?= $menu == 'reportes' ? 'background:#B8B8B8;' : '' ?>">
                        <a class="<?= $menu == 'reportes' ? 'active-icon active !important' : 'non-active-icon' ?>" href="javascript:void(0);"><img  style="float: left;" src="images/icon_menu/reportes.png">Reportes<span class="arrow"></span></a>
                        <ul style="display: <?= $menu == 'reportes' ? 'block !important' : 'none' ?>;" class="sub">

                            <li style="<?= $sub_menu == 'reporte_movimientos' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/movimientos_bancarios">Movimientos Bancarios</a></li>

                            <li class="ul_left">
                                <a href="javascript:void(0);">Egresos<span class="arrow"></span></a>
                                <ul style="display: <?= $sub_menu == 'reporte_egresos' ? 'block !important' : 'none' ?>;" class="sub">
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'egreso_por_fecha' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/egresos/por_fecha">Por Fecha</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'egreso_por_beneficiario' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/egresos/por_beneficiario">Por Beneficiario</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'egreso_por_moneda' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/egresos/por_moneda">Por Moneda</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'egreso_por_banco' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/egresos/por_banco">Por Banco</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'egreso_por_instrumento' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/egresos/por_instrumento">Por Instrumento</a></li>
                                </ul>                      
                            </li>

                            <li class="ul_left">
                                <a href="javascript:void(0);">Ingresos<span class="arrow"></span></a>
                                <ul style="display: <?= $sub_menu == 'reporte_ingresos' ? 'block !important' : 'none' ?>;" class="sub">
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'ingreso_por_fecha' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/ingresos/por_fecha">Por Fecha</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'ingreso_por_deudor' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/ingresos/por_beneficiario">Por deudor</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'ingreso_por_moneda' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/ingresos/por_moneda">Por Moneda</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'ingreso_por_banco' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/ingresos/por_banco">Por Banco</a></li>
                                    <li class="sub_menu_interno" style="<?= $sub_menu_interno == 'ingreso_por_instrumento' ? 'background:#284860; !important' : '' ?>;"><a href="./reportes/ingresos/por_instrumento">Por Instrumento</a></li>
                                </ul>                      
                            </li>

                        </ul>
                    </li>
                <? } ?>

                <? if ($rol == 10 || $rol == 0) { ?>
                    <li class="ul_left" style="<?= $menu == 'usuarios' ? 'background:#B8B8B8;' : '' ?>">
                        <a class="<?= $menu == 'usuarios' ? 'active-icon active !important' : 'non-active-icon' ?>" href="javascript:void(0);"><img  style="float: left;" src="images/icon_menu/usuarios.png">Usuarios<span class="arrow"></span></a>
                        <ul style="display: <?= $menu == 'usuarios' ? 'block !important' : 'none' ?>;" class="sub">
                            <li style="<?= $sub_menu == 'crear_usuario' ? 'background:#284860; !important' : '' ?>;"><a href="./usuarios/crear_usuario">Agregar Usuario</a></li>
                            <li style="<?= $sub_menu == 'listar_usuarios' ? 'background:#284860; !important' : '' ?>;"><a href="./usuarios/listar_usuarios">Listar Usuarios</a></li>
                        </ul>
                    </li>
                <? } ?>

                <li class="ul_left" onclick="location.href = '#';">
                    <a class="non-active-icon" href="./usuarios/logout"><img  style="float: left;" src="images/icon_menu/logout.png">Cerrar Sesion<span class="arrow"></span></a>
                </li>


            </ul>
        </nav>
    </aside>
</div>

<script>

</script>
