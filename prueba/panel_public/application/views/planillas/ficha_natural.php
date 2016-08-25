<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
        <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
    </head>
    <body>
        <div class="cuerpo">
            <div class="logo"><img src="images/general/logo.png"/></div>
            <div class="titulo">FICHA DE PERSONA NATURAL</div>
            <div class="contenido">

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS PERSONALES</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS</td>
                        <td class="sub_titulo_tabla" >NACIONALIDAD</td>
                        <td class="sub_titulo_tabla">N&deg; DE <?= $planilla['nacionalidad_pn'] == 'PA' ? 'CEDULA' : 'PASAPORTE'; ?></td>
                    </tr>
                    <tr>
                        <td class="contenido_td" ><?php echo $planilla['nom_apell_pn']; ?></td>
                        <td class="contenido_td"><?
                            if ($planilla['nacionalidad_pn'] == 'PA') {
                                if ($planilla['sexo_pn'] == 'Varon') {
                                    echo 'PANAME&Ntilde;O';
                                } else {
                                    echo 'PANAME&Ntilde;A';
                                }
                            } else {
                                echo $planilla['nacionalidad_pn'];
                            }
                            ?>
                        </td>
                        <td class="contenido_td"><? if(strstr(strtolower($planilla['nacionalidad_pn']), 'paname') || $planilla['nacionalidad_pn'] == 'PA' ){
                            echo 'CED.-';
                            
                        }else{ 
                        echo 'PASS.-';
                        }
                            echo $planilla['cedula_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">TELEFONOS</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                        <td class="sub_titulo_tabla">ESTADO CIVIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['telefono_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['email_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['e_civil_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla" colspan="3">DIRECCION DE HABITACION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td" colspan="3"><?php echo $planilla['direccion_pn']; ?></td>
                    </tr>
                </table>
                
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS LABORALES</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES DE LA EMPRESA</td>
                        <td class="sub_titulo_tabla">ACTIVIDAD ECONOMICA</td>
                        <td class="sub_titulo_tabla">TELEFONOS</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['nom_rz_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['act_aeco_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['telefono_dl_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla" colspan="3">DIRECCION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td" colspan="3"><?php echo $planilla['direccion_dl_pn']; ?></td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">CARGO</td>
                        <td class="sub_titulo_tabla">ANTIGUEDAD</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo $planilla['cargo_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['ant_dl_pn']; ?></td>
                        <td class="contenido_td"><?php echo $planilla['email_dl_pn']; ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">REFERENCIAS BANCARIAS</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" colspan="3">Los pagos de dinero que ASSETS FACTORING INC. deba efectuar al cliente con motivo de
                            la liquidaci&oacute;n de operaciones, ser&aacute;n efectuados &uacute;nicamente mediante dep&oacute;sitos en una de las cuentas 
                            bancarias del cliente, en el siguiente orden de prelaci&oacute;n:</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">BANCO</td>
                        <td class="sub_titulo_tabla">N&deg; DE CUENTA</td>
                        <td class="sub_titulo_tabla">TIPO DE CUENTA</td>
                    </tr>
                    <? 
                    for ($i = 0; $i <= 2; $i++) {
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo $planilla['banco_ref_pn'][$i]; ?></td>
                            <td class="contenido_td"><?php echo $planilla['n_cuenta_ref_pn'][$i]; ?></td>
                            <td class="contenido_td"><?php echo $planilla['cuenta_ref_pn'][$i]; ?></td>
                        </tr>
                    <? } ?>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">DATOS FINANCIEROS</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">ACTIVOS</td>
                        <td class="sub_titulo_tabla">PASIVO</td>
                        <td class="sub_titulo_tabla">INGRESOS ANUALES</td>
                        <td class="sub_titulo_tabla">PATRIMONIO</td>
                    </tr>
                    <tr>
                       
                        <td class="contenido_td"><?php echo number_format($planilla['activo_pn'],2,',','.'); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['pasivo_pn'],2,',','.'); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['ing_anua_pn'],2,',','.'); ?></td>
                        <td class="contenido_td"><?php echo number_format($planilla['pat_total_pn'],2,',','.'); ?></td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla">DECLARACION JURADA</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" style="font-size: 9px;"><?php echo $declaracion_jurada['value']; ?> </td>
                    </tr>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">REGISTRO DE FIRMAS DEL CLIENTE</td>
                    </tr>
                    
                    <tr>
                        <td class="sub_titulo_tabla" style="width: 30%;">LUGAR</td>
                        <td class="sub_titulo_tabla" style="width: 20%;">FECHA</td>
                        <td class="sub_titulo_tabla" style="width: 20%;">HUELLA DACTILAR</td>
                        <td class="sub_titulo_tabla" style="width: 50%;">FIRMA</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 85px;"></td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 85px; text-align: center; font-weight: normal;">_____ / _____ / _________</td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 85px; width: 15%; text-align: center; vertical-align: top;"></td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 85px"></td>
                    </tr>
                    
                </table>
            </div>
        </div>

    </body>
</html>



