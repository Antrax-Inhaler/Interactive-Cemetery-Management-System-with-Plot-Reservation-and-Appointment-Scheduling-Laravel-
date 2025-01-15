<style>
    .fc-left, .fc-head-container, .fc-widget-content{
        color: white !important;
    }
    .fc-state-highlight{
        background-color: #99cc99 !important;
    }
</style>

    <meta charset='utf-8'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('calendar/css/libs/bootstrap.min.css') }}" rel='stylesheet' />
    <link href="{{ asset('calendar/css/libs/fullcalendar.css') }}" rel='stylesheet' />
    <script src="{{ asset('calendar/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('calendar/js/libs/moment.min.js') }}"></script>
    <script src="{{ asset('calendar/js/libs/bootstrap.min.js') }}"></script>
    <script src="{{ asset('calendar/js/libs/fullcalendar.js') }}"></script>
    <script src="{{ asset('calendar/js/calendar.js') }}"></script>
    <link rel="icon" href="/img/logo2.svg" type="icon">

<style>
    .modal-backdrop.in {
    filter: alpha(opacity = 50);
    opacity: .5;
    display: none !important;
}
    .reservations-table, .reservation-history-table{
        max-width: 2000px;
        overflow-y: auto;
        align-items: center;
        height: 450px;
    }
    .fc-toolbar .fc-state-active, .fc-toolbar .ui-state-active {
    z-index: 1;
}
    .dropdown {
        position: relative;
        display: block;
        width: 100%;
    }

    .dropdown-content {
        display: none;
        position: relative;
        background-color: #f9f9f9;
        min-width: 100%;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    .dropdown-content label {
        display: flex;
        padding: 10px;
        width: 100%;
    }

    .dropdown-content label:hover {
        background-color: #f1f1f1;
    }

    .dropdown-content input {
        margin-right: 10px;
    }
    h2{
        color: #4CAF50;
    }
    .dropdown-btn {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        cursor: pointer;
        box-sizing: border-box;
    }

    .dropdown-btn:hover {
        background-color: #45a049;
    }

    .selected-items ul {
        list-style-type: none;
        padding: 0;
    }

    .selected-items li {
        background-color: #e1e1e1;
        margin: 5px 0;
        padding: 5px;
    }
    .modal {
        display: none;
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgb(0,0,0);
        background-color: rgba(0,0,0,0.4);
        padding-top: 60px;
    }

    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        z-index: 9999;

    }

    .closeBtn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .closeBtn:hover,
    .closeBtn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .button {
        background-color: #4CAF50;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }

    .button:hover {
        background-color: #45a049;
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
.panel{
    background-color: transparent !important;
}
.panel {
    margin-bottom: 0px !important;
    border:none !important;

}

</style>




@include('user.sidenav');
<section class="home-section" style="width: calc(100% - 58px);overflow:scroll">
        <div class="home-content" style="display:block;font-color:">
        <div class="panel">
    	
        <div class="panel">
            <h1 style="text-align: left;">Calendar</h1> 
            <hr>
          </div>
        
            <div class="container-fluid row">
                <div id='calendar1' class='calendar col-md-8'></div>
                <div id='calendar2' class='calendar col-md-4'></div>
            </div>
            <!-- Initial Selection Modal -->
            <div class="modal fade" id="selectEventType" role="dialog" aria-labelledby="selectEventTypeLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h1 class="modal-title" id="selectEventType">Select Event Type</h4>
                        </div>
                        <div class="modal-body">
                            <button type="button" class="btn btn-primary btn-block" id="createAppointment">Create Appointment</button>
                            <button type="button" class="btn btn-secondary btn-block" id="createReservation">Create Reservation</button>
                        </div>
                    </div>
                </div>
            </div>
            <style>
                
.modal {
    display: none; /* Hide modal by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
}

.modal-dialog {
    margin: 15px auto; /* Center the dialog */
    max-width: 500px; /* Adjust width as needed */
}

.modal-content {
    margin: auto;
    padding: 20px;
    position: relative;
}

.modal-header {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center align title */
    margin-bottom: 20px;
}

.modal-header h1 {
    margin: 0;
    font-size: 24px;
}

.modal-body {
    padding: 10px 0;
}

.form-group {
    margin-bottom: 15px;

}

.form-group label {
    display: block;
    margin-bottom: 5px;
    color: #66646F;
}

.form-group input {
    width: 100%; /* Full width */
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    background-color: transparent;
    color: white;
}

.recommendations {
    list-style: none;
    padding: 0;
    margin: 0;
}

.recommendations li {
    cursor: pointer;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #fff;
    margin-top: 5px;
}

.recommendations li:hover {
    background: #f0f0f0;
}

.modal-footer {
    display: flex;
    justify-content: center; /* Center align button */
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 10px;
}


.closeBtn {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 10px;
    right: 15px;
}

.closeBtn:hover,
.closeBtn:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}
.modal-header {
    display: flex;
    flex-direction: column;
    align-items: center; /* Center align title */
    margin-bottom: 20px;
}

.modal-header h1 {
    margin: 0;
    font-size: 24px;
}

.recommendations {
    list-style: none;
    padding: 0;
    margin: 0;
}

.recommendations li {
    cursor: pointer;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: #fff;
    margin-top: 5px;
}

.recommendations li:hover {
    background: #f0f0f0;
}

.modal-footer {
    display: flex;
    justify-content: center; /* Center align button */
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 10px;
}


.closeBtn {
    color: #aaa;
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 10px;
    right: 15px;
}

.closeBtn:hover,
.closeBtn:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}
.modal-header .close {
    position: absolute;
    top: 10px;
    right: 10px;
}


            </style>
            <!-- Appointment Modal -->
            <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span style="color: wheat" aria-hidden="true">&times;</span>
                            </button>
                            <h1 style="color: #45a049;" class="modal-title" id="appointmentModalLabel">Add Appointment</h5>
                        </div>
                        <form action="{{ route('calendar.storeAppointment') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="appointmentDate" name="date" required>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" class="form-control" id="appointmentTime" name="time" required>
                                </div>
                                <div class="form-group">
                                    <label for="appointmentPurpose">Purpose</label>
                                    <input type="text" class="form-control" id="appointmentPurpose" name="purpose" onkeyup="filterRecommendations()" required>
                                    <ul id="recommendations" class="recommendations">
                                        <li onclick="selectPurpose('Consultation')">Consultation</li>
                                        <li onclick="selectPurpose('Payment')">Payment</li>
                                    </ul>
                                </div>
                            </div>
                            <center>
                                <button  type="submit"  class="button">
                                    <span class="button-content">Save Appointment</span>
                                </button>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        
            <!-- Reservation Modal -->
            <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" id="reservationModalLabel">Reservation Form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('calendar.storeReservation') }}" method="POST" id="reservationForm">
                            @csrf
                            <!-- Multi-select Dropdown with Checkboxes -->
                            <div class="dropdown">
                                <button type="button" class="dropdown-btn">Facilities</button>
                                <div class="dropdown-content">
                                    <label><input type="checkbox" name="facilities[]" value="Chapel">Chapel</label>
                                    <label><input type="checkbox" name="facilities[]" value="Tents">Tents</label>
                                    <label><input type="checkbox" name="facilities[]" value="Gathering Halls">Gathering Halls</label>
                                </div>
                            </div>
        
                            <br>
        
                            <div class="dropdown">
                                <button type="button" class="dropdown-btn">Services</button>
                                <div class="dropdown-content">
                                    <label><input type="checkbox" name="services[]" value="Ceremony Services">Ceremony Services</label>
                                    <label><input type="checkbox" name="services[]" value="Floral Arrangement">Floral Arrangement</label>
                                    <label><input type="checkbox" name="services[]" value="Grave Digging Services">Grave Digging Services</label>
                                    <label><input type="checkbox" name="services[]" value="Memorial Consultation">Memorial Consultation</label>
                                </div>
                            </div>
        
                            <div class="selected-items">
                                <h4>Selected Services:</h4>
                                <ul id="selectedServicesList"></ul>
                            </div>
                            <br>
        
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="reservationDate" name="date" required>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="reservationTime" name="time" required>
                            </div>
        
                            <div class="box" style="text-align: center;">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
        




        </div>

        </div>
        </div>
      </section>
      <script src="/js/scripts.js"></script>
