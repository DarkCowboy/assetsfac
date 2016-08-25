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
                    <li class="no-hover"></li>
                </ul>
            </div> <!--! end of #title-bar -->

            <div class="shadow-bottom shadow-titlebar"></div>

            <!-- Begin of #main-content -->
            <div id="main-content">
                <div class="container_12">

                    <div class="grid_6">
                        <div class="block-border">
                            <div class="block-header">
                                <h1>Esquema de Factoring</h1><span></span>
                            </div>
                            <div class="block-content">

                                <div class="">

                                    <br/>
                                    <table style="width: 100%;">
                                        <tr>
                                            <td>Valor Nominal</td>
                                            <td class="">
                                                <input type="text" id="nominal" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen;" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="nominal2" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen;" " />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Plazo</td>
                                            <td class="">
                                                <input type="text" id="plazo" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen; " >
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="plazo2" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen; ">-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Precio</td>
                                            <td class="">
                                                <input type="text" id="precio" class="numeric" data-required="true" value="0" style="text-align: right; background: palegreen;" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="precio2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rendimiento Anualizado</td>
                                            <td class="">
                                                <input type="text" id="rendimiento" class="numeric" style="text-align: right; background: palegreen;" value="0" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="rendimiento2" class="numeric" style="text-align: right; background: palegreen;" value="52,17" />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Total Desembolso</td>
                                            <td class="">
                                                <input type="text" id="monto" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="monto2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tasa Efectiva</td>
                                            <td class="">
                                                <input type="text" id="tefectiva" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="tefectiva2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Inversion Inicial</td>
                                            <td class="">
                                                <input type="text" id="inversion" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="inversion2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Diferencial</td>
                                            <td class="">
                                                <input type="text" id="ganancia" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                                            </td>
                                            <td class="">
                                                <!--<input type="text" id="ganancia2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />-->
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">
                                                <input type="button" onclick="limpia();" value="Reestablecer">
                                                <script>
                                                    
                                                       function limpia(){
                                                           $('#nominal').val('0,00');
                                                           $('#plazo').val('0');
                                                           $('#precio').val('0,00');
                                                           $('#rendimiento').val('0,00');
                                                           $('#monto').val('');
                                                           $('#tefectiva').val('');
                                                           $('#inversion').val('');
                                                           $('#ganancia').val('');
                                                       } 
                                                    
                                                </script>
                                            </td>
                                        </tr>
<!--                                        <tr>
                                            <td>Saldo Final</td>
                                            <td class="">-->
                                        <input type="hidden" id="sfinal" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />
                                        <!--                                            </td>
                                                                                    <td class="">-->
                                        <!--<input type="hidden" id="sfinal2" class="numeric" readonly="readonly" style="text-align: right; background: #fcefa1;" />-->
                                        <!--                                            </td>
                                                                                </tr>-->
                                        </table><br>
                                </div>



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

