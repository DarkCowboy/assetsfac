
/**************************************************/
/*******      Funcion Replicadora         ********/
/**************************************************/

function setRefresca_Todos_Campos()
{
   
    // Se actualizan los campos en base a las dependencias entre campos    
    
    //  Asignacion de valores al total de Generaci�n o Absorci�n Por Operaciones 
    setGeneracion_Absor_Operaciones();
    
    //  Asignacion de Inventarios 
    setInvetarios();
    
    // Generaci�n o Absorci�n Por Inversi�n de Trabajo 
    setGeneracion_Absor_InversionDeTrabajo();
    
    // Gasto e Inversion en Planta  
    setGastos_Inversion_En_Planta();
    
    // Cargos Diferidos y Otros Activos 
    setCargosDiferidos_Activos();
    
    //Generaci�n o Absorci�n por Otros Activos o Pasivos  
    setGeneracion_Absor_OtrosActivosPasivos();
    
    // Pago de dividendos (-) / Reposici�n de P�rdida (+):  
    setPagoDividendos_ReposicionPerd();
    
    // Generaci�n o Absorci�n por Inversiones y Dividendos 
    setGeneracion_Absor_InversionDividendos();
    
    // Generaci�n o Absorci�n Antes de Financiamiento  
    setGeneracion_Absor_Antes_Financiamiento();
    
    // Generaci�n o Absorbci�n Por Financiamiento 
    setGeneracion_Absor_Por_Financiamiento();
    
    // Cambio en la Cuenta Caja  
    setCambio_Cuenta_Caja();
    
    //Efectivo Al Inicio del A�o  
    setEfectivo_Inicio_Year();
    
    // Efectivo Al Fin del A�o  
    setEfectivo_Fin_Year();
    
    // Variaci�n de las Ventas Netas Respecto A�o Anterior 
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
    
    // Ventas a Cr�dito Diarias 
    setVentasCreditoDiarias();
    
    //N�mero de D�as a Mano de Ventas 
    setNumero_Dias_Mano_Ventas();
    
    // Per�odo Promedio de Cobros 
    setPeriodo_Promedio_Cobros();
    
    // Rotaci�n de Cuentas por Cobrar 
    setRotacion_Cuentas_Cobrar();
    
    // Rotaci�n de Inventarios
    setRotacion_Inventarios();
    
    // Costo de Ventas o Servicios Diarios  
    setCosto_Ventas_Servicios_Diarios();
    
    // N�mero de D�as a Mano de Inventarios 
    setNumero_Dias_Mano_Inventarios();
    
    // Compras  
    setCompras();
    
    // Rotaci�n de Cuentas por Pagar   
    setRotacion_Cuentas_Pagar();
    
    //  Compras Diarias
    setCompras_Diarias();
    
    // N�mero de D�as a Mano en Cuentas por Pagar 
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
    
    // Rotaci�n de la Planta
    setRotacion_Planta();
    
    // Productividad de la Empresa  
    setProductividad_Empresa();
    
    // verificaciones
    setVerificaciones();
    
    

}


// Suma Primera Columna 


