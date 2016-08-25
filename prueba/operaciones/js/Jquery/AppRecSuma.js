
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
	
	var total_act_fijo = parseFloat($('#txtterrenos').attr('value'))+parseFloat($('#txtedif').attr('value'))+parseFloat($('#txtmaquinaria').attr('value'))+parseFloat($('#txtinstmejoras').attr('value'))+parseFloat($('#txtmobiliario').attr('value'))+parseFloat($('#txtRespAccHerra').attr('value'))+parseFloat($('#txtvehiculo').attr('value'))-parseFloat($('#txtdepreciacion').attr('value'))+parseFloat($('#txtContrucEnProceso').attr('value'));
			  
	$('#txtTotalActFijo').attr('value',roundNumber(parseFloat(total_act_fijo),2));
	
	var total_act = parseFloat($('#txtTotalActFijo').attr('value'))+parseFloat($('#txtTotalActCirc').attr('value'))+parseFloat($('#txtTotalOtrosAct').attr('value'))
	
	$('#txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}

function sumaTotalActCirc(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_circ = parseFloat($('#txtcajachica').attr('value'))+parseFloat($('#txtcajabancos').attr('value'))+parseFloat($('#txtctascobrar').attr('value'))+parseFloat($('#txtefeccobrar').attr('value'))-parseFloat($('#txtincobrables').attr('value'))+parseFloat($('#txtinvmateriaprima').attr('value'))+parseFloat($('#txtinvmaterialproc').attr('value'))+parseFloat($('#txtinvprodterminado').attr('value'))-parseFloat($('#txtobsolencia').attr('value'));
			  
	$('#txtTotalActCirc').attr('value',roundNumber(parseFloat(total_act_circ),2));	
	
	var total_act = parseFloat($('#txtTotalActFijo').attr('value'))+parseFloat($('#txtTotalActCirc').attr('value'))+parseFloat($('#txtTotalOtrosAct').attr('value'))
	
	$('#txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}

function sumaTotalOtrosAct(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_otros_act = parseFloat($('#txtdepgarantia').attr('value'))+parseFloat($('#txtcargosdif').attr('value'))+parseFloat($('#txtcredfiscal').attr('value'))+parseFloat($('#txtctascobraracc').attr('value'))+parseFloat($('#txtotrosact').attr('value'));
			  
	$('#txtTotalOtrosAct').attr('value',roundNumber(parseFloat(total_otros_act),2));
	
	var total_act = parseFloat($('#txtTotalActFijo').attr('value'))+parseFloat($('#txtTotalActCirc').attr('value'))+parseFloat($('#txtTotalOtrosAct').attr('value'))
	
	$('#txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}


// Suma Segunda Columna


function sumaTotalActFijo2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_fijo2 = parseFloat($('#txtterrenos2').attr('value'))+parseFloat($('#txtedif2').attr('value'))+parseFloat($('#txtmaquinaria2').attr('value'))+parseFloat($('#txtinstmejoras2').attr('value'))+parseFloat($('#txtmobiliario2').attr('value'))+parseFloat($('#txtRespAccHerra2').attr('value'))+parseFloat($('#txtvehiculo2').attr('value'))-parseFloat($('#txtdepreciacion2').attr('value'))+parseFloat($('#txtContrucEnProceso2').attr('value'));
			  
	$('#txtTotalActFijo2').attr('value',roundNumber(parseFloat(total_act_fijo2),2));
	
	var total_act2 = parseFloat($('#txtTotalActFijo2').attr('value'))+parseFloat($('#txtTotalActCirc2').attr('value'))+parseFloat($('#txtTotalOtrosAct2').attr('value'))
	
	$('#txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}


function sumaTotalActCirc2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_circ2 = parseFloat($('#txtcajachica2').attr('value'))+parseFloat($('#txtcajabancos2').attr('value'))+parseFloat($('#txtctascobrar2').attr('value'))+parseFloat($('#txtefeccobrar2').attr('value'))-parseFloat($('#txtincobrables2').attr('value'))+parseFloat($('#txtinvmateriaprima2').attr('value'))+parseFloat($('#txtinvmaterialproc2').attr('value'))+parseFloat($('#txtinvprodterminado2').attr('value'))-parseFloat($('#txtobsolencia2').attr('value'));
			  
	$('#txtTotalActCirc2').attr('value',roundNumber(parseFloat(total_act_circ2),2));	
	
	var total_act2 = parseFloat($('#txtTotalActFijo2').attr('value'))+parseFloat($('#txtTotalActCirc2').attr('value'))+parseFloat($('#txtTotalOtrosAct2').attr('value'))
	
	$('#txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}


function sumaTotalOtrosAct2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_otros_act2 = parseFloat($('#txtdepgarantia2').attr('value'))+parseFloat($('#txtcargosdif2').attr('value'))+parseFloat($('#txtcredfiscal2').attr('value'))+parseFloat($('#txtctascobraracc2').attr('value'))+parseFloat($('#txtotrosact2').attr('value'));
			  
	$('#txtTotalOtrosAct2').attr('value',roundNumber(parseFloat(total_otros_act2),2));
	
	var total_act2 = parseFloat($('#txtTotalActFijo2').attr('value'))+parseFloat($('#txtTotalActCirc2').attr('value'))+parseFloat($('#txtTotalOtrosAct2').attr('value'))
	
	$('#txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}

// Suma Tercera Columna


function sumaTotalActFijo3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_fijo3 = parseFloat($('#txtterrenos3').attr('value'))+parseFloat($('#txtedif3').attr('value'))+parseFloat($('#txtmaquinaria3').attr('value'))+parseFloat($('#txtinstmejoras3').attr('value'))+parseFloat($('#txtmobiliario3').attr('value'))+parseFloat($('#txtRespAccHerra3').attr('value'))+parseFloat($('#txtvehiculo3').attr('value'))-parseFloat($('#txtdepreciacion3').attr('value'))+parseFloat($('#txtContrucEnProceso3').attr('value'));
			  
	$('#txtTotalActFijo3').attr('value',roundNumber(parseFloat(total_act_fijo3),2));
	
	var total_act3 = parseFloat($('#txtTotalActFijo3').attr('value'))+parseFloat($('#txtTotalActCirc3').attr('value'))+parseFloat($('#txtTotalOtrosAct3').attr('value'))
	
	$('#txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}


function sumaTotalActCirc3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_act_circ3 = parseFloat($('#txtcajachica3').attr('value'))+parseFloat($('#txtcajabancos3').attr('value'))+parseFloat($('#txtctascobrar3').attr('value'))+parseFloat($('#txtefeccobrar3').attr('value'))-parseFloat($('#txtincobrables3').attr('value'))+parseFloat($('#txtinvmateriaprima3').attr('value'))+parseFloat($('#txtinvmaterialproc3').attr('value'))+parseFloat($('#txtinvprodterminado3').attr('value'))-parseFloat($('#txtobsolencia3').attr('value'));
			  
	$('#txtTotalActCirc3').attr('value',roundNumber(parseFloat(total_act_circ3),2));	
	
	var total_act3 = parseFloat($('#txtTotalActFijo3').attr('value'))+parseFloat($('#txtTotalActCirc3').attr('value'))+parseFloat($('#txtTotalOtrosAct3').attr('value'))
	
	$('#txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}


function sumaTotalOtrosAct3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_otros_act3 = parseFloat($('#txtdepgarantia3').attr('value'))+parseFloat($('#txtcargosdif3').attr('value'))+parseFloat($('#txtcredfiscal3').attr('value'))+parseFloat($('#txtctascobraracc3').attr('value'))+parseFloat($('#txtotrosact3').attr('value'));
			  
	$('#txtTotalOtrosAct3').attr('value',roundNumber(parseFloat(total_otros_act3),2));
	
	var total_act3 = parseFloat($('#txtTotalActFijo3').attr('value'))+parseFloat($('#txtTotalActCirc3').attr('value'))+parseFloat($('#txtTotalOtrosAct3').attr('value'))
	
	$('#txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}

// Suma de pasivos



function sumaTotalPasivoCirc(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivo_circ = parseFloat($('#txtobligbancarias').attr('value'))+parseFloat($('#txtdeudalp').attr('value'))+parseFloat($('#txtctaspagar').attr('value'))+parseFloat($('#txtefecpagar').attr('value'))+parseFloat($('#txtretenciones').attr('value'))+parseFloat($('#txtgastosacum').attr('value'))+parseFloat($('#txtimpuestospagar').attr('value'))+parseFloat($('#txtprestaciones').attr('value'))+parseFloat($('#txtotrospasivos').attr('value'));
			  
	$('#txtTotalPasivoCirc').attr('value',roundNumber(parseFloat(total_pasivo_circ),2));	
	
	var total_pasivo = parseFloat($('#txtTotalPasivoLP').attr('value'))+parseFloat($('#txtTotalPasivoCirc').attr('value'))
	
	$('#txtTotalPasivos').attr('value',roundNumber(parseFloat(total_pasivo),2));
	
	var total_pasivo_cap = parseFloat($('#txtTotalPasivos').attr('value'))+parseFloat($('#txtTotalCapital').attr('value'))
	
	$('#txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}

function sumaTotalCapital(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_capital = parseFloat($('#txtcapitalsocial').attr('value'))+parseFloat($('#txtcapitalnopago').attr('value'))+parseFloat($('#txtreserva').attr('value'))+parseFloat($('#txtSuperavitAcum').attr('value'))+parseFloat($('#txtSuperavitReeval').attr('value'))+parseFloat($('#txtejercicio').attr('value'));
			  
	$('#txtTotalCapital').attr('value',roundNumber(parseFloat(total_capital),2));
	
	var total_pasivo_cap = parseFloat($('#txtTotalPasivoLP').attr('value'))+parseFloat($('#txtTotalPasivoCirc').attr('value'))+parseFloat($('#txtTotalCapital').attr('value'))
	
	$('#txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}

function sumaTotalPasivoLP(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivoLP = parseFloat($('#txtCtasAccionistas').attr('value'))+parseFloat($('#txtctaspagarlp').attr('value'));
			  
	$('#txtTotalPasivoLP').attr('value',roundNumber(parseFloat(total_pasivoLP),2));
	
	var total_pasivo = parseFloat($('#txtTotalPasivoLP').attr('value'))+parseFloat($('#txtTotalPasivoCirc').attr('value'))
	
	$('#txtTotalPasivos').attr('value',roundNumber(parseFloat(total_pasivo),2));
	
	var total_pasivo_cap = parseFloat($('#txtTotalPasivos').attr('value'))+parseFloat($('#txtTotalCapital').attr('value'))
	
	$('#txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}


//SUMAS DE PASIVO COLUMNA 2


function sumaTotalPasivoCirc2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivo_circ2 = parseFloat($('#txtobligbancarias2').attr('value'))+parseFloat($('#txtdeudalp2').attr('value'))+parseFloat($('#txtctaspagar2').attr('value'))+parseFloat($('#txtefecpagar2').attr('value'))+parseFloat($('#txtretenciones2').attr('value'))+parseFloat($('#txtgastosacum2').attr('value'))+parseFloat($('#txtimpuestospagar2').attr('value'))+parseFloat($('#txtprestaciones2').attr('value'))+parseFloat($('#txtotrospasivos2').attr('value'));
			  
	$('#txtTotalPasivoCirc2').attr('value',roundNumber(parseFloat(total_pasivo_circ2),2));	
	
	var total_pasivo2 = parseFloat($('#txtTotalPasivoLP2').attr('value'))+parseFloat($('#txtTotalPasivoCirc2').attr('value'))
	
	$('#txtTotalPasivos2').attr('value',roundNumber(parseFloat(total_pasivo2),2));
	
	var total_pasivo_cap2 = parseFloat($('#txtTotalPasivos2').attr('value'))+parseFloat($('#txtTotalCapital2').attr('value'))
	
	$('#txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}

function sumaTotalCapital2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_capital2 = parseFloat($('#txtcapitalsocial2').attr('value'))+parseFloat($('#txtcapitalnopago2').attr('value'))+parseFloat($('#txtreserva2').attr('value'))+parseFloat($('#txtSuperavitAcum2').attr('value'))+parseFloat($('#txtSuperavitReeval2').attr('value'))+parseFloat($('#txtejercicio2').attr('value'));
			  
	$('#txtTotalCapital2').attr('value',roundNumber(parseFloat(total_capital2),2));
	
	var total_pasivo_cap2 = parseFloat($('#txtTotalPasivoLP2').attr('value'))+parseFloat($('#txtTotalPasivoCirc2').attr('value'))+parseFloat($('#txtTotalCapital2').attr('value'))
	
	$('#txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}

function sumaTotalPasivoLP2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivoLP2 = parseFloat($('#txtCtasAccionistas2').attr('value'))+parseFloat($('#txtctaspagarlp2').attr('value'));
			  
	$('#txtTotalPasivoLP2').attr('value',roundNumber(parseFloat(total_pasivoLP2),2));
	
	var total_pasivo2 = parseFloat($('#txtTotalPasivoLP2').attr('value'))+parseFloat($('#txtTotalPasivoCirc2').attr('value'))
	
	$('#txtTotalPasivos2').attr('value',roundNumber(parseFloat(total_pasivo2),2));
	
	var total_pasivo_cap2 = parseFloat($('#txtTotalPasivos2').attr('value'))+parseFloat($('#txtTotalCapital2').attr('value'))
	
	$('#txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}


// SUMA DE PASIVOS COLUMNA 3


function sumaTotalPasivoCirc3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivo_circ3 = parseFloat($('#txtobligbancarias3').attr('value'))+parseFloat($('#txtdeudalp3').attr('value'))+parseFloat($('#txtctaspagar3').attr('value'))+parseFloat($('#txtefecpagar3').attr('value'))+parseFloat($('#txtretenciones3').attr('value'))+parseFloat($('#txtgastosacum3').attr('value'))+parseFloat($('#txtimpuestospagar3').attr('value'))+parseFloat($('#txtprestaciones3').attr('value'))+parseFloat($('#txtotrospasivos3').attr('value'));
			  
	$('#txtTotalPasivoCirc3').attr('value',roundNumber(parseFloat(total_pasivo_circ3),2));	
	
	var total_pasivo3 = parseFloat($('#txtTotalPasivoLP3').attr('value'))+parseFloat($('#txtTotalPasivoCirc3').attr('value'))
	
	$('#txtTotalPasivos3').attr('value',roundNumber(parseFloat(total_pasivo3),2));
	
	var total_pasivo_cap3 = parseFloat($('#txtTotalPasivos3').attr('value'))+parseFloat($('#txtTotalCapital3').attr('value'))
	
	$('#txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}

function sumaTotalCapital3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_capital3 = parseFloat($('#txtcapitalsocial3').attr('value'))+parseFloat($('#txtcapitalnopago3').attr('value'))+parseFloat($('#txtreserva3').attr('value'))+parseFloat($('#txtSuperavitAcum3').attr('value'))+parseFloat($('#txtSuperavitReeval3').attr('value'))+parseFloat($('#txtejercicio3').attr('value'));
			  
	$('#txtTotalCapital3').attr('value',roundNumber(parseFloat(total_capital3),2));
	
	var total_pasivo_cap3 = parseFloat($('#txtTotalPasivoLP3').attr('value'))+parseFloat($('#txtTotalPasivoCirc3').attr('value'))+parseFloat($('#txtTotalCapital3').attr('value'))
	
	$('#txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}

function sumaTotalPasivoLP3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var total_pasivoLP3 = parseFloat($('#txtCtasAccionistas3').attr('value'))+parseFloat($('#txtctaspagarlp3').attr('value'));
			  
	$('#txtTotalPasivoLP3').attr('value',roundNumber(parseFloat(total_pasivoLP3),2));
	
	var total_pasivo3 = parseFloat($('#txtTotalPasivoLP3').attr('value'))+parseFloat($('#txtTotalPasivoCirc3').attr('value'))
	
	$('#txtTotalPasivos3').attr('value',roundNumber(parseFloat(total_pasivo3),2));
	
	var total_pasivo_cap3 = parseFloat($('#txtTotalPasivos3').attr('value'))+parseFloat($('#txtTotalCapital3').attr('value'))
	
	$('#txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}



//GANANCIAS Y PERDIDAS


function beneficioBruto(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_bruto = parseFloat($('#txtVentasNetas').attr('value'))-parseFloat($('#txtCostoVentas').attr('value'));
			  
	$('#txtBenefBruto').attr('value',roundNumber(parseFloat(benef_bruto),2));
	
	var benef_neto_oper = parseFloat($('#txtBenefBruto').attr('value'))-parseFloat($('#txtGastosAdm').attr('value'));
	
	$('#txtBenefNetoOper').attr('value',roundNumber(parseFloat(benef_neto_oper),2));
	
	var benef_antes_imp_y_no_usuales = parseFloat($('#txtBenefNetoOper').attr('value'))+parseFloat($('#txtOtrosIngresos').attr('value'))-parseFloat($('#txtOtrosEgresos').attr('value'))-parseFloat($('#txtGastosFinanc').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
	var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#txtislr').attr('value'))+parseFloat($('#txtAjustePlanta').attr('value'))+parseFloat($('#txtAjusteInv').attr('value')));
	
	$('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#txtBenefDespNoUsuales').attr('value'))-parseFloat($('#txtDivPagosEfect').attr('value'));
	
	$('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#txtEjercicio').attr('value'))-(parseFloat($('#txtAumCapSocial').attr('value'))+parseFloat($('#txtDismCapSocial').attr('value'))+parseFloat($('#txtAumReservaLegal').attr('value')));
	
	$('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
	
}


function benefNetoEnOper(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_neto_oper = parseFloat($('#txtBenefBruto').attr('value'))-parseFloat($('#txtGastosAdm').attr('value'));
	
	$('#txtBenefNetoOper').attr('value',roundNumber(parseFloat(benef_neto_oper),2));
	
	var benef_antes_imp_y_no_usuales = parseFloat($('#txtBenefNetoOper').attr('value'))+parseFloat($('#txtOtrosIngresos').attr('value'))-parseFloat($('#txtOtrosEgresos').attr('value'))-parseFloat($('#txtGastosFinanc').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
	var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#txtislr').attr('value'))+parseFloat($('#txtAjustePlanta').attr('value'))+parseFloat($('#txtAjusteInv').attr('value')));
	
	$('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#txtBenefDespNoUsuales').attr('value'))-parseFloat($('#txtDivPagosEfect').attr('value'));
	
	$('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#txtEjercicio').attr('value'))-(parseFloat($('#txtAumCapSocial').attr('value'))+parseFloat($('#txtDismCapSocial').attr('value'))+parseFloat($('#txtAumReservaLegal').attr('value')));
	
	$('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function benefAntesImpYNoUsuales(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_antes_imp_y_no_usuales = parseFloat($('#txtBenefNetoOper').attr('value'))+parseFloat($('#txtOtrosIngresos').attr('value'))-parseFloat($('#txtOtrosEgresos').attr('value'))-parseFloat($('#txtGastosFinanc').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
	var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#txtislr').attr('value'))+parseFloat($('#txtAjustePlanta').attr('value'))+parseFloat($('#txtAjusteInv').attr('value')));
	
	$('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#txtBenefDespNoUsuales').attr('value'))-parseFloat($('#txtDivPagosEfect').attr('value'));
	
	$('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#txtEjercicio').attr('value'))-(parseFloat($('#txtAumCapSocial').attr('value'))+parseFloat($('#txtDismCapSocial').attr('value'))+parseFloat($('#txtAumReservaLegal').attr('value')));
	
	$('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function benefNetoDespNoUsuales(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').attr('value'))-(parseFloat($('#txtislr').attr('value'))+parseFloat($('#txtAjustePlanta').attr('value'))+parseFloat($('#txtAjusteInv').attr('value')));
	
	$('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
	var ejercicio = parseFloat($('#txtBenefDespNoUsuales').attr('value'))-parseFloat($('#txtDivPagosEfect').attr('value'));
	
	$('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#txtEjercicio').attr('value'))-(parseFloat($('#txtAumCapSocial').attr('value'))+parseFloat($('#txtDismCapSocial').attr('value'))+parseFloat($('#txtAumReservaLegal').attr('value')));
	
	$('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function resultadoEjercicio(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var ejercicio = parseFloat($('#txtBenefDespNoUsuales').attr('value'))-parseFloat($('#txtDivPagosEfect').attr('value'));
	
	$('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
	var aum_dism_cap_contable = parseFloat($('#txtEjercicio').attr('value'))-(parseFloat($('#txtAumCapSocial').attr('value'))+parseFloat($('#txtDismCapSocial').attr('value'))+parseFloat($('#txtAumReservaLegal').attr('value')));
	
	$('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function aumDismCapContable(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var aum_dism_cap_contable = parseFloat($('#txtEjercicio').attr('value'))-(parseFloat($('#txtAumCapSocial').attr('value'))+parseFloat($('#txtDismCapSocial').attr('value'))+parseFloat($('#txtAumReservaLegal').attr('value')));
	
	$('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}






//GANANCIAS Y PERDIDAS COLUMNA 2

function beneficioBruto2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_bruto2 = parseFloat($('#txtVentasNetas2').attr('value'))-parseFloat($('#txtCostoVentas2').attr('value'));
			  
	$('#txtBenefBruto2').attr('value',roundNumber(parseFloat(benef_bruto2),2));
	
	var benef_neto_oper2 = parseFloat($('#txtBenefBruto2').attr('value'))-parseFloat($('#txtGastosAdm2').attr('value'));
	
	$('#txtBenefNetoOper2').attr('value',roundNumber(parseFloat(benef_neto_oper2),2));
	
	var benef_antes_imp_y_no_usuales2 = parseFloat($('#txtBenefNetoOper').attr('value'))+parseFloat($('#txtOtrosIngresos').attr('value'))-parseFloat($('#txtOtrosEgresos').attr('value'))-parseFloat($('#txtGastosFinanc').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
	var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#txtislr2').attr('value'))+parseFloat($('#txtAjustePlanta2').attr('value'))+parseFloat($('#txtAjusteInv2').attr('value')));
	
	$('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#txtDivPagosEfect2').attr('value'));
	
	$('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').attr('value'))-(parseFloat($('#txtAumCapSocial2').attr('value'))+parseFloat($('#txtDismCapSocial2').attr('value'))+parseFloat($('#txtAumReservaLegal2').attr('value')));
	
		
	$('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	
}


function benefNetoEnOper2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_neto_oper2 = parseFloat($('#txtBenefBruto2').attr('value'))-parseFloat($('#txtGastosAdm2').attr('value'));
	
	$('#txtBenefNetoOper2').attr('value',roundNumber(parseFloat(benef_neto_oper2),2));
	
	var benef_antes_imp_y_no_usuales2 = parseFloat($('#txtBenefNetoOper2').attr('value'))+parseFloat($('#txtOtrosIngresos2').attr('value'))-parseFloat($('#txtOtrosEgresos2').attr('value'))-parseFloat($('#txtGastosFinanc2').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
	var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#txtislr2').attr('value'))+parseFloat($('#txtAjustePlanta2').attr('value'))+parseFloat($('#txtAjusteInv2').attr('value')));
	
	$('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#txtDivPagosEfect2').attr('value'));
	
	$('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').attr('value'))-(parseFloat($('#txtAumCapSocial2').attr('value'))+parseFloat($('#txtDismCapSocial2').attr('value'))+parseFloat($('#txtAumReservaLegal2').attr('value')));
	
	$('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function benefAntesImpYNoUsuales2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_antes_imp_y_no_usuales2 = parseFloat($('#txtBenefNetoOper2').attr('value'))+parseFloat($('#txtOtrosIngresos2').attr('value'))-parseFloat($('#txtOtrosEgresos2').attr('value'))-parseFloat($('#txtGastosFinanc2').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
	var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#txtislr2').attr('value'))+parseFloat($('#txtAjustePlanta2').attr('value'))+parseFloat($('#txtAjusteInv2').attr('value')));
	
	$('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#txtDivPagosEfect2').attr('value'));
	
	$('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').attr('value'))-(parseFloat($('#txtAumCapSocial2').attr('value'))+parseFloat($('#txtDismCapSocial2').attr('value'))+parseFloat($('#txtAumReservaLegal2').attr('value')));
	
	$('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function benefNetoDespNoUsuales2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').attr('value'))-(parseFloat($('#txtislr2').attr('value'))+parseFloat($('#txtAjustePlanta2').attr('value'))+parseFloat($('#txtAjusteInv2').attr('value')));
	
	$('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
	var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#txtDivPagosEfect2').attr('value'));
	
	$('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').attr('value'))-(parseFloat($('#txtAumCapSocial2').attr('value'))+parseFloat($('#txtDismCapSocial2').attr('value'))+parseFloat($('#txtAumReservaLegal2').attr('value')));
	
	$('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function resultadoEjercicio2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').attr('value'))-parseFloat($('#txtDivPagosEfect2').attr('value'));
	
	$('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
	var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').attr('value'))-(parseFloat($('#txtAumCapSocial2').attr('value'))+parseFloat($('#txtDismCapSocial2').attr('value'))+parseFloat($('#txtAumReservaLegal2').attr('value')));
	
	$('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function aumDismCapContable2(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').attr('value'))-(parseFloat($('#txtAumCapSocial2').attr('value'))+parseFloat($('#txtDismCapSocial2').attr('value'))+parseFloat($('#txtAumReservaLegal2').attr('value')));
	
	$('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	$('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}



//GANANCIAS Y PERDIDAS COLUMNA 3


function beneficioBruto3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_bruto3 = parseFloat($('#txtVentasNetas3').attr('value'))-parseFloat($('#txtCostoVentas3').attr('value'));
			  
	$('#txtBenefBruto3').attr('value',roundNumber(parseFloat(benef_bruto3),2));
	
	var benef_neto_oper3 = parseFloat($('#txtBenefBruto3').attr('value'))-parseFloat($('#txtGastosAdm3').attr('value'));
	
	$('#txtBenefNetoOper3').attr('value',roundNumber(parseFloat(benef_neto_oper3),2));
	
	var benef_antes_imp_y_no_usuales3 = parseFloat($('#txtBenefNetoOper').attr('value'))+parseFloat($('#txtOtrosIngresos').attr('value'))-parseFloat($('#txtOtrosEgresos').attr('value'))-parseFloat($('#txtGastosFinanc').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
	var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#txtislr3').attr('value'))+parseFloat($('#txtAjustePlanta3').attr('value'))+parseFloat($('#txtAjusteInv3').attr('value')));
	
	$('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#txtDivPagosEfect3').attr('value'));
	
	$('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').attr('value'))-(parseFloat($('#txtAumCapSocial3').attr('value'))+parseFloat($('#txtDismCapSocial3').attr('value'))+parseFloat($('#txtAumReservaLegal3').attr('value')));
	
		
	$('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	$('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	
}


function benefNetoEnOper3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_neto_oper3 = parseFloat($('#txtBenefBruto3').attr('value'))-parseFloat($('#txtGastosAdm3').attr('value'));
	
	$('#txtBenefNetoOper3').attr('value',roundNumber(parseFloat(benef_neto_oper3),2));
	
	var benef_antes_imp_y_no_usuales3 = parseFloat($('#txtBenefNetoOper3').attr('value'))+parseFloat($('#txtOtrosIngresos3').attr('value'))-parseFloat($('#txtOtrosEgresos3').attr('value'))-parseFloat($('#txtGastosFinanc3').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
	var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#txtislr3').attr('value'))+parseFloat($('#txtAjustePlanta3').attr('value'))+parseFloat($('#txtAjusteInv3').attr('value')));
	
	$('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#txtDivPagosEfect3').attr('value'));
	
	$('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').attr('value'))-(parseFloat($('#txtAumCapSocial3').attr('value'))+parseFloat($('#txtDismCapSocial3').attr('value'))+parseFloat($('#txtAumReservaLegal3').attr('value')));
	
	$('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	$('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function benefAntesImpYNoUsuales3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_antes_imp_y_no_usuales3 = parseFloat($('#txtBenefNetoOper3').attr('value'))+parseFloat($('#txtOtrosIngresos3').attr('value'))-parseFloat($('#txtOtrosEgresos3').attr('value'))-parseFloat($('#txtGastosFinanc3').attr('value'));
	
	$('#txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
	var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#txtislr3').attr('value'))+parseFloat($('#txtAjustePlanta3').attr('value'))+parseFloat($('#txtAjusteInv3').attr('value')));
	
	$('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#txtDivPagosEfect3').attr('value'));
	
	$('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').attr('value'))-(parseFloat($('#txtAumCapSocial3').attr('value'))+parseFloat($('#txtDismCapSocial3').attr('value'))+parseFloat($('#txtAumReservaLegal3').attr('value')));
	
	$('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	$('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function benefNetoDespNoUsuales3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').attr('value'))-(parseFloat($('#txtislr3').attr('value'))+parseFloat($('#txtAjustePlanta3').attr('value'))+parseFloat($('#txtAjusteInv3').attr('value')));
	
	$('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
	var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#txtDivPagosEfect3').attr('value'));
	
	$('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').attr('value'))-(parseFloat($('#txtAumCapSocial3').attr('value'))+parseFloat($('#txtDismCapSocial3').attr('value'))+parseFloat($('#txtAumReservaLegal3').attr('value')));
	
	$('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	$('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function resultadoEjercicio3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').attr('value'))-parseFloat($('#txtDivPagosEfect3').attr('value'));
	
	$('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
	var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').attr('value'))-(parseFloat($('#txtAumCapSocial3').attr('value'))+parseFloat($('#txtDismCapSocial3').attr('value'))+parseFloat($('#txtAumReservaLegal3').attr('value')));
	
	$('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	$('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function aumDismCapContable3(campo){
	
	if ($(campo).attr('value')==''){
		$(campo).attr('value','0');
	}
	
	var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').attr('value'))-(parseFloat($('#txtAumCapSocial3').attr('value'))+parseFloat($('#txtDismCapSocial3').attr('value'))+parseFloat($('#txtAumReservaLegal3').attr('value')));
	
	$('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	$('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}


/*  Asignacion de valores al total de Generación o Absorción Por Operaciones */   

function setGeneracion_Absor_Operaciones()
{   
    ArrayNombreOper1 = ['txtFFBenefNetoDespNoUsu', 'txtDepreciacion0', 'txtProvImp0' , 'txtProvCtasInco0' , 'txtProvObsolencia0'];
    ArrayNombreOper2 = ['txtFFBenefNetoDespNoUsu1', 'txtDepreciacion1', 'txtProvImp1' , 'txtProvCtasInco1' , 'txtProvObsolencia1'];
    
    TotalOperaciones1 = sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    
    $('#txtGenerAbsobOper0').attr('value', TotalOperaciones1);
    $('#txtGenerAbsobOper1').attr('value', TotalOperaciones2);
}

/*  Asignacion de Inventarios */   

function setInvetarios()
{   
    Suma_Year1 = ['txtinvmateriaprima', 'txtinvmaterialproc', 'txtinvprodterminado'];
    Suma_Year2 = ['txtinvmateriaprima2', 'txtinvmaterialproc2', 'txtinvprodterminado2'];
    Suma_Year3 = ['txtinvmateriaprima3', 'txtinvmaterialproc3', 'txtinvprodterminado3'];
    
    Total_Year1 = sumaValores(Suma_Year1);  
    Total_Year2 = sumaValores(Suma_Year2);
    Total_Year3 = sumaValores(Suma_Year3);
    
    ValorInventario1 = Total_Year1 - Total_Year2;
    ValorInventario2 = Total_Year2 - Total_Year3;
    
    $('#txtInventario0').attr('value', redondeaNumero_Retorna(ValorInventario1));
    $('#txtInventario1').attr('value', redondeaNumero_Retorna(ValorInventario2));
    
    //setGeneracion_Absor_InversionDeTrabajo();
}

/* Generación o Absorción Por Inversión de Trabajo **/
function setGeneracion_Absor_InversionDeTrabajo()
{    
    //Campos procesados
    //Cuentas Por Cobrar,	Efectos por cobrar,	Inventarios,	Cuentas por pagar,	Efectos por pagar,	Gastos Acumulados
    
    ArrayNombreOper1 = ['txtCtasCobrar0', 'txtEfecCobrar0', 'txtInventario0' , 'txtCtasPagar0' , 'txtEfecPagar0', 'txtGastosAcum0'];
    ArrayNombreOper2 = ['txtCtasCobrar1', 'txtEfecCobrar1', 'txtInventario1' , 'txtCtasPagar1' , 'txtEfecPagar1', 'txtGastosAcum1'];
    
    TotalOperaciones1 = sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    
    $('#txtGenerAbsorInvTrab0').attr('value', TotalOperaciones1);
    $('#txtGenerAbsorInvTrab1').attr('value', TotalOperaciones2);    
}

/* Gasto e Inversion en Planta  */
function setGastos_Inversion_En_Planta()
{
    //Gastos e Inversion de planta 1
    
    ArrayNombreSuma1 = ['txtTotalActFijo2', 'txtdepreciacion2'];
    TotalSuma1       = sumaValores(ArrayNombreSuma1);
    ValorARestar1    = $('#txtTotalActFijo').attr('value');     
    ResultadoResta1  = restaDosValores_Retorna(TotalSuma1,ValorARestar1);
    ValorARestar2    = $('#txtdepreciacion').attr('value');
    ResultadoResta2  = restaDosValores_Retorna(ResultadoResta1,ValorARestar2); 
    ResultadoResta2  = ResultadoResta2 * -1;
    //Asignamos el valor al gasto e inversion en planta 1
    $('#txtGastoInvPlanta0').attr('value',ResultadoResta2);
    
    
    ArrayNombreSuma2 = ['txtTotalActFijo3', 'txtdepreciacion3'];
    TotalSuma2       = sumaValores(ArrayNombreSuma2);
    ValorARestar3    = $('#txtTotalActFijo2').attr('value');
    ResultadoResta3  = restaDosValores_Retorna(TotalSuma2,ValorARestar3);
    ValorARestar4    = $('#txtdepreciacion2').attr('value');
    ResultadoResta4  = restaDosValores_Retorna(ResultadoResta3,ValorARestar4);
    ResultadoResta4  = ResultadoResta4 * -1;
    //Asignamos el valor al gasto e inversion en planta 2
    $('#txtGastoInvPlanta1').attr('value',ResultadoResta4);    
}


/** Cargos Diferidos y Otros Activos **/
function setCargosDiferidos_Activos()
{
    Resta1_Year1 = restaDosValores_Retorna($('#txtcargosdif').attr('value'),$('#txtcargosdif2').attr('value'));
    Resta2_Year1 = restaDosValores_Retorna($('#txtotrosact').attr('value'),$('#txtotrosact2').attr('value'));
    
    Resultado_Year1 = Resta1_Year1 + Resta2_Year1;
    //Asigna el resultado 
    $('#txtCargoDifOtroAct0').attr('value',roundNumber(parseFloat(Resultado_Year1),3)); 
    
    Resta1_Year2 = restaDosValores_Retorna($('#txtcargosdif2').attr('value'),$('#txtcargosdif3').attr('value'));
    Resta2_Year2 = restaDosValores_Retorna($('#txtotrosact2').attr('value'),$('#txtotrosact3').attr('value'));
    
    Resultado_Year2 = Resta1_Year2 + Resta2_Year2;
    //Asigna el resultado 
    $('#txtCargoDifOtroAct1').attr('value',roundNumber(parseFloat(Resultado_Year2),3));    
}

/** Impuestos por Pagar y Retenciones **/
function setImpuestos_Pag_Ret()
{   
    ImpSuma1_Year1  = sumaDosValores_Retorna($('#txtimpuestospagar').attr('value'), $('#txtislr2').attr('value'));
    ImpResta1_Year1 = -1 * restaDosValores_Retorna(ImpSuma1_Year1, $('#txtimpuestospagar2').attr('value'));
    //Asignamos el resultado
    $('#txtImpPagarReten0').attr('value',ImpResta1_Year1);
    
    ImpSuma1_Year2 = sumaDosValores_Retorna($('#txtimpuestospagar2').attr('value'), $('#txtislr3').attr('value'));
    ImpResta1_Year2 = -1 * restaDosValores_Retorna(ImpSuma1_Year2, $('#txtimpuestospagar3').attr('value'));
    //Asignamos el resultado
    $('#txtImpPagarReten1').attr('value',ImpResta1_Year2);    
    
    //setGeneracion_Absor_OtrosActivosPasivos();
}


/** Generación o Absorción por Otros Activos o Pasivos  **/
function setGeneracion_Absor_OtrosActivosPasivos()
{   
    AbsoArrayNombreOper1 = ['txtDepoGaran0',
     'txtCargoDifOtroAct0', 
     'txtCredFiscalGastoPrep0', 
     'txtCtasCobrarAccRel0',       
     'txtImpPagarReten0',
     'txtRetenPagar0', 
     'txtPrestSocialesPagar0', 
     'txtOtrosPasivosCorr0'];
     
     AbsoArrayNombreOper2 = ['txtDepoGaran1',
     'txtCargoDifOtroAct1', 
     'txtCredFiscalGastoPrep1' , 
     'txtCtasCobrarAccRel1' ,       
     'txtImpPagarReten1',
     'txtRetenPagar1', 
     'txtPrestSocialesPagar1',
     'txtOtrosPasivosCorr1'];
     
    
    AbsorTotalOperaciones1 = sumaValores(AbsoArrayNombreOper1);  
    AbsorTotalOperaciones2 =  sumaValores(AbsoArrayNombreOper2);
    
    $('#txtGenerAbsorbActPas0').attr('value', AbsorTotalOperaciones1);
    $('#txtGenerAbsorbActPas1').attr('value', AbsorTotalOperaciones2);    
}

/** Pago de dividendos (-) / Reposición de Pérdida (+): **/ 
function setPagoDividendos_ReposicionPerd()
{
    //Calculo año 1
    PagDivSuma1_Year1  = sumaDosValores_Retorna($('#txtSuperavitAcum2').attr('value'), $('#txtejercicio2').attr('value'));
    PagDivResta1_Year1 = restaDosValores_Retorna(PagDivSuma1_Year1, $('#txtEjercicio2').attr('value'));
    
    PagDivSuma2_Year1  = sumaDosValores_Retorna($('#txtSuperavitAcum').attr('value'), $('#txtejercicio').attr('value'));
    
    PagDivResultado_Year1 = restaDosValores_Retorna(PagDivResta1_Year1,PagDivSuma2_Year1); 
    //Asignamos el valor 
    $('#txtPagoDivRepoPerd0').attr('value',PagDivResultado_Year1);


    //Calculo año 1
    PagDivSuma1_Year2  = sumaDosValores_Retorna($('#txtSuperavitAcum3').attr('value'), $('#txtejercicio3').attr('value'));
    PagDivResta1_Year2 = restaDosValores_Retorna(PagDivSuma1_Year2, $('#txtEjercicio3').attr('value'));
    
    PagDivSuma2_Year2  = sumaDosValores_Retorna($('#txtSuperavitAcum2').attr('value'), $('#txtejercicio2').attr('value'));
    
    PagDivResultado_Year2 = restaDosValores_Retorna(PagDivResta1_Year2,PagDivSuma2_Year2); 
    //Asignamos el valor 
    $('#txtPagoDivRepoPerd1').attr('value',PagDivResultado_Year2);
}

/** Generación o Absorción por Inversiones y Dividendos **/ 
function setGeneracion_Absor_InversionDividendos()
{
    
     AbsoDivArrayNombreOper1 = ['txtInversiones0', 'txtPagoDivRepoPerd0'];     
     AbsoDivArrayNombreOper2  = ['txtInversiones1', 'txtPagoDivRepoPerd1'];
     
    
    AbsorDivTotalOperaciones1 = sumaValores(AbsoDivArrayNombreOper1);  
    AbsorDivTotalOperaciones2 =  sumaValores(AbsoDivArrayNombreOper2);
    
    $('#txtGenerAbsorbInvDiv0').attr('value', AbsorDivTotalOperaciones1);
    $('#txtGenerAbsorbInvDiv1').attr('value', AbsorDivTotalOperaciones2);    
}

/** Generación o Absorción Antes de Financiamiento **/ 
function setGeneracion_Absor_Antes_Financiamiento()
{
    
    AbsoAnteArrayNombreOper1 = [
     'txtGenerAbsorbInvDiv0',
     'txtGenerAbsorbActPas0', 
     'txtGastoInvPlanta0', 
     'txtGenerAbsorInvTrab0',
     'txtGenerAbsobOper0'
     ];
     
     AbsoAnteArrayNombreOper2 = [
     'txtGenerAbsorbInvDiv1',
     'txtGenerAbsorbActPas1', 
     'txtGastoInvPlanta1', 
     'txtGenerAbsorInvTrab1',
     'txtGenerAbsobOper1'
     ];
     
    
    AbsorAntesTotalOperaciones1 = sumaValores(AbsoAnteArrayNombreOper1);  
    AbsorAntesTotalOperaciones2 =  sumaValores(AbsoAnteArrayNombreOper2);
    
    $('#txtGenerAbsorbAntesFinanc0').attr('value', AbsorAntesTotalOperaciones1);
    $('#txtGenerAbsorbAntesFinanc1').attr('value', AbsorAntesTotalOperaciones2);
}

/** Generación o Absorbción Por Financiamiento **/
function setGeneracion_Absor_Por_Financiamiento()
{
    
    AbsoPorArrayNombreOper1 = [
     'txtPrestamoCP0',
     'txtPrestamoLP0', 
     'txtCtasPagarRel0', 
     'txtVentaAccAumCapSoc0',
     'txtAumReserLegal0',
     'txtCtasPagarObligBancLP0',
     'txtMontoSinConci0'
     ];
     
     AbsoPorArrayNombreOper2 = [
     'txtPrestamoCP1',
     'txtPrestamoLP1', 
     'txtCtasPagarRel1', 
     'txtVentaAccAumCapSoc1',
     'txtAumReserLegal1',
     'txtCtasPagarObligBancLP1',
     'txtMontoSinConci1'
     ];
     
    
    AbsorPorTotalOperaciones1 = sumaValores(AbsoPorArrayNombreOper1);  
    AbsorPorTotalOperaciones2 =  sumaValores(AbsoPorArrayNombreOper2);
    
    $('#txtGenerAbsorPorFinanc0').attr('value', AbsorPorTotalOperaciones1);
    $('#txtGenerAbsorPorFinanc1').attr('value', AbsorPorTotalOperaciones2);    
}

/** Cambio en la Cuenta Caja  **/
function setCambio_Cuenta_Caja()
{
    CambioCuentaArrayNombreOper1 = [
     'txtGenerAbsorPorFinanc0',
     'txtGenerAbsorbAntesFinanc0'     
     ];
     
     CambioCuentaArrayNombreOper2 = [
     'txtGenerAbsorPorFinanc1',
     'txtGenerAbsorbAntesFinanc1'     
     ];
     
    CambioCuentaTotalOperaciones1 =  sumaValores(CambioCuentaArrayNombreOper1);  
    CambioCuentaTotalOperaciones2 =  sumaValores(CambioCuentaArrayNombreOper2);
    
    $('#txtCambioCtaCaja0').attr('value', CambioCuentaTotalOperaciones1);
    $('#txtCambioCtaCaja1').attr('value', CambioCuentaTotalOperaciones2);    
}

/** Efectivo Al Inicio del Año **/ 
function setEfectivo_Inicio_Year()
{
    EfectYesrArrayNombreOper1 = [
     'txtcajachica',
     'txtcajabancos'     
     ];
     
     EfectYesrArrayNombreOper2 = [
     'txtcajachica2',
     'txtcajabancos2'     
     ];
     
    EfectYearTotalOperaciones1 =  sumaValores(EfectYesrArrayNombreOper1);  
    EfectYearTotalOperaciones2 =  sumaValores(EfectYesrArrayNombreOper2);
    
    $('#txtEfecIniAno0').attr('value', EfectYearTotalOperaciones1);
    $('#txtEfecIniAno1').attr('value', EfectYearTotalOperaciones2);         
}


/** Efectivo Al Fin del Año **/ 
function setEfectivo_Fin_Year()
{
    EfectFinArrayNombreOper1 = [
     'txtcajachica2',
     'txtcajabancos2'     
     ];
     
     EfectFinArrayNombreOper2 = [
     'txtcajachica3',
     'txtcajabancos3'     
     ];
     
    EfectFinTotalOperaciones1 =  sumaValores(EfectFinArrayNombreOper1);  
    EfectFinTotalOperaciones2 =  sumaValores(EfectFinArrayNombreOper2);
    
    $('#txtEfecFinAno0').attr('value', EfectFinTotalOperaciones1);
    $('#txtEfecFinAno1').attr('value', EfectFinTotalOperaciones2);         
}


/**************************************************************/
/** Funciones de Suma de las seccion Indicadores Economicos **/
/**************************************************************/

/** Variación de las Ventas Netas Respecto Año Anterior **/
function setVariacion_Ventas_Netas_Year()
{    
    ResultadoResta1 = restaDosValores_Retorna($('#txtVentasNetas').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoOperacion1 = -1 * (divideDosValores_Retorna(ResultadoResta1,$('#txtVentasNetas').attr('value')));
    ResultadoOperacion1 = redondeaNumero_Retorna(100 * ResultadoOperacion1);
    $('#txtVarVentasNetas0').attr('value',ResultadoOperacion1);
    
    ResultadoResta2 = restaDosValores_Retorna($('#txtVentasNetas2').attr('value'), $('#txtVentasNetas3').attr('value'));    
    ResultadoOperacion2 = -1 * (divideDosValores_Retorna(ResultadoResta2,$('#txtVentasNetas2').attr('value')));
    ResultadoOperacion2 = redondeaNumero_Retorna(100 * ResultadoOperacion2);
    $('#txtVarVentasNetas1').attr('value',ResultadoOperacion2);        
}

/** % Sobre Ventas Netas del Costo de Ventas  **/ 
function setVentas_Netas_Costo_Ventas()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtCostoVentas').attr('value'), $('#txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcCostoVentas0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtCostoVentas2').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcCostoVentas1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtCostoVentas3').attr('value'), $('#txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcCostoVentas2').attr('value',ResultadoDivision3);
}


/** % Sobre Ventas Netas del Beneficio Bruto   **/
function setVentas_Netas_Beneficio_Bruto()
{
    ResultadoDivision1 = divideDosValores_Retorna($('#txtBenefBruto').attr('value'), $('#txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcBeneficioBruto0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtBenefBruto2').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcBeneficioBruto1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtBenefBruto3').attr('value'), $('#txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcBeneficioBruto2').attr('value',ResultadoDivision3);    
}

/** % Sobre Ventas Netas de los Gastos Administrativos y Generales  **/
function setVentas_Netas_Gastos_Administr_Generales()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtGastosAdm').attr('value'), $('#txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcGastosAdminGenr0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtGastosAdm2').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcGastosAdminGenr1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtGastosAdm3').attr('value'), $('#txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcGastosAdminGenr2').attr('value',ResultadoDivision3);        
} 


/** % Sobre Ventas Netas de los Gastos Financieros  **/
function setVentas_Netas_Gastos_Financieros()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtGastosFinanc').attr('value'), $('#txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcGastosFinancieros0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtGastosFinanc2').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcGastosFinancieros1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtGastosFinanc3').attr('value'), $('#txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcGastosFinancieros2').attr('value',ResultadoDivision3);            
}
 
/** % Sobre Ventas Netas del Beneficio neto Antes de no Usuales  **/
function setVentas_Beneficio_Neto_Antes_No_Usuales()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtBenefAntesImpNoUsuales').attr('value'), $('#txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcBenefNetoUsua0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtBenefAntesImpNoUsuales2').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcBenefNetoUsua1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtBenefAntesImpNoUsuales3').attr('value'), $('#txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcBenefNetoUsua2').attr('value',ResultadoDivision3);            
}

/** Rentabilidad del Capital Neto Tangible **/
function setRentabilidad_Capital_Neto_Tangible()
{
    // txtEjercicio / txtTotalCapital
    ResultadoDivision1 = divideDosValores_Retorna($('#txtEjercicio').attr('value'), $('#txtTotalCapital').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtRentaCapitalNetoTan0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtEjercicio2').attr('value'), $('#txtTotalCapital2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtRentaCapitalNetoTan1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtEjercicio3').attr('value'), $('#txtTotalCapital3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtRentaCapitalNetoTan2').attr('value',ResultadoDivision3);
}


/** Rentabilidad sobre el Capital Neto Invertido **/
function setRentabilidad_Capital_Neto_Invertido()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtEjercicio').attr('value'), $('#txtcapitalsocial').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtRentaCapitalNetoInver0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtEjercicio2').attr('value'), $('#txtcapitalsocial2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtRentaCapitalNetoInver1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtEjercicio3').attr('value'), $('#txtcapitalsocial3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtRentaCapitalNetoInver2').attr('value',ResultadoDivision3);
}


/** Rentabilidad sobre Ventas **/
function setRentabilidad_Sobre_Ventas()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtBenefDespNoUsuales').attr('value'), $('#txtVentasNetas').attr('value'));
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtRentaSobreVentas0').attr('value',ResultadoDivision1);

    ResultadoDivision2 = divideDosValores_Retorna($('#txtBenefDespNoUsuales2').attr('value'), $('#txtVentasNetas2').attr('value'));
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtRentaSobreVentas1').attr('value',ResultadoDivision2);
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtBenefDespNoUsuales3').attr('value'), $('#txtVentasNetas3').attr('value'));
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtRentaSobreVentas2').attr('value',ResultadoDivision3);
}


/**************************************************************/
/** Funciones de Suma de las seccion Indicadores Financieros **/
/**************************************************************/
 
/** Capital de Trabajo  **/
function setCapital_Trabajo()
{    
    restaDosValores_Asigna($('#txtTotalActCirc'),$('#txtTotalPasivoCirc'),$('#txtCapitalTrabajo0'));
    restaDosValores_Asigna($('#txtTotalActCirc2'),$('#txtTotalPasivoCirc2'),$('#txtCapitalTrabajo1'));
    restaDosValores_Asigna($('#txtTotalActCirc3'),$('#txtTotalPasivoCirc3'),$('#txtCapitalTrabajo2'));   
}

/** Solvencia  **/
function setSolvencia()
{    
    RsultadoDiv1 =  divideDosValores_Retorna($('#txtTotalActCirc').attr('value'),$('#txtTotalPasivoCirc').attr('value'))
    RsultadoDiv2 =  divideDosValores_Retorna($('#txtTotalActCirc2').attr('value'),$('#txtTotalPasivoCirc2').attr('value'))
    RsultadoDiv3 =  divideDosValores_Retorna($('#txtTotalActCirc3').attr('value'),$('#txtTotalPasivoCirc3').attr('value'))
    
    $('#txtSolvencia0').attr('value',RsultadoDiv1);
    $('#txtSolvencia1').attr('value',RsultadoDiv2);
    $('#txtSolvencia2').attr('value',RsultadoDiv3);
}

/** Solvencia  General **/
function setSolvencia_General()
{    
    RsultadoSGDiv1 =  divideDosValores_Retorna($('#txtTotalActCirc').attr('value'),$('#txtTotalPasivos').attr('value'))
    RsultadoSGDiv2 =  divideDosValores_Retorna($('#txtTotalActCirc2').attr('value'),$('#txtTotalPasivos2').attr('value'))
    RsultadoSGDiv3 =  divideDosValores_Retorna($('#txtTotalActCirc3').attr('value'),$('#txtTotalPasivos3').attr('value'))
    
    $('#txtSolvenciaGeneral0').attr('value',RsultadoSGDiv1);
    $('#txtSolvenciaGeneral1').attr('value',RsultadoSGDiv2);
    $('#txtSolvenciaGeneral2').attr('value',RsultadoSGDiv3);
}

/** Liquidez **/
function setLiquidez()
{   
     ArrayNombreOper1 = [
     'txtcajachica',
     'txtcajabancos',
     'txtctascobrar', 
     'txtefeccobrar', 
     'txtincobrables'     
     ];
     
     ArrayNombreOper2 = [
     'txtcajachica2',
     'txtcajabancos2',
     'txtctascobrar2', 
     'txtefeccobrar2', 
     'txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [
     'txtcajachica3',
     'txtcajabancos3',
     'txtctascobrar3', 
     'txtefeccobrar3', 
     'txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtTotalPasivoCirc').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtTotalPasivoCirc2').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtTotalPasivoCirc3').attr('value'));
    
    $('#txtLiquidez0').attr('value', TotalDivision1);
    $('#txtLiquidez1').attr('value', TotalDivision2);
    $('#txtLiquidez2').attr('value', TotalDivision3);    
}


/** Ventas a Crédito Diarias **/
function setVentasCreditoDiarias()
{
    //txtVentasNetas
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtVentasNetas').attr('value'), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtVentasNetas2').attr('value'), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtVentasNetas3').attr('value'), 360);
    
    $('#txtVentasCreditosDia0').attr('value', ResultadoDivCD1);
    $('#txtVentasCreditosDia1').attr('value', ResultadoDivCD2);
    $('#txtVentasCreditosDia2').attr('value', ResultadoDivCD3);
}

/** Número de Días a Mano de Ventas **/
function setNumero_Dias_Mano_Ventas()
{
     ArrayNombreOper1 = [     
     'txtctascobrar', 
     'txtefeccobrar', 
     'txtincobrables'     
     ];
     
     ArrayNombreOper2 = [     
     'txtctascobrar2', 
     'txtefeccobrar2', 
     'txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtctascobrar3', 
     'txtefeccobrar3', 
     'txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtVentasCreditosDia0').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtVentasCreditosDia1').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtVentasCreditosDia2').attr('value'));
    
    $('#txtNumDiariManoVent0').attr('value', TotalDivision1);
    $('#txtNumDiariManoVent1').attr('value', TotalDivision2);
    $('#txtNumDiariManoVent2').attr('value', TotalDivision3);
}

/** Período Promedio de Cobros **/
function setPeriodo_Promedio_Cobros()
{
     ArrayNombreOper1 = [     
     'txtctascobrar', 
     'txtefeccobrar', 
     'txtincobrables'     
     ];
     
     ArrayNombreOper2 = [     
     'txtctascobrar2', 
     'txtefeccobrar2', 
     'txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtctascobrar3', 
     'txtefeccobrar3', 
     'txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtVentasCreditosDia0').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtVentasCreditosDia1').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtVentasCreditosDia2').attr('value'));
    
    $('#txtPeriodoPromCobros0').attr('value', TotalDivision1);
    $('#txtPeriodoPromCobros1').attr('value', TotalDivision2);
    $('#txtPeriodoPromCobros2').attr('value', TotalDivision3);
}


/** Rotación de Cuentas por Cobrar **/
function setRotacion_Cuentas_Cobrar()
{
    ArrayNombreOper1 = [     
     'txtctascobrar', 
     'txtefeccobrar', 
     'txtincobrables'     
     ];
     
     ArrayNombreOper2 = [     
     'txtctascobrar2', 
     'txtefeccobrar2', 
     'txtincobrables2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtctascobrar3', 
     'txtefeccobrar3', 
     'txtincobrables3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna($('#txtVentasNetas').attr('value'),TotalOperaciones1);
    TotalDivision2 = divideDosValores_Retorna($('#txtVentasNetas2').attr('value'),TotalOperaciones2);
    TotalDivision3 = divideDosValores_Retorna($('#txtVentasNetas3').attr('value'),TotalOperaciones3);
    
    $('#txtTotacionCuentasCobrar0').attr('value', TotalDivision1);
    $('#txtTotacionCuentasCobrar1').attr('value', TotalDivision2);
    $('#txtTotacionCuentasCobrar2').attr('value', TotalDivision3);
}



/** Rotación de Inventarios  **/
function setRotacion_Inventarios()
{
    ArrayNombreOper1 = [     
     'txtinvmateriaprima', 
     'txtinvmaterialproc', 
     'txtinvprodterminado',
     'txtobsolencia' 
     ];
     
     ArrayNombreOper2 = [     
     'txtinvmateriaprima2', 
     'txtinvmaterialproc2', 
     'txtinvprodterminado2',
     'txtobsolencia2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtinvmateriaprima3', 
     'txtinvmaterialproc3', 
     'txtinvprodterminado3',
     'txtobsolencia3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna($('#txtCostoVentas').attr('value'),TotalOperaciones1);
    TotalDivision2 = divideDosValores_Retorna($('#txtCostoVentas2').attr('value'),TotalOperaciones2);
    TotalDivision3 = divideDosValores_Retorna($('#txtCostoVentas3').attr('value'),TotalOperaciones3);
    
    $('#txtRotacionInventarios0').attr('value', TotalDivision1);
    $('#txtRotacionInventarios1').attr('value', TotalDivision2);
    $('#txtRotacionInventarios2').attr('value', TotalDivision3);
}


/** Número de Días a Mano de Inventarios **/
function setNumero_Dias_Mano_Inventarios()
{
    ArrayNombreOper1 = [     
     'txtinvmateriaprima', 
     'txtinvmaterialproc', 
     'txtinvprodterminado',
     'txtobsolencia' 
     ];
     
     ArrayNombreOper2 = [     
     'txtinvmateriaprima2', 
     'txtinvmaterialproc2', 
     'txtinvprodterminado2',
     'txtobsolencia2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtinvmateriaprima3', 
     'txtinvmaterialproc3', 
     'txtinvprodterminado3',
     'txtobsolencia3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtCostVentsServDiar0').attr('value'));
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtCostVentsServDiar1').attr('value'));
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtCostVentsServDiar2').attr('value'));
    
    $('#txtNumDiasManInventa0').attr('value', TotalDivision1);
    $('#txtNumDiasManInventa1').attr('value', TotalDivision2);
    $('#txtNumDiasManInventa2').attr('value', TotalDivision3);
}
 

/** Costo de Ventas o Servicios Diarios **/ 
function setCosto_Ventas_Servicios_Diarios()
{
    //txtVentasNetas
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtCostoVentas').attr('value'), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtCostoVentas2').attr('value'), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtCostoVentas3').attr('value'), 360);
    
    $('#txtCostVentsServDiar0').attr('value', ResultadoDivCD1);
    $('#txtCostVentsServDiar1').attr('value', ResultadoDivCD2);
    $('#txtCostVentsServDiar2').attr('value', ResultadoDivCD3);
}

/** Rotación de Cuentas por Pagar  **/ 
function setRotacion_Cuentas_Pagar()
{   
    //txtCompras0 / (txtctaspagar + txtefecpagar)
    
    ArrayNombreOper1 = [
     'txtctaspagar',
     'txtefecpagar' 
     ];
     
     ArrayNombreOper2 = [     
     'txtctaspagar2',
     'txtefecpagar2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtctaspagar3',
     'txtefecpagar3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtCompras0').attr('value'), TotalOperaciones1);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtCompras1').attr('value'), TotalOperaciones2);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtCompras2').attr('value'), TotalOperaciones3);
    
    $('#txtRotacionCuentasPagar0').attr('value',ResultadoDivCD1); 
    $('#txtRotacionCuentasPagar1').attr('value',ResultadoDivCD2);
    $('#txtRotacionCuentasPagar2').attr('value',ResultadoDivCD2);

}


/** Compras **/ 
function setCompras()
{   
    //txtCostoVentas / (txtctaspagar + txtefecpagar)
        
    ArrayNombreOper1 = [     
     'txtinvmateriaprima', 
     'txtinvmaterialproc', 
     'txtinvprodterminado',
     'txtobsolencia' 
     ];
     
     ArrayNombreOper2 = [     
     'txtinvmateriaprima2', 
     'txtinvmaterialproc2', 
     'txtinvprodterminado2',
     'txtobsolencia2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtinvmateriaprima3', 
     'txtinvmaterialproc3', 
     'txtinvprodterminado3',
     'txtobsolencia3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoTotal1  = restaDosValores_Retorna($('#txtCostoVentas2').attr('value'), TotalOperaciones1);
    ResultadoTotal1  = sumaDosValores_Retorna(ResultadoTotal1,TotalOperaciones2); 
    
    ResultadoTotal2  = restaDosValores_Retorna($('#txtCostoVentas3').attr('value'), TotalOperaciones2);
    ResultadoTotal2  = sumaDosValores_Retorna(ResultadoTotal2,TotalOperaciones3);
        
    
    $('#txtCompras0').attr('value', 0);
    $('#txtCompras1').attr('value', ResultadoTotal1);
    $('#txtCompras2').attr('value', ResultadoTotal2);
}
  

/** Compras Diarias **/ 
function setCompras_Diarias()
{     
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtCompras0').attr('value'), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtCompras1').attr('value'), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtCompras2').attr('value'), 360);
    
    $('#txtComprasDiarias0').attr('value', ResultadoDivCD1);
    $('#txtComprasDiarias1').attr('value', ResultadoDivCD2);
    $('#txtComprasDiarias2').attr('value', ResultadoDivCD3);
}

/** Número de Días a Mano en Cuentas por Pagar **/ 
function setNumero_Dias_Mano_Cuentas_Pagar()
{       
    ArrayNombreOper1 = [
     'txtctaspagar',
     'txtefecpagar' 
     ];
     
     ArrayNombreOper2 = [     
     'txtctaspagar2',
     'txtefecpagar2'   
     ];
     
      ArrayNombreOper3 = [     
     'txtctaspagar3',
     'txtefecpagar3'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);
    
    ResultadoDivCD1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtComprasDiarias0').attr('value'));
    ResultadoDivCD2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtComprasDiarias1').attr('value'));
    ResultadoDivCD3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtComprasDiarias2').attr('value'));
    
    $('#txtNumDiasManCuantasPagar0').attr('value', ResultadoDivCD1);
    $('#txtNumDiasManCuantasPagar1').attr('value', ResultadoDivCD2);
    $('#txtNumDiasManCuantasPagar2').attr('value', ResultadoDivCD3);    
} 


/** Ciclo de Efectivo **/ 
function setCiclo_Efectivo()
{       
    ArrayNombreOper1 = [
     'txtPeriodoPromCobros0',
     'txtNumDiasManInventa0',
     'txtNumDiasManCuantasPagar0'
     ];
     
     ArrayNombreOper2 = [     
     'txtPeriodoPromCobros1',
     'txtNumDiasManInventa1',
     'txtNumDiasManCuantasPagar1'   
     ];
     
      ArrayNombreOper3 = [     
     'txtPeriodoPromCobros2',
     'txtNumDiasManInventa2',
     'txtNumDiasManCuantasPagar2'   
     ];
     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);   
    
    $('#txtCicloEfectivo0').attr('value', TotalOperaciones1);
    $('#txtCicloEfectivo1').attr('value', TotalOperaciones2);
    $('#txtCicloEfectivo2').attr('value', TotalOperaciones3);    
}


/* Endeudamiento Total */ 
function setEndeudamiento_Total()
{    
    ResultadoDiv1 = divideDosValores_Retorna($('#txtTotalPasivos').attr('value'), $('#txtTotalCapital').attr('value'));
    ResultadoDiv2 = divideDosValores_Retorna($('#txtTotalPasivos2').attr('value'), $('#txtTotalCapital2').attr('value'));
    ResultadoDiv3 = divideDosValores_Retorna($('#txtTotalPasivos3').attr('value'), $('#txtTotalCapital3').attr('value'));
    
    $('#txtEndeudamientoTotal0').attr('value', ResultadoDiv1);
    $('#txtEndeudamientoTotal1').attr('value', ResultadoDiv2);
    $('#txtEndeudamientoTotal2').attr('value', ResultadoDiv3);    
}


/* Endeudamiento Circulante */ 
function setEndeudamiento_Circulante()
{    
    ResultadoDiv1 = divideDosValores_Retorna($('#txtTotalPasivoCirc').attr('value'), $('#txtTotalCapital').attr('value'));
    ResultadoDiv2 = divideDosValores_Retorna($('#txtTotalPasivoCirc2').attr('value'), $('#txtTotalCapital2').attr('value'));
    ResultadoDiv3 = divideDosValores_Retorna($('#txtTotalPasivoCirc3').attr('value'), $('#txtTotalCapital3').attr('value'));
    
    $('#txtEndeudamientoCirculante0').attr('value', ResultadoDiv1);
    $('#txtEndeudamientoCirculante1').attr('value', ResultadoDiv2);
    $('#txtEndeudamientoCirculante2').attr('value', ResultadoDiv3);    
}


/* Endeudamiento Bancario Total */
function setEndeudamiento_Bancario_Total()
{    
 
     //(txtobligbancarias + txtCtasAccionistas) / txtTotalCapital
        
    ArrayNombreOper1 = [
     'txtobligbancarias',
     'txtCtasAccionistas'     
     ];
     
     ArrayNombreOper2 = [     
     'txtobligbancarias1',
     'txtCtasAccionistas1'   
     ];
     
      ArrayNombreOper3 = [     
     'txtobligbancarias2',
     'txtCtasAccionistas2'   
     ];     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);   
    
    ResultadoDiv1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtTotalCapital').attr('value'));
    ResultadoDiv2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtTotalCapital2').attr('value'));
    ResultadoDiv3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtTotalCapital3').attr('value'));
    
    $('#txtEndeuBancTotal0').attr('value', ResultadoDiv1);
    $('#txtEndeuBancTotal1').attr('value', ResultadoDiv2);
    $('#txtEndeuBancTotal2').attr('value', ResultadoDiv3);   
}

/** Endeudamiento a Largo Plazo **/
function setEndeudamiento_Largo_Plazo()
{
    //txtTotalCapital / txtTotalCapital     
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtTotalCapital').attr('value'), $('#txtTotalCapital').attr('value'));
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtTotalCapital2').attr('value'), $('#txtTotalCapital2').attr('value'));
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtTotalCapital3').attr('value'), $('#txtTotalCapital3').attr('value'));
    
    $('#txtEndeuLargoPlazo0').attr('value', ResultadoDivCD1);
    $('#txtEndeuLargoPlazo1').attr('value', ResultadoDivCD2);
    $('#txtEndeuLargoPlazo2').attr('value', ResultadoDivCD3);
}

/** Rotación de la Planta **/
function setRotacion_Planta()
{
    //txtVentasNetas / txtTotalActFijo    
         
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtVentasNetas').attr('value'), $('#txtTotalActFijo').attr('value'));
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtVentasNetas2').attr('value'), $('#txtTotalActFijo2').attr('value'));
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtVentasNetas3').attr('value'), $('#txtTotalActFijo3').attr('value'));
    
    $('#txtRotaciPlanta0').attr('value', ResultadoDivCD1);
    $('#txtRotaciPlanta1').attr('value', ResultadoDivCD2);
    $('#txtRotaciPlanta2').attr('value', ResultadoDivCD3);
}


/** Productividad de la Empresa **/ 
function setProductividad_Empresa()
{
    
    //txtGenerAbsobOper0 / (txtTotalActCirc + txtTotalActFijo)
        
    ArrayNombreOper1 = [
     'txtTotalActCirc',
     'txtTotalActFijo'     
     ];
    
    var este = parseFloat($('#txtTotalActFijo1').attr('value'))+parseFloat($('#txtTotalActCirc1').attr('value'));
     
     ArrayNombreOper2 = [     
     'txtTotalActCirc1',
     'txtTotalActFijo1'   
     ];
     
      ArrayNombreOper3 = [     
     'txtTotalActCirc2',
     'txtTotalActFijo2'  
     ];     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3); 
    
    
    ResultadoDivCD1 = divideDosValores_Retorna(0, TotalOperaciones1);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtGenerAbsobOper0').attr('value'), ArrayNombreOper2);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtGenerAbsobOper1').attr('value'), TotalOperaciones3);
    
    $('#txtProducEmpre0').attr('value', ResultadoDivCD1);
    $('#txtProducEmpre1').attr('value', ResultadoDivCD2);
    $('#txtProducEmpre2').attr('value', ResultadoDivCD3);    
}
