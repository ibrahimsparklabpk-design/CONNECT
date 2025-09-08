<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <!--favicon-->
    <link rel="shortcut icon" href="assets/images/whitelogo2.png">

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="admin-dash1.css">-->

     <link rel="stylesheet" href="{{ asset('assets/css/user-change-password.css') }}"> 
     
       <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
     
      <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS (Including Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     
     
     
 
    
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
               <a href="{{ route('index') }}" target="_blank">
    <img src="{{ asset('assets/images/whitelogo2.png') }}" alt="Logo" class="logo-img">
</a> <!-- Add your logo here -->
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
                        <span class="profile-name">
                            
                            
                            {{ $user->BusinessName }}
                            <!--@if(isset($userData) && $role === 'admin')-->
                            <!--    {{ $userData->BusinessName }}-->
                            <!--@else-->
                            <!-- <p>No user data found.</p>-->
                            <!--@endif-->
                        </span>
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
                    <div class="password-change-box">
                        
                             @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                
                                @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                        
                        <h2 class="password-change-title">Change Password</h2>
                        
                            
                    <form class="password-change-form" method="POST" action="{{ route('update-account') }}">
                        @csrf
                            <div class="password-change-group">
                                <label for="current-password">Current Password</label>
                                <input type="password" id="current-password" class="password-change-input" name="current_password" required>
                            </div>

                            <div class="password-change-group">
                                <label for="new-password">New Password</label>
                                <input type="password"  class="password-change-input" id="new-password" name="new_password" required>
                            </div>

                            <div class="password-change-group">
                                <label for="confirm-password">Confirm New Password</label>
                                <input type="password"  class="password-change-input" id="confirm-new-password" name="confirm_new_password" required>
                            </div>

                            <button type="submit" class="password-change-btn">Save Changes</button>
                        </form>
                    </div>



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