function sumaTotalActFijo(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_act_fijo = parseFloat($('#txtterrenos').val())+parseFloat($('#txtedif').val())+parseFloat($('#txtmaquinaria').val())+parseFloat($('#txtinstmejoras').val())+parseFloat($('#txtmobiliario').val())+parseFloat($('#txtRespAccHerra').val())+parseFloat($('#txtvehiculo').val())-parseFloat($('#txtdepreciacion').val())+parseFloat($('#txtContrucEnProceso').val());
			  
    $('#txtTotalActFijo').attr('value',roundNumber(parseFloat(total_act_fijo),2));
	
    var total_act = parseFloat($('#txtTotalActFijo').val())+parseFloat($('#txtTotalActCirc').val())+parseFloat($('#txtTotalOtrosAct').val())
	
    $('#txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}

function sumaTotalActCirc(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_act_circ = parseFloat($('#txtcajachica').val())+parseFloat($('#txtcajabancos').val())+parseFloat($('#txtctascobrar').val())+parseFloat($('#txtefeccobrar').val())-parseFloat($('#txtincobrables').val())+parseFloat($('#txtinvmateriaprima').val())+parseFloat($('#txtinvmaterialproc').val())+parseFloat($('#txtinvprodterminado').val())-parseFloat($('#txtobsolencia').val());
			  
    $('#txtTotalActCirc').attr('value',roundNumber(parseFloat(total_act_circ),2));	
	
    var total_act = parseFloat($('#txtTotalActFijo').val())+parseFloat($('#txtTotalActCirc').val())+parseFloat($('#txtTotalOtrosAct').val())
	
    $('#txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}

function sumaTotalOtrosAct(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_otros_act = parseFloat($('#txtdepgarantia').val())+parseFloat($('#txtcargosdif').val())+parseFloat($('#txtcredfiscal').val())+parseFloat($('#txtctascobraracc').val())+parseFloat($('#txtotrosact').val());
			  
    $('#txtTotalOtrosAct').attr('value',roundNumber(parseFloat(total_otros_act),2));
	
    var total_act = parseFloat($('#txtTotalActFijo').val())+parseFloat($('#txtTotalActCirc').val())+parseFloat($('#txtTotalOtrosAct').val())
	
    $('#txtTotalAct').attr('value',roundNumber(parseFloat(total_act),2));
}


// Suma Segunda Columna


function sumaTotalActFijo2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_act_fijo2 = parseFloat($('#txtterrenos2').val())+parseFloat($('#txtedif2').val())+parseFloat($('#txtmaquinaria2').val())+parseFloat($('#txtinstmejoras2').val())+parseFloat($('#txtmobiliario2').val())+parseFloat($('#txtRespAccHerra2').val())+parseFloat($('#txtvehiculo2').val())-parseFloat($('#txtdepreciacion2').val())+parseFloat($('#txtContrucEnProceso2').val());
			  
    $('#txtTotalActFijo2').attr('value',roundNumber(parseFloat(total_act_fijo2),2));
	
    var total_act2 = parseFloat($('#txtTotalActFijo2').val())+parseFloat($('#txtTotalActCirc2').val())+parseFloat($('#txtTotalOtrosAct2').val())
	
    $('#txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}


function sumaTotalActCirc2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_act_circ2 = parseFloat($('#txtcajachica2').val())+parseFloat($('#txtcajabancos2').val())+parseFloat($('#txtctascobrar2').val())+parseFloat($('#txtefeccobrar2').val())-parseFloat($('#txtincobrables2').val())+parseFloat($('#txtinvmateriaprima2').val())+parseFloat($('#txtinvmaterialproc2').val())+parseFloat($('#txtinvprodterminado2').val())-parseFloat($('#txtobsolencia2').val());
			  
    $('#txtTotalActCirc2').attr('value',roundNumber(parseFloat(total_act_circ2),2));	
	
    var total_act2 = parseFloat($('#txtTotalActFijo2').val())+parseFloat($('#txtTotalActCirc2').val())+parseFloat($('#txtTotalOtrosAct2').val())
	
    $('#txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}


function sumaTotalOtrosAct2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_otros_act2 = parseFloat($('#txtdepgarantia2').val())+parseFloat($('#txtcargosdif2').val())+parseFloat($('#txtcredfiscal2').val())+parseFloat($('#txtctascobraracc2').val())+parseFloat($('#txtotrosact2').val());
			  
    $('#txtTotalOtrosAct2').attr('value',roundNumber(parseFloat(total_otros_act2),2));
	
    var total_act2 = parseFloat($('#txtTotalActFijo2').val())+parseFloat($('#txtTotalActCirc2').val())+parseFloat($('#txtTotalOtrosAct2').val())
	
    $('#txtTotalAct2').attr('value',roundNumber(parseFloat(total_act2),2));
}

// Suma Tercera Columna


function sumaTotalActFijo3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	consele.debug('campo ' + campo);
    var total_act_fijo3 = parseFloat($('#txtterrenos3').val())+parseFloat($('#txtedif3').val())+parseFloat($('#txtmaquinaria3').val())+parseFloat($('#txtinstmejoras3').val())+parseFloat($('#txtmobiliario3').val())+parseFloat($('#txtRespAccHerra3').val())+parseFloat($('#txtvehiculo3').val())-parseFloat($('#txtdepreciacion3').val())+parseFloat($('#txtContrucEnProceso3').val());
			  
    $('#txtTotalActFijo3').attr('value',roundNumber(parseFloat(total_act_fijo3),2));
	
    var total_act3 = parseFloat($('#txtTotalActFijo3').val())+parseFloat($('#txtTotalActCirc3').val())+parseFloat($('#txtTotalOtrosAct3').val())
	console.debug(total_act3);
    $('#txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}


function sumaTotalActCirc3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_act_circ3 = parseFloat($('#txtcajachica3').val())+parseFloat($('#txtcajabancos3').val())+parseFloat($('#txtctascobrar3').val())+parseFloat($('#txtefeccobrar3').val())-parseFloat($('#txtincobrables3').val())+parseFloat($('#txtinvmateriaprima3').val())+parseFloat($('#txtinvmaterialproc3').val())+parseFloat($('#txtinvprodterminado3').val())-parseFloat($('#txtobsolencia3').val());
			  
    $('#txtTotalActCirc3').attr('value',roundNumber(parseFloat(total_act_circ3),2));	
	
    var total_act3 = parseFloat($('#txtTotalActFijo3').val())+parseFloat($('#txtTotalActCirc3').val())+parseFloat($('#txtTotalOtrosAct3').val())
	
    $('#txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}


function sumaTotalOtrosAct3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_otros_act3 = parseFloat($('#txtdepgarantia3').val())+parseFloat($('#txtcargosdif3').val())+parseFloat($('#txtcredfiscal3').val())+parseFloat($('#txtctascobraracc3').val())+parseFloat($('#txtotrosact3').val());
			  
    $('#txtTotalOtrosAct3').attr('value',roundNumber(parseFloat(total_otros_act3),2));
	
    var total_act3 = parseFloat($('#txtTotalActFijo3').val())+parseFloat($('#txtTotalActCirc3').val())+parseFloat($('#txtTotalOtrosAct3').val())
	
    $('#txtTotalAct3').attr('value',roundNumber(parseFloat(total_act3),2));
}

// Suma de pasivos



function sumaTotalPasivoCirc(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_pasivo_circ = parseFloat($('#txtobligbancarias').val())+parseFloat($('#txtdeudalp').val())+parseFloat($('#txtctaspagar').val())+parseFloat($('#txtefecpagar').val())+parseFloat($('#txtretenciones').val())+parseFloat($('#txtgastosacum').val())+parseFloat($('#txtimpuestospagar').val())+parseFloat($('#txtprestaciones').val())+parseFloat($('#txtotrospasivos').val());
			  
    $('#txtTotalPasivoCirc').attr('value',roundNumber(parseFloat(total_pasivo_circ),2));	
	
    var total_pasivo = parseFloat($('#txtTotalPasivoLP').val())+parseFloat($('#txtTotalPasivoCirc').val())
	
    $('#txtTotalPasivos').attr('value',roundNumber(parseFloat(total_pasivo),2));
	
    var total_pasivo_cap = parseFloat($('#txtTotalPasivos').val())+parseFloat($('#txtTotalCapital').val())
	
    $('#txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}

function sumaTotalCapital(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_capital = parseFloat($('#txtcapitalsocial').val())+parseFloat($('#txtcapitalnopago').val())+parseFloat($('#txtreserva').val())+parseFloat($('#txtSuperavitAcum').val())+parseFloat($('#txtSuperavitReeval').val())+parseFloat($('#txtejercicio').val());
			  
    $('#txtTotalCapital').attr('value',roundNumber(parseFloat(total_capital),2));
	
    var total_pasivo_cap = parseFloat($('#txtTotalPasivoLP').val())+parseFloat($('#txtTotalPasivoCirc').val())+parseFloat($('#txtTotalCapital').val())
	
    $('#txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}

function sumaTotalPasivoLP(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_pasivoLP = parseFloat($('#txtCtasAccionistas').val())+parseFloat($('#txtctaspagarlp').val());
			  
    $('#txtTotalPasivoLP').attr('value',roundNumber(parseFloat(total_pasivoLP),2));
	
    var total_pasivo = parseFloat($('#txtTotalPasivoLP').val())+parseFloat($('#txtTotalPasivoCirc').val())
	
    $('#txtTotalPasivos').attr('value',roundNumber(parseFloat(total_pasivo),2));
	
    var total_pasivo_cap = parseFloat($('#txtTotalPasivos').val())+parseFloat($('#txtTotalCapital').val())
	
    $('#txtTotalPasCap').attr('value',roundNumber(parseFloat(total_pasivo_cap),2));
}


//SUMAS DE PASIVO COLUMNA 2


function sumaTotalPasivoCirc2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_pasivo_circ2 = parseFloat($('#txtobligbancarias2').val())+parseFloat($('#txtdeudalp2').val())+parseFloat($('#txtctaspagar2').val())+parseFloat($('#txtefecpagar2').val())+parseFloat($('#txtretenciones2').val())+parseFloat($('#txtgastosacum2').val())+parseFloat($('#txtimpuestospagar2').val())+parseFloat($('#txtprestaciones2').val())+parseFloat($('#txtotrospasivos2').val());
			  
    $('#txtTotalPasivoCirc2').attr('value',roundNumber(parseFloat(total_pasivo_circ2),2));	
	
    var total_pasivo2 = parseFloat($('#txtTotalPasivoLP2').val())+parseFloat($('#txtTotalPasivoCirc2').val())
	
    $('#txtTotalPasivos2').attr('value',roundNumber(parseFloat(total_pasivo2),2));
	
    var total_pasivo_cap2 = parseFloat($('#txtTotalPasivos2').val())+parseFloat($('#txtTotalCapital2').val())
	
    $('#txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}

function sumaTotalCapital2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_capital2 = parseFloat($('#txtcapitalsocial2').val())+parseFloat($('#txtcapitalnopago2').val())+parseFloat($('#txtreserva2').val())+parseFloat($('#txtSuperavitAcum2').val())+parseFloat($('#txtSuperavitReeval2').val())+parseFloat($('#txtejercicio2').val());
			  
    $('#txtTotalCapital2').attr('value',roundNumber(parseFloat(total_capital2),2));
	
    var total_pasivo_cap2 = parseFloat($('#txtTotalPasivoLP2').val())+parseFloat($('#txtTotalPasivoCirc2').val())+parseFloat($('#txtTotalCapital2').val())
	
    $('#txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}

function sumaTotalPasivoLP2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_pasivoLP2 = parseFloat($('#txtCtasAccionistas2').val())+parseFloat($('#txtctaspagarlp2').val());
			  
    $('#txtTotalPasivoLP2').attr('value',roundNumber(parseFloat(total_pasivoLP2),2));
	
    var total_pasivo2 = parseFloat($('#txtTotalPasivoLP2').val())+parseFloat($('#txtTotalPasivoCirc2').val())
	
    $('#txtTotalPasivos2').attr('value',roundNumber(parseFloat(total_pasivo2),2));
	
    var total_pasivo_cap2 = parseFloat($('#txtTotalPasivos2').val())+parseFloat($('#txtTotalCapital2').val())
	
    $('#txtTotalPasCap2').attr('value',roundNumber(parseFloat(total_pasivo_cap2),2));
}


// SUMA DE PASIVOS COLUMNA 3


function sumaTotalPasivoCirc3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_pasivo_circ3 = parseFloat($('#txtobligbancarias3').val())+parseFloat($('#txtdeudalp3').val())+parseFloat($('#txtctaspagar3').val())+parseFloat($('#txtefecpagar3').val())+parseFloat($('#txtretenciones3').val())+parseFloat($('#txtgastosacum3').val())+parseFloat($('#txtimpuestospagar3').val())+parseFloat($('#txtprestaciones3').val())+parseFloat($('#txtotrospasivos3').val());
			  
    $('#txtTotalPasivoCirc3').attr('value',roundNumber(parseFloat(total_pasivo_circ3),2));	
	
    var total_pasivo3 = parseFloat($('#txtTotalPasivoLP3').val())+parseFloat($('#txtTotalPasivoCirc3').val())
	
    $('#txtTotalPasivos3').attr('value',roundNumber(parseFloat(total_pasivo3),2));
	
    var total_pasivo_cap3 = parseFloat($('#txtTotalPasivos3').val())+parseFloat($('#txtTotalCapital3').val())
	
    $('#txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}

function sumaTotalCapital3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_capital3 = parseFloat($('#txtcapitalsocial3').val())+parseFloat($('#txtcapitalnopago3').val())+parseFloat($('#txtreserva3').val())+parseFloat($('#txtSuperavitAcum3').val())+parseFloat($('#txtSuperavitReeval3').val())+parseFloat($('#txtejercicio3').val());
			  
    $('#txtTotalCapital3').attr('value',roundNumber(parseFloat(total_capital3),2));
	
    var total_pasivo_cap3 = parseFloat($('#txtTotalPasivoLP3').val())+parseFloat($('#txtTotalPasivoCirc3').val())+parseFloat($('#txtTotalCapital3').val())
	
    $('#txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}

function sumaTotalPasivoLP3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var total_pasivoLP3 = parseFloat($('#txtCtasAccionistas3').val())+parseFloat($('#txtctaspagarlp3').val());
			  
    $('#txtTotalPasivoLP3').attr('value',roundNumber(parseFloat(total_pasivoLP3),2));
	
    var total_pasivo3 = parseFloat($('#txtTotalPasivoLP3').val())+parseFloat($('#txtTotalPasivoCirc3').val())
	
    $('#txtTotalPasivos3').attr('value',roundNumber(parseFloat(total_pasivo3),2));
	
    var total_pasivo_cap3 = parseFloat($('#txtTotalPasivos3').val())+parseFloat($('#txtTotalCapital3').val())
	
    $('#txtTotalPasCap3').attr('value',roundNumber(parseFloat(total_pasivo_cap3),2));
}



//GANANCIAS Y PERDIDAS


function beneficioBruto(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_bruto = parseFloat($('#txtVentasNetas').val())-parseFloat($('#txtCostoVentas').val());
			  
    $('#txtBenefBruto').attr('value',roundNumber(parseFloat(benef_bruto),2));
	
    var benef_neto_oper = parseFloat($('#txtBenefBruto').val())-parseFloat($('#txtGastosAdm').val());
	
    $('#txtBenefNetoOper').attr('value',roundNumber(parseFloat(benef_neto_oper),2));
	
    var benef_antes_imp_y_no_usuales = parseFloat($('#txtBenefNetoOper').val())+parseFloat($('#txtOtrosIngresos').val())-parseFloat($('#txtOtrosEgresos').val())-parseFloat($('#txtGastosFinanc').val());
	
    $('#txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
    var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').val())-(parseFloat($('#txtislr').val())+parseFloat($('#txtAjustePlanta').val())+parseFloat($('#txtAjusteInv').val()));
	
    $('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
    var ejercicio = parseFloat($('#txtBenefDespNoUsuales').val())-parseFloat($('#txtDivPagosEfect').val());
	
    $('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
    var aum_dism_cap_contable = parseFloat($('#txtEjercicio').val())-(parseFloat($('#txtAumCapSocial').val())+parseFloat($('#txtDismCapSocial').val())+parseFloat($('#txtAumReservaLegal').val()));
	
    $('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
	
}


function benefNetoEnOper(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_neto_oper = parseFloat($('#txtBenefBruto').val())-parseFloat($('#txtGastosAdm').val());
	
    $('#txtBenefNetoOper').attr('value',roundNumber(parseFloat(benef_neto_oper),2));
	
    var benef_antes_imp_y_no_usuales = parseFloat($('#txtBenefNetoOper').val())+parseFloat($('#txtOtrosIngresos').val())-parseFloat($('#txtOtrosEgresos').val())-parseFloat($('#txtGastosFinanc').val());
	
    $('#txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
    var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').val())-(parseFloat($('#txtislr').val())+parseFloat($('#txtAjustePlanta').val())+parseFloat($('#txtAjusteInv').val()));
	
    $('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
    var ejercicio = parseFloat($('#txtBenefDespNoUsuales').val())-parseFloat($('#txtDivPagosEfect').val());
	
    $('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
    var aum_dism_cap_contable = parseFloat($('#txtEjercicio').val())-(parseFloat($('#txtAumCapSocial').val())+parseFloat($('#txtDismCapSocial').val())+parseFloat($('#txtAumReservaLegal').val()));
	
    $('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function benefAntesImpYNoUsuales(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_antes_imp_y_no_usuales = parseFloat($('#txtBenefNetoOper').val())+parseFloat($('#txtOtrosIngresos').val())-parseFloat($('#txtOtrosEgresos').val())-parseFloat($('#txtGastosFinanc').val());
	
    $('#txtBenefAntesImpNoUsuales').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales),2));
	
    var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').val())-(parseFloat($('#txtislr').val())+parseFloat($('#txtAjustePlanta').val())+parseFloat($('#txtAjusteInv').val()));
	
    $('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
    var ejercicio = parseFloat($('#txtBenefDespNoUsuales').val())-parseFloat($('#txtDivPagosEfect').val());
	
    $('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
    var aum_dism_cap_contable = parseFloat($('#txtEjercicio').val())-(parseFloat($('#txtAumCapSocial').val())+parseFloat($('#txtDismCapSocial').val())+parseFloat($('#txtAumReservaLegal').val()));
	
    $('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function benefNetoDespNoUsuales(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_desp_no_usuales = parseFloat($('#txtBenefAntesImpNoUsuales').val())-(parseFloat($('#txtislr').val())+parseFloat($('#txtAjustePlanta').val())+parseFloat($('#txtAjusteInv').val()));
	
    $('#txtBenefDespNoUsuales').attr('value',roundNumber(parseFloat(benef_desp_no_usuales),2));
	
    var ejercicio = parseFloat($('#txtBenefDespNoUsuales').val())-parseFloat($('#txtDivPagosEfect').val());
	
    $('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
    var aum_dism_cap_contable = parseFloat($('#txtEjercicio').val())-(parseFloat($('#txtAumCapSocial').val())+parseFloat($('#txtDismCapSocial').val())+parseFloat($('#txtAumReservaLegal').val()));
	
    $('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function resultadoEjercicio(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var ejercicio = parseFloat($('#txtBenefDespNoUsuales').val())-parseFloat($('#txtDivPagosEfect').val());
	
    $('#txtEjercicio').attr('value',roundNumber(parseFloat(ejercicio),2));
	
    var aum_dism_cap_contable = parseFloat($('#txtEjercicio').val())-(parseFloat($('#txtAumCapSocial').val())+parseFloat($('#txtDismCapSocial').val())+parseFloat($('#txtAumReservaLegal').val()));
	
    $('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}

function aumDismCapContable(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var aum_dism_cap_contable = parseFloat($('#txtEjercicio').val())-(parseFloat($('#txtAumCapSocial').val())+parseFloat($('#txtDismCapSocial').val())+parseFloat($('#txtAumReservaLegal').val()));
	
    $('#txtAumDismCapContable').attr('value',roundNumber(parseFloat(aum_dism_cap_contable),2));
}






//GANANCIAS Y PERDIDAS COLUMNA 2

function beneficioBruto2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_bruto2 = parseFloat($('#txtVentasNetas2').val())-parseFloat($('#txtCostoVentas2').val());
			  
    $('#txtBenefBruto2').attr('value',roundNumber(parseFloat(benef_bruto2),2));
	
    var benef_neto_oper2 = parseFloat($('#txtBenefBruto2').val())-parseFloat($('#txtGastosAdm2').val());
	
    $('#txtBenefNetoOper2').attr('value',roundNumber(parseFloat(benef_neto_oper2),2));
	
    var benef_antes_imp_y_no_usuales2 = parseFloat($('#txtBenefNetoOper').val())+parseFloat($('#txtOtrosIngresos').val())-parseFloat($('#txtOtrosEgresos').val())-parseFloat($('#txtGastosFinanc').val());
	
    $('#txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
    var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').val())-(parseFloat($('#txtislr2').val())+parseFloat($('#txtAjustePlanta2').val())+parseFloat($('#txtAjusteInv2').val()));
	
    $('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
    $('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
    var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').val())-parseFloat($('#txtDivPagosEfect2').val());
	
    $('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
    var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').val())-(parseFloat($('#txtAumCapSocial2').val())+parseFloat($('#txtDismCapSocial2').val())+parseFloat($('#txtAumReservaLegal2').val()));
	
		
    $('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
	
}


function benefNetoEnOper2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_neto_oper2 = parseFloat($('#txtBenefBruto2').val())-parseFloat($('#txtGastosAdm2').val());
	
    $('#txtBenefNetoOper2').attr('value',roundNumber(parseFloat(benef_neto_oper2),2));
	
    var benef_antes_imp_y_no_usuales2 = parseFloat($('#txtBenefNetoOper2').val())+parseFloat($('#txtOtrosIngresos2').val())-parseFloat($('#txtOtrosEgresos2').val())-parseFloat($('#txtGastosFinanc2').val());
	
    $('#txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
    var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').val())-(parseFloat($('#txtislr2').val())+parseFloat($('#txtAjustePlanta2').val())+parseFloat($('#txtAjusteInv2').val()));
	
    $('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
    $('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
    var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').val())-parseFloat($('#txtDivPagosEfect2').val());
	
    $('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
    var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').val())-(parseFloat($('#txtAumCapSocial2').val())+parseFloat($('#txtDismCapSocial2').val())+parseFloat($('#txtAumReservaLegal2').val()));
	
    $('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function benefAntesImpYNoUsuales2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_antes_imp_y_no_usuales2 = parseFloat($('#txtBenefNetoOper2').val())+parseFloat($('#txtOtrosIngresos2').val())-parseFloat($('#txtOtrosEgresos2').val())-parseFloat($('#txtGastosFinanc2').val());
	
    $('#txtBenefAntesImpNoUsuales2').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales2),2));
	
    var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').val())-(parseFloat($('#txtislr2').val())+parseFloat($('#txtAjustePlanta2').val())+parseFloat($('#txtAjusteInv2').val()));
	
    $('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
    $('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
    var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').val())-parseFloat($('#txtDivPagosEfect2').val());
	
    $('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
    var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').val())-(parseFloat($('#txtAumCapSocial2').val())+parseFloat($('#txtDismCapSocial2').val())+parseFloat($('#txtAumReservaLegal2').val()));
	
    $('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function benefNetoDespNoUsuales2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_desp_no_usuales2 = parseFloat($('#txtBenefAntesImpNoUsuales2').val())-(parseFloat($('#txtislr2').val())+parseFloat($('#txtAjustePlanta2').val())+parseFloat($('#txtAjusteInv2').val()));
	
    $('#txtBenefDespNoUsuales2').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
    $('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(benef_desp_no_usuales2),2));
	
    var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').val())-parseFloat($('#txtDivPagosEfect2').val());
	
    $('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
    var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').val())-(parseFloat($('#txtAumCapSocial2').val())+parseFloat($('#txtDismCapSocial2').val())+parseFloat($('#txtAumReservaLegal2').val()));
	
    $('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}

function resultadoEjercicio2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var ejercicio2 = parseFloat($('#txtBenefDespNoUsuales2').val())-parseFloat($('#txtDivPagosEfect2').val());
	
    $('#txtEjercicio2').attr('value',roundNumber(parseFloat(ejercicio2),2));
	
    var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').val())-(parseFloat($('#txtAumCapSocial2').val())+parseFloat($('#txtDismCapSocial2').val())+parseFloat($('#txtAumReservaLegal2').val()));
	
    $('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
    $('#txtFFBenefNetoDespNoUsu').attr('value',$('#txtBenefDespNoUsuales2').val());
}

function aumDismCapContable2(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var aum_dism_cap_contable2 = parseFloat($('#txtEjercicio2').val())-(parseFloat($('#txtAumCapSocial2').val())+parseFloat($('#txtDismCapSocial2').val())+parseFloat($('#txtAumReservaLegal2').val()));
	
    $('#txtAumDismCapContable2').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
//    $('#txtFFBenefNetoDespNoUsu').attr('value',roundNumber(parseFloat(aum_dism_cap_contable2),2));
}



//GANANCIAS Y PERDIDAS COLUMNA 3


function beneficioBruto3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_bruto3 = parseFloat($('#txtVentasNetas3').val())-parseFloat($('#txtCostoVentas3').val());
			  
    $('#txtBenefBruto3').attr('value',roundNumber(parseFloat(benef_bruto3),2));
	
    var benef_neto_oper3 = parseFloat($('#txtBenefBruto3').val())-parseFloat($('#txtGastosAdm3').val());
	
    $('#txtBenefNetoOper3').attr('value',roundNumber(parseFloat(benef_neto_oper3),2));
	
    var benef_antes_imp_y_no_usuales3 = parseFloat($('#txtBenefNetoOper').val())+parseFloat($('#txtOtrosIngresos').val())-parseFloat($('#txtOtrosEgresos').val())-parseFloat($('#txtGastosFinanc').val());
	
    $('#txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
    var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').val())-(parseFloat($('#txtislr3').val())+parseFloat($('#txtAjustePlanta3').val())+parseFloat($('#txtAjusteInv3').val()));
	
    $('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
    $('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
    var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').val())-parseFloat($('#txtDivPagosEfect3').val());
	
    $('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
    var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').val())-(parseFloat($('#txtAumCapSocial3').val())+parseFloat($('#txtDismCapSocial3').val())+parseFloat($('#txtAumReservaLegal3').val()));
	
		
    $('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
	
}


function benefNetoEnOper3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_neto_oper3 = parseFloat($('#txtBenefBruto3').val())-parseFloat($('#txtGastosAdm3').val());
	
    $('#txtBenefNetoOper3').attr('value',roundNumber(parseFloat(benef_neto_oper3),2));
	
    var benef_antes_imp_y_no_usuales3 = parseFloat($('#txtBenefNetoOper3').val())+parseFloat($('#txtOtrosIngresos3').val())-parseFloat($('#txtOtrosEgresos3').val())-parseFloat($('#txtGastosFinanc3').val());
	
    $('#txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
    var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').val())-(parseFloat($('#txtislr3').val())+parseFloat($('#txtAjustePlanta3').val())+parseFloat($('#txtAjusteInv3').val()));
	
    $('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
    $('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
    var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').val())-parseFloat($('#txtDivPagosEfect3').val());
	
    $('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
    var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').val())-(parseFloat($('#txtAumCapSocial3').val())+parseFloat($('#txtDismCapSocial3').val())+parseFloat($('#txtAumReservaLegal3').val()));
	
    $('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function benefAntesImpYNoUsuales3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_antes_imp_y_no_usuales3 = parseFloat($('#txtBenefNetoOper3').val())+parseFloat($('#txtOtrosIngresos3').val())-parseFloat($('#txtOtrosEgresos3').val())-parseFloat($('#txtGastosFinanc3').val());
	
    $('#txtBenefAntesImpNoUsuales3').attr('value',roundNumber(parseFloat(benef_antes_imp_y_no_usuales3),2));
	
    var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').val())-(parseFloat($('#txtislr3').val())+parseFloat($('#txtAjustePlanta3').val())+parseFloat($('#txtAjusteInv3').val()));
	
    $('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
    $('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
    var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').val())-parseFloat($('#txtDivPagosEfect3').val());
	
    $('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
    var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').val())-(parseFloat($('#txtAumCapSocial3').val())+parseFloat($('#txtDismCapSocial3').val())+parseFloat($('#txtAumReservaLegal3').val()));
	
    $('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function benefNetoDespNoUsuales3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var benef_desp_no_usuales3 = parseFloat($('#txtBenefAntesImpNoUsuales3').val())-(parseFloat($('#txtislr3').val())+parseFloat($('#txtAjustePlanta3').val())+parseFloat($('#txtAjusteInv3').val()));
	
    $('#txtBenefDespNoUsuales3').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
    $('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(benef_desp_no_usuales3),2));
	
    var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').val())-parseFloat($('#txtDivPagosEfect3').val());
	
    $('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
    var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').val())-(parseFloat($('#txtAumCapSocial3').val())+parseFloat($('#txtDismCapSocial3').val())+parseFloat($('#txtAumReservaLegal3').val()));
	
    $('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}

function resultadoEjercicio3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var ejercicio3 = parseFloat($('#txtBenefDespNoUsuales3').val())-parseFloat($('#txtDivPagosEfect3').val());
	
    $('#txtEjercicio3').attr('value',roundNumber(parseFloat(ejercicio3),2));
	
    var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').val())-(parseFloat($('#txtAumCapSocial3').val())+parseFloat($('#txtDismCapSocial3').val())+parseFloat($('#txtAumReservaLegal3').val()));
	
    $('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
    $('#txtFFBenefNetoDespNoUsu1').attr('value',$('#txtBenefDespNoUsuales3').val());
}

function aumDismCapContable3(campo){
	
    if ($(campo).val()==''){
        $(campo).attr('value','0');
    }
	
    var aum_dism_cap_contable3 = parseFloat($('#txtEjercicio3').val())-(parseFloat($('#txtAumCapSocial3').val())+parseFloat($('#txtDismCapSocial3').val())+parseFloat($('#txtAumReservaLegal3').val()));
	
    $('#txtAumDismCapContable3').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
//    $('#txtFFBenefNetoDespNoUsu1').attr('value',roundNumber(parseFloat(aum_dism_cap_contable3),2));
}


/*  Asignacion de valores al total de Generaci�n o Absorci�n Por Operaciones */   

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

/* Generaci�n o Absorci�n Por Inversi�n de Trabajo **/
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
    
    ArrayNombreOper1 = ['txtedif', 'txtmaquinaria', 'txtinstmejoras', 'txtmobiliario', 'txtRespAccHerra', 'txtvehiculo', 'txtContrucEnProceso'];
    ArrayNombreOper2 = ['txtedif2', 'txtmaquinaria2', 'txtinstmejoras2', 'txtmobiliario2', 'txtRespAccHerra2', 'txtvehiculo2', 'txtContrucEnProceso2'];
    ArrayNombreOper3 = ['txtedif3', 'txtmaquinaria3', 'txtinstmejoras3', 'txtmobiliario3', 'txtRespAccHerra3', 'txtvehiculo3', 'txtContrucEnProceso3'];
    
    TotalOperaciones1 = sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3);

    
    ResultadoResta1  = restaDosValores_Retorna(TotalOperaciones1,TotalOperaciones2);
    ResultadoResta2  = restaDosValores_Retorna(TotalOperaciones2,TotalOperaciones3);

    //Asignamos el valor al gasto e inversion en planta 1
    $('#txtGastoInvPlanta0').attr('value',ResultadoResta1);
    
    //Asignamos el valor al gasto e inversion en planta 2
    $('#txtGastoInvPlanta1').attr('value',ResultadoResta2);    
}


/** Cargos Diferidos y Otros Activos **/
function setCargosDiferidos_Activos()
{
    Resta1_Year1 = restaDosValores_Retorna($('#txtcargosdif').val(),$('#txtcargosdif2').val());
    Resta2_Year1 = restaDosValores_Retorna($('#txtotrosact').val(),$('#txtotrosact2').val());
    
    Resultado_Year1 = Resta1_Year1 + Resta2_Year1;
    //Asigna el resultado 
    $('#txtCargoDifOtroAct0').attr('value',roundNumber(parseFloat(Resultado_Year1),3)); 
    
    Resta1_Year2 = restaDosValores_Retorna($('#txtcargosdif2').val(),$('#txtcargosdif3').val());
    Resta2_Year2 = restaDosValores_Retorna($('#txtotrosact2').val(),$('#txtotrosact3').val());
    
    Resultado_Year2 = Resta1_Year2 + Resta2_Year2;
    //Asigna el resultado 
    $('#txtCargoDifOtroAct1').attr('value',roundNumber(parseFloat(Resultado_Year2),3));    
}

/** Impuestos por Pagar y Retenciones **/
function setImpuestos_Pag_Ret()
{   
    ImpResta1_Year1 = -1 * restaDosValores_Retorna($('#txtimpuestospagar').val(), $('#txtimpuestospagar2').val());
    //Asignamos el resultado
    $('#txtImpPagarReten0').attr('value',ImpResta1_Year1);
    
    ImpResta1_Year2 = -1 * restaDosValores_Retorna($('#txtimpuestospagar2').val(), $('#txtimpuestospagar3').val());
    //Asignamos el resultado
    $('#txtImpPagarReten1').attr('value',ImpResta1_Year2);    
    
//setGeneracion_Absor_OtrosActivosPasivos();
}


/** Generaci�n o Absorci�n por Otros Activos o Pasivos  **/
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

/** Pago de dividendos (-) / Reposici�n de P�rdida (+): **/ 
function setPagoDividendos_ReposicionPerd()
{
    //Calculo a�o 1
    PagDivSuma1_Year1  = sumaDosValores_Retorna($('#txtSuperavitAcum2').val(), $('#txtejercicio2').val());
    PagDivResta1_Year1 = restaDosValores_Retorna(PagDivSuma1_Year1, $('#txtEjercicio2').val());
    
    PagDivSuma2_Year1  = sumaDosValores_Retorna($('#txtSuperavitAcum').val(), $('#txtejercicio').val());
    
    PagDivResultado_Year1 = restaDosValores_Retorna(PagDivResta1_Year1,PagDivSuma2_Year1); 
    //Asignamos el valor 
    $('#txtPagoDivRepoPerd0').attr('value',PagDivResultado_Year1);


    //Calculo a�o 1
    PagDivSuma1_Year2  = sumaDosValores_Retorna($('#txtSuperavitAcum3').val(), $('#txtejercicio3').val());
    PagDivResta1_Year2 = restaDosValores_Retorna(PagDivSuma1_Year2, $('#txtEjercicio3').val());
    
    PagDivSuma2_Year2  = sumaDosValores_Retorna($('#txtSuperavitAcum2').val(), $('#txtejercicio2').val());
    
    PagDivResultado_Year2 = restaDosValores_Retorna(PagDivResta1_Year2,PagDivSuma2_Year2); 
    //Asignamos el valor 
    $('#txtPagoDivRepoPerd1').attr('value',PagDivResultado_Year2);
}

/** Generaci�n o Absorci�n por Inversiones y Dividendos **/ 
function setGeneracion_Absor_InversionDividendos()
{
    
    AbsoDivArrayNombreOper1 = ['txtInversiones0', 'txtPagoDivRepoPerd0'];     
    AbsoDivArrayNombreOper2  = ['txtInversiones1', 'txtPagoDivRepoPerd1'];
     
    
    AbsorDivTotalOperaciones1 = sumaValores(AbsoDivArrayNombreOper1);  
    AbsorDivTotalOperaciones2 =  sumaValores(AbsoDivArrayNombreOper2);
    
    $('#txtGenerAbsorbInvDiv0').attr('value', AbsorDivTotalOperaciones1);
    $('#txtGenerAbsorbInvDiv1').attr('value', AbsorDivTotalOperaciones2);    
}

/** Generaci�n o Absorci�n Antes de Financiamiento **/ 
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

/** Generaci�n o Absorbci�n Por Financiamiento **/
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

/** Efectivo Al Inicio del A�o **/ 
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


/** Efectivo Al Fin del A�o **/ 
function setEfectivo_Fin_Year()
{
    EfectFinArrayNombreOper1 = [
    'txtCambioCtaCaja0',
    'txtEfecIniAno0'     
    ];
     
    EfectFinArrayNombreOper2 = [
    'txtCambioCtaCaja1',
    'txtEfecIniAno1'     
    ];
     
    EfectFinTotalOperaciones1 =  sumaValores(EfectFinArrayNombreOper1);  
    EfectFinTotalOperaciones2 =  sumaValores(EfectFinArrayNombreOper2);
    
    $('#txtEfecFinAno0').attr('value', EfectFinTotalOperaciones1);
    $('#txtEfecFinAno1').attr('value', EfectFinTotalOperaciones2);         
}


/**************************************************************/
/** Funciones de Suma de las seccion Indicadores Economicos **/
/**************************************************************/

/** Variaci�n de las Ventas Netas Respecto A�o Anterior **/
function setVariacion_Ventas_Netas_Year()
{    
    ResultadoResta1 = restaDosValores_Retorna($('#txtVentasNetas').val(), $('#txtVentasNetas2').val());
    ResultadoOperacion1 = -1 * (divideDosValores_Retorna(ResultadoResta1,$('#txtVentasNetas').val()));
    ResultadoOperacion1 = redondeaNumero_Retorna(100 * ResultadoOperacion1);
    $('#txtVarVentasNetas0').attr('value',ResultadoOperacion1+"%");
    
    ResultadoResta2 = restaDosValores_Retorna($('#txtVentasNetas2').val(), $('#txtVentasNetas3').val());    
    console.debug(ResultadoResta2);
    console.debug($('#txtVentasNetas2').val());
    ResultadoOperacion2 = -1 * (divideDosValores_Retorna(ResultadoResta2,$('#txtVentasNetas2').val()));
    console.debug(ResultadoOperacion2);
    ResultadoOperacion2 = (100 * ResultadoOperacion2).toFixed(2);
    $('#txtVarVentasNetas1').attr('value',ResultadoOperacion2+"%");        
}

/** % Sobre Ventas Netas del Costo de Ventas  **/ 
function setVentas_Netas_Costo_Ventas()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtCostoVentas').val(), $('#txtVentasNetas').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcCostoVentas0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtCostoVentas2').val(), $('#txtVentasNetas2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcCostoVentas1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtCostoVentas3').val(), $('#txtVentasNetas3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcCostoVentas2').attr('value',ResultadoDivision3+"%");
}


/** % Sobre Ventas Netas del Beneficio Bruto   **/
function setVentas_Netas_Beneficio_Bruto()
{
    ResultadoDivision1 = divideDosValores_Retorna($('#txtBenefBruto').val(), $('#txtVentasNetas').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcBeneficioBruto0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtBenefBruto2').val(), $('#txtVentasNetas2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcBeneficioBruto1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtBenefBruto3').val(), $('#txtVentasNetas3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcBeneficioBruto2').attr('value',ResultadoDivision3+"%");    
}

/** % Sobre Ventas Netas de los Gastos Administrativos y Generales  **/
function setVentas_Netas_Gastos_Administr_Generales()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtGastosAdm').val(), $('#txtVentasNetas').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcGastosAdminGenr0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtGastosAdm2').val(), $('#txtVentasNetas2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcGastosAdminGenr1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtGastosAdm3').val(), $('#txtVentasNetas3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcGastosAdminGenr2').attr('value',ResultadoDivision3+"%");        
} 


/** % Sobre Ventas Netas de los Gastos Financieros  **/
function setVentas_Netas_Gastos_Financieros()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtGastosFinanc').val(), $('#txtVentasNetas').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcGastosFinancieros0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtGastosFinanc2').val(), $('#txtVentasNetas2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcGastosFinancieros1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtGastosFinanc3').val(), $('#txtVentasNetas3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcGastosFinancieros2').attr('value',ResultadoDivision3+"%");            
}
 
/** % Sobre Ventas Netas del Beneficio neto Antes de no Usuales  **/
function setVentas_Beneficio_Neto_Antes_No_Usuales()
{
    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtBenefAntesImpNoUsuales').val(), $('#txtVentasNetas').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtPorcBenefNetoUsua0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtBenefAntesImpNoUsuales2').val(), $('#txtVentasNetas2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtPorcBenefNetoUsua1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtBenefAntesImpNoUsuales3').val(), $('#txtVentasNetas3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtPorcBenefNetoUsua2').attr('value',ResultadoDivision3+"%");            
}

/** Rentabilidad del Capital Neto Tangible **/
function setRentabilidad_Capital_Neto_Tangible()
{
    // txtEjercicio / txtTotalCapital
    ResultadoDivision1 = divideDosValores_Retorna($('#txtEjercicio').val(), $('#txtTotalCapital').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtRentaCapitalNetoTan0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtEjercicio2').val(), $('#txtTotalCapital2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtRentaCapitalNetoTan1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtEjercicio3').val(), $('#txtTotalCapital3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtRentaCapitalNetoTan2').attr('value',ResultadoDivision3+"%");
}


/** Rentabilidad sobre el Capital Neto Invertido **/
function setRentabilidad_Capital_Neto_Invertido()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtEjercicio').val(), $('#txtcapitalsocial').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtRentaCapitalNetoInver0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtEjercicio2').val(), $('#txtcapitalsocial2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtRentaCapitalNetoInver1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtEjercicio3').val(), $('#txtcapitalsocial3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtRentaCapitalNetoInver2').attr('value',ResultadoDivision3+"%");
}


/** Rentabilidad sobre Ventas **/
function setRentabilidad_Sobre_Ventas()
{    
    ResultadoDivision1 = divideDosValores_Retorna($('#txtBenefDespNoUsuales').val(), $('#txtVentasNetas').val());
    ResultadoDivision1 = redondeaNumero_Retorna(100 * ResultadoDivision1);
    $('#txtRentaSobreVentas0').attr('value',ResultadoDivision1+"%");

    ResultadoDivision2 = divideDosValores_Retorna($('#txtBenefDespNoUsuales2').val(), $('#txtVentasNetas2').val());
    ResultadoDivision2 = redondeaNumero_Retorna(100 * ResultadoDivision2);
    $('#txtRentaSobreVentas1').attr('value',ResultadoDivision2+"%");
    
    ResultadoDivision3 = divideDosValores_Retorna($('#txtBenefDespNoUsuales3').val(), $('#txtVentasNetas3').val());
    ResultadoDivision3 = redondeaNumero_Retorna(100 * ResultadoDivision3);
    $('#txtRentaSobreVentas2').attr('value',ResultadoDivision3+"%");
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
    RsultadoDiv1 =  divideDosValores_Retorna($('#txtTotalActCirc').val(),$('#txtTotalPasivoCirc').val())
    RsultadoDiv2 =  divideDosValores_Retorna($('#txtTotalActCirc2').val(),$('#txtTotalPasivoCirc2').val())
    RsultadoDiv3 =  divideDosValores_Retorna($('#txtTotalActCirc3').val(),$('#txtTotalPasivoCirc3').val())
    
    $('#txtSolvencia0').attr('value',RsultadoDiv1.toFixed(2));
    $('#txtSolvencia1').attr('value',RsultadoDiv2.toFixed(2));
    $('#txtSolvencia2').attr('value',RsultadoDiv3.toFixed(2));
}

/** Solvencia  General **/
function setSolvencia_General()
{    
    RsultadoSGDiv1 =  divideDosValores_Retorna($('#txtTotalActCirc').val(),$('#txtTotalPasivos').val())
    RsultadoSGDiv2 =  divideDosValores_Retorna($('#txtTotalActCirc2').val(),$('#txtTotalPasivos2').val())
    RsultadoSGDiv3 =  divideDosValores_Retorna($('#txtTotalActCirc3').val(),$('#txtTotalPasivos3').val())
    
    $('#txtSolvenciaGeneral0').attr('value',RsultadoSGDiv1.toFixed(2));
    $('#txtSolvenciaGeneral1').attr('value',RsultadoSGDiv2.toFixed(2));
    $('#txtSolvenciaGeneral2').attr('value',RsultadoSGDiv3.toFixed(2));
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
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtTotalPasivoCirc').val());
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtTotalPasivoCirc2').val());
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtTotalPasivoCirc3').val());
    
    $('#txtLiquidez0').attr('value', TotalDivision1.toFixed(2));
    $('#txtLiquidez1').attr('value', TotalDivision2.toFixed(2));
    $('#txtLiquidez2').attr('value', TotalDivision3.toFixed(2));    
}


/** Ventas a Cr�dito Diarias **/
function setVentasCreditoDiarias()
{
    //txtVentasNetas
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtVentasNetas').val(), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtVentasNetas2').val(), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtVentasNetas3').val(), 360);
    
    $('#txtVentasCreditosDia0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtVentasCreditosDia1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtVentasCreditosDia2').attr('value', ResultadoDivCD3.toFixed(2));
}

/** N�mero de D�as a Mano de Ventas **/
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
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtVentasCreditosDia0').val());
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtVentasCreditosDia1').val());
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtVentasCreditosDia2').val());
    
    $('#txtNumDiariManoVent0').attr('value', TotalDivision1.toFixed(2));
    $('#txtNumDiariManoVent1').attr('value', TotalDivision2.toFixed(2));
    $('#txtNumDiariManoVent2').attr('value', TotalDivision3.toFixed(2));
}

/** Per�odo Promedio de Cobros **/
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
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtVentasCreditosDia0').val());
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtVentasCreditosDia1').val());
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtVentasCreditosDia2').val());
    
    $('#txtPeriodoPromCobros0').attr('value', TotalDivision1.toFixed(2));
    $('#txtPeriodoPromCobros1').attr('value', TotalDivision2.toFixed(2));
    $('#txtPeriodoPromCobros2').attr('value', TotalDivision3.toFixed(2));
}


/** Rotaci�n de Cuentas por Cobrar **/
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
    
    TotalDivision1 = divideDosValores_Retorna($('#txtVentasNetas').val(),TotalOperaciones1);
    TotalDivision2 = divideDosValores_Retorna($('#txtVentasNetas2').val(),TotalOperaciones2);
    TotalDivision3 = divideDosValores_Retorna($('#txtVentasNetas3').val(),TotalOperaciones3);
    
    $('#txtTotacionCuentasCobrar0').attr('value', TotalDivision1.toFixed(2));
    $('#txtTotacionCuentasCobrar1').attr('value', TotalDivision2.toFixed(2));
    $('#txtTotacionCuentasCobrar2').attr('value', TotalDivision3.toFixed(2));
}



/** Rotaci�n de Inventarios  **/
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
    
    TotalDivision1 = divideDosValores_Retorna($('#txtCostoVentas').val(),TotalOperaciones1);
    TotalDivision2 = divideDosValores_Retorna($('#txtCostoVentas2').val(),TotalOperaciones2);
    TotalDivision3 = divideDosValores_Retorna($('#txtCostoVentas3').val(),TotalOperaciones3);
    
    $('#txtRotacionInventarios0').attr('value', TotalDivision1.toFixed(2));
    $('#txtRotacionInventarios1').attr('value', TotalDivision2.toFixed(2));
    $('#txtRotacionInventarios2').attr('value', TotalDivision3.toFixed(2));
}


/** N�mero de D�as a Mano de Inventarios **/
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
    
    TotalDivision1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtCostVentsServDiar0').val());
    TotalDivision2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtCostVentsServDiar1').val());
    TotalDivision3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtCostVentsServDiar2').val());
    
    $('#txtNumDiasManInventa0').attr('value', TotalDivision1.toFixed(2));
    $('#txtNumDiasManInventa1').attr('value', TotalDivision2.toFixed(2));
    $('#txtNumDiasManInventa2').attr('value', TotalDivision3.toFixed(2));
}
 

/** Costo de Ventas o Servicios Diarios **/ 
function setCosto_Ventas_Servicios_Diarios()
{
    //txtVentasNetas
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtCostoVentas').val(), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtCostoVentas2').val(), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtCostoVentas3').val(), 360);
    
    $('#txtCostVentsServDiar0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtCostVentsServDiar1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtCostVentsServDiar2').attr('value', ResultadoDivCD3.toFixed(2));
}

/** Rotaci�n de Cuentas por Pagar  **/ 
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
    
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtCompras0').val(), TotalOperaciones1);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtCompras1').val(), TotalOperaciones2);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtCompras2').val(), TotalOperaciones3);
    
    $('#txtRotacionCuentasPagar0').attr('value',ResultadoDivCD1.toFixed(2)); 
    $('#txtRotacionCuentasPagar1').attr('value',ResultadoDivCD2.toFixed(2));
    $('#txtRotacionCuentasPagar2').attr('value',ResultadoDivCD2.toFixed(2));

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
    
    ResultadoTotal1  = restaDosValores_Retorna($('#txtCostoVentas2').val(), TotalOperaciones1);
    ResultadoTotal1  = sumaDosValores_Retorna(ResultadoTotal1,TotalOperaciones2); 
    
    ResultadoTotal2  = restaDosValores_Retorna($('#txtCostoVentas3').val(), TotalOperaciones2);
    ResultadoTotal2  = sumaDosValores_Retorna(ResultadoTotal2,TotalOperaciones3);
        
    
    $('#txtCompras0').attr('value', 0);
    $('#txtCompras1').attr('value', ResultadoTotal1.toFixed(2));
    $('#txtCompras2').attr('value', ResultadoTotal2.toFixed(2));
}
  

/** Compras Diarias **/ 
function setCompras_Diarias()
{     
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtCompras0').val(), 360);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtCompras1').val(), 360);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtCompras2').val(), 360);
    
    $('#txtComprasDiarias0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtComprasDiarias1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtComprasDiarias2').attr('value', ResultadoDivCD3.toFixed(2));
}

/** N�mero de D�as a Mano en Cuentas por Pagar **/ 
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
    
    ResultadoDivCD1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtComprasDiarias0').val());
    ResultadoDivCD2 = divideDosValores_Retorna(TotalOperaciones2, $('#txtComprasDiarias1').val());
    ResultadoDivCD3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtComprasDiarias2').val());
    
    $('#txtNumDiasManCuantasPagar0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtNumDiasManCuantasPagar1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtNumDiasManCuantasPagar2').attr('value', ResultadoDivCD3.toFixed(2));    
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
    
    $('#txtCicloEfectivo0').attr('value', TotalOperaciones1.toFixed(2));
    $('#txtCicloEfectivo1').attr('value', TotalOperaciones2.toFixed(2));
    $('#txtCicloEfectivo2').attr('value', TotalOperaciones3.toFixed(2));    
}


/* Endeudamiento Total */ 
function setEndeudamiento_Total()
{    
    ResultadoDiv1 = divideDosValores_Retorna($('#txtTotalPasivos').val(), $('#txtTotalCapital').val());
    ResultadoDiv2 = divideDosValores_Retorna($('#txtTotalPasivos2').val(), $('#txtTotalCapital2').val());
    ResultadoDiv3 = divideDosValores_Retorna($('#txtTotalPasivos3').val(), $('#txtTotalCapital3').val());
    
    $('#txtEndeudamientoTotal0').attr('value', ResultadoDiv1.toFixed(2));
    $('#txtEndeudamientoTotal1').attr('value', ResultadoDiv2.toFixed(2));
    $('#txtEndeudamientoTotal2').attr('value', ResultadoDiv3.toFixed(2));    
}


/* Endeudamiento Circulante */ 
function setEndeudamiento_Circulante()
{    
    ResultadoDiv1 = divideDosValores_Retorna($('#txtTotalPasivoCirc').val(), $('#txtTotalCapital').val());
    ResultadoDiv2 = divideDosValores_Retorna($('#txtTotalPasivoCirc2').val(), $('#txtTotalCapital2').val());
    ResultadoDiv3 = divideDosValores_Retorna($('#txtTotalPasivoCirc3').val(), $('#txtTotalCapital3').val());
    
    $('#txtEndeudamientoCirculante0').attr('value', ResultadoDiv1.toFixed(2));
    $('#txtEndeudamientoCirculante1').attr('value', ResultadoDiv2.toFixed(2));
    $('#txtEndeudamientoCirculante2').attr('value', ResultadoDiv3.toFixed(2));    
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
    
    ResultadoDiv1 = divideDosValores_Retorna(TotalOperaciones1, $('#txtTotalCapital').val());
    ResultadoDiv2 = divideDosValores_Retorna($('#txtTotalPasivos2').val(), $('#txtTotalCapital2').val());
    ResultadoDiv3 = divideDosValores_Retorna(TotalOperaciones3, $('#txtTotalCapital3').val());
    
    $('#txtEndeuBancTotal0').attr('value', ResultadoDiv1.toFixed(2));
    $('#txtEndeuBancTotal1').attr('value', ResultadoDiv2.toFixed(2));
    $('#txtEndeuBancTotal2').attr('value', ResultadoDiv3.toFixed(2));  
    
}

/** Endeudamiento a Largo Plazo **/
function setEndeudamiento_Largo_Plazo()
{
    //txtTotalCapital / txtTotalCapital     
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtTotalCapital').val(), $('#txtTotalCapital').val());
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtTotalCapital2').val(), $('#txtTotalCapital2').val());
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtTotalCapital3').val(), $('#txtTotalCapital3').val());
    
    $('#txtEndeuLargoPlazo0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtEndeuLargoPlazo1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtEndeuLargoPlazo2').attr('value', ResultadoDivCD3.toFixed(2));
}

/** Rotaci�n de la Planta **/
function setRotacion_Planta()
{
    //txtVentasNetas / txtTotalActFijo    
         
    ResultadoDivCD1 = divideDosValores_Retorna($('#txtVentasNetas').val(), $('#txtTotalActFijo').val());
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtVentasNetas2').val(), $('#txtTotalActFijo2').val());
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtVentasNetas3').val(), $('#txtTotalActFijo3').val());
    
    $('#txtRotaciPlanta0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtRotaciPlanta1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtRotaciPlanta2').attr('value', ResultadoDivCD3.toFixed(2));
}


/** Productividad de la Empresa **/ 
function setProductividad_Empresa()
{
    
    //txtGenerAbsobOper0 / (txtTotalActCirc + txtTotalActFijo)
        
    ArrayNombreOper1 = [
    'txtTotalActCirc',
    'txtTotalActFijo'     
    ];
    

    ArrayNombreOper2 = [     
    'txtTotalActCirc2',
    'txtTotalActFijo2'   
    ];
     
    
    var este = parseFloat($('#txtTotalActFijo2').val());
        
    ArrayNombreOper3 = [     
    'txtTotalActCirc3',
    'txtTotalActFijo3'  
    ];     
    
    TotalOperaciones1 =  sumaValores(ArrayNombreOper1);  
    TotalOperaciones2 =  sumaValores(ArrayNombreOper2);
    TotalOperaciones3 =  sumaValores(ArrayNombreOper3); 
    
    
    ResultadoDivCD1 = divideDosValores_Retorna(0, TotalOperaciones1);
    ResultadoDivCD2 = divideDosValores_Retorna($('#txtGenerAbsobOper0').val(), TotalOperaciones2);
    ResultadoDivCD3 = divideDosValores_Retorna($('#txtGenerAbsobOper1').val(), TotalOperaciones3);
    
    $('#txtProducEmpre0').attr('value', ResultadoDivCD1.toFixed(2));
    $('#txtProducEmpre1').attr('value', ResultadoDivCD2.toFixed(2));
    $('#txtProducEmpre2').attr('value', ResultadoDivCD3.toFixed(2));    
}

function setVerificaciones(){
    valida1= $('#txtTotalAct').val() - $('#txtTotalPasCap').val();
    valida2= $('#txtTotalAct2').val() - $('#txtTotalPasCap2').val();
    valida3= $('#txtTotalAct3').val() - $('#txtTotalPasCap3').val();
    $('#verifica1').html(valida1.toFixed(2));
    $('#verifica2').html(valida2.toFixed(2));
    $('#verifica3').html(valida3.toFixed(2));
}

$(window).load(function(){
    setVerificaciones();
});