<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Product</title>
    <link rel="stylesheet" href="assets/css/Single-Product.css" />

    <link rel="icon" type="image/png" href="assets/singleProduct/logo.png" />
      <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css')
    }}">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">




</head>


<!-- Navbar starts -->

 <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

                 <img src="{{ asset('assets/connect1.png') }}"style="width:140px">
            <!--<img src="{{ asset('assets/logo.png') }}">-->
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <!-- <li><a href="{{route('index')}}">HOME</a></li> -->
            <li><a href="{{route('directoryadd')}}">HOME</a></li>
            <li><a href="https://shop.connect767.com/">SHOP</a></li>
            <!-- <li><a href="{{route('basketball')}}">CUSTOM UNIFORMS</a></li> -->
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

            <a href="{{ route('login') }}" class="auth-button">Login</a>

            <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

        </div>


        @endif
    </nav>

<!-- Navbar Ends -->


<!-- Main Section Starts-->


<div class="main-product-container">

    <div class="product-section">
        <img id="product-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}">
        <!-- <img id="product-image" src="assets/singleProduct/product0.webp" alt="Product Image"> -->
    </div>

    <div class="content-section">
        <div class="little-above-heading">PRINTFUL</div>
        <div class="sec-heading">{{ $product->title }}</div>

        <div class="price-div" style="display: flex;">
            <div class="s-p-price">$ {{ $product->price }}USD</div>

            <div class="sold-out" id="stock-display">
                {{ $product->stock_quantity > 0 ? 'Stocks : ' . $product->stock_quantity : 'Sold Out' }}
            </div>
        </div>

        <div class=" shipping-cal">Shipping calculated at checkout.</div>
        <div class="pay-inst">Pay in 4 interest-free installments for orders over $50.00 with Learn more</div>

        <div class="filter-section">
            <p class="btn-headings">Color</p>








            <div class="product-detail">
                <!-- Main Product Image -->
                <img id="product-image1" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                    style="width: 300px; height: auto;">

                <!-- Colors Options Display -->









                <div class="product-colors">
                    @foreach ($colors as $color)
                    <div class="color-option {{ $color['stock_quantity'] > 0 ? '' : 'sold-out' }}"
                        onclick="{{ $color['stock_quantity'] > 0 ? 'changeImage(\'' . $color['image'] . '\', ' . $color['stock_quantity'] . ', \'' . $color['color'] . '\')' : 'event.stopPropagation()' }}"
                        style="cursor: {{ $color['stock_quantity'] > 0 ? 'pointer' : 'not-allowed' }};">
                        <span>{{ $color['color'] }}</span>
                    </div>
                    @endforeach
                </div>


            </div>


            <!-- Hidden input fields -->


            <!-- Script to Handle Image and Quantity Change -->
            <!-- <script>
                function changeImage(imageUrl, stockQuantity) {
                    console.log("Changing image to:", imageUrl);
                    if (imageUrl) {
                        document.getElementById('product-image').src = imageUrl;
                        document.getElementById('product-image1').src = imageUrl;

                        // Update stock quantity display
                        const stockDisplay = document.getElementById('stock-display');
                        stockDisplay.innerHTML = stockQuantity > 0 ? 'Stocks: ' + stockQuantity : 'Sold Out';
                    }
                }
            </script> -->





            <!-- <button class="color-btn unavailable">White</button>
            <button class="color-btn unavailable">Black</button>
            <button class="color-btn unavailable">Army</button>
            <button class="color-btn unavailable">Asphalt</button>
            <button class="color-btn unavailable">Forest</button>
            <button class="color-btn unavailable">Navy</button>
            <button class="color-btn unavailable">Kelly Green</button>
            <button class="color-btn unavailable">New Silver</button>
            <button class="color-btn unavailable">Baby Blue</button>
            <button class="color-btn unavailable">Royal Blue</button>
            <button class="color-btn unavailable">Orange</button>
            <button class="color-btn unavailable">Cranberry</button>
            <button class="color-btn unavailable">Red</button>
            <button class="color-btn unavailable">Fuchsia</button> -->

        </div>




        </script>

        <!-- Size selection section -->


        <div class="filter-section">
            <p class="btn-headings">Size</p>

            <!-- Loop through each size and display it -->
            @foreach ($sizes as $size)
            @php
            // Check the stock for each size by matching with the color variations
            $sizeStock = $colors->firstWhere('size', $size)['stock_quantity'] ?? 0;
            @endphp

            <!-- Display size button with availability check -->
            <button class="size-btn {{ $sizeStock > 0 ? '' : 'unavailable' }}"
                onclick="{{ $sizeStock > 0 ? 'selectSize(\'' . $size . '\', this)' : 'event.stopPropagation()' }}">
                {{ $size }}
            </button>
            @endforeach
        </div>
        <!-- <div class="filter-section">
            <p class="btn-headings">Size</p>
            <button class="size-btn unavailable" onclick="selectSize('XS', this)">XS</button>
            <button class="size-btn unavailable" onclick="selectSize('S', this)">S</button>
            <button class="size-btn unavailable" onclick="selectSize('M', this)">M</button>
            <button class="size-btn unavailable" onclick="selectSize('L', this)">L</button>
            <button class="size-btn unavailable" onclick="selectSize('XL', this)">XL</button>
            <button class="size-btn unavailable" onclick="selectSize('2XL', this)">2XL</button>
            <button class="size-btn unavailable" onclick="selectSize('3XL', this)">3XL</button>
        </div> -->



        <!-- <p class="btn-headings">Quantity</p>
        <div class="quantity-div">

            <button class="quantity-button" onclick="decrement()">-</button>
            <input type="number" id="quantity" value="1"
                style="width: 50px; text-align: center; border: none; outline: none;" />
            <button class="quantity-button" onclick="increment()">+</button>
        </div> -->

        <p class="btn-headings">Quantity</p>
        <div class="quantity-div">
            <button class="quantity-button" type="button" onclick="decrement()">-</button>
            <input type="number" id="quantity" value="1"
                style="width: 50px; text-align: center; border: none; outline: none;" oninput="updateQuantity()" />
            <button class="quantity-button" type="button" onclick="increment()">+</button>
        </div>



        <form id="product-form" action="{{route('add-to-cart')}}" method="POST" onsubmit="return validateForm()">
            @csrf
            <input type="hidden" id="selected-title" name="title" value="{{ $product->title }}">
            <input type="hidden" id="selected-price" name="price" value="{{ $product->price }}">
            <input type="hidden" id="selected-color" name="color">
            <input type="hidden" id="selected-image" name="image">
            <input type="hidden" id="selected-size" name="size">
            <input type="hidden" id="selected-quantity" name="quantity" value="1">
            <button class="prd-sub-btn" type="submit">Add To Cart</button>
        </form>

        <!-- JavaScript to handle selection and update hidden fields -->
        <script>
            // Function to handle color selection
            function changeImage(imageUrl, stockQuantity, colorName) {
                document.getElementById('product-image').src = imageUrl;
                document.getElementById('product-image1').src = imageUrl;

                // Update stock display
                document.getElementById('stock-display').innerHTML = stockQuantity > 0 ? 'Stocks: ' + stockQuantity :
                    'Sold Out';

                // Update hidden color and image fields
                document.getElementById('selected-color').value = colorName;
                document.getElementById('selected-image').value = imageUrl;
            }

            // Function to handle quantity selection
            function updateQuantity() {
                const quantity = document.getElementById('quantity').value;
                document.getElementById('selected-quantity').value = quantity;
            }

            // Quantity increment and decrement functions
            function increment() {
                let quantityInput = document.getElementById('quantity');
                quantityInput.value = parseInt(quantityInput.value) + 1;
                updateQuantity();
            }

            function decrement() {
                let quantityInput = document.getElementById('quantity');
                if (parseInt(quantityInput.value) > 1) {
                    quantityInput.value = parseInt(quantityInput.value) - 1;
                    updateQuantity();
                }
            }

            function selectSize(size, button) {
                document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                document.getElementById('selected-size').value = size;
            }

            // Function to validate form
            function validateForm() {
                const color = document.getElementById('selected-color').value;
                const image = document.getElementById('selected-image').value;
                const size = document.getElementById('selected-size').value;

                if (!color || !image || !size) {
                    alert("Please select an image, size, and color."); // Alert message
                    return false; // Prevent form submission
                }
                return true; // Allow form submission
            }
        </script>



        <div class="pay-opt">More payment options</div>

        <div class="pro-discrpt">
            <p>Fitted, comfortable, and soft—this t-shirt was made just for you.
                And it can withstand several washings while maintaining its shape,
                so it's great for everyday wear!
            </p>
        </div>

        <div class="pro-discrpt">
            <li>100% fine jersey cotton</li>
            <li>Heather grey is 90% cotton, 10% polyester</li>
            <li> Fabric weight: 4.3 oz/y² (146 g/m²)</li>
            <li>Shoulder-to-shoulder taping</li>
            <li>100% fine jersey cotton</li>
            <li>Blank products stocked in the US are made in USA</li>
            <li>Blank products stocked in the EU are sourced worldwide</li>
        </div>

        <div class="pro-discrpt" style="font-weight: 700;">
            <p>This is a print on demand item. It is non refundable and we do not
                accept returns or exchanges on these products
            </p>
        </div>


        <div class="pro-size-g">
            <p>Size guide</p>

            <table style="width: 100%; border-collapse: collapse; text-align: center;">
                <thead>
                    <tr>
                        <th></th>
                        <th>XS</th>
                        <th>S</th>
                        <th>M</th>
                        <th>L</th>
                        <th>XL</th>
                        <th>2XL</th>
                        <th>3XL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Chest (inches)</strong></td>
                        <td>30-32</td>
                        <td>34-36</td>
                        <td>38-40</td>
                        <td>42-44</td>
                        <td>46-48</td>
                        <td>48-50</td>
                        <td>50-52</td>
                    </tr>
                    <tr>
                        <td> <strong>Waist (inches)</strong> </td>
                        <td>28-30</td>
                        <td>30-32</td>
                        <td>32-33</td>
                        <td>33-34</td>
                        <td>36-38</td>
                        <td>40-42</td>
                        <td>44-48</td>
                    </tr>
                </tbody>
            </table>


        </div>

    </div>













