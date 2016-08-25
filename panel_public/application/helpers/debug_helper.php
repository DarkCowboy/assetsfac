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
        $dim = count($value);
        $keys[] = $key;
        $values[] = $value;
    }
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

/*
  http://micodigobeta.com.ar
  http://dreamcoders.com.ar
 */
/* !
  @function num2letras ()
  @abstract Dado un n?mero lo devuelve escrito.
  @param $num number - N?mero a convertir.
  @param $fem bool - Forma femenina (true) o no (false).
  @param $dec bool - Con decimales (true) o no (false).
  @result string - Devuelve el n?mero escrito en letra.
 * uso: num2letras($numero)


 */

function num2letras($num, $fem = false, $dec = true) {
//if (strlen($num) > 14) die("El n?mero introducido es demasiado grande");
    $matuni[2] = "dos";
    $matuni[3] = "tres";
    $matuni[4] = "cuatro";
    $matuni[5] = "cinco";
    $matuni[6] = "seis";
    $matuni[7] = "siete";
    $matuni[8] = "ocho";
    $matuni[9] = "nueve";
    $matuni[10] = "diez";
    $matuni[11] = "once";
    $matuni[12] = "doce";
    $matuni[13] = "trece";
    $matuni[14] = "catorce";
    $matuni[15] = "quince";
    $matuni[16] = "dieciseis";
    $matuni[17] = "diecisiete";
    $matuni[18] = "dieciocho";
    $matuni[19] = "diecinueve";
    $matuni[20] = "veinte";
    $matunisub[2] = "dos";
    $matunisub[3] = "tres";
    $matunisub[4] = "cuatro";
    $matunisub[5] = "quin";
    $matunisub[6] = "seis";
    $matunisub[7] = "sete";
    $matunisub[8] = "ocho";
    $matunisub[9] = "nove";

    $matdec[2] = "veint";
    $matdec[3] = "treinta";
    $matdec[4] = "cuarenta";
    $matdec[5] = "cincuenta";
    $matdec[6] = "sesenta";
    $matdec[7] = "setenta";
    $matdec[8] = "ochenta";
    $matdec[9] = "noventa";
    $matsub[3] = 'mill';
    $matsub[5] = 'bill';
    $matsub[7] = 'mill';
    $matsub[9] = 'trill';
    $matsub[11] = 'mill';
    $matsub[13] = 'bill';
    $matsub[15] = 'mill';
    $matmil[4] = 'millones';
    $matmil[6] = 'billones';
    $matmil[7] = 'de billones';
    $matmil[8] = 'millones de billones';
    $matmil[10] = 'trillones';
    $matmil[11] = 'de trillones';
    $matmil[12] = 'millones de trillones';
    $matmil[13] = 'de trillones';
    $matmil[14] = 'billones de trillones';
    $matmil[15] = 'de billones de trillones';
    $matmil[16] = 'millones de billones de trillones';

    $num = trim((string) @$num);
    if ($num[0] == '-') {
        $neg = 'menos ';
        $num = substr($num, 1);
    }else
        $neg = '';
    while ($num[0] == '0')
        $num = substr($num, 1);
    if ($num[0] < '1' or $num[0] > 9)
        $num = '0' . $num;
    $zeros = true;
    $punt = false;
    $ent = '';
    $fra = '';
    for ($c = 0; $c < strlen($num); $c++) {
        $n = $num[$c];
        if (!(strpos(".,'''", $n) === false)) {
            if ($punt)
                break;
            else {
                $punt = true;
                continue;
            }
        } elseif (!(strpos('0123456789', $n) === false)) {
            if ($punt) {
                if ($n != '0')
                    $zeros = false;
                $fra .= $n;
            }else
                $ent .= $n;
        }else
            break;
    }
    $ent = '     ' . $ent;
    if ($dec and $fra and !$zeros) {
        $fin = ' con';
        for ($n = 0; $n < strlen($fra); $n++) {
            if (($s = $fra[$n]) == '0')
                $fin .= ' cero';
            elseif ($s == '1')
                $fin .= $fem ? ' una' : ' un';
            else
                $fin .= ' ' . $matuni[$s];
        }
    }else
        $fin = '';
    if ((int) $ent === 0)
        return 'Cero ' . $fin;
    $tex = '';
    $sub = 0;
    $mils = 0;
    $neutro = false;
    while (($num = substr($ent, -3)) != '   ') {
        $ent = substr($ent, 0, -3);
        if (++$sub < 3 and $fem) {
            $matuni[1] = 'una';
            $subcent = 'as';
        } else {
            $matuni[1] = $neutro ? 'un' : 'uno';
            $subcent = 'os';
        }
        $t = '';
        $n2 = substr($num, 1);
        if ($n2 == '00') {
            
        } elseif ($n2 < 21)
            $t = ' ' . $matuni[(int) $n2];
        elseif ($n2 < 30) {
            $n3 = $num[2];
            if ($n3 != 0)
                $t = 'i' . $matuni[$n3];
            $n2 = $num[1];
            $t = ' ' . $matdec[$n2] . $t;
        }else {
            $n3 = $num[2];
            if ($n3 != 0)
                $t = ' y ' . $matuni[$n3];
            $n2 = $num[1];
            $t = ' ' . $matdec[$n2] . $t;
        }
        $n = $num[0];
        if ($n == 1) {
            $t = ' ciento' . $t;
        } elseif ($n == 5) {
            $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t;
        } elseif ($n != 0) {
            $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t;
        }
        if ($sub == 1) {
            
        } elseif (!isset($matsub[$sub])) {
            if ($num == 1) {
                $t = ' mil';
            } elseif ($num > 1) {
                $t .= ' mil';
            }
        } elseif ($num == 1) {
            $t .= ' ' . $matsub[$sub] . '&oacute;n';
        } elseif ($num > 1) {
            $t .= ' ' . $matsub[$sub] . 'ones';
        }
        if ($num == '000')
            $mils++;
        elseif ($mils != 0) {
            if (isset($matmil[$sub]))
                $t .= ' ' . $matmil[$sub];
            $mils = 0;
        }
        $neutro = true;
        $tex = $t . $tex;
    }
    $tex = $neg . substr($tex, 1) . $fin;
    return ucfirst($tex);
}

