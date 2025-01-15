@include('admin.sidenav')
<style>
    .fc-left, .fc-head-container{
        color: white !important;
    }
    .fc-state-highlight{
        background-color: #99cc99 !important;
    }
    .container-fluid {
    padding-right: 0px !important;
    padding-left: 0px !important;
    margin-right: auto;
    margin-left: auto;
}
.row {
    margin: 0px !important;
}
.modal-content {
background-color: #1e0125 !important;
}
</style>
<section class="home-section" style="width: calc(100% - 58px); overflow:scroll">
  <link href="{{ asset('calendar/css/libs/bootstrap.min.css') }}" rel='stylesheet' />
  <link href="{{ asset('calendar/css/libs/fullcalendar.css') }}" rel='stylesheet' />
  <link href="{{ asset('calendar/css/calendar.css') }}" rel='stylesheet' />

  <!-- Updated scripts with asset helper -->
  <script src="{{ asset('calendar/js/libs/jquery.min.js') }}"></script>
  <script src="{{ asset('calendar/js/libs/moment.min.js') }}"></script>
  <script src="{{ asset('calendar/js/libs/bootstrap.min.js') }}"></script>
  <script src="{{ asset('calendar/js/libs/fullcalendar.js') }}"></script>
  <script src="{{ asset('calendar/js/calendar.js') }}"></script>
    <title>Admin Calendar</title>

    <style>
        .fc-appointment {
            background-color: #ff9999; /* Red for appointments */
            color: black;
        }
        .fc-reservation {
            background-color: #99cc99; /* Green for reservations */
            color: black;

        }
        table{
  color: white !important;
}
.fc table {
    width: 100%;
    box-sizing: border-box;
    table-layout: fixed;
    border-collapse: collapse;
    border-spacing: 0;
    font-size: 1em;
    color: white !important;
}
.fc-day-header{
    color: white;
}
    </style>

    <nav class="navbar navbar-default">
        <div class="container-fluid">
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
</section>

