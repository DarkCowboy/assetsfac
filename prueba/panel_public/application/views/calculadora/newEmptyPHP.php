<table style="width: 100%; max-width: 500px; margin: 0 auto;">
    <tr>
        <td>
            Seleccione la Operacion a Calcular el Pago
        </td>
        <td>
            <select id="num_operacion">
                <option></option>
                <? foreach ($ope_activas as $row) { ?>
                    <? $fecha_vncto = explode(' ', $row['fecha_vcto_solicitud_aprobado']) ?>
                    <? $fecha_de_liquidacion = explode(' ', $row['fecha_solicitud_aprobado']) ?>
                    <option porcentaje_de_compra_op="<?= $row['porcentaje_compra']; ?>"fecha_vencimiento="<?= $fecha_vncto[0]; ?>" fecha_de_liquidacion="<?= $fecha_de_liquidacion[0]; ?>" value="<?= $row['monto_solicitud_aprobado']; ?>"><?= $row['num_operacion']; ?></option> 
                <? } ?>
            </select>
        </td>
            
    </tr>
    <!--<tr>-->
<!--                                    <td>
            Fecha de liquidacion
        </td>
        <td>-->
    <input id="fecha_de_liqu" type="hidden" readonly="readonly" />
    <!--                                    </td>
                                    </tr>-->
    <tr>
        <td>
            Fecha de Vencimiento
        </td>
        <td>
            <input id="fecha_vencimiento" type="text" readonly="readonly"  />
        </td>
    </tr>
    <tr>
        <td>
            Monto de la Operacion
        </td>
        <td>
            <input id="monto_aprobado_op" type="text" readonly="readonly"  />
        </td>
    </tr>
<!--                                <tr>
        <td>
            Precio
        </td>
        <td>-->
    <input id="porcentaje_de_compra_op" type="hidden"  readonly="readonly"  />
    <!--                                    </td>
                                    </tr>-->
    <tr>
        <td>
            Seleccione la Fecha a depositar
        </td>
        <td>
            <input name="cantidad a abonar_op" id="fecha_deposito_op" type="text" style="" />
        </td>
    </tr>
    <tr>
        <td>
            Va a realizar un abono?
        </td>
        <td>
            Si <input type="radio" name="abonar_op" value="1" class="abonar_op"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            No <input type="radio" name="abonar_op" checked="checked" value="0" class="abonar_op"  />
        </td>
    </tr>
        
    <tr class="abono_porcentaje">
        
    </tr>
        
        
    <script> 
        $('.abonar_op').click(function(){
            x = $("input[name='abonar_op']:checked").val();
            if(x==1){
                $(".abono_porcentaje").append('\
                    <td class="td_abono_op">\n\
                        Monto que va Abonar\n\
                    </td>\n\
                    <td class="td_abono_op">\n\
                        <input name="" class="monto_abonado_op" type="text" style="" />\n\
                    </td>'
                                );
                                    
                                }else if(x==0){
                                    $('.td_abono_op').remove();
                                }
                                
                            });
                            
                            $(window).load(function(){
                                
                                x = $("input[name='abonar_op']:checked").val();
                                
                                if(x==1){
                                    $(".abono_porcentaje").append('\
                                    <td class="td_abono_op">\n\
                                        Monto que va Abonar\n\
                                    </td>\n\
                                    <td class="td_abono_op">\n\
                                        <input name="" class="monto_abonado_op"  type="text" style="" />\n\
                                    </td>'
                                                );
                                                }else if(x==0){
                                                    $('.td_abono_op').remove();
                                                }
                                                
                                            });
                                            
                                            
                                            
    </script>
        
    <tr>
        <td class="dias_mo_af_op">
            Dias
        </td>
        <td>
            <input id="dif_fecha_op" type="text"  readonly="readonly"  />
        </td>
    </tr>
        
    <tr>
        <td>
            Diferencial a la fecha del deposito
        </td>
        <td>
            <input type="text" value="" id="dif_a_fecha_op" readonly="readonly"  />
        </td>
    </tr>
    <tr>
        <td>
            Total a Depositar
        </td>
        <td>
            <input type="text" value="" id="tot_pagar_op" readonly="readonly"  />
        </td>
    </tr>
        
    <tr>
        <td>
            Monto de la nueva Operacion
        </td>
        <td>
            <input type="text" value="" id="nva_operacion_op" readonly="readonly"  />
        </td>
    </tr>
        
    <tr>
        
        <td colspan="2">
            <input type="submit" value="calcular_op" id="calcular_op" style="width: 100%"/>
        </td>
    </tr>
