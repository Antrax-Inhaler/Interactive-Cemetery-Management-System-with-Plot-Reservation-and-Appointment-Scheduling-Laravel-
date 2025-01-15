@include('user.sidenav')
<meta name="csrf-token" content="{{ csrf_token() }}">

<section class="home-section" style="width: calc(100% - 58px); overflow: scroll;">
    <div class="home-content" style="display: block;">
        <div class="panel">
            <h1 style="text-align: left;">Notification</h1><br>
            <hr><br>

            <div class="panel" style="display: flex; text-align: left;">
                <div class="notification-list-container">
                    <div class="notification-list">
                        @foreach ($notifications as $notification)
                            <div class="notification-item {{ $notification->is_read ? '' : 'unread' }}" 
                                 data-id="{{ $notification->id }}"
                                 data-type="{{ $notification->type }}"
                                 onclick="viewNotificationDetails({{ $notification->id }}, '{{ $notification->type }}')">
                                <p>{{ $notification->message }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Notification Details Modal -->
<div id="notificationModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2>Notification Details</h2>
        <p id="notificationMessage"></p>

        <div id="reservationDetails" style="display: none;">
            <h3>Reservation Details</h3>
            <p><strong>Date:</strong> <span id="reservationDate"></span></p>
            <p><strong>Time:</strong> <span id="reservationTime"></span></p>
            <p><strong>Facilities:</strong> <span id="reservationFacilities"></span></p>
            <p><strong>Services:</strong> <span id="reservationServices"></span></p>
            <p><strong>Status:</strong> <span id="reservationStatus"></span></p>
        </div>

        <div id="appointmentDetails" style="display: none;">
            <h3>Appointment Details</h3>
            <p><strong>Date:</strong> <span id="appointmentDate"></span></p>
            <p><strong>Time:</strong> <span id="appointmentTime"></span></p>
            <p><strong>Status:</strong> <span id="appointmentStatus"></span></p>
            <p><strong>Purpose:</strong> <span id="appointmentPurpose"></span></p>
        </div>

        <div id="transactionDetails" style="display: none;">
            <h3>Transaction Details</h3>
            <p><strong>Transaction:</strong> <span id="transactionName"></span></p>
            <p><strong>Price:</strong> <span id="transactionPrice"></span></p>
            <p><strong>Payment Date:</strong> <span id="transactionPaymentDate"></span></p>
            <p><strong>Status:</strong> <span id="transactionStatus"></span></p>
        </div>
    </div>
</div>

<script>
    function viewNotificationDetails(notificationId, type) {
        fetch(`/user/notification/${notificationId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('notificationMessage').innerText = data.message;

                // Hide all detail sections first
                document.getElementById('reservationDetails').style.display = 'none';
                document.getElementById('appointmentDetails').style.display = 'none';
                document.getElementById('transactionDetails').style.display = 'none';

                // Display the relevant details based on the notification type
                if (type === 'reservation' && data.reservation) {
                    document.getElementById('reservationDetails').style.display = 'block';
                    document.getElementById('reservationDate').innerText = data.reservation.date;
                    document.getElementById('reservationTime').innerText = data.reservation.time;
                    document.getElementById('reservationFacilities').innerText = JSON.parse(data.reservation.facilities).join(', ');
                    document.getElementById('reservationServices').innerText = JSON.parse(data.reservation.services).join(', ');
                    document.getElementById('reservationStatus').innerText = data.reservation.status;
                } else if (type === 'appointment' && data.appointment) {
                    document.getElementById('appointmentDetails').style.display = 'block';
                    document.getElementById('appointmentDate').innerText = data.appointment.date;
                    document.getElementById('appointmentTime').innerText = data.appointment.time;
                    document.getElementById('appointmentStatus').innerText = data.appointment.status;
                    document.getElementById('appointmentPurpose').innerText = data.appointment.purpose;
                } else if (type === 'transaction' && data.transaction) {
                    document.getElementById('transactionDetails').style.display = 'block';
                    document.getElementById('transactionName').innerText = data.transaction.transaction;
                    document.getElementById('transactionPrice').innerText = data.transaction.price;
                    document.getElementById('transactionPaymentDate').innerText = data.transaction.payment_date;
                    document.getElementById('transactionStatus').innerText = data.transaction.status;
                }

                document.getElementById('notificationModal').style.display = 'block';

                // Mark notification as read
                fetch(`/user/notification/${notificationId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(() => {
                    document.querySelector(`.notification-item[data-id="${notificationId}"]`).classList.remove('unread');
                });
            });
    }

    // Function to close modals
    function closeModal(event) {
        if (event.target.classList.contains('closeBtn') || event.target.classList.contains('modal')) {
            event.target.closest('.modal').style.display = 'none';
        }
    }

    document.querySelectorAll('.closeBtn').forEach(function(btn) {
        btn.addEventListener('click', closeModal);
    });

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            closeModal(event);
        }
    }
</script>

<style>
    .notification-item {
        padding: 10px;
        border: 1px solid #1d1b31;
        margin-bottom: 5px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        color: white;
        width: 100%;
    }

    .notification-item.unread {
        background-color: #1d1b31;
        animation: glowing 1.5s infinite;
        border: 2px solid #1d1b31;
    }

    @keyframes glowing {
        0% { border-color: #1d1b31; }
        50% { border-color: #01b101; }
        100% { border-color: #1d1b31; }
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
        background-color: rgba(0,0,0,0.4);
    }

    .modal-content {
        background-color: #1d1b31;
        margin: 5% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
        box-sizing: border-box;
        color: white;

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
</style>
