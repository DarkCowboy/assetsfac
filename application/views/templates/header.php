<?php
header('Content-Type: text/html; charset=UTF-8');
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <base href="<?= base_url(); ?>" />
        <title>ASSETS FACTORING INC - Panama</title>
        <meta name="geo.region" content="PA-8" />
        <meta name="geo.placename" content="Panam&aacute;" />
        <meta name="geo.position" content="8.982252;-79.509553" />
        <meta name="ICBM" content="8.982252, -79.509553" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="description" content="ASSETS FACTORING INC - PANAMA es una empresa especializada en la compra de los t&iacute;tulos comerciales a descuento, representados por facturas, letras de cambio, valuaciones y otros instrumentos mercantiles emitidos por empresas proveedoras de bienes y servicios y que requieren adelantar la realización de sus ventas a cr&eacute;dito, a trav&eacute;s de un mecanismo eficiente, Agil y sencillo." />
        <meta name="keywords" content="Factoring, Panama-Factoring, factoring-Panama, investment, prestamo, pagare, giro, reclasificacion, cupo, banco de factoring, letas de cambio, facturas, descuentos, compra de titulos " />
        <META content="index" name="robots" />
        <META content="index" name="googlebot" />
        <meta name='language' content='es' />
        <meta http-equiv='content-language' content='Spanish' />
        <meta name='copyright' content='Copyright - 2013 / ASSETS FACTORING INC - Todos los derechos reservados' />
        <meta content="7 days" name="revisit-after" />
        <META NAME="Author" CONTENT="Rhonald A. Brito Q." />
        <META NAME="owner" CONTENT="ASSETS FACTORING INC" />
        <meta name='rating' content='General' />
        <meta http-equiv='Pragma' content='no-cache' />
        <meta http-equiv='Cache-Control' content='no-cache' />
        <link rel="icon" type="image/png" href="images/general/favicon.png" />
        <link rel="shortcut icon" type="image/x-icon" href="images/general/favicon-small.png" />

        <!-- YUI Reset CSS
        <link rel="stylesheet" type="text/css" href="//yui.yahooapis.com/3.8.0/build/cssreset/cssreset-min.css" media="all" >
        <link rel="stylesheet" type="text/css" href="//yui.yahooapis.com/3.8.0/build/cssfonts/cssfonts-min.css" media="all" >
        <link rel="stylesheet" type="text/css" href="//yui.yahooapis.com/3.8.0/build/cssbase/cssbase-min.css" media="all" >-->

        <!-- jQuery -->
        <!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script type="text/javascript">window.jQuery || document.write('<script type="text/javascript" src="./scripts/jquery.min.js"><'+'/script>')</script>-->
        <script type="text/javascript" src="./scripts/jquery.min.js"></script>

        <!-- Soporte para html5 en IE -->
        <!--[if lt IE 9]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Soporte para placeholder -->
        <!--[if lt IE 9]>
        <script src="./scripts/jquery.placeholder.js" type="text/javascript"></script>
        <![endif]-->

        <!--[if gte IE 9]>
          <style type="text/css">
                .gradient {
                   filter: none;
                }
          </style>
        <![endif]-->

        <!-- lib.validator -->
        <link type="text/css" href="./scripts/lib.validator/css.validator.css" rel="stylesheet" media="all" />
        <script type="text/javascript" src="./scripts/lib.validator/lib.validator.js"></script>

        <!-- include jQuery + carouFredSel plugin -->
        <script type="text/javascript" language="javascript" src="scripts/caroufredsel/jquery.carouFredSel-6.1.0-packed.js"></script>
        <link type="text/css" href="scripts/caroufredsel/carou_stl.css" rel="stylesheet" media="all" />

        <!-- Anything Slider -->
        <link type="text/css" rel="stylesheet" href="scripts/anythingslider/anythingslider.css" media="all" />
        <script type="text/javascript" language="javascript" src="scripts/anythingslider/jquery.anythingslider.js"></script>

        <!-- Anything Slider optional plugins -->
        <script src="scripts/anythingslider/jquery.easing.1.2.js"></script>
        <!-- http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js -->
        <script src="scripts/anythingslider/swfobject.js"></script>

        <!--fancy box-->
        <script type='text/javascript' src='scripts/fancybox/jquery.fancybox.pack.js'></script>

        <!--webtrcker marquee-->
        <script type='text/javascript' src='scripts/webtricker.js.js'></script>
        <link type="text/css" href="css/webticker.css" rel="stylesheet" />

        <!-- Main CSS -->
        <link type="text/css" href="css/style.css" rel="stylesheet" media="all" />


        <script type="text/javascript">

            $(function() {

                $(window).resize(function() {
                    //console.log('resize '+document.body.clientWidth);
                    console.log('Viewport ' + window.innerWidth);
                });

            });

        </script>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-39626479-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>

        <script type="text/javascript">
            $(function() {
                $("#webticker").webTicker();
                $("#webticker2").webTicker({duplicate: true, speed: 40, direction: 'right', rssurl: 'http://yourwebsite.com/rss/', rssfrequency: 1, startEmpty: false, hoverpause: false});

                //                $("#stop").click(function(){
                //                    $("#webticker").webTicker('stop');
                //                });
                //
                //                $("#continue").click(function(){
                //                    $("#webticker").webTicker('cont');
                //                });
                setInterval(function() {
                    var $url = './welcome/get_url_contents/update';
                    $.get($url, function(data) {
                        $("#webticker").webTicker('update', data, 'swap');
                    });


                }, 300000);

                $("#update").click(function() {
                    $("#webticker").webTicker('update', '<li id="item1">First News Item Updated</li><li id="item3">Third News Item Updated</li><li id="item4">Fourth News Item Updated</li><li id="item9">Ninth News Item Updated</li><li id="itemnew1">This is New Item 1</li><li  id="itemnew2">This is New Item 2</li><li  id="itemnew3">This is New Item 3</li><li  id="itemnew4">This is New Item 4</li>', 'swap');
                });

                //                $("#stop2").click(function(){
                //                    $("#webticker2").webTicker('stop');
                //                });
                //
                //                $("#continue2").click(function(){
                //                    $("#webticker2").webTicker('cont');
                //                });
            });
        </script>

    </head>
    <body>
        <header>
            <div class="cls_header">
                <div class="container clearfix">
                    <div class="bg_head"></div>
                    <div class="cls_logo_top">
                        <a href="index.php" title="ASSETS FACTORING INC"><h1>ASSETS FACTORING INC</h1></a>
                    </div>

                    <div class="addres_top">
                        <p><b>Direccion:</b> Punta Pacifica, Torre las Americas, Torre A, Piso 15, Oficina 15-09 </p>
                        <p><b>Telefono:</b> +507 2944419 </p>
                        <p><b>Fax:</b> +507 2944433 </p>
                        <p><b>Email:</b> admin@assetsfactoring.com</p>
                    </div>


                    <div class="cls_qmenu">
                        <ul>
                            <li><a href="./" title="inicio" style="padding-right: 0;"><span class="ico_hm"></span>Inicio
                                    <img class="indicador" style="display:<?= $menu == 'inicio' ? 'block' : 'none' ?>;" src="images/general/indicador.png"/></a></li>
                            <li><a href="./nosotros" title="nosotros" style="padding-right: 0; "><span class="ico_cli"></span>Nosotros
                                    <img class="indicador" style="display:<?= $menu == 'nosotros' ? 'block' : 'none' ?>; left: 58px;" src="images/general/indicador.png"/></a></li>
                            <li><a href="./servicios" title="servicios" style="padding-right: 0;"><span class="ico_cnt"></span>Servicios
                                    <img class="indicador" style="display:<?= $menu == 'servicios' ? 'block' : 'none' ?>; left: 56px;" src="images/general/indicador.png"/></a></li>
                            <li><a href="./preguntas" title="preguntas" style="padding-right: 0;"><span class="ico_cnt"></span>Preguntas
                                    <img class="indicador" style="display:<?= $menu == 'preguntas' ? 'block' : 'none' ?>; left: 60px;" src="images/general/indicador.png"/></a></li>
                            <li><a href="./documentos" title="documentos" style="padding-right: 0;"><span class="ico_cnt"></span>Documentos
                                    <img class="indicador" style="display:<?= $menu == 'documentos' ? 'block' : 'none' ?>; left: 73px;" src="images/general/indicador.png"/></a></li>
                        </ul>
                    </div>

                </div>
                <div class="noticias"></div>
            </div>

        </header>

        <script>

            $(function() {
                var $url = './welcome/get_url_contents';
                $.get($url, function(data) {
                    $('.noticias').html(data);
                    jQuery('#webticker').webTicker({speed: 80});
                });
            });

        </script>

        <script>
            (function(i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function() {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-50892034-1', 'assetsfactoring.com');
            ga('send', 'pageview');

        </script>
        <style>
            .tickercontainer

            .tickercontainer .mask

            ul.newsticker {

                -webkit-transition: all 0s linear;
                -moz-transition: all 0s linear;
                -o-transition: all 0s linear;
                transition: all 0s linear;
                list-style:none;
                margin:0;
            }
            .noticias{
                overflow: hidden;
                width: 100%;
                top:4px;
                position: relative;
                display: block;
                z-index: 1000;
            }
        </style>
