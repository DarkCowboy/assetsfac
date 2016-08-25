/**
 * jQuery Validation Plugin 1.9.0
 *
 * http://bassistance.de/jquery-plugins/jquery-plugin-validation/
 * http://docs.jquery.com/Plugins/Validation
 *
 * Copyright (c) 2006 - 2011 Jörn Zaefferer
 *
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 */

(function() {

	function stripHtml(value) {
		// remove html tags and space chars
		return value.replace(/<.[^<>]*?>/g, ' ').replace(/&nbsp;|&#160;/gi, ' ')
		// remove numbers and punctuation
		.replace(/[0-9.(),;:!?%#$'"_+=\/-]*/g,'');
	}
	jQuery.validator.addMethod("maxWords", function(value, element, params) {
	    return this.optional(element) || stripHtml(value).match(/\b\w+\b/g).length < params;
	}, jQuery.validator.format("Please enter {0} words or less."));

	jQuery.validator.addMethod("minWords", function(value, element, params) {
	    return this.optional(element) || stripHtml(value).match(/\b\w+\b/g).length >= params;
	}, jQuery.validator.format("Please enter at least {0} words."));

	jQuery.validator.addMethod("rangeWords", function(value, element, params) {
	    return this.optional(element) || stripHtml(value).match(/\b\w+\b/g).length >= params[0] && value.match(/bw+b/g).length < params[1];
	}, jQuery.validator.format("Please enter between {0} and {1} words."));

})();


// Inicio Adverweb
jQuery.validator.addMethod("cuentaActivo", function(value, element) {
	return this.optional(element) || /(?:^0171\d{16}$)|(?:^\d{10}$)/.test(value);
}, "Formato de cuenta inv\u00e1lido");

jQuery.validator.addMethod("cualquierCuenta", function(value, element) {
	return this.optional(element) || /^\d{10}(?:\d{10})?$/.test(value);
}, "Formato de cuenta inv\u00e1lido");
jQuery.validator.addMethod("cantv", function(value, element) {
	return this.optional(element) || /^02\d{9}$/.test(value) || /^(?:050|080)|090\d{8}$/.test(value);
}, "Formato de numero CANTV inv\u00e1lido");

jQuery.validator.addMethod("movilnet", function(value, element) {
	return this.optional(element) || /^(?:0416|0426)\d{7}$/.test(value);
}, "Formato de numero Movilnet inv\u00e1lido");

jQuery.validator.addMethod("mayor", function(value, element) {
	return this.optional(element) || !/^(?:0)\d{8}$/.test(value);
}, "Formato de numero de Contrato Cantv.net inv\u00e1lido");

/*
jQuery.validator.addMethod("nroCuenta", function(value, element) {
	var banco = substr(value, 0, 4);
	var oficina = substr(value, 4, 4);
	var ultimos10 = substr(value, -10);
	var digitos = substr(value,8,2);
	
	var aux1 = $banco+oficina+'0';
	
	while(aux1.length<15){
		aux1 = '0'+aux1;
	}
	
	var aux11='';
	
	for(i=aux1.length;i>=0;i--){
		aux11 += aux1[i];
	}

	var aux1 = aux11.substring(-14);

	var aux2 = $oficina+ultimos10+'0',15,'0',STR_PAD_LEFT)),-14);
	
	while(aux2.length<15){
		aux2 = '0'+aux1;
	}	

	var factorm = array(2,3,4,5,6,7,2,3,4,5,6,7,2,3);
	
	var digito1 = digito2 = 0;

	for(i=0;i<strlen($aux1);i++){
		$digito1 += $aux1[i]*$factorm[i];
		$digito2 += $aux2[i]*$factorm[i];
	}

	digito1 = (11 - (digito1 % 11)) % 10;
	digito2 = (11 - (digito2 % 11)) % 10;

	return digitos==digito1+digito2;

	return this.optional(element) || res;
}, "Formato de cuenta inv\u00e1lido");
*/

//
jQuery.validator.addMethod("noigual", function(value, element, param) {
	if(!(param instanceof Array)){
		param = [param];
	}
	
	var valido = true;
	
	for(i=0;i<param.length;i++){
		// bind to the blur event of the target in order to revalidate whenever the target field is updated
		// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
		var target = $(param[i]).unbind(".validate-noigual").bind("blur.validate-noigual", function() {
			$(element).valid();
		});
		valido = valido && value != target.val();		
	}
	
	return valido;	
}, "Estimado cliente, por favor ingrese otra respuesta");

jQuery.validator.addMethod("numberVE", function(value, element) {
 
	var valor = value.replace(/\./g,'').replace(/,/g,'.');	
	return this.optional(element) || /^-?(?:\d+|\d{1,3}(?:\.\d{3})+)(?:,\d+)?$/.test(value) &&  parseFloat(valor) > 0;
}, "El monto a pagar debe ser superior a 0,00");


jQuery.validator.addMethod("telefono", function(value, element) {
	return this.optional(element) || /^\(\d{4}\) \d{3} \d{4}$/.test(value);
}, "Formato inv\u00e1lido");


jQuery.validator.addMethod("palabras", function(value, element) {
	return this.optional(element) || $.trim(value).split(" ").length>1;
}, "Formato inv\u00e1lido");


jQuery.validator.addMethod("alphaNumericSpace", function(value, element) {
	return this.optional(element) || /^[0-9a-zA-Z.\u00D1\u00C1\u00C9\u00CD\u00D3\u00DA\u00f1\u00E1\u00E9\u00ED\u00F3\u00FA ]*$/.test(value);
}, "Formato inv\u00e1lido");


// Valida fecha en formato Australiano
jQuery.validator.addMethod("dateAU", function(value, element) {
	if(this.optional(element)) return true;
	
	var regex = /^(\d{2})-(\d{2})-(\d{4})$/;
	if(!regex.test(value)) return false;
	var d = new Date(value.replace(regex, '$2/$1/$3'));
	return ( parseInt(RegExp.$2, 10) == (1+d.getMonth()) ) && 
				(parseInt(RegExp.$1, 10) == d.getDate()) && 
				(parseInt(RegExp.$3, 10) == d.getFullYear() );
}, "Formato de fecha inv\u00e1lido");

jQuery.validator.addMethod("fechaMayorIgualQue", function(value, element, params) {
	var mes1 = $(element).prev('select');
	var dia1 = mes1.prev('select');
	
	var t1 = new Date(mes1.val()+'/'+dia1.val()+'/'+value);
	
	var ano2 = $(params);
	var mes2 = ano2.prev('select');
	var dia2 = mes2.prev('select');
	
	var t2 = new Date(mes2.val()+'/'+dia2.val()+'/'+ano2.val());
	
	return t1.getTime() >= t2.getTime();
}, "Formato de fecha inv\u00e1lido");

jQuery.validator.addMethod("mesAnioMayorIgualQue", function(value, element, params) {
	var mes1 = $(element).prev('select');
	
	var t1 = new Date(mes1.val()+'/01/'+value);
	
	var ano2 = $(params);
	var mes2 = ano2.prev('select');
	
	var t2 = new Date(mes2.val()+'/01/'+ano2.val());
	
	return t1.getTime() >= t2.getTime();
}, "Formato de fecha inv\u00e1lido");

jQuery.validator.addMethod("fechaMenorIgualQueFijo", function(value, element, params) {
	var mes1 = $(element).prev('select');
	var dia1 = mes1.prev('select');
	
	var t1 = new Date(mes1.val()+'/'+dia1.val()+'/'+value);
	
	var t2 = new Date(params);
	
	return t1.getTime() <= t2.getTime();
}, "Formato de fecha inv\u00e1lido");


jQuery.validator.addMethod("fechaMayorIgualQueFijo", function(value, element, params) {
	var mes1 = $(element).prev('select');
	var dia1 = mes1.prev('select');
	
	var t1 = new Date(mes1.val()+'/'+dia1.val()+'/'+value);
	
	var t2 = new Date(params);
	
	return t1.getTime() >= t2.getTime();
}, "Formato de fecha inv\u00e1lido");


jQuery.validator.addMethod("mesAnioMenorIgualQueFijo", function(value, element, params) {
	var mes1 = $(element).prev('select');
	
	var t1 = new Date(mes1.val()+'/01/'+value);
	
	var t2 = new Date(params);
	
	return t1.getTime() <= t2.getTime();
}, "Formato de fecha inv\u00e1lido");


function hasSequence(needle){
	needle = needle.toLowerCase();

	var secuencias = [
		'01234567890',
		'abcdefghijklmnñopqrstuvwxyz',
		'09876543210',
		'zyxwvutsrqpoñnmlkjihgfedcba'
	];
	
	var len = 4;

	for(j=0;j<secuencias.length;j++){
		for(i=0;i<secuencias[j].length-len;i++){
		   x = secuencias[j].substring(i,i+len);
		   
		   if(needle.indexOf(x)>=0){
			   return true;
		   }
		}
	}
	
	return false;
}

jQuery.validator.addMethod("contrasena", function(value, element) {

	var repeticiones = /(.)\1{3,}/im
	var permitidos = /^[a-zA-Z0-9 \!\"\#\$\%\&\/\(\)\=\?\¡]*$/im	
	var numeros = /[0-9]+/im
	var letras = /[a-zA-Z]+/im
	
	var resultado = !hasSequence(value);
	resultado &= !repeticiones.test(value);
	resultado &= permitidos.test(value);
	resultado &= numeros.test(value);
	resultado &= letras.test(value);
	
	return this.optional(element) || resultado;
}, "No se aceptan secuencias ni repeticiones. Introduzca s\u00F3lo caracteres alfanum\u00E9ricos y los siguientes especiales: ! @ . $ * ^ { } + -");

jQuery.validator.addMethod("usuario", function(value, element) {
	var repeticiones = /(.)\1{3,}/im
	var permitidos = /^[a-zA-Z0-9]*$/im	
	var primerCaracter = /^[a-zA-Z]/im
	var letras = /[a-zA-Z]+/im
	var numeros = /[0-9]+/im
	
	var resultado = !hasSequence(value);
	resultado &= !repeticiones.test(value);
	resultado &= permitidos.test(value);
	resultado &= primerCaracter.test(value);
	resultado &= letras.test(value);
	resultado &= numeros.test(value);
	
	return this.optional(element) || resultado;
}, "Estimado cliente, El primer caracter debe ser alfabético. No se aceptan secuencias ni repeticiones. Introduzca s\u00F3lo caracteres alfanum\u00E9ricos.");


// Esta validación es un poco más flexible que la anterior
// Se creó para permitir login de usuario del ib anterior
// Luego de que se hayan migrado todos los usuarios. Se debe colocar la
// anterior validación en la página de login
jQuery.validator.addMethod("usuario_legacy", function(value, element) {
	var permitidos = /^[a-zA-Z0-9\!\"\#\$\%\&\/\(\)\=\?\¡]*$/im
	
	resultado = permitidos.test(value);
	
	return this.optional(element) || resultado;
}, "Estimado cliente, El primer caracter debe ser alfabético. No se aceptan secuencias ni repeticiones. Introduzca s\u00F3lo caracteres alfanum\u00E9ricos.");

jQuery.validator.addMethod("rangeVE", function(value, element) {
	value = value.replace(/\./g,'').replace(/,/g,'.');
	p0 = Number(param[0].replace(/\./g,'').replace(/,/g,'.'));
	p1 = Number(param[1].replace(/\./g,'').replace(/,/g,'.'));
	return this.optional(element) || ( value >= p0 && value <= p1 );
}, "Rango inv\u00e1lido");

jQuery.validator.addMethod("auDateGreaterThan", function(value, element, param) {
	// bind to the blur event of the target in order to revalidate whenever the target field is updated
	// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
	var target = $(param).unbind(".validate-GreaterThan").bind("blur.validate-GreaterThan", function() {
		$(element).valid();
	});
	
	if(value != '' && target.val() != ''){
		var regex = /^(\d{2})-(\d{2})-(\d{4})$/;
		var d1 = new Date(value.replace(regex, '$2/$1/$3'));
		var d2 = new Date(target.val().replace(regex, '$2/$1/$3'));
		
		return d1.getTime() > d2.getTime();
	} else {
		return true;
	}
}, "Fecha fuera de rango");



jQuery.validator.addMethod("auDateGreaterThanEq", function(value, element, param) {
	// bind to the blur event of the target in order to revalidate whenever the target field is updated
	// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
	var target = $(param).unbind(".validate-GreaterThanEq").bind("blur.validate-GreaterThanEq", function() {
		$(element).valid();
	});
	
	if(value != '' && target.val() != ''){
		var regex = /^(\d{2})-(\d{2})-(\d{4})$/;
		var d1 = new Date(value.replace(regex, '$2/$1/$3'));
		var d2 = new Date(target.val().replace(regex, '$2/$1/$3'));
		
		return d1.getTime() >= d2.getTime();
	} else {
		return true;
	}
}, "Fecha fuera de rango");


jQuery.validator.addMethod("inactivaError", function(value, element) {
	return false;
}, "Valor inválido");

jQuery.validator.addMethod("controladaError", function(value, element) {
	return false;
}, "Valor inválido");

jQuery.validator.addMethod("sello", function(value, element) {
	return this.optional(element) || /^[\w\d ]+$/i.test(value);
}, "S\u00F3lo letras y n\u00fameros o espacios");

jQuery.validator.addMethod("alfanumerico", function(value, element) {
	return this.optional(element) || /^[\w\d]+$/i.test(value);
}, "S\u00F3lo letras y n\u00fameros");

jQuery.validator.addMethod("alfanumericoEspacio", function(value, element) {
	return this.optional(element) || /^[\w\d ]+$/i.test(value);
}, "S\u00F3lo letras y n\u00fameros");

jQuery.validator.addMethod("alfabeticoEspacio", function(value, element) {
	return this.optional(element) || /^[a-zA-Z ]+$/i.test(value);
}, "S\u00F3lo letras y n\u00fameros");

jQuery.validator.addMethod("celular", function(value, element) {
	return this.optional(element) || /^\d{7}$/.test(value);
}, "S\u00F3lo letras y n\u00fameros");


jQuery.validator.addMethod("montoLimite", function(value, element) {
	return this.optional(element) || value=="Sin Limite" || /^-?(?:\d+|\d{1,3}(?:\.\d{3})+)(?:,\d+)?$/.test(value);
}, "Formato de monto inv\u00e1lido");


jQuery.validator.addMethod('maxMontoLimite', function( value, element, param ) {
	var valor = value.replace(/\./g,'').replace(/,/g,'.');	
	var parametro = param.replace(/\./g,'').replace(/,/g,'.');
	
	return this.optional(element) || ( parseFloat(valor) <= parseFloat(parametro) );
}, "Monto superado");


jQuery.validator.addMethod('iguala', function( value, element, param ) {

	return this.optional(element) || ( param.toLowerCase() == value.toLowerCase() );
}, "Monto superado");

jQuery.validator.addMethod('inarray', function( value, element, param ) {
	return this.optional(element) || ( 0<=$.inArray(value.substring(0,4),param) );
}, "Estimado Cliente, el número de cuenta es inválido. Por favor verifique e intente de nuevo.");


jQuery.validator.addMethod('rif', function( value, element, param ) {
	if(value.length != 9) return true;
	
	var valido = true;
	
	var tipo_cedula = $(param).val();
	
	var x;
	
	switch(tipo_cedula){
		case 'V':
			x = 1;
			break;
		case 'E':
			x = 2;
			break;
		case 'J':
			x = 3;
			break;
		case 'P':
			x = 4;
			break;
		case 'G':
			x = 5;
			break;
		case 'M':
			x = 6;
			break;
		case 'S':
			x = 7;
			break;
		default:
			valido = false;
	}
	
	
	var suma;	

	return this.optional(element) || ( valido );
}, "RIF Inválido");


// http://docs.jquery.com/Plugins/Validation/Methods/equalTo
jQuery.validator.addMethod("notEqualTo", function(value, element, param) {
	// bind to the blur event of the target in order to revalidate whenever the target field is updated
	// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
	var target = $(param).unbind(".validate-notEqualTo").bind("blur.validate-notEqualTo", function() {
		$(element).valid();
	});
	return value != target.val();
}, "Estimado cliente, la cuenta origen no puede ser igual a la cuenta destino");

//validar montos b{squeda avanzada:
jQuery.validator.addMethod("mayorIgual", function(value, element, param) {
	// bind to the blur event of the target in order to revalidate whenever the target field is updated
	// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
	var target = $(param).unbind(".validate-mayorIgual").bind("blur.validate-mayorIgual", function() {
		$(element).valid();
	});	
	var valor = value.replace(/\./g,'').replace(/,/g,'.');	
	var parametro = (target.val()).replace(/\./g,'').replace(/,/g,'.');
	if(target.val()!="" && value!=""){
		return parseFloat(valor) >= parseFloat(parametro);
	}
	
	return true;
}, "Estimado cliente, el monto desde no puede ser superior al monto hasta");

function valMontoMaximo(value, element, param) {
	// bind to the blur event of the target in order to revalidate whenever the target field is updated
	// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
	if($(param).size()==0) return true;
	var x = Math.floor((Math.random()*1000000)+1);
	
	var target = $(param).unbind(".validate-montoMaximo"+x).bind("blur.validate-montoMaximo"+x, function() {
		$(element).valid();
	});
	
	var valor = value.replace(/\./g,'').replace(/,/g,'.');	
	var parametro = (target.val()).replace(/\./g,'').replace(/,/g,'.');
	if(target.val()!="" && value!=""){
		return parseFloat(valor) <= parseFloat(parametro);
	}
	
	return true;
}

jQuery.validator.addMethod("montoMaximo", valMontoMaximo, "Estimado cliente el monto indicado no puede ser superior");
jQuery.validator.addMethod("montoMaximo2", valMontoMaximo, "Estimado cliente el monto indicado no puede ser superior");
jQuery.validator.addMethod("montoMaximo3", valMontoMaximo, "Estimado cliente el monto indicado no puede ser superior");
jQuery.validator.addMethod("montoMaximo4", valMontoMaximo, "Estimado cliente el monto indicado no puede ser superior");
jQuery.validator.addMethod("montoMaximo5", valMontoMaximo, "Estimado cliente el monto indicado no puede ser superior");
jQuery.validator.addMethod("montoMaximo6", valMontoMaximo, "Estimado cliente el monto indicado no puede ser superior");


jQuery.validator.addMethod("montoMinimo", function(value, element, param) {
	// bind to the blur event of the target in order to revalidate whenever the target field is updated
	// TODO find a way to bind the event just once, avoiding the unbind-rebind overhead
	if($(param).size()==0) return true;
	
	var target = $(param).unbind(".validate-montoMinimo").bind("blur.validate-montoMinimo", function() {
		$(element).valid();
	});	
	var valor = value.replace(/\./g,'').replace(/,/g,'.');	
	var parametro = (target.val()).replace(/\./g,'').replace(/,/g,'.');
	if(target.val()!="" && value!=""){
		return parseFloat(valor) >= parseFloat(parametro);
	}
	
	return true;
}, "Estimado cliente el monto indicado no puede ser inferior");

// FIN Adverweb


jQuery.validator.addMethod("letterswithbasicpunc", function(value, element) {
	return this.optional(element) || /^[a-z-.,()'\"\s]+$/i.test(value);
}, "Letters or punctuation only please");

jQuery.validator.addMethod("alphanumeric", function(value, element) {
	return this.optional(element) || /^\w+$/i.test(value);
}, "Letters, numbers, spaces or underscores only please");

jQuery.validator.addMethod("lettersonly", function(value, element) {
	return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

jQuery.validator.addMethod("nowhitespace", function(value, element) {
	return this.optional(element) || /^\S+$/i.test(value);
}, "No white space please");

jQuery.validator.addMethod("ziprange", function(value, element) {
	return this.optional(element) || /^90[2-5]\d\{2}-\d{4}$/.test(value);
}, "Your ZIP-code must be in the range 902xx-xxxx to 905-xx-xxxx");

jQuery.validator.addMethod("integer", function(value, element) {
	return this.optional(element) || /^-?\d+$/.test(value);
}, "A positive or negative non-decimal number please");

