
/**************************************
            Validaciones de Formato y 
            Campos Vacios
    ****************************************/   
   
$('.planill_datos').focus(function(){
    if($(this).val()=='0'){
        $(this).val('');
    }
});
$('.planill_datos').blur(function(){
    if($(this).val()==''){
        $(this).val('0');
    }
});

    
$('input[type=text][class=IwTextFieldReclasificacion]').focus(function(){        
    validarCampo($(this));        		
});    
    
$('input[type=text][class=IwTextFieldReclasificacion]').blur(function(){        
    validarCampoVacio($(this));
});  
        
formatoNumero("#txtcajachica");
formatoNumero("#txtcajachica2");
formatoNumero("#txtcajachica3");
formatoNumero("#txtcajabancos");
formatoNumero("#txtcajabancos2");
formatoNumero("#txtcajabancos3"); 
formatoNumero("#txtctascobrar");  
formatoNumero("#txtctascobrar2");  
formatoNumero("#txtctascobrar3");
formatoNumero("#txtCtasCobrarAccRel0"); 
formatoNumero("#txtefeccobrar");
formatoNumero("#txtefeccobrar2");
formatoNumero("#txtefeccobrar3");   
formatoNumero("#txtincobrables");
formatoNumero("#txtincobrables2");            
formatoNumero("#txtincobrables3");
formatoNumero("#txtinvmateriaprima");
formatoNumero("#txtinvmateriaprima2");
formatoNumero("#txtinvmateriaprima3");    
formatoNumero("#txtinvmaterialproc"); 
formatoNumero("#txtinvmaterialproc2"); 
formatoNumero("#txtinvmaterialproc3");
formatoNumero("#txtinvprodterminado");  
formatoNumero("#txtinvprodterminado2");
formatoNumero("#txtinvprodterminado3");   
formatoNumero("#txtobsolencia");      
formatoNumero("#txtobsolencia2");
formatoNumero("#txtobsolencia3");
formatoNumero("#txtterrenos");   
formatoNumero("#txtterrenos2");
formatoNumero("#txtterrenos3");
formatoNumero("#txtedif");
formatoNumero("#txtedif2");
formatoNumero("#txtedif3");
formatoNumero("#txtmaquinaria");
formatoNumero("#txtmaquinaria2");  
formatoNumero("#txtmaquinaria3");   
formatoNumero("#txtinstmejoras");  
formatoNumero("#txtinstmejoras2");  
formatoNumero("#txtinstmejoras3");  
formatoNumero("#txtmobiliario");  
formatoNumero("#txtmobiliario2");
formatoNumero("#txtmobiliario3");
formatoNumero("#txtRespAccHerra");
formatoNumero("#txtRespAccHerra2");
formatoNumero("#txtRespAccHerra3");
formatoNumero("#txtvehiculo");    
formatoNumero("#txtvehiculo2");
formatoNumero("#txtvehiculo3");
formatoNumero("#txtdepreciacion");
formatoNumero("#txtdepreciacion2");
formatoNumero("#txtdepreciacion3");
formatoNumero("#txtContrucEnProceso");
formatoNumero("#txtContrucEnProceso2");                     
formatoNumero("#txtContrucEnProceso3");
formatoNumero("#txtdepgarantia");
formatoNumero("#txtdepgarantia2");
formatoNumero("#txtdepgarantia3");  
formatoNumero("#txtcargosdif");
formatoNumero("#txtcargosdif2");
formatoNumero("#txtcargosdif3");
formatoNumero("#txtcredfiscal");  
formatoNumero("#txtcredfiscal2");            
formatoNumero("#txtcredfiscal3");  
formatoNumero("#txtctascobraracc");  
formatoNumero("#txtctascobraracc2");  
formatoNumero("#txtctascobraracc3");
formatoNumero("#txtotrosact");
formatoNumero("#txtotrosact2");
formatoNumero("#txtotrosact3");  
formatoNumero("#txtobligbancarias");  
formatoNumero("#txtobligbancarias2");
formatoNumero("#txtobligbancarias3");  
formatoNumero("#txtdeudalp");
formatoNumero("#txtdeudalp2");                          
formatoNumero("#txtdeudalp3");
formatoNumero("#txtctaspagar");
formatoNumero("#txtctaspagar2");
formatoNumero("#txtctaspagar3");
formatoNumero("#txtefecpagar");
formatoNumero("#txtefecpagar2");
formatoNumero("#txtefecpagar3");
formatoNumero("#txtretenciones");  
formatoNumero("#txtretenciones2");
formatoNumero("#txtretenciones3");
formatoNumero("#txtgastosacum");                    
formatoNumero("#txtgastosacum2");  
formatoNumero("#txtgastosacum3");
formatoNumero("#txtimpuestospagar");    
formatoNumero("#txtimpuestospagar2");  
formatoNumero("#txtimpuestospagar3");  
formatoNumero("#txtprestaciones");
formatoNumero("#txtprestaciones2");
formatoNumero("#txtprestaciones3");
formatoNumero("#txtotrospasivos");
formatoNumero("#txtotrospasivos2");
formatoNumero("#txtotrospasivos3");  
formatoNumero("#txtCtasAccionistas");  
formatoNumero("#txtCtasAccionistas2");    
formatoNumero("#txtCtasAccionistas3");
formatoNumero("#txtctaspagarlp");
formatoNumero("#txtctaspagarlp2");
formatoNumero("#txtctaspagarlp3");
formatoNumero("#txtcapitalsocial");
formatoNumero("#txtcapitalsocial2");  
formatoNumero("#txtcapitalsocial3");  
formatoNumero("#txtcapitalnopago");  
formatoNumero("#txtcapitalnopago2");
formatoNumero("#txtcapitalnopago3");
formatoNumero("#txtreserva");
formatoNumero("#txtreserva2");
formatoNumero("#txtreserva3");  
formatoNumero("#txtSuperavitAcum");
formatoNumero("#txtSuperavitAcum2");
formatoNumero("#txtSuperavitAcum3");
formatoNumero("#txtSuperavitReeval");                          
formatoNumero("#txtSuperavitReeval2");
formatoNumero("#txtSuperavitReeval3");  
formatoNumero("#txtejercicio");  
formatoNumero("#txtejercicio2");  
formatoNumero("#txtejercicio3");  
formatoNumero("#txtVentasNetas");  
formatoNumero("#txtVentasNetas2");  
formatoNumero("#txtVentasNetas3");  
formatoNumero("#txtCostoVentas");  
formatoNumero("#txtCostoVentas2");  
formatoNumero("#txtCostoVentas3");                          
formatoNumero("#txtGastosAdm");  
formatoNumero("#txtGastosAdm2");  
formatoNumero("#txtGastosAdm3");  
formatoNumero("#txtOtrosIngresos");  
formatoNumero("#txtOtrosIngresos2");
formatoNumero("#txtOtrosIngresos3");    
formatoNumero("#txtOtrosEgresos");  
formatoNumero("#txtOtrosEgresos2");  
formatoNumero("#txtOtrosEgresos3");  
formatoNumero("#txtGastosFinanc");  
formatoNumero("#txtGastosFinanc2");  
formatoNumero("#txtGastosFinanc3");  
formatoNumero("#txtislr");  
formatoNumero("#txtislr2");  
formatoNumero("#txtislr3");  
formatoNumero("#txtAjustePlanta");  
formatoNumero("#txtAjustePlanta2");  
formatoNumero("#txtAjustePlanta3");  
formatoNumero("#txtAjusteInv");  
formatoNumero("#txtAjusteInv2");  
formatoNumero("#txtAjusteInv3");                        
formatoNumero("#txtmobiliario");  
formatoNumero("#txtmobiliario2");                          
formatoNumero("#txtmobiliario3");  
formatoNumero("#txtAumCapSocial");  
formatoNumero("#txtAumCapSocial2");  
formatoNumero("#txtAumCapSocial3");                          
formatoNumero("#txtDismCapSocial");  
formatoNumero("#txtDismCapSocial2");  
formatoNumero("#txtDismCapSocial3");  
formatoNumero("#txtAumReservaLegal");  
formatoNumero("#txtAumReservaLegal2");  
formatoNumero("#txtAumReservaLegal3");  
    
