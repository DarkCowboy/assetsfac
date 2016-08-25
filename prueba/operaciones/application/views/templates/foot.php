<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
        <script src="js/Jquery/jquery-ui.js"></script>


<script defer src="js/plugins.js"></script> <!-- lightweight wrapper for consolelog, optional -->
<script defer src="js/mylibs/jquery.notifications.js"></script> <!-- Notifications  -->
<script defer src="js/mylibs/jquery.uniform.min.js"></script>  <!--Uniform (Look & Feel from forms) -->
<script defer src="js/mylibs/jquery.validate.min.js"></script>  <!--Validation from forms -->
<script defer src="js/mylibs/jquery.dataTables.min.js"></script> <!-- Tables -->
<script defer src="js/mylibs/jquery.tipsy.js"></script> <!-- Tooltips -->
<script defer src="js/mylibs/excanvas.js"></script> <!-- Charts -->
<script defer src="js/mylibs/jquery.visualize.js"></script> <!-- Charts -->
<script defer src="js/mylibs/jquery.slidernav.min.js"></script> <!-- Contact List -->
<script defer src="js/common.js"></script> <!-- Generic functions -->
<script defer src="js/script.js"></script> <!-- Generic scripts -->
<script src="js/jquery.confirm/jquery.confirm.js"></script>
<link rel="stylesheet" type="text/css" href="js/jquery.confirm/jquery.confirm.css" />
<!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
     chromium.org/developers/how-tos/chrome-frame-getting-started -->
<!--[if lt IE 7 ]>
  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<script>
    $(document).ready(function () {

        $('.activar_operacion').click(function () {
            var base = '<?= base_url(); ?>';
            var url = $(this).attr('href');
            console.debug(base + url);
            $.confirm({
                'title': 'Esta seguro que desea Activar esta Operacion?',
                'message': 'Si realiza esta accion no existira forma de retornarla<br/> Desea Continuar?',
                'buttons': {
                    'Yes': {
                        'class': 'blue',
                        'action': function () {
                            $(location).attr('href', base + url);
                        }
                    },
                    'No': {
                        'class': 'gray',
                        'action': function () {
                        }	// Nothing to do in this case. You can as well omit the action property.
                    }
                }
            });
        });
        $('.delete').click(function () {
            var base = '<?= base_url(); ?>';
            var url = $(this).attr('href');
            console.debug(base + url);
            $.confirm({
                'title': 'Esta seguro de realizar esta accion?',
                'message': 'Si realiza esta accion no existira forma de retornarla<br/> Desea Continuar?',
                'buttons': {
                    'Yes': {
                        'class': 'blue',
                        'action': function () {
                            $(location).attr('href', base + url);
                        }
                    },
                    'No': {
                        'class': 'gray',
                        'action': function () {
                        }	// Nothing to do in this case. You can as well omit the action property.
                    }
                }
            });
        });
        $('.cerrar_operacion').click(function () {
            var base = '<?= base_url(); ?>';
            var url = $(this).attr('href');
            console.debug(base + url);
            $.confirm({
                'title': 'Esta seguro de realizar esta accion?',
                'message': 'Si realiza esta accion no existira forma de retornarla<br/> Desea Continuar?',
                'buttons': {
                    'Yes': {
                        'class': 'blue',
                        'action': function () {
                            $(location).attr('href', base + url);
                        }
                    },
                    'No': {
                        'class': 'gray',
                        'action': function () {
                        }	// Nothing to do in this case. You can as well omit the action property.
                    }
                }
            });
        });
        $('.eliminar').click(function () {
            console.debug('eliminar');
            x = $(this).attr('id');
            $(this).parent().parent().parent().parent().parent().parent().parent().remove();
            var url = './clientes/eliminar/' + x;
            $.get(url, function () {
            });
        });
        $('.acciones').click(function () {
            $('.inactivo_accion').css("display", "none");
            $('.activo_accion').toggle("blind");
            $('.wrap_acciones').removeClass("activo_accion").addClass("inactivo_accion");
            $(this).next('.wrap_acciones').toggle("blind");
            console.debug($(this).next('.wrap_acciones'));
            $(this).next().addClass("activo_accion");
        });
    });</script>


