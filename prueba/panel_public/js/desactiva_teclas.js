$(document).keypress(function(event) {
    //var textBox = getObject('txtChar'));
    var charCode = (event.which) ? event.which : event.keyCode
    //alert(String.fromCharCode(charCode));
    //if (charCode == 8) alert("backspace");
    //if (charCode == 9) alert("tab");
    //if (charCode == 13) alert("enter");
    //if (charCode == 16) alert("shift");
    //if (charCode == 17) alert("ctrl"); //CTRL
    //if (charCode == 18) alert("alt");
    //if (charCode == 19) alert("pause/break");
    //if (charCode == 20) alert("caps lock");
    //if (charCode == 27) alert("escape");
    //if (charCode == 33) alert("page up");
    //if (charCode == 34) alert("page down");
    //if (charCode == 35) alert("end");
    //if (charCode == 36) alert("home");
    //if (charCode == 37) alert("left arrow");
    //if (charCode == 38) alert("up arrow");
    //if (charCode == 39) alert("right arrow");
    //if (charCode == 40) alert("down arrow");
    //if (charCode == 45) alert("insert");
    //if (charCode == 46) alert("delete");
    //if (charCode == 91) alert("left window");
    //if (charCode == 92) alert("right window");
    //if (charCode == 93) alert("select key");
    //if (charCode == 96) alert("numpad 0");
    //if (charCode == 97) alert("numpad 1");
    //if (charCode == 98) alert("numpad 2");
    //if (charCode == 99) alert("numpad 3");
    //if (charCode == 100) alert("numpad 4");
    //if (charCode == 101) alert("numpad 5");
    //if (charCode == 102) alert("numpad 6");
    //if (charCode == 103) alert("numpad 7");
    //if (charCode == 104) alert("numpad 8");
    //if (charCode == 105) alert("numpad 9");
    //if (charCode == 106) alert("multiply");
    //if (charCode == 107) alert("add");
    //if (charCode == 109) alert("subtract");
    //if (charCode == 110) alert("decimal point");
    //if (charCode == 111) alert("divide");
    //if (charCode == 112) alert("F1");
    //if (charCode == 113) alert("F2"); 
    //if (charCode == 114) alert("F3"); 
    //if (charCode == 115) alert("F4"); 
    //if (charCode == 116) alert("F5"); 
    //if (charCode == 117) alert("F6");
    //if (charCode == 118) alert("F7"); 
    //if (charCode == 119) alert("F8");
    //if (charCode == 120) alert("F9"); 
    if (charCode == 121) return false; //F10
    //if (charCode == 122) alert("F11");
    if (charCode == 123) return false; //F12
//if (charCode == 144) alert("num lock"); 
//if (charCode == 145) alert("scroll lock"); 
//if (charCode == 186) alert(");");
//if (charCode == 187) alert("="); 
//if (charCode == 188) alert(","); 
//if (charCode == 189) alert("-");
//if (charCode == 190) alert(".");
//if (charCode == 191) alert("/");
//if (charCode == 192) alert("`");
//if (charCode == 219) alert("[");
//if (charCode == 220) alert("\\");
//if (charCode == 221) alert("]"); 
//if (charCode == 222) alert("'"); 
//
//return false;
});

document.oncontextmenu = function() {
    return false
}
function right(e) {
    var msg = "Prohibido usar Click Derecho !!! ";
    if (navigator.appName == 'Netscape' && e.which == 3) {
//        alert(msg); //- Si no quieres asustar a tu usuario entonces quita esta linea...
        return false;
    }
    else if (navigator.appName == 'Microsoft Internet Explorer' && event.button==2) {
//        alert(msg); //- Si no quieres asustar al usuario que utiliza IE,  entonces quita esta linea...
        //- Aunque realmente se lo merezca...
        return false;
    }
    return true;
}
document.onmousedown = right;