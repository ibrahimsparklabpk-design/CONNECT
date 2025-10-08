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

        < !-- logo code starts here -->.logos-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 15px;
            margin-top: 20px;
            width: 100%;
            max-width: 100%;
            /* ✅ horizontal scroll prevent */
            overflow: hidden;
            /* ✅ koi scrollbar na aaye */
        }

        .logo-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
            padding: 8px;
            border-radius: 8px;
            background: #fff;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .logo-item img.logo {
            width: 100%;
            max-width: 80px;
            /* ✅ image auto resize */
            max-height: 80px;
            object-fit: contain;
            margin-bottom: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .logo-item .btn {
            padding: 4px 8px;
            font-size: 13px;
            border-radius: 4px;
        }


        .upload-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: #000;
            color: #fff;
            border-radius: 8px;
            font-weight: 500;
            font-size: 14px;
            transition: background 0.3s ease;
            cursor: pointer;
            /* 👈 yeh line zaroori hai */
        }

        .upload-btn:hover {
            background: #333;
        }

        .upload-btn i {
            font-size: 16px;
        }


        .delete-btn {
            background-color: #000000 !important;
            color: #ffffff !important;
            border: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: 500;
            transition: background 0.3s ease;
            text-decoration: none;
            display: inline-block;
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

    <script>
        // Jab user shirt select kare
        function selectShirt(imagePath) {
            // Hidden input update
            const hiddenInput = document.getElementById("selectedShirtInput");
            hiddenInput.value = imagePath;

            // Right section me base shirt image replace karo
            const shirtImg = document.getElementById("selected-shirt");
            if (shirtImg) {
                shirtImg.src = imagePath;
            }

            console.log("Selected Shirt Path:", imagePath); // Debugging
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let quantityInput = document.getElementById("quantity");
            let priceInput = document.getElementById("price");

            let unitPrice = 0;

            // Jab user price dale → unit price set ho jaye
            priceInput.addEventListener("input", function() {
                let qty = parseInt(quantityInput.value) || 0;

                if (qty > 0) {
                    unitPrice = parseFloat(this.value) / qty;
                } else {
                    unitPrice = parseFloat(this.value) || 0;
                }
            });

            // Jab quantity change ho → price update karo
            quantityInput.addEventListener("input", function() {
                let qty = parseInt(this.value) || 0;

                if (qty === 0) {
                    priceInput.value = 0;
                } else {
                    priceInput.value = (unitPrice * qty).toFixed(2);
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Sabhi quantity inputs select karo
            document.querySelectorAll(".quantity-input").forEach(function(input) {
                input.addEventListener("input", function() {
                    let qty = parseInt(this.value) || 1;
                    let unitPrice = parseFloat(this.getAttribute("data-price")) || 0;

                    // Row ke andar total-price cell dhundo
                    let totalCell = this.closest("tr").querySelector(".total-price");

                    // Total price update karo
                    totalCell.textContent = (unitPrice * qty).toFixed(2);
                });
            });
        });
    </script>


    {{-- ✅ JavaScript for auto update --}}
    {{-- <script>
    function calculateTotals() {
        document.querySelectorAll(".quantity-input").forEach(qtyInput => {
            let row = qtyInput.closest("tr");
            let priceInput = row.querySelector(".row-total");

            let qty = parseInt(qtyInput.value) || 1;
            let unitPrice = parseFloat(qtyInput.dataset.price) || 39;

            let totalPrice = qty * unitPrice;

            priceInput.value = totalPrice.toFixed(2);
        });
    }

    // Page load pe run
    calculateTotals();

    // Har quantity input pe listener
    document.querySelectorAll(".quantity-input").forEach(input => {
        input.addEventListener("input", calculateTotals);
    });
</script> --}}




    {{-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        const qty = document.getElementById("guide_quantity");
        const price = document.getElementById("guide_price");
        const total = document.getElementById("guide_total");

        let unitPrice = 0; // 👈 yahan base unit price store hoga (jo user pehli daalega)

        // Jab user manual price dale
        price.addEventListener("input", function () {
            unitPrice = parseFloat(price.value) || 0; // base price save karo
            calculate();
        });

        // Jab quantity change ho
        qty.addEventListener("input", calculate);

        function calculate() {
            let q = parseInt(qty.value) || 0;

            // price = unitPrice × qty
            let calculatedPrice = unitPrice * q;
            price.value = calculatedPrice;

            // total bhi wahi hoga
            total.value = calculatedPrice;
        }
    });
</script> --}}


    </script>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const addRowBtn = document.getElementById("addRow");   // Add Row button
    const wrapper   = document.getElementById("details-wrapper"); // Table body

    // 👉 Add new row
    addRowBtn.addEventListener("click", function () {
        const newRow = document.createElement("tr");
        newRow.classList.add("detail-row");

        newRow.innerHTML = ` <td>
                <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
            </td>
            <td>
                <input type="number" name="number[]" class="form-control" placeholder="0" min="1" required>
            </td>
            <td>
                <select name="shirt_size[]" class="form-control" required>
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
                <select name="short_size[]" class="form-control" required>
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
                <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" value="1">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove Row"
                    style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                    ✖
                </button>
            </td>
        `;

        wrapper.appendChild(newRow);
    });

    // 👉 Remove row
    document.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-row")) {
            e.target.closest("tr").remove();
        }
    });
});
</script>
{{-- bulk guide data --}}
 <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addRowBtn = document.getElementById("addRow"); // Add Row button
            const wrapper = document.getElementById("details-wrapper"); // Table body

            // 👉 Add new row
            addRowBtn.addEventListener("click", function() {
                const newRow = document.createElement("tr");
                newRow.classList.add("detail-row");

                newRow.innerHTML = ` <td>
                <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
            </td>
            <td>
                <input type="number" name="number[]" class="form-control" placeholder="0" min="1" required>
            </td>
            <td>
                <select name="shirt_size[]" class="form-control" required>
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
                <select name="short_size[]" class="form-control" required>
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
                <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" value="1">
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove Row"
                    style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                    ✖
                </button>
            </td>
        `;

                wrapper.appendChild(newRow);
            });

            // 👉 Remove row
            document.addEventListener("click", function(e) {
                if (e.target.classList.contains("remove-row")) {
                    e.target.closest("tr").remove();
                }
            });
        });
    </script>
{{-- bulk guide data --}}

