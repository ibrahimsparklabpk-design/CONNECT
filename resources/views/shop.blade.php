<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop Page</title>
    <link rel="stylesheet" href="assets/css/shoppage.css" />

    
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css')
    }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link rel="icon" type="image/png" href="./assets/logo.png" />
       <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Karla:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">
      <!--font awsome icon -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
 
 <!--for font karla -->
 <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
   


</head>


<!-- Navbar starts -->

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
            <!--<li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>-->
               <li><a href="{{route('shop')}}">SHOP</a></li>
            <!--<li><a href="{{route('services')}}">SERVICES</a></li>-->
            <li><a href= "{{route('soccer')}}">CUSTOM UNIFORMS</a></li> 
            
           
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


<!-- Main Section Starts-->


<div class="mainsection-product">
    <h1 class="prod-heading">Featured Products</h1>

    <div class="main-both-sec">
        <div class="cat-sec">
           <ul class="category-list">
    <h1 class="cat-heading">Categories</h1>
    <li><a href="#" data-category="all"><i class="fas fa-store"></i> Shop All</a></li>
    <li><a href="#" data-category="Men"><i class="fas fa-male"></i> Men</a></li>
    <li><a href="#" data-category="Women"><i class="fas fa-female"></i> Women</a></li>
    <li><a href="#" data-category="Toddlers"><i class="fas fa-baby"></i> Toddlers</a></li>
    <li><a href="#" data-category="Sweaters"><i class="fas fa-tshirt"></i> Sweaters</a></li>
    <li><a href="#" data-category="Shirts"><i class="fas fa-tshirt"></i> T-Shirts</a></li>
    <li><a href="#" data-category="Shoes"><i class="fas fa-shoe-prints"></i> Shoes</a></li>
</ul>
        </div>

        <div class="prod-sec">
            <!-- <div class="other-articles first-four">
                four
            </div> -->
            <div class="container_product">
                @foreach($products as $product)
                <div class="article_product" data-category="{{ $product->category }}">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
                    <div class="article-l"><a href="#">{{ $product->title }}</a></div>
                    <div class="article-p">${{ $product->price }} USD</div>
                    @if($product->stock_quantity > 0)
                    <!-- <button class="btn btn-primary">Add to Cart</button> -->
                    <a href="{{ route('singleProduct', $product->id) }}" class="view-all-btn1">Add to Cart</a>
                    @else
                    <!-- <p class="text-danger">Out of Stock</p> -->
                    <button class="view-all-btn1" disabled>Out of Stock</button>
                    @endif
                </div>

                @endforeach

            </div>
        </div>
    </div>

</div>


<!-- Button to reveal the rest of the products -->
<button class="view-all-btn" onclick="toggleProducts()">View All</button>
<!--Scrpt for view all funct Start-->

<!-- // Include jQuery in your project if it's not included already -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function() {
    // Filter products based on category
    $('.category-list a').click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        var category = $(this).data('category');

        // Show all products if "Shop All" is clicked
        if (category === 'all') {
            $('.article_product').show(); // Show all products
        } else {
            $('.article_product').hide(); // Hide all products
            $('.article_product[data-category="' + category + '"]')
                .show(); // Show products of the selected category
        }
    });
});
</script>

<!--Scrpt for view all funct End-->






<!-- Main Section Ends-->













<!-- FOOTER STARTS FORM HERE -->

@include('component.footer')