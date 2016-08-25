<? $this->load->view('templates/head'); ?>

<body id="top">

    <!-- Begin of #container -->
    <div id="container">
        <!-- Begin of #header -->
        <div id="header-surround">
            <? $this->load->view('templates/header') ?>    
        </div> <!--! end of #header -->

        <div class="fix-shadow-bottom-height"></div>

        <? $this->load->view('templates/aside_bar') ?>

        <!-- Begin of #main -->
        <div id="main" role="main">




            <!-- Begin of titlebar/breadcrumbs -->
            <div id="title-bar">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
                    <li class="no-hover">Agregar Cliente</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content">
                <div class="container_12">

                    <div class="grid_12">
                        <h1>Agregar Cliente</h1>
                        <p>Agregue a sus Clientes y asignele una contraseña para que inicie en su panel de cliente.</p>
                    </div>
                    <div style="width: 100%;">
                        <div class="caja_form_cliente" >
                            <div class="block-border" style="float: left;width: 354px; line-height: 2.231;">
                                <div class="block-header">
                                    <h1>Datos del Cliente</h1><span></span>
                                </div>
                                <div class="block-content">
                                    <form action="./clientes/agregar">
                                        <label>Nombre del Cliente</label>
                                        <input type="text" name="first_name"/>
                                        <label>Apellido del Cliente</label>
                                        <input type="text" name="last_name"/>
                                        <label>Email del Cliente</label>
                                        <input type="text" name="email"/>
                                        <label>Tipo de Persona</label>
                                        <select name="tipo" id="tipo">
                                            <option value="1">Persona Juridica</option>
                                            <option value="0">Persona Natural</option>
                                            <option value="0">Persona Natural</option>
                                            <option value="0">Persona Natural</option>
                                            <option value="0">Persona Natural</option>
                                            <option value="0">Persona Natural</option>
                                            <option value="0">Persona Natural</option>
                                        </select>
                                        
                                        <label>Password</label>
                                        <input type="text" name="pass"/>
                                        <input type="submit" value="Guardar" style="margin: 10px 0px 10px 0px;"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clear height-fix"></div>

                </div></div> <!--! end of #main-content -->

        </div> <!--! end of #main -->
        
        <? $this->load->view('templates/foot'); ?>

        <? $this->load->view('templates/footer'); ?>
</body>
</html>