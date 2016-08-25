<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>

<script type="text/javascript" >
    $(function(){

        myCalendar = new dhtmlXCalendarObject(["fecha_dep","fecha_deposito_op"]);

        myCalendar.setSkin('dhx_terrace');
        myCalendar.hideTime();
        dhtmlXCalendarObject.prototype.langData["es"] = {
            dateformat: '%d.%m.%Y',
            monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            weekstart: 1
        }
        myCalendar.loadUserLanguage('es');

    });

</script>

<style>
    #calcular_op{
        text-align: center;
        width: 250px;
        padding-top: 8px;
        font-weight: bold;
        color: white;
    }

    .span3{
        width: 287px !important;
        padding-top: 6px;
    }
    .span9 {
        width: 38.359% !important;
    }
</style>

<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace" style="">
            <div style="width: 100%;">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="head">
                            <div class="isw-documents"></div>
                            <h1>Panel de solicitud de Prestamo</h1>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <form method="post" action="./prestamo/refinanciar/" class="form" id="validate-form" onSubmit="return valida(this); ">

                    <div class="dr"><span></span></div>

                    <div class="row-fluid">
                        <!-- datos de la Empresa -->
                        <div class="span6" style="">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos de la Solicitud</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group">
                                    <input type="hidden" name="tipo_solicitud" id="tipo_solicitud" value="4" />  

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Seleccione la operacion a refinanciar</div>                 
                                        <div class="span9">

                                            <select name="rollover" id="id_solicitud"  style="width: 143px;">
                                                <? foreach ($ope_activas as $row) { ?>
                                                    <? if ($row['tipo_solicitud'] == 4) { ?>
                                                        <? if ($row['status_solicitud'] == 6 or $row['status_solicitud'] == 2) { ?>
                                                            <? $fecha_vcto = explode(' ', $row['fecha_vcto_solicitud_aprobado']) ?>
                                                            <? $fecha_liqu = explode(' ', $row['fecha_solicitud_aprobado']) ?>
                                                            <option porcentaje_compra="<?= $row['porcentaje_compra']; ?>"fecha_vcto="<?= $fecha_vcto[0]; ?>" fecha_liq="<?= $fecha_liqu[0]; ?>" monto="<?= $row['monto_solicitud_aprobado']; ?> " value="<?= $row['id_solicitud']; ?>"><?= $row['n_operacion']; ?></option> 
                                                        <? } ?>
                                                    <? } ?>
                                                <? } ?>
                                            </select>
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <script> 
                                        
                                        $('#id_solicitud').change(function(){
                                            $('#fecha_vcto').val($(this + 'option:selected').attr('fecha_vcto'));
                                            $('#fecha_liqu').val($(this + 'option:selected').attr('fecha_liq'));
                                            $('#monto_sol_apr').val($(this + 'option:selected').attr('monto'));
                                            $('#porcentaje_compra').val($(this + 'option:selected').attr('porcentaje_compra'));
                                        });
                                       
                                       
                                        $(window).load(function(){
                                            $('#fecha_vcto').val($(this + 'option:selected').attr('fecha_vcto'));
                                            $('#fecha_liqu').val($(this + 'option:selected').attr('fecha_liq'));
                                            $('#monto_sol_apr').val($(this + 'option:selected').attr('monto'));
                                            $('#porcentaje_compra').val($(this + 'option:selected').attr('porcentaje_compra'));
                                        });
                                    </script>

                                    <!--calculos-->
                                    <input type="hidden" name="monto_sol_apr" id="monto_sol_apr" style="width:130px; text-align: right;"  />  
                                    <input type="hidden" name="fecha_vcto" id="fecha_vcto" style="width:130px; text-align: right;"  />  
                                    <input type="hidden" name="fecha_liqu" id="fecha_liqu" style="width:130px; text-align: right;"  />  
                                    <input type="hidden" name="porcentaje_compra" id="porcentaje_compra" style="width:130px; text-align: right;"  />  
                                    <!--fin de calculos-->


                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Seleccione el Tipo de Pago realizado:</div>                 
                                        <div class="span9">
                                            Deposito: <input type="radio" checked="checked" name="t_pago" value="1" class="t_pago"  />  
                                            Transferencia: <input type="radio" name="t_pago"  value="0" class="t_pago"  />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Seleccione el Banco donde Realizo la Operacion:</div>                 
                                        <div class="span9">
                                            <select name="banco">
                                                <option value="Banco Activo">Banco Activo</option>
                                                <option value="Banco BOD / CorpBanca">Banco BOD / CorpBanca</option>
                                                <option value="Banco de Venezuela">Banco de Venezuela</option>
                                            </select> 
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <script> 
                                        $('.t_pago').click(function(){
                                            x = $("input[name='t_pago']:checked").val();
                                           
                                            if(x==1){
                                                $(".div_pago").remove();
                                                $(".ref_dep_tran").append('\
                                                        <div class="div_pago"><div class="span3 " style="line-height: 16px;">\n\
                                                             Numero de vauche del Deposito.\n\
                                                        </div>\n\
                                                        <div class="span9">\n\
                                                            <input type="text" data-required="true" id="ref_bancaria" style="width:124px; text-align: right;" />\n\
                                                        </div>\n\
                                                    <div class="clear"></div>'
                                                                    );
                                                                    }else if(x==0){
                                                                        $(".div_pago").remove();
                                                                        $(".ref_dep_tran").append('\
                                                        <div class="div_pago"><div class="span3 " style="line-height: 16px;">\n\
                                                          Numero de vauche de la Transferencia.\n\
                                        </div>\n\
                                        <div class="span9">\n\
                                            <input type="text"  data-required="true" id="ref_bancaria" style="width:124px; text-align: right;" />\n\
                                        </div>\n\
                                    <div class="clear"></div>'
                                                    );
                                                    }
                                                });
                                    </script>

                                    <div class="row-form ref_dep_tran">
                                        <div class="div_pago">
                                            <div class="span3 " style="line-height: 16px;">
                                                Numero de vauche del Deposito.
                                            </div>
                                            <div class="span9">
                                                <input type="text" data-required="true" id="ref_bancaria" name="ref_bancaria" style="width:124px; text-align: right;" />
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>


                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Fecha del Pago realizado:</div>                 
                                        <div class="span9">
                                            <input type="input" name="fecha_pago" id="fecha_dep" data-required="true"  class="fecha_pago"  style="width: 73px; color: #454545; text-align: right; font-size: 11px;" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <script>
                                        $('#fecha_pago').keyup(function(){
                                            $(this).val('');
                                        });
                                        $('#fecha_pago').keydown(function(){
                                            $(this).val('');
                                        });
                                    </script>


                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Monto Depositado:</div>                 
                                        <div class="span9">
                                            <input type="text" name="monto_depositado" id="monto_depositado" style="width:130px; text-align: right;  border-bottom-left-radius:0px !important; border-bottom-right-radius:0px !important; border-top-right-radius:0px !important; border-top-left-radius:0px !important;"  />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>
                                    <script>
                                        $('.monto_depositado').priceFormat({
                                            prefix: '',
                                            suffix: '',
                                            centsLimit: 2,
                                            centsSeparator: ','
                
                                        });
                
                                        $('#monto_depositado').keyup(function(){
                                            x = refresca_campos();  
                                            $('#monto_solicitud').val(x);
                                            $('#monto_solicitud2').val(x);
                                            
                                            $('.monto_view').priceFormat({
                                                prefix: '',
                                                suffix: '',
                                                centsLimit: 2,
                                                centsSeparator: ','
                
                                            });
                                        });
                                       
                                    </script>


                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Monto del Nuevo Prestamo:</div>                 
                                        <div class="span9">
                                            <input type="text" class="monto_view" readonly="readonly" id="monto_solicitud2" style="width:130px; text-align: right;"/>  

                                            <input type="hidden"  readonly="readonly" name="monto_solicitud" id="monto_solicitud" style="width:130px; text-align: right;"  />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>


                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Plazo a pagar la nueva solicitud (en dias):</div>                 
                                        <div class="span9">
                                            <input type="text" name="plazo_solicitud" id="plazo_solicitud" data-required="true" value="<?= @$solicitud['plazo_solicitud'] ?>" onkeypress="return permite(event, 'num')" style="width:64px;"/>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Destino en donde se utilizara los fondos solicitados:</div>                 
                                        <div class="span9">
                                            <input type="text" name="destino_solicitud" id="destino_solicitud" data-required="true" value="<?= @$solicitud['destino_solicitud'] ?>"style="width:219px;" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-fluid" style="left: 11px; position: relative; top: 12px;">
                                        <div class="span12">
                                            <div class="head" style="width: 226px;">
                                                <button type="submit" class="btn btn-block">Enviar Solicitud de Prestamo</button>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>

                        <div class="span6" style="">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Requisitos para la solicitud de Prestamo</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">

                                <div class="row-form">
                                    <ol>
                                        <li>Fotocopia de la cedula de identidad y la del conyuge en caso de ser casado</li>
                                        <li>Registro de información fiscal. RIF</li>
                                        <li>Balance personal con antigüedad no mayor a tres (3) meses debidamente firmado por un Contador Publico Colegiado</li>
                                        <li>Referencias bancarias en original con antigüedad no mayor a sesenta (60) días</li>
                                        <li>Copia legible de I.S.L.R.  del  último año </li>
                                        <li>Constancia de trabajo o certificación de Ingresos firmada por un Contador Publico Colegiado
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>




                        <div class="span6" style="margin-top: 10px;">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Calculadora de Pago</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">

                                <div class="row-form">        


                                    <table style="width: 100%; max-width: 500px; margin: 0 auto;">
                                        <tr>
                                            <td>
                                                Seleccione la Operacion a Calcular el Pago
                                            </td>
                                            <td>
                                                <select id="num_operacion">
                                                    <option></option>
                                                    <? foreach ($ope_activas as $row) { ?>
                                                        <? if ($row['tipo_solicitud'] == 3) { ?>
                                                            <? $fecha_vncto = explode(' ', $row['fecha_vcto_solicitud_aprobado']) ?>
                                                            <? $fecha_de_liquidacion = explode(' ', $row['fecha_solicitud_aprobado']) ?>
                                                            <option porcentaje_de_compra_op="<?= $row['porcentaje_compra']; ?>"fecha_vencimiento="<?= $fecha_vncto[0]; ?>" fecha_de_liquidacion="<?= $fecha_de_liquidacion[0]; ?>" monto="<?= $row['monto_solicitud_aprobado']; ?>" value="<?= $row['monto_solicitud_aprobado']; ?>"><?= $row['n_operacion']; ?></option> 
                                                        <? } ?>
                                                    <? } ?>

                                                </select>
                                            </td>
                                        </tr>
        <!--                                <tr>
                                            <td>
                                                Fecha de liquidacion
                                            </td>
                                            <td>-->
                                        <input id="fecha_de_liqu" type="hidden" readonly="readonly" />
                                        <!--                                    </td>
                                                                        </tr>-->
                                        <!--                                <tr>
                                                                            <td>
                                                                                Fecha de Vencimiento
                                                                            </td>
                                                                            <td>-->
                                        <input id="fecha_vencimiento" type="hidden" readonly="readonly"  />
                                        <!--                                    </td>
                                                                        </tr>-->
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
                                        <tr class="display_none" style="display:none;">
                                            <td class="dias_mo_af_op">
                                                Dias
                                            </td>
                                            <td>
                                                <input id="dif_fecha_op" type="text"  readonly="readonly"  />
                                            </td>
                                        </tr>
                                        <tr class="display_none" style="display:none;">
                                            <td>
                                                Diferencial a la fecha del deposito
                                            </td>
                                            <td>
                                                <input type="text" value="" id="dif_a_fecha_op" readonly="readonly"  />
                                            </td>
                                        </tr>
                                        <tr class="display_none" style="display:none;">
                                            <td>
                                                Total a Depositar
                                            </td>
                                            <td>
                                                <input type="text" value="" id="tot_pagar_op" readonly="readonly"  />
                                            </td>
                                        </tr>
                                        <tr class="display_none" style="display:none;">
                                            <td>
                                                Monto de la nueva Operacion
                                            </td>
                                            <td>
                                                <input type="text" value="" id="nva_operacion_op" readonly="readonly"  />
                                            </td>
                                        </tr>
                                        <tr>

                                            <td colspan="2">
                                                <div id="calcular_op" class="btn">Calcular</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row-fluid">
                    </div>
                    <div class="dr"><span></span></div>

                </form>
            </div>
        </div>   
    </div>   
