<?php $this->load->view('templates/header'); ?>

<div class="container" id="container">
    <?php $this->load->view('templates/banner'); ?>
    <?php $this->load->view('templates/botonera'); ?>



    <div class="contenido_texto">

        <span>
            <p>
                ASSETS FACTORING INC, es una empresa especializada en la compra de los títulos comerciales a descuento, 
                representados por facturas, letras de cambio, valuaciones y otros instrumentos mercantiles emitidos 
                por empresas proveedoras de bienes y servicios y que requieren adelantar la realización de sus ventas 
                a crédito, a través de un mecanismo eficiente, ágil y sencillo.
            </p>
            <p>
                En tal sentido nuestra empresa desarrolla una actividad dirigida a satisfacer la constante y creciente
                demanda del sector industrial y comercial de capital de trabajo, bajo la premisa de "veda a crédito 
                y cobre de contado", garantizando a nuestros clientes disponibilidades de caja que le maximicen el 
                desarrollo de su actividad comercial.
            </p>
        </span>
    </div>
    <div class="contenido_centro">

        <div class="contenido_50">
            <img src="images/general/mision.png" width="100" alt="Mision Assets Factoring" style="float: left; margin: 10px;">
            <p style="text-align: justify;">
                <b>Misión:</b> Establecer una sociedad con nuestros clientes a través de un soporte integral de calidad y eficiencia 
                total bajo la figura de compra de sus cuentas por cobrar a descuento, que les permita transformar
                de inmediato sus acreencias en efectivo a través de un mecanismo, ágil cómodo y seguro que logre la satisfacción total.
            </p>
        </div>

        <div class="contenido_50">  
            <img src="images/general/vision.png" width="100" alt="Vision Assets Factoring" style="float: left; margin: 10px;">
            <p style="text-align: justify;">
                <b>Visión:</b> Posesionarnos como la empresa líder en el mercado, a través de una infraestructura con cobertura nacional,
                que logre solucionar las diferentes situaciones que se presente en el flujo de efectivo de nuestros clientes y 
                mantener presencia en Latinoamérica y en el Caribe para ofrecer a nivel regional los servicios a la empresas con
                presencia en los mercados internacionales.
            </p>
        </div>
    </div>
</div>
    <?php $this->load->view('templates/inicio_sesion_movil'); ?>
    <?php $this->load->view('templates/botonera_movil'); ?>
    <?php $this->load->view('templates/footer'); ?>
</body>
</html>