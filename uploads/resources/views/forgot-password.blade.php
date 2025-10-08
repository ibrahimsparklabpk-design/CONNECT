<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect 767</title>








    <link rel="stylesheet" href="assets/showDirectories/styles.css">


     <link rel="stylesheet" href="assets/css/forgot-password.css"> 
   








    <link rel=" stylesheet" href="assets/css/responsive.css">









    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!--for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/Logo767.png">
    
    
    
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    
    <style>
        input,
        textarea {
            font-size: 16px;
            /* Ensure the parent does not scale the font */
        }

        .business-details-header {
            width: 100%;
            background: linear-gradient(45deg, #0074cc, #3b8ac6);
            padding-top: 150px;
            padding-bottom: 200px;
            display: flex;
            justify-content: center;
            align-items: center;

        }





        /* Responsive Design */
        @media (min-width: 3840px) {
            .login-box {
                max-width: 600px;
                padding: 3rem;
            }

            .textbox input {
                font-size: 1.2rem;
            }

            .login-btn {
                font-size: 1.2rem;
            }
        }
    </style>




</head>

<body>

    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
            <img src="{{ asset('assets/logo.png') }}" style="width:85px;">
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="{{route('index')}}">HOME</a></li>
            <li><a href="{{route('directoryadd')}}">DIRECTORY</a></li>
            <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
            <!--<li><a href="{{route('shop')}}">SHOP</a></li>-->
            <!--<li><a href="{{route('services')}}">SERVICES</a></li>-->
            <!--<li><a href= "{{route('soccer')}}">CUSTOM UNIFORMS</a></li> -->


        </ul>

        <!-- Check if user is logged in -->
        @if(session('user'))
        <div class="dropdown">
            <button class="profile-btn">
                <i class="fa fa-user"></i> Profile &#9662;
            </button>
            <ul class="dropdown-content">
                @if(session('role') === 'admin')
                <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                @else
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        @else



        <div class="auth-links" style="text-align: center;">
             <a href="{{route('help')}}" class="help">Help</a>

            <a href="{{ route('login') }}" class="auth-button">Log in</a>

            <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

        </div>


        @endif
    </nav>


    <div class="business-details-header">



    </div>

    <!-- login form session -->
    <div>
       @if(session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session("success") }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session("error") }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif
        <div class="login-box"
            style="  background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);margin-top:-195px">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
            <img src="assets/images/Logo767.png" class="loginimg">
            <!--<h2>Reset Your Password</h2>-->
           <form action="{{ route('forgot.password') }}" method="POST">
                 @csrf
                <div class="textbox">
                    <input type="text" name="email" required placeholder="Enter Registered Email">
                </div>

                <!-- <div class="textbox">
                    <input type="password" id="password" name="password" required placeholder="Password">
                    <span toggle="#password" class="show-password-icon" onclick="togglePassword()">Show</span>
                </div>

                <div class="forgot-password">
                    <a href="/forgot-password">Forgot password?</a>
                </div> -->

                <div class="line"></div>

                <button type="submit" class="login-btn">Reset Password</button>

                <!-- <div class="google-login">
                    <button type="button" class="google-btn">Login with Google</button>
                </div> -->

                <div class="signup">
                    <p>Don't have a Connect767 account? <a href="{{ route('register') }}">Sign up for free now.</a></p>
                </div>
            </form>
        </div>

    </div>



    <!-- end loginform session -->


    <script>
        function togglePassword() {
            var passwordField = document.getElementById("password");
            var passwordIcon = document.querySelector(".show-password-icon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordIcon.textContent = "Hide";
            } else {
                passwordField.type = "password";
                passwordIcon.textContent = "Show";
            }
        }
    </script>



    @include('component.footer')