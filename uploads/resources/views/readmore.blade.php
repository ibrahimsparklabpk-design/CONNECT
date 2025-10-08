<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   

    
    
    
    
    <title>reammore</title>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@200;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">
   <link rel="stylesheet" href="{{asset('assets/css/responsive.css') }}">

     <!--font awsome icon -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
 <!--for font karla -->
 <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
  <link rel="shortcut icon" href="assets/images/whitelogo2.png">
  
  
 
  
  
  

</head>

<style>


 
    body {
        /*background-image: url('{{ asset("assets/logo.png") }}');*/
     
        
        /*    background-size: 1336px;*/
        /*background-repeat: no-repeat;*/
        /*background-position: center;*/
        /*opacity: 1.5;*/
        background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
        
    }

    .business-details-header,
    .bussiness-mai-caed {
        position: relative;
        z-index: 1;
        background: rgba(255, 255, 255, 0.8);
        /* Card ko transparency dena */

        padding: 20px;
    }

   .business-details-header {
    position: relative;
    width: 100%;
    background: linear-gradient(45deg, #0074cc, #3b8ac6);
/*    background: url('../assets/bannerconnnection.jpg') no-repeat center center;*/
/*background-size: cover;*/
    padding-top: 150px;
    padding-bottom: 200px;
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden; /* Ensure child elements don't overflow */
}


/*.business-details-header::before {*/
/*    content: "";*/
/*    position: absolute;*/
/*    top: 0;*/
/*    right: 0;*/
/*    bottom: 0;*/
/*    left: 0;*/
/*    background: url('../assets/bannerconnnection.jpg') left center no-repeat;*/
/*    background-size: 500px;*/
/*    opacity: 0.1; */
/*    z-index: 0; */
/*}*/

/*.business-details-header > * {*/
/*    position: relative;*/
/*    z-index: 1; */
/*}*/





    .business-profile-img {
        width: 210px;
        height: 210px;
        margin-right: 20px;
        border-radius: 100%;
        /*background-color: rgb(165, 165, 165);*/
        background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: transform 0.3s ease;

    }

    .business-profile-img img {
         width: 210px;
    height: 210px;
    /* object-fit: cover; */
    border-radius: 50%;
    border: 2px solid #ddd;

    }

    .business-info {}

    .business-heading {
        font-size: 50px;
        margin: 0;
        font-family: "Karla", Sans-serif !important;
        font-weight: 800;
        color: white;
    }

    .business-rating {
        font-size: 45px;
        font-weight: 600;
        color: #c0c0c0;
        margin-top: 5px;
        font-family: "Karla", Sans-serif;
        margin-bottom: -4px;
    }

    /*.business-verified-company {*/
    /*    width: 360px;*/
    /*    height: 50px;*/
    /*    background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);*/
        
    /*    color: rgb(0, 0, 0);*/

    /*    display: flex;*/
    /*    align-items: center;*/
    /*    justify-content: center;*/
    /*    text-transform: uppercase;*/
    /*    border-radius: 10px;*/
    /*    font-family: "Karla", Sans-serif;*/
    /*    margin-top: 10px;*/
    /*}*/

    /*.business-verified-company p {*/
    /*    font-size: 22px;*/
    /*    font-weight: 600;*/
    /*    font-family: "Karla", Sans-serif;*/

    /*}*/
    
    .business-n-col{
        display: flex;
        gap: 20px;
      
        align-items: center;
        
    }
    
    .business-verified-company {
    font-size: 18px;
    color: green;
    font-weight: bold;
}

.business-verified-company i {
    color: white;
    margin-right: 5px;
    font-size: 40px;
}


    .business-wesite {

        height: 50px;
        background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
        color: rgb(0, 0, 0);

        display: flex;
        align-items: center;
        justify-content: center;
        text-transform: uppercase;
        border-radius: 10px;
        font-family: "Karla", Sans-serif;
        margin-top: 10px;
        padding: 0px 10px
    }

    .business-wesite p {
        font-size: 22px;
        font-weight: 600;
        font-family: "Karla", Sans-serif;

    }

    .business-wesite p a {
        text-decoration: none;
        color: black;
        font-family: "Karla", Sans-serif;


    }

    .bussiness-mai-caed {

        padding: 10px 100px 10px 100px;
        display: flex;
        flex-direction: row;
        justify-content: center;

        gap: 20px;



    }



    .right-card {
        width: 70%;
        border: 1px solid rgb(196, 196, 197);
        /*background-color: white;*/
        background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0px 10px 15px #00000033;
        margin-top: -150px
    }

    .left-card {
        /*border: 1px solid rgb(196, 196, 197);*/
        width: 30%;
        /*background-color: white;*/
        /*padding: 25px;*/
        border-radius: 15px;

        /* border: .2rem solid transparent; */
        /*box-shadow: 0px 8px 15px #0000002e;*/
        margin-top: -150px;

    }

    .row-bussiness-heading {
        display: flex;
        justify-content: center;
        align-items: center;


    }

    .row-bussiness-heading h1 {
        font-family: "Karla", sans-serif;
        font-size: 40px;
        font-weight: 700;


    }

    .row-business-detail {}

    .row-inner {
        display: flex;
        justify-items: center;
        align-items: center;

    }

    .col1-business-detail {

        width: 50%;
        padding: 10px;
        flex-direction: column;
        row-gap: 20px;
        justify-content: center;
        align-items: flex-start;
    }

    .col2-business-detail {

        width: 50%;
        padding: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }

    .business-box {
        display: flex;
        flex-direction: column;
        justify-content: center;
        margin-bottom: 10px;
        border: 1px solid #0000001c;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 10px15px black;
        box-shadow: 0px 10px 15px #0000001c;
    }
    .business-box:hover{
        border: 1px solid black;
    }

    .col-business-box {
        display: flex;
        align-items: center;

    }

    .col2-business-box {
        display: flex;

        margin-top: 10px;

        color: black;
    }

    .col-business-box i {
        width: 17px;

        font-size: 17px;
        color: #ffffff;
        padding: 10px 15px 10px 15px;
        margin-right: 10px;

        background-color: #0074cc;
        display: flex;
        justify-items: center;
        justify-content: center;


        border-radius: 50%;

    }

    .col-business-box h3 {

        font-family: "Karla", sans-serif;
        font-size: 18px;
        font-weight: 700;

    }

    .col2-business-box p {
        font-size: 16px;
        font-weight: 500;
        font-family: "Karla", sans-serif;
        /* padding-left: 40px; */

    }
    .col2-business-box p a{
        text-decoration:none;
        color:black;
    }

    .goodsSwervices {

        width: 100%;
        padding: 10px;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
    }

    /* reviwe card css */
    .row-review-heading {
        display: flex;
        justify-content: center;
        font-family: "Karla", sans-serif;
        /*background-color: white;*/
        background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
    padding: 25px;
    border-radius: 10px 10px 0px 0px;
    
    }


    .business-details-review {


           padding: 10px 25px 10px 25px;
        display: flex;
        flex-direction: column;
            /*background-color: white;*/
            background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
            border-radius: 0px 0px 10px 10px;


    }

    .business-details-review label {
        font-weight: bold;
        font-family: "Karla", sans-serif;
    }

    .business-details-review input,
    .business-details-review textarea,
    .business-details-review select {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .business-details-review .rating {
        display: flex;
        gap: 5px;
    }

    .star {
        font-size: 2rem;
        color: lightgray;
        cursor: pointer;
    }

    .star.filled {
        color: gold;
    }

    .business-details-review button {

        width: 100%;
        max-width: 100%;
        margin-bottom: 15px;
        box-sizing: border-box;
        border: 1px solid #00000038;
      
        background-color: #000000;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 23px;
        cursor: pointer;
        font-family: "Karla", sans-serif;
        font-size: 17px;
    }

    .business-details-review button:hover {
        background-color: #0056b3;
    }

    .business-letter {
        font-size: 150px;
        font-family: "Karla", sans-serif;
        font-weight: 800;
    }
    
    
    /*short commet display*/
    
     .comment-box {
            position: relative;
            background: #F6F6F6;
            border-radius: 20px;
            padding: 20px;
            width: 100%;
            box-shadow: 0px 10px 15px #0000001f;
            margin-top:20px;
            background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);
        }

        .profile-pic {
            position: absolute;
            top: 20px;
            left: 20px;
            width: 50px;
            height: 50px;
            background: #ddd;
            border-radius: 50%;
                display: flex;
    justify-content: center;
    align-items: center;
    font-size: 33px;
     font-family: "Karla", sans-serif;

        }

        .comment-text {
            margin-left: 80px;
        }

        .comment-text h3 {
            margin: 0 0 10px;
            font-family: "Karla", sans-serif;
        }
   .comment-text p {
           
            font-family: "Karla", sans-serif;
        }
        .stars {
            margin-top: 10px;
        }

        .stars span {
            color: gold;
            font-size: 20px;
        }
        
        
        
          /* share button */

.custom-box1 {
  position: relative;
}

.share-button {
  width: 14%;
 display: flex;
gap: 10px;
  padding: 10px;
  font-size: 16px;
  background-color: #000000;
  color: #fff;
  border: none;
  border-radius: 23px;
  cursor: pointer;
  transition: background-color 0.3s ease;

}

.share-button:hover {
  background-color: #2d2e2e;
}

.share-popup {
  position: absolute;
  display: flex;
  gap: 10px;
  left: 150px;
  top: -3px;
  pointer-events: none;
}
.social-button:hover{
    border:1px solid black;
}

.share-popup .social-button {
  display: flex;
  gap: 10px;
  /* justify-content: center; */
  align-items: center;

  font-size: 14px;
  font-family: "Karla", sans-serif !important;

  color: #fff;
  border-radius: 23px;

  cursor: pointer;
  opacity: 0;
  transform: translateX(-50px);
  transition: opacity 0.5s, transform 0.5s;
  width: 120px;

  height: 40px;

  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  border: 0;
  padding: 0px 10px;

}

.facebook {
  background-color: #3b579d;
}

.twitter {
  background-color: #000000;
}

.instagram {
  background: linear-gradient(45deg, #f58529, #dd2a7b, #8134af, #515bd4);
}

.whatsapp {
  background-color: #2ab318;
}

.share-popup .social-button img {
  width: 20px;
  /* Icon size chhota */
  height: 20px;
}

.share-popup.show .social-button {
  pointer-events: auto;
  opacity: 1;
  transform: translateX(0);
}
.share-popup.show .social-button:hover{
    border:2px solid black;
}

.share-popup.show .social-button:nth-child(1) {
  transition-delay: 0.1s;
}

.share-popup.show .social-button:nth-child(2) {
  transition-delay: 0.2s;
}

.share-popup.show .social-button:nth-child(3) {
  transition-delay: 0.3s;
}

.share-popup.show .social-button:nth-child(4) {
  transition-delay: 0.4s;
}

/* end share button */
        
        
        
        
         @media (min-width: 3840px) {
            .bussiness-mai-caed{
                    padding: 10px 900px 10px 900px;
               
            }
            .business-box{
                padding: 65px;
            }
           .business-details-review input{
               padding:35px;
           }
           .comment-box{
               padding: 75px;
           }
           .share-popup{
               
               position: absolute;
                display: flex;
                gap: 10px;
                left: 211px;
                top: 14px;
                pointer-events: none;
               
           }
            
        }
        
        
        
      
        
        
        
        
        
        
        
        
        
        
        
        
</style>

<body>
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

    <div class="business-details-header">


        <div class="business-profile-img">
            @if($directory->profile_picture && Storage::disk('public')->exists($directory->profile_picture))
            <!--<img src="{{ Storage::url($directory->profile_picture) }}" alt="Profile Picture">-->
            
            
            <img  src="{{ asset('storage/' . $directory->profile_picture) }}" alt="Profile Picture">
            
            
            
            
            
           
            
            
            
            
            
            
            @else
            <div class="placeholder">
                <span class="business-letter">
                    {{ strtoupper(substr($directory->BusinessName, 0, 1)) }}
                </span>
            </div>
            @endif
        </div>




        <div class="business-info">
            
            <div class="business-n-col">
                <h1 class="business-heading">
                {{ $directory->BusinessName}}
            </h1>
            <div class="business-verified-company">
                <i class="fa fa-check-circle" aria-hidden="true"></i> 
            </div>
            </div>
            <h2 class="business-rating">
                <!--Rating:({{number_format($averageRating, 1) }} / 5)-->
                {{ $totalReviews }} Reviews
            </h2>
            <span class="stars">
                @for ($i = 0; $i < floor($averageRating); $i++) <img src="{{ asset('assets/images/startblack.svg') }}"
                    alt="Filled Star" width="50" height="50">
                    @endfor


            </span>
            
         

            <!--<div class="business-wesite">-->
            <!--    <p>-->
            <!--        <a href="{{ $directory->Website }}" class="user-url">{{ $directory->Website}} </a>-->
            <!--    </p>-->

            <!--</div>-->
            
            
            <!--@if(!empty($directory->Website))-->
            <!--    <div class="business-wesite">-->
            <!--        <p>-->
            <!--            <a href="{{ $directory->Website }}" class="user-url">{{ $directory->Website }}</a>-->
            <!--        </p>-->
            <!--    </div>-->
            <!--@else-->
            
            
            <!-- <div class="business-wesite">-->
            <!--        <p>-->
            <!--            <a href="https://www.connect767.com" class="user-url">-->
            <!--                www.connect767.com-->
            <!--            </a>-->
            <!--        </p>-->
            <!--    </div>-->
            
            <!--@endif-->
            
            
            @if(!empty($directory->Website))
    <div class="business-wesite">
        <p>
            @php
                $website = $directory->Website;
                if (!preg_match("~^(?:f|ht)tps?://~i", $website)) {
                    $website = "https://" . $website;
                }
            @endphp
            <a href="{{ $website }}" class="user-url">{{ $directory->Website }}</a>
        </p>
    </div>
@else
    <div class="business-wesite">
        <p>
            <a href="https://www.connect767.com" class="user-url">
                www.connect767.com
            </a>
        </p>
    </div>
@endif
            
            
            
            
            
            
            

        </div>

    </div>

    <!-- business main card -->

    <div class="bussiness-mai-caed">
        <div class="right-card">
            <div class="row-bussiness-heading">
                <h1>
                    Business Details
                </h1>

            </div>
            
            <!--goods and services on top-->
            <div class="row-business-detail">
                
                
                 <div class="goodsSwervices">
                    <div class="business-box">
                        <div class="col-business-box">
                            <i class="fa-solid fa-handshake-angle"></i>
                            <h3>Goods/Services Provided</h3>

                        </div>

                        <div class="col2-business-box">


                            <p>
                                {{ $directory->GoodsServices }}
                            </p>
                        </div>

                    </div>

                </div>
                
                
                <div class="row-inner">
                    <div class="col1-business-detail">
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-briefcase"></i>
                                <h3>Business Name</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    {{ $directory->BusinessName }}
                                </p>
                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-envelope"></i>
                                <h3>Email</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    <a href="mailto:{{$directory->Email}}" target="_blank">
                                        {{ $directory->Email }}
                                    </a>
                                </p>
                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-user-graduate"></i>
                                <h3>Education</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    {{ $directory->Education }}
                                </p>
                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-globe"></i>
                                <h3>Country</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    {{ $directory->Country }}
                                </p>
                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-map-location"></i>
                                <h3>State</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    {{ $directory->State }}
                                </p>
                            </div>

                        </div>
                       <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-building"></i>
                                <h3>
                                    Building Number</h3>

                            </div>

                            <div class="col2-business-box">

                                <p>{{ $directory->BuildingNumber }}</p>

                            </div>

                        </div>


                    </div>
                    <div class="col2-business-detail">
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-industry"></i>
                                <h3>Industry</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    {{ $directory->Industry }}
                                </p>
                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-phone"></i>
                                <h3>Phone Number</h3>
                                
                                
                                

                            </div>

                            <div class="col2-business-box">


                                
                                <p>
                                    <a href="tel:{{ $directory->PhoneNumber }}" target="_blank">
                                       {{ $directory->PhoneNumber }}
                                    </a>
                                </p>
                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-handshake-angle"></i>
                                <h3>Experience</h3>

                            </div>

                            <div class="col2-business-box">



                                <p>{{ $directory->Experience }}</p>

                            </div>

                        </div>
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-arrow-pointer"></i>
                                <h3>
                                    Website</h3>

                            </div>

                            <div class="col2-business-box">




                                <p><a href="{{$directory->Website }}">{{ $directory->Website }}</a></p>


                            </div>

                        </div>
                        
                        
                        
                        <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-city"></i>
                                <h3>
                                    City</h3>

                            </div>

                            <div class="col2-business-box">

                                <p>{{ $directory->City}}</p>

                            </div>

                        </div>
                        
                        
                        
                         <div class="business-box">
                            <div class="col-business-box">
                                <i class="fa-solid fa-street-view"></i>
                                <h3>Street Name</h3>

                            </div>

                            <div class="col2-business-box">


                                <p>
                                    {{ $directory->StreetName }}
                                </p>
                            </div>

                        </div>
                        
                        
                        

                    </div>

                </div>
                <!--<div class="goodsSwervices">-->
                <!--    <div class="business-box">-->
                <!--        <div class="col-business-box">-->
                <!--            <i class="fa-solid fa-handshake-angle"></i>-->
                <!--            <h3>Goods/Services Provided</h3>-->

                <!--        </div>-->

                <!--        <div class="col2-business-box">-->


                <!--            <p>-->
                <!--                {{ $directory->GoodsServices }}-->
                <!--            </p>-->
                <!--        </div>-->

                <!--    </div>-->

                <!--</div>-->
                <div class="custom-box1">
                <button class="share-button " onclick="toggleSharePopup()">
                    <img  src="{{ asset('assets/shareiconwhite.png') }}" alt="Share" style="width: 30%;" />
                    
                   
                    <span>Share</span>
                </button>
                
                
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
                
                
                
                
                <div class="share-popup" id="sharePopup">
                    <button class="social-button facebook" onclick="shareOnFacebook()">
                        <img src="{{ asset('assets/fb.png') }}" alt="Facebook" class="icon" />
                        <span>Facebook</span>
                       
                        
                        
                    </button>

                    <!-- facebook sahre data -->

<!-- Facebook SDK Initialization -->
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1662055734402455', // Apna App ID yahan daalein
            cookie     : true,
            xfbml      : true,
            version    : 'v12.0'
        });

        FB.AppEvents.logPageView();
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Share Data on Facebook -->
<script>
    function shareOnFacebook() {
      
        FB.getLoginStatus(function(response) {
            if (response.status === 'connected') {
              
                shareDataToFacebook();
            } else {
                
                FB.login(function(response) {
                    if (response.authResponse) {
                        // Agar user successful login kar leta hai, to share karen
                        shareDataToFacebook();
                    } else {
                        alert(".");
                    }
                }, {scope: 'public_profile,email'});  
            }
        });
    }

    function shareDataToFacebook() {
        const businessName = "{{ $directory->BusinessName }}";
        const industry = "{{ $directory->Industry }}";
        const goodsServices = "{{ $directory->GoodsServices }}";
        const email = "{{ $directory->Email }}";
        const country = "{{ $directory->Country }}";
        const state = "{{ $directory->State }}";
        const city = "{{ $directory->City }}";
        const phoneNumber = "{{ $directory->PhoneNumber }}";
        const website = "{{ $directory->Website }}";

        const text = `🌟 *Business Details* 🌟\n\n
📌 *Business Name:* ${businessName}\n
🏭 *Industry:* ${industry}\n
🛍️ *Goods/Services:* ${goodsServices}\n
📧 *Email:* ${email}\n
🌍 *Country:* ${country}\n
🏙️ *State:* ${state}\n
🏡 *City:* ${city}\n
📞 *Phone:* ${phoneNumber}\n
🔗 *Website:* ${website}`;

        // Facebook API ko use karke post karen
        FB.api('/me/feed', 'post', {
            message: text
        }, function(response) {
            if (response && !response.error) {
                alert("Post successfully share hogaya!");
            } else {
                alert("Post share karne mein error aa gaya.");
            }
        });
    }
