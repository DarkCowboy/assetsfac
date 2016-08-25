<? $this->load->view('templates/head'); ?>
<link rel="stylesheet" type="text/css" href="css/tabla_planilla.css" />
<style>
    body{
        font-family: Arial Unicode MS;
    }
    .contenido_td{
        font-size: 12px !important; 
        text-align: center !important; 
    }
    .tab-content{
        min-height: 317px !important;
    }
</style>
<body id="top">

    <!-- Begin of #container -->
    <div id="container">
        <!-- Begin of #header -->
        <div id="header-surround">
            <? $this->load->view('templates/header') ?>    
        </div> <!--! end of #header -->

        <div class="fix-shadow-bottom-height"></div>

        <? $this->load->view('templates/aside_bar') ?>

        <!-- Begin of #main -->
        <div id="main" role="main">
            <!-- Begin of titlebar/breadcrumbs -->
            <div id="title-bar">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
                    <li class="no-hover">Datos del Cliente (<?= strtoupper($data_pn['nom_apell_pn']); ?>)</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content" style="display: none;">
                <? if ($enviado == true) { ?>
                    <div class="grid_12" style="width: 99%;" onclick="$(this).remove();">
                        <div class="alert success">Se ha Enviado Correctamente el <strong>Pagare</strong> al Cliente.</div>
                    </div>
                <? } else if ($pausado == true) { ?>
                    <div class="grid_12" style="width: 99%;" onclick="$(this).remove();">
                        <div class="alert success">Se ha Pausado Correctamente la operacion.</div>
                    </div>
                <? } ?>
                <div class="container_12"> 


                    <div class="grid_6" style="width: 100%;">
                        <div class="block-border" id="tab-panel-1">
                            <div class="block-header">
                                <h1><?= ucwords(strtoupper($data_pn['nom_apell_pn'])); ?></h1>
                                <ul class="tabs">
                                    <li><a href="#tab-1">Datos del Cliente</a></li>
                                    <li><a href="#tab-2">Ficha de Inscripcion</a></li>
                                    <li><a href="#tab-5">Pagares</a></li>
                                    <!--                                    <li><a href="#tab-6">Prestamos Comerciales</a></li>-->
                                </ul>
                            </div>
                            <div class="block-content tab-container">
                                <!-- Datos del Cliente -->
                                <div id="tab-1" class="tab-content" style="min-height: 100px;">
                                    <p><h4 style="display: inline;">Nombre:  </h4> <?= ucwords(strtoupper($data_pn['nom_apell_pn'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?
                                        if (strstr(strtolower($data_pn['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA') {
                                            echo 'N&deg; de Cedula';
                                        } else {
                                            echo 'N&deg; de Pasaporte';
                                        }
                                        ?>  
                                    </h4> 
                                    <?= $data_pn['cedula_pn']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_pn['direccion_pn']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_pn['telefono_pn']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_pn['email_pn']; ?></p>

                                    <div>
                                        <a target="_blank" href="../panel_public/welcome/panel_cliente_admin/<?= $data_pn['id_cliente']; ?>/">Panel del Cliente</a>
                                    </div>

                                    <hr>
                                    &nbsp;
                                    <hr>

                                    <div class="contenido" style="width: 100%;max-width:none;">
                                        <div style="width: 100%;">
                                            <table style="width: 100%; font-size: 11px; line-height: 18px;">
                                                <tr style="text-align: center; background: #9C9C8B; color: white; font-weight: bold;">
                                                    <td class="contenido_td" style="width: 7px;">Operc</td>
                                                    <td class="contenido_td" style="width: 7px;">Tipo</td>
                                                    <td class="contenido_td" style="width: 7px;">Nominal</td>
                                                    <td class="contenido_td" style="width: 7px;">F. Liqui.</td>
                                                    <td class="contenido_td" style="width: 7px;">F. Vto.</td>
                                                    <td class="contenido_td" style="width: 7px;">Plazo</td>
                                                    <td class="contenido_td" style="width: 7px;">Precio</td>
                                                    <td class="contenido_td" style="width: 7px;">Pagado</td>
                                                    <td class="contenido_td" style="width: 7px;">Dif.</td>
                                                    <td class="contenido_td" style="width: 7px;">Mora/dias</td>
                                                    <!--<td class="contenido_td" style="width: 7px;">Mora/BsF.</td>-->
                                                    <td class="contenido_td" style="width: 7px;">Dif. Act.</td>
                                                    <td class="contenido_td" style="width: 7px;">Total</td>
                                                    <td class="contenido_td" style="width: 7px;">Status</td>
                                                </tr>
                                                <?
                                                $tot_nom = 0;
                                                $tot_pag = 0;
                                                $tot_dif = 0;
                                                $tot_mora_bs = 0;
                                                $tot_dif_act = 0;
                                                $tot_tot = 0;
                                                ?>
                                                <? foreach ($operaciones as $row) { ?>
                                                    <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                                        <?
                                                        $pagado = $row['monto_solicitud_aprobado'] * ($row['porcentaje_compra'] / 100);
                                                        $dif = $row['monto_solicitud_aprobado'] - $pagado;
                                                        $plazo_act = diferenciaEntreFechas(date('Y-m-d'), $row['fecha_solicitud_aprobado']);
                                                        $rendimiento = number_format(((100 / $row['porcentaje_compra'] - 1) * (360 / $row['plazo_solicitud_aprobado'])) * 100, 2, '.', '');
                                                        $precio = (100 / (100 + (($rendimiento * $plazo_act) / 360)));
                                                        $monto = ($row['monto_solicitud_aprobado'] * $precio);
                                                        $dif_act = $row['monto_solicitud_aprobado'] - $monto;
                                                        $tot = $dif_act + $pagado;
                                                        $tot_nom = $tot_nom + $row['monto_solicitud_aprobado'];
                                                        $tot_pag = $tot_pag + $row['monto_solicitud_aprobado'];
                                                        $tot_mora_bs = $tot_mora_bs + $row['mora_monto'];
                                                        $tot_dif = $tot_dif + $dif;
                                                        $tot_dif_act = $tot_dif_act + $dif_act;
                                                        $tot_tot = $tot_tot + $tot;
                                                        ?>
                                                        <tr>
                                                            <td class="contenido_td"><?= $row['n_operacion']; ?></td>
                                                            <td class="contenido_td"><?
                                                                if ($row['tipo_solicitud'] == 2) {
                                                                    echo 'Venta';
                                                                } else if ($row['tipo_solicitud'] == 3) {
                                                                    echo 'Pagare';
                                                                } else {
                                                                    echo 'Prestamo';
                                                                }
                                                                ?></td>

                                                            <td class="contenido_numero"><?= number_format($row['monto_solicitud_aprobado'], '2', ',', '.'); ?></td>
                                                            <td class="contenido_td"><?= date("d", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_solicitud_aprobado'])); ?></td>
                                                            <td class="contenido_td"><?= date("d", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("m", strtotime($row['fecha_vcto_solicitud_aprobado'])) . '/' . date("Y", strtotime($row['fecha_vcto_solicitud_aprobado'])); ?></td>
                                                            <td class="contenido_td"><?= $row['plazo_solicitud_aprobado']; ?></td>
                                                            <td class="contenido_td"><?= $row['porcentaje_compra']; ?>%</td>
                                                            <td class="contenido_numero"><?= number_format($pagado, '2', ',', '.'); ?></td>
                                                            <td class="contenido_numero"><?= number_format($dif, '2', ',', '.'); ?></td>
                                                            <td class="contenido_td"><?= $row['mora_dias']; ?></td>
                                                            <!--<td class="contenido_numero"><?= $row['mora_monto'] ? number_format($row['mora_monto'], '2', ',', '.') : '0'; ?></td>-->
                                                            <td class="contenido_numero"><?= number_format($dif_act, '2', ',', '.'); ?></td>
                                                            <td class="contenido_numero"><?= number_format($tot, '2', ',', '.'); ?></td>
                                                            <td class="contenido_td">
                                                                <?
                                                                if ($row['pause']) {
                                                                    echo 'Pausada';
                                                                } else {
                                                                    if ($row['status'] == '2') {
                                                                        echo 'Vigente';
                                                                    } else {
                                                                        echo 'Vencido';
                                                                    }
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <? } ?>
                                                <? } ?>
                                            </table> 

                                        </div>

                                    </div>
                                </div>
                                <!-- Ficha de Inscripcion -->
                                <div id="tab-2" class="tab-content" style="min-height: 100px;">

                                    <p><h4 style="display: inline;">Nombre:  </h4> <?= ucwords(strtoupper($data_pn['nom_apell_pn'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?
                                        if (strstr(strtolower($data_pn['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA') {
                                            echo 'N&deg; de Cedula';
                                        } else {
                                            echo 'N&deg; de Pasaporte';
                                        }
                                        ?>  
                                    </h4> 
                                    <?= $data_pn['cedula_pn']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_pn['direccion_pn']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_pn['telefono_pn']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_pn['email_pn']; ?></p>
                                    <hr>
                                    <div class="contenido">
                                        <table class="tabla" style="margin-top: 12px;">
                                            <tr>
                                                <td class="titulo_tabla">Ficha de Inscripcion</td>
                                            </tr>
                                            <tr>
                                                <td class="contenido_td">
                                                    <a href="./clientes/descarga_ficha_pn/<?= $data_pn['id_cliente'] ?>">
                                                        <img src="images/general/descargar.png">
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>

                                </div>
                                <!-- pagares -->
                                <div id="tab-5" class="tab-content" style="min-height: 100px;">
                                    <script>
                                        function closeFancyboxAndRedirectToUrl(url) {
                                            redirect = '<?= base_url(); ?>' + url;
                                            $.fancybox.close();
                                            window.location = redirect;
                                        }
                                    </script>
                                    <p><h4 style="display: inline;">Nombre:  </h4> <?= ucwords(strtoupper($data_pn['nom_apell_pn'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?
                                        if (strstr(strtolower($data_pn['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA') {
                                            echo 'N&deg; de Cedula';
                                        } else {
                                            echo 'N&deg; de Pasaporte';
                                        }
                                        ?>  
                                    </h4> 
                                    <?= $data_pn['cedula_pn']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_pn['direccion_pn']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_pn['telefono_pn']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_pn['email_pn']; ?></p>
                                    <hr>
                                    <div class="contenido" style="max-width: 100%">

                                        <table class="tabla">
                                            <tr>
                                                <td class="titulo_tabla" colspan="8" style="height: 36px;">SOLICITUDES DE PAGARES</td>
                                            </tr>
                                            <tr style="font-size: 10px; height: 31px;">
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 8.5%; border-right: solid 1px #666; text-align: center;">ESTATUS</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 14.5%; border-right: solid 1px #666; text-align: center;">FECHA DE LA SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 7.5%; border-right: solid 1px #666; text-align: center;">MONTO SOLIC.</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 20.5%; border-right: solid 1px #666; text-align: center;">DATOS DE APROBACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">OPERACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">PAGARE</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 15.5%;">ACCIONES</td>
                                            </tr>
                                            <?
                                            $class = 0;
                                            foreach (array_reverse($data_pagares) as $row) {
                                                ?>
                                                <?
                                                if ($row['pause']) {
                                                    $status = 'Operacion Pausada';
                                                    $imagen = 'pause.png';
                                                    $row['fecha_solicitud_aprobado'] = fecha($row['fecha_solicitud_aprobado']);
                                                    $row['fecha_vcto_solicitud_aprobado'] = fecha($row['fecha_vcto_solicitud_aprobado']);
                                                } else {
                                                    switch ($row['status']) {
                                                        case 0:
                                                            $status = 'Esperando ser Procesada';
                                                            $imagen = 'espera.png';
                                                            $row['fecha_solicitud_aprobado'] = 'En espera';
                                                            $row['fecha_vcto_solicitud_aprobado'] = 'En espera';
                                                            break;
                                                        case 1:
                                                            $status = 'Procesada en espera';
                                                            $imagen = 'proceso.png';
                                                            $row['fecha_solicitud_aprobado'] = 'En espera';
                                                            $row['fecha_vcto_solicitud_aprobado'] = 'En espera';
                                                            break;
                                                        case 2:
                                                            $status = 'Vigente';
                                                            $imagen = 'ic_ok.png';
                                                            $row['fecha_solicitud_aprobado'] = fecha($row['fecha_solicitud_aprobado']);
                                                            $row['fecha_vcto_solicitud_aprobado'] = fecha($row['fecha_vcto_solicitud_aprobado']);
                                                            break;
                                                        case 3:
                                                            $status = 'Rechazada';
                                                            $imagen = 'rechazada.png';
                                                            break;
                                                        case 4:
                                                            $status = 'Eliminada';
                                                            break;
                                                        case 5:
                                                            $status = 'Pagare Finalizado';
                                                            $imagen = 'ic_folder.png';
                                                            break;
                                                        case 6:
                                                            $status = 'Pagare Vencido';
                                                            $imagen = 'ic_folder.png';
                                                            break;
                                                        case 7:
                                                            $status = 'Aprobada en espera de activacion';
                                                            $imagen = 'proceso.png';
                                                            $row['fecha_solicitud_aprobado'] = 'En espera';
                                                            $row['fecha_vcto_solicitud_aprobado'] = 'En espera';
                                                            break;
                                                    }
                                                }
                                                ?>
                                                <tr <?= $class == 0 ? '' : 'style="background:lightcyan;"'; ?>>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;"><?php echo fecha($row['fecha_solicitud']); ?></td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;"><?php echo number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?></td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                            <p>Numero de Operacion: <?= $row['n_operacion']; ?></p>
                                                            <p>Fecha de Aprobacion: <?= $row['fecha_solicitud_aprobado']; ?></p>
                                                            <p>Fecha de Vencimiento: <?= $row['fecha_vcto_solicitud_aprobado']; ?></p>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <div>
                                                            <a href="./clientes/planilla_solicitud_pagare_pn/<?= $row['id_solicitud']; ?>">
                                                                <img src="images/general/descargar.png" />
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 1 or $row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6 or $row['status'] == 7) { ?>
                                                            <div>
                                                                <a href="./clientes/planilla_operacion_pagare_pn/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6 or $row['status'] == 7) { ?>
                                                            <? if ($row['id_codeudor']) { ?>
                                                                <div>
                                                                    <a href="./clientes/descargar_pagare_pn/<?= $row['id_cliente']; ?>/<?= $row['id_solicitud']; ?>">
                                                                        <img src="images/general/descargar.png" />
                                                                    </a>
                                                                </div>
                                                            <? } else { ?>
                                                                <div class="" title="Agregar Codeudor"  onclick="$.fancybox({type: 'iframe', href: './clientes/agregar_codeudor/<?= $row['id_cliente']; ?>/<?= $row['id_solicitud']; ?>'});" style="color: #2d5672; cursor: pointer;">Agregar Codeudor</div>
                                                            <? } ?>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td">
                                                        <? if ($row['status'] == 0) { ?>
                                                            <div class="procesar" title="Procesar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_pagare_pn/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 1) { ?>
                                                            <div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 409, 'autoSize': false, href: './clientes/aceptar_solicitud_pagare_pn/<?= $row['id_solicitud']; ?>'});"></div>
                                                            <div class="rechazar delete" href="clientes/rechazar/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>
                                                            <div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_pagare_pn/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 7) { ?>
                                                            <div class="aceptar activar_operacion" style="float: left; margin: 0 42px; cursor: pointer;" title="Activar Solicitud" fecha_activacion ="<?= date('Y-m-d'); ?>" href= "clientes/activar_solicitud/<?= $row['id_solicitud']; ?>/<?= date('Y-m-d'); ?>" ></div>
                                                            <div title="Enviar Pagare" style="display: inline-block; float: left; width: 34px; height: 34px; ">
                                                                <a href="./clientes/email_pagare_pn/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>"><img src="images/enviar.gif" /></a>
                                                            </div>
                                                        <? } ?>    

                                                        <? if ($row['status'] == 1) { ?>
                        <!--<div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 370, 'autoSize': false, href: './clientes/aceptar_solicitud_pagare_pn///<?= $row['id_solicitud']; ?>'});"></div>-->
                        <!--<div class="rechazar delete" href="clientes/rechazar///<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>-->
                        <!--<div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_pagare_pn///<?= $row['id_solicitud']; ?>'});"></div>-->
                                                        <? } ?>

                                                        <? if ($row['status'] == 3) { ?>
                                                            <div class="eliminar" title="Eliminar operacion"  id="<?= $row['id_solicitud']; ?>"></div>
                                                        <? } ?>    
                                                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                                            <? if ($row['id_codeudor']) { ?>
                                                                <a href="./clientes/email_pagare_pn/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>"><div class="enviar Enviar_Operaciones" style="margin-bottom: 10px;" title="Enviar Pagare"></div></a><br/>
                                                                <? if($row['pause']){ ?>
                                                                    <!--<a href="./pausa_operacion/reanudar/<?= $row['id_solicitud']; ?>"><div class="reanudar reanudar_Operaciones" style="margin-bottom: 10px;" title="Reanudar Operacion">Reanudar</div></a><br/>-->
                                                                <? }else{ ?>
                                                                    <!--<a href="./pausa_operacion/<?= $row['id_solicitud']; ?>"><div class="pausar pausar_Operaciones" style="margin-bottom: 10px;" title="Pausar Operacion">Pause</div></a><br/>-->
                                                                <?}?>
                                                                <div onclick="$.fancybox({type: 'iframe', 'height': 390, 'autoSize': false, href: './comprobar_pago/<?= $row['id_solicitud']. '/' . $row['id_cliente']; ?>'});" class="fin " style="margin-bottom: 10px;" title="Finalizar Operacion"></div><br/>
                                                            <? } ?>    
                                                        <? } ?>    
                                                    </td>
                                                </tr>
                                                <?
                                                if ($class == '0') {
                                                    $class = '1';
                                                } else {
                                                    $class = '0';
                                                }
                                            }
                                            ?>
                                        </table>
                                    </div>

                                </div>
                                <!-- prestamo -->
                                <!--                                <div id="tab-6" class="tab-content" style="min-height: 100px;">
                                                                    <script>
                                                                        function closeFancyboxAndRedirectToUrl(url){
                                                                            redirect = '<?= base_url(); ?>'+url;
                                                                            $.fancybox.close();
                                                                            window.location = redirect;
                                                                        }    
                                                                    </script>
                                                                    <p><h4 style="display: inline;">Nombre:  </h4> <?= ucwords(strtoupper($data_pn['nom_apell_pn'])); ?></p>
                                                                    <p>
                                                                    <h4 style="display: inline;">
                                <?
                                if (strstr(strtolower($data_pn['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA') {
                                    echo 'N&deg; de Cedula';
                                } else {
                                    echo 'N&deg; de Pasaporte';
                                }
                                ?>  
                                                                    </h4> 
                                <?= $data_pn['cedula_pn']; ?>
                                                                    </p>
                                                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_pn['direccion_pn']; ?></p>
                                                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_pn['telefono_pn']; ?></p>
                                                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_pn['email_pn']; ?></p>
                                                                    <hr>
                                                                    <div class="contenido" style="max-width: 100%">
                                
                                                                        <table class="tabla">
                                                                            <tr>
                                                                                <td class="titulo_tabla" colspan="8" style="height: 36px;">SOLICITUDES DE PRESTAMOS</td>
                                                                            </tr>
                                                                            <tr style="font-size: 10px; height: 31px;">
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 8.5%; border-right: solid 1px #666; text-align: center;">ESTATUS</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 14.5%; border-right: solid 1px #666; text-align: center;">FECHA DE LA SOLICITUD</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 7.5%; border-right: solid 1px #666; text-align: center;">MONTO SOLIC.</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 20.5%; border-right: solid 1px #666; text-align: center;">DATOS DE APROBACION</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">SOLICITUD</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">OPERACION</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">DOC. PRESTAMO</td>
                                                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 15.5%;">ACCIONES</td>
                                                                            </tr>
                                <?
                                $class = 0;
                                foreach (array_reverse($data_prestamo) as $row) {
                                    ?>
                                    <?
                                    switch ($row['status']) {
                                        case 0:
                                            $status = 'Esperando ser Procesada';
                                            $imagen = 'espera.png';
                                            $row['fecha_solicitud_aprobado'] = 'En espera';
                                            $row['fecha_vcto_solicitud_aprobado'] = 'En espera';
                                            break;
                                        case 1:
                                            $status = 'Procesada en espera';
                                            $imagen = 'proceso.png';
                                            $row['fecha_solicitud_aprobado'] = 'En espera';
                                            $row['fecha_vcto_solicitud_aprobado'] = 'En espera';
                                            break;
                                        case 2:
                                            $status = 'Vigente';
                                            $imagen = 'ic_ok.png';
                                            $row['fecha_solicitud_aprobado'] = fecha($row['fecha_solicitud_aprobado']);
                                            $row['fecha_vcto_solicitud_aprobado'] = fecha($row['fecha_vcto_solicitud_aprobado']);
                                            break;
                                        case 3:
                                            $status = 'Rechazada';
                                            $imagen = 'rechazada.png';
                                            break;
                                        case 4:
                                            $status = 'Eliminada';
                                            break;
                                        case 5:
                                            $status = 'Prestamo Finalizado';
                                            $imagen = 'ic_folder.png';
                                            break;
                                        case 6:
                                            $status = 'Prestamo Vencido';
                                            $imagen = 'ic_folder.png';
                                            break;
                                    }
                                    ?>
                                                                                                    <tr <?= $class == 0 ? '' : 'style="background:lightcyan;"'; ?>>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                                                                                            <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?>
                                                                                                        </td>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;"><?php echo fecha($row['fecha_solicitud']); ?></td>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;"><?php echo number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?></td>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                    <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                                                                                                    <p>Numero de Operacion: <?= $row['n_operacion']; ?></p>
                                                                                                                                    <p>Fecha de Aprobacion: <?= $row['fecha_solicitud_aprobado']; ?></p>
                                                                                                                                    <p>Fecha de Vencimiento: <?= $row['fecha_vcto_solicitud_aprobado']; ?></p>
                                    <? } ?>
                                                                                                        </td>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                                                                                            <div>
                                                                                                                <a href="./clientes/planilla_solicitud_prestamo_pn/<?= $row['id_solicitud']; ?>">
                                                                                                                    <img src="images/general/descargar.png" />
                                                                                                                </a>
                                                                                                            </div>
                                                                                                        </td>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                    <? if ($row['status'] == 1 or $row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                                                                                                    <div>
                                                                                                                                        <a href="./clientes/planilla_operacion_prestamo_pn/<?= $row['id_solicitud']; ?>">
                                                                                                                                            <img src="images/general/descargar.png" />
                                                                                                                                        </a>
                                                                                                                                    </div>
                                    <? } ?>
                                                                                                        </td>
                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                    <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                                                                                                    <div>
                                                                                                                                        <a href="./clientes/descargar_prestamo_pn/<?= $row['id_cliente']; ?>/<?= $row['id_solicitud']; ?>">
                                                                                                                                            <img src="images/general/descargar.png" />
                                                                                                                                        </a>
                                                                                                                                    </div>
                                    <? } ?>
                                                                                                        </td>
                                                                                                        <td class="contenido_td">
                                    <? if ($row['status'] == 0) { ?>
                                                                                                                                    <div class="procesar" title="Procesar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_prestamo_pn/<?= $row['id_solicitud']; ?>'});"></div>
                                    <? } ?>
                                                    
                                    <? if ($row['status'] == 1) { ?>
                                                                                                                                    <div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 370,'autoSize': false, href: './clientes/aceptar_solicitud_prestamo_pn/<?= $row['id_solicitud']; ?>'});"></div>
                                                                                                                                    <div class="rechazar delete" href="clientes/rechazar/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>
                                                                                                                                    <div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_prestamo_pn/<?= $row['id_solicitud']; ?>'});"></div>
                                    <? } ?>
                                                    
                                    <? if ($row['status'] == 3) { ?>
                                                                                                                                    <div class="eliminar" title="Eliminar operacion"  id="<?= $row['id_solicitud']; ?>"></div>
                                    <? } ?>    
                                    <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                                                                                                                    <div class="fin cerrar_operacion" style="margin-bottom: 10px;;" href="clientes/cierra_operacion/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Finalizar Operacion"></div><br/>
                                                                                                                                    <a href="./clientes/email_prestamo_pn/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>">Enviar Doc. Prestamo</a>
                                    <? } ?>    
                                                                                                        </td>
                                                                                                    </tr>
                                    <?
                                    if ($class == '0') {
                                        $class = '1';
                                    } else {
                                        $class = '0';
                                    }
                                }// debug($data_cupos);
                                ?>
                                                                        </table>
                                                                    </div>
                                
                                                                </div>-->
                            </div>
                        </div>
                    </div>
                    <div class="clear height-fix"></div>
                </div>

            </div> <!--! end of #main-content -->
            <div id="cargando" style="width: 100%">
                <div style="margin: 0px auto; width: 130px; display: block; overflow: hidden;">
                    <img src="images/general/cargando2.gif">
                </div>
            </div>
        </div> <!--! end of #main -->

    </div> 
    <? $this->load->view('templates/foot'); ?>
</body>
</html>