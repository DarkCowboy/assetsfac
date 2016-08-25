<?php

function debug($var, $stop = true) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($stop)
        exit;
}

function text_limit($text, $charlength, $pad = '[...]', $strict = false) {
    $text = strip_tags($text);
    if (mb_strlen($text) > $charlength) {
        $subex = mb_substr($text, 0, $charlength - mb_strlen($pad));

        if ($strict) {
            $charlength++;
            $result = $subex;
        } else {

            $exwords = explode(' ', $subex);
            $excut = - ( mb_strlen($exwords[count($exwords) - 1]) );
            if ($excut < 0) {
                $result = mb_substr($subex, 0, $excut);
            } else {
                $result = $subex;
            }
        }
        $result .= $pad;
    } else {
        $result = $text;
    }
    return $result;
}

function fecha($fecha) {
    $fecha = strtotime($fecha); // convierte la fecha de formato mm/dd/yyyy a marca de tiempo 
    $diasemana = date("w", $fecha); // optiene el nÃºmero del dia de la semana. El 0 es domingo 
    switch ($diasemana) {
        case "0":
            $diasemana = "Domingo";
            break;
        case "1":
            $diasemana = "Lunes";
            break;
        case "2":
            $diasemana = "Martes";
            break;
        case "3":
            $diasemana = "MiÃ©rcoles";
            break;
        case "4":
            $diasemana = "Jueves";
            break;
        case "5":
            $diasemana = "Viernes";
            break;
        case "6":
            $diasemana = "SÃ¡bado";
            break;
    }
    $dia = date("d", $fecha); // dÃ­a del mes en nÃºmero 
    $mes = date("m", $fecha); // nÃºmero del mes de 01 a 12 
    switch ($mes) {
        case "01":
            $mes = "Enero";
            break;
        case "02":
            $mes = "Febrero";
            break;
        case "03":
            $mes = "Marzo";
            break;
        case "04":
            $mes = "Abril";
            break;
        case "05":
            $mes = "Mayo";
            break;
        case "06":
            $mes = "Junio";
            break;
        case "07":
            $mes = "Julio";
            break;
        case "08":
            $mes = "Agosto";
            break;
        case "09":
            $mes = "Septiembre";
            break;
        case "10":
            $mes = "Octubre";
            break;
        case "11":
            $mes = "Noviembre";
            break;
        case "12":
            $mes = "Diciembre";
            break;
    }
    $ano = date("Y", $fecha); // optenemos el aÃ±o en formato 4 digitos 
    // $fecha = $diasemana . ", " . $dia . " de " . $mes . " de " . $ano; // unimos el resultado en una unica cadena 
    $fecha = $dia . " de " . $mes . " de " . $ano; // unimos el resultado en una unica cadena 
    //$fecha = $dia . "/" . substr($mes, 0,3) . "/" . $ano; // unimos el resultado en una unica cadena 
    return $fecha; //enviamos la fecha al programa 
}

function arreglo($datos) {
    $x = $datos;
    foreach ($x as $key => $value) {
        $keys[] = $key;
        $values[] = $value;
    }
    $dim = count($value);
    $j = 0;
    for ($i = 1; $i <= $dim; $i++) {
        $arreglo[$j] = $keys;
        $j++;
    }
    $j = 0;
    foreach ($arreglo as &$row) {
        $din_row = count($row);
        for ($i = 0; $i < $din_row; $i++) {
            $row[$row[$i]] = $values[$i][$j];
            unset($row[$i]);
        }
        $j++;
    }
    return $arreglo;
}

function arreglo_facturas($datos) {
    $x = $datos;
    foreach ($x as $key => $value) {
        $keys[] = $key;
        $values[] = $value;
    }
    $dim = count($value);

    $j = 0;
    for ($i = 1; $i <= $dim; $i++) {
        $arreglo[$j] = $keys;
        $j++;
    }
    $j = 0;
    foreach ($arreglo as &$row) {
        $din_row = count($row);
        for ($i = 0; $i < $din_row; $i++) {
            $row[$row[$i]] = $values[$i][$j];
            unset($row[$i]);
        }
        $j++;
    }
    return $arreglo;
}

function suma_fechas($fecha, $ndias) {
    if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/", $fecha))
        list($año, $mes, $dia) = explode("/", $fecha);
    if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/", $fecha))
        list($año, $mes, $dia) = explode("-", $fecha);
    $nueva = mktime(0, 0, 0, $mes, $dia, $año) + $ndias * 24 * 60 * 60;
    $nuevafecha = date("Y-m-d", $nueva);
    return ($nuevafecha);
}

