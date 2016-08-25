<? $this->load->view('templates/head'); ?>
<style>
    html, body, iframe { margin:0; padding:0; height:100%; }
</style>
<body id="top">

    <!-- Begin of #container -->
    <div id="container" style="height:100%;">
        <!-- Begin of #header -->
        <div id="header-surround">
            <? $this->load->view('templates/header') ?>    
        </div> <!--! end of #header -->

        <div class="fix-shadow-bottom-height"></div>

        <? $this->load->view('templates/aside_bar') ?>

        <!-- Begin of #main -->
        <div id="main" role="main" style="height:100%;">

            <!-- Begin of titlebar/breadcrumbs -->
            <div id="title-bar">
                <ul id="breadcrumbs">
                    <li><a href="dashboard.html" title="Home"><span id="bc-home"></span></a></li>
                    <li class="no-hover">Notificaciones</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content" style="height:100%;">
                
                <iframe src="./reportes/<?= $tipo; ?>" style="display: block;
                        margin: 0 auto;
                        overflow: hidden;
                        width: 99%;"></iframe>


            </div> <!--! end of #main-content -->
        </div> <!--! end of #main -->
        <? $this->load->view('templates/footer'); ?>
        <? $this->load->view('templates/foot'); ?>
</body>
</html>