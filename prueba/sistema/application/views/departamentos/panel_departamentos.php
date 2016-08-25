<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('empleados/menu_interno_empleados') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1>Lista de Departamentos Ms Factoring</h1>
                </div><br>


                <div class="table">
                    <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                    <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                    <table class="listing" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="first" width="177">Nombre del Departamento</th>
                                <th class="last">Opciones</th>
                            </tr>
                            <? foreach ($lista_departamentos as $row) { ?> 
                                <tr class="bg">
                                    <td class="first style2"><?= $row['name_departamento']; ?></td>
                                    <td class="last">
                                        <a href=""><img width="16" height="16" title="Editar" alt="Editar" src="images/edit-icon.gif"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href=""><img width="16" height="16" title="Habilitar" alt="Habilitar" src="images/yes.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href=""><img width="16" height="16" title="Desabilitar" alt="Desabilitar" src="images/no.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href=""><img width="16" height="16" title="Eliminar" alt="Eliminar" src="images/trash.png"></a>
                                    </td>
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