$(function() {
    $('.facturas_eliminadas').on({
        click: function() {
            var totalvalor_nominal = 0;
            var totalresult_iva = 0;

            var tr = $(this).parent().parent();

            $(this).removeClass("add").addClass("eli");

            iconoElimina = $(this).find("img.icon_elimina");
            iconoAgrega = $(this).find("img.icon_add");

            iconoElimina.css("display", "block");
            iconoAgrega.css("display", "none");

            input_val_nom = tr.find("td > .valor_nominal_eliminada");
            input_val_nom.removeClass("valor_nominal_eliminada").addClass("valor_nominal");

            input_val_nom_iva = tr.find("td > .valor_con_iva_eliminada");
            input_val_nom_iva.removeClass("valor_con_iva_eliminada").addClass("valor_con_iva");


            $(this).parent().parent().clone().prependTo(".body_tablas_facturas").first();
            $(this).parent().parent().remove();

            $('.valor_nominal').each(function() {
                totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                $('#result_nominal').html(totalvalor_nominal.toFixed(2));
            });
            $('.valor_con_iva').each(function() {
                totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                $('#result_iva').html(totalresult_iva.toFixed(2));
                $('#result_iva_input').val(totalresult_iva.toFixed(2));
                $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
            });
            
            
            id_factura = $(this).attr('id_fac');
            monto_aprobado = $('.monto_aprobado').val();
            id_solicitud = $('#id_solicitud').val();
            
            var url = './clientes/undo_elimina/' + id_factura + '/' + monto_aprobado + '/' + id_solicitud;
            $.get(url, function() {
            });
            console.debug($(this).attr('id_fac'));

        }
    }, 'span.add');


    $(".body_tablas_facturas").on({
        click: function() {
            var totalvalor_nominal = 0;
            var totalresult_iva = 0;

            var tr = $(this).parent().parent();

            $(this).removeClass("eli").addClass("add");

            iconoElimina = $(this).find("img.icon_elimina");
            iconoAgrega = $(this).find("img.icon_add");

            iconoElimina.css("display", "none");
            iconoAgrega.css("display", "block");

            input_val_nom = tr.find("td > .valor_nominal");
            input_val_nom.removeClass("valor_nominal").addClass("valor_nominal_eliminada");

            input_val_nom_iva = tr.find("td > .valor_con_iva");
            input_val_nom_iva.removeClass("valor_con_iva").addClass("valor_con_iva_eliminada");

            $(this).parent().parent().clone().appendTo(".cuerpo_eliminadas");
            $(this).parent().parent().remove();

            $('.valor_nominal').each(function() {
                totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
                $('#result_nominal').html(totalvalor_nominal.toFixed(2));
            });
            $('.valor_con_iva').each(function() {
                totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
                $('#result_iva').html(totalresult_iva.toFixed(2));
                $('#result_iva_input').val(totalresult_iva.toFixed(2));
                $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
            });
            
            
            id_factura = $(this).attr('id_fac');
            monto_aprobado = $('.monto_aprobado').val();
            id_solicitud = $('#id_solicitud').val();
                    
            var url = './clientes/eliminar_factura/' + id_factura + '/' + monto_aprobado + '/' + id_solicitud;
            $.get(url, function() {
            });
            console.debug($(this).attr('id_fac'));
       
        }
    }, 'span.eli');
});

var totalvalor_nominal = 0;
var totalresult_iva = 0;

$('.valor_nominal').each(function() {
    totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
    $('#result_nominal').html(totalvalor_nominal.toFixed(2));
});

$('.valor_con_iva').each(function() {
    totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
    $('#result_iva').html(totalresult_iva.toFixed(2));
    $('#result_iva_input').val(totalresult_iva.toFixed(2));
    $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
});


$('.valor_nominal').focus(function() {
    if ($(this).val() == '0') {
        $(this).val('');
    }
});

$('.valor_nominal').blur(function() {

    if ($(this).val() == '') {
        $(this).val('0');
    }
    iva = $(this).parent().parent().find('.iva').val();
    vt = (parseFloat($(this).val()) + parseFloat((iva * $(this).val()) / 100)).toFixed(2);
    $(this).parent().parent().find('.valor_con_iva').val(vt);
    var totalvalor_nominal = 0;
    var totalresult_iva = 0;
    $('.valor_nominal').each(function() {
        totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
        $('#result_nominal').html(totalvalor_nominal.toFixed(2));
    });

    $('.valor_con_iva').each(function() {
        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
        $('#result_iva').html(totalresult_iva.toFixed(2));
        $('#result_iva_input').val(totalresult_iva.toFixed(2));
        $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
    });
});

$('.valor_con_iva').blur(function() {
    var totalvalor_nominal = 0;
    var totalresult_iva = 0;
    $('.valor_nominal').each(function() {
        totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
        $('#result_nominal').html(totalvalor_nominal.toFixed(2));
    });
    $('.valor_con_iva').each(function() {
        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
        $('#result_iva').html(totalresult_iva.toFixed(2));
        $('#result_iva_input').val(totalresult_iva.toFixed(2));
        $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
    });
});

