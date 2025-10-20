<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!--favicon-->
    <link rel="shortcut icon" href="assets/images/whitelogo2.png">

    <!-- for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="admin-listing.css">-->

    <link rel="stylesheet" href="{{ asset('assets/css/admin-listing.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/customOrder.css') }}">
    <!--<link rel="stylesheet" href="customOrder.css">-->


</head>

<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <a href="{{ route('index') }}" target="_blank">
                    <img src="assets/images/whitelogo2.png" alt="Logo" class="logo-img"></a>
                <!-- Add your logo here -->
                <h2>Admin Panel</h2>
                <button class="close-btn" id="close-btn">&times;</button>
            </div>
            <ul class="menu">
                <li><a href="{{route('admin_dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                <!--<li><a href="{{route('vendor_data')}}"><i class="fas fa-user"></i> User Details</a></li>-->
                <li><a href="{{route('admin_listing')}}"><i class="fas fa-list"></i> Listing</a></li>
                <li><a href="{{ route('custome_order')}}"><i class="fas fa-box"></i> Custom Order</a></li>
                 <li><a href="{{ route('static.order')}}"><i class="fas fa-box"></i> Static Order</a></li>
                <li><a href="#"><i class="fas fa-plus"></i> Add Product</a></li>
                <li><a href="{{route('index')}}"><i class="fa-solid fa-house-user"></i></i> Home</a></li>
                <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i>Sign Out</a></li>
            </ul>
        </aside>
        <main class="content">
            <div>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
            <div class="dashboard-content">



 <div class="dashboard-box-content">

    @foreach ($products as $product)

        @php
            // Calculate total quantity for THIS product
            $productTotalQuantity = 0;
            $bulkData = json_decode($product->bulk_data, true);

            if (is_array($bulkData)) {
                foreach ($bulkData as $item) {
                    $qty = isset($item['quantity']) ? (int) $item['quantity'] : 0;
                    $productTotalQuantity += $qty;
                }
            }

            // Get grand total for THIS product
            $productGrandTotal = $product->grand_total;
        @endphp

        <h1 class="order-head">Order</h1>

        <div class="price-box">
            <div class="price-h">
                <p><strong>Total Quantity (This Product):</strong><br>{{ $productTotalQuantity }}</p>
            </div>
            <div class="price-h">
                <p><strong>Grand Total (This Product):</strong><br>$ {{ $productGrandTotal }}</p>
            </div>
        </div>

        <div class="order-area">
            <div class="order-img">
                @if (!empty($product->logo))
                    <img src="{{ asset('custom/logo/' . basename($product->logo)) }}" alt="Logo" width="300" height="300" class="rounded border">
                @else
                    No logo
                @endif
            </div>
        </div>

        <div class="uper-table-h">
            <h3 class="u-t-h">Static SOCCER JERSEY</h3>
        </div>

        <div class="table-1">
            <table>
                <tr>
                    <td>Sleeve Length: {{ $product->sleeves_length }}</td>
                    <td>Team Logo: {{ $product->team_logo }}</td>
                    <td>Collar Type: {{ $product->collar_type }}</td>
                    <td>Kit: {{ $product->kit }}</td>
                </tr>
                <tr>
                    <td>Fit Type: {{ $product->fit_type }}</td>
                    <td>Inside Collar Message: {{ $product->inside_shirt_collar }}</td>
                    <td>Your Collar Message: {{ $product->outfield_players_socks }}</td>
                    <td>Add a Goalkeeper Kit?: {{ $product->goalkeeper_kit }}</td>
                </tr>
                <tr>
                    <td>Goalkeeper Sleeve: {{ $product->goalkeeper_sleeve }}</td>
                    <td>Goalkeeper Jersey Design: {{ $product->goalkeeper_jersey_design }}</td>
                    <td>Jersey Color: {{ $product->jersey_color }}</td>
                </tr>
                {{-- <tr>
                    <td>Staff/Other: {{ $product->staff_other }}</td>
                    <td>Staff Kit: {{ $product->staff_kit }}</td>
                    <td>Staff Collar Type: {{ $product->staff_collar_type }}</td>
                    <td>Staff Fit Type: {{ $product->staff_fit_type }}</td> --}}
                </tr>
            </table>
        </div>

        <div class="uper-table-h">
            <h3 class="u-t-h">ROSTER INFORMATION KIT INFORMATION</h3>
        </div>

        <div class="table-1">
            @if (is_array($bulkData))
                @foreach ($bulkData as $player)
                    <table border="1" cellpadding="5" cellspacing="0" style="margin-bottom: 15px;">
                        <tr>
                            <td><strong>Roster Name:</strong> {{ $player['name'] ?? 'N/A' }}</td>
                            <td><strong>R-No:</strong> {{ $player['number'] ?? 'N/A' }}</td>
                            <td><strong>R-Shirt Size:</strong> {{ $player['shirt_size'] ?? 'N/A' }}</td>
                            <td><strong>R-Short Size:</strong> {{ $player['short_size'] ?? 'N/A' }}</td>
                            <td><strong>Quantity:</strong> {{ $player['quantity'] ?? 'N/A' }}</td>
                        </tr>
                    </table>
                @endforeach
            @else
                <p style="color: red;">Invalid bulk_data format for product: {{ $product->name }}</p>
            @endif
        </div>

        <a href="{{ route('download.pdf') }}" class="pdf-download-btn">Download PDF</a>

        <hr>

    @endforeach

</div>






            </div>



            <script>
                function toggleLogoutBox() {
                    var logoutBox = document.getElementById("logoutBox");
                    logoutBox.style.display = logoutBox.style.display === "none" ? "block" : "none";
                }
            </script>

            <div class="">

            </div>


        </main>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const sidebar = document.getElementById("sidebar");
            const hamburger = document.getElementById("hamburger");
            const closeBtn = document.getElementById("close-btn");

            hamburger.addEventListener("click", () => {
                sidebar.classList.add("show");
            });

            closeBtn.addEventListener("click", () => {
                sidebar.classList.remove("show");
            });
        });
    </script>
</body>

</html>
