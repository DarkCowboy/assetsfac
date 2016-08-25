<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_left'); ?>
        <div id="middle" style="border: none !important;">
            <div id="center-column" >
                <a href="./egresos/imprimir_editar" title="En esta seccion usted podra listar las instrucciones de pago aun no procesadas editarlas e imprimir la instruccion">
                    <img class="list_icon_pagos" src="images/icon_menu/listar_instrucciones.png" />
                </a>
                <a href="./egresos/pagos_procesar" title="En esta seccion usted solo podra procesar (aprobar) las instrucciones de pago">
                    <img class="list_icon_pagos" src="images/icon_menu/lista_pagos_pendiente.png" />
                </a>
                <a href="./egresos/pagos_procesados" title="Lista los pago realizados">
                    <img class="list_icon_pagos" src="images/icon_menu/pagos_realizados.png" />
                </a>
            </div>
        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>