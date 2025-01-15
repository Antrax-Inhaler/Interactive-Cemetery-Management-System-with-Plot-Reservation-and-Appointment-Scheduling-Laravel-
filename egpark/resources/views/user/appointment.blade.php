@include('user.sidenav')
<section class="home-section" style="width: calc(100% - 58px); overflow: scroll;">
    <div class="home-content" style="display: block;">
        <div class="panel">
            <h1 style="text-align: left;">My Appointments</h1><br>
            <hr><br>
            
            <!-- Success and error messages -->
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Button to trigger modal for adding new appointment -->
            <div class="box" style="background: transparent;">
                <button class="button" id="openModalBtn">
                    <span class="button-content">Make Appointment</span>
                </button>
            </div><br>

            <!-- Pending Appointments Table -->
            <h2 style="color: white;" >Pending Appointments</h2>
            <br>
            <div class="overflower" >
            <table>
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Purpose</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>{{ $appointment->purpose }}</td>
                            <td>{{ $appointment->status }}</td>
                            <td>
                                @if ($appointment->status == 'Pending')
                                    <form action="{{ route('appointments.cancel', $appointment) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Cancel</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>

            <!-- Appointment History Table -->
            <h2 style="color: white;" >Appointment History</h2>
            <br>
            <div class="overflower" >
            <table>
                <thead>
                    <tr>
                        <th>Action Date</th> <!-- Changed header to Action Date -->
                        <th>Action</th>
                        <th>Purpose</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $record)
                        <tr>
                            <td>{{ $record->created_at->format('Y-m-d H:i:s') }}</td> <!-- Display action date -->
                            <td>{{ ucfirst($record->action) }}</td>
                            <td>{{ $record->appointment->purpose ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>       
        </div>
     
       </div>
   </div>
</section>
<!-- Appointment Modal -->
<div id="appointmentModal" class="modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div style="display: flex; width: 100%; justify-content: flex-end;" >
                <button type="button" class="closeBtn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-header">
                
                <h2 class="modal-title" id="appointmentModalLabel">Add Appointment</h2>

                
            </div>
            <form action="{{ route('appointments.store') }}" method="POST">
                @csrf
                <div class="box">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" id="time" name="time" required>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose</label>
                        <input type="text" id="purpose" name="purpose" onkeyup="filterRecommendations()" required>
                        <ul id="recommendations" class="recommendations">
                            <li onclick="selectPurpose('Consultation')">Consultation</li>
                            <li onclick="selectPurpose('Payment')">Payment</li>
                        </ul>
                    </div>
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



<script>
    // Open modal
    document.getElementById('openModalBtn').addEventListener('click', function() {
        document.getElementById('appointmentModal').style.display = 'block';
    });

    // Close modal
    document.querySelectorAll('.closeBtn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            document.getElementById('appointmentModal').style.display = 'none';
        });
    });

    window.addEventListener('click', function(event) {
        if (event.target == document.getElementById('appointmentModal')) {
            document.getElementById('appointmentModal').style.display = 'none';
        }
    });

    function filterRecommendations() {
    let input = document.getElementById('purpose').value.toLowerCase();
    let recommendations = document.getElementById('recommendations').getElementsByTagName('li');
    
    // Filter the list based on the user's input
    for (let i = 0; i < recommendations.length; i++) {
        let item = recommendations[i].innerText.toLowerCase();
        if (item.includes(input)) {
            recommendations[i].style.display = '';
        } else {
            recommendations[i].style.display = 'none';
        }
    }
}
    // Select purpose
    function selectPurpose(purpose) {
    // Set the selected recommendation as the input value
    document.getElementById('purpose').value = purpose;
    // Hide the recommendations list after selection
    document.getElementById('recommendations').style.display = 'none';
}


    // Show recommendations
    function showRecommendations() {
        document.getElementById('recommendations').style.display = 'block';
    }

    // Hide recommendations when clicking outside
    window.addEventListener('click', function(event) {
        if (!event.target.matches('#purpose')) {
            document.getElementById('recommendations').style.display = 'none';
        }
    });
    document.getElementById('purpose').addEventListener('focus', function() {
    document.getElementById('recommendations').style.display = 'block';
});
</script>

<style>
    .overflower{
    overflow-y: auto;
    height: 500px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    .box{
        padding: 10px;
    background-color: #11101d;
    text-align: left;
    border-radius: 10px;
    display: block;
    gap: 20px;
    width: 100%;
    }

    th, td {
        border: 1px solid white;
        padding: 8px;
        text-align: left;
        color: white;
        text-align: center;
    }

    .box {
        overflow-y: auto;
        align-items: center;
    }
    .panel .box {
        padding: 10px;
        background-color: #11101d;
        text-align: left;
        border-radius: 10px;
        display: block;
        max-width: 100%;
        gap: 20px;
    }


.btn-danger {
    background-color: #d9534f;
    color: #fff;
    border: none;
    padding: 8px 16px;
    font-size: 14px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-danger:hover {
    background-color: #c9302c;
}


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

.closeBtn{
    background-color: transparent;
    border: none;
}
.closeBtn {
    font-size: 28px;
    font-weight: bold;
    position: absolute;
    top: 10px;
    right: 15px;
    color: white;
}

.closeBtn:hover,
.closeBtn:focus {
    color: #fff;
    text-decoration: none;
    cursor: pointer;
}
.modal-title{
    color: white;
}
</style>
