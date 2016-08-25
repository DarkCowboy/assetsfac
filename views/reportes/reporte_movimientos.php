<style>
    body{
        font-size: 11px;
        font-family: Verdana;
    }
    .cabecera p{
        padding: 0;
        margin: 0;
    }
</style>

<div style="width: 618px; margin: 0 auto;">

 
    <div class="cabecera">
        <p><b>Nombre del Banco:</b> <?= $datos_banco['nombre_banco'] ?> (<?= $datos_banco['t_banco'] ?>)</p>
        <p><b>Numero de Cuenta:</b> <?= $datos_banco['n_cuenta'] ?></p>
        <p><b>Tipo de Cuenta:</b> <?= $datos_banco['t_de_cuenta'] ?></p>
        <p><b>Moneda:</b> <?= $datos_banco['moneda'] ?></p>
        <p><b>Fecha de Impresion:</b> <?= date('d-m-Y h:m:s') ?></p>
        <?
        $fecha = explode('-', $banco[0]['fecha_pago']);
        $dia = $fecha['2'];
        $dia = explode(' ', $dia);
        ?>
        <p><b>Titulo del Reporte:</b> <?= $titulo_reporte; ?></p>
    </div>
<hr>
<br>
<table cellpadding="0" cellspacing="0" border="0" class="display" id="tableasd">
    <thead>
        <tr>
            <th class="first" width="50">Fecha</th>
            <th class="first" width="77">N&deg; de Ref.</th>
            <th class="first" width="300">Concepto</th>
            <th class="first" width="77">Debe</th>
            <th class="first" width="77">Haber</th>
            <th class="last" width="77">Saldo</th>
        </tr>
    </thead>
    <tbody>
            <? $saldo = $corte_mes_anterior['saldo']; ?>
            <? foreach ($banco as $row) { ?> 
            <tr>
                <?
                $fecha = explode('-', $row['fecha_pago']);
                $dia = $fecha['2'];
                $dia = explode(' ', $dia);
                ?>

    <? if ($row['id_t_operacion'] == 1 & $row['status'] == '0') { ?>
    <? } else { ?>
                    <td class="last style2 "><?= $dia['0'] . '-' . $fecha['1'] . '-' . $fecha['0'] ?></td>  
                    <td class="first style2 separador" style="text-align: center"><?= $row['n_cheque']; ?></td>                                
                    <td class="first style2 separador" style="text-align: left"><?= $row['detalles_concepto']; ?></td>                                
                    <td class="first style2 separador" style="text-align: right"><?= $row['id_t_operacion'] == 3 ? number_format($row['total_monto_pagar'], 2, ',', '.') : ''; ?></td>                                
                    <td class="first style2 separador" style="text-align: right"><?= $row['id_t_operacion'] == 1 || $row['id_t_operacion'] == 2 ? number_format($row['total_monto_pagar'], 2, ',', '.') : ''; ?></td> 
                    <?
                    if ($row['id_t_operacion'] == 3) {
                        $saldo = $saldo + $row['total_monto_pagar'];
                    } else if ($row['id_t_operacion'] == 1 || $row['id_t_operacion'] == 2) {
                        $saldo = $saldo - $row['total_monto_pagar'];
                    }
                    ?>
                    <td class="first style2 separador" style="text-align: right;"><?= number_format($saldo, 2, ',', '.'); ?></td>                                
    <? } ?>


            </tr>
<? } ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="text-align: right; height: 25px;"><b><? $corte_mes_actual['saldo'] ?></b></td>
        </tr>
    </tbody>
</table>


</div>