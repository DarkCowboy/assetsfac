<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('proveedores/menu_interno_proveedores') ?>     

            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">Editar Beneficiario</h1>
                </div><br>
                <?
                if ($error) {
                    echo "<div class='error_' style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $error;
                    echo "</div>";
                }
                ?>
                <form action="./proveedores/editar_proveedor/<?= sha1($proveedor['id_proveedor']) ?>" method="post" class="form" style="margin: 17px;" id="validate-form" onSubmit="return validator(this);" >
                    <div class="table" style="margin: 0 auto; overflow: hidden; width: 472px; float: none;">
                        <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                        <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th class="full" colspan="2">Datos del Beneficiario</th>
                                </tr>
                                <tr class="bg">
                                    <td class="first" width="172"><strong>Nombre del Beneficiario</strong></td>
                                    <td class="last"><input name="nombre_proveedor" value="<?= $proveedor['nombre_proveedor']; ?>" class="text" id="nombre_proveedor" type="text" data-required="true" ></td>
                                </tr>
                                <tr class="bg">
                                    <td class="first" width="172"><strong>Email del Beneficiario</strong></td>
                                    <td class="last"><input name="email_proveedor" value="<?= $proveedor['email_proveedor']; ?>" class="text" id="email_proveedor" type="text" ></td>
                                </tr>
                                <tr>
                                    <td class="first" width="172"><strong>Numero de Identificacion</strong></td>
                                    <td class="last">
                                        <select name="pre_id_number"  style="width: 25%; float: left;">
                                            <option <?= $proveedor['pre_id_number'] == 'RUC' ? '_selected selected="selected"' : '' ?> value="RUC">RUC</option>
                                            <option <?= $proveedor['pre_id_number'] == 'RIF' ? '_selected selected="selected"' : '' ?> value="RIF">RIF</option>
                                            <option <?= $proveedor['pre_id_number'] == 'CED' ? '_selected selected="selected"' : '' ?> value="CED">CED</option>
                                            <option <?= $proveedor['pre_id_number'] == 'PAS' ? '_selected selected="selected"' : '' ?> value="PAS">PAS</option>
                                        </select>
                                        <input style="width: 68%; float: left;" name="id_number_proveedor" class="text" id="id_number_proveedor" value="<?= $proveedor['id_number_proveedor']; ?>" type="text" data-required="true"></td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                    </div>


                    <div style="width: 113px; margin: 0 auto;">
                        <button type="submit" style="height: 26px; padding: 0; width: 113px;">Guardar Cambios</button>
                    </div>
                </form>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>