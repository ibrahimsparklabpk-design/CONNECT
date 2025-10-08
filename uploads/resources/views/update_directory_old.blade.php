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
      <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">


</head>

<body>
    <!-- Begin page -->
    <div class="wrapper">







        <!-- ========== Left Sidebar Start ========== -->
        <div class="leftside-menu">
            
            <button id="hamburger-icon" class="hamburger">
        ☰
    </button>

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



                    <!-- <li class="side-nav-item">
                        <a href="{{route('directory')}}" class="side-nav-link">

                            <i class="ri-donut-chart-fill"></i>
                            <span>Directory</span>
                        </a>
                    </li> -->


                    <li class="side-nav-item">
                        <a href="{{ route('update_directory') }}" class="side-nav-link">

                            <i class="ri-donut-chart-fill"></i>
                            <span>Update Directory </span>
                        </a>
                    </li>


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


                        <form method="POST" action="{{ route('update-user-directory') }}" enctype="multipart/form-data">
                            @csrf
                            @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @elseif(session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif

                            <!-- Form fields as described previously -->

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="businessName">Professional or Business Name*:</label>
                                    <input type="text" id="businessName" name="business_name"
                                        value="{{ $userDirectoryData->BusinessName}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail*:</label>
                                    <input type="email" id="email" name="email" value="{{ $userDirectoryData->Email}}">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="cellNumber">Phone Number:</label>
                                    <input type="tel" id="cellNumber" name="cell_number"
                                        value="{{ $userDirectoryData->PhoneNumber}}">
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

                                        <option value="Arts/ Music/Entertainment"
                                            {{ $userDirectoryData->Industry == 'Arts/ Music/Entertainment' ? 'selected' : '' }}>
                                            Arts/ Music/Entertainment</option>
                                            
                                        <option value="Automotive/Transportation"
                                            {{ $userDirectoryData->Industry== 'Automotive/Transportation' ? 'selected' : '' }}>
                                            Automotive/Transportation</option>
                                            
                                            
                                        <option value="Business Administration/Office"
                                            {{ $userDirectoryData->Industry == 'Business Administration/Office' ? 'selected' : '' }}>
                                            Business Administration/Office</option>
                                            
                                            
                                            
                                        <option value="Biotech/Science/Life Science"
                                            {{ $userDirectoryData->Industry == 'Biotech/Science/Life Science' ? 'selected' : '' }}>
                                            Biotech/Science/Life Science</option>
                                        <option value="Construction/Plumbing/ Mining"
                                            {{ $userDirectoryData->Industry == 'Construction/Plumbing/ Mining' ? 'selected' : '' }}>
                                            Construction/Plumbing/ Mining</option>
                                        <option value="Cosmetic/Beauty/Barber"
                                            {{ $userDirectoryData->Industry == 'Cosmetic/Beauty/Barber' ? 'selected' : '' }}>
                                            Cosmetic/Beauty/Barber</option>
                                        <option value="Customer Service/ Consumer Goods & Services"
                                            {{ $userDirectoryData->Industry == 'Customer Service/ Consumer Goods & Services' ? 'selected' : '' }}>
                                            Customer Service/ Consumer Goods & Services</option>
                                        <option value="Education/ Professional/Scientific"
                                            {{ $userDirectoryData->Industry == 'Education/ Professional/Scientific' ? 'selected' : '' }}>
                                            Education/ Professional/Scientific</option>
                                        <option value="Food Services/Beverage"
                                            {{ $userDirectoryData->Industry== 'Food Services/Beverage' ? 'selected' : '' }}>
                                            Food Services/Beverage</option>
                                        <option value="General Labor/Warehouse"
                                            {{ $userDirectoryData->Industry == 'General Labor/Warehouse' ? 'selected' : '' }}>
                                            General Labor/Warehouse</option>
                                        <option value="Government/Non-Profit"
                                            {{ $userDirectoryData->Industry == 'Government/Non-Profit' ? 'selected' : '' }}>
                                            Government/Non-Profit</option>
                                        <option value="Graphic Design/Media Design"
                                            {{ $userDirectoryData->Industry == 'Graphic Design/Media Design' ? 'selected' : '' }}>
                                            Graphic Design/Media Design</option>
                                        <option value="Healthcare/Social Assistance/Medical"
                                            {{ $userDirectoryData->Industry == 'Healthcare/Social Assistance/Medical' ? 'selected' : '' }}>
                                            Healthcare/Social Assistance/Medical</option>
                                        <option value="Human Resource/Marketing/PR/Advertising"
                                            {{ $userDirectoryData->Industry == 'Human Resource/Marketing/PR/Advertising' ? 'selected' : '' }}>
                                            Human Resource/Marketing/PR/Advertising</option>
                                        <option value="Hospitality/Tourism/Accommodation"
                                            {{ $userDirectoryData->Industry == 'Hospitality/Tourism/Accommodation' ? 'selected' : '' }}>
                                            Hospitality/Tourism/Accommodation</option>
                                        <option value="Legal/Paralegal"
                                            {{ $userDirectoryData->Industry == 'Legal/Paralegal' ? 'selected' : '' }}>
                                            Legal/Paralegal</option>
                                        <option value="Manufacturing/ Industrial Machinery/ Gas/ Chemicals"
                                            {{ $userDirectoryData->Industry == 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals' ? 'selected' : '' }}>
                                            Manufacturing/ Industrial Machinery/ Gas/ Chemicals</option>
                                        <option value="Real Estate/Rental/Leasing"
                                            {{ $userDirectoryData->Industry == 'Real Estate/Rental/Leasing' ? 'selected' : '' }}>
                                            Real Estate/Rental/Leasing</option>
                                        <option value="Retail/Wholesale/Trade"
                                            {{ $userDirectoryData->Industry == 'Retail/Wholesale/Trade' ? 'selected' : '' }}>
                                            Retail/Wholesale/Trade</option>
                                        <option value="Sales/Business Development"
                                            {{ $userDirectoryData->Industry == 'Sales/Business Development' ? 'selected' : '' }}>
                                            Sales/Business Development</option>
                                        <option value="Salon/Spa/Fitness"
                                            {{ $userDirectoryData->Industry == 'Salon/Spa/Fitness' ? 'selected' : '' }}>
                                            Salon/Spa/Fitness</option>
                                        <option value="Security"
                                            {{ $userDirectoryData->Industry == 'Security' ? 'selected' : '' }}>Security
                                        </option>
                                        <option value="Skills/Trade/Craft/Utilities"
                                            {{ $userDirectoryData->Industry == 'Skills/Trade/Craft/Utilities' ? 'selected' : '' }}>
                                            Skills/Trade/Craft/Utilities</option>
                                        <option value="Technology/ Technical Support/Web"
                                            {{ $userDirectoryData->Industry == 'Technology/ Technical Support/Web' ? 'selected' : '' }}>
                                            Technology/ Technical Support/Web</option>
                                        <option value="TV/Film/Video"
                                            {{ $userDirectoryData->Industry == 'TV/Film/Video' ? 'selected' : '' }}>
                                            TV/Film/Video</option>
                                    </select>

                                </div>
                                <div class="form-group">
                                    <label for="website">Website:</label>
                                    <input type="url" id="website" name="website"
                                        value="{{ $userDirectoryData->Website}}">
                                </div>
                            </div>

                            <div class=" form-row">
                                <div class="form-group">
                                    <label for="education">Education:</label>
                                    <select id="education" name="education">
                                        <option value="">Select Education</option>
                                        <option value="Doctorate"
                                            {{ $userDirectoryData->Education == 'Doctorate' ? 'selected' : '' }}>
                                            Doctorate</option>
                                        <option value="Master’s Degree"
                                            {{ $userDirectoryData->Education == 'Master’s Degree' ? 'selected' : '' }}>
                                            Master’s Degree</option>
                                        <option value="Associates Degree"
                                            {{ $userDirectoryData->Education == 'Associates Degree' ? 'selected' : '' }}>
                                            Associates Degree</option>
                                        <option value="Professional Certificate"
                                            {{ $userDirectoryData->Education == 'Professional Certificate' ? 'selected' : '' }}>
                                            Professional Certificate</option>
                                        <option value="High School Diploma"
                                            {{ $userDirectoryData->Education == 'High School Diploma' ? 'selected' : '' }}>
                                            High School Diploma</option>
                                        <option value="Primary School"
                                            {{ $userDirectoryData->Education == 'Primary School' ? 'selected' : '' }}>
                                            Primary School</option>
                                        <option value="Other"
                                            {{ $userDirectoryData->Education == 'Other' ? 'selected' : '' }}>
                                            Other</option>
                                    </select>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="experience">Experience*:</label>
                                    <select id="experience" required name="experience">
                                        <option value="">Select Experience</option>
                                        <option value="0-5"
                                            {{ $userDirectoryData->Experience == '0-5' ? 'selected' : '' }}>0-5</option>
                                        <option value="5-10"
                                            {{ $userDirectoryData->Experience == '5-10' ? 'selected' : '' }}>5-10
                                        </option>
                                        <option value="10-20"
                                            {{ $userDirectoryData->Experience == '10-20' ? 'selected' : '' }}>10-20
                                        </option>
                                        <option value="20+"
                                            {{ $userDirectoryData->Experience == '20+' ? 'selected' : '' }}>20+</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="country">Country*:</label>


                                    <select id="country" onchange="updateStates()" required name="country">
                                        <option value="">Select Country</option>

                                        <option value="Afghanistan"
                                            {{ $userDirectoryData->Country == 'Afghanistan' ? 'selected' : '' }}>
                                            Afghanistan</option>
                                        <option value="Albania"
                                            {{ $userDirectoryData->Country == 'Albania' ? 'selected' : '' }}>Albania
                                        </option>
                                        <option value="Algeria"
                                            {{ $userDirectoryData->Country == 'Algeria' ? 'selected' : '' }}>Algeria
                                        </option>
                                        <option value="Andorra"
                                            {{ $userDirectoryData->Country == 'Andorra' ? 'selected' : '' }}>Andorra
                                        </option>
                                        <option value="Angola"
                                            {{ $userDirectoryData->Country == 'Angola' ? 'selected' : '' }}>Angola
                                        </option>
                                        <option value="Antigua and Barbuda"
                                            {{ $userDirectoryData->Country == 'Antigua and Barbuda' ? 'selected' : '' }}>
                                            Antigua and Barbuda</option>
                                        <option value="Argentina"
                                            {{ $userDirectoryData->Country == 'Argentina' ? 'selected' : '' }}>Argentina
                                        </option>
                                        <option value="Armenia"
                                            {{ $userDirectoryData->Country == 'Armenia' ? 'selected' : '' }}>Armenia
                                        </option>
                                        <option value="Australia"
                                            {{ $userDirectoryData->Country == 'Australia' ? 'selected' : '' }}>Australia
                                        </option>
                                        <option value="Austria"
                                            {{ $userDirectoryData->Country == 'Austria' ? 'selected' : '' }}>Austria
                                        </option>
                                        <option value="Azerbaijan"
                                            {{ $userDirectoryData->Country == 'Azerbaijan' ? 'selected' : '' }}>
                                            Azerbaijan</option>
                                        <option value="Bahamas"
                                            {{ $userDirectoryData->Country == 'Bahamas' ? 'selected' : '' }}>Bahamas
                                        </option>
                                        <option value="Bahrain"
                                            {{ $userDirectoryData->Country == 'Bahrain' ? 'selected' : '' }}>Bahrain
                                        </option>
                                        <option value="Bangladesh"
                                            {{ $userDirectoryData->Country == 'Bangladesh' ? 'selected' : '' }}>
                                            Bangladesh</option>
                                        <option value="Barbados"
                                            {{ $userDirectoryData->Country == 'Barbados' ? 'selected' : '' }}>Barbados
                                        </option>
                                        <option value="Belarus"
                                            {{ $userDirectoryData->Country == 'Belarus' ? 'selected' : '' }}>Belarus
                                        </option>
                                        <option value="Belgium"
                                            {{ $userDirectoryData->Country == 'Belgium' ? 'selected' : '' }}>Belgium
                                        </option>
                                        <option value="Belize"
                                            {{ $userDirectoryData->Country == 'Belize' ? 'selected' : '' }}>Belize
                                        </option>
                                        <option value="Benin"
                                            {{ $userDirectoryData->Country == 'Benin' ? 'selected' : '' }}>Benin
                                        </option>
                                        <option value="Bhutan"
                                            {{ $userDirectoryData->Country == 'Bhutan' ? 'selected' : '' }}>Bhutan
                                        </option>
                                        <option value="Bolivia"
                                            {{ $userDirectoryData->Country == 'Bolivia' ? 'selected' : '' }}>Bolivia
                                        </option>
                                        <option value="Bosnia and Herzegovina"
                                            {{ $userDirectoryData->Country == 'Bosnia and Herzegovina' ? 'selected' : '' }}>
                                            Bosnia and Herzegovina</option>
                                        <option value="Botswana"
                                            {{ $userDirectoryData->Country == 'Botswana' ? 'selected' : '' }}>Botswana
                                        </option>
                                        <option value="Brazil"
                                            {{ $userDirectoryData->Country == 'Brazil' ? 'selected' : '' }}>Brazil
                                        </option>
                                        <option value="Brunei"
                                            {{ $userDirectoryData->Country == 'Brunei' ? 'selected' : '' }}>Brunei
                                        </option>
                                        <option value="Bulgaria"
                                            {{ $userDirectoryData->Country == 'Bulgaria' ? 'selected' : '' }}>Bulgaria
                                        </option>
                                        <option value="Burkina Faso"
                                            {{ $userDirectoryData->Country == 'Burkina Faso' ? 'selected' : '' }}>
                                            Burkina Faso</option>
                                        <option value="Burundi"
                                            {{ $userDirectoryData->Country == 'Burundi' ? 'selected' : '' }}>Burundi
                                        </option>
                                        <option value="Cabo Verde"
                                            {{ $userDirectoryData->Country == 'Cabo Verde' ? 'selected' : '' }}>Cabo
                                            Verde</option>
                                        <option value="Cambodia"
                                            {{ $userDirectoryData->Country == 'Cambodia' ? 'selected' : '' }}>Cambodia
                                        </option>
                                        <option value="Cameroon"
                                            {{ $userDirectoryData->Country == 'Cameroon' ? 'selected' : '' }}>Cameroon
                                        </option>
                                        <option value="Canada"
                                            {{ $userDirectoryData->Country == 'Canada' ? 'selected' : '' }}>Canada
                                        </option>
                                        <option value="Central African Republic"
                                            {{ $userDirectoryData->Country == 'Central African Republic' ? 'selected' : '' }}>
                                            Central African Republic</option>
                                        <option value="Chad"
                                            {{ $userDirectoryData->Country == 'Chad' ? 'selected' : '' }}>Chad</option>
                                        <option value="Chile"
                                            {{ $userDirectoryData->Country == 'Chile' ? 'selected' : '' }}>Chile
                                        </option>
                                        <option value="China"
                                            {{ $userDirectoryData->Country == 'China' ? 'selected' : '' }}>China
                                        </option>
                                        <option value="Colombia"
                                            {{ $userDirectoryData->Country == 'Colombia' ? 'selected' : '' }}>Colombia
                                        </option>
                                        <option value="Fiji"
                                            {{ $userDirectoryData->Country == 'Fiji' ? 'selected' : '' }}>Fiji</option>
                                        <option value="Finland"
                                            {{ $userDirectoryData->Country == 'Finland' ? 'selected' : '' }}>Finland
                                        </option>
                                        <option value="France"
                                            {{ $userDirectoryData->Country == 'France' ? 'selected' : '' }}>France
                                        </option>
                                        <option value="Gabon"
                                            {{ $userDirectoryData->Country == 'Gabon' ? 'selected' : '' }}>Gabon
                                        </option>
                                        <option value="Gambia"
                                            {{ $userDirectoryData->Country == 'Gambia' ? 'selected' : '' }}>Gambia
                                        </option>
                                        <option value="Georgia"
                                            {{ $userDirectoryData->Country == 'Georgia' ? 'selected' : '' }}>Georgia
                                        </option>
                                        <option value="Germany"
                                            {{ $userDirectoryData->Country == 'Germany' ? 'selected' : '' }}>Germany
                                        </option>
                                        <option value="Ghana"
                                            {{ $userDirectoryData->Country == 'Ghana' ? 'selected' : '' }}>Ghana
                                        </option>
                                        <option value="Greece"
                                            {{ $userDirectoryData->Country == 'Greece' ? 'selected' : '' }}>Greece
                                        </option>
                                        <option value="Grenada"
                                            {{ $userDirectoryData->Country == 'Grenada' ? 'selected' : '' }}>Grenada
                                        </option>
                                        <option value="Guatemala"
                                            {{ $userDirectoryData->Country == 'Guatemala' ? 'selected' : '' }}>Guatemala
                                        </option>
                                        <option value="Guinea"
                                            {{ $userDirectoryData->Country == 'Guinea' ? 'selected' : '' }}>Guinea
                                        </option>
                                        <option value="Guinea-Bissau"
                                            {{ $userDirectoryData->Country == 'Guinea-Bissau' ? 'selected' : '' }}>
                                            Guinea-Bissau</option>
                                        <option value="Haiti"
                                            {{ $userDirectoryData->Country == 'Haiti' ? 'selected' : '' }}>Haiti
                                        </option>
                                        <option value="Honduras"
                                            {{ $userDirectoryData->Country == 'Honduras' ? 'selected' : '' }}>Honduras
                                        </option>
                                        <option value="Hungary"
                                            {{ $userDirectoryData->Country == 'Hungary' ? 'selected' : '' }}>Hungary
                                        </option>
                                        <option value="Iceland"
                                            {{ $userDirectoryData->Country == 'Iceland' ? 'selected' : '' }}>Iceland
                                        </option>
                                        <option value="India"
                                            {{ $userDirectoryData->Country == 'India' ? 'selected' : '' }}>India
                                        </option>
                                        <option value="Indonesia"
                                            {{ $userDirectoryData->Country == 'Indonesia' ? 'selected' : '' }}>Indonesia
                                        </option>
                                        <option value="Iran"
                                            {{ $userDirectoryData->Country == 'Iran' ? 'selected' : '' }}>Iran</option>
                                        <option value="Iraq"
                                            {{ $userDirectoryData->Country == 'Iraq' ? 'selected' : '' }}>Iraq</option>
                                        <option value="Ireland"
                                            {{ $userDirectoryData->Country == 'Ireland' ? 'selected' : '' }}>Ireland
                                        </option>
                                    </select>


                                </div>
                                <div class="form-group">
                                    <label for="state">State:</label>
                                    <select id="state" required name="state">
                                        <option value="">Select State</option>
                                        <option value="state1"
                                            {{ $userDirectoryData->State == 'state1' ? 'selected' : '' }}>State1
                                        </option>
                                        <option value="state2"
                                            {{ $userDirectoryData->State == 'state2' ? 'selected' : '' }}>State2
                                        </option>
                                        <!-- Add more state options as necessary -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="city">City*:</label>
                                    <input type="text" id="city" required name="city"
                                        value="{{ $userDirectoryData->City}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="streetAddress">Building Number:</label>
                                <textarea id="streetAddress" rows="2"
                                    name="building_number">{{ $userDirectoryData->BuildingNumber}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="streetAddress">Street Name:</label>
                                <textarea id="streetAddress" rows="2"
                                    name="street_address">{{ $userDirectoryData->StreetName}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="goodsServices">Description of Goods or Services Provided:</label>
                                <textarea id="goodsServices" rows="2"
                                    name="goods_services">{{ $userDirectoryData->GoodsServices}}</textarea>
                            </div>




                            <div class="form-group">
                                <label for="fileInput" class="custom-file-label">Choose Profile Picture</label>
                                <input type="file" id="fileInput" name="logo" class="custom-file-input"
                                    accept=".jpeg,.jpg,.png,.gif,.svg,.webp,.bmp,.tiff">

                            </div>







                            <button class="form-btn"> UpDate </button>

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