?>
<?php

//Funcion para pasar de numeros a letras

function unidad($numuero) {
    switch ($numuero) {
        case 9: {
                $numu = "NUEVE";
                break;
            }
        case 8: {
                $numu = "OCHO";
                break;
            }
        case 7: {
                $numu = "SIETE";
                break;
            }
        case 6: {
                $numu = "SEIS";
                break;
            }
        case 5: {
                $numu = "CINCO";
                break;
            }
        case 4: {
                $numu = "CUATRO";
                break;
            }
        case 3: {
                $numu = "TRES";
                break;
            }
        case 2: {
                $numu = "DOS";
                break;
            }
        case 1: {
                $numu = "UN";
                break;
            }
        case 0: {
                $numu = "";
                break;
            }
    }
    return $numu;
}

function decena($numdero) {

    if ($numdero >= 90 && $numdero <= 99) {
        $numd = "NOVENTA ";
        if ($numdero > 90)
            $numd = $numd . "Y " . (unidad($numdero - 90));
    }
    else if ($numdero >= 80 && $numdero <= 89) {
        $numd = "OCHENTA ";
        if ($numdero > 80)
            $numd = $numd . "Y " . (unidad($numdero - 80));
    }
    else if ($numdero >= 70 && $numdero <= 79) {
        $numd = "SETENTA ";
        if ($numdero > 70)
            $numd = $numd . "Y " . (unidad($numdero - 70));
    }
    else if ($numdero >= 60 && $numdero <= 69) {
        $numd = "SESENTA ";
        if ($numdero > 60)
            $numd = $numd . "Y " . (unidad($numdero - 60));
    }
    else if ($numdero >= 50 && $numdero <= 59) {
        $numd = "CINCUENTA ";
        if ($numdero > 50)
            $numd = $numd . "Y " . (unidad($numdero - 50));
    }
    else if ($numdero >= 40 && $numdero <= 49) {
        $numd = "CUARENTA ";
        if ($numdero > 40)
            $numd = $numd . "Y " . (unidad($numdero - 40));
    }
    else if ($numdero >= 30 && $numdero <= 39) {
        $numd = "TREINTA ";
        if ($numdero > 30)
            $numd = $numd . "Y " . (unidad($numdero - 30));
    }
    else if ($numdero >= 20 && $numdero <= 29) {
        if ($numdero == 20)
            $numd = "VEINTE ";
        else
            $numd = "VEINTI" . (unidad($numdero - 20));
    }
    else if ($numdero >= 10 && $numdero <= 19) {
        switch ($numdero) {
            case 10: {
                    $numd = "DIEZ ";
                    break;
                }
            case 11: {
                    $numd = "ONCE ";
                    break;
                }
            case 12: {
                    $numd = "DOCE ";
                    break;
                }
            case 13: {
                    $numd = "TRECE ";
                    break;
                }
            case 14: {
                    $numd = "CATORCE ";
                    break;
                }
            case 15: {
                    $numd = "QUINCE ";
                    break;
                }
            case 16: {
                    $numd = "DIECISEIS ";
                    break;
                }
            case 17: {
                    $numd = "DIECISIETE ";
                    break;
                }
            case 18: {
                    $numd = "DIECIOCHO ";
                    break;
                }
            case 19: {
                    $numd = "DIECINUEVE ";
                    break;
                }
        }
    }
    else
        $numd = unidad($numdero);
    return $numd;
}

