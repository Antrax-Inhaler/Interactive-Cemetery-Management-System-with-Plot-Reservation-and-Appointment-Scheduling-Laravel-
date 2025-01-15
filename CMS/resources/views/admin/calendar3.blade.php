<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='calendar/css/libs/bootstrap.min.css' rel='stylesheet' />
    <link href='calendar/css/libs/fullcalendar.css' rel='stylesheet' />
    <link href='calendar/css/calendar.css' rel='stylesheet' />

    <script src='calendar/js/libs/jquery.min.js'></script>
    <script src='calendar/js/libs/moment.min.js'></script>
    <script src='calendar/js/libs/bootstrap.min.js'></script>
    <script src='calendar/js/libs/fullcalendar.js'></script>
    <script src='calendar/js/calendar.js'></script>
    <link rel="icon" href="/img/logo2.svg" type="icon">

    <title>Admin Calendar</title>

    <style>
        .fc-appointment {
            background-color: #ff9999; /* Red for appointments */
        }
        .fc-reservation {
            background-color: #99cc99; /* Green for reservations */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        <a href="/admin">
        <button class="button">
            <span class="button-content">< Back</span>
        </button>
        </a>
        <img src="/img/logo2.svg" alt="">
        <span class="logo_name">EGPARK - Admin</span>
        </div>
    </nav>

    <div class="container-fluid row">
        <div id='calendar2' class='calendar col-md-12'></div>
    </div>

    <script>
        $(document).ready(function() {
            $('#calendar2').fullCalendar({
                events: [
                    @foreach($appointments as $appointment)
                        {
                            title: '{{ $appointment->purpose }}',
                            start: '{{ $appointment->date }}T{{ $appointment->time }}',
                            className: 'fc-appointment'
                        },
                    @endforeach
                    @foreach($reservations as $reservation)
                        {
                            title: 'Reservation',
                            start: '{{ $reservation->date }}T{{ $reservation->time }}',
                            className: 'fc-reservation'
                        },
                    @endforeach
                ]
            });
        });
    </script>
</body>
</html>
