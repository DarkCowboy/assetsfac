<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <form id="fileupload" method="post" action="./departamentos/agregar_departamento" enctype="multipart/form-data" >
                <? $this->load->view('empleados/menu_interno_empleados') ?>
                <div id="center-column" style="float: left; margin: 0 auto;">
                    <div class="top-bar">
                        <h1>Departamentos - MsFactoring</h1>
                    </div><br>
                    <div class="table">
                        <img src="images/bg-th-left.gif" alt="" class="left" height="7" width="8">
                        <img src="images/bg-th-right.gif" alt="" class="right" height="7" width="7">
                        <table class="listing form" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                    <th class="full" colspan="4">Datos del Departamento</th>
                                </tr>
                                <tr>
                                    <td class="first"><strong>Nombre del Departamento</strong></td>
                                    <td class="first"><input name="name_departamento" class="text" type="text"></td>
                                </tr>
                                <tr class="bg">
                                    <td  colspan="4">
                                        <input type="submit" value="Agregar"> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>