</div>
<div class="related-products">
    <h2>Related Products</h2>
    <div class="product-list">
        @foreach ($relatedProducts as $relatedProduct)
        <div class="article">
            <img src="{{ asset('storage/' . $relatedProduct->image) }}" width="100%" alt="{{ $relatedProduct->title }}">
            <div class="article-l">
                <a href="{{ route('singleProduct', $relatedProduct->id) }}">{{ $relatedProduct->title }}</a>
            </div>
            <div class="article-p">${{ number_format($relatedProduct->price, 2) }} USD</div>
        </div>
        @endforeach
    </div>
</div>

<div class="other-articles">


    <!-- <div class="article">
        <img src="assets/singleProduct/article1.webp" width="100%" alt="">
        <div class="article-l"> <a href="#">Shy Guy Tours Short-Sleeve Unisex T-Shirt</a></div>
        <div class="article-p">$26.00 USD </div>
    </div>

    <div class="article">
        <img src="assets/singleProduct/article2.webp" width="100%" alt="">
        <div class="article-l"> <a href="#">"My People" Shy Guy Tours Unisex T-Shirt</a></div>
        <div class="article-p">$26.00 USD </div>
    </div>

    <div class="article">
        <img src="assets/singleProduct/article3.webp" width="100%" alt="">
        <div class="article-l"> <a href="#">Shy Guy Tours "Met Veye" Short-Sleeve Unisex T-Shirt</a></div>
        <div class="article-p">$26.00 USD </div>
    </div>

    <div class="article">
        <img src="assets/singleProduct/article4.webp" width="100%" alt="">
        <div class="article-l"> <a href="#">Shy Guy Tours Women's short sleeve t-shirt</a></div>
        <div class="article-p">$26.00 USD </div>
    </div> -->


</div>




<!-- Main Section Ends-->


<!-- =============================== -->

















<!-- FOOTER STARTS FORM HERE -->

@include('component.footer')