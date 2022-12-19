<!DOCTYPE html>
<html>

<head>
    <title>EVENT CALENDAR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: @json($project_tasks),
                eventRender: function(event, element, view) {
                    return true;
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: 'add_events.php',
                            data: 'title=' + title + '&start=' + start + '&end=' + end,
                            type: "POST",
                            success: function(json) {
                                alert('Added Successfully');
                            }
                        });
                        calendar.fullCalendar('renderEvent', {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true
                        );
                    }
                    calendar.fullCalendar('unselect');
                }
            });
        });
    </script>
    <style>
        #calendar {
            width: 650px;
            margin: 0 auto;
            background-color:white;
        }
    </style>
</head>

<body>
    <h1> EVENT CALENDAR </h1>
    <br />
    <div id='calendar'></div>

    <div class="sidenav">
        <a href="/" style="margin-top: 35px;">HOME</a>
        <a href="/manage_tasks" style="margin-top: 35px;">MANAGE TASKS</a>
        <a href="/calendar" style="color: white; margin-top: 35px;">EVENT CALENDAR</a>
        <a href="/visualization" style="margin-top: 35px;">TASK SUMMARY</a>
        <a href="/logout" style="margin-top: 35px;">LOGOUT</a>
    </div>
    
</body>

</html>