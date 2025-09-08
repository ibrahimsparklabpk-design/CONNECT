<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/searchpage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/services') }}">
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .hero-section {
            position: relative;
            /* Make the section position relative to apply overlay */
            background-image: url('assets/images/serviceshero1.jpg');
            /* Background Image */
            background-size: cover;
            /* Ensure the image covers the entire section */
            background-position: center;
            /* Center the background image */
            height: 400px;
            /* Set the height of the hero section */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 20px 0;
            margin-bottom:80px;
        }

        body {
            background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
        }

        /* Overlay */
        .hero-section::before {
            content: '';
            /* Empty content */
            position: absolute;
            /* Position the overlay on top of the background image */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            /* Black overlay with 50% transparency */
            z-index: 0;
            /* Place overlay below the text */
        }

        .hero-content {
            z-index: 1;
            /* Ensures content stays on top of the background image */
        }

        .hero-section h1 {
            font-size: 3em;
            margin: 0;
            font-family: "Karla", Sans-serif !important;
        }

        .hero-section p {
            font-size: 1.2em;
            font-family: "Karla", Sans-serif !important;
        }



        /* Services Section */
        .services-section {
            display: flex;
            flex-direction: column;
            gap: 30px;
            padding: 40px;
        }
        
       

        .service-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
         background-color: #f9f9f973;
         box-shadow: 0px 10px 15px #0000002e;
        }
        .service-item:hover{
            border:1px solid black;
            
        }
/*        .professional-bg {*/
/*    background: white url('assets/images/ProfessionalNetworkingbg1.png') no-repeat center center / cover;*/
    
/*       background: white url('assets/images/pronet.avif') no-repeat center center / cover;*/
       
     
   
/*}*/

/*.Consulting-bg {*/
   
/*       background: white url('assets/images/ConsultingServicesbg.avif') no-repeat center center / cover;*/
       
       
    
   
/*}*/
/*.manufacturing-bg{*/
   
/*       background: white url('assets/images/Manufacturing.avif') no-repeat center center / cover;*/
       
       
    
   
/*}*/
/*.partnership-bg{*/
   
/*       background: white url('assets/images/Partnership.jpg') no-repeat center center / cover;*/
       
       
    
   
/*}*/
        

        .service-item .service-image,
        .service-item .service-info {
            flex: 1;
            /* Both columns will take up equal space */
        }

        .service-item .service-image img {
   
    width: 84%;
            height: auto;
            border-radius: 8px;
            box-shadow: 0px 10px 15px #0000002e;
                border-radius: 50%;
                border: 1px solid #00000075;
            
            
        }

        .service-item .service-info {
            padding-left: 20px;
             
            /* Add some space between the image and the text */
        }

        .service-item h2 {
            font-size: 50px;
            margin-bottom: 10px;
            font-family: "Karla", Sans-serif !important;
        }

        .service-item p {
            font-size: 1.1em;
            color: black;
            line-height: 26px;
            font-family: "Karla", Sans-serif !important;
        }
        
        
        
        .our-services-section {
  position: relative;
 background-image: url("assets/images/services2.png"); 
  background-size: cover;
  background-position: center;
  height: 250px; 
  display: flex;
  justify-content: center;
  align-items: center;
}

.our-services-section .overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /*background-color: rgba(0, 0, 0, 0.5); */
  background-color:#f9f9f973;
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
  z-index: 1;
      border: 1px solid #ddd;
      box-shadow: 0px 10px 15px #0000002e;
      border-radius: 10px;
}

