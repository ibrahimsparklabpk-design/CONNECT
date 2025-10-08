<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect 767</title>


    <!-- 
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/searchpage.css') }}">
        -->
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">


    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- 
    <link rel="stylesheet" href="assets/showDirectories/searchpage.css">

    <link rel="stylesheet" href="assets/showDirectories/styles.css"> -->

    <link rel="stylesheet" href="assets/css/contactus.css">









    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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




</head>

<body>

    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">


            <img src="{{ asset('assets/logo.png') }}">
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <!-- <li><a href="{{route('index')}}">HOME</a></li> -->
            <li><a href="{{route('directoryadd')}}">DIRECTORY</a></li>
            <li><a href="{{route('shop')}}">SHOP</a></li>
            <!-- <li><a href="{{route('basketball')}}">CUSTOM UNIFORMS</a></li> -->
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
        <!-- <button class="login-btn">
            <a style="color:white" href="{{route('login')}}">Login</a> /
            <a style="color:white" href="{{ route('register') }}">Register</a>
        </button> -->


        <!-- <a href="{{ route('register') }}" class="signup-btn">
            <span class="icon">&#128274;</span>
            Sign Up
        </a> -->


        <div class="auth-links" style="text-align: center;">
            <!-- Contact and Login Links -->
            <a href="#">Contact</a>
            <a href="{{ route('login') }}">Login</a>

            <!-- Get Started Button -->
            <div class="button-like">
                <a href="{{ route('register') }}" style="">
                    Get Started
                </a>
            </div>
        </div>



        @endif
    </nav>


    <!-- Form session -->

    <div class="container"
        style="background-image: url(./assets/output-onlinepngtools\ \(19\).png); background-repeat: no-repeat; background-size: cover;">
        <div class="inner">
            <div class="panel panel-left">
                <div class="panel-content">
                    <div class="image-background ">


                        <div class="c-logo">

                            <img src="./assets/logo.png" alt="">
                        </div>


                        <div class="useforflex">
                            <div class="i-img">
                                <img src="./assets/c-icon.png" alt="">
                            </div>

                            <div class="i-c">
                                <p>862-253-2076</p>
                            </div>

                        </div>




                        <div class="useforflex">
                            <div class="i-img">
                                <img src="./assets/ee-icon.png" alt="">
                            </div>

                            <div class="i-c">
                                <p>New York, NY, 10001</p>
                            </div>

                        </div>


                        <div class="useforflex">
                            <div class="i-img">
                                <img src="./assets/mm-icon.png" alt="">
                            </div>

                            <div class="i-c">
                                <p>info@connect767.com</p>
                            </div>

                        </div>



                        <div class="sociail-flex-div">

                            <div class="c-social-icon">
                                <img src="./assets/c-fb.png" alt="">

                            </div>

                            <div class="c-social-icon">
                                <img src="./assets/c-twitter.png" alt="">

                            </div>

                            <div class="c-social-icon">
                                <img src="./assets/c-youtube.png" alt="">

                            </div>


                            <div class="c-social-icon">
                                <img src="./assets/c-Instagram.png" alt="">

                            </div>




                        </div>
                        <!-- 
                        <div class="div">

                            <p>© Copyright 2024 NY Creative Studio All Rights Reserved</p>
                        </div> -->




                    </div>
                </div>
            </div>
            <div class="panel panel-right">
                <div class="panel-content">
                    <div class="form">
                        <h1 style="font-size: 40px;">Get in Touch</h1>
                        <div class="group">
                            <input type="text" required />
                            <span class="highlight"></span>
                            <label>Your name</label>
                        </div>
                        <div class="group">
                            <input type="text" required />
                            <span class="highlight"></span>
                            <label>Your email</label>
                        </div>

                        <div class="group">
                            <input type="text" required />
                            <span class="highlight"></span>
                            <label>Number</label>
                        </div>

                        <div class="group">
                            <input type="text" required />
                            <span class="highlight"></span>
                            <label>Message</label>
                        </div>

                        <a class="send-btn">Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form session -->


    <!-- Footer -->
    @include('component.footer')