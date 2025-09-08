<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="stylesheet" href="assets/customizable/cart.css">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->

    <link rel=" icon" type="image/png" href="./assets/logo.png" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




</head>


<!-- Navbar starts -->

<nav class="navbar">
    <!-- Logo Section -->
    <div class="logo">
        <img src="./assets/logo.png" alt="Logo" />
    </div>

    <!-- Navigation Links -->
    <ul class="nav-links">
        <li><a href="{{route('index')}}">HOME</a></li>
        <li><a href="{{route('directoryadd')}}">DIRECTORY</a></li>
        <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
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

<!-- Navbar Ends -->


<!-- Main Section Starts-->


<div class="cart-heading">

    <p>SHOPPING CART</p>

</div>


<div class="p-list-headings">


    <div class="f-p-h">
        <p>Product</p>
    </div>

    <div class="p-h">
        <p>Price</p>
    </div>

    <div class="p-h">
        <p>Quantity</p>
    </div>

    <div class="p-h">
        <p>Total</p>
    </div>


</div>



<div class="content-area">


    <div class="product-info">

        <div class="img-div">
            @if(session('custom_image'))
            <img src="{{ session('custom_image') }}" alt="Custom Image" width="200px">
            @endif

            <img src="./assets/d-shirt.jpg" alt="" width="60px">

        </div>


        <div class="info-div">
            <p class="info-h">Custom Soccer Jersey</p>


            <div class="div">
                <p>
                    Sleeve Length:&nbsp;&nbsp;&nbsp;
                    {{ $formData['sleeve-length'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Team Logo: &nbsp;&nbsp;&nbsp;
                    {{ $formData['team-logo'] }}

                </p>
            </div>
            <div class="div">
                <p>

                    Collar Type: &nbsp;&nbsp;&nbsp;
                    {{ $formData['collar-type'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Kit:&nbsp;&nbsp;&nbsp;
                    {{ $formData['kit'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Fit Type: &nbsp;&nbsp;&nbsp;
                    {{ $formData['fit-type'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Inside Collar Message: &nbsp;&nbsp;&nbsp;
                    {{ $formData['inside-collar-message'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Your Collar Message: &nbsp;&nbsp;&nbsp;
                    {{ $formData['inside_collar_message_text'] }}
                </p>
            </div>





            <div class="div">
                <p>
                    Add a Goalkeeper Kit?: &nbsp;&nbsp;&nbsp;
                    {{ $formData['goalkeeper-kit'] ?? '' }}
                </p>
            </div>
            <div class="div">
                <p>
                    Padded : &nbsp;&nbsp;&nbsp;
                    {{ $formData['padded'] ?? '' }}
                </p>
            </div>
            <div class="div">
                <p>
                    Goalkeeper Sleeve: &nbsp;&nbsp;&nbsp;
                    {{ $formData['goalkeeper-sleeve'] ?? '' }}
                </p>
            </div>
            <div class="div">
                <p>
                    Goalkeeper Jersey Design: &nbsp;&nbsp;&nbsp;
                    {{ $formData['goalkeeper-jersey-design'] ?? '' }}
                </p>
            </div>
            <div class="div">
                <p>
                    Jersey Color: &nbsp;&nbsp;&nbsp;
                    {{ $formData['jersey-color'] ?? '' }}
                </p>
            </div>



            <div class="div">
                <p>
                    Staff/Other: &nbsp;&nbsp;&nbsp;
                    {{ $formData['staff-other'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Staff Kit: &nbsp;&nbsp;&nbsp;
                    {{ $formData['staff-kit'] }}
                </p>
            </div>
            <div class="div">
                <p>

                    Staff Collar Type: &nbsp;&nbsp;&nbsp;
                    {{ $formData['staff-collar-type'] }}
                </p>
            </div>
            <div class="div">
                <p>
                    Staff Fit Type: &nbsp;&nbsp;&nbsp;
                    {{ $formData['staff-fit-type'] }}
                </p>
            </div>



            <br>
            <div class="div">
                <p>Roster Name----------------1:&nbsp;{{ $formData['name'][0] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][0] }} </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][0] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][0] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][0] }}</p>
            </div>


            <div class="div">
                <p>Roster Name----------------2:&nbsp;{{ $formData['name'][1] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][1] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][1] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][1] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][1] }}</p>
            </div>

            <div class="div">
                <p>Roster Name----------------3:&nbsp;{{ $formData['name'][2] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][2] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][2] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][2] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][2] }}</p>
            </div>

            <div class="div">
                <p>Roster Name----------------4:&nbsp;{{ $formData['name'][3] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][3] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][3] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][3] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][3] }}</p>
            </div>

            <div class="div">
                <p>Roster Name----------------5:&nbsp;{{ $formData['name'][4] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][4] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][4] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][4] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][4] }}</p>
            </div>

            <div class="div">
                <p>Roster Name----------------6:&nbsp;{{ $formData['name'][4] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][5] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][5] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][5] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][5] }}</p>
            </div>

            <div class="div">
                <p>Roster Name----------------7:&nbsp;{{ $formData['name'][4] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][6] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][6] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][6] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][6] }}</p>
            </div>

            <div class="div">
                <p>Roster Name----------------8:&nbsp;{{ $formData['name'][4] }} </p>
            </div>
            <div class="div">
                <p>Roster Number:&nbsp;&nbsp;&nbsp; {{ $formData['number'][7] }} : </p>
            </div>
            <div class="div">
                <p>Roster Shirt Size:&nbsp;&nbsp;&nbsp; {{ $formData['shirt_size'][7] }}</p>
            </div>
            <div class="div">
                <p>Roster short Size:&nbsp;&nbsp;&nbsp; {{ $formData['short_size'][7] }}</p>
            </div>
            <div class="div">
                <p>Quantity:&nbsp;&nbsp;&nbsp; {{ $formData['quantity'][7] }}</p>
            </div>
            <br>



            <div class="div">
                <p>Roster Staff Shirt Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_shirt_size'][0] }} </p>
            </div>
            <div class="div">
                <p>Roster Staff Pants Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_pant_size'][0] }} </p>
            </div>
            <div class="div">
                <p>Quantity :&nbsp;&nbsp;&nbsp; {{ $formData['shirt_paint_quantity'][0] }} </p>
            </div>



            <div class="div">
                <p>Roster Staff Shirt Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_shirt_size'][1] }} </p>
            </div>
            <div class="div">
                <p>Roster Staff Pants Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_pant_size'][1] }} </p>
            </div>
            <div class="div">
                <p>Quantity :&nbsp;&nbsp;&nbsp; {{ $formData['shirt_paint_quantity'][1] }} </p>
            </div>


            <div class="div">
                <p>Roster Staff Shirt Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_shirt_size'][2] }} </p>
            </div>
            <div class="div">
                <p>Roster Staff Pants Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_pant_size'][2] }} </p>
            </div>
            <div class="div">
                <p>Quantity :&nbsp;&nbsp;&nbsp; {{ $formData['shirt_paint_quantity'][2] }} </p>
            </div>


            <div class="div">
                <p>Roster Staff Shirt Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_shirt_size'][3] }} </p>
            </div>
            <div class="div">
                <p>Roster Staff Pants Size :&nbsp;&nbsp;&nbsp; {{ $formData['staff_pant_size'][3] }} </p>
            </div>
            <div class="div">
                <p>Quantity :&nbsp;&nbsp;&nbsp; {{ $formData['shirt_paint_quantity'][3] }} </p>
            </div>






        </div>




    </div>



    <div class="product-data">

        <div class="cart-item">
            <span class="price">${{ $formData['price'] }}</span>
            <div class="quantity">
                <button class="minus">–</button>
                <input type="text" value="{{ $totalQuantity }}">
                <button class="plus">+</button>
            </div>
            <span class="total">${{ $totalPrice }}</span>

        </div>
        <!-- <button class="remove">Remove ×</button> -->

    </div>


