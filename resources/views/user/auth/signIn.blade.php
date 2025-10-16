<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>


    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/Form.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">



    <script src="assets/js/RegForm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Karla:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!--for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link rel="icon" href="/assets/logo.png" type="image/x-icon">

    <style>
        .business-details-header {
            width: 100%;
            background: linear-gradient(45deg, #0074cc, #3b8ac6);
            padding-top: 150px;
            padding-bottom: 200px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>


    <!-- Add intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="assets/images/whitelogo2.png">

</head>

<body style="background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);">



    <!-- Include intl-tel-input JS for popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>




    <!-- Header session -->
    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
            <a href="{{ route('index') }}"><img src="{{ asset('assets/logo.png') }}" style="width:85px;"></a>
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        {{-- <ul class="nav-links">
            <li><a href="{{ route('index') }}">HOME</a></li>
            <li><a href="{{ route('directoryadd') }}">DIRECTORY</a></li>
            <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
            <!--<li><a href="{{ route('shop') }}">SHOP</a></li>-->
            <!--<li><a href="{{ route('services') }}">SERVICES</a></li>-->
            <!--<li><a href= "{{ route('soccer') }}">CUSTOM UNIFORMS</a></li> -->


        </ul> --}}

        <!-- Check if user is logged in -->
        {{-- @if (session('user'))
            <div class="dropdown">
                <button class="profile-btn">
                    <i class="fa fa-user"></i> Profile &#9662;
                </button>
                <ul class="dropdown-content">
                    @if (session('role') === 'admin')
                        <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                    @else
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}">Log Out</a></li>
                </ul>
            </div>
        @else
            <div class="auth-links" style="text-align: center;">
                <a href="{{ route('help') }}" class="help">Help</a>

                <a href="{{ route('login') }}" class="auth-button">Log In</a>

                <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

            </div>


        @endif --}}
    </nav>

    <!-- Header Session -->

    <div class="business-details-header">



    </div>

    <!-- Register form session -->


    <div class="reg-form-container">

        <!--@if (session('error'))
-->
        <!--<div class="alert alert-danger">-->
        <!--    {{ session('error') }}-->
        <!--</div>-->
        <!--
@endif-->

        <!--@if (session('success'))
-->
        <!--<div class="alert alert-success">-->
        <!--    {{ session('success') }}-->
        <!--</div>-->
        <!--
@endif-->


        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}"; // redirect to login page 
                    }
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif





        <h2 class="reg-form-heading">SignIn</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('user.login') }}" method="POST" enctype="multipart/form-data">
            @csrf

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <input class="reg-input" type="email" name="email" placeholder="Email Address" required>
            <input class="reg-input" type="password" name="password" placeholder="Password" required>
            <button type="submit" class="reg-submit-btn">signin</button>
        </form>


    </div>


    <!-- End Register form session -->


    <script>
        // Phone input field ko intlTelInput ke sath initialize karna
        let input = document.querySelector("#reg-phone");
        let iti = window.intlTelInput(input, {
            initialCountry: "", // Initial country ko blank rakhein
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // Optional formatting ke liye
        });

        // User jab flag select kare, tab dialing code number field mein add ho
        input.addEventListener("countrychange", function() {
            let dialCode = iti.getSelectedCountryData().dialCode; // Selected country ka dialing code
            input.value = "+" + dialCode; // Dialing code number field me add kare
            input.setSelectionRange(input.value.length, input.value.length); // Cursor ko code ke baad set kare
        });
    </script>

    @include('component.footer')
