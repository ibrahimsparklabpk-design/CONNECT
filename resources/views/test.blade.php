<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soccer Kit</title>
    <link rel="stylesheet" href="{{ asset('assets/customizable/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->


    <link rel="shortcut icon" href="{{ asset('assets/images/whitelogo2.png') }}">






    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <!--font awsome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">



    <style>
    #staff-kit-group,
    #staff-fit-type-group,
    #staff-collar-type-group {
        display: block;
        /* Set this to 'none' if you want to hide them initially */
    }

    .add-row-btn1 {
        background: black !important;
        color: white;
        padding: 10px 15px;
        border-radius: 23px;
        border: none;
        font-size: 16px;

    }
    </style>


</head>

<body>


    <!-- start test -->
    <!-- end test -->



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
            <li><a href="{{route('soccer')}}">CUSTOM UNIFORMS</a></li>


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

    <!-- MAIN SECTION STARTS FROM HERE -->

    <div class="main-section">
        <div class="left-section">
            <div class="icon-list">
                <div class="icon" onclick="openTab('categories')">
                    <img src="./assets/categories-icon.png" alt="categories Icon" class="tab-icon" width="50px" />

                    <span class="tab-label"></span>
                </div>

                <div class="icon" onclick="openTab('Shirts')">
                    <img src="./assets/style.png" alt="Shirts Icon" class="tab-icon" width="50px" />

                    <span class="tab-label"></span>
                </div>
                <div class="icon" onclick="openTab('Logos')">
                    <img src="./assets/c-logo.png" alt="Logos Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>
                <div class="icon" onclick="openTab('Text')">
                    <img src="./assets/text.png" alt="Text Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>


                <!--<div class="icon" onclick="openTab('SocksColor')">-->
                <!--    <img src="./assets/colors.png" alt="Socks Color Icon" class="tab-icon" width="50px" />-->
                <!--    <span class="tab-label"></span>-->
                <!--</div>-->

                <div class="icon" onclick="openTab('colorpicker')">
                    <img src="./assets/colorbucketicon.png" alt="Socks Color Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>


                <div class="icon" onclick="openTab('Patterns')">
                    <img src="./assets/pattern-icon.png" alt="Patterns Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>
                <!-- save button -->
                <div class="icon" onclick="captureFullRightSection()">
                    <img src="./assets/savedesignicon.png" alt="Patterns Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>


                <!-- Save button script -->
                <script>
                function captureFullRightSection() {
                    const rightSection = document.querySelector(".right-section");
                    const shirtImage = document.getElementById("selected-shirt");
                    const patternOverlay = document.getElementById("selected-pattern");
                    const logoImage = document.getElementById("selected-logo");
                    const logoContainer = document.getElementById("logo-container");
                    const textDisplay = document.getElementById("text-display");

                    const hueRotation = getComputedStyle(shirtImage).filter.match(/hue-rotate\(([^)]+)\)/) ?
                        parseInt(getComputedStyle(shirtImage).filter.match(/hue-rotate\(([^)]+)\)/)[1]) :
                        0;

                    const canvas = document.createElement("canvas");
                    const context = canvas.getContext("2d");

                    canvas.width = rightSection.offsetWidth;
                    canvas.height = rightSection.offsetHeight;

                    const img = new Image();
                    img.src = shirtImage.src;

                    img.onload = () => {
                        context.filter = `hue-rotate(${hueRotation}deg)`;
                        context.drawImage(img, 0, 0, shirtImage.width, shirtImage.height);

                        // Draw pattern overlay if available
                        if (patternOverlay.style.display !== "none") {
                            context.drawImage(patternOverlay, 0, 0, patternOverlay.width, patternOverlay.height);
                        }

                        // Draw logo if available
                        if (logoImage.src) {
                            context.drawImage(
                                logoImage,
                                logoContainer.offsetLeft,
                                logoContainer.offsetTop,
                                logoImage.width,
                                logoImage.height
                            );
                        }

                        // Draw text if available
                        if (textDisplay && textDisplay.innerText) {
                            context.font = "30px Arial"; // Set font size and family for the text
                            context.fillStyle = "white"; // Text color (adjust as needed)
                            context.textAlign = "center"; // Center the text
                            context.textBaseline = "middle"; // Align text vertically in the center

                            const textX = textDisplay.offsetLeft + (textDisplay.offsetWidth / 2);
                            const textY = textDisplay.offsetTop + (textDisplay.offsetHeight / 2);

                            context.fillText(textDisplay.innerText, textX, textY); // Draw the text on the canvas
                        }

                        // Capture image as Base64
                        const imgData = canvas.toDataURL("image/png");

                        // Send image to backend using fetch
                        console.log("Sending image to the server...");
                        fetch('/save-image', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                        .getAttribute('content'),
                                },
                                body: JSON.stringify({
                                    image: imgData
                                }),
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log("Image saved:", data);
                                if (data.path) {
                                    document.getElementById("custom_image_input").value = data.path;
                                    alert("Design saved successfully!");
                                }
                            })
                            .catch(error => console.error("Image save error:", error));



                    };
                }
                </script>

































                <!-- Add more icons for other categories -->
            </div>
            <div class="items-list">
                <div class="tabcontent" id="Shirts">

                    <img src="./assets/soccer-shirts/FRONTPNG.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/FRONTPNG.png')" alt="Shirt 1" />
                    <!-- 
        <img  src="./assets/soccer-shirts/shirt2.jpg" class="shirt" 
          onclick="selectShirt('./assets/soccer-shirts/shirt2.jpg')" alt="Shirt 2" />


        <img src="./assets/soccer-shirts/shirt3.jpg" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt3.jpg')" alt="Shirt 3" /> -->

                    <img src="./assets/soccer-shirts/shirt4.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt4.png')" alt="Shirt 4" />

                    <img src="./assets/soccer-shirts/shirt5.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt5.png')" alt="Shirt 5" />

                    <img src="./assets/soccer-shirts/shirt6.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt6.png')" alt="Shirt 6" />

                    <img src="./assets/soccer-shirts/shirt7.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt7.png')" alt="Shirt 7" />

                    <img src="./assets/soccer-shirts/shirt8.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt8.png')" alt="Shirt 8" />

                    <img src="./assets/soccer-shirts/shirt9.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt9.png')" alt="Shirt 9" />

                    <img src="./assets/soccer-shirts/shirt10.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt10.png')" alt="Shirt 10" />

                    <img src="./assets/soccer-shirts/shirt11.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt11.png')" alt="Shirt 11" />


                    <img src="./assets/soccer-shirts/shirt12.png" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt12.png')" alt="Shirt 12" />



                    <!-- <img src="./assets/soccer-shirts/shirt8.jpg" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt8.jpg')" alt="Shirt 8" />

        <img src="./assets/soccer-shirts/shirt9.jpg" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt9.jpg')" alt="Shirt 9" />

        <img src="./assets/soccer-shirts/shirt10.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt10.png')" alt="Shirt 10" />

        <img src="./assets/soccer-shirts/shirt11.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt11.png')" alt="Shirt 11" />

        <img src="./assets/soccer-shirts/shirt12.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt12.png')" alt="Shirt 12" />

        <img src="./assets/soccer-shirts/shirt13.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt13.png')" alt="Shirt 13" />

        <img src="./assets/soccer-shirts/shirt14.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt14.png')" alt="Shirt 14" />

        <img src="./assets/soccer-shirts/shirt15.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt15.png')" alt="Shirt 15" /> -->

                    <!-- <img src="./assets/soccer-shirts/shirt16.png" class="shirt"
           onclick="selectShirt('./assets/soccer-shirts/shirt16.png')" alt="Shirt 16" />  -->

                    <!-- <img src="./assets/soccer-shirts/shirt17.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt17.png')" alt="Shirt 17" />

        <img src="./assets/soccer-shirts/shirt18.png" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt18.png')" alt="Shirt 18" /> -->
                </div>

                <div class="tabcontent" id="Logos" style="display: none">
                    <img src="./assets/Logos/p-logo1.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo1.png')" alt="Logo 1" />

                    <img src="./assets/Logos/p-logo2.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo2.png')" alt="Logo 2" />

                    <img src="./assets/Logos/p-logo3.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo3.png')" alt="Logo 3" />

                    <img src="./assets/Logos/p-logo4.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo4.png')" alt="Logo 4" />

                    <img src="./assets/Logos/p-logo5.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo5.png')" alt="Logo 5" />

                    <img src="./assets/Logos/p-logo6.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo6.png')" alt="Logo 6" />

                    <img src="./assets/Logos/p-logo7.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo7.png')" alt="Logo 7" />

                    <img src="./assets/Logos/p-logo8.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo8.png')" alt="Logo 8" />

                    <img src="./assets/Logos/p-logo9.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo9.png')" alt="Logo 9" />

                    <img src="./assets/Logos/p-logo10.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo10.png')" alt="Logo 10" />

                    <img src="./assets/Logos/p-logo11.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo11.png')" alt="Logo 11" />

                    <img src="./assets/Logos/p-logo12.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo12.png')" alt="Logo 12" />

                    <img src="./assets/Logos/p-logo13.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo13.png')" alt="Logo 13" />

                    <img src="./assets/Logos/p-logo14.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo14.png')" alt="Logo 14" />

                    <img src="./assets/Logos/p-logo15.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo15.png')" alt="Logo 15" />

                    <img src="./assets/Logos/p-logo16.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo16.png')" alt="Logo 16" />

                    <img src="./assets/Logos/p-logo17.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo17.png')" alt="Logo 17" />

                    <img src="./assets/Logos/p-logo18.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo18.png')" alt="Logo 18" />
                </div>

                <!-- <div class="tabcontent" id="Text" style="display: none">
        <input type="text" id="customText" placeholder="Enter your text" oninput="updateText()" />
      </div> -->


                <div class="tabcontent" id="Text" style="display: none">
                    <label for="custom-text">Enter Your Text</label>
                    <textarea id="custom-text" name="custom-text" rows="4" cols="36"></textarea><br><br>



                    <label for="font-style">Font Style</label>
                    <select id="font-style" name="font-style" style="width: 87%;">
                        <option value="Impact" selected>Impact</option>
                        <option value="Arial">Arial</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        <option value="Trebuchet MS">Trebuchet MS</option>
                        <option value="Lucida Sans">Lucida Sans</option>
                        <option value="Palatino Linotype">Palatino Linotype</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Garamond">Garamond</option>

                        <option value="Helvetica">Helvetica</option>
                        <option value="Century Gothic">Century Gothic</option>
                        <option value="Calibri">Calibri</option>

                        <option value="Brush Script MT">Brush Script MT</option>
                    </select><br><br>

                    <label for="font-size">Font Size </label>
                    <input type="number" id="font-size" name="font-size" value="30" min="1"
                        style="padding: 10px; width: 20%;"><br>

                    <button id="update-text" style="margin-top: 10px;">Update Text</button>
                </div>




                <div class="tabcontent" id="categories" style="display: none">



                    <div class="cat-row ">
                        <div class="cat-col">

                            <a href="{{route('soccer')}}"><img src="./assets/soccer-icon.png" />
                            </a>
                            <h1>
                                soccer
                            </h1>
                        </div>

                        <div class="cat-col">

                            <a href="{{route('cricket')}}"><img src="./assets/Cricketkit.png" />
                            </a>
                            <h1>
                                Cricket
                            </h1>
                        </div>

                        <div class="cat-col">

                            <a href="{{route('basketball')}}"><img src="./assets/basketball-kit.png" />
                            </a>
                            <h1>
                                Basketball
                            </h1>
                        </div>


                    </div>


                    <div class="cat-row ">
                        <div class="cat-col">

                            {{-- <a href="{{route('goalkeeper')}}"><img src="./assets/goalkeeper-1.png" /> --}}
                            </a>
                            <h1>
                                Goal Keeper
                            </h1>
                        </div>

                        <div class="cat-col">

                            {{-- <a href="{{route('staffmanagment')}}"><img src="./assets/sfat-managment12.png" /> --}}
                            </a>
                            <h1>
                                Other/ Staff/ Management
                            </h1>
                        </div>




                    </div>









                    <!--goal keeper-->





                </div>

                <div class="tabcontent" id="SocksColor" style="display: none">

                    <img src="./assets/clr/skyblue.png" alt="" />
                    <img src="./assets/clr/black.jpg" alt="" />
                    <img src="./assets/clr/gray.jpg" alt="" />
                    <img src="./assets/clr/lightgreen.jpg" alt="" />
                    <img src="./assets/clr/red.jpg" alt="" />
                    <img src="./assets/clr/purple.jpg" alt="" />
                    <img src="./assets/clr/brown.jpg" alt="" />
                    <img src="./assets/clr/green.jpg" alt="" />
                    <img src="./assets/clr/blue.jpg" alt="" />
                    <img src="./assets/clr/yellow.jpg" alt="" />
                    <img src="./assets/clr/lightblue.png" alt="" />
                    <img src="./assets/clr/orange.png" alt="" />
                </div>



                <div class="tabcontent" id="colorpicker" style="display: none">

                    <div class="picker-div">
                        <label for="color-picker">Choose a Shirt color: &nbsp; &nbsp;</label>
                        <input type="color" id="color-picker" onchange="updateShirtColor(this.value)"><br>
                    </div>

                    <div class="picker-div">
                        <label for="pattern-color-picker">Choose a Pattern color:</label>
                        <input type="color" id="pattern-color-picker" onchange="updatePatternColor(this.value)" />
                    </div>

                </div>


                <div class="tabcontent" id="Patterns" style="display: none;">
                    <h3></h3>
                    <div class="pattern-options">
                        <img src="./assets/soccer-shirts/pattern1.png" alt="Pattern 1" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern1.png')" />

                        <img src="./assets/soccer-shirts/pattern2.png" alt="Pattern 2" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern2.png')" />

                        <img src="./assets/soccer-shirts/pattern3.png" alt="Pattern 3" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern3.png')" />

                        <img src="./assets/soccer-shirts/pattern4.png" alt="Pattern 4" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern4.png')" />

                        <img src="./assets/soccer-shirts/pattern5.png" alt="Pattern 5" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern5.png')" />

                        <img src="./assets/soccer-shirts/pattern6.png" alt="Pattern 6" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern6.png')" />

                        <img src="./assets/soccer-shirts/pattern7.png" alt="Pattern 7" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern7.png')" />

                        <img src="./assets/soccer-shirts/pattern8.png" alt="Pattern 8" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern8.png')" />

                        <img src="./assets/soccer-shirts/pattern9.png" alt="Pattern 9" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern9.png')" />

                        <img src="./assets/soccer-shirts/pattern10.png" alt="Pattern 10" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern10.png')" />

                        <img src="./assets/soccer-shirts/pattern11.png" alt="Pattern 11" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern11.png')" />

                        <img src="./assets/soccer-shirts/pattern12.png" alt="Pattern 12" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern12.png')" />

                        <img src="./assets/soccer-shirts/pattern13.png" alt="Pattern 13" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern13.png')" />

                        <img src="./assets/soccer-shirts/pattern14.png" alt="Pattern 14" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern14.png')" />

                        <img src="./assets/soccer-shirts/pattern15.png" alt="Pattern 15" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern15.png')" />

                        <img src="./assets/soccer-shirts/pattern16.png" alt="Pattern 16" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern16.png')" />

                        <img src="./assets/soccer-shirts/pattern17.png" alt="Pattern 17" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern17.png')" />

                        <img src="./assets/soccer-shirts/pattern18.png" alt="Pattern 18" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern18.png')" />
                        <!-- Add more patterns as needed -->
                    </div>
                </div>









            </div>



            <!-- This section will dynamically show items (product thumbnails) when an icon is clicked -->
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="item-display" style="position: relative;">
                <!-- Add position: relative here -->
                <!-- Display the selected shirt -->
                <div id="text-display" style="position: absolute; z-index: 5;"></div>

                <img id="selected-shirt" src="assets/soccer-shirts/FRONTPNG.png" alt="Selected Shirt" />



                <!-- Pattern overlay -->
                <img id="selected-pattern" src="./assets/soccer-shirts/Realshirts/pattern1.png" alt="Pattern Overlay"
                    class="pattern-overlay" style="display: none;" />





                <!-- Draggable and Resizable Logo with Handles -->
                <div id="logo-container" class="resizable-draggable">
                    <img id="selected-logo" src="" alt="" class="draggable" />
                    <div class="resizing-handle top-left"></div>
                    <div class="resizing-handle top-right"></div>
                    <div class="resizing-handle bottom-left"></div>
                    <div class="resizing-handle bottom-right"></div>
                </div>
            </div>
        </div>


    </div>









    <!-- MAIN SECTION ENDS HERE -->







    <!-- FORM SECTION STARTS FROM HERE -->
    <form action="{{ route('soccer.store') }}" method="POST">
        @csrf
        <div class="head-box">
            <p class="mainheading">CUSTOM SOCCER KIT</p>

            <div class="m-pr">
                <p class="s-pr">$39.00</p>
                <input type="hidden" id="base-price" name="price" value="39"> <!-- Hidden base price -->
                <img src="./assets/mystars.png" style="width: 100px" alt="" />
                <p class="str-r">5 reviews</p>
            </div>

        </div>


        <div class="flex-form">
            <!-- Left Column -->
            <div class="form-column">
                <div class="form-group">
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                    $(document).ready(function() {
                        // Base price from the hidden input
                        let basePrice = parseFloat($('#base-price').val());

                        // Function to update the displayed price
                        function updatePrice() {
                            // Get selected prices from dropdowns
                            let sleevePrice = parseFloat($('#sleeve-length option:selected').data(
                                    'price')) ||
                                0;
                            let collarPrice = parseFloat($('#collar-type option:selected').data('price')) ||
                                0;

                            // Check if the Padded option is selected and set price
                            let paddedPrice = $('#select5').val() === 'Yes' ? 5 : 0;

                            // Team logo price
                            let teamLogoPrice = $('#team-logo').val() === 'embroidered' ? 1.00 : 0;

                            // Inside collar message price
                            let insideCollarPrice = $('#inside-collar-message').val() === 'yes' ? 2.00 : 0;

                            // Calculate the total price
                            let totalPrice = basePrice + sleevePrice + collarPrice + paddedPrice +
                                teamLogoPrice +
                                insideCollarPrice;

                            // Update the price display in the <p> tag
                            $('.s-pr').text('$' + totalPrice.toFixed(2));

                            // Update the hidden input field with the new total price
                            $('#base-price').val(totalPrice.toFixed(2));
                        }

                        // Event listeners for dropdown changes
                        $('#sleeve-length, #collar-type, #select5, #team-logo, #inside-collar-message')
                            .change(
                                function() {
                                    updatePrice();
                                });
                    });
                    </script>


                    <!-- End Price chage script -->





                    <div class="form-group">
                        <label for="fit_type">Fit Type</label>
                        <select id="fit-type" name="fit_type" required>
                            <option value="">Select Fit Type</option>
                            <option value="men">Men</option>
                            <option value="women">Women</option>
                            <option value="Youth">Youth</option>
                            <!--<option value="youth">Youth</option>-->
                        </select>
                    </div>

                    <!--<div class="form-group" style="width: 100%;">-->
                    <!--    <label for="socks">Outfield Players Socks</label>-->
                    <!--    <select id="socks" name="socks" require onchange="toggleSocksColorField()">-->
                    <!--        <option value="">Select Option</option>-->
                    <!--        <option value="yes">Yes</option>-->
                    <!--        <option value="no">No</option>-->
                    <!--    </select>-->
                    <!--</div>-->

                    <div class="form-group">
                        <label for="collar_type">Collar Type</label>
                        <select id="collar-type" name="collar_type" require>
                            <option value="" data-price="0">Select Collar Type</option>
                            <option value="round-neck" data-price="0">Round Neck</option>
                            <option value="v-neck" data-price="0">V-Neck</option>
                            <option value="polo-style" data-price="1">Polo Style </option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="team_logo">Team Logo</label>
                        <select id="team-logo" name="team_logo	" require>
                            <option value="">Select Logo Style</option>
                            <option value="sublimated">Sublimated (Printed)</option>
                            <option value="embroidery">Embroidery +$1.00/Per Kit</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inside_shirt_collar">inside shirt collar/tag</label>
                        <select id="inside-collar-message" name="inside_shirt_collar" require>
                            <option value="">Select Message Type</option>
                            <option value="yes">Yes +$2/Per Kit</option>
                            <option value="no">No</option>
                        </select>
                    </div>


                    <div class="message-group" id="message-group" style="display: none;">
                        <!-- <label for="inside-collar-text">Enter Your Text</label> -->
                        <!-- <textarea id="inside-collar-text" name="inside_collar_message_text" rows="4" cols="36"
                        require></textarea> -->
                        <label for="inside-collar-text">Upload Image</label>
                        <input type="file" id="colar-image" name="colar-image" accept="image/*">
                    </div>

                    <!-- Hidden Text Field for "Other" Option -->
                    <div class="form-group" id="collar-name" style="display: none; margin-to:20px">
                        <label for="other-color">Enter Collar Tag </label>
                        <input type="text" class="other-color" id="other-color" name="other-color"
                            placeholder="Enter Collar Tag Name">
                    </div>






                    <script>
                    function toggleSocksColorField() {
                        var socksSelect = document.getElementById("socks").value;
                        var socksColorField = document.getElementById("socks-color-group");

                        if (socksSelect === "yes") {
                            socksColorField.style.display = "flex";
                        } else {
                            socksColorField.style.display = "none";
                        }
                    }
                    </script>





                </div>

            </div>



            <!-- Right Column -->

            <div class="form-column">
                <div class="form-group">
                    <label for="kit_type">Kit</label>
                    <select id="kit" name="kit_type" require>
                        <option value="full">Full Kit</option>
                        <option value="shirt">Shirt Only</option>
                        <option value="both"> Both</option>
                    </select>
                </div>

                <div class="form-group" style="width: 100%;">
                    <label for="sleeves_length">Sleeve Length</label>
                    <select id="sleeve-length" name="sleeves_length" require>

                        <option value="" data-price="0">Select Length</option>
                        <option value="short" data-price="0">Short</option>
                        <option value="long" data-price="3">Long </option>

                    </select>
                </div>



                <!--<div class="form-group">-->
                <!--    <label for="inside-collar-message">inside shirt collar/tag</label>-->
                <!--    <select id="inside-collar-message" name="inside-collar-message" require>-->
                <!--        <option value="">Select Message Type</option>-->
                <!--        <option value="yes">Yes +$2/Per Kit</option>-->
                <!--        <option value="no">No</option>-->
                <!--    </select>-->
                <!--</div>-->

                <div class="form-group" style="width: 100%;">
                    <label for="outfield_players_socks">Outfield Players Socks</label>
                    <select id="socks" name="outfield_players_socks" require onchange="toggleSocksColorField()">
                        <option value="">Select Option</option>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                </div>



                <div class="form-group" id="socks-color-group" style="display: none;">
                    <label for="socks-color">Select Socks Color</label>
                    <select id="socks-color" name="socks-color" require>

                        <option value="Same color as Top">Same color as top</option>
                        <option value="Same color as pants">Same color as pants</option>
                        <option value="Red FF0000">Red</option>
                        <option value="Blue 008000">Blue</option>
                        <option value="Black 000000">Black</option>
                        <option value="White FFFFFF">White</option>
                        <option value="Other">Other</option>


                        <!-- <option value="">Select Color</option>-->
                        <!--<option value="black">Black</option>-->
                        <!--<option value="white">White</option>-->
                        <!--<option value="blue">Blue</option>-->
                        <!--<option value="red">Red</option>-->
                        <!--<option value="green">Green</option>-->
                        <!--<option value="yellow">Yellow</option>-->
                        <!--<option value="gray">Gray</option>-->
                        <!--<option value="pink">Pink</option>-->
                        <!--<option value="purple">Purple</option>-->
                        <!--<option value="orange">Orange</option>-->
                        <!--<option value="brown">Brown</option>-->
                        <!--<option value="beige">Beige</option>-->
                        <!--<option value="navy">Navy</option> -->
                    </select>
                </div>


                <!-- Hidden Text Field for "Other" Option -->
                <div class="form-group" id="other-color-group" style="display: none;">
                    <label for="other-color">Enter Custom Color Name/Code</label>
                    <input type="text" class="other-color" id="other-color" name="other-color"
                        placeholder="Enter color name or hex code">
                </div>





                <!--<div class="form-group" id="socks-color-group" style="display: none;">-->
                <!--    <label for="socks-color">Select Socks Color</label>-->
                <!--    <select id="socks-color" name="socks-color" require>-->

                <!--        <option value="Same color as Top">Same color as top</option>-->
                <!--        <option value="Same color as pants">Same color as pants</option>-->
                <!--        <option value="Red FF0000">Red</option>-->
                <!--        <option value="Blue 008000">Blue</option>-->
                <!--        <option value="Black 000000">Black</option>-->
                <!--        <option value="White FFFFFF">White</option>-->
                <!--         <option value="Other">Other</option>-->


                <!-- <option value="">Select Color</option>-->
                <!--<option value="black">Black</option>-->
                <!--<option value="white">White</option>-->
                <!--<option value="blue">Blue</option>-->
                <!--<option value="red">Red</option>-->
                <!--<option value="green">Green</option>-->
                <!--<option value="yellow">Yellow</option>-->
                <!--<option value="gray">Gray</option>-->
                <!--<option value="pink">Pink</option>-->
                <!--<option value="purple">Purple</option>-->
                <!--<option value="orange">Orange</option>-->
                <!--<option value="brown">Brown</option>-->
                <!--<option value="beige">Beige</option>-->
                <!--<option value="navy">Navy</option> -->
                </select>
            </div>

            <!-- Hidden Text Field for "Other" Option -->
            <!--<div class="form-group" id="other-color-group" style="display: none;">-->
            <!--    <label for="other-color">Enter Custom Color Name/Code</label>-->
            <!--    <input type="text" class="other-color" id="other-color" name="other-color" placeholder="Enter color name or hex code">-->
            <!--</div>-->

            <script>
            document.addEventListener("DOMContentLoaded", function() {
                var socksColorSelect = document.getElementById("socks-color");
                var otherColorGroup = document.getElementById("other-color-group");

                // Function to toggle text field visibility
                function toggleOtherColorField() {
                    if (socksColorSelect.value === "Other") {
                        otherColorGroup.style.display = "block";
                    } else {
                        otherColorGroup.style.display = "none";
                    }
                }

                // Event Listener for dropdown change
                socksColorSelect.addEventListener("change", toggleOtherColorField);

                // Ensure text field is hidden on page load
                toggleOtherColorField();
            });
            </script>





        </div>

        </div>







        <!-- FORM SECTION ENDS HERE -->


        <!-- SIZE GUIDE STARTS HERE -->

        <p class="size-guide"> <i class="fa-solid fa-ruler"></i> Size Guide</p>
        <!-- Roster Name -->
        <div class="team-form-container">
            <!-- Table -->
            <table class="team-roster-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number</th>
                        <th class="hide-on-shirt-only">Short Size</th>
                        <th>Shirt Size</th>
                        <th class="sleevlength-h">Sleeve Length</th>
                        <th>Quantity </th>
                        <th>Action </th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <tr>
                        <td><input type="text" class="fi-name" name="name[]" placeholder="--" required /></td>
                        <td><input type="text" class="fi-number" name="number[]" placeholder="--" required /></td>
                        <td class="hide-on-shirt-only">
                            <select class="short-size" name="shirt_size[]">
                                <option value="">--</option>
                                <option value="xs">XS</option>
                                <option value="s">S</option>
                                <option value="m">M</option>
                                <option value="l">L</option>
                                <option value="xl">XL</option>
                                <option value="2xl">2Xl</option>
                                <option value="3xl">3Xl</option>
                                <!-- <option value="adult-m">Adult M</option>
                                <option value="adult-l">Adult L</option>
                                <option value="adult-xl">Adult XL</option> -->
                            </select>
                        </td>
                        <td>
                            <select class="shirt-size" name="shirt_size[]">
                                <option value="">--</option>
                                <option value="XS">XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                                <option value="XL">XL</option>
                                <option value="2Xl">2Xl</option>
                                <option value="3Xl">3Xl</option>
                            </select>
                        </td>

                        <!-- add two sizes script -->
                        <script>
                        document.getElementById("fit-type").addEventListener("change", function() {
                            const fitType = this.value;
                            const shirtSizeDropdowns = document.querySelectorAll(".shirt-size");

                            shirtSizeDropdowns.forEach(function(dropdown) {
                                dropdown.innerHTML = `
                                    <option value="">--</option>
                                   <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="2Xl">2Xl</option>
                                    <option value="3Xl">3Xl</option>
                            `;


                                if (fitType === "men") {
                                    dropdown.innerHTML += `
                                    <option value="XXS">XXS</option>
                                    <option value="XXL">XXL</option>
                                `;
                                }
                            });
                        });
                        </script>


                        <td class="sleevlength-h">
                            <select name="sleeves_length[]">
                                <option value="">--</option>
                                <option value="short">Short</option>
                                <option value="Long">Long $2.00/Per Kit</option>
                            </select>
                        </td>
                        <td><input type="number" class="Quantity-input" name="quantity[]" placeholder="0" min="1"
                                required /></td>
                        <td>
                            <button class="remove-row" type="button"
                                style="background: transparent; border: none; font-size: 18px; cursor: pointer;">
                                ❌
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>


            <!-- sleve lenth column script -->
            <!-- <script>
                document.getElementById("sleeve-length").addEventListener("change", function() {
                    let selectedValue = this.value;

                    let sleeveHeader = document.getElementById("sleevlength-h");
                    
                    let sleeveCells = document.getElementById("sleevlength-td");
                   
                    if (selectedValue === "short" || selectedValue === "long") {
                        
                        sleeveHeader.style.display = "none";

                      
                        sleeveCells.style.display = "none";

                    } else {
                       
                        sleeveHeader.style.display = "block";

                       
                        sleeveCells.style.display = "block";
                    }
                });
            </script> -->

















            <script>
            function toggleSleeve(clickedCheckbox) {
                let checkboxes = clickedCheckbox.closest('td').querySelectorAll('.sleeve-checkbox');
                checkboxes.forEach(cb => {
                    if (cb !== clickedCheckbox) {
                        cb.checked = false;
                    }
                });
            }
            </script>
            <button id="add-row" type="button"
                style="background: black; color: white; padding: 10px 12px; border-radius: 23px; border: none; margin-top:15px">Add
                Row</button>

            <!-- script -->
            <script>
            document.getElementById("sleeve-length").addEventListener("change", function() {
                let selectedValue = this.value;
                let sleeveHeader = document.querySelector(".sleevlength-h");
                let sleeveCells = document.querySelectorAll("td.sleevlength-h");

                if (selectedValue === "Mix") {
                    sleeveHeader.style.display = "table-cell";
                    sleeveCells.forEach(cell => cell.style.display = "table-cell");
                } else {
                    sleeveHeader.style.display = "none";
                    sleeveCells.forEach(cell => cell.style.display = "none");
                }
            });

            // Kit selection ke liye logic
            document.getElementById("kit").addEventListener("change", function() {
                const kitValue = this.value;
                const elementsToHide = document.querySelectorAll(".hide-on-shirt-only");

                elementsToHide.forEach(function(td) {
                    td.style.display = (kitValue === "shirt-only") ? "none" : "table-cell";
                });
            });

            // Row add karne ka function, jisme sleeve length ka effect bhi hoga
            document.getElementById("add-row").addEventListener("click", function() {
                let tableBody = document.getElementById("table-body");
                let newRow = document.createElement("tr");
                newRow.innerHTML = `
        <td><input type="text" class="fi-name" name="name[]" placeholder="--" required /></td>
        <td><input type="text" class="fi-number" name="number[]" placeholder="--" required /></td>
        <td class="hide-on-shirt-only">
            <select class="short-size" name="short_size[]" required>
                <option value="">--</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="2Xl">2Xl</option>
                <option value="3Xl">3Xl</option>
            </select>
        </td>
        <td>
            <select class="shirt-size" name="shirt_size[]" required>
                <option value="">--</option>
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="2Xl">2Xl</option>
                <option value="3Xl">3Xl</option>
            </select>
        </td>
        <td class="sleevlength-h">
            <select name="sleeve_length[]">
                <option value="">--</option>
                <option value="short sleeves">Short</option>
                <option value="Long sleeves">Long $2.00</option>
            </select>
        </td>
        <td><input type="number" class="Quantity-input" name="quantity[]" placeholder="0" min="1" required /></td>
        <td>
            <button class="remove-row" style="background: transparent; border: none; font-size: 18px; cursor: pointer;">
                ❌
            </button>
        </td>
    `;

                tableBody.appendChild(newRow);
                applyKitSelection();
                applySleeveSelection();
            });

            // Remove row function
            document.addEventListener("click", function(event) {
                if (event.target.classList.contains("remove-row")) {
                    event.target.closest("tr").remove();
                }
            });

            // Kit selection apply karna new rows par bhi
            function applyKitSelection() {
                const kitValue = document.getElementById("kit").value;
                const elementsToHide = document.querySelectorAll(".hide-on-shirt-only");

                elementsToHide.forEach(function(td) {
                    td.style.display = (kitValue === "shirt-only") ? "none" : "table-cell";
                });
            }

            // Sleeve selection apply karna new rows par bhi
            function applySleeveSelection() {
                let selectedValue = document.getElementById("sleeve-length").value;
                let sleeveHeader = document.querySelector(".sleevlength-h");
                let sleeveCells = document.querySelectorAll("td.sleevlength-h");

                if (selectedValue === "Mix") {
                    sleeveHeader.style.display = "table-cell";
                    sleeveCells.forEach(cell => cell.style.display = "table-cell");
                } else {
                    sleeveHeader.style.display = "none";
                    sleeveCells.forEach(cell => cell.style.display = "none");
                }
            }
            </script>






        </div>


        <!-- SIZE GUIDE ENDS HERE -->



        <!-- Goalkeeper Kit Fields Starts-->



        <div class="flex-form">
            <div class="form-group" style="width: 100%;">
                <label for="goalkeeper_kit">Goal Keeper Requirements</label>
                <select id="select1" name="goalkeeper_kit" required onchange="toggleFields()">
                    <option value="">Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </div>

            <!-- Left Column -->
            <div class="form-column">



                <div class="form-group">


                    <div class="form-group conditional-fields" id="goalkeeper-jersey-group">
                        <label for="goalkeeper_jersey_design">Goalkeeper Jersey Design</label>
                        <select id="goalkeeper-jersey-design" name="goalkeeper_jersey_design">
                            <option value="same_as_player_uniform">Same Design as Player Uniform</option>
                            <option value="custom_design">Different/Custom Design</option>
                        </select>
                    </div>

                    <!-- Link Field (Initially Hidden) -->
                    <div class="form-group conditional-fields" id="link-field" style="display: none;">
                        <label>If you want a "Different/Custom Design" Goal Keeper Uniform, you need to order it
                            separately.
                            <!--    Click the link below to place your order.</label><br>-->
                            <!--<a href="https://example.com" target="_blank">Click here for details</a>-->
                    </div>




                    <div class="form-group conditional-fields" id="goalkeeper-padded">
                        <label for="padded">Padded?</label>
                        <select id="select5" name="padded">
                            <option value="">Padded?</option>
                            <option value="Yes">Yes +$5/Per Kit</option>
                            <option value="No">No</option>
                        </select>
                    </div>




                    <!-- <div class="form-group conditional-fields" id="goalkeeper-jersey-group">
                        <label for="goalkeeper-jersey-design">Goalkeeper Jersey Design</label>
                        <select id="select2" name="goalkeeper-jersey-design">
                            <option value="same">Same Design as Player Uniform</option>
                            <option value="No">No</option>
                        </select>
                    </div> -->











                    <script>
                    document.getElementById("goalkeeper-jersey-design").addEventListener("change", function() {
                        let selectedValue = this.value;
                        let linkField = document.getElementById("link-field");
                        let selects = document.querySelectorAll(
                            "#select3, #jersey-color,#select5, #Socks-color,#Socks-color-golk,#other-color");

                        if (selectedValue === "No") {
                            linkField.style.display = "block"; // Show the link
                            selects.forEach(select => select.disabled = true); // Disable dropdowns
                        } else {
                            linkField.style.display = "none"; // Hide the link
                            selects.forEach(select => select.disabled = false); // Enable dropdowns
                        }
                    });
                    </script>






                    <div class="form-group" id="other-color-group-golk" style="display: none;">
                        <label for="other-color">Enter Custom Color Name/Code</label>
                        <input type="text" class="other-color" id="other-color" name="other-color"
                            placeholder="Enter color name or hex code">
                    </div>





                    <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var socksColorSelect = document.getElementById("Socks-color-golk");
                        var otherColorGroup = document.getElementById("other-color-group-golk");

                        // Function to toggle text field visibility
                        function toggleOtherColorField() {
                            if (socksColorSelect.value === "Other") {
                                otherColorGroup.style.display = "block";
                            } else {
                                otherColorGroup.style.display = "none";
                            }
                        }

                        // Event Listener for dropdown change
                        socksColorSelect.addEventListener("change", toggleOtherColorField);

                        // Ensure text field is hidden on page load
                        toggleOtherColorField();
                    });
                    </script>










                </div>


            </div>



            <!-- Right Column -->
            <div class="form-column">



                <!-- Goalkeeper Sleeve and Jersey Color -->
                <!-- <div class="form-group conditional-fields" id="goalkeeper-sleeve-group">
                    <label for="goalkeeper-sleeve">Goalkeeper Sleeve</label>
                    <select id="select3" name="goalkeeper-sleeve">
                        <option value="">Select Sleeve</option>
                        <option value="long-sleeve">Long Sleeve</option>
                        <option value="short-sleeve">Short Sleeve</option>
                        <option value="long-sleeve-padded-elbows">
                            Long Sleeve, Padded Elbows
                        </option>
                    </select>
                </div> -->

                <div class="form-group conditional-fields" id="goalkeeper-sleeve-group">
                    <label for="goalkeeper_sleeves">Goalkeeper Sleeve</label>
                    <select id="select3" name="goalkeeper_sleeves">
                        <option value="">Select Sleeve</option>
                        <option value="long">Long Sleeve</option>
                        <option value="short">Short Sleeve</option>
                        <option value="padded_elbows">Padded Elbows</option>
                    </select>
                </div>













                <script>
                document.getElementById("select5").addEventListener("change", function() {
                    const paddedValue = this.value;
                    const sleeveDropdown = document.getElementById("select3");

                    // Reset dropdown
                    sleeveDropdown.innerHTML = `<option value="">Select Sleeve</option>`;

                    if (paddedValue === "Yes") {

                        sleeveDropdown.innerHTML += `
            
            <option value="long-sleeve-padded-elbows" selected>Long Sleeve, Padded Elbows</option>
        `;
                    } else if (paddedValue === "No") {

                        sleeveDropdown.innerHTML += `
            <option value="long-sleeve">Long Sleeve</option>
            <option value="short-sleeve">Short Sleeve</option>
        `;
                    }
                });
                </script>









                <div class="form-group conditional-fields" id="jersey-color-group">
                    <label for="jersey_color">Jersey Color/ Socks Color</label>
                    <select id="jersey-color" name="jersey_color">
                        <option value="same_as_top">Same color as top</option>
                        <option value="same_as_pants">Same color as pants</option>
                        <option value="Red FF0000">Red</option>
                        <option value="blue 0000FF">Blue</option>
                        <option value="black 000000">Black</option>
                        <option value="white FFFFFF">White</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <!-- Hidden Text Field for "Other" Option -->
                <div class="form-group" id="jersey-other-color-group" style="display: none;">
                    <label for="other-color">Enter Custom Color Name/Code</label>
                    <input type="text" class="other-color" id="other-color" name="other-color"
                        placeholder="Enter color name or hex code">
                </div>

                <script>
                document.addEventListener("DOMContentLoaded", function() {
                    var socksColorSelect = document.getElementById("jersey-color");
                    var otherColorGroup = document.getElementById("jersey-other-color-group");

                    // Function to toggle text field visibility
                    function toggleOtherColorField() {
                        if (socksColorSelect.value === "Other") {
                            otherColorGroup.style.display = "block";
                        } else {
                            otherColorGroup.style.display = "none";
                        }
                    }

                    // Event Listener for dropdown change
                    socksColorSelect.addEventListener("change", toggleOtherColorField);

                    // Ensure text field is hidden on page load
                    toggleOtherColorField();
                });
                </script>







                <div class="form-group conditional-fields" id="Socks-color-group">
                    <label for="Socks-color">Select Socks Color</label>
                    <select id="Socks-color-golk" name="Socks-color">
                        <option value="Same as Top">Same color as top</option>
                        <option value="Same as Bottom">Same color as pants</option>
                        <option value="Red FF0000">Red</option>
                        <option value="Blue 0000FF">Blue</option>
                        <option value="Black 000000">Black</option>
                        <option value="White FFFFFF">White</option>
                        <option value="Other">Other</option>
                    </select>
                </div>








                <!-- <div class="form-group conditional-fields" id="goalkeeper-jersey-group">
                    <label for="goalkeeper-jersey-design">Goalkeeper Jersey Design</label>
                    <select id="select2" name="goalkeeper-jersey-design">
                        <option value="same">Same Design as Player Uniform</option>
                    </select>
                </div> -->

            </div>




        </div>






        <!-- Goalkeeper Kit Filds Ends-->






        <!-- Staff Management Section -->

        <!-- Staff Kit Filds Starts-->



        <div class="flex-form">
            <div class="form-group" style="width: 100%;">
                <label for="staff_other">Staff/Management Requirements</label>
                <select id="staff-other" name="staff_other">
                    <option value="">Select Option</option>
                    <option value="yes">Yes</option>
                    <option value="no"> No</option>
                </select>
            </div>
            <!-- Left Column -->
            <div class="form-column">


                <div class="form-group">


                    <div class="form-group" id="staff-fit-type-group">
                        <label for="staff_fit_type">Staff Fit Type</label>
                        <select id="staff-fit-type" name="staff_fit_type">
                            <option value="">Select Fit Type</option>
                            <option value="men">Men</option>
                            <option value="women">Women</option>

                        </select>
                    </div>



                    <div class="form-group" id="staff-collar-type-group">
                        <label for="staff_collar_type">Staff Collar Type</label>
                        <select id="staff-collar-type" name="staff_collar_type">
                            <option value="">Select Collar Type</option>
                            <option value="round-neck">Round Neck</option>
                            <option value="v-neck">V Neck</option>
                            <option value="polo-style">Polo Style +$2.00/Per Kit</option>
                        </select>
                    </div>





                </div>

            </div>



            <!-- Right Column -->
            <div class="form-column">
                <div class="form-group" id="staff-kit-group">
                    <label for="staff-kit">Staff Kit</label>
                    <select id="staff-kit" name="staff-kit">
                        <option value="">Select Kit Option</option>
                        <option value="full">Full Kit</option>
                        <option value="shirt">Shirt Only</option>
                    </select>
                </div>
                <div class="form-group" id="staff-kit-sleeve">
                    <label for="sleeve-length">Sleeve Length</label>
                    <select id="staff-sleeve-length" name="sleeve-length" require>
                        <option value="" data-price="0">Select Length</option>
                        <option value="Mix" data-price="3">Mix: Long/Short</option>
                        <option value="short" data-price="0">Short</option>
                        <option value="long" data-price="3">Long +$2.00/Per Kit</option>

                    </select>

                </div>




            </div>

        </div>



        <!-- Staff Kit Filds Starts-->



        <!-- Staff Management Size Guide Starts -->


        <div class="team-form-container" id="staff-size-guide">
            <div class="team-form-center">
                <p class="size-guide" style="margin-left: -150px;"><i class="fa-solid fa-ruler"></i> Staff Size Guide
                </p>

                <table class="team-roster-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th class="s-sleevlength-h">Sleeves Length</th>
                            <th>Pants Length</th>
                            <th>Staff Shirt Size</th>
                            <th class="pants-cell">Staff Pants Size</th>
                            <th>Quantity</th>
                            <th>Action</th> <!-- New Column for Delete Button -->
                        </tr>
                    </thead>
                    <tbody id="table-body-s">
                        <tr>
                            <td><input type="text" class="fi-name" name="guide_name[]" placeholder="--"></td>
                            <td class="s-sleevlength-h">
                                <select name="sleeve_length[]">
                                    <option value="">--</option>
                                    <option value="short sleeves">Short</option>
                                    <option value="Long sleeves">Long $2.00</option>
                                </select>
                            </td>
                            <td>
                                <select name="guide_sleeves_length[]">
                                    <option value="">--</option>
                                    <option value="Shorts with Pockets">Short</option>
                                    <option value="Long with Pockets">Long with Pockets +$5.00/Per Pant</option>
                                </select>
                            </td>
                            <td>
                                <select id="staff-shirt-size" name="guide_shirt_size[]">
                                    <option value="">--</option>
                                    <option value="XS">XS</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="2XL">2XL</option>
                                    <option value="3XL">3XL</option>
                                    <!-- <option value="adult-xs">Adult XS</option>
                                    <option value="adult-s">Adult S</option>
                                    <option value="adult-m">Adult M</option>
                                    <option value="adult-l">Adult L</option>
                                    <option value="adult-xl">Adult XL</option> -->
                                </select>
                            </td>

                            <script>
                            document.getElementById("staff-fit-type").addEventListener("change", function() {
                                const fitType = this.value;
                                const shirtSizeDropdown = document.getElementById("staff-shirt-size");

                                // Pehle se jo options hai unko wapas reset karein
                                shirtSizeDropdown.innerHTML = `
                                    <option value="">--</option>
        
                                    <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="2xl">2XL</option>
                                    <option value="3xl">3XL</option>
                                `;

                                // Agar "Men" select ho to naye options add karein
                                if (fitType === "men") {
                                    shirtSizeDropdown.innerHTML += `
                                        <option value="XXS">XXS</option>
                                        <option value="XXL">XXL</option>
                                    `;
                                }
                            });
                            </script>







                            <td class="pants-cell">
                                <select class="staff-pants-size" name="guide_pant_size[]">
                                    <option value="">--</option>

                                   <option value="xs">XS</option>
                                    <option value="s">S</option>
                                    <option value="m">M</option>
                                    <option value="l">L</option>
                                    <option value="xl">XL</option>
                                    <option value="2xl">2XL</option>
                                    <option value="3xl">3XL</option>
                                </select>
                            </td>
                            <td><input type="number" name="shirt_paint_quantity[]" class="Quantity-input"
                                    placeholder="0" min="1" /></td>
                            <td><button class="delete-row-btn"
                                    style="background: transparent; border: none; font-size: 18px; cursor: pointer;">
                                    ❌
                                </button>
                            </td>
                            </td> <!-- Delete Button -->
                        </tr>
                    </tbody>
                </table>




                <!-- staff sleev length column script -->













                <button id="add-staff-row-btn" type="button"
                    style="background: black; color: white; padding: 10px 12px; border-radius: 23px; border: none; margin-top:15px">Add
                    Row</button>

                <script>
                document.getElementById('staff-kit').addEventListener('change', function() {
                    var staffKitValue = this.value;
                    var pantsCells = document.querySelectorAll('.pants-cell');

                    if (staffKitValue === 'no') {
                        pantsCells.forEach(cell => cell.style.display = 'none');
                    } else {
                        pantsCells.forEach(cell => cell.style.display = 'table-cell');
                    }
                });

                document.getElementById('staff-sleeve-length').addEventListener('change', function() {
                    toggleSleeveLength(this.value);
                });

                function toggleSleeveLength(sleeveValue) {
                    var sleeveHeaders = document.querySelectorAll('.s-sleevlength-h');
                    var sleeveCells = document.querySelectorAll('td.s-sleevlength-h');

                    if (sleeveValue === "Mix") {
                        sleeveHeaders.forEach(header => header.style.display = "table-cell");
                        sleeveCells.forEach(cell => cell.style.display = "table-cell");
                    } else {
                        sleeveHeaders.forEach(header => header.style.display = "none");
                        sleeveCells.forEach(cell => cell.style.display = "none");
                    }
                }

                document.getElementById('add-staff-row-btn').addEventListener('click', function() {
                    var tableBody = document.getElementById('table-body-s');
                    var newRow = tableBody.rows[0].cloneNode(true);

                    // Saari input fields ko empty karna
                    newRow.querySelectorAll('input, select').forEach(input => {
                        if (input.tagName === 'INPUT') {
                            input.value = '';
                        } else {
                            input.selectedIndex = 0;
                        }
                    });

                    // Agar "Shirt Only" select hai to pants ka column hide kare
                    if (document.getElementById('staff-kit').value === 'no') {
                        newRow.querySelector('.pants-cell').style.display = 'none';
                    } else {
                        newRow.querySelector('.pants-cell').style.display = 'table-cell';
                    }

                    // Delete button add karna
                    var deleteButton = document.createElement('button');
                    deleteButton.textContent = '❌';
                    deleteButton.classList.add('delete-row-btn');
                    deleteButton.style.cssText =
                        "background: transparent; border: none; font-size: 18px; cursor: pointer;";
                    deleteButton.addEventListener('click', function() {
                        newRow.remove();
                    });

                    newRow.cells[newRow.cells.length - 1].innerHTML = ''; // Purana button hatao
                    newRow.cells[newRow.cells.length - 1].appendChild(deleteButton); // Naya button add karo

                    tableBody.appendChild(newRow);
                });

                // Pehli row ka delete button bhi kaam kare
                document.querySelectorAll('.delete-row-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        if (document.querySelectorAll('#table-body-s tr').length > 1) {
                            this.closest('tr').remove();
                        } else {
                            alert('At least one row is required.');
                        }
                    });
                });
                </script>

            </div>








        </div>
        <div class="btn_box">

            <button type="submit" class="addtocart_btn">Add to cart</button>


        </div>
    </form>


    <!-- Staff Management Guide Ends -->





    <!-- Staff Management Size Guide Ends -->


    <!-- Staff Management Section -->










    <!-- JAVASCRITP STARTS FROM HERE -->

    <script>
    document.getElementById('inside-collar-message').addEventListener('change', function() {
        var messageGroup = document.getElementById('message-group');
        var collarname = document.getElementById('collar-name');


        if (this.value === 'yes') {
            messageGroup.style.display = 'block';
            collarname.style.display = 'block';
        } else if (this.value === 'no') {
            messageGroup.style.display = 'none';
            collarname.style.display = 'none';
        }
    });
    </script>

    <script>
    document.getElementById('staff-kit').addEventListener('change', function() {
        // Get the selected value
        var staffKitValue = this.value;

        // Get all <td> elements you want to hide
        var pantsCells = document.querySelectorAll('.pants-cell');

        if (staffKitValue === 'no') {
            // Hide all the pants <td> cells if "Shirt Only" is selected
            pantsCells.forEach(function(cell) {
                cell.style.display = 'none';
            });
        } else {
            // Show all the pants <td> cells if "Full Kit" or any other value is selected
            pantsCells.forEach(function(cell) {
                cell.style.display = 'table-cell';
            });
        }
    });
    </script>


    <script>
    //For hiding and selecting fields

    function toggleFields() {
        const selection = document.getElementById("select1").value;

        const jerseyDesignField = document.getElementById(
            "goalkeeper-jersey-group"
        );
        const sleeveField = document.getElementById("goalkeeper-sleeve-group");
        const jerseyColorField = document.getElementById("jersey-color-group");
        const goalKeeperPaddedField =
            document.getElementById("goalkeeper-padded");
        const SocksColorField = document.getElementById("Socks-color-group");
        const jerseyothercolorgroup = document.getElementById("jersey-other-color-group");

        if (selection === "yes") {
            // Show and enable the fields
            jerseyDesignField.style.display = "block";
            sleeveField.style.display = "block";
            jerseyColorField.style.display = "block";
            goalKeeperPaddedField.style.display = "block";
            // SocksColorField.style.display = "block";


            document.getElementById("select2").disabled = false;
            document.getElementById("select3").disabled = false;
            document.getElementById("select4").disabled = false;
            document.getElementById("select5").disabled = false;
        } else if (selection === "no") {
            // Hide and disable the fields
            jerseyDesignField.style.display = "none";
            sleeveField.style.display = "none";
            jerseyColorField.style.display = "none";
            goalKeeperPaddedField.style.display = "none";
            jerseyothercolorgroup.style.display = "none";

            document.getElementById("select2").disabled = true;
            document.getElementById("select3").disabled = true;
            document.getElementById("select4").disabled = true;
            document.getElementById("select5").disabled = true;

        }
    }

    // Initially disable and hide the conditional fields on page load
    window.onload = function() {
        document.getElementById("select2").disabled = true;
        document.getElementById("select3").disabled = true;
        document.getElementById("select4").disabled = true;
    };










    //For shirt selection

    document.getElementById("kit").addEventListener("change", function() {
        const kitValue = this.value;
        const elementsToHide = document.querySelectorAll(".hide-on-shirt-only");

        elementsToHide.forEach(function(td) {
            if (kitValue === "shirt-only") {
                td.style.display = "none"; // Hide the td
            } else {
                td.style.display = "table-cell"; // Show the td
            }
        });
    });



    // Show/hide tab content
    function openTab(tabName) {
        var i;
        var x = document.getElementsByClassName("tabcontent");
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }

    // Select shirt and show it in the display area
    function selectShirt(shirtSrc) {
        document.getElementById("selected-shirt").src = shirtSrc;
    }

    // Select logo and make it draggable/resizable
    function selectLogo(logoSrc) {
        var logo = document.getElementById("selected-logo");
        logo.src = logoSrc;
        logo.style.display = "block";
    }

    // Update text display
    function updateText() {
        var text = document.getElementById("customText").value;
        document.getElementById("text-display").innerText = text;
    }

    // Update color of the text
    function updateColor(color) {
        document.getElementById("text-display").style.color = color;
    }

    function openTab(tabName) {
        var i, tabcontent;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }

    //       function updateSocksColor(color) {

    //   document.getElementById('selected-socks').style.backgroundColor = color;
    // }

    // Draggable functionality
    dragElement(document.getElementById("logo-container"));

    function dragElement(element) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        element.onmousedown = dragMouseDown;

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            element.style.top = element.offsetTop - pos2 + "px";
            element.style.left = element.offsetLeft - pos1 + "px";
        }

        function closeDragElement() {
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }

    // Resize functionality for resizing handles
    resizeElement(document.getElementById("logo-container"));

    function resizeElement(element) {
        var startX, startY, startWidth, startHeight;

        const topLeft = element.querySelector(".top-left");
        const topRight = element.querySelector(".top-right");
        const bottomLeft = element.querySelector(".bottom-left");
        const bottomRight = element.querySelector(".bottom-right");

        // Handle resizing from bottom-right corner
        bottomRight.addEventListener("mousedown", function(e) {
            e.preventDefault();
            startX = e.clientX;
            startY = e.clientY;
            startWidth = parseInt(
                document.defaultView.getComputedStyle(element).width,
                10
            );
            startHeight = parseInt(
                document.defaultView.getComputedStyle(element).height,
                10
            );
            document.documentElement.addEventListener(
                "mousemove",
                doDragBottomRight,
                false
            );
            document.documentElement.addEventListener("mouseup", stopDrag, false);
        });

        function doDragBottomRight(e) {
            element.style.width = startWidth + e.clientX - startX + "px";
            element.style.height = startHeight + e.clientY - startY + "px";
        }

        // Handle resizing from top-left corner
        topLeft.addEventListener("mousedown", function(e) {
            e.preventDefault();
            startX = e.clientX;
            startY = e.clientY;
            startWidth = parseInt(
                document.defaultView.getComputedStyle(element).width,
                10
            );
            startHeight = parseInt(
                document.defaultView.getComputedStyle(element).height,
                10
            );
            document.documentElement.addEventListener(
                "mousemove",
                doDragTopLeft,
                false
            );
            document.documentElement.addEventListener("mouseup", stopDrag, false);
        });

        function doDragTopLeft(e) {
            element.style.width = startWidth - (e.clientX - startX) + "px";
            element.style.height = startHeight - (e.clientY - startY) + "px";
            element.style.left = element.offsetLeft + (e.clientX - startX) + "px";
            element.style.top = element.offsetTop + (e.clientY - startY) + "px";
        }

        function stopDrag() {
            document.documentElement.removeEventListener(
                "mousemove",
                doDragBottomRight,
                false
            );
            document.documentElement.removeEventListener(
                "mousemove",
                doDragTopLeft,
                false
            );
            document.documentElement.removeEventListener(
                "mouseup",
                stopDrag,
                false
            );
        }
    }

    // Update the text content
    function updateText() {
        var text = document.getElementById("customText").value;
        document.getElementById("text-display").innerText = text;
    }

    // Make the text draggable
    dragElement(document.getElementById("text-display"));

    function dragElement(element) {
        var pos1 = 0,
            pos2 = 0,
            pos3 = 0,
            pos4 = 0;
        element.onmousedown = dragMouseDown;

        function dragMouseDown(e) {
            e = e || window.event;
            e.preventDefault();
            // Get the initial mouse cursor position
            pos3 = e.clientX;
            pos4 = e.clientY;
            document.onmouseup = closeDragElement;
            document.onmousemove = elementDrag;
        }

        function elementDrag(e) {
            e = e || window.event;
            e.preventDefault();
            // Calculate the new cursor position
            pos1 = pos3 - e.clientX;
            pos2 = pos4 - e.clientY;
            pos3 = e.clientX;
            pos4 = e.clientY;
            // Set the element's new position
            element.style.top = element.offsetTop - pos2 + "px";
            element.style.left = element.offsetLeft - pos1 + "px";
        }

        function closeDragElement() {
            // Stop moving when the mouse button is released
            document.onmouseup = null;
            document.onmousemove = null;
        }
    }
    </script>



    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get references to the necessary elements
        const staffOtherSelect = document.getElementById("staff-other");
        const staffKitGroup = document.getElementById("staff-kit-group");
        const staffFitTypeGroup = document.getElementById("staff-fit-type-group");
        const staffCollarTypeGroup = document.getElementById("staff-collar-type-group");
        const staffsizeguide = document.getElementById("staff-size-guide");
        const staffkitsleeve = document.getElementById("staff-kit-sleeve");


        // Define the toggleFields function
        function toggleFields() {
            const selectedValue = staffOtherSelect.value;

            if (selectedValue === "yes") {
                // Show fields if "Yes" is selected
                staffKitGroup.style.display = "block";
                staffFitTypeGroup.style.display = "block";
                staffCollarTypeGroup.style.display = "block";
                staffsizeguide.style.display = "block";
                staffkitsleeve.style.display = "block";
            } else {
                // Hide the fields if "No" is selected or default
                staffKitGroup.style.display = "none";
                staffFitTypeGroup.style.display = "none";
                staffCollarTypeGroup.style.display = "none";
                staffsizeguide.style.display = "none";
                staffkitsleeve.style.display = "none";
            }
        }

        // Run the toggleFields function initially to set the correct state
        toggleFields();

        // Add an event listener for the select box
        staffOtherSelect.addEventListener("change", toggleFields);
    });
    </script>



