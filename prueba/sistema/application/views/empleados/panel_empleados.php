<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('empleados/menu_interno_empleados') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1>Lista de Empleados Ms Factoring</h1>
                </div><br>
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>

                <div class="table">
                    <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                    <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tbody><tr>
                                <th class="first" width="177"></th>
                                <th>Fecha de Ingreso</th>
                                <th>Cargo</th>
                                <th>Editar Empleado</th>
                                <th>Carta de Trabajo</th>
                                <th>Estudios</th>
                                <th class="last">Opciones</th>
                            </tr>
                            <? $cambio_dep = -1; ?>
                            <? foreach ($lista_empleados as $row) { ?> 
                                <? if ($cambio_dep != $row['id_departamento']) { ?>
                                    <tr>
                                        <td class="first style1"><?= $row['name_departamento']; ?></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td class="last"></td>
                                    </tr>
                                    <?
                                    $cambio_dep = $row['id_departamento'];
                                }
                                ?>

                                <tr class="bg">
                                    <td class="first style2"><?= $row['primer_nombre_emp'] . ' ' . $row['primer_apellido_emp']; ?></td>
                                    <?
                                    $fecha_ingreso = $row['fecha_ingreso_empleado'];
                                    $fecha_ingreso = explode(' ', $fecha_ingreso);
                                    ?>
                                    <td><?= $fecha_ingreso[0] ?></td>
                                    <td><?= $row['cargo_empleado']; ?></td>
                                    <td>
                                        <a href="./empleados/editar_empleado/<?= sha1($row['id_empleado']); ?>">
                                            <img src="images/edit-icon.gif" alt="login" height="16" width="16">
                                        </a>
                                    </td>
                                    <td>
                                        <a target="_blank" href="./empleados/constancia_trabajo/<?= sha1($row['id_empleado']); ?>">
                                            <img src="images/save-icon.gif" alt="save" height="16" width="16">
                                        </a>
                                    </td>
                                    <td class="last">
                                        <a href="./empleados/agregar_estudios/<?= sha1($row['id_empleado']); ?>">
                                            <img src="images/icons/students.png" alt="add" height="16" width="16">
                                        </a>
                                    </td>
                                    <td class="last"><img src="images/add-icon.gif" alt="add" height="16" width="16"></td>
                                </tr>
                            <? } ?>
                        </tbody>
                    </table>

                </div>


            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>