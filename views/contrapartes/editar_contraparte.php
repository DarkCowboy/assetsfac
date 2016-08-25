<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left') ?>            
        <div id="middle">
            <?
            if ($this->session->flashdata('result')) {
                echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                echo $this->session->flashdata('result');
                echo "</div>";
            }
            ?>

            <div class="form_main">
                <form action="./contrapartes/editar_contraparte/<?= sha1($proveedor['id_proveedor']); ?>" method="post" class="form" style="" id="validate-form" onSubmit="return validator(this);" >

                    <table class="table_main_form">
                        <tbody>
                            <tr>
                                <td><p class="sub_tit_form">Datos del Contraparte:</p></td>
                                <td></td>
                            </tr>
                            <tr class="bg">
                                <td class="first" width="172">Nombre del Beneficiario</td>
                                <td class="last"><input name="nombre_proveedor" value="<?= $proveedor['nombre_proveedor']; ?>" class="text imput_form1" id="nombre_proveedor" type="text" data-required="true" ></td>
                            </tr>
                            <tr class="bg">
                                <td class="first" width="172">Email del Beneficiario</td>
                                <td class="last"><input name="email_proveedor" value="<?= $proveedor['email_proveedor']; ?>" class="text imput_form1" id="email_proveedor" type="text" ></td>
                            </tr>
                            <tr class="bg">
                                <td class="first" width="172">Telefono(s) del Beneficiario</td>
                                <td class="last"><input name="telefonos_proveedor" value="<?= $proveedor['telefonos_proveedor']; ?>" class="text imput_form1" id="telefonos_proveedor" type="text"  ></td>
                            </tr>
                            <tr class="bg">
                                <td class="first" width="172">Direccion del Beneficiario</td>
                                <td class="last"><input name="direccion_proveedor" value="<?= $proveedor['direccion_proveedor']; ?>" class="text imput_form1" id="direccion_proveedor" type="text"  ></td>
                            </tr>
                            <tr>
                                <td class="first" width="172">Numero de Identificacion</td>
                                <td class="last">
                                    <select name="pre_id_number"  style="width: 25%; float: left;">
                                        <option <?= $proveedor['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>
                                        <option <?= $proveedor['pre_id_number'] == 'CI' ? '_selected selected="selected"' : '' ?> value="CI">CI</option>
                                    </select>
                                    <input style="width: 68%; float: left;" name="id_number_proveedor" class="text imput_form1" id="id_number_proveedor" value="<?= $proveedor['id_number_proveedor']; ?>" type="text" data-required="true"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
                <div class="div_botonform1">
                    <button type="button" onclick="$('#validate-form').submit();"  id="boton_form1">Editar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>