$('.iva').blur(function() {
    var totalvalor_nominal = 0;
    var totalresult_iva = 0;
    vn = $(this).parent().parent().find('.valor_nominal').val();
    vt = (parseFloat(vn) + parseFloat((vn * $(this).val()) / 100)).toFixed(2);
    $(this).parent().parent().find('.valor_con_iva').val(vt);
    $('.valor_con_iva').each(function() {
        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
        $('#result_iva_input').val(totalresult_iva.toFixed(2));
        $('#result_iva').html(totalresult_iva.toFixed(2));
        $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
    });
});

$('#id_add_nueva').click(function() {
    document.title = '';
    var cuerpo = '<tr><td  style="text-align: center;" ><span class="eli" style="cursor: pointer; display: block; float: left; margin: 5px 4px 0 0;"><img src="images/general/rechazada.png" width="16" title="Eliminar Factura"></span></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input type="text" name="numero[]" data-required="true" onkeypress="return permite(event, \'num\')" style="width: 100% !important;text-align: center;  " /></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input type="text" name="numero_factura[]" data-required="true" onkeypress="return permite(event, \'num\')" style="width: 82% !important;text-align: center;" /></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input type="text" name="deudor[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input type="text" name="rif[]" data-required="true" style="width: 90% !important;text-align: left;"/></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input type="text" name="fecha_emision[]" data-required="true"  style="width: 90% !important;text-align: left;"/></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input type="text" name="fecha_vencimiento[]" data-required="true"  style="width: 90% !important;text-align: left;"/></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input class="valor_nominal" value="0" type="text" name="valor_nominal[]" data-required="true" onkeypress="return permite(event, \'numpunto\')" style="width: 82% !important;text-align: center;"/></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input class="iva" value="0" type="text" name="iva[]" data-required="true" onkeypress="return permite(event, \'numpunto\')" style="width: 82% !important;text-align: center;"/></td>' + document.title;
    cuerpo += '<td  style="text-align: center;" ><input class="valor_con_iva" value="0" type="text" readonly="readonly" name="valor_con_iva[]" data-required="true" onkeypress="return permite(event, \'numpunto\')" style="width: 82% !important;text-align: center;"/></td></tr>';
    $(".body_tablas_facturas").prepend(cuerpo).first();
    var totalvalor_nominal = 0;
    var totalresult_iva = 0;
    $('.valor_nominal').each(function() {
        totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
        $('#result_nominal').html(totalvalor_nominal.toFixed(2));
    });
    $('.valor_con_iva').each(function() {
        totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
        $('#result_iva_input').val(totalresult_iva.toFixed(2));
        $('#result_iva').html(totalresult_iva);

    });
    $('.eli').click(function() {
        var totalvalor_nominal = 0;
        var totalresult_iva = 0;
        $(this).parent().parent().remove();
        $('.valor_nominal').each(function() {
            totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
            $('#result_nominal').html(totalvalor_nominal.toFixed(2));
        });
        $('.valor_con_iva').each(function() {
            totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
            $('#result_iva_input').val(totalresult_iva.toFixed(2));
            $('#result_iva').html(totalresult_iva.toFixed(2));
            $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
        });
    });
    $('.valor_nominal').blur(function() {

        iva = $(this).parent().parent().find('.iva').val();
        vt = (parseFloat($(this).val()) + parseFloat((iva * $(this).val()) / 100)).toFixed(2);
        $(this).parent().parent().find('.valor_con_iva').val(vt);
        var totalvalor_nominal = 0;
        var totalresult_iva = 0;
        $('.valor_nominal').each(function() {
            totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
            $('#result_nominal').html(totalvalor_nominal.toFixed(2));
        });
        $('.valor_con_iva').each(function() {
            totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
            $('#result_iva_input').val(totalresult_iva.toFixed(2));
            $('#result_iva').html(totalresult_iva.toFixed(2));
            $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
        });
    });
    $('.iva').blur(function() {
        var totalvalor_nominal = 0;
        var totalresult_iva = 0;
        vn = $(this).parent().parent().find('.valor_nominal').val();
        vt = (parseFloat(vn) + parseFloat((vn * $(this).val()) / 100)).toFixed(2);
        $(this).parent().parent().find('.valor_con_iva').val(vt);
        $('.valor_con_iva').each(function() {
            totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
            $('#result_iva_input').val(totalresult_iva.toFixed(2));
            $('#result_iva').html(totalresult_iva.toFixed(2));
            $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
        });
    });
    $('.valor_con_iva').blur(function() {
        var totalvalor_nominal = 0;
        var totalresult_iva = 0;
        $('.valor_nominal').each(function() {
            totalvalor_nominal = parseFloat(totalvalor_nominal) + parseFloat($(this).val());
            $('#result_nominal').html(totalvalor_nominal.toFixed(2));
        });
        $('.valor_con_iva').each(function() {
            totalresult_iva = parseFloat(totalresult_iva) + parseFloat($(this).val());
            $('#result_iva_input').val(totalresult_iva.toFixed(2));
            $('#result_iva').html(totalresult_iva.toFixed(2));
            $('.monto_aprobado').val(totalvalor_nominal.toFixed(2));
        });
    });
});
