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
                                    <img src="{{ asset('/') }}assets/categories-icon.png" alt="Categories Icon"
                                        class="tab-icon" width="50px" />
                                    <label for="categories" style="margin-left: -13px; font-size:14px">categories</label>
                                </div>

                                <div class="icon" onclick="openTab('Patterns')">
                                    <img src="{{ asset('/') }}assets/pattern-icon.png" alt="Patterns Icon"
                                        class="tab-icon" width="50px" />
                                    <label for="Patterns" style="margin-left: -6px; font-size:14px">Patterns</label>

                                </div>

                                <div class="icon" onclick="openTab('Text')">
                                    <img src="{{ asset('/') }}assets/text.png" alt="Text Icon" class="tab-icon"
                                        width="50px" />
                                    <label for="Text" style="margin-left: 5px; font-size:14px">Text </label>
                                </div>

                                <div class="icon" onclick="openTab('Logos')">
                                    <img src="{{ asset('/') }}assets/c-logo.png" alt="Logos Icon" class="tab-icon"
                                        width="50px" />
                                    <label for="Logos" style="margin-left: 5px; font-size:14px">Logos</label>
                                </div>
                                <div class="icon" onclick="openTab('colorpicker')">
                                    <img src="{{ asset('/') }}assets/colorbucketicon.png" alt="Color Picker Icon"
                                        class="tab-icon" width="50px" />
                                    <label for="Logos" style="margin-left: 5px; font-size:14px">color</label>
                                </div>
                                <div class="icon" onclick="saveDesign()">
                                    <img src="{{ asset('/') }}assets/savedesignicon.png" alt="Save Icon" class="tab-icon"
                                        width="50px" />
                                    <label for="Logos" style="margin-left: 5px; font-size:14px">Save </label>
                                </div>

                            </div>


                            <!-- Tab Contents -->
                            <div class="items-list" style="  height: 40rem;">
                                <div class="tabcolor" id="colorpicker" style="display: none">
                                    <div class="tabcontent" id="Shirts"
                                        style="display:none; padding: 15px; font-family: 'Karla', sans-serif;">
                                        <p style="font-weight: 600; font-size: 16px; margin-bottom: 15px;">Select shirt
                                            options
                                            here...</p>

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
                                            <span style="width: 120px; font-weight: 500;">strip Color:</span>
                                            <input type="color" id="color-stripe" value="#ffffff" />
                                        </label>

                                        <label class="color-picker-label" for="color-strip">
                                            <span style="width: 120px; font-weight: 500;">Pattern Color:</span>
                                            <input type="color" id="color-artboard" value="#ffffff" />
                                        </label>
                                    </div>

                                </div>

                                <div class="tabcontent" id="Logos" style="display: none">
                                    <div class="logos-container"
                                        style="display: flex; flex-direction: column; align-items: center; gap: 20px;">

                                        <!-- Upload Logo Section -->
                                        <div id="uploadLogos" style="margin-top: 1rem; text-align: center;">
                                            <label for="upload-logo"
                                                style="padding: 10px 20px; background: #000; color: #fff; border-radius: 8px; cursor: pointer; font-weight: 500; display: inline-block;">
                                                <i class="fa fa-upload"></i> Upload Your Logo
                                            </label>
                                            <input type="file" id="upload-logo" style="display: none;" />
                                            <div id="uploaded-logos"
                                                style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 15px; justify-content: center;">
                                            </div>
                                        </div>

                                        <!-- Logos Section -->
                                        <div class="logos-grid"
                                            style="display: flex; flex-wrap: wrap; gap: 15px; justify-content: center;">
                                            <img src="{{ asset('/') }}assets/Logos/p-logo1.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo1.png')"
                                                alt="Logo 1" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo2.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo2.png')"
                                                alt="Logo 2" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo3.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo3.png')"
                                                alt="Logo 3" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo4.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo4.png')"
                                                alt="Logo 4" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo5.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo5.png')"
                                                alt="Logo 5" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo6.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo6.png')"
                                                alt="Logo 6" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo7.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo7.png')"
                                                alt="Logo 7" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo8.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo8.png')"
                                                alt="Logo 8" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo9.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo9.png')"
                                                alt="Logo 9" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo10.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo10.png')"
                                                alt="Logo 10" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo11.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo11.png')"
                                                alt="Logo 11" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo12.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo12.png')"
                                                alt="Logo 12" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo13.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo13.png')"
                                                alt="Logo 13" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo14.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo14.png')"
                                                alt="Logo 14" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo15.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo15.png')"
                                                alt="Logo 15" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo16.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo16.png')"
                                                alt="Logo 16" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo17.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo17.png')"
                                                alt="Logo 17" />
                                            <img src="{{ asset('/') }}assets/Logos/p-logo18.png" class="logo"
                                                onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo18.png')"
                                                alt="Logo 18" />
                                        </div>
                                    </div>
                                </div>


                                <!--categories-->
                                <div class="tabcontent" id="categories">
                                    <div class="cat-row">
                                        <div class="cat-col">
                                            <a href="{{ route('custome.index') }}"><img
                                                    src="{{ asset('assets/soccer-icon.png') }}" /></a>
                                            <h1>Soccer</h1>
                                        </div>
                                        <div class="cat-col">
                                            <a href="cricket"><img src="{{ asset('assets/Cricketkit.png') }}" /></a>
                                            <h1>Cricket</h1>
                                        </div>
                                        <div class="cat-col">
                                            <a href="basketball"><img
                                                    src="{{ asset('assets/basketball-kit.png') }}" /></a>
                                            <h1>Basketball</h1>
                                        </div>
                                    </div>
                                    <div class="cat-row">
                                        <div class="cat-col">
                                            <h1>Goal Keeper</h1>
                                        </div>
                                        <div class="cat-col">
                                            <h1>Other / Staff / Management</h1>
                                        </div>
                                    </div>
                                </div>





                                <div class="tabcontent" id="Patterns" style="display: none">
                                    <div class="pattern-container">
                                        <div id="uploadPatterns" style="text-align: center;">
                                                <label for="upload-patterns"
                                                    style="padding: 10px 20px; background: #000; color: #fff; border-radius: 8px; cursor: pointer; font-weight: 500; display: inline-block;">
                                                    <i class="fa fa-upload"></i> Upload Your Pattern
                                                </label>
                                                <input type="file" id="upload-patterns" style="display: none;" />
                                                <div id="uploaded-pattern" 
                                                    style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 15px; justify-content: center;">
                                                </div>
                                            </div>
                                        <div class="tabcontent" id="uploadPatterns"
                                            style="display: none; margin-left: 2rem; margin-top: 1rem;">
                                            <div id="uploaded-pattern" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                            </div>
                                        </div>

                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern2.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern2.png')"
                                            alt="Pattern 2" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern3.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern3.png')"
                                            alt="Pattern 3" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern4.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern4.png')"
                                            alt="Pattern 4" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern5.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern5.png')"
                                            alt="Pattern 5" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern6.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern6.png')"
                                            alt="Pattern 6" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern7.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern7.png')"
                                            alt="Pattern 7" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern8.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern8.png')"
                                            alt="Pattern 8" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern9.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern9.png')"
                                            alt="Pattern 9" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern10.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern10.png')"
                                            alt="Pattern 10" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern11.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern11.png')"
                                            alt="Pattern 11" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern12.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern12.png')"
                                            alt="Pattern 12" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern13.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern13.png')"
                                            alt="Pattern 13" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern14.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern14.png')"
                                            alt="Pattern 14" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern15.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern15.png')"
                                            alt="Pattern 15" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern16.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern16.png')"
                                            alt="Pattern 16" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern17.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern17.png')"
                                            alt="Pattern 17" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern18.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern18.png')"
                                            alt="Pattern 18" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/pattern19.png" class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern19.png')"
                                            alt="Pattern 19" />
                                        <img src="{{ asset('/') }}assets/soccer-shirts/white pattern 16.png"
                                            class="Patterns"
                                            onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/white pattern 16.png')"
                                            alt="white pattern 16.png" />
                                    </div>
                                </div>

                                <div class="tabcontent" id="Text"
                                    style="display:none; padding:25px; font-family:'Karla', sans-serif; background:#fff; border-radius:16px; box-shadow:0 8px 25px rgba(0,0,0,0.1); max-width:420px; margin:auto;">

                                    <h2
                                        style="font-weight:700; font-size:20px; margin-bottom:25px; color:#222; text-align:center;">
                                        Customize Your Jersey
                                    </h2>

                                    <!-- Player Section -->
                                    <div style="background:#f9f9f9; padding:15px; border-radius:12px; margin-bottom:20px;">
                                        <h3 style="font-size:16px; font-weight:600; margin-bottom:15px; color:#333;">Player
                                            Details</h3>

                                        <div style="margin-bottom:12px;">
                                            <label
                                                style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Player
                                                Name</label>
                                            <input type="text" id="player-name" placeholder="Enter Name"
                                                maxlength="12"
                                                style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px;" />
                                        </div>

                                        <div style="margin-bottom:12px;">
                                            <label
                                                style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Name
                                                Color</label>
                                            <input type="color" id="player-name-color" value="#FFFFFF"
                                                style="width:100%; height:40px; border:none; border-radius:8px; cursor:pointer;" />
                                        </div>

                                        <div style="margin-bottom:12px;">
                                            <label
                                                style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Player
                                                Number</label>
                                            <input type="text" id="player-number" placeholder="00" maxlength="3"
                                                style="width:100%; padding:10px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px;" />
                                        </div>

                                        <div>
                                            <label
                                                style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Number
                                                Color</label>
                                            <input type="color" id="player-number-color" value="#FFFFFF"
                                                style="width:100%; height:40px; border:none; border-radius:8px; cursor:pointer;" />
                                        </div>
                                    </div>

                                    <!-- Extra Text Section -->
                                    <div style="background:#f9f9f9; padding:15px; border-radius:12px; margin-bottom:20px;">
                                        <h3 style="font-size:16px; font-weight:600; margin-bottom:15px; color:#333;">Extra
                                            Texts</h3>

                                        <div style="margin-bottom:12px; display:flex; gap:10px; align-items:center;">
                                            <input type="text" id="sleeve-text-left" placeholder="Sleeve Left"
                                                maxlength="10"
                                                style="flex:1; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px;" />
                                            <input type="color" id="sleeve-text-left-color" value="#FFFFFF"
                                                style="width:40px; height:36px; border:none; border-radius:8px; cursor:pointer;" />
                                        </div>

                                        <div style="margin-bottom:12px; display:flex; gap:10px; align-items:center;">
                                            <input type="text" id="sleeve-text-right" placeholder="Sleeve Right"
                                                maxlength="10"
                                                style="flex:1; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px;" />
                                            <input type="color" id="sleeve-text-right-color" value="#FFFFFF"
                                                style="width:40px; height:36px; border:none; border-radius:8px; cursor:pointer;" />
                                        </div>

                                        <div style="margin-bottom:12px; display:flex; gap:10px; align-items:center;">
                                            <input type="text" id="back-text" placeholder="Back Text" maxlength="15"
                                                style="flex:1; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px;" />
                                            <input type="color" id="back-text-color" value="#FFFFFF"
                                                style="width:40px; height:36px; border:none; border-radius:8px; cursor:pointer;" />
                                        </div>

                                        <div style="display:flex; gap:10px; align-items:center;">
                                            <input type="text" id="front-text" placeholder="Front Text"
                                                maxlength="15"
                                                style="flex:1; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px;" />
                                            <input type="color" id="front-text-color" value="#FFFFFF"
                                                style="width:40px; height:36px; border:none; border-radius:8px; cursor:pointer;" />
                                        </div>
                                    </div>

                                    <!-- Logos Section -->

                                </div>



                                <div class="tabcontent" id="capture" style="display: none">
                                    <div class="pattern-container">
                                        <h3>Saved Designs</h3>
                                        <div id="saved-designs" accept="image/*"
                                            style="display:flex; flex-wrap: wrap; gap: 10px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                <!-- Right Section -->
             <div class="right-section" style="flex-grow: 1; text-align: center;">
    <!-- Base hidden images -->
    <img id="shirt-collar" src="{{ asset('assets/circket/collor.png') }}" style="display: none" alt="collar" />
    <img id="shirt-body" src="{{ asset('assets/circket/seperate mouckup.png') }}" style="display: none" alt="body" />
    <img id="shirt-sleeve" src="{{ asset('assets/circket/sleves final.png') }}" style="display: none" alt="sleeve" />
    <img id="shirt-trouser" src="{{ asset('assets/circket/pent.png') }}" style="display: none" alt="trouser" />

    <!-- Canvas jisme final design render hoga -->
    <canvas id="shirt-canvas" width="600" height="600"></canvas>

    <!-- Hidden input jo selected shirt ka path rakhega -->
    <input type="hidden" id="selectedShirtInput" name="selected_shirt">
