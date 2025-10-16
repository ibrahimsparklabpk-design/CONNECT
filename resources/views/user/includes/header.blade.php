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
                        {{-- <span class="profile-name">{{ $user->BusinessName}}</span> --}}
                        <span class="arrow" onclick="toggleLogoutBox()">&#9660;</span>
                    </div>

                   <!-- Logout box -->
                    <div class="logout-box" id="logoutBox" style="display: none;">
                        
                        {{-- <ul>
                            <li class="list-home">
                                 <a href="{{route('index')}}" class="logout-btn">Home</a>
                                
                            </li>
                        </ul>
                        <li class="list-logout">
                            <a href="{{route('logout')}}" class="logout-btn">Log Out</a>
                        </li>
                         --}}
                        
                    </div>
                </div>
            </div>