</table>
    
<script>
    $('#num_operacion').change(function(){
        $('#fecha_vencimiento').val($(this + 'option:selected').attr('fecha_vencimiento'));
        $('#fecha_de_liqu').val($(this + 'option:selected').attr('fecha_de_liquidacion'));
        $('#monto_aprobado_op').val($(this + 'option:selected').attr('value'));
        $('#porcentaje_de_compra_op').val($(this + 'option:selected').attr('porcentaje_de_compra_op'));
    });
    $(window).load(function(){
        $('#fecha_vencimiento').val($('#num_operacion' + 'option:selected').attr('fecha_vencimiento'));
        $('#monto_aprobado_op').val($('#num_operacion' + 'option:selected').attr('value'));
    });
    $('#calcular_op').click(function(){
        refresca_campos();    
    });
    
    
    function refresca_campos(){
        var fecha_1 = $('#fecha_vencimiento').val().split('-');
        var fecha_2 = $('#fecha_deposito_op').val().split('-');
        var fecha_3 = $('#fecha_de_liqu').val().split('-');
        var porcentaje_de_compra_op = $('#porcentaje_de_compra_op').val();
        var dias_restantes = FechaDif(fecha_1[2], fecha_1[1], fecha_1[0], fecha_2[2], fecha_2[1], fecha_2[0]);
        var plazo = FechaDif(fecha_1[2], fecha_1[1], fecha_1[0], fecha_3[2], fecha_3[1], fecha_3[0]);
        
        //reviso si existe mora
        if(dias_restantes>0){
            //si no existe entonces se lo resto al plazo real
            $('.dias_mo_af_op').html('Dias restantes para vencimiento');
            plazo_dado = plazo;
            plazo = parseFloat(plazo)-parseFloat(dias_restantes);
        }
        if(dias_restantes<=0){
            //si si existe entonces se lo sumo al plazo real
            $('.dias_mo_af_op').html('Dias de Mora');
            dias_restantes = -1*dias_restantes;
            plazo = parseFloat(plazo)+parseFloat(dias_restantes);
            plazo_dado = parseFloat(plazo)-parseFloat(dias_restantes);
        }
        monto_abonado_op = $('.monto_abonado_op').val();
        if(monto_abonado_op ==''){
            $('.monto_abonado_op').val(0);
            monto_abonado_op = $('.monto_abonado_op').val();
        }
        if(monto_abonado_op==undefined){
            monto_abonado_op = 0;
        }
        
        
        plazo_actual = parseFloat(plazo) ;
        rendimiento = (((100 / porcentaje_de_compra_op - 1) * (360 / plazo_dado)) * 100);
        
        nominal = $('#monto_aprobado_op').val();
        precio = (100 / (100 + ((rendimiento * plazo_actual) / 360)));
        monto = ((nominal * precio)).toFixed(2);
        dif_act = parseFloat(nominal) - parseFloat(monto);
        
        if(monto_abonado_op == 0){
            tot_pagar_op = parseFloat(nominal) - parseFloat(monto) + parseFloat(monto_abonado_op);
            nueva_ope = parseFloat(nominal) - parseFloat(monto_abonado_op);
        }else{
            if(dif_act >= parseFloat(monto_abonado_op)){
                tot_pagar_op = parseFloat(monto_abonado_op) + dif_act;
                nueva_ope = parseFloat(nominal) - parseFloat(monto_abonado_op);
            }else{
                tot_pagar_op = parseFloat(monto_abonado_op);
                nueva_ope = parseFloat(nominal) - (parseFloat(monto_abonado_op)- parseFloat(dif_act));
            }
        }
        
        //        console.log('rendimiento '+rendimiento+ ' precio '+ precio +' plazo_actual '+plazo_actual +' dias_restantes '+dias_restantes+' plazo_dado '+ plazo_dado);
        
        $('#dif_a_fecha_op').val(dif_act.toFixed(2));
        $('#dif_fecha_op').val(dias_restantes);
        $('#tot_pagar_op').val(tot_pagar_op.toFixed(2));
        $('#nva_operacion_op').val(nueva_ope.toFixed(2));
    }
    
</script>

