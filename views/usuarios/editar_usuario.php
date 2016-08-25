<? $this->load->view('templates/header') ?>

<link href="scripts/password/style/demo.css" rel="stylesheet" type="text/css" />
<link href="scripts/password/style/style.css" rel="stylesheet" type="text/css" />
<script src="scripts/password/js/pschecker.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function() {
        //Demo code
        $('.password-container').pschecker({onPasswordValidate: validatePassword, onPasswordMatch: matchPassword});

        var submitbutton = $('.btn');
        var errorBox = $('.error');
        errorBox.css('visibility', 'hidden');
        submitbutton.attr("disabled", "disabled");

        //this function will handle onPasswordValidate callback, which mererly checks the password against minimum length
        function validatePassword(isValid) {
            if (!isValid) {
                errorBox.css('visibility', 'visible');
            }
            else {
                errorBox.css('visibility', 'hidden');
            }
        }
        //this function will be called when both passwords match
        function matchPassword(isMatched) {
            if (isMatched) {
                visible = $('.error').css('visibility');
                if (visible == 'visible') {
                    submitbutton.attr("disabled", "disabled");
                    submitbutton.addClass('locked').removeClass('unlocked');
                } else {
                    submitbutton.addClass('unlocked').removeClass('locked');
                    submitbutton.removeAttr("disabled", "disabled");
                    console.log('asd');
                }
            }
            else {
                submitbutton.attr("disabled", "disabled");
                submitbutton.addClass('locked').removeClass('unlocked');
            }
        }
        submitbutton.removeAttr("disabled", "disabled");

    });
</script>
<style>

    span.error, span#error{
        color: Red;
        display: block;
        margin-left: 0;
        text-align: center;
        background: none repeat scroll 0 0 rgba(255, 0, 0, 0.3) !important;
        border: 1px solid red !important;
    }
    .error_{
        color: Red;
        display: block;
        margin-left: 0;
        text-align: center;
        background: none repeat scroll 0 0 rgba(255, 0, 0, 0.3) !important;
        border: 1px solid red !important;
    }

    .control-group {
        margin: 0 auto;
        text-align: right;
        width: 252px;
    }
</style>
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
                <form action="./usuarios/editar_usuario/" method="post" class="form" id="validate-form" onSubmit="return validator(this);" >
                    <div class="table" style="margin: 0 auto; overflow: hidden; width: 472px; float: none;">
                        <table class="table_main_form">
                            <tbody><tr>
                                    <th class="full" colspan="2">Datos del Usuario</th>
                                </tr>
                                <tr>
                                    <td class="first" width="172"><strong>Primer Nombre</strong></td>
                                    <td class="last"><input name="first_name" value="<?= $usuario['first_name']; ?>" class="text imput_form1" id="first_name" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                                </tr>
                                <tr class="bg">
                                    <td class="first"><strong>Primer Apellido</strong></td>
                                    <td class="last"><input name="last_name" value="<?= $usuario['last_name']; ?>" id="last_name" class="text imput_form1" type="text" data-required="true" onkeypress="return permite(event, 'soloLetras')"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Nombre de Usuario</strong></td>
                                    <td class="last"><input name="email" value="<?= $usuario['email']; ?>" id="email" class="text imput_form1" type="text" data-required="true"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Cargo</strong></td>
                                    <td class="last"><input name="cargo" value="<?= $usuario['cargo']; ?>" id="cargo" class="text imput_form1" type="text" data-required="true"></td>
                                </tr>
                                <tr>
                                    <th class="full" colspan="2">Datos de la Cuenta</th>
                                </tr>
                                <tr>
                                    <td class="first" width="172"><strong>Seleccione un Rol</strong></td>
                                    <td class="last">
                                        <select name="id_rol">
                                            <? foreach ($list_rol as $row) { ?>
                                                <option <?= (int) $row['id_rol'] == (int) $usuario['id_rol'] ? ' selected_ selected="selected"  ' : '' ?>  value="<?= $row['id_rol']; ?>" title="<?= $row['Descripcion_rol']; ?>" ><?= $row['nombre_rol'] ?></option>
                                            <? } ?>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                    <input type="hidden" name="code" value="<?= $usuario['pass']; ?>" />         
                    <p>&nbsp;</p>
                    <div style="width: 113px; margin: 0 auto;">
                        <button type="submit" disabled="disabled" class="btn btn-block" style="height: 26px; padding: 0; width: 113px;">Editar</button>
                    </div>
                </form>
            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>