function centena($numc) {
    if ($numc >= 100) {
        if ($numc >= 900 && $numc <= 999) {
            $numce = "NOVECIENTOS ";
            if ($numc > 900)
                $numce = $numce . (decena($numc - 900));
        }
        else if ($numc >= 800 && $numc <= 899) {
            $numce = "OCHOCIENTOS ";
            if ($numc > 800)
                $numce = $numce . (decena($numc - 800));
        }
        else if ($numc >= 700 && $numc <= 799) {
            $numce = "SETECIENTOS ";
            if ($numc > 700)
                $numce = $numce . (decena($numc - 700));
        }
        else if ($numc >= 600 && $numc <= 699) {
            $numce = "SEISCIENTOS ";
            if ($numc > 600)
                $numce = $numce . (decena($numc - 600));
        }
        else if ($numc >= 500 && $numc <= 599) {
            $numce = "QUINIENTOS ";
            if ($numc > 500)
                $numce = $numce . (decena($numc - 500));
        }
        else if ($numc >= 400 && $numc <= 499) {
            $numce = "CUATROCIENTOS ";
            if ($numc > 400)
                $numce = $numce . (decena($numc - 400));
        }
        else if ($numc >= 300 && $numc <= 399) {
            $numce = "TRESCIENTOS ";
            if ($numc > 300)
                $numce = $numce . (decena($numc - 300));
        }
        else if ($numc >= 200 && $numc <= 299) {
            $numce = "DOSCIENTOS ";
            if ($numc > 200)
                $numce = $numce . (decena($numc - 200));
        }
        else if ($numc >= 100 && $numc <= 199) {
            if ($numc == 100)
                $numce = "CIEN ";
            else
                $numce = "CIENTO " . (decena($numc - 100));
        }
    }
    else
        $numce = decena($numc);

    return $numce;
}

function miles($nummero) {
    if ($nummero >= 1000 && $nummero < 2000) {
        $numm = "MIL " . (centena($nummero % 1000));
    }
    if ($nummero >= 2000 && $nummero < 10000) {
        $numm = unidad(Floor($nummero / 1000)) . " MIL " . (centena($nummero % 1000));
    }
    if ($nummero < 1000)
        $numm = centena($nummero);

    return $numm;
}

