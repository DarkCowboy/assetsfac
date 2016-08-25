<?php $this->load->view('templates/header'); ?>

<script type="text/javascript" src="//maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
    var agencias = null
    var prueba = null;
    var map = null

    var my_marker = null

    var infowindow = new google.maps.InfoWindow({content: "Cargando..."});

    var optionEmpty = null;
    $(document).ready(function(){

        // inicio crear mapa
        
        var mapOptions = {
            center: new google.maps.LatLng(8.982314,-79.509559),
            zoom: 18,
            mapTypeId: google.maps.MapTypeId.ROADMAP /* HYBRID | ROADMAP | SATELLITE| TERRAIN */
        };
        map = new google.maps.Map(document.getElementById("map_canvas"),mapOptions);

        my_marker = new google.maps.Marker({
            position: new google.maps.LatLng(8.982314,-79.509559),
            title: 'Assets Factoring INC',
            icon: 'images/general/icon_ms.png',
            map: map
        });

        google.maps.event.addListener(map, 'rightclick', function(event) {
            console.log(event);
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            var zoom = map.getZoom();
            my_marker.setPosition(event.latLng);

            $('#lat').val(lat);
            $('#lng').val(lng);
            $('#zoom').val(zoom);
            $('.script-lat').text(lat);
            $('.script-lng').text(lng);
            $('.script-zoom').text(zoom);
        });

    });
</script>

<div class="container" id="container">
    <?php $this->load->view('templates/banner'); ?>
    <?php $this->load->view('templates/botonera'); ?>


    <div class="contenido_centro">

        <div class="contenido_50">  
            <div id="map_canvas" style="width:400px; height:410px; margin-right: 10px;"></div>
        </div>

        <div class="contenido_50">
            <div>
                <p class="texto_centrado"><b>Formulario de Contacto</b></p><br/>
                <p class="texto_justificado">Puede escribirnos sin ningun compromiso y en la brevedad le contactaremos.</p>
                <p>Nombre:</p>
                <p><input type="text" style="width: 98%;"/></p>
                <p>Telefono de Contacto:</p>
                <p><input type="text" style="width: 98%;"/></p>
                <p>Email:</p>
                <p><input type="text" style="width: 98%;"/></p>
                <p>Comentario:</p>
                <p><textarea  style="width: 98%;"></textarea></p>
                <p><input type="submit" value="Enviar" style="width: 100%;" /></p>
            </div>
        </div>


    </div>
</div>
    <?php $this->load->view('templates/inicio_sesion_movil'); ?>
    <?php $this->load->view('templates/botonera_movil'); ?>
    <?php $this->load->view('templates/footer'); ?>
</body>
</html>