/**************************************
            Suma de campos Activos 
            circulantes y Pasivos
    ****************************************/
    
$('#txtcajachica').change(function() {	     
    sumaTotalActCirc('#txtcajachica');
    setRefresca_Todos_Campos();
         
});
    
$('#txtcajachica2').change(function() {
    sumaTotalActCirc2('#txtcajachica2');
    setRefresca_Todos_Campos();
});
    
$('#txtcajachica3').change(function() {
    sumaTotalActCirc3('#txtcajachica3');
    setRefresca_Todos_Campos();
});
    
$('#txtcajabancos').change(function() {
    sumaTotalActCirc('#txtcajabancos');
    setRefresca_Todos_Campos();
});
    
$('#txtcajabancos2').change(function() {
    sumaTotalActCirc2('#txtcajabancos2');
    setRefresca_Todos_Campos();
});
    
$('#txtcajabancos3').change(function() {
    sumaTotalActCirc3('#txtcajabancos3');
    setRefresca_Todos_Campos();

});
    
$('#txtctascobrar').change(function() {
    sumaTotalActCirc('#txtctascobrar');
    setRefresca_Todos_Campos();
});
    
$('#txtctascobrar2').change(function() {
    sumaTotalActCirc2('#txtctascobrar2');
    setRefresca_Todos_Campos();
});
    
$('#txtctascobrar3').change(function() {
    sumaTotalActCirc3('#txtctascobrar3');
    setRefresca_Todos_Campos();
});
    
$('#txtefeccobrar').change(function() {
    sumaTotalActCirc('#txtefeccobrar');
    setRefresca_Todos_Campos();
});
    
$('#txtefeccobrar2').change(function() {
    sumaTotalActCirc2('#txtefeccobrar2');
    setRefresca_Todos_Campos();
});
    
$('#txtefeccobrar3').change(function() {
    sumaTotalActCirc3('#txtefeccobrar3');
    setRefresca_Todos_Campos();
});
    
$('#txtincobrables').change(function() {
    sumaTotalActCirc('#txtincobrables');
    setRefresca_Todos_Campos();
});
    
$('#txtincobrables2').change(function() {
    sumaTotalActCirc2('#txtincobrables2');
    setRefresca_Todos_Campos();
});
        
$('#txtincobrables3').change(function() {
    sumaTotalActCirc3('#txtincobrables3');
    setRefresca_Todos_Campos();
});
                        
$('#txtinvmateriaprima').change(function() {
    sumaTotalActCirc('#txtinvmateriaprima');
    setRefresca_Todos_Campos();
});
    
$('#txtinvmateriaprima2').change(function() {
    sumaTotalActCirc2('#txtinvmateriaprima2');
    setRefresca_Todos_Campos();
});

$('#txtinvmateriaprima3').change(function() {
    sumaTotalActCirc3('#txtinvmateriaprima3');
    setRefresca_Todos_Campos();
});
    
$('#txtinvmaterialproc').change(function() {
    sumaTotalActCirc('#txtinvmaterialproc');
    setRefresca_Todos_Campos();
});

$('#txtinvmaterialproc2').change(function() {
    sumaTotalActCirc2('#txtinvmaterialproc2');
    setRefresca_Todos_Campos();
});
     
$('#txtinvmaterialproc3').change(function() {
    sumaTotalActCirc3('#txtinvmaterialproc3');
    setRefresca_Todos_Campos();
});
    
$('#txtinvprodterminado').change(function() {
    sumaTotalActCirc('#txtinvprodterminado');
    setRefresca_Todos_Campos();
});

$('#txtinvprodterminado2').change(function() {
    sumaTotalActCirc2('#txtinvprodterminado2');
    setRefresca_Todos_Campos();
});
    
$('#txtinvprodterminado3').change(function() {
    sumaTotalActCirc3('#txtinvprodterminado3');
    setRefresca_Todos_Campos();
});
    
$('#txtobsolencia').change(function() {
    sumaTotalActCirc('#txtobsolencia');
    setRefresca_Todos_Campos();
});    
       
$('#txtobsolencia2').change(function() {
    sumaTotalActCirc2('#txtobsolencia2');
    setRefresca_Todos_Campos();
});
    
$('#txtobsolencia3').change(function() {
    sumaTotalActCirc3('#txtobsolencia3');
    setRefresca_Todos_Campos();
});                 
        
$('#txtterrenos').change(function() {
    sumaTotalActFijo('#txtterrenos');
    setRefresca_Todos_Campos();
});
                   
$('#txtterrenos2').change(function() {
    sumaTotalActFijo2('#txtterrenos2');
    setRefresca_Todos_Campos();
});
    
$('#txtterrenos3').change(function() {
    sumaTotalActFijo3('#txtterrenos3');
    setRefresca_Todos_Campos();
});
    
$('#txtedif').change(function() {
    sumaTotalActFijo('#txtedif');
    setRefresca_Todos_Campos();
});
     
$('#txtedif2').change(function() {
    sumaTotalActFijo2('#txtedif2');
    setRefresca_Todos_Campos();
});
        
$('#txtedif3').change(function() {
    sumaTotalActFijo3('#txtedif3');
    setRefresca_Todos_Campos();
});
         
$('#txtmaquinaria').change(function() {
    sumaTotalActFijo('#txtmaquinaria');
    setRefresca_Todos_Campos();
});
      
$('#txtmaquinaria2').change(function() {
    sumaTotalActFijo2('#txtmaquinaria2');
    setRefresca_Todos_Campos();
});
    
$('#txtmaquinaria3').change(function() {
    sumaTotalActFijo3('#txtmaquinaria3');
    setRefresca_Todos_Campos();
});

$('#txtinstmejoras').change(function() {
    sumaTotalActFijo('#txtinstmejoras');
    setRefresca_Todos_Campos();
});
         
$('#txtinstmejoras2').change(function() {	
    sumaTotalActFijo2('#txtinstmejoras2');
    setRefresca_Todos_Campos();
});
         
$('#txtinstmejoras3').change(function() {
    sumaTotalActFijo3('#txtinstmejoras3');
    setRefresca_Todos_Campos();
});

$('#txtmobiliario').change(function() {
    sumaTotalActFijo('#txtmobiliario');
    setRefresca_Todos_Campos();
});
                        
$('#txtmobiliario2').change(function() {
    sumaTotalActFijo2('#txtmobiliario2');
    setRefresca_Todos_Campos();
});

$('#txtmobiliario3').change(function() {
    sumaTotalActFijo3('#txtmobiliario3');
    setRefresca_Todos_Campos();
});

$('#txtRespAccHerra').change(function() {
    sumaTotalActFijo('#txtRespAccHerra');
    setRefresca_Todos_Campos();
});

$('#txtRespAccHerra2').change(function() {
    sumaTotalActFijo2('#txtRespAccHerra2');
    setRefresca_Todos_Campos();
});                        
       
$('#txtRespAccHerra3').change(function() {
    sumaTotalActFijo3('#txtRespAccHerra3');
    setRefresca_Todos_Campos();
});
			
