<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>


    <link rel="stylesheet" href="assets/showDirectories/styles.css">
    <link rel="stylesheet" href="assets/css/Form.css">

    <link rel="stylesheet" href="assets/css/responsive.css">



    <script src="assets/js/RegForm.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Karla:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <!--for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



    <link rel="icon" href="/assets/logo.png" type="image/x-icon">

    <style>
        .business-details-header {
            width: 100%;
            background: linear-gradient(45deg, #0074cc, #3b8ac6);
            padding-top: 150px;
            padding-bottom: 200px;
            display: flex;
            justify-content: center;
            align-items: center;

        }
    </style>


    <!-- Add intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="shortcut icon" href="assets/images/whitelogo2.png">

</head>

<body style="background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);">



    <!-- Include intl-tel-input JS for popup -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>




    <!-- Header session -->
    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
            <a href="{{ route('index') }}"><img src="{{ asset('assets/logo.png') }}" style="width:85px;"></a>
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="{{ route('index') }}">HOME</a></li>
            <li><a href="{{ route('directoryadd') }}">DIRECTORY</a></li>
            <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
            <!--<li><a href="{{ route('shop') }}">SHOP</a></li>-->
            <!--<li><a href="{{ route('services') }}">SERVICES</a></li>-->
            <!--<li><a href= "{{ route('soccer') }}">CUSTOM UNIFORMS</a></li> -->


        </ul>

        <!-- Check if user is logged in -->
        @if (session('user'))
            <div class="dropdown">
                <button class="profile-btn">
                    <i class="fa fa-user"></i> Profile &#9662;
                </button>
                <ul class="dropdown-content">
                    @if (session('role') === 'admin')
                        <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                    @else
                        <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    @endif
                    <li><a href="{{ route('logout') }}">Log Out</a></li>
                </ul>
            </div>
        @else
            <div class="auth-links" style="text-align: center;">
                <a href="{{ route('help') }}" class="help">Help</a>

                <a href="{{ route('login') }}" class="auth-button">Log In</a>

                <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

            </div>


        @endif
    </nav>

    <!-- Header Session -->

    <div class="business-details-header">



    </div>

    <!-- Register form session -->


    <div class="reg-form-container">

        <!--@if (session('error'))
-->
        <!--<div class="alert alert-danger">-->
        <!--    {{ session('error') }}-->
        <!--</div>-->
        <!--
@endif-->

        <!--@if (session('success'))
-->
        <!--<div class="alert alert-success">-->
        <!--    {{ session('success') }}-->
        <!--</div>-->
        <!--
@endif-->


        @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "{{ route('login') }}"; // redirect to login page 
                    }
                });
            </script>
        @endif

        @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#d33',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif





        <h2 class="reg-form-heading">Register Your Business</h2>
 @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <form action="{{ route('business-registration.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="reg-form-content">
        <div class="reg-form-column">

            <label for="reg-business-name">Business Name*</label>
            <input class="reg-input" type="text" id="reg-business-name" name="BusinessName"
                placeholder="Enter your business name" value="{{ old('BusinessName') }}" required>
            @error('BusinessName')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-email">Email*</label>
            <input class="reg-input" type="email" id="reg-email" name="Email"
                placeholder="Enter your email address" value="{{ old('Email') }}" required>
            @error('Email')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-industry">Industry*</label>
            <select class="reg-select" id="reg-industry" name="Industry" required>
                <option value="" disabled selected>Select your industry</option>
                <option value="Arts/ Music/Entertainment" {{ old('Industry')=='Arts/ Music/Entertainment' ? 'selected' : '' }}>Arts/ Music/Entertainment</option>
                <option value="Accounting/ Financial Services/Insurance" {{ old('reg_industry')=='Accounting/ Financial Services/Insurance' ? 'selected' : '' }}>Accounting/ Financial Services/Insurance</option>
                <!-- baaki options bhi aise old check ke saath -->
            </select>
            @error('Industry')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-education">Education*</label>
            <select class="reg-select" id="reg-education" name="Education" required>
                <option value="" disabled selected>Select your highest education level</option>
                <option value="Doctorate" {{ old('Education')=='Doctorate' ? 'selected' : '' }}>Doctorate</option>
                <option value="Master’s Degree" {{ old('reg_education')=='Master’s Degree' ? 'selected' : '' }}>Master’s Degree</option>
                <!-- aur options -->
            </select>
            @error('Education')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-phone">Phone Number*</label>
            <input class="reg-input" type="tel" id="reg-phone" name="PhoneNumber"
                placeholder="Enter your phone number" value="{{ old('PhoneNumber') }}" required>
            @error('PhoneNumber')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-website">Website</label>
            <input class="reg-input" type="text" id="reg-website" name="Website"
                placeholder="Enter your website URL" value="{{ old('Website') }}">
            @error('Website')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-country">Country*</label>
            <select class="reg-select" id="reg-country" name="Country" required>
                <option value="">Select Country</option>
                <option value="United States" {{ old('Country')=='United States' ? 'selected' : '' }}>United States</option>
                <option value="United Kingdom" {{ old('Country')=='United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                <!-- baaki countries -->
            </select>
            @error('Country')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-state">State*</label>
            <input class="reg-input" type="text" id="reg-state" name="State"
                placeholder="Enter your state" value="{{ old('State') }}" required>
            @error('State')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-city">City*</label>
            <input class="reg-input" type="text" id="reg-city" name="City"
                placeholder="Enter your city" value="{{ old('City') }}" required>
            @error('City')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-street-name">Street Name*</label>
            <input class="reg-input" type="text" id="reg-street-name" name="StreetName"
                placeholder="Enter street name" value="{{ old('StreetName') }}" required>
            @error('StreetName')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-building-number">Building Number*</label>
            <input class="reg-input" type="text" id="reg-building-number" name="BuildingNumber"
                placeholder="Enter building number" value="{{ old('BuildingNumber') }}" required>
            @error('BuildingNumber')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-experience">Experience*</label>
            <select class="reg-select" id="reg-experience" name="Experience" required>
                <option value="" disabled selected>Select your experience level</option>
                <option value="0-5 Years" {{ old('reg_experience')=='0-5 Years' ? 'selected' : '' }}>0-5 Years</option>
                <option value="5-10 Years" {{ old('reg_experience')=='5-10 Years' ? 'selected' : '' }}>5-10 Years</option>
                <option value="10-20 Years" {{ old('reg_experience')=='10-20 Years' ? 'selected' : '' }}>10-20 Years</option>
                <option value="20+ Years" {{ old('reg_experience')=='20+ Years' ? 'selected' : '' }}>20+ Years</option>
            </select>
            @error('Experience')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label for="reg-goods-services">Goods/Services Provided*</label>
            <textarea class="reg-textarea" id="reg-goods-services" name="GoodsServices"
                placeholder="Describe your business" rows="5">{{ old('GoodsServices') }}</textarea>
            @error('GoodsServices')
                <div class="text-danger">{{ $message }}</div>
            @enderror

            <label class="custom-file-label" for="fileInput">Choose Profile Picture</label>
            <input type="file" id="fileInput" name="profile_picture" class="custom-file-input"
                accept=".jpeg,.jpg,.png,.gif,.svg,.webp,.bmp,.tiff">
            @error('profile_picture')
                <div class="text-danger">{{ $message }}</div>
            @enderror

        </div>
    </div>

    <div class="reg-submit-btn-box">
        <button type="submit" class="reg-submit-btn">Submit</button>
    </div>
</form>

    </div>


    <!-- End Register form session -->


    <script>
        // Phone input field ko intlTelInput ke sath initialize karna
        let input = document.querySelector("#reg-phone");
        let iti = window.intlTelInput(input, {
            initialCountry: "", // Initial country ko blank rakhein
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js", // Optional formatting ke liye
        });

        // User jab flag select kare, tab dialing code number field mein add ho
        input.addEventListener("countrychange", function() {
            let dialCode = iti.getSelectedCountryData().dialCode; // Selected country ka dialing code
            input.value = "+" + dialCode; // Dialing code number field me add kare
            input.setSelectionRange(input.value.length, input.value.length); // Cursor ko code ke baad set kare
        });
    </script>









    @include('component.footer')