</div>


<hr>

<div class="pay-area">

    <div class="p-note-div">
        <p class="note-heading">Add a note to your order</p>
        <textarea name="order-note" id="order-note">  </textarea>
    </div>


    <div class="check-div">
        <p class="total-p">SUBTOTAL: ${{ $totalPrice }}</p>
        <p class="cart-policy">Taxes and shipping calculated at checkout</p>

        <!-- <button class="check-out-btn" href="{{route('checkout')}}"> Check out</button> -->
        <a class="check-out-btn" href="{{route('checkout')}}">
            Check out
        </a>
    </div>


</div>




</div>







<!-- Main Section Ends-->








<!-- FOOTER STARTS FORM HERE -->

<footer class="custom-footer">
    <div class="footer-container">
        <!-- First Div: Logo and Summary -->
        <div class="footer-logo-summary">
            <img src="./assets/logo.png" alt="Logo" class="footer-logo" style="max-width: 100px" />
            <p class="footer-summary">
                CONNECT 767 unites professionals and business leaders to drive
                growth.
            </p>
        </div>

        <!-- Second Div: Quick Links -->
        <div class="footer-quick-links">
            <h4 class="footer-heading">Quick Links</h4>
            <ul class="footer-links-list">
                <li><a href="#">HOME</a></li>
                <li><a href="#">DIRECTORY</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">CUSTOMIZABLE UNIFORMS</a></li>
            </ul>
        </div>

        <!-- Third Div: Our Services -->
        <div class="footer-services">
            <h4 class="footer-heading">Our Services</h4>
            <ul class="footer-links-list">
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Professional
                        Networking</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Consulting
                        Services</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Workshops &
                        Events</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Partnership
                        Programs</a>
                </li>
            </ul>
        </div>

        <!-- Fourth Div: Information with Social Media Icons -->
        <div class="footer-info">
            <h4 class="footer-heading">Information</h4>
            <ul class="footer-info-list">
                <li>
                    <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;New York, NY,
                    10001
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i> &nbsp;<a
                        href="mailto:info@connect767.com">info@connect767.com</a>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Phone: 862-253-2076
                </li>
            </ul>
            <!-- Social Media Icons with a Different Class Name -->
            <div class="footer-social-media-icons">
                <a href="#" class="social-icon"><img src="./assets/fb.png" alt="Facebook"
                        style="border-radius: 100%" /></a>
                <a href="#" class="social-icon"><img src="./assets/twitter.png" alt="Twitter"
                        style="border-radius: 100%" /></a>
                <a href="#" class="social-icon"><img src="./assets/youtube.png" alt="YouTube"
                        style="border-radius: 100%" /></a>
                <a href="#" class="social-icon"><img src="./assets/Instagram.webp" alt="Instagram"
                        style="border-radius: 100%" /></a>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright Section -->
