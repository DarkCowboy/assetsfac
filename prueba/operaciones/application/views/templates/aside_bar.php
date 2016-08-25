<!-- Begin of Sidebar -->
<style>
    
.fancybox-wrap, .fancybox-skin, .fancybox-outer, .fancybox-inner, .fancybox-image, .fancybox-wrap iframe, .fancybox-wrap object, .fancybox-nav, .fancybox-nav span, .fancybox-tmp {
    border: 0 none;
    margin: 0;
    outline: medium none;
    padding: 0;
    vertical-align: top;
   overflow: hidden !important;
}
</style>
<aside id="sidebar">

    <!-- Search -->
    <div id="search-bar">
        <form id="search-form" name="search-form" action="search.php" method="post">
            <input type="text" id="query" name="query" value="" autocomplete="off" placeholder="Search">
        </form>
    </div> <!--! end of #search-bar -->

    <!-- Begin of #login-details -->
    <section id="login-details">
        <!--<img class="img-left framed" src="images/misc/avatar_small.png" alt="Hello Admin">-->
<!--        <h3>Usuario</h3>
        <h2><a class="user-button" href="javascript:void(0);"><?= ucwords($user_name); ?>&nbsp;<span class="arrow-link-down"></span></a></h2>
        <ul class="dropdown-username-menu">
            <li><a href="#">Profile</a></li>
            <li><a href="#">Settings</a></li>
            <li><a href="#">Messages</a></li>
            <li><a href="./users/logout/">Logout</a></li>
        </ul>-->
<!--
        <div class="clearfix"></div>-->
    </section> <!--! end of #login-details -->

    <!-- Begin of Navigation -->
    <nav id="nav">
        <ul class="menu collapsible shadow-bottom">
            
            <!--menu de panel principal-->
            <li><a href="./welcome/" class="current"><img src="images/icons/packs/fugue/16x16/home.png">Inicio</a></li>
            <!--fin de menu de panel principal-->
            <!--menu de panel principal-->
            <li><a href="./clientes/calculadora/"><img src="images/icons/packs/fugue/16x16/icon_calc.png">Calculadora</a></li>
            <!--fin de menu de panel principal-->

            <!--Menu de clientes-->
            <li>
                <a href="javascript:void(0);"><img src="images/icons/packs/fugue/16x16/user-white.png">Clientes<span class="badge red"><?= @$num_clientes['num_clientes'];?></span></a>
                <ul class="sub">
<!--                    <li><a href="./clientes/add_cliente">Nuevo Cliente</a></li>-->
                    <li><a href="./clientes/listar_clientes">Listar Clientes</a></li>
                </ul>
            </li>
            <!--fin de menu de clientes-->

            <!--menu de Reportes-->
            <li>
                <a href="javascript:void(0);"><img src="images/icons/packs/fugue/16x16/chart.png">Reportes</a>
                <ul class="sub" style="height: 182px;">
                    <li><a href="./reportes/index/1">Cartera Actual</a></li>
                    <li><a href="./reportes/index/1">Listar por Vencimiento</a></li>
                    <li><a href="./reportes/index/2">Listar por Clientes / Vencimiento</a></li>
                    <li><a href="./reportes/index/3">Listar por Operacion</a></li>
                    
                </ul>
            </li>
            <!--fin de menu de reportes-->

            <!--menu configuraciones-->
            <li><a href="./configuraciones/"><img src="images/icons/packs/fugue/16x16/hammer-screwdriver.png">Configurar</a></li>
            <!--fin menu de configuraciones-->
            
            <li><a href="./users/logout/"><img src="images/icons/packs/fugue/16x16/door-open-in.png">Salir del sistema</a></li>
          
        </ul>
    </nav> <!--! end of #nav -->
</aside> <!--! end of #sidebar -->
