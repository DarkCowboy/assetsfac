<link href="css/reclasificacion_style.css" type="text/css" rel="stylesheet" />

<div class="cuerpo">
    <div class="titulo_gnral">RECLASIFICACION <?= strtoupper($data_empresa['nom_rz_pj'])?></div>

    <div class="contenido_izquierdo">

        <div class="titulo">
            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td_sep">ESTADOS FINANCIEROS (EN <?= $moneda['value']; ?>)</td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha1']; ?></td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha2']; ?></td>
                    <td class="fecha_end" style="font-weight: bold;"><?= $reclasifi['fecha3']; ?></td>
                </tr>
            </table>
        </div>
        <div class="contenido">

            <!-- tabla activos circulantes -->

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td"><b>ACTIVOS</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td"><b>ACTIVO CIRCULANTE</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td">Caja Chica</td>
                    <td class="montos"><?= number_format($reclasifi['txtcajachica'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcajachica2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcajachica3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Caja y Bancos</td>
                    <td class="montos"><?= number_format($reclasifi['txtcajabancos'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcajabancos2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcajabancos3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Cobrar</td>
                    <td class="montos"><?= number_format($reclasifi['txtctascobrar'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctascobrar2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctascobrar3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Efectos por Cobrar</td>
                    <td class="montos"><?= number_format($reclasifi['txtefeccobrar'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtefeccobrar2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtefeccobrar3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td"> - Comision de Cuentas Incobrables</td>
                    <td class="montos"><?= number_format($reclasifi['txtincobrables'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtincobrables2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtincobrables3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td"> Inventario de Materia Prima</td>
                    <td class="montos"><?= number_format($reclasifi['txtinvmateriaprima'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinvmateriaprima2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinvmateriaprima3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td"> Inventario de Materia en Proceso</td>
                    <td class="montos"><?= number_format($reclasifi['txtinvmaterialproc'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinvmaterialproc2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinvmaterialproc3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td"> Inventario de Productos Terminados</td>
                    <td class="montos"><?= number_format($reclasifi['txtinvprodterminado'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinvprodterminado2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinvprodterminado3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td"> - Provision de Obsolescencia</td>
                    <td class="montos"><?= number_format($reclasifi['txtobsolencia'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtobsolencia2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtobsolencia3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total"> TOTAL ACTIVO CIRCULANTE</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalActCirc'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalActCirc2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalActCirc3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>

            <!-- tabla activos fijos -->

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td"><b>ACTIVOS FIJOS</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td">Terrenos</td>
                    <td class="montos"><?= number_format($reclasifi['txtterrenos'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtterrenos2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtterrenos3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Edificios / Oficinas / Galpones</td>
                    <td class="montos"><?= number_format($reclasifi['txtedif'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtedif2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtedif3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Maquinarias y Equipos</td>
                    <td class="montos"><?= number_format($reclasifi['txtmaquinaria'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtmaquinaria2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtmaquinaria3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Instalaciones (Mejoras)</td>
                    <td class="montos"><?= number_format($reclasifi['txtinstmejoras'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinstmejoras2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtinstmejoras3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Moviliario y Equipos</td>
                    <td class="montos"><?= number_format($reclasifi['txtmobiliario'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtmobiliario2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtmobiliario3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Repuestos, Accesorios y Herramientas</td>
                    <td class="montos"><?= number_format($reclasifi['txtRespAccHerra'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRespAccHerra2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRespAccHerra3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Vehiculos y Equipos de Transportes</td>
                    <td class="montos"><?= number_format($reclasifi['txtvehiculo'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtvehiculo2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtvehiculo3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">- Depreciacion Acomulada</td>
                    <td class="montos"><?= number_format($reclasifi['txtdepreciacion'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtdepreciacion2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtdepreciacion3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Construcciones en Proceso</td>
                    <td class="montos"><?= number_format($reclasifi['txtContrucEnProceso'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtContrucEnProceso2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtContrucEnProceso3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total"> TOTAL ACTIVO FIJOS</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalActFijo'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalActFijo2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalActFijo3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>

            <!-- tabla otros activos -->

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td"><b>OTROS ACTIVOS</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td">Depositos en Garantia</td>
                    <td class="montos"><?= number_format($reclasifi['txtdepgarantia'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtdepgarantia2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtdepgarantia3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cargos Diferidos</td>
                    <td class="montos"><?= number_format($reclasifi['txtcargosdif'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcargosdif2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcargosdif3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Credito Fiscal y Gastos Prepagados</td>
                    <td class="montos"><?= number_format($reclasifi['txtcredfiscal'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcredfiscal2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcredfiscal3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Cobrar Accionistas, Relacionadas y Otras</td>
                    <td class="montos"><?= number_format($reclasifi['txtctascobraracc'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctascobraracc2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctascobraracc3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Otros Activos</td>
                    <td class="montos"><?= number_format($reclasifi['txtotrosact'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtotrosact2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtotrosact3'], 0, ',', '.'); ?></td>
                </tr>


                <tr>
                    <td class="titulo_total"> TOTAL OTROS ACTIVOS</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalOtrosAct'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalOtrosAct2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalOtrosAct3'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="titulo_total"> TOTAL ACTIVOS</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalAct'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalAct2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalAct3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>

            <!-- tabla Pasivos Circulantes -->

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td"><b>PASIVOS CIRCULANTES</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td">Obligaciones Bancarias</td>
                    <td class="montos"><?= number_format($reclasifi['txtobligbancarias'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtobligbancarias2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtobligbancarias3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Porción Circulante Deuda Largo Plazo</td>
                    <td class="montos"><?= number_format($reclasifi['txtdeudalp'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtdeudalp2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtdeudalp3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Pagar</td>
                    <td class="montos"><?= number_format($reclasifi['txtctaspagar'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctaspagar2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctaspagar3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Efectos Por Pagar</td>
                    <td class="montos"><?= number_format($reclasifi['txtefecpagar'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtefecpagar2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtefecpagar3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Retenciones por Pagar</td>
                    <td class="montos"><?= number_format($reclasifi['txtretenciones'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtretenciones2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtretenciones3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Gastos Acumulados</td>
                    <td class="montos"><?= number_format($reclasifi['txtgastosacum'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtgastosacum2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtgastosacum3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">I.S.L.R. por Pagar / IVA / Retenciones</td>
                    <td class="montos"><?= number_format($reclasifi['txtimpuestospagar'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtimpuestospagar2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtimpuestospagar3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Prestaciones Sociales por Pagar</td>
                    <td class="montos"><?= number_format($reclasifi['txtprestaciones'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtprestaciones2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtprestaciones3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Otros Pasivos Corrientes</td>
                    <td class="montos"><?= number_format($reclasifi['txtotrospasivos'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtotrospasivos2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtotrospasivos3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total"> TOTAL PASIVOS CIRCULANTES</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivoCirc'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivoCirc2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivoCirc3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>

            <!-- tabla Pasivos a largo plazo -->

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td"><b>PASIVOS A LARGO PLAZO</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Pagar Relacionadas y Accionistas</td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasAccionistas'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasAccionistas2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasAccionistas3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Pagar a L/P y Obligaciones Bancarias L/P</td>
                    <td class="montos"><?= number_format($reclasifi['txtctaspagarlp'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctaspagarlp2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtctaspagarlp3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">TOTAL PASIVOS A LARGO PLAZO</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivoLP'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivoLP2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivoLP3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total"> TOTAL PASIVOS</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivos'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivos2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasivos3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>

            <!-- tabla Capital -->

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td"><b>CAPITAL</b></td><td></td><td></td><td></td>
                </tr>

                <tr>
                    <td class="titulo_td">Capital Social</td>
                    <td class="montos"><?= number_format($reclasifi['txtcapitalsocial'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcapitalsocial2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcapitalsocial3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">- Cuota de Capital no Pagada</td>
                    <td class="montos"><?= number_format($reclasifi['txtcapitalnopago'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcapitalnopago2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtcapitalnopago3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Reserva Legal</td>
                    <td class="montos"><?= number_format($reclasifi['txtreserva'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtreserva2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtreserva3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Superavit Acumulado</td>
                    <td class="montos"><?= number_format($reclasifi['txtSuperavitAcum'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSuperavitAcum2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSuperavitAcum3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Superavit por Revaluación</td>
                    <td class="montos"><?= number_format($reclasifi['txtSuperavitReeval'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSuperavitReeval2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSuperavitReeval3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Resultado del Ejercicio</td>
                    <td class="montos"><?= number_format($reclasifi['txt_ejercicio'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txt_ejercicio2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txt_ejercicio3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total"> TOTAL CAPITAL CONTABLE</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalCapital'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalCapital2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalCapital3'], 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td class="titulo_total"> TOTAL PASIVOS Y CAPITAL</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasCap'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasCap2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtTotalPasCap3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>

        </div>
        <div class="titulo">
            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td_sep">GANANCIAS Y PERDIDAS</td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha1']; ?></td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha2']; ?></td>
                    <td class="fecha_end" style="font-weight: bold;"><?= $reclasifi['fecha3']; ?></td>
                </tr>
            </table>
        </div>
        <div class="contenido">            

            <!-- tabla activos ganancias y perdidas -->

            <table class="tabla-contenido">

                <tr>
                    <td class="titulo_td">Ventas Netas</td>
                    <td class="montos"><?= number_format($reclasifi['txtVentasNetas'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtVentasNetas2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtVentasNetas3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Costo de Ventas y Servicios</td>
                    <td class="montos"><?= number_format($reclasifi['txtCostoVentas'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCostoVentas2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCostoVentas3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Beneficio Bruto</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefBruto'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefBruto2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefBruto3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Gastos Administrativos y Generales</td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosAdm'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosAdm2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosAdm3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Beneficio Neto en Operaciones</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefNetoOper'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefNetoOper2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefNetoOper3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Otros Ingresos</td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosIngresos'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosIngresos2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosIngresos3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Otros Egresos</td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosEgresos'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosEgresos2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosEgresos3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Gastos Financieros</td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosFinanc'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosFinanc2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosFinanc3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Beneficio Antes de Impuestos y No Usuales</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefAntesImpNoUsuales'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefAntesImpNoUsuales2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefAntesImpNoUsuales3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Impuestos Sobre la Renta</td>
                    <td class="montos"><?= number_format($reclasifi['txtislr'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtislr2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtislr3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Ajustes en Planta</td>
                    <td class="montos"><?= number_format($reclasifi['txtAjustePlanta'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAjustePlanta2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAjustePlanta3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Ajustes en Inversiones</td>
                    <td class="montos"><?= number_format($reclasifi['txtAjusteInv'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAjusteInv2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAjusteInv3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Beneficio Neto después de No Usuales</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefDespNoUsuales'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefDespNoUsuales2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtBenefDespNoUsuales3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Dividendos Pagados en Efectivo</td>
                    <td class="montos"><?= number_format($reclasifi['txtDivPagosEfect'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtDivPagosEfect2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtDivPagosEfect3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Resultado del Ejercicio</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEjercicio'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEjercicio2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEjercicio3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Aumento del Capital Social</td>
                    <td class="montos"><?= number_format($reclasifi['txtAumCapSocial'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAumCapSocial2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAumCapSocial3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Disminución del Capital Social</td>
                    <td class="montos"><?= number_format($reclasifi['txtDismCapSocial'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtDismCapSocial2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtDismCapSocial3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Aumento de la Reserva Legal</td>
                    <td class="montos"><?= number_format($reclasifi['txtAumReservaLegal'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAumReservaLegal2'], 0, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAumReservaLegal3'], 0, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">AUM. O DISM. DEL CAP. CONTABLE</td>
                    <td class="monto_total"><?= number_format($reclasifi['txtAumDismCapContable'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtAumDismCapContable2'], 0, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtAumDismCapContable3'], 0, ',', '.'); ?></td>
                </tr>
                <tr><td></td><td></td><td></td><td></td></tr>
            </table>
        </div>

    </div>


    <div class="contenido_derecho">

        <!--Flujo de Fondos-->
        
        <div class="titulo">
            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td" style="text-align: center; font-weight: bold;">FLUJO DE FONDOS (EN <?= $moneda['value']; ?>)</td>
                    <td class="fechas" style="font-weight: bold;"></td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha1'] . '/' . $reclasifi['fecha2']; ?></td>
                    <td class="fecha_end" style="font-weight: bold;"><?= $reclasifi['fecha2'] . '/' . $reclasifi['fecha2']; ?></td>
                </tr>
            </table>
        </div>
        <div class="contenido">

            <table class="tabla-contenido">

                <tr>
                    <td class="titulo_total">Beneficio Neto Después de No Usuales</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtFFBenefNetoDespNoUsu'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtFFBenefNetoDespNoUsu1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Depreciación</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtDepreciacion0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtDepreciacion1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Provisión para Impuesto</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtProvImp0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtProvImp1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Provisión de Cuentas Incobrables</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtProvCtasInco0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtProvCtasInco1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Provisión de Obsolescencia</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtProvObsolencia0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtProvObsolencia1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Generación o Absorción Por Operaciones</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsobOper0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsobOper1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Cobrar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasCobrar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasCobrar1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Efectos por Cobrar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtEfecCobrar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEfecCobrar1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Inventarios</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtInventario0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtInventario1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Pagar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasPagar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasPagar1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Efectos por Pagar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtEfecPagar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEfecPagar1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Gastos Acumulados</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosAcum0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtGastosAcum1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Generación o Absorción Por Inversión de Trabajo</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorInvTrab0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorInvTrab1'], 2, ',', '.'); ?></td>

                </tr>

                <tr>
                    <td class="titulo_total">Gastos e Inversión en Planta</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGastoInvPlanta0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGastoInvPlanta1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Depósitos en Garantía</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtDepoGaran0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtDepoGaran1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cargos Diferidos y Otros Activos</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCargoDifOtroAct0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCargoDifOtroAct1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Credito Fiscal y Gastos Prepagados</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCredFiscalGastoPrep0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCredFiscalGastoPrep1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Cobrar Accionistas, Relacionadas y Otras</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasCobrarAccRel0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasCobrarAccRel1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Impuestos por Pagar y Retenciones</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtImpPagarReten0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtImpPagarReten1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Retenciones por Pagar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtRetenPagar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRetenPagar1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Prestaciones Sociales por Pagar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtPrestSocialesPagar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtPrestSocialesPagar1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Otros Pasivos Corrientes</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosPasivosCorr0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtOtrosPasivosCorr1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Generación o Absorción por Otros Activos o Pasivos</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorbActPas0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorbActPas1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Inversiones</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtInversiones0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtInversiones1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Pago de dividendos (-) / Reposición de Pérdida (+)</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtPagoDivRepoPerd0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtPagoDivRepoPerd1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Generación o Absorción por Inversiones y Dividendos</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorbInvDiv0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorbInvDiv1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Generación o Absorción Antes de Financiamiento</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorbAntesFinanc0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorbAntesFinanc1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Préstamos a corto plazo</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtPrestamoCP0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtPrestamoCP1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Porción circulante Préstamo a Largo Plazo</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtPrestamoLP0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtPrestamoLP1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Pagar Relacionadas</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasPagarRel0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasPagarRel1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Venta de Acciones - Aumento de Capital Social</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtVentaAccAumCapSoc0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtVentaAccAumCapSoc1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Aumento de la Reserva Legal</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtAumReserLegal0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtAumReserLegal1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Cuentas por Pagar a L/P y Obligaciones Bancarias L/P</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasPagarObligBancLP0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCtasPagarObligBancLP1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Monto sin Conciliar</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtMontoSinConci0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtMontoSinConci1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Generación o Absorbción Por Financiamiento</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorPorFinanc0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtGenerAbsorPorFinanc1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Cambio en la Cuenta Caja</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtCambioCtaCaja0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtCambioCtaCaja1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Efectivo Al Inicio del Año</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEfecIniAno0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEfecIniAno1'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_total">Efectivo al Final del Año</td>
                    <td class="monto_total"></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEfecFinAno0'], 2, ',', '.'); ?></td>
                    <td class="monto_total"><?= number_format($reclasifi['txtEfecFinAno1'], 2, ',', '.'); ?></td>
                </tr>
            </table>
        </div>

        <!--indicadores economicos-->
        
        <div class="titulo">

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td_sep" style="text-align: center;">INDICADORES ECONÓMICOS RENTABILIDAD</td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha1']; ?></td>
                    <td class="fechas" style="font-weight: bold;"><?= $reclasifi['fecha2']; ?></td>
                    <td class="fecha_end" style="font-weight: bold;"><?= $reclasifi['fecha3']; ?></td>
                </tr>
            </table>
        </div>
        <div class="contenido">

            <table class="tabla-contenido">

                <tr>
                    <td class="titulo_td">Variación de las Ventas Netas Respecto Año Anterior</td>
                    <td class="montos"></td>
                    <td class="montos"><?= number_format($reclasifi['txtVarVentasNetas0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtVarVentasNetas1'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">% Sobre Ventas Netas:</td>
                    <td class="montos"></td>
                    <td class="montos"></td>
                    <td class="montos"></td>
                </tr>

                <tr>
                    <td class="titulo_td">del Costo de Ventas</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcCostoVentas0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcCostoVentas1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcCostoVentas2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">del Beneficio Bruto</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcBeneficioBruto0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcBeneficioBruto1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcBeneficioBruto2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">de los Gastos Administrativos y Generales</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcGastosAdminGenr0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcGastosAdminGenr1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcGastosAdminGenr2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">de los Gastos Financieros</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcGastosFinancieros0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcGastosFinancieros1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcGastosFinancieros2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">del Beneficio neto Antes de no Usuales</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcBenefNetoUsua0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcBenefNetoUsua1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtPorcBenefNetoUsua2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">Rentabilidad del Capital Neto Tangible</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaCapitalNetoTan0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaCapitalNetoTan1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaCapitalNetoTan2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">Rentabilidad sobre el Capital Neto Invertido</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaCapitalNetoInver0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaCapitalNetoInver1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaCapitalNetoInver2'], 2, ',', '.'); ?> %</td>
                </tr>

                <tr>
                    <td class="titulo_td">Rentabilidad sobre Ventas</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaSobreVentas0'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaSobreVentas1'], 2, ',', '.'); ?> %</td>
                    <td class="montos"><?= number_format($reclasifi['txtRentaSobreVentas2'], 2, ',', '.'); ?> %</td>
                </tr>
                
            </table>

        </div>

<!--indicadores financieros-->
        
        <div class="titulo">

            <table class="tabla-contenido">
                <tr>
                    <td class="titulo_td_sep" style="text-align: center;">INDICADORES FINANCIEROS</td>
                    <td class="fechas"  style="font-weight: bold;"><?= $reclasifi['fecha1']; ?></td>
                    <td class="fechas"  style="font-weight: bold;"><?= $reclasifi['fecha2']; ?></td>
                    <td class="fecha_end"  style="font-weight: bold;"><?= $reclasifi['fecha3']; ?></td>
                </tr>
            </table>
        </div>
        <div class="contenido">

            <table class="tabla-contenido">

                <tr>
                    <td class="titulo_td">Capital de Trabajo</td>
                    <td class="montos"><?= number_format($reclasifi['txtCapitalTrabajo0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCapitalTrabajo1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCapitalTrabajo2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Solvencia</td>
                    <td class="montos"><?= number_format($reclasifi['txtSolvencia0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSolvencia1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSolvencia2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Solvencia General</td>
                    <td class="montos"><?= number_format($reclasifi['txtSolvenciaGeneral0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSolvenciaGeneral1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtSolvenciaGeneral2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Liquidez</td>
                    <td class="montos"><?= number_format($reclasifi['txtLiquidez0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtLiquidez1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtLiquidez2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Ventas a Crédito Diarias</td>
                    <td class="montos"><?= number_format($reclasifi['txtVentasCreditosDia0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtVentasCreditosDia1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtVentasCreditosDia2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Número de Días a Mano de Ventas</td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiariManoVent0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiariManoVent1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiariManoVent2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Período Promedio de Cobros</td>
                    <td class="montos"><?= number_format($reclasifi['txtPeriodoPromCobros0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtPeriodoPromCobros1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtPeriodoPromCobros2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Rotación de Cuentas por Cobrar</td>
                    <td class="montos"><?= number_format($reclasifi['txtTotacionCuentasCobrar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtTotacionCuentasCobrar1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtTotacionCuentasCobrar2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Rotación de Inventarios</td>
                    <td class="montos"><?= number_format($reclasifi['txtRotacionInventarios0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRotacionInventarios1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRotacionInventarios2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Número de Días a Mano de Inventarios</td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiasManInventa0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiasManInventa1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiasManInventa2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Costo de Ventas o Servicios Diarios</td>
                    <td class="montos"><?= number_format($reclasifi['txtCostVentsServDiar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCostVentsServDiar1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCostVentsServDiar2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Rotación de Cuentas por Pagar</td>
                    <td class="montos"><?= number_format($reclasifi['txtRotacionCuentasPagar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRotacionCuentasPagar1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRotacionCuentasPagar2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Número de Días a Mano en Cuentas por Pagar</td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiasManCuantasPagar0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiasManCuantasPagar1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtNumDiasManCuantasPagar2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Ciclo de Efectivo</td>
                    <td class="montos"><?= number_format($reclasifi['txtCicloEfectivo0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCicloEfectivo1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCicloEfectivo2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Compras</td>
                    <td class="montos"><?= number_format($reclasifi['txtCompras0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCompras1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtCompras2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Compras Diarias</td>
                    <td class="montos"><?= number_format($reclasifi['txtComprasDiarias0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtComprasDiarias1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtComprasDiarias2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Endeudamiento Total</td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeudamientoTotal0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeudamientoTotal1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeudamientoTotal2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Endeudamiento Circulante</td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeudamientoCirculante0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeudamientoCirculante1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeudamientoCirculante2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Endeudamiento Bancario Total</td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeuBancTotal0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeuBancTotal1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeuBancTotal2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Endeudamiento a Largo Plazo</td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeuLargoPlazo0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeuLargoPlazo1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtEndeuLargoPlazo2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Rotación de la Planta</td>
                    <td class="montos"><?= number_format($reclasifi['txtRotaciPlanta0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRotaciPlanta1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtRotaciPlanta2'], 2, ',', '.'); ?></td>
                </tr>

                <tr>
                    <td class="titulo_td">Productividad de la Empresa</td>
                    <td class="montos"><?= number_format($reclasifi['txtProducEmpre0'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtProducEmpre1'], 2, ',', '.'); ?></td>
                    <td class="montos"><?= number_format($reclasifi['txtProducEmpre2'], 2, ',', '.'); ?></td>
                </tr>

                
            </table>

        </div>
    </div>

</div>