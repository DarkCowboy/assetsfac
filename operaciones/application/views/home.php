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
                    <li class="no-hover">Notificaciones</li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content">
                <div class="container_12">

                    <div class="grid_12">
                    </div>

                    <? foreach ($cupos as $row) { ?>
                        <?
                        if ($row['status'] == '0' or $row['status'] == '1') {
                            $ver_cupo = 'si';
                        }
                        ?>
                    <? } ?>

                    <? if ($ver_cupo == 'si') { ?>
                        <div class="grid_6">
                            <div class="block-border">
                                <div class="block-header">
                                    <h1>Notificaciones de Cupos</h1><span></span>
                                </div>
                                <div class="block-content">
                                    <? foreach ($cupos as $row) { ?>
                                        <? switch ($row['status']) { ?><? case "0": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert warning">
                                                        El Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> ha Solicitado nuevo Cupo
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "1": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert info">
                                                        Recuerde que el Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> esta en espera de respuesta
                                                        de la propuesta de operacion N&deg; <?= $row['n_operacion']; ?>
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "2": ?>
                                                <? if ($row['dias_restantes'] <= 7 and $row['dias_restantes'] > 0) { ?>
                                                    <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                        <div class="alert error">
                                                            El Cupo del Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> le restan 
                                                            <?= $row['dias_restantes']; ?> Dia(s) para su Vencimiento.
                                                        </div>
                                                    </a>
                                                <? } ?>
                                                <? break; ?>
                                        <? } ?>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    <? } ?>

                    <? foreach ($pagare as $row) { ?>
                        <?
                        if ($row['status'] == '0' or $row['status'] == '1' or $row['status'] == '2' and $row['dias_restantes'] <= 7) {
                            $ver_pagare = 'si';
                        }
                        ?>
                    <? } ?>

                    <? if ($ver_pagare == 'si') { ?>
                        <div class="grid_6">
                            <div class="block-border">
                                <div class="block-header">
                                    <h1>Notificaciones de Pagare</h1><span></span>
                                </div>
                                <div class="block-content">
                                    <? foreach ($pagare as $row) { ?>
                                        <? switch ($row['status']) { ?><? case "0": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert warning">
                                                        El Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> ha Solicitado nuevo Pagare
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "1": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert info">
                                                        Recuerde que el Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> esta en espera de respuesta
                                                        de la propuesta de operacion N&deg; <?= $row['n_operacion']; ?>
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "2": ?>
                                                <? if ($row['dias_restantes'] <= 7 and $row['dias_restantes'] > 0) { ?>
                                                    <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                        <div class="alert error">
                                                            El Pagare del Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> le restan 
                                                            <?= $row['dias_restantes']; ?> Dia(s) para su Vencimiento.
                                                        </div>
                                                    </a>
                                                <? } ?>
                                                <? break; ?>
                                        <? } ?>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    <? } ?>
                    
                    <? foreach ($prestamo as $row) { ?>
                        <?
                        if ($row['status'] == '0' or $row['status'] == '1' or $row['status'] == '2' and $row['dias_restantes'] <= 7) {
                            $ver_prestamo = 'si';
                        }
                        ?>
                    <? } ?>

                    <? if ($ver_prestamo == 'si') { ?>
                        <div class="grid_6">
                            <div class="block-border">
                                <div class="block-header">
                                    <h1>Notificaciones de Prestamo</h1><span></span>
                                </div>
                                <div class="block-content">
                                    <? foreach ($prestamo as $row) { ?>
                                        <? switch ($row['status']) { ?><? case "0": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert warning">
                                                        El Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> ha Solicitado nuevo Prestamo
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "1": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert info">
                                                        Recuerde que el Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> esta en espera de respuesta
                                                        de la propuesta de operacion N&deg; <?= $row['n_operacion']; ?>
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "2": ?>
                                                <? if ($row['dias_restantes'] <= 7 and $row['dias_restantes'] > 0) { ?>
                                                    <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                        <div class="alert error">
                                                            El Prestamo del Cliente <strong><?= strtoupper($row['nombre_razon_social_pn_pj']); ?></strong> le restan 
                                                            <?= $row['dias_restantes']; ?> Dia(s) para su Vencimiento.
                                                        </div>
                                                    </a>
                                                <? } ?>
                                                <? break; ?>
                                        <? } ?>
                                    <? } ?>

                                </div>
                            </div>
                        </div>
                    <? } ?>

                    <? foreach ($ventas as $row) { ?>
                        <?
                        if ($row['status'] == '0' or $row['status'] == '1' or $row['status'] == '2' and $row['dias_restantes'] <= 7) {
                            $ver_ventas = 'si';
                          
                        }
                        ?>
                    <? } ?>

                    <? if ($ver_ventas == 'si') { ?>
                        <div class="grid_6">
                            <div class="block-border">
                                <div class="block-header">
                                    <h1>Notificaciones de Ventas</h1><span></span>
                                </div>
                                <div class="block-content">
                                    <? foreach ($ventas as $row) { ?>
                                        <? switch ($row['status']) { ?><? case "0": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert warning">
                                                        El Cliente <strong><?= strtoupper($row['nom_rz_pj']); ?></strong> ha Realizado nueva solicitud de Venta
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "1": ?>
                                                <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                    <div class="alert info">
                                                        Recuerde que el Cliente <strong><?= $row['nom_rz_pj']; ?></strong> esta en espera de respuesta
                                                        de la propuesta de operacion N&deg; <?= $row['n_operacion']; ?>
                                                    </div>
                                                </a>
                                                <? break; ?>
                                            <? case "2": ?>
                                                <? if ($row['dias_restantes'] <= 7 and $row['dias_restantes'] > 0) { ?>
                                                    <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                        <div class="alert error">
                                                            La operacion de Venta  N&deg; <?= $row['n_operacion']; ?> del Cliente <strong><?= $row['nom_rz_pj']; ?></strong> le restan 
                                                            <?= $row['dias_restantes']; ?> Dia(s) para su Vencimiento.
                                                        </div>
                                                    </a>
                                                <? } ?>
                                                <? break; ?>
                                        <? } ?>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                    
                    <? foreach ($ventas as $row) { ?>
                        <?
                        if ($row['status'] == '6') {
                            $ver_ventas = 'si';
                            $moras = 'si';
                        }
                        ?>
                    <? } ?>

                    <? if ($moras == 'si') { ?>
                        <div class="grid_6">
                            <div class="block-border">
                                <div class="block-header">
                                    <h1>Notificaciones de Mora</h1><span></span>
                                </div>
                                <div class="block-content">
                                    <? foreach ($ventas as $row) { ?>
                                        <? switch ($row['status']) { ?><? case "6": ?>
                                                    <a href="./clientes/cliente_panel/<?= $row['id_cliente']; ?>">
                                                        <div class="alert error">
                                                            La operacion de Venta  N&deg; <?= $row['n_operacion']; ?> del Cliente <strong><?= strtoupper($row['nom_rz_pj']); ?></strong> tiene 
                                                            <?= $row['mora_dias']; ?> Dia(s) de Mora.
                                                        </div>
                                                    </a>
                                                <? break; ?> 
                                        <? } ?>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                    <? } ?>


                    <div class="clear height-fix"></div>

                </div></div> <!--! end of #main-content -->
        </div> <!--! end of #main -->
        <? $this->load->view('templates/footer'); ?>
        <? $this->load->view('templates/foot'); ?>
</body>
</html>