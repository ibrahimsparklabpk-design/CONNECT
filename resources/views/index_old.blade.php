<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect767</title>

    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

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
            <img src="./assets/logo.png" alt="Logo" />
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
            <button class="profile-btn">Profile &#9662;</button>
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
        <button class="login-btn">
            <a style="color:white" href="{{route('login')}}">Login</a> /
            <a style="color:white" href="{{ route('register') }}">Register</a>
        </button>
        @endif
    </nav>






    <!-- Banner Section -->

    <section class="banner">
        <div class="banner-content">
            <h1>CONNECT 767</h1>
            <p>Connecting You to Dominican Businesses & Professionals Globally</p>
            <!-- <button class="banner-btn">Get Started</button> -->

            <div class="search-container">
                <form action="{{ route('search_bytext') }}" method="GET">
                    @csrf
                    <input type="text" class="search-input " placeholder=" Search Here" name="search">
                    <button class="search-button">Search</button>
                </form>
            </div>
        </div>
    </section>


    <section class="boxes-section">
        <div class="box">

            <div class="div" style="display: flex;">
                <!-- <div class="no">01</div> -->
                <h2>Get Connected</h2>
            </div>

            <button class="box-btn">Register Business</button>
        </div>

        <div class="box">

            <div class="div" style="display: flex;">
                <!-- <div class="no">02</div> -->
                <h2>Feel Connected</h2>
            </div>



            <button class="box-btn">Shop Now</button>
        </div>
        <div class="box">

            <div class="div" style="display: flex;">
                <!-- <div class="no">03</div> -->
                <h2>Stay Connected</h2>
            </div>




            <button class="box-btn">Search Directory</button>


        </div>
        <div class="box">

            <div class="div" style="display: flex;">
                <!-- <div class="no">04</div> -->
                <h2>Customize Uniforms</h2>
            </div>


            <button class="box-btn">Search Directory</button>
        </div>
    </section>


    <section class="flex-boxes-section">
        <div class="flex-box">
            <h2>Top Categories</h2>
            <ul>


                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Digital
                    Services</li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Website
                    Development</li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Graphic Designs
                </li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Construction
                </li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Financial
                    Services</li>
                <!-- <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Lorem ipsum
                    dolor sit amet, consectetur adipiscing elit.</li>   -->

                <button class="flex-btn">Register Today</button>

            </ul>
        </div>
        <div class="flex-box">
            <h2>Apparel Collection</h2>
            <ul>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Hoodies</li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Women&#39;s Gym
                    Wear</li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> T-shirts</li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Jogger</li>
                <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Pants</li>
                <!-- <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px"> Lorem ipsum
                dolor sit amet, consectetur adipiscing elit.</li> -->

                <button class="flex-btn">Buy Now</button>

            </ul>
        </div>
    </section>


    <section class="about-us-section">
        <!-- Section Heading -->
        <h2 class="section-heading">Advertise with Us</h2>

        <!-- Container for Left and Right Boxes -->
        <div class="boxes-container">
            <!-- Left Box with Image -->
            <div class="left-box">
                <img src="./assets/about-pic.jpg" alt="Image description">
            </div>

            <!-- Right Box with Nested Flexboxes -->
            <div class="right-box">
                <div class="nested-boxes">
                    <!-- Nested Box 1 -->
                    <div class="nested-box">
                        <img src="/assets/about-pic.jpg" class="about_img">

                        <h3>FEATURED PROFESSIONAL</h3>
                        <p>Luana Laurent: Roseau, Dominica CEO and Founder of Finance Focus Consultancy Master's
                            Degree
                            in International Finance 10+ Yrs of Progressive Exp. in Public Service Taxation</p>
                        <button class="flex-btn" style="margin-top: 10px; ">Read More</button>

                    </div>
                    <!-- Nested Box 2 -->
                    <div class="nested-box">
                        <img src="/assets/images.jfif" class="about_img2">
                        <h3>FEATURED BUSINESS</h3>
                        <p>Finance Focus: Roseau, Dominica</p>

                        <ul>


                            <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px">
                                Business Plan Preparation</li>
                            <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px">
                                Financial Projections</li>
                            <li style="justify-content: center;"><img src="./assets/check.png" alt="" height="25px">
                                Small Business & Personal Finance Guidance</li>



                            <button class="flex-btn" style="margin-top: 10px;">Read More</button>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <section class="contact-us-section">

        <h2 class="contact-heading">Get in Touch With Us</h2>


        <div class="contact-boxes">

            <div class="contact-info-box">
                <h3 class="info-heading">CONTACT US</h3>
                <ul class="info-list">
                    <li><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;&nbsp;New York, NY, 10001</li>
                    <li><i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;info@connect767.com</li>
                    <li><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;862-253-2076</li>
                </ul>

                <div class="contact-social-icon">
                    <div class="fb-icon"> <i class="fa-brands fa-facebook"></i></div>
                    <div class="tw-icon"> <i class="fa-brands fa-twitter"></i></div>
                    <div class="yt-icon"> <i class="fa-brands fa-youtube"></i></div>
                    <div class="ig-icon"> <i class="fa-brands fa-instagram"></i></div>

                </div>

            </div>


            <div class="form-box">
                <form class="custom-contact-form">
                    <div class="custom-form-group">

                        <input type="text" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="custom-form-group">

                        <input type="text" id="phone" name="phone" placeholder="Phone number" required>
                    </div>
                    <div class="custom-form-group">

                        <input type="email" id="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="custom-form-group">

                        <textarea id="message" name="message" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="custom-submit-btn">Submit</button>
                </form>
            </div>
        </div>
    </section> -->


    <footer class="custom-footer">
        <div class="footer-container">
            <!-- First Div: Logo and Summary -->
            <!-- <div class="footer-logo-summary">
                <img src="./assets/logo.png" alt="Logo" class="footer-logo" style="max-width: 100px;">
                <p class="footer-summary">
                    CONNECT 767 unites professionals and business leaders to drive growth.
                </p>
            </div> -->

            <div class="form-box">
                <form class="custom-contact-form">
                    <div class="custom-form-group">
                        <input class="footerInput" type="text" id="name" name="name" placeholder="Name" required>
                    </div>
                    <div class="custom-form-group">
                        <div class="two-inputs">
                            <input class="footerInput" type="email" id="email" name="email" placeholder="Email"
                                required>
                            <input class="footerInput" type="text" id="phone" name="phone" placeholder="Phone number"
                                required>
                        </div>
                    </div>
                    <div class="custom-form-group">
                        <textarea class="footerMessage" id="message" name="message" placeholder="Message"
                            required></textarea>
                    </div>
                    <button type="submit" class="custom-submit-btn">Message</button>
                </form>
            </div>
            <!-- Second Div: Quick Links -->
            <div class="footer-quick-links">
                <h4 class="footer-heading">Quick Links</h4>
                <ul class="footer-links-list">
                    <li><a href="{{route('index')}}">Home</a></li>
                    <li><a href="{{route('directoryadd')}}">Directory</a></li>
                    <li><a href="{{route('shop')}}">Shop</a></li>
                    <li><a href="{{route('basketball')}}">Custom Uniforms</a></li>
                </ul>
            </div>

            <!-- Third Div: Our Services -->
            <div class="footer-services">
                <h4 class="footer-heading">Our Services</h4>
                <ul class="footer-links-list">
                    <li><a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px;">&nbsp;</i>Professional
                            Networking</a></li>
                    <li><a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px;">&nbsp;</i>Consulting
                            Services</a></li>
                    <li><a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px;">&nbsp;</i>Manufacturing
                            Services</a></li>
                    <li><a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px;">&nbsp;</i>Partnership
                            Programs</a></li>
                </ul>
            </div>

            <!-- Fourth Div: Information with Social Media Icons -->
            <div class="footer-info">
                <h4 class="footer-heading">Information</h4>
                <ul class="footer-info-list">
                    <!-- <li><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;New York, NY, 10001</li> -->
                    <li> <i class="fa-solid fa-envelope"></i> &nbsp;<a
                            href="mailto:info@connect767.com">info@connect767.com</a></li>
                    <li><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Phone: 862-253-2076</li>
                </ul>
                <!-- Social Media Icons with a Different Class Name -->
                <div class="footer-social-media-icons">
                    <a href="https://www.facebook.com/connect767" target="_blank" class="social-icon"><img
                            src="./assets/fb.png" alt="Facebook" style="border-radius: 100%;"></a>
                    <a href="#" class="social-icon"><img src="./assets/twitter.png" alt="Twitter"
                            style="border-radius: 100%;"></a>
                    <a href="#" class="social-icon"><img src="./assets/youtube.png" alt="YouTube"
                            style="border-radius: 100%;"></a>
                    <a href="https://www.instagram.com/connect767llc/" target="_blank" class=" social-icon"><img
                            src="./assets/Instagram.webp" alt="Instagram" style="border-radius: 100%;"></a>
                </div>
            </div>
        </div>
    </footer>


    <!-- Copyright Section -->
    <div class="footer-copyright">
        <p>&copy; Copyright 2024 NY Creative Studio All Rights Reserved</p>
    </div>

    <!-- Hamburger Script -->
    <script>
    function toggleMenu() {
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('active'); // Active class toggle karega
    }
    </script>
</body>

</html>