$('#txtvehiculo').change(function() {
    sumaTotalActFijo('#txtvehiculo');
    setRefresca_Todos_Campos();
});
    
$('#txtvehiculo2').change(function() {
    sumaTotalActFijo2('#txtvehiculo2');
    setRefresca_Todos_Campos();
});
			
$('#txtvehiculo3').change(function() {
    sumaTotalActFijo3('#txtvehiculo3');
    setRefresca_Todos_Campos();
});
	
$('#txtdepreciacion').change(function() {
    sumaTotalActFijo('#txtdepreciacion');
    setRefresca_Todos_Campos();
});
			
$('#txtdepreciacion2').change(function() {
    sumaTotalActFijo2('#txtdepreciacion2');
    setRefresca_Todos_Campos();       
});
	
$('#txtdepreciacion3').change(function() {
    sumaTotalActFijo3('#txtdepreciacion3');
    setRefresca_Todos_Campos();
});
	
$('#txtContrucEnProceso').change(function() {
    sumaTotalActFijo('#txtContrucEnProceso');
    setRefresca_Todos_Campos();
});
			
$('#txtContrucEnProceso2').change(function() {
    sumaTotalActFijo2('#txtContrucEnProceso2');
    setRefresca_Todos_Campos();       
});
	
$('#txtContrucEnProceso3').change(function() {
    sumaTotalActFijo3('#txtContrucEnProceso3');
    setRefresca_Todos_Campos();
});
    
$('#txtdepgarantia').change(function() {
    sumaTotalOtrosAct('#txtdepgarantia');
    setRefresca_Todos_Campos();
});
     
$('#txtdepgarantia2').change(function() {
    sumaTotalOtrosAct2('#txtdepgarantia2');
    setRefresca_Todos_Campos();
});
	
$('#txtdepgarantia3').change(function() {
    sumaTotalOtrosAct3('#txtdepgarantia3');
    setRefresca_Todos_Campos();
});
	
$('#txtcargosdif').change(function() {
    sumaTotalOtrosAct('#txtcargosdif');
    setRefresca_Todos_Campos();
});
			
$('#txtcargosdif2').change(function() {
    sumaTotalOtrosAct2('#txtcargosdif2');
    setRefresca_Todos_Campos();
});
	
$('#txtcargosdif3').change(function() {
    sumaTotalOtrosAct3('#txtcargosdif3');
    setRefresca_Todos_Campos();
});
	
$('#txtcredfiscal').change(function() {
    sumaTotalOtrosAct('#txtcredfiscal');
    setRefresca_Todos_Campos();
});
			
$('#txtcredfiscal2').change(function() {
    sumaTotalOtrosAct2('#txtcredfiscal2');
    setRefresca_Todos_Campos();
});
	
$('#txtcredfiscal3').change(function() {
    sumaTotalOtrosAct3('#txtcredfiscal3');
    setRefresca_Todos_Campos();
});
	
$('#txtctascobraracc').change(function() {
    sumaTotalOtrosAct('#txtctascobraracc');
    setRefresca_Todos_Campos();
});
	
$('#txtctascobraracc2').change(function() {
    sumaTotalOtrosAct2('#txtctascobraracc2');
    setRefresca_Todos_Campos();
});
	
$('#txtctascobraracc3').change(function() {
    sumaTotalOtrosAct3('#txtctascobraracc3');
    setRefresca_Todos_Campos();
});
	
$('#txtotrosact').change(function() {
    sumaTotalOtrosAct('#txtotrosact');
    setRefresca_Todos_Campos();
});			
			
$('#txtotrosact2').change(function() {
    sumaTotalOtrosAct2('#txtotrosact2');
    setRefresca_Todos_Campos();
});

$('#txtotrosact3').change(function() {
    sumaTotalOtrosAct3('#txtotrosact3');
    setRefresca_Todos_Campos();
});
		
$('#txtobligbancarias').change(function() {
    sumaTotalPasivoCirc('#txtobligbancarias');
    setRefresca_Todos_Campos();
});
	
$('#txtobligbancarias2').change(function() {
    sumaTotalPasivoCirc2('#txtobligbancarias2');
    setRefresca_Todos_Campos();
});
			
$('#txtobligbancarias3').change(function() {
    sumaTotalPasivoCirc3('#txtobligbancarias3');
    setRefresca_Todos_Campos();
});
	
$('#txtdeudalp').change(function() {
    sumaTotalPasivoCirc('#txtdeudalp');
    setRefresca_Todos_Campos();
});
	
$('#txtdeudalp2').change(function() {
    sumaTotalPasivoCirc2('#txtdeudalp2');
    setRefresca_Todos_Campos();
});
	
$('#txtdeudalp3').change(function() {
    sumaTotalPasivoCirc3('#txtdeudalp3');
    setRefresca_Todos_Campos();
});
			
$('#txtctaspagar').change(function() {
    sumaTotalPasivoCirc('#txtctaspagar');
    setRefresca_Todos_Campos();
});
	
$('#txtctaspagar2').change(function() {
    sumaTotalPasivoCirc2('#txtctaspagar2');
    setRefresca_Todos_Campos();
});
			
$('#txtctaspagar3').change(function() {
    validarCampoVacio($('#txtctaspagar3'));
    sumaTotalPasivoCirc3('#txtctaspagar3');
    setRefresca_Todos_Campos();
});
	
$('#txtefecpagar').change(function() {
    sumaTotalPasivoCirc('#txtefecpagar');
    setRefresca_Todos_Campos();
});
	
$('#txtefecpagar2').change(function() {
    sumaTotalPasivoCirc2('#txtefecpagar2');
    setRefresca_Todos_Campos();
});
	
$('#txtefecpagar3').change(function() {
    sumaTotalPasivoCirc3('#txtefecpagar3');
    setRefresca_Todos_Campos();
});
	
$('#txtretenciones').change(function() {
    sumaTotalPasivoCirc('#txtretenciones');
    setRefresca_Todos_Campos();
});
			
$('#txtretenciones2').change(function() {
    sumaTotalPasivoCirc2('#txtretenciones2');
    setRefresca_Todos_Campos();
});
	
$('#txtretenciones3').change(function() {
    sumaTotalPasivoCirc3('#txtretenciones3');
    setRefresca_Todos_Campos();
});
			
$('#txtgastosacum').change(function() {
    sumaTotalPasivoCirc('#txtgastosacum');
    setRefresca_Todos_Campos();
});
	
$('#txtgastosacum2').change(function() {
    sumaTotalPasivoCirc2('#txtgastosacum2');
    setRefresca_Todos_Campos();
});
    
$('#txtgastosacum3').change(function() {
    sumaTotalPasivoCirc3('#txtgastosacum3');
    setRefresca_Todos_Campos();
});
	
$('#txtimpuestospagar').change(function() {
    sumaTotalPasivoCirc('#txtimpuestospagar');
    setRefresca_Todos_Campos();
});
			
$('#txtimpuestospagar2').change(function() {
    sumaTotalPasivoCirc2('#txtimpuestospagar2');
    setRefresca_Todos_Campos();
});
	
$('#txtimpuestospagar3').change(function() {
    sumaTotalPasivoCirc3('#txtimpuestospagar3');
    setRefresca_Todos_Campos();
});
	
$('#txtprestaciones').change(function() {
    sumaTotalPasivoCirc('#txtprestaciones');
    setRefresca_Todos_Campos();
});
	
$('#txtprestaciones2').change(function() {
    sumaTotalPasivoCirc2('#txtprestaciones2');
    setRefresca_Todos_Campos();
});
    
