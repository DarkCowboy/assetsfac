<? $this->load->view('templates/header'); ?>


<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">

            <div class="row-fluid">
                <div class="span12">
                    <div class="head">
                        <div class="isw-documents"></div>
                        <h1>Panel de solicitud de Prestamo</h1>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>

            <div class="row-fluid">

                <div class="span12">                    
                    <div class="head">
                        <div class="isw-grid"></div>
                        <h1>Historial de Prestamo</h1>  
                        <a href="./prestamo/nuevo_prestamo/" >
                            <div style="float: right;" class="agregar_cupo_btn">
                                <ul style="">
                                    <li style="list-style:none;"> <img src="img/icons/wb/ic_plus.png" width="20" /> Nueva Solicitud </li>
                                </ul>
                            </div>
                        </a>
                        <div class="clear"></div>
                    </div>
                    <div class="block-fluid table-sorting">
                        <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"  width="15%">Estatus</th>
                                    <th style="text-align: center;"  width="15%">Fecha de la Solicitud</th>
                                    <th style="text-align: center;"  width="10%">Monto Solicitado</th>
                                    <th style="text-align: center;"  width="20%">Destino de los fondos</th>
                                    <th style="text-align: center;"  width="40%">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?
                                if (isset($solicitudes)) {
                                    foreach ($solicitudes as $row) {
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
                                            case 2:
                                                $status = 'Aceptada';
                                                $imagen = 'ic_ok.png';
                                                break;
                                            case 3:
                                                $status = 'Rechazada';
                                                $imagen = 'rechazada.png';
                                                break;
                                            case 4:
                                                $status = 'Eliminada';
                                                break;
                                            case 5:
                                                $status = 'Aceptada Cancelada';
                                                $imagen = 'ic_folder.png';
                                                break;
                                        }
                                        if ($row['status'] == 0 or $row['status'] == 1) {
                                            ?>
                                            <tr>
                                                <td  style="text-align: center; vertical-align: central; padding: 0;" >
                                                    <div style="border: solid 1px green;height: 74px; position: relative; float: left;">
                                                        <a href="./prestamo/descarga_solicitud_prestamo/<?= $row['id_solicitud']; ?>">
                                                            <img src="images/general/descargar_btn.png" />
                                                        </a>
                                                    </div>
                                                    <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?></td>
                                                <td  style="text-align: center; vertical-align: central;" ><?= fecha($row['fecha_solicitud']); ?></td>
                                                <td  style="text-align: center; vertical-align: central;" ><?= number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?> </td>

                                                <td  style="text-align: center;  vertical-align: central;" ><?= $row['destino_solicitud']; ?></td>   
                                                <td  style="text-align: center; vertical-align: central;" >
                                                    <? if ($row['status'] == 0) { ?>
                                                        <a href="./prestamo/editar_prestamo/<?= $row['id_solicitud']; ?>">Editar</a><br/>
                                                        <a href="./prestamo/eliminar_operacion/<?= 'fed' . $row['id_solicitud'] . md5(microtime()); ?>">Eliminar</a>
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

</html>
