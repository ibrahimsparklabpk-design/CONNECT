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
    <!--<link rel="stylesheet" href="admin-listing.css">-->
    
    <link rel="stylesheet" href="{{ asset('assets/css/admin-listing.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
   
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
                <!--<li><a href="{{route('vendor_data')}}"><i class="fas fa-user"></i> User Details</a></li>-->
                <li><a href="{{route('admin_listing')}}"><i class="fas fa-list"></i> Listing</a></li>
                <li><a href="#"><i class="fas fa-box"></i> Custom Order</a></li>
                <li><a href="#"><i class="fas fa-plus"></i> Add Product</a></li>
                <li><a href="{{route('index')}}"><i class="fa-solid fa-house-user"></i></i> Home</a></li>
                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Sign Out</a></li>
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
                        <i class="fas fa-user profile-img"></i>
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
                 @if($directories->isNotEmpty())
                    @foreach($directories as $directory)

                    <div class="profile-box">
                        
                        <div class="profile-picture-container">
                            <!-- Profile image -->
                                @if($directory->profile_picture &&
                                Storage::disk('public')->exists($directory->profile_picture))
                                <img src="{{ Storage::url($directory->profile_picture) }}" width="100" height="100"
                                    alt="Profile Picture">
                                @else
                                <div class="placeholder">
                                    <span>
                                        {{ strtoupper(substr($directory->BusinessName, 0, 1)) }}
                                        </span>
                                </div>
                                @endif
                            </div>

                        <div class="profile-details">
                            <div class="profile-detail">
                                <h3>Business Name</h3>
                                <p>{{$directory->BusinessName }}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Email</h3>
                                <p>{{$directory->Email}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Industry</h3>
                                <p>{{$directory->Industry}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Website</h3>
                                <p>
                                    <a href="{{$directory->website}}">{{$directory->Website}}

                                     </a>
                                </p>
                            </div>

                            <div class="profile-detail">
                                <h3>Experience</h3>
                                <p>5 {{$directory->Experience}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Phone Number</h3>
                                <p>{{$directory->PhoneNumber}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Country</h3>
                                <p>{{$directory->Country}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>State</h3>
                                <p>{{$directory->State}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>City</h3>
                                <p>{{$directory->City}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Street Name</h3>
                                <p>{{$directory->StreetName}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Building Number</h3>
                                <p>{{$directory->BuildingNumber}}</p>
                            </div>

                            <div class="profile-detail">
                                <h3>Goods/Services Provided</h3>
                                <p>{{$directory->GoodsServices}}</p>
                            </div>
                        </div>
                         <form action="{{ route('admin_listing.delete', $directory->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                @csrf
                                @method('DELETE')

                        <button class="delete-btn" onclick="deleteProfile()">Delete</button>
                         </form>
                    </div>
                     @endforeach
                 @else
                    <tr>
                        <td colspan="14">No records found</td>
                     </tr>
                 @endif

                    






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