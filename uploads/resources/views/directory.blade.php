<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Directory</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- App favicon -->
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/Logo767.png">

    <!-- Theme Config Js -->
    <script src="assets/js/config.js"></script>

    <!-- App css -->
    <link href="assets/logincss/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="assets/logincss/icons.min.css" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="assets/logincss/d-directory.css">


</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">







        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">

            <!-- Brand Logo Light -->
            <a href="index.html" class="logo logo-light">
                <span class="logo-lg">
                    <img src="assets/images/whitelogo2.png" alt="logo"
                        style="height:120px; width: 120px; margin-top: 10px;">
                </span>
                <span class="logo-sm">
                    <img src="./assets/images/logo-sm.png" alt="small logo">
                </span>
            </a>

            <!-- Brand Logo Dark -->
            <a href="index.html" class="logo logo-dark">
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




                    <li class="side-nav-item">
                        <a href="{{route('your_order')}}" class="side-nav-link">
                            <!-- Change 'your-page.html' to your actual page link -->
                            <i class="ri-donut-chart-fill"></i>
                            <span>Your Orders</span>
                        </a>
                    </li>



                    <li class="side-nav-item">
                        <a href="{{route('directory')}}" class="side-nav-link">
                            <!-- Change 'your-page.html' to your actual page link -->
                            <i class="ri-donut-chart-fill"></i>
                            <span>Directory</span>
                        </a>
                    </li>


                    <li class="side-nav-item">
                        <a href="{{ route('update_directory') }}" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>UpDate Directory</span>
                        </a>
                    </li>



                    <!-- <li class="side-nav-item">
                        <a href="#" aria-controls="#" class="side-nav-link">
                            <i class="ri-donut-chart-fill"></i>
                            <span>UpDate Directory </span>
                            <span class="menu-arrow"></span>
                        </a>

                    </li> -->





                    <!-- <li class="side-nav-item">
                            <a href="#" class="side-nav-link"> 
                                <i class="ri-donut-chart-fill"></i>
                                <span>addresses</span>
                            </a>
                        </li> -->


                    <li class="side-nav-item">
                        <a href="{{route('edit-account')}}" class="side-nav-link">
                            <!-- Change 'your-page.html' to your actual page link -->
                            <i class="ri-donut-chart-fill"></i>
                            <span>Account details</span>
                        </a>
                    </li>



                    <li class="side-nav-item"></li>
                    <a href="{{route('index')}}" class="side-nav-link">
                        <!-- Change 'your-page.html' to your actual page link -->
                        <i class="ri-donut-chart-fill"></i>
                        <span>Logout</span>
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








                    <!-- ==========MyOwndashboard============== -->




                    <div class="directory-form">
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form method="POST" action="{{route('directory_store')}}" enctype="multipart/form-data">
                            <!-- Form fields as described previously -->
                            @csrf

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="businessName">Professional or Business Name*:</label>
                                    <input type="text" id="businessName" required name="business_name">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail*:</label>
                                    <input type="email" id="email" required name="email">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="cellNumber">Phone Number:</label>
                                    <input type="tel" id="cellNumber" name="cell_number">
                                </div>
                                <!-- <div class=" form-group">
                                    <label for="workNumber">Work Number:</label>
                                    <input type="tel" id="workNumber" name="work_number">
                                </div> -->
                            </div>

                            <div class=" form-row">
                                <div class="form-group">
                                    <label for="industry">Industry*:</label>
                                    <select id="industry" required name="industry">
                                        <option value="">Select Industry</option>
                                        <option value="Arts/ Music/Entertainment">Arts/ Music/Entertainment</option>
                                        <option value="Automotive/Transportation">Automotive/Transportation</option>
                                        <option value="Business Administration/Office">Business
                                            Administration/Office
                                        </option>
                                        <option value="Biotech/Science/Life Science">Biotech/Science/Life Science
                                        </option>
                                        <option value="Construction/Plumbing/ Mining">Construction/Plumbing/ Mining
                                        </option>
                                        <option value="Cosmetic/Beauty/Barber">Cosmetic/Beauty/Barber</option>
                                        <option value="Customer Service/ Consumer Goods & Services">Customer
                                            Service/
                                            Consumer Goods & Services</option>
                                        <option value="Education/ Professional/Scientific">Education/
                                            Professional/Scientific</option>
                                        <option value="Food Services/Beverage">Food Services/Beverage</option>
                                        <option value="General Labor/Warehouse">General Labor/Warehouse</option>
                                        <option value="Government/Non-Profit">Government/Non-Profit</option>
                                        <option value="Graphic Design/Media Design">Graphic Design/Media Design
                                        </option>
                                        <option value="Healthcare/Social Assistance/Medical">Healthcare/Social
                                            Assistance/Medical</option>
                                        <option value="Human Resource/Marketing/PR/Advertising">Human
                                            Resource/Marketing/PR/Advertising</option>
                                        <option value="Hospitality/Tourism/Accommodation">
                                            Hospitality/Tourism/Accommodation</option>
                                        <option value="Legal/Paralegal">Legal/Paralegal</option>
                                        <option value="Manufacturing/ Industrial Machinery/ Gas/ Chemicals">
                                            Manufacturing/ Industrial Machinery/ Gas/ Chemicals</option>
                                        <option value="Real Estate/Rental/Leasing">Real Estate/Rental/Leasing
                                        </option>
                                        <option value="Retail/Wholesale/Trade">Retail/Wholesale/Trade</option>
                                        <option value="Sales/Business Development">Sales/Business Development
                                        </option>
                                        <option value="Salon/Spa/Fitness">Salon/Spa/Fitness</option>
                                        <option value="Security">Security</option>
                                        <option value="Skills/Trade/Craft/Utilities">Skills/Trade/Craft/Utilities
                                        </option>
                                        <option value="Technology/ Technical Support/Web">Technology/ Technical
                                            Support/Web</option>
                                        <option value="TV/Film/Video">TV/Film/Video</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="website">Website:</label>
                                    <input type="url" id="website" name="website" value="https://www.">
                                </div>
                            </div>

                            <div class=" form-row">
                                <div class="form-group">
                                    <label for="education">Education:</label>
                                    <select id="education" name="education">
                                        <option value="">Select Education</option>
                                        <option value="Doctorate">Doctorate</option>
                                        <option value="Master’s Degree">Master’s Degree</option>
                                        <option value="Associates Degree">Associates Degree</option>
                                        <option value="Professional Certificate">Professional Certificate
                                        </option>
                                        <option value="High School Diploma">High School Diploma</option>
                                        <option value=" Primary School"> Primary School</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience*:</label>
                                    <select id="experience" required name="experience">
                                        <option value="">Select Experience</option>
                                        <option value="0-5">0-5</option>
                                        <option value="5-10">5-10</option>
                                        <option value="10-20">10-20</option>
                                        <option value="20+">20+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="country">Country*:</label>
                                    <select id="country" onchange="updateStates()" required name="country">
                                        <option value="">Select Country</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic">Central African Republic
                                        </option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Macedonia">North Macedonia</option>
                                        <option value="Norway">Norway</option>
                                        <option value="Oman">Oman</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Portugal">Portugal</option>
                                        <option value="Qatar">Qatar</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="KSA">KSA</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="UAE">UAE</option>
                                        <option value="UK">UK</option>
                                        <option value="US">US</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="VaticanCity">Vatican City</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        <option value="Wales">Wales</option>
                                        <option value="WesternSahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>



                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <select id="state" required name="state">
                                        <option value="">Select State</option>
                                        <option value="state1">Select State1</option>
                                        <option value="state2">Select State2</option>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">City*:</label>
                                    <input type="text" id="city" required name="city">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="streetAddress">Building Number:</label>
                                <textarea id="streetAddress" rows="2" name="building_number" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="streetAddress">Street Name:</label>
                                <textarea id="streetAddress" rows="2" name="street_address"></textarea>
                            </div>

                            <div class=" form-group">
                                <label for="goodsServices">Description of Goods or Services Provided:</label>
                                <textarea id="goodsServices" rows="2" name="goods_services"></textarea>
                            </div>



                            <div class="form-group">
                                <label for="fileInput" class="custom-file-label">Choose Profile Picture</label>
                                <input type="file" id="fileInput" name="logo" class="custom-file-input">

                            </div>







                            <button class="form-btn"> Save </button>

                        </form>
                    </div>

                    <!-- Link to the external JavaScript file -->
                    <script src="assets/js/directoryForm.js"></script>










                    <!-- ==========MyOwndashboard============== -->





















                </div> <!-- content -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- <div class="col-12 text-center">
                                <script>document.write(new Date().getFullYear())</scrip></b>
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

        <!-- Apex Charts js -->
        <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
        <script src="assets/vendor/daterangepicker/moment.min.js"></script>

        <!-- Apex Chart Area Demo js -->
        <script src="../../samples/assets/stock-prices.js"></script>
        <script src="../../samples/assets/series1000.js"></script>
        <script src="../../samples/assets/github-data.js"></script>
        <script src="../../samples/assets/irregular-data-series.js"></script>
        <!-- Apex Chart Candlestick Demo js -->
        <script src="../../samples/assets/ohlc.js"></script>
        <script src="../../ajax/libs/dayjs/1.8.17/dayjs.min.js"></script>

        <script src="assets/js/pages/apex.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.min.js"></script>
</body>

</html>