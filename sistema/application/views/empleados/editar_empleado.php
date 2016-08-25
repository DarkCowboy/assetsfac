<? $this->load->view('templates/header') ?>
<script src="scripts/calendario/dhtmlxcalendar.js"></script>
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar.css" type="text/css"> 
<link rel="stylesheet" href="scripts/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 

<script type="text/javascript" >
    $(function() {

        myCalendar = new dhtmlXCalendarObject(["fecha_ingreso_empleado","fecha_nac_emp"], true, {isYearEditable: true, isMonthEditable: true});
        myCalendar.setSkin('dhx_terrace');
        myCalendar.hideTime();
        dhtmlXCalendarObject.prototype.langData["es"] = {
            dateformat: '%d.%m.%Y',
            monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            weekstart: 1
        }
        myCalendar.loadUserLanguage('es');

    });
</script>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <form id="fileupload" method="post" action="./empleados/editar_empleado" enctype="multipart/form-data" >
                <input name="id_empleado" type="hidden" value="<?= sha1($datos_empleado['id_empleado']); ?>"> 

                <? $this->load->view('empleados/menu_interno_empleados') ?>
                
                <div id="center-column" style="float: left; margin: 0 auto;">
                    <div class="top-bar">
                        <h1>Editar Ficha del Empleado</h1>
                    </div><br>

                    <div class="table">
                        <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                        <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                    <th class="full" colspan="4">Datos del Empleado</th>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Primer Nombre</strong></td>
                                    <td class="first"><input name="primer_nombre_emp" value="<?= $datos_empleado['primer_nombre_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Segundo Nombre</strong></td>
                                    <td class="last"><input name="segundo_nombre_emp" value="<?= $datos_empleado['segundo_nombre_emp']; ?>" class="text" type="text"></td>
                                </tr>

                                <tr>
                                    <td class="first"><strong>Primer Apellido</strong></td>
                                    <td class="first"><input name="primer_apellido_emp" value="<?= $datos_empleado['primer_apellido_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Segundo Apellido</strong></td>
                                    <td class="last"><input name="segundo_apellido_emp" value="<?= $datos_empleado['segundo_apellido_emp']; ?>" class="text" type="text"></td>
                                </tr>

                                <tr>
                                    <td class="first"><strong>Cedula</strong></td>
                                    <td class="first"><input name="cedula_emp" value="<?= $datos_empleado['cedula_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Nacionalidad</strong></td>
                                    <td class="last">
                                        <select name="nacionalidad_emp">
                                            <option <?= $datos_empleado['sexo_emp']=='v'? 'selected="selected" selected_': ''; ?> value="v">Venezolano(a)</option>
                                            <option <?= $datos_empleado['sexo_emp']=='e'? 'selected="selected" selected_': ''; ?> value="e">Extranjero(a)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Sexo</strong></td>
                                    <td class="first">
                                        <select name="sexo_emp">
                                            <option <?= $datos_empleado['sexo_emp']=='m'? 'selected="selected" selected_': ''; ?> value="m">Masculino</option>
                                            <option <?= $datos_empleado['sexo_emp']=='f'? 'selected="selected" selected_': ''; ?> value="f">Femenino</option>
                                        </select>
                                    </td>
                                    <td class="first"><strong>Estado Civil</strong></td>
                                    <td class="last">
                                        <select name="estado_civil_emp">
                                            <option <?= $datos_empleado['estado_civil_emp']=='s'? 'selected="selected" selected_': ''; ?> value="s">Soltero(a)</option>
                                            <option <?= $datos_empleado['estado_civil_emp']=='c'? 'selected="selected" selected_': ''; ?> value="c">Casado(a)</option>
                                            <option <?= $datos_empleado['estado_civil_emp']=='d'? 'selected="selected" selected_': ''; ?> value="d">Divorciado(a)</option>
                                            <option <?= $datos_empleado['estado_civil_emp']=='v'? 'selected="selected" selected_': ''; ?> value="v">Viudo(a)</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Lugar de Nacminiento</strong></td>
                                    <td class="first"><input name="lugar_nac_emp" value="<?= $datos_empleado['lugar_nac_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Fecha de Nacimiento</strong></td>
                                    <td class="last"><input name="fecha_nac_emp" id="fecha_nac_emp" value="<?= $datos_empleado['fecha_nac_emp']; ?>" class="text" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Direccion de Habitacion</strong></td>
                                    <td class="first" colspan="3"><textarea name="direccion_emp" style="width: 99%; resize: none;"><?= $datos_empleado['direccion_emp']; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Email</strong></td>
                                    <td class="first"><input name="email_emp"  value="<?= $datos_empleado['email_emp']; ?>" class="text" type="text"></td>
                                    <td class="first"><strong>Telefonos</strong></td>
                                    <td class="last"><input name="telefonos_emp" value="<?= $datos_empleado['telefonos_emp']; ?>" class="text" type="text"></td>
                                </tr>
                                <? if ($rol == 10 or $rol == 0 or $rol == 1) { ?>
                                    <tr>
                                        <td class="first"><strong>Sueldo Basico Mensual (Bs.)</strong></td>
                                        <td class="first"><input name="sueldo_emp" value="<?= $datos_empleado['sueldo_emp']; ?>" class="text" type="text"></td>
                                        <td class="first"><strong>Ticket Beneficio (Bs.)</strong></td>
                                        <td class="last"><input name="ticket_emp" value="<?= $datos_empleado['ticket_emp']; ?>" class="text" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="first"><strong>Departamento</strong></td>
                                        <td class="last">
                                            <select name="id_departamento">
                                                <? foreach($lista_departamentos as $row){ ?>
                                                <option <?= $datos_empleado['id_departamento'] == $row['id_departamento']? ' selected_ selected="selected" ': ''; ?> value="<?= $row['id_departamento'] ?>"><?= $row['name_departamento']; ?></option>
                                                <? } ?>
                                            </select>
                                        </td>
                                        <td class="first"><strong>Fecha de Ingreso</strong></td>
                                        <? $fecha_ingreso =$datos_empleado['fecha_ingreso_empleado'];
                                           $fecha_ingreso = explode(' ', $fecha_ingreso); ?>
                                        <td class="last"><input name="fecha_ingreso_empleado" value="<?= $fecha_ingreso[0]; ?>" id="fecha_ingreso_empleado" class="text" type="text"></td>
                                    </tr>
                                    <tr>
                                        <td class="first" colspan="1"><strong>Cargo</strong></td>
                                        <td class="last" colspan="3">
                                            <input name="cargo_empleado" type="text" value="<?= $datos_empleado['cargo_empleado']; ?>" style="width: 98% !important;" />
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="first" colspan="4" style="text-align: center;">
                                            
                                            <? if ($datos_empleado['name_foto']){ ?>
                                            <div>
                                                <img src="./timthumb.php?h=231&w=220&a=c,t&src=<?= base_url(); ?>/images/fotos_empleados/<?= $datos_empleado['name_foto']; ?>" />
                                            </div>
                                            <p> Para editar la Foto Seleccione Otra y Guarde los Cambios </p>
                                            <? }else{ ?>
                                            <p>Para Agregar la foto del empleado presione en Examinar</p>
                                            <? } $this->load->view('empleados/foto_empleado') ?>
                                        </td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="first" colspan="4" style="text-align: center;">
                                            <input type="submit" value="Guardar los Cambios"> 
                                        </td>
                                    </tr>
                                <? } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>