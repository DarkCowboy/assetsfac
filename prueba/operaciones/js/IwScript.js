
//Funcion para la Impresion de las Fichas 

function Open_Windows(UrlWindows, WindowKey, WindowWidth, WindowHeight)
{        
        var WindowWidthValue = '';
        var WindowHeightValue = '';

        if(UrlWindows == "") { UrlWindows = 'WindowList.aspx'; }
        if(WindowKey == "") { WindowKey = 'WindowList'; }
        if(WindowWidth == "") { WindowWidthValue = 'width=650'; } else { WindowWidthValue = 'width=' + WindowWidth; }        
        if(WindowHeight == "") { WindowHeightValue = 'height=506'; } else { WindowHeightValue = 'height=' + WindowHeight; }
        
        var Parameters = WindowWidthValue + ', ' + WindowHeightValue + ', ' + 'menubar=no, resizable=yes,top=150,left=290';                
        window.open(UrlWindows, WindowKey, Parameters);        
}

function Open_Windows_Scroll(UrlWindows, WindowKey, WindowWidth, WindowHeight)
{        
        var WindowWidthValue = '';
        var WindowHeightValue = '';

        if(UrlWindows == "") { UrlWindows = 'WindowList.aspx'; }
        if(WindowKey == "") { WindowKey = 'WindowList'; }
        if(WindowWidth == "") { WindowWidthValue = 'width=650'; } else { WindowWidthValue = 'width=' + WindowWidth; }        
        if(WindowHeight == "") { WindowHeightValue = 'height=506'; } else { WindowHeightValue = 'height=' + WindowHeight; }
        
        var Parameters = WindowWidthValue + ', ' + WindowHeightValue + ', ' + 'menubar=yes, resizable=no,top=150,left=290';                
        window.open(UrlWindows, WindowKey, Parameters);        
}

//Funcion para limpiar la pantalla de Usuario

function NewUser(TxtNombres, TxtApellidos, TxtUserName, TxtEmil, TxtPassword, TxtConfirmPassword, ChkActive, DropRole)
{
    TxtNombres.value = TxtApellidos.value = TxtUserName.value =  TxtEmil.value = TxtPassword.value  = TxtConfirmPassword.value =   "";    
    ChkActive.checked = true;             
    DropRole.selectedIndex = 0;
}

function NewCliente(TxtNombres, TxtApellidos, TxtUserName, TxtEmil, TxtPassword, TxtConfirmPassword, ChkActive)
{
    TxtNombres.value = TxtApellidos.value = TxtUserName.value =  TxtEmil.value = TxtPassword.value  = TxtConfirmPassword.value =   "";    
    ChkActive.checked = true;             
    //DropRole.selectedIndex = 0;
}

