<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Custom Orders</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/admin_deshboard/images/dash-bg-logo.png">

    <!-- Theme Config Js -->
    <script src="assets/admin_deshboard/js/config.js"></script>

    <!-- App css -->
    <link href="assets/admin_deshboard/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />
    <link href="assets/admin_deshboard/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/admin_deshboard/css/icons.min.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">






    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>




    <link rel="stylesheet" href="assets/css/custom-orders.css">
</head>

<body>




    <!-- Begin page -->
    <div class="wrapper">




        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu" style="background-color: #000;">

            <!-- Brand Logo Light -->
            <a href="#" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/whitelogo2.png" alt="logo"
                        style="height:120px; width: 120px; margin-top: 10px;">
                </span>
                <span class="logo-sm">
                    <img src="./assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="#" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="./assets/images/logo-dark.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Admin</li>

                    <li class="side-nav-item">
                        <a href="{{route('admin_dashboard')}}" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <!-- <span class="badge bg-success float-end">9+</span> -->
                            <span> Dashboard </span>
                        </a>
                    </li>




                    <li class="side-nav-item">
                        <a href="{{route('vendor_data')}}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>User Details</span>
                        </a>
                    </li>



                    <li class="side-nav-item">
                        <a href="{{route('admin_listing')}}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>Listing</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('custome_order')}}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>Custom Order</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('create_product')}}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>Add Product</span>
                        </a>
                    </li>








                    <li class="side-nav-item">
                        <a href="{{route('index')}}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>logout </span>
                        </a>
                    </li>








                </ul>


                <!--- End Sidemenu -->

                <div class="clearfix"></div>
            </div>
        </div>
        <!-- ========== Left Sidebar End ========== -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <div class="content">
                @foreach($products as $product)
                @php

                $productCustomerId = $product->customer_id;
                @endphp
                <!-- Start Content-->
                <div class="container-fluid">








                    <!-- ==========MyOwndashboard============== -->


                    <!-- Main Section Starts-->


                    <div class="cart-heading">

                        <p>Orders</p>

                    </div>



                    <div class="p-list-headings">

                        @foreach($customePayments as $customePayment)
                        @if($customePayment->customer_id == $productCustomerId)

                        <div class="p-h">
                            <p>Price :Price:&nbsp;&nbsp;<br>{{ $customePayment->price }}</p>
                        </div>

                        <div class="p-h">
                            <p>Quantity :&nbsp;&nbsp;<br>{{ $customePayment->total_quantity }}</p>
                        </div>

                        <div class="p-h">
                            <p>Total Price::&nbsp;&nbsp;<br>{{ $customePayment->payment }}</p>
                        </div>
                        @endif
                        @endforeach


                    </div>

                    <div class="content-area">
                        <div class="product-info">
                            <div class="img-div">
                                <img src="./assets/d-shirt.jpg" alt="" style="width: 60px; margin-top: 20px;">
                            </div>
                            <div class="info-div">




                                <h3 class="t-headings">CUSTOM SOCCER JERSEY</h3>
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


                                <div class="table-flex" style="display: block;">


                                    <h3 class="t-headings">ROSTER INFORMATION</h3>
                                    <div class="flex-container">


                                        <div class="roster-info">
                                            <h4 class="t-headings">KIT INFORMATION</h4>

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






                                        <div class="staff-info">
                                            <h4 class="t-headings">STAFF KIT INFORMATION</h4>
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

                                        <!-- payment table -->
                                        <div class="staff-info">
                                            <h4 class="t-headings">PAYMENT INFORMATION</h4>
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
                                        <!-- end payment table -->
                                    </div>

                                    <!-- <p class="R-delievery-p">RUSH DELIVERY: No</p> -->
                                </div>

                            </div>
                        </div>




                    </div>
                    <br>

                    <!-- <button onclick="downloadData()" class="download-button">Download Data</button> -->
                    <a href="{{ route('download.pdf') }}" class="btn btn-primary">Download PDF</a>
                    <hr>


                    <!-- Main Section Ends-->



                    <!-- ==========MyOwndashboard============== -->


                </div> <!-- content -->
                @endforeach






                <!-- Footer Start -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- <div class="col-12 text-center">
                                    <script>document.write(new Date().getFullYear())</script></b>
                                </div> -->
                        </div>
                    </div>
                </footer>

                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>

        <!-- END wrapper -->

        <!-- Theme Settings -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="theme-settings-offcanvas">
            <div class="d-flex align-items-center bg-primary p-3 offcanvas-header">
                <h5 class="text-white m-0">Theme Settings</h5>
                <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>

            <div class="offcanvas-body p-0">
                <div data-simplebar class="h-100">
                    <div class="p-3">
                        <h5 class="mb-3 fs-16 fw-bold">Color Scheme</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme"
                                        id="layout-color-light" value="light">
                                    <label class="form-check-label" for="layout-color-light">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-bs-theme"
                                        id="layout-color-dark" value="dark">
                                    <label class="form-check-label" for="layout-color-dark">
                                        <img src="assets/images/layouts/dark.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>

                        <div id="layout-width">
                            <h5 class="my-3 fs-16 fw-bold">Layout Mode</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                            id="layout-mode-fluid" value="fluid">
                                        <label class="form-check-label" for="layout-mode-fluid">
                                            <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Fluid</h5>
                                </div>

                                <div class="col-4">
                                    <div id="layout-boxed">
                                        <div class="form-check form-switch card-switch mb-1">
                                            <input class="form-check-input" type="checkbox" name="data-layout-mode"
                                                id="layout-mode-boxed" value="boxed">
                                            <label class="form-check-label" for="layout-mode-boxed">
                                                <img src="assets/images/layouts/boxed.png" alt="" class="img-fluid">
                                            </label>
                                        </div>
                                        <h5 class="font-14 text-center text-muted mt-2">Boxed</h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="my-3 fs-16 fw-bold">Topbar Color</h5>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                        id="topbar-color-light" value="light">
                                    <label class="form-check-label" for="topbar-color-light">
                                        <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                            </div>

                            <div class="col-4">
                                <div class="form-check form-switch card-switch mb-1">
                                    <input class="form-check-input" type="checkbox" name="data-topbar-color"
                                        id="topbar-color-dark" value="dark">
                                    <label class="form-check-label" for="topbar-color-dark">
                                        <img src="assets/images/layouts/topbar-dark.png" alt="" class="img-fluid">
                                    </label>
                                </div>
                                <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                            </div>
                        </div>

                        <div>
                            <h5 class="my-3 fs-16 fw-bold">Menu Color</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-menu-color"
                                            id="leftbar-color-light" value="light">
                                        <label class="form-check-label" for="leftbar-color-light">
                                            <img src="assets/images/layouts/sidebar-light.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Light</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-menu-color"
                                            id="leftbar-color-dark" value="dark">
                                        <label class="form-check-label" for="leftbar-color-dark">
                                            <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Dark</h5>
                                </div>
                            </div>
                        </div>

                        <div id="sidebar-size">
                            <h5 class="my-3 fs-16 fw-bold">Sidebar Size</h5>

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                            id="leftbar-size-default" value="default">
                                        <label class="form-check-label" for="leftbar-size-default">
                                            <img src="assets/images/layouts/light.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Default</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                            id="leftbar-size-compact" value="compact">
                                        <label class="form-check-label" for="leftbar-size-compact">
                                            <img src="assets/images/layouts/compact.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Compact</h5>
                                </div>

                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                            id="leftbar-size-small" value="condensed">
                                        <label class="form-check-label" for="leftbar-size-small">
                                            <img src="assets/images/layouts/sm.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Condensed</h5>
                                </div>


                                <div class="col-4">
                                    <div class="form-check form-switch card-switch mb-1">
                                        <input class="form-check-input" type="checkbox" name="data-sidenav-size"
                                            id="leftbar-size-full" value="full">
                                        <label class="form-check-label" for="leftbar-size-full">
                                            <img src="assets/images/layouts/full.png" alt="" class="img-fluid">
                                        </label>
                                    </div>
                                    <h5 class="font-14 text-center text-muted mt-2">Full Layout</h5>
                                </div>
                            </div>
                        </div>

                        <div id="layout-position">
                            <h5 class="my-3 fs-16 fw-bold">Layout Position</h5>

                            <div class="btn-group checkbox" role="group">
                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-fixed" value="fixed">
                                <label class="btn btn-soft-primary w-sm" for="layout-position-fixed">Fixed</label>

                                <input type="radio" class="btn-check" name="data-layout-position"
                                    id="layout-position-scrollable" value="scrollable">
                                <label class="btn btn-soft-primary w-sm ms-0"
                                    for="layout-position-scrollable">Scrollable</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="offcanvas-footer border-top p-3 text-center">
                <div class="row">
                    <div class="col-6">
                        <button type="button" class="btn btn-light w-100" id="reset-layout">Reset</button>
                    </div>
                    <div class="col-6">
                        <a href="" target="_blank" role="button" class="btn btn-primary w-100">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>




        <!-- Vendor js -->
        <script src="assets/js/vendor.min.js"></script>

        <!-- Chart.js js -->
        <script src="assets/vendor/chart.js/chart.min.js"></script>

        <!-- Chart.js Area Demo js -->
        <script src="assets/js/pages/chartjs-area.init.js"></script>
        <!-- Chart.js Bar Demo js -->
        <script src="assets/js/pages/chartjs-bar.init.js"></script>
        <!-- Chart.js Line Demo js -->
        <script src="assets/js/pages/chartjs-line.init.js"></script>
        <!-- Chart.js Other Demo js -->
        <script src="assets/js/pages/chartjs-other.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>

</body>

</html>