<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
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
        
          <link rel="shortcut icon" href="assets/images/whitelogo2.png">

    <style>
        .hero-section {
            position: relative;
            /* Make the section position relative to apply overlay */
            background-image: url('assets/images/help.jpg');
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
            /*align-items: center;*/
            justify-content: center;
            padding: 0px 50px 0px 50px;
          
         
        }

        .about-heading {
            font-size: 30px;
            margin: 40px 0px 10px 0px;
            font-family: "Karla", Sans-serif !important;
            color:black;
              z-index: 999;
        }

        .about-des {
           
            font-family: "Karla", Sans-serif !important;
            font-size: 18px;
            line-height: 25px;
            color:black;
           z-index: 999;
           line-height: 30px;
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
        .faqs-section{
            
             position: relative;
            border: 1px solid #ddd;
            /*padding: 20px;*/
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
        
        
        
        /*FAQS*/
        
        
         .faq-container {
            width: 100%;
            /*background: #fff;*/
            padding: 20px;
            border-radius: 10px;
            /*box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);*/
        }
        .faq-row{
            display: flex;
            flex-wrap: wrap; /* Yeh ensure karega ke multiple rows ban sakein */
            justify-content: space-between; /* Yeh equal space maintain karega */
                    
        }

        .faq {
            border-bottom: 1px solid #ddd;
            
            flex: 1 1 calc(50% - 10px); /* Har box ko equal width dena aur beech mein gap dena */
                
                padding: 15px;
                box-sizing: border-box; /* Yeh ensure karega ke padding width count ho */
                min-width: 300px; /* Taake responsive layout mein bhi size maintain rahe */
        }

        .faq-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            /*background: #f1f1f1;*/
            color:black!important;
            border-radius: 5px;
            transition: 0.3s;
            font-family: "Karla", Sans-serif !important;
        }

        .faq-header:hover {
            /*background: #e0e0e0;*/
            background: linear-gradient(135deg, #12385d, #28557c);
            color:white!important;
        }
        
        

        .faq-header i {
            transition: 0.3s;
        }

        .faq-content {
            display: none;
            padding: 15px;
            font-size: 16px;
            background: #fff;
            border-radius: 5px;
             font-family: "Karla", Sans-serif !important;
             color:black!important;
        }

        .faq.active .faq-content {
            display: block;
        }

        .faq.active .faq-header i {
            transform: rotate(180deg);
        }
        
         
        
    </style>

</head>

<body>
    <!-- header -->
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
    <!-- header -->


    <!-- Services Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1>Help</h1>
            <p>Help & Support Guidelines.</p>
        </div>
    </section>
    <!-- Services Hero Section -->
    
      <!--About us-->

    <section id="about" class="about-section">
        <div class="about-row">
            <h1 class="about-heading">
           General Statements Of Principles
            </h1>
            <p class="about-des">
               Any information we gather is strictly for our intended use and is not shared with any other entity, public or private, for any reason.

                We will not sell or give away any lists or other data that we may retain, and we do not purchase such information from other sources.
            </p>
             <h1 class="about-heading">
                Shipping
            </h1>
            <p class="about-des">
              Orders will be shipped within three (3) to five (5) business days after payment verification.<br>

              All continental US orders will be shipped via United States Postal Service (USPS) unless instructed otherwise.<br>
              
              International orders may take up to ten (10) business days depending on the country and method of shipping chosen at checkout.<br>
              
              If you experience delays, contact us immediately, and we will help to confirm the status of your order.
            </p>
            
             <h1 class="about-heading">
             Returns & Exchange
            </h1>
            <p class="about-des">
             We accept returns on eligible domestic orders that are received within 15 days from the day the order was placed.<br>

              However, all returns must be unwashed and unworn and include all original packaging. Please note that Connect767 have the right to deny credit for any returned goods that do not meet the requirements of our return policy, so please treat our pieces with lots of TLC!<br>
              
              Please note that original shipping charges are non-refundable and buyer must pay return shipping cost. Once we have received the item(s), we will process your refund or store credit within 5-7 business days, and send you an email to let you know.<br>
              
             
            </p>
            
             <h1 class="about-heading">
                Featured Professional
            </h1>
            <p class="about-des">
             To be a featured professional sign up and in your account settings edit your directory information.<br>

             Purchase the featured professional package<br>
              
              Submit a short biography to <a href="mailto:info@connect767.com">info@connect767.com</a> with a subject using your directory entry name is a reference.<br>
              
              
             
              
             
            </p>
            
            
            
             <h1 class="about-heading">
                Featured Business
            </h1>
            <p class="about-des">
            To be a featured professional sign up and in your account settings edit your directory information.<br>

             Purchase the featured professional package<br>
              
           
              
              
             
              
             
            </p>
            
            
            <h1 class="about-heading">
                What Happens If There’s Been A Delivery Mishap To My Order? (Damaged Or Lost Delivery) 
            </h1>
            <p class="about-des">
            We take such matters very seriously and will look into individual cases thoroughly.<br>

             Any orders that are damaged should not be thrown away before taking a photo of the damaged item as proof and emailing the pictures to us at <a href="mailto:info@connect767.com"> info@connect767.com.</a><br>
             
             In the event of lost mail, we will open up a formal inquiry and if there’s a clear indication that your order is indeed lost, we’ll re-send it to you at no cost, subject to availability.
              
              
             
            </p>
            
            <h1 class="about-heading">
               Statistical Data 
            </h1>
            <p class="about-des">
           Our servers (as most) track IP addresses and referring pages to help with site maintenance and improvements.<br>

             This data is viewed only as anonymous statistics to show the busiest times of the day or week, pages with errors and how effective our advertising has been. This information will not be used for any other purpose.<br>
             
            </p>
            
            <h1 class="about-heading">
              Personal Information Collected
            </h1>
            <p class="about-des">
           We do not store any type of sales information. Except for payment, we store the information from our “Directory” section to help develop our digital directory of “Professionals” and “Business.” It also allows us to track consulting issues or refer to a previous order to help provide some customer service.<br>
           
            However, if you choose, you have the option of having your information removed from this system by e-mailing us with your request.<br>
             
            </p>
            
            
            <h1 class="about-heading">
              Information Correction Or Removal
            </h1>
            <p class="about-des">
          If you wish to correct, update or remove any information about you that may be in our records, please send us an e-mail with the details of your request. If you wish to contact us further, please find complete contact information on our contact page.<br>
             
            </p>
            
             <h1 class="about-heading">
              Cookies
            </h1>
            <p class="about-des">
          Cookies are files with small amount of data, which may include a unique anonymous identifier. Cookies are sent to your browser from a web site and stored on your computer’s hard drive.<br>
          
          We use “cookies” to store your cart contents for you. You can instruct your browser to refuse all cookies or to indicate when a cookie is being sent. However, if you do not accept cookies, you may not be able to use the checkout section of our site!<br>
             
            </p>
            <h1 class="about-heading">
               Changes To This Privacy Policy
            </h1>
            <p class="about-des">
         This Privacy Policy is effective as of February 2, 2019, and will remain in effect except concerning any changes in its provisions in the future, which will be in effect immediately after being posted on this page.<br>
          
       
             
            </p>


        </div>
        
      

        
        
    </section>
    
    
     
   
    
    <section id="faqs" class="faqs-section">
        
         <section class="our-services-section">
          <div class="overlay">
            <h1>FAQS</h1>
          </div>
        </section>
        

       
         
        <div class="faq-container">
        
                <div class="faq-row">
                    
                    <div class="faq">
                        <div class="faq-header">
                            <span>How is my personal information handled?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Any information we gather is strictly for our intended use and is not shared with any other entity, public or private, for any reason. We do not sell or give away any lists or purchase such information from other sources.</p>
                        </div>
                    </div>
        
                    <div class="faq">
                        <div class="faq-header">
                            <span>How long does it take to ship my order?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Orders are shipped within 3-5 business days after payment verification.</p>
                        </div>
                    </div>
                    
                    
                </div>
                
                   
                  
                <div class="faq-row">
                    <div class="faq">
                        <div class="faq-header">
                            <span>What shipping methods do you use?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>All continental US orders are shipped via USPS unless instructed otherwise. International orders may take up to 10 business days.</p>
                        </div>
                    </div>
                    <div class="faq">
                        <div class="faq-header">
                            <span>What should I do if my order is delayed?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Contact us immediately, and we will help confirm the status of your order.</p>
                        </div>
                        
                    </div>
                </div>
                
                <div class="faq-row">
                
                    <div class="faq">
                        <div class="faq-header">
                            <span>Can I return an item?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Yes, we accept returns on eligible domestic orders within 15 days from the order date, provided the items are unworn, unwashed, and include all original packaging.</p>
                        </div>
                        
                    </div>
                    <div class="faq">
                        <div class="faq-header">
                            <span>Who covers the return shipping cost?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>The buyer must pay return shipping costs. Original shipping charges are non-refundable.</p>
                        </div>
                        
                    </div>
                </div>
                    
                <div class="faq-row">
                    <div class="faq">
                        <div class="faq-header">
                            <span>How long does it take to process a refund?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Refunds or store credits are processed within 5-7 business days after we receive the returned item(s).</p>
                        </div>
                        
                    </div>
                    <div class="faq">
                        <div class="faq-header">
                            <span>How can I become a featured professional?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Sign up, edit your directory information in your account settings, purchase the featured professional package, and submit a short biography to <a href="mailto:info@connect767.com">info@connect767.com<a/>.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="faq-row">
                    
                    <div class="faq">
                        <div class="faq-header">
                            <span>How can I feature my business?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Sign up, edit your directory information, and purchase the featured professional package.</p>
                        </div>
                        
                    </div>
                    <div class="faq">
                        <div class="faq-header">
                            <span>What should I do if my order is damaged?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            
                            
                              <p>Take a photo of the damaged item as proof and email it to info@connect767.com.</p>
                            
                            
                            
                            
                        </div>
                        
                    </div>
                </div>
                
                <div class="faq-row">
                    <div class="faq">
                        <div class="faq-header">
                            <span>What happens if my order is lost?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>We will open a formal inquiry. If your order is confirmed lost, we will resend it at no cost, subject to availability.</p>
                        </div>
                        
                    </div>
                    <div class="faq">
                        <div class="faq-header">
                            <span>What data is collected on the website?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Our servers track IP addresses and referring pages to help with site maintenance. This data is used anonymously for statistical purposes.</p>
                        </div>
                        
                    </div>
                </div>
                
                <div class="faq-row">
                    
                    <div class="faq">
                        <div class="faq-header">
                            <span>Does your store sell personal information?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>No! We do not sell any personal information.</p>
                        </div>
                        
                    </div>
                    <div class="faq">
                        <div class="faq-header">
                            <span>Can I request the removal of my personal information?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Yes, you can request the removal of your information by emailing us.</p>
                        </div>
                        
                    </div>
                </div>
                
                
                <div class="faq-row">
                    <div class="faq">
                        <div class="faq-header">
                            <span>What are cookies, and how do you use them?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Cookies are small data files stored on your device. We use cookies to store your cart contents.</p>
                        </div>
                        
                    </div>
                
                    <div class="faq">
                        <div class="faq-header">
                            <span>What are cookies, and how do you use them?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Cookies are small data files stored on your device. We use cookies to store your cart contents.</p>
                        </div>
                        
                    </div>
                </div>
                <div class="faq-row">
                
                    <div class="faq">
                        <div class="faq-header">
                            <span>Can I disable cookies?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>Yes, you can disable cookies in your browser settings. However, this may affect the checkout functionality on our site.</p>
                        </div>
                        
                    </div>
                
                    <div class="faq">
                        <div class="faq-header">
                            <span>Can When was this privacy policy last updated?</span>
                            <i>▼</i>
                        </div>
                        <div class="faq-content">
                            <p>This Privacy Policy is effective as of February 2, 2019, and any future changes will be posted on this page.</p>
                        </div>
                        
                    </div>
                </div>
        </div>
        
    </section>
    
    
    <!--FAQS srcipt-->
    
    <script>
        document.querySelectorAll('.faq-header').forEach(item => {
            item.addEventListener('click', () => {
                const parent = item.parentElement;
                document.querySelectorAll('.faq').forEach(faq => {
                    if (faq !== parent) {
                        faq.classList.remove('active');
                    }
                });
                parent.classList.toggle('active');
            });
        });
    </script>


    
  



    <!-- Footer -->
    @include('component.footer')