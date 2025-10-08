<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/Logo767.png">

    <!-- Daterangepicker css -->
    <link rel="stylesheet" href="assets/vendor/daterangepicker/daterangepicker.css">

    <!-- Vector Map css -->
    <link rel="stylesheet" href="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/logincss/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->

    <!-- Icons css -->
    <link href="assets/logincss/icons.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">
        <div class="Dashboardhamburger" onclick="toggleSidebar()">☰</div>

        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">


            <!-- Brand Logo Light -->
            <a href="#" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/whitelogo2.png" alt="logo" style="height:120px; width: 120px;">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/whitelogo2.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="#" class="logo logo-dark">
                <span class="logo-lg">
                    <img src="assets/images/logo-dark.png" alt="dark logo">
                </span>
                <span class="logo-sm">
                    <img src="assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Sidebar -left -->
            <div class="h-100" id="leftside-menu-container" data-simplebar>
                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title">Vendor</li>

                    <li class="side-nav-item">
                        <a href=" {{route('dashboard')}}" class="side-nav-link">
                            <i class="ri-dashboard-3-line"></i>
                            <!-- <span class="badge bg-success float-end">9+</span> -->
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <!-- ========================= -->


                    <li class="side-nav-item">
                        <a href="{{route('your_order')}}" aria-expanded="false" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Your Orders </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li>



                    <!-- <li class="side-nav-item">
                        <a href="{{route('directory')}}" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Directory </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li> -->

                    <li class="side-nav-item">
                        <a href="{{route('update_directory')}}" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>Update Directory </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li>

                    <!-- <li class="side-nav-item">
                        <a href="{{route('TwoFactorAuthenticationDisplay')}}" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>Two Factor Authentication</span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li> -->
                    <!-- <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="#"
                            class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Addresses </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li> -->


                    <li class="side-nav-item">
                        <a href="{{route('edit-account')}}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Account Details </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li>


                    <li class="side-nav-item">
                        <a href="{{route('index')}}" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>
                                Logout
                            </span>
                            <span class="menu-arrow"></span>
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

                <!-- Start Content-->
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li> -->
                                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li> -->
                                        <li class="breadcrumb-item active">Welcome!</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Welcome!</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <!-- ==========MyOwndashboard============== -->


                    <div class="Dash-main-heading">


                        <h1 style="font-family: 'Rubik', sans-serif;
                    color: #000000;
                    font-size: 40px;
                    margin-top: 40px;
                    text-transform: uppercase;
                    text-align: center;">Get Connected</h1>


                        <p style="font-family: 'Rubik', sans-serif;
                    color: #000;
                    font-size: 25px;
                     font-weight: 500; 
                    margin-top: 10px;
                    text-align: center;
                    ">Register Business/Professional</p>

                    </div>


                    <div class="dash-detail" style="padding: 50px;">


                        <p style="font-size: 17px;">Hello {{ $user->BusinessName}} <a href="{{route('index')}}">Log
                                out</a>
                        </p>
                        <p style="font-size: 17px;">From your account dashboard you can view your <a href="#">recent
                                orders</a>, manage your<a href="#">shipping and billing addresses</a> , and <a
                                href="#">edit your password and account details</a>.</p>

                    </div>


                    <!-- ==========MyOwndashboard============== -->









                    <!-- 
                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-eye-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Daily Visits</h6>
                                        <h2 class="my-2">8,652</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">2.97%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div>  -->

                    <!-- end col-->

                    <!-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-wallet-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Revenue</h6>
                                        <h2 class="my-2">$9,254.62</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">18.25%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div>   -->

                    <!-- end col-->

                    <!-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-shopping-basket-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Orders</h6>
                                        <h2 class="my-2">753</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-25 me-1">-5.75%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> -->

                    <!-- end col-->

                    <!-- <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-group-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                                        <h2 class="my-2">63,154</h2>
                                        <p class="mb-0">
                                            <span class="badge bg-white bg-opacity-10 me-1">8.21%</span>
                                            <span class="text-nowrap">Since last month</span>
                                        </p>
                                    </div>
                                </div>
                            </div> -->

                    <!-- end col-->
                </div>

            </div>
            <!-- end card-->
        </div>

    </div>



    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center">
                    <script>
                    document.write(new Date().getFullYear())
                    </script> © Copyright NY Creative Studio All Rights Reserved
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

    </div>




    <!-- END wrapper -->

    <!-- Theme Settings -->


    <!-- Vendor js -->
    <!-- <script src="assets/js/vendor.min.js"></script> -->

    <!-- Daterangepicker js -->
    <!-- <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script> -->

    <!-- Apex Charts js -->
    <!-- <script src="assets/vendor/apexcharts/apexcharts.min.js"></script> -->

    <!-- Vector Map js -->
    <!-- <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script> -->

    <!-- Dashboard App js -->
    <script src="assets/js/pages/dashboard.js"></script>


    <!-- App js -->
    <!-- <script src="assets/js/app.min.js"></script> -->



    <script>
    function toggleSidebar() {
        var sidebar = document.querySelector('.leftside-menu');
        sidebar.classList.toggle('active'); // Toggle the active class on sidebar
    }
    </script>

</body>

</html>