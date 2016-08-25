<? $this->load->view('templates/header'); ?>
<link type="text/css" href="js/scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
<script type="text/javascript" src="js/scripts/lib.validator/lib.validator.js"></script>
<script src="js/calendario/dhtmlxcalendar.js"></script>

<script type="text/javascript" >
    $(function(){

        myCalendar = new dhtmlXCalendarObject(["fecha_reg_pj","fecha_vcto"]);

        myCalendar.setSkin('dhx_terrace');
        myCalendar.hideTime();
        dhtmlXCalendarObject.prototype.langData["es"] = {
            dateformat: '%d.%m.%Y',
            monthesFNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthesSNames: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            daysFNames: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysSNames: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            weekstart: 1
        }
        myCalendar.loadUserLanguage('es');

    });

</script>

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
                            <h1>Panel de solicitud de Prestamo</h1>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>

                <form method="post" action="./prestamo/nuevo_prestamo/" class="form" id="validate-form" onSubmit="return validator(this);">

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
                                            <input type="text" class="monto" name="monto_solicitud" id="monto_solicitud" data-required="true" value="<?= @$solicitud['monto_solicitud'] ?>" onkeypress="return permite(event, 'numpunto')"/>  
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
                                <h1>Requisitos para la solicitud de Prestamo</h1>
                                <div class="clear"></div>
                            </div>
                            <div class="block-fluid">

                                <div class="row-form">
                                    <ol>
                                        <li>Copia del pacto social de la Compa&ntilde;&iacute;a y de las reformas registradas</li>
                                        <li>Copia de la licencia comercial, Industrial o Aviso de operaci&oacute;n</li>
                                        <li>Registro &uacute;nico de contribuyente (RUC) / RIF</li>
                                        <li>Certificaci&oacute;n del Registro P&uacute;blico (Vigencia no mayor de 3 meses)</li>
                                        <li>Tres &uacute;ltimos Estados financieros y copia de la &uacute;ltima declaracion de renta</li>
                                        <li>Listado de Clientes y Proveedores</li>
                                        <li>Referencias bancarias y Comerciales</li>
                                        <li>Dossier de la empresa</li>
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
                                <button type="submit" class="btn btn-block">Enviar Solicitud de Prestamo</button>
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