$('#txtprestaciones3').change(function() {
    sumaTotalPasivoCirc3('#txtprestaciones3');
    setRefresca_Todos_Campos();
});
			
$('#txtotrospasivos').change(function() {
    sumaTotalPasivoCirc('#txtotrospasivos');
    setRefresca_Todos_Campos();
});
	
$('#txtotrospasivos2').change(function() {
    sumaTotalPasivoCirc2('#txtotrospasivos2');
    setRefresca_Todos_Campos();
});
	
$('#txtotrospasivos3').change(function() {
    sumaTotalPasivoCirc3('#txtotrospasivos3');
    setRefresca_Todos_Campos();
});
	
$('#txtCtasAccionistas').change(function() {
    sumaTotalPasivoLP('#txtCtasAccionistas');
    setRefresca_Todos_Campos();
});
	
$('#txtCtasAccionistas2').change(function() {
    sumaTotalPasivoLP2('#txtCtasAccionistas2');
    setRefresca_Todos_Campos();
});
	
$('#txtCtasAccionistas3').change(function() {
    sumaTotalPasivoLP3('#txtCtasAccionistas3');
    setRefresca_Todos_Campos();
});
			
$('#txtctaspagarlp').change(function() {
    sumaTotalPasivoLP('#txtctaspagarlp');
    setRefresca_Todos_Campos();
});
	
$('#txtctaspagarlp2').change(function() {
    sumaTotalPasivoLP2('#txtctaspagarlp2');
    setRefresca_Todos_Campos();
});
	
$('#txtctaspagarlp3').change(function() {
    sumaTotalPasivoLP3('#txtctaspagarlp3');
    setRefresca_Todos_Campos();
});
    
$('#txtcapitalsocial').change(function() {
    sumaTotalCapital('#txtcapitalsocial');
    setRefresca_Todos_Campos();
});			
	
$('#txtcapitalsocial2').change(function() {
    sumaTotalCapital2('#txtcapitalsocial2');
    setRefresca_Todos_Campos();
});
    
$('#txtcapitalsocial3').change(function() {
    sumaTotalCapital3('#txtcapitalsocial3');
    setRefresca_Todos_Campos();
});
	
$('#txtcapitalnopago').change(function() {
    sumaTotalCapital('#txtcapitalnopago');
    setRefresca_Todos_Campos();
});
	
$('#txtcapitalnopago2').change(function() {
    sumaTotalCapital2('#txtcapitalnopago2');
    setRefresca_Todos_Campos();
});
			
$('#txtcapitalnopago3').change(function() {
    sumaTotalCapital3('#txtcapitalnopago3');
    setRefresca_Todos_Campos();
});
			
$('#txtreserva').change(function() {
    sumaTotalCapital('#txtreserva');
    setRefresca_Todos_Campos();
});
			
$('#txtreserva2').change(function() {
    sumaTotalCapital2('#txtreserva2');
    setRefresca_Todos_Campos();
});
	
$('#txtreserva3').change(function() {
    sumaTotalCapital3('#txtreserva3');
    setRefresca_Todos_Campos();
});
	
$('#txtSuperavitAcum').change(function() {
    sumaTotalCapital('#txtSuperavitAcum');
    setRefresca_Todos_Campos();
});
	
$('#txtSuperavitAcum2').change(function() {
    sumaTotalCapital2('#txtSuperavitAcum2');
    setRefresca_Todos_Campos();
});
    
$('#txtSuperavitAcum3').change(function() {
    sumaTotalCapital3('#txtSuperavitAcum3');
    setRefresca_Todos_Campos();
});
    
$('#txtSuperavitReeval').change(function() {
    sumaTotalCapital('#txtSuperavitReeval');
    setRefresca_Todos_Campos();
});
	
$('#txtSuperavitReeval2').change(function() {
    sumaTotalCapital2('#txtSuperavitReeval2');
    setRefresca_Todos_Campos();
});
	
$('#txtSuperavitReeval3').change(function() {
    sumaTotalCapital3('#txtSuperavitReeval3');
    setRefresca_Todos_Campos();
});
	
$('#txtejercicio').change(function() {
    sumaTotalCapital('#txtejercicio');
    setRefresca_Todos_Campos();	
});
    
$('#txtejercicio2').change(function() {
    sumaTotalCapital2('#txtejercicio2');
    setRefresca_Todos_Campos();
});
	
$('#txtejercicio3').change(function() {
    sumaTotalCapital3('#txtejercicio3');
    setRefresca_Todos_Campos();
});
	
$('#txtVentasNetas').change(function() {
    beneficioBruto('#txtVentasNetas');
    setRefresca_Todos_Campos();
});
	
$('#txtVentasNetas2').change(function() {	
    beneficioBruto2('#txtVentasNetas2');
    setRefresca_Todos_Campos();
});
	
$('#txtVentasNetas3').change(function() {
    beneficioBruto3('#txtVentasNetas3');
    setRefresca_Todos_Campos();
});
    
$('#txtCostoVentas').change(function() {
    beneficioBruto('#txtCostoVentas');
    setRefresca_Todos_Campos();
});
	
$('#txtCostoVentas2').change(function() {
    beneficioBruto2('#txtCostoVentas2');
    setRefresca_Todos_Campos();
});
	
$('#txtCostoVentas3').change(function() {
    beneficioBruto3('#txtCostoVentas3');
    setRefresca_Todos_Campos();
});
	
$('#txtGastosAdm').change(function() {
    benefNetoEnOper('#txtGastosAdm');
    setRefresca_Todos_Campos();
});
	
$('#txtGastosAdm2').change(function() {
    benefNetoEnOper2('#txtGastosAdm2');
    setRefresca_Todos_Campos();
});
	
$('#txtGastosAdm3').change(function() {
    benefNetoEnOper3('#txtGastosAdm3');
    setRefresca_Todos_Campos();
});
	
$('#txtOtrosIngresos').change(function() {
    benefAntesImpYNoUsuales('#txtOtrosIngresos');
    setRefresca_Todos_Campos();
});
	
$('#txtOtrosIngresos2').change(function() {
    benefAntesImpYNoUsuales2('#txtOtrosIngresos2');
    setRefresca_Todos_Campos();
});
			
$('#txtOtrosIngresos3').change(function() {
    benefAntesImpYNoUsuales3('#txtOtrosIngresos3');
    setRefresca_Todos_Campos();
});
			
$('#txtOtrosEgresos').change(function() {
    benefAntesImpYNoUsuales('#txtOtrosEgresos');
    setRefresca_Todos_Campos();
});
			
$('#txtOtrosEgresos2').change(function() {
    benefAntesImpYNoUsuales2('#txtOtrosEgresos2');
    setRefresca_Todos_Campos();
});
	
$('#txtOtrosEgresos3').change(function() {
    benefAntesImpYNoUsuales3('#txtOtrosEgresos3');
    setRefresca_Todos_Campos();
});
	
$('#txtGastosFinanc').change(function() {
    benefAntesImpYNoUsuales('#txtGastosFinanc');
    setRefresca_Todos_Campos();
});
	
$('#txtGastosFinanc2').change(function() {
    benefAntesImpYNoUsuales2('#txtGastosFinanc2');
    setRefresca_Todos_Campos();
});			
			
$('#txtGastosFinanc3').change(function() {
    benefAntesImpYNoUsuales3('#txtGastosFinanc3');
    setRefresca_Todos_Campos();
});
    
$('#txtislr').change(function() {
    benefNetoDespNoUsuales('#txtislr');
    setRefresca_Todos_Campos();
});
    
