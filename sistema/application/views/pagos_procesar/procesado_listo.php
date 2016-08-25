<?php ?>
<html>
    <head>
        <base href="<?= base_url(); ?>" />
        <link rel="stylesheet" type="text/css" href="./css/style_procesar.css" />
        <script type="text/javascript" src="js/scripts/jquery.min.js"></script>
        <script src="js/calendario/dhtmlxcalendar.js"></script>
        <link rel="stylesheet" href="js/calendario/dhtmlxcalendar.css" type="text/css"> 
        <link rel="stylesheet" href="js/calendario/dhtmlxcalendar_dhx_terrace.css" type="text/css"> 
    </head>
    <body>
    <main>
        <table>
            <tr><td></td><td></td></tr>
            <tr>
                <td colspan="2">
                    <button onclick="parent.closeFancyboxAndRedirectToUrl('./pagos_procesados/ver_pago/<?= sha1($instruccion['id_instruccion']); ?>');" type="button">Cerrar</button> 
                </td>
            </tr>

        </table>
    </main>
    <footer>

    </footer>
</body>
</html>