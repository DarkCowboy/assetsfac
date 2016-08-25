<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('empleados/menu_interno_empleados') ?>
            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1>Datos del Empleado</h1>
                </div><br>

                <div class="table">
                    <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                    <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="full" colspan="4">Datos del Empleado</th>
                            </tr>
                            <tr>
                                <td class="first" width="172"><strong>Primer Nombre</strong></td>
                                <td class="last"><input class="text" type="text"></td>
                                <td class="first"><strong>Segundo Nombre</strong></td>
                                <td class="last"><input class="text" type="text"></td>
                            </tr>
                            <tr class="bg">
                                <td class="first"><strong>Segundo Nombre</strong></td>
                                <td class="last"><input class="text" type="text"></td>
                            </tr>
                            <tr>
                                <td class="first"><strong>Primer Apellido</strong></td>
                                <td class="last"><input class="text" type="text"></td>
                            </tr>
                            <tr class="bg">
                                <td class="first"><strong>Segundo Apellido</strong></td>
                                <td class="last"><input class="text" type="text"></td>
                            </tr>
                        </tbody>
                    </table>
                    <p>&nbsp;</p>
                </div>



            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>