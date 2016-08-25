
/**************************************************/
/*******      Funcion Replicadora         ********/
/**************************************************/

function setRefresca_Todos_Campos()
{
    // Se actualizan los campos en base a las dependencias entre campos    
    
    //  Asignacion de valores al total de Generación o Absorción Por Operaciones 
    setGeneracion_Absor_Operaciones();
    
    //  Asignacion de Inventarios 
    setInvetarios();
    
    // Generación o Absorción Por Inversión de Trabajo 
    setGeneracion_Absor_InversionDeTrabajo();
    
    // Gasto e Inversion en Planta  
    setGastos_Inversion_En_Planta();
    
    // Cargos Diferidos y Otros Activos 
    setCargosDiferidos_Activos();
    
    //Generación o Absorción por Otros Activos o Pasivos  
    setGeneracion_Absor_OtrosActivosPasivos();
    
    // Pago de dividendos (-) / Reposición de Pérdida (+):  
    setPagoDividendos_ReposicionPerd();
    
    // Generación o Absorción por Inversiones y Dividendos 
    setGeneracion_Absor_InversionDividendos();
    
    // Generación o Absorción Antes de Financiamiento  
    setGeneracion_Absor_Antes_Financiamiento();
    
    // Generación o Absorbción Por Financiamiento 
    setGeneracion_Absor_Por_Financiamiento();
    
    // Cambio en la Cuenta Caja  
    setCambio_Cuenta_Caja();
    
    //Efectivo Al Inicio del Año  
    setEfectivo_Inicio_Year();
    
    // Efectivo Al Fin del Año  
    setEfectivo_Fin_Year();
    
    // Variación de las Ventas Netas Respecto Año Anterior 
    setVariacion_Ventas_Netas_Year();
    
    // % Sobre Ventas Netas del Costo de Ventas   
    setVentas_Netas_Costo_Ventas();
    
    // % Sobre Ventas Netas del Beneficio Bruto   
    setVentas_Netas_Beneficio_Bruto();
    
    // % Sobre Ventas Netas de los Gastos Administrativos y Generales  
    setVentas_Netas_Gastos_Administr_Generales();  
    
    // % Sobre Ventas Netas de los Gastos Financieros  
    setVentas_Netas_Gastos_Financieros();
    
    // % Sobre Ventas Netas del Beneficio neto Antes de no Usuales  
    setVentas_Beneficio_Neto_Antes_No_Usuales();    
    
    // Rentabilidad del Capital Neto Tangible 
    setRentabilidad_Capital_Neto_Tangible(); 
    
    /** Rentabilidad sobre el Capital Neto Invertido **/
    setRentabilidad_Capital_Neto_Invertido();    
    
    // Rentabilidad sobre Ventas 
    setRentabilidad_Sobre_Ventas(); 
    
    // Capital de Trabajo  
    setCapital_Trabajo();
    
    // Solvencia  
    setSolvencia();
    
    // Solvencia General  
    setSolvencia_General();
    
    // Liquidez 
    setLiquidez();
    
    // Ventas a Crédito Diarias 
    setVentasCreditoDiarias();
    
    //Número de Días a Mano de Ventas 
    setNumero_Dias_Mano_Ventas();
    
    // Período Promedio de Cobros 
    setPeriodo_Promedio_Cobros();
    
    // Rotación de Cuentas por Cobrar 
    setRotacion_Cuentas_Cobrar();
    
    // Rotación de Inventarios
    setRotacion_Inventarios();
    
    // Costo de Ventas o Servicios Diarios  
    setCosto_Ventas_Servicios_Diarios();
    
    // Número de Días a Mano de Inventarios 
    setNumero_Dias_Mano_Inventarios();
    
    // Compras  
    setCompras();
    
    // Rotación de Cuentas por Pagar   
    setRotacion_Cuentas_Pagar();
    
    //  Compras Diarias
    setCompras_Diarias();
    
    // Número de Días a Mano en Cuentas por Pagar 
    setNumero_Dias_Mano_Cuentas_Pagar();    
    
    // Ciclo de Efectivo  
    setCiclo_Efectivo();
    
    // Endeudamiento Total  
    setEndeudamiento_Total();
    
    // Endeudamiento Circulante  
    setEndeudamiento_Circulante();
    
    // Endeudamiento Bancario Total 
    setEndeudamiento_Bancario_Total();
    
    // Endeudamiento a Largo Plazo
    setEndeudamiento_Largo_Plazo();
    
    // Rotación de la Planta
    setRotacion_Planta();
    
    // Productividad de la Empresa  
    setProductividad_Empresa();
}


// Suma Primera Columna 


