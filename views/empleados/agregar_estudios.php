<? $this->load->view('templates/header') ?>
<body>
    <? $lista_empleados = array(); ?>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('empleados/menu_interno_empleados') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1>Estudios del Empleado Rhonald Brito</h1>
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
                    <form action="./empleados/guardar_estudios" method="post">

                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th class="full" colspan="4">Datos de Estudios</th>
                                </tr>
                                <tr>
                                    <td class="last" colspan="4" style="text-align: center;"><br/><strong>Educacion Basica</strong><br/>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Nombre del Instituto</strong></td>
                                    <td class="first"><input name="basica[nom_instituto_basica]" class="text" type="text"></td>
                                    <td class="first"><strong>Fecha de Egreso</strong></td>
                                    <td class="last"><input name="basica[fecha_egreso_basica]" class="text" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Titulo Obtenido</strong></td>
                                    <td class="first" colspan="3">
                                        <select name="basica[titulo_basica]">
                                            <? $bachillerato = bachillerato(); ?>
                                            <? foreach ($bachillerato as $key => $value) { ?>
                                                <option value="<?= $key; ?>"><?= $value; ?></option>
                                            <? } ?>
                                        </select>
                                        <br/>
                                        <br/>&nbsp;
                                        <input type="radio" name="basica[bach_status]" value="1" />En Curso
                                        <input type="radio" name="basica[bach_status]" value="2" />Culminado
                                        <input type="radio" name="basica[bach_status]" value="3" />No Culminado
                                        <br/>&nbsp;
                                    </td>
                                </tr>

                                <tr>

                                    <td class="last" colspan="4" style="text-align: center;"><br/><strong>Educacion Universitaria</strong><br/>&nbsp;</td>

                                </tr>

                                <tr>
                                    <td class="first"><strong>Nombre del Instituto</strong></td>
                                    <td class="first"><input name="univer[nom_instituto_univer]" class="text" type="text"></td>
                                    <td class="first"><strong>Fecha de Egreso</strong></td>
                                    <td class="last"><input name="univer[fecha_egreso_univer]" class="text" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Titulo Obtenido</strong></td>
                                    <td class="first" colspan="3">
                                        <br/>&nbsp;
                                        <select name="univer[titulo_univer]">
                                            <option value="0" _selected selected="selected">Ninguno</option>
                                            <? $carreras_universitarias = carreras_universitarias(); ?>
                                            <? foreach ($carreras_universitarias as $row) { ?>
                                                <? foreach ($row as $key => $value) { ?>
                                                    <? if ($key == 'title') { ?>
                                                        <?= $x == 1 ? '<option disabled="disabled"></option>' : '' ?>
                                                        <option disabled="disabled"><?= $value; ?></option>
                                                        <option disabled="disabled"></option>
                                                        <? $x = 1; ?>
                                                    <? } else { ?>
                                                        <option value="<?= $key ?>"><?= $value; ?></option>
                                                    <? } ?>
                                                <? } ?>
                                            <? } ?>
                                        </select>
                                        <br/>
                                        <br/>&nbsp;
                                        <input type="radio" name="univer[uni_status]" value="1" />En Curso
                                        <input type="radio" name="univer[uni_status]" value="2" />Culminado
                                        <input type="radio" name="univer[uni_status]" value="3" />No Culminado
                                        <br/>&nbsp;
                                    </td>
                                </tr>

                                <tr>
                                    <td class="last" colspan="4" style="text-align: center;"><strong>Cursos Realizados</strong>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <img width="16" height="16" alt="add" src="images/add-icon.gif">Agregar Nuevo Curso
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Nombre del Instituto</strong></td>
                                    <td class="first"><input name="curso[nom_instituto_curso]" class="text" type="text"></td>
                                    <td class="first"><strong>Telefonos</strong></td>
                                    <td class="last"><input name="curso[telefonos_curso]" class="text" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Nombre del Curso</strong></td>
                                    <td class="first"><input name="curso[nombre_curso]" value="<?= $datos_empleado['primer_nombre_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Titulo / Certificacion</strong></td>
                                    <td class="last"><input name="curso[titulo_curso]" value="<?= $datos_empleado['segundo_nombre_emp']; ?>" class="text" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Horas del Curso</strong></td>
                                    <td class="first"><input name="curso[hrs_curso]" value="<?= $datos_empleado['primer_nombre_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Fecha de Egreso</strong></td>
                                    <td class="last"><input name="curso[fecha_curso]" value="<?= $datos_empleado['segundo_nombre_emp']; ?>" class="text" type="text"></td>
                                </tr>


                                <tr>
                                    <td class="first" colspan="4" style="text-align: center;">
                                        <input type="submit" value="Guardar los Cambios"> 
                                        
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </form>

                </div>




















                <div class="table">
                    <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                    <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
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