class EnLetras {

    var $Void = "";
    var $SP = " ";
    var $Dot = ".";
    var $Zero = "0";
    var $Neg = "Menos";

    function ValorEnLetras($x, $Moneda) {
        $s = "";
        $Ent = "";
        $Frc = "";
        $Signo = "";

        if (floatVal($x) < 0)
            $Signo = $this->Neg . " ";
        else
            $Signo = "";

        if (intval(number_format($x, 2, '.', '')) != $x) //<- averiguar si tiene decimales
            $s = number_format($x, 2, '.', '');
        else
            $s = number_format($x, 0, '.', '');

        $Pto = strpos($s, $this->Dot);

        if ($Pto === false) {
            $Ent = $s;
            $Frc = $this->Void;
        } else {
            $Ent = substr($s, 0, $Pto);
            $Frc = substr($s, $Pto + 1);
        }

        if ($Ent == $this->Zero || $Ent == $this->Void)
            $s = "Cero ";
        elseif (strlen($Ent) > 7) {
            $s = $this->SubValLetra(intval(substr($Ent, 0, strlen($Ent) - 6))) .
                    "Millones " . $this->SubValLetra(intval(substr($Ent, -6, 6)));
        } else {
            $s = $this->SubValLetra(intval($Ent));
        }

        if (substr($s, -9, 9) == "Millones " || substr($s, -7, 7) == "Millón ")
            $s = $s . "de ";

        $s = $s . $Moneda;

        if ($Frc != $this->Void) {
            $s = $s . " Con " . $this->SubValLetra(intval($Frc)) . "Centimos";
            //$s = $s . " " . $Frc . "/100";
        } else {

            if ($Moneda == "Bolivares") {

                $s = $s . " " . $this->SubValLetra(intval($Frc)) . "Exactos";
                $s = $s . " " . $this->SubValLetra(intval($Frc)) . "";
            } else {
                $s = $s . " " . $this->SubValLetra(intval($Frc)) . "";
            }
        }
        return ($Signo . $s . "");
    }

    function SubValLetra($numero) {
        $Ptr = "";
        $n = 0;
        $i = 0;
        $x = "";
        $Rtn = "";
        $Tem = "";

        $x = trim("$numero");
        $n = strlen($x);

        $Tem = $this->Void;
        $i = $n;

        while ($i > 0) {
            $Tem = $this->Parte(intval(substr($x, $n - $i, 1) .
                            str_repeat($this->Zero, $i - 1)));
            If ($Tem != "Cero")
                $Rtn .= $Tem . $this->SP;
            $i = $i - 1;
        }


        //--------------------- GoSub FiltroMil ------------------------------
        $Rtn = str_replace(" Mil Mil", " Un Mil", $Rtn);
        while (1) {
            $Ptr = strpos($Rtn, "Mil ");
            If (!($Ptr === false)) {
                If (!(strpos($Rtn, "Mil ", $Ptr + 1) === false ))
                    $this->ReplaceStringFrom($Rtn, "Mil ", "", $Ptr);
                Else
                    break;
            }
            else
                break;
        }

        //--------------------- GoSub FiltroCiento ------------------------------
        $Ptr = -1;
        do {
            $Ptr = strpos($Rtn, "Cien ", $Ptr + 1);
            if (!($Ptr === false)) {
                $Tem = substr($Rtn, $Ptr + 5, 1);
                if ($Tem == "M" || $Tem == $this->Void)
                    ;
                else
                    $this->ReplaceStringFrom($Rtn, "Cien", "Ciento", $Ptr);
            }
        }while (!($Ptr === false));

        //--------------------- FiltroEspeciales ------------------------------
        $Rtn = str_replace("Diez Un", "Once", $Rtn);
        $Rtn = str_replace("Diez Dos", "Doce", $Rtn);
        $Rtn = str_replace("Diez Tres", "Trece", $Rtn);
        $Rtn = str_replace("Diez Cuatro", "Catorce", $Rtn);
        $Rtn = str_replace("Diez Cinco", "Quince", $Rtn);
        $Rtn = str_replace("Diez Seis", "Dieciseis", $Rtn);
        $Rtn = str_replace("Diez Siete", "Diecisiete", $Rtn);
        $Rtn = str_replace("Diez Ocho", "Dieciocho", $Rtn);
        $Rtn = str_replace("Diez Nueve", "Diecinueve", $Rtn);
        $Rtn = str_replace("Veinte Un", "Veintiun", $Rtn);
        $Rtn = str_replace("Veinte Dos", "Veintidos", $Rtn);
        $Rtn = str_replace("Veinte Tres", "Veintitres", $Rtn);
        $Rtn = str_replace("Veinte Cuatro", "Veinticuatro", $Rtn);
        $Rtn = str_replace("Veinte Cinco", "Veinticinco", $Rtn);
        $Rtn = str_replace("Veinte Seis", "Veintiseís", $Rtn);
        $Rtn = str_replace("Veinte Siete", "Veintisiete", $Rtn);
        $Rtn = str_replace("Veinte Ocho", "Veintiocho", $Rtn);
        $Rtn = str_replace("Veinte Nueve", "Veintinueve", $Rtn);

        //--------------------- FiltroUn ------------------------------
        If (substr($Rtn, 0, 1) == "M")
            $Rtn = "Un " . $Rtn;
        //--------------------- Adicionar Y ------------------------------
        for ($i = 65; $i <= 88; $i++) {
            If ($i != 77)
                $Rtn = str_replace("a " . Chr($i), "* y " . Chr($i), $Rtn);
        }
        $Rtn = str_replace("*", "a", $Rtn);
        return($Rtn);
    }