</script>
                    
                    <!--<script>-->
                    <!--    function shareOnFacebook() {-->
                        
                    <!--        const businessName = "{{ $directory->BusinessName }}";-->
                    <!--        const industry = "{{ $directory->Industry }}";-->
                    <!--        const email = "{{ $directory->Email }}";-->
                    <!--        const phone = "{{ $directory->PhoneNumber }}";-->
                    <!--        const website = "{{ $directory->Website }}";-->
                    <!--        const goodsServices = "{{ $directory->GoodsServices }}";-->
                    
                          
                    <!--        const shareText = `-->
                    <!--            Business Name: ${businessName}\n-->
                    <!--            Industry: ${industry}\n-->
                    <!--            Email: ${email}\n-->
                    <!--            Phone: ${phone}\n-->
                    <!--            Website: ${website}\n-->
                    <!--            Goods/Services: ${goodsServices}\n-->
                    <!--            Check out this business on Connect767!-->
                    <!--        `;-->
                    
                         
                    <!--        const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent('https://www.connect767.com/')}&quote=${encodeURIComponent(shareText)}`;-->
                    
                           
                    <!--        window.open(url, '_blank', 'width=600,height=400');-->
                    <!--    }-->
                    <!--</script>-->


                    <button class="social-button twitter" onclick="shareOnTwitter()">
                        <img  src="{{ asset('assets/twitter-x-icon.png') }}" alt="Twitter" class="icon" />
                       
                        <span>Twitter</span>
                    </button>


                   <script>
                   function shareOnTwitter() {
                        const businessName = "{{ $directory->BusinessName }}";
                        const industry = "{{ $directory->Industry }}";
                        const goodsServices = "{{ $directory->GoodsServices }}";
                        const email = "{{ $directory->Email }}";
                        const education = "{{ $directory->Education }}";
                        const country = "{{ $directory->Country }}";
                        const state = "{{ $directory->State }}";
                        const city = "{{ $directory->City }}";
                        const streetName = "{{ $directory->StreetName }}";
                        const buildingNumber = "{{ $directory->BuildingNumber }}";
                        const phoneNumber = "{{ $directory->PhoneNumber }}";
                        const experience = "{{ $directory->Experience }}";
                        const website = "{{ $directory->Website }}";
                    
                        let text = `🌟 *Business Details* 🌟\n
                    📌 *Business Name:* ${businessName}\n
                    🏭 *Industry:* ${industry}\n
                    🛍️ *Goods/Services:* ${goodsServices}\n
                    📧 *Email:* ${email}\n
                    🎓 *Education:* ${education}\n
                    🌍 *Country:* ${country}\n
                    🏙️ *State:* ${state}\n
                    🏡 *City:* ${city}\n
                    🚏 *Street:* ${streetName}\n
                    🏢 *Building No:* ${buildingNumber}\n
                    📞 *Phone:* ${phoneNumber}\n
                    💼 *Experience:* ${experience}\n
                    🔗 *Website:* ${website}`;
                    
                        // Agar text 280 characters se zyada hai to cut kar do
                        if (text.length > 280) {
                            text = text.substring(0, 277) + "..."; // Last 3 dots lagane ke liye
                        }
                    
                        const tweetUrl = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
                        window.open(tweetUrl, '_blank');
                    }
                </script>



                    <button class="social-button instagram" onclick="shareOnInstagram()">
                        <img src="{{ asset('assets/c-Instagram.png') }}" alt="Instagram" class="icon" />
                         
                        <span>Instagram</span>
                    </button>

                    <script>
                       function shareOnInstagram() {
                            const businessName = "{{ $directory->BusinessName }}";
                            const industry = "{{ $directory->Industry }}";
                            const goodsServices = "{{ $directory->GoodsServices }}";
                            const email = "{{ $directory->Email }}";
                            const education = "{{ $directory->Education }}";
                            const country = "{{ $directory->Country }}";
                            const state = "{{ $directory->State }}";
                            const city = "{{ $directory->City }}";
                            const streetName = "{{ $directory->StreetName }}";
                            const buildingNumber = "{{ $directory->BuildingNumber }}";
                            const phoneNumber = "{{ $directory->PhoneNumber }}";
                            const experience = "{{ $directory->Experience }}";
                            const website = "{{ $directory->Website }}";
                        
                            let text = `🌟 *Business Details* 🌟\n
                        📌 *Business Name:* ${businessName}\n
                        🏭 *Industry:* ${industry}\n
                        🛍️ *Goods/Services:* ${goodsServices}\n
                        📧 *Email:* ${email}\n
                        🎓 *Education:* ${education}\n
                        🌍 *Country:* ${country}\n
                        🏙️ *State:* ${state}\n
                        🏡 *City:* ${city}\n
                        🚏 *Street:* ${streetName}\n
                        🏢 *Building No:* ${buildingNumber}\n
                        📞 *Phone:* ${phoneNumber}\n
                        💼 *Experience:* ${experience}\n
                        🔗 *Website:* ${website}`;
                        
                            const instagramUrl = `https://www.instagram.com/direct/new/`;
                            window.open(instagramUrl, '_blank');
                        }
                    </script>


                    <button class="social-button whatsapp" onclick="shareOnWhatsApp()">
                        <img src="{{ asset('assets/whatsapp.png') }}" alt="WhatsApp" class="icon" />
                        
                        <span>WhatsApp</span>
                    </button>

                   <script>
                        function shareOnWhatsApp() {
                            const businessName = "{{ $directory->BusinessName }}";
                            const industry = "{{ $directory->Industry }}";
                            const goodsServices = "{{ $directory->GoodsServices }}";
                            const email = "{{ $directory->Email }}";
                            const education = "{{ $directory->Education }}";
                            const country = "{{ $directory->Country }}";
                            const state = "{{ $directory->State }}";
                            const city = "{{ $directory->City }}";
                            const streetName = "{{ $directory->StreetName }}";
                            const buildingNumber = "{{ $directory->BuildingNumber }}";
                            const phoneNumber = "{{ $directory->PhoneNumber }}";
                            const experience = "{{ $directory->Experience }}";
                            const website = "{{ $directory->Website }}";
                    
                            const text = `🌟 *Business Details* 🌟\n\n
                    📌 *Business Name:* ${businessName}\n\n
                    🏭 *Industry:* ${industry}\n\n
                    🛍️ *Goods/Services:* ${goodsServices}\n\n
                    📧 *Email:* ${email}\n\n
                    🎓 *Education:* ${education}\n\n
                    🌍 *Country:* ${country}\n\n
                    🏙️ *State:* ${state}\n\n
                    🏡 *City:* ${city}\n\n
                    🚏 *Street:* ${streetName}\n\n
                    🏢 *Building No:* ${buildingNumber}\n\n
                    📞 *Phone:* ${phoneNumber}\n\n
                    💼 *Experience:* ${experience}\n\n
                    🔗 *Website:* ${website}\n\n
                    `;
                    
                            const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
                            window.open(url, '_blank');
                        }
                    </script>
                </div>
            </div>



            </div>
        </div>
        <div class="left-card">
            <div class="row-review-heading">
                <h1>
                    Write a review
                </h1>

            </div>
            <div class="row-review-form">

                <form class="business-details-review" action="{{ route('comments.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="directory_id" value="{{ $directory->id }}">

                    <label for="name">Your Name:</label>
                    <input type="text" id="name" name="reviewer_name" required>

                    <label for="title">Review Title:</label>
                    <input type="text" id="title" name="review_title" required>

                    <label for="description">Review Description:</label>
                    <textarea id="description" name="review_description" rows="4" required></textarea>

                    <label for="date">Date of Experience:</label>
                    <input type="date" id="date" name="date_of_experience" required>

                    <label>Rating (Stars):</label>
                    <div class="rating">
                        <span class="star" data-value="1">★</span>
                        <span class="star" data-value="2">★</span>
                        <span class="star" data-value="3">★</span>
                        <span class="star" data-value="4">★</span>
                        <span class="star" data-value="5">★</span>
                        <input type="hidden" id="rating" name="review_stars" value="5">
                    </div>

                    <button type="submit">Submit Review</button>
                </form>

            </div>
           <div>
                @foreach($comments->take(2) as $comment)
                    <div class="comment-box">
                        <div class="profile-pic">
                            {{ strtoupper(substr($comment->reviewer_name, 0, 1)) }}
                        </div>
                        <div class="comment-text">
                            <h3>{{ $comment->reviewer_name }}</h3>
                            <p>{{ $comment->review_description }}</p>
                            <div class="stars">
                                @for ($i = 0; $i < floor($averageRating); $i++)
                                    <img src="{{ asset('assets/images/startblack.svg') }}" alt="Filled Star" width="20" height="50">
                                @endfor
                            </div>
                        </div>
                    </div>
                 @endforeach
            </div>
          
        </div>

    </div>


    <script>
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const value = this.getAttribute('data-value');
                ratingInput.value = value;
                stars.forEach(s => s.classList.remove('filled'));
                for (let i = 0; i < value; i++) {
                    stars[i].classList.add('filled');
                }
            });
        });
    </script>




    <!-- < Main Section Ends -->
    @include('component.footer')