<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soccer Kit</title>
    <link rel="stylesheet" href="{{ asset('assets/customizable/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->


    <link rel="shortcut icon" href="{{ asset('assets/images/whitelogo2.png') }}">






    <link rel="stylesheet" href="{{ asset('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js') }}"></script>

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
            <img src="{{ asset('assets/logo.png')}}" style="width:85px;">
            <!-- <img src="{{ asset('assets/logo.png') }}" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="index">HOME</a></li>
            <li><a href="directoryadd">DIRECTORY</a></li>
            <!--<li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>-->
            <li><a href="shop">SHOP</a></li>
            <!--<li><a href="services">SERVICES</a></li>-->
            <li><a href="soccer">CUSTOM UNIFORMS</a></li>


        </ul>

        <!-- Check if user is logged in -->
        @if (session('user'))
            <div class="dropdown">
                <button class="profile-btn">
                    <i class="fa fa-user"></i> Profile &#9662;
                </button>
                <ul class="dropdown-content">
                    @if (session('role') === 'admin')
                        <li><a href="admin_dashboard">Admin Dashboard</a></li>
                    @else
                        <li><a href="dashboard">Dashboard</a></li>
                    @endif
                    <li><a href="logout">Logout</a></li>
                </ul>
            </div>
        @else
            <div class="auth-links" style="text-align: center;">
                <a href="#" class="help">Help</a>

                <a href="login" class="auth-button">Login</a>

                <a href="register" class="auth-button">Sign Up</a>

            </div>


        @endif
    </nav>

    <!-- Navbar Ends -->




    <!-- Staff Management Guide Ends -->


    @yield('main-content')


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

<!-- Script -->


<!--add row script-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let addRowBtn = document.getElementById("addRowBtn");
    let playersTable = document.getElementById("playersTable").getElementsByTagName("tbody")[0];

    // Add row
    addRowBtn.addEventListener("click", function () {
        let newRow = `
            <tr>
                <td><input type="text" name="name[]" class="form-control" placeholder="Enter name" required></td>
                <td><input type="number" name="number[]" class="form-control" placeholder="0" min="1" required></td>
                <td>
                    <select name="shirt_size[]" class="form-control" required>
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                            <select class="short-size" name="short_size[]" require>
                                <option value="">Select</option>
                                @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                            </select>
                    </td>
                <td><input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" required></td>
                <td class="text-center">
                     <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove Row" style="padding: 7px;  background: red; color: white; border: none; border-radius: 6px;">
                        ✖
                    </button>
                </td>
            </tr>
        `;
        playersTable.insertAdjacentHTML("beforeend", newRow);
    });

    // Remove row (event delegation)
    playersTable.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("remove-row")) {
            e.target.closest("tr").remove();
        }
    });
});
</script>


<!--jub shoes ka drop down per yes ho to side ma dusri field open ho jaye-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let socksSelect = document.getElementById("outfield_players_socks");
    let socksColorWrapper = document.getElementById("socksColorWrapper");

    function toggleSocksColor() {
        if (socksSelect.value === "yes") {
            socksColorWrapper.style.display = "block";
        } else {
            socksColorWrapper.style.display = "none";
            document.getElementById("socks-color").value = ""; // reset color if hidden
        }
    }

    // Run on page load (in case old value = yes)
    toggleSocksColor();

    // Run on change
    socksSelect.addEventListener("change", toggleSocksColor);
});
</script>


<!--jub gollkeper ka drop down per yes ho to nicha  dusri field open ho jaye-->
<script>
    function toggleGoalkeeperFields() {
        let select = document.getElementById("goalkeeper_kit");
        let fields = document.getElementById("goalkeeper_fields");
        if (select.value === "yes") {
            fields.style.display = "block";
        } else {
            fields.style.display = "none";
        }
    }

    // Run once on page load
    window.addEventListener("DOMContentLoaded", function () {
        toggleGoalkeeperFields();
    });
</script>


<!--staff/other-->
<script>
function toggleStaffFields() {
    const staffOther = document.getElementById("staff-other").value;
    const staffSection = document.getElementById("staff-section");

    if (staffOther === "yes") {
        staffSection.style.display = "block"; // poora section including fields show
    } else {
        staffSection.style.display = "none";  // hide kar do
    }
}
</script>




    <!-- FOOTER STARTS FORM HERE -->

    @include('component.footer')

    <!-- FOOTER ENDS HERE -->
