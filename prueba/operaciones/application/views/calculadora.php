<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" /> 
        <script type="text/javascript" src="js/jquery.numberformatter-1.2.3.min.js"></script>

    </head>

    <body id="cuerpo_fancy">
        <div class="cuerpo_calc_fancy">
            
            <p style="text-align: center; font-size: 17px; margin: 0px; padding: 0px; line-height: 22px; font-weight: bold; color: grey;">Esquema Factoring</p>
            <br/>
            <table>
                <tr>
                    <td>Valor Nominal</td>
                    <td class="">
                        <input type="text" id="nominal" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen;" />
                    </td>
                    <td class="">
                        <input type="text" id="nominal2" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen;" " />
                    </td>
                </tr>
                <tr>
                    <td>Precio</td>
                    <td class="">
                        <input type="text" id="precio" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="precio2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                </tr>
                <tr>
                    <td>Rendimiento Anualizado</td>
                    <td class="">
                        <input type="text" id="rendimiento" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="rendimiento2" class="numeric" style="text-align: right; background: palegreen;" value="52,17" />
                    </td>
                </tr>
                <tr>
                    <td>Plazo</td>
                    <td class="">
                        <input type="text" id="plazo" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen; " >
                    </td>
                    <td class="">
                        <input type="text" id="plazo2" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen; ">
                    </td>
                </tr>
                <tr>
                    <td>Total Desembolso</td>
                    <td class="">
                        <input type="text" id="monto" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="monto2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                </tr>
                <tr>
                    <td>Tasa Efectiva</td>
                    <td class="">
                        <input type="text" id="tefectiva" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="tefectiva2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                </tr>
                <tr>
                    <td>Inversion Inicial</td>
                    <td class="">
                        <input type="text" id="inversion" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="inversion2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                </tr>
                <tr>
                    <td>Ganancia Anual</td>
                    <td class="">
                        <input type="text" id="ganancia" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="ganancia2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                </tr>
                <tr>
                    <td>Saldo Final</td>
                    <td class="">
                        <input type="text" id="sfinal" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                    <td class="">
                        <input type="text" id="sfinal2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                    </td>
                </tr>
            </table>
        </div>
    </body>

    <script>
        $(function(){
            
            $('#nominal').click(function(){
                x = $(this).val();
                if(x=='0,00'){
                    $(this).val('');  
                }
            }); 
            
            $('#nominal').blur(function(){
                x = $(this).val();
                if(x==''){
                    $(this).val('0,00');  
                }
            }); 
            $('#plazo').click(function(){
                x = $(this).val();
                if(x=='0'){
                    $(this).val('');  
                }
            }); 
            
            $('#plazo').blur(function(){
                x = $(this).val();
                if(x==''){
                    $(this).val('0');  
                }
            }); 
            
            $('#nominal').priceFormat({
                prefix: '',
                suffix: ''
                
            });
            
            $('#nominal').keyup(function(){
                refresh(); 
            }); 

            
            
            $('#plazo').keyup(function(){
                refresh(); 
            }); 
            
            $('#nominal').click(function(){
                x = $(this).val();
                if(x=='0,00'){
                    $(this).val('');  
                }
            }); 
            
            $('#nominal').blur(function(){
                x = $(this).val();
                if(x==''){
                    $(this).val('0,00');  
                }
            }); 
            $('#plazo').click(function(){
                x = $(this).val();
                if(x=='0'){
                    $(this).val('');  
                }
            }); 
            
            $('#plazo').blur(function(){
                x = $(this).val();
                if(x==''){
                    $(this).val('0');  
                }
            }); 
            
            $('#nominal').priceFormat({
                prefix: '',
                suffix: ''
                
            });
            
            $('#nominal').keyup(function(){
                refresh(); 
            }); 

            
            
            $('#plazo').keyup(function(){
                refresh(); 
            }); 
            
                        
            $('#nominal2').click(function(){
                x = $(this).val();
                if(x=='0,00'){
                    $(this).val('');  
                }
            }); 
            
            $('#nominal2').blur(function(){
                x = $(this).val();
                if(x==''){
                    $(this).val('0,00');  
                }
            }); 
            $('#plazo2').click(function(){
                x = $(this).val();
                if(x=='0'){
                    $(this).val('');  
                }
            }); 
            
            $('#plazo2').blur(function(){
                x = $(this).val();
                if(x==''){
                    $(this).val('0');  
                }
            }); 
            
            $('#nominal2').priceFormat({
                prefix: '',
                suffix: ''
                
            });
            
            $('#rendimiento2').priceFormat({
                prefix: '',
                suffix: ''
                
            });
            
            $('#nominal2').keyup(function(){
                refresh2(); 
            }); 
            
            $('#rendimiento2').keyup(function(){
                refresh2(); 
            }); 

            
            
            $('#plazo2').keyup(function(){
                refresh2(); 
            }); 
        });
        function refresh(){
            var precio = 0;
            var monto = 0;
            var rendimiento = 0;
            var tefectiva = 0;
            var plazo = $('#plazo').val();
            var nominal = $('#nominal').val();
            nominal = nominal.replace('.', '');
            nominal = nominal.replace('.', '');
            nominal = nominal.replace('.', '');
            nominal = nominal.replace(/\,/i, '.');
            precio = ((1 / (1+((0.5217*plazo)/360)))*100).toFixed(2);
            monto = ((nominal * precio)/100).toFixed(2);
            rendimiento = (((100 / (precio) -1)*(360/plazo))*100).toFixed(2);
            rendimiento2 = (((100 / (precio) -1)*(360/plazo)));
            x = (360/plazo);
            y = (1+(rendimiento2/x));   
            tefectiva = (((Math.pow(y, x)-1)*100)).toFixed(2);
            ganancia = ((monto*rendimiento2)).toFixed(2);
            sfinal = (parseFloat(monto) + parseFloat(ganancia)).toFixed(2);
            $('#precio').val(dar_formato(precio)+'%');
            $('#monto').val(dar_formato(monto));
            $('#inversion').val(dar_formato(monto));
            $('#rendimiento').val(dar_formato(rendimiento)+'%');
            $('#tefectiva').val(dar_formato(tefectiva)+'%');
            $('#ganancia').val(dar_formato(ganancia));
            $('#sfinal').val(dar_formato(sfinal));
        }
        
        function refresh2(){
            var precio2 = 0;
            var monto2 = 0;
            var rendimiento2 = $('#rendimiento2').val();
            var tefectiva2 = 0;
            var plazo2 = $('#plazo2').val();
            var nominal2 = $('#nominal2').val();
            
            rendimiento2 = rendimiento2.replace('%', '');
            rendimiento2 = rendimiento2.replace('.', '');
            rendimiento2 = rendimiento2.replace('.', '');
            rendimiento2 = rendimiento2.replace('.', '');
            rendimiento2 = rendimiento2.replace(/\,/i, '.');
            rendimiento2 = rendimiento2 / 100;
            precio2 = ((1 / (1+((rendimiento2*plazo2)/360)))*100).toFixed(2);
            
            nominal2 = nominal2.replace('.', '');
            nominal2 = nominal2.replace('.', '');
            nominal2 = nominal2.replace('.', '');
            nominal2 = nominal2.replace(/\,/i, '.');
            
            
            monto2 = ((nominal2 * precio2)/100).toFixed(2);
            x2 = (360/plazo2);
            y2 = (1+(rendimiento2/x2));   
            tefectiva2 = (((Math.pow(y2, x2)-1)*100)).toFixed(2);
            ganancia2 = ((monto2*rendimiento2)).toFixed(2);
            sfinal2 = (parseFloat(monto2) + parseFloat(ganancia2)).toFixed(2);
            $('#precio2').val(dar_formato(precio2)+'%');
            $('#monto2').val(dar_formato(monto2));
            $('#inversion2').val(dar_formato(monto2));
            $('#tefectiva2').val(dar_formato(tefectiva2)+'%');
            $('#ganancia2').val(dar_formato(ganancia2));
            $('#sfinal2').val(dar_formato(sfinal2));
            $('#rendimiento2').val(dar_formato((rendimiento2*100).toFixed(2))+'%');
        }
        
        function dar_formato(num){
            var cadena = ""; var aux;
            var cont = 1,m,k;
            if(num<0) aux=1; else aux=0;
            num=num.toString();
            for(m=num.length-1; m>=0; m--){
                cadena = num.charAt(m) + cadena;
                if(cont%3 == 0 && m >aux)  cadena = "." + cadena; else cadena = cadena;
                if(cont== 3) cont = 1; else cont++;
            }
            cadena = cadena.replace('..', ',');
            return cadena;
        }


    </script>
</html> 