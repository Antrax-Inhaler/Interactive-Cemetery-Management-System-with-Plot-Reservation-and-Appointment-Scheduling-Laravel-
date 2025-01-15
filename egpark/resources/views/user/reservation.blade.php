@include('user.sidenav')

<section class="home-section" style="width: calc(100% - 58px); overflow: auto;">
    <div class="home-content" style="display: block;">
        <div class="panel">
            <h1 style="text-align: left;">Reservation</h1><br>
            <hr><br>
            @if(session('success'))
            <div style="max-width: 500px; height: 40px; background-color:#45a049; color: white; text-align:center; border-radius: 10px;" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
            <div class="box" style="background: transparent;">
                <button class="button" id="openModalBtn">
                    <span class="button-content">Make Reservation</span>
                </button>
            </div><br>

            <div id="appointmentModal" class="modal">
                <div class="modal-content">
                    <span class="closeBtn">&times;</span>
                    <h1>Reservation Form</h1> <br>
                    <form action="{{ route('reservations.store') }}" method="POST" id="appointmentForm">
                        @csrf
                        <!-- Multi-select Dropdown with Checkboxes -->
                        <div class="dropdown">
                            <button type="button" class="dropdown-btn">Facilities</button>
                            <div class="dropdown-content">
                                @foreach ($facilities as $facility)
                                    <label><input type="checkbox" name="facilities[]" value="{{ $facility->facility }}" style="width:20px">{{ $facility->facility }}</label>
                                @endforeach
                            </div>
                        </div>
                        <div class="selected-items">
                            <h4>Selected Facilities:</h4>
                            <ul id="selectedFacilitiesList"></ul>
                        </div> <br>
            
                        <label for="date">Date:</label>
                        <input type="date" id="date" name="date" required><br><br>
                        <label for="time">Time:</label>
                        <input type="time" id="time" name="time" required><br><br>
            
                        <div class="box" style="text-align: center;">
                            <button class="button" type="submit">
                                <span class="button-content">Submit</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Reservations Table -->
            <div class="reservations-table">
                <h2>My Reservations</h2>
                <div class="overflower">
                <table border="1px" style="color: white; width: 100%;" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Facilities</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ implode(', ', json_decode($reservation->facilities, true)) }}</td>
                            <td>{{ $reservation->date }}</td>
                            <td>{{ $reservation->time }}</td>
                            <td>{{ $reservation->status }}</td>
                            <td>
                                @if($reservation->status === 'Pending')
                                <button class="button cancel-btn" data-reservation-id="{{ $reservation->id }}">Cancel</button>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" style="text-align: center;">No reservations found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

<!-- Reservation History Table -->
<div class="reservation-history-table">
    <h2>Reservation History</h2>
    <div class="overflower">
    <table border="1px" style="color: white; width: 100%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Facilities</th>
                <th>Date</th>
                <th>Time</th>
                <th>Status</th>
                <th>Action Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservationHistory as $history)
            <tr>
                <td>{{ $history->reservation->id }}</td>
                <td>
                    @php
                        $facilities = json_decode($history->reservation->facilities, true);
                        $facilitiesList = is_array($facilities) ? implode(', ', $facilities) : $facilities;
                    @endphp
                    {{ $facilitiesList }}
                </td>
                <td>{{ $history->reservation->date }}</td>
                <td>{{ $history->reservation->time }}</td>
                <td>{{ $history->reservation->status }}</td>
                <td>{{ $history->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" style="text-align: center;">No reservation history found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
</div>

        
        </div>
    </div>
</section>

<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2>Confirm Cancellation</h2>
        <p>Are you sure you want to cancel this reservation?</p>
        <form id="cancelForm" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="button">Yes, Cancel</button>
            <button type="button" class="button" id="cancelModalBtn">No, Keep</button>
        </form>
    </div>
</div>

<!-- CSS Styles -->
<style>
    .reservations-table, .reservation-history-table{
        max-width: 2000px;
        overflow-y: auto;
        align-items: center;
        height: 450px;
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
        z-index: 9999;
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
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
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
    .overflower{
    overflow-y: auto;
    height: 500px;
    }

</style>

<!-- JavaScript -->
<script>
    // Modal functionality
    const openModalBtn = document.getElementById('openModalBtn');
    const appointmentModal = document.getElementById('appointmentModal');
    const closeModalBtns = document.querySelectorAll('.closeBtn');
    const confirmationModal = document.getElementById('confirmationModal');
    const cancelModalBtn = document.getElementById('cancelModalBtn');
    const cancelBtns = document.querySelectorAll('.cancel-btn');
    const cancelForm = document.getElementById('cancelForm');

    openModalBtn.addEventListener('click', function() {
        appointmentModal.style.display = 'block';
    });

    closeModalBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            appointmentModal.style.display = 'none';
            confirmationModal.style.display = 'none';
        });
    });

    cancelBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const reservationId = btn.getAttribute('data-reservation-id');
            cancelForm.action = `/reservations/${reservationId}/cancel`; // Set action URL
            confirmationModal.style.display = 'block';
        });
    });

    cancelModalBtn.addEventListener('click', function() {
        confirmationModal.style.display = 'none';
    });

    window.onclick = function(event) {
        if (event.target == appointmentModal || event.target == confirmationModal) {
            appointmentModal.style.display = 'none';
            confirmationModal.style.display = 'none';
        }
    };

    // Facilities selection
    document.querySelectorAll('.dropdown').forEach(dropdown => {
        const btn = dropdown.querySelector('.dropdown-btn');
        const content = dropdown.querySelector('.dropdown-content');
        
        btn.addEventListener('click', function() {
            content.style.display = content.style.display === 'block' ? 'none' : 'block';
        });

        content.querySelectorAll('input').forEach(input => {
            input.addEventListener('change', function() {
                updateSelectedItems();
            });
        });
    });

    function updateSelectedItems() {
        const facilitiesList = document.getElementById('selectedFacilitiesList');
        facilitiesList.innerHTML = '';

        document.querySelectorAll('input[name="facilities[]"]:checked').forEach(input => {
            const li = document.createElement('li');
            li.textContent = input.value;
            facilitiesList.appendChild(li);
        });
    }
</script>
