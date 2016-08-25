<html>
    <head>
        <base href="<?= base_url(); ?>"
              <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
        <link rel="stylesheet" type="text/css" href="css/style_ficha_pn.css" />
        <script type='text/javascript' src='js/plugins/jquery.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery/jquery.mousewheel.min.js'></script>
    </head>
    <body>
        <div class="cuerpo">
            <div class="logo"><img src="images/general/logo.png"/></div>
            <div class="titulo">SOLICITUD DE CUPO</div>
            <div class="contenido">
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="2">DATOS DE LA EMPRESA</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">RIF / RUC</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$planilla['nom_rz_pj']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['rif_pj']; ?></td>
                    </tr>
                </table>
                
                 <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">
                            DATOS REPRESENTANTE LEGAL
                        </td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE</td>
                        <td class="sub_titulo_tabla">NACIONALIDAD</td>
                        <td class="sub_titulo_tabla">N&deg; ID</td>
                        <td class="sub_titulo_tabla">CARGO</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$rep_legal['nom_apell_repl']; ?></td>
                        <td class="contenido_td">
                            <?
                            if (strstr(strtolower(@$rep_legal['nacionalidad_repl']), 'paname') || @$rep_legal['nacionalidad_repl'] == 'PA') {
                                if (@$rep_legal['sexo_repl'] == 'Varon') {
                                    echo 'Paname&ntilde;o';
                                } else if (@$rep_legal['sexo_repl'] == 'Mujer') {
                                    echo 'Paname&ntilde;a';
                                }
                            } else {
                                echo @$rep_legal['nacionalidad_repl'];
                            }
                            ?>
                        </td>
                        <td class="contenido_td">
                            <?
                            if (strstr(strtolower(@$rep_legal['nacionalidad_repl']), 'paname') || @$rep_legal['nacionalidad_repl'] == 'PA') {
                                echo 'CED.-' . @$rep_legal['cedula_repl'];
                            } else {
                                echo 'PASS.-' . @$rep_legal['cedula_repl'];
                            }
                            ?>
                        </td>
                        <td class="contenido_td"><?php echo @$rep_legal['cargo_repl']; ?></td>
                    </tr>
                </table>
                
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DE CONTACTO</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">DIRECCION</td>
                        <td class="sub_titulo_tabla">TELEFONO</td>
                        <td class="sub_titulo_tabla">EMAIL</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo @$planilla['direccion_pj']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['telefono_pj']; ?></td>
                        <td class="contenido_td"><?php echo @$planilla['email_pj']; ?></td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla">DATOS DE REGISTRO</td>
                    </tr>
                    <tr>
                        <td class="contenido_td">
                            <?php
                            if ($planilla['nacionalidad_emp'] == 'p') {
                                $V = new EnLetras();
                                echo 'Ficha '.strtolower ($V->ValorEnLetras($planilla['num_ficha_pj'], '')).' ('.$planilla['num_ficha_pj'].'), Documento '.strtolower($V->ValorEnLetras($planilla['num_doc_pj'], '')).' ('.$planilla['num_doc_pj'].') de la Seccion de Micropeliculas (Mercantil), del Registro Publico, en fecha '.fecha($planilla['fecha_reg_pj']);
                            } else {
                                echo @$planilla['of_reg_pj'] . ', bajo el N&deg; ' .
                                @$planilla['num_reg_pj'] . ', Tomo ' .
                                @$planilla['tomo_reg_pj'] . ', en fecha ' .
                                fecha(@$planilla['fecha_reg_pj']) . ' en ' .
                                @$planilla['ciudad_reg_pj'] . ' - ' .
                                @$planilla['estado_reg_pj'];
                            }
                            ?></td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="5">NOMINA DE ACCIONISTA</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">N&deg; de RIF / N&deg; de RUC / CEDULA</td>
                        <td class="sub_titulo_tabla">CAPITAL SUSCRITO</td>
                        <td class="sub_titulo_tabla">%</td>
                        <td class="sub_titulo_tabla">CAPITAL PAGADO</td>
                    </tr>
                    <?
                    $i = 0;
                    $porcent = 0;
                    $tot_cap_sus = 0;
                    $tot_cap_pag = 0;
                    foreach (@$planilla['nomina_accionista'] as $row) {
                        $tot_cap_sus = $tot_cap_sus + $row['cap_sus_na'];
                        $tot_cap_pag = $tot_cap_pag + $row['cap_pag_na'];
                    }
                    foreach (@$planilla['nomina_accionista'] as $row) {
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo ucwords($row['nom_raz_na']) ?></td>
                            <td class="contenido_td"><?php if(strstr(strtolower($row['nacionalidad_na']),'paname')){echo 'CED.-';}else{ echo'PASS.-';} echo $row['cedula_na']; ?></td>
                            <td class="contenido_numero cap_sus"><?php echo number_format($row['cap_sus_na'], 2, ',', '.') ?></td>
                            <td class="contenido_numero"><?= number_format((($row['cap_pag_na'] * 100) / $tot_cap_pag), 1, ',', '.'); ?> %</td>
                            <td class="contenido_numero"><?php echo number_format($row['cap_pag_na'], 2, ',', '.') ?></td>
                        </tr>
                        <?
                        $i++;
                        if ($i == 4) {
                            break;
                        }
                        ?>
                    <? } ?>
                    <tr class="resultados">
                        <td class="contenido_td"></td>
                        <td class="contenido_td"></td>
                        <td class="contenido_numero"><?php echo number_format($tot_cap_sus, 2, ',', '.') ?></td>
                        <td class="contenido_numero">100%</td>
                        <td class="contenido_numero"><?php echo number_format($tot_cap_pag, 2, ',', '.') ?></td>
                    </tr>
                </table>

                <script>
                    $(window).load(function(){
                        var totalcapsus = 0;
                        $('.cap_sus').each(function(){
                            totalcapsus = parseFloat(totalcapsus) + parseFloat($(this).html());
                        });
                        $('.totpasus').html(parseFloat(totalcapsus));
                    });    
                </script>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">JUNTA DIRECTIVA</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRES Y APELLIDOS O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">N&deg; ID</td>
                        <td class="sub_titulo_tabla">TIPO DE FIRMA</td>
                        <td class="sub_titulo_tabla">CARGO</td>
                    </tr>
                    <?
                    $i = 0;
                    foreach (@$planilla['junta_directiva'] as $row) {
                        ?>
                        <tr>
                            <td class="contenido_td"><?php echo ucwords($row['nombres_dir']) .' '. ucwords($row['apellidos_dir']); ?></td>
                            <td class="contenido_td"><?php if(strstr(strtolower($row['nacionalidad_dir']),'paname')){echo 'CED.-';}else{ echo'PASS.-';} echo $row['cedula_dir']; ?></td>
                             <td class="contenido_td"><?php echo $row['tipo_firma_dir']; ?></td>
                            <td class="contenido_td"><?php echo ucwords($row['cargo_dir']); ?></td>
                        </tr>
                        <?
                        $i++;
                        if ($i == 4) {
                            break;
                        }
                        ?>
                    <? } ?>
                </table>

                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">REFERENCIAS BANCARIAS</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">BANCO</td>
                        <td class="sub_titulo_tabla">N&deg; DE CUENTA</td>
                        <td class="sub_titulo_tabla">TIPO DE CUENTA</td>
                    </tr>
                    <? for ($i = 0; $i <= 2; $i++) { ?>
                        <tr>
                            <td class="contenido_td"><?php echo ucwords(@$planilla['banco_ref_pj'][$i]); ?></td>
                            <td class="contenido_td"><?php echo @$planilla['n_cuenta_ref_pj'][$i]; ?></td>
                            <td class="contenido_td"><?php echo ucwords(@$planilla['cuenta_ref_pj'][$i]); ?></td>
                        </tr>
                    <? } ?>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="4">PRINCIPALES CLIENTES</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">NOMBRE O RAZON SOCIAL</td>
                        <td class="sub_titulo_tabla">N&deg; DE RIF</td>
                        <td class="sub_titulo_tabla">PERSONA DE CONTACTO</td>
                        <td class="sub_titulo_tabla">TELEFONO / EMAIL</td>
                    </tr>
                    <? for ($i = 0; $i <= 2; $i++) { ?>
                        <tr>
                            <td class="contenido_td"><?php echo ucwords(@$planilla['nombre_rz_pc'][$i]); ?></td>
                            <td class="contenido_td"><?php echo @$planilla['num_rif_pc'][$i]; ?></td>
                            <td class="contenido_td"><?php echo ucwords(@$planilla['persona_contacto_pc'][$i]); ?></td>
                            <td class="contenido_td"><?php echo @$planilla['tel_email_pc'][$i]; ?></td>
                        </tr>
                    <? } ?>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" colspan="3">DATOS DE LA SOLICITUD</td>
                    </tr>
                    <tr>
                        <td class="sub_titulo_tabla">MONTO SOLICITADO</td>
                        <td class="sub_titulo_tabla">PLAZO</td>
                        <td class="sub_titulo_tabla">DESCRIPCION</td>
                    </tr>
                    <tr>
                        <td class="contenido_td"><?php echo number_format(@$planilla['monto_solicitud'],2,',','.'); ?></td>
                        <td class="contenido_td"><?php echo number_format(@$planilla['plazo_solicitud'], '0', ',', '.'); ?></td>
                        <td class="contenido_td"><?php echo @$planilla['destino_solicitud']; ?></td>
                    </tr>
                </table>
                <table class="tabla">
                    <tr>
                        <td class="titulo_tabla" style="width: 20%;">LUGAR</td>
                        <td class="titulo_tabla" style="width: 20%;">FECHA</td>
                        <td class="titulo_tabla" style="width: 60%;">FIRMA DEL (LOS) SOLICITANTE(S)</td>
                    </tr>
                    <tr>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 45px;"></td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 45px;"></td>
                        <td class="contenido_justificado" style="border:1px solid #c9c9c9; height: 45px;"></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>