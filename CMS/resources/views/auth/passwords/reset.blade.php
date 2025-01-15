{{-- <form method="POST" action="{{ route('password.update') }}">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <input type="email" name="email" required placeholder="Email">
    <input type="password" name="password" required placeholder="New Password">
    <input type="password" name="password_confirmation" required placeholder="Confirm Password">
    <button type="submit">Reset Password</button>
</form> --}}
{{-- <form method="POST" action="{{ route('password.email') }}">
    @csrf
    <input type="email" name="email" required placeholder="Enter your email">
    <button type="submit">Send Password Reset Link</button>
</form> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    
    <!-- ===== BOX ICONS ===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    
    <title>e-GPark | Login / Signup</title>
    <link rel="icon" href="{{ asset('img/logo2.svg') }}" type="icon">
    
</head>
<body>
    <div class="login">
        <div class="login__content">
            <div class="login__img">
                <img src="{{ asset('img/newLogo.svg') }}" alt="Logo">
            </div>

            <div class="login__forms">
                <!-- Login Form -->

                <!-- Forgot Password Form -->
                <form method="POST" action="{{ route('password.update') }}" class="login__create" id="forgotPasswordForm">
                    @csrf

                    <h1 class="login__title">Reset Password</h1>
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="login__box">
                        <i class='bx bx-at login__icon'></i>
                        <input type="email" name="email" required placeholder="Enter your email" class="login__input">
                    </div><br>
                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password" placeholder="New Password" required class="login__input">
                    </div>
                    <div class="login__box">
                        <i class='bx bx-lock-alt login__icon'></i>
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="login__input">
                    </div><br>
                    <button class="button" type="submit">
                        <span class="button-content">Reset Password</span>
                    </button>

                    <div>
                        <span class="login__signin" id="back-to-login">Back to Sign In</span>

                        <script>
                            document.getElementById('back-to-login').onclick = function() {
                                window.location.href = '/login';
                            };
                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===== MAIN JS =====-->
    <script src="assets/js/main.js"></script>

    <style>

        /* Adjust position for Forgot Password Form to bring it on top */
        #forgotPasswordForm {
            margin-bottom: 100px; /* No margin-top, ensuring it's aligned with other forms */
        }

        /* Apply the provided button styles */
        .button {
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

        .button:hover {
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
        .alert {
  position: fixed;
  top: 20px;
  right: -300px; /* Start off-screen */
  width: 300px; /* Fixed width */
  z-index: 9999;
  padding: 15px 25px;
  border-radius: 4px;
  font-size: 16px;
  opacity: 0; /* Initially hidden */
  transition: opacity 0.5s ease-in-out, right 0.5s ease-in-out;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  display: flex;
  align-items: center;
  gap: 10px;
}

.success-alert {
  background-color: rgba(76, 175, 80, 0.9); /* Green */
  color: white;
}

.error-alert {
  background-color: rgba(244, 67, 54, 0.9); /* Red */
  color: white;
}

.alert.show {
  opacity: 1; /* Show the alert */
  right: 20px; /* Slide into view */
}

.alert.hide {
  opacity: 0; /* Hide the alert */
  right: -300px; /* Slide out of view */
}
    </style>
</body>
</html>