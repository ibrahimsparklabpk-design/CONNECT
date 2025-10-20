@extends('layouts.master')


@section('main-content')
    <div class="container-fluid">
        <form action="#" method="POST" enctype="multipart/form-data">

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
      
      <!-- 🟢 Updated heading -->
      <p style="font-weight: 600; font-size: 16px; margin-bottom: 15px;">
          Select Design Colors
      </p>

      <!-- 🟢 Labels without 'Color' -->
      <label class="color-picker-label" for="color-collar">
          <span style="width: 120px; font-weight: 500;">Collar:</span>
          <input type="color" id="color-collar" value="#ffffff" />
      </label>

      <label class="color-picker-label" for="color-body">
          <span style="width: 120px; font-weight: 500;">Shirt:</span>
          <input type="color" id="color-body" value="#ffffff" />
      </label>

      <label class="color-picker-label" for="color-sleeve">
          <span style="width: 120px; font-weight: 500;">Sleeve:</span>
          <input type="color" id="color-sleeve" value="#ffffff" />
      </label>

      <label class="color-picker-label" for="color-trouser">
          <span style="width: 120px; font-weight: 500;">Shorts:</span>
          <input type="color" id="color-trouser" value="#ffffff" />
      </label>

      <label class="color-picker-label" for="color-shocks">
          <span style="width: 120px; font-weight: 500;">Shocks:</span>
          <input type="color" id="color-shocks" value="#ffffff" />
      </label>

      <label class="color-picker-label" for="color-stripe">
          <span style="width: 120px; font-weight: 500;">Strip:</span>
          <input type="color" id="color-stripe" value="#ffffff" />
      </label>

      <label class="color-picker-label" for="color-artboard">
          <span style="width: 120px; font-weight: 500;">Pattern:</span>
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
                                            <a href="#"><img
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
                                        <div
                                            style=" 20px; display: flex; align-items: center; gap: 10px; justify-content: center">
                                            <label for="upload-patterns"
                                                style="padding: 10px 20px; background: #000; color: #fff; border-radius: 8px; cursor: pointer; font-weight: 500;">
                                                <i class="fa fa-upload"></i> Upload Your Pattern
                                            </label>
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

    <h2 style="font-weight:700; font-size:20px; margin-bottom:16px; color:#222; text-align:center;">
        Customize Your Jersey
    </h2>

    <!-- Global text styling toolbar -->
    <div style="display:flex; align-items:center; gap:10px; background:#f3f3f3; padding:10px; border-radius:10px; margin-bottom:18px;">
        <button type="button" id="text-bold"  style="padding:6px 10px; border:1px solid #ccc; border-radius:8px; background:#fff; cursor:pointer;">Bold</button>
        <button type="button" id="text-italic" style="padding:6px 10px; border:1px solid #ccc; border-radius:8px; background:#fff; cursor:pointer;">Italic</button>
        <label style="font-size:12px; color:#444; margin-left:auto;">Size</label>
        <input type="range" id="text-size" min="10" max="90" value="30" style="width:140px;">
    </div>

    <!-- Player Section -->
    <div style="background:#f9f9f9; padding:15px; border-radius:12px; margin-bottom:20px;">
        <h3 style="font-size:16px; font-weight:600; margin-bottom:15px; color:#333;">Player Details</h3>

        <!-- Player Name -->
        <div style="margin-bottom:12px;">
            <label style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Player Name</label>
            <div style="display:flex; gap:8px; align-items:center; margin-bottom:8px;">
                <input type="text" id="player-name" placeholder="Enter Name" maxlength="12"
                    style="flex:1; padding:10px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px;" />
                <input type="color" id="player-name-color" value="#FFFFFF"
                    style="width:44px; height:40px; border:none; border-radius:8px; cursor:pointer;" />
            </div>
            <select class="font-family-select" data-text-type="playerName"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>

        <!-- Player Number -->
        <div>
            <label style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Player Number</label>
            <div style="display:flex; gap:8px; align-items:center; margin-bottom:8px;">
                <input type="text" id="player-number" placeholder="00" maxlength="3"
                    style="flex:1; padding:10px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px;" />
                <input type="color" id="player-number-color" value="#FFFFFF"
                    style="width:44px; height:40px; border:none; border-radius:8px; cursor:pointer;" />
            </div>
            <select class="font-family-select" data-text-type="playerNumber"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>
    </div>

    <!-- Extra Text Section -->
    <div style="background:#f9f9f9; padding:15px; border-radius:12px;">
        <h3 style="font-size:16px; font-weight:600; margin-bottom:15px; color:#333;">Extra Texts</h3>

        <!-- Sleeve Left -->
        <div style="margin-bottom:12px;">
            <input type="text" id="sleeve-text-left" placeholder="Left  Sleeve " maxlength="10"
                style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
            <input type="color" id="sleeve-text-left-color" value="#FFFFFF"
                style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
            <select class="font-family-select" data-text-type="sleeveLeft"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>

        <!-- Sleeve Right -->
        <div style="margin-bottom:12px;">
            <input type="text" id="sleeve-text-right" placeholder="Right Sleeve" maxlength="10"
                style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
            <input type="color" id="sleeve-text-right-color" value="#FFFFFF"
                style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
            <select class="font-family-select" data-text-type="sleeveRight"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>

        <!-- Back Text -->
        <div style="margin-bottom:12px;">
            <input type="text" id="back-text" placeholder="Back Text" maxlength="15"
                style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
            <input type="color" id="back-text-color" value="#FFFFFF"
                style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
            <select class="font-family-select" data-text-type="backText"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>

        <!-- Front Text -->
        <div style="margin-bottom:12px;">
            <input type="text" id="front-text" placeholder="Front Text" maxlength="15"
                style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
            <input type="color" id="front-text-color" value="#FFFFFF"
                style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
            <select class="font-family-select" data-text-type="frontText"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>

        <!-- NEW: Extra Name -->
        <div style="margin-bottom:20px;">
            <input type="text" id="extra-name" placeholder="Extra Name" maxlength="15"
                style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
            <input type="color" id="extra-name-color" value="#FFFFFF"
                style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
            <select class="font-family-select" data-text-type="extraName"
                style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                <option value="Arial Black">Arial Black</option>
                <option value="'Karla', sans-serif">Karla</option>
                <option value="'Roboto', sans-serif">Roboto</option>
                <option value="'Poppins', sans-serif">Poppins</option>
                <option value="'Oswald', sans-serif">Oswald</option>
            </select>
        </div>
    </div>

    <!-- Separate Logo Upload Section -->
    <div id="uploadtextlogo" style="margin-top: 1rem; text-align: center;">
        <label for="upload-text-logo"
            style="padding: 10px 20px; background: #000; color: #fff; border-radius: 8px; cursor: pointer; font-weight: 500; display: inline-block;">
            <i class="fa fa-upload"></i> Upload Your Logo
        </label>
        <input type="file" id="upload-text-logo" style="display: none;" />
        <div id="uploaded-text-logo"
            style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 15px; justify-content: center;">
        </div>
    </div>
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
                         <!-- Hidden images for canvas -->
                            <img id="shirt-collar" src="{{ asset('assets/both/Collar.png') }}" style="display: none" alt="collar" />
                            <img id="shirt-body" src="{{ asset('assets/both/body.png') }}" style="display: none" alt="body" />
                            <img id="shirt-strip" src="{{ asset('assets/both/SHIRT STRIP.png') }}" style="display: none" alt="strip" />
                            
                            <!-- CORRECTED: Sleves.png -->
                            <img id="shirt-sleeve" src="{{ asset('assets/both/Sleves.png') }}" style="display: none" alt="sleeve" />
                            
                            <!-- CORRECTED: SLEVE STRIPS.png -->
                            <img id="shirt-sleeve-strip" src="{{ asset('assets/both/SLEVE STRIPS.png') }}" style="display: none" alt="sleeve strip" />
                            
                            <img id="shirt-trouser" src="{{ asset('assets/both/Shorts.png') }}" style="display: none" alt="trouser" />
                            <img id="shirt-trouser-strip" src="{{ asset('assets/both/SHORT STRIPS.png') }}" style="display: none" alt="trouser strip" />
                            <img id="shirt-shocks" src="{{ asset('assets/both/Socks.png') }}" style="display: none" alt="shocks" />
                            <img id="shirt-shoes" src="{{ asset('assets/both/Shoes.png') }}" style="display: none" alt="shoes" />
                        
                            <canvas id="shirt-canvas" style="border: 1px solid #ccc; max-width: 100%;"></canvas>
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
            @csrf
            <div class="head-box">
                <p class="mainheading">CUSTOM SOCCER KIT</p>

                <div class="m-pr">
                    {{-- <p class="s-pr" data-base="39.00">$39.00</p> --}}
                    {{-- <strong>Grand Total: $<span id="grandTotal">39.00</span></strong> --}}
                    <input type="hidden" name="price" class="row-total">
                    {{-- <input type="hidden" id="base-price" name="price" value="39"> <!-- Hidden base price --> --}}
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
                        class="form-control price-option @error('sleeves_length') is-invalid @enderror">
                        <option value="">Select</option>
                        <option value="short" {{ old('sleeves_length') == 'short' ? 'selected' : '' }}>Short</option>
                        <option value="long" {{ old('sleeves_length') == 'long' ? 'selected' : '' }}>Long (+$2.00/pr
                            kit)</option>
                        <option value="mix" {{ old('sleeves_length') == 'mix' ? 'selected' : '' }}>Mix: Long/Short
                        </option>
                    </select>
                    @error('sleeves_length')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <label for="fit_type">Fit Type</label>
                    <select name="fit_type" id="fit_type" class="form-control @error('fit_type') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (['men', 'women', 'youth'] as $opt)
                            <option value="{{ $opt }}" {{ old('fit_type') == $opt ? 'selected' : '' }}>
                                {{ ucfirst($opt) }}
                            </option>
                        @endforeach
                    </select>
                    @error('fit_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror


                    {{-- Kit Type --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kit_type">Kit Type</label>
                            <select name="kit_type" id="kit_type"
                                class="form-control @error('kit_type') is-invalid @enderror">
                                <option value="">Select</option>
                                @foreach (['full', 'shirt', 'both'] as $opt)
                                    <option value="{{ $opt }}"
                                        {{ old('kit_type') == $opt ? 'selected' : '' }}>
                                        {{ ucfirst($opt) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kit_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Collar Type --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="outfield_players_socks">Outfield Players Socks</label>
                            <select name="outfield_players_socks" id="outfield_players_socks"
                                class="form-control @error('outfield_players_socks') is-invalid @enderror">
                                <option value="">Select</option>
                                @foreach (['yes', 'no'] as $opt)
                                    <option value="{{ $opt }}"
                                        {{ old('outfield_players_socks') == $opt ? 'selected' : '' }}>
                                        {{ ucfirst($opt) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('outfield_players_socks')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                {{-- Team Logo --}}
                <div class="form-column">
                    <label for="team_logo">Team Logo</label>
                    <select name="team_logo" id="team_logo"
                        class="form-control price-option @error('team_logo') is-invalid @enderror">
                        <option value="">Select</option>
                        <option value="sublimated" {{ old('team_logo') == 'sublimated' ? 'selected' : '' }}>Sublimated
                        </option>
                        <option value="embroidery" {{ old('team_logo') == 'embroidery' ? 'selected' : '' }}>Embroidery
                            (+$1.00/pr kit)</option>
                    </select>
                    @error('team_logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror



                    {{-- Outfield Players Socks --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="collar_type">Collar Type</label>
                            <select name="collar_type" id="collar_type"
                                class="form-control price-option @error('collar_type') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="v-neck" {{ old('collar_type') == 'v-neck' ? 'selected' : '' }}>V-Neck
                                </option>
                                <option value="round-neck" {{ old('collar_type') == 'round-neck' ? 'selected' : '' }}>
                                    Round-Neck</option>
                                <option value="polo-style" {{ old('collar_type') == 'polo-style' ? 'selected' : '' }}>
                                    Polo-Style (+$2.00/pr kit)</option>
                            </select>
                            @error('collar_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- Inside Shirt Collar --}}
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inside_shirt_collar">Inside Shirt Collar</label>
                            <select name="inside_shirt_collar" id="inside_shirt_collar"
                                class="form-control price-option @error('inside_shirt_collar') is-invalid @enderror">
                                <option value="">Select</option>
                                <option value="yes" {{ old('inside_shirt_collar') == 'yes' ? 'selected' : '' }}>Yes
                                    (+$2.00/pr kit)</option>
                                <option value="no" {{ old('inside_shirt_collar') == 'no' ? 'selected' : '' }}>No
                                </option>
                            </select>
                            @error('inside_shirt_collar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            @error('socks-color')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            {{-- ================== Player Info ================== --}}

           <p class="size-guide" style="font-size: 18px; font-weight: 600; color: #002266; display: flex; align-items: center; gap: 8px; margin-bottom: 1rem; text-align: center;
    justify-content: center; margin-top: 22px;">
  <i class="fa-solid fa-ruler" style="color: #000436;"></i> Size Guide
</p>

<div class="team-form-container" style="max-width: 900px; margin: 0 auto; background: #ededed1c;
; padding: 20px 25px; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">

  <table class="table table-bordered team-roster-table" style="width: 100%; border-collapse: collapse; background: #fff; text-align: center;">
    <thead style="background: linear-gradient(45deg, #002266, #000436); color: white;">
      <tr>
        <th style="padding: 10px;">Player Name</th>
        <th style="padding: 10px;">Number</th>
        <th style="padding: 10px;">Shirt Size</th>
        <th style="padding: 10px;">Short Size</th>
        <th style="padding: 10px;">Quantity</th>
        <th style="padding: 10px;">Action</th>
      </tr>
    </thead>

    <tbody id="details-wrapper">
      <tr>
        <td><input type="text" name="name[]" class="form-control" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 6px;"></td>
        <td><input type="number" name="number[]" class="form-control" min="1" value="1" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 6px;"></td>
        <td>
          <select name="shirt_size[]" class="form-control" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 6px;">
            <option value="">Select</option>
            <option value="s">S</option>
            <option value="m">M</option>
            <option value="l">L</option>
          </select>
        </td>
        <td>
          <select name="short_size[]" class="form-control" required style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 6px;">
            <option value="">Select</option>
            <option value="s">S</option>
            <option value="m">M</option>
            <option value="l">L</option>
          </select>
        </td>
        <td><input type="number" name="quantity[]" class="form-control player-quantity" min="0" value="0" style="width: 100%; padding: 6px; border: 1px solid #ccc; border-radius: 6px;"></td>

        <input type="hidden" name="price[]" class="player-price" value="39">
        <input type="hidden" name="total[]" class="player-total" value="39">

        <td><button type="button" class="btn btn-danger btn-sm remove-row" style="background-color: #dc3545; border: none; padding: 5px 10px; border-radius: 6px; color: white;">✖</button></td>
      </tr>
    </tbody>
  </table>

  <button type="button" id="addRow" class="btn btn-primary" style="background: linear-gradient(45deg, #002266, #000436); border: none; padding: 8px 18px; border-radius: 6px; color: white; font-weight: 500; margin-top: 8px;">
    + Add Row
  </button>
</div>

<div style="margin-top: 1rem; text-align: center; font-size: 18px;">
  <strong>Grand Total: 
    <span style="color: #002266;">$<span id="grandTotal">39.00</span></span>
  </strong>
</div>

            {{-- ================== Goalkeeper Requirements ================== --}}
           
    </div>

    <!-- Staff Section (Initially Hidden) -->
    <div id="staff-section" style="display: none; margin-top: 1rem;">

        
            <input type="hidden" name="selected_shirt" id="selectedShirtInput">
        </div>
        <div
            style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center; margin-bottom: 20px; margin-left: 6rem; justify-content: center; margin-top:2rem">
            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                <label for="logo" style="margin-bottom: 5px; font-weight: 500;">Upload Logo (This will appear on
                    the shirt)</label>
                <input type="file" name="logo" id="logo"
                    style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; cursor: pointer;">
            </div>

            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                <label for="pattern" style="margin-bottom: 5px; font-weight: 500;">Upload Pattern (This will appear
                    on the shirt)</label>
                <input type="file" name="pattern"
                    style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 6px; cursor: pointer;" />
            </div>
        </div>





        <div id="uploaded-logos"></div>

        <!-- ✅ Logo preview area -->
        <div id="uploaded-logos" style="display:flex;gap:10px;"></div>

        <input type="file" id="upload-logo" accept="image/*" style="display:none;">
        <input type="file" id="upload-patterns" accept="image/*" style="display:none;">


        <div class="btn_box">
            <button type="submit" class="addtocart_btn">Add to cart</button>
        </div>

        </form>
    </div>
        </div>

    {{-- ================== Staff Size Guide ================== --}}

  


@endsection


@section('script')
<script>
// ============== TAB SWITCH ==============
function openTab(tabName) {
  document.querySelectorAll(".tabcolor, .tabcontent").forEach(el => el.style.display = "none");
  const tabEl = document.getElementById(tabName);
  if (!tabEl) return;
  tabEl.style.display = "block";
  tabEl.querySelectorAll(".tabcontent").forEach(child => child.style.display = "block");
}

// ============== GLOBALS ==============
let canvas, ctx;
let collarImage, bodyImage, sleeveImage, trouserImage, shocksImage, shoesImage;
let shirtStripImage, sleeveStripImage, trouserStripImage;

// LOGOS (multiple)
let logos = []; // {image,x,y,scale,angle}
let selectedLogoIndex = -1;

// PATTERN (single)
let selectedPattern = null;
let patternX = 300, patternY = 200, patternScale = 1, patternAngle = 0;

// TEXT ELEMENTS (with playerShortNumber + extraName)
const textElements = {
  playerName:        { text:"", x:430, y: 70,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:28 },
  playerNumber:      { text:"", x:430, y:150,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:60 },
  playerShortNumber: { text:"", x:185, y:290,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"bold",   fontStyle:"normal", fontSize:30 },
  sleeveLeft:        { text:"", x:100, y:300,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:18 },
  sleeveRight:       { text:"", x:500, y:300,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:18 },
  backText:          { text:"", x:300, y:100,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:22 },
  frontText:         { text:"", x:155, y:150,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:22 },
  extraName:         { text:"", x:300, y:520,  scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:24 }
};

// FRONT/BACK toggles (change defaults as you want)
const showOn = {
  playerName:        { front: true,  back: true  },
  playerNumber:      { front: false, back: true  },
  playerShortNumber: { front: false, back: false },
  frontText:         { front: true,  back: false },
  backText:          { front: false, back: true  },
  sleeveLeft:        { front: true,  back: true  },
  sleeveRight:       { front: true,  back: true  },
  extraName:         { front: true,  back: true  },
};

// Per-side positions (600px width reference)
const positions = {
  front: {
    playerName:        { x: 300, y: 120 },
    playerNumber:      { x: 300, y: 240 },
    playerShortNumber: { x: 185, y: 290 },
    frontText:         { x: 300, y: 420 },
    backText:          { x: 300, y: 460 },
    sleeveLeft:        { x: 180, y: 300 },
    sleeveRight:       { x: 420, y: 300 },
    extraName:         { x: 300, y: 520 },
  },
  back: {
    playerName:        { x: 430, y: 70  },
    playerNumber:      { x: 430, y: 150 },
    playerShortNumber: { x: 185, y: 290 },
    frontText:         { x: 300, y: 420 },
    backText:          { x: 300, y: 460 },
    sleeveLeft:        { x: 100, y: 300 },
    sleeveRight:       { x: 500, y: 300 },
    extraName:         { x: 300, y: 520 },
  }
};

// ACTION/STATE
let activeSelection = null; // "logo" | "pattern" | "text-<key>" | null
let dragStart = {x:0, y:0}, isDragging = false, isResizing = false, currentAction = null;

// Colors
const colors = {
  collar:  "#ffffff",
  body:    "#ffffff",
  sleeve:  "#ffffff",
  trouser: "#ffffff",
  shocks:  "#ffffff",
  shoes:   "#ffffff",
  pattern: "#ffffff",
  strip:   "#ffffff"
};

const recycleBin = new Image();
recycleBin.src = "https://img.icons8.com/ios-filled/50/000000/recycle-bin.png";

let showMask = true; // mask text to body (sleeves unmasked)

// ============== DOM READY ==============
document.addEventListener("DOMContentLoaded", function () {
  openTab("Shirts");
  initCanvas();
  setupColorPickers();
  setupTextListeners();
  setupTextStylingControls();
  setupPositionButtons();
  setupFileUploads();
  initPricingAndTables();
  setupSideToggles(); // bind front/back checkboxes if present
});

// ============== (ADD) SIDE-AWARE TEXT HELPERS ==============
const activeTextSide = {}; // { key: "front" | "back" }

function enabledSidesFor(key){
  const vis = showOn[key] || {front:false, back:false};
  const sides = [];
  if (vis.front) sides.push("front");
  if (vis.back)  sides.push("back");
  return sides;
}
function getSidePos(key, side){
  const pos = (positions[side] && positions[side][key]) ? positions[side][key] : textElements[key];
  return { x: pos.x, y: pos.y, side };
}
function getEffectivePos(key, clickX=null, clickY=null){
  const sides = enabledSidesFor(key);
  if (sides.length === 0) return { x:textElements[key].x, y:textElements[key].y, side:null };
  if (clickX != null && clickY != null){
    let best = null, bestD = Infinity;
    for (const s of sides){
      const p = getSidePos(key, s);
      const d = Math.hypot(clickX - p.x, clickY - p.y);
      if (d < bestD){ bestD = d; best = p; }
    }
    return best;
  }
  const pref = activeTextSide[key] || (sides.includes("front") ? "front" : "back");
  return getSidePos(key, pref);
}
function unrotate(relX, relY, angle){
  const c = Math.cos(-angle), s = Math.sin(-angle);
  return { x: relX*c - relY*s, y: relX*s + relY*c };
}

// ============== CANVAS INIT ==============
function initCanvas() {
  canvas = document.getElementById("shirt-canvas");
  if (!canvas) return;
  ctx = canvas.getContext("2d");

  collarImage  = document.getElementById("shirt-collar");
  bodyImage    = document.getElementById("shirt-body");
  sleeveImage  = document.getElementById("shirt-sleeve");
  trouserImage = document.getElementById("shirt-trouser");
  shocksImage  = document.getElementById("shirt-shocks");
  shoesImage   = document.getElementById("shirt-shoes");

  shirtStripImage   = document.getElementById("shirt-strip");
  sleeveStripImage  = document.getElementById("shirt-sleeve-strip");
  trouserStripImage = document.getElementById("shirt-trouser-strip");

  const imgs = [collarImage, bodyImage, sleeveImage, trouserImage, shocksImage, shoesImage, shirtStripImage, sleeveStripImage, trouserStripImage];
  let loaded = 0;

  function initCanvasAfterLoad() {
    const TARGET_W = 600;
    const scale = TARGET_W / bodyImage.naturalWidth;
    const TARGET_H = Math.round(bodyImage.naturalHeight * scale);
    canvas.width = TARGET_W; canvas.height = TARGET_H;
    window.kitScale = scale;
    drawKit();
  }

  imgs.forEach(img => {
    if (!img) return;
    if (img.complete) {
      loaded++;
    } else {
      img.onload = () => { loaded++; if (loaded === imgs.length) initCanvasAfterLoad(); };
    }
  });
  if (loaded === imgs.length) initCanvasAfterLoad();

  // Pointer Events
  canvas.addEventListener("mousedown", startAction);
  canvas.addEventListener("mousemove", performAction);
  canvas.addEventListener("mouseup", endAction);
  canvas.addEventListener("mouseleave", endAction);

  // Wheel: scale or rotate (Ctrl)
  canvas.addEventListener("wheel", e => {
    if (activeSelection === "logo" && selectedLogoIndex >= 0) {
      const logo = logos[selectedLogoIndex];
      if (e.ctrlKey) logo.angle += e.deltaY * 0.01; else logo.scale = Math.max(0.2, logo.scale + e.deltaY * -0.001);
      drawKit();
    } else if (activeSelection === "pattern" && selectedPattern) {
      if (e.ctrlKey) patternAngle += e.deltaY * 0.01; else patternScale = Math.max(0.2, patternScale + e.deltaY * -0.001);
      drawKit();
    } else if (activeSelection?.startsWith("text-")) {
      const key = activeSelection.replace("text-", "");
      if (textElements[key]) {
        if (e.ctrlKey) textElements[key].angle += e.deltaY * 0.01; else textElements[key].scale = Math.max(0.2, textElements[key].scale + e.deltaY * -0.001);
        drawKit();
      }
    }
    e.preventDefault();
  });
}

// ============== HELPERS ==============
function createColoredCanvas(img, color, w, h) {
  const c = document.createElement("canvas");
  c.width = w; c.height = h;
  const cctx = c.getContext("2d");
  cctx.drawImage(img, 0, 0, w, h);
  cctx.globalCompositeOperation = "multiply";
  cctx.fillStyle = color;
  cctx.fillRect(0, 0, w, h);
  cctx.globalCompositeOperation = "destination-in";
  cctx.drawImage(img, 0, 0, w, h);
  return c;
}

function getLogoSize(index) {
  if (index < 0 || index >= logos.length || !logos[index].image) return { w:0, h:0 };
  const logo = logos[index];
  const w = canvas.width * 0.25 * logo.scale;
  const h = logo.image.height * (w / logo.image.width);
  return { w, h };
}

function getPatternSize() {
  if (!selectedPattern) return { w:0, h:0 };
  const w = canvas.width * 0.4 * patternScale;
  const h = selectedPattern.height * (w / selectedPattern.width);
  return { w, h };
}

function fontStringFor(el, scaleMul=1) {
  return `${el.fontStyle} ${el.fontWeight} ${Math.max(1, el.fontSize * scaleMul)}px ${el.fontFamily}`;
}

function getTextSize(key) {
  const el = textElements[key];
  const s = (canvas.width / 600) * el.scale;
  const ctxTemp = document.createElement("canvas").getContext("2d");
  ctxTemp.font = fontStringFor(el, s);
  const w = ctxTemp.measureText((el.text || "").toUpperCase()).width + 20;
  const h = el.fontSize * s + 10;
  return { w, h };
}

function drawTextAt(context, key, pos) {
  const el = textElements[key];
  if (!el?.text) return;
  const s = (canvas.width / 600) * el.scale;
  context.save();
  context.translate(pos.x, pos.y);
  context.rotate(el.angle);
  context.textBaseline = "middle";
  context.fillStyle = el.color;
  context.font = fontStringFor(el, s);
  context.textAlign = key.includes("sleeve") ? (key === "sleeveLeft" ? "left" : "right") : "center";
  context.fillText(el.text.toUpperCase(), 0, 0);
  context.restore();
}

// ============== POINTER ACTIONS (PATCHED) ==============
function startAction(e) {
  dragStart = { x: e.offsetX, y: e.offsetY };
  let clicked = false;

  // reset actives
  Object.keys(textElements).forEach(k => (textElements[k].active = false));

  const items = [];
  // logos
  logos.forEach((logo, idx) => {
    items.push({ type:"logo", index:idx, img:logo.image, x:logo.x, y:logo.y, getSize:() => getLogoSize(idx), angle:logo.angle, scale:logo.scale });
  });
  // pattern
  items.push({ type:"pattern", img:selectedPattern, x:patternX, y:patternY, getSize:getPatternSize, angle:patternAngle });
  // texts (side-aware: nearest side to click)
  Object.keys(textElements).forEach(key => {
    if (!textElements[key].text) return;
    const pos = getEffectivePos(key, e.offsetX, e.offsetY);
    items.push({ type:`text-${key}`, img:true, x:pos.x, y:pos.y, side:pos.side, getSize:() => getTextSize(key), angle:textElements[key].angle, textType:key });
  });

  for (let item of items) {
    if (!item.img) continue;
    const { w, h } = item.getSize();
    // local space
    let relX = e.offsetX - item.x;
    let relY = e.offsetY - item.y;
    // rotation-aware hit test
    const p = unrotate(relX, relY, item.angle || 0);
    relX = p.x; relY = p.y;

    // delete icon (top-center)
    if (Math.hypot(relX - 0, relY - (-h/2 - 20)) <= 12) {
      if (item.type === "logo") {
        logos.splice(item.index, 1); selectedLogoIndex = -1;
      } else if (item.type === "pattern") {
        selectedPattern = null;
      } else if (item.type.startsWith("text-")) {
        const t = item.type.replace("text-", "");
        textElements[t].text = "";
        const inputId = getInputIdForTextType(t);
        const input = document.getElementById(inputId);
        if (input) input.value = "";
      }
      activeSelection = null; drawKit(); return;
    }

    // resize handle (bottom-right)
    if (Math.hypot(relX - (w/2), relY - (h/2)) <= 8) {
      currentAction = "resize"; activeSelection = item.type; isResizing = true; clicked = true;
      if (item.type.startsWith("text-")) {
        const t = item.type.replace("text-", "");
        textElements[t].active = true;
        if (item.side) activeTextSide[t] = item.side; // lock side to the one clicked
        updateTextStylingControls(t);
      }
      if (item.type === "logo") selectedLogoIndex = item.index;
      return;
    }

    // drag inside bbox
    if (relX >= -w/2 && relX <= w/2 && relY >= -h/2 && relY <= h/2) {
      currentAction = "move"; activeSelection = item.type; isDragging = true; clicked = true;
      if (item.type.startsWith("text-")) {
        const t = item.type.replace("text-", "");
        textElements[t].active = true;
        if (item.side) activeTextSide[t] = item.side;
        updateTextStylingControls(t);
      }
      if (item.type === "logo") selectedLogoIndex = item.index;
      return;
    }
  }

  if (!clicked) { activeSelection = null; selectedLogoIndex = -1; drawKit(); }
}

function performAction(e) {
  const dx = e.offsetX - dragStart.x, dy = e.offsetY - dragStart.y;
  if (currentAction === "move") {
    if (activeSelection === "logo" && isDragging && selectedLogoIndex >= 0) {
      logos[selectedLogoIndex].x += dx; logos[selectedLogoIndex].y += dy;
    } else if (activeSelection === "pattern" && isDragging) {
      patternX += dx; patternY += dy;
    } else if (activeSelection?.startsWith("text-") && isDragging) {
      const key  = activeSelection.replace("text-", "");
      const side = activeTextSide[key] || (showOn[key]?.front ? "front" : "back");
      const pos  = (positions[side] && positions[side][key]) ? positions[side][key] : textElements[key];
      pos.x += dx; pos.y += dy; // (PATCH) side position update
    }
    dragStart = { x: e.offsetX, y: e.offsetY }; drawKit();
  }
  if (currentAction === "resize") {
    if (activeSelection === "logo" && isResizing && selectedLogoIndex >= 0) {
      logos[selectedLogoIndex].scale = Math.max(0.2, logos[selectedLogoIndex].scale + dx * 0.005);
    } else if (activeSelection === "pattern" && isResizing) {
      patternScale = Math.max(0.2, patternScale + dx * 0.005);
    } else if (activeSelection?.startsWith("text-") && isResizing) {
      const key = activeSelection.replace("text-", "");
      textElements[key].scale = Math.max(0.2, textElements[key].scale + dx * 0.005);
    }
    dragStart = { x: e.offsetX, y: e.offsetY }; drawKit();
  }
}

function endAction() { isDragging = false; isResizing = false; currentAction = null; }

// ============== DRAW ==============
function drawPatternMasked() {
  if (!selectedPattern) return;
  const { w, h } = getPatternSize();
  const pCanvas = document.createElement("canvas"); pCanvas.width = canvas.width; pCanvas.height = canvas.height;
  const pctx = pCanvas.getContext("2d");
  pctx.save(); pctx.translate(patternX, patternY); pctx.rotate(patternAngle);
  const colored = createColoredCanvas(selectedPattern, colors.pattern, w, h);
  pctx.drawImage(colored, -w/2, -h/2, w, h);
  pctx.restore();
  pctx.globalCompositeOperation = "destination-in";
  pctx.drawImage(bodyImage, 0, 0, canvas.width, canvas.height);
  ctx.drawImage(pCanvas, 0, 0);
}

function drawLogoMasked() {
  if (!logos.length) return;
  const maskCanvas = document.createElement("canvas"); maskCanvas.width = canvas.width; maskCanvas.height = canvas.height;
  const mctx = maskCanvas.getContext("2d");
  [bodyImage, sleeveImage, trouserImage].forEach(img => { if (img?.complete) mctx.drawImage(img, 0, 0, canvas.width, canvas.height); });

  logos.forEach((logo, idx) => {
    const { w, h } = getLogoSize(idx);
    const lCan = document.createElement("canvas"); lCan.width = canvas.width; lCan.height = canvas.height;
    const lctx = lCan.getContext("2d");
    lctx.save(); lctx.translate(logo.x, logo.y); lctx.rotate(logo.angle);
    lctx.drawImage(logo.image, -w/2, -h/2, w, h);
    lctx.restore();
    lctx.globalCompositeOperation = "destination-in";
    lctx.drawImage(maskCanvas, 0, 0);
    ctx.drawImage(lCan, 0, 0);
  });
}

const MASKED_KEYS   = ["playerName","playerNumber","playerShortNumber","frontText","backText","extraName"];
const UNMASKED_KEYS = ["sleeveLeft","sleeveRight"];

function drawPlayerText() {
  // --- SINGLE-INSTANCE GUARD (Player Name) ---
  if (textElements.playerName?.text && showOn.playerName?.front && showOn.playerName?.back) {
    showOn.playerName.front = false; // sirf BACK par dikhao
  }
  // -------------------------------------------

  if (!bodyImage?.naturalWidth) return;

  // FRONT masked
  const frontCanvas = document.createElement("canvas");
  frontCanvas.width = canvas.width; frontCanvas.height = canvas.height;
  const fctx = frontCanvas.getContext("2d");
  Object.keys(textElements).forEach(key => {
    if (!showOn[key]) return;
    if (showOn[key].front && MASKED_KEYS.includes(key)) {
      const pos = positions.front[key] || textElements[key];
      drawTextAt(fctx, key, pos);
    }
  });
  if (showMask) {
    fctx.globalCompositeOperation = "destination-in";
    fctx.drawImage(bodyImage, 0, 0, canvas.width, canvas.height);
  }
  ctx.drawImage(frontCanvas, 0, 0);

  // FRONT unmasked sleeves
  UNMASKED_KEYS.forEach(key => { if (showOn[key]?.front) drawTextAt(ctx, key, positions.front[key] || textElements[key]); });

  // BACK masked
  const backCanvas = document.createElement("canvas");
  backCanvas.width = canvas.width; backCanvas.height = canvas.height;
  const bctx = backCanvas.getContext("2d");
  Object.keys(textElements).forEach(key => {
    if (!showOn[key]) return;
    if (showOn[key].back && MASKED_KEYS.includes(key)) {
      const pos = positions.back[key] || textElements[key];
      drawTextAt(bctx, key, pos);
    }
  });
  if (showMask) {
    bctx.globalCompositeOperation = "destination-in";
    bctx.drawImage(bodyImage, 0, 0, canvas.width, canvas.height);
  }
  ctx.drawImage(backCanvas, 0, 0);

  // BACK unmasked sleeves
  UNMASKED_KEYS.forEach(key => { if (showOn[key]?.back) drawTextAt(ctx, key, positions.back[key] || textElements[key]); });
}

function drawSelections() {
  const items = [];
  // logos
  logos.forEach((logo, idx) => items.push({ type:"logo", index:idx, img:logo.image, x:logo.x, y:logo.y, getSize:() => getLogoSize(idx), angle:logo.angle, active: idx === selectedLogoIndex }));
  // pattern
  items.push({ type:"pattern", img:selectedPattern, x:patternX, y:patternY, getSize:getPatternSize, angle:patternAngle, active: activeSelection === "pattern" });
  // texts (PATCH: use side positions + rotate selection box)
  Object.keys(textElements).forEach(k => {
    const el = textElements[k];
    if (!el.text) return;
    const side = activeTextSide[k] || (showOn[k]?.front ? "front" : (showOn[k]?.back ? "back" : null));
    const pos = (side && positions[side][k]) ? positions[side][k] : el;
    items.push({ type:`text-${k}`, img:true, x:pos.x, y:pos.y, getSize:() => getTextSize(k), angle:el.angle, textType:k, active: el.active });
  });

  items.forEach(item => {
    if (!item.img) return;
    const { w, h } = item.getSize();
    ctx.save();
    ctx.translate(item.x, item.y);
    ctx.rotate(item.angle || 0); // (PATCH) text selection bhi rotate hoga
    if (item.active || (item.type === "logo" && item.index === selectedLogoIndex)) {
      ctx.strokeStyle = "#4A90E2"; ctx.lineWidth = 2; ctx.setLineDash([5,5]);
      ctx.strokeRect(-w/2, -h/2, w, h); ctx.setLineDash([]);
      // delete icon
      ctx.fillStyle = "#FF3B30"; ctx.beginPath(); ctx.arc(0, -h/2 - 20, 12, 0, Math.PI*2); ctx.fill();
      ctx.drawImage(recycleBin, -12, -h/2 - 32, 24, 24);
      // resize
      ctx.fillStyle = "#4A90E2"; ctx.beginPath(); ctx.arc(w/2, h/2, 8, 0, Math.PI*2); ctx.fill();
      // rotate handle (visual)
      ctx.fillStyle = "#34C759"; ctx.beginPath(); ctx.arc(w/2, -h/2 - 10, 8, 0, Math.PI*2); ctx.fill();
    }
    ctx.restore();
  });
}

function drawKit() {
  if (!bodyImage?.naturalWidth) return;
  const TARGET_W = 600;
  const scale = TARGET_W / bodyImage.naturalWidth;
  const TARGET_H = Math.round(bodyImage.naturalHeight * scale);
  canvas.width = TARGET_W; canvas.height = TARGET_H;

  const bodyC    = createColoredCanvas(bodyImage,    colors.body,    TARGET_W, TARGET_H);
  const sleeveC  = createColoredCanvas(sleeveImage,  colors.sleeve,  TARGET_W, TARGET_H);
  const collarC  = createColoredCanvas(collarImage,  colors.collar,  TARGET_W, TARGET_H);
  const trouserC = createColoredCanvas(trouserImage, colors.trouser, TARGET_W, TARGET_H);
  const shocksC  = createColoredCanvas(shocksImage,  colors.shocks,  TARGET_W, TARGET_H);
  const shoesC   = createColoredCanvas(shoesImage,   colors.shoes,   TARGET_W, TARGET_H);

  const shirtStripC   = createColoredCanvas(shirtStripImage,   colors.strip, TARGET_W, TARGET_H);
  const sleeveStripC  = createColoredCanvas(sleeveStripImage,  colors.strip, TARGET_W, TARGET_H);
  const trouserStripC = createColoredCanvas(trouserStripImage, colors.strip, TARGET_W, TARGET_H);

  ctx.clearRect(0,0,canvas.width, canvas.height);
  ctx.drawImage(shoesC,   0,0);
  ctx.drawImage(shocksC,  0,0);
  ctx.drawImage(trouserC, 0,0);
  ctx.drawImage(bodyC,    0,0);
  ctx.drawImage(sleeveC,  0,0);
  ctx.drawImage(collarC,  0,0);

  ctx.drawImage(shirtStripC,   0,0);
  ctx.drawImage(sleeveStripC,  0,0);
  ctx.drawImage(trouserStripC, 0,0);

  drawPatternMasked();
  drawLogoMasked();
  drawPlayerText();
  drawSelections();
}

// ============== SELECT LOGO/PATTERN ==============
function selectLogo(path) {
  if (!bodyImage?.naturalWidth) return;
  const newLogo = { image: new Image(), x:150, y:200, scale:1, angle:0 };
  newLogo.image.src = path;
  newLogo.image.onload = () => { logos.push(newLogo); selectedLogoIndex = logos.length - 1; activeSelection = "logo"; drawKit(); };
}

function selectPattern(path) {
  if (!bodyImage?.naturalWidth) return;
  selectedPattern = new Image(); selectedPattern.src = path;
  selectedPattern.onload = () => { patternX = 150; patternY = 200; patternScale = 1; patternAngle = 0; activeSelection = "pattern"; drawKit(); };
}

// ============== COLOR PICKERS ==============
// Required inputs: #color-collar, #color-body, #color-sleeve, #color-trouser, #color-shocks, #color-shoes, #color-artboard, #color-stripe
function setupColorPickers() {
  ["collar","body","sleeve","trouser","shocks","shoes","pattern","strip"].forEach(p => {
    const el = p === "pattern" ? document.getElementById("color-artboard") : (p === "strip" ? document.getElementById("color-stripe") : document.getElementById(`color-${p}`));
    if (!el) return;
    el.addEventListener("input", e => { colors[p] = e.target.value; drawKit(); });
  });
}

// ============== TEXT INPUTS & COLORS ==============
// Required inputs: player-name(+ -color), front-text(+ -color), back-text(+ -color), sleeve-text-left(+ -color), sleeve-text-right(+ -color), extra-name(+ -color), player-number(+ -color), player-short-number(+ -color)
function bindTextField(textInputId, colorInputId, key) {
  const t = document.getElementById(textInputId);
  const c = document.getElementById(colorInputId);
  if (t) t.addEventListener("input", e => { textElements[key].text = e.target.value; drawKit(); });
  if (c) c.addEventListener("input", e => { textElements[key].color = e.target.value; drawKit(); });
}

function setupTextListeners() {
  bindTextField("player-name",       "player-name-color",       "playerName");
  bindTextField("front-text",        "front-text-color",        "frontText");
  bindTextField("back-text",         "back-text-color",         "backText");
  bindTextField("sleeve-text-left",  "sleeve-text-left-color",  "sleeveLeft");
  bindTextField("sleeve-text-right", "sleeve-text-right-color", "sleeveRight");
  bindTextField("extra-name",        "extra-name-color",        "extraName");

  // Player Number (0–99)
  const pn = document.getElementById("player-number");
  if (pn) {
    pn.setAttribute("maxlength", "2");
    pn.addEventListener("input", (e) => {
      let v = e.target.value.replace(/\D/g, "");
      if (v.length > 2) v = v.slice(0, 2);
      if (v !== "") { let n = parseInt(v, 10); if (n > 99) n = 99; if (n < 0) n = 0; v = String(n); }
      e.target.value = v;
      textElements.playerNumber.text = v; drawKit();
    });
    const pnColor = document.getElementById("player-number-color");
    if (pnColor) pnColor.addEventListener("input", e => { textElements.playerNumber.color = e.target.value; drawKit(); });
  }

  // Shorts Number (0–99)
  const psn = document.getElementById("player-short-number");
  if (psn) {
    psn.setAttribute("maxlength", "2");
    psn.addEventListener("input", (e) => {
      let v = e.target.value.replace(/\D/g, "");
      if (v.length > 2) v = v.slice(0, 2);
      if (v !== "") { let n = parseInt(v, 10); if (n > 99) n = 99; if (n < 0) n = 0; v = String(n); }
      e.target.value = v;
      textElements.playerShortNumber.text = v; drawKit();
    });
    const psnColor = document.getElementById("player-short-number-color");
    if (psnColor) psnColor.addEventListener("input", e => { textElements.playerShortNumber.color = e.target.value; drawKit(); });
  }
}

// Map for clearing input when delete icon pressed
function getInputIdForTextType(textType) {
  const mapping = {
    playerName: "player-name",
    playerNumber: "player-number",
    playerShortNumber: "player-short-number",
    sleeveLeft: "sleeve-text-left",
    sleeveRight: "sleeve-text-right",
    backText: "back-text",
    frontText: "front-text",
    extraName: "extra-name"
  };
  return mapping[textType];
}

// ============== TEXT STYLING (B/I/Size/Font) ==============
// Required controls: #text-bold, #text-italic, #text-size (range), .font-family-select[data-text-type="playerName"]
function setupTextStylingControls() {
  // Per-field font family
  document.querySelectorAll(".font-family-select").forEach(select => {
    select.addEventListener("change", function() {
      const key = this.dataset.textType;
      if (textElements[key]) { textElements[key].fontFamily = this.value; drawKit(); }
    });
  });

  const boldBtn = document.getElementById("text-bold");
  if (boldBtn) boldBtn.addEventListener("click", function() {
    const key = getActiveTextType(); if (!key) return;
    const el = textElements[key]; el.fontWeight = (el.fontWeight === "bold" ? "normal" : "bold");
    drawKit(); updateTextStylingControls(key);
  });

  const italicBtn = document.getElementById("text-italic");
  if (italicBtn) italicBtn.addEventListener("click", function() {
    const key = getActiveTextType(); if (!key) return;
    const el = textElements[key]; el.fontStyle = (el.fontStyle === "italic" ? "normal" : "italic");
    drawKit(); updateTextStylingControls(key);
  });

  const sizeSlider = document.getElementById("text-size");
  if (sizeSlider) sizeSlider.addEventListener("input", function(e) {
    const key = getActiveTextType(); if (!key) return;
    const val = parseInt(e.target.value || "0", 10);
    if (!isNaN(val) && val > 0) { textElements[key].fontSize = val; drawKit(); }
  });
}

function updateTextStylingControls(textType) {
  const el = textElements[textType]; if (!el) return;
  const fontSelect = document.querySelector(`.font-family-select[data-text-type="${textType}"]`);
  if (fontSelect) fontSelect.value = el.fontFamily;
  const boldBtn = document.getElementById("text-bold"); if (boldBtn) boldBtn.classList.toggle("active", el.fontWeight === "bold");
  const italicBtn = document.getElementById("text-italic"); if (italicBtn) italicBtn.classList.toggle("active", el.fontStyle === "italic");
  const sizeSlider = document.getElementById("text-size"); if (sizeSlider) sizeSlider.value = el.fontSize;
}

function getActiveTextType() { return (activeSelection && activeSelection.startsWith("text-")) ? activeSelection.replace("text-", "") : null; }
function getActiveTextElement() { const k = getActiveTextType(); return k ? textElements[k] : null; }

// ============== KEYBOARD & BUTTON MOVE (PATCHED) ==============
function moveActiveText(dx, dy) {
  const key = getActiveTextType();
  if (!key) return;
  const side = activeTextSide[key] || (showOn[key]?.front ? "front" : "back");
  const pos  = (positions[side] && positions[side][key]) ? positions[side][key] : textElements[key];
  pos.x += dx; pos.y += dy; // side-aware move
  drawKit();
}

// Arrow keys nudging
document.addEventListener("keydown", e => {
  if (!window.activeSelection || !activeSelection.startsWith("text-")) return;
  const step = e.shiftKey ? 5 : 1;
  if (["ArrowLeft","ArrowRight","ArrowUp","ArrowDown"].includes(e.key)) {
    e.preventDefault();
    if (e.key === "ArrowLeft")  moveActiveText(-step, 0);
    if (e.key === "ArrowRight") moveActiveText(step, 0);
    if (e.key === "ArrowUp")    moveActiveText(0, -step);
    if (e.key === "ArrowDown")  moveActiveText(0, step);
  }
});

// Optional UI buttons with IDs: btn-left, btn-right, btn-up, btn-down
function setupPositionButtons() {
  const map = { "btn-left":[-5,0], "btn-right":[5,0], "btn-up":[0,-5], "btn-down":[0,5] };
  Object.keys(map).forEach(id => {
    const btn = document.getElementById(id);
    if (btn) btn.addEventListener("click", () => moveActiveText(map[id][0], map[id][1]));
  });
}

// ============== FRONT/BACK TOGGLES ==============
// Optional checkboxes (if you add): toggle-name-front/back, toggle-num-front/back, toggle-extra-front/back
function setupSideToggles() {
  const map = [
    { id:"toggle-name-front",  key:"playerName",        side:"front" },
    { id:"toggle-name-back",   key:"playerName",        side:"back"  },
    { id:"toggle-num-front",   key:"playerNumber",      side:"front" },
    { id:"toggle-num-back",    key:"playerNumber",      side:"back"  },
    { id:"toggle-extra-front", key:"extraName",         side:"front" },
    { id:"toggle-extra-back",  key:"extraName",         side:"back"  },
  ];
  map.forEach(({id,key,side}) => {
    const el = document.getElementById(id);
    if (!el) return;
    el.addEventListener("change", e => {
      if (!showOn[key]) showOn[key] = { front:false, back:false };
      showOn[key][side] = !!e.target.checked;
      drawKit();
    });
    el.checked = !!showOn[key]?.[side];
  });
}

// ============== FILE UPLOADS ==============
// Required containers: #uploaded-logos, #uploaded-pattern, #player-logo-container, #uploaded-text-logo
// Required inputs: #upload-logo, #upload-patterns, #player-logo, #upload-text-logo
function setupFileUploads() {
  const uploadLogo = document.getElementById("upload-logo");
  if (uploadLogo) uploadLogo.addEventListener("change", e => handleFileUpload(e, "logo"));

  const uploadPatterns = document.getElementById("upload-patterns");
  if (uploadPatterns) uploadPatterns.addEventListener("change", e => handleFileUpload(e, "pattern"));

  const playerLogo = document.getElementById("player-logo");
  if (playerLogo) playerLogo.addEventListener("change", e => handleFileUpload(e, "player-logo"));

  const uploadTextLogo = document.getElementById("upload-text-logo");
  if (uploadTextLogo) uploadTextLogo.addEventListener("change", e => handleFileUpload(e, "text-logo"));
}

function handleFileUpload(e, type) {
  const file = e.target.files?.[0]; if (!file) return;
  const reader = new FileReader();
  reader.onload = function(ev) {
    const containerIdMap = { "logo":"uploaded-logos", "pattern":"uploaded-pattern", "player-logo":"player-logo-container", "text-logo":"uploaded-text-logo" };
    const containerId = containerIdMap[type];
    const container = document.getElementById(containerId);
    if (!container) return;

    const wrap = document.createElement("div");
    Object.assign(wrap.style, { position:"relative", width:"80px", height:"80px", margin:"5px" });

    const img = document.createElement("img");
    Object.assign(img.style, { width:"100%", height:"100%", objectFit:"contain", cursor:"pointer", border:"1px solid #ccc", borderRadius:"8px" });
    img.src = ev.target.result;
    wrap.appendChild(img);

    const del = document.createElement("span"); del.innerHTML = "&times;";
    Object.assign(del.style, { position:"absolute", top:"-5px", right:"-5px", background:"red", color:"#fff", width:"18px", height:"18px", display:"flex", alignItems:"center", justifyContent:"center", borderRadius:"50%", cursor:"pointer", fontWeight:"bold" });
    del.onclick = () => wrap.remove();
    wrap.appendChild(del);

    img.onclick = () => { if (type === "pattern") selectPattern(img.src); else selectLogo(img.src); };
    container.appendChild(wrap);
  };
  reader.readAsDataURL(file);
  e.target.value = ""; // allow re-upload same file
}

// ============== SAVE DESIGN THUMB + HIDDEN ==============
function saveDesign() {
  drawKit();
  const dataURL = canvas.toDataURL("image/png");
  const left = document.getElementById("saved-designs"); if (!left) return;

  const wrap = document.createElement("div");
  Object.assign(wrap.style, { position:"relative", display:"inline-block", margin:"5px" });

  const img = document.createElement("img"); img.src = dataURL; img.style.width = "100px"; img.style.display = "block";
  const del = document.createElement("span"); del.innerHTML = "&times;";
  Object.assign(del.style, { position:"absolute", top:"0", right:"0", background:"red", color:"#fff", cursor:"pointer", display:"none" });

  wrap.addEventListener("mouseenter", () => (del.style.display = "block"));
  wrap.addEventListener("mouseleave", () => (del.style.display = "none"));
  del.onclick = () => wrap.remove();

  wrap.appendChild(img); wrap.appendChild(del); left.appendChild(wrap);

  let hiddenInput = document.getElementById("selectedShirtInput");
  if (!hiddenInput) {
    hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden"; hiddenInput.name = "selected_shirt"; hiddenInput.id = "selectedShirtInput";
    const form = document.querySelector("form"); if (form) form.appendChild(hiddenInput);
  }
  hiddenInput.value = dataURL;
  openTab("capture");
}

// ============== PRICING & TABLE ROWS ==============
// Required: .s-pr[data-base], input[name="price"], selects with .price-option
// Player table: #details-wrapper, #addRow (+ .player-quantity, .player-total, .player-total-display)
// Guide table: #guide-details-wrapper, #addGuideRow (+ .guide-quantity, .guide-total, .guide-total-display)
function initPricingAndTables() {
  // Price from options
  const priceElement = document.querySelector(".s-pr");
  const hiddenInput = document.querySelector("input[name='price']");
  const basePrice = priceElement ? parseFloat(priceElement.dataset.base) : 39.0;
  const selects = document.querySelectorAll("select.price-option");

  function updatePrice() {
    let total = basePrice;
    selects.forEach(select => {
      const txt = select.options[select.selectedIndex]?.text || "";
      const m = txt.match(/\+ ?\$?(\d+(\.\d+)?)/);
      if (m) total += parseFloat(m[1]);
    });
    if (priceElement) priceElement.textContent = `$${total.toFixed(2)}`;
    if (hiddenInput) hiddenInput.value = total.toFixed(2);
  }
  updatePrice(); selects.forEach(s => s.addEventListener("change", updatePrice));

  // Grand total (players + guides + extras)
  function getExtrasTotal() {
    let extraTotal = 0;
    document.querySelectorAll(".price-option").forEach(select => {
      const t = select.options[select.selectedIndex]?.text || "";
      const m = t.match(/\+\$(\d+(\.\d+)?)/);
      if (m) extraTotal += parseFloat(m[1]);
    });
    return extraTotal;
  }
  function updateGrandTotal() {
    let grand = 0;
    document.querySelectorAll(".player-total, .guide-total").forEach(input => (grand += parseFloat(input.value) || 0));
    grand += getExtrasTotal();
    const tgt = document.getElementById("grandTotal"); if (tgt) tgt.innerText = grand.toFixed(2);
  }

  // Player rows
  const playerWrapper = document.getElementById("details-wrapper");
  const addRowBtn = document.getElementById("addRow");
  const BASE_PRICE = 39.0;

  function updatePlayerRowTotal(row) {
    const qty = parseFloat(row.querySelector(".player-quantity")?.value) || 0;
    const total = qty * BASE_PRICE;
    const totalInput = row.querySelector(".player-total");
    const display = row.querySelector(".player-total-display");
    if (totalInput) totalInput.value = total.toFixed(2);
    if (display) display.innerText = total.toFixed(2);
    updateGrandTotal();
  }

  if (addRowBtn && playerWrapper) {
    // prevent duplicate listeners
    const clone = addRowBtn.cloneNode(true); addRowBtn.parentNode.replaceChild(clone, addRowBtn);
    clone.addEventListener("click", function() {
      const newRow = document.createElement("tr");
      newRow.innerHTML = `
        <td><input type="text" name="name[]" class="form-control" required></td>
        <td><input type="number" name="number[]" class="form-control" min="1" value="1" required></td>
        <td>
          <select name="shirt_size[]" class="form-control" required>
            <option value="">Select</option>
            <option value="s">S</option><option value="m">M</option><option value="l">L</option>
          </select>
        </td>
        <td>
          <select name="short_size[]" class="form-control" required>
            <option value="">Select</option>
            <option value="s">S</option><option value="m">M</option><option value="l">L</option>
          </select>
        </td>
        <td><input type="number" name="quantity[]" class="form-control player-quantity" min="1" value="1"></td>
        <td style="display:none;">
          <input type="hidden" name="price[]" class="player-price" value="${BASE_PRICE}">
          <input type="hidden" name="total[]" class="player-total" value="${BASE_PRICE}">
          <span class="player-total-display" style="display:none;">${BASE_PRICE.toFixed(2)}</span>
        </td>
        <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>`;
      playerWrapper.appendChild(newRow);
      updateGrandTotal();
    });

    playerWrapper.addEventListener("input", function(e){ if (e.target.classList.contains("player-quantity")) updatePlayerRowTotal(e.target.closest("tr")); });
    playerWrapper.addEventListener("click", function(e){ if (e.target.classList.contains("remove-row")) { e.target.closest("tr").remove(); updateGrandTotal(); } });
  }

  // Guide rows
  const guideWrapper = document.getElementById("guide-details-wrapper");
  const addGuideRowBtn = document.getElementById("addGuideRow");

  function updateGuideRowTotal(row) {
    const qty = parseFloat(row.querySelector(".guide-quantity")?.value) || 0;
    const total = qty * BASE_PRICE;
    const totalInput = row.querySelector(".guide-total");
    const display = row.querySelector(".guide-total-display");
    if (totalInput) totalInput.value = total.toFixed(2);
    if (display) display.innerText = total.toFixed(2);
    updateGrandTotal();
  }

  if (guideWrapper && addGuideRowBtn) {
    addGuideRowBtn.addEventListener("click", function(){
      const newRow = document.createElement("tr");
      newRow.innerHTML = `
        <td><input type="text" name="guide_name[]" class="form-control" required></td>
        <td><input type="number" name="guide_number[]" class="form-control" min="0" value="0" required></td>
        <td><select name="guide_shirt_size[]" class="form-control" required><option value="">Select</option><option value="s">S</option><option value="m">M</option><option value="l">L</option></select></td>
        <td><select name="guide_pant_size[]" class="form-control" required><option value="">Select</option><option value="s">S</option><option value="m">M</option><option value="l">L</option></select></td>
        <td><select name="guide_sleeves_length[]" class="form-control" required><option value="">Select</option><option value="short">SHORT</option><option value="long">LONG</option></select></td>
        <td><input type="number" name="guide_quantity[]" class="form-control guide-quantity" min="0" value="0"></td>
        <td style="display:none;"><input type="hidden" name="guide_price[]" class="guide-price" value="${BASE_PRICE}"><input type="hidden" name="guide_total[]" class="guide-total" value="${BASE_PRICE}"><span class="guide-total-display" style="display:none;">${BASE_PRICE.toFixed(2)}</span></td>
        <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>`;
      guideWrapper.appendChild(newRow); updateGrandTotal();
    });
    guideWrapper.addEventListener("input", function(e){ if (e.target.classList.contains("guide-quantity")) updateGuideRowTotal(e.target.closest("tr")); });
    guideWrapper.addEventListener("click", function(e){ if (e.target.classList.contains("remove-row")) { e.target.closest("tr").remove(); updateGrandTotal(); } });
  }

  // toggles
  const goalkeeperKit = document.getElementById("goalkeeper_kit");
  if (goalkeeperKit) goalkeeperKit.addEventListener("change", function(){ const el = document.getElementById("goalkeeper_fields"); if (el) el.style.display = this.value === "yes" ? "block" : "none"; });

  const staffOther = document.getElementById("staff-other");
  if (staffOther) staffOther.addEventListener("change", function(){ const el = document.getElementById("staff-section"); if (el) el.style.display = this.value === "yes" ? "block" : "none"; });

  const outfieldPlayersSocks = document.getElementById("outfield_players_socks");
  const socksColorWrapper = document.getElementById("socksColorWrapper");
  if (outfieldPlayersSocks && socksColorWrapper) outfieldPlayersSocks.addEventListener("change", function(){ socksColorWrapper.style.display = this.value === "yes" ? "block" : "none"; });
}
</script>
@endsection
