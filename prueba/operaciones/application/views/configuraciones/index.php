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
                    <li class="no-hover">Configurar</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content">
			<div class="container_12">
			
			<div class="grid_12">
				<h1>Panel de Configuracion</h1>
				<p>En este panel se configura las variables del sistema.</p>
			</div>
			
			<div class="grid_12">
				<div class="block-border">
					<div class="block-header">
						<h1>Lista de Opciones</h1><span></span>
					</div>
					<div class="block-content">
						<ul class="shortcut-list">
							<li>
								<a href="./configuraciones/agregar_monedas/">
									<img src="images/icons/packs/crystal/48x48/apps/moneda.png">
									Conf.  Moneda
								</a>
							</li>
							<li>
								<a href="./empresa/">
									<img src="images/icons/packs/crystal/48x48/apps/Bancos_directoriohigueyano.jpg">
									Conf. Empresa
								</a>
							</li>
							<li>
								<a href="javascript:void(0);">
									<img src="images/icons/packs/crystal/48x48/apps/kuzer.png">
									Conf. Usuarios
								</a>
							</li>
							
						</ul>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			
			<div class="clear height-fix"></div>

		</div></div> <!--! end of #main-content -->
        </div> <!--! end of #main -->
        <? $this->load->view('templates/footer'); ?>
        <? $this->load->view('templates/foot'); ?>
</body>
</html>