<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>


<style>
    input[placeholder], [placeholder], *[placeholder]
    {
        color:lightslategrey !important;
    }
</style>

<body>
    <? $this->load->view('templates/menu'); ?>

    <div class="content">

        <div class="workplace" style="">
            <div style="width: 100%;">

                <div class="row-fluid">
                    <div class="span12">
                        <div class="head">
                            <div class="isw-documents"></div>
                            <h1>Panel de solicitud de Pagare</h1>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <form method="post" action="./pagare/nuevo_pagare/" class="form" id="validate-form" onSubmit="return validator(this);">

                    <div class="dr"><span></span></div>

                    <div class="row-fluid">
                        <!-- datos de la Empresa -->
                        <div class="span6" style="">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Datos de la Solicitud</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">                        
                                <div class="control-group">
                                    <input type="hidden" name="tipo_solicitud" id="tipo_solicitud" value="3" />  
                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Monto:</div>                 
                                        <div class="span9">
                                            <input type="text" name="monto_solicitud" id="monto_solicitud" class="monto" data-required="true" value="<?= @$solicitud['monto_solicitud'] ?>" onkeypress="return permite(event, 'numpunto')"/>  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Plazo en dias:</div>                 
                                        <div class="span9">
                                            <input type="text" name="plazo_solicitud" id="plazo_solicitud" data-required="true" value="<?= @$solicitud['plazo_solicitud'] ?>" onkeypress="return permite(event, 'num')" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="row-form">
                                        <div class="span3" style="line-height: 16px;">Destino:</div>                 
                                        <div class="span9">
                                            <input type="text" name="destino_solicitud" id="destino_solicitud" data-required="true" value="<?= @$solicitud['destino_solicitud'] ?>" />  
                                        </div>
                                        <div class="clear"></div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="span6" style="">
                            <div class="head">
                                <div class="isw-documents"></div>
                                <h1>Requisitos para la solicitud de Pagare</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">

                                <div class="row-form">
                                    <ol>
                                        <li>Fotocopia de la cedula de identidad y la del conyuge en caso de ser casado</li>
                                        <li>Registro de información fiscal. RIF</li>
                                        <li>Balance personal con antigüedad no mayor a tres (3) meses debidamente firmado por un Contador Publico Colegiado</li>
                                        <li>Referencias bancarias en original con antigüedad no mayor a sesenta (60) días</li>
                                        <li>Copia legible de I.S.L.R.  del  último año </li>
                                        <li>Constancia de trabajo o certificación de Ingresos firmada por un Contador Publico Colegiado
                                        </li>

                                    </ol>
                                </div>


                            </div>


                        </div>
                    </div>
                    <div class="row-fluid">
                    </div>
                    <div class="dr"><span></span></div>
                    <div class="row-fluid">
                        <div class="span12">
                            <div class="head" style="width: 226px;">
                                <button type="submit" class="btn btn-block">Enviar Solicitud de Pagare</button>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
        </div>   
    </div>   
</body>

<? $this->load->view('templates/footer'); ?>

</html>

