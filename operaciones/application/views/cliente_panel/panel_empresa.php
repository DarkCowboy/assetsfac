<? $this->load->view('templates/head'); ?>
<link rel="stylesheet" type="text/css" href="css/tabla_planilla.css" />
<link rel="stylesheet" type="text/css" href="css/tabla_panel_cliente.css" />
<style>
    .contenido_numero {
        font-size: 12px !important; 
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
        <? // debug($operaciones)?>
        <!-- Begin of #main -->
        <div id="main" role="main">
            <!-- Begin of titlebar/breadcrumbs -->
            <div id="title-bar">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
                    <li class="no-hover">Datos del Cliente (<?= strtoupper($data_empresa['nom_rz_pj']); ?>)</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content" style="display: none;">
                <? if ($enviado == true) { ?>
                    <div class="grid_12" style="width: 99%;" onclick="$(this).remove();">
                        <div class="alert success">Se ha Enviado Correctamente el documento al Cliente.</div>
                    </div>
                <? } ?>

                <div class="container_12">


                    <div class="grid_6" style="width: 100%;">
                        <div class="block-border" id="tab-panel-1">
                            <div class="block-header">
                                <h1 style="padding: 8px 0 0 12px; font-size: 12px;"><?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></h1>
                                <ul class="tabs">
                                    <li><a href="#tab-1">Datos del Cliente</a></li>
                                    <li><a href="#tab-2">Ficha de Inscripcion</a></li>
                                    <li><a href="#tab-7">Reclasificacion</a></li>
                                    <li><a href="#tab-3">Cupos</a></li>
                                    <li><a href="#tab-4">Venta de Facturas</a></li>
                                    <li><a href="#tab-5">Pagares</a></li>
                                    <!--<li><a href="#tab-8">Prestamos Comerciales</a></li>-->
                                </ul>
                            </div>
                            <div class="block-content tab-container">
                                <!-- Datos del Cliente -->
                                <div id="tab-1" class="tab-content" style="min-height: 100px;">
                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>

                                    <div>
                                        <a target="_blank" href="../panel_public/welcome/panel_cliente_admin/<?= $data_empresa['id_cliente']; ?>/">Panel del Cliente</a>
                                    </div>
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
                                                            <td class="contenido_td"><?= number_format($row['plazo_solicitud_aprobado'], '0', ',', '.'); ?></td>
                                                            <td class="contenido_td"><?= number_format($row['porcentaje_compra'], 2, ',', '.'); ?>%</td>
                                                            <td class="contenido_numero"><?= number_format($pagado, '2', ',', '.'); ?></td>
                                                            <td class="contenido_numero"><?= number_format($dif, '2', ',', '.'); ?></td>
                                                            <td class="contenido_td"><?= $row['mora_dias']; ?></td>
                                                            <!--<td class="contenido_numero"><?= $row['mora_monto'] ? number_format($row['mora_monto'], '2', ',', '.') : '0'; ?></td>-->
                                                            <td class="contenido_numero"><?= number_format($dif_act, '2', ',', '.'); ?></td>
                                                            <td class="contenido_numero"><?= number_format($tot, '2', ',', '.'); ?></td>
                                                            <td class="contenido_td"><?= $row['status'] == '2' ? 'Vigente' : 'Vencido'; ?></td>
                                                        </tr>
                                                    <? } ?>
                                                <? } ?>
                                            </table> 

                                        </div>

                                    </div>

                                </div>
                                <!-- Ficha de Inscripcion -->
                                <link rel="stylesheet" type="text/css" href="css/style_ficha_pj.css" />
                                <div id="tab-2" class="tab-content" style="min-height: 100px;">

                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>
                                    <hr>
                                    <div class="contenido">

                                        <table class="tabla" style="margin-top: 12px;">
                                            <tr>
                                                <td class="titulo_tabla">Ficha de Inscripcion</td>
                                                <td class="titulo_tabla" style="border-left: 1px solid #9C9C9C;">Fichas de Personas Naturales</td>
                                            </tr>
                                            <tr>
                                                <td class="contenido_td">
                                                    <a href="./clientes/descarga_ficha_pj/<?= $data_empresa['id_cliente'] ?>">
                                                        <img src="images/general/descargar.png">
                                                    </a>
                                                </td>
                                                <td class="contenido_td" style="border-left: 1px solid #9C9C9C;">
                                                    <? foreach ($data_empresa['junta_directiva'] as $row) { ?>
                                                        <a href="./clientes/descarga_ficha_pn_pj/<?= $row['id_jun_directiva'] ?>">
                                                            <br/><img src="images/general/descargar.png"><br/>
                                                            <?= strtoupper($row['nombres_dir'] . ' ' . $row['apellidos_dir']) ?>
                                                            <br/><br/>
                                                        </a>
                                                    <? } ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- Cupos -->
                                <div id="tab-3" class="tab-content" style="min-height: 100px;">

                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>
                                    <hr>
                                    <div class="contenido" style="max-width: 100%">

                                        <table class="tabla">
                                            <tr>
                                                <td class="titulo_tabla" colspan="8" style="height: 36px;">SOLICITUDES DE CUPOS</td>
                                            </tr>
                                            <tr style="font-size: 10px; height: 31px;">
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 8.5%; border-right: solid 1px #666; text-align: center;">ESTATUS</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 14.5%; border-right: solid 1px #666; text-align: center;">FECHA DE LA SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 7.5%; border-right: solid 1px #666; text-align: center;">MONTO SOLIC.</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 20.5%; border-right: solid 1px #666; text-align: center;">DATOS DE APROBACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">OPERACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">CONTRATO</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 15.5%;">ACCIONES</td>
                                            </tr>
                                            <?
                                            $class = 0;
                                            foreach (array_reverse($data_cupos) as $row) {
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
                                                        $status = 'Cupo Finalizado';
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
                                                        <? if ($row['status'] == 2 or $row['status'] == 5) { ?>
                                                            <p>Numero de Operacion: <?= $row['n_operacion']; ?></p>
                                                            <p>Fecha de Aprobacion: <?= $row['fecha_solicitud_aprobado']; ?></p>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <div>
                                                            <a href="./clientes/planilla_solicitud_cupo/<?= $row['id_solicitud']; ?>">
                                                                <img src="images/general/descargar.png" />
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 1 or $row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                            <div>
                                                                <a href="./clientes/planilla_operacion_cupo/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                            <div>
                                                                <a href="./clientes/descargar_contrato/<?= $row['id_pj']; ?>/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td">
                                                        <? if ($row['status'] == 0) { ?>
                                                            <div class="procesar" title="Procesar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_cupo/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 1) { ?>
                                                            <div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 370, 'autoSize': false, href: './clientes/aceptar_solicitud/<?= $row['id_solicitud']; ?>'});"></div>
                                                            <div class="rechazar delete" href="clientes/rechazar/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>
                                                            <div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_cupo/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 3 or $row['status'] == 0) { ?>
                                                            <div class="eliminar" title="Eliminar operacion"  id="<?= $row['id_solicitud']; ?>"></div>
                                                        <? } ?>  

                                                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                                            <div class="fin cerrar_operacion" style="margin-bottom: 10px;;" href="clientes/cierra_operacion/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Finalizar Operacion"></div><br/>
                                                            <a href="./clientes/email_contrato/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>">
                                                                Enviar Contrato
                                                            </a>
                                                            </div>
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
                                </div>
                                <!-- venta de facturas -->
                                <div id="tab-4" class="tab-content" style="min-height: 100px;">

                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>
                                    <hr>
                                    <div class="contenido" style="max-width: 100%">

                                        <table class="tabla">
                                            <tr>
                                                <td class="titulo_tabla" colspan="8" style="height: 36px;">SOLICITUDES DE VENTA</td>
                                            </tr>
                                            <tr style="font-size: 10px; height: 31px;">
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 8.5%; border-right: solid 1px #666; text-align: center;">ESTATUS</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 14.5%; border-right: solid 1px #666; text-align: center;">FECHA DE LA SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 7.5%; border-right: solid 1px #666; text-align: center;">MONTO SOLIC.</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 21.5%; border-right: solid 1px #666; text-align: center;">DATOS DE APROBACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5%; border-right: solid 1px #666; text-align: center;">SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5%; border-right: solid 1px #666; text-align: center;">OPERACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5%; border-right: solid 1px #666; text-align: center;">CONVENIO Y PAGARE</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 15%; text-align: center;">ACCIONES</td>
                                            </tr>
                                            <?
                                            $class = 0;
                                            foreach (array_reverse($data_ventas) as $row) {
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
                                                        $status = 'Cancelada';
                                                        $imagen = 'ic_folder.png';
                                                        break;
                                                    case 6:
                                                        $status = 'Vencida';
                                                        $imagen = 'alerta.png';
                                                        break;
                                                    case 7:
                                                        $status = 'Aprobada en espera de activacion';
                                                        $imagen = 'proceso.png';
                                                        $row['fecha_solicitud_aprobado'] = 'En espera';
                                                        $row['fecha_vcto_solicitud_aprobado'] = 'En espera';
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
                                                            <a href="./clientes/solicitud_de_venta_planilla/<?= $row['id_solicitud']; ?>">
                                                                <img src="images/general/descargar.png" />
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 1 or $row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6 or $row['status'] == 7) { ?>
                                                            <div>
                                                                <a href="./clientes/planilla_operacion_venta/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6 or $row['status'] == 7) { ?>

                                                            <div>
                                                                <a href="./clientes/descargar_giro/<?= $row['id_pj']; ?>/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>

                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td">
                                                        <? if ($row['status'] == 0) { ?>
                                                            <div class="procesar" title="Procesar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_cupo/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 1) { ?>
                                                            <div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 600, 'width':790, 'autoSize': false, href: './clientes/aceptar_solicitud_v/<?= $row['id_solicitud']; ?>'});"></div>
                                                            <div class="rechazar delete" href="clientes/rechazar/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>
                                                            <div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_cupo/<?= $row['id_solicitud']; ?>'});"></div>
                                                            <div class="editar_f" title="Editar Facturas"  onclick="$.fancybox({type: 'iframe', href: './clientes/editar_facturas/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 3 or $row['status'] == 0) { ?>
                                                            <div class="eliminar" title="Eliminar operacion"  id="<?= $row['id_solicitud']; ?>"></div>
                                                        <? } ?>    
                                                        <? if ($row['status'] == 7) { ?>
                                                            <div class="aceptar activar_operacion" style="float: left; margin: 0 42px; cursor: pointer;" title="Activar Solicitud" fecha_activacion ="<?= date('Y-m-d'); ?>" href= "clientes/activar_solicitud/<?= $row['id_solicitud']; ?>/<?= date('Y-m-d'); ?>" ></div>
                                                            <div title="Enviar Pagare" style="display: inline-block; float: left; width: 34px; height: 34px; ">
                                                                <a href="./clientes/email_convenio/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>"><img src="images/enviar.gif" /></a>
                                                            </div>
                                                        <? } ?>
                                                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>

                                                            <div class="fin cerrar_operacion" style="margin-bottom: 10px;;" href="clientes/cierra_operacion/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Finalizar Operacion"></div><br/>
                                                            <a href="./clientes/email_convenio/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>">Enviar Convenio</a>

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
                                </div>
                                <!-- pagares -->
                                <div id="tab-5" class="tab-content" style="min-height: 100px;">

                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>
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
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 20.5%; border-right: solid 1px #666; text-align: center;">FECHA DE ACTIVACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">SOLICITUD</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">OPERACION</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 5.5%; border-right: solid 1px #666; text-align: center;">PAGARE</td>
                                                <td class="sub_titulo_tabla" style="font-size: 11px; width: 15.5%; text-align: center;">ACCIONES</td>
                                            </tr>
                                            <?
                                            $class = 0;
                                            foreach (array_reverse($data_pagares) as $row) {
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
                                                ?>
                                                <tr <?= $class == 0 ? '' : 'style="background:lightcyan;"'; ?>>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;"><?php echo fecha($row['fecha_solicitud']); ?></td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;"><?php echo number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?></td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 2 or $row['status'] == 5) { ?>
                                                            <p>Numero de Operacion: <?= $row['n_operacion']; ?></p>
                                                            <p>Fecha de Aprobacion: <?= $row['fecha_solicitud_aprobado']; ?></p>
                                                            <p>Fecha de Vencimiento: <?= $row['fecha_vcto_solicitud_aprobado']; ?></p>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <div>
                                                            <a href="./clientes/planilla_solicitud_pagare/<?= $row['id_solicitud']; ?>">
                                                                <img src="images/general/descargar.png" />
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 1 or $row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6 or $row['status'] == 7) { ?>
                                                            <div>
                                                                <a href="./clientes/planilla_operacion_pagare/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td" style="border-right: solid 1px #666;">
                                                        <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6 or $row['status'] == 7) { ?>
                                                            <div>
                                                                <a href="./clientes/descargar_pagare/<?= $row['id_pj']; ?>/<?= $row['id_solicitud']; ?>">
                                                                    <img src="images/general/descargar.png" />
                                                                </a>
                                                            </div>
                                                        <? } ?>
                                                    </td>
                                                    <td class="contenido_td">
                                                        <? if ($row['status'] == 0) { ?>
                                                            <div class="procesar" title="Procesar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_pagare/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 1) { ?>
                                                            <div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 409, 'autoSize': false, href: './clientes/aceptar_solicitud_pagare/<?= $row['id_solicitud']; ?>'});"></div>
                                                            <div class="rechazar delete" href="clientes/rechazar/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>
                                                            <div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_pagare/<?= $row['id_solicitud']; ?>'});"></div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 7) { ?>
                                                            <div class="aceptar activar_operacion" style="float: left; margin: 0 42px; cursor: pointer;" title="Activar Solicitud" fecha_activacion ="<?= date('Y-m-d'); ?>" href= "clientes/activar_solicitud/<?= $row['id_solicitud']; ?>/<?= date('Y-m-d'); ?>" ></div>
                                                            <div title="Enviar Pagare" style="display: inline-block; float: left; width: 34px; height: 34px; ">
                                                                <a href="./clientes/email_pagare_pj/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>"><img src="images/enviar.gif" /></a>
                                                            </div>
                                                        <? } ?>

                                                        <? if ($row['status'] == 3 or $row['status'] == 0) { ?>
                                                            <div class="eliminar" title="Eliminar operacion"  id="<?= $row['id_solicitud']; ?>"></div>
                                                        <? } ?>    
                                                        <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                                            <div class="fin cerrar_operacion" style="float: left; margin: 0 42px;" style="margin-bottom: 10px;;" href="clientes/cierra_operacion/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Finalizar Operacion"></div><br/>
                                                            <div title="Enviar Pagare" style="display: inline-block; float: left; width: 34px; height: 34px; background: url('../images/enviar.gif') no-repeat;">
                                                                <a href="./clientes/email_pagare_pj/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>"><img src="images/enviar.gif" /></a>
                                                            </div>
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

                                </div>


                                <!-- Prestamo -->
                                <!--                                <div id="tab-8" class="tab-content" style="min-height: 100px;">
                                
                                                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                                                    <p>
                                                                    <h4 style="display: inline;">
                                <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                                                    </p>
                                                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>
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
                                    <? if ($row['status'] == 2 or $row['status'] == 5) { ?>
                                                                                                                                                                                                    <p>Numero de Operacion: <?= $row['n_operacion']; ?></p>
                                                                                                                                                                                                    <p>Fecha de Aprobacion: <?= $row['fecha_solicitud_aprobado']; ?></p>
                                                                                                                                                                                                    <p>Fecha de Vencimiento: <?= $row['fecha_vcto_solicitud_aprobado']; ?></p>
                                    <? } ?>
                                                                                                                                        </td>
                                                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                                                                                                                            <div>
                                                                                                                                                <a href="./clientes/planilla_solicitud_prestamo/<?= $row['id_solicitud']; ?>">
                                                                                                                                                    <img src="images/general/descargar.png" />
                                                                                                                                                </a>
                                                                                                                                            </div>
                                                                                                                                        </td>
                                                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                    <? if ($row['status'] == 1 or $row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                                                                                                                                                                    <div>
                                                                                                                                                                                                        <a href="./clientes/planilla_operacion_prestamo/<?= $row['id_solicitud']; ?>">
                                                                                                                                                                                                            <img src="images/general/descargar.png" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                    </div>
                                    <? } ?>
                                                                                                                                        </td>
                                                                                                                                        <td class="contenido_td" style="border-right: solid 1px #666;">
                                    <? if ($row['status'] == 2 or $row['status'] == 5 or $row['status'] == 6) { ?>
                                                                                                                                                                                                    <div>
                                                                                                                                                                                                        <a href="./clientes/descargar_prestamo/<?= $row['id_pj']; ?>/<?= $row['id_solicitud']; ?>">
                                                                                                                                                                                                            <img src="images/general/descargar.png" />
                                                                                                                                                                                                        </a>
                                                                                                                                                                                                    </div>
                                    <? } ?>
                                                                                                                                        </td>
                                                                                                                                        <td class="contenido_td">
                                    <? if ($row['status'] == 0) { ?>
                                                                                                                                                                                                    <div class="procesar" title="Procesar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_prestamo/<?= $row['id_solicitud']; ?>'});"></div>
                                    <? } ?>
                                                                                    
                                    <? if ($row['status'] == 1) { ?>
                                                                                                                                                                                                    <div class="aceptar" title="Aceptar Solicitud" onclick="$.fancybox({type: 'iframe', 'height': 370, 'autoSize': false, href: './clientes/aceptar_solicitud_prestamo/<?= $row['id_solicitud']; ?>'});"></div>
                                                                                                                                                                                                    <div class="rechazar delete" href="clientes/rechazar/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Rechazar Solicitud"></div>
                                                                                                                                                                                                    <div class="editar" title="Editar operacion"  onclick="$.fancybox({type: 'iframe', href: './clientes/procesar_cupo/<?= $row['id_solicitud']; ?>'});"></div>
                                    <? } ?>
                                                                                    
                                    <? if ($row['status'] == 3 or $row['status'] == 0) { ?>
                                                                                                                                                                                                    <div class="eliminar" title="Eliminar operacion"  id="<?= $row['id_solicitud']; ?>"></div>
                                    <? } ?>    
                                    <? if ($row['status'] == 2 or $row['status'] == 6) { ?>
                                                                                                                                                                                                    <div class="fin cerrar_operacion" style="margin-bottom: 10px;;" href="clientes/cierra_operacion/<?= $row['id_solicitud']; ?>/<?= $row['id_cliente']; ?>" title="Finalizar Operacion"></div><br/>
                                                                                                                                        
                                                                                                                                                                                                    <a href="./clientes/email_prestamo_pj/<?= $row['id_solicitud'] . '/' . $row['id_cliente']; ?>">Enviar Prestamo</a>
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
                                
                                                                </div>-->

                                <!-- Reclasificacion -->
                                <div id="tab-7" class="tab-content" style="min-height: 100px;">


                                    <p><h4 style="display: inline;">Nombre o Razon social:  </h4> <?= ucwords(strtoupper($data_empresa['nom_rz_pj'])); ?></p>
                                    <p>
                                    <h4 style="display: inline;">
                                        <?= $data_empresa['nacionalidad_emp'] == 'p' ? 'RUC:' : 'RIF:'; ?>
                                    </h4> <?= $data_empresa['rif_pj']; ?>
                                    </p>
                                    <p><h4 style="display: inline;">Direccion:  </h4> <?= $data_empresa['direccion_pj']; ?></p>
                                    <p><h4 style="display: inline;">Telefonos:  </h4> <?= $data_empresa['telefono_pj']; ?></p>
                                    <p><h4 style="display: inline;">Email:  </h4> <?= $data_empresa['email_pj']; ?></p>

                                    <hr>
                                    <a href="./clientes/descargar_reclasificacion/<?= $data_empresa['id_pj']; ?>" style="margin-left: 45%;"><img src="images/general/descargar.png"></a>
                                    <hr>

                                    <link href="style/style.css" rel="stylesheet" type="text/css" />
                                    <script type="text/javascript">
                                        document.onkeypress = KeyPressed;
                                        function KeyPressed(e)
                                        {
                                            return ((window.event) ? event.keyCode : e.keyCode) != 13;
                                        }
                                    </script>
                                    <script src="js/Jquery/jquery-1.4.2.js" language="javascript" type="text/javascript"></script>
                                    <script src="js/AppFunctions.js" language="javascript" type="text/javascript"></script>
                                    <script type="text/javascript" src="js/jquery.numberformatter-1.2.3.min.js"></script>

                                    <div id="contenedor">
                                        <form method="POST" name="reclasifi" action="<?php echo "reclasificacion/guardar_p_e/" . $data_empresa['id_pj'] . "/" . $data_empresa['id_cliente']; ?>">

                                            <table class="MainTable" border="0" cellpadding="0" cellspacing="0">
                                                <tr class="TrProperty">
                                                    <td  colspan="9" align="center" class="MainSubTitulos2">
                                                        RECLASIFICACION
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td colspan="9">
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  colspan="4" class="MainSubTitulos2" style="width: 50%;">
                                                        ACTIVOS CIRCULANTES
                                                        <input type="hidden" name="hd_id_act_circ" id="hd_id_act_circ" value="<?= $reclasifi['hd_id_act_circ']; ?>" />                        
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td colspan="4" class="MainSubTitulos2" style="width: 50%;">
                                                        FLUJO DE FONDOS (En Bs.)
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input type="text" name="fecha1" size="10" id="dateField1" style="text-align: center;" class="dateparse" value="<?= $reclasifi['fecha1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input type="text" name="fecha2" size="10" id="dateField2" style="text-align: center;" class="dateparse" value="<?= $reclasifi['fecha2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input type="text" name="fecha3" size="10" id="dateField3" style="text-align: center;" class="dateparse" value="<?= $reclasifi['fecha3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td colspan="4"></td>                    
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td class="SubTitulos1">                       
                                                        Caja Chica:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcajachica" type="text" class="planill_datos numeric" id="txtcajachica" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtcajachica'] == '' ? '0' : (int) $reclasifi['txtcajachica']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcajachica2" type="text" class="planill_datos numeric" id="txtcajachica2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcajachica2'] == '' ? '0' : (int) $reclasifi['txtcajachica2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcajachica3" type="text" class="planill_datos numeric" id="txtcajachica3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcajachica3'] == '' ? '0' : (int) $reclasifi['txtcajachica3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos3">                        
                                                        Beneficio Neto Despu&eacute;s de No Usuales:
                                                    </td>
                                                    <td class="SubTitulos3"></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtFFBenefNetoDespNoUsu" type="text" class="planill_datos" id="txtFFBenefNetoDespNoUsu"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtFFBenefNetoDespNoUsu'] == '' ? '0' : $reclasifi['txtFFBenefNetoDespNoUsu']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtFFBenefNetoDespNoUsu1" type="text" class="planill_datos" id="txtFFBenefNetoDespNoUsu1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtFFBenefNetoDespNoUsu1'] == '' ? '0' : $reclasifi['txtFFBenefNetoDespNoUsu1']; ?>" />                       
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Caja y Bancos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcajabancos" type="text" class="planill_datos" id="txtcajabancos"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcajabancos'] == '' ? '0' : (int) $reclasifi['txtcajabancos']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcajabancos2" type="text" class="planill_datos" id="txtcajabancos2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcajabancos2'] == '' ? '0' : (int) $reclasifi['txtcajabancos2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcajabancos3" type="text" class="planill_datos" id="txtcajabancos3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcajabancos3'] == '' ? '0' : (int) $reclasifi['txtcajabancos3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Depreciaci&oacute;n:
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td class="TdField">
                                                        <input name="txtDepreciacion0" type="text" class="planill_datos" id="txtDepreciacion0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtDepreciacion0'] == '' ? '0' : $reclasifi['txtDepreciacion0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtDepreciacion1" type="text" class="planill_datos" id="txtDepreciacion1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtDepreciacion1'] == '' ? '0' : $reclasifi['txtDepreciacion1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                         
                                                        Cuentas Por Cobrar:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctascobrar" type="text" class="planill_datos" id="txtctascobrar"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtctascobrar'] == '' ? '0' : (int) $reclasifi['txtctascobrar']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctascobrar2" type="text" class="planill_datos" id="txtctascobrar2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtctascobrar2'] == '' ? '0' : (int) $reclasifi['txtctascobrar2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctascobrar3" type="text" class="planill_datos" id="txtctascobrar3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtctascobrar3'] == '' ? '0' : (int) $reclasifi['txtctascobrar3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Provisi&oacute;n para Impuesto:
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtProvImp0" type="text" class="planill_datos" id="txtProvImp0" size="10"
                                                               maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtProvImp0'] == '' ? '0' : $reclasifi['txtProvImp0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtProvImp1" type="text" class="planill_datos" id="txtProvImp1" size="10"
                                                               maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtProvImp1'] == '' ? '0' : $reclasifi['txtProvImp1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Efectos Por Cobrar:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtefeccobrar" type="text" class="planill_datos" id="txtefeccobrar"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtefeccobrar'] == '' ? '0' : (int) $reclasifi['txtefeccobrar']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtefeccobrar2" type="text" class="planill_datos" id="txtefeccobrar2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtefeccobrar2'] == '' ? '0' : (int) $reclasifi['txtefeccobrar2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtefeccobrar3" type="text" class="planill_datos" id="txtefeccobrar3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtefeccobrar3'] == '' ? '0' : (int) $reclasifi['txtefeccobrar3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Provisi&oacute;n de Cuentas Incobrables:
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td class="TdField">
                                                        <input name="txtProvCtasInco0" type="text" class="planill_datos" id="txtProvCtasInco0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtProvCtasInco0'] == '' ? '0' : $reclasifi['txtProvCtasInco0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtProvCtasInco1" type="text" class="planill_datos" id="txtProvCtasInco1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtProvCtasInco1'] == '' ? '0' : $reclasifi['txtProvCtasInco1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        - Provisi&oacute;n de Cuentas Incobrables:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtincobrables" type="text" class="planill_datos" id="txtincobrables"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtincobrables'] == '' ? '0' : (int) $reclasifi['txtincobrables']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtincobrables2" type="text" class="planill_datos" id="txtincobrables2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtincobrables2'] == '' ? '0' : (int) $reclasifi['txtincobrables2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtincobrables3" type="text" class="planill_datos" id="txtincobrables3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtincobrables3'] == '' ? '0' : (int) $reclasifi['txtincobrables3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Provisi&oacute;n de Obsolescencia:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtProvObsolencia0" type="text" class="planill_datos" id="txtProvObsolencia0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtProvObsolencia0'] == '' ? '0' : $reclasifi['txtProvObsolencia0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtProvObsolencia1" type="text" class="planill_datos" id="txtProvObsolencia1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtProvObsolencia1'] == '' ? '0' : $reclasifi['txtProvObsolencia1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Inventario de Materia Prima:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvmateriaprima" type="text" class="planill_datos" id="txtinvmateriaprima"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtinvmateriaprima'] == '' ? '0' : (int) $reclasifi['txtinvmateriaprima']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvmateriaprima2" type="text" class="planill_datos" id="txtinvmateriaprima2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtinvmateriaprima2'] == '' ? '0' : (int) $reclasifi['txtinvmateriaprima2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvmateriaprima3" type="text" class="planill_datos" id="txtinvmateriaprima3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtinvmateriaprima3'] == '' ? '0' : (int) $reclasifi['txtinvmateriaprima3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos3">                        
                                                        Generaci&oacute;n o Absorci&oacute;n Por Operaciones:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsobOper0" type="text" class="planill_datos" id="txtGenerAbsobOper0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsobOper0'] == '' ? '0' : $reclasifi['txtGenerAbsobOper0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsobOper1" type="text" class="planill_datos" id="txtGenerAbsobOper1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsobOper1'] == '' ? '0' : $reclasifi['txtGenerAbsobOper1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Inventario de Materiales en Proceso:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvmaterialproc" type="text" class="planill_datos" id="txtinvmaterialproc"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinvmaterialproc'] == '' ? '0' : (int) $reclasifi['txtinvmaterialproc']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvmaterialproc2" type="text" class="planill_datos" id="txtinvmaterialproc2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinvmaterialproc2'] == '' ? '0' : (int) $reclasifi['txtinvmaterialproc2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvmaterialproc3" type="text" class="planill_datos" id="txtinvmaterialproc3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinvmaterialproc3'] == '' ? '0' : (int) $reclasifi['txtinvmaterialproc3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Cobrar:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasCobrar0" type="text" class="planill_datos" id="txtCtasCobrar0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasCobrar0'] == '' ? '0' : $reclasifi['txtCtasCobrar0']; ?>" /></td>
                                                    <td class="TdField">

                                                        <input name="txtCtasCobrar1" type="text" class="planill_datos" id="txtCtasCobrar1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasCobrar1'] == '' ? '0' : $reclasifi['txtCtasCobrar1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">
                                                        Inventario de Productos Terminados:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvprodterminado" type="text" class="planill_datos" id="txtinvprodterminado"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinvprodterminado'] == '' ? '0' : (int) $reclasifi['txtinvprodterminado']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvprodterminado2" type="text" class="planill_datos" id="txtinvprodterminado2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinvprodterminado2'] == '' ? '0' : (int) $reclasifi['txtinvprodterminado2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinvprodterminado3" type="text" class="planill_datos" id="txtinvprodterminado3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinvprodterminado3'] == '' ? '0' : (int) $reclasifi['txtinvprodterminado3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                                            
                                                        Efectos por Cobrar:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEfecCobrar0" type="text" class="planill_datos" id="txtEfecCobrar0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecCobrar0'] == '' ? '0' : $reclasifi['txtEfecCobrar0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtEfecCobrar1" type="text" class="planill_datos" id="txtEfecCobrar1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecCobrar1'] == '' ? '0' : $reclasifi['txtEfecCobrar1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">
                                                        - Provisi&oacute;n de Obsolescencia:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtobsolencia" type="text" class="planill_datos" id="txtobsolencia"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtobsolencia'] == '' ? '0' : (int) $reclasifi['txtobsolencia']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtobsolencia2" type="text" class="planill_datos" id="txtobsolencia2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtobsolencia2'] == '' ? '0' : (int) $reclasifi['txtobsolencia2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtobsolencia3" type="text" class="planill_datos" id="txtobsolencia3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtobsolencia3'] == '' ? '0' : (int) $reclasifi['txtobsolencia3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                       
                                                        Inventarios:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtInventario0" type="text" class="planill_datos" id="txtInventario0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtInventario0'] == '' ? '0' : $reclasifi['txtInventario0']; ?>" /></td>
                                                    <td class="TdField">

                                                        <input name="txtInventario1" type="text" class="planill_datos" id="txtInventario1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtInventario1'] == '' ? '0' : $reclasifi['txtInventario1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td   class="SubTitulos3">                        
                                                        Total Activos Circulantes:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalActCirc" type="text" class="planill_datos" id="txtTotalActCirc"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalActCirc'] == '' ? '0' : (int) $reclasifi['txtTotalActCirc']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalActCirc2" type="text" class="planill_datos" id="txtTotalActCirc2"
                                                               size="10" maxlength="19" readonly="readonly" 
                                                               value="<?= $reclasifi['txtTotalActCirc2'] == '' ? '0' : (int) $reclasifi['txtTotalActCirc2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalActCirc3" type="text" class="planill_datos" id="txtTotalActCirc3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalActCirc3'] == '' ? '0' : (int) $reclasifi['txtTotalActCirc3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Pagar:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasPagar0" type="text" class="planill_datos" id="txtCtasPagar0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasPagar0'] == '' ? '0' : $reclasifi['txtCtasPagar0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtCtasPagar1" type="text" class="planill_datos" id="txtCtasPagar1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasPagar1'] == '' ? '0' : $reclasifi['txtCtasPagar1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td colspan="4" class="MainSubTitulos2">
                                                        ACTIVOS FIJOS
                                                        <input type="hidden" name="hd_id_act_fijo" id="hd_id_act_fijo" value="" />
                                                    </td>
                                                    <td width="10" >
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Efectos por Pagar:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEfecPagar0" type="text" class="planill_datos" id="txtEfecPagar0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecPagar0'] == '' ? '0' : $reclasifi['txtEfecPagar0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtEfecPagar1" type="text" class="planill_datos" id="txtEfecPagar1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecPagar1'] == '' ? '0' : $reclasifi['txtEfecPagar1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td class="SubTitulos1">                        
                                                        Terrenos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtterrenos" type="text" class="planill_datos" id="txtterrenos" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtterrenos'] == '' ? '0' : (int) $reclasifi['txtterrenos']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtterrenos2" type="text" class="planill_datos" id="txtterrenos2" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtterrenos2'] == '' ? '0' : (int) $reclasifi['txtterrenos2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtterrenos3" type="text" class="planill_datos" id="txtterrenos3" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtterrenos3'] == '' ? '0' : (int) $reclasifi['txtterrenos3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                       
                                                        Gastos Acumulados:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosAcum0" type="text" class="planill_datos" id="txtGastosAcum0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGastosAcum0'] == '' ? '0' : $reclasifi['txtGastosAcum0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtGastosAcum1" type="text" class="planill_datos" id="txtGastosAcum1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGastosAcum1'] == '' ? '0' : $reclasifi['txtGastosAcum1']; ?>" />

                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Edificios/Oficinas/Galpones:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtedif" type="text" class="planill_datos" id="txtedif" size="10" maxlength="19"
                                                               value="<?= $reclasifi['txtedif'] == '' ? '0' : (int) $reclasifi['txtedif']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtedif2" type="text" class="planill_datos" id="txtedif2" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtedif2'] == '' ? '0' : (int) $reclasifi['txtedif2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtedif3" type="text" class="planill_datos" id="txtedif3" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtedif3'] == '' ? '0' : (int) $reclasifi['txtedif3']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos3">                        
                                                        Generaci&oacute;n o Absorci&oacute;n Por Inversi&oacute;n de Trabajo:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorInvTrab0" type="text" class="planill_datos" id="txtGenerAbsorInvTrab0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorInvTrab0'] == '' ? '0' : $reclasifi['txtGenerAbsorInvTrab0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorInvTrab1" type="text" class="planill_datos" id="txtGenerAbsorInvTrab1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorInvTrab1'] == '' ? '0' : $reclasifi['txtGenerAbsorInvTrab1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Maquinarias y Equipos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtmaquinaria" type="text" class="planill_datos" id="txtmaquinaria"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtmaquinaria'] == '' ? '0' : (int) $reclasifi['txtmaquinaria']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtmaquinaria2" type="text" class="planill_datos" id="txtmaquinaria2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtmaquinaria2'] == '' ? '0' : (int) $reclasifi['txtmaquinaria2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtmaquinaria3" type="text" class="planill_datos" id="txtmaquinaria3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtmaquinaria3'] == '' ? '0' : (int) $reclasifi['txtmaquinaria3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos3">                        
                                                        Gastos e Inversi&oacute;n en Planta:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGastoInvPlanta0" type="text" class="planill_datos" id="txtGastoInvPlanta0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGastoInvPlanta0'] == '' ? '0' : $reclasifi['txtGastoInvPlanta0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGastoInvPlanta1" type="text" class="planill_datos" id="txtGastoInvPlanta1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGastoInvPlanta1'] == '' ? '0' : $reclasifi['txtGastoInvPlanta1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Instalaciones (Mejoras):
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinstmejoras" type="text" class="planill_datos" id="txtinstmejoras"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinstmejoras'] == '' ? '0' : (int) $reclasifi['txtinstmejoras']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinstmejoras2" type="text" class="planill_datos" id="txtinstmejoras2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinstmejoras2'] == '' ? '0' : (int) $reclasifi['txtinstmejoras2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtinstmejoras3" type="text" class="planill_datos" id="txtinstmejoras3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtinstmejoras3'] == '' ? '0' : (int) $reclasifi['txtinstmejoras3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td class="SubTitulos1">
                                                        Dep&oacute;sitos en Garant&iacute;a:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDepoGaran0" type="text" class="planill_datos" id="txtDepoGaran0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtDepoGaran0'] == '' ? '0' : $reclasifi['txtDepoGaran0']; ?>"></td>
                                                    <td class="TdField">
                                                        <input name="txtDepoGaran1" type="text" class="planill_datos" id="txtDepoGaran1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtDepoGaran1'] == '' ? '0' : $reclasifi['txtDepoGaran1']; ?>">
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Mobiliario y Equipos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtmobiliario" type="text" class="planill_datos" id="txtmobiliario"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtmobiliario'] == '' ? '0' : (int) $reclasifi['txtmobiliario']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtmobiliario2" type="text" class="planill_datos" id="txtmobiliario2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtmobiliario2'] == '' ? '0' : (int) $reclasifi['txtmobiliario2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtmobiliario3" type="text" class="planill_datos" id="txtmobiliario3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtmobiliario3'] == '' ? '0' : (int) $reclasifi['txtmobiliario3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                                                
                                                        Cargos Diferidos y Otros Activos:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">                        
                                                        <input name="txtCargoDifOtroAct0" type="text" class="planill_datos" id="txtCargoDifOtroAct0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCargoDifOtroAct0'] == '' ? '0' : $reclasifi['txtCargoDifOtroAct0']; ?>" /></td>
                                                    <td class="TdField">                        
                                                        <input name="txtCargoDifOtroAct1" type="text" class="planill_datos" id="txtCargoDifOtroAct1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCargoDifOtroAct1'] == '' ? '0' : $reclasifi['txtCargoDifOtroAct1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Repuestos, Accesorios y Herramientas:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRespAccHerra" type="text" class="planill_datos" id="txtRespAccHerra"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtRespAccHerra'] == '' ? '0' : (int) $reclasifi['txtRespAccHerra']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRespAccHerra2" type="text" class="planill_datos" id="txtRespAccHerra2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtRespAccHerra2'] == '' ? '0' : (int) $reclasifi['txtRespAccHerra2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRespAccHerra3" type="text" class="planill_datos" id="txtRespAccHerra3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtRespAccHerra3'] == '' ? '0' : (int) $reclasifi['txtRespAccHerra3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Credito Fiscal y Gastos Prepagados:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCredFiscalGastoPrep0" type="text" class="planill_datos" id="txtCredFiscalGastoPrep0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCredFiscalGastoPrep0'] == '' ? '0' : $reclasifi['txtCredFiscalGastoPrep0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtCredFiscalGastoPrep1" type="text" class="planill_datos" id="txtCredFiscalGastoPrep1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCredFiscalGastoPrep1'] == '' ? '0' : $reclasifi['txtCredFiscalGastoPrep1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Veh&iacute;culos y Equipos de Transporte:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtvehiculo" type="text" class="planill_datos" id="txtvehiculo" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtvehiculo'] == '' ? '0' : (int) $reclasifi['txtvehiculo']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtvehiculo2" type="text" class="planill_datos" id="txtvehiculo2" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtvehiculo2'] == '' ? '0' : (int) $reclasifi['txtvehiculo2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtvehiculo3" type="text" class="planill_datos" id="txtvehiculo3" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtvehiculo3'] == '' ? '0' : (int) $reclasifi['txtvehiculo3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Cobrar Accionistas, Relacionadas y Otras:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasCobrarAccRel0" type="text" class="planill_datos" id="txtCtasCobrarAccRel0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasCobrarAccRel0'] == '' ? '0' : $reclasifi['txtCtasCobrarAccRel0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtCtasCobrarAccRel1" type="text" class="planill_datos" id="txtCtasCobrarAccRel1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasCobrarAccRel1'] == '' ? '0' : $reclasifi['txtCtasCobrarAccRel1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        - Depreciaci&oacute;n Acumulada:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdepreciacion" type="text" class="planill_datos" id="txtdepreciacion"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtdepreciacion'] == '' ? '0' : (int) $reclasifi['txtdepreciacion']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdepreciacion2" type="text" class="planill_datos" id="txtdepreciacion2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtdepreciacion2'] == '' ? '0' : (int) $reclasifi['txtdepreciacion2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdepreciacion3" type="text" class="planill_datos" id="txtdepreciacion3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtdepreciacion3'] == '' ? '0' : (int) $reclasifi['txtdepreciacion3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Impuestos por Pagar y Retenciones:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtImpPagarReten0" type="text" class="planill_datos" id="txtImpPagarReten0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtImpPagarReten0'] == '' ? '0' : $reclasifi['txtImpPagarReten0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtImpPagarReten1" type="text" class="planill_datos" id="txtImpPagarReten1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtImpPagarReten1'] == '' ? '0' : $reclasifi['txtImpPagarReten1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Construcciones en Proceso:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtContrucEnProceso" type="text" class="planill_datos" id="txtContrucEnProceso"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtContrucEnProceso'] == '' ? '0' : (int) $reclasifi['txtContrucEnProceso']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtContrucEnProceso2" type="text" class="planill_datos" id="txtContrucEnProceso2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtContrucEnProceso2'] == '' ? '0' : (int) $reclasifi['txtContrucEnProceso2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtContrucEnProceso3" type="text" class="planill_datos" id="txtContrucEnProceso3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtContrucEnProceso3'] == '' ? '0' : (int) $reclasifi['txtContrucEnProceso3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Retenciones por Pagar:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRetenPagar0" type="text" class="planill_datos" id="txtRetenPagar0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtRetenPagar0'] == '' ? '0' : $reclasifi['txtRetenPagar0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtRetenPagar1" type="text" class="planill_datos" id="txtRetenPagar1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtRetenPagar1'] == '' ? '0' : $reclasifi['txtRetenPagar1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos3">                        
                                                        Total Activos Fijos:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalActFijo" type="text" class="planill_datos" id="txtTotalActFijo"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalActFijo'] == '' ? '0' : (int) $reclasifi['txtTotalActFijo']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalActFijo2" type="text" class="planill_datos" id="txtTotalActFijo2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalActFijo2'] == '' ? '0' : (int) $reclasifi['txtTotalActFijo2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalActFijo3" type="text" class="planill_datos" id="txtTotalActFijo3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalActFijo3'] == '' ? '0' : (int) $reclasifi['txtTotalActFijo3']; ?>" /></td>
                                                    <td  class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">                        
                                                        Prestaciones Sociales por Pagar:
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td class="TdField">
                                                        <input name="txtPrestSocialesPagar0" type="text" class="planill_datos" id="txtPrestSocialesPagar0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPrestSocialesPagar0'] == '' ? '0' : $reclasifi['txtPrestSocialesPagar0']; ?>" /></td>
                                                    <td class="TdField">

                                                        <input name="txtPrestSocialesPagar1" type="text" class="planill_datos" id="txtPrestSocialesPagar1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPrestSocialesPagar1'] == '' ? '0' : $reclasifi['txtPrestSocialesPagar1']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>

                                                </tr>

                                                <tr class="TrProperty">
                                                    <td colspan="4" class="MainSubTitulos2">
                                                        OTROS ACTIVOS
                                                        <input type="hidden" name="hd_id_otro_act" id="hd_id_otro_act" value="" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                       
                                                        Otros Pasivos Corrientes:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosPasivosCorr0" type="text" class="planill_datos" id="txtOtrosPasivosCorr0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtOtrosPasivosCorr0'] == '' ? '0' : $reclasifi['txtOtrosPasivosCorr0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosPasivosCorr1" type="text" class="planill_datos" id="txtOtrosPasivosCorr1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtOtrosPasivosCorr1'] == '' ? '0' : $reclasifi['txtOtrosPasivosCorr1']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td class="SubTitulos1">                        
                                                        Dep&oacute;sitos en Garant&iacute;:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdepgarantia" type="text" class="planill_datos" id="txtdepgarantia"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtdepgarantia'] == '' ? '0' : (int) $reclasifi['txtdepgarantia']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdepgarantia2" type="text" class="planill_datos" id="txtdepgarantia2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtdepgarantia2'] == '' ? '0' : (int) $reclasifi['txtdepgarantia2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdepgarantia3" type="text" class="planill_datos" id="txtdepgarantia3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtdepgarantia3'] == '' ? '0' : (int) $reclasifi['txtdepgarantia3']; ?>"  />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos3">                        
                                                        Generaci&oacute;n o Absorci&oacute;n por Otros Activos o Pasivos:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorbActPas0" type="text" class="planill_datos" id="txtGenerAbsorbActPas0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorbActPas0'] == '' ? '0' : $reclasifi['txtGenerAbsorbActPas0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorbActPas1" type="text" class="planill_datos" id="txtGenerAbsorbActPas1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorbActPas0'] == '' ? '0' : $reclasifi['txtGenerAbsorbActPas0']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                               
                                                        Cargos Diferidos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcargosdif" type="text" class="planill_datos" id="txtcargosdif" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtcargosdif'] == '' ? '0' : (int) $reclasifi['txtcargosdif']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcargosdif2" type="text" class="planill_datos" id="txtcargosdif2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcargosdif2'] == '' ? '0' : (int) $reclasifi['txtcargosdif2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcargosdif3" type="text" class="planill_datos" id="txtcargosdif3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcargosdif3'] == '' ? '0' : (int) $reclasifi['txtcargosdif3']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Inversiones:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtInversiones0" type="text" class="planill_datos" id="txtInversiones0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtInversiones0'] == '' ? '0' : $reclasifi['txtInversiones0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtInversiones1" type="text" class="planill_datos" id="txtInversiones1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtInversiones1'] == '' ? '0' : $reclasifi['txtInversiones1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Cr&eacute;dito Fiscal y Gastos Prepagados:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcredfiscal" type="text" class="planill_datos" id="txtcredfiscal"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcredfiscal'] == '' ? '0' : (int) $reclasifi['txtcredfiscal']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcredfiscal2" type="text" class="planill_datos" id="txtcredfiscal2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcredfiscal2'] == '' ? '0' : (int) $reclasifi['txtcredfiscal2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcredfiscal3" type="text" class="planill_datos" id="txtcredfiscal3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcredfiscal3'] == '' ? '0' : (int) $reclasifi['txtcredfiscal3']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Pago de dividendos (-) / Reposici&oacute;n de P&eacute;rdida (+):
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPagoDivRepoPerd0" type="text" class="planill_datos" id="txtPagoDivRepoPerd0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPagoDivRepoPerd0'] == '' ? '0' : $reclasifi['txtPagoDivRepoPerd0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtPagoDivRepoPerd1" type="text" class="planill_datos" id="txtPagoDivRepoPerd1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPagoDivRepoPerd1'] == '' ? '0' : $reclasifi['txtPagoDivRepoPerd1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Cobrar Accionistas, Relacionadas y Otras:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctascobraracc" type="text" class="planill_datos" id="txtctascobraracc"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtctascobraracc'] == '' ? '0' : (int) $reclasifi['txtctascobraracc']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctascobraracc2" type="text" class="planill_datos" id="txtctascobraracc2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtctascobraracc2'] == '' ? '0' : (int) $reclasifi['txtctascobraracc2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctascobraracc3" type="text" class="planill_datos" id="txtctascobraracc3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtctascobraracc3'] == '' ? '0' : (int) $reclasifi['txtctascobraracc3']; ?>"  />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos3">                        
                                                        Generaci&oacute;n o Absorci&oacute;n por Inversiones y Dividendos:
                                                    </td>
                                                    <td  class="SubTitulos3"></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorbInvDiv0" type="text" class="planill_datos" id="txtGenerAbsorbInvDiv0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorbInvDiv0'] == '' ? '0' : $reclasifi['txtGenerAbsorbInvDiv0']; ?>" /></td>
                                                    <td class="SubTitulos3"><input name="txtGenerAbsorbInvDiv1" type="text" class="planill_datos" id="txtGenerAbsorbInvDiv1"
                                                                                   size="10" maxlength="19" readonly="readonly"  
                                                                                   value="<?= $reclasifi['txtGenerAbsorbInvDiv1'] == '' ? '0' : $reclasifi['txtGenerAbsorbInvDiv1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Otros Activos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtotrosact" type="text" class="planill_datos" id="txtotrosact" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtotrosact'] == '' ? '0' : (int) $reclasifi['txtotrosact']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtotrosact2" type="text" class="planill_datos" id="txtotrosact2" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtotrosact2'] == '' ? '0' : (int) $reclasifi['txtotrosact2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtotrosact3" type="text" class="planill_datos" id="txtotrosact3" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtotrosact3'] == '' ? '0' : (int) $reclasifi['txtotrosact3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos3">                        
                                                        Generaci&oacute;n o Absorci&oacute;n Antes de Financiamiento:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorbAntesFinanc0" type="text" class="planill_datos" id="txtGenerAbsorbAntesFinanc0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorbAntesFinanc0'] == '' ? '0' : $reclasifi['txtGenerAbsorbAntesFinanc0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorbAntesFinanc1" type="text" class="planill_datos" id="txtGenerAbsorbAntesFinanc1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorbAntesFinanc1'] == '' ? '0' : $reclasifi['txtGenerAbsorbAntesFinanc1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos3">                        
                                                        Total Otros Activos:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalOtrosAct" type="text" class="planill_datos" id="txtTotalOtrosAct"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalOtrosAct'] == '' ? '0' : (int) $reclasifi['txtTotalOtrosAct']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalOtrosAct2" type="text" class="planill_datos" id="txtTotalOtrosAct2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalOtrosAct2'] == '' ? '0' : (int) $reclasifi['txtTotalOtrosAct2']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalOtrosAct3" type="text" class="planill_datos" id="txtTotalOtrosAct3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalOtrosAct3'] == '' ? '0' : (int) $reclasifi['txtTotalOtrosAct3']; ?>" /></td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Pr&eacute;stamos a corto plazo:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPrestamoCP0" type="text" class="planill_datos" id="txtPrestamoCP0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPrestamoCP0'] == '' ? '0' : $reclasifi['txtPrestamoCP0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtPrestamoCP1" type="text" class="planill_datos" id="txtPrestamoCP1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPrestamoCP1'] == '' ? '0' : $reclasifi['txtPrestamoCP1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Porci&oacute;n circulante Pr&eacute;stamo a Largo Plazo:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPrestamoLP0" type="text" class="planill_datos" id="txtPrestamoLP0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPrestamoLP0'] == '' ? '0' : $reclasifi['txtPrestamoLP0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtPrestamoLP1" type="text" class="planill_datos" id="txtPrestamoLP1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtPrestamoLP1'] == '' ? '0' : $reclasifi['txtPrestamoLP1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Total Activos:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalAct" type="text" class="planill_datos" id="txtTotalAct" size="10"
                                                               maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalAct'] == '' ? '0' : (int) $reclasifi['txtTotalAct']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalAct2" type="text" class="planill_datos" id="txtTotalAct2" size="10"
                                                               maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalAct2'] == '' ? '0' : (int) $reclasifi['txtTotalAct2']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalAct3" type="text" class="planill_datos" id="txtTotalAct3" size="10"
                                                               maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalAct3'] == '' ? '0' : (int) $reclasifi['txtTotalAct3']; ?>" /></td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Pagar Relacionadas:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasPagarRel0" type="text" class="planill_datos" id="txtCtasPagarRel0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasPagarRel0'] == '' ? '0' : $reclasifi['txtCtasPagarRel0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtCtasPagarRel1" type="text" class="planill_datos" id="txtCtasPagarRel1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasPagarRel1'] == '' ? '0' : $reclasifi['txtCtasPagarRel1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Venta de Acciones - Aumento de Capital Social:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentaAccAumCapSoc0" type="text" class="planill_datos" id="txtVentaAccAumCapSoc0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtVentaAccAumCapSoc0'] == '' ? '0' : $reclasifi['txtVentaAccAumCapSoc0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentaAccAumCapSoc1" type="text" class="planill_datos" id="txtVentaAccAumCapSoc1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtVentaAccAumCapSoc1'] == '' ? '0' : $reclasifi['txtVentaAccAumCapSoc1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td colspan="4" class="MainSubTitulos2">
                                                        PASIVOS CIRCULANTES
                                                        <input type="hidden" name="hd_id_pasivo" id="hd_id_pasivo" value="" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Aumento de la Reserva Legal:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumReserLegal0" type="text" class="planill_datos" id="txtAumReserLegal0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtAumReserLegal0'] == '' ? '0' : $reclasifi['txtAumReserLegal0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtAumReserLegal1" type="text" class="planill_datos" id="txtAumReserLegal1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtAumReserLegal1'] == '' ? '0' : $reclasifi['txtAumReserLegal1']; ?>" /></td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Obligaciones Bancarias:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtobligbancarias" type="text" class="planill_datos" id="txtobligbancarias"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtobligbancarias'] == '' ? '0' : (int) $reclasifi['txtobligbancarias']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtobligbancarias2" type="text" class="planill_datos" id="txtobligbancarias2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtobligbancarias2'] == '' ? '0' : (int) $reclasifi['txtobligbancarias2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtobligbancarias3" type="text" class="planill_datos" id="txtobligbancarias3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtobligbancarias3'] == '' ? '0' : (int) $reclasifi['txtobligbancarias3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Pagar a L/P y Obligaciones Bancarias L/P:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasPagarObligBancLP0" type="text" class="planill_datos" id="txtCtasPagarObligBancLP0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasPagarObligBancLP0'] == '' ? '0' : $reclasifi['txtCtasPagarObligBancLP0']; ?>" /></td>
                                                    <td class="TdField">
                                                        <input name="txtCtasPagarObligBancLP1" type="text" class="planill_datos" id="txtCtasPagarObligBancLP1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCtasPagarObligBancLP1'] == '' ? '0' : $reclasifi['txtCtasPagarObligBancLP1']; ?>" /></td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Porci&oacute;n Circulante Deuda Largo Plazo:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdeudalp" type="text" class="planill_datos" id="txtdeudalp" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtdeudalp'] == '' ? '0' : (int) $reclasifi['txtdeudalp']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdeudalp2" type="text" class="planill_datos" id="txtdeudalp2" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtdeudalp2'] == '' ? '0' : (int) $reclasifi['txtdeudalp2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtdeudalp3" type="text" class="planill_datos" id="txtdeudalp3" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtdeudalp3'] == '' ? '0' : (int) $reclasifi['txtdeudalp3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">                        
                                                        Monto sin Conciliar:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtMontoSinConci0" type="text" class="planill_datos" id="txtMontoSinConci0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtMontoSinConci0'] == '' ? '0' : $reclasifi['txtMontoSinConci0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtMontoSinConci1" type="text" class="planill_datos" id="txtMontoSinConci1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtMontoSinConci1'] == '' ? '0' : $reclasifi['txtMontoSinConci1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Pagar:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctaspagar" type="text" class="planill_datos" id="txtctaspagar" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtctaspagar'] == '' ? '0' : (int) $reclasifi['txtctaspagar']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctaspagar2" type="text" class="planill_datos" id="txtctaspagar2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtctaspagar2'] == '' ? '0' : (int) $reclasifi['txtctaspagar2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctaspagar3" type="text" class="planill_datos" id="txtctaspagar3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtctaspagar3'] == '' ? '0' : (int) $reclasifi['txtctaspagar3']; ?>" />
                                                    </td>
                                                    <td  bgcolor="#FFFFFF">
                                                    </td>
                                                    <td  class="SubTitulos3">                        
                                                        Generaci&oacute;n o Absorbci&oacute;n Por Financiamiento:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorPorFinanc0" type="text" class="planill_datos" id="txtGenerAbsorPorFinanc0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorPorFinanc0'] == '' ? '0' : $reclasifi['txtGenerAbsorPorFinanc0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtGenerAbsorPorFinanc1" type="text" class="planill_datos" id="txtGenerAbsorPorFinanc1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtGenerAbsorPorFinanc1'] == '' ? '0' : $reclasifi['txtGenerAbsorPorFinanc1']; ?>" /></td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Efectos Por Pagar:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtefecpagar" type="text" class="planill_datos" id="txtefecpagar" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtefecpagar'] == '' ? '0' : (int) $reclasifi['txtefecpagar']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtefecpagar2" type="text" class="planill_datos" id="txtefecpagar2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtefecpagar2'] == '' ? '0' : (int) $reclasifi['txtefecpagar2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtefecpagar3" type="text" class="planill_datos" id="txtefecpagar3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtefecpagar3'] == '' ? '0' : (int) $reclasifi['txtefecpagar3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos3">                        
                                                        Cambio en la Cuenta Caja:
                                                    </td>
                                                    <td  class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtCambioCtaCaja0" type="text" class="planill_datos" id="txtCambioCtaCaja0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCambioCtaCaja0'] == '' ? '0' : $reclasifi['txtCambioCtaCaja0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtCambioCtaCaja1" type="text" class="planill_datos" id="txtCambioCtaCaja1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtCambioCtaCaja1'] == '' ? '0' : $reclasifi['txtCambioCtaCaja1']; ?>" /></td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Retenciones por Pagar:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtretenciones" type="text" class="planill_datos" id="txtretenciones"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtretenciones'] == '' ? '0' : (int) $reclasifi['txtretenciones']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtretenciones2" type="text" class="planill_datos" id="txtretenciones2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtretenciones2'] == '' ? '0' : (int) $reclasifi['txtretenciones2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtretenciones3" type="text" class="planill_datos" id="txtretenciones3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtretenciones3'] == '' ? '0' : (int) $reclasifi['txtretenciones3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="SubTitulos3">                        
                                                        Efectivo Al Inicio del A&ntilde;o:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEfecIniAno0" type="text" class="planill_datos" id="txtEfecIniAno0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecIniAno0'] == '' ? '0' : $reclasifi['txtEfecIniAno0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEfecIniAno1" type="text" class="planill_datos" id="txtEfecIniAno1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecIniAno1'] == '' ? '0' : $reclasifi['txtEfecIniAno1']; ?>" /></td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Gastos Acumulados:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtgastosacum" type="text" class="planill_datos" id="txtgastosacum"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtgastosacum'] == '' ? '0' : (int) $reclasifi['txtgastosacum']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtgastosacum2" type="text" class="planill_datos" id="txtgastosacum2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtgastosacum2'] == '' ? '0' : (int) $reclasifi['txtgastosacum2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtgastosacum3" type="text" class="planill_datos" id="txtgastosacum3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtgastosacum3'] == '' ? '0' : (int) $reclasifi['txtgastosacum3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="SubTitulos3">                        
                                                        Efectivo al Final del A&ntilde;o:
                                                    </td>
                                                    <td class="SubTitulos3"></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEfecFinAno0" type="text" class="planill_datos" id="txtEfecFinAno0"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecFinAno0'] == '' ? '0' : $reclasifi['txtEfecFinAno0']; ?>" /></td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEfecFinAno1" type="text" class="planill_datos" id="txtEfecFinAno1"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtEfecFinAno1'] == '' ? '0' : $reclasifi['txtEfecFinAno1']; ?>" /></td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        I.S.L.R. por Pagar / IVA / Retenciones:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtimpuestospagar" type="text" class="planill_datos" id="txtimpuestospagar"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtimpuestospagar'] == '' ? '0' : (int) $reclasifi['txtimpuestospagar']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtimpuestospagar2" type="text" class="planill_datos" id="txtimpuestospagar2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtimpuestospagar2'] == '' ? '0' : (int) $reclasifi['txtimpuestospagar2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtimpuestospagar3" type="text" class="planill_datos" id="txtimpuestospagar3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtimpuestospagar3'] == '' ? '0' : (int) $reclasifi['txtimpuestospagar3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td class="MainSubTitulos2" colspan="4">
                                                        Indicadores Econ&oacute;micos                    
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Prestaciones Sociales por Pagar:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtprestaciones" type="text" class="planill_datos" id="txtprestaciones"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtprestaciones'] == '' ? '0' : (int) $reclasifi['txtprestaciones']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtprestaciones2" type="text" class="planill_datos" id="txtprestaciones2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtprestaciones2'] == '' ? '0' : (int) $reclasifi['txtprestaciones2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtprestaciones3" type="text" class="planill_datos" id="txtprestaciones3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtprestaciones3'] == '' ? '0' : (int) $reclasifi['txtprestaciones3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="MainSubTitulos2" colspan="4">
                                                        Rentabilidad                    
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Otros Pasivos Corrientes:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtotrospasivos" type="text" class="planill_datos" id="txtotrospasivos"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtotrospasivos'] == '' ? '0' : (int) $reclasifi['txtotrospasivos']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtotrospasivos2" type="text" class="planill_datos" id="txtotrospasivos2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtotrospasivos2'] == '' ? '0' : (int) $reclasifi['txtotrospasivos2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtotrospasivos3" type="text" class="planill_datos" id="txtotrospasivos3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtotrospasivos3'] == '' ? '0' : (int) $reclasifi['txtotrospasivos3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        Variaci&oacute;n de las Ventas Netas Respecto A&ntilde;o Anterior:
                                                    </td>
                                                    <td class="TdField">
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtVarVentasNetas0" type="text" class="planill_datos" id="txtVarVentasNetas0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtVarVentasNetas0'] == '' ? '0' : $reclasifi['txtVarVentasNetas0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVarVentasNetas1" type="text" class="planill_datos" id="txtVarVentasNetas1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtVarVentasNetas1'] == '' ? '0' : $reclasifi['txtVarVentasNetas1']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Total Pasivos Circulantes:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivoCirc" type="text" class="planill_datos" id="txtTotalPasivoCirc"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivoCirc'] == '' ? '0' : (int) $reclasifi['txtTotalPasivoCirc']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivoCirc2" type="text" class="planill_datos" id="txtTotalPasivoCirc2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivoCirc2'] == '' ? '0' : (int) $reclasifi['txtTotalPasivoCirc2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivoCirc3" type="text" class="planill_datos" id="txtTotalPasivoCirc3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivoCirc3'] == '' ? '0' : (int) $reclasifi['txtTotalPasivoCirc3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        % Sobre Ventas Netas:
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td colspan="4" class="MainSubTitulos2">
                                                        PASIVOS A LARGO PLAZO</td>
                                                    <td class="TdField">
                                                    </td>                    
                                                    <td  class="SubTitulos1">
                                                        del Costo de Ventas
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtPorcCostoVentas0" type="text" class="planill_datos" id="txtPorcCostoVentas0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcCostoVentas0'] == '' ? '0' : $reclasifi['txtPorcCostoVentas0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcCostoVentas1" type="text" class="planill_datos" id="txtPorcCostoVentas1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcCostoVentas1'] == '' ? '0' : $reclasifi['txtPorcCostoVentas1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcCostoVentas2" type="text" class="planill_datos" id="txtPorcCostoVentas2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcCostoVentas2'] == '' ? '0' : $reclasifi['txtPorcCostoVentas2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Pagar Relacionadas y Accionistas:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasAccionistas" type="text" class="planill_datos" id="txtCtasAccionistas"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtCtasAccionistas'] == '' ? '0' : (int) $reclasifi['txtCtasAccionistas']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasAccionistas2" type="text" class="planill_datos" id="txtCtasAccionistas2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtCtasAccionistas2'] == '' ? '0' : (int) $reclasifi['txtCtasAccionistas2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCtasAccionistas3" type="text" class="planill_datos" id="txtCtasAccionistas3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtCtasAccionistas3'] == '' ? '0' : (int) $reclasifi['txtCtasAccionistas3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        del Beneficio Bruto
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtPorcBeneficioBruto0" type="text" class="planill_datos" id="txtPorcBeneficioBruto0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcBeneficioBruto0'] == '' ? '0' : $reclasifi['txtPorcBeneficioBruto0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcBeneficioBruto1" type="text" class="planill_datos" id="txtPorcBeneficioBruto1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcBeneficioBruto1'] == '' ? '0' : $reclasifi['txtPorcBeneficioBruto1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcBeneficioBruto2" type="text" class="planill_datos" id="txtPorcBeneficioBruto2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcBeneficioBruto2'] == '' ? '0' : $reclasifi['txtPorcBeneficioBruto2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Cuentas por Pagar a L/P y Obligaciones Bancarias L/P:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctaspagarlp" type="text" class="planill_datos" id="txtctaspagarlp"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtctaspagarlp'] == '' ? '0' : (int) $reclasifi['txtctaspagarlp']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctaspagarlp2" type="text" class="planill_datos" id="txtctaspagarlp2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtctaspagarlp2'] == '' ? '0' : (int) $reclasifi['txtctaspagarlp2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtctaspagarlp3" type="text" class="planill_datos" id="txtctaspagarlp3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtctaspagarlp3'] == '' ? '0' : (int) $reclasifi['txtctaspagarlp3']; ?>"  />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        de los Gastos Administrativos y Generales
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtPorcGastosAdminGenr0" type="text" class="planill_datos" id="txtPorcGastosAdminGenr0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcGastosAdminGenr0'] == '' ? '0' : $reclasifi['txtPorcGastosAdminGenr0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcGastosAdminGenr1" type="text" class="planill_datos" id="txtPorcGastosAdminGenr1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcGastosAdminGenr1'] == '' ? '0' : $reclasifi['txtPorcGastosAdminGenr1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcGastosAdminGenr2" type="text" class="planill_datos" id="txtPorcGastosAdminGenr2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcGastosAdminGenr2'] == '' ? '0' : $reclasifi['txtPorcGastosAdminGenr2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos3">
                                                        Total Pasivos a Largo Plazo:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivoLP" type="text" class="planill_datos" id="txtTotalPasivoLP"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivoLP'] == '' ? '0' : (int) $reclasifi['txtTotalPasivoLP']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivoLP2" type="text" class="planill_datos" id="txtTotalPasivoLP2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivoLP2'] == '' ? '0' : (int) $reclasifi['txtTotalPasivoLP2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivoLP3" type="text" class="planill_datos" id="txtTotalPasivoLP3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivoLP3'] == '' ? '0' : (int) $reclasifi['txtTotalPasivoLP3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        de los Gastos Financieros
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtPorcGastosFinancieros0" type="text" class="planill_datos" id="txtPorcGastosFinancieros0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcGastosFinancieros0'] == '' ? '0' : $reclasifi['txtPorcGastosFinancieros0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcGastosFinancieros1" type="text" class="planill_datos" id="txtPorcGastosFinancieros1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcGastosFinancieros1'] == '' ? '0' : $reclasifi['txtPorcGastosFinancieros1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcGastosFinancieros2" type="text" class="planill_datos" id="txtPorcGastosFinancieros2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcGastosFinancieros2'] == '' ? '0' : $reclasifi['txtPorcGastosFinancieros2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Total Pasivos:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivos" type="text" class="planill_datos" id="txtTotalPasivos"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivos'] == '' ? '0' : (int) $reclasifi['txtTotalPasivos']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivos2" type="text" class="planill_datos" id="txtTotalPasivos2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivos2'] == '' ? '0' : (int) $reclasifi['txtTotalPasivos2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasivos3" type="text" class="planill_datos" id="txtTotalPasivos3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasivos3'] == '' ? '0' : (int) $reclasifi['txtTotalPasivos3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        del Beneficio neto Antes de no Usuales
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtPorcBenefNetoUsua0" type="text" class="planill_datos" id="txtPorcBenefNetoUsua0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcBenefNetoUsua0'] == '' ? '0' : $reclasifi['txtPorcBenefNetoUsua0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcBenefNetoUsua1" type="text" class="planill_datos" id="txtPorcBenefNetoUsua1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcBenefNetoUsua1'] == '' ? '0' : $reclasifi['txtPorcBenefNetoUsua1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPorcBenefNetoUsua2" type="text" class="planill_datos" id="txtPorcBenefNetoUsua2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPorcBenefNetoUsua2'] == '' ? '0' : $reclasifi['txtPorcBenefNetoUsua2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td colspan="4" class="MainSubTitulos2">
                                                        CAPITAL
                                                        <input type="hidden" name="hd_id_capital" id="hd_id_capital" value="" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        Rentabilidad del Capital Neto Tangible
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtRentaCapitalNetoTan0" type="text" class="planill_datos" id="txtRentaCapitalNetoTan0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaCapitalNetoTan0'] == '' ? '0' : $reclasifi['txtRentaCapitalNetoTan0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRentaCapitalNetoTan1" type="text" class="planill_datos" id="txtRentaCapitalNetoTan1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaCapitalNetoTan1'] == '' ? '0' : $reclasifi['txtRentaCapitalNetoTan1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRentaCapitalNetoTan2" type="text" class="planill_datos" id="txtRentaCapitalNetoTan2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaCapitalNetoTan2'] == '' ? '0' : $reclasifi['txtRentaCapitalNetoTan2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Capital Social:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcapitalsocial" type="text" class="planill_datos" id="txtcapitalsocial"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcapitalsocial'] == '' ? '0' : (int) $reclasifi['txtcapitalsocial']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcapitalsocial2" type="text" class="planill_datos" id="txtcapitalsocial2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcapitalsocial2'] == '' ? '0' : (int) $reclasifi['txtcapitalsocial2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcapitalsocial3" type="text" class="planill_datos" id="txtcapitalsocial3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtcapitalsocial3'] == '' ? '0' : (int) $reclasifi['txtcapitalsocial3']; ?>" />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        Rentabilidad sobre el Capital Neto Invertido
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtRentaCapitalNetoInver0" type="text" class="planill_datos" id="txtRentaCapitalNetoInver0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaCapitalNetoInver0'] == '' ? '0' : $reclasifi['txtRentaCapitalNetoInver0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRentaCapitalNetoInver1" type="text" class="planill_datos" id="txtRentaCapitalNetoInver1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaCapitalNetoInver1'] == '' ? '0' : $reclasifi['txtRentaCapitalNetoInver1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRentaCapitalNetoInver2" type="text" class="planill_datos" id="txtRentaCapitalNetoInver2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaCapitalNetoInver2'] == '' ? '0' : $reclasifi['txtRentaCapitalNetoInver2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        - Cuota de Capital no Pagada:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcapitalnopago" type="text" class="planill_datos" id="txtcapitalnopago"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcapitalnopago'] == '' ? '0' : (int) $reclasifi['txtcapitalnopago']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcapitalnopago2" type="text" class="planill_datos" id="txtcapitalnopago2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcapitalnopago2'] == '' ? '0' : (int) $reclasifi['txtcapitalnopago2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtcapitalnopago3" type="text" class="planill_datos" id="txtcapitalnopago3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtcapitalnopago3'] == '' ? '0' : (int) $reclasifi['txtcapitalnopago3']; ?>"  />
                                                    </td>
                                                    <td class="TdField"></td>
                                                    <td  class="SubTitulos1">
                                                        Rentabilidad sobre Ventas
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtRentaSobreVentas0" type="text" class="planill_datos" id="txtRentaSobreVentas0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaSobreVentas0'] == '' ? '0' : $reclasifi['txtRentaSobreVentas0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRentaSobreVentas1" type="text" class="planill_datos" id="txtRentaSobreVentas1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaSobreVentas1'] == '' ? '0' : $reclasifi['txtRentaSobreVentas1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRentaSobreVentas2" type="text" class="planill_datos" id="txtRentaSobreVentas2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRentaSobreVentas2'] == '' ? '0' : $reclasifi['txtRentaSobreVentas2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Reserva Legal:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtreserva" type="text" class="planill_datos" id="txtreserva" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtreserva'] == '' ? '0' : (int) $reclasifi['txtreserva']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtreserva2" type="text" class="planill_datos" id="txtreserva2" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtreserva2'] == '' ? '0' : (int) $reclasifi['txtreserva2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtreserva3" type="text" class="planill_datos" id="txtreserva3" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtreserva3'] == '' ? '0' : (int) $reclasifi['txtreserva3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td class="MainSubTitulos2" colspan="4">
                                                        Indicadores Financieros
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Superavit Acumulado:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSuperavitAcum" type="text" class="planill_datos" id="txtSuperavitAcum"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtSuperavitAcum'] == '' ? '0' : (int) $reclasifi['txtSuperavitAcum']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSuperavitAcum2" type="text" class="planill_datos" id="txtSuperavitAcum2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtSuperavitAcum2'] == '' ? '0' : (int) $reclasifi['txtSuperavitAcum2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSuperavitAcum3" type="text" class="planill_datos" id="txtSuperavitAcum3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtSuperavitAcum3'] == '' ? '0' : (int) $reclasifi['txtSuperavitAcum3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Capital de Trabajo
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtCapitalTrabajo0" type="text" class="planill_datos" id="txtCapitalTrabajo0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCapitalTrabajo0'] == '' ? '0' : $reclasifi['txtCapitalTrabajo0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCapitalTrabajo1" type="text" class="planill_datos" id="txtCapitalTrabajo1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCapitalTrabajo1'] == '' ? '0' : $reclasifi['txtCapitalTrabajo1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCapitalTrabajo2" type="text" class="planill_datos" id="txtCapitalTrabajo2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCapitalTrabajo2'] == '' ? '0' : $reclasifi['txtCapitalTrabajo2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Superavit por Revaluaci&oacute;n:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSuperavitReeval" type="text" class="planill_datos" id="txtSuperavitReeval"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtSuperavitReeval'] == '' ? '0' : (int) $reclasifi['txtSuperavitReeval']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSuperavitReeval2" type="text" class="planill_datos" id="txtSuperavitReeval2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtSuperavitReeval2'] == '' ? '0' : (int) $reclasifi['txtSuperavitReeval2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSuperavitReeval3" type="text" class="planill_datos" id="txtSuperavitReeval3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtSuperavitReeval3'] == '' ? '0' : (int) $reclasifi['txtSuperavitReeval3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Solvencia
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtSolvencia0" type="text" class="planill_datos" id="txtSolvencia0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtSolvencia0'] == '' ? '0' : $reclasifi['txtSolvencia0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSolvencia1" type="text" class="planill_datos" id="txtSolvencia1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtSolvencia1'] == '' ? '0' : $reclasifi['txtSolvencia1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSolvencia2" type="text" class="planill_datos" id="txtSolvencia2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtSolvencia2'] == '' ? '0' : $reclasifi['txtSolvencia2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Resultado del Ejercicio:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txt_ejercicio" type="text" class="planill_datos" id="txtejercicio" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txt_ejercicio'] == '' ? '0' : (int) $reclasifi['txt_ejercicio']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txt_ejercicio2" type="text" class="planill_datos" id="txtejercicio2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txt_ejercicio2'] == '' ? '0' : (int) $reclasifi['txt_ejercicio2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txt_ejercicio3" type="text" class="planill_datos" id="txtejercicio3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txt_ejercicio3'] == '' ? '0' : (int) $reclasifi['txt_ejercicio3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Solvencia General
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtSolvenciaGeneral0" type="text" class="planill_datos" id="txtSolvenciaGeneral0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtSolvenciaGeneral0'] == '' ? '0' : $reclasifi['txtSolvenciaGeneral0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSolvenciaGeneral1" type="text" class="planill_datos" id="txtSolvenciaGeneral1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtSolvenciaGeneral1'] == '' ? '0' : $reclasifi['txtSolvenciaGeneral1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtSolvenciaGeneral2" type="text" class="planill_datos" id="txtSolvenciaGeneral2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtSolvenciaGeneral2'] == '' ? '0' : $reclasifi['txtSolvenciaGeneral2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos3">                        
                                                        Total Capital Contable:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalCapital" type="text" class="planill_datos" id="txtTotalCapital"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalCapital'] == '' ? '0' : (int) $reclasifi['txtTotalCapital']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalCapital2" type="text" class="planill_datos" id="txtTotalCapital2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalCapital2'] == '' ? '0' : (int) $reclasifi['txtTotalCapital2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalCapital3" type="text" class="planill_datos" id="txtTotalCapital3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalCapital3'] == '' ? '0' : (int) $reclasifi['txtTotalCapital3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Liquidez
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtLiquidez0" type="text" class="planill_datos" id="txtLiquidez0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtLiquidez0'] == '' ? '0' : $reclasifi['txtLiquidez0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtLiquidez1" type="text" class="planill_datos" id="txtLiquidez1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtLiquidez1'] == '' ? '0' : $reclasifi['txtLiquidez1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtLiquidez2" type="text" class="planill_datos" id="txtLiquidez2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtLiquidez2'] == '' ? '0' : $reclasifi['txtLiquidez2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">
                                                        Total Pasivos y Capital:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasCap" type="text" class="planill_datos" id="txtTotalPasCap"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasCap'] == '' ? '0' : (int) $reclasifi['txtTotalPasCap']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasCap2" type="text" class="planill_datos" id="txtTotalPasCap2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasCap2'] == '' ? '0' : (int) $reclasifi['txtTotalPasCap2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtTotalPasCap3" type="text" class="planill_datos" id="txtTotalPasCap3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtTotalPasCap3'] == '' ? '0' : (int) $reclasifi['txtTotalPasCap3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Ventas a Cr&eacute;dito Diarias
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtVentasCreditosDia0" type="text" class="planill_datos" id="txtVentasCreditosDia0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtVentasCreditosDia0'] == '' ? '0' : $reclasifi['txtVentasCreditosDia0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentasCreditosDia1" type="text" class="planill_datos" id="txtVentasCreditosDia1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtVentasCreditosDia1'] == '' ? '0' : $reclasifi['txtVentasCreditosDia1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentasCreditosDia2" type="text" class="planill_datos" id="txtVentasCreditosDia2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtVentasCreditosDia2'] == '' ? '0' : $reclasifi['txtVentasCreditosDia2']; ?>" />
                                                    </td>
                                                </tr>

                                                <tr class="TrProperty">
                                                    <td   class="SubTitulos1" style="background: palegreen">
                                                        Validacion entre Cuentas
                                                    </td>
                                                    <td class="TdField" style="background: palegreen">
                                                        <span id="verifica1">0</span>
                                                    </td>
                                                    <td class="TdField" style="background: palegreen">
                                                        <span id="verifica2">0</span>
                                                    </td>
                                                    <td class="TdField" style="background: palegreen">
                                                        <span id="verifica3">0</span>
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        N&uacute;mero de D&iacute;as a Mano de Ventas
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtNumDiariManoVent0" type="text" class="planill_datos" id="txtNumDiariManoVent0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiariManoVent0'] == '' ? '0' : $reclasifi['txtNumDiariManoVent0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtNumDiariManoVent1" type="text" class="planill_datos" id="txtNumDiariManoVent1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiariManoVent1'] == '' ? '0' : $reclasifi['txtNumDiariManoVent1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtNumDiariManoVent2" type="text" class="planill_datos" id="txtNumDiariManoVent2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiariManoVent2'] == '' ? '0' : $reclasifi['txtNumDiariManoVent2']; ?>" />
                                                    </td>

                                                </tr>
                                                <tr class="TrProperty">
                                                    <td colspan="4" class="MainSubTitulos2">
                                                        Ganancias y Perdidas
                                                        <input type="hidden" name="hd_id_capital2" id="hd_id_capital2" value="" />                            
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Per&iacute;odo Promedio de Cobros
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtPeriodoPromCobros0" type="text" class="planill_datos" id="txtPeriodoPromCobros0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPeriodoPromCobros0'] == '' ? '0' : $reclasifi['txtPeriodoPromCobros0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPeriodoPromCobros1" type="text" class="planill_datos" id="txtPeriodoPromCobros1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPeriodoPromCobros1'] == '' ? '0' : $reclasifi['txtPeriodoPromCobros1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtPeriodoPromCobros2" type="text" class="planill_datos" id="txtPeriodoPromCobros2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtPeriodoPromCobros2'] == '' ? '0' : $reclasifi['txtPeriodoPromCobros2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Ventas Netas:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentasNetas" type="text" class="planill_datos" id="txtVentasNetas"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtVentasNetas'] == '' ? '0' : (int) $reclasifi['txtVentasNetas']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentasNetas2" type="text" class="planill_datos" id="txtVentasNetas2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtVentasNetas2'] == '' ? '0' : (int) $reclasifi['txtVentasNetas2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtVentasNetas3" type="text" class="planill_datos" id="txtVentasNetas3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtVentasNetas3'] == '' ? '0' : (int) $reclasifi['txtVentasNetas3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">

                                                    </td>                    
                                                    <td class="TdField">

                                                    </td>
                                                    <td class="TdField">

                                                    </td>
                                                    <td class="TdField">

                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                       
                                                        Costo de Ventas y Servicios:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCostoVentas" type="text" class="planill_datos" id="txtCostoVentas"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtCostoVentas'] == '' ? '0' : (int) $reclasifi['txtCostoVentas']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCostoVentas2" type="text" class="planill_datos" id="txtCostoVentas2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtCostoVentas2'] == '' ? '0' : (int) $reclasifi['txtCostoVentas2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCostoVentas3" type="text" class="planill_datos" id="txtCostoVentas3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtCostoVentas3'] == '' ? '0' : (int) $reclasifi['txtCostoVentas3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Rotaci&oacute;n de Cuentas por Cobrar
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtTotacionCuentasCobrar0" type="text" class="planill_datos" id="txtTotacionCuentasCobrar0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtTotacionCuentasCobrar0'] == '' ? '0' : $reclasifi['txtTotacionCuentasCobrar0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtTotacionCuentasCobrar1" type="text" class="planill_datos" id="txtTotacionCuentasCobrar1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtTotacionCuentasCobrar1'] == '' ? '0' : $reclasifi['txtTotacionCuentasCobrar1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtTotacionCuentasCobrar2" type="text" class="planill_datos" id="txtTotacionCuentasCobrar2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtTotacionCuentasCobrar2'] == '' ? '0' : $reclasifi['txtTotacionCuentasCobrar2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Beneficio Bruto:</td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefBruto" type="text" class="planill_datos" id="txtBenefBruto"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefBruto'] == '' ? '0' : (int) $reclasifi['txtBenefBruto']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefBruto2" type="text" class="planill_datos" id="txtBenefBruto2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefBruto2'] == '' ? '0' : (int) $reclasifi['txtBenefBruto2']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefBruto3" type="text" class="planill_datos" id="txtBenefBruto3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefBruto3'] == '' ? '0' : (int) $reclasifi['txtBenefBruto3']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Rotaci&oacute;n de Inventarios                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtRotacionInventarios0" type="text" class="planill_datos" id="txtRotacionInventarios0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotacionInventarios0'] == '' ? '0' : $reclasifi['txtRotacionInventarios0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRotacionInventarios1" type="text" class="planill_datos" id="txtRotacionInventarios1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotacionInventarios1'] == '' ? '0' : $reclasifi['txtRotacionInventarios1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRotacionInventarios2" type="text" class="planill_datos" id="txtRotacionInventarios2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotacionInventarios2'] == '' ? '0' : $reclasifi['txtRotacionInventarios2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Gastos Administrativos y Generales:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosAdm" type="text" class="planill_datos" id="txtGastosAdm" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtGastosAdm'] == '' ? '0' : (int) $reclasifi['txtGastosAdm']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosAdm2" type="text" class="planill_datos" id="txtGastosAdm2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtGastosAdm2'] == '' ? '0' : (int) $reclasifi['txtGastosAdm2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosAdm3" type="text" class="planill_datos" id="txtGastosAdm3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtGastosAdm3'] == '' ? '0' : (int) $reclasifi['txtGastosAdm3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        N&uacute;mero de D&iacute;as a Mano de Inventarios                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtNumDiasManInventa0" type="text" class="planill_datos" id="txtNumDiasManInventa0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiasManInventa0'] == '' ? '0' : $reclasifi['txtNumDiasManInventa0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtNumDiasManInventa1" type="text" class="planill_datos" id="txtNumDiasManInventa1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiasManInventa1'] == '' ? '0' : $reclasifi['txtNumDiasManInventa1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtNumDiasManInventa2" type="text" class="planill_datos" id="txtNumDiasManInventa2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiasManInventa2'] == '' ? '0' : $reclasifi['txtNumDiasManInventa2']; ?>" />
                                                    </td>           
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">

                                                        Beneficio Neto en Operaciones:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefNetoOper" type="text" class="planill_datos" id="txtBenefNetoOper"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefNetoOper'] == '' ? '0' : (int) $reclasifi['txtBenefNetoOper']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefNetoOper2" type="text" class="planill_datos" id="txtBenefNetoOper2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefNetoOper2'] == '' ? '0' : (int) $reclasifi['txtBenefNetoOper2']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefNetoOper3" type="text" class="planill_datos" id="txtBenefNetoOper3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefNetoOper3'] == '' ? '0' : (int) $reclasifi['txtBenefNetoOper3']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Costo de Ventas o Servicios Diarios                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtCostVentsServDiar0" type="text" class="planill_datos" id="txtCostVentsServDiar0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCostVentsServDiar0'] == '' ? '0' : $reclasifi['txtCostVentsServDiar0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCostVentsServDiar1" type="text" class="planill_datos" id="txtCostVentsServDiar1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCostVentsServDiar1'] == '' ? '0' : $reclasifi['txtCostVentsServDiar1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCostVentsServDiar2" type="text" class="planill_datos" id="txtCostVentsServDiar2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCostVentsServDiar2'] == '' ? '0' : $reclasifi['txtCostVentsServDiar2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Otros Ingresos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosIngresos" type="text" class="planill_datos" id="txtOtrosIngresos"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtOtrosIngresos'] == '' ? '0' : (int) $reclasifi['txtOtrosIngresos']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosIngresos2" type="text" class="planill_datos" id="txtOtrosIngresos2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtOtrosIngresos2'] == '' ? '0' : (int) $reclasifi['txtOtrosIngresos2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosIngresos3" type="text" class="planill_datos" id="txtOtrosIngresos3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtOtrosIngresos3'] == '' ? '0' : (int) $reclasifi['txtOtrosIngresos3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Rotaci&oacute;n de Cuentas por Pagar                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtRotacionCuentasPagar0" type="text" class="planill_datos" id="txtRotacionCuentasPagar0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotacionCuentasPagar0'] == '' ? '0' : $reclasifi['txtRotacionCuentasPagar0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRotacionCuentasPagar1" type="text" class="planill_datos" id="txtRotacionCuentasPagar1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotacionCuentasPagar1'] == '' ? '0' : $reclasifi['txtRotacionCuentasPagar1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRotacionCuentasPagar2" type="text" class="planill_datos" id="txtRotacionCuentasPagar2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotacionCuentasPagar2'] == '' ? '0' : $reclasifi['txtRotacionCuentasPagar2']; ?>" />
                                                    </td>

                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">

                                                        Otros Egresos:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosEgresos" type="text" class="planill_datos" id="txtOtrosEgresos"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtOtrosEgresos'] == '' ? '0' : (int) $reclasifi['txtOtrosEgresos']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosEgresos2" type="text" class="planill_datos" id="txtOtrosEgresos2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtOtrosEgresos2'] == '' ? '0' : (int) $reclasifi['txtOtrosEgresos2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtOtrosEgresos3" type="text" class="planill_datos" id="txtOtrosEgresos3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtOtrosEgresos3'] == '' ? '0' : (int) $reclasifi['txtOtrosEgresos3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        N&uacute;mero de D&iacute;as a Mano en Cuentas por Pagar                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtNumDiasManCuantasPagar0" type="text" class="planill_datos" id="txtNumDiasManCuantasPagar0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiasManCuantasPagar0'] == '' ? '0' : $reclasifi['txtNumDiasManCuantasPagar0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtNumDiasManCuantasPagar1" type="text" class="planill_datos" id="txtNumDiasManCuantasPagar1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiasManCuantasPagar1'] == '' ? '0' : $reclasifi['txtNumDiasManCuantasPagar1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtNumDiasManCuantasPagar2" type="text" class="planill_datos" id="txtNumDiasManCuantasPagar2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtNumDiasManCuantasPagar2'] == '' ? '0' : $reclasifi['txtNumDiasManCuantasPagar2']; ?>" />
                                                    </td>

                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Gastos Financieros:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosFinanc" type="text" class="planill_datos" id="txtGastosFinanc"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtGastosFinanc'] == '' ? '0' : (int) $reclasifi['txtGastosFinanc']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosFinanc2" type="text" class="planill_datos" id="txtGastosFinanc2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtGastosFinanc2'] == '' ? '0' : (int) $reclasifi['txtGastosFinanc2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtGastosFinanc3" type="text" class="planill_datos" id="txtGastosFinanc3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtGastosFinanc3'] == '' ? '0' : (int) $reclasifi['txtGastosFinanc3']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Ciclo de Efectivo                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtCicloEfectivo0" type="text" class="planill_datos" id="txtCicloEfectivo0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCicloEfectivo0'] == '' ? '0' : $reclasifi['txtCicloEfectivo0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCicloEfectivo1" type="text" class="planill_datos" id="txtCicloEfectivo1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCicloEfectivo1'] == '' ? '0' : $reclasifi['txtCicloEfectivo1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCicloEfectivo2" type="text" class="planill_datos" id="txtCicloEfectivo2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCicloEfectivo2'] == '' ? '0' : $reclasifi['txtCicloEfectivo2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Beneficio Antes de Impuestos y No Usuales:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefAntesImpNoUsuales" type="text" class="planill_datos" id="txtBenefAntesImpNoUsuales"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefAntesImpNoUsuales'] == '' ? '0' : (int) $reclasifi['txtBenefAntesImpNoUsuales']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefAntesImpNoUsuales2" type="text" class="planill_datos" id="txtBenefAntesImpNoUsuales2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefAntesImpNoUsuales2'] == '' ? '0' : (int) $reclasifi['txtBenefAntesImpNoUsuales2']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefAntesImpNoUsuales3" type="text" class="planill_datos" id="txtBenefAntesImpNoUsuales3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefAntesImpNoUsuales3'] == '' ? '0' : (int) $reclasifi['txtBenefAntesImpNoUsuales3']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="TdSeparator"></td>                    
                                                    <td  class="SubTitulos1">
                                                        Compras                         
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtCompras0" type="text" class="planill_datos" id="txtCompras0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCompras0'] == '' ? '0' : $reclasifi['txtCompras0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCompras1" type="text" class="planill_datos" id="txtCompras1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCompras1'] == '' ? '0' : $reclasifi['txtCompras1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtCompras2" type="text" class="planill_datos" id="txtCompras2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtCompras2'] == '' ? '0' : $reclasifi['txtCompras2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Impuestos Sobre la Renta:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtislr" type="text" class="planill_datos" id="txtislr" size="10" maxlength="19"
                                                               value="<?= $reclasifi['txtislr'] == '' ? '0' : (int) $reclasifi['txtislr']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtislr2" type="text" class="planill_datos" id="txtislr2" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtislr2'] == '' ? '0' : (int) $reclasifi['txtislr2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtislr3" type="text" class="planill_datos" id="txtislr3" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtislr3'] == '' ? '0' : (int) $reclasifi['txtislr3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>                    
                                                    <td  class="SubTitulos1">
                                                        Compras Diarias
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtComprasDiarias0" type="text" class="planill_datos" id="txtComprasDiarias0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtComprasDiarias0'] == '' ? '0' : $reclasifi['txtComprasDiarias0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtComprasDiarias1" type="text" class="planill_datos" id="txtComprasDiarias1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtComprasDiarias1'] == '' ? '0' : $reclasifi['txtComprasDiarias1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtComprasDiarias2" type="text" class="planill_datos" id="txtComprasDiarias2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtComprasDiarias2'] == '' ? '0' : $reclasifi['txtComprasDiarias2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Ajustes en Planta:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAjustePlanta" type="text" class="planill_datos" id="txtAjustePlanta"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtAjustePlanta'] == '' ? '0' : (int) $reclasifi['txtAjustePlanta']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAjustePlanta2" type="text" class="planill_datos" id="txtAjustePlanta2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtAjustePlanta2'] == '' ? '0' : (int) $reclasifi['txtAjustePlanta2']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAjustePlanta3" type="text" class="planill_datos" id="txtAjustePlanta3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtAjustePlanta3'] == '' ? '0' : (int) $reclasifi['txtAjustePlanta3']; ?>"  />
                                                    </td>
                                                    <td class="TdField">
                                                    </td>
                                                    <td  class="SubTitulos1">
                                                        Endeudamiento Total
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtEndeudamientoTotal0" type="text" class="planill_datos" id="txtEndeudamientoTotal0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeudamientoTotal0'] == '' ? '0' : $reclasifi['txtEndeudamientoTotal0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeudamientoTotal1" type="text" class="planill_datos" id="txtEndeudamientoTotal1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeudamientoTotal1'] == '' ? '0' : $reclasifi['txtEndeudamientoTotal1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeudamientoTotal2" type="text" class="planill_datos" id="txtEndeudamientoTotal2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeudamientoTotal2'] == '' ? '0' : $reclasifi['txtEndeudamientoTotal2']; ?>" />
                                                    </td>
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">

                                                        Ajustes en Inversiones:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAjusteInv" type="text" class="planill_datos" id="txtAjusteInv" size="10"
                                                               maxlength="19" value="<?= $reclasifi['txtAjusteInv'] == '' ? '0' : (int) $reclasifi['txtAjusteInv']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAjusteInv2" type="text" class="planill_datos" id="txtAjusteInv2"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtAjusteInv2'] == '' ? '0' : (int) $reclasifi['txtAjusteInv2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAjusteInv3" type="text" class="planill_datos" id="txtAjusteInv3"
                                                               size="10"  maxlength="19" value="<?= $reclasifi['txtAjusteInv3'] == '' ? '0' : (int) $reclasifi['txtAjusteInv3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Endeudamiento Circulante
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtEndeudamientoCirculante0" type="text" class="planill_datos" id="txtEndeudamientoCirculante0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeudamientoCirculante0'] == '' ? '0' : $reclasifi['txtEndeudamientoCirculante0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeudamientoCirculante1" type="text" class="planill_datos" id="txtEndeudamientoCirculante1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeudamientoCirculante1'] == '' ? '0' : $reclasifi['txtEndeudamientoCirculante1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeudamientoCirculante2" type="text" class="planill_datos" id="txtEndeudamientoCirculante2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeudamientoCirculante2'] == '' ? '0' : $reclasifi['txtEndeudamientoCirculante2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Beneficio Neto despu&eacute;s de No Usuales:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefDespNoUsuales" type="text" class="planill_datos" id="txtBenefDespNoUsuales"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefDespNoUsuales'] == '' ? '0' : (int) $reclasifi['txtBenefDespNoUsuales']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefDespNoUsuales2" type="text" class="planill_datos" id="txtBenefDespNoUsuales2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefDespNoUsuales2'] == '' ? '0' : (int) $reclasifi['txtBenefDespNoUsuales2']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtBenefDespNoUsuales3" type="text" class="planill_datos" id="txtBenefDespNoUsuales3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtBenefDespNoUsuales3'] == '' ? '0' : (int) $reclasifi['txtBenefDespNoUsuales3']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Endeudamiento Bancario Total
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtEndeuBancTotal0" type="text" class="planill_datos" id="txtEndeuBancTotal0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeuBancTotal0'] == '' ? '0' : $reclasifi['txtEndeuBancTotal0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeuBancTotal1" type="text" class="planill_datos" id="txtEndeuBancTotal1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeuBancTotal1'] == '' ? '0' : $reclasifi['txtEndeuBancTotal1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeuBancTotal2" type="text" class="planill_datos" id="txtEndeuBancTotal2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeuBancTotal2'] == '' ? '0' : $reclasifi['txtEndeuBancTotal2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Dividendos Pagados en Efectivo:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDivPagosEfect" type="text" class="planill_datos" id="txtDivPagosEfect"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtDivPagosEfect'] == '' ? '0' : (int) $reclasifi['txtDivPagosEfect']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDivPagosEfect2" type="text" class="planill_datos" id="txtDivPagosEfect2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtDivPagosEfect2'] == '' ? '0' : (int) $reclasifi['txtDivPagosEfect2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDivPagosEfect3" type="text" class="planill_datos" id="txtDivPagosEfect3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtDivPagosEfect3'] == '' ? '0' : (int) $reclasifi['txtDivPagosEfect3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Endeudamiento a Largo Plazo
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtEndeuLargoPlazo0" type="text" class="planill_datos" id="txtEndeuLargoPlazo0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeuLargoPlazo0'] == '' ? '0' : $reclasifi['txtEndeuLargoPlazo0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeuLargoPlazo1" type="text" class="planill_datos" id="txtEndeuLargoPlazo1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeuLargoPlazo1'] == '' ? '0' : $reclasifi['txtEndeuLargoPlazo1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtEndeuLargoPlazo2" type="text" class="planill_datos" id="txtEndeuLargoPlazo2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtEndeuLargoPlazo2'] == '' ? '0' : $reclasifi['txtEndeuLargoPlazo2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Resultado del Ejercicio:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEjercicio" type="text" class="planill_datos" id="txtEjercicio" size="10"
                                                               maxlength="19"  value="<?= $reclasifi['txtEjercicio'] == '' ? '0' : (int) $reclasifi['txtEjercicio']; ?>" readonly="readonly"  />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEjercicio2" type="text" class="planill_datos" id="txtEjercicio2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtEjercicio2'] == '' ? '0' : (int) $reclasifi['txtEjercicio2']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtEjercicio3" type="text" class="planill_datos" id="txtEjercicio3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtEjercicio3'] == '' ? '0' : (int) $reclasifi['txtEjercicio3']; ?>" readonly="readonly"
                                                               />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Rotaci&oacute;n de la Planta
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtRotaciPlanta0" type="text" class="planill_datos" id="txtRotaciPlanta0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotaciPlanta0'] == '' ? '0' : $reclasifi['txtRotaciPlanta0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRotaciPlanta1" type="text" class="planill_datos" id="txtRotaciPlanta1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotaciPlanta1'] == '' ? '0' : $reclasifi['txtRotaciPlanta1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtRotaciPlanta2" type="text" class="planill_datos" id="txtRotaciPlanta2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtRotaciPlanta2'] == '' ? '0' : $reclasifi['txtRotaciPlanta2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">

                                                        Aumento del Capital Social:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumCapSocial" type="text" class="planill_datos" id="txtAumCapSocial"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtAumCapSocial'] == '' ? '0' : (int) $reclasifi['txtAumCapSocial']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumCapSocial2" type="text" class="planill_datos" id="txtAumCapSocial2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtAumCapSocial2'] == '' ? '0' : (int) $reclasifi['txtAumCapSocial2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumCapSocial3" type="text" class="planill_datos" id="txtAumCapSocial3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtAumCapSocial3'] == '' ? '0' : (int) $reclasifi['txtAumCapSocial3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td  class="SubTitulos1">
                                                        Productividad de la Empresa
                                                    </td>                    
                                                    <td class="TdField">
                                                        <input name="txtProducEmpre0" type="text" class="planill_datos" id="txtProducEmpre0"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtProducEmpre0'] == '' ? '0' : $reclasifi['txtProducEmpre0']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtProducEmpre1" type="text" class="planill_datos" id="txtProducEmpre1"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtProducEmpre1'] == '' ? '0' : $reclasifi['txtProducEmpre1']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtProducEmpre2" type="text" class="planill_datos" id="txtProducEmpre2"
                                                               size="10" maxlength="19" readonly="readonly"   value="<?= $reclasifi['txtProducEmpre2'] == '' ? '0' : $reclasifi['txtProducEmpre2']; ?>" />
                                                    </td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">

                                                        Disminuci&oacute;n del Capital Social:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDismCapSocial" type="text" class="planill_datos" id="txtDismCapSocial"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtDismCapSocial'] == '' ? '0' : (int) $reclasifi['txtDismCapSocial']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDismCapSocial2" type="text" class="planill_datos" id="txtDismCapSocial2"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtDismCapSocial2'] == '' ? '0' : (int) $reclasifi['txtDismCapSocial2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtDismCapSocial3" type="text" class="planill_datos" id="txtDismCapSocial3"
                                                               size="10" maxlength="19"  value="<?= $reclasifi['txtDismCapSocial3'] == '' ? '0' : (int) $reclasifi['txtDismCapSocial3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td colspan="4"></td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td  class="SubTitulos1">                        
                                                        Aumento de la Reserva Legal:
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumReservaLegal" type="text" class="planill_datos" id="txtAumReservaLegal"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtAumReservaLegal'] == '' ? '0' : (int) $reclasifi['txtAumReservaLegal']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumReservaLegal2" type="text" class="planill_datos" id="txtAumReservaLegal2"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtAumReservaLegal2'] == '' ? '0' : (int) $reclasifi['txtAumReservaLegal2']; ?>" />
                                                    </td>
                                                    <td class="TdField">
                                                        <input name="txtAumReservaLegal3" type="text" class="planill_datos" id="txtAumReservaLegal3"
                                                               size="10" maxlength="19" value="<?= $reclasifi['txtAumReservaLegal3'] == '' ? '0' : (int) $reclasifi['txtAumReservaLegal3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td colspan="4"></td>                    
                                                </tr>
                                                <tr class="TrProperty">
                                                    <td class="SubTitulos3">                        
                                                        Aumento o Disminucion del Capital Contable:
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtAumDismCapContable" type="text" class="planill_datos" id="txtAumDismCapContable"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtAumDismCapContable'] == '' ? '0' : (int) $reclasifi['txtAumDismCapContable']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtAumDismCapContable2" type="text" class="planill_datos" id="txtAumDismCapContable2"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtAumDismCapContable2'] == '' ? '0' : (int) $reclasifi['txtAumDismCapContable2']; ?>" />
                                                    </td>
                                                    <td class="SubTitulos3">
                                                        <input name="txtAumDismCapContable3" type="text" class="planill_datos" id="txtAumDismCapContable3"
                                                               size="10" maxlength="19" readonly="readonly"  
                                                               value="<?= $reclasifi['txtAumDismCapContable3'] == '' ? '0' : (int) $reclasifi['txtAumDismCapContable3']; ?>" />
                                                    </td>
                                                    <td class="TdSeparator"></td>
                                                    <td colspan="4"></td>                    
                                                </tr>              
                                                <tr>
                                                    <td colspan="7">
                                                    </td>
                                                    <td colspan="2" class="Botones" align="left">                                                    
                                                    </td>                    
                                                </tr>
                                            </table>
                                            <hr>
                                            <div style="width: 80%; text-align: center; margin: 0 auto;">
                                                <input type="submit" value="Guardar / Editar Reclasificacion" />
                                            </div>
                                            <hr>
                                        </form>
                                    </div>
                                    <style>
                                        .TdField{
                                            width: 120px;
                                        }

                                    </style>
                                    <script src="js/AppRecValid.js" language="javascript" type="text/javascript"></script>
                                    <script src="js/AppRecSuma.js" language="javascript" type="text/javascript"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clear height-fix"></div>
                </div></div>
            <div id="cargando" style="width: 100%">
                <div style="margin: 0px auto; width: 130px; display: block; overflow: hidden;">
                    <img src="images/general/cargando2.gif">
                </div>
            </div>
            <!--! end of #main-content -->
        </div> <!--! end of #main -->

    </div> 
    <script>
                                        function closeFancyboxAndRedirectToUrl(url) {
                                            redirect = '<?= base_url(); ?>' + url;
                                            $.fancybox.close();
                                            window.location = redirect;
                                        }
    </script>

    <? $this->load->view('templates/foot'); ?>
</body>
</html>