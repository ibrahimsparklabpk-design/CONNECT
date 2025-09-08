<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link rel="stylesheet" href="assets/css/readmoreupdate.css">-->
    
    <link rel="stylesheet" href="{{asset('assets/css/readmoreupdate.css') }}">
    
    <link rel="stylesheet" href="{{asset('assets/showDirectories/searchpage.css') }}">
    
    <!--<link rel="stylesheet" href="assets/showDirectories/searchpage.css">-->




    <link rel="stylesheet" href="{{asset('assets/showDirectories/styles.css') }}">
    
    
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css') }}">
    
     
      
       
      

   




    <!-- <link rel=" stylesheet" href="assets/css/styles.css"> -->

    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">-->

    <link rel="stylesheet" href="checkout.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Karla:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> -->




    <title>Readmore</title>
    <link rel="icon" href="/assets/logo.png" type="image/x-icon">
    <style>
        /* Basic styling for the review card */
        .review-card {
            background-color: white;
            border-radius: 8px;
            padding: 16px;
            margin: 16px 0;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        input,
        textarea {
            font-size: 16px;
            /* Ensure the parent does not scale the font */
        }

        .review-header {
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .reviewer-initial {
            background-color: black;
            color: white;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            font-weight: bold;
            margin-right: 10px;
            transition: transform 0.3s ease;
        }

        .reviewer-initial {
            transform: scale(1.1);
        }

        .reviewer-name {
            font-weight: bold;
            font-size: 16px;
        }

        .review-title {
            font-size: 14px;
            font-weight: bold;
            margin: 8px 0;
        }

        .review-time {
            font-size: 12px;
            color: gray;
            float: right;
        }

        .review-description {
            margin: 8px 0;
            font-size: 14px;
            line-height: 1.5;
        }

        .review-experience-date {
            font-size: 13px;
            color: gray;
            margin-top: 8px;
        }

        .divider {
            border-top: 1px solid #ddd;
            margin: 8px 0;
        }
    </style>
</head>

<body>

    <!-- Navbar starts -->
   <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
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
            <li><a href="{{route('index')}}">HOME</a></li>
            <li><a href="{{route('directoryadd')}}">DIRECTORIES</a></li>
            <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
            <!--<li><a href="{{route('services')}}">SERVICES</a></li>-->
            <!--<li><a href="{{route('basketball')}}">CUSTOM UNIFORMS</a></li> -->
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



        <div class="auth-links" style="text-align: center;">
            <a href="#" class="help">Help</a>

            <a href="{{ route('login') }}" class="auth-button">Login</a>

            <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

        </div>


        @endif
    </nav>



    <!-- Navbar Ends -->





    <!-- Main Section Starts -->




    <div class="pageheader">
        <div class="ph-info">
            <div class="ph-info-image">
                @if($directory->profile_picture && Storage::disk('public')->exists($directory->profile_picture))
                <img src="{{ Storage::url($directory->profile_picture) }}" alt="Profile Picture">
                @else
                <div class="placeholder">
                    <span>
                        {{ strtoupper(substr($directory->BusinessName, 0, 1)) }}
                    </span>
                </div>
                @endif
            </div>
            <div class="ph-info-details">
                <div class="detail-row">
                    <h2 class="ph-heading">
                        {{ $directory->BusinessName}}
                    </h2>
                </div>
                <div class="detail-row">
                    <p class="ph-rating">

                        Rating:({{number_format($averageRating, 1) }} / 5)
                        {{ $totalReviews }} reviews

                    </p>
                </div>
                <div class="ph-stars">
                    <!-- Stars reviews -->



                    <span class="stars">
                        @for ($i = 0; $i < floor($averageRating); $i++) <img
                            src="{{ asset('assets/images/startblack.svg') }}" alt="Filled Star" width="50" height="50">
                            @endfor


                    </span>
                    <!-- End Stars reviews -->

                </div>

                <!-- Start Social media icon  -->
                <!-- <div class="company-social-icons">
                    <a href="#" class="social-icon"><i class="fa-brands fa-facebook"
                            style="font-size: 50px; color: black;"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-square-twitter"
                            style="font-size: 50px; color: black;"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-square-instagram"
                            style="font-size: 50px; color: black;"></i></a>
                    <a href="#" class="social-icon"><i class="fa-brands fa-linkedin"
                            style="font-size: 50px; color: black;"></i></a>
                </div> -->
                <!-- End Social media icon  -->





                <div class="verified-company">
                    <!-- <img src="./assets/verified.webp" alt="" style="height: 12px;"> -->
                    <p>VERIFIED COMPANY</p>

                </div>
            </div>
        </div>

        <div class="ph-info-btn">

            <a href="{{ $directory->website }}" class="user-url">{{ $directory->Website}} <i
                    class="fa-solid fa-arrow-right"> </i></a>


        </div>

    </div>






    <hr>

    <div class="readmore-content">
        <div class="readmore-right" class="company-box">

            <p class="readmore-heading">Business Details</p>




            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-briefcase"></i>
                        <h3>Business Name </h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->BusinessName }}</p>
                    </div>
                </div>
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-industry"></i>
                        <h3>Industry</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->Industry }}</p>
                    </div>
                </div>
            </div>


            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-envelope"></i>
                        <h3>Email</h3>
                    </div>
                    <div class="description-box">
                        <a href="mailto:{{$directory->Email}}" target="_blank">
                            <p>{{ $directory->Email }}</p>
                        </a>
                    </div>
                </div>
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-phone"></i>
                        <h3>Phone Number</h3>
                    </div>
                    <div class="description-box">
                        <a href="tel:{{ $directory->PhoneNumber }}">
                            <p>{{ $directory->PhoneNumber }}</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-user-graduate"></i>
                        <h3>Education</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->Education }}</p>
                    </div>
                </div>
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-handshake-angle"></i>
                        <h3>Experience</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->Experience }}</p>
                    </div>
                </div>
            </div>


            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-globe"></i>
                        <h3>Country</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->Country }}</p>
                    </div>
                </div>
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-arrow-pointer"></i>
                        <h3>Website</h3>
                    </div>
                    <div class="description-box">
                        <a href="{{ $directory->website }}">
                            <p>{{ $directory->Website }}</p>
                        </a>
                    </div>
                </div>
            </div>

            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-map-location"></i>
                        <h3>State</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->State }}</p>
                    </div>
                </div>
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-city"></i>
                        <h3>City</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->City}}</p>
                    </div>
                </div>
            </div>

            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-street-view"></i>
                        <h3>Street Name</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->StreetName }}</p>
                    </div>
                </div>
                <div class="column">
                    <div class="icon-heading">
                        <i class="fa-solid fa-building"></i>
                        <h3>Building Number</h3>
                    </div>
                    <div class="description-box">
                        <p>{{ $directory->BuildingNumber }}</p>
                    </div>
                </div>
            </div>


            <div class="custom-box">
                <div class="column">
                    <div class="icon-heading ">
                        <i class="fa-solid fa-handshake-angle"></i>
                        <h3>Goods/Services Provided</h3>
                    </div>
                    <div class="GoodsServices">
                        <p>


                            {{ $directory->GoodsServices }}
                        </p>
                    </div>
                </div>

            </div>


            <div class="custom-box1">
                <button class="share-button " onclick="toggleSharePopup()">
                    
                   
                     
                     <img src="{{asset('assets/shareiconwhite.png')}}" alt="Share" style="width: 30%;" />
                  
                   
                    <span>Share</span>
                </button>
                <div class="share-popup" id="sharePopup">
                    <button class="social-button facebook" onclick="shareOnFacebook()">
                        
                        <img src="{{asset('assets/fb.png')}}" alt="Facebook" class="icon" />
                        <span>Facebook</span>
                        
                        
                        
                        
                    </button>

                    <!-- facebook sahre data -->
                    <script>
                        function shareOnFacebook() {
                            const businessName = "{{ $directory->BusinessName }}";
                            const industry = "{{ $directory->Industry }}";
                            const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent('https://www.connect767.com/')}&quote=${encodeURIComponent(
                            `Business Name: ${businessName}\nIndustry: ${industry}`)}`;
                            window.open(url, '_blank');
                        }
                    </script>


                    <button class="social-button twitter" onclick="shareOnTwitter()">
                        
                         <img src="{{asset('assets/twitter-x-icon.png')}}" alt="Twitter" class="icon" />
                        
                        <span>Twitter</span>
                    </button>


                    <script>
                        function shareOnTwitter() {
                            const businessName = "{{ $directory->BusinessName }}";
                            const industry = "{{ $directory->Industry }}";
                            const text = `Check out this business!\nBusiness Name: ${businessName}\nIndustry: ${industry}`;
                            const url =
                                `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}&url=${encodeURIComponent('https://example.com')}`;
                            window.open(url, '_blank');
                        }
                    </script>



                    <button class="social-button instagram" onclick="shareOnInstagram()">
                        
                         <img src="{{asset('assets/c-Instagram.png')}}" alt="Instagram" class="icon" />
                        
                       
                        <span>Instagram</span>
                    </button>

                    <script>
                        function shareOnInstagram() {
                            alert(
                                "Instagram does not support direct sharing via link. Use Instagram API or download content to post manually."
                            );
                        }
                    </script>


                    <button class="social-button whatsapp" onclick="shareOnWhatsApp()">
                        
                         <img src="{{asset('assets/whatsapp.png')}}" alt="WhatsApp" class="icon" />
                        
                        
                        <span>WhatsApp</span>
                    </button>

                    <script>
                        function shareOnWhatsApp() {
                            const businessName = "{{ $directory->BusinessName }}";
                            const industry = "{{ $directory->Industry }}";
                            const text = `Business Details:\nBusiness Name: ${businessName}\nIndustry: ${industry}`;
                            const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
                            window.open(url, '_blank');
                        }
                    </script>
                </div>
            </div>



            <!-- <div class="custom-box">
                <button class="social-button">
                    <img src="/assets/fb.png" alt="Facebook" class="icon" />
                    <span>Share</span>
                </button>
                <button class="social-button">
                    <img src="/assets/twitter-x-icon.png" alt="Twitter" class="icon" />
                    <span>Share</span>
                </button>
                <button class="social-button">
                    <img src=" /assets/c-Instagram.png" alt="Instagram" class="icon" />
                    <span>Share</span>
                </button>
            </div> -->
            <!-- end Directory display -->


            <!-- <div class="list">
                <i class="fa-solid fa-briefcase"></i>
                <p>Business Name: {{ $directory->professional_or_business_name }}</p>

            </div>
            <div class="list"> <i class="fa-solid fa-envelope"></i>
                <p>Email: {{ $directory->email }}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-phone"></i>
                <p> Phone Number: {{ $directory->cell_number}}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-industry"></i>
                <p>Industry: {{ $directory->industry }}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-handshake-angle"></i>
                <p>Goods/Services Provided: {{ $directory->goods_or_services_provided }}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-handshake-angle"></i>
                <p>Experience: {{ $directory->experience }}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-handshake-angle"></i>
                <p>Education: {{ $directory->education }}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-arrow-pointer"></i>
                <p>Website: {{ $directory->website }}</p>
            </div>
            <div class="list"> <i class="fa-solid fa-globe"></i>
                <p>Country: {{ $directory->country }}</p>
            </div>
            <div class="list"> <i class="fa-solid fa-map-location"></i>
                <p>State: {{ $directory->state }}</p>
            </div>

            <div class="list"> <i class="fa-solid fa-city"></i>
                <p>City: {{ $directory->city }}</p>
            </div>
            <div class="list"> <i class="fa-solid fa-building"></i>
                <p>Building Number: {{ $directory->building_number }}</p>
            </div>
            <div class="list"> <i class="fa-solid fa-street-view"></i>
                <p>Sreet Name: {{ $directory->street_address }}</p>
            </div> -->



            <!-- Comment box -->


            <!-- end Comment box -->


        </div>



        <div class="readmore-left">


            <div class="readmore-upper">


                <div class="review-box">

                    <div class="review-heading">
                        <h1 id="write-review" style="cursor: pointer;">Write a review</h1>
                    </div>

                    <div class="review-stars">

                        <!-- <span class="stars">
                            @for ($i = 0; $i < floor($averageRating); $i++) <img
                                src="{{ asset('assets/images/startblack.svg') }}" alt="Filled Star" width="50"
                                height="50">
                                @endfor


                        </span> -->
                        <!-- <img src="/assets/blackratingstars.svg" alt="" style="height: 30px;">
                        <img src="/assets/blackratingstars.svg" alt="" style="height: 30px;">
                        <img src="/assets/blackratingstars.svg" alt="" style="height: 30px;">
                        <img src="/assets/blackratingstars.svg" alt="" style="height: 30px;">
                        <img src="/assets/blackratingstars.svg" alt="" style="height: 30px;"> -->
                    </div>

                </div>

                <!-- <div class="company-box">
                    <p>Company Details</p>

                    <div class="list"> <i class="fa-solid fa-envelope"></i>
                        <p>Email: {{ $directory->email }}</p>
                    </div>
                    <div class="list"> <i class="fa-solid fa-phone"></i>
                        <p> Phone Number: {{ $directory->cell_number }}</p>
                    </div>
                    <div class="list"> <i class="fa-solid fa-industry"></i>
                        <p>Industry: {{ $directory->industry }}</p>
                    </div>
                    <div class="list"> <i class="fa-solid fa-file-invoice"></i>
                        <p>Description: {{ $directory->goods_or_services_provided }}
                        </p>
                    </div>


                </div> -->



                <div class="container mt-5" id="review-form">

                    <!-- <h2 class="text-center">Give Us Your Review</h2> -->

                    <!-- Review Form -->
                    <form class="reviewform_commentform" action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="directory_id" value="{{ $directory->id }}">

                        <!-- Directory ID -->
                        <div class="reviewform_group">
                            <label for="reviewer_name" class="reviewform_label">Your Name</label>
                            <input type="text" name="reviewer_name" class="reviewform_input" id="reviewer_name"
                                required>
                        </div>
                        <div class="reviewform_group">
                            <label for="review_title" class="reviewform_label">Review Title</label>
                            <input type="text" name="review_title" class="reviewform_input" id="review_title" required>
                        </div>
                        <div class="reviewform_group">
                            <label for="review_description" class="reviewform_label">Review Description</label>
                            <textarea name="review_description" class="reviewform_textarea" id="review_description"
                                rows="4" required></textarea>
                        </div>
                        <div class="reviewform_group">
                            <label for="date_of_experience" class="reviewform_label">Date of Experience</label>
                            <input type="date" name="date_of_experience" class="reviewform_input"
                                id="date_of_experience" required>
                        </div>
                        <div class="reviewform_group">
                            <label for="review_stars" class="reviewform_label">Rating (Stars)</label>
                            <div id="star-rating" class="reviewform_starrating">
                                <input type="radio" id="star-5" name="review_stars" value="5" />
                                <label for="star-5" title="5 stars">★</label>
                                <input type="radio" id="star-4" name="review_stars" value="4" />
                                <label for="star-4" title="4 stars">★</label>
                                <input type="radio" id="star-3" name="review_stars" value="3" />
                                <label for="star-3" title="3 stars">★</label>
                                <input type="radio" id="star-2" name="review_stars" value="2" />
                                <label for="star-2" title="2 stars">★</label>
                                <input type="radio" id="star-1" name="review_stars" value="1" />
                                <label for="star-1" title="1 star">★</label>
                            </div>
                        </div>

                        <button type="submit" class="reviewform_button">Submit Review</button>
                    </form>

                </div>


                <!-- <div>
                    <div class="button-container">
                        <a href="your-link-here" class="addPostButton">Add a Post</a>
                    </div>
                    <img src="/assets/companyDetailImg.jpg" class="moreDetailImg">
                </div> -->






            </div>




















        </div>

    </div>

    <!-- Comment box -->
    <div class="main-company-box">
        <!-- Comment box -->
        <div class="readmore-lower">


            @if($comments->isEmpty())
            <!-- <p>No reviews found for this directory.</p> -->
            @else
            @foreach($comments as $comment)
            <div class="company-box">

                <div class="review-card">
                    <!-- Review Header -->
                    <div class="review-header">
                        <div class="reviewer-initial">
                            {{ strtoupper(substr($comment->reviewer_name, 0, 1)) }}
                        </div>
                        <div class="reviewer-name">{{ $comment->reviewer_name }}</div>
                    </div>

                    <!-- Divider Line -->
                    <div class="divider"></div>

                    <!-- Review Title and Time -->
                    <div class="review-title">
                        {{ $comment->review_title }}
                        <span class="review-time">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>

                    <!-- Review Description -->
                    <p class="review-description">{{ $comment->review_description }}</p>

                    <!-- Date of Experience -->
                    <div class="review-experience-date">
                        <strong>Date of Experience:</strong> {{ $comment->date_of_experience }}
                    </div>


                    <div class="review-experience-date">
                        <span class="stars">
                            @for ($i = 0; $i < floor($averageRating); $i++) <img
                                src="{{ asset('assets/images/startblack.svg') }}" alt="Filled Star" width="20"
                                height="50">
                                @endfor


                        </span>
                    </div>



                </div>







            </div>
            @endforeach
            @endif



        </div>

        <!-- end Comment box -->

    </div>

    <script>
        function toggleSharePopup() {
            const popup = document.getElementById("sharePopup");
            popup.classList.toggle("show");

            if (popup.classList.contains("show")) {
                popup.style.pointerEvents = "auto";
            } else {
                popup.style.pointerEvents = "none";
            }
        }
    </script>


    <!-- <script>
        function toggleSharePopup() {
            const popup = document.getElementById('sharePopup');
            popup.style.display = popup.style.display === 'block' ? 'none' : 'block';
        }


        function shareOnFacebook() {
            const url = encodeURIComponent(window.location.href);
            window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
        }


        function shareOnTwitter() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('Check out this amazing content!');
            window.open(`https://twitter.com/intent/tweet?text=${text}&url=${url}`, '_blank');
        }


        function shareOnInstagram() {
            alert('Instagram sharing is available only via mobile apps.');
        }

        sApp

        function shareOnWhatsApp() {
            const url = encodeURIComponent(window.location.href);
            const text = encodeURIComponent('Check out this amazing content!');
            window.open(`https://wa.me/?text=${text}%20${url}`, '_blank');
        }
    </script> -->




    <!-- < Main Section Ends -->
    @include('component.footer')