</div>

            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('custome.store') }}" method="POST">
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
                <select name="fit_type" id="fit_type" class="form-control @error('fit_type') is-invalid @enderror">
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
                <select name="team_logo" id="team_logo" class="form-control @error('team_logo') is-invalid @enderror">
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
                            {{-- <th>Price</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- First Row -->
                        <tr>
                            <td>
                                <input type="text" name="name" class="form-control" placeholder="Enter name"
                                    style="padding: 9px">
                            </td>
                            <td>
                                <input type="number" name="number" class="form-control" placeholder="0" min="1"
                                    style="padding: 9px">
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
                                <input type="number" name="quantity" class="form-control" placeholder="0" min="1"
                                    style="padding: 9px">
                            </td>
                            {{-- <td>
                                <input type="number" name="price" class="form-control" placeholder="0" min="0"
                                    style="padding: 9px">
                            </td> --}}
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove Row"
                                    style="padding: 7px;  background: red; color: white; border: none; border-radius: 6px;">
                                    ✖
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Add Row Button -->
                <button type="button" class="btn btn-primary" id="addRowBtn"
                    style="    margin-top: 2rem; padding: 1rem; background: black; color: white;border-radius: 1rem;">+
                    Add Row</button>
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
                                <input type="text" name="guide_name" class="form-control" placeholder="Enter name"
                                    style="padding: 9px">
                            </td>
                            <td>
                                <input type="number" name="guide_number" class="form-control" placeholder="0" min="1"
                                    style="padding: 9px">
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
                                <input type="number" name="guide_quantity" class="form-control" placeholder="0" min="1"
                                    style="padding: 9px">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm remove-player-row" title="Remove Row"
                                    style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                                    ✖
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Add Row Button -->
                <button type="button" class="btn btn-primary add-player-row"
                    style="margin-top: 2rem; padding: 1rem; background: black; color: white; border-radius: 1rem;">+ Add
                    Row</button>
            </div>
        </div>

        <div class="btn_box">
            <button type="submit" class="addtocart_btn">Add to cart</button>
        </div>

    </form>
</div>


@endsection

@section('script')
    <script>
        // =================== TAB SWITCH ===================
        function openTab(tabName) {
            document.querySelectorAll(".tabcolor, .tabcontent").forEach(tab => tab.style.display = "none");
            const tabEl = document.getElementById(tabName);
            if (tabEl) tabEl.style.display = "block";
            tabEl.querySelectorAll(".tabcontent").forEach(child => child.style.display = "block");
        }

        document.addEventListener("DOMContentLoaded", function() {
            openTab("Shirts");
            initCanvas();
            setupColorPickers();
            setupTextListeners();
            setupFileUploads();
        });

        // =================== CANVAS INIT ===================
        let canvas, ctx;

        // MULTIPLE LOGOS & PATTERN
        let logos = []; // Array to store multiple logos
        let selectedLogoIndex = -1; // Currently selected logo index
        let selectedPattern = null, patternX=300, patternY=200, patternScale=1, patternAngle=0;

        // TEXT ELEMENTS - Now each text element has its own properties
        const textElements = {
            playerName: {
                text: "",
                x: 300,
                y: 150,
                scale: 1,
                angle: 0,
                color: "#000000",
                active: false,
                fontFamily: "Arial Black",
                fontWeight: "normal",
                fontStyle: "normal",
                fontSize: 30
            },
            playerNumber: {
                text: "",
                x: 300,
                y: 250,
                scale: 1,
                angle: 0,
                color: "#000000",
                active: false,
                fontFamily: "Arial Black",
                fontWeight: "normal",
                fontStyle: "normal",
                fontSize: 60
            },
            sleeveLeft: {
                text: "",
                x: 100,
                y: 300,
                scale: 1,
                angle: 0,
                color: "#000000",
                active: false,
                fontFamily: "Arial Black",
                fontWeight: "normal",
                fontStyle: "normal",
                fontSize: 18
            },
            sleeveRight: {
                text: "",
                x: 500,
                y: 300,
                scale: 1,
                angle: 0,
                color: "#000000",
                active: false,
                fontFamily: "Arial Black",
                fontWeight: "normal",
                fontStyle: "normal",
                fontSize: 18
            },
            backText: {
                text: "",
                x: 300,
                y: 100,
                scale: 1,
                angle: 0,
                color: "#000000",
                active: false,
                fontFamily: "Arial Black",
                fontWeight: "normal",
                fontStyle: "normal",
                fontSize: 22
            },
            frontText: {
                text: "",
                x: 300,
                y: 400,
                scale: 1,
                angle: 0,
                color: "#000000",
                active: false,
                fontFamily: "Arial Black",
                fontWeight: "normal",
                fontStyle: "normal",
                fontSize: 22
            }
        };

        // ACTION HANDLERS
        let activeSelection = null;
        let dragStart={x:0,y:0}, isDragging=false, isResizing=false, currentAction=null;

        const colors = { 
            collar:"#ffffff", 
            body:"#ffffff", 
            sleeve:"#ffffff", 
            trouser:"#ffffff"
        };
        
        const recycleBin = new Image(); 
        recycleBin.src="https://img.icons8.com/ios-filled/50/000000/recycle-bin.png";

        // =================== INIT CANVAS ===================
        function initCanvas(){
            console.log("Initializing Canvas...");
            
            canvas = document.getElementById("shirt-canvas");
            ctx = canvas.getContext("2d");

            collarImage = document.getElementById("shirt-collar");
            bodyImage = document.getElementById("shirt-body");
            sleeveImage = document.getElementById("shirt-sleeve");
            trouserImage = document.getElementById("shirt-trouser");

            const imgs = [collarImage, bodyImage, sleeveImage, trouserImage];
            let loaded = 0;
            
            function initCanvasAfterLoad() {
                console.log("All images loaded!");
                
                const TARGET_W = 600;
                const scale = TARGET_W / bodyImage.naturalWidth;
                const TARGET_H = Math.round(bodyImage.naturalHeight * scale);
                
                console.log("Canvas dimensions:", TARGET_W, TARGET_H);
                
                canvas.width = TARGET_W;
                canvas.height = TARGET_H;
                drawKit();
            }

            imgs.forEach(img => {
                console.log(`Checking image: ${img.src}`);
                
                if(img.complete && img.naturalWidth > 0) {
                    console.log(`Image already loaded: ${img.src}`);
                    loaded++;
                } else {
                    img.onload = () => {
                        console.log(`Image loaded: ${img.src}`);
                        loaded++; 
                        if(loaded === imgs.length) {
                            initCanvasAfterLoad();
                        }
                    };
                    
                    img.onerror = () => {
                        console.error(`Failed to load image: ${img.src}`);
                    };
                }
            });
            
            if(loaded === imgs.length) {
                console.log("All images were already loaded");
                initCanvasAfterLoad();
            }

            // Add event listeners
            canvas.addEventListener("mousedown", startAction);
            canvas.addEventListener("mousemove", performAction);
            canvas.addEventListener("mouseup", endAction);
            canvas.addEventListener("mouseleave", endAction);

            canvas.addEventListener("wheel", e => {
                if(activeSelection === "logo" && selectedLogoIndex >= 0){
                    const logo = logos[selectedLogoIndex];
                    e.ctrlKey ? logo.angle += e.deltaY * 0.01 : logo.scale = Math.max(0.2, logo.scale + e.deltaY * -0.001);
                    drawKit();
                }
                if(activeSelection === "pattern" && selectedPattern){
                    e.ctrlKey ? patternAngle += e.deltaY * 0.01 : patternScale = Math.max(0.2, patternScale + e.deltaY * -0.001);
                    drawKit();
                }
                if(activeSelection && activeSelection.startsWith("text-")) {
                    const textType = activeSelection.replace("text-", "");
                    if(textElements[textType]) {
                        e.ctrlKey ? textElements[textType].angle += e.deltaY * 0.01 : textElements[textType].scale = Math.max(0.2, textElements[textType].scale + e.deltaY * -0.001);
                        drawKit();
                    }
                }
                e.preventDefault();
            });
        }

        // =================== ACTION HANDLERS ===================
        function startAction(e){
            dragStart={x:e.offsetX,y:e.offsetY};
            let clicked=false;

            // Reset all text active states
            Object.keys(textElements).forEach(key => {
                textElements[key].active = false;
            });

            const items = [];

            // Add logos to items
            logos.forEach((logo, index) => {
                items.push({
                    type: "logo",
                    index: index,
                    img: logo.image,
                    x: logo.x,
                    y: logo.y,
                    getSize: () => getLogoSize(index),
                    angle: logo.angle
                });
            });

            // Add pattern
            items.push({
                type: "pattern",
                img: selectedPattern,
                x: patternX,
                y: patternY,
                getSize: getPatternSize,
                angle: patternAngle
            });

            // Add text elements to items
            Object.keys(textElements).forEach(key => {
                if(textElements[key].text) {
                    items.push({
                        type: `text-${key}`,
                        img: true,
                        x: textElements[key].x,
                        y: textElements[key].y,
                        getSize: () => getTextSize(key),
                        angle: textElements[key].angle,
                        textType: key
                    });
                }
            });

            for(let item of items){
                if(!item.img && item.type !== "text") continue;
                const {w,h} = item.getSize();
                const relX = e.offsetX - item.x;
                const relY = e.offsetY - item.y;

                // DELETE ICON (top-center)
                const iconX = 0;
                const iconY = -h/2 - 20;
                if(Math.hypot(relX-iconX, relY-iconY) <= 12){
                    if(item.type==="logo") {
                        logos.splice(item.index, 1);
                        selectedLogoIndex = -1;
                    }
                    else if(item.type==="pattern") selectedPattern=null;
                    else if(item.type.startsWith("text-")) {
                        const textType = item.type.replace("text-", "");
                        textElements[textType].text = "";
                        // Clear the corresponding input field
                        document.getElementById(getInputIdForTextType(textType)).value = "";
                    }
                    activeSelection=null;
                    drawKit();
                    return;
                }

                // RESIZE HANDLE (bottom-right)
                const handleX = w/2;
                const handleY = h/2;
                if(Math.hypot(relX-handleX, relY-handleY) <= 8){
                    currentAction="resize";
                    activeSelection=item.type;
                    if(item.type.startsWith("text-")) {
                        const textType = item.type.replace("text-", "");
                        textElements[textType].active = true;
                    }
                    if(item.type==="logo") selectedLogoIndex = item.index;
                    isResizing=true;
                    clicked=true;
                    return;
                }

                // DRAG (inside object)
                if(relX >= -w/2 && relX <= w/2 && relY >= -h/2 && relY <= h/2){
                    currentAction="move";
                    activeSelection=item.type;
                    if(item.type.startsWith("text-")) {
                        const textType = item.type.replace("text-", "");
                        textElements[textType].active = true;
                    }
                    if(item.type==="logo") selectedLogoIndex = item.index;
                    isDragging=true;
                    clicked=true;
                    return;
                }
            }

            if(!clicked){
                activeSelection=null;
                selectedLogoIndex = -1;
                drawKit();
            }
        }

        function performAction(e){
            const dx=e.offsetX-dragStart.x, dy=e.offsetY-dragStart.y;
            if(currentAction==="move"){
                if(activeSelection==="logo" && isDragging && selectedLogoIndex >= 0){ 
                    logos[selectedLogoIndex].x += dx; 
                    logos[selectedLogoIndex].y += dy; 
                }
                if(activeSelection==="pattern" && isDragging){ 
                    patternX += dx; 
                    patternY += dy; 
                }
                if(activeSelection && activeSelection.startsWith("text-") && isDragging) {
                    const textType = activeSelection.replace("text-", "");
                    textElements[textType].x += dx;
                    textElements[textType].y += dy;
                }
                dragStart={x:e.offsetX,y:e.offsetY}; 
                drawKit();
            }
            if(currentAction==="resize"){
                if(activeSelection==="logo" && isResizing && selectedLogoIndex >= 0) 
                    logos[selectedLogoIndex].scale = Math.max(0.2, logos[selectedLogoIndex].scale + dx*0.005);
                if(activeSelection==="pattern" && isResizing) 
                    patternScale = Math.max(0.2, patternScale + dx*0.005);
                if(activeSelection && activeSelection.startsWith("text-") && isResizing) {
                    const textType = activeSelection.replace("text-", "");
                    textElements[textType].scale = Math.max(0.2, textElements[textType].scale + dx*0.005);
                }
                dragStart={x:e.offsetX,y:e.offsetY}; 
                drawKit();
            }
        }

        function endAction(){ 
            isDragging=false; 
            isResizing=false; 
            currentAction=null; 
        }

        // =================== SELECTION BOXES ===================
        function drawSelections(){
            const items = [];

            // Add logos to items
            logos.forEach((logo, index) => {
                items.push({
                    type: "logo",
                    index: index,
                    img: logo.image,
                    x: logo.x,
                    y: logo.y,
                    getSize: () => getLogoSize(index),
                    angle: logo.angle,
                    active: index === selectedLogoIndex
                });
            });

            // Add pattern
            items.push({
                type: "pattern",
                img: selectedPattern,
                x: patternX,
                y: patternY,
                getSize: getPatternSize,
                angle: patternAngle,
                active: activeSelection === "pattern"
            });

            // Add text elements to items
            Object.keys(textElements).forEach(key => {
                if(textElements[key].text) {
                    items.push({
                        type: `text-${key}`,
                        img: true,
                        x: textElements[key].x,
                        y: textElements[key].y,
                        getSize: () => getTextSize(key),
                        angle: textElements[key].angle,
                        textType: key,
                        active: textElements[key].active
                    });
                }
            });

            items.forEach(item=>{
                if(item.img){
                    const {w,h}=item.getSize();
                    ctx.save();
                    ctx.translate(item.x,item.y);
                    if(item.type !== "text") ctx.rotate(item.angle);

                    // Draw selection box only if active
                    if(item.active || (item.type === "logo" && item.index === selectedLogoIndex)) {
                        ctx.strokeStyle="#4A90E2";
                        ctx.lineWidth=2;
                        ctx.setLineDash([5,5]);
                        ctx.strokeRect(-w/2,-h/2,w,h);
                        ctx.setLineDash([]);

                        // DELETE ICON (top-center)
                        ctx.fillStyle="#FF3B30";
                        ctx.beginPath(); 
                        ctx.arc(0,-h/2-20,12,0,Math.PI*2); 
                        ctx.fill();
                        ctx.drawImage(recycleBin,-12,-h/2-32,24,24);

                        // RESIZE HANDLE (bottom-right)
                        ctx.fillStyle="#4A90E2";
                        ctx.beginPath(); 
                        ctx.arc(w/2,h/2,8,0,Math.PI*2); 
                        ctx.fill();
                    }

                    ctx.restore();
                }
            });
        }

        // =================== SELECT LOGO/PATTERN ===================
        function selectLogo(path){
            if(!bodyImage.naturalWidth) return;
            const newLogo = {
                image: new Image(),
                x: 150,
                y: 200,
                scale: 1,
                angle: 0
            };

            newLogo.image.src = path;
            newLogo.image.onload = () => {
                logos.push(newLogo);
                selectedLogoIndex = logos.length - 1;
                activeSelection = "logo";
                drawKit();
            };
        }

        function selectPattern(path){
            if(!bodyImage.naturalWidth) return;
            selectedPattern = new Image();
            selectedPattern.src = path;
            selectedPattern.onload = () => {
                patternX = 150;
                patternY = 200;
                patternScale = 1;
                patternAngle = 0;
                activeSelection = "pattern";
                drawKit();
            };
        }

        // =================== COLOR CANVAS HELPER ===================
        function createColoredCanvas(img,color,w,h){
            const c=document.createElement("canvas"); c.width=w; c.height=h;
            const cctx=c.getContext("2d");
            cctx.drawImage(img,0,0,w,h);
            cctx.globalCompositeOperation="multiply";
            cctx.fillStyle=color; cctx.fillRect(0,0,w,h);
            cctx.globalCompositeOperation="destination-in"; cctx.drawImage(img,0,0,w,h);
            return c;
        }

        // =================== SIZE HELPERS ===================
        function getLogoSize(index){ 
            if(index < 0 || index >= logos.length || !logos[index].image) return {w:0,h:0}; 
            const logo = logos[index];
            const w=canvas.width*0.25*logo.scale; 
            const h=logo.image.height*(w/logo.image.width); 
            return {w,h}; 
        }
        
        function getPatternSize(){ 
            if(!selectedPattern) return {w:0,h:0}; 
            const w=canvas.width*0.4*patternScale; 
            const h=selectedPattern.height*(w/selectedPattern.width); 
            return {w,h}; 
        }

        function getTextSize(textType) {
            const scale = canvas.width / 600 * textElements[textType].scale;
            const ctxTemp = document.createElement("canvas").getContext("2d");

            let text = textElements[textType].text;
            let fontSize = textElements[textType].fontSize;

            // Build font string
            const fontString = `${textElements[textType].fontStyle} ${textElements[textType].fontWeight} ${fontSize * scale}px ${textElements[textType].fontFamily}`;
            ctxTemp.font = fontString;

            const w = ctxTemp.measureText(text).width + 20;
            const h = fontSize * scale + 10;
            return {w,h};
        }

        // =================== DRAW FUNCTIONS ===================
        function drawPatternMasked(){
            if(!selectedPattern) return;
            const {w,h}=getPatternSize();
            const pCanvas=document.createElement("canvas"); pCanvas.width=canvas.width; pCanvas.height=canvas.height;
            const pctx=pCanvas.getContext("2d");
            pctx.save(); 
            pctx.translate(patternX,patternY); 
            pctx.rotate(patternAngle);
            const coloredPattern=createColoredCanvas(selectedPattern,"#ffffff",w,h); // Pattern color white rahega
            pctx.drawImage(coloredPattern,-w/2,-h/2,w,h); 
            pctx.restore();
            pctx.globalCompositeOperation="destination-in";
            pctx.drawImage(bodyImage,0,0,canvas.width,canvas.height);
            ctx.drawImage(pCanvas,0,0);
        }

        function drawLogoMasked(){
            if(logos.length === 0) return;

            // Create a combined mask
            const maskCanvas = document.createElement("canvas");
            maskCanvas.width = canvas.width;
            maskCanvas.height = canvas.height;
            const mctx = maskCanvas.getContext("2d");

            // Draw all kit parts as mask
            [bodyImage, sleeveImage, trouserImage].forEach(img => {
                if(img.complete) mctx.drawImage(img,0,0,canvas.width,canvas.height);
            });

            logos.forEach((logo, index) => {
                if(!logo.image) return;
                const {w,h} = getLogoSize(index);

                const logoCanvas = document.createElement("canvas");
                logoCanvas.width = canvas.width;
                logoCanvas.height = canvas.height;
                const lctx = logoCanvas.getContext("2d");

                // Draw logo
                lctx.save();
                lctx.translate(logo.x, logo.y);
                lctx.rotate(logo.angle);
                lctx.drawImage(logo.image, -w/2, -h/2, w, h);
                lctx.restore();

                // Apply combined mask
                lctx.globalCompositeOperation = "destination-in";
                lctx.drawImage(maskCanvas, 0, 0);

                // Draw on main canvas
                ctx.drawImage(logoCanvas, 0, 0);
            });
        }

        // =================== PLAYER TEXT ===================
        function drawPlayerText(){
            if(!bodyImage.naturalWidth) return;

            // Draw each text element individually
            Object.keys(textElements).forEach(key => {
                if(textElements[key].text) {
                    const scale = canvas.width / 600 * textElements[key].scale;

                    ctx.save();
                    ctx.translate(textElements[key].x, textElements[key].y);
                    ctx.rotate(textElements[key].angle);
                    ctx.textAlign = "center";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = textElements[key].color;

                    let fontSize = textElements[key].fontSize;

                    // Build font string with style and weight
                    const fontString = `${textElements[key].fontStyle} ${textElements[key].fontWeight} ${fontSize * scale}px ${textElements[key].fontFamily}`;
                    ctx.font = fontString;

                    // Adjust text alignment for sleeve text
                    if(key === "sleeveLeft") {
                        ctx.textAlign = "left";
                    } else if(key === "sleeveRight") {
                        ctx.textAlign = "right";
                    } else {
                        ctx.textAlign = "center";
                    }

                    ctx.fillText(textElements[key].text.toUpperCase(), 0, 0);
                    ctx.restore();
                }
            });
        }

        // =================== DRAW KIT ===================
        function drawKit(){
            if(!bodyImage || !bodyImage.complete) {
                console.log("Body image not ready yet");
                return;
            }
            
            const TARGET_W=600, scale=TARGET_W/bodyImage.naturalWidth, TARGET_H=Math.round(bodyImage.naturalHeight*scale);
            canvas.width=TARGET_W; 
            canvas.height=TARGET_H;

            // Create colored canvases
            const bodyC=createColoredCanvas(bodyImage,colors.body,TARGET_W,TARGET_H);
            const sleeveC=createColoredCanvas(sleeveImage,colors.sleeve,TARGET_W,TARGET_H);
            const collarC=createColoredCanvas(collarImage,colors.collar,TARGET_W,TARGET_H);
            const trouserC=createColoredCanvas(trouserImage,colors.trouser,TARGET_W,TARGET_H);

            // Clear canvas
            ctx.clearRect(0,0,canvas.width,canvas.height);

            // Draw in correct order
            ctx.drawImage(trouserC,0,0);
            ctx.drawImage(bodyC,0,0);
            ctx.drawImage(sleeveC,0,0);
            ctx.drawImage(collarC,0,0);

            drawPatternMasked(); 
            drawLogoMasked(); 
            drawPlayerText(); 
            drawSelections();
        }

        // =================== COLOR PICKERS ===================
        function setupColorPickers(){
            // Remove extra color pickers, keep only 4 basic ones
            ["collar","body","sleeve","trouser"].forEach(p=>{
                const el = document.getElementById(`color-${p}`);
                if(el) {
                    el.addEventListener("input", e=>{ 
                        colors[p]=e.target.value; 
                        drawKit(); 
                    });
                }
            });
        }

        // =================== TEXT LISTENERS ===================
        function setupTextListeners(){
            // Player name
            document.getElementById("player-name").addEventListener("input", function(e) {
                textElements.playerName.text = e.target.value;
                textElements.playerName.color = document.getElementById("player-name-color").value;
                drawKit();
            });

            // Player number
            document.getElementById("player-number").addEventListener("input", function(e) {
                textElements.playerNumber.text = e.target.value;
                textElements.playerNumber.color = document.getElementById("player-number-color").value;
                drawKit();
            });

            // Sleeve left
            document.getElementById("sleeve-text-left").addEventListener("input", function(e) {
                textElements.sleeveLeft.text = e.target.value;
                textElements.sleeveLeft.color = document.getElementById("sleeve-text-left-color").value;
                drawKit();
            });

            // Sleeve right
            document.getElementById("sleeve-text-right").addEventListener("input", function(e) {
                textElements.sleeveRight.text = e.target.value;
                textElements.sleeveRight.color = document.getElementById("sleeve-text-right-color").value;
                drawKit();
            });

            // Back text
            document.getElementById("back-text").addEventListener("input", function(e) {
                textElements.backText.text = e.target.value;
                textElements.backText.color = document.getElementById("back-text-color").value;
                drawKit();
            });

            // Front text
            document.getElementById("front-text").addEventListener("input", function(e) {
                textElements.frontText.text = e.target.value;
                textElements.frontText.color = document.getElementById("front-text-color").value;
                drawKit();
            });

            // Color pickers for text
            document.getElementById("player-name-color").addEventListener("input", function(e) {
                textElements.playerName.color = e.target.value;
                drawKit();
            });

            document.getElementById("player-number-color").addEventListener("input", function(e) {
                textElements.playerNumber.color = e.target.value;
                drawKit();
            });

            document.getElementById("sleeve-text-left-color").addEventListener("input", function(e) {
                textElements.sleeveLeft.color = e.target.value;
                drawKit();
            });

            document.getElementById("sleeve-text-right-color").addEventListener("input", function(e) {
                textElements.sleeveRight.color = e.target.value;
                drawKit();
            });

            document.getElementById("back-text-color").addEventListener("input", function(e) {
                textElements.backText.color = e.target.value;
                drawKit();
            });

            document.getElementById("front-text-color").addEventListener("input", function(e) {
                textElements.frontText.color = e.target.value;
                drawKit();
            });
        }

        // Helper function to get input ID for text type
        function getInputIdForTextType(textType) {
            const mapping = {
                playerName: "player-name",
                playerNumber: "player-number",
                sleeveLeft: "sleeve-text-left",
                sleeveRight: "sleeve-text-right",
                backText: "back-text",
                frontText: "front-text"
            };
            return mapping[textType];
        }

        // =================== FILE UPLOADS ===================
        function setupFileUploads(){
            // Logo upload
            const uploadLogo = document.getElementById("upload-logo");
            if(uploadLogo){
                uploadLogo.addEventListener("change", function(e){
                    handleFileUpload(e, "logo");
                });
            }

            // Pattern upload
            const uploadPatterns = document.getElementById("upload-patterns");
            if(uploadPatterns){
                uploadPatterns.addEventListener("change", function(e){
                    handleFileUpload(e, "pattern");
                });
            }
        }

        function handleFileUpload(e, type){
            const file = e.target.files[0];
            if(!file) return;

            const reader = new FileReader();
            reader.onload = function(event){
                const containerId = type==="logo" ? "uploaded-logos" : "uploaded-pattern";
                const container = document.getElementById(containerId);
                if(!container) return;

                // Wrapper div for image + delete button
                const wrap = document.createElement("div");
                wrap.style.position = "relative";
                wrap.style.width = "80px";
                wrap.style.height = "80px";
                wrap.style.margin = "5px";

                // Uploaded image
                const img = document.createElement("img");
                img.src = event.target.result;
                img.style.width = "100%";
                img.style.height = "100%";
                img.style.objectFit = "contain";
                img.style.cursor = "pointer";
                img.style.border = "1px solid #ccc";
                img.style.borderRadius = "8px";
                wrap.appendChild(img);

                // Delete button
                const del = document.createElement("span");
                del.innerHTML = "&times;";
                del.style.position = "absolute";
                del.style.top = "-5px";
                del.style.right = "-5px";
                del.style.background = "red";
                del.style.color = "#fff";
                del.style.width = "18px";
                del.style.height = "18px";
                del.style.display = "flex";
                del.style.alignItems = "center";
                del.style.justifyContent = "center";
                del.style.borderRadius = "50%";
                del.style.cursor = "pointer";
                del.style.fontWeight = "bold";
                del.onclick = () => wrap.remove();
                wrap.appendChild(del);

                // Click on image → add to kit
                img.onclick = () => {
                    if(type==="logo"){
                        selectLogo(img.src);
                    } else if(type==="pattern"){
                        selectPattern(img.src);
                    }
                };

                container.appendChild(wrap);
            };
            reader.readAsDataURL(file);

            // Reset input for uploading same file again
            e.target.value = "";
        }

        // =================== SAVE DESIGN ===================
        function saveDesign(){
            drawKit();
            const dataURL = canvas.toDataURL("image/png");
            const left = document.getElementById("saved-designs");
            if(!left) return;

            const wrap=document.createElement("div"); 
            wrap.style.position="relative"; 
            wrap.style.display="inline-block"; 
            wrap.style.margin="5px";
            
            const img=document.createElement("img"); 
            img.src=dataURL; 
            img.style.width="100px"; 
            img.style.display="block";
            
            const del=document.createElement("span"); 
            del.innerHTML="&times;"; 
            del.style.position="absolute"; 
            del.style.top="0"; 
            del.style.right="0"; 
            del.style.background="red"; 
            del.style.color="#fff"; 
            del.style.cursor="pointer"; 
            del.style.display="none";
            
            wrap.addEventListener("mouseenter",()=>del.style.display="block");
            wrap.addEventListener("mouseleave",()=>del.style.display="none");
            del.onclick=()=>wrap.remove();
            
            wrap.appendChild(img); 
            wrap.appendChild(del); 
            left.appendChild(wrap);

            // Hidden input for form submission
            let hiddenInput = document.getElementById("selectedShirtInput");
            if(!hiddenInput){
                hiddenInput = document.createElement("input");
                hiddenInput.type = "hidden";
                hiddenInput.name = "selected_shirt";
                hiddenInput.id = "selectedShirtInput";
                document.querySelector("form").appendChild(hiddenInput);
            }
            hiddenInput.value = dataURL;

            openTab("capture");
        }

        // =================== SHIRT SELECTION ===================
        function selectShirt(imagePath) {
            const hiddenInput = document.getElementById("selectedShirtInput");
            hiddenInput.value = imagePath;

            const shirtImg = document.getElementById("selected-shirt");
            if(shirtImg){
                shirtImg.src = imagePath;
            }
        }
    </script>

    @include('component.footer')
@endsection