 <aside class="sidebar" id="sidebar">
     <div class="logo">
         <a href="{{ route('index') }}" target="_blank">
             <img src=" {{ asset('assets/images/whitelogo2.png') }}" alt="Logo" class="logo-img">
         </a><!-- Add your logo here -->
         <h2>Vendor Panel</h2>
         <button class="close-btn" id="close-btn">&times;</button>
     </div>
     <ul class="menu">
         <li><a href=" {{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
         <li class="nav-item" tabindex="0">
             <a class="nav-link" href="javascript:void(0);">
                 <i class="fas fa-user"></i> Orders ▾
             </a>
             <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="{{ route('order.index') }}">Static Orders</a></li>
                 <li><a class="dropdown-item" href="{{ route('custom-order.index') }}">Custom Orders</a></li>
             </ul>
         </li>
         <li class="nav-item" tabindex="0">
             <a class="nav-link" href="javascript:void(0);">
                 <i class="fas fa-user"></i> Products ▾
             </a>
             <ul class="dropdown-menu">
                 <li><a class="dropdown-item" href="{{ route('static.index') }}">Static Products</a></li>
                 <li><a class="dropdown-item" href="{{ route('custom.index') }}">Custom Products</a></li>
             </ul>
         </li>

         <li><a href="{{ route('business-registration.edit') }}"><i class="fas fa-list"></i> Update Directory</a></li>
         <li><a href="{{ route('password.update.form') }}"><i class="fas fa-box"></i>Change Password</a></li>

         <li><a href="{{ route('index') }}"><i class="fa-solid fa-house-user"></i></i> Home</a></li>
         {{-- <li><a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li> --}}
     </ul>
 </aside>
