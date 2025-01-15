{{-- resources\views\user\sidenav.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/calendar.css">
    <link rel="icon" href="/img/logo2.svg" type="icon">
    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link
     rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
     integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
     crossorigin="anonymous"
     referrerpolicy="no-referrer"
   />   

   <!-- chart -->
   <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;700&display=swap"
      rel="stylesheet"
    />
</head>
<body>
  
    <div class="sidebar close">
      <div class="logo-details" id="sidebar-toggle">
        <img src="/img/logo2.svg" alt="">
        <span class="logo_name">EGPARK</span>
      </div>

        
        <ul class="nav-links">
          <li>
            <a href="/user">
              <i class='bx bxs-home'></i>
              <span class="link_name">Home</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/user">Home</a></li>
            </ul>
          </li>
         
          <li>
            <a href="/user/notification" class="notification-icon">
                <i class='bx bxs-bell'></i>
                <span id="unread-count-badge" class="badge"></span>
                <span class="link_name">Notification</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/user/notification">Notification</a></li>
            </ul>
        </li>
          
          
          <li>
            <a href="/user/pricing">
              <i class='bx bx-money'></i>
              <span class="link_name">Pricing</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/user/pricing">Pricing</a></li>
            </ul>
          </li>
          <li>
            <a href="/user/billing">
              <i class='bx bxs-receipt'></i>
              <span class="link_name">Billing</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/user/billing">Billing</a></li>
            </ul>
          </li>
          <li>
            <a href="/user/calendar2">
              <i class='bx bxs-calendar'></i>
              <span class="link_name">Calendar</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="user/calendar2">Calendar</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="#">
                <i class='bx bx-collection' ></i>
                <span class="link_name">Booking</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Booking</a></li>
              <li><a href="/user/appointment">Appointment</a></li>
              <li><a href="/user/reservation">Reservation</a></li>
            </ul>
          </li>
          <li>
            <a href="/user/analytics">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="link_name">Analytics</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/user/analytics">Analytics</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="/user/gmaps">
                <i class='bx bx-map-alt'></i>
                <span class="link_name">Maps</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="/user/gmaps">Maps</a></li>
              <li><a href="/user/gmaps">Google Map</a></li>
              <li><a href="/user/vmaps1">Virtual Map</a></li>
            </ul>
          </li>
          <li>
          <a href="/user/rules">
            <i class='bx bxs-parking'></i>
            <span class="link_name">Park Rules</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="/user/rules">Park Rules</a></li>
          </ul>
        </li>
        <li>
            <a href="/user/profile">
            <i class='bx bxs-user'></i>
            <span class="link_name">Profile</span>
            </a>

            <ul class="sub-menu blank">
              <li><a class="link_name" href="/user/profile">Profile</a></li>
            </ul>
          </li>
          <li>
            <a href="">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                  <button type="submit" style="background: none; border: none; cursor: pointer; width: 100%;">
                    <i class='bx bx-log-out'></i>
                    <span class="link_name">Logout</span>
                  </button>               
            </form>
          </a>
        </li>
    </ul>

    <iframe
    src="https://www.chatbase.co/chatbot-iframe/XJrq5XGGemsfY5X_30vHq"
    width="100%"
    style="height: 100%; min-height: 700px"
    frameborder="0"
    ></iframe>
      </div>
      <style>
        .badge {
            background-color: red;
            color: white;
            border-radius: 50px;
            padding: 2px 6px;
            font-size: 12px;
            position: absolute;
            top: .6px;
            right: 11px;
            display: none;
        }
        .notification-icon {
            position: relative;
        }


      </style>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
    fetchUnreadCount();

    function fetchUnreadCount() {
        fetch('/user/notifications/unread-count')
            .then(response => response.json())
            .then(data => {
                const badgeElement = document.getElementById('unread-count-badge');
                if (data.unreadCount > 0) {
                    badgeElement.textContent = data.unreadCount;
                    badgeElement.style.display = 'inline';
                } else {
                    badgeElement.style.display = 'none';
                }
            })
            .catch(error => console.error('Error fetching unread count:', error));
    }
});

      </script>
<script>
  
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".logo-details");
console.log(sidebarBtn);
sidebarBtn.addEventListener("click", ()=>{
  sidebar.classList.toggle("close");
});

let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}

</script>
<div class="form-group">
  <label for="system_name">System Name</label>
  <input type="text" class="form-control" id="system_name" name="system_name" value="{{ $settings->system_name }}" required>
</div>