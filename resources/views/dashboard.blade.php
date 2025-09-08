<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!--favicon-->
          <link rel="shortcut icon" href="assets/images/whitelogo2.png">

    <!-- for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/user-dash1.css') }}">
  
  <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Optional, for components like modals, tooltips) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <a href="{{ route('index') }}" target="_blank">
                <img src="assets/images/whitelogo2.png"  alt="Logo" class="logo-img"> </a><!-- Add your logo here -->
                <h2>Vendor Panel</h2>
                <button class="close-btn" id="close-btn">&times;</button>
            </div>
            <ul class="menu">
                <li><a href=" {{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Your Orders</a></li>
                <li><a href="{{route('update_directory')}}"><i class="fas fa-list"></i>  Update Directory</a></li>
                <li><a href="{{route('edit-account')}}"><i class="fas fa-box"></i>Change Password</a></li>
              
                <li><a href="{{route('index')}}"><i class="fa-solid fa-house-user"></i></i> Home</a></li>
                   <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
            </ul>
        </aside>
        <main class="content">
            <div>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
            <div class="dashboard-content">
                <div class="left-column">
                    <!-- Search bar -->
                    <input type="text" class="search-bar" placeholder="Search...">
                </div>
                <div class="right-column">
                    <!-- Profile info with arrow -->
                    <div class="profile-info">
                        <!-- <img src="profile-icon.png" alt="Profile Icon" class="profile-icon"> -->
                        <i class="fas fa-user profile-icon"></i>
                        <span class="profile-name">{{ $user->BusinessName}}</span>
                        <span class="arrow" onclick="toggleLogoutBox()">&#9660;</span>
                    </div>

                   <!-- Logout box -->
                    <div class="logout-box" id="logoutBox" style="display: none;">
                        
                        <ul>
                            <li class="list-home">
                                 <a href="{{route('index')}}" class="logout-btn">Home</a>
                                
                            </li>
                        </ul>
                        <li class="list-logout">
                            <a href="{{route('logout')}}" class="logout-btn">Log Out</a>
                        </li>
                        
                        
                    </div>
                </div>
            </div>
            <div class="dashboard-box">
                <div class="dashboard-box-content">
                    <h1>
                        CONNECT767
                    </h1>
                    <p>
                       Connecting you with Dominican Businesses Worldwide
                    </p>

                </div>


            </div>



            <script>
                function toggleLogoutBox() {
                    var logoutBox = document.getElementById("logoutBox");
                    logoutBox.style.display = logoutBox.style.display === "none" ? "block" : "none";
                }
            </script>

            <div class="">

            </div>


        </main>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sidebar = document.getElementById("sidebar");
            const hamburger = document.getElementById("hamburger");
            const closeBtn = document.getElementById("close-btn");

            hamburger.addEventListener("click", () => {
                sidebar.classList.add("show");
            });

            closeBtn.addEventListener("click", () => {
                sidebar.classList.remove("show");
            });
        });
    </script>
</body>

</html>