$('#txtislr2').change(function() {
    benefNetoDespNoUsuales2('#txtislr2');
    setRefresca_Todos_Campos();
});
	
$('#txtislr3').change(function() {
    benefNetoDespNoUsuales3('#txtislr3');
    setRefresca_Todos_Campos();
});
			
$('#txtAjustePlanta').change(function() {
    benefNetoDespNoUsuales('#txtAjustePlanta');
    setRefresca_Todos_Campos();
});
	
$('#txtAjustePlanta2').change(function() {
    benefNetoDespNoUsuales2('#txtAjustePlanta2');
    setRefresca_Todos_Campos();
});
	
$('#txtAjustePlanta3').change(function() {
    benefNetoDespNoUsuales3('#txtAjustePlanta3');
    setRefresca_Todos_Campos();
});
			
$('#txtAjusteInv').change(function() {
    benefNetoDespNoUsuales('#txtAjusteInv');
    setRefresca_Todos_Campos();
});
	
$('#txtAjusteInv2').change(function() {
    benefNetoDespNoUsuales2('#txtAjusteInv2');
    setRefresca_Todos_Campos();
});
	
$('#txtAjusteInv3').change(function() {
    benefNetoDespNoUsuales3('#txtAjusteInv3');
    setRefresca_Todos_Campos();
});
	
$('#txtDivPagosEfect').change(function() {
    resultadoEjercicio('#txtDivPagosEfect');
    setRefresca_Todos_Campos();
});
	
$('#txtDivPagosEfect2').change(function() {
    resultadoEjercicio2('#txtDivPagosEfect2');
    setRefresca_Todos_Campos();
});
			
$('#txtDivPagosEfect3').change(function() {
    resultadoEjercicio3('#txtDivPagosEfect3');
    setRefresca_Todos_Campos();
});
			
$('#txtAumCapSocial').change(function() {
    aumDismCapContable('#txtAumCapSocial');
    setRefresca_Todos_Campos();
});
	
$('#txtAumCapSocial2').change(function() {
    aumDismCapContable2('#txtAumCapSocial2');
    setRefresca_Todos_Campos();
});
	
$('#txtAumCapSocial3').change(function() {
    aumDismCapContable3('#txtAumCapSocial3');
    setRefresca_Todos_Campos();
});
			
$('#txtDismCapSocial').change(function() {
    aumDismCapContable('#txtDismCapSocial');
    setRefresca_Todos_Campos();
});
	
$('#txtDismCapSocial2').change(function() {
    aumDismCapContable2('#txtDismCapSocial2');
    setRefresca_Todos_Campos();
});
	
$('#txtDismCapSocial3').change(function() {
    aumDismCapContable3('#txtDismCapSocial3');
    setRefresca_Todos_Campos();
});
			
$('#txtAumReservaLegal').change(function() {
    aumDismCapContable('#txtAumReservaLegal');
    setRefresca_Todos_Campos();
});
	
$('#txtAumReservaLegal2').change(function() {
    aumDismCapContable2('#txtAumReservaLegal2');
    setRefresca_Todos_Campos();
});
	
$('#txtAumReservaLegal3').change(function() {
    aumDismCapContable3('#txtAumReservaLegal3');
    setRefresca_Todos_Campos();
});
			
    
    
/**************************************
            Calculo de campos de 
            Flujo de Fondos
    ****************************************/
    
/** Beneficio Neto despues de no Usuaeles **/
        
$('#txtBenefDespNoUsuales').blur(function() {            
    setRefresca_Todos_Campos();			  			  
});
    
