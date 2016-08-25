<? $this->load->view('templates/head'); ?>

<? 
if (isset($moneda['mensaje'])){
@$mensaje = $moneda['mensaje'];
}
if (isset($moneda['mensaje'])){
@$moneda = $moneda['moneda']; 
}
?>
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
                    <li class="no-hover">Configurar Moneda</li>
                </ul>
            </div> <!--! end of #title-bar -->
            <div class="shadow-bottom shadow-titlebar"></div>
            <!-- Begin of #main-content -->
            <div id="main-content">
                <div class="container_12">

                    <div class="grid_12">
                        <h1>Configuracion de moneda</h1>
                        <p>Cambie la divisa segun el pais en el cual se encuentra.</p>
                        <? if (isset($mensaje)){ ?>
                        <div class="alert success"><strong><? echo $mensaje; ?></strong></div>
                        <? } ?>
                    </div>
                    <div class="grid_6">
                        <div class="block-border">
                            <div class="block-header">
                                <h1>Configurar Moneda</h1><span></span>
                            </div>
                            <form id="form" class="block-content form" action="./configuraciones/agregar_monedas" method="post">
                                <div class="_100">
                                    <p><label for="100"></label><input id="100" type="hidden" name="label" value="moneda"/></p>
                                </div>

                                <div class="_75">
                                    <p><label for="50">Nombre de la moneda</label>
                                        <input id="50" type="text" name="name" value="<?= @$moneda['name']; ?>"/></p>
                                </div>

                                <div class="_25">
                                    <p><label for="50">Simbolo</label>
                                        <input id="50" type="text" name="value" value="<?= @$moneda['value']; ?>"/></p>
                                </div>
                                
                                <div class="_25">
                                    <p><label for="50"></label><input id="50" type="submit" value="Guardar"/></p>
                                </div>
                                <div class="clear"></div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="clear height-fix"></div>
                </div>
            </div></div> <!--! end of #main-content -->
    </div> <!--! end of #main -->
    <? $this->load->view('templates/foot'); ?>
</body>
</html>