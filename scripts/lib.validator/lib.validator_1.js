/* 
*	ARCHIVO: lib.validator.js
*	DESCRIPCIÓN: Librería para validar campos de formularios html
*	AUTOR: Jesus A Gil P tw:@pradlig
*	CREADO: 24/09/2012
*	ULTIMA MODIFICACION: 25/09/2012
*/

/*
	css requerido

	campo solo letras
	*onkeypress="return permite(event, 'soloLetras')"
	ejemplo
	<input name="nom_ape" type="text" value="" onkeypress="return permite(event, 'soloLetras')"/>
	
	campos requeridos:
	*data-required="true"
	ejemplo = <input name="nom_ape" type="text" value="" class="hoila" onkeypress="return permite(event, 'soloLetras')" data-required="true" />
	
	--> campos personalizados tipo (mail, url, fecha, password)
	
	para password declarar un primer input con id="password1"
	
	campos requeridos tipo mail:
	*data-required="true,mail"
	ejemplo = <input name="nom_ape" type="text" value="" class="hoila" onkeypress="return permite(event, 'soloLetras')" data-required="true,mail" />
	
	campos requeridos tipo url ejemplo (http://fu.lanito.com) (http|https|ftp|ftps):
	*data-required="true,url"
	ejemplo = <input name="nom_ape" type="text" value="" class="hoila" onkeypress="return permite(event, 'soloLetras')" data-required="true,url" />

	campos no requeridos tipo mail:
	*data-required="false,mail"
	ejemplo = <input name="nom_ape" type="text" value="" class="hoila" onkeypress="return permite(event, 'soloLetras')" data-required="false,mail" />
	
	campos no requeridos tipo url:
	*data-required="false,url"
	ejemplo = <input name="nom_ape" type="text" value="" class="hoila" onkeypress="return permite(event, 'soloLetras')" data-required="false,url" />
	
	para los radios o check solo colocar un data-required="true" a alguno de los elementos

*/

function mostrarError() {
	$('.msgErrorValidator').stop();
	$('.msgErrorValidator').css('display','block');
	$('.msgErrorValidator').animate({
			'display':'block',
			'opacity': '1'
		},600,function(){
				$(this).animate({
					'opacity': '0'
				},5000);
			});
}