$('#txtBenefDespNoUsuales2').blur(function() {
    setValue($('#txtBenefDespNoUsuales2'),$('#txtFFBenefNetoDespNoUsu'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();			  			  
});

$('#txtBenefDespNoUsuales3').blur(function() {
    setValue($('#txtBenefDespNoUsuales3'),$('#txtFFBenefNetoDespNoUsu2'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();          			  			  
});
                
    
/**  Depreciacion primer a�o   **/
        
$('#txtdepreciacion2').blur(function() {
    getDepreciacion_0($('#txtdepreciacion2').attr('value'), $('#txtdepreciacion').attr('value'), $('#txtDepreciacion0'));        
    getDepreciacion_0($('#txtdepreciacion3').attr('value'), $('#txtdepreciacion2').attr('value'), $('#txtDepreciacion1'));
        
        
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();
        			  			  
});
    
$('#txtdepreciacion').blur(function() {
    getDepreciacion_0($('#txtdepreciacion2').attr('value'), $('#txtdepreciacion').attr('value'), $('#txtDepreciacion0'));
    getDepreciacion_0($('#txtdepreciacion3').attr('value'), $('#txtdepreciacion2').attr('value'), $('#txtDepreciacion1'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();			  			  
});

/**  Depreciacion sugundo a�o   **/

$('#txtdepreciacion3').blur(function() {
    getDepreciacion_0($('#txtdepreciacion2').attr('value'), $('#txtdepreciacion').attr('value'), $('#txtDepreciacion0'));
    getDepreciacion_0($('#txtdepreciacion3').attr('value'), $('#txtdepreciacion2').attr('value'), $('#txtDepreciacion1'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();			  			  
});
    
    
/** Provisi�n para Impuesto **/
    
$('#txtislr2').blur(function() {        	
    setValue($('#txtislr2'),$('#txtProvImp0'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();
});
    
$('#txtislr3').blur(function() {
    setValue($('#txtislr3'),$('#txtProvImp1'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();		  			  
});
    
    
/** Provisi�n de Cuentas Incobrables **/
    
$('#txtincobrables2').blur(function() {        	
    restaDosValores_Asigna($('#txtincobrables2'), $('#txtincobrables'), $('#txtProvCtasInco0'));
    setRefresca_Todos_Campos();		  			  
});
    
$('#txtincobrables3').blur(function() {
    restaDosValores_Asigna($('#txtincobrables3'), $('#txtincobrables2'), $('#txtProvCtasInco1'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();		  			  
});
    
/** Provision de Obsolencia  **/
    
$('#txtobsolencia2').blur(function() {
    restaDosValores_Asigna($('#txtobsolencia2'), $('#txtobsolencia'), $('#txtProvObsolencia0'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();		  			  
});
    
$('#txtobsolencia3').blur(function() {
    restaDosValores_Asigna($('#txtobsolencia3'), $('#txtobsolencia2'), $('#txtProvObsolencia1'));
    //setGeneracion_Absor_Operaciones();
    setRefresca_Todos_Campos();		  			  
});  
    
/**********************************************************************************************/
/***  Campos que se usaran en el calculo de Generaci�n o Absorci�n Por Inversi�n de Trabajo ***/
/**********************************************************************************************/
    
/** Cuentas por cobrar **/
    
$('#txtctascobrar').blur(function(){        
    restaDosValores_Asigna($('#txtctascobrar'),$('#txtctascobrar2'),$('#txtCtasCobrar0'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});
    
$('#txtctascobrar2').blur(function(){        
    restaDosValores_Asigna($('#txtctascobrar'),$('#txtctascobrar2'),$('#txtCtasCobrar0')); 
    restaDosValores_Asigna($('#txtctascobrar2'),$('#txtctascobrar3'),$('#txtCtasCobrar1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();               
});

$('#txtctascobrar3').blur(function(){        
    restaDosValores_Asigna($('#txtctascobrar2'),$('#txtctascobrar3'),$('#txtCtasCobrar1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});
    
/** Efectos por cobrar **/
    
$('#txtefeccobrar').blur(function(){        
    restaDosValores_Asigna($('#txtefeccobrar'),$('#txtefeccobrar2'),$('#txtEfecCobrar0'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});
    
$('#txtefeccobrar2').blur(function(){        
    restaDosValores_Asigna($('#txtefeccobrar'),$('#txtefeccobrar2'),$('#txtEfecCobrar0')); 
    restaDosValores_Asigna($('#txtefeccobrar2'),$('#txtefeccobrar3'),$('#txtEfecCobrar1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();               
});

$('#txtefeccobrar3').blur(function(){        
    restaDosValores_Asigna($('#txtefeccobrar2'),$('#txtefeccobrar3'),$('#txtEfecCobrar1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});
    
    
/** Inventarios **/
    
$('#txtinvmateriaprima').blur(function(){        
    setInvetarios();    
    setRefresca_Todos_Campos();            
});

$('#txtinvmateriaprima2').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
});
    
$('#txtinvmateriaprima3').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
});

$('#txtinvmaterialproc').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
});

$('#txtinvmaterialproc2').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
});
    
$('#txtinvmaterialproc3').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
}); 
    
$('#txtinvprodterminado').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
}); 
    
$('#txtinvprodterminado2').blur(function(){        
    setInvetarios();           
    setRefresca_Todos_Campos();     
});
    
$('#txtinvprodterminado3').blur(function(){        
    setInvetarios();
    setRefresca_Todos_Campos();
});  
    
/** Cuentas por pagar **/
    
$('#txtctaspagar').blur(function(){        
    restaDosValores_Asigna($('#txtctaspagar2'),$('#txtctaspagar'),$('#txtCtasPagar0'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});
    
$('#txtctaspagar2').blur(function(){        
    restaDosValores_Asigna($('#txtctaspagar2'),$('#txtctaspagar'),$('#txtCtasPagar0'));
    restaDosValores_Asigna($('#txtctaspagar3'),$('#txtctaspagar2'),$('#txtCtasPagar1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});
    
$('#txtctaspagar3').blur(function(){
    validarCampoVacio($('#txtctaspagar3'));
    restaDosValores_Asigna($('#txtctaspagar3'),$('#txtctaspagar2'),$('#txtCtasPagar1'));    
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();            
});
    
/** Efectos por pagar **/
    
$('#txtefecpagar').blur(function(){
    restaDosValores_Asigna($('#txtefecpagar2'),$('#txtefecpagar'),$('#txtEfecPagar0'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});


$('#txtefecpagar2').blur(function(){
    restaDosValores_Asigna($('#txtefecpagar2'),$('#txtefecpagar'),$('#txtEfecPagar0'));
    restaDosValores_Asigna($('#txtefecpagar3'),$('#txtefecpagar2'),$('#txtEfecPagar1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();
                        
}); 
    
$('#txtefecpagar3').blur(function(){
    validarCampoVacio($('#txtefecpagar3'));
    restaDosValores_Asigna($('#txtefecpagar3'),$('#txtefecpagar2'),$('#txtEfecPagar1'));   
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();             
});   
    
/** Gastos Acumulados **/ 
    
$('#txtgastosacum').blur(function(){
    restaDosValores_Asigna($('#txtgastosacum2'),$('#txtgastosacum'),$('#txtGastosAcum0'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});

$('#txtgastosacum2').blur(function(){
    restaDosValores_Asigna($('#txtgastosacum2'),$('#txtgastosacum'),$('#txtGastosAcum0'));
    restaDosValores_Asigna($('#txtgastosacum3'),$('#txtgastosacum2'),$('#txtGastosAcum1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
}); 
    
$('#txtgastosacum3').blur(function(){
    restaDosValores_Asigna($('#txtgastosacum3'),$('#txtgastosacum2'),$('#txtGastosAcum1'));
    //setGeneracion_Absor_InversionDeTrabajo();
    setRefresca_Todos_Campos();                
});   
    
/**********************************************************************************************/
/***  Campos que se usaran en el calculo de Gasto e Inversion en Planta
    /**********************************************************************************************/
    
$('#txtdepreciacion').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
});
 
$('#txtdepreciacion2').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
});

$('#txtTotalActFijo').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
}); 
    
$('#txtTotalActFijo2').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
}); 
    
$('#txtdepreciacion2').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
}); 
    
$('#txtdepreciacion3').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
});

$('#txtTotalActFijo2').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
}); 
    
$('#txtTotalActFijo3').blur(function(){
    //setGastos_Inversion_En_Planta();
    setRefresca_Todos_Campos();                
});   
    
    
/**********************************************************************************************/
/***  Campos que se usaran en el calculo de Generaci�n o Absorci�n por Otros Activos o Pasivos:                   ***/
/**********************************************************************************************/
    
/** Depositos en Garantia **/ 
	
$('#txtdepgarantia').blur(function(){
    restaDosValores_Asigna($('#txtdepgarantia'),$('#txtdepgarantia2'),$('#txtDepoGaran0'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtdepgarantia2').blur(function(){
    restaDosValores_Asigna($('#txtdepgarantia'),$('#txtdepgarantia2'),$('#txtDepoGaran0'));
    restaDosValores_Asigna($('#txtdepgarantia2'),$('#txtdepgarantia3'),$('#txtDepoGaran1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtdepgarantia3').blur(function(){
    restaDosValores_Asigna($('#txtdepgarantia2'),$('#txtdepgarantia3'),$('#txtDepoGaran1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
    
/** Cargos Diferidos y Otros Activos **/
    
$('#txtcargosdif').blur(function(){
    setCargosDiferidos_Activos();
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});

$('#txtcargosdif2').blur(function(){
    //setCargosDiferidos_Activos();
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
}); 
    
$('#txtcargosdif3').blur(function(){
    //setCargosDiferidos_Activos();
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
 
$('#txtotrosact').blur(function(){
    //setCargosDiferidos_Activos();
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
}); 
    
$('#txtotrosact2').blur(function(){
    //setCargosDiferidos_Activos();
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
}); 
    
$('#txtotrosact3').blur(function(){
    //setCargosDiferidos_Activos();
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
}); 
    
/** Credito Fiscal y Gastos Prepagados **/
    
$('#txtcredfiscal').blur(function(){
    restaDosValores_Asigna($('#txtcredfiscal'),$('#txtcredfiscal2'),$('#txtCredFiscalGastoPrep0'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtcredfiscal2').blur(function(){
    restaDosValores_Asigna($('#txtcredfiscal'),$('#txtcredfiscal2'),$('#txtCredFiscalGastoPrep0'));
    restaDosValores_Asigna($('#txtcredfiscal2'),$('#txtcredfiscal3'),$('#txtCredFiscalGastoPrep1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtcredfiscal3').blur(function(){
    restaDosValores_Asigna($('#txtcredfiscal2'),$('#txtcredfiscal3'),$('#txtCredFiscalGastoPrep1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
    
/** Cuentas por Cobrar Accionistas, Relacionadas y Otras  **/
    
$('#txtctascobraracc').blur(function(){
    restaDosValores_Asigna($('#txtctascobraracc'),$('#txtctascobraracc2'),$('#txtCtasCobrarAccRel0'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtctascobraracc2').blur(function(){
    restaDosValores_Asigna($('#txtctascobraracc'),$('#txtctascobraracc2'),$('#txtCtasCobrarAccRel0'));
    restaDosValores_Asigna($('#txtctascobraracc2'),$('#txtctascobraracc3'),$('#txtCtasCobrarAccRel1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtctascobraracc3').blur(function(){
    restaDosValores_Asigna($('#txtctascobraracc2'),$('#txtctascobraracc3'),$('#txtCtasCobrarAccRel1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
/** Impuestos por Pagar y Retenciones **/
    
$('#txtctascobraracc').blur(function(){
    restaDosValores_Asigna($('#txtctascobraracc'),$('#txtctascobraracc2'),$('#txtCtasCobrarAccRel0'));        
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtctascobraracc2').blur(function(){
    restaDosValores_Asigna($('#txtctascobraracc'),$('#txtctascobraracc2'),$('#txtCtasCobrarAccRel0'));
    restaDosValores_Asigna($('#txtctascobraracc2'),$('#txtctascobraracc3'),$('#txtCtasCobrarAccRel1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});   
	
$('#txtctascobraracc3').blur(function(){
    restaDosValores_Asigna($('#txtctascobraracc2'),$('#txtctascobraracc3'),$('#txtCtasCobrarAccRel1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});    
    
/** Impuestos por Pagar y Retenciones **/
    
$('#txtimpuestospagar').blur(function(){
    setImpuestos_Pag_Ret();
    setRefresca_Todos_Campos();        
});

$('#txtimpuestospagar2').blur(function(){
    setImpuestos_Pag_Ret();
    setRefresca_Todos_Campos();
});
 
$('#txtimpuestospagar3').blur(function(){
    setImpuestos_Pag_Ret();
    setRefresca_Todos_Campos();
});

$('#txtislr').blur(function(){
    setImpuestos_Pag_Ret();
    setRefresca_Todos_Campos();
});

$('#txtislr2').blur(function(){
    setImpuestos_Pag_Ret();
    setRefresca_Todos_Campos();
});

$('#txtislr3').blur(function(){
    setImpuestos_Pag_Ret();
    setRefresca_Todos_Campos();
});
    
    
/** Retenciones por Pagar  **/
    
$('#txtretenciones').blur(function(){
    restaDosValores_Asigna($('#txtretenciones2'),$('#txtretenciones'),$('#txtRetenPagar0'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
$('#txtretenciones2').blur(function(){
    restaDosValores_Asigna($('#txtretenciones2'),$('#txtretenciones'),$('#txtRetenPagar0'));
    restaDosValores_Asigna($('#txtretenciones3'),$('#txtretenciones2'),$('#txtRetenPagar1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
$('#txtretenciones3').blur(function(){
    restaDosValores_Asigna($('#txtretenciones3'),$('#txtretenciones2'),$('#txtRetenPagar1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
    
/** Prestaciones sociales por pagar **/
    
$('#txtprestaciones').blur(function(){
    restaDosValores_Asigna($('#txtprestaciones2'),$('#txtprestaciones'),$('#txtPrestSocialesPagar0'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
$('#txtprestaciones2').blur(function(){
    restaDosValores_Asigna($('#txtprestaciones2'),$('#txtprestaciones'),$('#txtPrestSocialesPagar0'));
    restaDosValores_Asigna($('#txtprestaciones3'),$('#txtprestaciones2'),$('#txtPrestSocialesPagar1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
$('#txtprestaciones3').blur(function(){
    restaDosValores_Asigna($('#txtprestaciones3'),$('#txtprestaciones2'),$('#txtPrestSocialesPagar1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
    
/** Otros Pasivos Corrientes  **/
    
$('#txtotrospasivos').blur(function(){
    restaDosValores_Asigna($('#txtotrospasivos2'),$('#txtotrospasivos'),$('#txtOtrosPasivosCorr0'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
$('#txtotrospasivos2').blur(function(){
    restaDosValores_Asigna($('#txtotrospasivos2'),$('#txtotrospasivos'),$('#txtOtrosPasivosCorr0'));
    restaDosValores_Asigna($('#txtotrospasivos3'),$('#txtotrospasivos2'),$('#txtOtrosPasivosCorr1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
$('#txtotrospasivos3').blur(function(){
    restaDosValores_Asigna($('#txtotrospasivos3'),$('#txtotrospasivos2'),$('#txtOtrosPasivosCorr1'));
    //setGeneracion_Absor_OtrosActivosPasivos();
    setRefresca_Todos_Campos();
});
    
    
    
/**************************************************************************************************/
/***  Campos que se usaran en el calculo de Generaci�n o Absorci�n por Inversiones y Dividendos ***/
/**************************************************************************************************/
    
/** Inversiones **/
    
$('#txtotrosact').blur(function(){
    restaDosValores_Asigna($('#txtotrosact'),$('#txtotrosact2'),$('#txtInversiones0'));
    //setGeneracion_Absor_InversionDividendos();
    setRefresca_Todos_Campos();       
});


$('#txtotrosact2').blur(function(){
    restaDosValores_Asigna($('#txtotrosact'),$('#txtotrosact2'),$('#txtInversiones0'));
    restaDosValores_Asigna($('#txtotrosact2'),$('#txtotrosact3'),$('#txtInversiones1'));
    //setGeneracion_Absor_InversionDividendos();
    setRefresca_Todos_Campos();       
});    
    
$('#txtotrosact3').blur(function(){
    restaDosValores_Asigna($('#txtotrosact2'),$('#txtotrosact3'),$('#txtInversiones1'));   
    //setGeneracion_Absor_InversionDividendos();
    setRefresca_Todos_Campos();    
});
    
    
/** Pago de dividendos (-) / Reposici�n de P�rdida (+): **/
    
$('#txtejercicio').blur(function(){
    //setPagoDividendos_ReposicionPerd();
    //setGeneracion_Absor_InversionDividendos();
    setRefresca_Todos_Campos();       
});
    
$('#txtejercicio2').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos(); 
});

$('#txtejercicio3').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos(); 
});

$('#txtSuperavitAcum').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos(); 
}); 
    
$('#txtSuperavitAcum2').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos() 
    setRefresca_Todos_Campos();
});
    
$('#txtSuperavitAcum3').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos(); 
});
    
$('#txtResultadoEjercicio').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos(); 
});

$('#txtResultadoEjercicio2').blur(function(){
    //setPagoDividendos_ReposicionPerd();      
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos(); 
});

$('#txtResultadoEjercicio3').blur(function(){
    //setPagoDividendos_ReposicionPerd();     
    //setGeneracion_Absor_InversionDividendos()
    setRefresca_Todos_Campos();  
});    
    
    
    
/**************************************************************************************************/
/***  Campos que se usaran en el calculo de Generaci�n o Absorbci�n Por Financiamiento          ***/
/**************************************************************************************************/
    
    
/* Pr�stamos a corto plazo */
    
$('#txtobligbancarias').blur(function(){
    restaDosValores_Asigna($('#txtobligbancarias2'),$('#txtobligbancarias'),$('#txtPrestamoCP0'));
    setRefresca_Todos_Campos();  
});
    
$('#txtobligbancarias2').blur(function(){
    restaDosValores_Asigna($('#txtobligbancarias2'),$('#txtobligbancarias'),$('#txtPrestamoCP0')); 
    restaDosValores_Asigna($('#txtobligbancarias3'),$('#txtobligbancarias2'),$('#txtPrestamoCP1'));       
    setRefresca_Todos_Campos();  
});

$('#txtobligbancarias3').blur(function(){        
    restaDosValores_Asigna($('#txtobligbancarias3'),$('#txtobligbancarias2'),$('#txtPrestamoCP1'));
    setRefresca_Todos_Campos();  
});
    
    
/* Porci�n circulante Pr�stamo a Largo Plazo */
    
$('#txtdeudalp').blur(function(){
    restaDosValores_Asigna($('#txtdeudalp2'),$('#txtdeudalp'),$('#txtPrestamoLP0'));
    setRefresca_Todos_Campos();  
});
    
$('#txtdeudalp2').blur(function(){
    restaDosValores_Asigna($('#txtdeudalp2'),$('#txtdeudalp'),$('#txtPrestamoLP0')); 
    restaDosValores_Asigna($('#txtdeudalp3'),$('#txtdeudalp2'),$('#txtPrestamoLP1'));       
    setRefresca_Todos_Campos();  
});

$('#txtdeudalp3').blur(function(){        
    restaDosValores_Asigna($('#txtdeudalp3'),$('#txtdeudalp2'),$('#txtPrestamoLP1'));
    setRefresca_Todos_Campos();  
});
    
/* Cuentas por Pagar Relacionadas */
    
$('#txtCtasAccionistas').blur(function(){
    restaDosValores_Asigna($('#txtCtasAccionistas2'),$('#txtCtasAccionistas'),$('#txtCtasPagarRel0'));
    setRefresca_Todos_Campos();  
});
    
$('#txtCtasAccionistas2').blur(function(){
    restaDosValores_Asigna($('#txtCtasAccionistas2'),$('#txtCtasAccionistas'),$('#txtCtasPagarRel0')); 
    restaDosValores_Asigna($('#txtCtasAccionistas3'),$('#txtCtasAccionistas2'),$('#txtCtasPagarRel1'));       
    setRefresca_Todos_Campos();  
});

$('#txtCtasAccionistas3').blur(function(){        
    restaDosValores_Asigna($('#txtCtasAccionistas3'),$('#txtCtasAccionistas2'),$('#txtCtasPagarRel1'));
    setRefresca_Todos_Campos();  
});
    
    
/* Venta de Acciones - Aumento de Capital Social */
    
$('#txtcapitalsocial').blur(function(){
    restaDosValores_Asigna($('#txtcapitalsocial2'),$('#txtcapitalsocial'),$('#txtVentaAccAumCapSoc0'));
    setRefresca_Todos_Campos();        
});
    
$('#txtcapitalsocial2').blur(function(){
    restaDosValores_Asigna($('#txtcapitalsocial2'),$('#txtcapitalsocial'),$('#txtVentaAccAumCapSoc0')); 
    restaDosValores_Asigna($('#txtcapitalsocial3'),$('#txtcapitalsocial2'),$('#txtVentaAccAumCapSoc1'));       
    setRefresca_Todos_Campos();  
});

$('#txtcapitalsocial3').blur(function(){        
    restaDosValores_Asigna($('#txtcapitalsocial3'),$('#txtcapitalsocial2'),$('#txtVentaAccAumCapSoc1'));
    setRefresca_Todos_Campos();  
});
    
    
/* Aumento de la Reserva Legal */ 
    
$('#txtreserva').blur(function(){
    restaDosValores_Asigna($('#txtreserva2'),$('#txtreserva'),$('#txtAumReserLegal0'));
    setRefresca_Todos_Campos();  
});
    
$('#txtreserva2').blur(function(){
    restaDosValores_Asigna($('#txtreserva2'),$('#txtreserva'),$('#txtAumReserLegal0')); 
    restaDosValores_Asigna($('#txtreserva3'),$('#txtreserva2'),$('#txtAumReserLegal1'));       
    setRefresca_Todos_Campos();  
});

$('#txtreserva3').blur(function(){        
    restaDosValores_Asigna($('#txtreserva3'),$('#txtreserva2'),$('#txtAumReserLegal1'));
    setRefresca_Todos_Campos();  
});
    
/* Cuentas por Pagar a L/P y Obligaciones Bancarias L/P */
    
$('#txtctaspagarlp').blur(function(){
    restaDosValores_Asigna($('#txtctaspagarlp2'),$('#txtctaspagarlp'),$('#txtCtasPagarObligBancLP0'));
    setRefresca_Todos_Campos();  
});
    
$('#txtctaspagarlp2').blur(function(){
    restaDosValores_Asigna($('#txtctaspagarlp2'),$('#txtctaspagarlp'),$('#txtCtasPagarObligBancLP0')); 
    restaDosValores_Asigna($('#txtctaspagarlp3'),$('#txtctaspagarlp2'),$('#txtCtasPagarObligBancLP1'));       
    setRefresca_Todos_Campos();  
});

$('#txtctaspagarlp3').blur(function(){        
    restaDosValores_Asigna($('#txtctaspagarlp3'),$('#txtctaspagarlp2'),$('#txtCtasPagarObligBancLP1'));
    setRefresca_Todos_Campos();  
});
    
    
/* Monto sin Conciliar */
    
$('#txtSuperavitReeval').blur(function(){
    restaDosValores_Asigna($('#txtSuperavitReeval2'),$('#txtSuperavitReeval'),$('#txtMontoSinConci0'));
    setRefresca_Todos_Campos();  
});
    
$('#txtSuperavitReeval2').blur(function(){
    restaDosValores_Asigna($('#txtSuperavitReeval2'),$('#txtSuperavitReeval'),$('#txtMontoSinConci0')); 
    restaDosValores_Asigna($('#txtSuperavitReeval3'),$('#txtSuperavitReeval2'),$('#txtMontoSinConci1'));       
    setRefresca_Todos_Campos();  
});

$('#txtSuperavitReeval3').blur(function(){        
    restaDosValores_Asigna($('#txtSuperavitReeval3'),$('#txtSuperavitReeval2'),$('#txtMontoSinConci1'));
    setRefresca_Todos_Campos();  
});
    
/*  Efectivo Al Inicio del A�o */ 
    
$('#txtcajachica').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtcajachica2').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtcajachica3').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtcajabancos').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtcajabancos2').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtcajabancos3').blur(function(){        
    setRefresca_Todos_Campos();  
});    
    
    
    
    
/**************************************
            Calculo de campos de 
            Indicadores Econ�micos 
    ****************************************/
    
    
/* Variaci�n de las Ventas Netas Respecto A�o Anterior */
    
$('#txtVentasNetas').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtVentasNetas2').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtVentasNetas3').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
    
/** % Sobre Ventas Netas del Costo de Ventas  **/
    
$('#txtCostoVentas').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtCostoVentas2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtCostoVentas3').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
    
/** % Sobre Ventas Netas del Beneficio Bruto   **/
    
$('#txtBenefBruto').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtBenefBruto2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtBenefBruto3').blur(function(){        
    setRefresca_Todos_Campos();  
});   
    
/** % Sobre Ventas Netas de los Gastos Administrativos y Generales  **/
    
$('#txtGastosAdm').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtGastosAdm2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtGastosAdm3').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
/** % Sobre Ventas Netas de los Gastos Financieros  **/
    
$('#txtGastosFinanc').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtGastosFinanc2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtGastosFinanc3').blur(function(){        
    setRefresca_Todos_Campos();  
}); 
    
/** % Sobre Ventas Netas del Beneficio neto Antes de no Usuales  **/
    
$('#txtBenefAntesImpNoUsuales').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtBenefAntesImpNoUsuales2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtBenefAntesImpNoUsuales3').blur(function(){        
    setRefresca_Todos_Campos();  
});   
    
    
/** Rentabilidad del Capital Neto Tangible **/
        
$('#txtTotalCapital').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtTotalCapital2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtTotalCapital3').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtcapitalnopago').blur(function(){        
    setRefresca_Todos_Campos();  
});

$('#txtcapitalnopago2').blur(function(){        
    setRefresca_Todos_Campos();  
});
    
$('#txtcapitalnopago3').blur(function(){        
    setRefresca_Todos_Campos();  
});
    

    
    /**********************************************************************************************/
    /***  Campos que se usaran en el calculo de Indicadores Financieros 
    /**********************************************************************************************/
    
        