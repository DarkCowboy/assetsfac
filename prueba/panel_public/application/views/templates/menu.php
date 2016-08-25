<div class="header">
    <a class="logo" href="index.html"></a>
    <ul class="header_menu">
        <li class="list_icon"><a href="#">&nbsp;</a></li>
    </ul>    
</div>

<div class="menu">                

    <div class="breadLine">            
        <div class="arrow"></div>
        <div class="adminControl active" style="background: none !important">Bienvenido <?= ucwords($user_name); ?></div>
    </div>

    <ul class="navigation"> 

        <!--Menu Inicio-->

        <li <?= $menu == 'home' ? 'class="active"' : ''; ?>><a href="./"><span class="isw-grid"></span><span class="text">Inicio</span></a></li>  

        <!--Fin Inicio-->

        <!--------------------------------------------------------------------------------------------------------------------------------------->

        <!-- Menu de Registro datos de registro modificado
        el 29-05-2013 y aprobado por Wilian Ramirez el
        mismo dia -->

        <? if (!isset($planilla)) { ?>
            <li <?= $menu == 'planilla' ? 'class="active"' : ''; ?>>
                <a href="./panel_clientes/planilla_inscripcion/">
                    <span class="isw-text_document"></span><span class="text">Registro</span>
                    <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">

                        <? if ($tipo == '1') { ?>

                            <? if (isset($planilla)) { ?>
                                <? if (count($planilla['nomina_accionista']) > 0) { ?>
                                    <img src="images/general/ic_ok.png" /> 
                                <? } else { ?>
                                    <img src="images/general/flecha.gif" style="width: 34px;" />  
                                <? } ?> 
                            <? } ?>
                        <? } else { ?>
                            <? if (isset($planilla)) { ?>
                                <img src="images/general/ic_ok.png" /> 
                            <? } else { ?>
                                <img src="images/general/flecha.gif" style="width: 34px;" />  
                            <? } ?> 
                        <? } ?>
                    </div>
                </a>
            </li>  
        <? } else { ?>
            <li class="openable">
                <a href="#">
                    <? if ($tipo == '1') { ?>
                        <span class="isw-text_document"></span><span class="text">Ficha Juridica</span>                 
                    <? } else { ?>
                        <span class="isw-text_document"></span><span class="text">Ficha Natural</span>
                    <? } ?>
                </a>
                <ul>
                    <li>
                        <a href="<? if (isset($planilla)) { ?>./panel_clientes/planilla_inscripcion/1<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                            <span class="icon-pencil"></span><span class="text">Actualizar Datos</span>
                            <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                            </div>
                        </a>
                    </li> 
                    <li>
                        <? if ($tipo == '1') { ?>
                            <a target="_blank" href="<? if (isset($planilla)) { ?>./panel_clientes/descarga_ficha_pj<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                            <? } else { ?>
                                <a target="_blank" href="<? if (isset($planilla)) { ?>./panel_clientes/descarga_ficha_pn<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                <? } ?>
                                <span class="icon-pencil"></span><span class="text">Ver / Imprimir Ficha</span>
                                <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                </div>
                            </a>
                    </li> 
                </ul>
            </li>
        <? } ?>

        <!-- Fin del Menu de Registro datos de registro modificado
        el 29-05-2013 y aprobado por Wilian Ramirez el
        mismo dia -->

        <!--------------------------------------------------------------------------------------------------------------------------------------->
        <? // debug($planilla); ?>
        <? if ($tipo == '1') { ?>
            <li 
                <?= $menu == 'ficha_pj' ? 'class="active"' : ''; ?>>
                <a href="<? if (isset($planilla) and count($planilla['junta_directiva']) > 0) { ?>./panel_clientes/fichas_pj/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                    <span class="isw-text_document"></span><span class="text">Ficha de Persona Natural</span>
                    <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">

                        <? if (isset($planilla)) { ?>

                            <? if ($falta_ficha == '0') { ?>
                                <img src="images/general/flecha.gif" style="width: 34px;" />  
                                <?
                            }

                            if ($falta_ficha == '1') {
                                ?>
            <!--                                <img src="images/general/ic_ok.png" />   -->
                            <? } ?>
                        <? } ?> 

                    </div>
                </a>
            </li> 
        <? } ?>

        <!--------------------------------------------------------------------------------------------------------------------------------------->


        <!-- Menu de Consultas modificado
        el 29-05-2013 y aprobado por Wilian Ramirez el
        mismo dia -->

        <li class="openable">
            <a href="#">
                <span class="isw-text_document"></span><span class="text">Consultas</span>                 
            </a>
            <ul>

                <li>
                    <a href="<? if (isset($planilla)) { ?>./welcome/1<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                        <span class="icon-pencil"></span><span class="text">Posicion Actual</span>
                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                        </div>
                    </a>
                </li> 
                <li>
                    <a href="<? if (isset($planilla)) { ?>./welcome/status_solicitudes<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                        <span class="icon-pencil"></span><span class="text">Estatus de Solicitudes</span>
                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                        </div>
                    </a>
                </li> 
<!--                <li <?= $menu == 'calc_pago' ? 'class="active"' : ''; ?>>
                    <a href="./calculadora/calculadora_pago">
                        <span class="icon-pencil"></span><span class="text">Calculadora de Pago</span>
                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                        </div>
                    </a>
                </li>-->
                <li <?= $menu == 'calc_pago' ? 'class="active"' : ''; ?>>
                    <a  href="#myDivID<?= $i; ?>" id="fancyBoxLink">
                        <span class="icon-pencil"></span><span class="text">Cuentas para Depositar</span>
                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                        </div>
                    </a>
                </li>

                <div style="display:none">
                    <div id="myDivID" style="width: 400px;">
                        <span><p style="text-align: center;">Numeros de Cuentas para efectuar los pagos</p></span>
                        <span>
                            <br/>
                            <ul>
                                <li style="list-style: none;">
                                    <img src="images/general/credicorp.jpg" style="float: left;"/>
                                    <div style="float: left; margin-left: 10px;">
                                        <b>Credicorp Bank</b><br/>
                                        N&deg; de cuenta: <br/>
                                        Tipo: Corriente<br/>
                                        RUC: 2593450-1-832669
                                    </div>

                                </li>
                                <!--                                <br/>
                                                                <br/>
                                                                <hr style="border: 1px solid #9C9C9C;clear: both;display: block;margin: 32px auto 0;width: 91%;">
                                                                <br/>
                                                                <li>
                                                                    <img src="images/general/bod.jpg" style="float: left;"/>
                                                                    <div style="float: left; margin-left: 10px;">
                                                                        <b>Banco BOD / CorpBanca</b><br/>
                                                                        N&deg; de Cuenta: 0116-0118-91-0009468536<br/>
                                                                        Tipo: Corriente<br/>
                                                                        Rif: j-29719322-7
                                                                    </div>
                                
                                                                </li>
                                                                <br/>
                                                                <br/>
                                                                <hr style="border: 1px solid #9C9C9C;clear: both;display: block;margin: 32px auto 0;width: 91%;">
                                                                <br/>
                                                                <li>
                                                                    <img src="images/general/bv.jpg" style="float: left;"/>
                                                                    <div style="float: left; margin-left: 10px;">
                                                                        <b>Banco de Venezuela</b><br/>
                                                                        N&deg; de Cuenta: 0102-0275-28-0000094935<br/>
                                                                        Tipo: Corriente<br/>
                                                                        Rif: j-29719322-7
                                                                    </div>
                                
                                                                </li>
                                                                <br/><br/><br/><br/><br/>-->
                            </ul>

                        </span>
                    </div>
                </div>

                <script type="text/javascript">
                    $("a#fancyBoxLink").fancybox({
                        'href': '#myDivID',
                        'titleShow': false,
                        'transitionIn': 'elastic',
                        'transitionOut': 'elastic'
                    });
                </script>


            </ul>
        </li>

        <!-- Fin Menu de Consultas modificado
        el 29-05-2013 y aprobado por Wilian Ramirez el
        mismo dia -->


        <li class="openable">
            <a href="#">
                <span class="isw-text_document"></span><span class="text">Pagos</span>                 
            </a>
            <ul>
                <? if ($tipo == '1') { ?>
                    <li>
                        <a href="./pagos/facturas">
                            <span class="icon-pencil"></span><span class="text">Cancelacion de Facturas</span>
                            <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                            </div>
                        </a>
                    </li> 
                <? } ?>
                    <li>
                        <a href="./pagos/pagare">
                            <span class="icon-pencil"></span><span class="text">Cancelacion de Pagare</span>
                            <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                            </div>
                        </a>
                    </li> 
            </ul>
        </li>


        <!--------------------------------------------------------------------------------------------------------------------------------------->


        <li class="openable">
            <a href="#">
                <span class="isw-text_document"></span><span class="text">Solicitudes</span>                 
            </a>
            <ul>

                <!-- si es de tipo 1 que salga el menu de persona
                juridica con todas sus opciones 
                cupo, venta, pagare, prestamo.-->

                <? if ($tipo == '1') { ?>
                    <li class="openable sub" >
                        <a href="#">
                            <span class="isw-text_document"></span><span class="text">Cupo</span>                 
                        </a>
                        <ul>
                            <li 
                                <?= $menu == 'cupo' ? 'class="active"' : ''; ?>>
                                <a href="<? if (isset($planilla) and count($planilla['junta_directiva']) > 0) { ?>./cupos/nueva_solicitud/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                    <span class="icon-pencil"></span><span class="text">Nuevo</span>
                                    <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                    </div>
                                </a>
                            </li> 
                        </ul>
                    </li>

                    <li class="openable sub">
                        <a href="#">
                            <span class="isw-text_document"></span><span class="text">Venta de Facturas</span>                 
                        </a>
                        <ul>
                            <li>
                                <a href="<? if ($cupo_activo == true) { ?>./facturas/cargar_facturas<? } else { ?> javascript:alert('Usted no puede realizar esta operacion ya que no posee un cupo activo')<? } ?>">
                                    <span class="icon-pencil"></span><span class="text">Nueva Venta</span>
                                    <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                    </div>
                                </a>
                            </li> 
                            <!--                            <li>
                                                            <a href="<? if ($cupo_activo == true) { ?>./facturas/refinanciar<? } else { ?> javascript:alert('Usted no puede realizar esta operacion ya que no posee un cupo activo')<? } ?>">
                                                                <span class="icon-pencil"></span><span class="text">Refinanciamineto</span>
                                                                <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                                </div>
                                                            </a>
                                                        </li> -->
                        </ul>
                    </li>


                    <li class="openable sub">
                        <a href="#">
                            <span class="isw-text_document"></span><span class="text">Pagare</span>                 
                        </a>
                        <ul>
                            <li>
                                <a href="<? if (isset($planilla) and count($planilla['junta_directiva']) > 0) { ?>./pagare/nuevo_pagare/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                    <span class="icon-pencil"></span><span class="text">Nuevo Pagare</span>
                                    <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                    </div>
                                </a>
                            </li> 
                            <!--                            <li>
                                                            <a href="<? if (isset($planilla) and count($planilla['junta_directiva']) > 0) { ?>./pagare/refinanciar/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                                                <span class="icon-pencil"></span><span class="text">Refinanciamineto</span>
                                                                <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                                </div>
                                                            </a>
                                                        </li> -->
                        </ul>
                    </li>

                    <!--                    <li class="openable sub">
                                            <a href="#">
                                                <span class="isw-text_document"></span><span class="text">Pr&eacute;stamo Comercial</span>                 
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="<? if (isset($planilla) and count($planilla['junta_directiva']) > 0) { ?>./prestamo/nuevo_prestamo/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                                        <span class="icon-pencil"></span><span class="text">Nuevo Pr&eacute;stamo</span>
                                                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                        </div>
                                                    </a>
                                                </li> 
                                                <li>
                                                    <a href="<? if (isset($planilla) and count($planilla['junta_directiva']) > 0) { ?>./prestamo/refinanciar/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                                        <span class="icon-pencil"></span><span class="text">Refinanciamineto</span>
                                                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                        </div>
                                                    </a>
                                                </li> 
                                            </ul>
                                        </li>-->

                <? } else { ?>
                    <li class="openable sub">
                        <a href="#">
                            <span class="isw-text_document"></span><span class="text">Pagare</span>                 
                        </a>
                        <ul>
                            <li>
                                <a href="<? if (isset($planilla)) { ?>./pagare/nuevo_pagare/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                    <span class="icon-pencil"></span><span class="text">Nuevo Pagare</span>
                                    <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                    </div>
                                </a>
                            </li> 
                            <!--                            <li>
                                                            <a href="<? if (isset($planilla)) { ?>./pagare/refinanciar<? } else { ?> javascript:alert('Usted no puede realizar esta operacion ya que no posee un cupo activo')<? } ?>">
                                                                <span class="icon-pencil"></span><span class="text">Refinanciamineto</span>
                                                                <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                                </div>
                                                            </a>
                                                        </li> -->

                        </ul>
                    </li>

                    <!--                    <li class="openable sub">
                                            <a href="#">
                                                <span class="isw-text_document"></span><span class="text">Pr&eacute;stamo Comercial</span>                 
                                            </a>
                                            <ul>
                                                <li>
                                                    <a href="<? if (isset($planilla)) { ?>./prestamo/nuevo_prestamo/<? } else { ?> javascript:alert('Por favor llene primero la planilla de Inscripcion')<? } ?>">
                                                        <span class="icon-pencil"></span><span class="text">Nuevo Pr&eacute;stamo</span>
                                                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                        </div>
                                                    </a>
                                                </li> 
                                                <li>
                                                    <a href="<? if (isset($planilla)) { ?>./prestamo/refinanciar<? } else { ?> javascript:alert('Usted no puede realizar esta operacion ya que no posee un cupo activo')<? } ?>">
                                                        <span class="icon-pencil"></span><span class="text">Refinanciamineto</span>
                                                        <div style="display: inline-block;float: right;position: absolute;right: 2px;top: 3px;">
                                                        </div>
                                                    </a>
                                                </li> 
                    
                                            </ul>
                                        </li>-->

                <? } ?>

            </ul>

        </li>

        <li>
            <a href="./welcome/cambiar_password">
                <span class="isw-unlock"></span><span class="text">Cambio de Clave</span>
            </a>
        </li>

        <li <?= $menu == 'home' ? 'class="active"' : ''; ?>>
            <a href="./clientes/logout">
                <span class="isw-grid"></span><span class="text">Cerrar Sesi&oacute;n</span>
            </a>
        </li>


    </ul>
    <div class="head">
        <h1 style="font-size: 12px; text-align: center;">Calendario de Vencimientos</h1>
    </div>
    <div class="block-fluid">
        <div id="calendar" class="fc"></div>
    </div>

</div>