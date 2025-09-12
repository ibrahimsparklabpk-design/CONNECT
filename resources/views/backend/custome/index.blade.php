@extends("backend.layout.master")


@section('main-content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-6">
            <div class="main-section" style="display: flex; gap: 30px;">
                <!-- Left Section -->
                <div class="left-section" style="min-width: 300px; ">
                    <div class="icon-list" style="display: flex; gap: 10px; margin-bottom: 20px;">
                        <div class="icon" onclick="openTab('categories')">
                            <img src="{{ asset('/') }}assets/categories-icon.png" alt="Categories Icon" class="tab-icon" width="50px" />
                        </div>
                        <div class="icon" onclick="openTab('Logos')">
                            <img src="{{ asset('/') }}assets/c-logo.png" alt="Logos Icon" class="tab-icon" width="50px" />
                        </div>
                           <div class="icon" onclick="openTab('uploadLogos')">
                            <img src="{{ asset('/') }}assets/Logo-Icon.png" alt="Logos Icon" class="tab-icon" width="50px" />
                        </div>
                        <div class="icon" onclick="openTab('Text')">
                            <img src="{{ asset('/') }}assets/text.png" alt="Text Icon" class="tab-icon" width="50px" />
                        </div>
                        <div class="icon" onclick="openTab('colorpicker')">
                            <img src="{{ asset('/') }}assets/colorbucketicon.png" alt="Color Picker Icon" class="tab-icon" width="50px" />
                        </div>
                        <div class="icon" onclick="openTab('Patterns')">
                            <img src="{{ asset('/') }}assets/pattern-icon.png" alt="Patterns Icon" class="tab-icon" width="50px" />
                        </div>
                         <div class="icon" onclick="openTab('uploadPatterns')">
                            <img src="{{ asset('/') }}assets/Patterns-Icon.png" alt="Patterns Icon" class="tab-icon" width="50px" />
                        </div>
                          <div class="icon" onclick="saveDesign()">
                             <img src="{{ asset('/') }}assets/savedesignicon.png" alt="Save Icon" class="tab-icon" width="50px" />
                        </div>
                       
                    </div>

                  
                    <!-- Tab Contents -->
                    <div class="items-list" style="  height: 40rem;">
                       <div class="tabcolor" id="colorpicker" style="display: none">
                             <div class="tabcontent" id="Shirts" style="display:none; padding: 15px; font-family: 'Karla', sans-serif;">
                            <p style="font-weight: 600; font-size: 16px; margin-bottom: 15px;">Select shirt options here...</p>

                            <label class="color-picker-label" for="color-collar">
                                <span style="width: 120px; font-weight: 500;">Collar Color:</span> 
                                <input type="color" id="color-collar" value="#ffffff" />
                            </label>

                            <label class="color-picker-label" for="color-body">
                                <span style="width: 120px; font-weight: 500;">Shirt Color:</span> 
                                <input type="color" id="color-body" value="#ffffff" />
                            </label>

                            <label class="color-picker-label" for="color-sleeve">
                                <span style="width: 120px; font-weight: 500;">Sleeve Color:</span> 
                                <input type="color" id="color-sleeve" value="#ffffff" />
                            </label>

                            <label class="color-picker-label" for="color-trouser">
                                <span style="width: 120px; font-weight: 500;">Shorts Color:</span> 
                                <input type="color" id="color-trouser" value="#ffffff" />
                            </label>

                            <label class="color-picker-label" for="color-shocks">
                                <span style="width: 120px; font-weight: 500;">Shocks Color:</span> 
                                <input type="color" id="color-shocks" value="#ffffff" />
                            </label>

                            <label class="color-picker-label" for="color-artboard">
                                <span style="width: 120px; font-weight: 500;">Pattern Color:</span> 
                                <input type="color" id="color-artboard" value="#ffffff" />
                            </label>
                        </div>

                        </div>

                        <div class="tabcontent" id="Logos" style="display: none">
                            <div class="logos-container">
                                <img src="{{ asset('/') }}assets/Logos/p-logo1.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo1.png')" alt="Logo 1" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo2.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo2.png')" alt="Logo 2" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo3.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo3.png')" alt="Logo 3" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo4.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo4.png')" alt="Logo 4" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo5.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo5.png')" alt="Logo 5" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo6.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo6.png')" alt="Logo 6" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo7.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo7.png')" alt="Logo 7" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo8.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo8.png')" alt="Logo 8" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo9.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo9.png')" alt="Logo 9" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo10.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo10.png')" alt="Logo 10" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo11.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo11.png')" alt="Logo 11" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo12.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo12.png')" alt="Logo 12" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo13.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo13.png')" alt="Logo 13" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo14.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo14.png')" alt="Logo 14" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo15.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo15.png')" alt="Logo 15" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo16.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo16.png')" alt="Logo 16" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo17.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo17.png')" alt="Logo 17" />
                                <img src="{{ asset('/') }}assets/Logos/p-logo18.png" class="logo" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo18.png')" alt="Logo 18" />
                            </div>
                        </div>

                        <!--categories-->
                        <div class="tabcontent" id="categories" >
                                <div class="cat-row">
                                        <div class="cat-col">
                                            <a href="{{ route('custome.index') }}"><img src="{{ asset('assets/soccer-icon.png') }}" /></a>
                                            <h1>Soccer</h1>
                                        </div>
                                        <div class="cat-col">
                                            <a href="cricket"><img src="{{ asset('assets/Cricketkit.png') }}" /></a>
                                            <h1>Cricket</h1>
                                        </div>
                                        <div class="cat-col">
                                            <a href="basketball"><img src="{{ asset('assets/basketball-kit.png') }}" /></a>
                                            <h1>Basketball</h1>
                                        </div>
                                </div>
                        <div class="cat-row">
                                        <div class="cat-col"><h1>Goal Keeper</h1></div>
                                        <div class="cat-col"><h1>Other / Staff / Management</h1></div>
                            </div>
                    </div>

                          <div class="tabcontent" id="uploadLogos" style="display: none; margin-left: 2rem; margin-top: 1rem;">
                             <!-- Upload Button -->
                            <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;     margin-left: 2rem;">
                                <label for="upload-logo" style="padding: 10px 20px; background: #000; color: #fff; border-radius: 8px; cursor: pointer; font-weight: 500;">
                                    <i class="fa fa-upload"></i> Upload Your Logo
                                </label>
                                <input type="file" id="upload-logo" accept="image/*" style="display: none;" />
                            </div>

                            <!-- Uploaded Logos Preview -->
                            <div id="uploaded-logos" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
                            </div>



                           <div class="tabcontent" id="uploadPatterns" style="display: none; margin-left: 2rem; margin-top: 1rem;">
                                <!-- Upload Button -->
                                <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
                                    <label for="upload-patterns" style="padding: 10px 20px; background: #000; color: #fff; border-radius: 8px; cursor: pointer; font-weight: 500;">
                                        <i class="fa fa-upload"></i> Upload Your Pattern
                                    </label>
                                    <input type="file" id="upload-patterns" accept="image/*" style="display: none;" />
                                </div>

                                <!-- Uploaded Patterns Preview -->
                                <div id="uploaded-pattern" style="display: flex; flex-wrap: wrap; gap: 10px;"></div>
                            </div>


                        <div class="tabcontent" id="Patterns" style="display: none">
                            <div class="pattern-container">
                               <img src="{{ asset('/') }}assets/soccer-shirts/pattern1.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern1.png')" alt="Pattern 1" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern2.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern2.png')" alt="Pattern 2" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern3.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern3.png')" alt="Pattern 3" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern4.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern4.png')" alt="Pattern 4" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern5.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern5.png')" alt="Pattern 5" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern6.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern6.png')" alt="Pattern 6" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern7.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern7.png')" alt="Pattern 7" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern8.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern8.png')" alt="Pattern 8" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern9.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern9.png')" alt="Pattern 9" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern10.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern10.png')" alt="Pattern 10" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern11.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern11.png')" alt="Pattern 11" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern12.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern12.png')" alt="Pattern 12" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern13.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern13.png')" alt="Pattern 13" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern14.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern14.png')" alt="Pattern 14" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern15.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern15.png')" alt="Pattern 15" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern16.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern16.png')" alt="Pattern 16" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern17.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern17.png')" alt="Pattern 17" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern18.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern18.png')" alt="Pattern 18" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/pattern19.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern19.png')" alt="Pattern 19" />
                              <img src="{{ asset('/') }}assets/soccer-shirts/white pattern 16.png" class="Patterns" onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/white pattern 16.png')" alt="white pattern 16.png" />
                            </div>
                        </div>

                       <div class="tabcontent" id="Text" style="display:none; padding: 20px; font-family:'Karla', sans-serif; background:#f5f5f5; border-radius:12px; box-shadow:0 6px 15px rgba(0,0,0,0.1); max-width:380px; margin:auto;">
                            <p style="font-weight:700; font-size:18px; margin-bottom:20px; color:#333; text-align:center;">Add Player Name & Number</p>

                        <label class="color-picker-label" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:15px;">
                            <span style="font-weight:500; font-size:14px; color:#555;">Player Name:</span>
                            <input type="text" id="player-name" placeholder="Enter Name" maxlength="12" 
                                    style="padding:8px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px; width:60%;"/>
                        </label>

                        <label class="color-picker-label" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:15px;">
                            <span style="font-weight:500; font-size:14px; color:#555;">Name Color:</span>
                            <input type="color" id="player-name-color" value="#FFFFFF" 
                                    style="padding:4px; border:none; width:60%; height:35px; border-radius:6px; cursor:pointer;"/>
                        </label>

                        <!-- Player Number -->
                        <label class="color-picker-label" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:15px;">
                            <span style="font-weight:500; font-size:14px; color:#555;">Player Number:</span>
                            <input type="text" id="player-number" placeholder="00" maxlength="3" 
                                    style="padding:8px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px; width:60%;"/>
                        </label>

                        <label class="color-picker-label" style="display:flex; align-items:center; justify-content:space-between; margin-bottom:0;">
                            <span style="font-weight:500; font-size:14px; color:#555;">Number Color:</span>
                            <input type="color" id="player-number-color" value="#FFFFFF" 
                                    style="padding:4px; border:none; width:60%; height:35px; border-radius:6px; cursor:pointer;"/>
                        </label>
                  </div>



                        <div class="tabcontent" id="capture" style="display: none">
                            <div class="pattern-container">
                                 <h3>Saved Designs</h3>
                                   <div id="saved-designs" accept="image/*" style="display:flex; flex-wrap: wrap; gap: 10px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="right-section" style="flex-grow: 1; text-align: center;">
                    <img id="shirt-collar" src="{{ asset('/') }}assets/both/Collar.png" style="display: none" alt="collar" />
                    <img id="shirt-body" src="{{ asset('/') }}assets/both/Shirt.png" style="display: none" alt="body" />
                    <img id="shirt-sleeve" src="{{ asset('/') }}assets/both/Sleves.png" style="display: none" alt="sleeve" />
                    <img id="shirt-trouser" src="{{ asset('/') }}assets/both/Shorts.png" style="display: none" alt="trouser" />
                    <img id="shirt-shocks" src="{{ asset('/') }}assets/both/Socks.png" style="display: none" alt="shocks" />
                    <img id="shirt-shoes" src="{{ asset('/') }}assets/both/Shoes.png" style="display: none" alt="shoes" />
                    
                    <canvas id="shirt-canvas"></canvas>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('static.store') }}" method="POST">
    @csrf
    <div class="head-box">
            <p class="mainheading">CUSTOM SOCCER KIT</p>

            <div class="m-pr">
                <p class="s-pr">$39.00</p>
                <input type="hidden" id="base-price" name="price" value="39"> <!-- Hidden base price -->
                <img src="{{ asset('assets/mystars.png') }}" style="width: 100px" alt="" />
                <p class="str-r">5 reviews</p>
            </div>
        </div>
        {{-- ================== Basic Kit ================== --}}
       
         <div class="flex-form">
            {{-- Fit Type --}}
            <div class="form-column">
                <label for="sleeves_length">Sleeves Length</label>
                <select name="sleeves_length" id="sleeves_length"
                        class="form-control @error('sleeves_length') is-invalid @enderror">
                    <option value="">Select</option>
                    @foreach(['short','long'] as $opt)
                        <option value="{{ $opt }}" {{ old('sleeves_length')==$opt ? 'selected' : '' }}>
                            {{ ucfirst($opt) }}
                        </option>
                    @endforeach
                </select>
                <label for="fit_type">Fit Type</label>
                    <select name="fit_type" id="fit_type"
                            class="form-control @error('fit_type') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach(['men','women','youth'] as $opt)
                            <option value="{{ $opt }}" {{ old('fit_type')==$opt ? 'selected' : '' }}>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('fit_type') <div class="invalid-feedback">{{ $message }}</div> @enderror


            {{-- Kit Type --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="kit_type">Kit Type</label>
                    <select name="kit_type" id="kit_type"
                            class="form-control @error('kit_type') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach(['full','shirt','both'] as $opt)
                            <option value="{{ $opt }}" {{ old('kit_type')==$opt ? 'selected' : '' }}>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('kit_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Collar Type --}}
             <div class="col-md-6">
        <div class="form-group">
            <label for="outfield_players_socks">Outfield Players Socks</label>
            <select name="outfield_players_socks" id="outfield_players_socks"
                    class="form-control @error('outfield_players_socks') is-invalid @enderror">
                <option value="">Select</option>
                @foreach(['yes','no'] as $opt)
                    <option value="{{ $opt }}" {{ old('outfield_players_socks')==$opt ? 'selected' : '' }}>
                        {{ ucfirst($opt) }}
                    </option>
                @endforeach
            </select>
            @error('outfield_players_socks') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
            </div>
            {{-- Team Logo --}}
            <div class="form-column">
                    <label for="team_logo">Team Logo</label>
                    <select name="team_logo" id="team_logo"
                            class="form-control @error('team_logo') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach(['sublimated','embroidery'] as $opt)
                            <option value="{{ $opt }}" {{ old('team_logo')==$opt ? 'selected' : '' }}>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('team_logo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                
           

            {{-- Outfield Players Socks --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="collar_type">Collar Type</label>
                    <select name="collar_type" id="collar_type"
                            class="form-control @error('collar_type') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach(['v-neck','round-neck','polo-style'] as $opt)
                            <option value="{{ $opt }}" {{ old('collar_type')==$opt ? 'selected' : '' }}>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('collar_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Inside Shirt Collar --}}
            <div class="col-md-6">
                <div class="form-group">
                    <label for="inside_shirt_collar">Inside Shirt Collar</label>
                    <select name="inside_shirt_collar" id="inside_shirt_collar"
                            class="form-control @error('inside_shirt_collar') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach(['yes','no'] as $opt)
                            <option value="{{ $opt }}" {{ old('inside_shirt_collar')==$opt ? 'selected' : '' }}>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('inside_shirt_collar') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
             <div class="col-md-6" id="socksColorWrapper" style="display: none;">
        <div class="form-group">
            <label for="socks-color">Select Socks Color</label>
            <select name="socks-color" id="socks-color"
                class="form-control @error('socks-color') is-invalid @enderror">
                <option value="">Select Color</option>
                <option value="black">Black</option>
                <option value="white">White</option>
                <option value="blue">Blue</option>
                <option value="red">Red</option>
                <option value="green">Green</option>
                <option value="yellow">Yellow</option>
                <option value="gray">Gray</option>
                <option value="pink">Pink</option>
                <option value="purple">Purple</option>
                <option value="orange">Orange</option>
                <option value="brown">Brown</option>
                <option value="beige">Beige</option>
                <option value="navy">Navy</option>
            </select>
            @error('socks-color') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
            
            </div>
        </div>

        {{-- ================== Player Info ================== --}}
       
     <p class="size-guide"><i class="fa-solid fa-ruler"></i> Size Guide</p>

<div class="team-form-container">
    <!-- Table -->
  <div class="team-form-container">
    <table class="table table-bordered team-roster-table" id="playersTable" style="width:100%">
        <thead>
            <tr>
                <th>Player Name</th>
                <th>Number</th>
                <th>Shirt Size</th>
                <th>short Size</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <!-- First Row -->
            <tr>
                <td>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" style="padding: 9px">
                </td>
                <td>
                    <input type="number" name="number" class="form-control" placeholder="0" min="1" style="padding: 9px">
                </td>
                <td>
                    <select name="shirt_size" class="form-control" style="padding: 9px">
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                 <td class="hide-on-shirt-only">
                            <select class="short-size" name="short_size" require>
                                <option value="">Select</option>
                                   @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                            </select>
                    </td>
                <td>
                    <input type="number" name="quantity" class="form-control" placeholder="0" min="1" style="padding: 9px">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove Row" style="padding: 7px;  background: red; color: white; border: none; border-radius: 6px;">
                        ✖
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Add Row Button -->
    <button type="button" class="btn btn-primary" id="addRowBtn" style="    margin-top: 2rem; padding: 1rem; background: black; color: white;border-radius: 1rem;">+ Add Row</button>
</div>
</div>


        {{-- ================== Goalkeeper Requirements ================== --}}
      <div class="flex-form">
    {{-- Goalkeeper Kit --}}
    <div class="form-group" style="width: 100%;">
        <label for="goalkeeper_kit">Add a Goalkeeper Kit?</label>
        <select id="goalkeeper_kit" name="goalkeeper_kit"
                class="form-control @error('goalkeeper_kit') is-invalid @enderror"
                onchange="toggleGoalkeeperFields()">
            <option value="">Select</option>
            @foreach(['yes','no'] as $opt)
                <option value="{{ $opt }}" {{ old('goalkeeper_kit')==$opt ? 'selected' : '' }}>
                    {{ ucfirst($opt) }}
                </option>
            @endforeach
        </select>
    </div>

    {{-- Hidden Goalkeeper Fields --}}
   <div id="goalkeeper_fields" style="display: none; margin-left: 3rem;">

    <div class="form-row" style="display: flex; gap: 1rem; flex-wrap: wrap;">
        <div class="form-group" style="flex: 1;">
            <label for="padded">Padded</label>
            <select name="padded" id="padded" class="form-control" style=" width: 21rem;">
                <option value="">Padded</option>
                <option value="Yes">Yes +$5</option>
                <option value="no">No</option>
            </select>
        </div>

        <div class="form-group" style="flex: 1;">
            <label for="goalkeeper_jersey_design">Jersey Design</label>
            <select name="goalkeeper_jersey_design" id="goalkeeper_jersey_design" style=" width: 21rem;"
                    class="form-control @error('goalkeeper_jersey_design') is-invalid @enderror">
                <option value="">Select</option>
                @foreach(['same_as_player_uniform','custom_design'] as $opt)
                    <option value="{{ $opt }}" {{ old('goalkeeper_jersey_design')==$opt ? 'selected' : '' }}>
                        {{ ucwords(str_replace('_',' ', $opt)) }}
                    </option>
                @endforeach
            </select>
            @error('goalkeeper_jersey_design') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <div class="form-row" style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1rem;">
        <div class="form-group" style="flex: 1;">
            <label for="goalkeeper_sleeves">Goalkeeper Sleeves</label>
            <select name="goalkeeper_sleeves" id="goalkeeper_sleeves"
                    class="form-control @error('goalkeeper_sleeves') is-invalid @enderror">
                <option value="">Select</option>
                @foreach(['long','short','padded_elbows'] as $opt)
                    <option value="{{ $opt }}" {{ old('goalkeeper_sleeves')==$opt ? 'selected' : '' }}>
                        {{ ucwords(str_replace('_',' ', $opt)) }}
                    </option>
                @endforeach
            </select>
            @error('goalkeeper_sleeves') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group" style="flex: 1;">
            <label for="jersey_color">Jersey Color</label>
            <select name="jersey_color" id="jersey_color"
                    class="form-control @error('jersey_color') is-invalid @enderror">
                <option value="">Select</option>
                @foreach(['same_as_top','same_as_pants','red','blue','black','white','other'] as $opt)
                    <option value="{{ $opt }}" {{ old('jersey_color')==$opt ? 'selected' : '' }}>
                        {{ ucwords(str_replace('_',' ', $opt)) }}
                    </option>
                @endforeach
            </select>
            @error('jersey_color') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

</div>

</div>

        {{-- ================== Staff Size Guide ================== --}}
   
      <div class="flex-form">
    <div class="form-group" style="width: 100%;">
        <label for="staff_other">Staff/Other</label>
        <select id="staff-other" name="staff_other" onchange="toggleStaffFields()">
            <option value="">Select Option</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>
    </div>
</div>

<!-- Staff Section (Initially Hidden) -->
<div id="staff-section" style="display: none; margin-top: 1rem;">

    <div class="flex-form">
        <!-- Left Column -->
        <div class="form-column">
            <div class="form-group" id="playersTable">
                <label for="staff_kit_type">Staff Kit</label>
                <select id="staff-kit" name="staff_kit_type">
                    <option value="">Select Kit Option</option>
                    <option value="full">Full Kit</option>
                    <option value="shirt">Shirt Only</option>
                </select>
            </div>

            <div class="form-group" id="playersTable">
                <label for="staff_fit_type">Staff Fit Type</label>
                <select id="staff-fit-type" name="staff_fit_type">
                    <option value="">Select Fit Type</option>
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    {{-- <option value="loose">Youth</option> --}}
                </select>
            </div>
             <div class="form-group" id="">
                <label for="staff_sleeves_length">Staff Sleeves Length</label>
                <select id="" name="staff_sleeves_length">
                    <option value="">Staff Sleeves Length</option>
                    <option value="short">Short</option>
                    <option value="long">Long</option>
                    <option value="both">Both</option>
                </select>
            </div>
        </div>

        <!-- Right Column -->
        <div class="form-column">
            <div class="form-group" id="playersTable">
                <label for="staff_collar_type">Staff Collar Type</label>
                <select id="staff-collar-type" name="staff_collar_type">
                    <option value="">Select Collar Type</option>
                    <option value="round-neck">Round Neck</option>
                    <option value="v-neck">V Neck</option>
                    <option value="polo-style">Polo Style</option>
                </select>
            </div>
        </div>
        
        
    </div>

    <!-- Table -->
     <div class="team-form-container">
    <table class="table table-bordered team-roster-table" style="    width: 100%;">
        <thead>
            <tr>
                <th>Player Name</th>
                <th>Number</th>
                <th>Shirt Size</th>
                <th>Pant Size</th>
                <th>guide Sleeves Length</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="players-body">
            <!-- First Row -->
            <tr>
                <td>
                    <input type="text" name="guide_name" class="form-control" placeholder="Enter name" style="padding: 9px">
                </td>
                <td>
                    <input type="number" name="guide_number" class="form-control" placeholder="0" min="1" style="padding: 9px">
                </td>
                <td>
                    <select name="guide_shirt_size" class="form-control" style="padding: 9px">
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                    <select class="short-size" name="guide_pant_size" style="padding: 9px">
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                    <select class="short-size" name="guide_sleeves_length" style="padding: 9px">
                        <option value="">Select</option>
                        @foreach(['short','long'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="guide_quantity" class="form-control" placeholder="0" min="1" style="padding: 9px">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm remove-player-row" title="Remove Row" style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                        ✖
                    </button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Add Row Button -->
    <button type="button" class="btn btn-primary add-player-row" style="margin-top: 2rem; padding: 1rem; background: black; color: white; border-radius: 1rem;">+ Add Row</button>
</div>
  </div>

     <div class="btn_box">
        <button type="submit" class="addtocart_btn">Add to cart</button>
     </div>
  
</form>
</div>


@endsection