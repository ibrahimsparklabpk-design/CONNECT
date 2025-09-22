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


        #staff-kit-group,
        #staff-fit-type-group,
        #staff-collar-type-group {
            display: block;
        }

        .add-row-btn1 {
            background: black !important;
            color: white;
            padding: 10px 15px;
            border-radius: 23px;
            border: none;
            font-size: 16px;
        }

        canvas {
            display: block;
            margin: 10px auto;
            border: 1px solid #ccc;
        }

        .color-picker-label {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            cursor: pointer;
            margin: 8px 0;
            font-family: Arial, sans-serif;
        }

        /* Logos Grid */
        .logos-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
            gap: 10px;
            justify-items: center;
            align-items: center;
            padding: 10px 0;
        }

        .logos-container .logo {
            width: 70px;
            height: auto;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .logos-container .logo:hover {
            transform: scale(1.1);
        }


        @media (max-width: 786px) {
            #shirt-canvas {
                height: 30rem;
                margin-top: -11rem;
            }
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
            <li><a href="{{ route('static.index') }}">CUSTOM UNIFORMS</a></li>


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










    <!-- left per soccer ke shirt ko jub ma click karu to sida sida right per show ho jaye -->
    <script>
        function selectShirt(src) {
            document.getElementById("selected-shirt").src = src;
        }

        function selectLogo(src) {
            let logo = document.getElementById("selected-logo");
            logo.src = src;
            logo.style.display = "block";
        }

        function selectPattern(src) {
            let pattern = document.getElementById("selected-pattern");
            pattern.src = src;
            pattern.style.display = "block";
        }

        // Open tabs
        function openTab(tabName) {
            let i, tabcontent;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            document.getElementById(tabName).style.display = "block";
        }
    </script>


    <!--add row script-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let addRowBtn = document.getElementById("addRowBtn");
            let playersTable = document.getElementById("playersTable").getElementsByTagName("tbody")[0];

            // Add row
            addRowBtn.addEventListener("click", function() {
                let newRow = `
            <tr>
                <td><input type="text" name="name[]" class="form-control" placeholder="Enter name" style="padding: 9px"></td>
                <td><input type="number" name="number[]" class="form-control" placeholder="0" min="1" style="padding: 9px"></td>
                <td>
                    <select name="shirt_size[]" class="form-control" style="padding: 9px">
                        <option value="">Select</option>
                        @foreach (['xs', 's', 'm', 'l', 'xl', '2xl', '3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                            <select class="short-size" name="short_size[]" require>
                                <option value="">Select</option>
                                @foreach (['xs', 's', 'm', 'l', 'xl', '2xl', '3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                            </select>
                    </td>
                <td><input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" style="padding: 9px"></td>
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
            playersTable.addEventListener("click", function(e) {
                if (e.target && e.target.classList.contains("remove-row")) {
                    e.target.closest("tr").remove();
                }
            });
        });
    </script>


    <!--jub shoes ka drop down per yes ho to side ma dusri field open ho jaye-->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
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
        window.addEventListener("DOMContentLoaded", function() {
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
                staffSection.style.display = "none"; // hide kar do
            }
        }
    </script>

    <!-- Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addRowBtn = document.querySelector(".add-player-row");
            const playersBody = document.querySelector(".players-body");

            // Add Row
            addRowBtn.addEventListener("click", function() {
                const newRow = document.createElement("tr");

                newRow.innerHTML = `
            <td>
                <input type="text" name="name[]" class="form-control" placeholder="Enter name" style="padding: 9px">
            </td>
            <td>
                <input type="number" name="number[]" class="form-control" placeholder="0" min="1" style="padding: 9px">
            </td>
            <td>
                <select name="shirt_size[]" class="form-control" style="padding: 9px">
                    <option value="">Select</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="2xl">2XL</option>
                    <option value="3xl">3XL</option>
                </select>
            </td>
            <td class="hide-on-shirt-only">
                <select class="short-size" name="short_size[]" style="padding: 9px">
                    <option value="">Select</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="2xl">2XL</option>
                    <option value="3xl">3XL</option>
                </select>
            </td>
            <td>
                <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" style="padding: 9px">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-player-row" title="Remove Row" 
                    style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                    ✖
                </button>
            </td>
        `;

                playersBody.appendChild(newRow);
            });

            // Remove Row
            playersBody.addEventListener("click", function(e) {
                if (e.target && e.target.classList.contains("remove-player-row")) {
                    // kam se kam 1 row rehni chahiye
                    if (playersBody.querySelectorAll("tr").length > 1) {
                        e.target.closest("tr").remove();
                    } else {
                        alert("At least one row is style="
                            padding: 9 px "!");
                    }
                }
            });
        });
    </script>

@yield('script');