function permite(elEvento, permitidos) {
	$('*').removeClass('error');
	//ocultarError();
	// Variables que definen los caracteres permitidos
	var numeros = "0123456789";
	var fecha = numeros + "/";
	var numpunto = "0123456789.";
	var telefono = "0123456789+-/(). ";
	var soloLetras = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚüÜöÖ";
	var dir_mail = "abcdefghijklmnopqrstuvwxyz.-_0123456789@";
	var numeros_caracteres = numeros + soloLetras;
	var caracteresEspeciales = numeros_caracteres + " .,;-_¡!\"'¿?#/()";
	var url = "abcdefghijklmnopqrstuvwxyz.-_://";
	var teclas_especiales = [8, 46, 37, 39,  9, 35 , 36];
	// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha, 9 = tabular, 18 = alt, 36= inicio , 35= fin
	
	
	// Seleccionar los caracteres a partir del parámetro de la función
	switch(permitidos) {
	case 'num':
		permitidos = numeros;
		break;
	case 'numpunto':
		permitidos = numpunto;
		break;
	case 'telefono':
		permitidos = telefono;
		break;
	case 'soloLetras':
		permitidos = soloLetras;
		break;
	case 'num_car':
		permitidos = numeros_caracteres;
		break;
	case 'dir_mail':
		permitidos = dir_mail;
		break;
	case 'caracteresEspeciales':
		permitidos = caracteresEspeciales;
		break;
	case 'url':
		permitidos = url;
		break;
	case 'fecha':
		permitidos = fecha;
		break;
	}
	
	// Obtener la tecla pulsada 
	var evento = elEvento || window.event;
	var codigoCaracter = evento.charCode;
	//console.log(evento.charCode);
	var caracter = String.fromCharCode(codigoCaracter);
	
	// Comprobar si la tecla pulsada es alguna de las teclas especiales
	var tecla_especial = false;
	for(var i in teclas_especiales) {
		if(evento.keyCode == teclas_especiales[i]) {
			tecla_especial = true;
			break;
		}
	}
	
	// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
	// o si es una tecla especial
	return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

function validator(formulario){
	//mostrarError();
	var formulario = '#'+$(formulario).attr('id');
	//config(formulario);
	
	//mensajes
	var msgCamposRequeridos = "Todos los campos son requeridos";
	var msgCorreoValido = "Ingrese un correo válido";
	var msgUrlValida = "Ingrese una url válida";
	var msgFechaValida = "Ingrese una fecha válida (dd/mm/aa)";
	var msgPassword = "Su clave no es correcta";
	var msgCapcha = "Por favor ingresa el resultado correcto de la suma";
	//fin mensajes
	var error = 0;
	var required = null;
	//var hijos = $(formulario).children().not('label');
	var hijos = $(formulario + ' *');
	//console.debug (hijos);
	$(hijos).each(function(){
		//console.debug ($(this).attr('data-required'));
		var tagNambe = this.tagName.toLowerCase();
		var tipo = $(this).attr('type');
		var name = $(this).attr('name');
		var id = $(this).attr('id');
		var clase = $(this).attr('class');
		var val = $(this).val();
		var placeholder = $(this).attr('placeholder');
		required = $(this).attr('data-required');
		if(required!=null)
		{
			required = $(this).attr('data-required').split(",");
			var requerido = required[0];
			var valTipo = required[1];
			var idCampoPassword = required[2];
		}
			
		$(this).removeClass('error');
		$('.msgErrorValidator').css('display','none');
		$('.msgErrorValidator').html();
		
		if (requerido == 'true')
		{
			if((tipo == 'checkbox') || (tipo == 'radio'))
			{
				$.fn.getCheckboxValues = function(){
					var values = [];
					var i = 0;
					this.each(function(){
						values[i++] = $(this).val();
					});
					return values;
				} 
				
				var arr = $("input:checked").getCheckboxValues();
				//console.log(arr.length);
				
				if (arr.length < 1)
				{
					$(this).focus().addClass('error');
					mostrarError();
					$('.msgErrorValidator').html(msgCamposRequeridos);
					error = 1;
					return false;
				}
			}else
			{
				if ((val == '') && (placeholder == "" || placeholder != ""))
				{
					//$(this).focus().after("<span class='error'>*</span>");
					$(this).focus().addClass('error');
					mostrarError();
					$('.msgErrorValidator').html(msgCamposRequeridos);
					error = 1;
					return false;
				}
			}
			//return true;
		}

		var emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;
		if (valTipo=='mail')
		{
			console.debug($(this));
			if(!emailreg.test(val))
			{
				$(this).focus().addClass('error');
				mostrarError();
				$('.msgErrorValidator').html(msgCorreoValido);
				error = 1;
				return false;
			}
		}
			
		//var urlreg=/^(ht|f)tps?:\/\/\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i;
		var urlreg=/\w+([\.\-\w]+)?\.([a-z]{2,4}|travel)(:\d{2,5})?(\/.*)?$/i;
		if (valTipo=='url')
		{
			if(!urlreg.test(val))
			{
				$(this).focus().addClass('error');
				mostrarError();
				$('.msgErrorValidator').html(msgUrlValida);
				error = 1;
				return false;
			}
		}
		var fechareg = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/;
		if (valTipo=='fecha')
		{
			if(!fechareg.test(val))
			{
				$(this).focus().addClass('error');
				mostrarError();
				$('.msgErrorValidator').html(msgFechaValida);
				error = 1;
				return false;
			}
		}
		if (valTipo=='password')
		{
			if($('#'+idCampoPassword).val() != val)
			{
				$(this).focus().addClass('error');
				mostrarError();
				$('.msgErrorValidator').html(msgPassword);
				error = 1;
				return false;
			}
		}
		if (valTipo=='capcha')
		{
			if(val != 10)
			{
				$(this).focus().addClass('error');
				mostrarError();
				$('.msgErrorValidator').html(msgCapcha);
				error = 1;
				return false;
			}
		}
	});
	
	if( error == 1 )
	{
		return false;
	}else
	{
		return true;
	}
}