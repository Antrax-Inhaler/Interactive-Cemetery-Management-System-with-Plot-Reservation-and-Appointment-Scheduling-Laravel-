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
    <link rel="icon" href="/img/logo2.svg" type="icon">

    <title>User Dashboard</title>
</head>

<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <a href="/user">
                <button class="button">
                    <span class="button-content">< Back</span>
                </button>
            </a>
            <img src="/img/logo2.svg" alt="">
            <span class="logo_name">EGPARK</span>
        </div>
    </nav>

    <div class="container-fluid row">
        <div id='calendar1' class='calendar col-md-8'></div>
        <div id='calendar2' class='calendar col-md-4'></div>
    </div>

    <div class="modal fade" id="newEvent" role="dialog" aria-labelledby="eventFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="newEvent">New Appointment</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Title</label>
                            <input type="text" class="form-control" id="title">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" id="submit">Create Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editEvent" role="dialog" aria-labelledby="eventFormLabel" aria-hidden="true" data-persist="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="editEvent">Update Appointment</h4>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="form-control-label">Title</label>
                            <input type="text" class="form-control" id="editTitle">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger left" id="delete">Delete Event</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-success" id="update">Update Event</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var appointments = @json($appointments);
            var reservations = @json($reservations);

            var events = [];

            appointments.forEach(function(appointment) {
                events.push({
                    title: appointment.purpose,
                    start: appointment.date + 'T' + appointment.time,
                    type: 'appointment',
                    id: appointment.id
                });
            });

            reservations.forEach(function(reservation) {
                events.push({
                    title: 'Reservation',
                    start: reservation.date + 'T' + reservation.time,
                    type: 'reservation',
                    id: reservation.id
                });
            });

            $('#calendar1').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                events: events,
                eventClick: function(event) {
                    // Handle event click to show the edit modal or details
                    $('#editTitle').val(event.title);
                    $('#editEvent').modal('show');
                }
            });

            $('#calendar2').fullCalendar({
                // Your existing FullCalendar configuration for the second calendar
            });

            // Add event listeners for modals
            $('#submit').on('click', function() {
                var title = $('#title').val();
                if (title) {
                    var date = $('#calendar1').fullCalendar('getDate');
                    $('#calendar1').fullCalendar('renderEvent', {
                        title: title,
                        start: date,
                        allDay: true
                    });
                    $('#newEvent').modal('hide');
                }
            });

            $('#update').on('click', function() {
                // Update event logic here
                $('#editEvent').modal('hide');
            });

            $('#delete').on('click', function() {
                // Delete event logic here
                $('#editEvent').modal('hide');
            });
        });
    </script>
</body>

</html>
