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
    <main style="max-width: 350px !important;">
        <form action="./egresos/procesar/<?= sha1($instruccion['id_instruccion']); ?>" method="post" id="my_form">
            <table>
                <tr><td></td><td></td></tr><tr>
                    <td>
                        Numero de Transferencia
                    </td>
                    <td>
                        <input name="n_cheque"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input value="Procesar Pago" type="submit" /> 
                        <!--<button onclick="//parent.closeFancyboxAndRedirectToUrl('/');" type="button">Procesar Pago</button>--> 
                    </td>
                </tr>

            </table>
        </form>
    </main>
    <footer>

    </footer>
</body>
</html>