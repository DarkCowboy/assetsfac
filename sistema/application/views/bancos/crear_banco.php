<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left'); ?>
        <div id="middle">
            <?
            if ($this->session->flashdata('result')) {
                echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                echo $this->session->flashdata('result');
                echo "</div>";
            }
            ?>
            <div class="form_main">
                <form action="./bancos/agregar_banco/" method="post" class="form" id="validate-form" onSubmit="return validator(this);" >
                    <table class="table_main_form">

                        <tr>
                            <th class="full" colspan="2">Datos de la Entidad Financiera</th>
                        </tr>
                        <tr>
                            <td class="first" width="172"><strong>Nombre de la Entidad Bancaria</strong></td>
                            <td class="last"><input name="nombre_banco" class="text imput_form1" id="nombre_banco" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                        </tr>
                        <tr class="bg">
                            <td class="first"><strong>Tipo de Cuenta</strong></td>
                            <td class="last">
                                <select name="t_de_cuenta" id="t_de_cuenta">
                                    <option value="Corriente">Corriente</option>
                                    <option value="Ahorro">Ahorro</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td class="first"><strong>Numero de Cuenta</strong></td>
                            <td class="last"><input name="n_cuenta" id="n_cuenta" class="text imput_form1" type="text" data-required="true"></td>
                        </tr>
                        <tr>
                            <td class="first"><strong>Saldo actual en la cuenta</strong></td>
                            <td class="last"><input name="saldo_actual" id="saldo_actual" class="text imput_form1" type="text" data-required="true" onkeypress="return permite(event, 'numpunto')"></td>
                        </tr>
                        <tr>
                            <td class="first"><strong>Condicion</strong></td>
                            <td class="last"><select name="t_banco">
                                    <option value="Propio">Propio</option>
                                    <option value="Tercero">Tercero</option>
                                </select></td>
                        </tr>
                        <tr class="bg">
                            <td class="first"><strong>Moneda</strong></td>
                            <td class="last">
                                <select name="moneda">
                                    <option value="USD">USD</option>
                                    <option value="VEF">VEF</option>
                                    <option value="B/.">B/.</option>
                                </select>
                            </td>
                        </tr>
<!--                        <tr>
                            <td class="first"><strong>Codigo Contable</strong></td>
                            <td class="last"><input name="codigo" id="codigo" class="text imput_form1" type="text" data-required="true" onkeypress="return permite(event, 'numpunto')"></td>
                        </tr>-->
                    </table>
                    <p>&nbsp;</p>

                </form> 
                <div class="tips_form1" style="margin: 6px 0 0 35px;">
                    <p style="font-weight: bold;color: #747474;font-size: 10px;margin: 16px 0 0 0;">
                        <img src="images/icons/tips.png" style="margin: -6px 4px 0 8px; float: left;"/>
                        Tips Informativo:
                    </p>  
                    <p>&nbsp;</p>
                    <p style="text-align: center; color: #747474;">
                        Registre aqui todos los bancos de la
                        compañia.
                        Es importante conocer al momento del registro 
                        el saldo actual del banco para asi tener un control 
                        bancario real.
                    </p>
                    <p>&nbsp;</p>
                    <p style="text-align: center; color: #747474;">
                        Recuerde realizar las conciliaciones bancarias 
                        diariamente y asi tendra actualizado su saldo bancario.
                    <p>&nbsp;</p>
                </div>
                <div class="div_botonform1">
                    <!--<input type="reset" value="Limpiar" style="float: left;" />-->
                    <button type="button" onclick="valida_select();"  id="boton_form1">Registrar Banco</button>
                </div>

                <script>
                        function valida_select() {
                            var $validacion = validator($('#validate-form'));
                            if ($validacion) {
                                $('#validate-form').submit();
                            }
                        }
                </script>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>