</body>

<script>
    function valida(form){
        y = $('#monto_solicitud').val();
        console.log(y);
        if (y==''){
            alert('Debe Seleccionar la operacion que desea refinanciar');
            return false;
        }else{
            if (parseFloat(x) > parseFloat(y)){
                alert('Recuerde que el Monto maximo de Facturas a Presenta es de '+ y);
                return false;
            }else{
                return validator(form);
            }
        }
    }
    
    
    function refresca_campos(){
        var fecha_1 = $('#fecha_vcto').val().split('-');
        var fecha_2 = $('#fecha_dep').val().split('-');
        var fecha_3 = $('#fecha_liqu').val().split('-');
        var porcentaje_compra = $('#porcentaje_compra').val();
        var dias_restantes = FechaDif(fecha_1[2], fecha_1[1], fecha_1[0], fecha_2[2], fecha_2[1], fecha_2[0]);
        var plazo = FechaDif(fecha_1[2], fecha_1[1], fecha_1[0], fecha_3[2], fecha_3[1], fecha_3[0]);
        
        
        console.log(fecha_1+' '+fecha_2+' '+fecha_3);
        //reviso si existe mora
        if(dias_restantes>0){
            //si no existe entonces se lo resto al plazo real
            plazo_dado = plazo;
            plazo = parseFloat(plazo)-parseFloat(dias_restantes);
        }
        if(dias_restantes<=0){
            //si si existe entonces se lo sumo al plazo real
            dias_restantes = -1*dias_restantes;
            plazo = parseFloat(plazo)+parseFloat(dias_restantes);
            plazo_dado = parseFloat(plazo)-parseFloat(dias_restantes);
        }
        monto_depositado = $('#monto_depositado').val();
        if(monto_depositado ==''){
            $('#monto_depositado').val(0);
            monto_depositado = $('#monto_depositado').val();
        }
        if(monto_depositado==undefined){
            monto_depositado = 0;
        }
        
        console.log(monto_depositado);
       
        plazo_actual = parseFloat(plazo) ;
        rendimiento = (((100 / porcentaje_compra - 1) * (360 / plazo_dado)) * 100);

        nominal = $('#monto_sol_apr').val();
        precio = (100 / (100 + ((rendimiento * plazo_actual) / 360)));
        monto = ((nominal * precio)).toFixed(2);
        dif_act = (parseFloat(nominal) - parseFloat(monto)).toFixed(2);
        
        if(monto_depositado == 0){
            nueva_ope = parseFloat(nominal) - parseFloat(monto_depositado);
        }else{
            if(dif_act == parseFloat(monto_depositado)){
                nueva_ope = parseFloat(nominal);
            }else if(dif_act > parseFloat(monto_depositado)){
                nueva_ope = parseFloat(nominal) - parseFloat(monto_depositado);
            }else{
                nueva_ope = parseFloat(nominal) - (parseFloat(monto_depositado)- parseFloat(dif_act));
            }
        }
        
        console.log('nominal '+nominal+ ' monto_depositado '+ monto_depositado +' dif_act '+dif_act);
         
        $('#dif_a_fecha').val(dif_act);
        $('#dif_fecha').val(dias_restantes);
        $('#nva_operacion').val(nueva_ope.toFixed(2));
        
        return nueva_ope.toFixed(2);
    }

    
    function FechaDif(dia1,mes1,anio1,dia2,mes2,anio2)
    {
        var dias1,dias2,dif;
        //convertir a numeros
        dia1 = parseInt(dia1,10);
        mes1 = parseInt(mes1,10);
        anio1 = parseInt(anio1,10);
        dia2 = parseInt(dia2,10);
        mes2 = parseInt(mes2,10);
        anio2 = parseInt(anio2,10);
			
        //Chequear valores.
        if((mes1>12)||(mes2>12)){ return -1;}
			
        if((mes1==1)||(mes1==3)||(mes1==5)||(mes1==7)||(mes1==8)||(mes1==10)||(mes1==12)){
            if(dia1>31){
                return -1;}
        }
        if((mes2==1)||(mes2==3)||(mes2==5)||(mes2==7)||(mes2==8)||(mes2==10)||(mes2==12)){
            if(dia2>31){
                return -1;}
        }
        if((mes1==4)||(mes1==6)||(mes1==9)||(mes1==11)){
            if(dia1>30){
                return -1;}
        }
        if((mes2==4)||(mes2==6)||(mes2==9)||(mes2==11)){
            if(dia2>30){
                return -1;}
        }
        if(mes1==2 && dia1>29){
            return -1;}
        if(mes2==2 && dia2>29){
            return -1;}
        
        dias1 = FechaADias(dia1,mes1,anio1);
        dias2 = FechaADias(dia2,mes2,anio2);
        //devolver la diferencia positiva
        dif = dias2 - dias1;
        if(dif<0){
            return ((dif));}
        return dif;
    }
    
    function FechaADias(dia, mes, anno){
        dia = parseInt(dia,10);
        mes = parseInt(mes,10);
        anno = parseInt(anno,10);
        
        var cant_dias, no_es_bic;
			
        //verificar la cantidad de biciestos en el periodo (div entera)
        //+1 p/contar 1904
        
        cant_bic = parseInt((anno-1904)/4 + 1);
        //        cant_bic = parseInt((anno-1904)/4 );
        no_es_bic = parseInt((anno % 4));
			
        //calcular dias transcurridoes desde el 31 de dic del año anterior
        //hasta el mes anterior al ingresado
        var i;
        dias_transcurridos = 0;
        for(i=1;i<mes;i++){
            if((i==1)||(i==3)||(i==5)||(i==7)||(i==8)||(i==10)||(i==12)){
                dias_transcurridos+=31;
                
            }
            if((i==4)||(i==6)||(i==9)||(i==11)){
                dias_transcurridos+=30;
            }
            if(i==2)
            {
                if(no_es_bic){
                    dias_transcurridos+=28;
                    ;
                }
                else{
                    dias_transcurridos+=29;
                    ;}
            }
        }	
        //sumarle los dias transcurridos en el mes
        cant_dias+=dia;
        dias_transcurridos+=dia;
        return -1*dias_transcurridos;
    }
                                            
                                            
</script>
<? $this->load->view('templates/footer'); ?>


<script>
    $('#num_operacion').change(function(){
        $('#fecha_vencimiento').val($(this).find('option:selected').attr('fecha_vencimiento'));
        $('#fecha_de_liqu').val($(this).find('option:selected').attr('fecha_de_liquidacion'));
        $('#monto_aprobado_op').val($(this).find('option:selected').attr('monto'));
        $('#porcentaje_de_compra_op').val($(this).find('option:selected').attr('porcentaje_de_compra_op'));
    });
    $(window).load(function(){
        $('#fecha_vencimiento').val($(this).find('option:selected').attr('fecha_vencimiento'));
        $('#monto_aprobado_op').val($(this).find('option:selected').attr('monto'));
    });
    $('#calcular_op').click(function(){
        refresca_campos_op();    
        $('.display_none').css('display', 'block')
    });
    function refresca_campos_op(){
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
</html>