<div class="footer-copyright">
    <p>&copy; Copyright 2024 NY Creative Studio All Rights Reserved</p>
</div>

<!-- FOOTER ENDS HERE -->

<!-- JAVASCRITP STARTS FROM HERE -->

<script>
    document.getElementById('inside-collar-message').addEventListener('change', function() {
        var messageGroup = document.getElementById('message-group');

        if (this.value === 'yes') {
            messageGroup.style.display = 'block';
        } else if (this.value === 'no') {
            messageGroup.style.display = 'none';
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

        if (selection === "yes") {
            // Show and enable the fields
            jerseyDesignField.style.display = "block";
            sleeveField.style.display = "block";
            jerseyColorField.style.display = "block";
            goalKeeperPaddedField.style.display = "block";

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


        // Define the toggleFields function
        function toggleFields() {
            const selectedValue = staffOtherSelect.value;

            if (selectedValue === "yes") {
                // Show fields if "Yes" is selected
                staffKitGroup.style.display = "block";
                staffFitTypeGroup.style.display = "block";
                staffCollarTypeGroup.style.display = "block";
                staffsizeguide.style.display = "block";
            } else {
                // Hide the fields if "No" is selected or default
                staffKitGroup.style.display = "none";
                staffFitTypeGroup.style.display = "none";
                staffCollarTypeGroup.style.display = "none";
                staffsizeguide.style.display = "none";
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
        const selectedShirt = document.getElementById('selected-shirt'); // Select the specific shirt by ID
        selectedShirt.style.filter = `hue-rotate(${getHueFromColor(color)}deg)`; // Update the filter
    }

    function getHueFromColor(color) {
        const hex = color.slice(1); // Remove the '#' from the color
        const r = parseInt(hex.substring(0, 2), 16);
        const g = parseInt(hex.substring(2, 4), 16);
        const b = parseInt(hex.substring(4, 6), 16);

        // Convert RGB to HSL and get the Hue
        const max = Math.max(r, g, b);
        const min = Math.min(r, g, b);
        let hue;

        if (max === min) {
            hue = 0; // Achromatic
        } else if (max === r) {
            hue = (60 * (g - b) / (max - min) + 360) % 360;
        } else if (max === g) {
            hue = (60 * (b - r) / (max - min) + 120) % 360;
        } else {
            hue = (60 * (r - g) / (max - min) + 240) % 360;
        }

        return hue;
    }
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





</body>

</html>