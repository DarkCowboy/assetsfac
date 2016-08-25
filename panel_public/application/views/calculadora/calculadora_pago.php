<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>
<script type="text/javascript" >
    $(function(){

        myCalendar = new dhtmlXCalendarObject(["fecha_dep"]);

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


<script>
    window.moveTo(0, 0);
    window.resizeTo(screen.availWidth, screen.availHeight);
</script>
<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">


        <div class="workplace">

            <div class="row-fluid">
                <div class="span12" >
                    <div class="head">
                        <div></div>
                        <h1>Calculadora de Pagos</h1>
                        <div class="clear"></div>
                        <p style="text-align: center; padding: 4px;">Esta Calculadora le ayudara a conocer cuanto debera pagar dependiendo a la fecha de pago seleccionada y el monto 
                            de la operacion que usted tiene con nosotros.</p>
                    </div>
                    <div class="block-fluid">
                        <div style="margin: 0 auto; border: 1px solid black; max-width: 800px; width: 100%; padding: 10px;">
                            <table style="width: 100%; max-width: 500px; margin: 0 auto;">
                                <tr>
                                    <td>
                                        Seleccione la Operacion a Calcular el Pago
                                    </td>
                                    <td>
                                        <select id="n_operacion">
                                            <option></option>
                                            <? foreach ($operaciones as $row) { ?>
                                                <? if ($row['status'] == '2' or $row['status'] == '6') { ?>
                                                    <? $fecha_vcto = explode(' ', $row['fecha_vcto_solicitud_aprobado']) ?>
                                                    <? $fecha_liqu = explode(' ', $row['fecha_solicitud_aprobado']) ?>
                                                    <option porcentaje_compra="<?= $row['porcentaje_compra']; ?>"fecha_vcto="<?= $fecha_vcto[0]; ?>" fecha_liq="<?= $fecha_liqu[0]; ?>" value="<?= $row['monto_solicitud_aprobado']; ?>"><?= $row['n_operacion']; ?></option> 
                                                <? } ?>
                                            <? } ?>
                                        </select>
                                    </td>

                                </tr>
                                <!--<tr>-->
<!--                                    <td>
                                        Fecha de liquidacion
                                    </td>
                                    <td>-->
                                <input id="fecha_liqu" type="hidden" readonly="readonly" />
                                <!--                                    </td>
                                                                </tr>-->
<!--                                <tr>
                                    <td>
                                        Fecha de Vencimiento
                                    </td>
                                    <td>-->
                                        <input id="fecha_vcto" type="hidden" readonly="readonly"  />
<!--                                    </td>
                                </tr>-->
                                <tr>
                                    <td>
                                        Monto de la Operacion
                                    </td>
                                    <td>
                                        <input id="monto_aprobado" type="text" readonly="readonly"  />
                                    </td>
                                </tr>
<!--                                <tr>
                                    <td>
                                        Precio
                                    </td>
                                    <td>-->
                                        <input id="porcentaje_compra" type="hidden"  readonly="readonly"  />
<!--                                    </td>
                                </tr>-->
                                <tr>
                                    <td>
                                        Seleccione la Fecha a depositar
                                    </td>
                                    <td>
                                        <input name="cantidad a abonar" id="fecha_dep" type="text" style="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Va a realizar un abono?
                                    </td>
                                    <td>
                                        Si <input type="radio" name="abonar" value="1" class="abonar"  />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        No <input type="radio" name="abonar" checked="checked" value="0" class="abonar"  />
                                    </td>
                                </tr>

                                <tr class="abono_porcentaje">

                                </tr>


                                <script> 
                                    $('.abonar').click(function(){
                                        x = $("input[name='abonar']:checked").val();
                                        if(x==1){
                                            $(".abono_porcentaje").append('\
                                                <td class="td_abono">\n\
                                                    Monto que va Abonar\n\
                                                </td>\n\
                                                <td class="td_abono">\n\
                                                    <input name="" class="monto_abonado" type="text" style="" />\n\
                                                </td>'
                                                            );
                                                  
                                                                $('#porcentaje_abonar').keyup(function(){
                                           
                                                                    mon_soli = $("option:selected", '#id_solicitud').attr('monto');
                                                                    monto = (mon_soli-((mon_soli * $(this).val()) / 100)).toFixed(2);
                                                                    $('#monto_solicitud').val(monto);
                                                                    $('#monto_solicitud').val(monto)
                                           
                                                                });
                                                                     
                                                            }else if(x==0){
                                                                $('.td_abono').remove();
                                                            }
                                            
                                                        });
                                        
                                                        $(window).load(function(){

                                                            x = $("input[name='abonar']:checked").val();

                                                            if(x==1){
                                                                $(".abono_porcentaje").append('\
                                                <td class="td_abono">\n\
                                                    Monto que va Abonar\n\
                                                </td>\n\
                                                <td class="td_abono">\n\
                                                    <input name="" class="monto_abonado"  type="text" style="" />\n\
                                                </td>'
                                                            )
                                                            }else if(x==0){
                                                                $('.td_abono').remove();
                                                            }
                                                    
                                                            $('#porcentaje_abonar').keyup(function(){
                                                                mon_soli = $("option:selected", '#id_solicitud').attr('monto');
                                                                monto = (mon_soli-((mon_soli * $(this).val()) / 100)).toFixed(2);
                                                                $('#monto_solicitud').val(monto);
                                                        
                                                                if(monto=='0.00'){
                                                                    $('#monto_solicitud').val($("option:selected", '#id_solicitud').attr('monto'));
                                                                }

                                                            });
                                                        });
                                        
                                                                
                                                            
                                </script>

                                <tr class="hidden">
                                    <td class="dias_mo_af">
                                        Dias
                                    </td>
                                    <td>
                                        <input id="dif_fecha" type="text"  readonly="readonly"  />
                                    </td>
                                </tr>

                                <tr class="hidden">
                                    <td>
                                        Diferencial a la fecha del deposito
                                    </td>
                                    <td>
                                        <input type="text" value="" id="dif_a_fecha" readonly="readonly"  />
                                    </td>
                                </tr>
                                <tr class="hidden">
                                    <td>
                                        Total a Depositar
                                    </td>
                                    <td>
                                        <input type="text" value="" id="tot_pagar" readonly="readonly"  />
                                    </td>
                                </tr>

                                <tr class="hidden">
                                    <td>
                                        Monto de la nueva Operacion
                                    </td>
                                    <td>
                                        <input type="text" value="" id="nva_operacion" readonly="readonly"  />
                                    </td>
                                </tr>

                                <tr>

                                    <td colspan="2">
                                        <input type="submit" value="calcular" id="calcular" style="width: 100%"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>


            </div>
            <div class="dr"><span></span></div>            
        </div>
    </div>   
</body>

<script>
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

  


    $('#n_operacion').change(function(){
        $('.hidden').css('display', 'none');
        $('.hidden').css('visibility', 'hidden');
        $('#fecha_vcto').val($(this + 'option:selected').attr('fecha_vcto'));
        $('#fecha_liqu').val($(this + 'option:selected').attr('fecha_liq'));
        $('#monto_aprobado').val($(this + 'option:selected').attr('value'));
        $('#porcentaje_compra').val($(this + 'option:selected').attr('porcentaje_compra'));
    });
    $(window).load(function(){
        $('#fecha_vcto').val($('#n_operacion' + 'option:selected').attr('fecha_vcto'));
        $('#monto_aprobado').val($('#n_operacion' + 'option:selected').attr('value'));
    });
    $('#calcular').click(function(){
        $('.hidden').css('display', 'table-row');
        $('.hidden').css('visibility', 'visible');
        refresca_campos();    
    });
    
    
    function refresca_campos(){
        var fecha_1 = $('#fecha_vcto').val().split('-');
        var fecha_2 = $('#fecha_dep').val().split('-');
        var fecha_3 = $('#fecha_liqu').val().split('-');
        var porcentaje_compra = $('#porcentaje_compra').val();
        var dias_restantes = FechaDif(fecha_1[2], fecha_1[1], fecha_1[0], fecha_2[2], fecha_2[1], fecha_2[0]);
        var plazo = FechaDif(fecha_1[2], fecha_1[1], fecha_1[0], fecha_3[2], fecha_3[1], fecha_3[0]);
        
        //reviso si existe mora
        if(dias_restantes>0){
            //si no existe entonces se lo resto al plazo real
            $('.dias_mo_af').html('Dias restantes para vencimiento');
            plazo_dado = plazo;
            plazo = parseFloat(plazo)-parseFloat(dias_restantes);
        }
        if(dias_restantes<=0){
            //si si existe entonces se lo sumo al plazo real
            $('.dias_mo_af').html('Dias de Mora');
            dias_restantes = -1*dias_restantes;
            plazo = parseFloat(plazo)+parseFloat(dias_restantes);
            plazo_dado = parseFloat(plazo)-parseFloat(dias_restantes);
        }
        monto_abonado = $('.monto_abonado').val();
        if(monto_abonado ==''){
            $('.monto_abonado').val(0);
            monto_abonado = $('.monto_abonado').val();
        }
        if(monto_abonado==undefined){
            monto_abonado = 0;
        }
        
       
        plazo_actual = parseFloat(plazo) ;
        rendimiento = (((100 / porcentaje_compra - 1) * (360 / plazo_dado)) * 100);

        nominal = $('#monto_aprobado').val();
        precio = (100 / (100 + ((rendimiento * plazo_actual) / 360)));
        monto = ((nominal * precio)).toFixed(2);
        dif_act = parseFloat(nominal) - parseFloat(monto);
        
        if(monto_abonado == 0){
            tot_pagar = parseFloat(nominal) - parseFloat(monto) + parseFloat(monto_abonado);
            nueva_ope = parseFloat(nominal) - parseFloat(monto_abonado);
        }else{
            if(dif_act >= parseFloat(monto_abonado)){
                tot_pagar = parseFloat(monto_abonado) + dif_act;
                nueva_ope = parseFloat(nominal) - parseFloat(monto_abonado);
            }else{
                tot_pagar = parseFloat(monto_abonado);
                nueva_ope = parseFloat(nominal) - (parseFloat(monto_abonado)- parseFloat(dif_act));
            }
        }
        
        //        console.log('rendimiento '+rendimiento+ ' precio '+ precio +' plazo_actual '+plazo_actual +' dias_restantes '+dias_restantes+' plazo_dado '+ plazo_dado);
         
        $('#dif_a_fecha').val(dif_act.toFixed(2));
        $('#dif_fecha').val(dias_restantes);
        $('#tot_pagar').val(tot_pagar.toFixed(2));
        $('#nva_operacion').val(nueva_ope.toFixed(2));
    }

</script>


<? $this->load->view('templates/footer'); ?>

</html>
