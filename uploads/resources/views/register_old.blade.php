<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>


    <link rel="stylesheet" href="assets/showDirectories/styles.css">
    <link rel="stylesheet" href="assets/css/Form.css">

    <link rel="stylesheet" href="assets/css/responsive.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Karla:ital,wght@0,200..800;1,200..800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <script src="assets/js/RegForm.js"></script>








    <!-- Add intl-tel-input CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.min.css">



</head>

<body style="background: linear-gradient(315deg, #E4F1EE 3%, #E5E4F0 38%, #DBEBEB 68%, #E5ECF1 98%);">



    <!-- Include intl-tel-input JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>




    <!-- Header session -->
    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">


            <img src="{{ asset('assets/logo.png') }}">
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <!-- <li><a href="{{route('index')}}">HOME</a></li> -->
            <li><a href="{{route('directoryadd')}}">HOME</a></li>
            <li><a href="https://shop.connect767.com/">SHOP</a></li>
            <!-- <li><a href="{{route('basketball')}}">CUSTOM UNIFORMS</a></li> -->
        </ul>

        <!-- Check if user is logged in -->
        @if(session('user'))
        <div class="dropdown">
            <button class="profile-btn">
                <i class="fa fa-user"></i> Profile &#9662;
            </button>
            <ul class="dropdown-content">
                @if(session('role') === 'admin')
                <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
                @else
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                @endif
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
        @else



        <div class="auth-links" style="text-align: center;">

            <a href="{{ route('login') }}" class="auth-button">Login</a>

            <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

        </div>


        @endif
    </nav>

    <!-- Header Session -->

    <!-- Register form session -->


    <div class="reg-form-container">

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
        <h2 class="reg-form-heading">Register Your Business</h2>

        <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="reg-form-content">
                <div class="reg-form-column">
                    <label for="reg-business-name">Business Name*</label>
                    <input class="reg-input" type="text" id="reg-business-name" name="reg_business_name"
                        placeholder="Enter your business name" required>

                    <label for="reg-email">Email*</label>
                    <input class="reg-input" type="email" id="reg-email" name="reg_email"
                        placeholder="Enter your email address" required>



                    <label for="reg-education">Education*</label>
                    <select class="reg-select" id="reg-education" name="reg_education" required>
                        <option value="" disabled selected>Select your highest education level</option>
                        <option value="Doctorate">Doctorate</option>
                        <option value="Master’s Degree">Master’s Degree</option>
                        <option value="Associates Degree">Associates Degree</option>
                        <option value="Professional Certificate">Professional Certificate</option>
                        <option value="High School Diploma">High School Diploma</option>
                        <option value=" Primary School"> Primary School</option>
                        <option value="other">Other</option>
                    </select>

                    <label for="reg-website">Website</label>
                    <input class="reg-input" type="url" id="reg-website" name="reg_website"
                        placeholder="Enter your website URL">


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
                        let userInput = inputField.value.trim(); // User's entered value

                        // Check if input is valid and doesn't already start with https://www.
                        if (userInput && !userInput.startsWith('https://www.') &&
                            /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(userInput)) {
                            inputField.value = `https://www.${userInput}`;
                        }
                    });
                    </script>


                    <label for="reg-state">State*</label>
                    <select class="reg-select" id="reg-state" name="reg_state" required></select>




                    <label for="reg-street-name">Street Name*</label>
                    <input class="reg-input" type="text" id="reg-street-name" name="reg_street_name"
                        placeholder="Enter street name" required>








                </div>

                <div class="reg-form-column">




                    <label for="reg-industry">Industry*</label>
                    <select class="reg-select" id="reg-industry" name="reg_industry" required>
                        <option value="" disabled selected>Select your industry</option>
                        <option value="Arts/ Music/Entertainment">Arts/ Music/Entertainment</option>
                         <option value="Automotive/Transportation">Automotive/Transportation</option>
                   <option value="Architecture/Engineering/Technical Services">Architecture/Engineering/Technical Services</option>
                        <option value="Business Administration/Office">Business Administration/Office </option>
                        <option value="Biotech/Science/Life Science">Biotech/Science/Life Science</option>
                        <option value="Construction/Plumbing/ Mining">Construction/Plumbing/ Mining</option>
                        <option value="Cosmetic/Beauty/Barber">Cosmetic/Beauty/Barber</option>
                        <option value="Customer Service/ Consumer Goods & Services">Customer Service/ Consumer Goods &
                            Services</option>
                        <option value="Education/ Professional/Scientific">Education/Professional/Scientific</option>
                        <option value="Food Services/Beverage">Food Services/Beverage</option>
                        <option value="General Labor/Warehouse">General Labor/Warehouse</option>
                        <option value="Government/Non-Profit">Government/Non-Profit</option>
                        <option value="Graphic Design/Media Design">Graphic Design/Media Design</option>
                        <option value="Healthcare/Social Assistance/Medical">Healthcare/Social Assistance/Medical
                        </option>
                        <option value="Human Resource/Marketing/PR/Advertising">Human Resource/Marketing/PR/Advertising
                        </option>
                        <option value="Hospitality/Tourism/Accommodation">Hospitality/Tourism/Accommodation</option>
                        <option value="Legal/Paralegal">Legal/Paralegal</option>
                        <option value="Manufacturing/ Industrial Machinery/ Gas/ Chemicals">Manufacturing/ Industrial
                            Machinery/ Gas/ Chemicals</option>
                        <option value="Real Estate/Rental/Leasing">Real Estate/Rental/Leasing </option>
                        <option value="Retail/Wholesale/Trade">Retail/Wholesale/Trade</option>
                        <option value="Sales/Business Development">Sales/Business Development </option>
                        <option value="Salon/Spa/Fitness">Salon/Spa/Fitness</option>
                        <option value="Security">Security</option>
                        <option value="Skills/Trade/Craft/Utilities">Skills/Trade/Craft/Utilities </option>
                        <option value="Technology/ Technical Support/Web">Technology/ Technical Support/Web</option>
                        <option value="TV/Film/Video">TV/Film/Video</option>
                        <option value="other">Other</option>
                    </select>


                    <label for="reg-phone">Phone Number*</label>
                    <input class="reg-input" type="tel" id="reg-phone" name="reg_phone"
                        placeholder="Enter your phone number" required>



                    <label class="Experience" for="reg-experience">Experience*</label>
                    <select class="reg-select" id="reg-experience" name="reg_experience" required>
                        <option value="" disabled selected>Select your experience level</option>
                        <option value="0-5 Years">0-5 Years</option>
                        <option value="5-10 Years">5-10 Years</option>
                        <option value="10-20 Years">10-20 Years</option>
                        <option value="20+ Years">20+ Years</option>
                    </select>


                    <label for="reg-country">Country*</label>
                    <select class="reg-select" id="reg-country" onchange="regcountryselection()" name="reg_country"
                        required>
                        <option value="">Select Country</option>
                        <option value="Afghanistan">Afghanistan</option>
                        <option value="Albania">Albania</option>
                        <option value="Algeria">Algeria</option>
                        <option value="American Samoa">American Samoa</option>
                        <option value="Andorra">Andorra</option>
                        <option value="Angola">Angola</option>
                        <option value="Antarctica">Antarctica</option>
                        <option value="AntiguaAndBarbuda">Antigua And Barbuda</option>
                        <option value="Argentina">Argentina</option>
                        <option value="Armenia">Armenia</option>
                        <option value="Aruba">Aruba</option>
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
                        <option value="Bermuda">Bermuda</option>
                        <option value="Bhutan">Bhutan</option>
                        <option value="Bolivia">Bolivia</option>
                        <option value="BosniaAndHerzegovina">Bosnia And Herzegovina</option>
                        <option value="Botswana">Botswana</option>
                        <option value="BouvetIsland">Bouvet Island</option>
                        <option value="Brazil">Brazil</option>
                        <option value="Brunei">Brunei</option>
                        <option value="Bulgaria">Bulgaria</option>
                        <option value="BurkinaFaso">Burkina Faso</option>
                        <option value="Burundi">Burundi</option>
                        <option value="Cambodia">Cambodia</option>
                        <option value="Cameroon">Cameroon</option>
                        <option value="Canada">Canada</option>
                        <option value="Cape Verde">Cape Verde</option>
                        <option value="CaymanIslands">Cayman Islands</option>
                        <option value="CentralAfricanRepublic">Central African Republic</option>
                        <option value="Chad">Chad</option>
                        <option value="Chile">Chile</option>
                        <option value="China">China</option>
                        <option value="ChristmasIsland">Christmas Island</option>
                        <option value="cocoskeelingislands">Cocos (Keeling) Islands</option>
                        <option value="Colombia">Colombia</option>
                        <option value="Comoros">Comoros</option>
                        <option value="Congo">Congo</option>
                        <option value="CookIslands">Cook Islands</option>
                        <option value="CostaRica">Costa Rica</option>
                        <option value="CoteDIvoire">Côte D'Ivoire</option>
                        <option value="Croatia">Croatia</option>
                        <option value="Cuba">Cuba</option>
                        <option value="Cyprus">Cyprus</option>
                        <option value="CzechRepublic">Czech Republic</option>
                        <option value="Denmark">Denmark</option>
                        <option value="Djibouti">Djibouti</option>
                        <option value="Dominica">Dominica</option>
                        <option value="DominicanRepublic">Dominican Republic</option>
                        <option value="Ecuador">Ecuador</option>
                        <option value="Egypt">Egypt</option>
                        <option value="ElSalvador">El Salvador</option>
                        <option value="EquatorialGuinea">Equatorial Guinea</option>
                        <option value="Eritrea">Eritrea</option>
                        <option value="Estonia">Estonia</option>
                        <option value="Ethiopia">Ethiopia</option>
                               <option value="Eswatini">Eswatini</option>
                        <option value="FalklandIslands">Falkland Islands</option>
                        <option value="FaroeIslands">Faroe Islands</option>
                        <option value="Fiji">Fiji</option>
                        <option value="Finland">Finland</option>
                        <option value="France">France</option>
                        <option value="Gabon">Gabon</option>
                        <option value="Gambia">Gambia</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Germany">Germany</option>
                        <option value="Ghana">Ghana</option>
                        <option value="Gibraltar">Gibraltar</option>
                        <option value="Greece">Greece</option>
                        <option value="Greenland">Greenland</option>
                        <option value="Grenada">Grenada</option>
                        <option value="Guadeloupe">Guadeloupe</option>
                        <option value="Guam">Guam</option>
                        <option value="Guatemala">Guatemala</option>
                        <option value="Guinea">Guinea</option>
                        <option value="GuineaBissau">Guinea-Bissau</option>
                        <option value="Guyana">Guyana</option>
                        <option value="Haiti">Haiti</option>
                        <option value="Honduras">Honduras</option>
                        <option value="HongKong">Hong Kong</option>
                        <option value="Hungary">Hungary</option>
                        <option value="Iceland">Iceland</option>
                        <option value="India">India</option>
                        <option value="Indonesia">Indonesia</option>
                        <option value="Iran">Iran</option>
                        <option value="Iraq">Iraq</option>
                        <option value="Ireland">Ireland</option>
                        <option value="Israel">Israel</option>
                        <option value="Italy">Italy</option>
                        <option value="Jamaica">Jamaica</option>
                        <option value="Japan">Japan</option>
                        <option value="Jordan">Jordan</option>
                        <option value="Kazakhstan">Kazakhstan</option>
                        <option value="Kenya">Kenya</option>
                        <option value="Kiribati">Kiribati</option>
                        <option value="South Korea">Korea</option>
                        <option value="North Korea">North Korea</option>
                        <option value="Kuwait">Kuwait</option>
                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                        <option value="Latvia">Latvia</option>
                        <option value="Lebanon">Lebanon</option>
                        <option value="Lesotho">Lesotho</option>
                        <option value="Liberia">Liberia</option>
                        <option value="LibyaStateOf">Libya, State Of</option>
                        <option value="Liechtenstein">Liechtenstein</option>
                        <option value="Lithuania">Lithuania</option>
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
                        <option value="Palestine">Palestine</option>
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
                 
                        <option value="Romania">Romania</option>
                   
                        <option value="Rwanda">Rwanda</option>
                             <option value="Russia">Russia</option>
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
                        <option value="Suriname">Suriname</option>
                             <option value="SintMaarten">Sint Maarten</option>
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
                    <input class="reg-input" type="text" id="reg-city" name="reg_city" placeholder="Enter your city"
                        required>


                    <label for="reg-building-number">Building Number*</label>
                    <input class="reg-input" type="text" id="reg-building-number" name="reg_building_number"
                        placeholder="Enter building number" required>


                </div>

            </div>

            <label for="reg-goods-services">Goods/Services Provided*</label>
            <textarea class="reg-textarea " id="reg-goods-services" name="reg_goods_services"
                placeholder="Describe your business" rows="5" cols="87" required></textarea>



            <div class="form-group">
                <label for="fileInput" class="custom-file-label">Choose Profile Picture</label>
                <input type="file" id="fileInput" name="logo" class="custom-file-input"
                    accept=".jpeg,.jpg,.png,.gif,.svg,.webp,.bmp,.tiff">

            </div>


            <button type="submit" class="reg-submit-btn">Submit</button>

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