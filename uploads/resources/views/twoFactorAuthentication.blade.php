<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Dashboard</title>
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
    <link href="assets/csslogin/icons.min.css" rel="stylesheet" type="text/css" />


    <style>
    .container {
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
    }

    .form-control {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
    </style>
</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">










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
                        <a href="{{route('dashboard')}}" class="side-nav-link">
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



                    <li class="side-nav-item">
                        <a href="{{route('directory')}}" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Directory </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li>

                    <li class="side-nav-item">
                        <a href="{{route('update_directory')}}" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>UpDate Directory </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li>



                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#" aria-expanded="false" aria-controls="#"
                            class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span> Addresses </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li>


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

                                        <li class="breadcrumb-item active">Two Factor Authentication!</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Welcome!</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->


                    <!-- ==========MyOwndashboard============== -->


                    <div class="Dash-main-heading"
                        style="background-image: url(./assets/images/dash-bg-logo.png); background-repeat: no-repeat; background-size: contain; background-position: center;  height: 350px; width: 600px; padding-top: 100px; margin-left: 200px;">


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

                        <!-- Two-Factor Authentication Enable Form -->
                        <div class="container">
                            <h2>Enable Two-Factor Authentication</h2>
                            <form action="{{ route('enable.twoFactor') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="two_factor_type">Select Two-Factor Authentication Method:</label>
                                    <div>
                                        <input type="radio" id="email" name="two_factor_type" value="email"
                                            onclick="showInputField('email')" required>
                                        <label for="email">Enable 2FA via Email</label>
                                    </div>
                                    <div>
                                        <input type="radio" id="phone" name="two_factor_type" value="phone"
                                            onclick="showInputField('phone')" required>
                                        <label for="phone">Enable 2FA via Phone</label>
                                    </div>
                                </div>

                                <!-- Email input field -->
                                <div class="form-group" id="emailField" style="display: none;">
                                    <label for="email_input">Email:</label>
                                    <input type="email" id="email_input" name="email" placeholder="Enter your email"
                                        class="form-control">
                                </div>

                                <!-- Phone number input field -->
                                <div class="form-group" id="phoneField" style="display: none;">
                                    <label for="phone_number">Phone Number:</label>
                                    <input type="text" id="phone_number" name="phone_number"
                                        placeholder="Enter your phone number" class="form-control">
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Enable Two-Factor
                                        Authentication</button>
                                </div>
                            </form>
                        </div>




                    </div>

                </div>

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
                            <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                                value="fixed">
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

    <!-- Daterangepicker js -->
    <script src="assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>

    <!-- Apex Charts js -->
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>

    <!-- Vector Map js -->
    <script src="assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Dashboard App js -->
    <script src="assets/js/pages/dashboard.js"></script>


    <!-- App js -->
    <script src="assets/js/app.min.js"></script>








    <!-- JavaScript for Conditional Field Display -->
    <script>
    function showInputField(selectedOption) {
        // Hide both fields initially
        document.getElementById('emailField').style.display = 'none';
        document.getElementById('phoneField').style.display = 'none';

        // Show the selected field based on the option chosen
        if (selectedOption === 'email') {
            document.getElementById('emailField').style.display = 'block';
        } else if (selectedOption === 'phone') {
            document.getElementById('phoneField').style.display = 'block';
        }
    }
    </script>

</body>

</html>