<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!--favicon-->
          <link rel="shortcut icon" href="assets/images/whitelogo2.png">


    <!-- for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">

    <script defer src="script.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    
      <link rel="stylesheet" href="assets/css/UpdateDirectoryForm.css">
        
      <link rel="stylesheet" href="assets/css/user-UpdateDirecotry.css">
        <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
      
        <!--<script src="assets/js/RegForm.js"></script>-->
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JS (Optional, for components like modals, tooltips) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
       
      
   
</head>

<body>
    <div class="wrapper">
        <aside class="sidebar" id="sidebar">
            <div class="logo">
                <a href="{{ route('index') }}" target="_blank">
                <img src="assets/images/whitelogo2.png" alt="Logo" class="logo-img"></a> <!-- Add your logo here -->
                <h2>Vendor Panel</h2>
                <button class="close-btn" id="close-btn">&times;</button>
            </div>
            <ul class="menu">
                <li><a href=" {{route('dashboard')}}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Your Orders</a></li>
                <li><a href="{{route('update_directory')}}"><i class="fas fa-list"></i>  Update Directory</a></li>
                <li><a href="{{route('edit-account')}}"><i class="fas fa-box"></i>Change Password</a></li>
              
                <li><a href="{{route('index')}}"><i class="fa-solid fa-house-user"></i></i> Home</a></li>
                   <li><a href="{{route('logout')}}"><i class="fas fa-sign-out-alt"></i> Sign Out</a></li>
            </ul>
        </aside>
        <main class="content">
            <div>
                <button class="hamburger" id="hamburger">
                    <i class="fas fa-bars"></i>
                </button>

            </div>
            <div class="dashboard-content">
                <div class="left-column">
                    <!-- Search bar -->
                    <input type="text" class="search-bar" placeholder="Search...">
                </div>
                <div class="right-column">
                    <!-- Profile info with arrow -->
                    <div class="profile-info">
                        <!-- <img src="profile-icon.png" alt="Profile Icon" class="profile-icon"> -->
                        <i class="fas fa-user profile-icon"></i>
                        <span class="profile-name">{{ $userDirectoryData->BusinessName}}</span>
                        <span class="arrow" onclick="toggleLogoutBox()">&#9660;</span>
                    </div>

                   <!-- Logout box -->
                    <div class="logout-box" id="logoutBox" style="display: none;">
                        
                        <ul>
                            <li class="list-home">
                                 <a href="{{route('index')}}" class="logout-btn">Home</a>
                                
                            </li>
                        </ul>
                        <li class="list-logout">
                            <a href="{{route('logout')}}" class="logout-btn">Log Out</a>
                        </li>
                        
                        
                    </div>

                </div>
            </div>
            <div class="dashboard-box">
                <div class="dashboard-box-content">
                    
                     <!-- Register form session -->


    <div class="reg-form-container">

        @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
             @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
             @endif
        <h2 class="reg-form-heading">Update Your Business</h2>

       <form method="POST" action="{{ route('update-user-directory') }}" enctype="multipart/form-data">
            @csrf
           

            <div class="reg-form-content">
                <div class="reg-form-column">
                    <label for="reg-business-name">Business Name*</label>
                    <input class="reg-input" type="text" id="reg-business-name" name="business_name"
                    name="business_name"value="{{ $userDirectoryData->BusinessName}}"
                        placeholder="Enter your business name" required readonly>

                    <label for="reg-email">Email*</label>
                    <input class="reg-input" type="email" id="reg-email"  name="email" value="{{ $userDirectoryData->Email}}"
                        placeholder="Enter your email address" required readonly>



        <label for="reg-education">Education*</label>
        <select class="reg-select" id="reg-education" name="education" required disabled>
            <option value="" disabled selected>Select your highest education level</option>
        
            <option value="Doctorate" {{ $userDirectoryData->Education == 'Doctorate' ? 'selected' : '' }}>
                Doctorate
            </option>
        
            <option value="Master Degree" {{ $userDirectoryData->Education == 'Master Degree' ? 'selected' : '' }}>
                Master Degree
            </option>
        
            <option value="Associates Degree" {{ $userDirectoryData->Education == 'Associates Degree' ? 'selected' : '' }}>
                Associates Degree
            </option>
        
            <option value="Professional Certificate" {{ $userDirectoryData->Education == 'Professional Certificate' ? 'selected' : '' }}>
                Professional Certificate
            </option>
        
            <option value="High School Diploma" {{ $userDirectoryData->Education == 'High School Diploma' ? 'selected' : '' }}>
                High School Diploma
            </option>
        
            <option value="Primary School" {{ $userDirectoryData->Education == 'Primary School' ? 'selected' : '' }}>
                Primary School
            </option>
        
            <option value="Other" {{ $userDirectoryData->Education == 'Other' ? 'selected' : '' }}>
                Other
            </option>
        </select>
        <!-- Hidden input to submit the actual value -->
<input type="hidden" name="education" value="{{ $userDirectoryData->Education }}">


                    <label for="reg-website">Website</label>
                    <!--<input class="reg-input" type="text" id="reg-website" name="reg_website" placeholder="Enter your website ">-->
                    
                    <input class="reg-input" type="text" id="reg-website" name="website" value="{{ $userDirectoryData->Website}}"
                        placeholder="Enter your website URL" readonly>


                    <!-- <script>
                    document.getElementById('reg-website').addEventListener('input', function() {
                        let inputField = this;
                        let userInput = inputField.value.trim(); // User input
                        if (userInput && !userInput.startsWith('http')) {
                            inputField.value = `https://${userInput}.com`;
                        }
                    });
                    </script> -->

                    <!-- <script>
                        document.getElementById('reg-website').addEventListener('focus', function() {
                            let inputField = this;
                            if (!inputField.value.startsWith('https://www.')) {
                                inputField.value = 'https://www.';
                            }
                        });
                    </script> -->



<script>
    document.getElementById('reg-website').addEventListener('blur', function() {
        let inputField = this;
        let userInput = inputField.value.trim().toLowerCase(); // Convert to lowercase

        // Check if input is valid and doesn't already start with www.
        if (userInput && !userInput.startsWith('www.') && /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(userInput)) {
            inputField.value = `www.${userInput}`;
        }
    });
</script>


                    <label for="reg-state">State*</label>
                    <select class="reg-select" id="reg-state" name="state" required disabled></select>




                   
 <label for="reg-building-number">Building Number*</label>
                    <input class="reg-input" type="text" id="reg-building-number" name="building_number" value="{{ $userDirectoryData->BuildingNumber}}"
                        placeholder="Enter building number" required readonly>


                </div>

                <div class="reg-form-column">




