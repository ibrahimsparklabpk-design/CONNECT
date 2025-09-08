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
                    <img src="assets/images/whitelogo2.png" alt="Logo" class="logo-img"></a> <!-- Add your logo here -->
                <h2>Admin Panel</h2>
                <button class="close-btn" id="close-btn">&times;</button>
            </div>
            <ul class="menu">
                <li><a href="{{route('admin_dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                <!--<li><a href="{{route('vendor_data')}}"><i class="fas fa-user"></i> User Details</a></li>-->
                <li><a href="{{route('admin_listing')}}"><i class="fas fa-list"></i> Listing</a></li>
                <li><a href="#"><i class="fas fa-box"></i> Custom Order</a></li>
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
                    @foreach($products as $product)
                    @php
                       $productId = $product->id;

                    $productCustomerId = $product->customer_id;
                    @endphp
                   
                    <h1 class="order-head">
                        Order
                    </h1>
                    <!-- top price box -->
                    <div class="price-box">
                         @foreach($customePayments as $customePayment)
                        @if($customePayment->customer_id == $productCustomerId)
                        <div class="price-h">
                           <p>Price :Price:&nbsp;&nbsp;<br>{{ $customePayment->price }}
                           </p>
                        </div>
                        <div class="price-h">
                             <p>Quantity :&nbsp;&nbsp;<br>{{ $customePayment->total_quantity }}
                             </p>
                        </div>
                        <div class="price-h">
                            <p>Total Price::&nbsp;&nbsp;<br>{{ $customePayment->payment }}</p>
                        </div>
                            @endif
                        @endforeach


                    </div>
                    <div class="order-area">
                        <div class="order-img">
                            
                           <img src="{{ asset('storage/uploads/' . basename($product->custom_image)) }}" width="300" height="300">
                         

                        </div>

                    </div>
                    <div class="uper-table-h">
                        <h3 class="u-t-h">
                            CUSTOM SOCCER JERSEY
                        </h3>

                    </div>
                    <div class="table-1">
                           <table>
                                    <tr>
                                        <td>Sleeve Length:&nbsp;&nbsp; {{ $product->sleeve_length }}</td>
                                        <td>Team Logo:&nbsp;&nbsp; {{ $product->team_logo }}</td>
                                        <td>Collar Type:&nbsp;&nbsp; {{ $product->collar_type }}</td>
                                        <td>Kit:&nbsp;&nbsp; {{ $product->kit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Fit Type:&nbsp;&nbsp;{{ $product->fit_type }}</td>
                                        <td>Inside Collar Message:&nbsp;&nbsp;{{ $product->inside_collar_message }}</td>
                                        <td>Your Collar Message:&nbsp;&nbsp;{{ $product->collar_text }}</td>
                                        <td>Add a Goalkeeper Kit?:&nbsp;&nbsp;{{ $product->goalkeeper_kit }}</td>
                                    </tr>
                                    <tr>
                                        <td>Padded:&nbsp;&nbsp;{{ $product->padded }}</td>
                                        <td>Goalkeeper Sleeve:&nbsp;&nbsp;{{ $product->goalkeeper_sleeve }}</td>
                                        <td>Goalkeeper Jersey
                                            Design:&nbsp;&nbsp;{{ $product->goalkeeper_jersey_design }}</td>
                                        <td>Jersey Color: &nbsp;&nbsp;{{ $product->jersey_color }}</td>
                                    </tr>
                                    <tr>
                                        <td>Staff/Other:&nbsp;&nbsp; {{ $product->staff_other }}</td>
                                        <td>Staff Kit:&nbsp;&nbsp;{{ $product->staff_kit }}</td>
                                        <td>Staff Collar Type:&nbsp;&nbsp;{{ $product->staff_collar_type }}</td>
                                        <td>Staff Fit Type:&nbsp;&nbsp;{{ $product->staff_fit_type }}</td>
                                    </tr>
                                </table>
                    </div>
                    <div class="uper-table-h">
                        <h3 class="u-t-h">
                            ROSTER INFORMATION KIT INFORMATION
                        </h3>

                    </div>

                    <div class="table-1">
                        @foreach($sizeGuides as $sizeGuide)
                        @if($sizeGuide->customer_id == $productCustomerId)
                        <table>
                            <tr>
                                <td>Roster Name:&nbsp;&nbsp;{{ $sizeGuide->size_guide_name }}</td>
                                <td>R-No:&nbsp;&nbsp;{{ $sizeGuide->size_guide_number }}</td>
                                <td>R-Shirt Size:&nbsp;&nbsp;{{ $sizeGuide->size_guide_shirt_size }}
                                </td>
                                <td>R-Short Size:&nbsp;&nbsp;{{ $sizeGuide->size_guide_short_size }}
                                </td>
                                <td>Quantity:&nbsp;&nbsp;{{ $sizeGuide->size_guide_quantity }}
                                </td>
                            </tr>

                        </table>
                        @endif
                        @endforeach


                    </div>

                    <div class="uper-table-h">
                        <h3 class="u-t-h">
                            STAFF KIT INFORMATION
                        </h3>

                    </div>
                    <div class="table-1">
                        @foreach($sizeStaffs as $sizeStaff)
                        @if($sizeStaff->customer_id == $productCustomerId)
                        <table>
                            <tr>
                                <td>Roster Name:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_name }}
                                </td>
                                <td>

                                    Sleeves
                                    Length:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_sleeves_length }}
                                </td>
                                <td>
                                    Pants
                                    Length:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_pants_length }}
                                </td>

                                <td>Shirt Size:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_shirt_size }}
                                </td>
                                <td>Pants Size:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_pants_size }}
                                </td>
                                <td>Quantity:&nbsp;&nbsp;<br>{{ $sizeStaff->staff_quantity }}</td>
                            </tr>



                        </table>
                        @endif
                        @endforeach

                    </div>

                    <div class="uper-table-h">
                        <h3 class="u-t-h">
                            PAYMENT INFORMATIO
                        </h3>


                    </div>
                    <div class="table-1">
                        @foreach($customePayments as $customePayment)
                        @if($customePayment->customer_id == $productCustomerId)
                        <table>
                            <tr>
                                <h3>
                                    Delivery
                                </h3>
                                <td>
                                    Email:&nbsp;&nbsp;<br>{{ $customePayment->p_email }}
                                </td>
                                <td>

                                    Country:&nbsp;&nbsp;<br>{{ $customePayment->delivery_country }}
                                </td>
                                <td>
                                    First
                                    name:&nbsp;&nbsp;<br>{{ $customePayment->delivery_first_name }}
                                </td>

                                <td>
                                    Last
                                    name:&nbsp;&nbsp;<br>{{ $customePayment->delivery_last_name }}
                                </td>

                            </tr>
                            <tr>

                                <td>
                                    Company:&nbsp;&nbsp;<br>{{ $customePayment->delivery_company }}
                                </td>
                                <td colspan="2">
                                    Address:&nbsp;&nbsp;<br>{{ $customePayment->delivery_address }}
                                </td>
                                <td>
                                    Apartment:&nbsp;&nbsp;<br>{{ $customePayment->delivery_apartment }}
                                </td>


                            </tr>
                            <tr>
                                <td>
                                    City:&nbsp;&nbsp;<br>{{ $customePayment->delivery_city }}
                                </td>
                                <td>
                                    State:&nbsp;&nbsp;<br>{{ $customePayment->delivery_state }}
                                </td>

                                <td>
                                    ZIP
                                    code:&nbsp;&nbsp;<br>{{ $customePayment->delivery_zip_code }}
                                </td>
                                <td>
                                    Phone:&nbsp;&nbsp;<br>{{ $customePayment->delivery_phone }}
                                </td>
                            </tr>

                        </table>
                        <table>
                            <tr>
                                <h3>
                                    Payment
                                </h3>
                                <td>

                                    Account Holder
                                    Name:&nbsp;&nbsp;<br>{{ $customePayment->account_holder_name }}
                                </td>
                                <td>

                                    Price:&nbsp;&nbsp;<br>{{ $customePayment->price }}
                                </td>
                                <td>
                                    Quantity:&nbsp;&nbsp;<br>{{ $customePayment->total_quantity }}
                                </td>

                                <td>
                                    Total
                                    Price:&nbsp;&nbsp;<br>{{ $customePayment->payment }}
                                </td>

                            </tr>


                        </table>

                        <table>
                            <tr>
                                <h3>
                                    Billing Address
                                </h3>
                                <td>
                                    First
                                    name:&nbsp;&nbsp;<br>{{ $customePayment->billing_first_name }}
                                </td>
                                <td>

                                    Last
                                    name:&nbsp;&nbsp;<br>{{ $customePayment->billing_last_name }}
                                </td>
                                <td colspan="2">
                                    Address:&nbsp;&nbsp;<br>{{ $customePayment->billing_address }}
                                </td>



                            </tr>
                            <tr>

                                <td>
                                    Apartment:&nbsp;&nbsp;<br>{{ $customePayment->billing_apartment }}
                                </td>
                                <td>

                                    City:&nbsp;&nbsp;<br>{{ $customePayment->billing_city }}
                                </td>
                                <td>


                                    State:&nbsp;&nbsp;<br>{{ $customePayment->billing_state }}
                                </td>

                                <td>


                                    ZIP code:&nbsp;&nbsp;<br>{{ $customePayment->billing_zip_code }}
                                </td>



                            </tr>


                        </table>
                        @endif
                        @endforeach

                    </div>
                    
                  
                
                    
                    
                     <a href="{{ route('download.pdf') }}" class="pdf-download-btn">Download PDF</a>
                     <!--{{$productId}}-->
                 <!--<a href="{{ route('download.pdf', $productId) }}" class="pdf-download-btn">Download PDF</a>-->
                
                     
                     
                     
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