.our-services-section h1 {
  font-size: 3em; /* Text size apne design ke mutabiq adjust karein */
  font-weight: bold;
  color:black;
  z-index: 2; /* Ensure text appears above overlay */
  margin: 0;
   font-family: "Karla", Sans-serif !important;
}





        /*About us css*/


        /* about us css */
        .about-row {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .about-heading {
            font-size: 50px;
            margin: 30px 0px 30px 0px;
            font-family: "Karla", Sans-serif !important;
            color:black;
        }

        .about-des {
            padding: 5px 150px 5px 151px;
            font-family: "Karla", Sans-serif !important;
            font-size: 17px;
            line-height: 25px;
            color:black;
        }

        /*.about-section {*/
        /*    border: 1px solid #ddd;*/
        /*    padding: 20px;*/
        /*    border-radius: 8px;*/
        /*    background-color: #f9f9f973;*/
        /*    margin: 0px 40px 80px 40px;*/
        /*    box-shadow: 0px 10px 15px #0000002e;*/

        /*}*/
        
        
        .about-section {
            position: relative;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            /*background-image: url('assets/images/serviceshero1.jpg');*/
                background-color: #f9f9f973;

              
            /*background: url('assets/images/aboutuslast.jpg') no-repeat center center/cover; */
            margin: 0px 40px 80px 40px;
            box-shadow: 0px 10px 15px #0000002e;
            color: white; /* To make text more visible */
            overflow: hidden; /* To ensure everything stays inside */
        }
        
        
        
        .about-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.0);  
            border-radius: 8px;
            z-index: 1;  */
        }

        .about-section * {
            position: 
            z-index: 2; 
        }
        
        
        
        
        
        

        .management-row {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 75px;
        }

        .management-col-img {
            width: 50%;
            display: flex
;
    justify-content: center;
        }

        .management-col-img img {
            border-radius: 10px;
            box-shadow: 0px 10px 15px #0000002e;
            width:70%;
            border-radius:50%;
        }

        .management-col-des {
            width: 50%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .management-col-heading {
            font-size: 40px;
            margin: 30px 0px 30px 0px;
            font-family: "Karla", Sans-serif !important;
            color:black;

        }

        .management-col {
            padding: 5px 5px 5px 5px;
            font-family: "Karla", Sans-serif !important;
            font-size: 17px;
            line-height: 30px;
            color:black!important;

        }
        
        
    </style>

</head>

<body>
    <!-- header -->
 <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
              <img src="{{ asset('assets/logo.png') }}" style="width:85px;">
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
                <li><a href="{{ route('logout') }}">Logout</a></li>
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
    <!-- header -->


    <!-- Services Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>About Us</h1>
            <p>Explore the variety of services we offer to help you grow and succeed.</p>
        </div>
    </section>
    <!-- Services Hero Section -->
    
      <!--About us-->

    <section id="about" class="about-section">
        <div class="about-row">
            <h1 class="about-heading">
                Our Mission
            </h1>
            <p class="about-des">
               Connect767 was created to serve as a marketplace, connecting the public with businesses and
                professionals of Dominican heritage. Our vision is to build and maintain a free digital directory that
                connects Dominican experts with those who seek their services. As a small community with a global
                impact, we aim to foster economic development among Dominicans at home and abroad. With integrity at
                the heart of our mission, we take pride in inspiring the next generation of entrepreneurs.
            </p>

        </div>
        <div class="about-row">
            <h1 class="about-heading">
                Our Management
            </h1>
        </div>
        <div class="management-row">
            <div class="management-col-img">
                <img src="assets/images/Founder1.jpg" alt="Sadick Eustache Image">


            </div>
            <div class="management-col-des">
                <h1 class="management-col-heading">
                    Sadick Eustache
                    Founder and Chief Executive Officer
                </h1>
                <p class="management-col">
                    Sadick was raised in Petite Soufrière, a small village on the east coast of Dominica. He attended Castle
                        Bruce Secondary School and later pursued higher education at Dominica State College, where he earned
                        an associate degree in Building and Civil Engineering. After gaining experience in the construction and
                        engineering industry in Dominica, Sadick migrated to New York, where he earned two additional
                        undergraduate degrees, a Master&#39;s degree in Engineering &amp; Technology Management, and a Professional
                        Certificate in Building Designs with a concentration in Plumbing from New York University.<br>
                        
                        Now a seasoned professional in the semiconductor and manufacturing industry, Sadick works as a
                        consultant for a Fortune 10 company in the United States. However, driven by a strong desire to
                        contribute more to his homeland, he founded Connect767 as a meaningful way to make a positive impact.
                </p>
            </div>


        </div>

        <div class="management-row">

            <div class="management-col-des">
                <h1 class="management-col-heading">
                    Macazar Prosper
                    Chief Technical Officer
                </h1>
                <p class="management-col">
                   Macazar, originally from Petite Soufrière, studied Electrical Engineering at the University of
                    Technology Jamaica. He has since gained extensive experience working in the e-commerce and
                    financial services industries.<br>
                        Always passionate about improving the lives of others, Prosper began his journey with
                        &#39;TeckworkDA,&#39; a brief venture focused on mobile services and repairs, among other offerings.<br>
                            Currently, Macazar works as a Cisco Network Professional for a Fortune 500 company in New
                        York, where he plays a behind-the-scenes role in enhancing the lives of many. He brings this
                        same dedication and passion to his work with Connect767.
                </p>
            </div>

            <div class="management-col-img">
                <img src="assets/images/TechnicalOfficer3.jpg" alt="Macazar ProsperImage">


            </div>


        </div>
        <div class="about-row">
            <h1 class="about-heading">
                Philanthrophy

            </h1>
            <p class="about-des">
                Prior to Connect767’s establishment, Sadick Eustache, CEO, provided and continues to provide resources
                and financial support to developing communities within Dominica. An avid sports enthusiast, he has
                sponsored the East Central Football Club of Petite Soufriere with new and complete sets of football
                uniforms.

                Sadick has also made contributions to his Alma Mater, the Castle Bruce Secondary School, by providing
                graduation gifts to top academic achievers.
            </p>

        </div>
    </section>


    <!-- Services content session -->

    <section class="services-section">
        <section class="our-services-section">
          <div class="overlay">
            <h1>Our Services</h1>
          </div>
        </section>
        
        <div class="service-item professional-bg" id="professional-networking">
            <div class="service-image">
                <img src="assets/images/ProfessionalNetworkingnew.jpg" alt="Professional Networking">
            </div>
            <div class="service-info">
                <h2>Professional Networking</h2>
                <p>The Connect767 platform aims to build and maintain relationships with professionals or businesses in
                    similar or related industries, as well as those with whom you can share knowledge, opportunities,
                    and resources. We think our directory can play a crucial role in career development, business
                    growth, and personal branding. The goal is to exchange information, insights, and support to advance
                    professional interests, whether for job opportunities, business partnerships, or personal growth.
                </p>
            </div>
        </div>

        <div class="service-item Consulting-bg " id="consulting-services">

            <div class="service-info">
                <h2>Consulting Services</h2>
                <p>With over a decade experience in the manufacturing industry our aim to help organizations solve
                    problems, improve performance, or achieve specific goals. We can use our knowledge, skills, and
                    expertise to offer advice, guidance, and recommendations in various areas such as business strategy,
                    management and operations.</p>
            </div>
            <div class="service-image">
                <img src="assets/images/Consulting Services12.png" alt="Consulting Services">
            </div>
        </div>

        <div class="service-item manufacturing-bg" id="manufacturing-services">
            <div class="service-image">
                <img src="assets/images/ManufacturingServices11.jpg" alt="Manufacturing Services">
            </div>
            <div class="service-info">
                <h2>Manufacturing Services</h2>
                <p>This includes the design and production of sports, and work uniforms or any other clothing based on
                    specific customer requirements. Our Quality Control process often include stringent quality
                    assurance processes to ensure that products meet regulatory standards and customer specifications.
                </p>
            </div>
        </div>

        <div class="service-item partnership-bg" id="partnership-programs">

            <div class="service-info">
                <h2>Partnership Programs</h2>
                <p>We are open to collaborate with businesses or organizations that aim to achieve common goals, share
                    resources, and leverage each other’s strengths for mutual benefit. We believe strategic partnership
                    can foster long-term cooperation and shared success.</p>
            </div>
            <div class="service-image">
                <img src="assets/images/PartnershipProgramsnew.jpg" alt="Partnership Programs">
            </div>
        </div>
    </section>



    <!-- End Services content session -->

  



    <!-- Footer -->
    @include('component.footer')