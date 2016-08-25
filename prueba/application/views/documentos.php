<?php $this->load->view('templates/header'); ?>

<div class="container" id="container">
    <?php $this->load->view('templates/banner'); ?>
    <?php $this->load->view('templates/botonera'); ?>


    <div class="contenido_centro">

        <div class="contenido_50">  
            <p class="texto_centrado">Recaudos para Personas Jur&iacute;dicas: </p>
            <ol>
                <li>Rellenar ficha de persona Juridica (en l&iacute;nea)</li>
                <li>Copia del pacto social de la Compa&ntilde;&iacute;a y de las reformas registradas</li>
                <li>Copia de la licencia comercial, Industrial o Aviso de operación</li>
                <li>Registro &uacute;nico de contribuyente (RUC) / RIF</li>
                <li>Certificaci&oacute;n del Registro P&uacute;blico (Vigencia no mayor de 3 meses)</li>
                <li>Tres &uacute;ltimos Estados financieros y copia de la &uacute;ltima declaracion de renta</li>
                <li>Referencias bancarias y Comerciales</li>
                <li>Dossier de la empresa</li>
            </ol>
            <br/>
            <p class="texto_centrado">Recaudos para Personas Naturales: </p>
            <ol>
                <li>Rellenar las fichas de Persona Natural (en l&iacute;nea)</li>
                <li>Copia de la cedula y pasaporte</li>
                <li>Balance personal con no mas de 3 meses de antiguedad</li>
                <li>Referencias bancarias y Comerciales</li>
            </ol>
            <br/>
            <p class="texto_centrado">De la Solicitud: </p>
            <ol>
                <li>Rellenar solicitud de cupo (en l&iacute;nea)</li>
                <li>Consignar la Solicitud de Cupo, la ficha de Persona Juridica y las de  Personas  Naturales debidamente rellenadas y firmadas en original</li>
                <li>Consignar los recaudos antes enumerados tanto de Persona Juridica como de Personas Naturales</li>
            </ol>
        </div>

        <div class="contenido_50 publicidad_documentos">
            <a href="panel_public/clientes/registrarse" target="_blank">
                <img src="images/general/pub_1.png" width="400" alt="Assets Factoring sesion y registro" title="Assets Factoring sesion y registro" style="margin-top: 13px;margin-bottom: 46px;" />
            </a>   
        </div>


    </div>
</div>
<?php $this->load->view('templates/inicio_sesion_movil'); ?>
<?php $this->load->view('templates/botonera_movil'); ?>
<?php $this->load->view('templates/footer'); ?>
</body>
</html>