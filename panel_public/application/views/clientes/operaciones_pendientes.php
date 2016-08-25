<? $this->load->view('templates/header'); ?>
<script>
    window.moveTo(0, 0);
    window.resizeTo(screen.availWidth, screen.availHeight);
</script>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">


        <div class="workplace">

            <div class="row-fluid">
                <div class="span12">
                    <div class="head">
                        <div class="isw-documents"></div>
                        <h1>Estado de Solicitudes</h1>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>

            <div class="row-fluid">

                <div class="span12">                    
                    <div class="head">
                        <div class="isw-grid"></div>
                        <h1>Lista de las operaciones que tiene Pendientes</h1>  
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid table-sorting">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"  width="%">Estatus</th>
                                    <th style="text-align: center;"  width="%">Fecha de la Solicitud</th>
                                    <th style="text-align: center;"  width="%">Monto Solicitado</th>
                                    <th style="text-align: center;"  width="%">Tipo de Solicitud</th>
                                    <th style="text-align: center;"  width="S%">Destino de los fondos</th>
                                    <th style="text-align: center;"  width="S%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                if (isset($operaciones)) {
                                    $vacio = 0;
                                    foreach ($operaciones as $row) {
                                        if ($row['status'] == 0 or $row['status'] == 1) {
                                            $vacio = $vacio + 1;
                                            ?>

                                            <?
                                            switch ($row['status']) {
                                                case 0:
                                                    $status = 'Esperando ser Procesada';
                                                    $imagen = 'espera.png';
                                                    break;
                                                case 1:
                                                    $status = 'Procesada en espera';
                                                    $imagen = 'proceso.png';
                                                    break;
                                            }
                                            ?>
                                            <tr>
                                                <td  style="text-align: center; vertical-align: central; padding: 0;" >
                                                    <div style="border: solid 1px green;height: 74px; position: relative; float: left;">
                                                        <a href="<?
                                switch ($row['tipo_solicitud']) {
                                    case 1:
                                        echo './cupos/planilla_solicitud_cupo/'. $row['id_solicitud'];
                                        break;
                                    case 2:
                                        echo './cupos/solicitud_de_venta_planilla/'. $row['id_solicitud'];
                                        break;
                                    case 3:
                                        echo './pagare/descarga_solicitud_pagare/'. $row['id_solicitud'];
                                        break;
                                    case 4:
                                        echo './prestamo/descarga_solicitud_prestamo/'. $row['id_solicitud'];
                                        break;
                                    
                                }
                                            ?>">
                                                            <img src="images/general/descargar_btn.png" />
                                                        </a>
                                                    </div>
                                                    <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?></td>
                                                <td  style="text-align: center; vertical-align: central;" ><?= fecha($row['fecha_solicitud']); ?></td>
                                                <td  style="text-align: center; vertical-align: central;" ><?= number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?> </td>
                                                <td  style="text-align: center; vertical-align: central;" >
                                                    <?
                                switch ($row['tipo_solicitud']) {
                                    case 1:
                                        echo 'Solicitud de Cupo';
                                        break;
                                    case 2:
                                        echo 'Solicitud de Venta de Facturas';
                                        break;
                                    case 3:
                                        echo 'Solicitud de Pagare';
                                        break;
                                    case 4:
                                        echo 'Solicitud de Prestamo';
                                        break;
                                    case 5:
                                        echo 'Solicitud de Venta de Giros';
                                        break;
                                }
                                            ?>
                                                </td>
                                                <td  style="text-align: center;  vertical-align: central;" ><?= $row['destino_solicitud']; ?></td>         
                                                <td>
                                                    <? if ($row['tipo_solicitud'] == 4) { ?> 
                                                        <? if ($row['status'] == 0) { ?>
                                                            <a href="./prestamo/editar_prestamo/<?= $row['id_solicitud']; ?>">Editar</a><br/>
                                                            <a href="./prestamo/eliminar_operacion/<?= 'fed' . $row['id_solicitud'] . md5(microtime()); ?>">Eliminar</a>
                                                        <? } ?>
                                                    <? } ?>
                                                    <? if ($row['tipo_solicitud'] == 3) { ?> 
                                                        <? if ($row['status'] == 0) { ?>
                                                            <a href="./pagare/editar_pagare/<?= $row['id_solicitud']; ?>">Editar</a><br/>
                                                            <a href="./pagare/eliminar_operacion/<?= 'fed' . $row['id_solicitud'] . md5(microtime()); ?>">Eliminar</a>
                                                        <? } ?>
                                                    <? } ?>
                                                </td>
                                            </tr>
                                            <?
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                        <div class="clear"></div>
                    </div>
                </div>                                

            </div>

        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>

<? if ($vacio == 0) { ?>
    <script>
        $(window).load(function() {
            $('.dataTables_empty').html('A la Fecha usted no posee Solicitudes en tramite');
            $('.dataTables_empty').css('width', '100%');
            $('.dataTables_empty').css('text-align', 'center');
        });
    </script>
<? } ?>
</html>