function ValidarBorrar(TxtNombres, TxtApellidos, TxtUserName, TxtEmil, TxtPassword, TxtConfirmPassword, ChkActive, DropRole)
{
    
    if(TxtNombres.value != '' || TxtApellidos.value != '' ||  TxtUserName.value != '' || TxtEmil.value != '' || DropRole.selectedIndex!= 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}

function ValidarDatosUSuario(TxtNombres, TxtApellidos, TxtUserName, TxtEmil, TxtPassword, TxtConfirmPassword, ChkActive, DropRole)
{
    
    if(TxtNombres.value == '')
    {
        TxtNombres.focus();        
        radalert('El campo Nombres es solicitado.', 330, 100,'Error');
        return false;
    }
    else if(TxtApellidos.value == '')
    {
        TxtApellidos.focus();        
        radalert('El campo Apellidos es solicitado.', 330, 100,'Error');
    }
    else if(TxtUserName.value == '')
    {
        TxtUserName.focus();
        radalert('El campo NombreUsuario es solicitado.', 330, 100,'Error');        
    }
    else if(TxtEmil.value == '')
    {
        TxtEmil.focus();        
        radalert('El campo Email es solicitado.', 330, 100,'Error');        
    }
    else if(DropRole.selectedIndex == 0)
    {
        alert(DropRole.selectedIndex);
        DropRole.focus();        
        radalert('Debe selecionar un Role.', 330, 100,'Error');        
    }   
    else
    {
        return true;
    }
}

function checkAll(ObjTextControlador) {
    
    var fldName = 'CheckBoxEntitys'; 
	var f = document.aspnetForm;
	var Elementos = document.getElementsByName(fldName);
	var ElementosProcesados  = "";
	//ObjTextControlador.value = "";
	
	var ArrayOfElements = new Array();
		
	for(i = 0; i < Elementos.length; i++)
	{
	    var Obj = Elementos[i];	    
	    Obj.checked = true;
	    if((i+ 1) == Elementos.length)
	    {
	        ElementosProcesados += Obj.value;	        
	    }
	    else
	    {
	        ElementosProcesados += Obj.value + ',';
	    }
	    
	    ArrayOfElements[i] = Obj.value;
	}
	ObjTextControlador.value = ElementosProcesados;	
	return ArrayOfElements;
}

function desCheckAll(ObjTextControlador){

    var fldName = 'CheckBoxEntitys'; 
	var f = document.aspnetForm;
	var Elementos = document.getElementsByName(fldName);
	var ElementosProcesados = "";
	
	for(i = 0; i < Elementos.length; i++)
	{
	    var Obj = Elementos[i];	    
	    Obj.checked = false;	    
	}
	ObjTextControlador.value = ElementosProcesados;	
}

function SetArrayInTextBox(ArrayOfElements,ObjTextControlador)
{   
    var ElementosProcesados  = "";    
    for(i = 0; i < ArrayOfElements.length; i++)
	{
	    var Obj = ArrayOfElements[i];  
	   
	    if((i+ 1) == ArrayOfElements.length)
	    {
	        ElementosProcesados += Obj;	        
	    }
	    else
	    {
	        ElementosProcesados += Obj + ',';
	    }
	}
	ObjTextControlador.value = ElementosProcesados;		
}

/*************************************/
/***   Funciones Pantalla de Role   ***/
/*************************************/
function NewRole(TxtNombre, TxtDescripcion)
{
    TxtNombre.value = TxtDescripcion.value = "";    
}

function ValidarBorrarRole(TxtNombre, TxtDescripcion)
{    
    if(TxtNombre.value != '')
    {
        return true;
    }
    else
    {
        return false;
    }
}

function ValidarDatosRole(TxtNombre, TxtDescripcion)
{    
    if(TxtNombre.value == '')
    {
        TxtNombre.focus();
        alert('El campo Nombre es solicitado.');        
        return false;
    }
    else
    {
        return true;
    }
}

function DispararEvento(LinkButton)
{    
    if(BrowserDetect.browser=="Explorer" || BrowserDetect.browser=="Firefox")
    {
        LinkButton.click();                    
    }
    else if(BrowserDetect.browser=="Chrome")
    {
        LinkButton.click();                         
    }
    else
    {
        LinkButton.click();
    }    
}


// JScript File

function getElementsByClassName(oElm, strTagName, strClassName){
	var arrElements = (strTagName == "*" && oElm.all)? oElm.all : oElm.getElementsByTagName(strTagName);
	var arrReturnElements = new Array();
	strClassName = strClassName.replace(/\-/g, "\\-");
	var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
	var oElement;
	for(var i=0; i<arrElements.length; i++){
		oElement = arrElements[i];		
		if(oRegExp.test(oElement.className)){
			arrReturnElements.push(oElement);
		}	
	}
	return (arrReturnElements)
}

/*

Below are the functions that let me add and remove classes, which I'm using to get the hover effect.  "hovering" is the class that is added or removed, and you can see in the style sheet how .hovering is defined.


*/

function addClassName(oElm, strClassName){
	var strCurrentClass = oElm.className;
	if(!new RegExp(strClassName, "i").test(strCurrentClass)){
		oElm.className = strCurrentClass + ((strCurrentClass.length > 0)? " " : "") + strClassName;
	}
}


function removeClassName(oElm, strClassName){
	var oClassToRemove = new RegExp((strClassName + "\s?"), "i");
	oElm.className = oElm.className.replace(oClassToRemove, "").replace(/^\s?|\s?$/g, "");
}


var Developer = {
    init: function () {
        this.Name = "Luis";
        this.LastName = "Blanco";
    }
}

Developer.init();

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
