<?php
header('Content-Type: text/html; charset=UTF-8');
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");

?>
<!DOCTYPE html>
<html lang="es">
    <head>        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <META name="robots" content="NOINDEX,NOFOLLOW,NOARCHIVE,NOODP,NOSNIPPET"> 
        <base href="<?= base_url(); ?>" />
        <title>ASSETS FACTORING INC.</title>

        <link rel="icon" type="image/png" href="images/general/favicon.png"/>

        <link href="css/stylesheets.css" rel="stylesheet" type="text/css" />
        <link rel='stylesheet' type='text/css' href='css/fullcalendar.print.css' media='print' />

        <script type='text/javascript' src='js/plugins/jquery.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery-ui.min.js'></script>
        <script type='text/javascript' src='js/plugins/jquery/jquery.mousewheel.min.js'></script>

        <script type='text/javascript' src='js/plugins/cookie/jquery.cookies.2.2.0.min.js'></script>

        <script type='text/javascript' src='js/plugins/bootstrap.min.js'></script>

        <script type='text/javascript' src='js/plugins/charts/excanvas.min.js'></script>
        <script type='text/javascript' src='js/plugins/charts/jquery.flot.js'></script>    
        <script type='text/javascript' src='js/plugins/charts/jquery.flot.stack.js'></script>    
        <script type='text/javascript' src='js/plugins/charts/jquery.flot.pie.js'></script>
        <script type='text/javascript' src='js/plugins/charts/jquery.flot.resize.js'></script>

        <script type='text/javascript' src='js/plugins/sparklines/jquery.sparkline.min.js'></script>



        <script type='text/javascript' src='js/plugins/select2/select2.min.js'></script>

        <script type='text/javascript' src='js/plugins/uniform/uniform.js'></script>

        <script type='text/javascript' src='js/plugins/maskedinput/jquery.maskedinput-1.3.min.js'></script>

        <script type='text/javascript' src='js/plugins/validation/languages/jquery.validationEngine-en.js' charset='utf-8'></script>
        <script type='text/javascript' src='js/plugins/validation/jquery.validationEngine.js' charset='utf-8'></script>

        <script type='text/javascript' src='js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js'></script>
        <script type='text/javascript' src='js/plugins/animatedprogressbar/animated_progressbar.js'></script>

        <script type='text/javascript' src='js/plugins/qtip/jquery.qtip-1.0.0-rc3.min.js'></script>

        <script type='text/javascript' src='js/plugins/cleditor/jquery.cleditor.js'></script>

        <script type='text/javascript' src='js/plugins/dataTables/jquery.dataTables.min.js'></script>    

        <script type='text/javascript' src='js/plugins/fancybox/jquery.fancybox.pack.js'></script>
        <!--<script type='text/javascript' src='js/desactiva_teclas.js'></script>-->

        <script type='text/javascript' src='js/cookies.js'></script>
        <script type='text/javascript' src='js/actions.js'></script>
        <script type='text/javascript' src='js/charts.js'></script>
        <script type='text/javascript' src='js/plugins.js'></script>
        
        <link rel="stylesheet" type="text/css" href="js/calendario/dhtmlxcalendar.css"></link>
        <link rel="stylesheet" type="text/css" href="js/calendario/dhtmlxcalendar_dhx_terrace.css"></link>

        <script type="text/javascript" src="js/jquery.numberformatter-1.2.3.min.js"></script>

        <script type="text/javascript" >
            $(function(){
                $('.cedula').priceFormat({
                    prefix: '',
                    suffix: '',
                    centsLimit: 0,
                    centsSeparator: ''
                
                });
        
                $('.monto').priceFormat({
                    prefix: '',
                    suffix: '',
                    centsLimit: 2,
                    centsSeparator: ','
                
                });
            });
        </script>   

    </head>