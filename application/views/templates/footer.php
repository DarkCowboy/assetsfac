
<div class="footer">
    <hr style="color: #c9c9c9;">
    <p class="texto_footer">
        <a href="./">Inicio</a>
        |
        <a href="./nosotros">Nosotros</a>
        |
        <a href="./servicios">Servicios</a>
        |
        <a href="./preguntas">Preguntas Frecuentes</a>
        |
        <a href="./documentos">Documentos</a>
        |
        <a href="./contactos">Contactenos</a>
    </p>
    <p class="texto_footer">
        Direccion: Punta Pacifica, Torre las Americas, Torre A, Piso 15, Oficina 15-09
    </p>
    <p class="texto_footer">
        Telefonos: +507 2944419 Fax: +507 2944433
    </p>
    <p class="texto_footer">
        Email: <a href="mailto:">admin@assetsfactoring.com</a>
    </p>
    <p class="texto_footer">
        <a href="http://assetsfactoring.com">ASSETS FACTORING INC</a> - Copyright 2014. Todos los derechos reservados<br/>
    </p>
</div>

<div class="bg_footer"></div>
<link rel="stylesheet" type="text/css" href="scripts/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<script type="text/javascript">
    $(document).ready(function() {

        $('.fancybox').fancybox(
        {
            'autoDimensions'	: false,
            'width'      		: 600,
            'minHeight'      		: 200,
            'maxHeight'      		: 340,
            'transitionIn'		: 'none',
            'transitionOut'		: 'none',
            'fitToView'             : false,
            'autoSize'              : false,
            'modal' : false
        }
    );

    });
</script>
<!--
<script type="text/javascript">
    var bodyHeight = null;
    var baseHeight = null;
    var quienContiene = "#container";
    function setHeight() {
        if (bodyHeight == null) {
            bodyHeight = $('body').height();
            baseHeight = $(quienContiene).height();
        }
        var windowHeight = $(window).height();

        if(bodyHeight < windowHeight) {
            var diffHeight = windowHeight - bodyHeight ;

            $(quienContiene).clearQueue();
            $(quienContiene).animate({height:baseHeight+diffHeight});
        }
    }

    //$(document).ready(function() {setHeight();});
    $(window).load(function() {setHeight();});
    $(window).resize(function() {setHeight();});

</script>    -->
