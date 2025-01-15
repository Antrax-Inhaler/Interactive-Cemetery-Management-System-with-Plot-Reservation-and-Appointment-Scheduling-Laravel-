{{-- resources\views\user\profile.blade.php --}}
@include('user.sidenav')
<section class="home-section" style="width: calc(100% - 58px); overflow: auto;">
    <div class="home-content" style="display: block;">
        <div class="panel">
            <h1 style="text-align: left;">Edit Profile</h1>
            <hr><br>

            <!-- edit buttons -->
            <div class="box">
                <button class="button1" id="openProfileModalBtn">
                    <span class="button-content">Edit Profile Information</span>
                </button> <br> <br>
                <button class="button1" id="openPasswordModalBtn">
                    <span class="button-content">Update Password</span>
                </button><br> <br>
                <button class="button-red1" id="openDeleteModalBtn">
                    <span class="button-red2">Delete Account</span>
                </button>
            </div> <br>

        </div>
    </div>
</section>

<!-- Profile Information Modal -->
<div id="profileModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2>Update Profile Information</h2>
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <div class="img-container">
                    <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : '/img/default.png' }}" alt="" class="profile">
                </div>
                <label>Update Profile Picture</label>
                <input type="file" name="profile_image">
            </div><br>

            <div class="form-group">
                <label>Fullname</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}">
            </div><br>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" value="{{ Auth::user()->email }}">
            </div><br>

            <div class="form-group">
                <label>Contact Number</label>
                <input type="text" name="contact" value="{{ Auth::user()->contact }}">
            </div><br>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="{{ Auth::user()->address }}">
            </div><br>

            <div class="imgbox">
                <button class="button" type="submit">
                    <span class="button-content">Update</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Update Password Modal -->
<div id="passwordModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2>Update Password</h2>
        <form action="{{ route('profile.password') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password">
            </div><br>

            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password">
            </div><br>

            <div class="form-group">
                <label>Re-Enter New Password</label>
                <input type="password" name="new_password_confirmation">
            </div><br>

            <div class="imgbox">
                <button class="button" type="submit">
                    <span class="button-content">Change Password</span>
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Account Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <span class="closeBtn">&times;</span>
        <h2>Delete Account</h2>
        <p>Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.</p>
        <br><br>
        <div class="imgbox">
            <form action="{{ route('profile.delete') }}" method="POST">
                @csrf
                <button class="button-red" type="submit">
                    <span class="button-red2">Delete Account</span>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    // Function to open modals
    function openModal(modalId) {
        document.getElementById(modalId).style.display = 'block';
    }

    // Function to close modals
    function closeModal(event) {
        if (event.target.classList.contains('closeBtn') || event.target.classList.contains('modal')) {
            event.target.closest('.modal').style.display = 'none';
        }
    }

    // Attach event listeners to open modal buttons
    document.getElementById('openProfileModalBtn').addEventListener('click', function() {
        openModal('profileModal');
    });

    document.getElementById('openPasswordModalBtn').addEventListener('click', function() {
        openModal('passwordModal');
    });

    document.getElementById('openDeleteModalBtn').addEventListener('click', function() {
        openModal('deleteModal');
    });

    // Attach event listeners to close buttons and modal background
    document.querySelectorAll('.closeBtn').forEach(function(btn) {
        btn.addEventListener('click', closeModal);
    });

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    });
</script>

<style>
  .button1 {
      width: 100%;
      position: relative;
      overflow: hidden;
      height: 2rem;
      padding: 0 2rem;
      background: #00BF63;
      background-size: 400%;
      color: #fff;
      border: none;
      cursor: pointer;
  }

  .button1:hover {
      color: #000;
      font-weight: bold;
  }

  .button1:hover::before {
      transform: scaleX(1);
  }

  .button1-content {
      position: relative;
      z-index: 1;
  }

  .button1::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      transform: scaleX(0);
      transform-origin: 0 50%;
      width: 100%;
      height: inherit;
      border-radius: inherit;
      background: #C1FF72;
      transition: all 0.475s;
  }

  .button-red1 {
      position: relative;
      overflow: hidden;
      height: 2rem;
      padding: 0 2rem;
      width: 100%;
      background: red;
      background-size: 400%;
      color: #fff;
      border: none;
      cursor: pointer;
  }

  .button-red1:hover {
      color: #fff;
      font-weight: bold;
  }

  .button-red1:hover::before {
      transform: scaleX(1);
  }

  .button-red2 {
      position: relative;
      z-index: 1;
  }

  .button-red1::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      transform: scaleX(0);
      transform-origin: 0 50%;
      width: 100%;
      height: inherit;
      border-radius: inherit;
      background: darkred;
      transition: all 0.475s;
  }

  p {
      color: #717171;
  }

  h2 {
      color: #00BF63;
      text-align: center;
  }

  form {
      text-align: center;
      padding: 10px;
      background-color: #11101d;
      text-align: left;
      border-radius: 10px;
      display: block;
      max-width: 100%;
      gap: 20px;
  }

  form label {
      display: block;
      margin-bottom: 5px;
      color: #717171;
      font-weight: 600;
      font-size: 12px;
  }

  form input {
      width: 100%;
      padding: 12px 16px;
      border-radius: 8px;
      color: #fff;
      font-family: inherit;
      background-color: transparent;
      border: 1px solid #414141;
  }

  .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
  }

  .modal-content {
      background-color: #1d1b31;
      margin: 5% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
      box-sizing: border-box;
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

  .button,
  .button-red {
      cursor: pointer;
  }

  @media screen and (max-width: 1000px) {
      .modal {
          left: 25px;
      }
  }
</style>
<script src="https://www.chatbase.co/embed.min.js" chatbotId="XJrq5XGGemsfY5X_30vHq" domain="www.chatbase.co" defer></script>
<script src="/js/scripts.js"></script>