<label for="reg-industry">Industry*</label>
<select class="reg-select" id="reg-industry" name="industry" required disabled>
    <option value="" disabled selected>Select your industry</option>

    <option value="Arts/ Music/Entertainment" {{ $userDirectoryData->Industry == 'Arts/ Music/Entertainment' ? 'selected' : '' }}>
        Arts/ Music/Entertainment
    </option>

    <option value="Accounting/ Financial Services/Insurance" {{ $userDirectoryData->Industry == 'Accounting/ Financial Services/Insurance' ? 'selected' : '' }}>
        Accounting/ Financial Services/Insurance
    </option>

    <option value="Automotive/Transportation" {{ $userDirectoryData->Industry == 'Automotive/Transportation' ? 'selected' : '' }}>
        Automotive/Transportation
    </option>

    <option value="Business Administration/Office" {{ $userDirectoryData->Industry == 'Business Administration/Office' ? 'selected' : '' }}>
        Business Administration/Office
    </option>

    <option value="Biotech/Science/Life Science" {{ $userDirectoryData->Industry == 'Biotech/Science/Life Science' ? 'selected' : '' }}>
        Biotech/Science/Life Science
    </option>

    <option value="Construction/Plumbing/ Mining" {{ $userDirectoryData->Industry == 'Construction/Plumbing/ Mining' ? 'selected' : '' }}>
        Construction/Plumbing/ Mining
    </option>

    <option value="Cosmetic/Beauty/Barber" {{ $userDirectoryData->Industry == 'Cosmetic/Beauty/Barber' ? 'selected' : '' }}>
        Cosmetic/Beauty/Barber
    </option>

    <option value="Customer Service/ Consumer Goods & Services" {{ $userDirectoryData->Industry == 'Customer Service/ Consumer Goods & Services' ? 'selected' : '' }}>
        Customer Service/ Consumer Goods & Services
    </option>

    <option value="Education/ Professional/Scientific" {{ $userDirectoryData->Industry == 'Education/ Professional/Scientific' ? 'selected' : '' }}>
        Education/ Professional/Scientific
    </option>

    <option value="Food Services/Beverage" {{ $userDirectoryData->Industry == 'Food Services/Beverage' ? 'selected' : '' }}>
        Food Services/Beverage
    </option>

    <option value="General Labor/Warehouse" {{ $userDirectoryData->Industry == 'General Labor/Warehouse' ? 'selected' : '' }}>
        General Labor/Warehouse
    </option>

    <option value="Government/Non-Profit" {{ $userDirectoryData->Industry == 'Government/Non-Profit' ? 'selected' : '' }}>
        Government/Non-Profit
    </option>

    <option value="Graphic Design/Media Design" {{ $userDirectoryData->Industry == 'Graphic Design/Media Design' ? 'selected' : '' }}>
        Graphic Design/Media Design
    </option>

    <option value="Healthcare/Social Assistance/Medical" {{ $userDirectoryData->Industry == 'Healthcare/Social Assistance/Medical' ? 'selected' : '' }}>
        Healthcare/Social Assistance/Medical
    </option>

    <option value="Human Resource/Marketing/PR/Advertising" {{ $userDirectoryData->Industry == 'Human Resource/Marketing/PR/Advertising' ? 'selected' : '' }}>
        Human Resource/Marketing/PR/Advertising
    </option>

    <option value="Hospitality/Tourism/Accommodation" {{ $userDirectoryData->Industry == 'Hospitality/Tourism/Accommodation' ? 'selected' : '' }}>
        Hospitality/Tourism/Accommodation
    </option>

    <option value="Legal/Paralegal" {{ $userDirectoryData->Industry == 'Legal/Paralegal' ? 'selected' : '' }}>
        Legal/Paralegal
    </option>

    <option value="Manufacturing/ Industrial Machinery/ Gas/ Chemicals" {{ $userDirectoryData->Industry == 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals' ? 'selected' : '' }}>
        Manufacturing/ Industrial Machinery/ Gas/ Chemicals
    </option>

    <option value="Real Estate/Rental/Leasing" {{ $userDirectoryData->Industry == 'Real Estate/Rental/Leasing' ? 'selected' : '' }}>
        Real Estate/Rental/Leasing
    </option>

    <option value="Retail/Wholesale/Trade" {{ $userDirectoryData->Industry == 'Retail/Wholesale/Trade' ? 'selected' : '' }}>
        Retail/Wholesale/Trade
    </option>

    <option value="Sales/Business Development" {{ $userDirectoryData->Industry == 'Sales/Business Development' ? 'selected' : '' }}>
        Sales/Business Development
    </option>

    <option value="Salon/Spa/Fitness" {{ $userDirectoryData->Industry == 'Salon/Spa/Fitness' ? 'selected' : '' }}>
        Salon/Spa/Fitness
    </option>

    <option value="Security" {{ $userDirectoryData->Industry == 'Security' ? 'selected' : '' }}>
        Security
    </option>

    <option value="Skills/Trade/Craft/Utilities" {{ $userDirectoryData->Industry == 'Skills/Trade/Craft/Utilities' ? 'selected' : '' }}>
        Skills/Trade/Craft/Utilities
    </option>

    <option value="Technology/ Technical Support/Web" {{ $userDirectoryData->Industry == 'Technology/ Technical Support/Web' ? 'selected' : '' }}>
        Technology/ Technical Support/Web
    </option>

    <option value="TV/Film/Video" {{ $userDirectoryData->Industry == 'TV/Film/Video' ? 'selected' : '' }}>
        TV/Film/Video
    </option>

    <option value="Other" {{ $userDirectoryData->Industry == 'Other' ? 'selected' : '' }}>
        Other
    </option>
</select>



                    <label for="reg-phone">Phone Number*</label>
                    <input class="reg-input" type="tel" id="reg-phone"name="cell_number" value="{{ $userDirectoryData->PhoneNumber}}"
                        placeholder="Enter your phone number" required readonly>



 <label for="reg-experience">Experience*</label>
<select class="reg-select" id="reg-experience"  required name="experience" disabled>>
    <option value="" disabled selected>Select your experience level</option>

    <option value="0-5 Years" {{ $userDirectoryData->Experience == '0-5 Years' ? 'selected' : '' }}>
        0-5 Years
    </option>

    <option value="5-10 Years" {{ $userDirectoryData->Experience == '5-10 Years' ? 'selected' : '' }}>
        5-10 Years
    </option>

    <option value="10-20 Years" {{ $userDirectoryData->Experience == '10-20 Years' ? 'selected' : '' }}>
        10-20 Years
    </option>

    <option value="20+ Years" {{ $userDirectoryData->Experience == '20+ Years' ? 'selected' : '' }}>
        20+ Years
    </option>
</select>



                    <label for="reg-country">Country*</label>
<select class="reg-select" id="reg-country" onchange="regcountryselection()" name="country" required disabled>
    <option value="">Select Country</option>
    <option value="Afghanistan" {{ $userDirectoryData->Country == 'Afghanistan' ? 'selected' : '' }}>Afghanistan</option>
    <option value="Albania" {{ $userDirectoryData->Country == 'Albania' ? 'selected' : '' }}>Albania</option>
    <option value="Algeria" {{ $userDirectoryData->Country == 'Algeria' ? 'selected' : '' }}>Algeria</option>
    <option value="American Samoa" {{ $userDirectoryData->Country == 'American Samoa' ? 'selected' : '' }}>American Samoa</option>
    <option value="Andorra" {{ $userDirectoryData->Country == 'Andorra' ? 'selected' : '' }}>Andorra</option>
    <option value="Angola" {{ $userDirectoryData->Country == 'Angola' ? 'selected' : '' }}>Angola</option>
    <option value="Antarctica" {{ $userDirectoryData->Country == 'Antarctica' ? 'selected' : '' }}>Antarctica</option>
    <option value="Antigua And Barbuda" {{ $userDirectoryData->Country == 'Antigua And Barbuda' ? 'selected' : '' }}>Antigua And Barbuda</option>
    <option value="Argentina" {{ $userDirectoryData->Country == 'Argentina' ? 'selected' : '' }}>Argentina</option>
    <option value="Armenia" {{ $userDirectoryData->Country == 'Armenia' ? 'selected' : '' }}>Armenia</option>
    <option value="Anguilla" {{ $userDirectoryData->Country == 'Anguilla' ? 'selected' : '' }}>Anguilla</option>
    <option value="Aruba" {{ $userDirectoryData->Country == 'Aruba' ? 'selected' : '' }}>Aruba</option>
    <option value="Australia" {{ $userDirectoryData->Country == 'Australia' ? 'selected' : '' }}>Australia</option>
    <option value="Austria" {{ $userDirectoryData->Country == 'Austria' ? 'selected' : '' }}>Austria</option>
    <option value="Azerbaijan" {{ $userDirectoryData->Country == 'Azerbaijan' ? 'selected' : '' }}>Azerbaijan</option>
    <option value="Bahamas" {{ $userDirectoryData->Country == 'Bahamas' ? 'selected' : '' }}>Bahamas</option>
    <option value="Bahrain" {{ $userDirectoryData->Country == 'Bahrain' ? 'selected' : '' }}>Bahrain</option>
    <option value="Bangladesh" {{ $userDirectoryData->Country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
    <option value="Barbados" {{ $userDirectoryData->Country == 'Barbados' ? 'selected' : '' }}>Barbados</option>
    <option value="Belarus" {{ $userDirectoryData->Country == 'Belarus' ? 'selected' : '' }}>Belarus</option>
    <option value="Belgium" {{ $userDirectoryData->Country == 'Belgium' ? 'selected' : '' }}>Belgium</option>
    <option value="Belize" {{ $userDirectoryData->Country == 'Belize' ? 'selected' : '' }}>Belize</option>
    <option value="Benin" {{ $userDirectoryData->Country == 'Benin' ? 'selected' : '' }}>Benin</option>
    <option value="Bermuda" {{ $userDirectoryData->Country == 'Bermuda' ? 'selected' : '' }}>Bermuda</option>
    <option value="Bhutan" {{ $userDirectoryData->Country == 'Bhutan' ? 'selected' : '' }}>Bhutan</option>
    <option value="Bolivia" {{ $userDirectoryData->Country == 'Bolivia' ? 'selected' : '' }}>Bolivia</option>
    <option value="Bosnia And Herzegovina" {{ $userDirectoryData->Country == 'Bosnia And Herzegovina' ? 'selected' : '' }}>Bosnia And Herzegovina</option>
    <option value="Botswana" {{ $userDirectoryData->Country == 'Botswana' ? 'selected' : '' }}>Botswana</option>
    <option value="Bouvet Island" {{ $userDirectoryData->Country == 'Bouvet Island' ? 'selected' : '' }}>Bouvet Island</option>
    <option value="Brazil" {{ $userDirectoryData->Country == 'Brazil' ? 'selected' : '' }}>Brazil</option>
    <option value="Brunei" {{ $userDirectoryData->Country == 'Brunei' ? 'selected' : '' }}>Brunei</option>
    <option value="Bulgaria" {{ $userDirectoryData->Country == 'Bulgaria' ? 'selected' : '' }}>Bulgaria</option>
    <option value="Burkina Faso" {{ $userDirectoryData->Country == 'Burkina Faso' ? 'selected' : '' }}>Burkina Faso</option>
    <option value="Burundi" {{ $userDirectoryData->Country == 'Burundi' ? 'selected' : '' }}>Burundi</option>
    <option value="Cambodia" {{ $userDirectoryData->Country == 'Cambodia' ? 'selected' : '' }}>Cambodia</option>
    <option value="Cameroon" {{ $userDirectoryData->Country == 'Cameroon' ? 'selected' : '' }}>Cameroon</option>
    <option value="Canada" {{ $userDirectoryData->Country == 'Canada' ? 'selected' : '' }}>Canada</option>
    <option value="Cape Verde" {{ $userDirectoryData->Country == 'Cape Verde' ? 'selected' : '' }}>Cape Verde</option>
    <option value="Cayman Islands" {{ $userDirectoryData->Country == 'Cayman Islands' ? 'selected' : '' }}>Cayman Islands</option>
    <option value="Central African Republic" {{ $userDirectoryData->Country == 'Central African Republic' ? 'selected' : '' }}>Central African Republic</option>
    <option value="Chad" {{ $userDirectoryData->Country == 'Chad' ? 'selected' : '' }}>Chad</option>
    <option value="Chile" {{ $userDirectoryData->Country == 'Chile' ? 'selected' : '' }}>Chile</option>
    <option value="China" {{ $userDirectoryData->Country == 'China' ? 'selected' : '' }}>China</option>
    <option value="Christmas Island" {{ $userDirectoryData->Country == 'Christmas Island' ? 'selected' : '' }}>Christmas Island</option>
    <option value="Cocos (Keeling) Islands" {{ $userDirectoryData->Country == 'Cocos (Keeling) Islands' ? 'selected' : '' }}>Cocos (Keeling) Islands</option>
    <option value="Colombia" {{ $userDirectoryData->Country == 'Colombia' ? 'selected' : '' }}>Colombia</option>
    <option value="Comoros" {{ $userDirectoryData->Country == 'Comoros' ? 'selected' : '' }}>Comoros</option>
    <option value="Congo" {{ $userDirectoryData->Country == 'Congo' ? 'selected' : '' }}>Congo</option>
    <option value="Cook Islands" {{ $userDirectoryData->Country == 'Cook Islands' ? 'selected' : '' }}>Cook Islands</option>
    <option value="Costa Rica" {{ $userDirectoryData->Country == 'Costa Rica' ? 'selected' : '' }}>Costa Rica</option>
    <option value="Cote D'Ivoire" {{ $userDirectoryData->Country == "Cote D'Ivoire" ? 'selected' : '' }}>Cote D'Ivoire</option>
    <option value="Croatia" {{ $userDirectoryData->Country == 'Croatia' ? 'selected' : '' }}>Croatia</option>
    <option value="Cuba" {{ $userDirectoryData->Country == 'Cuba' ? 'selected' : '' }}>Cuba</option>
    <option value="Cyprus" {{ $userDirectoryData->Country == 'Cyprus' ? 'selected' : '' }}>Cyprus</option>
    <option value="Czech Republic" {{ $userDirectoryData->Country == 'Czech Republic' ? 'selected' : '' }}>Czech Republic</option>
    <option value="Denmark" {{ $userDirectoryData->Country == 'Denmark' ? 'selected' : '' }}>Denmark</option>
    <option value="Djibouti" {{ $userDirectoryData->Country == 'Djibouti' ? 'selected' : '' }}>Djibouti</option>
    <option value="Dominica" {{ $userDirectoryData->Country == 'Dominica' ? 'selected' : '' }}>Dominica</option>
    <option value="Dominican Republic" {{ $userDirectoryData->Country == 'Dominican Republic' ? 'selected' : '' }}>Dominican Republic</option>
    <option value="Ecuador" {{ $userDirectoryData->Country == 'Ecuador' ? 'selected' : '' }}>Ecuador</option>
    <option value="Egypt" {{ $userDirectoryData->Country == 'Egypt' ? 'selected' : '' }}>Egypt</option>
    <option value="El Salvador" {{ $userDirectoryData->Country == 'El Salvador' ? 'selected' : '' }}>El Salvador</option>
    <option value="Equatorial Guinea" {{ $userDirectoryData->Country == 'Equatorial Guinea' ? 'selected' : '' }}>Equatorial Guinea</option>
    <option value="Eritrea" {{ $userDirectoryData->Country == 'Eritrea' ? 'selected' : '' }}>Eritrea</option>
    <option value="Estonia" {{ $userDirectoryData->Country == 'Estonia' ? 'selected' : '' }}>Estonia</option>
    <option value="Ethiopia" {{ $userDirectoryData->Country == 'Ethiopia' ? 'selected' : '' }}>Ethiopia</option>
    <option value="Falkland Islands" {{ $userDirectoryData->Country == 'Falkland Islands' ? 'selected' : '' }}>Falkland Islands</option>
    <option value="Faroe Islands" {{ $userDirectoryData->Country == 'Faroe Islands' ? 'selected' : '' }}>Faroe Islands</option>
    <option value="Fiji" {{ $userDirectoryData->Country == 'Fiji' ? 'selected' : '' }}>Fiji</option>
    <option value="Finland" {{ $userDirectoryData->Country == 'Finland' ? 'selected' : '' }}>Finland</option>
    <option value="France" {{ $userDirectoryData->Country == 'France' ? 'selected' : '' }}>France</option>
    <option value="Gabon" {{ $userDirectoryData->Country == 'Gabon' ? 'selected' : '' }}>Gabon</option>
    <option value="Gambia" {{ $userDirectoryData->Country == 'Gambia' ? 'selected' : '' }}>Gambia</option>
    <option value="Georgia" {{ $userDirectoryData->Country == 'Georgia' ? 'selected' : '' }}>Georgia</option>
    <option value="Germany" {{ $userDirectoryData->Country == 'Germany' ? 'selected' : '' }}>Germany</option>
    <option value="Ghana" {{ $userDirectoryData->Country == 'Ghana' ? 'selected' : '' }}>Ghana</option>
    <option value="Gibraltar" {{ $userDirectoryData->Country == 'Gibraltar' ? 'selected' : '' }}>Gibraltar</option>
    <option value="Greece" {{ $userDirectoryData->Country == 'Greece' ? 'selected' : '' }}>Greece</option>
    <option value="Greenland" {{ $userDirectoryData->Country == 'Greenland' ? 'selected' : '' }}>Greenland</option>
    <option value="Grenada" {{ $userDirectoryData->Country == 'Grenada' ? 'selected' : '' }}>Grenada</option>
    <option value="Guadeloupe" {{ $userDirectoryData->Country == 'Guadeloupe' ? 'selected' : '' }}>Guadeloupe</option>
    <option value="Guam" {{ $userDirectoryData->Country == 'Guam' ? 'selected' : '' }}>Guam</option>
    <option value="Guatemala" {{ $userDirectoryData->Country == 'Guatemala' ? 'selected' : '' }}>Guatemala</option>
    <option value="Guinea" {{ $userDirectoryData->Country == 'Guinea' ? 'selected' : '' }}>Guinea</option>
    <option value="Guinea-Bissau" {{ $userDirectoryData->Country == 'Guinea-Bissau' ? 'selected' : '' }}>Guinea-Bissau</option>
    <option value="Guyana" {{ $userDirectoryData->Country == 'Guyana' ? 'selected' : '' }}>Guyana</option>
    <option value="Haiti" {{ $userDirectoryData->Country == 'Haiti' ? 'selected' : '' }}>Haiti</option>
    <option value="Honduras" {{ $userDirectoryData->Country == 'Honduras' ? 'selected' : '' }}>Honduras</option>
    <option value="Hong Kong" {{ $userDirectoryData->Country == 'Hong Kong' ? 'selected' : '' }}>Hong Kong</option>
    <option value="Hungary" {{ $userDirectoryData->Country == 'Hungary' ? 'selected' : '' }}>Hungary</option>
    <option value="Iceland" {{ $userDirectoryData->Country == 'Iceland' ? 'selected' : '' }}>Iceland</option>
    <option value="India" {{ $userDirectoryData->Country == 'India' ? 'selected' : '' }}>India</option>
    <option value="Indonesia" {{ $userDirectoryData->Country == 'Indonesia' ? 'selected' : '' }}>Indonesia</option>
    <option value="Iran, Islamic Republic Of" {{ $userDirectoryData->Country == 'Iran, Islamic Republic Of' ? 'selected' : '' }}>Iran, Islamic Republic Of</option>
    <option value="Iraq" {{ $userDirectoryData->Country == 'Iraq' ? 'selected' : '' }}>Iraq</option>
    <option value="Ireland" {{ $userDirectoryData->Country == 'Ireland' ? 'selected' : '' }}>Ireland</option>
    <option value="Israel" {{ $userDirectoryData->Country == 'Israel' ? 'selected' : '' }}>Israel</option>
    <option value="Italy" {{ $userDirectoryData->Country == 'Italy' ? 'selected' : '' }}>Italy</option>
    <option value="Jamaica" {{ $userDirectoryData->Country == 'Jamaica' ? 'selected' : '' }}>Jamaica</option>
    <option value="Japan" {{ $userDirectoryData->Country == 'Japan' ? 'selected' : '' }}>Japan</option>
    <option value="Jordan" {{ $userDirectoryData->Country == 'Jordan' ? 'selected' : '' }}>Jordan</option>
    <option value="Kazakhstan" {{ $userDirectoryData->Country == 'Kazakhstan' ? 'selected' : '' }}>Kazakhstan</option>
    <option value="Kenya" {{ $userDirectoryData->Country == 'Kenya' ? 'selected' : '' }}>Kenya</option>
    <option value="Kiribati" {{ $userDirectoryData->Country == 'Kiribati' ? 'selected' : '' }}>Kiribati</option>
    <option value="South Korea" {{ $userDirectoryData->Country == 'South Korea' ? 'selected' : '' }}>South Korea</option>
    <option value="North Korea" {{ $userDirectoryData->Country == 'North Korea' ? 'selected' : '' }}>North Korea</option>
    <option value="Kuwait" {{ $userDirectoryData->Country == 'Kuwait' ? 'selected' : '' }}>Kuwait</option>
    <option value="Kyrgyzstan" {{ $userDirectoryData->Country == 'Kyrgyzstan' ? 'selected' : '' }}>Kyrgyzstan</option>
    <option value="Latvia" {{ $userDirectoryData->Country == 'Latvia' ? 'selected' : '' }}>Latvia</option>
    <option value="Lebanon" {{ $userDirectoryData->Country == 'Lebanon' ? 'selected' : '' }}>Lebanon</option>
    <option value="Lesotho" {{ $userDirectoryData->Country == 'Lesotho' ? 'selected' : '' }}>Lesotho</option>
    <option value="Liberia" {{ $userDirectoryData->Country == 'Liberia' ? 'selected' : '' }}>Liberia</option>
    <option value="Libya, State Of" {{ $userDirectoryData->Country == 'Libya, State Of' ? 'selected' : '' }}>Libya, State Of</option>
    <option value="Liechtenstein" {{ $userDirectoryData->Country == 'Liechtenstein' ? 'selected' : '' }}>Liechtenstein</option>
    <option value="Lithuania" {{ $userDirectoryData->Country == 'Lithuania' ? 'selected' : '' }}>Lithuania</option>
                        
                        
                        
                        
                        
                        
                        
                        
                        <option value="Luxembourg">Luxembourg</option>
                        <option value="Macao">Macao</option>
                        <option value="Macedonia">Macedonia</option>
                        <option value="Madagascar">Madagascar</option>
                        <option value="Malawi">Malawi</option>
                        <option value="Malaysia">Malaysia</option>
                        <option value="Maldives">Maldives</option>
                        <option value="Mali">Mali</option>
                        <option value="Malta">Malta</option>
                        <option value="MarshallIslands">Marshall Islands</option>
                        <option value="Martinique">Martinique</option>
                        <option value="Mauritania">Mauritania</option>
                        <option value="Mauritius">Mauritius</option>
                        <option value="Mayotte">Mayotte</option>
                        <option value="Mexico">Mexico</option>
                        <option value="Monaco">Monaco</option>
                        <option value="Mongolia">Mongolia</option>
                        <option value="Montenegro">Montenegro</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Morocco">Morocco</option>
                        <option value="Mozambique">Mozambique</option>
                        <option value="Myanmar">Myanmar</option>
                        <option value="Namibia">Namibia</option>
                        <option value="Nauru">Nauru</option>
                        <option value="Nepal">Nepal</option>
                        <option value="Netherlands">Netherlands</option>
                        <option value="NetherlandsAntilles">Netherlands Antilles</option>
                        <option value="NewCaledonia">New Caledonia</option>
                        <option value="NewZealand">New Zealand</option>
                        <option value="Nicaragua">Nicaragua</option>
                        <option value="Niger">Niger</option>
                        <option value="Nigeria">Nigeria</option>
                        <option value="Niue">Niue</option>
                        <option value="NorfolkIsland">Norfolk Island</option>
                        <option value="NorthernMarianaIslands">Northern Mariana Islands</option>
                        <option value="Norway">Norway</option>
                        <option value="Oman">Oman</option>
                        <option value="Pakistan">Pakistan</option>
                        <option value="Palau">Palau</option>
                        <option value="Palestine">Palestine, State Of</option>
                        <option value="Panama">Panama</option>
                        <option value="PapuaNewGuinea">Papua New Guinea</option>
                        <option value="Paraguay">Paraguay</option>
                        <option value="Peru">Peru</option>
                        <option value="Philippines">Philippines</option>
                        <option value="Pitcairn">Pitcairn</option>
                        <option value="Poland">Poland</option>
                        <option value="Portugal">Portugal</option>
                        <option value="PuertoRico">Puerto Rico</option>
                        <option value="Qatar">Qatar</option>
                        <option value="Reunion">Reunion</option>
                        <option value="Romania">Romania</option>
                        <option value="Russia">Russia</option>
                        <option value="Rwanda">Rwanda</option>
                        <option value="SaintKittsandNevis">Saint Kitts And Nevis</option>
                        <option value="SaintLucia">Saint Lucia</option>
                        <option value="SaintVincentandtheGrenadines">Saint Vincent And The Grenadines</option>
                        <option value="Samoa">Samoa</option>
                        <option value="SanMarino">San Marino</option>
                        <option value="SaoTomeandPrincipe">Sao Tome And Principe</option>
                        <option value="SaudiArabia">Saudi Arabia</option>
                        <option value="Senegal">Senegal</option>
                        <option value="Serbia">Serbia</option>
                        <option value="Seychelles">Seychelles</option>
                        <option value="SierraLeone">Sierra Leone</option>
                        <option value="Singapore">Singapore</option>
                        <option value="Slovakia">Slovakia</option>
                        <option value="Slovenia">Slovenia</option>
                        <option value="SolomonIslands">Solomon Islands</option>
                        <option value="Somalia">Somalia</option>
                        <option value="SouthAfrica">South Africa</option>
                        <option value="SouthSudan">South Sudan</option>
                        <option value="Spain">Spain</option>
                        <option value="SriLanka">Sri Lanka</option>
                        <option value="Sudan">Sudan</option>
                        <option value="SintMaarten">Sint Maarten</option>
                        <option value="Suriname">Suriname</option>
                        <option value="Swaziland">Swaziland</option>
                        <option value="Sweden">Sweden</option>
                        <option value="Switzerland">Switzerland</option>
                        <option value="Syria">Syrian Arab Republic</option>
                        <option value="Tajikistan">Tajikistan</option>
                        <option value="Tanzania">Tanzania</option>
                        <option value="Thailand">Thailand</option>
                        <option value="TimorLeste">Timor-Leste</option>
                        <option value="Togo">Togo</option>
                        <option value="Tokelau">Tokelau</option>
                        <option value="Tonga">Tonga</option>
                        <option value="TrinidadandTobago">Trinidad And Tobago</option>
                        <option value="Tunisia">Tunisia</option>
                        <option value="Turkey">Turkey</option>
                        <option value="Turkmenistan">Turkmenistan</option>
                        <option value="TurksAndCaicosIslands">Turks And Caicos Islands</option>
                        <option value="Tuvalu">Tuvalu</option>
                        <option value="Uganda">Uganda</option>
                        <option value="Ukraine">Ukraine</option>
                        <option value="UnitedArabEmirates">United Arab Emirates</option>
                        <option value="UnitedKingdom">United Kingdom</option>
                        <option value="UnitedStates">United States</option>
                        <option value="Uruguay">Uruguay</option>
                        <option value="Uzbekistan">Uzbekistan</option>
                        <option value="Vanuatu">Vanuatu</option>
                        <option value="VaticanCity">Vatican City</option>
                        <option value="Venezuela">Venezuela</option>
                        <option value="Vietnam">Vietnam</option>
                        <option value="WallisAndFutunaIslands">Wallis And Futuna Islands</option>
                        <option value="WesternSahara">Western Sahara</option>
                        <option value="Yemen">Yemen</option>
                        <option value="Zambia">Zambia</option>
                        <option value="Zimbabwe">Zimbabwe</option>


                    </select>


                    <label for="reg-city">City*</label>
                    <input class="reg-input" type="text" id="reg-city" name="city" value="{{ $userDirectoryData->City}}" placeholder="Enter your city"
                        required readonly>


                    <label for="reg-street-name">Street Name*</label>
                    <input class="reg-input" type="text" id="reg-street-name"  name="street_address"value="{{ $userDirectoryData->StreetName}}"
                        placeholder="Enter street name" required readonly>


                </div>

            </div>

            <label for="reg-goods-services">Goods/Services Provided*</label>
            <textarea class="reg-textarea " id="reg-goods-services" name="goods_services"
                placeholder="Describe your business" rows="5" cols="87" required readonly>
                {{ $userDirectoryData->GoodsServices}}
            </textarea>



            <div class="form-group">
                <label for="fileInput" class="custom-file-label">Choose Profile Picture</label>
                <input type="file" id="fileInput"  name="logo" class="custom-file-input"
                    accept=".jpeg,.jpg,.png,.gif,.svg,.webp,.bmp,.tiff">

            </div>


           <div class="reg-submit-btn-box"> 
            <button type="submit" class="reg-submit-btn">Submit</button>
           </div>

        </form>
    </div>


    <!-- End Register form session -->


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
    
    
    
    <!--State of countries-->
    
    <script>
            // Pre-defined states for each country
           const statesByCountry = {
    Afghanistan: ["Badakhshan", "Badghis", "Baghlan", "Bamyan", "Daykundi",
        "Farah", "Faryab", "Ghazni", "Ghor", "Helmand",
        "Herat", "Jowzjan", "Kabul", "Kandahar", "Kapisa",
        "Khost", "Kunar", "Laghman", "Nangarhar", "Nimroz",
        "Nuristan", "Panjshir", "Parwan", "Samangan", "Sar-e Pol",
        "Takhar", "Urozgan", "Wardak", "Zabul"],
            SintMaarten: ["Dutch Side",
    "French Side"],
                Anguilla: [  "Blowing Point",
  "East End",
  "George Hill",
  "Island Harbour",
  "North Hill",
  "Sandy Ground",
  "Sandy Hill",
  "South Hill District",
  "Stoney Ground",
  "The Farrington",
  "The Quarter",
  "The Valley",
  "West End",
  "West End Village"],
    Albania: ["Berat", "Dibër", "Durrës", "Elbasan", "Fier",
        "Gjirokastër", "Korçë", "Kukës", "Lezhë", "Shkodër",
        "Tirana", "Vlorë"],
    Algeria: ["Adrar", "Chlef", "Laghouat", "Oum El Bouaghi", "Batna",
        "Béjaïa", "Biskra", "Béchar", "Blida", "Bouira",
        "Tamanrasset", "Tébessa", "Tlemcen", "Tiaret", "Tizi Ouzou",
        "Algiers", "Djelfa", "Jijel", "Sétif", "Saïda",
        "Skikda", "Sidi Bel Abbès", "Annaba", "Guelma", "Constantine",
        "Médéa", "Mostaganem", "M'Sila", "Mascara", "Ouargla",
        "Oran", "El Bayadh", "Illizi", "Bordj Bou Arréridj",
        "Boumerdès", "El Tarf", "Tindouf", "Tissemsilt",
        "El Oued", "Khenchela", "Souk Ahras", "Tipaza", "Mila",
        "Aïn Defla", "Naâma", "Aïn Témouchent", "Ghardaïa", "Relizane"],
    "American Samoa": ["Eastern District", "Western District", "Manu'a",
        "Rose Atoll", "Swains Island"],
    Andorra: ["Andorra la Vella", "Canillo", "Encamp", "Escaldes-Engordany",
        "La Massana", "Ordino", "Sant Julià de Lòria"],
    Angola: ["Bengo", "Benguela", "Bié", "Cabinda", "Cuando Cubango",
        "Cuanza Norte", "Cuanza Sul", "Cunene", "Huambo", "Huíla",
        "Luanda", "Lunda Norte", "Lunda Sul", "Malanje", "Moxico",
        "Namibe", "Uíge", "Zaire"],
    Antarctica: ["No states (territory administered by various international agreements)"],
    AntiguaAndBarbuda: ["Barbuda", "Redonda", "Saint George", "Saint John",
        "Saint Mary", "Saint Paul", "Saint Peter", "Saint Philip"],
    Argentina: ["Buenos Aires", "Catamarca", "Chaco", "Chubut", "Córdoba",
        "Corrientes", "Entre Ríos", "Formosa", "Jujuy", "La Pampa",
        "La Rioja", "Mendoza", "Misiones", "Neuquén", "Río Negro",
        "Salta", "San Juan", "San Luis", "Santa Cruz", "Santa Fe",
        "Santiago del Estero", "Tierra del Fuego", "Tucumán"],
    Armenia: ["Aragatsotn", "Ararat", "Armavir", "Gegharkunik", "Kotayk",
        "Lori", "Shirak", "Syunik", "Tavush", "Vayots Dzor",
        "Yerevan"],
    Aruba: ["No subdivisions (single unified jurisdiction)"],
    Australia: ["Australian Capital Territory", "New South Wales",
        "Northern Territory", "Queensland", "South Australia",
        "Tasmania", "Victoria", "Western Australia"],
    Austria: ["Burgenland", "Carinthia", "Lower Austria", "Upper Austria",
        "Salzburg", "Styria", "Tyrol", "Vorarlberg", "Vienna"],
    Azerbaijan: ["Absheron", "Agdam", "Agdash", "Aghjabadi", "Aghstafa",
        "Astara", "Baku", "Balakan", "Barda", "Beylagan",
        "Bilasuvar", "Bilecik", "Ganja", "Goranboy", "Goychay",
        "Guba", "Hajigabul", "Imishli", "Ismayilli", "Jabrayil",
        "Jalilabad", "Kurdamir", "Lankaran", "Lerik", "Mingachevir",
        "Naftalan", "Nakhchivan", "Neftchala", "Oguz", "Qabala",
        "Qazakh", "Quba", "Qubadli", "Qusar", "Saatli", "Sabirabad",
        "Sadarak", "Saki", "Shaki", "Shamakhi", "Shamkir", "Shusha",
        "Siazan", "Sumqayit", "Tartar", "Tovuz", "Ujar", "Yardimli",
        "Zangilan", "Zaqatala"],
    Bahamas: ["Acklins", "Andros", "Bimini", "Cat Island", "Exuma",
        "Grand Bahama", "Long Island", "New Providence", "Ragged Island",
        "San Salvador", "Inagua", "Mayaguana", "Berry Islands", "Abaco"],
    Bahrain: ["Capital", "Central", "Northern", "Southern"],
    Bangladesh: ["Barisal", "Chandpur", "Chittagong", "Dhaka", "Khulna",
        "Mymensingh", "Rajshahi", "Rangpur", "Sylhet"],
    Barbados: ["Christ Church", "Saint Andrew", "Saint David", "Saint George",
        "Saint James", "Saint John", "Saint Joseph", "Saint Lucy",
        "Saint Michael", "Saint Peter", "Saint Philip", "Saint Thomas"],
    Belarus: ["Brest", "Gomel", "Grodno", "Minsk", "Mogilev", "Vitebsk"],
    Belgium: ["Antwerp", "East Flanders", "Flemish Brabant", "Hainaut",
        "Liège", "Limburg", "Luxembourg", "Namur", "Walloon Brabant",
        "West Flanders"],
    Belize: ["Belize", "Cayo", "Corozal", "Orange Walk", "Stann Creek", "Toledo"],
    Benin: ["Alibori", "Atakora", "Atlantique", "Borgou", "Collines",
        "Donga", "Kouffo", "Littoral", "Mono", "Ouémé", "Plateau", "Zou"],
    Bermuda: ["No subdivisions (single unified jurisdiction)"],
    Bhutan: ["Bumthang", "Chukha", "Dagana", "Gasa", "Haa", "Paro", "Punakha",
        "Samdrup Jongkhar", "Sarpang", "Thimphu", "Trashigang",
        "Trashiyangtse", "Wangdue Phodrang", "Zhemgang"],
    Bolivia: ["Chuquisaca", "Cochabamba", "Colcha", "La Paz", "Oruro",
        "Pando", "Potosí", "Santa Cruz", "Tarija", "Beni", "Pando"],
    BosniaAndHerzegovina: ["Federation of Bosnia and Herzegovina", "Republika Srpska", "Brčko District"],
    Botswana: ["Central", "Ghanzi", "Kgalagadi", "Kgatleng", "Kweneng", "Ngami",
        "North-East", "North-West", "South-East", "Southern"],
    BouvetIsland: ["No subdivisions (unincorporated territory of Norway)"],
    Brazil: ["Acre", "Alagoas", "Amapá", "Amazonas", "Bahia", "Ceará",
        "Espírito Santo", "Goiás", "Maranhão", "Mato Grosso", "Mato Grosso do Sul",
        "Minas Gerais", "Pará", "Paraíba", "Paraná", "Pernambuco",
        "Piauí", "Rio de Janeiro", "Rio Grande do Norte", "Rio Grande do Sul",
        "Rondônia", "Roraima", "Santa Catarina", "São Paulo", "Sergipe",
        "Tocantins"],
    Brunei: ["Brunei-Muara", "Belait", "Tutong", "Temburong"],
    Bulgaria: ["Blagoevgrad", "Burgas", "Dobrich", "Gabrovo", "Haskovo",
        "Kardzhali", "Kyustendil", "Lovech", "Montana", "Pazardzhik",
        "Pernik", "Pleven", "Plovdiv", "Razgrad", "Ruse", "Shumen",
        "Silistra", "Sliven", "Smolyan", "Sofia", "Stara Zagora",
        "Targovishte", "Varna", "Veliko Tarnovo", "Vidin", "Vratza"],
    BurkinaFaso: ["Boucle du Mouhoun", "Cascades", "Centre", "Centre-Est",
        "Centre-Nord", "Centre-Ouest", "Centre-Sud", "Est", "Hauts-Bassins",
        "Nord", "Plateau-Central", "Sahel", "Sud-Ouest", "Est", "Nord"],
    Burundi: ["Bubanza", "Bujumbura Mairie", "Bururi", "Cankuzo", "Cibitoke",
        "Gitega", "Karuzi", "Kayanza", "Kirundo", "Makamba", "Muramvya",
        "Muyinga", "Mwaro", "Ngozi", "Rutana", "Ruyigi"],
    Cambodia: ["Banteay Meanchey", "Battambang", "Kampong Cham", "Kampong Chhnang",
        "Kampong Speu", "Kampong Thom", "Kandal", "Koh Kong", "Kratie",
        "Mondulkiri", "Phnom Penh", "Preah Vihear", "Prey Veng",
        "Pursat", "Ratanakiri", "Siem Reap", "Sihanoukville",
        "Stung Treng", "Svay Rieng", "Takeo", "Tboung Khmum"],
    Cameroon: ["Adamawa", "Centre", "East", "Far North", "Littoral", "North",
        "Northwest", "West", "South", "Southwest"],
    Canada: ["Alberta", "British Columbia", "Manitoba", "New Brunswick",
        "Newfoundland and Labrador", "Nova Scotia", "Ontario",
        "Prince Edward Island", "Quebec", "Saskatchewan"],
    CapeVerde: ["Boa Vista", "Brava", "Fogo", "Maio", "Sal", "Santiago",
        "Santo Antão", "São Nicolau", "São Vicente"],
    CaymanIslands: ["No subdivisions (single unified jurisdiction)"],
    CentralAfricanRepublic: ["Bamingui-Bangoran", "Bangui", "Basse-Kotto",
        "Haute-Kotto", "Haut-Mbomou", "Kémo", "Lobaye", "Mambéré-Kadéï",
        "Mbomou", "Nana-Mambéré", "Ombella-Mpoko", "Sangha-Mbaéré",
        "Vakaga", "Nana-Grébizi"],
    Chad: ["Bahr el Ghazal", "Borkou", "Chari-Baguirmi", "Guéra", "Kanem",
        "Lac", "Logone Occidental", "Logone Oriental", "Mandoul", "Mayo-Kebbi",
        "Moyen-Chari", "N'Djamena", "Ouaddaï", "Salamat", "Sila", "Tandjilé"],
    Chile: ["Antofagasta", "Araucanía", "Arica and Parinacota", "Atacama",
        "Aysén", "Bio-Bío", "Coquimbo", "Los Lagos", "Los Ríos",
        "Magallanes", "Maule", "Metropolitana", "Ñuble", "Tarapacá", "Valparaíso"],
    China: ["Anhui", "Beijing", "Chongqing", "Fujian", "Gansu", "Guangdong",
        "Guangxi", "Guizhou", "Hainan", "Hebei", "Heilongjiang", "Henan",
        "Hubei", "Hunan", "Jiangsu", "Jiangxi", "Jilin", "Liaoning",
        "Macau", "Ningxia", "Qinghai", "Shaanxi", "Shandong", "Shanghai",
        "Shanxi", "Sichuan", "Tianjin", "Tibet", "Xinjiang", "Yunnan",
        "Zhejiang"],
    ChristmasIsland: ["Flying Fish Cove", "Drumsite", "Poon Saan", "Silver City"],
    cocoskeelingislands: ["West Island", "Home Island", "South Island", "Direction Island"],
    Colombia: ["Amazonas", "Antioquia", "Arauca", "Atlántico", "Bogotá",
        "Bolívar", "Boyacá", "Caldas", "Caquetá", "Casanare", "Cauca",
        "Cesar", "Chocó", "Córdoba", "Cundinamarca", "Guainía", "Guaviare",
        "Huila", "La Guajira", "Magdalena", "Meta", "Nariño", "Norte de Santander",
        "Putumayo", "Quindío", "Risaralda", "San Andrés y Providencia", "Santander",
        "Sucre", "Tolima", "Valle del Cauca", "Vaupés", "Vichada"],
    Comoros: ["Anjouan", "Grande Comore", "Mohéli"],
    Congo: ["Bouenza", "Brazzaville", "Cuvette", "Cuvette-Ouest", "Kouilou",
        "Lekoumou", "Likouala", "Niari", "Plateaux", "Pool", "Sangha"],
    "Congo (Democratic Republic)": ["Bandundu", "Bas-Congo", "Équateur", "Kasai",
        "Kasai-Occidental", "Kasai-Oriental", "Katanga", "Kinshasa", "Maniema",
        "North Kivu", "Orientale", "South Kivu", "Sud-Kivu", "Tshuapa"],
    CookIslands: ["No subdivisions (single unified jurisdiction)"],
    CostaRica: ["Alajuela", "Cartago", "Guanacaste", "Heredia", "Limón", "Puntarenas",
        "San José"],
    CoteDIvoire: [
        "Abidjan", "Bas-Sassandra", "Comoé", "Denguélé", "Gôh-Djiboua", "Lacs", "Lagunes", "Montagnes",
        "Sassandra-Marahoué", "Savanes", "Vallée du Bandama", "Woroba", "Yamoussoukro", "Zanzan"
    ],
    Croatia: ["Bjelovar-Bilogora", "Brodsko-Posavska", "Dubrovnik-Neretva",
        "Istria", "Karlovac", "Koprivnica-Križevci", "Krapina-Zagorje",
        "Lika-Senj", "Međimurje", "Osijek-Baranja", "Požega-Slavonia",
        "Primorje-Gorski Kotar", "Šibenik-Knin", "Sisak-Moslavina",
        "Split-Dalmatia", "Varaždin", "Virovitica-Podravina", "Vukovar-Sirmium",
        "Zadar", "Zagreb"],
    Cuba: ["Artemisa", "Ciego de Ávila", "Cienfuegos", "Granma", "Guantánamo",
        "Havana", "Holguín", "Las Tunas", "Matanzas", "Pinar del Río",
        "Sancti Spíritus", "Santiago de Cuba", "Villa Clara"],
    Cyprus: ["Famagusta", "Kyrenia", "Larnaca", "Limassol", "Nicosia", "Paphos"],
    CzechRepublic: ["Prague", "Central Bohemian", "South Bohemian", "West Bohemian",
        "North Bohemian", "East Bohemian", "South Moravian", "North Moravian",
        "Olomouc", "Zlín", "Vysočina"],
    Denmark: ["Capital Region", "Central Jutland", "North Jutland", "Zealand",
        "Southern Denmark"],
    Djibouti: ["Ali Sabieh", "Dikhil", "Djibouti", "Obock", "Tadjourah"],
    Dominica: ["Saint Andrew", "Saint David", "Saint George", "Saint John",
        "Saint Joseph", "Saint Luke", "Saint Mark", "Saint Patrick",
        "Saint Paul"],
    DominicanRepublic: ["Azua", "Baoruco", "Barahona", "Dajabón", "Distrito Nacional",
        "Duarte", "Elías Piña", "El Seibo", "Espaillat", "Independencia",
        "La Altagracia", "La Romana", "La Vega", "Monseñor Nouel",
        "Monte Cristi", "Monte Plata", "Pedernales", "Peravia", "Puerto Plata",
        "Hato Mayor", "Samaná", "San Cristóbal", "San Juan", "San Pedro de Macorís",
        "Santiago", "Santiago Rodríguez", "Valverde"],
    EastTimor: ["Aileu", "Ainaro", "Baucau", "Bobonaro", "Covalima", "Díli",
        "Ermera", "Lautém", "Liquiçá", "Manatuto", "Manufahi", "Oecusse", "Viqueque"],
    Ecuador: ["Azuay", "Bolívar", "Cañar", "Carchi", "Chimborazo", "Cotopaxi",
        "El Oro", "Esmeraldas", "Guayas", "Imbabura", "Loja", "Los Ríos",
        "Manabí", "Morona Santiago", "Napo", "Orellana", "Pastaza", "Pichincha",
        "Tungurahua", "Zamora-Chinchipe"],
    Egypt: ["Alexandria", "Aswan", "Asyut", "Beheira", "Beni Suef", "Cairo", "Dakahlia",
        "Damietta", "Faiyum", "Gharbia", "Giza", "Ismailia", "Kafr el-Sheikh",
        "Luxor", "Matruh", "Minya", "Monufia", "New Valley", "Port Said",
        "Qalyubia", "Qena", "Red Sea", "Sharqia", "Sohag", "South Sinai",
        "Suez", "North Sinai"],
    ElSalvador: ["Ahuachapán", "Cabañas", "Chalatenango", "Cuscatlán",
        "La Libertad", "La Paz", "La Unión", "Morazán", "San Miguel",
        "San Salvador", "San Vicente", "Sonsonate", "Usulután"],
    EquatorialGuinea: ["Bioko Norte", "Bioko Sur", "Centro Sur", "Kie-Ntem",
        "Litoral", "Wele-Nzas"],
    Eritrea: ["Anseba", "Central", "Gash-Barka", "Maekel", "Northern Red Sea",
        "Southern Red Sea"],
    Estonia: ["Harju", "Hiiu", "Ida-Viru", "Jõgeva", "Järva", "Lääne", "Lääne-Viru",
        "Pärnu", "Põlva", "Rapla", "Saare", "Tartu", "Valga", "Viru", "Viljandi",
        "Võru"],
    Eswatini: ["Hhohho", "Lubombo", "Manzini", "Shiselweni"],
    Ethiopia: ["Addis Ababa", "Afar", "Amhara", "Benishangul-Gumuz", "Dire Dawa",
        "Gambela", "Harari", "Oromia", "Sidama", "Somali", "Tigray"],
    FalklandIslands: ["Stanley", "East Falkland", "West Falkland", "Outer Islands"],
    FaroeIslands: [
        "Tórshavn", "Klaksvík", "Runavík", "Fuglafjørður", "Tvøroyri", "Vestmanna", "Sandavágur",
        "Miðvágur", "Sørvágur", "Vágur", "Eiði", "Gjógv"
    ],
    Fiji: ["Central", "Eastern", "Northern", "Western"],
    Finland: ["Åland Islands", "Central Finland", "Eastern Finland", "Helsinki-Uusimaa",
        "Lapland", "Länsi-Suomi", "North Karelia", "Northern Ostrobothnia",
        "Ostrobothnia", "South Karelia", "Southern Ostrobothnia", "Southern Savonia",
        "Tavastia Proper", "Uusimaa", "Western Finland"],
    France: ["Auvergne-Rhône-Alpes", "Bourgogne-Franche-Comté", "Brittany", "Centre-Val de Loire",
        "Corsica", "Grand Est", "Hauts-de-France", "Île-de-France", "Normandy",
        "Nouvelle-Aquitaine", "Occitanie", "Pays de la Loire", "Provence-Alpes-Côte d'Azur"],
    Gabon: ["Estuaire", "Haut-Ogooué", "Moyen-Ogooué", "Ngounié", "Nyanga", "Ogooué-Ivindo",
        "Ogooué-Lolo", "Ogooué-Maritime", "Woleu-Ntem"],
    Gambia: ["Banjul", "Lower River", "North Bank", "Upper River", "Western"],
    Georgia: ["Abkhazia", "Ajaria", "Guria", "Imereti", "Kakheti", "Kvemo Kartli", "Mtskheta-Mtianeti",
        "Racha-Lechkhumi and Kvemo Svaneti", "Samegrelo-Zemo Svaneti", "Samtskhe-Javakheti", "Shida Kartli", "Tbilisi"],
    Germany: ["Baden-Württemberg", "Bavaria", "Berlin", "Brandenburg", "Bremen", "Hamburg",
        "Hesse", "Lower Saxony", "Mecklenburg-Vorpommern", "North Rhine-Westphalia",
        "Rhineland-Palatinate", "Saarland", "Saxony", "Saxony-Anhalt", "Schleswig-Holstein",
        "Thuringia"],
    Ghana: ["Ahafo", "Ashanti", "Bono", "Bono East", "Central", "Eastern", "Greater Accra",
        "Northern", "Oti", "Savannah", "Western", "Western North", "Upper East", "Upper West"],
    Gibraltar: ["Gibraltar"],

    Greece: ["Attica", "Central Greece", "Central Macedonia", "Crete", "Eastern Macedonia and Thrace",
        "Ionian Islands", "North Aegean", "Peloponnese", "South Aegean", "Thessaly", "Western Greece",
        "Western Macedonia"],

    Greenland: ["Avannaata", "Kommuneqarfik Sermersooq", "Qeqertalik", "Kujalleq", "Qeqqata",
        "Arctic Frontier", "Iceberg Coast", "Capital Region", "Eastern Wilderness",
        "Southern Greenbelt", "Western Settlements", "Central Plateau"],


    Grenada: ["Saint Andrew", "Saint David", "Saint George", "Saint John", "Saint Mark", "Saint Patrick"],
    Guadeloupe: ["Basse-Terre", "Grande-Terre", "Marie-Galante", "La Désirade", "Les Saintes"],
    Guatemala: ["Chimaltenango", "Escuintla", "Guatemala", "Huehuetenango", "Izabal", "Jalapa",
        "Jutiapa", "Petén", "Quetzaltenango", "Quiché", "Retalhuleu", "Sacatepéquez",
        "San Marcos", "Santa Rosa", "Sololá", "Suchitepéquez", "Totonicapán", "Zacapa"],
    Guinea: ["Boké", "Conakry", "Faranah", "Kankan", "Kindia", "Labé", "Mamou", "Nzérékoré"],
    GuineaBissau: ["Bafatá", "Biombo", "Bolama", "Cacheu", "Gabu", "Oio", "Quinara", "Tombali"],
    Guyana: ["Barima-Waini", "Cuyuni-Mazaruni", "Demerara-Mahaica", "East Berbice-Corentyne",
        "Essequibo Islands-West Demerara", "Mahaica-Berbice", "Pomeroon-Supenaam", "Upper Demerara-Berbice",
        "Upper Takutu-Upper Essequibo"],
    Haiti: ["Artibonite", "Centre", "Grand'Anse", "Nippes", "Nord", "Nord-Est", "Nord-Ouest", "Ouest", "Sud", "Sud-Est"],
    Honduras: ["Atlántida", "Choluteca", "Colón", "Comayagua", "Copán", "Cortés", "La Paz",
        "Intibucá", "Islas de la Bahía", "Lempira", "Ocotepeque", "Olancho", "Santa Bárbara",
        "La Paz", "Valle", "Yoro"],
    HongKong: ["Central and Western", "Eastern", "Islands", "Kowloon City", "Kwai Tsing", "Kwun Tong",
        "North", "Sai Kung", "Sha Tin", "Sham Shui Po", "Southern", "Tai Po", "Tsuen Wan", "Tuen Mun",
        "Wan Chai", "Wong Tai Sin", "Yau Tsim Mong", "Yuen Long"
    ],
    Hungary: ["Bács-Kiskun", "Baranya", "Békés", "Borsod-Abaúj-Zemplén", "Budapest",
        "Csongrád-Csanád", "Fejér", "Győr-Moson-Sopron", "Hajdú-Bihar", "Heves", "Jász-Nagykun-Szolnok",
        "Komárom-Esztergom", "Nógrád", "Pest", "Somogy", "Szabolcs-Szatmár-Bereg", "Tolna",
        "Vas", "Veszprém", "Zala"],
    Iceland: ["Capital Region", "East", "North", "Northeast", "South", "Southwest", "West", "Westfjords"],
    India: ["Andaman and Nicobar Islands", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar",
        "Chandigarh", "Chhattisgarh", "Dadra and Nagar Haveli", "Daman and Diu", "Delhi", "Goa",
        "Gujarat", "Haryana", "Himachal Pradesh", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep",
        "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Odisha",
        "Puducherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Telangana", "Tripura", "Uttarakhand",
        "Uttar Pradesh", "West Bengal"],
    Indonesia: ["Aceh", "Bali", "Banten", "Bengkulu", "Gorontalo", "Jakarta", "Jambi", "Jawa Barat",
        "Jawa Tengah", "Jawa Timur", "Kalimantan Barat", "Kalimantan Selatan", "Kalimantan Tengah",
        "Kalimantan Timur", "Kepulauan Bangka Belitung", "Kepulauan Riau", "Lampung", "Maluku",
        "Maluku Utara", "Nusa Tenggara Barat", "Nusa Tenggara Timur", "Papua", "Papua Barat", "Riau",
        "Sulawesi Barat", "Sulawesi Selatan", "Sulawesi Tengah", "Sulawesi Tenggara", "Sulawesi Utara",
        "Sumatera Barat", "Sumatera Selatan", "Sumatera Utara", "Yogyakarta"],
    IranIslamicRepublicOf: ["Alborz", "Azarbaijan-e-Sharqi", "Azarbaijan-e-Gharbi", "Bushehr", "Chaharmahal and Bakhtiari",
        "Esfahan", "Fars", "Gilan", "Golestan", "Hamadan", "Hormozgan", "Ilam", "Kerman", "Kermanshah",
        "Khorasan-e-Razavi", "Kohgiluyeh and Boyer-Ahmad", "Kurdistan", "Lorestan", "Markazi",
        "Mazandaran", "Ostan-e Tehran", "Qazvin", "Qom", "Semnan", "Sistan and Baluchestan", "Tehran",
        "Yazd", "Zanjan"],
    Iraq: ["Al-Anbar", "Al-Qadisiyyah", "Baghdad", "Basra", "Dahuk", "Dhi Qar", "Diyala", "Erbil", "Karbala",
        "Kirkuk", "Maysan", "Muthanna", "Najaf", "Nineveh", "Qadisiya", "Salah ad-Din", "Sulaymaniyah",
        "Wasit"],
    Ireland: ["Carlow", "Cavan", "Clare", "Cork", "Donegal", "Dublin", "Galway", "Kerry", "Kildare", "Kilkenny",
        "Laois", "Leitrim", "Limerick", "Longford", "Louth", "Mayo", "Meath", "Monaghan", "Offaly", "Roscommon",
        "Sligo", "Tipperary", "Waterford", "Westmeath", "Wexford", "Wicklow"],
    Israel: ["Central District", "Haifa", "Jerusalem District", "Northern District", "Southern District",
        "Tel Aviv"],
    Italy: ["Abruzzo", "Basilicata", "Calabria", "Campania", "Emilia-Romagna", "Friuli Venezia Giulia",
        "Lazio", "Liguria", "Lombardy", "Marche", "Molise", "Piedmont", "Puglia", "Sardinia", "Sicily",
        "Tuscany", "Trentino-Alto Adige/Südtirol", "Umbria", "Veneto"],
    IvoryCoast: ["Abidjan", "Bas-Sassandra", "Comoé", "Denguelé", "Gôh", "Lacs", "Lagunes", "Marahoué",
        "Montagnes", "Sassandra-Marahoué", "Savanes", "Vallée du Bandama", "Zanzan"],
    Jamaica: ["Clarendon", "Hanover", "Kingston", "Manchester", "Portland", "Saint Andrew", "Saint Ann",
        "Saint Catherine", "Saint Elizabeth", "Saint James", "Saint Mary", "Saint Thomas", "Trelawny",
        "Westmoreland"],
    Japan: ["Aichi", "Akita", "Aomori", "Chiba", "Ehime", "Fukuoka", "Fukui", "Fukushima", "Gifu", "Gunma",
        "Hiroshima", "Hokkaido", "Hyogo", "Ibaraki", "Ishikawa", "Ibaraki", "Ishikawa", "Ishikawa",
        "Kagawa", "Kagoshima", "Kinki", "Kyoto", "Kochi", "Mie", "Nagasaki", "Nagasaki", "Nagasaki",
        "Nagasaki"],
    Jordan: ["Ajloun", "Amman", "Irbid", "Jerash", "Maan", "Madaba", "Ma'an", "Mafraq", "Tafila", "Zarqa"],
    Kazakhstan: ["Akmola", "Aktobe", "Almaty", "Atyrau", "East Kazakhstan", "Jambyl", "Karaganda", "Kostanay",
        "Kyzylorda", "Mangystau", "North Kazakhstan", "Pavlodar", "South Kazakhstan", "West Kazakhstan", "Zhambyl"],
    Kenya: ["Baringo", "Bomet", "Bungoma", "Busia", "Elgeyo-Marakwet", "Embu", "Garissa", "Homa Bay", "Isiolo",
        "Kajiado", "Kakamega", "Kericho", "Kiambu", "Kilifi", "Kirinyaga", "Kisii", "Kisumu", "Kitui", "Kwale",
        "Laikipia", "Lamu", "Machakos", "Makueni", "Mandera", "Marsabit", "Meru", "Migori", "Mombasa", "Murang'a",
        "Nairobi", "Nakuru", "Nandi", "Narok", "Nyamira", "Nyandarua", "Nyanza", "Samburu", "Siaya", "Taita Taveta",
        "Tana River", "Tharaka Nithi", "Trans-Nzoia", "Uasin Gishu", "Vihiga", "Wajir", "West Pokot", "Kisumu", "Mombasa"],
    Kiribati: ["Gilbert Islands", "Line Islands", "Phoenix Islands"],
    NorthKorea: ["Chagang", "Hamgyong", "Hwanghae", "Kaesong", "Kangwon", "Koryo", "Pyeongan", "Ryanggang",
        "South Hamgyong", "South Hwanghae", "Sunan", "Sinuiju", "Pyongyang", "Wonsan", "Busan", "Chungcheongbuk", "Chungcheongnam", "Daegu", "Daejeon", "Gyeonggi", "Gyeongsangbuk",
        "Gyeongsangnam", "Incheon", "Jeju", "Jeollabuk", "Jeollanam", "Sejong", "Seoul", "Ulsan"],
    SouthKorea: ["Busan", "Chungcheongbuk", "Chungcheongnam", "Daegu", "Daejeon", "Gyeonggi", "Gyeongsangbuk",
        "Gyeongsangnam", "Incheon", "Jeju", "Jeollabuk", "Jeollanam", "Sejong", "Seoul", "Ulsan"],
    Kosovo: ["District of Peja", "District of Mitrovica", "District of Pristina", "District of Gjilan", "District of Ferizaj", "District of Prizren"],
    Kuwait: ["Al Asimah", "Al Jahra", "Al Ahmadi", "Farwaniya", "Hawalli", "Mubarak Al Kabeer"],
    Kyrgyzstan: ["Bishkek", "Chuy", "Jalal-Abad", "Naryn", "Osh", "Talas", "Issyk-Kul", "Batken", "Karakol", "Osh"],
    Laos: ["Attapeu", "Bokeo", "Champasak", "Huaphan", "Khammouane", "Luang Namtha", "Luang Prabang", "Oudomxay",
        "Phongsaly", "Salavan", "Savannakhet", "Sekong", "Vientiane", "Xaignabouli", "Xekong", "Xieng Khouang"],
    Latvia: ["Aizkraukle", "Alūksne", "Balvi", "Bauska", "Cēsis", "Daugavpils", "Jurmala", "Jelgava", "Jurmala",
        "Liepaja", "Limbazi", "Ludza", "Madona", "Ogre", "Preiļi", "Rezekne", "Riga", "Rugāji", "Talsi", "Tukums",
        "Valmiera", "Ventspils"],
    Lebanon: ["Akkar", "Beqaa", "Beirut", "Mount Lebanon", "North Lebanon", "Nabatieh", "South Lebanon", "Baabda",
        "Jbeil", "Matn", "Bint Jbeil", "Zahle", "Zahrani"],
    Lesotho: ["Berea", "Butha-Buthe", "Leribe", "Mafeteng", "Maseru", "Mohale's Hoek", "Mokhotlong", "Qacha's Nek",
        "Quthing", "Thaba-Tseka"],
    Liberia: ["Bomi", "Bong", "Gbarpolu", "Grand Bassa", "Grand Cape Mount", "Grand Gedeh", "Grand Kru", "Lofa",
        "Margibi", "Maryland", "Montserrado", "Nimba", "River Cess", "River Gee", "Sinoe"],
    LibyaStateOf: ["Ajdabiya", "Al Aziziya", "Al Bayda", "Al Kufrah", "Al Marj", "Al Jufrah", "An Nuqat al Khams",
        "Azzawiya", "Benghazi", "Derna", "Ghat", "Misrata", "Murzuq", "Sabratha", "Sebha", "Sirte", "Tarhuna",
        "Tripoli", "Zliten", "Zuwara"],
    Liechtenstein: ["Balzers", "Eschen", "Gamprin", "Grabs", "Mauren", "Schaan", "Schellenberg", "Silz", "Balzers"],
    Lithuania: ["Alytus", "Kaunas", "Klaipėda", "Marijampolė", "Panevėžys", "Šiauliai", "Tauragė", "Telšiai", "Utena",
        "Vilnius", "Kėdainiai", "Klaipėda", "Joniškis"],
    Luxembourg: ["Capellen", "Clervaux", "Ettelbruck", "Grevenmacher", "Luxembourg", "Mersch", "Redange", "Remich",
        "Vianden"],
    Madagascar: ["Antananarivo", "Antsiranana", "Fianarantsoa", "Mahajanga", "Toamasina", "Toliara"],
    Malawi: ["Blantyre", "Chikwawa", "Chiradzulu", "Kasungu", "Lilongwe", "Machinga", "Mangochi", "Mulanje", "Mchinji",
        "Nkhata Bay", "Nkhotakota", "Phalombe", "Rumphi", "Salima", "Zomba", "Ntchisi"],
    Malaysia: ["Johor", "Kedah", "Kelantan", "Melaka", "Negeri Sembilan", "Pahang", "Perak", "Perlis", "Pulau Pinang",
        "Selangor", "Terengganu", "Kuala Lumpur", "Labuan", "Putrajaya"],
    Maldives: ["Baa", "Dhaalu", "Gaafu Alif", "Gaafu Dhaalu", "Gnaviyani", "Haa Alif", "Haa Dhaalu", "Kaafu",
        "Laamu", "Lhaviyani", "Makunudhoo", "Meemu", "Noonu", "Raa", "Seenu", "Shaviyani", "Thaa", "Vaavu"],
    Mali: ["Bamako", "Gao", "Kayes", "Kidal", "Koulikoro", "Mopti", "Ségou", "Sikasso", "Tombouctou"],
    Malta: ["Gozo", "Malta"],
    MarshallIslands: ["Ailinglaplap", "Ailuk", "Arno", "Aur", "Bikar", "Enewetak", "Jabat", "Jemo", "Kili",
        "Kwajalein", "Lae", "Lib", "Likiep", "Majuro", "Maloelap", "Mejit", "Namorik", "Namu", "Rongelap", "Rongrik",
        "Ujae"],
    Mauritania: ["Adrar", "Assaba", "Brakna", "Gorgol", "Guidimaka", "Hodh ech Chargui", "Hodh el Gharbi", "Inchiri",
        "Nouakchott", "Nouadhibou", "Tagant", "Tiris Zemmour", "Trarza"],
    Mauritius: ["Black River", "Flacq", "Grand Port", "Moka", "Pamplemousses", "Plaines Wilhems", "Port Louis",
        "Riviere du Rempart", "Savanne"],
    Mexico: ["Aguascalientes", "Baja California", "Baja California Sur", "Campeche", "Chiapas", "Chihuahua", "Coahuila",
        "Colima", "Durango", "Guanajuato", "Guerrero", "Hidalgo", "Jalisco", "Mexico City", "Mexico State",
        "Michoacán", "Morelos", "Nayarit", "Nuevo Leon", "Oaxaca", "Puebla", "Querétaro", "Quintana Roo", "San Luis Potosi",
        "Sinaloa", "Sonora", "Tabasco", "Tamaulipas", "Tlaxcala", "Veracruz", "Yucatan", "Zacatecas"],
    Moldova: ["Anenii Noi", "Bălți", "Briceni", "Cahul", "Căușeni", "Chisinau", "Cimislia", "Călărași", "Cantemir",
        "Dubăsari", "Edineț", "Glodeni", "Hâncești", "Ialoveni", "Leova", "Nisporeni", "Orhei", "Rezina", "Soroca",
        "Strășeni", "Taraclia", "Ungheni", "Cahul"],
    Monaco: ["Monaco"],
    Mongolia: ["Arhangai", "Bayan-Ölgii", "Bayankhongor", "Bulgan", "Dornod", "Dornogovi", "Dundgovi", "Govi-Altai",
        "Govisümber", "Khentii", "Khovd", "Khövsgöl", "Ömnögovi", "Selenge", "Töv", "Uvs", "Zavkhan"],
    Montenegro: ["Andrijevica", "Bijelo Polje", "Budva", "Cetinje", "Danilovgrad", "Herceg Novi", "Kolasin", "Kotor",
        "Mojkovac", "Nikšić", "Plav", "Pljevlja", "Plevlja", "Tivat", "Zabljak"],
    Morocco: ["Azilal", "Beni Mellal", "Boulemane", "Casablanca-Settat", "Chaouia-Ouardigha", "Doukkala-Abda", "El Haouz",
        "El Jadida", "Fès-Meknès", "Figuig", "Guelmim-Oued Noun", "Ifrane", "Kénitra", "L'Oriental", "Marrakech-Tensift-Al Haouz",
        "Meknès-Tafilalet", "Midelt", "Oujda", "Rabat-Salé-Zemmour-Zaër", "Sous-Massa-Draa", "Tanger-Tétouan", "Taza-Al Hoceima-Taounate",
        "Tangier"],
    Mozambique: ["Cabo Delgado", "Gaza", "Inhambane", "Manica", "Maputo", "Maputo City", "Nampula", "Niassa", "Sofala",
        "Tete", "Zambezia"],
    Namibia: ["Erongo", "Hardap", "Karas", "Kavango East", "Kavango West", "Khomas", "Kunene", "Otjozondjupa",
        "Oshana", "Oshikoto", "Otjozondjupa", "Zambezi"],
    Nauru: ["Aiwo", "Anabar", "Baiti", "Boer", "Buada", "Denigomodu", "Ewa", "Ijuw", "Meneng", "Nauru", "Uaboe", "Yaren"],
    Nepal: ["Bagmati", "Bheri", "Chandragiri", "Dhanusa", "Gandaki", "Lumbini", "Madhesh", "Mechi", "Midwestern",
        "Province No. 1", "Province No. 2", "Province No. 5", "Province No. 7", "Sudarshan", "Sudur Pashchim"],
    Netherlands: ["Drenthe", "Flevoland", "Friesland", "Gelderland", "Groningen", "Limburg", "North Brabant", "North Holland",
        "Overijssel", "South Holland", "Utrecht", "Zeeland", "Gelderland", "Flevoland"],
    NetherlandsAntilles: ["Bonaire", "Curaçao", "Saba", "Sint Eustatius", "Sint Maarten"],
    NewCaledonia: ["South Province (Province Sud)", "North Province (Province Nord)", "Loyalty Islands Province (Province des Îles Loyauté)"],
    NewZealand: ["Auckland", "Bay of Plenty", "Canterbury", "Chatham Islands", "Gisborne", "Hawke's Bay", "Manawatu-Wanganui",
        "Marlborough", "Nelson", "Northland", "Otago", "Southland", "Taranaki", "Tasman", "Waikato", "Wellington", "West Coast"],
    Nicaragua: ["Boaco", "Carazo", "Chinandega", "Chontales", "Estelí", "Granada", "Jinotega", "León", "Madriz", "Managua",
        "Masaya", "Matagalpa", "Nueva Segovia", "Rivas", "Río San Juan"],
    Niger: ["Agadez", "Diffa", "Dosso", "Maradi", "Niamey", "Tillabéri", "Tiller", "Zinder"],
    Nigeria: ["Abia", "Adamawa", "Akwa Ibom", "Anambra", "Bauchi", "Bayelsa", "Benue", "Borno", "Cross River", "Delta",
        "Ebonyi", "Edo", "Ekiti", "Enugu", "Gombe", "Imo", "Jigawa", "Kaduna", "Kano", "Katsina", "Kebbi", "Kogi", "Kwara",
        "Lagos", "Nasarawa", "Niger", "Ogun", "Ondo", "Osun", "Oyo", "Plateau", "Rivers", "Sokoto", "Taraba", "Yobe", "Zamfara"],
    Niue: ["Alofi", "Avatele", "Hakupu", "Liku", "Makefu", "Mutalau", "Toi", "Tamakautoga", "Tupumai", "Vailoa", "Vaitogi"],
    NorfolkIsland: ["Kingston", "Burnt Pine", "Anson Bay", "Longridge", "Cemetery Bay"
    ],
    NorthernMarianaIslands: ["Saipan", "Tinian", "Rota", "Guam", "Agrihan", "Pagan", "Alamagan", "Anatahan",
        "Sarigan", "Asuncion"],
    Guam: ["Agana Heights", "Agat", "Asan-Maina", "Barrigada", "Chalan Pago-Ordot",
        "Dededo", "Hagatna", "Inarajan", "Mangilao", "Merizo", "Mongmong-Toto-Maite",
        "Piti", "Santa Rita", "Sinajana", "Talofofo", "Tamuning-Tumon-Harmon",
        "Umatac", "Yigo", "Yona"],
    SouthKorea: ["Seoul", "Busan", "Daegu", "Incheon", "Gwangju", "Daejeon", "Ulsan",
        "Sejong", "Gyeonggi-do", "Gangwon-do", "Chungcheongbuk-do",
        "Chungcheongnam-do", "Jeollabuk-do", "Jeollanam-do", "Gyeongsangbuk-do",
        "Gyeongsangnam-do", "Jeju"],
    NorthKorea: ["Pyongyang", "Rason", "Chagang", "North Hamgyong", "South Hamgyong",
        "North Hwanghae", "South Hwanghae", "Kangwon", "North Pyongan",
        "South Pyongan", "Ryanggang", "Nampo", "Kaesong"],
    Macao: ["Macau Peninsula", "Taipa", "Coloane", "Cotai"],
    Macedonia: ["Central Macedonia", "Eastern Macedonia and Thrace", "Western Macedonia"],
    Martinique: ["Fort-de-France", "Le Lamentin", "Le Robert", "Saint-Pierre", "Schoelcher",
        "La Trinité", "Le Marin", "Les Trois-Îlets", "Le François", "Rivière-Pilote",
        "Le Vauclin", "Saint-Joseph", "Saint-Esprit", "Le Prêcheur", "Basse-Pointe",
        "L'Ajoupa-Bouillon", "Le Morne-Rouge", "Case-Pilote", "Les Anses-d'Arlet",
        "Ducos", "La Plaine-des-Terres-Sainville", "Grand-Rivière", "Le Carbet", "Petit-Bourg"],
    NorthMacedonia: ["Berovo", "Bitola", "Blatec", "Debar", "Kavadarci", "Kochani", "Kumanovo", "Ohrid", "Prilep", "Radovis",
        "Resen", "Skopje", "Stip", "Strumica", "Struga"],
    Norway: ["Akershus", "Aust-Agder", "Buskerud", "Finnmark", "Hedmark", "Hordaland", "Møre og Romsdal", "Nordland",
        "Oslo", "Rogaland", "Sogn og Fjordane", "Sør-Trøndelag", "Telemark", "Troms", "Vest-Agder", "Vestfold", "Viken"],
    Oman: ["Ad Dakhiliyah", "Al Batinah North", "Al Batinah South", "Al Dahirah", "Al Hajar", "Al Sharqiyah North", "Al Sharqiyah South",
        "Dhofar", "Musandam", "Muscat", "North Batinah", "South Batinah", "Sohar"],
    Pakistan: ["Balochistan", "Khyber Pakhtunkhwa", "Punjab", "Sindh", "Islamabad", "Azad Jammu and Kashmir",
        "Gilgit-Baltistan"],
    Mayotte: ["Mamoudzou", "Dembéni", "Bandraboua", "Bouéni", "Chiconi", "Chirongui",
        "Hamouro", "Kani-Kéli", "Koungou", "Mtsamboro", "Ouangani", "Tsingoni"],
    Palau: ["Aimeliik", "Angaur", "Babeldaob", "Kayangel", "Koror", "Melekeok", "Ngaraard", "Ngchesar", "Ngarchelong",
        "Ngiwal", "Peleliu", "Sonsorol"],
    Palestine: ["Al-Aqsa Mosque", "Bethlehem", "Gaza", "Hebron", "Jenin", "Jericho", "Judea and Samaria", "Nablus",
        "Qalqilya", "Ramallah", "Salfit", "Tulkarm", "Tubas", "North Gaza", "Central Gaza", "Southern Gaza"],
    Panama: ["Bocas del Toro", "Chiriquí", "Coclé", "Colón", "Darien", "Herrera", "Los Santos", "Panama", "San Blas",
        "Veraguas"],
    PapuaNewGuinea: ["Central", "Chimbu", "Eastern Highlands", "East New Britain", "East Sepik", "Enga", "Madang", "Manus",
        "Milne Bay", "Morobe", "National Capital District", "New Ireland", "Oro", "Southern Highlands", "Western Highlands",
        "Western Province", "New Britain", "West New Britain"],
    Paraguay: ["Alto Parana", "Amambay", "Boquerón", "Caaguazú", "Caazapá", "Central", "Concepción", "Cordillera", "Guairá",
        "Itapúa", "Misiones", "Ñeembucú", "Paraguarí", "Presidente Hayes", "San Pedro", "Canindeyú"],
    Peru: ["Amazonas", "Ancash", "Apurímac", "Arequipa", "Ayacucho", "Cajamarca", "Cusco", "Huancavelica", "Huánuco",
        "Ica", "Junín", "La Libertad", "Lambayeque", "Lima", "Loreto", "Madre de Dios", "Moquegua", "Pasco", "Piura",
        "Puno", "San Martín", "Tacna", "Tumbes", "Ucayali"],
    Philippines: ["Abra", "Agusan del Norte", "Agusan del Sur", "Aklan", "Albay", "Antique", "Apayao", "Aurora",
        "Basilan", "Bataan", "Batanes", "Batangas", "Benguet", "Bohol", "Bukidnon", "Bulacan", "Cagayan", "Camarines Norte",
        "Camarines Sur", "Camiguin", "Capiz", "Catanduanes", "Cavite", "Cebu", "Compostela Valley", "Cotabato", "Davao",
        "Davao del Norte", "Davao del Sur", "Davao Occidental", "Davao Oriental", "Dinagat Islands", "Eastern Samar",
        "Guimaras", "Ifugao", "Ilocos Norte", "Ilocos Sur", "Iloilo", "Isabela", "Kalinga", "Kamarines Sur", "Laguna", "Lanao del Norte"],
    Poland: ["Lubusz", "Lublin", "Lubusz", "Malopolska", "Mazovia", "Opole", "Podlaskie", "Podkarpackie", "Pomerania",
        "Silesia", "Swietokrzyskie", "Warmia-Mazury", "West Pomeranian", "Greater Poland"],
    Portugal: ["Aveiro", "Azores", "Beja", "Braga", "Bragança", "Castelo Branco", "Coimbra", "Évora", "Funchal", "Guarda",
        "Leiria", "Lisbon", "Madeira", "Oporto", "Portalegre", "Santarem", "Setúbal", "Viana do Castelo", "Vila Real", "Viseu"],
    PuertoRico: ["Aguada", "Aguadilla", "Aguas Buenas", "Anasco", "Arecibo", "Arroyo", "Barceloneta", "Barranquitas",
        "Bayamón", "Cabo Rojo", "Caguas", "Camuy", "Carolina", "Cataño", "Cayey", "Ceiba", "Ciales", "Cidra", "Coamo",
        "Comerío", "Corozal", "Culebra", "Dorado", "Fajardo", "Florida", "Guayanilla", "Guaynabo", "Hormigueros", "Humacao",
        "Isabela", "Jayuya", "Juana Díaz", "Juncos", "Lajas", "Lares", "Las Marías", "Las Piedras", "Loíza", "Luquillo",
        "Manatí", "Maricao", "Maunabo", "Moca", "Morovis", "Naguabo", "Naranjito", "Orocovis", "Patillas", "Ponce",
        "Quebradillas", "Rincón", "Rio Grande", "Sabana Grande", "Salinas", "San Germán", "San Juan", "San Lorenzo",
        "San Sebastián", "Santa Isabel", "Toa Alta", "Toa Baja", "Trujillo Alto", "Utuado", "Vega Alta", "Vega Baja", "Vieques",
        "Villalba", "Yabucoa", "Yauco"],
    Rwanda: ["Eastern Province", "Kigali", "Northern Province", "Western Province", "Southern Province"],
    Montserrat: ["Saint Anthony", "Saint George", "Saint Peter", "Trinity"],
    Myanmar: ["Kachin", "Kayah", "Kayin", "Chin", "Mon", "Rakhine", "Shan"],
    SaintKittsandNevis: ["Saint Kitts", "Nevis"],
    Pitcairn: ["Pitcairn", "Henderson", "Ducie", "Oeno"],
    SaintLucia: ["Castries", "Choiseul", "Dennery", "Gros Islet", "Laborie", "Micoud", "Soufrière", "Vieux Fort"],
    SaintVincentandtheGrenadines: ["Charlotte", "Grenadines", "Kingstown", "Saint Andrew", "Saint David", "Saint George", "Saint Patrick"],
    Samoa: ["A'ana", "Atua", "Fa'asaleleaga", "Hana", "Maga'aifoa", "Palauli", "Satupaitea", "Tuala", "Tuamasaga", "Vaisigano"],
    SanMarino: ["Acquaviva", "Borgo Maggiore", "Chiesanuova", "Domagnano", "Faetano", "Fiorentino", "Serravalle"],
    SaoTomeandPrincipe: ["Príncipe", "Sao Tome"],
    SaudiArabia: ["Riyadh", "Makkah", "Medina", "Eastern Province", "Asir", "Tabuk", "Hail", "Northern Borders",
        "Jazan", "Najran", "Baha", "Al-Jouf", "Qassim"],
    Senegal: ["Dakar", "Diourbel", "Fatick", "Kaffrine", "Kaolack", "Kedougou", "Kolda", "Louga", "Matam", "Saint-Louis",
        "Sedhiou", "Tambacounda", "Thies", "Ziguinchor"],
    Serbia: ["Belgrade", "Vojvodina", "Central Serbia", "Kosovo", "Metohija", "Novi Sad", "Subotica", "Kragujevac"],
    Seychelles: ["Anse Aux Pins", "Anse Boileau", "Anse Etoile", "Baie Lazare", "Baie Sainte Anne", "Bel Air", "Bel Ombre",
        "Cascade", "Glacis", "Grand Anse", "La Digue", "Les Mamelles", "Mont Fleuri", "Plaisance", "Port Glaud", "Providence",
        "Takamaka"],
    SierraLeone: ["Bo", "Bombali", "Bonthe", "Kailahun", "Kambia", "Kenema", "Kono", "Moyamba", "Port Loko", "Pujehun",
        "Tonkolili", "Western Area"],
    Singapore: ["Central Region", "Eastern Region", "North Region", "North-East Region", "West Region"],
    Slovakia: ["Bratislava", "Košice", "Nitra", "Prešov", "Trnava", "Trenčín", "Žilina"],
    Slovenia: ["Pomurska", "Podravska", "Osrednjeslovenska", "Jugovzhodna Slovenija", "Jugovzhodna", "Primorsko-notranjska",
        "Osrednjeslovenska", "Obalno-Kraška", "Posavje", "Pomurska"],
    SolomonIslands: ["Guadalcanal", "Malaita", "Central Province", "Western Province", "Makira-Ulawa", "Choiseul", "Honiara"],
    Somalia: ["Awdal", "Banaadir", "Bariga", "Bari", "Bay", "Galgaduud", "Gedo", "Hiiraan", "Jubbada Dhexe", "Jubbada Hoose",
        "Mudug", "Nugaal", "Sool", "Shabeellaha Dhexe", "Shabeellaha Hoose", "Sanaag", "Sool", "Sool and Sanaag"],
    SouthAfrica: ["Eastern Cape", "Free State", "Gauteng", "KwaZulu-Natal", "Limpopo", "Mpumalanga", "North West",
        "Northern Cape", "Western Cape"],
    SouthSudan: ["Central Equatoria", "Eastern Equatoria", "Jonglei", "Lakes", "Northern Bahr el Ghazal", "Western Bahr el Ghazal",
        "Western Equatoria", "Unity", "Upper Nile", "Warab"],
    Spain: ["Andalusia", "Aragon", "Asturias", "Balearic Islands", "Basque Country", "Canary Islands", "Cantabria", "Castile and Leon",
        "Castile-La Mancha", "Catalonia", "Extremadura", "Galicia", "Madrid", "Murcia", "Navarre", "La Rioja", "Valencian Community"],
    SriLanka: ["Central", "Eastern", "Northern", "North Western", "Sabaragamuwa", "Southern", "Uva", "Western"],
    Sudan: ["Al Bahr al Ahmar", "Al Khartoum", "Al Qadarif", "An-Nil al Abyad", "An-Nil al Gharbi", "Blue Nile", "Central Darfur",
        "East Darfur", "Gedaref", "Gezira", "Khartoum", "Kordofan", "Northern", "North Darfur", "Red Sea", "Sennar", "South Darfur",
        "West Darfur", "White Nile", "Southern Kordofan"],
    Suriname: ["Brokopondo", "Commewijne", "Coronie", "Demerara-Mahaica", "East Berbice-Corentyne", "Essequibo Islands-West Demerara",
        "Marowijne", "Nickerie", "Paramaribo", "Saramacca", "Wanica"],
    Sweden: ["Blekinge", "Dalarna", "Gävleborg", "Halland", "Jämtland", "Jönköping", "Kalmar", "Kronoberg", "Norrbotten",
        "Östergötland", "Skåne", "Stockholm", "Sörmland", "Värmland", "Västerbotten", "Västernorrland", "Västmanland", "Västra Götaland"],
    Switzerland: ["Aargau", "Appenzell Ausserrhoden", "Appenzell Innerrhoden", "Basel-Landschaft", "Basel-Stadt", "Bern", "Fribourg",
        "Geneva", "Glarus", "Grisons", "Jura", "Lucerne", "Neuchâtel", "Nidwalden", "Obwalden", "Schaffhausen", "Solothurn",
        "St. Gallen", "Ticino", "Thurgau", "Uri", "Valais", "Vaud", "Zug", "Zurich"],
    Syria: ["Damascus", "Aleppo", "Homs", "Latakia",
        "Hama", "Deir ez-Zor", "Tartus", "Raqqa", "Idlib", "Daraa", "Hasakah", "Quneitra",
        "Rural Damascus", "Dar'a", "Suweda"],
    Syria: ["Al-Hasakah", "Al-Qamishli", "Aleppo", "Damascus", "Deir ez-Zor", "Hama", "Homs", "Idlib", "Latakia", "Rif Dimashq",
        "Tartus"],
    Taiwan: ["Chiayi", "Hsinchu", "Hualien", "Kaohsiung", "Keelung", "Miaoli", "New Taipei", "Nantou", "Pingtung", "Taichung",
        "Tainan", "Taipei", "Taitung", "Taoyuan", "Yilan", "Kinmen"],
    Tajikistan: ["Dushanbe", "Gorno-Badakhshan", "Khatlon", "Sughd"],
    Tanzania: ["Arusha", "Dar es Salaam", "Dodoma", "Iringa", "Kagera", "Katavi", "Kigoma", "Kilimanjaro", "Lindi",
        "Manyara", "Mara", "Mbeya", "Morogoro", "Mtwara", "Mwanza", "Njombe", "Pwani", "Rukwa", "Ruvuma", "Shinyanga",
        "Singida", "Simiyu", "Tabora", "Tanga"],
    Thailand: ["Bangkok", "Chiang Mai", "Chonburi", "Khon Kaen", "Lampang", "Loei", "Maha Sarakham", "Nakhon Ratchasima",
        "Nakhon Sawan", "Nakhon Si Thammarat", "Nan", "Narathiwat", "Nong Bua Lamphu", "Nong Khai", "Pattani", "Phang Nga",
        "Phatthalung", "Phayao", "Phetchabun", "Phetchaburi", "Phichit", "Phitsanulok", "Prachuap Khiri Khan", "Ranong",
        "Ratchaburi", "Rayong", "Roi Et", "Sakon Nakhon", "Samut Sakhon", "Samut Prakan", "Samut Songkhram", "Saraburi",
        "Satun", "Singburi", "Sukhothai", "Surat Thani", "Surin", "Tak", "Trang", "Trat", "Ubon Ratchathani", "Udon Thani",
        "Yala"],
    TimorLeste: ["Aileu", "Ainaro", "Baucau", "Bobonaro", "Covalima", "Dili", "Ermera", "Lautem", "Liquica", "Manatuto",
        "Manufahi", "Oecusse"],
    Togo: ["Centrale", "Kara", "Maritime", "Plateaux", "Savanes"],
    Tonga: ["Eua", "Ha'apai", "Niuas", "Tongatapu", "Vava'u"],
    TrinidadandTobago: ["Arima", "Chaguanas", "Couva-Tabaquite-Talparo", "Diego Martin", "Esperance", "Port of Spain", "Princes Town",
        "Rio Claro", "San Fernando", "San Juan-Laventille", "Sangre Grande", "Tobago"],
    Tunisia: ["Ariana", "Beja", "Ben Arous", "Bizerte", "Gabes", "Gafsa", "Jendouba", "Kairouan", "Kasserine", "Kébili",
        "La Manouba", "Le Kef", "Mahdia", "Manouba", "Mednine", "Monastir", "Nabeul", "Sfax", "Sidi Bouzid", "Siliana",
        "Tataouine", "Tozeur", "Tunis", "Zaghouan"],
    Turkey: ["Adana", "Adiyaman", "Afyonkarahisar", "Aksaray", "Amasya", "Ankara", "Antalya", "Ardahan", "Artvin", "Aydin",
        "Balikesir", "Bartin", "Batman", "Bayburt", "Bolu", "Burdur", "Bursa", "Canakkale", "Cankiri", "Corum", "Denizli",
        "Diyarbakir", "Duzce", "Edirne", "Elazig", "Erzincan", "Erzurum", "Eskisehir", "Gaziantep", "Giresun", "Gumushane",
        "Hakkari", "Hatay", "Igdir", "Isparta", "Istanbul", "Izmir", "Kahramanmaras", "Karabük", "Karaman", "Kars", "Kastamonu",
        "Kayseri", "Kilis", "Kirikkale", "Kirklareli", "Kirsehir", "Kocaeli", "Konya", "Kütahya", "Malatya", "Manisa", "Mardin"],
    Turkmenistan: ["Ahal", "Balkh", "Dashoguz", "Lebap", "Mary"],
    TurksAndCaicosIslands: ["Grand Turk", "Providenciales", "North Caicos", "Middle Caicos", "South Caicos",
        "Salt Cay", "West Caicos", "East Caicos"
    ],
    Tuvalu: ["Funafuti", "Nanumea", "Nukufetau", "Vaitupu"],
    Uganda: ["Central", "Eastern", "Northern", "Western"],
    Ukraine: ["Cherkasy", "Chernihiv", "Chernivtsi", "Dnipropetrovsk", "Donetsk", "Ivano-Frankivsk", "Kharkiv", "Kherson",
        "Khmelnitsky", "Kiev", "Kirovohrad", "Luhansk", "Lviv", "Mykolaiv", "Odessa", "Poltava", "Rivne", "Sumy", "Ternopil",
        "Vinnytsia", "Volyn", "Zakarpattia", "Zaporizhia", "Zhytomyr"],
    UnitedArabEmirates: ["Abu Dhabi", "Ajman", "Dubai", "Fujairah", "Ras Al Khaimah", "Sharjah", "Umm Al-Quwain"],
    UnitedKingdom: ["England", "Northern Ireland", "Scotland", "Wales"],
    UnitedStates: ["Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware", "Florida",
        "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky", "Louisiana", "Maine", "Maryland",
        "Massachusetts", "Michigan", "Minnesota", "Mississippi", "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire",
        "New Jersey", "New Mexico", "New York", "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania",
        "Rhode Island", "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington",
        "West Virginia", "Wisconsin", "Wyoming"],
    Uruguay: ["Artigas", "Canelones", "Cerro Largo", "Colonia", "Durazno", "Flores", "Florida", "Lavalleja", "Maldonado",
        "Montevideo", "Paysandú", "Rio Negro", "Rivera", "Rocha", "Salto", "San José", "Soriano", "Tacuarembó", "Treinta y Tres"],
    Uzbekistan: ["Andijan", "Bukhara", "Fergana", "Jizzakh", "Khorezm", "Kashkadarya", "Namangan", "Navoiy", "Samarkand",
        "Sirdaryo", "Surkhandarya", "Tashkent", "Tashkent City", "Republic of Karakalpakstan"],
    Vanuatu: ["Malampa", "Penama", "Sanma", "Shefa", "Tafea", "Torba"],
    Venezuela: ["Amazonas", "Anzoátegui", "Apure", "Aragua", "Barinas", "Bolívar", "Carabobo", "Cojedes", "Delta Amacuro",
        "Falcón", "Guárico", "Lara", "Mérida", "Miranda", "Monagas", "Nueva Esparta", "Portuguesa", "Sucre", "Táchira",
        "Trujillo", "Yaracuy", "Zulia"],
    Vietnam: ["An Giang", "Bà Rịa-Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bến Tre", "Bình Định", "Bình Dương", "Bình Phước",
        "Cà Mau", "Cao Bằng", "Đà Nẵng", "Đắk Lắk", "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Hà Giang",
        "Hà Nam", "Hà Nội", "Hải Dương", "Hải Phòng", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang", "Kon Tum",
        "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình", "Ninh Thuận",
        "Phú Thọ", "Phú Yên", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh", "Quảng Trị", "Sóc Trăng", "Sơn La",
        "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa", "Thừa Thiên-Huế", "Tiền Giang", "Trà Vinh", "Tuyên Quang",
        "Vĩnh Long", "Vĩnh Phúc"],
    WallisAndFutunaIslands: ["Wallis Island", "Futuna Island", "Alofi Island", "Uvea Island"],
    WesternSahara: ["Laâyoune", "Dakhla", "Smara", "Boujdour", "Tarfaya"],
    Yemen: ["Aden", "Al Bayda", "Al Hudaydah", "Al Jawf", "Al Maharah", "Al Mahwit", "Amanat al Asimah", "Amran",
        "Dhamar", "Hajjah", "Ibb", "Lahij", "Marib", "Al Mukalla", "Al Hudaydah", "Saada", "Sana'a", "Shabwah",
        "Taiz", "Hadramaut"],
    Zambia: ["Central", "Copperbelt", "Eastern", "Luapula", "Lusaka", "Muchinga", "Northern", "North-Western", "Southern",
        "Western"],
    Zimbabwe: ["Bulawayo", "Harare", "Manicaland", "Mashonaland Central", "Mashonaland East", "Mashonaland West", "Masvingo",
        "Midlands"],
    VaticanCity: ["Vatican City"],

    Qatar: ["Doha", "Al Daayen", "Al Khor", "Al Shamal", "Al Wakrah",
        "Al Rayyan", "Umm Salal", "Al Sheehaniya"],
    Reunion: ["Saint-Denis", "Saint-Paul", "Saint-Pierre", "Saint-Benoît", "Saint-Louis",
        "Sainte-Marie", "Sainte-Suzanne", "Salazie", "L'Etang-Salé"],
    Romania: ["Alba", "Arad", "Arges", "Bacau", "Bihor", "Bistrita-Nasaud", "Botosani",
        "Braila", "Brasov", "Bucharest", "Buzau", "Caras-Severin", "Calarasi", "Cluj",
        "Constanta", "Covasna", "Dambovita", "Dolj", "Galati", "Giurgiu", "Gorj",
        "Harghita", "Hunedoara", "Ialomita", "Iasi", "Ilfov", "Maramures", "Mehedinti",
        "Mures", "Neamt", "Olt", "Prahova", "Satu Mare", "Salaj", "Sibiu", "Suceava",
        "Teleorman", "Timis", "Tulcea", "Vaslui", "Valcea", "Vrancea"],
    Russia: [
        "Adygea", "Altai Republic", "Amur", "Arkhangelsk", "Astrakhan", "Bashkortostan", "Belgorod",
        "Buryatia", "Chechen Republic", "Chelyabinsk", "Chukotka", "Chuvashia", "Dagestan", "Ingushetia",
        "Irkutsk", "Ivanovo", "Jewish Autonomous Oblast", "Kabardino-Balkaria", "Kaliningrad",
        "Kalmykia", "Kemerovo", "Khabarovsk", "Karachay-Cherkessia", "Karelia", "Kemerovo", "Kirov",
        "Komi", "Kostroma", "Krasnodar", "Krasnoyarsk", "Kurgan", "Kursk", "Leningrad", "Lipetsk",
        "Magadan", "Mari El", "Mordovia", "Moscow", "Murmansk", "Nizhny Novgorod", "Novgorod", "Orel",
        "Orenburg", "Penza", "Perm", "Primorsky Krai", "Pskov", "Republic of Tatarstan", "Rostov",
        "Ryazan", "Sakha Republic", "Sakhalin", "Samara", "Saint Petersburg", "Saratov", "Smolensk",
        "Stavropol Krai", "Sverdlovsk", "Tambov", "Tatarstan", "Tver", "Tomsk", "Tula", "Tumen",
        "Udmurt Republic", "Ulyanovsk", "Vladimir", "Volgograd", "Vologda", "Voronezh", "Yamalo-Nenets",
        "Yaroslavl", "Zabaykalsky Krai"],
    Swaziland: ["Hhohho", "Lubombo", "Manzini", "Shiselweni"],
    Tokelau: ["Atafu", "Nukunonu", "Fakaofo"],










};

            // Function to populate state dropdown based on country selection
            function regcountryselection() { 
                const countrySelect = document.getElementById("reg-country");
                const stateSelect = document.getElementById("reg-state");
                const selectedCountry = countrySelect.value;
        
                // Clear existing state options
                stateSelect.innerHTML = '<option value="">Select State</option>';
        
                // If country has associated states, populate the state dropdown
                if (selectedCountry in statesByCountry) {
                    statesByCountry[selectedCountry].forEach(state => {
                        const option = document.createElement("option");
                        option.value = state;
                        option.textContent = state;
                        stateSelect.appendChild(option);
                    });
                }
        
                // Auto-select the state based on previously saved data (if available)
                const selectedState = "{{ $userDirectoryData->State ?? '' }}";
                if (selectedState) {
                    stateSelect.value = selectedState;
                }
            }
        
            // Call function on page load to auto-populate the states based on the pre-selected country
            document.addEventListener("DOMContentLoaded", () => {
                regcountryselection();  // Call the function immediately after page load
            });
</script>
   
    
    
    
</body>

</html>