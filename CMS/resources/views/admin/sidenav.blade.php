<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/styles.css">
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
<body>
  
    <div class="sidebar close">
      <div class="logo-details" id="sidebar-toggle">
        <img src="/img/logo2.svg" alt="">
        <span class="logo_name">EGPARK</span>
      </div>
        <ul class="nav-links">
          <li>
            <a href="/admin/index">
              <i class='bx bxs-home'></i>
              <span class="link_name">Home</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/admin">Home</a></li>
            </ul>
          </li>
          <li>
            <a href="/admin/notification">
              <i class='bx bxs-bell notification-icon'></i>
              <span id="unread-count-badge" class="badge"></span>
              <span class="link_name">Notification</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/admin/notification">Notification</a></li>
            </ul>
          </li>
          <li>
            <a href="/admin/clients">
            <i class='bx bxs-user-account'></i>
              <span class="link_name">Clients</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/admin/clients">Clients</a></li>
            </ul>
          </li>
         
          <li>
            <a href="/admin/calendar">
              <i class='bx bxs-calendar'></i>
              <span class="link_name">Calendar</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/calendar3">Calendar</a></li>
            </ul>
          </li>
          <li>
            <a href="/admin/billing">
              <i class='bx bxs-receipt'></i>
              <span class="link_name">Billing</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/admin/billing">Billing</a></li>
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
              <li><a href="/admin/appointment">Appointment</a></li>
              <li><a href="/admin/reservation">Reservation</a></li>
            </ul>
          </li>
          <li>
            <a href="/admin/analytics">
              <i class='bx bx-pie-chart-alt-2' ></i>
              <span class="link_name">Analytics</span>
            </a>
            <ul class="sub-menu blank">
              <li><a class="link_name" href="/admin/analytics">Analytics</a></li>
            </ul>
          </li>
          <li>
            <div class="iocn-link">
              <a href="/admin/google">
                <i class='bx bx-map-alt'></i>
                <span class="link_name">Maps</span>
              </a>
              <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
              <li><a class="link_name" href="#">Maps</a></li>
              <li><a href="/admin/google">Google Map</a></li>
              <li><a href="/admin/vmaps">Virtual Map</a></li>
            </ul>
          </li>
          <li>
          <a href="/admin/plots">
          <i class='bx bx-sitemap'></i>
            <span class="link_name">Plot Management</span>
          </a>
          <ul class="sub-menu blank">
            <li><a class="link_name" href="/admin/plots">Plot Management</a></li>
          </ul>
        </li>
          <li>
            <a href="/admin/setting">
            <i class='bx bx-cog'></i>
            <span class="link_name">Setting</span>
            </a>

            <ul class="sub-menu blank">
              <li><a class="link_name" href="/admin/setting">Setting</a></li>
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
      </div>
      <script>
        function updateNotificationBadge() {
            fetch("{{ route('unreadNotificationCount') }}")
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById('unread-count-badge');
                    if (data.count > 0) {
                        badge.textContent = data.count;
                        badge.style.display = 'inline';
                    } else {
                        badge.style.display = 'none';
                    }
                })
                .catch(error => console.error('Error fetching unread notification count:', error));
        }

        updateNotificationBadge();

        setInterval(updateNotificationBadge, 30000);
    </script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const sidebar = document.querySelector('.sidebar');
      const sidebarToggle = document.getElementById('sidebar-toggle');

      sidebarToggle.addEventListener('click', function() {
          if (sidebar.classList.contains('close')) {
              sidebar.classList.remove('close');
              sidebar.classList.add('open');
          } else {
              sidebar.classList.remove('open');
              sidebar.classList.add('close');
          }
      });
  });

  let arrow = document.querySelectorAll(".arrow");
for (var i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener("click", (e)=>{
 let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 arrowParent.classList.toggle("showMenu");
  });
}
</script>
