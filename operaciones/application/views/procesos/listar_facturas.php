<html>
    <base href="<?= base_url(); ?>" >
    <link rel="stylesheet" href="css/style_procesos.css" type="text/css"> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.11.1.min.js"><\/script>')</script>
    <script defer src="js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
    <script defer src="js/mylibs/jquery-ui-1.8.15.custom.min.js"></script> <!-- jQuery UI -->
    <body>
        <div class="wrap">
            <form action="./clientes/editar_facturas/<?= $facturas[0]['id_solicitud']; ?>" method="post" id="validate-form" onSubmit="return validator(this);">
                <div class="titulo">
                    EDITAR LOTE DE FACTURAS
                </div>
                <input id="id_solicitud" value="<?= $facturas[0]['id_solicitud']; ?>" type="hidden" />
                <div class="contenido" style="width: 771;">
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="">
                        <thead>
                            <tr>
                                <th style="text-align: center;"  width=""></th>
                                <th style="text-align: center;"  width="5%"></th>
                                <th style="text-align: center;"  width="8%">Numero de Factura</th>
                                <th style="text-align: center;"  width="">Deudor</th>
                                <th style="text-align: center;"  width="11%">Rif</th>
                                <th style="text-align: center;"  width="10%">Fecha de Emision</th>
                                <th style="text-align: center;"  width="10%">Fecha de Vencimiento</th>
                                <th style="text-align: center;"  width="11%">Valor Nominal</th>
                                <th style="text-align: center;"  width="11%">Iva(%)</th>
                                <th style="text-align: center;"  width="11%">Valor con Iva</th>
                            </tr>
                        </thead>
                        <tbody class="body_tablas_facturas">
                            <? foreach ($facturas as $row) { ?>
                                <? if ($row['status'] == '0') { ?>
                                    <tr>
                                        <td  style="text-align: center;" ><span id_fac ="<?= $row['id_factura'] ?>" class="eli" style="cursor: pointer; display: block; float: left; margin: 5px 4px 0 0;"><img class="icon_elimina" src="images/general/rechazada.png" width="16" title="Eliminar Factura"><img class="icon_add" src="images/general/ic_ok.png" width="16" title="Agregar Factura" style="display: none;"></span></td>
                                        <td  style="text-align: center;" ><input class="numero" value="<?= $row['numero'] ?>" type="text" name="numero[]" data-required="true" onkeypress="return permite(event, 'num')" style="width: 100% !important;text-align: center;  " /></td>
                                        <td  style="text-align: center;" ><input class="numero_factura" value="<?= $row['numero_factura'] ?>" type="text" name="numero_factura[]" data-required="true" onkeypress="return permite(event, 'num')" style="width: 82% !important;text-align: center;" /></td>
                                        <td  style="text-align: center;" ><input class="deudor" value="<?= $row['deudor'] ?>" type="text" name="deudor[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="rif" value="<?= $row['rif'] ?>" type="text" name="rif[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="fecha_emision" value="<?= $row['fecha_emision'] ?>" type="text" name="fecha_emision[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="fecha_vencimiento" value="<?= $row['fecha_vencimiento'] ?>" type="text" name="fecha_vencimiento[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="valor_nominal" value="<?= $row['valor_nominal'] ?>" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="valor_nominal[]" style="width: 92% !important;text-align: center;"/></td>
                                        <td  style="text-align: center;" ><input class="iva" value="<?= $row['iva'] ?>" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="iva[]" style="width: 92% !important;text-align: center;"/></td>
                                        <td  style="text-align: center;" ><input class="valor_con_iva" value="<?= $row['valor_con_iva'] ?>" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="valor_con_iva[]" style="width: 92% !important;text-align: center;"/></td>                                    
                                    </tr>
                                <? } ?>
                            <? } ?>

                            <tr>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ></td>
                                <td  style="text-align: center;" ><input id="result_iva_input" type="hidden"/></td>
                                <td  style="text-align: center;" ><span id="result_nominal"></span></td>
                                <td  style="text-align: center;" ><span id="iva"></span></td>
                                <td  style="text-align: center;" ><span id="result_iva"></span></td>
                            </tr>
                        </tbody>

                    </table>
                    <br />
                    <div style="border: medium solid; cursor: pointer; float: left; padding: 12px 0 0; width: 159px;" class="boton" id="id_add_nueva" >Agregar Factura</div>
                    <input style="border: medium solid; cursor: pointer; float: left; height: 51px; width: 159px;"  class="boton" type="submit" value="Procesar">
                    <br />
                    <br />
                    <br />
                    <br />
                    <br />
                    <div>Facturas Eliminadas</div>

                    <table class="table facturas_eliminadas">
                        <thead>
                            <tr>
                                <th style="text-align: center;"  width=""></th>
                                <th style="text-align: center;"  width="5%"></th>
                                <th style="text-align: center;"  width="8%">Numero de Factura</th>
                                <th style="text-align: center;"  width="">Deudor</th>
                                <th style="text-align: center;"  width="11%">Rif</th>
                                <th style="text-align: center;"  width="10%">Fecha de Emision</th>
                                <th style="text-align: center;"  width="10%">Fecha de Vencimiento</th>
                                <th style="text-align: center;"  width="11%">Valor Nominal</th>
                                <th style="text-align: center;"  width="11%">Iva(%)</th>
                                <th style="text-align: center;"  width="11%">Valor con Iva</th>
                            </tr>
                        </thead>

                        <tbody class="cuerpo_eliminadas">
                            <? foreach ($facturas as $row) { ?>
                                <? if ($row['status'] == '-1') { ?>
                                    <tr>
                                        <td  style="text-align: center;" ><span id_fac ="<?= $row['id_factura'] ?>" class="add" style="cursor: pointer; display: block; float: left; margin: 5px 4px 0 0;"><img class="icon_elimina" src="images/general/rechazada.png" width="16" title="Eliminar Factura" style="display: none;"><img class="icon_add" src="images/general/ic_ok.png" width="16" title="Agregar Factura"></span></td>
                                        <td  style="text-align: center;" ><input class="numero" value="<?= $row['numero'] ?>" type="text" name="numero[]" data-required="true" onkeypress="return permite(event, 'num')" style="width: 100% !important;text-align: center;  " /></td>
                                        <td  style="text-align: center;" ><input class="numero_factura" value="<?= $row['numero_factura'] ?>" type="text" name="numero_factura[]" data-required="true" onkeypress="return permite(event, 'num')" style="width: 82% !important;text-align: center;" /></td>
                                        <td  style="text-align: center;" ><input class="deudor" value="<?= $row['deudor'] ?>" type="text" name="deudor[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="rif" value="<?= $row['rif'] ?>" type="text" name="rif[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="fecha_emision" value="<?= $row['fecha_emision'] ?>" type="text" name="fecha_emision[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="fecha_vencimiento" value="<?= $row['fecha_vencimiento'] ?>" type="text" name="fecha_vencimiento[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>
                                        <td  style="text-align: center;" ><input class="valor_nominal_eliminada" value="<?= $row['valor_nominal'] ?>" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="valor_nominal[]" style="width: 92% !important;text-align: center;"/></td>
                                        <td  style="text-align: center;" ><input class="iva" value="<?= $row['iva'] ?>" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="iva[]" style="width: 92% !important;text-align: center;"/></td>
                                        <td  style="text-align: center;" ><input class="valor_con_iva_eliminada" value="<?= $row['valor_con_iva'] ?>" data-required="true" onkeypress="return permite(event, 'numpunto')" type="text" name="valor_con_iva[]" style="width: 92% !important;text-align: center;"/></td>                                    
                                    </tr>
                                <? } ?>
                            <? } ?>
                        </tbody>

                    </table>

                </div>
                <input class="monto_aprobado" name="monto_solicitud_aprobado" type="hidden">
            </form>

            <script defer src="js/facturas/script_listar.js"></script>
            <script>

            </script>

    </body>
</html>
