<? $this->load->view('templates/header'); ?>


<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">

            <div class="row-fluid">
                <div class="span12">
                    <div class="head">
                        <div class="isw-documents"></div>
                        <h1>Panel de solicitud de Cupos</h1>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="dr"><span></span></div>

            <div class="row-fluid">

                <div class="span12">                    
                    <div class="head">
                        <div class="isw-grid"></div>
                        <h1>Historial de Cupos</h1>  
                        <?
                        if (count($solicitudes) > 0) {
                            foreach ($solicitudes as $row) {
                                switch ($row['status']) {
                                    case 0:
                                        $accion = 'javascript:alert(\'Disculpe usted no puede realizar una nueva solicitud ya que tiene una en espera de ser procesada\')'; //no se hace nada
                                        $confirm = '';
                                        break;
                                    case 1:
                                        $accion = 'javascript:alert(\'Disculpe Usted tiene una solicitud en espera de aprobacion, su solicitud no puede ser procesada\')'; // no hace nada
                                        $confirm = '';
                                        break;
                                    case 2:
                                        $accion = 'javascript:alert(\'Disculpe Usted tiene una solicitud activa\')'; // no hace nada
                                        $confirm = '';
                                        break;
                                    default :
                                        $accion = './cupos/nueva_solicitud/'; // dos es rollover
                                        $confirm = '';
                                        break;
                                }
                            }
                        } else {
                            $accion = './cupos/nueva_solicitud/'; // dos es rollover
                            $confirm = '';
                        }
                        ?>
                        <a href="<?= $accion; ?>" <?= $confirm; ?> >
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
                                    <th style="text-align: center;"  width="40%">Datos de Aprobacion</th>
                                    <th style="text-align: center;"  width="20%">Destino de los fondos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach ($solicitudes as $row) { ?>

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
                                            $status = 'Aceptada';
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
                                    <tr>
                                        <td  style="text-align: center; vertical-align: central; padding: 0;" >
                                            <div style="border: solid 1px green;height: 74px; position: relative; float: left;">
                                                <a href="./cupos/planilla_solicitud_cupo/<?= $row['id_solicitud']; ?>">
                                                    <img src="images/general/descargar_btn.png" />
                                                </a>
                                            </div>
                                            <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?></td>
                                        <td  style="text-align: center; vertical-align: central;" ><?= fecha($row['fecha_solicitud']); ?></td>
                                        <td  style="text-align: center; vertical-align: central;" ><?= number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?> </td>
                                        <td  style="text-align: center; vertical-align: central;" >
                                            <?= 'Monto Aprobado: ' . number_format($row['monto_solicitud_aprobado'], 2, ',', '.') . ' ' . $moneda['value']; ?><br> 

                                            <? if ($row['status'] == 2) { ?>
                                                <span style="color:green;"><?= 'Fecha de Aprobacion: ' . fecha($row['fecha_solicitud_aprobado']); ?></span> <br> 
                                            <? } ?>
                                        </td>
                                        <td  style="text-align: center;  vertical-align: central;" ><?= $row['destino_solicitud']; ?> </td>                                    
                                    </tr>
                                <? } ?>
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