function sumaTotalActFijo(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_fijo = parseFloat($('#ctl00_CP_Main_txtterrenos').attr('value'))+parseFloat($('#ctl00_CP_Main_txtedif').attr('value'))+parseFloat($('#ctl00_CP_Main_txtmaquinaria').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinstmejoras').attr('value'))+parseFloat($('#ctl00_CP_Main_txtmobiliario').attr('value'))+parseFloat($('#ctl00_CP_Main_txtRespAccHerra').attr('value'))+parseFloat($('#ctl00_CP_Main_txtvehiculo').attr('value'))-parseFloat($('#ctl00_CP_Main_txtdepreciacion').attr('value'))+parseFloat($('#ctl00_CP_Main_txtContrucEnProceso').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalActFijo').attr('value',roundNumber(parseFloat(total_act_fijo),2));
	
	var total_act = parseFloat($('#ctl00_CP_Main_txtTotalActFijo').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}

function sumaTotalActCirc(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_circ = parseFloat($('#ctl00_CP_Main_txtcajachica').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcajabancos').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctascobrar').attr('value'))+parseFloat($('#ctl00_CP_Main_txtefeccobrar').attr('value'))-parseFloat($('#ctl00_CP_Main_txtincobrables').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvmateriaprima').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvmaterialproc').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvprodterminado').attr('value'))-parseFloat($('#ctl00_CP_Main_txtobsolencia').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalActCirc').attr('value',roundNumber(parseFloat(total_act_circ),2));	
	
	var total_act = parseFloat($('#ctl00_CP_Main_txtTotalActFijo').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}

function sumaTotalOtrosAct(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_otros_act = parseFloat($('#ctl00_CP_Main_txtdepgarantia').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcargosdif').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcredfiscal').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctascobraracc').attr('value'))+parseFloat($('#ctl00_CP_Main_txtotrosact').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalOtrosAct').attr('value',roundNumber(parseFloat(total_otros_act),2));
	
	var total_act = parseFloat($('#ctl00_CP_Main_txtTotalActFijo').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}


// Suma Segunda Columna


function sumaTotalActFijo2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_fijo2 = parseFloat($('#ctl00_CP_Main_txtterrenos2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtedif2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtmaquinaria2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinstmejoras2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtmobiliario2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtRespAccHerra2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtvehiculo2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtdepreciacion2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtContrucEnProceso2').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalActFijo2').attr('value',roundNumber(parseFloat(total_act_fijo2),2));
	
	var total_act2 = parseFloat($('#ctl00_CP_Main_txtTotalActFijo2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}


function sumaTotalActCirc2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_circ2 = parseFloat($('#ctl00_CP_Main_txtcajachica2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcajabancos2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctascobrar2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtefeccobrar2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtincobrables2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvmateriaprima2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvmaterialproc2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvprodterminado2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtobsolencia2').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalActCirc2').attr('value',roundNumber(parseFloat(total_act_circ2),2));	
	
	var total_act2 = parseFloat($('#ctl00_CP_Main_txtTotalActFijo2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}


function sumaTotalOtrosAct2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_otros_act2 = parseFloat($('#ctl00_CP_Main_txtdepgarantia2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcargosdif2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcredfiscal2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctascobraracc2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtotrosact2').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalOtrosAct2').attr('value',roundNumber(parseFloat(total_otros_act2),2));
	
	var total_act2 = parseFloat($('#ctl00_CP_Main_txtTotalActFijo2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}

// Suma Tercera Columna


function sumaTotalActFijo3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_fijo3 = parseFloat($('#ctl00_CP_Main_txtterrenos3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtedif3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtmaquinaria3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinstmejoras3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtmobiliario3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtRespAccHerra3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtvehiculo3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtdepreciacion3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtContrucEnProceso3').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalActFijo3').attr('value',roundNumber(parseFloat(total_act_fijo3),2));
	
	var total_act3 = parseFloat($('#ctl00_CP_Main_txtTotalActFijo3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct3').attr('value'))
	console.debug('aqui '+total_act3);
	$('#ctl00_CP_Main_txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}


function sumaTotalActCirc3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_circ3 = parseFloat($('#ctl00_CP_Main_txtcajachica3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcajabancos3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctascobrar3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtefeccobrar3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtincobrables3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvmateriaprima3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvmaterialproc3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtinvprodterminado3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtobsolencia3').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalActCirc3').attr('value',roundNumber(parseFloat(total_act_circ3),2));	
	
	var total_act3 = parseFloat($('#ctl00_CP_Main_txtTotalActFijo3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}


function sumaTotalOtrosAct3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_otros_act3 = parseFloat($('#ctl00_CP_Main_txtdepgarantia3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcargosdif3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcredfiscal3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctascobraracc3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtotrosact3').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalOtrosAct3').attr('value',roundNumber(parseFloat(total_otros_act3),2));
	
	var total_act3 = parseFloat($('#ctl00_CP_Main_txtTotalActFijo3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalActCirc3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalOtrosAct3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}

// Suma de pasivos



function sumaTotalPasivoCirc(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivo_circ = parseFloat($('#ctl00_CP_Main_txtobligbancarias').attr('value'))+parseFloat($('#ctl00_CP_Main_txtdeudalp').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctaspagar').attr('value'))+parseFloat($('#ctl00_CP_Main_txtefecpagar').attr('value'))+parseFloat($('#ctl00_CP_Main_txtretenciones').attr('value'))+parseFloat($('#ctl00_CP_Main_txtgastosacum').attr('value'))+parseFloat($('#ctl00_CP_Main_txtimpuestospagar').attr('value'))+parseFloat($('#ctl00_CP_Main_txtprestaciones').attr('value'))+parseFloat($('#ctl00_CP_Main_txtotrospasivos').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value',roundNumber(parseFloat(total_pasivo_circ),2));	
	
	var total_pasivo = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasivos').attr('value',roundNumber(parseFloat(total_pasivo),2));
	
	var total_pasivo_cap = parseFloat($('#ctl00_CP_Main_txtTotalPasivos').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}

function sumaTotalCapital(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_capital = parseFloat($('#ctl00_CP_Main_txtcapitalsocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcapitalnopago').attr('value'))+parseFloat($('#ctl00_CP_Main_txtreserva').attr('value'))+parseFloat($('#ctl00_CP_Main_txtSuperavitAcum').attr('value'))+parseFloat($('#ctl00_CP_Main_txtSuperavitReeval').attr('value'))+parseFloat($('#ctl00_CP_Main_txtejercicio').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalCapital').attr('value',roundNumber(parseFloat(total_capital),2));
	
	var total_pasivo_cap = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}

function sumaTotalPasivoLP(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivoLP = parseFloat($('#ctl00_CP_Main_txtCtasAccionistas').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctaspagarlp').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalPasivoLP').attr('value',roundNumber(parseFloat(total_pasivoLP),2));
	
	var total_pasivo = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasivos').attr('value',roundNumber(parseFloat(total_pasivo),2));
	
	var total_pasivo_cap = parseFloat($('#ctl00_CP_Main_txtTotalPasivos').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}


//SUMAS DE PASIVO COLUMNA 2


function sumaTotalPasivoCirc2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivo_circ2 = parseFloat($('#ctl00_CP_Main_txtobligbancarias2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtdeudalp2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctaspagar2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtefecpagar2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtretenciones2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtgastosacum2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtimpuestospagar2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtprestaciones2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtotrospasivos2').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value',roundNumber(parseFloat(total_pasivo_circ2),2));	
	
	var total_pasivo2 = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasivos2').attr('value',roundNumber(parseFloat(total_pasivo2),2));
	
	var total_pasivo_cap2 = parseFloat($('#ctl00_CP_Main_txtTotalPasivos2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}

function sumaTotalCapital2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_capital2 = parseFloat($('#ctl00_CP_Main_txtcapitalsocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcapitalnopago2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtreserva2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtSuperavitAcum2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtSuperavitReeval2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtejercicio2').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalCapital2').attr('value',roundNumber(parseFloat(total_capital2),2));
	
	var total_pasivo_cap2 = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}

function sumaTotalPasivoLP2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivoLP2 = parseFloat($('#ctl00_CP_Main_txtCtasAccionistas2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctaspagarlp2').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalPasivoLP2').attr('value',roundNumber(parseFloat(total_pasivoLP2),2));
	
	var total_pasivo2 = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasivos2').attr('value',roundNumber(parseFloat(total_pasivo2),2));
	
	var total_pasivo_cap2 = parseFloat($('#ctl00_CP_Main_txtTotalPasivos2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital2').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}


// SUMA DE PASIVOS COLUMNA 3


function sumaTotalPasivoCirc3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivo_circ3 = parseFloat($('#ctl00_CP_Main_txtobligbancarias3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtdeudalp3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctaspagar3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtefecpagar3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtretenciones3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtgastosacum3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtimpuestospagar3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtprestaciones3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtotrospasivos3').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value',roundNumber(parseFloat(total_pasivo_circ3),2));	
	
	var total_pasivo3 = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasivos3').attr('value',roundNumber(parseFloat(total_pasivo3),2));
	
	var total_pasivo_cap3 = parseFloat($('#ctl00_CP_Main_txtTotalPasivos3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}

function sumaTotalCapital3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_capital3 = parseFloat($('#ctl00_CP_Main_txtcapitalsocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtcapitalnopago3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtreserva3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtSuperavitAcum3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtSuperavitReeval3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtejercicio3').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalCapital3').attr('value',roundNumber(parseFloat(total_capital3),2));
	
	var total_pasivo_cap3 = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}

function sumaTotalPasivoLP3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivoLP3 = parseFloat($('#ctl00_CP_Main_txtCtasAccionistas3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtctaspagarlp3').attr('value'));
			  
	$('#ctl00_CP_Main_txtTotalPasivoLP3').attr('value',roundNumber(parseFloat(total_pasivoLP3),2));
	
	var total_pasivo3 = parseFloat($('#ctl00_CP_Main_txtTotalPasivoLP3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasivos3').attr('value',roundNumber(parseFloat(total_pasivo3),2));
	
	var total_pasivo_cap3 = parseFloat($('#ctl00_CP_Main_txtTotalPasivos3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtTotalCapital3').attr('value'))
	
	$('#ctl00_CP_Main_txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}



//GANANCIAS Y PERDIDAS


function beneficioBruto(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_bruto = parseFloat($('#ctl00_CP_Main_txtVentasNetas').attr('value'))-parseFloat($('#ctl00_CP_Main_txtCostoVentas').attr('value'));
			  
	$('#ctl00_CP_Main_txtBenefBruto').attr('value',roundNumber(parseFloat(benef_bruto),2));
	
	var benef_neto_oper = parseFloat($('#ctl00_CP_Main_txtBenefBruto').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosAdm').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefNetoOper').attr('value',roundNumber(parseFloat(benef_neto_oper),2));
	
	var benef_antes_imp_y_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
	var benef_desp_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
	
}


function benefNetoEnOper(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_neto_oper = parseFloat($('#ctl00_CP_Main_txtBenefBruto').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosAdm').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefNetoOper').attr('value',roundNumber(parseFloat(benef_neto_oper),2));
	
	var benef_antes_imp_y_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
	var benef_desp_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function benefAntesImpYNoUsuales(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_antes_imp_y_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
	var benef_desp_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function benefNetoDespNoUsuales(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_desp_no_usuales = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function resultadoEjercicio(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var ejercicio = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function aumDismCapContable(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var aum_dism_cap_contable = parseFloat($('#ctl00_CP_Main_txtEjercicio').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}






//GANANCIAS Y PERDIDAS COLUMNA 2


function beneficioBruto2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_bruto2 = parseFloat($('#ctl00_CP_Main_txtVentasNetas2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtCostoVentas2').attr('value'));
			  
	$('#ctl00_CP_Main_txtBenefBruto2').attr('value',roundNumber(parseFloat(benef_bruto2),2));
	
	var benef_neto_oper2 = parseFloat($('#ctl00_CP_Main_txtBenefBruto2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosAdm2').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefNetoOper2').attr('value',roundNumber(parseFloat(benef_neto_oper2),2));
	
	var benef_antes_imp_y_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
	var benef_desp_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv2').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect2').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal2').attr('value')));
	
		
	$('#ctl00_CP_Main_txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	
}


function benefNetoEnOper2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_neto_oper2 = parseFloat($('#ctl00_CP_Main_txtBenefBruto2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosAdm2').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefNetoOper2').attr('value',roundNumber(parseFloat(benef_neto_oper2),2));
	
	var benef_antes_imp_y_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc2').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
	var benef_desp_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv2').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect2').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal2').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function benefAntesImpYNoUsuales2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_antes_imp_y_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc2').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
	var benef_desp_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv2').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect2').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal2').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function benefNetoDespNoUsuales2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_desp_no_usuales2 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv2').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect2').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal2').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function resultadoEjercicio2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var ejercicio2 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect2').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal2').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function aumDismCapContable2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var aum_dism_cap_contable2 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial2').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal2').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}



//GANANCIAS Y PERDIDAS COLUMNA 3


function beneficioBruto3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	    
	var benef_bruto3 = parseFloat($('#ctl00_CP_Main_txtVentasNetas3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtCostoVentas3').attr('value'));
			  
	$('#ctl00_CP_Main_txtBenefBruto3').attr('value',roundNumber(parseFloat(benef_bruto3),2));
	
	var benef_neto_oper3 = parseFloat($('#ctl00_CP_Main_txtBenefBruto3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosAdm3').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefNetoOper3').attr('value',roundNumber(parseFloat(benef_neto_oper3),2));
	
	var benef_antes_imp_y_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper').attr('value'))+ parseFloat($('#ctl00_CP_Main_txtOtrosIngresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
	var benef_desp_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv3').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect3').attr('value'));
	
	$('#ctl00_CP_Main_txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal3').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));       
	
	//Asignamos el valor del Beneficio Neto Después de No Usuale
    setValue($('#ctl00_CP_Main_txtAumDismCapContable3'),$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu1'));    
}


function benefNetoEnOper3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_neto_oper3 = parseFloat($('#ctl00_CP_Main_txtBenefBruto3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosAdm3').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefNetoOper3').attr('value',roundNumber(parseFloat(benef_neto_oper3),2));
	
	var benef_antes_imp_y_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc3').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
	var benef_desp_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv3').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect3').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#ctl00_CP_Main_txtEjercicio3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal3').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
    
    //Asignamos el valor del Beneficio Neto Después de No Usuale
    setValue($('#ctl00_CP_Main_txtAumDismCapContable3'),$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu1'));
}

function benefAntesImpYNoUsuales3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_antes_imp_y_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefNetoOper3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtOtrosIngresos3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtOtrosEgresos3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtGastosFinanc3').attr('value'));
	
	$('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
	var benef_desp_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv3').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect3').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal3').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
    
    //Asignamos el valor del Beneficio Neto Después de No Usuale
    setValue($('#ctl00_CP_Main_txtAumDismCapContable3'),$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu1'));
}

function benefNetoDespNoUsuales3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_desp_no_usuales3 = parseFloat($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtislr3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjustePlanta3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAjusteInv3').attr('value')));
	
	$('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value',redondeaNumero_Retorna(parseFloat(benef_desp_no_usuales3)));
	
	var ejercicio3 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect3').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal3').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable3').attr('value',redondeaNumero_Retorna(parseFloat(aum_dism_cap_contable3)));
    
    //Asignamos el valor del Beneficio Neto Después de No Usuale
    setValue($('#ctl00_CP_Main_txtAumDismCapContable3'),$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu1'));
}

function resultadoEjercicio3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var ejercicio3 = parseFloat($('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#ctl00_CP_Main_txtDivPagosEfect3').attr('value'));
	
	$('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal3').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable3').attr('value',redondeaNumero_Retorna(parseFloat(aum_dism_cap_contable3)));
    
    //Asignamos el valor del Beneficio Neto Después de No Usuale
    setValue($('#ctl00_CP_Main_txtAumDismCapContable3'),$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu1'));
}

function aumDismCapContable3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var aum_dism_cap_contable3 = parseFloat($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'))-(parseFloat($('#ctl00_CP_Main_txtAumCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtDismCapSocial3').attr('value'))+parseFloat($('#ctl00_CP_Main_txtAumReservaLegal3').attr('value')));
	
	$('#ctl00_CP_Main_txtAumDismCapContable3').attr('value',redondeaNumero_Retorna(parseFloat(aum_dism_cap_contable3)));
    
    //Asignamos el valor del Beneficio Neto Después de No Usuale
    setValue($('#ctl00_CP_Main_txtAumDismCapContable3'),$('#ctl00_CP_Main_txtFFBenefNetoDespNoUsu1'));
}



/*  Asignacion de valores al total de Generación o Absorción Por Operaciones */   

function setGeneracion_Absor_Operaciones()
{   
    ArrayNombreOper1 = ['ctl00_CP_Main_txtFFBenefNetoDespNoUsu', 'ctl00_CP_Main_txtDepreciacion0', 'ctl00_CP_Main_txtProvImp0' , 'ctl00_CP_Main_txtProvCtasInco0' , 'ctl00_CP_Main_txtProvObsolencia0'];
    ArrayNombreOper2 = ['ctl00_CP_Main_txtFFBenefNetoDespNoUsu1', 'ctl00_CP_Main_txtDepreciacion1', 'ctl00_CP_Main_txtProvImp1' , 'ctl00_CP_Main_txtProvCtasInco1' , 'ctl00_CP_Main_txtProvObsolencia1'];
    
    TotalOperaciones1 = sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
        
    $('#ctl00_CP_Main_txtGenerAbsobOper0').attr('value', TotalOperaciones1);
    $('#ctl00_CP_Main_txtGenerAbsobOper1').attr('value', TotalOperaciones2);
}

/*  Asignacion de Inventarios */   

function setInvetarios()
{   
    Suma_Year1 = ['ctl00_CP_Main_txtinvmateriaprima', 'ctl00_CP_Main_txtinvmaterialproc', 'ctl00_CP_Main_txtinvprodterminado'];
    Suma_Year2 = ['ctl00_CP_Main_txtinvmateriaprima2', 'ctl00_CP_Main_txtinvmaterialproc2', 'ctl00_CP_Main_txtinvprodterminado2'];
    Suma_Year3 = ['ctl00_CP_Main_txtinvmateriaprima3', 'ctl00_CP_Main_txtinvmaterialproc3', 'ctl00_CP_Main_txtinvprodterminado3'];
    
    Total_Year1 = sumaValores(Suma_Year1);  
    Total_Year2 = sumaValores(Suma_Year2);
    Total_Year3 = sumaValores(Suma_Year3);
    
    ValorInventario1 = Total_Year1 - Total_Year2;
    ValorInventario2 = Total_Year2 - Total_Year3;
    
    $('#ctl00_CP_Main_txtInventario0').attr('value', redondeaNumero_Retorna(ValorInventario1));
    $('#ctl00_CP_Main_txtInventario1').attr('value', redondeaNumero_Retorna(ValorInventario2));
    
    //setGeneracion_Absor_InversionDeTrabajo();
}

/* Generación o Absorción Por Inversión de Trabajo **/
function setGeneracion_Absor_InversionDeTrabajo()
{    
    //Campos procesados
    //Cuentas Por Cobrar,	Efectos por cobrar,	Inventarios,	Cuentas por pagar,	Efectos por pagar,	Gastos Acumulados
    
    ArrayNombreOper1 = ['ctl00_CP_Main_txtCtasCobrar0', 'ctl00_CP_Main_txtEfecCobrar0', 'ctl00_CP_Main_txtInventario0' , 'ctl00_CP_Main_txtCtasPagar0' , 'ctl00_CP_Main_txtEfecPagar0', 'ctl00_CP_Main_txtGastosAcum0'];
    ArrayNombreOper2 = ['ctl00_CP_Main_txtCtasCobrar1', 'ctl00_CP_Main_txtEfecCobrar1', 'ctl00_CP_Main_txtInventario1' , 'ctl00_CP_Main_txtCtasPagar1' , 'ctl00_CP_Main_txtEfecPagar1', 'ctl00_CP_Main_txtGastosAcum1'];
    
    TotalOperaciones1 = sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtGenerAbsorInvTrab0').attr('value', TotalOperaciones1);
    $('#ctl00_CP_Main_txtGenerAbsorInvTrab1').attr('value', TotalOperaciones2);    
}

/* Gasto e Inversion en Planta  */
function setGastos_Inversion_En_Planta()
{
    //Gastos e Inversion de planta 1
    
    ArrayNombreSuma1 = ['ctl00_CP_Main_txtTotalActFijo2', 'ctl00_CP_Main_txtdepreciacion2'];
    TotalSuma1       = sumaValores(ArrayNombreSuma1);
    ValorARestar1    = $('#ctl00_CP_Main_txtTotalActFijo').attr('value');     
    ResultadoResta1  = restaDosValores_Retorna(TotalSuma1,ValorARestar1);
    ValorARestar2    = $('#ctl00_CP_Main_txtdepreciacion').attr('value');
    ResultadoResta2  = restaDosValores_Retorna(ResultadoResta1,ValorARestar2); 
    ResultadoResta2  = ResultadoResta2 * -1;
    //Asignamos el valor al gasto e inversion en planta 1
    $('#ctl00_CP_Main_txtGastoInvPlanta0').attr('value',ResultadoResta2);
    
    
    ArrayNombreSuma2 = ['ctl00_CP_Main_txtTotalActFijo3', 'ctl00_CP_Main_txtdepreciacion3'];
    TotalSuma2       = sumaValores(ArrayNombreSuma2);
    ValorARestar3    = $('#ctl00_CP_Main_txtTotalActFijo2').attr('value');
    ResultadoResta3  = restaDosValores_Retorna(TotalSuma2,ValorARestar3);
    ValorARestar4    = $('#ctl00_CP_Main_txtdepreciacion2').attr('value');
    ResultadoResta4  = restaDosValores_Retorna(ResultadoResta3,ValorARestar4);
    ResultadoResta4  = ResultadoResta4 * -1;
    //Asignamos el valor al gasto e inversion en planta 2
    $('#ctl00_CP_Main_txtGastoInvPlanta1').attr('value',ResultadoResta4);    
}


/** Cargos Diferidos y Otros Activos **/
function setCargosDiferidos_Activos()
{
    Resta1_Year1 = restaDosValores_Retorna($('#ctl00_CP_Main_txtcargosdif').attr('value'),$('#ctl00_CP_Main_txtcargosdif2').attr('value'));
    Resta2_Year1 = restaDosValores_Retorna($('#ctl00_CP_Main_txtotrosact').attr('value'),$('#ctl00_CP_Main_txtotrosact2').attr('value'));
    
    Resultado_Year1 = Resta1_Year1 + Resta2_Year1;
    //Asigna el resultado 
    $('#ctl00_CP_Main_txtCargoDifOtroAct0').attr('value',roundNumber(parseFloat(Resultado_Year1),3)); 
    
    Resta1_Year2 = restaDosValores_Retorna($('#ctl00_CP_Main_txtcargosdif2').attr('value'),$('#ctl00_CP_Main_txtcargosdif3').attr('value'));
    Resta2_Year2 = restaDosValores_Retorna($('#ctl00_CP_Main_txtotrosact2').attr('value'),$('#ctl00_CP_Main_txtotrosact3').attr('value'));
    
    Resultado_Year2 = Resta1_Year2 + Resta2_Year2;
    //Asigna el resultado 
    $('#ctl00_CP_Main_txtCargoDifOtroAct1').attr('value',roundNumber(parseFloat(Resultado_Year2),3));    
}

/** Impuestos por Pagar y Retenciones **/
function setImpuestos_Pag_Ret()
{   
    ImpSuma1_Year1  = sumaDosValores_Retorna($('#ctl00_CP_Main_txtimpuestospagar').attr('value'), $('#ctl00_CP_Main_txtislr2').attr('value'));
    ImpResta1_Year1 = -1 * restaDosValores_Retorna(ImpSuma1_Year1, $('#ctl00_CP_Main_txtimpuestospagar2').attr('value'));
    //Asignamos el resultado
    $('#ctl00_CP_Main_txtImpPagarReten0').attr('value',ImpResta1_Year1);
    
    ImpSuma1_Year2 = sumaDosValores_Retorna($('#ctl00_CP_Main_txtimpuestospagar2').attr('value'), $('#ctl00_CP_Main_txtislr3').attr('value'));
    ImpResta1_Year2 = -1 * restaDosValores_Retorna(ImpSuma1_Year2, $('#ctl00_CP_Main_txtimpuestospagar3').attr('value'));
    //Asignamos el resultado
    $('#ctl00_CP_Main_txtImpPagarReten1').attr('value',ImpResta1_Year2);    
    
    //setGeneracion_Absor_OtrosActivosPasivos();
}


/** Generación o Absorción por Otros Activos o Pasivos  **/
function setGeneracion_Absor_OtrosActivosPasivos()
{   
    AbsoArrayNombreOper1 = ['ctl00_CP_Main_txtDepoGaran0',
     'ctl00_CP_Main_txtCargoDifOtroAct0', 
     'ctl00_CP_Main_txtCredFiscalGastoPrep0', 
     'ctl00_CP_Main_txtCtasCobrarAccRel0',       
     'ctl00_CP_Main_txtImpPagarReten0',
     'ctl00_CP_Main_txtRetenPagar0', 
     'ctl00_CP_Main_txtPrestSocialesPagar0', 
     'ctl00_CP_Main_txtOtrosPasivosCorr0'];
     
     AbsoArrayNombreOper2 = ['ctl00_CP_Main_txtDepoGaran1',
     'ctl00_CP_Main_txtCargoDifOtroAct1', 
     'ctl00_CP_Main_txtCredFiscalGastoPrep1' , 
     'ctl00_CP_Main_txtCtasCobrarAccRel1' ,       
     'ctl00_CP_Main_txtImpPagarReten1',
     'ctl00_CP_Main_txtRetenPagar1', 
     'ctl00_CP_Main_txtPrestSocialesPagar1',
     'ctl00_CP_Main_txtOtrosPasivosCorr1'];
     
    
    AbsorTotalOperaciones1 = sumaValores(AbsoArrayNombreOper1);  
    AbsorTotalOperaciones2 =  sumaValores(AbsoArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtGenerAbsorbActPas0').attr('value', AbsorTotalOperaciones1);
    $('#ctl00_CP_Main_txtGenerAbsorbActPas1').attr('value', AbsorTotalOperaciones2);    
}

/** Pago de dividendos (-) / Reposición de Pérdida (+): **/ 
function setPagoDividendos_ReposicionPerd()
{
    //Calculo año 1
    PagDivSuma1_Year1  = sumaDosValores_Retorna($('#ctl00_CP_Main_txtSuperavitAcum2').attr('value'), $('#ctl00_CP_Main_txtejercicio2').attr('value'));
    PagDivResta1_Year1 = restaDosValores_Retorna(PagDivSuma1_Year1, $('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'));
    
    PagDivSuma2_Year1  = sumaDosValores_Retorna($('#ctl00_CP_Main_txtSuperavitAcum').attr('value'), $('#ctl00_CP_Main_txtejercicio').attr('value'));    
    
    PagDivResultado_Year1 = restaDosValores_Retorna(PagDivResta1_Year1,PagDivSuma2_Year1); 
    //Asignamos el valor     
    $('#ctl00_CP_Main_txtPagoDivRepoPerd0').attr('value',PagDivResultado_Year1);


    //Calculo año 1
    PagDivSuma1_Year2  = sumaDosValores_Retorna($('#ctl00_CP_Main_txtSuperavitAcum3').attr('value'), $('#ctl00_CP_Main_txtejercicio3').attr('value'));
    PagDivResta1_Year2 = restaDosValores_Retorna(PagDivSuma1_Year2, $('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'));
    
    PagDivSuma2_Year2  = sumaDosValores_Retorna($('#ctl00_CP_Main_txtSuperavitAcum2').attr('value'), $('#ctl00_CP_Main_txtejercicio2').attr('value'));
    
    PagDivResultado_Year2 = restaDosValores_Retorna(PagDivResta1_Year2,PagDivSuma2_Year2); 
    //Asignamos el valor 
    $('#ctl00_CP_Main_txtPagoDivRepoPerd1').attr('value',PagDivResultado_Year2);
}

/** Generación o Absorción por Inversiones y Dividendos **/ 
function setGeneracion_Absor_InversionDividendos()
{
    
     AbsoDivArrayNombreOper1 = ['ctl00_CP_Main_txtInversiones0', 'ctl00_CP_Main_txtPagoDivRepoPerd0'];     
     AbsoDivArrayNombreOper2  = ['ctl00_CP_Main_txtInversiones1', 'ctl00_CP_Main_txtPagoDivRepoPerd1'];
     
    
    AbsorDivTotalOperaciones1 = sumaValores(AbsoDivArrayNombreOper1);  
    AbsorDivTotalOperaciones2 =  sumaValores(AbsoDivArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtGenerAbsorbInvDiv0').attr('value', AbsorDivTotalOperaciones1);
    $('#ctl00_CP_Main_txtGenerAbsorbInvDiv1').attr('value', AbsorDivTotalOperaciones2);    
}

/** Generación o Absorción Antes de Financiamiento **/ 
function setGeneracion_Absor_Antes_Financiamiento()
{
    
    AbsoAnteArrayNombreOper1 = [
     'ctl00_CP_Main_txtGenerAbsorbInvDiv0',
     'ctl00_CP_Main_txtGenerAbsorbActPas0', 
     'ctl00_CP_Main_txtGastoInvPlanta0', 
     'ctl00_CP_Main_txtGenerAbsorInvTrab0',
     'ctl00_CP_Main_txtGenerAbsobOper0'
     ];
     
     AbsoAnteArrayNombreOper2 = [
     'ctl00_CP_Main_txtGenerAbsorbInvDiv1',
     'ctl00_CP_Main_txtGenerAbsorbActPas1', 
     'ctl00_CP_Main_txtGastoInvPlanta1', 
     'ctl00_CP_Main_txtGenerAbsorInvTrab1',
     'ctl00_CP_Main_txtGenerAbsobOper1'
     ];
     
    
    AbsorAntesTotalOperaciones1 = sumaValores(AbsoAnteArrayNombreOper1);  
    AbsorAntesTotalOperaciones2 =  sumaValores(AbsoAnteArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtGenerAbsorbAntesFinanc0').attr('value', AbsorAntesTotalOperaciones1);
    $('#ctl00_CP_Main_txtGenerAbsorbAntesFinanc1').attr('value', AbsorAntesTotalOperaciones2);
}

/** Generación o Absorbción Por Financiamiento **/
function setGeneracion_Absor_Por_Financiamiento()
{
    
    AbsoPorArrayNombreOper1 = [
     'ctl00_CP_Main_txtPrestamoCP0',
     'ctl00_CP_Main_txtPrestamoLP0', 
     'ctl00_CP_Main_txtCtasPagarRel0', 
     'ctl00_CP_Main_txtVentaAccAumCapSoc0',
     'ctl00_CP_Main_txtAumReserLegal0',
     'ctl00_CP_Main_txtCtasPagarObligBancLP0',
     'ctl00_CP_Main_txtMontoSinConci0'
     ];
     
     AbsoPorArrayNombreOper2 = [
     'ctl00_CP_Main_txtPrestamoCP1',
     'ctl00_CP_Main_txtPrestamoLP1', 
     'ctl00_CP_Main_txtCtasPagarRel1', 
     'ctl00_CP_Main_txtVentaAccAumCapSoc1',
     'ctl00_CP_Main_txtAumReserLegal1',
     'ctl00_CP_Main_txtCtasPagarObligBancLP1',
     'ctl00_CP_Main_txtMontoSinConci1'
     ];
     
    
    AbsorPorTotalOperaciones1 = sumaValores(AbsoPorArrayNombreOper1);  
    AbsorPorTotalOperaciones2 =  sumaValores(AbsoPorArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtGenerAbsorPorFinanc0').attr('value', AbsorPorTotalOperaciones1);
    $('#ctl00_CP_Main_txtGenerAbsorPorFinanc1').attr('value', AbsorPorTotalOperaciones2);    
}

/** Cambio en la Cuenta Caja  **/
function setCambio_Cuenta_Caja()
{
    CambioCuentaArrayNombreOper1 = [
     'ctl00_CP_Main_txtGenerAbsorPorFinanc0',
     'ctl00_CP_Main_txtGenerAbsorbAntesFinanc0'     
     ];
     
     CambioCuentaArrayNombreOper2 = [
     'ctl00_CP_Main_txtGenerAbsorPorFinanc1',
     'ctl00_CP_Main_txtGenerAbsorbAntesFinanc1'     
     ];
     
    CambioCuentaTotalOperaciones1 =  sumaValores(CambioCuentaArrayNombreOper1);  
    CambioCuentaTotalOperaciones2 =  sumaValores(CambioCuentaArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtCambioCtaCaja0').attr('value', CambioCuentaTotalOperaciones1);
    $('#ctl00_CP_Main_txtCambioCtaCaja1').attr('value', CambioCuentaTotalOperaciones2);    
}

/** Efectivo Al Inicio del Año **/ 
function setEfectivo_Inicio_Year()
{
    EfectYesrArrayNombreOper1 = [
     'ctl00_CP_Main_txtcajachica',
     'ctl00_CP_Main_txtcajabancos'     
     ];
     
     EfectYesrArrayNombreOper2 = [
     'ctl00_CP_Main_txtcajachica2',
     'ctl00_CP_Main_txtcajabancos2'     
     ];
     
    EfectYearTotalOperaciones1 =  sumaValores(EfectYesrArrayNombreOper1);  
    EfectYearTotalOperaciones2 =  sumaValores(EfectYesrArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtEfecIniAno0').attr('value', EfectYearTotalOperaciones1);
    $('#ctl00_CP_Main_txtEfecIniAno1').attr('value', EfectYearTotalOperaciones2);         
}


/** Efectivo Al Fin del Año **/ 
function setEfectivo_Fin_Year()
{
    EfectFinArrayNombreOper1 = [
     'ctl00_CP_Main_txtcajachica2',
     'ctl00_CP_Main_txtcajabancos2'     
     ];
     
     EfectFinArrayNombreOper2 = [
     'ctl00_CP_Main_txtcajachica3',
     'ctl00_CP_Main_txtcajabancos3'     
     ];
     
    EfectFinTotalOperaciones1 =  sumaValores(EfectFinArrayNombreOper1);  
    EfectFinTotalOperaciones2 =  sumaValores(EfectFinArrayNombreOper2);
    
    $('#ctl00_CP_Main_txtEfecFinAno0').attr('value', EfectFinTotalOperaciones1);
    $('#ctl00_CP_Main_txtEfecFinAno1').attr('value', EfectFinTotalOperaciones2);         
}


/**************************************************************/
/** Funciones de Suma de las seccion Indicadores Economicos **/
/**************************************************************/

/** Variación de las Ventas Netas Respecto Año Anterior **/
function setVariacion_Ventas_Netas_Year()
{    
    ResultadoResta1 = restaDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoOperacion1 = -1 * (divideDosValores_Retorna(ResultadoResta1,$('#ctl00_CP_Main_txtVentasNetas').attr('value')));
    ResultadoOperacion1 = redondeaNumero_Retorna(100 * ResultadoOperacion1);
    $('#ctl00_CP_Main_txtVarVentasNetas0').attr('value',ResultadoOperacion1);
    
    ResultadoResta2 = restaDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));    
    ResultadoOperacion2 = -1 * (divideDosValores_Retorna(ResultadoResta2,$('#ctl00_CP_Main_txtVentasNetas2').attr('value')));
    ResultadoOperacion2 = redondeaNumero_Retorna(100 * ResultadoOperacion2);
    $('#ctl00_CP_Main_txtVarVentasNetas1').attr('value',ResultadoOperacion2);        
}

/** % Sobre Ventas Netas del Costo de Ventas  **/ 
function setVentas_Netas_Costo_Ventas()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas').attr('value'), $('#ctl00_CP_Main_txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtPorcCostoVentas0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtPorcCostoVentas1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas3').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtPorcCostoVentas2').attr('value',ResultadoDivision3);
}


/** % Sobre Ventas Netas del Beneficio Bruto   **/
function setVentas_Netas_Beneficio_Bruto()
{
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefBruto').attr('value'), $('#ctl00_CP_Main_txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtPorcBeneficioBruto0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefBruto2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtPorcBeneficioBruto1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefBruto3').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtPorcBeneficioBruto2').attr('value',ResultadoDivision3);    
}

/** % Sobre Ventas Netas de los Gastos Administrativos y Generales  **/
function setVentas_Netas_Gastos_Administr_Generales()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGastosAdm').attr('value'), $('#ctl00_CP_Main_txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtPorcGastosAdminGenr0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGastosAdm2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtPorcGastosAdminGenr1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGastosAdm3').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtPorcGastosAdminGenr2').attr('value',ResultadoDivision3);        
} 


/** % Sobre Ventas Netas de los Gastos Financieros  **/
function setVentas_Netas_Gastos_Financieros()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGastosFinanc').attr('value'), $('#ctl00_CP_Main_txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtPorcGastosFinancieros0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGastosFinanc2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtPorcGastosFinancieros1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGastosFinanc3').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtPorcGastosFinancieros2').attr('value',ResultadoDivision3);            
}
 
/** % Sobre Ventas Netas del Beneficio neto Antes de no Usuales  **/
function setVentas_Beneficio_Neto_Antes_No_Usuales()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales').attr('value'), $('#ctl00_CP_Main_txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtPorcBenefNetoUsua0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtPorcBenefNetoUsua1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefAntesImpNoUsuales3').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtPorcBenefNetoUsua2').attr('value',ResultadoDivision3);            
}

/** Rentabilidad del Capital Neto Tangible **/
function setRentabilidad_Capital_Neto_Tangible()
{
    // txtEjercicio / txtTotalCapital
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'), $('#ctl00_CP_Main_txtTotalCapital').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtRentaCapitalNetoTan0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'), $('#ctl00_CP_Main_txtTotalCapital2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtRentaCapitalNetoTan1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'), $('#ctl00_CP_Main_txtTotalCapital3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtRentaCapitalNetoTan2').attr('value',ResultadoDivision3);
}


/** Rentabilidad sobre el Capital Neto Invertido **/
function setRentabilidad_Capital_Neto_Invertido()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtResultadoEjercicio').attr('value'), $('#ctl00_CP_Main_txtcapitalsocial').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtRentaCapitalNetoInver0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtResultadoEjercicio2').attr('value'), $('#ctl00_CP_Main_txtcapitalsocial2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtRentaCapitalNetoInver1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtResultadoEjercicio3').attr('value'), $('#ctl00_CP_Main_txtcapitalsocial3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtRentaCapitalNetoInver2').attr('value',ResultadoDivision3);
}


/** Rentabilidad sobre Ventas **/
function setRentabilidad_Sobre_Ventas()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefDespNoUsuales').attr('value'), $('#ctl00_CP_Main_txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#ctl00_CP_Main_txtRentaSobreVentas0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefDespNoUsuales2').attr('value'), $('#ctl00_CP_Main_txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#ctl00_CP_Main_txtRentaSobreVentas1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtBenefDespNoUsuales3').attr('value'), $('#ctl00_CP_Main_txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#ctl00_CP_Main_txtRentaSobreVentas2').attr('value',ResultadoDivision3);
}


/**************************************************************/
/** Funciones de Suma de las seccion Indicadores Financieros **/
/**************************************************************/
 
/** Capital de Trabajo  **/
function setCapital_Trabajo()
{    
    restaDosValores_Asigna($('#ctl00_CP_Main_txtTotalActCirc'),$('#ctl00_CP_Main_txtTotalPasivoCirc'),$('#ctl00_CP_Main_txtCapitalTrabajo0'));
    restaDosValores_Asigna($('#ctl00_CP_Main_txtTotalActCirc2'),$('#ctl00_CP_Main_txtTotalPasivoCirc2'),$('#ctl00_CP_Main_txtCapitalTrabajo1'));
    restaDosValores_Asigna($('#ctl00_CP_Main_txtTotalActCirc3'),$('#ctl00_CP_Main_txtTotalPasivoCirc3'),$('#ctl00_CP_Main_txtCapitalTrabajo2'));   
}

/** Solvencia  **/
function setSolvencia()
{    
    RsultadoDiv1 =  divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalActCirc').attr('value'),$('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value'))
    RsultadoDiv2 =  divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalActCirc2').attr('value'),$('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value'))
    RsultadoDiv3 =  divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalActCirc3').attr('value'),$('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value'))
    
    $('#ctl00_CP_Main_txtSolvencia0').attr('value',RsultadoDiv1);
    $('#ctl00_CP_Main_txtSolvencia1').attr('value',RsultadoDiv2);
    $('#ctl00_CP_Main_txtSolvencia2').attr('value',RsultadoDiv3);
}

/** Solvencia  General **/
function setSolvencia_General()
{    
    RsultadoSGDiv1 =  divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalActCirc').attr('value'),$('#ctl00_CP_Main_txtTotalPasivos').attr('value'))
    RsultadoSGDiv2 =  divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalActCirc2').attr('value'),$('#ctl00_CP_Main_txtTotalPasivos2').attr('value'))
    RsultadoSGDiv3 =  divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalActCirc3').attr('value'),$('#ctl00_CP_Main_txtTotalPasivos3').attr('value'))
    
    $('#ctl00_CP_Main_txtSolvenciaGeneral0').attr('value',RsultadoSGDiv1);
    $('#ctl00_CP_Main_txtSolvenciaGeneral1').attr('value',RsultadoSGDiv2);
    $('#ctl00_CP_Main_txtSolvenciaGeneral2').attr('value',RsultadoSGDiv3);
}

/** Liquidez **/
function setLiquidez()
{   
     ArrayNombreOper1 = [
     'ctl00_CP_Main_txtcajachica',
     'ctl00_CP_Main_txtcajabancos',
     'ctl00_CP_Main_txtctascobrar', 
     'ctl00_CP_Main_txtefeccobrar', 
     'ctl00_CP_Main_txtincobrables'     
     ];
     
     ArrayNombreOper2 = [
     'ctl00_CP_Main_txtcajachica2',
     'ctl00_CP_Main_txtcajabancos2',
     'ctl00_CP_Main_txtctascobrar2', 
     'ctl00_CP_Main_txtefeccobrar2', 
     'ctl00_CP_Main_txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [
     'ctl00_CP_Main_txtcajachica3',
     'ctl00_CP_Main_txtcajabancos3',
     'ctl00_CP_Main_txtctascobrar3', 
     'ctl00_CP_Main_txtefeccobrar3', 
     'ctl00_CP_Main_txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value'));
    
    $('#ctl00_CP_Main_txtLiquidez0').attr('value', TotalDivision1);
    $('#ctl00_CP_Main_txtLiquidez1').attr('value', TotalDivision2);
    $('#ctl00_CP_Main_txtLiquidez2').attr('value', TotalDivision3);    
}


/** Ventas a Crédito Diarias **/
function setVentasCreditoDiarias()
{
    //txtVentasNetas
    ResultadoDivCD1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas').attr('value'), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas2').attr('value'), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas3').attr('value'), 360);
    
    $('#ctl00_CP_Main_txtVentasCreditosDia0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtVentasCreditosDia1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtVentasCreditosDia2').attr('value', ResultadoDivCD3);
}

/** Número de Días a Mano de Ventas **/
function setNumero_Dias_Mano_Ventas()
{
     ArrayNombreOper1 = [     
     'ctl00_CP_Main_txtctascobrar', 
     'ctl00_CP_Main_txtefeccobrar', 
     'ctl00_CP_Main_txtincobrables'     
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtctascobrar2', 
     'ctl00_CP_Main_txtefeccobrar2', 
     'ctl00_CP_Main_txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtctascobrar3', 
     'ctl00_CP_Main_txtefeccobrar3', 
     'ctl00_CP_Main_txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#ctl00_CP_Main_txtVentasCreditosDia0').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#ctl00_CP_Main_txtVentasCreditosDia1').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#ctl00_CP_Main_txtVentasCreditosDia2').attr('value'));
    
    $('#ctl00_CP_Main_txtNumDiariManoVent0').attr('value', TotalDivision1);
    $('#ctl00_CP_Main_txtNumDiariManoVent1').attr('value', TotalDivision2);
    $('#ctl00_CP_Main_txtNumDiariManoVent2').attr('value', TotalDivision3);
}

/** Período Promedio de Cobros **/
function setPeriodo_Promedio_Cobros()
{
     ArrayNombreOper1 = [     
     'ctl00_CP_Main_txtctascobrar', 
     'ctl00_CP_Main_txtefeccobrar', 
     'ctl00_CP_Main_txtincobrables'     
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtctascobrar2', 
     'ctl00_CP_Main_txtefeccobrar2', 
     'ctl00_CP_Main_txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtctascobrar3', 
     'ctl00_CP_Main_txtefeccobrar3', 
     'ctl00_CP_Main_txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#ctl00_CP_Main_txtVentasCreditosDia0').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#ctl00_CP_Main_txtVentasCreditosDia1').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#ctl00_CP_Main_txtVentasCreditosDia2').attr('value'));
    
    $('#ctl00_CP_Main_txtPeriodoPromCobros0').attr('value', TotalDivision1);
    $('#ctl00_CP_Main_txtPeriodoPromCobros1').attr('value', TotalDivision2);
    $('#ctl00_CP_Main_txtPeriodoPromCobros2').attr('value', TotalDivision3);
}


/** Rotación de Cuentas por Cobrar **/
function setRotacion_Cuentas_Cobrar()
{
    ArrayNombreOper1 = [     
     'ctl00_CP_Main_txtctascobrar', 
     'ctl00_CP_Main_txtefeccobrar', 
     'ctl00_CP_Main_txtincobrables'     
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtctascobrar2', 
     'ctl00_CP_Main_txtefeccobrar2', 
     'ctl00_CP_Main_txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtctascobrar3', 
     'ctl00_CP_Main_txtefeccobrar3', 
     'ctl00_CP_Main_txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas').attr('value'),TotalOperaciones1);
    TotalDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas2').attr('value'),TotalOperaciones2);
    TotalDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas3').attr('value'),TotalOperaciones3);
    
    $('#ctl00_CP_Main_txtTotacionCuentasCobrar0').attr('value', TotalDivision1);
    $('#ctl00_CP_Main_txtTotacionCuentasCobrar1').attr('value', TotalDivision2);
    $('#ctl00_CP_Main_txtTotacionCuentasCobrar2').attr('value', TotalDivision3);
}



/** Rotación de Inventarios  **/
function setRotacion_Inventarios()
{
    ArrayNombreOper1 = [     
     'ctl00_CP_Main_txtinvmateriaprima', 
     'ctl00_CP_Main_txtinvmaterialproc', 
     'ctl00_CP_Main_txtinvprodterminado',
     'ctl00_CP_Main_txtobsolencia' 
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtinvmateriaprima2', 
     'ctl00_CP_Main_txtinvmaterialproc2', 
     'ctl00_CP_Main_txtinvprodterminado2',
     'ctl00_CP_Main_txtobsolencia2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtinvmateriaprima3', 
     'ctl00_CP_Main_txtinvmaterialproc3', 
     'ctl00_CP_Main_txtinvprodterminado3',
     'ctl00_CP_Main_txtobsolencia3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas').attr('value'),TotalOperaciones1);
    TotalDivision2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas2').attr('value'),TotalOperaciones2);
    TotalDivision3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas3').attr('value'),TotalOperaciones3);
    
    $('#ctl00_CP_Main_txtRotacionInventarios0').attr('value', TotalDivision1);
    $('#ctl00_CP_Main_txtRotacionInventarios1').attr('value', TotalDivision2);
    $('#ctl00_CP_Main_txtRotacionInventarios2').attr('value', TotalDivision3);
}


/** Número de Días a Mano de Inventarios **/
function setNumero_Dias_Mano_Inventarios()
{
    ArrayNombreOper1 = [     
     'ctl00_CP_Main_txtinvmateriaprima', 
     'ctl00_CP_Main_txtinvmaterialproc', 
     'ctl00_CP_Main_txtinvprodterminado',
     'ctl00_CP_Main_txtobsolencia' 
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtinvmateriaprima2', 
     'ctl00_CP_Main_txtinvmaterialproc2', 
     'ctl00_CP_Main_txtinvprodterminado2',
     'ctl00_CP_Main_txtobsolencia2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtinvmateriaprima3', 
     'ctl00_CP_Main_txtinvmaterialproc3', 
     'ctl00_CP_Main_txtinvprodterminado3',
     'ctl00_CP_Main_txtobsolencia3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#ctl00_CP_Main_txtCostVentsServDiar0').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#ctl00_CP_Main_txtCostVentsServDiar1').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#ctl00_CP_Main_txtCostVentsServDiar2').attr('value'));
    
    $('#ctl00_CP_Main_txtNumDiasManInventa0').attr('value', TotalDivision1);
    $('#ctl00_CP_Main_txtNumDiasManInventa1').attr('value', TotalDivision2);
    $('#ctl00_CP_Main_txtNumDiasManInventa2').attr('value', TotalDivision3);
}
 

/** Costo de Ventas o Servicios Diarios **/ 
function setCosto_Ventas_Servicios_Diarios()
{
    //txtVentasNetas
    ResultadoDivCD1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas').attr('value'), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas2').attr('value'), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas3').attr('value'), 360);
    
    $('#ctl00_CP_Main_txtCostVentsServDiar0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtCostVentsServDiar1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtCostVentsServDiar2').attr('value', ResultadoDivCD3);
}

/** Rotación de Cuentas por Pagar  **/ 
function setRotacion_Cuentas_Pagar()
{   
    //txtCompras0 / (txtctaspagar + txtefecpagar)
    
    ArrayNombreOper1 = [
     'ctl00_CP_Main_txtctaspagar',
     'ctl00_CP_Main_txtefecpagar' 
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtctaspagar2',
     'ctl00_CP_Main_txtefecpagar2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtctaspagar3',
     'ctl00_CP_Main_txtefecpagar3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoDivCD1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCompras0').attr('value'), TotalOperaciones1);
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCompras1').attr('value'), TotalOperaciones2);
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCompras2').attr('value'), TotalOperaciones3);
    
    $('#ctl00_CP_Main_txtRotacionCuentasPagar0').attr('value',ResultadoDivCD1); 
    $('#ctl00_CP_Main_txtRotacionCuentasPagar1').attr('value',ResultadoDivCD2);
    $('#ctl00_CP_Main_txtRotacionCuentasPagar2').attr('value',ResultadoDivCD2);

}


/** Compras **/ 
function setCompras()
{   
    //txtCostoVentas / (txtctaspagar + txtefecpagar)
        
    ArrayNombreOper1 = [     
     'ctl00_CP_Main_txtinvmateriaprima', 
     'ctl00_CP_Main_txtinvmaterialproc', 
     'ctl00_CP_Main_txtinvprodterminado',
     'ctl00_CP_Main_txtobsolencia' 
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtinvmateriaprima2', 
     'ctl00_CP_Main_txtinvmaterialproc2', 
     'ctl00_CP_Main_txtinvprodterminado2',
     'ctl00_CP_Main_txtobsolencia2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtinvmateriaprima3', 
     'ctl00_CP_Main_txtinvmaterialproc3', 
     'ctl00_CP_Main_txtinvprodterminado3',
     'ctl00_CP_Main_txtobsolencia3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoTotal1  = restaDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas2').attr('value'), TotalOperaciones1);
    ResultadoTotal1  = sumaDosValores_Retorna(ResultadoTotal1,TotalOperaciones2); 
    
    ResultadoTotal2  = restaDosValores_Retorna($('#ctl00_CP_Main_txtCostoVentas3').attr('value'), TotalOperaciones2);
    ResultadoTotal2  = sumaDosValores_Retorna(ResultadoTotal2,TotalOperaciones3);
        
    
    $('#ctl00_CP_Main_txtCompras0').attr('value', 0);
    $('#ctl00_CP_Main_txtCompras1').attr('value', ResultadoTotal1);
    $('#ctl00_CP_Main_txtCompras2').attr('value', ResultadoTotal2);
}
  

/** Compras Diarias **/ 
function setCompras_Diarias()
{     
    ResultadoDivCD1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCompras0').attr('value'), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCompras1').attr('value'), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtCompras2').attr('value'), 360);
    
    $('#ctl00_CP_Main_txtComprasDiarias0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtComprasDiarias1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtComprasDiarias2').attr('value', ResultadoDivCD3);
}

/** Número de Días a Mano en Cuentas por Pagar **/ 
function setNumero_Dias_Mano_Cuentas_Pagar()
{       
    ArrayNombreOper1 = [
     'ctl00_CP_Main_txtctaspagar',
     'ctl00_CP_Main_txtefecpagar' 
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtctaspagar2',
     'ctl00_CP_Main_txtefecpagar2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtctaspagar3',
     'ctl00_CP_Main_txtefecpagar3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoDivCD1 = divideDosValores_Retorna(TotalOperaciones1, $('#ctl00_CP_Main_txtComprasDiarias0').attr('value'));
    ResultadoDivCD2 = divideDosValores_Retorna(TotalOperaciones2, $('#ctl00_CP_Main_txtComprasDiarias1').attr('value'));
    ResultadoDivCD3 = divideDosValores_Retorna(TotalOperaciones3, $('#ctl00_CP_Main_txtComprasDiarias2').attr('value'));
    
    $('#ctl00_CP_Main_txtNumDiasManCuantasPagar0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtNumDiasManCuantasPagar1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtNumDiasManCuantasPagar2').attr('value', ResultadoDivCD3);    
} 


/** Ciclo de Efectivo **/ 
function setCiclo_Efectivo()
{       
    ArrayNombreOper1 = [
     'ctl00_CP_Main_txtPeriodoPromCobros0',
     'ctl00_CP_Main_txtNumDiasManInventa0',
     'ctl00_CP_Main_txtNumDiasManCuantasPagar0'
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtPeriodoPromCobros1',
     'ctl00_CP_Main_txtNumDiasManInventa1',
     'ctl00_CP_Main_txtNumDiasManCuantasPagar1'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtPeriodoPromCobros2',
     'ctl00_CP_Main_txtNumDiasManInventa2',
     'ctl00_CP_Main_txtNumDiasManCuantasPagar2'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);   
    
    $('#ctl00_CP_Main_txtCicloEfectivo0').attr('value', TotalOperaciones1);
    $('#ctl00_CP_Main_txtCicloEfectivo1').attr('value', TotalOperaciones2);
    $('#ctl00_CP_Main_txtCicloEfectivo2').attr('value', TotalOperaciones3);    
}


/* Endeudamiento Total */ 
function setEndeudamiento_Total()
{    
    ResultadoDiv1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalPasivos').attr('value'), $('#ctl00_CP_Main_txtTotalCapital').attr('value'));
    ResultadoDiv2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalPasivos2').attr('value'), $('#ctl00_CP_Main_txtTotalCapital2').attr('value'));
    ResultadoDiv3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalPasivos3').attr('value'), $('#ctl00_CP_Main_txtTotalCapital3').attr('value'));
    
    $('#ctl00_CP_Main_txtEndeudamientoTotal0').attr('value', ResultadoDiv1);
    $('#ctl00_CP_Main_txtEndeudamientoTotal1').attr('value', ResultadoDiv2);
    $('#ctl00_CP_Main_txtEndeudamientoTotal2').attr('value', ResultadoDiv3);    
}


/* Endeudamiento Circulante */ 
function setEndeudamiento_Circulante()
{    
    ResultadoDiv1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalPasivoCirc').attr('value'), $('#ctl00_CP_Main_txtTotalCapital').attr('value'));
    ResultadoDiv2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalPasivoCirc2').attr('value'), $('#ctl00_CP_Main_txtTotalCapital2').attr('value'));
    ResultadoDiv3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalPasivoCirc3').attr('value'), $('#ctl00_CP_Main_txtTotalCapital3').attr('value'));
    
    $('#ctl00_CP_Main_txtEndeudamientoCirculante0').attr('value', ResultadoDiv1);
    $('#ctl00_CP_Main_txtEndeudamientoCirculante1').attr('value', ResultadoDiv2);
    $('#ctl00_CP_Main_txtEndeudamientoCirculante2').attr('value', ResultadoDiv3);    
}


/* Endeudamiento Bancario Total */
function setEndeudamiento_Bancario_Total()
{    
 
     //(txtobligbancarias + txtCtasAccionistas) / txtTotalCapital
        
    ArrayNombreOper1 = [
     'ctl00_CP_Main_txtobligbancarias',
     'ctl00_CP_Main_txtCtasAccionistas'     
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtobligbancarias2',
     'ctl00_CP_Main_txtCtasAccionistas2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtobligbancarias3',
     'ctl00_CP_Main_txtCtasAccionistas3'   
     ];     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoDiv1 = divideDosValores_Retorna(TotalOperaciones1, $('#ctl00_CP_Main_txtTotalCapital').attr('value'));
    ResultadoDiv2 = divideDosValores_Retorna(TotalOperaciones2, $('#ctl00_CP_Main_txtTotalCapital2').attr('value'));
    ResultadoDiv3 = divideDosValores_Retorna(TotalOperaciones3, $('#ctl00_CP_Main_txtTotalCapital3').attr('value'));       
    
    $('#ctl00_CP_Main_txtEndeuBancTotal0').attr('value', ResultadoDiv1);
    $('#ctl00_CP_Main_txtEndeuBancTotal1').attr('value', ResultadoDiv2);
    $('#ctl00_CP_Main_txtEndeuBancTotal2').attr('value', ResultadoDiv3);   
}

/** Endeudamiento a Largo Plazo **/
function setEndeudamiento_Largo_Plazo()
{
    //txtTotalCapital / txtTotalCapital     
    ResultadoDivCD1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalCapital').attr('value'), $('#ctl00_CP_Main_txtTotalCapital').attr('value'));
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalCapital2').attr('value'), $('#ctl00_CP_Main_txtTotalCapital2').attr('value'));
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtTotalCapital3').attr('value'), $('#ctl00_CP_Main_txtTotalCapital3').attr('value'));
    
    $('#ctl00_CP_Main_txtEndeuLargoPlazo0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtEndeuLargoPlazo1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtEndeuLargoPlazo2').attr('value', ResultadoDivCD3);
}

/** Rotación de la Planta **/
function setRotacion_Planta()
{
    //txtVentasNetas / txtTotalActFijo    
         
    ResultadoDivCD1 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas').attr('value'), $('#ctl00_CP_Main_txtTotalActFijo').attr('value'));
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas2').attr('value'), $('#ctl00_CP_Main_txtTotalActFijo2').attr('value'));
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtVentasNetas3').attr('value'), $('#ctl00_CP_Main_txtTotalActFijo3').attr('value'));
    
    $('#ctl00_CP_Main_txtRotaciPlanta0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtRotaciPlanta1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtRotaciPlanta2').attr('value', ResultadoDivCD3);
}


/** Productividad de la Empresa **/ 
function setProductividad_Empresa()
{
    
    //txtGenerAbsobOper0 / (txtTotalActCirc + txtTotalActFijo)
        
    ArrayNombreOper1 = [
     'ctl00_CP_Main_txtTotalActCirc',
     'ctl00_CP_Main_txtTotalActFijo'     
     ];
     
     ArrayNombreOper2 = [     
     'ctl00_CP_Main_txtTotalActCirc2',
     'ctl00_CP_Main_txtTotalActFijo2'   
     ];
     
      ArrayNombreOper3 = [     
     'ctl00_CP_Main_txtTotalActCirc3',
     'ctl00_CP_Main_txtTotalActFijo3'  
     ];     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3); 
    
    ResultadoDivCD1 = divideDosValores_Retorna(0, TotalOperaciones1);
    ResultadoDivCD2 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGenerAbsobOper0').attr('value'), TotalOperaciones2);
    ResultadoDivCD3 = divideDosValores_Retorna($('#ctl00_CP_Main_txtGenerAbsobOper1').attr('value'), TotalOperaciones3);
    
    $('#ctl00_CP_Main_txtProducEmpre0').attr('value', ResultadoDivCD1);
    $('#ctl00_CP_Main_txtProducEmpre1').attr('value', ResultadoDivCD2);
    $('#ctl00_CP_Main_txtProducEmpre2').attr('value', ResultadoDivCD3);    
}