{{-- <script>
document.addEventListener("DOMContentLoaded", function() {
    const wrapper = document.getElementById("guide-details-wrapper");
    const addGuideRowBtn = document.getElementById("addGuideRow");

    // 🧮 Recalculate total for a single row
    function updateRowTotal(row) {
        const qty = parseFloat(row.querySelector(".guide-quantity")?.value) || 0;
        const price = parseFloat(row.querySelector(".guide-price")?.value) || 0;
        const total = qty * price;
        row.querySelector(".guide-total").value = total.toFixed(2);
        updateGrandTotal();
    }

    // 💰 Update Grand Total
    function updateGrandTotal() {
        let grand = 0;
        document.querySelectorAll(".guide-total").forEach(input => {
            grand += parseFloat(input.value) || 0;
        });
        document.getElementById("grandTotal").innerText = grand.toFixed(2);
    }

    // 🎯 Input listener for quantity and price changes
    wrapper.addEventListener("input", function(e) {
        if (e.target.classList.contains("guide-quantity") ||
            e.target.classList.contains("guide-price")) {
            updateRowTotal(e.target.closest("tr"));
        }
    });

    // ➕ Add new row
    addGuideRowBtn.addEventListener("click", function() {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td><input type="text" name="guide_name[]" class="form-control" placeholder="Enter name" required></td>
            <td><input type="number" name="guide_number[]" class="form-control" placeholder="0" min="1" required></td>
            <td>
                <select name="guide_shirt_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="xs">XS</option><option value="s">S</option><option value="m">M</option>
                    <option value="l">L</option><option value="xl">XL</option><option value="2xl">2XL</option><option value="3xl">3XL</option>
                </select>
            </td>
            <td>
                <select name="guide_pant_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="xs">XS</option><option value="s">S</option><option value="m">M</option>
                    <option value="l">L</option><option value="xl">XL</option><option value="2xl">2XL</option><option value="3xl">3XL</option>
                </select>
            </td>
            <td>
                <select name="guide_sleeves_length[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="short">SHORT</option>
                    <option value="long">LONG</option>
                </select>
            </td>
            <td><input type="number" name="guide_quantity[]" class="form-control guide-quantity" min="1" value="1"></td>
            <td><input type="number" name="price[]" class="form-control guide-price" min="0" value="50"></td>
            <td><input type="text" name="total[]" class="form-control guide-total" readonly value="50"></td>
            <td class="text-center"><button type="button" class="btn btn-danger btn-sm remove-row" style="border-radius:6px;">✖</button></td>
        `;
        wrapper.appendChild(newRow);
        updateGrandTotal();
    });

    // ❌ Remove row
    wrapper.addEventListener("click", function(e) {
        if (e.target.classList.contains("remove-row")) {
            e.target.closest("tr").remove();
            updateGrandTotal();
        }
    });
});
</script> --}}

<script>
document.addEventListener("DOMContentLoaded", function () {
    const BASE_PRICE = 39.00;

    // =================== Helper ===================
    function updateGrandTotal() {
        let grand = 0;
        document.querySelectorAll(".player-total, .guide-total").forEach(input => {
            grand += parseFloat(input.value) || 0;
        });
        document.getElementById("grandTotal").innerText = grand.toFixed(2);
    }

    // =================== Player Section ===================
    const playerWrapper = document.getElementById("details-wrapper");
    const addRow = document.getElementById("addRow");

    function updatePlayerRowTotal(row) {
        const qty = parseFloat(row.querySelector(".player-quantity")?.value) || 0;
        const total = qty * BASE_PRICE;
        row.querySelector(".player-total").value = total.toFixed(2);
        row.querySelector(".player-total-display").innerText = total.toFixed(2);
        updateGrandTotal();
    }

    addRow.addEventListener("click", function () {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td><input type="text" name="name[]" class="form-control" required></td>
            <td><input type="number" name="number[]" class="form-control" min="1" value="1" required></td>
            <td>
                <select name="shirt_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option><option value="m">M</option><option value="l">L</option>
                </select>
            </td>
            <td>
                <select name="short_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option><option value="m">M</option><option value="l">L</option>
                </select>
            </td>
            <td><input type="number" name="quantity[]" class="form-control player-quantity" min="1" value="1"></td>

            <input type="hidden" name="price[]" class="player-price" value="${BASE_PRICE}">
            <input type="hidden" name="total[]" class="player-total" value="${BASE_PRICE}">
            <td><span class="player-total-display" style="display:none;">${BASE_PRICE.toFixed(2)}</span></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>
        `;
        playerWrapper.appendChild(newRow);
        updateGrandTotal();
    });

    playerWrapper.addEventListener("input", function (e) {
        if (e.target.classList.contains("player-quantity")) {
            updatePlayerRowTotal(e.target.closest("tr"));
        }
    });

    playerWrapper.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-row")) {
            e.target.closest("tr").remove();
            updateGrandTotal();
        }
    });

    // =================== Guide Section ===================
    const guideWrapper = document.getElementById("guide-details-wrapper");
    const addGuideRowBtn = document.getElementById("addGuideRow");

    function updateGuideRowTotal(row) {
        const qty = parseFloat(row.querySelector(".guide-quantity")?.value) || 0;
        const total = qty * BASE_PRICE;
        row.querySelector(".guide-total").value = total.toFixed(2);
        row.querySelector(".guide-total-display").innerText = total.toFixed(2);
        updateGrandTotal();
    }

    addGuideRowBtn.addEventListener("click", function () {
        const newRow = document.createElement("tr");
        newRow.innerHTML = `
            <td><input type="text" name="guide_name[]" class="form-control" required></td>
            <td><input type="number" name="guide_number[]" class="form-control" min="1" value="1" required></td>
            <td>
                <select name="guide_shirt_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option><option value="m">M</option><option value="l">L</option>
                </select>
            </td>
            <td>
                <select name="guide_pant_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option><option value="m">M</option><option value="l">L</option>
                </select>
            </td>
            <td>
                <select name="guide_sleeves_length[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="short">SHORT</option><option value="long">LONG</option>
                </select>
            </td>
            <td><input type="number" name="guide_quantity[]" class="form-control guide-quantity" min="1" value="1"></td>

            <input type="hidden" name="guide_price[]" class="guide-price" value="${BASE_PRICE}">
            <input type="hidden" name="guide_total[]" class="guide-total" value="${BASE_PRICE}">
            <td><span class="guide-total-display" style="display:none;">${BASE_PRICE.toFixed(2)}</span></td>
            <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>
        `;
        guideWrapper.appendChild(newRow);
        updateGrandTotal();
    });

    guideWrapper.addEventListener("input", function (e) {
        if (e.target.classList.contains("guide-quantity")) {
            updateGuideRowTotal(e.target.closest("tr"));
        }
    });

    guideWrapper.addEventListener("click", function (e) {
        if (e.target.classList.contains("remove-row")) {
            e.target.closest("tr").remove();
            updateGrandTotal();
        }
    });
});
</script>



{{-- @yield('script') --}}


    @yield('script');
