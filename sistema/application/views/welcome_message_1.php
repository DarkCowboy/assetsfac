<? $this->load->view('templates/header') ?>
<body>
    <div id="main">
        <? $this->load->view('templates/menu_top') ?>            

        <div id="middle">
            <div id="center-column" style="float: none; margin: 0 auto;">
                <div class="top-bar">
                    <h1>MODULO DE PAGO</h1>
                </div><br>

                <div class="head">
                    <h1 style="font-size: 12px; text-align: center;">&nbsp;</h1>
                </div>
                <div class="block-fluid">
                    <p><b>BENEFICIARIOS:</b> Conforma la base de datos de los proveedores y beneficiarios de los pagos</p> 
                    <p><b>BANCOS:</b> Conforma la base de datos de los Bancos objeto de las operaciones de pago</p> 
                    <p><b>INSTRUCCIONES DE PAGO:</b> Son las generadas por cada salida o desembolso realizado que detalla la operaci&oacute;n y se constituye en la base para procesar el pago, ya sea a trav&eacute;s de cheque, transferencia o efectivo con cargo a caja chica.
                    </p>
                    <p>S&iacute;ntesis del Proceso:</p>
                    <ol>
                        <li>Elaboraci&oacute;n procesamiento e impresi&oacute;n de la instrucci&oacute;n de pago.</li>
                        <li>Firma de quien la elaboro y de quien autoriza.</li>
                        <li>Procesamiento de la emisi&oacute;n de cheque, transferencia o efectivo, de acuerdo al detalle de la instrucci&oacute;n de pago respectiva.</li>
                    </ol>
                    <br/>

                    <p><b>IMPORTANTE</b></p>

                    <p><b>Toda operaci&oacute;n que implique una salida de fondos debe ser procesada en este m&oacute;dulo sin excepci&oacute;n, 
                            incluso las transferencias entre cuentas internas en Bancos de Blue Numbers.</b></p>
                    <br/>
                    <p>Si posee algun inconveniente o alguna duda escriba al correo 
                        <a href="mailto:rbrito@msfactoring.com.ve" >
                            <b>rbrito@msfactoring.com.ve</b> 
                        </a>
                        o comuniquese a los numeros +58(212)9525573 / +58(212)9525321
                    </p>
                </div>

            </div>

        </div>
        <? $this->load->view('templates/footer') ?>
    </div>
</body></html>