<script>
function updateShirtColor(color) {
  const selectedShirt = document.getElementById('selected-shirt');
  const hue = getHueFromColor(color);
  // Saturate and brightness added for better color effect
  selectedShirt.style.filter = `hue-rotate(${hue}deg) saturate(5) brightness(0.9)`;
}

function getHueFromColor(color) {
  const hex = color.slice(1);
  const r = parseInt(hex.substring(0, 2), 16);
  const g = parseInt(hex.substring(2, 4), 16);
  const b = parseInt(hex.substring(4, 6), 16);

  const max = Math.max(r, g, b);
  const min = Math.min(r, g, b);
  let hue;

  if (max === min) {
    hue = 0;
  } else if (max === r) {
    hue = (60 * ((g - b) / (max - min)) + 360) % 360;
  } else if (max === g) {
    hue = (60 * ((b - r) / (max - min)) + 120) % 360;
  } else {
    hue = (60 * ((r - g) / (max - min)) + 240) % 360;
  }

  return hue;
}

// Set initial color on page load
window.onload = () => {
  const picker = document.getElementById('color-picker');
  updateShirtColor(picker.value);
};
</script>


    <script>     
    $(function() {
        // Update the text in #text-display when the button is clicked
        $("#update-text").click(function() {
            var enteredText = $("#custom-text").val();
            $("#text-display").text(enteredText);

            // Update font size based on input
            var fontSize = $("#font-size").val();
            $("#text-display").css("font-size", fontSize + "px");

            // Update font style based on selection
            var fontStyle = $("#font-style").val();
            $("#text-display").css("font-family", fontStyle);
        });
    });
    </script>


    <script>
    function selectPattern(patternPath) {
        const selectedPattern = document.getElementById('selected-pattern');
        selectedPattern.src = patternPath; // Change the source of the pattern image
        selectedPattern.style.display = 'block'; // Show the pattern overlay if hidden
    }


    function openTab(tabName) {
        const tabcontents = document.querySelectorAll('.tabcontent');
        tabcontents.forEach((tab) => {
            tab.style.display = 'none'; // Hide all tab contents
        });
        document.getElementById(tabName).style.display = 'block'; // Show the selected tab
    }
    </script>

    <script>
    function updatePatternColor(color) {
        const selectedPattern = document.getElementById('selected-pattern'); // Select the pattern by ID
        const hueValue = getHueFromColor(color); // Convert the selected color to hue value
        selectedPattern.style.filter =
            `hue-rotate(${hueValue}deg) saturate(1)`; // Apply hue-rotate and other filters as needed
    }

    // Function to convert the selected color to a hue value for the hue-rotate filter
    function getHueFromColor(color) {
        const hex = color.slice(1); // Remove the '#' from the color code
        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);

        // Convert RGB to HSL and extract the Hue
        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let hue;

        if (max === min) {
            hue = 0; // Achromatic
        } else if (max === r) {
            hue = (60 * ((g - b) / (max - min)) + 360) % 360;
        } else if (max === g) {
            hue = (60 * ((b - r) / (max - min)) + 120) % 360;
        } else {
            hue = (60 * ((r - g) / (max - min)) + 240) % 360;
        }

        return hue;
    }
    </script>








    <!-- FOOTER STARTS FORM HERE -->

    @include('component.footer')

    <!-- FOOTER ENDS HERE -->