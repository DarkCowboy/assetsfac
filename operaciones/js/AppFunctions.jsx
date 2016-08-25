

/****************************************
Funciones de validacion 
de campos del formulario
*****************************************/

var Numero_Decimales = 2;

function getDepreciacion_0(DeprecAcumuladaAct, DeprecAcumuladaAnt, ObjCamp)
{
	Resultado =  parseFloat(DeprecAcumuladaAct) - parseFloat(DeprecAcumuladaAnt);	
	ObjCamp.attr('value',redondeaNumero_Retorna(Resultado));
}

function setValue(ObjWithValue, ObjToAssign){
    var ValorToAssign = ObjWithValue.attr('value');	
	ObjToAssign.attr('value',redondeaNumero_Retorna(parseFloat(ValorToAssign)));    
}

function restaDosValores_Asigna(ObjNumero2, ObjNumero1, ObjAsignar)
{    
    Resultado =  parseFloat(ObjNumero2.attr('value')) - parseFloat(ObjNumero1.attr('value'));	
	ObjAsignar.attr('value',redondeaNumero_Retorna(parseFloat(Resultado)));
}

function restaDosValores_Retorna(ValorNumerico1, ValorNumero2)
{
    Resultado = parseFloat(ValorNumerico1) - parseFloat(ValorNumero2);    
    return redondeaNumero_Retorna(parseFloat(Resultado));
}

function divideDosValores_Retorna(ValorNumerico1, ValorNumerico2)
{
    //Validamos los espacios en blanco
    if(ValorNumerico1 == ''){ ValorNumerico1 = 0; }
    if(ValorNumerico2 == ''){ ValorNumerico2 = 0; }     
    
    //Si el dividendo es cero el resultado es cero
    if(ValorNumerico2 == 0)
    {
        Resultado = 0;
    }
    else
    {
        Resultado = parseFloat(ValorNumerico1) / parseFloat(ValorNumerico2);        
    }
        
    return redondeaNumero_Retorna(parseFloat(Resultado));
}

function sumaDosValores_Retorna(ValorNumerico1, ValorNumero2)
{
    Resultado = parseFloat(ValorNumerico1)+ parseFloat(ValorNumero2);    
    return redondeaNumero_Retorna(parseFloat(Resultado));
}

function validarCampo(ObjCampo)
{   
    if (ObjCampo.attr('value')=='0'){	   
	  ObjCampo.attr('value','');
	}	  	
}

function validarCampoVacio(ObjCampo)
{       
    if (ObjCampo.attr('value')==''){
	  ObjCampo.attr('value','0');
	}		      
}

function roundNumber(num, dec) {
	result = Math.round(num*Math.pow(10,dec))/Math.pow(10,dec);
	return result;
}

function formatoNumero(campo){
	$(campo).bind('keypress',function(e){
		if ((e.which < 45 || e.which > 57) && e.which != 8){
			return false;
		}
	}); 	
}

function sumaValores(ArrayNombres)
{
    VarSuma = parseFloat(0);  
    
    for(Index = 0; Index < ArrayNombres.length; Index++)
    {
        VarNombre = '#'+ArrayNombres[Index];        
        VarValue  = parseFloat($(VarNombre).attr('value'))                
        VarSuma = VarSuma + VarValue;
    }    
    return redondeaNumero_Retorna(VarSuma);
}

function restaValores(ArrayNombres)
{
    VarResta = parseFloat(0);  
    
    for(Index = 0; Index < ArrayNombres.length; Index++)
    {
        VarNombre = '#'+ArrayNombres[Index];        
        VarValue  = parseFloat($(VarNombre).attr('value'))                
        if(Index==0)
        {
            VarResta = VarValue;  
        }
        else
        {
            VarResta = VarResta - VarValue;               
        }
    }    
    return redondeaNumero_Retorna(VarResta);    
}

function redondeaNumero_Retorna(Numero_A_Redondear)
{    
    return roundNumber(Numero_A_Redondear,Numero_Decimales);
}


/****************************************
Funcion que detecta version 
de Navegador,Sistema Operativo
****************************************/ 

var BrowserDetect = {
	init: function () {
		this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
		this.version = this.searchVersion(navigator.userAgent)
			|| this.searchVersion(navigator.appVersion)
			|| "an unknown version";
		this.OS = this.searchString(this.dataOS) || "an unknown OS";
	},
	searchString: function (data) {
		for (var i=0;i<data.length;i++)	{
			var dataString = data[i].string;
			var dataProp = data[i].prop;
			this.versionSearchString = data[i].versionSearch || data[i].identity;
			if (dataString) {
				if (dataString.indexOf(data[i].subString) != -1)
					return data[i].identity;
			}
			else if (dataProp)
				return data[i].identity;
		}
	},
	searchVersion: function (dataString) {
		var index = dataString.indexOf(this.versionSearchString);
		if (index == -1) return;
		return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
	},
	dataBrowser: [
		{
			string: navigator.userAgent,
			subString: "Chrome",
			identity: "Chrome"
		},
		{ 	string: navigator.userAgent,
			subString: "OmniWeb",
			versionSearch: "OmniWeb/",
			identity: "OmniWeb"
		},
		{
			string: navigator.vendor,
			subString: "Apple",
			identity: "Safari",
			versionSearch: "Version"
		},
		{
			prop: window.opera,
			identity: "Opera"
		},
		{
			string: navigator.vendor,
			subString: "iCab",
			identity: "iCab"
		},
		{
			string: navigator.vendor,
			subString: "KDE",
			identity: "Konqueror"
		},
		{
			string: navigator.userAgent,
			subString: "Firefox",
			identity: "Firefox"
		},
		{
			string: navigator.vendor,
			subString: "Camino",
			identity: "Camino"
		},
		{		// for newer Netscapes (6+)
			string: navigator.userAgent,
			subString: "Netscape",
			identity: "Netscape"
		},
		{
			string: navigator.userAgent,
			subString: "MSIE",
			identity: "Explorer",
			versionSearch: "MSIE"
		},
		{
			string: navigator.userAgent,
			subString: "Gecko",
			identity: "Mozilla",
			versionSearch: "rv"
		},
		{ 		// for older Netscapes (4-)
			string: navigator.userAgent,
			subString: "Mozilla",
			identity: "Netscape",
			versionSearch: "Mozilla"
		}
	],
	dataOS : [
		{
			string: navigator.platform,
			subString: "Win",
			identity: "Windows"
		},
		{
			string: navigator.platform,
			subString: "Mac",
			identity: "Mac"
		},
		{
			   string: navigator.userAgent,
			   subString: "iPhone",
			   identity: "iPhone/iPod"
	    },
		{
			string: navigator.platform,
			subString: "Linux",
			identity: "Linux"
		}
	]

};
BrowserDetect.init();
