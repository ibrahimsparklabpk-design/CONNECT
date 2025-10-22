@extends('backend.layout.master')

@section('main-content')
<div class="container-fluid">
  <form action="{{ route('custome.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
      <div class="col-lg-12 col-md-6">
        <div class="main-section" style="display:flex; gap:30px;">
          <!-- =============== LEFT =============== -->
          <div class="left-section" style="min-width:300px;">
            <div class="icon-list" style="display:flex; gap:10px; margin-bottom:20px;">
              <div class="icon" onclick="openTab('categories')">
                <img src="{{ asset('/') }}assets/categories-icon.png" width="50" alt="Categories" />
                <label style="margin-left:-13px; font-size:14px">categories</label>
              </div>
              <div class="icon" onclick="openTab('Patterns')">
                <img src="{{ asset('/') }}assets/pattern-icon.png" width="50" alt="Patterns" />
                <label style="margin-left:-6px; font-size:14px">Patterns</label>
              </div>
              <div class="icon" onclick="openTab('Text')">
                <img src="{{ asset('/') }}assets/text.png" width="50" alt="Text" />
                <label style="margin-left:5px; font-size:14px">Text</label>
              </div>
              <div class="icon" onclick="openTab('Logos')">
                <img src="{{ asset('/') }}assets/c-logo.png" width="50" alt="Logos" />
                <label style="margin-left:5px; font-size:14px">Logos</label>
              </div>
              <div class="icon" onclick="openTab('colorpicker')">
                <img src="{{ asset('/') }}assets/colorbucketicon.png" width="50" alt="Colors" />
                <label style="margin-left:5px; font-size:14px">color</label>
              </div>
              <div class="icon" onclick="saveDesign()">
                <img src="{{ asset('/') }}assets/savedesignicon.png" width="50" alt="Save" />
                <label style="margin-left:5px; font-size:14px">Save</label>
              </div>
            </div>

            <!-- Tabs content -->
            <div class="items-list" style="height:40rem; overflow:auto;">
              <!-- ===== Color Picker (4 base + Extras) ===== -->
              <div class="tabcolor" id="colorpicker" style="display:none">
                <div class="tabcontent" id="Shirts" style="display:block; padding:15px; font-family:'Karla',sans-serif;">
                  <p style="font-weight:600; font-size:16px; margin-bottom:15px;">Select Design Colors</p>

                  <label class="color-picker-label" for="color-collar" style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                    <span style="width:160px; font-weight:500;">Collar</span>
                    <input type="color" id="color-collar" value="#ffffff" />
                  </label>

                  <label class="color-picker-label" for="color-body" style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                    <span style="width:160px; font-weight:500;">Shirt (Body)</span>
                    <input type="color" id="color-body" value="#ffffff" />
                  </label>

                  <label class="color-picker-label" for="color-sleeve" style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                    <span style="width:160px; font-weight:500;">Sleeve</span>
                    <input type="color" id="color-sleeve" value="#ffffff" />
                  </label>

                  <label class="color-picker-label" for="color-trouser" style="display:flex; align-items:center; gap:10px;">
                    <span style="width:160px; font-weight:500;">Shorts (Trouser)</span>
                    <input type="color" id="color-trouser" value="#ffffff" />
                  </label>

                  <hr style="margin:14px 0; opacity:.25;">
                  <p style="font-weight:600; font-size:14px; margin:8px 0 12px;">Extras</p>

                  <label class="color-picker-label" for="color-socks" style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                    <span style="width:160px; font-weight:500;">Socks</span>
                    <input type="color" id="color-socks" value="#ffffff" />
                  </label>

                  <label class="color-picker-label" for="color-gloves" style="display:flex; align-items:center; gap:10px; margin-bottom:10px;">
                    <span style="width:160px; font-weight:500;">Gloves</span>
                    <input type="color" id="color-gloves" value="#ffffff" />
                  </label>

                  <label class="color-picker-label" for="color-strip" style="display:flex; align-items:center; gap:10px;">
                    <span style="width:160px; font-weight:500;">Back Strap / Strips</span>
                    <input type="color" id="color-strip" value="#ffffff" />
                  </label>

                  <!-- Optional: Shoes picker (uncomment if needed)
                  <label class="color-picker-label" for="color-shoes" style="display:flex; align-items:center; gap:10px; margin-top:10px;">
                    <span style="width:160px; font-weight:500;">Shoes</span>
                    <input type="color" id="color-shoes" value="#ffffff" />
                  </label>
                  -->
                </div>
              </div>

              <!-- ===== Logos ===== -->
              <div class="tabcontent" id="Logos" style="display:none">
                <div class="logos-container" style="display:flex; flex-direction:column; align-items:center; gap:20px;">
                  <div id="uploadLogos" style="margin-top:1rem; text-align:center;">
                    <label for="upload-logo" style="padding:10px 20px; background:#000; color:#fff; border-radius:8px; cursor:pointer; font-weight:500; display:inline-block;">
                      <i class="fa fa-upload"></i> Upload Your Logo
                    </label>
                    <input type="file" id="upload-logo" accept="image/*" style="display:none;" />
                    <div id="uploaded-logos" style="display:flex; flex-wrap:wrap; gap:10px; margin-top:15px; justify-content:center;"></div>
                  </div>

                  <div class="logos-grid" style="display:flex; flex-wrap:wrap; gap:15px; justify-content:center;">
                    @for($i=1; $i<=18; $i++)
                      <img src="{{ asset('/') }}assets/Logos/p-logo{{ $i }}.png" class="logo" style="width:70px; cursor:pointer;" onclick="selectLogo('{{ asset('/') }}assets/Logos/p-logo{{ $i }}.png')" alt="Logo {{ $i }}" />
                    @endfor
                  </div>
                </div>
              </div>

              <!-- ===== Categories ===== -->
              <div class="tabcontent" id="categories" style="display:block;">
                <div class="cat-row" style="display:flex; gap:16px; margin-bottom:16px;">
                  <div class="cat-col" style="text-align:center;">
                    <a href="#"><img src="{{ asset('assets/soccer-icon.png') }}" style="width:90px;" /></a>
                    <h1 style="font-size:16px;">Soccer</h1>
                  </div>
                  <div class="cat-col" style="text-align:center;">
                    <a href="cricket"><img src="{{ asset('assets/Cricketkit.png') }}" style="width:90px;" /></a>
                    <h1 style="font-size:16px;">Cricket</h1>
                  </div>
                  <div class="cat-col" style="text-align:center;">
                    <a href="basketball"><img src="{{ asset('assets/basketball-kit.png') }}" style="width:90px;" /></a>
                    <h1 style="font-size:16px;">Basketball</h1>
                  </div>
                </div>
                <div class="cat-row" style="display:flex; gap:16px;">
                  <div class="cat-col" style="text-align:center;"><h1 style="font-size:16px;">Goal Keeper</h1></div>
                  <div class="cat-col" style="text-align:center;"><h1 style="font-size:16px;">Other / Staff / Management</h1></div>
                </div>
              </div>

              <!-- ===== Patterns ===== -->
              <div class="tabcontent" id="Patterns" style="display:none">
                <div class="pattern-container" style="text-align:center;">
                  <label for="upload-patterns" style="padding:10px 20px; background:#000; color:#fff; border-radius:8px; cursor:pointer; font-weight:500; display:inline-block;">
                    <i class="fa fa-upload"></i> Upload Your Pattern
                  </label>
                  <input type="file" id="upload-patterns" accept="image/*" style="display:none;" />
                  <div id="uploaded-pattern" style="display:flex; flex-wrap:wrap; gap:10px; margin-top:15px; justify-content:center;"></div>

                  @for($i=2; $i<=19; $i++)
                    <img src="{{ asset('/') }}assets/soccer-shirts/pattern{{ $i }}.png" class="Patterns"
                      style="width:80px; cursor:pointer;"
                      onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/pattern{{ $i }}.png')"
                      alt="Pattern {{ $i }}" />
                  @endfor
                  <img src="{{ asset('/') }}assets/soccer-shirts/white pattern 16.png" class="Patterns"
                       style="width:80px; cursor:pointer;"
                       onclick="selectPattern('{{ asset('/') }}assets/soccer-shirts/white pattern 16.png')"
                       alt="White Pattern 16" />
                </div>
              </div>

              <!-- ===== Text ===== -->
              <div class="tabcontent" id="Text"
                   style="display:none; padding:25px; font-family:'Karla',sans-serif; background:#fff; border-radius:16px; box-shadow:0 8px 25px rgba(0,0,0,0.1); max-width:420px; margin:auto;">
                <h2 style="font-weight:700; font-size:20px; margin-bottom:16px; color:#222; text-align:center;">Customize Your Jersey</h2>

                <div style="display:flex; align-items:center; gap:10px; background:#f3f3f3; padding:10px; border-radius:10px; margin-bottom:18px;">
                  <button type="button" id="text-bold"  style="padding:6px 10px; border:1px solid #ccc; border-radius:8px; background:#fff; cursor:pointer;">Bold</button>
                  <button type="button" id="text-italic" style="padding:6px 10px; border:1px solid #ccc; border-radius:8px; background:#fff; cursor:pointer;">Italic</button>
                  <label style="font-size:12px; color:#444; margin-left:auto;">Size</label>
                  <input type="range" id="text-size" min="10" max="90" value="30" style="width:140px;">
                </div>

                <div style="background:#f9f9f9; padding:15px; border-radius:12px; margin-bottom:20px;">
                  <h3 style="font-size:16px; font-weight:600; margin-bottom:15px; color:#333;">Player Details</h3>

                  <div style="margin-bottom:12px;">
                    <label style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Player Name</label>
                    <div style="display:flex; gap:8px; align-items:center; margin-bottom:8px;">
                      <input type="text" id="player-name" placeholder="Enter Name" maxlength="12" style="flex:1; padding:10px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px;" />
                      <input type="color" id="player-name-color" value="#FFFFFF" style="width:44px; height:40px; border:none; border-radius:8px; cursor:pointer;" />
                    </div>
                    <select class="font-family-select" data-text-type="playerName" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>

                  <div>
                    <label style="display:block; font-size:13px; font-weight:500; margin-bottom:6px; color:#555;">Player Number</label>
                    <div style="display:flex; gap:8px; align-items:center; margin-bottom:8px;">
                      <input type="text" id="player-number" placeholder="00" maxlength="2" style="flex:1; padding:10px 12px; border-radius:8px; border:1px solid #ccc; font-size:14px;" />
                      <input type="color" id="player-number-color" value="#FFFFFF" style="width:44px; height:40px; border:none; border-radius:8px; cursor:pointer;" />
                    </div>
                    <select class="font-family-select" data-text-type="playerNumber" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>
                </div>

                <div style="background:#f9f9f9; padding:15px; border-radius:12px;">
                  <h3 style="font-size:16px; font-weight:600; margin-bottom:15px; color:#333;">Extra Texts</h3>

                  <div style="margin-bottom:12px;">
                    <input type="text" id="sleeve-text-left" placeholder="Left Sleeve" maxlength="10" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
                    <input type="color" id="sleeve-text-left-color" value="#FFFFFF" style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
                    <select class="font-family-select" data-text-type="sleeveLeft" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>

                  <div style="margin-bottom:12px;">
                    <input type="text" id="sleeve-text-right" placeholder="Right Sleeve" maxlength="10" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
                    <input type="color" id="sleeve-text-right-color" value="#FFFFFF" style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
                    <select class="font-family-select" data-text-type="sleeveRight" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>

                  <div style="margin-bottom:12px;">
                    <input type="text" id="back-text" placeholder="Back Text" maxlength="15" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
                    <input type="color" id="back-text-color" value="#FFFFFF" style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
                    <select class="font-family-select" data-text-type="backText" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>

                  <div style="margin-bottom:12px;">
                    <input type="text" id="front-text" placeholder="Front Text" maxlength="15" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
                    <input type="color" id="front-text-color" value="#FFFFFF" style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
                    <select class="font-family-select" data-text-type="frontText" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>

                  <div style="margin-bottom:20px;">
                    <input type="text" id="extra-name" placeholder="Extra Name" maxlength="15" style="width:100%; padding:8px 10px; border-radius:8px; border:1px solid #ccc; font-size:13px; margin-bottom:8px;" />
                    <input type="color" id="extra-name-color" value="#FFFFFF" style="width:100%; height:36px; border:none; border-radius:8px; cursor:pointer; margin-bottom:8px;" />
                    <select class="font-family-select" data-text-type="extraName" style="width:100%; padding:8px; border-radius:8px; border:1px solid #ccc; font-size:13px;">
                      <option value="Arial Black">Arial Black</option>
                      <option value="'Karla', sans-serif">Karla</option>
                      <option value="'Roboto', sans-serif">Roboto</option>
                      <option value="'Poppins', sans-serif">Poppins</option>
                      <option value="'Oswald', sans-serif">Oswald</option>
                    </select>
                  </div>
                </div>

                <div id="uploadtextlogo" style="margin-top:1rem; text-align:center;">
                  <label for="upload-text-logo" style="padding:10px 20px; background:#000; color:#fff; border-radius:8px; cursor:pointer; font-weight:500; display:inline-block;">
                    <i class="fa fa-upload"></i> Upload Your Logo
                  </label>
                  <input type="file" id="upload-text-logo" accept="image/*" style="display:none;" />
                  <div id="uploaded-text-logo" style="display:flex; flex-wrap:wrap; gap:10px; margin-top:15px; justify-content:center;"></div>
                </div>
              </div>

              <!-- ===== Saved ===== -->
              <div class="tabcontent" id="capture" style="display:none">
                <div class="pattern-container" style="padding:10px;">
                  <h3>Saved Designs</h3>
                  <div id="saved-designs" style="display:flex; flex-wrap:wrap; gap:10px;"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- =============== RIGHT (Canvas + Images) =============== -->
          <div class="right-section" style="flex-grow:1; text-align:center;">
            <!-- Hidden base images -->
            <img id="shirt-collar"         src="{{ asset('assets/basketball/collor.png') }}"                style="display:none" alt="collar" />
            <img id="shirt-body"           src="{{ asset('assets/basketball/shirt 02.png') }}"               style="display:none" alt="body" />
            <img id="shirt-strip"          src="{{ asset('assets/basketball/shirt strip.png') }}"            style="display:none" alt="shirt strip" />
            <img id="shirt-sleeve"         src="{{ asset('assets/basketball/hands.png') }}"                  style="display:none" alt="sleeve" />
            <img id="shirt-sleeve-strip"   src="{{ asset('assets/basketball/cufs.png') }}"                   style="display:none" alt="sleeve strip" />
            <img id="shirt-trouser"        src="{{ asset('assets/basketball/shorts.png') }}"                 style="display:none" alt="trouser" />
            <img id="shirt-trouser-strip"  src="{{ asset('assets/basketball/SHORT STRIPS.png') }}"           style="display:none" alt="trouser strip" />

            <!-- Unique IDs for socks & gloves -->
            <img id="shirt-socks-upper"    src="{{ asset('assets/basketball/soccs upper part.png') }}"       style="display:none" alt="socks upper" />
            <img id="shirt-socks-lower"    src="{{ asset('assets/basketball/socces.png') }}"                 style="display:none" alt="socks lower" />
            <img id="shirt-gloves"         src="{{ asset('assets/basketball/glofs.png') }}"                  style="display:none" alt="gloves" />
            <img id="shirt-shoes"          src="{{ asset('assets/basketball/Shoes.png') }}"                  style="display:none" alt="shoes" />

            <canvas id="shirt-canvas" style="border:none; max-width:100%;"></canvas>
            <input type="hidden" name="selected_shirt" id="selectedShirtInput">
          </div>
        </div>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger"><ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>
    @endif

    <!-- ===== Product header / price ===== -->
    <div class="head-box" style="margin-top:18px;">
      <p class="mainheading">CUSTOM SOCCER KIT</p>
      <div class="m-pr" style="display:flex; align-items:center; gap:10px;">
        <p class="s-pr">$39.00</p>
        <input type="hidden" id="base-price" name="price" value="39">
        <img src="{{ asset('assets/mystars.png') }}" style="width: 100px" alt="stars" />
        <p class="str-r">5 reviews</p>
      </div>
    </div>

    {{-- ================== Basic Kit ================== --}}
    <div class="flex-form" style="display:flex; gap:24px; flex-wrap:wrap;">
      {{-- Fit Type --}}
      <div class="form-column" style="min-width:260px; flex:1;">
        <label for="sleeves_length">Sleeves Length</label>
        <select name="sleeves_length" id="sleeves_length" class="form-control @error('sleeves_length') is-invalid @enderror">
          <option value="">Select</option>
          @foreach(['short','long'] as $opt)
          <option value="{{ $opt }}" {{ old('sleeves_length')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
          @endforeach
        </select>

        <label for="fit_type" style="margin-top:10px;">Fit Type</label>
        <select name="fit_type" id="fit_type" class="form-control @error('fit_type') is-invalid @enderror">
          <option value="">Select</option>
          @foreach(['men','women','youth'] as $opt)
          <option value="{{ $opt }}" {{ old('fit_type')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
          @endforeach
        </select>
        @error('fit_type') <div class="invalid-feedback">{{ $message }}</div> @enderror

        {{-- Kit Type --}}
        <div class="form-group" style="margin-top:10px;">
          <label for="kit_type">Kit Type</label>
          <select name="kit_type" id="kit_type" class="form-control @error('kit_type') is-invalid @enderror">
            <option value="">Select</option>
            @foreach(['full','shirt','both'] as $opt)
            <option value="{{ $opt }}" {{ old('kit_type')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
            @endforeach
          </select>
          @error('kit_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        {{-- Outfield Players Socks (Yes/No) --}}
        <div class="form-group" style="margin-top:10px;">
          <label for="outfield_players_socks">Outfield Players Socks</label>
          <select name="outfield_players_socks" id="outfield_players_socks" class="form-control @error('outfield_players_socks') is-invalid @enderror">
            <option value="">Select</option>
            @foreach(['yes','no'] as $opt)
            <option value="{{ $opt }}" {{ old('outfield_players_socks')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
            @endforeach
          </select>
          @error('outfield_players_socks') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>

      {{-- Team Logo / Collar --}}
      <div class="form-column" style="min-width:260px; flex:1;">
        <label for="team_logo">Team Logo</label>
        <select name="team_logo" id="team_logo" class="form-control @error('team_logo') is-invalid @enderror">
          <option value="">Select</option>
          @foreach(['sublimated','embroidery'] as $opt)
          <option value="{{ $opt }}" {{ old('team_logo')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
          @endforeach
        </select>
        @error('team_logo') <div class="invalid-feedback">{{ $message }}</div> @enderror

        <div class="form-group" style="margin-top:10px;">
          <label for="collar_type">Collar Type</label>
          <select name="collar_type" id="collar_type" class="form-control @error('collar_type') is-invalid @enderror">
            <option value="">Select</option>
            @foreach(['v-neck','round-neck','polo-style'] as $opt)
            <option value="{{ $opt }}" {{ old('collar_type')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
            @endforeach
          </select>
          @error('collar_type') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group" style="margin-top:10px;">
          <label for="inside_shirt_collar">Inside Shirt Collar</label>
          <select name="inside_shirt_collar" id="inside_shirt_collar" class="form-control @error('inside_shirt_collar') is-invalid @enderror">
            <option value="">Select</option>
            @foreach(['yes','no'] as $opt)
            <option value="{{ $opt }}" {{ old('inside_shirt_collar')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
            @endforeach
          </select>
          @error('inside_shirt_collar') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group" id="socksColorWrapper" style="display:none; margin-top:10px;">
          <label for="socks-color">Select Socks Color</label>
          <select name="socks-color" id="socks-color" class="form-control @error('socks-color') is-invalid @enderror">
            <option value="">Select Color</option>
            @foreach(['black','white','blue','red','green','yellow','gray','pink','purple','orange','brown','beige','navy'] as $opt)
            <option value="{{ $opt }}">{{ ucfirst($opt) }}</option>
            @endforeach
          </select>
          @error('socks-color') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
      </div>
    </div>

    {{-- ================== Player Info (Team table + totals) ================== --}}
    <p class="size-guide" style="font-size:18px; font-weight:600; color:#002266; display:flex; align-items:center; gap:8px; margin-bottom:1rem; text-align:center; justify-content:center; margin-top:22px;">
      <i class="fa-solid fa-ruler" style="color:#000436;"></i> Size Guide
    </p>

    <div class="team-form-container" style="max-width:900px; margin:0 auto; background:#ededed1c; padding:20px 25px; border-radius:12px; box-shadow:0 2px 10px rgba(0,0,0,0.1);">
      <table class="table table-bordered team-roster-table" style="width:100%; border-collapse:collapse; background:#fff; text-align:center;">
        <thead style="background:linear-gradient(45deg,#002266,#000436); color:#fff;">
          <tr>
            <th style="padding:10px;">Player Name</th>
            <th style="padding:10px;">Number</th>
            <th style="padding:10px;">Shirt Size</th>
            <th style="padding:10px;">Short Size</th>
            <th style="padding:10px;">Quantity</th>
            <th style="padding:10px;">Action</th>
          </tr>
        </thead>
        <tbody id="details-wrapper">
          <tr>
            <td><input type="text" name="name[]" class="form-control" required style="width:100%; padding:6px; border:1px solid #ccc; border-radius:6px;"></td>
            <td><input type="number" name="number[]" class="form-control" min="1" value="1" required style="width:100%; padding:6px; border:1px solid #ccc; border-radius:6px;"></td>
            <td>
              <select name="shirt_size[]" class="form-control" required style="width:100%; padding:6px; border:1px solid #ccc; border-radius:6px;">
                <option value="">Select</option><option value="s">S</option><option value="m">M</option><option value="l">L</option>
              </select>
            </td>
            <td>
              <select name="short_size[]" class="form-control" required style="width:100%; padding:6px; border:1px solid #ccc; border-radius:6px;">
                <option value="">Select</option><option value="s">S</option><option value="m">M</option><option value="l">L</option>
              </select>
            </td>
            <td><input type="number" name="quantity[]" class="form-control player-quantity" min="0" value="0" style="width:100%; padding:6px; border:1px solid #ccc; border-radius:6px;"></td>

            <input type="hidden" name="price[]"  class="player-price" value="39">
            <input type="hidden" name="total[]"  class="player-total" value="39">
            <td><button type="button" class="btn btn-danger btn-sm remove-row" style="background:#dc3545; border:none; padding:5px 10px; border-radius:6px; color:#fff;">✖</button></td>
          </tr>
        </tbody>
      </table>

      <button type="button" id="addRow" class="btn btn-primary" style="background:linear-gradient(45deg,#002266,#000436); border:none; padding:8px 18px; border-radius:6px; color:#fff; font-weight:500; margin-top:8px;">
        + Add Row
      </button>
    </div>

    <div style="margin-top:1rem; text-align:center; font-size:18px;">
      <strong>Grand Total: <span style="color:#002266;">$<span id="grandTotal">39.00</span></span></strong>
    </div>

    {{-- ================== Goalkeeper Requirements ================== --}}
    <div class="flex-form" style="margin-top:18px;">
      <div class="form-group" style="width: 100%;">
        <label for="goalkeeper_kit">Add a Goalkeeper Kit?</label>
        <select id="goalkeeper_kit" name="goalkeeper_kit" class="form-control @error('goalkeeper_kit') is-invalid @enderror" onchange="toggleGoalkeeperFields()">
          <option value="">Select</option>
          @foreach(['yes','no'] as $opt)
          <option value="{{ $opt }}" {{ old('goalkeeper_kit')==$opt ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
          @endforeach
        </select>
      </div>

      <div id="goalkeeper_fields" style="display: none; margin-left: 0; margin-top:10px;">
        <div class="form-row" style="display: flex; gap: 1rem; flex-wrap: wrap;">
          <div class="form-group" style="flex: 1; min-width:260px;">
            <label for="padded">Padded</label>
            <select name="padded" id="padded" class="form-control" style="width: 100%;">
              <option value="">Padded</option>
              <option value="Yes">Yes +$5</option>
              <option value="no">No</option>
            </select>
          </div>
          <div class="form-group" style="flex: 1; min-width:260px;">
            <label for="goalkeeper_jersey_design">Jersey Design</label>
            <select name="goalkeeper_jersey_design" id="goalkeeper_jersey_design" style="width: 100%;" class="form-control @error('goalkeeper_jersey_design') is-invalid @enderror">
              <option value="">Select</option>
              @foreach(['same_as_player_uniform','custom_design'] as $opt)
              <option value="{{ $opt }}" {{ old('goalkeeper_jersey_design')==$opt ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ', $opt)) }}</option>
              @endforeach
            </select>
            @error('goalkeeper_jersey_design') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>

        <div class="form-row" style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1rem;">
          <div class="form-group" style="flex: 1; min-width:260px;">
            <label for="goalkeeper_sleeves">Goalkeeper Sleeves</label>
            <select name="goalkeeper_sleeves" id="goalkeeper_sleeves" class="form-control @error('goalkeeper_sleeves') is-invalid @enderror">
              <option value="">Select</option>
              @foreach(['long','short','padded_elbows'] as $opt)
              <option value="{{ $opt }}" {{ old('goalkeeper_sleeves')==$opt ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ', $opt)) }}</option>
              @endforeach
            </select>
            @error('goalkeeper_sleeves') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>

          <div class="form-group" style="flex: 1; min-width:260px;">
            <label for="jersey_color">Jersey Color</label>
            <select name="jersey_color" id="jersey_color" class="form-control @error('jersey_color') is-invalid @enderror">
              <option value="">Select</option>
              @foreach(['same_as_top','same_as_pants','red','blue','black','white','other'] as $opt)
              <option value="{{ $opt }}" {{ old('jersey_color')==$opt ? 'selected' : '' }}>{{ ucwords(str_replace('_',' ', $opt)) }}</option>
              @endforeach
            </select>
            @error('jersey_color') <div class="invalid-feedback">{{ $message }}</div> @enderror
          </div>
        </div>
      </div>
    </div>

    {{-- ================== Staff Size Guide ================== --}}
    <div class="flex-form" style="margin-top:18px;">
      <div class="form-group" style="width: 100%;">
        <label for="staff-other">Staff/Other</label>
        <select id="staff-other" name="staff_other" onchange="toggleStaffFields()">
          <option value="">Select Option</option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>
    </div>

    <div id="staff-section" style="display: none; margin-top: 1rem;">
      <div class="flex-form" style="display:flex; gap:1rem; flex-wrap:wrap;">
        <div class="form-column" style="min-width:260px; flex:1;">
          <div class="form-group">
            <label for="staff_kit_type">Staff Kit</label>
            <select id="staff-kit" name="staff_kit_type">
              <option value="">Select Kit Option</option>
              <option value="full">Full Kit</option>
              <option value="shirt">Shirt Only</option>
            </select>
          </div>

          <div class="form-group">
            <label for="staff_fit_type">Staff Fit Type</label>
            <select id="staff-fit-type" name="staff_fit_type">
              <option value="">Select Fit Type</option>
              <option value="men">Men</option>
              <option value="women">Women</option>
            </select>
          </div>

          <div class="form-group">
            <label for="staff_sleeves_length">Staff Sleeves Length</label>
            <select id="staff_sleeves_length" name="staff_sleeves_length">
              <option value="">Staff Sleeves Length</option>
              <option value="short">Short</option>
              <option value="long">Long</option>
              <option value="both">Both</option>
            </select>
          </div>
        </div>

        <div class="form-column" style="min-width:260px; flex:1;">
          <div class="form-group">
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

      <div class="team-form-container" style="margin-top:10px;">
        <table class="table table-bordered team-roster-table" style="width:100%;">
          <thead>
            <tr>
              <th>Player Name</th>
              <th>Number</th>
              <th>Shirt Size</th>
              <th>Pant Size</th>
              <th>Guide Sleeves Length</th>
              <th>Quantity</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="players-body">
            <tr>
              <td><input type="text" name="guide_name[]" class="form-control" placeholder="Enter name" style="padding: 9px"></td>
              <td><input type="number" name="guide_number[]" class="form-control" placeholder="0" min="1" style="padding: 9px"></td>
              <td>
                <select name="guide_shirt_size[]" class="form-control" style="padding: 9px">
                  <option value="">Select</option>
                  @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                  <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select class="short-size" name="guide_pant_size[]" style="padding: 9px">
                  <option value="">Select</option>
                  @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                  <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                  @endforeach
                </select>
              </td>
              <td>
                <select class="short-size" name="guide_sleeves_length[]" style="padding: 9px">
                  <option value="">Select</option>
                  @foreach(['short','long'] as $opt)
                  <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                  @endforeach
                </select>
              </td>
              <td><input type="number" name="guide_quantity[]" class="form-control" placeholder="0" min="1" style="padding: 9px"></td>
              <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-player-row" title="Remove Row" style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">✖</button>
              </td>
            </tr>
          </tbody>
        </table>

        <button type="button" class="btn btn-primary add-player-row" style="margin-top: 8px; padding: 8px 16px; background: black; color: white; border-radius: 8px;">+ Add Row</button>
      </div>
    </div>

    <div class="btn_box" style="margin:18px 0 32px;">
      <button type="submit" class="addtocart_btn">Add to cart</button>
    </div>
  </form>
</div>
@endsection

@section('script')
<script>
// ===== Tabs =====
function openTab(tabName){
  document.querySelectorAll(".tabcolor, .tabcontent").forEach(e=>e.style.display="none");
  const el = document.getElementById(tabName);
  if(!el) return;
  el.style.display="block";
  el.querySelectorAll(".tabcontent").forEach(c=>c.style.display="block");
}

let canvas, ctx;
// Base parts
let collarImage, bodyImage, sleeveImage, trouserImage;
let shirtStripImage, sleeveStripImage, trouserStripImage;
// Extras
let socksUpperImage, socksLowerImage, glovesImage, shoesImage;

// Multiple logos
let logos = []; // {image,x,y,scale,angle}
let selectedLogoIndex = -1;

// Single pattern
let selectedPattern = null, patternX=300, patternY=200, patternScale=1, patternAngle=0;

// Texts
const textElements = {
  playerName:   { text:"", x:300, y:120, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:28 },
  playerNumber: { text:"", x:300, y:240, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:60 },
  sleeveLeft:   { text:"", x:180, y:300, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:18 },
  sleeveRight:  { text:"", x:420, y:300, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:18 },
  backText:     { text:"", x:300, y:460, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:22 },
  frontText:    { text:"", x:300, y:420, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:22 },
  extraName:    { text:"", x:300, y:520, scale:1, angle:0, color:"#000000", active:false, fontFamily:"Arial Black", fontWeight:"normal", fontStyle:"normal", fontSize:24 }
};

// Color state
const colors = {
  collar:"#ffffff", body:"#ffffff", sleeve:"#ffffff", trouser:"#ffffff",
  socks:"#ffffff", gloves:"#ffffff", shoes:"#ffffff", strip:"#ffffff", pattern:"#ffffff"
};

const recycleBin = new Image();
recycleBin.src = "https://img.icons8.com/ios-filled/50/000000/recycle-bin.png";

let activeSelection=null, isDragging=false, isResizing=false, dragStart={x:0,y:0}, currentAction=null;

document.addEventListener("DOMContentLoaded", function(){
  openTab("categories");
  initCanvas();
  setupColorPickers();
  setupTextListeners();
  setupTextStylingControls();
  setupFileUploads();
  initRowsAndTotals();

  // Socks dropdown show/hide helper
  const ofSockSel = document.getElementById('outfield_players_socks');
  const sockWrap  = document.getElementById('socksColorWrapper');
  if(ofSockSel && sockWrap){
    ofSockSel.addEventListener('change', e=>{
      sockWrap.style.display = (e.target.value==='yes') ? 'block' : 'none';
    });
  }
});

function initCanvas(){
  canvas = document.getElementById("shirt-canvas");
  ctx = canvas.getContext("2d");

  collarImage        = document.getElementById("shirt-collar");
  bodyImage          = document.getElementById("shirt-body");
  sleeveImage        = document.getElementById("shirt-sleeve");
  trouserImage       = document.getElementById("shirt-trouser");
  shirtStripImage    = document.getElementById("shirt-strip");
  sleeveStripImage   = document.getElementById("shirt-sleeve-strip");
  trouserStripImage  = document.getElementById("shirt-trouser-strip");
  socksUpperImage    = document.getElementById("shirt-socks-upper");
  socksLowerImage    = document.getElementById("shirt-socks-lower");
  glovesImage        = document.getElementById("shirt-gloves");
  shoesImage         = document.getElementById("shirt-shoes");

  const imgs = [collarImage, bodyImage, sleeveImage, trouserImage, shirtStripImage, sleeveStripImage, trouserStripImage, socksUpperImage, socksLowerImage, glovesImage, shoesImage];
  let loaded=0;
  function afterLoad(){
    const TARGET_W = 600;
    const scale = TARGET_W / bodyImage.naturalWidth;
    const TARGET_H = Math.round(bodyImage.naturalHeight * scale);
    canvas.width = TARGET_W; canvas.height = TARGET_H;
    drawKit();
  }
  imgs.forEach(img=>{
    if(!img) return;
    if(img.complete) { loaded++; if(loaded===imgs.length) afterLoad(); }
    else { img.onload=()=>{ loaded++; if(loaded===imgs.length) afterLoad(); }; }
  });
  if(loaded===imgs.length) afterLoad();

  canvas.addEventListener("mousedown", startAction);
  canvas.addEventListener("mousemove", performAction);
  canvas.addEventListener("mouseup", endAction);
  canvas.addEventListener("mouseleave", endAction);

  canvas.addEventListener("wheel", e=>{
    if(activeSelection==="logo" && selectedLogoIndex>=0){
      const logo = logos[selectedLogoIndex];
      e.ctrlKey ? (logo.angle += e.deltaY*0.01) : (logo.scale = Math.max(0.2, logo.scale + e.deltaY*-0.001));
      drawKit();
    } else if(activeSelection==="pattern" && selectedPattern){
      e.ctrlKey ? (patternAngle += e.deltaY*0.01) : (patternScale = Math.max(0.2, patternScale + e.deltaY*-0.001));
      drawKit();
    } else if(activeSelection?.startsWith("text-")){
      const key = activeSelection.replace("text-","");
      const el = textElements[key]; if(!el) return;
      e.ctrlKey ? (el.angle += e.deltaY*0.01) : (el.scale = Math.max(0.2, el.scale + e.deltaY*-0.001));
      drawKit();
    }
    e.preventDefault();
  });
}

function createColoredCanvas(img,color,w,h){
  const c=document.createElement("canvas"); c.width=w; c.height=h;
  const g=c.getContext("2d");
  g.drawImage(img,0,0,w,h);
  g.globalCompositeOperation="multiply";
  g.fillStyle=color; g.fillRect(0,0,w,h);
  g.globalCompositeOperation="destination-in";
  g.drawImage(img,0,0,w,h);
  return c;
}

function getLogoSize(index){
  if(index<0 || index>=logos.length || !logos[index].image) return {w:0,h:0};
  const logo = logos[index];
  const w = canvas.width * 0.25 * logo.scale;
  const h = logo.image.height * (w / logo.image.width);
  return {w,h};
}

function getPatternSize(){
  if(!selectedPattern) return {w:0,h:0};
  const w = canvas.width * 0.4 * patternScale;
  const h = selectedPattern.height * (w / selectedPattern.width);
  return {w,h};
}

function fontString(el, mul=1){ return `${el.fontStyle} ${el.fontWeight} ${Math.max(1,el.fontSize*mul)}px ${el.fontFamily}`; }
function getTextSize(key){
  const el=textElements[key]; const s=(canvas.width/600)*el.scale;
  const tctx=document.createElement("canvas").getContext("2d");
  tctx.font = fontString(el,s);
  const w=tctx.measureText((el.text||"").toUpperCase()).width + 20;
  const h=el.fontSize*s + 10;
  return {w,h};
}

function drawText(key){
  const el=textElements[key]; if(!el?.text) return;
  const s=(canvas.width/600)*el.scale;
  ctx.save();
  ctx.translate(el.x, el.y);
  ctx.rotate(el.angle);
  ctx.textBaseline="middle";
  ctx.font = fontString(el,s);
  ctx.fillStyle = el.color;
  ctx.textAlign = key.includes("sleeve") ? (key==="sleeveLeft"?"left":"right") : "center";
  ctx.fillText(el.text.toUpperCase(), 0, 0);
  ctx.restore();
}

function drawPatternMasked(){
  if(!selectedPattern) return;
  const {w,h}=getPatternSize();
  const pC=document.createElement("canvas"); pC.width=canvas.width; pC.height=canvas.height;
  const pctx=pC.getContext("2d");
  pctx.save(); pctx.translate(patternX,patternY); pctx.rotate(patternAngle);
  const colored = createColoredCanvas(selectedPattern, colors.pattern, w, h);
  pctx.drawImage(colored, -w/2, -h/2, w, h);
  pctx.restore();
  pctx.globalCompositeOperation="destination-in";
  pctx.drawImage(bodyImage,0,0,canvas.width,canvas.height);
  ctx.drawImage(pC,0,0);
}

function drawLogoMasked(){
  if(!logos.length) return;
  const mask=document.createElement("canvas"); mask.width=canvas.width; mask.height=canvas.height;
  const mctx=mask.getContext("2d");
  [bodyImage, sleeveImage, trouserImage].forEach(img=>{ if(img?.complete) mctx.drawImage(img,0,0,canvas.width,canvas.height); });

  logos.forEach((logo,idx)=>{
    const {w,h}=getLogoSize(idx);
    const lc=document.createElement("canvas"); lc.width=canvas.width; lc.height=canvas.height;
    const lctx=lc.getContext("2d");
    lctx.save(); lctx.translate(logo.x,logo.y); lctx.rotate(logo.angle);
    lctx.drawImage(logo.image,-w/2,-h/2,w,h);
    lctx.restore();
    lctx.globalCompositeOperation="destination-in";
    lctx.drawImage(mask,0,0);
    ctx.drawImage(lc,0,0);
  });
}

function drawSelections(){
  const items=[];
  logos.forEach((logo,idx)=>items.push({type:"logo", index:idx, img:logo.image, x:logo.x, y:logo.y, angle:logo.angle, getSize:()=>getLogoSize(idx), active: idx===selectedLogoIndex}));
  items.push({type:"pattern", img:selectedPattern, x:patternX, y:patternY, angle:patternAngle, getSize:getPatternSize, active: activeSelection==="pattern"});
  Object.keys(textElements).forEach(k=>{
    const el=textElements[k]; if(!el.text) return;
    items.push({type:`text-${k}`, img:true, x:el.x, y:el.y, angle:el.angle, getSize:()=>getTextSize(k), active: el.active});
  });

  items.forEach(item=>{
    if(!item.img) return;
    const {w,h}=item.getSize();
    ctx.save(); ctx.translate(item.x,item.y); ctx.rotate(item.angle||0);
    if(item.active){
      ctx.strokeStyle="#4A90E2"; ctx.lineWidth=2; ctx.setLineDash([5,5]);
      ctx.strokeRect(-w/2,-h/2,w,h); ctx.setLineDash([]);
      ctx.fillStyle="#FF3B30"; ctx.beginPath(); ctx.arc(0,-h/2-20,12,0,Math.PI*2); ctx.fill();
      ctx.drawImage(recycleBin,-12,-h/2-32,24,24);
      ctx.fillStyle="#4A90E2"; ctx.beginPath(); ctx.arc(w/2,h/2,8,0,Math.PI*2); ctx.fill();
    }
    ctx.restore();
  });
}

function drawKit(){
  if(!bodyImage?.naturalWidth) return;
  const W=600, scale=W/bodyImage.naturalWidth, H=Math.round(bodyImage.naturalHeight*scale);
  canvas.width=W; canvas.height=H;

  const bodyC    = createColoredCanvas(bodyImage,    colors.body,    W,H);
  const sleeveC  = createColoredCanvas(sleeveImage,  colors.sleeve,  W,H);
  const collarC  = createColoredCanvas(collarImage,  colors.collar,  W,H);
  const trouserC = createColoredCanvas(trouserImage, colors.trouser, W,H);
  const shirtStripC   = createColoredCanvas(shirtStripImage,   colors.strip,  W,H);
  const sleeveStripC  = createColoredCanvas(sleeveStripImage,  colors.strip,  W,H);
  const trouserStripC = createColoredCanvas(trouserStripImage, colors.strip,  W,H);

  // Extras
  const socksUpperC = createColoredCanvas(socksUpperImage || bodyImage, colors.socks, W,H);
  const socksLowerC = createColoredCanvas(socksLowerImage || bodyImage, colors.socks, W,H);
  const glovesC     = createColoredCanvas(glovesImage     || bodyImage, colors.gloves, W,H);
  const shoesC      = createColoredCanvas(shoesImage      || bodyImage, colors.shoes, W,H);

  ctx.clearRect(0,0,W,H);

  // Order (bottom → top)
  ctx.drawImage(shoesC,0,0);
  ctx.drawImage(socksLowerC,0,0);
  ctx.drawImage(socksUpperC,0,0);
  ctx.drawImage(trouserC,0,0);
  ctx.drawImage(bodyC,0,0);
  ctx.drawImage(sleeveC,0,0);
  ctx.drawImage(collarC,0,0);

  // Strips on top
  ctx.drawImage(shirtStripC,0,0);
  ctx.drawImage(sleeveStripC,0,0);
  ctx.drawImage(trouserStripC,0,0);

  // Gloves (on top of sleeves)
  ctx.drawImage(glovesC,0,0);

  // Pattern + Logos + Text
  drawPatternMasked();
  drawLogoMasked();

  Object.keys(textElements).forEach(drawText);
  drawSelections();
}

// ===== Interactions =====
function startAction(e){
  dragStart={x:e.offsetX, y:e.offsetY};
  let clicked=false;
  Object.keys(textElements).forEach(k=>textElements[k].active=false);

  const items=[];
  logos.forEach((logo,idx)=>items.push({type:"logo", index:idx, img:logo.image, x:logo.x, y:logo.y, angle:logo.angle, getSize:()=>getLogoSize(idx)}));
  items.push({type:"pattern", img:selectedPattern, x:patternX, y:patternY, angle:patternAngle, getSize:getPatternSize});
  Object.keys(textElements).forEach(k=>{
    const el=textElements[k]; if(!el.text) return;
    items.push({type:`text-${k}`, img:true, x:el.x, y:el.y, angle:el.angle, getSize:()=>getTextSize(k), textType:k});
  });

  for(const item of items){
    if(!item.img) continue;
    const {w,h}=item.getSize();
    const relX=e.offsetX-item.x, relY=e.offsetY-item.y;
    const c=Math.cos(-(item.angle||0)), s=Math.sin(-(item.angle||0));
    const lx=relX*c - relY*s, ly=relX*s + relY*c;

    // delete circle
    if(Math.hypot(lx-0, ly-(-h/2-20))<=12){
      if(item.type==="logo"){ logos.splice(item.index,1); selectedLogoIndex=-1; }
      else if(item.type==="pattern"){ selectedPattern=null; }
      else if(item.type.startsWith("text-")){ const t=item.type.replace("text-",""); textElements[t].text=""; const inp=document.getElementById(getInputIdForTextType(t)); if(inp) inp.value=""; }
      activeSelection=null; drawKit(); return;
    }
    // resize
    if(Math.hypot(lx-(w/2), ly-(h/2))<=8){
      currentAction="resize"; activeSelection=item.type; isResizing=true; clicked=true;
      if(item.type.startsWith("text-")){ const t=item.type.replace("text-",""); textElements[t].active=true; updateTextStylingControls(t); }
      if(item.type==="logo") selectedLogoIndex=item.index;
      return;
    }
    // drag
    if(lx>=-w/2 && lx<=w/2 && ly>=-h/2 && ly<=h/2){
      currentAction="move"; activeSelection=item.type; isDragging=true; clicked=true;
      if(item.type.startsWith("text-")){ const t=item.type.replace("text-",""); textElements[t].active=true; updateTextStylingControls(t); }
      if(item.type==="logo") selectedLogoIndex=item.index;
      return;
    }
  }
  if(!clicked){ activeSelection=null; selectedLogoIndex=-1; drawKit(); }
}

function performAction(e){
  const dx=e.offsetX-dragStart.x, dy=e.offsetY-dragStart.y;
  if(currentAction==="move"){
    if(activeSelection==="logo" && isDragging && selectedLogoIndex>=0){ logos[selectedLogoIndex].x+=dx; logos[selectedLogoIndex].y+=dy; }
    else if(activeSelection==="pattern" && isDragging){ patternX+=dx; patternY+=dy; }
    else if(activeSelection?.startsWith("text-") && isDragging){ const k=activeSelection.replace("text-",""); textElements[k].x+=dx; textElements[k].y+=dy; }
    dragStart={x:e.offsetX,y:e.offsetY}; drawKit();
  }
  if(currentAction==="resize"){
    if(activeSelection==="logo" && isResizing && selectedLogoIndex>=0){ logos[selectedLogoIndex].scale=Math.max(0.2, logos[selectedLogoIndex].scale + dx*0.005); }
    else if(activeSelection==="pattern" && isResizing){ patternScale=Math.max(0.2, patternScale + dx*0.005); }
    else if(activeSelection?.startsWith("text-") && isResizing){ const k=activeSelection.replace("text-",""); textElements[k].scale=Math.max(0.2, textElements[k].scale + dx*0.005); }
    dragStart={x:e.offsetX,y:e.offsetY}; drawKit();
  }
}
function endAction(){ isDragging=false; isResizing=false; currentAction=null; }

// ===== Pickers (base + extras) =====
function setupColorPickers(){
  ["collar","body","sleeve","trouser"].forEach(p=>{
    const el=document.getElementById(`color-${p}`);
    if(el) el.addEventListener("input", e=>{ colors[p]=e.target.value; drawKit(); });
  });

  // NEW: extras
  const extraMap = {
    "color-socks":  "socks",
    "color-gloves": "gloves",
    "color-strip":  "strip",
    // "color-shoes":  "shoes" // <- uncomment if you enabled shoes picker
  };
  Object.keys(extraMap).forEach(id=>{
    const el = document.getElementById(id);
    if(el) el.addEventListener("input", e=>{ colors[ extraMap[id] ] = e.target.value; drawKit(); });
  });
}

// ===== Text bindings =====
function bindTextField(textId, colorId, key){
  const t=document.getElementById(textId), c=document.getElementById(colorId);
  if(t) t.addEventListener("input", e=>{ textElements[key].text=e.target.value; drawKit(); });
  if(c) c.addEventListener("input", e=>{ textElements[key].color=e.target.value; drawKit(); });
}
function setupTextListeners(){
  bindTextField("player-name","player-name-color","playerName");
  bindTextField("player-number","player-number-color","playerNumber");
  bindTextField("sleeve-text-left","sleeve-text-left-color","sleeveLeft");
  bindTextField("sleeve-text-right","sleeve-text-right-color","sleeveRight");
  bindTextField("back-text","back-text-color","backText");
  bindTextField("front-text","front-text-color","frontText");
  bindTextField("extra-name","extra-name-color","extraName");

  // sanitize player-number to 0–99
  const pn=document.getElementById("player-number");
  if(pn) pn.addEventListener("input", e=>{
    let v=e.target.value.replace(/\D/g,""); if(v.length>2) v=v.slice(0,2);
    if(v!==""){ let n=parseInt(v,10); n=Math.min(99,Math.max(0,n)); v=String(n); }
    e.target.value=v; textElements.playerNumber.text=v; drawKit();
  });
}
function getInputIdForTextType(t){
  return {
    playerName:"player-name", playerNumber:"player-number",
    sleeveLeft:"sleeve-text-left", sleeveRight:"sleeve-text-right",
    backText:"back-text", frontText:"front-text", extraName:"extra-name"
  }[t] || "";
}

// ===== Text styling (B/I/size + per-field font) =====
function setupTextStylingControls(){
  document.querySelectorAll(".font-family-select").forEach(sel=>{
    sel.addEventListener("change", function(){
      const key=this.dataset.textType; if(textElements[key]){ textElements[key].fontFamily=this.value; drawKit(); }
    });
  });
  const b=document.getElementById("text-bold");
  if(b) b.addEventListener("click", ()=>{
    const k = Object.keys(textElements).find(x=>textElements[x].active); if(!k) return;
    const el=textElements[k]; el.fontWeight = (el.fontWeight==="bold"?"normal":"bold"); drawKit();
  });
  const i=document.getElementById("text-italic");
  if(i) i.addEventListener("click", ()=>{
    const k = Object.keys(textElements).find(x=>textElements[x].active); if(!k) return;
    const el=textElements[k]; el.fontStyle = (el.fontStyle==="italic"?"normal":"italic"); drawKit();
  });
  const s=document.getElementById("text-size");
  if(s) s.addEventListener("input", (e)=>{
    const k = Object.keys(textElements).find(x=>textElements[x].active); if(!k) return;
    const el=textElements[k]; const val=parseInt(e.target.value||"0",10); if(val>0){ el.fontSize=val; drawKit(); }
  });
}

// ===== File uploads (logos/patterns) =====
function setupFileUploads(){
  const uploadLogo=document.getElementById("upload-logo");
  if(uploadLogo) uploadLogo.addEventListener("change", e=>handleFileUpload(e,"logo"));

  const uploadPatterns=document.getElementById("upload-patterns");
  if(uploadPatterns) uploadPatterns.addEventListener("change", e=>handleFileUpload(e,"pattern"));

  const uploadTextLogo=document.getElementById("upload-text-logo");
  if(uploadTextLogo) uploadTextLogo.addEventListener("change", e=>handleFileUpload(e,"logo"));
}
function handleFileUpload(e,type){
  const file=e.target.files?.[0]; if(!file) return;
  const reader=new FileReader();
  reader.onload=function(ev){
    const container= document.getElementById(type==="pattern" ? "uploaded-pattern" : (e.target.id==="upload-text-logo" ? "uploaded-text-logo" : "uploaded-logos"));
    if(!container) return;
    const wrap=document.createElement("div");
    Object.assign(wrap.style,{position:"relative",width:"80px",height:"80px",margin:"5px"});
    const img=document.createElement("img");
    Object.assign(img.style,{width:"100%",height:"100%",objectFit:"contain",cursor:"pointer",border:"1px solid #ccc",borderRadius:"8px"});
    img.src=ev.target.result; wrap.appendChild(img);

    const del=document.createElement("span"); del.innerHTML="&times;";
    Object.assign(del.style,{position:"absolute",top:"-5px",right:"-5px",background:"red",color:"#fff",width:"18px",height:"18px",display:"flex",alignItems:"center",justifyContent:"center",borderRadius:"50%",cursor:"pointer",fontWeight:"bold"});
    del.onclick=()=>wrap.remove(); wrap.appendChild(del);

    img.onclick=()=>{ type==="pattern" ? selectPattern(img.src) : selectLogo(img.src); };
    container.appendChild(wrap);
  };
  reader.readAsDataURL(file);
  e.target.value="";
}

function selectLogo(path){
  if(!bodyImage?.naturalWidth) return;
  const newLogo={image:new Image(), x:150, y:200, scale:1, angle:0};
  newLogo.image.src=path;
  newLogo.image.onload=()=>{ logos.push(newLogo); selectedLogoIndex=logos.length-1; activeSelection="logo"; drawKit(); };
}

function selectPattern(path){
  if(!bodyImage?.naturalWidth) return;
  selectedPattern=new Image(); selectedPattern.src=path;
  selectedPattern.onload=()=>{ patternX=150; patternY=200; patternScale=1; patternAngle=0; activeSelection="pattern"; drawKit(); };
}

// ===== Save design =====
function saveDesign(){
  drawKit();
  const dataURL=canvas.toDataURL("image/png");
  const left=document.getElementById("saved-designs"); if(!left) return;

  const wrap=document.createElement("div");
  Object.assign(wrap.style,{position:"relative",display:"inline-block",margin:"5px"});
  const img=document.createElement("img"); img.src=dataURL; img.style.width="100px"; img.style.display="block";
  const del=document.createElement("span"); del.innerHTML="&times;";
  Object.assign(del.style,{position:"absolute",top:"0",right:"0",background:"red",color:"#fff",cursor:"pointer",display:"none"});

  wrap.addEventListener("mouseenter",()=>del.style.display="block");
  wrap.addEventListener("mouseleave",()=>del.style.display="none");
  del.onclick=()=>wrap.remove();
  wrap.appendChild(img); wrap.appendChild(del); left.appendChild(wrap);

  const hidden=document.getElementById("selectedShirtInput"); if(hidden) hidden.value=dataURL;
  openTab("capture");
}

// ===== Rows / totals (simple) =====
function initRowsAndTotals(){
  const wrapper=document.getElementById("details-wrapper");
  const addBtn=document.getElementById("addRow");
  const BASE=39.0;

  function updateGrand(){
    let grand=0;
    wrapper.querySelectorAll("tr").forEach(tr=>{
      const q = parseFloat(tr.querySelector(".player-quantity")?.value)||0;
      grand += q * BASE;
    });
    document.getElementById("grandTotal").innerText = grand.toFixed(2);
  }

  if(addBtn){
    addBtn.addEventListener("click", ()=>{
      const tr=document.createElement("tr");
      tr.innerHTML=`
        <td><input type="text" name="name[]" class="form-control" required></td>
        <td><input type="number" name="number[]" class="form-control" min="1" value="1" required></td>
        <td><select name="shirt_size[]" class="form-control" required><option value="">Select</option><option value="s">S</option><option value="m">M</option><option value="l">L</option></select></td>
        <td><select name="short_size[]" class="form-control" required><option value="">Select</option><option value="s">S</option><option value="m">M</option><option value="l">L</option></select></td>
        <td><input type="number" name="quantity[]" class="form-control player-quantity" min="0" value="0"></td>
        <td><button type="button" class="btn btn-danger btn-sm remove-row">✖</button></td>`;
      wrapper.appendChild(tr); updateGrand();
    });

    wrapper.addEventListener("input", e=>{
      if(e.target.classList.contains("player-quantity")) updateGrand();
    });
    wrapper.addEventListener("click", e=>{
      if(e.target.classList.contains("remove-row")){ e.target.closest("tr").remove(); updateGrand(); }
    });

    updateGrand();
  }
}

// GK & Staff toggles
function toggleGoalkeeperFields(){
  const sel=document.getElementById('goalkeeper_kit');
  const box=document.getElementById('goalkeeper_fields');
  if(sel && box) box.style.display = (sel.value==='yes') ? 'block' : 'none';
}
function toggleStaffFields(){
  const sel=document.getElementById('staff-other');
  const box=document.getElementById('staff-section');
  if(sel && box) box.style.display = (sel.value==='yes') ? 'block' : 'none';
}
</script>

@include('component.footer')
@endsection
