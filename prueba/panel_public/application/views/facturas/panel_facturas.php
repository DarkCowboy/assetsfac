<? $this->load->view('templates/header'); ?>


<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace">

            <div class="row-fluid">

                <div class="span12">                    
                    <div class="head">
                        <div class="isw-grid"></div>
                        <h1>Planillas de Solicitud de Ventas y Status</h1>  

                        <a href="./facturas/cargar_facturas" >
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
                                    <th style="text-align: center;"  width=""></th>
                                    <th style="text-align: center;"  width="">Planilla / Estatus</th>
                                    <th style="text-align: center;"  width="">Fecha de la Solicitud</th>
                                    <th style="text-align: center;"  width="">Monto Solicitado</th>
                                    <th style="text-align: center;"  width="">Destino de los fondos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <? foreach ($solicitudes as $row) { ?>
                                    <? if ($row['status'] == 0) { ?>
                                        <?
                                        $status = 'Esperando ser Procesada';
                                        $imagen = 'espera.png';
                                        $row['fecha_solicitud_aprobado'] = 'En Espera';
                                        $row['fecha_vcto_solicitud_aprobado'] = 'En Espera';
                                        ?>
                                        <tr>
                                            <td  style="text-align: center; vertical-align: central;" ></td>
                                            <td  style="text-align: center; vertical-align: central; padding: 0;" >
                                                <div style="border: solid 1px green;height: 74px; position: relative; float: left;">
                                                    <a href="./cupos/solicitud_de_venta_planilla/<?= $row['id_solicitud']; ?>">
                                                        <img src="images/general/descargar_btn.png" />
                                                    </a>
                                                </div>
                                                <div style="margin-top: 3px;"><img src="images/general/<?= $imagen; ?>" /></div><?= $status; ?></td>
                                            <td  style="text-align: center; vertical-align: central;" ><?= fecha($row['fecha_solicitud']); ?></td>
                                            <td  style="text-align: center; vertical-align: central;" ><?= number_format($row['monto_solicitud'], 2, ',', '.') . ' ' . $moneda['value']; ?> </td>
                                            <td  style="text-align: center;  vertical-align: central;" ><?= $row['destino_solicitud']; ?></td>                                    
                                        </tr>
                                    <? } ?>
                                <? } ?>
                            </tbody>
                        </table>
                        <? //debug($solicitudes);  ?>
                        <div class="clear"></div>
                    </div>
                </div>                                

            </div>

        </div>
    </div>   
</body>
<? $this->load->view('templates/footer'); ?>


</html>
