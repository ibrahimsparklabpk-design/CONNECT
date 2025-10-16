@extends('dashboard.app')

@section('content')
    <div class="dashboard-box-content">
        <h1>
            Update Directory
        </h1>

        <form method="POST" action="{{ route('business-registration.update', $businessRegistration->id) }}"
            enctype="multipart/form-data">
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 20px;">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success" style="margin-bottom: 20px;">
                    {{ session('success') }}
                </div>
            @endif

            @csrf

            <div class="form-row">
                <div class="form-group">
                    <label for="BusinessName">Professional or Business Name*:</label>
                    <input type="text" id="BusinessName" required name="BusinessName"
                        value="{{ old('BusinessName', $businessRegistration->BusinessName) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="PhoneNumber">Phone Number:</label>
                    <input type="tel" id="PhoneNumber" name="PhoneNumber"
                        value="{{ old('PhoneNumber', $businessRegistration->PhoneNumber) }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="industry">Industry*:</label>
                    <select id="industry" required name="Industry">
                        <option value="">Select Industry</option>
                        <option value="Arts/ Music/Entertainment"
                            {{ $businessRegistration->Industry == 'Arts/ Music/Entertainment' ? 'selected' : '' }}>Arts/
                            Music/Entertainment</option>
                        <option value="Automotive/Transportation"
                            {{ $businessRegistration->Industry == 'Automotive/Transportation' ? 'selected' : '' }}>
                            Automotive/Transportation</option>
                        <option value="Business Administration/Office"
                            {{ $businessRegistration->Industry == 'Business Administration/Office' ? 'selected' : '' }}>
                            Business Administration/Office</option>
                        <option value="Biotech/Science/Life Science"
                            {{ $businessRegistration->Industry == 'Biotech/Science/Life Science' ? 'selected' : '' }}>
                            Biotech/Science/Life Science</option>
                        <option value="Construction/Plumbing/ Mining"
                            {{ $businessRegistration->Industry == 'Construction/Plumbing/ Mining' ? 'selected' : '' }}>
                            Construction/Plumbing/ Mining</option>
                        <option value="Cosmetic/Beauty/Barber"
                            {{ $businessRegistration->Industry == 'Cosmetic/Beauty/Barber' ? 'selected' : '' }}>
                            Cosmetic/Beauty/Barber</option>
                        <option value="Customer Service/ Consumer Goods & Services"
                            {{ $businessRegistration->Industry == 'Customer Service/ Consumer Goods & Services' ? 'selected' : '' }}>
                            Customer Service/ Consumer Goods & Services</option>
                        <option value="Education/ Professional/Scientific"
                            {{ $businessRegistration->Industry == 'Education/ Professional/Scientific' ? 'selected' : '' }}>
                            Education/ Professional/Scientific</option>
                        <option value="Food Services/Beverage"
                            {{ $businessRegistration->Industry == 'Food Services/Beverage' ? 'selected' : '' }}>Food
                            Services/Beverage</option>
                        <option value="General Labor/Warehouse"
                            {{ $businessRegistration->Industry == 'General Labor/Warehouse' ? 'selected' : '' }}>General
                            Labor/Warehouse</option>
                        <option value="Government/Non-Profit"
                            {{ $businessRegistration->Industry == 'Government/Non-Profit' ? 'selected' : '' }}>
                            Government/Non-Profit</option>
                        <option value="Graphic Design/Media Design"
                            {{ $businessRegistration->Industry == 'Graphic Design/Media Design' ? 'selected' : '' }}>
                            Graphic Design/Media Design</option>
                        <option value="Healthcare/Social Assistance/Medical"
                            {{ $businessRegistration->Industry == 'Healthcare/Social Assistance/Medical' ? 'selected' : '' }}>
                            Healthcare/Social Assistance/Medical</option>
                        <option value="Human Resource/Marketing/PR/Advertising"
                            {{ $businessRegistration->Industry == 'Human Resource/Marketing/PR/Advertising' ? 'selected' : '' }}>
                            Human Resource/Marketing/PR/Advertising</option>
                        <option value="Hospitality/Tourism/Accommodation"
                            {{ $businessRegistration->Industry == 'Hospitality/Tourism/Accommodation' ? 'selected' : '' }}>
                            Hospitality/Tourism/Accommodation</option>
                        <option value="Legal/Paralegal"
                            {{ $businessRegistration->Industry == 'Legal/Paralegal' ? 'selected' : '' }}>Legal/Paralegal
                        </option>
                        <option value="Manufacturing/ Industrial Machinery/ Gas/ Chemicals"
                            {{ $businessRegistration->Industry == 'Manufacturing/ Industrial Machinery/ Gas/ Chemicals' ? 'selected' : '' }}>
                            Manufacturing/ Industrial Machinery/ Gas/ Chemicals</option>
                        <option value="Real Estate/Rental/Leasing"
                            {{ $businessRegistration->Industry == 'Real Estate/Rental/Leasing' ? 'selected' : '' }}>Real
                            Estate/Rental/Leasing</option>
                        <option value="Retail/Wholesale/Trade"
                            {{ $businessRegistration->Industry == 'Retail/Wholesale/Trade' ? 'selected' : '' }}>
                            Retail/Wholesale/Trade</option>
                        <option value="Sales/Business Development"
                            {{ $businessRegistration->Industry == 'Sales/Business Development' ? 'selected' : '' }}>
                            Sales/Business Development</option>
                        <option value="Salon/Spa/Fitness"
                            {{ $businessRegistration->Industry == 'Salon/Spa/Fitness' ? 'selected' : '' }}>
                            Salon/Spa/Fitness</option>
                        <option value="Security" {{ $businessRegistration->Industry == 'Security' ? 'selected' : '' }}>
                            Security</option>
                        <option value="Skills/Trade/Craft/Utilities"
                            {{ $businessRegistration->Industry == 'Skills/Trade/Craft/Utilities' ? 'selected' : '' }}>
                            Skills/Trade/Craft/Utilities</option>
                        <option value="Technology/ Technical Support/Web"
                            {{ $businessRegistration->Industry == 'Technology/ Technical Support/Web' ? 'selected' : '' }}>
                            Technology/ Technical Support/Web</option>
                        <option value="TV/Film/Video"
                            {{ $businessRegistration->Industry == 'TV/Film/Video' ? 'selected' : '' }}>TV/Film/Video
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Website">Website:</label>
                    <input type="url" id="Website" name="Website"
                        value="{{ old('Website', $businessRegistration->Website ?? 'https://www.') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="education">Education:</label>
                    <select id="education" name="Education">
                        <option value="">Select Education</option>
                        <option value="Doctorate" {{ $businessRegistration->Education == 'Doctorate' ? 'selected' : '' }}>
                            Doctorate</option>
                        <option value="Master’s Degree"
                            {{ $businessRegistration->Education == 'Master’s Degree' ? 'selected' : '' }}>Master’s Degree
                        </option>
                        <option value="Associates Degree"
                            {{ $businessRegistration->Education == 'Associates Degree' ? 'selected' : '' }}>Associates
                            Degree</option>
                        <option value="Professional Certificate"
                            {{ $businessRegistration->Education == 'Professional Certificate' ? 'selected' : '' }}>
                            Professional Certificate</option>
                        <option value="High School Diploma"
                            {{ $businessRegistration->Education == 'High School Diploma' ? 'selected' : '' }}>High School
                            Diploma</option>
                        <option value="Primary School"
                            {{ $businessRegistration->Education == 'Primary School' ? 'selected' : '' }}>Primary School
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="experience">Experience*:</label>
                    <select id="experience" required name="Experience">
                        <option value="">Select Experience</option>
                        <option value="0-5" {{ $businessRegistration->Experience == '0-5' ? 'selected' : '' }}>0-5
                        </option>
                        <option value="5-10" {{ $businessRegistration->Experience == '5-10' ? 'selected' : '' }}>5-10
                        </option>
                        <option value="10-20" {{ $businessRegistration->Experience == '10-20' ? 'selected' : '' }}>10-20
                        </option>
                        <option value="20+" {{ $businessRegistration->Experience == '20+' ? 'selected' : '' }}>20+
                        </option>
                    </select>
                </div>
            </div>


            <div class="form-row">
                @php
                    $countries = [
                        'Afghanistan',
                        'Albania',
                        'Algeria',
                        'Andorra',
                        'Angola',
                        'Antigua and Barbuda',
                        'Argentina',
                        'Armenia',
                        'Australia',
                        'Austria',
                        'Azerbaijan',
                        'Bahamas',
                        'Bahrain',
                        'Bangladesh',
                        'Barbados',
                        'Belarus',
                        'Belgium',
                        'Belize',
                        'Benin',
                        'Bhutan',
                        'Bolivia',
                        'Bosnia and Herzegovina',
                        'Botswana',
                        'Brazil',
                        'Brunei',
                        'Bulgaria',
                        'Burkina Faso',
                        'Burundi',
                        'Cabo Verde',
                        'Cambodia',
                        'Cameroon',
                        'Canada',
                        'Central African Republic',
                        'Chad',
                        'Chile',
                        'China',
                        'Colombia',
                        'Comoros',
                        'Congo (Brazzaville)',
                        'Congo (Kinshasa)',
                        'Costa Rica',
                        'Croatia',
                        'Cuba',
                        'Cyprus',
                        'Czech Republic',
                        'Denmark',
                        'Djibouti',
                        'Dominica',
                        'Dominican Republic',
                        'Ecuador',
                        'Egypt',
                        'El Salvador',
                        'Equatorial Guinea',
                        'Eritrea',
                        'Estonia',
                        'Eswatini',
                        'Ethiopia',
                        'Fiji',
                        'Finland',
                        'France',
                        'Gabon',
                        'Gambia',
                        'Georgia',
                        'Germany',
                        'Ghana',
                        'Greece',
                        'Grenada',
                        'Guatemala',
                        'Guinea',
                        'Guinea-Bissau',
                        'Guyana',
                        'Haiti',
                        'Honduras',
                        'Hungary',
                        'Iceland',
                        'India',
                        'Indonesia',
                        'Iran',
                        'Iraq',
                        'Ireland',
                        'Israel',
                        'Italy',
                        'Jamaica',
                        'Japan',
                        'Jordan',
                        'Kazakhstan',
                        'Kenya',
                        'Kiribati',
                        'Kuwait',
                        'KSA',
                        'UK',
                        'US',
                        'UAE',
                        'Uruguay',
                        'Vanuatu',
                        'Vatican City',
                        'Venezuela',
                        'Vietnam',
                        'Wales',
                        'Western Sahara',
                        'Yemen',
                        'Zimbabwe',
                    ];
                @endphp

                <div class="form-group">
                    <label for="Country">Country*:</label>
                    <select id="Country" name="Country" onchange="updateStates()" required>
                        <option value="">Select Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country }}"
                                {{ trim($businessRegistration->Country) == $country ? 'selected' : '' }}>
                                {{ $country }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="state">State*:</label>
                    <select id="state" required name="State">
                        <option value="">Select State</option>
                        <option value="state1" {{ $businessRegistration->State == 'state1' ? 'selected' : '' }}>Select
                            State1</option>
                        <option value="state2" {{ $businessRegistration->State == 'state2' ? 'selected' : '' }}>Select
                            State2</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="City">City*:</label>
                    <input type="text" id="City" required name="City"
                        value="{{ $businessRegistration->City }}">
                </div>
            </div>


            <div class="form-group">
                <label for="BuildingNumber">Building Number*:</label>
                <textarea id="BuildingNumber" rows="2" name="BuildingNumber" required>{{ $businessRegistration->BuildingNumber }}</textarea>
            </div>

            <div class="form-group">
                <label for="StreetName">Street Name:</label>
                <textarea id="StreetName" rows="2" name="StreetName">{{ $businessRegistration->StreetName }}</textarea>
            </div>

            <div class="form-group">
                <label for="GoodsServices">Description of Goods or Services Provided*:</label>
                <textarea id="GoodsServices" rows="2" name="GoodsServices" required>{{ $businessRegistration->GoodsServices }}</textarea>
            </div>

            <div class="form-group" style="max-width: 100%;">
                <label for="profile_picture" class="custom-file-label" style="display:block; margin-bottom: 4px;">
                    Choose Profile Picture
                </label>
                <input type="file" id="profile_picture" name="profile_picture" class="custom-file-input"
                    onchange="previewProfilePicture(event)">

                <div id="profilePreview" style="margin-top: 4px;">
                    @if ($businessRegistration->profile_picture)
                        <img id="profileImg" src="{{ asset('admin/vendor/' . $businessRegistration->profile_picture) }}"
                            alt="Profile Picture" width="100" style="border-radius: 12px; display:block;">
                    @else
                        <img id="profileImg" style="display:none; border-radius:12px;" width="100">
                    @endif
                </div>
            </div>



            <button class="form-btn">Update</button>
        </form>



    </div>
@endsection