function decmiles($numdmero) {
    if ($numdmero == 10000)
        $numde = "DIEZ MIL";
    if ($numdmero > 10000 && $numdmero < 20000) {
        $numde = decena(Floor($numdmero / 1000)) . "MIL " . (centena($numdmero % 1000));
    }
    if ($numdmero >= 20000 && $numdmero < 100000) {
        $numde = decena(Floor($numdmero / 1000)) . " MIL " . (miles($numdmero % 1000));
    }
    if ($numdmero < 10000)
        $numde = miles($numdmero);

    return $numde;
}

function cienmiles($numcmero) {
    if ($numcmero == 100000)
        $num_letracm = "CIEN MIL";
    if ($numcmero >= 100000 && $numcmero < 1000000) {
        $num_letracm = centena(Floor($numcmero / 1000)) . " MIL " . (centena($numcmero % 1000));
    }
    if ($numcmero < 100000)
        $num_letracm = decmiles($numcmero);
    return $num_letracm;
}

function millon($nummiero) {
    if ($nummiero >= 1000000 && $nummiero < 2000000) {
        $num_letramm = "UN MILLON " . (cienmiles($nummiero % 1000000));
    }
    if ($nummiero >= 2000000 && $nummiero < 10000000) {
        $num_letramm = unidad(Floor($nummiero / 1000000)) . " MILLONES " . (cienmiles($nummiero % 1000000));
    }
    if ($nummiero < 1000000)
        $num_letramm = cienmiles($nummiero);

    return $num_letramm;
}

function decmillon($numerodm) {
    if ($numerodm == 10000000)
        $num_letradmm = "DIEZ MILLONES";
    if ($numerodm > 10000000 && $numerodm < 20000000) {
        $num_letradmm = decena(Floor($numerodm / 1000000)) . "MILLONES " . (cienmiles($numerodm % 1000000));
    }
    if ($numerodm >= 20000000 && $numerodm < 100000000) {
        $num_letradmm = decena(Floor($numerodm / 1000000)) . " MILLONES " . (millon($numerodm % 1000000));
    }
    if ($numerodm < 10000000)
        $num_letradmm = millon($numerodm);

    return $num_letradmm;
}

function cienmillon($numcmeros) {
    if ($numcmeros == 100000000)
        $num_letracms = "CIEN MILLONES";
    if ($numcmeros >= 100000000 && $numcmeros < 1000000000) {
        $num_letracms = centena(Floor($numcmeros / 1000000)) . " MILLONES " . (millon($numcmeros % 1000000));
    }
    if ($numcmeros < 100000000)
        $num_letracms = decmillon($numcmeros);
    return $num_letracms;
}

function milmillon($nummierod) {
    if ($nummierod >= 1000000000 && $nummierod < 2000000000) {
        $num_letrammd = "MIL " . (cienmillon($nummierod % 1000000000));
    }
    if ($nummierod >= 2000000000 && $nummierod < 10000000000) {
        $num_letrammd = unidad(Floor($nummierod / 1000000000)) . " MIL " . (cienmillon($nummierod % 1000000000));
    }
    if ($nummierod < 1000000000)
        $num_letrammd = cienmillon($nummierod);

    return $num_letrammd;
}

function convertir($numero) {
    $numf = milmillon($numero);
    return $numf;
}

function resta_dias($dias) {
    $dia = time() - ($dias * 24 * 60 * 60);
    $dia_fin = date('d-m-Y', $dia);
    return $dia_fin;
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

        if (substr($s, -9, 9) == "Millones " || substr($s, -7, 7) == "Millon ")
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
        $Rtn = str_replace("Veinte Seis", "Veintiseis", $Rtn);
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
                Case 1000000: $t = "Millon";
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

?>