    function ReplaceStringFrom(&$x, $OldWrd, $NewWrd, $Ptr) {
        $x = substr($x, 0, $Ptr) . $NewWrd . substr($x, strlen($OldWrd) + $Ptr);
    }

    function Parte($x) {
        $Rtn = '';
        $t = '';
        $i = '';
        Do {
            switch ($x) {
                Case 0: $t = "Cero";
                    break;
                Case 1: $t = "Un";
                    break;
                Case 2: $t = "Dos";
                    break;
                Case 3: $t = "Tres";
                    break;
                Case 4: $t = "Cuatro";
                    break;
                Case 5: $t = "Cinco";
                    break;
                Case 6: $t = "Seis";
                    break;
                Case 7: $t = "Siete";
                    break;
                Case 8: $t = "Ocho";
                    break;
                Case 9: $t = "Nueve";
                    break;
                Case 10: $t = "Diez";
                    break;
                Case 20: $t = "Veinte";
                    break;
                Case 30: $t = "Treinta";
                    break;
                Case 40: $t = "Cuarenta";
                    break;
                Case 50: $t = "Cincuenta";
                    break;
                Case 60: $t = "Sesenta";
                    break;
                Case 70: $t = "Setenta";
                    break;
                Case 80: $t = "Ochenta";
                    break;
                Case 90: $t = "Noventa";
                    break;
                Case 100: $t = "Cien";
                    break;
                Case 200: $t = "Doscientos";
                    break;
                Case 300: $t = "Trescientos";
                    break;
                Case 400: $t = "Cuatrocientos";
                    break;
                Case 500: $t = "Quinientos";
                    break;
                Case 600: $t = "Seiscientos";
                    break;
                Case 700: $t = "Setecientos";
                    break;
                Case 800: $t = "Ochocientos";
                    break;
                Case 900: $t = "Novecientos";
                    break;
                Case 1000: $t = "Mil";
                    break;
                Case 1000000: $t = "Millón";
                    break;
            }

            If ($t == $this->Void) {
                $i = $i + 1;
                $x = $x / 1000;
                If ($x == 0)
                    $i = 0;
            }
            else
                break;
        }while ($i != 0);

        $Rtn = $t;
        Switch ($i) {
            Case 0: $t = $this->Void;
                break;
            Case 1: $t = " Mil";
                break;
            Case 2: $t = " Millones";
                break;
            Case 3: $t = " Billones";
                break;
        }
        return($Rtn . $t);
    }

}

function diferenciaEntreFechas($fecha_principal, $fecha_secundaria, $obtener = 'DIAS', $redondear = true){
   $f0 = strtotime($fecha_principal);
   $fecha_secundaria = explode(' ', $fecha_secundaria);
   $f1 = strtotime($fecha_secundaria[0]);
//   if ($f0 < $f1) { $tmp = $f1; $f1 = $f0; $f0 = $tmp; }
//   debug($f0.' '.$f1);
   $resultado = ($f0 - $f1);
   switch ($obtener) {
       default: break;
       case "MINUTOS"   :   $resultado = $resultado / 60;   break;
       case "HORAS"     :   $resultado = $resultado / 60 / 60;   break;
       case "DIAS"      :   $resultado = $resultado / 60 / 60 / 24;   break;
       case "SEMANAS"   :   $resultado = $resultado / 60 / 60 / 24 / 7;   break;
   }
   if($redondear) $resultado = round($resultado);
   return $resultado;
}

?>
