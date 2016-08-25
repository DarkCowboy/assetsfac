<? $this->load->view('templates/header') ?>
<?
$rol = rol_usuario();
?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left') ?>            
        <div id="middle">
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>

            <div style="padding: 15px;">
                <div>
                </div><br>
                <div class="table" style="width: 100%;">
                    <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                    <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                    <table class="listing" style="border: none !important;" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                                <th class="first" width="177">Nombre del Usuario</th>
                                <th>Clave</th>
                                <th>Ultima conexion</th>
                                <th>Editar Datos</th>
                                <th>Permisos</th>
                                <th class="last">Estatus</th>
                            </tr>
                            <tr>
                                <td class="first style1">Superadmin</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last"></td>
                            </tr>
                            <? foreach ($lista_usuario as $row) { ?>
                                <? if ($row['id_rol'] == 10) { ?>
                                    <?
                                    $modifica = true;
                                    if ($rol != 10) {
                                        $modifica = false;
                                    }
                                    ?>
                                    <tr class="bg">
                                        <td class="first style2"><?= ucwords($row['first_name'] . ' ' . $row['last_name']); ?></td>
                                        <td>
                                            <a <?= $modifica ? 'href="./usuarios/opciones/cambiar_calve/' . $row['pass'] . '"' : ''; ?>>
                                                <img src="images/key.png" alt="Cambiar Password" title="Cambiar Password" height="16" width="16">
                                            </a>
                                        </td>
                                        <td><?= $row['access']; ?></td>
                                        <td>
                                            <a <?= $modifica ? 'href="./usuarios/editar_usuario/' . $row['pass'] . '"' : ''; ?>>
                                                <img src="images/edit-icon.gif" alt="Editar Datos" title="Editar Datos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td>
                                            <a <?= $modifica ? 'href="./usuarios/editar_permiso/' . $row['pass'] . '"' : ''; ?>>
                                                <img src="images/permisos.png" alt="Editar Permisos" title="Editar Permisos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td class="last">
                                            <? if ($row['status'] == 0) { ?>
                                                <a <?= $modifica ? 'href="./usuarios/opciones/habilitar/' . md5($row['id_user']) . '"' : ''; ?>>
                                                    <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } else if ($row['status'] == 1) { ?>
                                                <a <?= $modifica ? 'href="./usuarios/opciones/inabilitar/' . md5($row['id_user']) . '"' : ''; ?>>
                                                    <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } ?>
                                            <a <?= $modifica ? 'href="./usuarios/opciones/eliminar/' . md5($row['id_user']) . '"' : ''; ?>>
                                                <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="16" width="16">
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>
                            <tr>
                                <td class="first style1">Administradores</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last"></td>
                            </tr>
                            <? foreach ($lista_usuario as $row) { ?>
                                <? if ($row['id_rol'] == 0) { ?>
                                    <tr class="bg">
                                        <td class="first style2"><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td>
                                            <a href="./usuarios/opciones/cambiar_calve/<?= $row['pass']; ?>" >
                                                <img src="images/key.png" alt="Cambiar Password" title="Cambiar Password" height="16" width="16">
                                            </a>
                                        </td>
                                        <td><?= $row['access']; ?></td>
                                        <td>
                                            <a href="./usuarios/editar_usuario/<?= $row['pass']; ?>">
                                                <img src="images/edit-icon.gif" alt="Editar Datos" title="Editar Datos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="./usuarios/editar_permiso/<?= $row['pass']; ?>">
                                                <img src="images/permisos.png" alt="Editar Permisos" title="Editar Permisos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td class="last">
                                            <? if ($row['status'] == 0) { ?>
                                                <a href="./usuarios/opciones/habilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } else if ($row['status'] == 1) { ?>
                                                <a href="./usuarios/opciones/inabilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } ?>
                                            <a href="./usuarios/opciones/eliminar/<?= md5($row['id_user']) ?>">
                                                <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="16" width="16">
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>
                            <tr>
                                <td class="first style1">Dep. administracion</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last"></td>
                            </tr>
                            <? foreach ($lista_usuario as $row) { ?>
                                <? if ($row['id_rol'] == 1) { ?>
                                    <tr class="bg">
                                        <td class="first style2"><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td>
                                            <a href="./usuarios/opciones/cambiar_calve/<?= $row['pass']; ?>" >
                                                <img src="images/key.png" alt="Cambiar Password" title="Cambiar Password" height="16" width="16">
                                            </a>
                                        </td>
                                        <td><?= $row['access']; ?></td>
                                        <td>
                                            <a href="./usuarios/editar_usuario/<?= $row['pass']; ?>">
                                                <img src="images/edit-icon.gif" alt="Editar Datos" title="Editar Datos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="./usuarios/editar_permiso/<?= $row['pass']; ?>">
                                                <img src="images/permisos.png" alt="Editar Permisos" title="Editar Permisos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td class="last">
                                            <? if ($row['status'] == 0) { ?>
                                                <a href="./usuarios/opciones/habilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } else if ($row['status'] == 1) { ?>
                                                <a href="./usuarios/opciones/inabilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } ?>
                                            <a href="./usuarios/opciones/eliminar/<?= md5($row['id_user']) ?>">
                                                <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="16" width="16">
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>
                            <tr>
                                <td class="first style1">Asistentes</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last"></td>
                            </tr>
                            <? foreach ($lista_usuario as $row) { ?>
                                <? if ($row['id_rol'] == 2) { ?>
                                    <tr class="bg">
                                        <td class="first style2"><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td>
                                            <a href="./usuarios/opciones/cambiar_calve/<?= $row['pass']; ?>" >
                                                <img src="images/key.png" alt="Cambiar Password" title="Cambiar Password" height="16" width="16">
                                            </a>
                                        </td>
                                        <td><?= $row['access']; ?></td>
                                        <td>
                                            <a href="./usuarios/editar_usuario/<?= $row['pass']; ?>">
                                                <img src="images/edit-icon.gif" alt="Editar Datos" title="Editar Datos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="./usuarios/editar_permiso/<?= $row['pass']; ?>">
                                                <img src="images/permisos.png" alt="Editar Permisos" title="Editar Permisos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td class="last">
                                            <? if ($row['status'] == 0) { ?>
                                                <a href="./usuarios/opciones/habilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } else if ($row['status'] == 1) { ?>
                                                <a href="./usuarios/opciones/inabilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } ?>
                                            <a href="./usuarios/opciones/eliminar/<?= md5($row['id_user']) ?>">
                                                <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="16" width="16">
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>
                            <tr>
                                <td class="first style1">Usuarios de Solo Consulta</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last"></td>
                            </tr>
                            <? foreach ($lista_usuario as $row) { ?>
                                <? if ($row['id_rol'] == 50) { ?>
                                    <tr class="bg">
                                        <td class="first style2"><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td>
                                            <a href="./usuarios/opciones/cambiar_calve/<?= $row['pass']; ?>" >
                                                <img src="images/key.png" alt="Cambiar Password" title="Cambiar Password" height="16" width="16">
                                            </a>
                                        </td>
                                        <td><?= $row['access']; ?></td>
                                        <td>
                                            <a href="./usuarios/editar_usuario/<?= $row['pass']; ?>">
                                                <img src="images/edit-icon.gif" alt="Editar Datos" title="Editar Datos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="./usuarios/editar_permiso/<?= $row['pass']; ?>">
                                                <img src="images/permisos.png" alt="Editar Permisos" title="Editar Permisos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td class="last">
                                            <? if ($row['status'] == 0) { ?>
                                                <a href="./usuarios/opciones/habilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } else if ($row['status'] == 1) { ?>
                                                <a href="./usuarios/opciones/inabilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } ?>
                                            <a href="./usuarios/opciones/eliminar/<?= md5($row['id_user']) ?>">
                                                <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="16" width="16">
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>
                            <tr>
                                <td class="first style1">Invitados</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td class="last"></td>
                            </tr>
                            <? foreach ($lista_usuario as $row) { ?>
                                <? if ($row['id_rol'] == 3) { ?>
                                    <tr class="bg">
                                        <td class="first style2"><?= $row['first_name'] . ' ' . $row['last_name']; ?></td>
                                        <td>
                                            <a href="./usuarios/opciones/cambiar_calve/<?= $row['pass']; ?>" >
                                                <img src="images/key.png" alt="Cambiar Password" title="Cambiar Password" height="16" width="16">
                                            </a>
                                        </td>
                                        <td><?= $row['access']; ?></td>
                                        <td>
                                            <a href="./usuarios/editar_usuario/<?= $row['pass']; ?>">
                                                <img src="images/edit-icon.gif" alt="Editar Datos" title="Editar Datos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="./usuarios/editar_permiso/<?= $row['pass']; ?>">
                                                <img src="images/permisos.png" alt="Editar Permisos" title="Editar Permisos" height="16" width="16">
                                            </a>
                                        </td>
                                        <td class="last">
                                            <? if ($row['status'] == 0) { ?>
                                                <a href="./usuarios/opciones/habilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/yes.png" alt="Habilitar Usuario" title="Habilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } else if ($row['status'] == 1) { ?>
                                                <a href="./usuarios/opciones/inabilitar/<?= md5($row['id_user']) ?>">
                                                    <img src="images/no.png" alt="Desabilitar Usuario" title="Desabilitar Usuario" height="16" width="16">
                                                </a>
                                            <? } ?>
                                            <a href="./usuarios/opciones/eliminar/<?= md5($row['id_user']) ?>">
                                                <img src="images/trash.png" alt="Eliminar Usuario" title="Eliminar Usuario" height="16" width="16">
                                            </a>
                                        </td>
                                    </tr>
                                <? } ?>
                            <? } ?>

                        </tbody>
                    </table>

                </div>

            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>