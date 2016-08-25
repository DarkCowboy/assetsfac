<div id="footer">
    
    <? $this->load->view('templates/widget'); ?>
</div>
<script type='text/javascript' src='scripts/plugins/fullcalendar/fullcalendar.min.js'></script>
<script type='text/javascript' src='scripts/common.js'></script>
<script type='text/javascript' src='scripts/script.js'></script>
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
            {
                title: '',
                start: new Date(12, 12, 2013),
                end: new Date(12, 12, 2013)
            },
            {

                title: '',
                start: new Date(12, 12, 2013),
                end: new Date(12, 12, 2013)
            },
        ],
        eventMouseover: function(event, jsEvent, view) {

            x = $('#ancho').val() - 10;
            y = $('#alto').val() - 140;
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
                left: x + 'px',
                top: y + 'px',
                width: "250px",
                padding: "10px",
                'text-align': "center",
                'z-index': "1000"});
        },
        eventMouseout: function(event, jsEvent, view) {
            $("#foo").remove();
        }

    });

    $(function() {
        $(document).mousemove(function(e) {
            $('#alto').val(e.pageY);
            $('#ancho').val(e.pageX);
        });
    });
</script>

<script type="text/javascript" src="scripts/fancybox/jquery.fancybox.js?v=2.1.4"></script>
<link rel="stylesheet" type="text/css" href="scripts/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

<script type="text/javascript">
    $(document).ready(function() {

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
        $(".iframe").fancybox({
            type: 'iframe',
            'padding': 0,
            'autoSize': false,
            'width': 650,
            'height': 520
        });
        $(".fancybox").fancybox({
            closeClick: false,
            openEffect: 'none',
            closeEffect: 'none',
            hideOnOverlayClick: false,
            hideOnContentClick: false
        }).trigger("click");

    });
</script>