<script type="text/javascript">
    $().ready(function () {
        $("#tab-panel-1").createTabs();
        $("#tab-panel-2").createTabs();
    });</script>

<script>
    $(window).load(function () {
        $('#cargando').css('display', 'none');
        $('#main-content').css('display', 'block');
    });</script>


<script type="text/javascript" src="js/jquery.numberformatter-1.2.3.min.js"></script>
<script>
    $(function () {

        $('#nominal').click(function () {
            x = $(this).val();
            if (x == '0,00') {
                $(this).val('');
            }
        });
        $('#nominal').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0,00');
            }
        });
        $('#rendimiento').click(function () {
            x = $(this).val();
            if (x == '0,00') {
                $(this).val('');
            }
        });
        $('#rendimiento').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0,00');
            }
        });
        $('#rendimiento').priceFormat({
            prefix: '',
            suffix: ''

        });
        $('#rendimiento').keyup(function () {
            refresh2();
        });
        $('#precio').click(function () {
            x = $(this).val();
            if (x == '0,00') {
                $(this).val('');
            }
        });
        $('#precio').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0,00');
            }
        });
        $('#precio').priceFormat({
            prefix: '',
            suffix: ''

        });
        $('#precio').keyup(function () {
            refresh();
        });
        $('#plazo').click(function () {
            x = $(this).val();
            if (x == '0') {
                $(this).val('');
            }
        });
        $('#plazo').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0');
            }
        });
        $('#nominal').priceFormat({
            prefix: '',
            suffix: ''

        });
        $('#nominal').keyup(function () {
            refresh();
        });
        $('#plazo').keyup(function () {
            refresh();
        });
        $('#nominal').click(function () {
            x = $(this).val();
            if (x == '0,00') {
                $(this).val('');
            }
        });
        $('#nominal').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0,00');
            }
        });
        $('#plazo').click(function () {
            x = $(this).val();
            if (x == '0') {
                $(this).val('');
            }
        });
        $('#plazo').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0');
            }
        });
        $('#nominal').priceFormat({
            prefix: '',
            suffix: ''

        });
        $('#nominal').keyup(function () {
            refresh();
        });
        $('#plazo').keyup(function () {
            refresh();
        });
        $('#nominal2').click(function () {
            x = $(this).val();
            if (x == '0,00') {
                $(this).val('');
            }
        });
        $('#nominal2').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0,00');
            }
        });
        $('#plazo2').click(function () {
            x = $(this).val();
            if (x == '0') {
                $(this).val('');
            }
        });
        $('#plazo2').blur(function () {
            x = $(this).val();
            if (x == '') {
                $(this).val('0');
            }
        });
        $('#nominal2').priceFormat({
            prefix: '',
            suffix: ''

        });
        $('#nominal2').keyup(function () {
            refresh2();
        });
        $('#plazo2').keyup(function () {
            refresh2();
        });
    });
    function refresh() {
        console.log('si');
        if ($('#precio').val() == '' || $('#precio').val() == '0,00%' || $('#precio').val() == '0,00' || $('#precio').val() == '0.00' || $('#precio').val() == '0.00%') {
            $('#rendimiento').val('52,17');
            refresh2();
        } else {
            refresh1();
        }
    }
    function refresh1() {
        console.log('estoy en refresh1');
        var precio = 0;
        var monto = 0;
        var rendimiento = 0;
        var tefectiva = 0;
        var plazo = $('#plazo').val();
        var nominal = $('#nominal').val();
        nominal = nominal.replace('.', '');
        nominal = nominal.replace('.', '');
        nominal = nominal.replace('.', '');
        nominal = nominal.replace(/\,/i, '.');
        var precio = $('#precio').val();
        precio = precio.replace('%', '');
        precio = precio.replace('.', '');
        precio = precio.replace('.', '');
        precio = precio.replace('.', '');
        precio = precio.replace(/\,/i, '.');
//        precio = ((1 / (1+((0.5217*plazo)/360)))*100).toFixed(2);
        monto = ((nominal * precio) / 100).toFixed(2);
        rendimiento = (((100 / (precio) - 1) * (360 / plazo)) * 100).toFixed(2);
        dif = nominal - monto;
        rendimiento = (((100 / (precio) - 1) * (360 / plazo)));
        x = (360 / plazo);
        y = (1 + (rendimiento / x));
        tefectiva = (((Math.pow(y, x) - 1) * 100)).toFixed(2);
        ganancia = ((monto * rendimiento)).toFixed(2);
        sfinal = (parseFloat(monto) + parseFloat(ganancia)).toFixed(2);
        $('#precio').val(dar_formato(precio) + '%');
        $('#monto').val(dar_formato(monto));
        $('#inversion').val(dar_formato(monto));
        $('#rendimiento').val(dar_formato((rendimiento * 100).toFixed(2)) + '%');
        $('#tefectiva').val(dar_formato(tefectiva) + '%');
        $('#ganancia').val(dar_formato((dif).toFixed(2)));
        $('#sfinal').val(dar_formato(sfinal));
    }

    function refresh2() {

        console.log('estoy en refresh2');
        var precio = 0;
        var monto = 0;
        var rendimiento = $('#rendimiento').val();
        var tefectiva = 0;
        var plazo = $('#plazo').val();
        var nominal = $('#nominal').val();
        rendimiento = rendimiento.replace('%', '');
        rendimiento = rendimiento.replace('.', '');
        rendimiento = rendimiento.replace('.', '');
        rendimiento = rendimiento.replace('.', '');
        rendimiento = rendimiento.replace(/\,/i, '.');
        rendimiento = rendimiento / 100;
        precio = ((1 / (1 + ((rendimiento * plazo) / 360))) * 100).toFixed(2);
        nominal = nominal.replace('.', '');
        nominal = nominal.replace('.', '');
        nominal = nominal.replace('.', '');
        nominal = nominal.replace(/\,/i, '.');
        monto = ((nominal * precio) / 100).toFixed(2);
        dif = nominal - monto;
        x = (360 / plazo);
        y = (1 + (rendimiento / x));
        tefectiva = (((Math.pow(y, x) - 1) * 100)).toFixed(2);
        ganancia = ((monto * rendimiento)).toFixed(2);
        sfinal = (parseFloat(monto) + parseFloat(ganancia)).toFixed(2);
        $('#precio').val(dar_formato(precio) + '%');
        $('#monto').val(dar_formato(monto));
        $('#inversion').val(dar_formato(monto));
        $('#tefectiva').val(dar_formato(tefectiva) + '%');
        $('#ganancia').val(dar_formato((dif).toFixed(2)));
        $('#sfinal').val(dar_formato(sfinal));
        $('#rendimiento').val(dar_formato((rendimiento * 100).toFixed(2)) + '%');
    }

    function dar_formato(num) {
        var cadena = "";
        var aux;
        var cont = 1, m, k;
        if (num < 0)
            aux = 1;
        else
            aux = 0;
        num = num.toString();
        for (m = num.length - 1; m >= 0; m--) {
            cadena = num.charAt(m) + cadena;
            if (cont % 3 == 0 && m > aux)
                cadena = "." + cadena;
            else
                cadena = cadena;
            if (cont == 3)
                cont = 1;
            else
                cont++;
        }
        cadena = cadena.replace('..', ',');
        return cadena;
    }
</script>

<script type="text/javascript" src="js/scripts/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="js/scripts/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<script type="text/javascript">
    $(document).ready(function () {

        $('.fancybox').fancybox(
                {
                    'autoDimensions': false,
                    'width': 800,
                    'height': 495,
                    'transitionIn': 'none',
                    'transitionOut': 'none',
                    'fitToView': false,
                    'autoSize': false,
                    'modal': false
                }
        );
    });
</script>

