<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <script type="text/javascript" src="./scripts/jquery.min.js"></script>
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" />
        <link type="text/css" href="./scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
        <script type="text/javascript" src="./scripts/lib.validator/lib.validator.js"></script>
        <script type="text/javascript" src="./scripts/jquery.numberformatter-1.2.3.min.js"></script>

    </head>

    <body id="cuerpo_fancy">
        <div class="cuerpo_calc_fancy">
            <p class="fancy_titulo">Calculadora de Factoring</p>
            <br/>
            <p class="">Ingrese el monto total de las facturas a vender:</p>
            <p class=""><input type="text" id="nominal" class="numeric" data-required="true" value="0" style="text-align: right;" ></p>
            <p class="">Ingrese el plazo en dias a pagar:</p>
            <p class=""><input type="text" id="plazo" class="numeric" data-required="true" value="0" style="text-align: right;" onkeypress="return permite(event, 'numpunto')"></p>
            <p class="">Precio de Compra:</p>
            <p class=""><input type="text" id="precio" class="numeric" readonly="readonly" style="text-align: right;" /></p>
            <p class="">Monto a recibir:</p>
            <p class=""><input type="text" id="monto" class="numeric" readonly="readonly" style="text-align: right;" /></p>
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
        });
        function refresh(){
            var precio = 0;
            var monto = 0;
            var plazo = $('#plazo').val();
            var nominal = $('#nominal').val();
            nominal = nominal.replace('.', '');
            nominal = nominal.replace(/\,/i, '.');
            console.log(nominal);
            precio = ((1 / (1+((0.25*plazo)/360)))*100).toFixed(2);
            monto = ((nominal * precio)/100).toFixed(2);
            $('#precio').val(precio+'%');
            $('#monto').val(dar_formato(monto));
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