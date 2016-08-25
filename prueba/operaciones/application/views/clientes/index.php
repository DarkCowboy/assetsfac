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
                    <li class="no-hover">Lista de Clientes</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content">
                <div class="container_12">

                    <div class="grid_12">
                        <h1>Lista de Clientes</h1>
                        <p>Cree, busque y edite sus clientes mediante esta lista...</p>
                    </div>

                    <div class="grid_12">
                        <div class="block-border">
                            <div class="block-header">
                                <h1>Clientes de <?= $datos_empresa['nombre_empresa']; ?></h1><span></span>
                            </div>
                            <div class="block-content">
                                <table id="table-example" class="table">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;">Tipo de Persona</th>
                                            <th style="text-align: center;">Nombre o razon Social</th>
                                            <th style="text-align: center;">RIF / Cedula</th>
                                            <th style="text-align: center;">Telefonos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach ($clientes as $row) { ?>
                                            <tr class="gradeX" style="cursor: pointer;" onclick="window.location.href='<?= base_url() ?>clientes/cliente_panel/<?= $row['id_cliente']; ?>'">
                                                <td style="text-align: center;"><?= $row['tipo'] == 1 ? 'Persona Juridica' : 'Persona Natural'; ?></td>
                                                <td style="text-align: center;"><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></td>
                                                <td style="text-align: center;"><?= $row['rif_cedula_pn_pj']; ?></td>
                                                <td style="text-align: center;"><?= $row['telefono_pn_pj']; ?></td>
                                            </tr>
                                        <? } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <? //debug($clientes,false); ?>
                    <div class="clear height-fix"></div>

                </div></div> <!--! end of #main-content -->

       
  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="js/scripts/fancybox/jquery-1.9.0.min.js"></script>


  <!-- scripts concatenated and minified via ant build script-->
  <script defer src="js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
  <script defer src="js/mylibs/jquery-ui-1.8.15.custom.min.js"></script> <!-- jQuery UI -->
  <script defer src="js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
  <script defer src="js/mylibs/jquery.uniform.min.js"></script> <!-- Uniform (Look & Feel from forms) -->
  <script defer src="js/mylibs/jquery.validate.min.js"></script> <!-- Validation from forms -->
  <script defer src="js/mylibs/jquery.dataTables.min.js"></script> <!-- Tables -->
  <script defer src="js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
  <script defer src="js/mylibs/excanvas.js"></script> <!-- Charts -->
  <script defer src="js/mylibs/jquery.visualize.js"></script> <!-- Charts -->
  <script defer src="js/mylibs/jquery.slidernav.min.js"></script> <!-- Contact List -->
  <script defer src="js/common.js"></script> <!-- Generic functions -->
  <script defer src="js/script.js"></script> <!-- Generic scripts -->
  
  <script type="text/javascript">
	$().ready(function() {
		
		/*
		 * Form Validation
		 */
		$.validator.setDefaults({
			submitHandler: function(e) {
				$.jGrowl("Form was successfully submitted.", { theme: 'success' });
				$(e).parent().parent().fadeOut();
				v.resetForm();
				v2.resetForm();
				v3.resetForm();
			}
		});
		var v = $("#create-user-form").validate();
		jQuery("#reset").click(function() { v.resetForm(); $.jGrowl("User was not created!", { theme: 'error' }); });
		
		var v2 = $("#write-message-form").validate();
		jQuery("#reset2").click(function() { v2.resetForm(); $.jGrowl("Message was not sent.", { theme: 'error' }); });
		
		var v3 = $("#create-folder-form").validate();
		jQuery("#reset3").click(function() { v3.resetForm(); $.jGrowl("Folder was not created!", { theme: 'error' }); });
		
		/*
		 * DataTables
		 */
		$('#table-example').dataTable();
		
	});
  </script>
  <!-- end scripts-->

  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->
  

        <? $this->load->view('templates/footer'); ?>
</body>
</html>