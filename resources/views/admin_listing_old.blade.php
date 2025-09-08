<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Listing</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/admin_deshboard/images/Logo767.png">

    <!-- Theme Config Js -->
    <script src="assets/admin_deshboard/js/config.js"></script>

    <!-- App css -->
    <link href="assets/admin_deshboard/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/admin_deshboard/css/icons.min.css" rel="stylesheet" type="text/css" />

    <!-- listing page css -->
    <link rel="stylesheet" href="assets/admin_deshboard/css/listing.css">




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

                <div class="container">
                    <!-- Left Side: Upload Section -->
                    <div class="upload-section">


                        <form action="{{ route('directory.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" accept=".xlsx" required>
                            <button type="submit">Upload</button>
                        </form>
                    </div>

                    <!-- Right Side: Download Section -->
                    <div class="download-section">
                        <form action="{{ route('downloadxlsx') }}" method="GET">
                            @csrf
                            <button type="submit">Download Data</button>
                        </form>
                    </div>
                </div>

                <!-- Start Content-->
                <div class="container-fluid">






                    <div class="listing-container">
                        <!-- Row 1 -->
                        @if($directories->isNotEmpty())
                        @foreach($directories as $directory)
                        <div class="listing-row">
                            <!-- <div class="profile-picture-container">
                                <img src="{{ Storage::url('profile_pictures/' . $directory->profile_picture) }}"
                                    width="100" height="100" alt="Profile Picture">
                            </div> -->

                            <!-- @if($directory->profile_picture &&
                            Storage::disk('public')->exists($directory->profile_picture))
                            <img src="{{ Storage::url($directory->profile_picture) }}" width="100" height="100"
                                alt="Profile Picture">
                            @else
                            <div class="placeholder"
                                style="width: 100px; height: 100px; display: flex; justify-content: center; align-items: center; background-color: #d0d3cc; border-radius: 50%;">
                                <span style="font-size: 40px; color: red;">
                                    {{ strtoupper(substr($directory->BusinessName, 0, 1)) }}
                                </span>
                            </div>
                            @endif -->


                            <div class="profile-picture-container">
                                @if($directory->profile_picture &&
                                Storage::disk('public')->exists($directory->profile_picture))
                                <img src="{{ Storage::url($directory->profile_picture) }}" width="100" height="100"
                                    alt="Profile Picture">
                                @else
                                <div class="placeholder"
                                    style="width: 80px; height: 80px; display: flex; justify-content: center; align-items: center; background-color: #ddd; border-radius: 50%;">
                                    <span
                                        style="font-size: 24px; color: red;">{{ strtoupper(substr($directory->BusinessName, 0, 1)) }}</span>
                                </div>
                                @endif
                            </div>



                            <div class="details">
                                <div><strong>Business Name:</strong>
                                    <span>{{$directory->BusinessName }}</span>
                                </div>
                                <div><strong>Experience:</strong>
                                    <span>{{$directory->Experience}}</span>
                                </div>
                                <div><strong>Email:</strong> <span>{{$directory->Email}}</span></div>
                                <div><strong>Phone Number:</strong> <span>{{$directory->PhoneNumber}}</span></div>
                                <div><strong>Industry:</strong> <span>{{$directory->Industry}}</span></div>
                                <div><strong>Goods/Services Provided:</strong>
                                    <span>{{$directory->GoodsServices}}</span>
                                </div>
                                <div><strong>Website:</strong> <span>
                                        <a href="{{$directory->website}}">{{$directory->Website}}

                                        </a>
                                    </span>
                                </div>
                                <div><strong>Country:</strong> <span>{{$directory->Country}}</span></div>
                                <div><strong>State:</strong> <span>{{$directory->State}}</span></div>
                                <div><strong>City:</strong> <span>{{$directory->City}}</span></div>
                                <div><strong>Building Number:</strong> <span>{{$directory->BuildingNumber}}</span>
                                </div>
                                <div><strong>Street Name:</strong> <span>{{$directory->StreetName}}</span></div>

                            </div>
                            <form action="{{ route('admin_listing.delete', $directory->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this entry?');">
                                @csrf
                                @method('DELETE')
                                <button class="delete-btn">Delete</button>
                            </form>
                        </div>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="14">No records found</td>
                        </tr>
                        @endif

                        <!-- Row 2 (Duplicate and customize as needed) -->

                    </div>


                    <!-- <script>
                    // Select all delete buttons
                    const deleteButtons = document.querySelectorAll('.delete-btn');

                    // Loop through all buttons and add click event listeners
                    deleteButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            // Find the parent row (listing-row) and remove it
                            const row = button.closest('.listing-row');
                            row.remove();
                        });
                    });
                    </script> -->



                    <!-- ==========MyOwndashboard============== -->





















                </div> <!-- content -->

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