</body>
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
                id: appointment.id,
                color: '#4CAF50' // Green for appointments
            });
        });
    
        reservations.forEach(function(reservation) {
            events.push({
                title: 'Reservation',
                start: reservation.date + 'T' + reservation.time,
                type: 'reservation',
                id: reservation.id,
                color: '#FF9800' // Orange for reservations
            });
        });
    
        // Calendar 1 (Date selection only)
        $('#calendar1').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek'
            },
            editable: false,
            events: events,
            selectable: true,
            handleWindowResize: true, // Ensure it handles resizing properly
            select: function(start, end) {
                // Update Calendar 2 to show only the selected date
                $('#calendar2').fullCalendar('gotoDate', start);
            }
        });
    
        // Calendar 2 (Time-based view for the selected date)
        $('#calendar2').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'agendaDay'
            },
            defaultView: 'agendaDay',
            editable: false,
            events: events,
            selectable: true,
            handleWindowResize: true, // Ensure it handles resizing properly
            select: function(start, end) {
                // Automatically pass the selected date and time to the modal inputs
                var selectedDate = start.format('YYYY-MM-DD');
                var selectedTime = start.format('HH:mm');
    
                $('#appointmentDate').val(selectedDate);
                $('#appointmentTime').val(selectedTime);
    
                $('#reservationDate').val(selectedDate);
                $('#reservationTime').val(selectedTime);
    
                $('#selectEventType').modal('show');
            }
        });
    
        $('#createAppointment').on('click', function() {
            $('#selectEventType').modal('hide');
            $('#appointmentModal').modal('show');
        });
    
        $('#createReservation').on('click', function() {
            $('#selectEventType').modal('hide');
            $('#reservationModal').modal('show');
        });
    
        function filterRecommendations() {
            var input = $('#appointmentPurpose').val().toLowerCase();
            $('#recommendations li').each(function() {
                var text = $(this).text().toLowerCase();
                $(this).toggle(text.indexOf(input) !== -1);
            });
        }
    
        function selectPurpose(purpose) {
            $('#appointmentPurpose').val(purpose);
            $('#recommendations').hide();
        }
    
        $('#appointmentPurpose').on('focus', function() {
            $('#recommendations').show();
        }).on('blur', function() {
            setTimeout(function() {
                $('#recommendations').hide();
            }, 100);
        });
    
        $('.dropdown-btn').on('click', function() {
            $(this).next('.dropdown-content').toggle();
        });
    
        $('.dropdown-content input').on('change', function() {
            var selectedItemsList = $(this).closest('.dropdown').siblings('.selected-items').find('ul');
            var value = $(this).val();
            if ($(this).is(':checked')) {
                selectedItemsList.append('<li>' + value + '</li>');
            } else {
                selectedItemsList.find('li').filter(function() {
                    return $(this).text() === value;
                }).remove();
            }
        });
    });
    
    
    
    </script>