<input id="alto" type="hidden">
<input id="ancho"  type="hidden">
<script type='text/javascript' src='js/plugins/fullcalendar/fullcalendar.min.js'></script>
<script>
    /* CALENDAR */
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var calendar = $('#calendar').fullCalendar({
        header: {		
            left: 'prev,next',
            center: 'title',
            right: ''
            //right: 'month,agendaWeek,agendaDay'
        },
        selectable: false,
        selectHelper: true,
        select: function(start, end, allDay) {
            var title = prompt('Event Title:');
            if (title) {
                calendar.fullCalendar('renderEvent',
                {
                    title: title,
                    start: start,
                    end: end,
                    allDay: allDay
                },
                true // make the event "stick"
            );
            }
            calendar.fullCalendar('unselect');
        },
        editable: true,
        events: [
<? foreach ($ventas as $row) { ?>
    <? if ($row['status'] == '2') { ?>
        <? $tipo = 'Venta'; ?>
        <? $fecha_inicio = explode('-', $row['fecha_solicitud_aprobado']) ?>
        <? $fecha_fin = explode('-', $row['fecha_vcto_solicitud_aprobado']) ?>
                            {
                                                                                                                
                                title: '<?= 'Venciemiento de Operacion\n\n Numero de Operacion: ' . $row['n_operacion'] . '\n Por un monto de: ' . $row['monto_solicitud_aprobado'] . 'Bs\n Tipo de Operacion:' . $tipo; ?>',
                                start: new Date(<?= $fecha_fin[0]; ?>, <?= $fecha_fin[1] - 1; ?>, <?= (int) $fecha_fin[2]; ?>),
                                end: new Date(<?= $fecha_fin[0]; ?>, <?= $fecha_fin[1] - 1; ?>, <?= (int) $fecha_fin[2]; ?>)
                            },
    <? } ?>
<? } ?>
<? foreach ($pagare as $row2) { ?>
    <? if ($row2['status'] == '2') { ?>
        <? $tipo = 'Pagare'; ?>
        <? $fecha_inicio = explode('-', $row2['fecha_solicitud_aprobado']) ?>
        <? $fecha_fin = explode('-', $row2['fecha_vcto_solicitud_aprobado']) ?>
                            {
                                title: '<?= "<span style=\"text-align:center; \"><b>Venciemiento de Operacion</b><br/></span><br/>Numero de Operacion: " . $row2['n_operacion'] . "<br/>Por un monto de: " . $row2['monto_solicitud_aprobado'] . "Bs<br/>Tipo de Operacion:" . $tipo; ?>',
                                start: new Date(<?= $fecha_fin[0]; ?>, <?= $fecha_fin[1] - 1; ?>, <?= (int) $fecha_fin[2]; ?>),
                                end: new Date(<?= $fecha_fin[0]; ?>, <?= $fecha_fin[1] - 1; ?>, <?= (int) $fecha_fin[2]; ?>)
                            },
    <? } ?>
<? } ?>
<? foreach ($prestamo as $row3) { ?>
    <? if ($row3['status'] == '2') { ?>
        <? $tipo = 'Prestamo'; ?>
        <? $fecha_inicio = explode('-', $row3['fecha_solicitud_aprobado']) ?>
        <? $fecha_fin = explode('-', $row3['fecha_vcto_solicitud_aprobado']) ?>
                            {
                                title: '<?= "<span style=\"text-align:center; \"><b>Venciemiento de Operacion</b><br/></span><br/>Numero de Operacion: " . $row3['n_operacion'] . "<br/>Por un monto de: " . $row3['monto_solicitud_aprobado'] . "Bs<br/>Tipo de Operacion:" . $tipo; ?>',
                                start: new Date(<?= $fecha_fin[0]; ?>, <?= $fecha_fin[1] - 1; ?>, <?= (int) $fecha_fin[2]; ?>),
                                end: new Date(<?= $fecha_fin[0]; ?>, <?= $fecha_fin[1] - 1; ?>, <?= (int) $fecha_fin[2]; ?>)
                            },
    <? } ?>
<? } ?>    
        ],
        eventMouseover: function(event, jsEvent, view) {

            x = $('#ancho').val()-10;
            y = $('#alto').val()-140;
            console.log(x + ' ' + y);
            jQuery('<div/>', {
                id: 'foo',
                title: '',
                html: event.title
            }).appendTo('body');
            $("#foo").css({ background: "none repeat scroll 0 0 white", 
                border: "1px solid black", 
                display: "block", 
                position: "absolute", 
                left: x+'px', 
                top: y+'px', 
                width: "250px", 
                padding: "10px", 
                'text-align': "center", 
                'z-index': "1000"  });
        },
        
        eventMouseout:function(event, jsEvent, view) {
            $("#foo").remove();
        }
        
    });
    
    $(function(){
        $(document).mousemove(function(e){
            $('#alto').val(e.pageY);
            $('#ancho').val(e.pageX);
        }); 
    });
    
</script>