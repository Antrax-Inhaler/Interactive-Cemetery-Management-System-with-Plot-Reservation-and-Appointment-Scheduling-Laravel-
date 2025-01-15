{{-- C:\xampp\htdocs\egpark\resources\views\login.blade.php --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- ===== CSS ===== -->
        <link rel="stylesheet" href="assets/css/styles.css">
    
        <!-- ===== BOX ICONS ===== -->
        <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

        <title>e-GPark | Login / Signup</title>
        <link rel="icon" href="/img/logo2.svg" type="icon">

    </head>
    <body>
        <div class="login">
            <div class="login__content">
                <div class="login__img">
                    <img src="assets/img/newLogo.svg" alt="">
                </div>

                <div class="login__forms">
                    
                    <form action="{{ route('login') }}" method="POST" class="login__registre" id="loginForm">
                        @csrf
                        <h1 class="login__title">Sign In</h1>
    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="email" name="email" placeholder="Email" required class="login__input">
                        </div>
    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="password" placeholder="Password" required class="login__input">
                        </div><br>

                        <a href="password/reset" class="login__forgot">Forgot password?</a>
                        <button class="button"  type="submit">
                                <span class="button-content">Login</span>
                            </button> <br>
                

                        <div>
                            <span class="login__account">Don't have an Account ?</span>
                            <span class="login__signin" id="sign-up">Sign Up</span>
                        </div>

                    </form>

                    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="login__create none" id="registerForm">
                        @csrf
                        <h1 class="login__title">Create Account</h1>
                    
                        <div class="login__box">
                            <i class='bx bx-user login__icon'></i>
                            <input type="text" name="name" required placeholder="Fullname" class="login__input">
                        </div>
                    
                        <div class="login__box">
                            <i class='bx bx-at login__icon'></i>
                            <input type="email" name="email" required placeholder="Email" class="login__input">
                        </div>
                    
                        <div class="login__box">
                            <i class='bx bx-phone login__icon'></i>
                            <input type="text" name="contact" required placeholder="Contact" class="login__input">
                        </div>
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="password" required placeholder="Password" class="login__input">
                        </div>
                    
                        <div class="login__box">
                            <i class='bx bx-lock-alt login__icon'></i>
                            <input type="password" name="password_confirmation" required placeholder="Verify Password" class="login__input">
                        </div><br>
                    
                        <button class="button" type="submit">
                            <span class="button-content">Register</span>
                        </button>
                    
                        <div>
                            <span class="login__account">Already have an Account ?</span>
                            <span class="login__signup" id="sign-in">Sign In</span>
                        </div>
                    </form>
                    
                    
                </div>
            </div>
        </div>

        <!--===== MAIN JS =====-->
        <script src="assets/js/main.js"></script>
        <script>
       document.addEventListener('DOMContentLoaded', function () {
    let loginForm = document.getElementById('loginForm');
    let registerForm = document.getElementById('registerForm');

    loginForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(loginForm);

        fetch('/login', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        }).then(response => response.json())
        .then(data => {
            if (data.error) {
                alert(data.error);
            } else {
                alert(data.message);
                window.location.href = data.redirect; // Redirect based on response
            }
        });
    });

    registerForm.addEventListener('submit', function (e) {
        e.preventDefault();
        let formData = new FormData(registerForm);

        fetch('/register', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json',
            },
            body: formData
        }).then(response => response.json())
        .then(data => {
            if (data.errors) {
                alert(JSON.stringify(data.errors));
            } else {
                alert(data.message);
                window.location.href = '/user'; // Redirect after registration
            }
        });
    });
});

    </script>
    <style>
        .button{
  position: relative;
  overflow: hidden;
  height: 2rem;
  padding: 0 2rem;
  border-radius: 1.5rem;
  background: #00BF63;
  background-size: 400%;
  color: #fff;
  border: none;
  cursor: pointer;
}

.button:hover{
  color: #000;
  font-weight: bold;
}

.button:hover::before {
  transform: scaleX(1);
}

.button-content {
  position: relative;
  z-index: 1;
}

.button::before {
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
    </style>
    </body>
</html>