<?php

function debug($var, $stop = true) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    if ($stop)
        exit;
}

function permisos($id_class, $val_perm) {

// Separo los Permisos
    $separados = explode('-', $val_perm);
// valido que haya permiso para ingresar a este controlador
    if ($separados[1] != $id_class) {
//        show_404();
    }


    for ($i = 0; $i < strlen($separados[0]); $i++) {
        switch ($i) {
            case 0:
                $value = 'lee';
                break;
            case 1:
                $value = 'escribe';
                break;
            case 2:
                $value = 'crea';
                break;
            case 3:
                $value = 'edita';
                break;
        }
        $permisos[$value] = $separados[0][$i]; //Aqui tenemos cada caracter
    }
    $permisos['id_class'] = $id_class;
    return $permisos;
}

function nombre_controlador() {
    $ci = & get_instance();
    return $ci->router->fetch_class();
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

function logout() {
    $this->session->sess_destroy();
    redirect(base_url(), 'location');
}

function fecha($fecha, $tipo = null) {
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
    if ($tipo == 'mes') {
        return " del mes de " . $mes . " de "; //días del mes de Mayo de dos mil trece. (2013).  
    }else if($tipo == 'corta'){
        return $dia." de ". substr($mes, 0, 3) . " de ". $ano; //días del mes de Mayo de dos mil trece. (2013).  
    }
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

function diferenciaEntreFechas($fecha_principal, $fecha_secundaria, $obtener = 'DIAS', $redondear = true) {
    $f0 = strtotime($fecha_principal);
    $fecha_secundaria = explode(' ', $fecha_secundaria);
    $f1 = strtotime($fecha_secundaria[0]);
//   if ($f0 < $f1) { $tmp = $f1; $f1 = $f0; $f0 = $tmp; }
//   debug($f0.' '.$f1);
    $resultado = ($f0 - $f1);
    switch ($obtener) {
        default: break;
        case "MINUTOS" : $resultado = $resultado / 60;
            break;
        case "HORAS" : $resultado = $resultado / 60 / 60;
            break;
        case "DIAS" : $resultado = $resultado / 60 / 60 / 24;
            break;
        case "SEMANAS" : $resultado = $resultado / 60 / 60 / 24 / 7;
            break;
    }
    if ($redondear)
        $resultado = round($resultado);
    return $resultado;
}

function rol_usuario() {
    $ci = & get_instance();
    $datos = $ci->session->userdata('user_data_cliente');
    return $datos['id_rol'];
}

function limpia_cedula($cedula) {
    $cedula = str_replace('-', '', $cedula);
    $cedula = str_replace('.', '', $cedula);
    $cedula = str_replace(',', '', $cedula);
    $cedula = str_replace('v', '', $cedula);
    $cedula = str_replace('V', '', $cedula);
    $cedula = str_replace('E', '', $cedula);
    $cedula = str_replace('e', '', $cedula);
    $cedula = str_replace('P', '', $cedula);
    $cedula = str_replace('p', '', $cedula);
    $cedula = str_replace('', '', $cedula);
    $cedula = str_replace('/', '', $cedula);
    return $cedula;
}

function carreras_universitarias() {
    return array(
        array(
            'title' => 'Carreras de Ingenieria',
            '3' => 'Ing. Civil',
            '4' => 'Ing. en Computacion',
            '5' => 'Ing. en Electronica',
            '6' => 'Ing. en Informatica',
            '7' => 'Ing. en Mecanica',
            '8' => 'Ing. Industrial',
            '9' => 'Ing. en Telecomunicaciones'
        ),
        array(
            'title' => 'Carreras de Licenciatura',
            '10' => 'Lic. en Administracion',
            '11' => 'Lic. en Computacion',
            '12' => 'Lic. en Comercio',
            '13' => 'Lic. en Contaduria',
            '14' => 'Lic. en Derecho',
            '15' => 'Lic. en Informatica',
            '16' => 'Lic. en Mercadeo',
            '17' => 'Lic. en Publicidad',
            '18' => 'Lic. en Turismo',
            '19' => 'Lic. en Telecomunicaciones'
        ),
        array(
            'title' => 'Carreras de Tecnicas',
            '20' => 'T.S.U en Administración',
            '21' => 'T.S.U en Computacion',
            '22' => 'T.S.U en Contaduría',
            '23' => 'T.S.U en Educación Preescolar',
            '24' => 'T.S.U en Higiene y Seguridad Industrial',
            '25' => 'T.S.U en Informática',
            '26' => 'T.S.U en Mercadeo',
            '27' => 'T.S.U en Publicidad',
            '28' => 'T.S.U en Turismo',
            '29' => 'T.S.U en Comercio Exterior y Aduanas'
        )
    );
}

function bachillerato() {
    return array(
        '1'=>'Bachiller en Ciencias',
        '2'=>'Bachiller en Humanidades',
        '3'=>'Bachiller Integral',
        '4'=>'Bachiller Tecnico Medio en Administracion',
        '5'=>'Bachiller Tecnico Medio en Artes Graficas',
        '6'=>'Bachiller Tecnico Medio en Asistencia Administrativa',
        '7'=>'Bachiller Tecnico Medio en Computacion',
        '8'=>'Bachiller Tecnico Medio en Contabilidad',
        '9'=>'Bachiller Tecnico Medio en Comercio',
        '10'=>'Bachiller Tecnico Medio en Deporte',
        '11'=>'Bachiller Tecnico Medio en Diseño',
        '12'=>'Bachiller Tecnico Medio en Electricidad',
        '13'=>'Bachiller Tecnico Medio en Electronica',
        '14'=>'Bachiller Tecnico Medio en Enfermeria',
        '15'=>'Bachiller Tecnico Medio en Farmacia',
        '16'=>'Bachiller Tecnico Medio en Finanzas',
        '17'=>'Bachiller Tecnico Medio en Grafico',
        '18'=>'Bachiller Tecnico Medio en Hoteleria y Turismo',
        '19'=>'Bachiller Tecnico Medio en Informatica',
        '20'=>'Bachiller Tecnico Medio en Mecanica',
        '21'=>'Bachiller Tecnico Medio en Nutricion',
        '22'=>'Bachiller Tecnico Medio en Optometria',
        '23'=>'Bachiller Tecnico Medio en Quimica',
        '24'=>'Bachiller Tecnico Medio en Radiologia',
        '25'=>'Bachiller Tecnico Medio en Turismo',
        '26'=>'Bachiller Tecnico Medio en Ventas',
        '27'=>'Bachiller Tecnico Medio en Seguro',
        '28'=>'En Curso',
        '29'=>'No Culminado'
        );
}
?>
