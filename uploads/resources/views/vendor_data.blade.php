<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
     <!--favicon-->
          <link rel="shortcut icon" href="assets/images/whitelogo2.png">

    <!-- for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="admin-userData.css">-->
    <link rel="stylesheet" href="{{ asset('assets/css/admin-userData.css') }}">
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <a href="{{ route('index') }}" target="_blank">
                <img src="assets/images/whitelogo2.png" alt="Logo" class="logo-img"></a> <!-- Add your logo here -->
                <h2>Admin Panel</h2>
                <button class="close-btn" id="close-btn">&times;</button>
            </div>
            <ul class="menu">
                <li><a href="{{route('admin_dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{route('vendor_data')}}"><i class="fas fa-user"></i> User Details</a></li>
                <li><a href="{{route('admin_listing')}}"><i class="fas fa-list"></i> Listing</a></li>
                <li><a href="#"><i class="fas fa-box"></i> Custom Order</a></li>
                <li><a href="#"><i class="fas fa-plus"></i> Add Product</a></li>
                <li><a href="{{route('index')}}"><i class="fas fa-sign-out-alt"></i> Home</a></li>
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
                       
                        @if(isset($userData) && $role === 'admin')
                           {{ $role  }}
                            <!--{{ $userData->email_address }}-->
                            @else
                                <p>No user data found.</p>
                            @endif
                            
                            </span>
                        <span class="arrow" onclick="toggleLogoutBox()">&#9660;</span>
                    </div>

                    <!-- Logout box -->
                    <div class="logout-box" id="logoutBox" style="display: none;">
                        <a href="{{route('index')}}" class="logout-btn">Home</a>
                    </div>
                </div>
            </div>
            <div class="dashboard-box">
                <div class="dashboard-box-content">
                    <table class="business-table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Business Name</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($Register as $index => $register)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                
                                <td>{{ $register->BusinessName}}</td>
                                
                                <td>{{ $register->Email }}</td>
                                
                                <td>
                                     <form action="{{ route('vendor_data.delete', $register->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                         @csrf
                                                @method('DELETE')
                                        <button class="delete-btn">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                           
                           
                            <!-- More rows can be added dynamically -->
                        </tbody>
                    </table>


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