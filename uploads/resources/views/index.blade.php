<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect 767</title>



    <link rel="stylesheet" href="{{ asset('assets/showDirectories/searchpage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- 
    <link rel="stylesheet" href="assets/showDirectories/searchpage.css">

    <link rel="stylesheet" href="assets/showDirectories/styles.css"> -->

    <!-- <link rel="stylesheet" href="assets/css/responsive.css"> -->









    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <!--favicon-->
          <link rel="shortcut icon" href="assets/images/whitelogo2.png">
            <!--<link rel="shortcut icon" href="assets/logo.png">-->
    
 




</head>

<body>

 <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
                      <a  href="{{route('index')}}"><img src="{{ asset('assets/logo.png') }}" style="width:85px;"></a>
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
                <li><a href="{{ route('logout') }}">Log Out</a></li>
            </ul>
        </div>
        @else



        <div class="auth-links" style="text-align: center;">
            <a href="{{route('help')}}" class="help">Help</a>

            <a href="{{ route('login') }}" class="auth-button">Log In</a>

            <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

        </div>


        @endif
    </nav>






    <div class="directory-body home-search">



        <div class="stay-connected-heading">
            <p1>CONNECT767</p1><br>
            
            
              
              
            <!--<p2> Dominica's Online Directory</p2>-->
              <!--<p class="Connect-Des">Connecting you to Dominican Businesses and Professionals Worldwide</p>-->
                <p class="Connect-Des">
                    Connect With Dominican Businesses Worldwide
                    <!--Connecting you with Dominican Businesses Worldwide-->
                </p>
        </div>






        <!-- Search by Text Field -->
        <form action="{{ route('search_bytext') }}" method="GET">
            @csrf
            <div class="search-text-field" id="text-field">



                <div class="input-group">
                    <span class="search-icon">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="text" id="#" class="text-input textwidth" placeholder="Enter search text"
                        name="search">
                    <!-- <button class="search-btn">Search</button> -->
                </div>
            </div>
        </form>
        <script>
            const searchField = document.getElementById('searchField');

            // Event listener lagayen jab user "Enter" press kare
            searchField.addEventListener('keypress', function(event) {
                if (event.key === 'Enter') { // Agar Enter key press hui
                    event.preventDefault(); // Form ka default behavior (page reload) rokein
                    searchField.closest('form').submit(); // Form ko manually submit karein
                }
            });
        </script>
    </div>





    @include('component.footer')