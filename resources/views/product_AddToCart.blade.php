<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Cart</title>

    <link rel="stylesheet" href="assets/css/product_AddToCart.css">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>


    <!-- Start header session -->
    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">
            <img src="./assets/logo.png" alt="Logo" />
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="{{route('index')}}">HOME</a></li>
            <li><a href="{{route('directoryadd')}}">DIRECTORY</a></li>
            <!-- <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li> -->
            <li><a href="{{route('shop')}}">SHOP</a></li>
            <li><a href="{{route('basketball')}}">CUSTOMIZABLE UNIFORMS</a></li>
        </ul>

        <!-- Check if user is logged in -->
        @if(session('user'))
        <!-- Profile Dropdown Button -->
        <div class="dropdown">
            <button class="profile-btn">Profile &#9662;</button>
            <ul class="dropdown-content">
                <!-- Check user role to show appropriate dashboard link -->
                @if(session('role') === 'admin')
                <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                @else
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        @else
        <!-- Login Button -->
        <button class="login-btn">
            <a style="color:white" href="{{route('login')}}">Login</a> /
            <a style="color:white" href="{{ route('register') }}">Register</a>
        </button>
        @endif
    </nav>
    <!-- End header session -->



    <!-- start cart session -->

    <!-- <div class="container mt-5">
        <h1>Your Cart</h1>
        <div id="cart-items">
            @if(session('cart') && is_array(session('cart')))
            @foreach(session('cart') as $item)
            <div class="cart-item">

                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="max-width: 100px;">
                <h4>{{ $item['title'] }}</h4>
                <p>Price: ${{ number_format($item['price'], 2) }}</p>
                <p>Color: {{ $item['color'] }}</p>
                <p>Size: {{ $item['size'] }}</p>
                <p>Quantity: {{ $item['quantity'] }}</p>
            </div>
            @endforeach
            @endif
        </div>
    </div> -->


    <div class="container mt-5">
        <h1>Your Cart</h1>

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-6"><strong>Product</strong></div>
            <div class="col-md-2 text-center"><strong>Quantity</strong></div>
            <div class="col-md-4 text-right"><strong>Total Price</strong></div>
        </div>

        <!-- Cart Items -->
        <div id="cart-items">
            @if(session('cart') && is_array(session('cart')))
            @foreach(session('cart') as $item)
            <div class="row cart-item align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <!-- Column 1: Image and Details -->
                    <div class="mr-3">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="max-width: 100px;">
                    </div>
                    <div>
                        <h4>{{ $item['title'] }}</h4>
                        <p>Price: ${{ number_format($item['price'], 2) }}</p>
                        <p>Color: {{ $item['color'] }}</p>
                        <p>Size: {{ $item['size'] }}</p>
                    </div>
                </div>

                <div class="col-md-2 text-center">
                    <!-- Column 2: Quantity -->
                    <div class="quantity-div">
                        <p>Quantity: {{ $item['quantity'] }}</p> <!-- Quantity Display -->
                    </div>
                </div>

                <div class="col-md-4 text-right">
                    <!-- Column 3: Total Price -->
                    <p id="total-price">${{ number_format(session('total_price'), 2) }}</p>
                    <!-- Display Total Price -->

                    </p>
                </div>
            </div>
            @endforeach
            @endif
        </div>
        <!-- Checkout Button -->
        <div class="text-right mt-4">
            <a href="{{route('shop_checkout')}}" class="checkout-btn">Checkout</a>
        </div>
    </div>
    <!-- End cart session -->


    <!-- jascript for quantity increasement and decreament -->



</body>

</html>