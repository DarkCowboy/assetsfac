<? $this->load->view('templates/header') ?>
<?
$rol = rol_usuario();
?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            
        <div id="middle">
            <? $this->load->view('usuarios/menu_interno_usuario') ?>            


            <div id="center-column" style="float: left; margin: 0 auto;">
                <div class="top-bar">
                    <h1 style="text-align: center;">MODULO DE PAGO</h1>
                </div><br>
                <?
                if ($this->session->flashdata('result')) {
                    echo "<div  style=\"height: 23px; margin-top: 9px;  visibility: visible !important;\">";
                    echo $this->session->flashdata('result');
                    echo "</div>";
                }
                ?>
                
                
<p><b>BENEFICIARIOS:</b> Conforma la base de datos de los proveedores y beneficiarios de los pagos </p>
<p><b>BANCOS:</b> Conforma la base de datos de los Bancos objeto de las operaciones de pago</p>
<p><b>INSTRUCCIONES DE PAGO:</b> Son las generadas por cada salida o desembolso realizado que detalla la operación y se constituye en la base para procesar el pago, ya sea a través de cheque, transferencia o efectivo con cargo a caja chica.</p>
<p>Síntesis del Proceso:</p>
<ul>
    <li>Elaboración procesamiento e impresión de la instrucción de pago</li>
    <li>Firma de quien la elaboro y de quien autoriza</li>
    <li>Procesamiento de la emisión de cheque, transferencia o efectivo, de acuerdo al detalle de la instrucción de pago respectiva.</li>
</ul>

<p><b>IMPORTANTE</b></p>
<p>Toda operación que implique una salida de fondos debe ser procesada en este módulo sin excepción, incluso las transferencias entre cuentas internas en Bancos de Blue Numbers.</p>


            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>