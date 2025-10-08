@extends('backend.layout.master')

@section('main-content')
<style>
    .team-form-container {
        margin-top: 20px;
        overflow-x: auto;
    }

    .team-roster-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Poppins', sans-serif;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.1);
    }

    .team-roster-table thead {
        background: #007bff;
        color: #fff;
        text-align: center;
    }

    .team-roster-table th,
    .team-roster-table td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        vertical-align: middle;
    }

    .team-roster-table tbody tr:nth-child(even) {
        background: #f9f9f9;
    }

    .team-roster-table tbody tr:hover {
        background: #eef5ff;
    }

    /* Input & Select Styling */
    .team-roster-table input[type="text"],
    .team-roster-table input[type="number"],
    .team-roster-table select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        outline: none;
        transition: all 0.3s ease;
    }

    .team-roster-table input:focus,
    .team-roster-table select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    }

    /* Responsive for mobile */
    @media (max-width: 768px) {
        .team-roster-table thead {
            display: none;
        }

        .team-roster-table,
        .team-roster-table tbody,
        .team-roster-table tr,
        .team-roster-table td {
            display: block;
            width: 100%;
        }

        .team-roster-table tr {
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
        }

        .team-roster-table td {
            text-align: left;
            padding: 10px 5px;
            border: none;
        }

        .team-roster-table td:before {
            content: attr(data-label);
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #007bff;
        }
    }
</style>

<!-- MAIN SECTION STARTS FROM HERE -->
<div class="main-section">
    <!-- Left Section -->
    <div class="left-section">
        <div class="icon-list">
            <div class="icon" onclick="openTab('categories')">
                <img src="{{ asset('assets/categories-icon.png') }}" alt="Categories" class="tab-icon" width="50px" />
            </div>
            <div class="icon" onclick="openTab('Shirts')">
                <img src="{{ asset('assets/style.png') }}" alt="Shirts" class="tab-icon" width="50px" />
            </div>

            <div class="icon" onclick="saveDesign()">
                <img src="{{ asset('assets/savedesignicon.png') }}" alt="Save Design" class="tab-icon" width="50px" />
                <label style="margin-left: 5px; font-size:14px">Save Design</label>
            </div>
        </div>

        <!-- Items List -->
        <div class="items-list" style="height: 36rem;">
            <!-- Shirts Tab -->
            <div class="tabcontent" id="Shirts">
                <img src="{{ asset('assets/soccer-shirts/FRONTPNG.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/FRONTPNG.png') }}')" alt="Shirt 1" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt4.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt4.png') }}')" alt="Shirt 4" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt5.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt5.png') }}')" alt="Shirt 5" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt6.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt6.png') }}')" alt="Shirt 6" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt7.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt7.png') }}')" alt="Shirt 7" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt8.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt8.png') }}')" alt="Shirt 8" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt9.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt9.png') }}')" alt="Shirt 9" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt10.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt10.png') }}')" alt="Shirt 10" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt11.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt11.png') }}')" alt="Shirt 11" width="100" />

                <img src="{{ asset('assets/soccer-shirts/shirt12.png') }}" class="shirt"
                    onclick="selectShirt('{{ asset('assets/soccer-shirts/shirt12.png') }}')" alt="Shirt 12" width="100" />
            </div>

            <!-- Categories Tab -->
            <div class="tabcontent" id="categories" style="display: none">
                <div class="cat-row">
                    <div class="cat-col">
                        <a href="soccer"><img src="{{ asset('assets/soccer-icon.png') }}" /></a>
                        <h1>Soccer</h1>
                    </div>
                    <div class="cat-col">
                        <a href="circket"><img src="{{ asset('assets/Cricketkit.png') }}" /></a>
                        <h1>Cricket</h1>
                    </div>
                    <div class="cat-col">
                        <a href="basketball"><img src="{{ asset('assets/basketball-kit.png') }}" /></a>
                        <h1>Basketball</h1>
                    </div>
                </div>
                <div class="cat-row">
                    <div class="cat-col">
                        <a href="goalKeeper"><img src="{{ asset('assets/goalkeeper-1.png') }}" /></a>
                        <h1>Goal Keeper</h1>
                    </div>
                    <div class="cat-col">
                        <h1>Other / Staff / Management</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Section -->
    <div class="right-section" id="design-preview">
        <div class="item-display" style="position: relative;">
            <div id="text-display" style="position: absolute; z-index: 5;"></div>
            <!-- Base shirt hamesha dikh rahi hai -->
            <img id="selected-shirt" src="{{ asset('assets/soccer-shirts/FRONTPNG.png') }}" alt="Selected Shirt" />
            <img id="selected-pattern" src="" alt="Pattern Overlay" class="pattern-overlay" style="display: none;" />
        </div>

        <!-- Optional: Preview of selected shirt -->
        <div id="shirtPreview" style="margin-top: 10px;"></div>
    </div>
</div>
<!-- MAIN SECTION ENDS HERE -->

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- FORM SECTION STARTS FROM HERE -->
<form action="{{ route('static.store') }}" method="POST" enctype="multipart/form-data" id="soccerKitForm">
    @csrf
    <div class="head-box">
        <p class="mainheading">CUSTOM SOCCER KIT</p>
        <div class="m-pr">
            <p class="s-pr" data-base="39.00">$39.00</p>
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
                <option value="long" {{ old('sleeves_length') == 'long' ? 'selected' : '' }}>Long (+$2.00/pr kit)
                </option>
                <option value="mix" {{ old('sleeves_length') == 'mix' ? 'selected' : '' }}>Mix: Long/Short</option>
            </select>
            
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
                    <select name="kit_type" id="kit_type" class="form-control @error('kit_type') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (['full', 'shirt', 'both'] as $opt)
                            <option value="{{ $opt }}" {{ old('kit_type') == $opt ? 'selected' : '' }}>
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
                <option value="sublimated" {{ old('team_logo') == 'sublimated' ? 'selected' : '' }}>Sublimated</option>
                <option value="embroidery" {{ old('team_logo') == 'embroidery' ? 'selected' : '' }}>Embroidery (+$1.00/pr
                    kit)</option>
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
                        <option value="v-neck" {{ old('collar_type') == 'v-neck' ? 'selected' : '' }}>V-Neck</option>
                        <option value="round-neck" {{ old('collar_type') == 'round-neck' ? 'selected' : '' }}>Round-Neck
                        </option>
                        <option value="polo-style" {{ old('collar_type') == 'polo-style' ? 'selected' : '' }}>Polo-Style
                            (+$2.00/pr kit)</option>
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
                        <option value="yes" {{ old('inside_shirt_collar') == 'yes' ? 'selected' : '' }}>Yes (+$2.00/pr
                            kit)</option>
                        <option value="no" {{ old('inside_shirt_collar') == 'no' ? 'selected' : '' }}>No</option>
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
    <p class="size-guide"><i class="fa-solid fa-ruler"></i> Size Guide</p>

    <div class="team-form-container">
        <table class="table table-bordered team-roster-table" id="details-wrapper">
            <thead>
                <tr>
                    <th>Player Name</th>
                    <th>Number</th>
                    <th>Shirt Size</th>
                    <th>Short Size</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="detail-row">
                <tr>
                    <td><input type="text" name="player_name[]" class="form-control" placeholder="Enter name" required></td>
                    <td><input type="number" name="player_number[]" class="form-control" placeholder="0" min="1" required></td>
                    <td>
                        <select name="player_shirt_size[]" class="form-control" required>
                            <option value="">Select</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="2xl">2XL</option>
                            <option value="3xl">3XL</option>
                        </select>
                    </td>
                    <td>
                        <select name="player_short_size[]" class="form-control" required>
                            <option value="">Select</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="2xl">2XL</option>
                            <option value="3xl">3XL</option>
                        </select>
                    </td>
                    <td><input type="number" name="player_quantity[]" class="form-control" value="1" min="1" required></td>
                    <td>
                        <button type="button" class="btn btn-danger btn-sm remove-player-row">✖</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="button" id="addPlayerRow" class="btn btn-primary">+ Add Player Row</button>
    </div>

    {{-- ================== Goalkeeper Requirements ================== --}}
    <div class="flex-form">
        {{-- Goalkeeper Kit --}}
        <div class="form-group" style="width: 100%;">
            <label for="goalkeeper_kit">Add a Goalkeeper Kit?</label>
            <select id="goalkeeper_kit" name="goalkeeper_kit"
                class="form-control @error('goalkeeper_kit') is-invalid @enderror" onchange="toggleGoalkeeperFields()">
                <option value="">Select</option>
                @foreach (['yes', 'no'] as $opt)
                    <option value="{{ $opt }}" {{ old('goalkeeper_kit') == $opt ? 'selected' : '' }}>
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
                    <select name="padded" id="padded" class="form-control price-option" style="width: 21rem;">
                        <option value="">Select</option>
                        <option value="yes" {{ old('padded') == 'yes' ? 'selected' : '' }}>Yes (+$5)</option>
                        <option value="no" {{ old('padded') == 'no' ? 'selected' : '' }}>No</option>
                    </select>
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="goalkeeper_jersey_design">Jersey Design</label>
                    <select name="goalkeeper_jersey_design" id="goalkeeper_jersey_design" style=" width: 21rem;"
                        class="form-control @error('goalkeeper_jersey_design') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (['same_as_player_uniform', 'custom_design'] as $opt)
                            <option value="{{ $opt }}"
                                {{ old('goalkeeper_jersey_design') == $opt ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $opt)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('goalkeeper_jersey_design')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row" style="display: flex; gap: 1rem; flex-wrap: wrap; margin-top: 1rem;">
                <div class="form-group" style="flex: 1;">
                    <label for="goalkeeper_sleeves">Goalkeeper Sleeves</label>
                    <select name="goalkeeper_sleeves" id="goalkeeper_sleeves"
                        class="form-control @error('goalkeeper_sleeves') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (['long', 'short', 'padded_elbows'] as $opt)
                            <option value="{{ $opt }}"
                                {{ old('goalkeeper_sleeves') == $opt ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $opt)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('goalkeeper_sleeves')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group" style="flex: 1;">
                    <label for="jersey_color">Jersey Color</label>
                    <select name="jersey_color" id="jersey_color"
                        class="form-control @error('jersey_color') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach (['same_as_top', 'same_as_pants', 'red', 'blue', 'black', 'white', 'other'] as $opt)
                            <option value="{{ $opt }}" {{ old('jersey_color') == $opt ? 'selected' : '' }}>
                                {{ ucwords(str_replace('_', ' ', $opt)) }}
                            </option>
                        @endforeach
                    </select>
                    @error('jersey_color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    </select>
                </div>
                <div class="form-group" id="">
                    <label for="staff_sleeves_length">Staff Sleeves Length</label>
                    <select name="staff_sleeves_length" id="staff_sleeves_length" class="form-control price-option">
                        <option value="">Select</option>
                        <option value="short" {{ old('staff_sleeves_length') == 'short' ? 'selected' : '' }}>Short
                        </option>
                        <option value="long" {{ old('staff_sleeves_length') == 'long' ? 'selected' : '' }}>Long
                            (+$2.00/pr kit)</option>
                        <option value="mix" {{ old('staff_sleeves_length') == 'mix' ? 'selected' : '' }}>Mix:
                            Long/Short</option>
                    </select>
                </div>
            </div>

            <!-- Right Column -->
            <div class="form-column">
                <div class="form-group" id="playersTable">
                    <label for="staff_collar_type">Staff Collar Type</label>
                    <select name="staff_collar_type" id="staff_collar_type" class="form-control price-option">
                        <option value="">Select</option>
                        <option value="v-neck" {{ old('staff_collar_type') == 'v-neck' ? 'selected' : '' }}>V-Neck
                        </option>
                        <option value="round-neck" {{ old('staff_collar_type') == 'round-neck' ? 'selected' : '' }}>
                            Round-Neck</option>
                        <option value="polo-style" {{ old('staff_collar_type') == 'polo-style' ? 'selected' : '' }}>
                            Polo-Style (+$2.00/pr kit)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="team-form-container">
            <table class="table table-bordered team-roster-table" id="staff-table">
                <thead>
                    <tr>
                        <th>Player Name</th>
                        <th>Number</th>
                        <th>Shirt Size</th>
                        <th>Pant Size</th>
                        <th>guide Sleeves Length</th>
                        <th>Guide Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="players-body">
                    <!-- First Row -->
                    <tr>
                        <td>
                            <input type="text" name="guide_name[]" class="form-control" placeholder="Enter name" required>
                        </td>
                        <td>
                            <input type="number" name="guide_number[]" class="form-control" placeholder="0" min="1" required>
                        </td>
                        <td>
                            <select name="guide_shirt_size[]" class="form-control" required>
                                <option value="">Select</option>
                                @foreach (['xs', 's', 'm', 'l', 'xl', '2xl', '3xl'] as $opt)
                                    <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="hide-on-shirt-only">
                            <select class="short-size" name="guide_pant_size[]" required>
                                <option value="">Select</option>
                                @foreach (['xs', 's', 'm', 'l', 'xl', '2xl', '3xl'] as $opt)
                                    <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td class="hide-on-shirt-only">
                            <select class="short-size" name="guide_sleeves_length[]" required>
                                <option value="">Select</option>
                                @foreach (['short', 'long'] as $opt)
                                    <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="number" name="guide_quantity[]" class="form-control" placeholder="0" min="1" required>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm remove-staff-row" title="Remove Row"
                                style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                                ✖
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>

            <!-- Add Row Button -->
            <button type="button" class="btn btn-primary add-staff-row"
                style="margin-top: 2rem; padding: 1rem; background: black; color: white; border-radius: 1rem;">+ Add
                Row</button>
        </div>
    </div>

    <!-- Hidden fields for design data -->
    <input type="hidden" name="selected_shirt" id="selectedShirtInput" value="{{ asset('assets/soccer-shirts/FRONTPNG.png') }}">
    <input type="hidden" name="design_snapshot" id="designSnapshotInput">

    <!-- Single Submit Button -->
    <div class="btn_box">
        <button type="submit" class="addtocart_btn">Add to cart</button>
    </div>
</form>

<!-- Include html2canvas library for screenshot functionality -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
// Player rows functionality
document.addEventListener('DOMContentLoaded', function() {
    let playerRowCount = 1;

    // Add player row
    document.getElementById('addPlayerRow').addEventListener('click', function() {
        const tbody = document.querySelector('#details-wrapper tbody');
        const newRow = document.createElement('tr');
        
        newRow.innerHTML = `
            <td><input type="text" name="player_name[]" class="form-control" placeholder="Enter name" required></td>
            <td><input type="number" name="player_number[]" class="form-control" placeholder="0" min="1" required></td>
            <td>
                <select name="player_shirt_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="2xl">2XL</option>
                    <option value="3xl">3XL</option>
                </select>
            </td>
            <td>
                <select name="player_short_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="2xl">2XL</option>
                    <option value="3xl">3XL</option>
                </select>
            </td>
            <td><input type="number" name="player_quantity[]" class="form-control" value="1" min="1" required></td>
            <td>
                <button type="button" class="btn btn-danger btn-sm remove-player-row">✖</button>
            </td>
        `;
        tbody.appendChild(newRow);
        playerRowCount++;
    });

    // Remove player row
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-player-row')) {
            const rowCount = document.querySelectorAll('#details-wrapper tbody tr').length;
            if (rowCount > 1) {
                e.target.closest('tr').remove();
            } else {
                alert('At least one player row is required.');
            }
        }
    });

    // Staff rows functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-staff-row')) {
            const tbody = document.querySelector('#staff-table tbody');
            const newRow = document.createElement('tr');
            
            newRow.innerHTML = `
                <td>
                    <input type="text" name="guide_name[]" class="form-control" placeholder="Enter name" required>
                </td>
                <td>
                    <input type="number" name="guide_number[]" class="form-control" placeholder="0" min="1" required>
                </td>
                <td>
                    <select name="guide_shirt_size[]" class="form-control" required>
                        <option value="">Select</option>
                        @foreach (['xs', 's', 'm', 'l', 'xl', '2xl', '3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                    <select class="short-size" name="guide_pant_size[]" required>
                        <option value="">Select</option>
                        @foreach (['xs', 's', 'm', 'l', 'xl', '2xl', '3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                    <select class="short-size" name="guide_sleeves_length[]" required>
                        <option value="">Select</option>
                        @foreach (['short', 'long'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="guide_quantity[]" class="form-control" placeholder="0" min="1" required>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-danger btn-sm remove-staff-row" title="Remove Row"
                        style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                        ✖
                    </button>
                </td>
            `;
            tbody.appendChild(newRow);
        }

        if (e.target.classList.contains('remove-staff-row')) {
            const rowCount = document.querySelectorAll('#staff-table tbody tr').length;
            if (rowCount > 1) {
                e.target.closest('tr').remove();
            } else {
                alert('At least one staff row is required.');
            }
        }
    });
});

// Shirt selection function
function selectShirt(shirtPath) {
    document.getElementById('selected-shirt').src = shirtPath;
    document.getElementById('selectedShirtInput').value = shirtPath;
}

// Tab functionality
function openTab(tabName) {
    var i, tabcontent;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    document.getElementById(tabName).style.display = "block";
}

// Toggle goalkeeper fields
function toggleGoalkeeperFields() {
    const goalkeeperKit = document.getElementById('goalkeeper_kit').value;
    const goalkeeperFields = document.getElementById('goalkeeper_fields');
    goalkeeperFields.style.display = goalkeeperKit === 'yes' ? 'block' : 'none';
}

// Toggle staff fields
function toggleStaffFields() {
    const staffOther = document.getElementById('staff-other').value;
    const staffSection = document.getElementById('staff-section');
    staffSection.style.display = staffOther === 'yes' ? 'block' : 'none';
}

// Save Design Function - Takes screenshot and saves to hidden field
function saveDesign() {
    const designPreview = document.getElementById('design-preview');
    
    // Show loading message
    const originalText = document.querySelector('.icon:last-child label');
    const originalTextContent = originalText.textContent;
    originalText.textContent = 'Saving...';
    
    html2canvas(designPreview, {
        scale: 2, // Higher quality
        useCORS: true,
        allowTaint: true,
        backgroundColor: null
    }).then(canvas => {
        // Convert canvas to base64 image
        const imageData = canvas.toDataURL('image/png');
        
        // Save to hidden input field
        document.getElementById('designSnapshotInput').value = imageData;
        
        // Show success message
        originalText.textContent = 'Design Saved!';
        
        // Reset text after 2 seconds
        setTimeout(() => {
            originalText.textContent = originalTextContent;
        }, 2000);
        
        console.log('Design saved successfully!');
    }).catch(error => {
        console.error('Error saving design:', error);
        originalText.textContent = 'Error Saving';
        
        // Reset text after 2 seconds
        setTimeout(() => {
            originalText.textContent = originalTextContent;
        }, 2000);
    });
}

// Form submission handler
document.getElementById('soccerKitForm').addEventListener('submit', function(e) {
    // Ensure selected shirt is included
    const selectedShirt = document.getElementById('selectedShirtInput').value;
    if (!selectedShirt) {
        e.preventDefault();
        alert('Please select a shirt design before submitting.');
        return false;
    }
    
    // Check if design is saved
    const designSnapshot = document.getElementById('designSnapshotInput').value;
    if (!designSnapshot) {
        if(confirm('You haven\'t saved your design. Would you like to save it now?')) {
            e.preventDefault();
            saveDesign();
            // Resubmit form after saving
            setTimeout(() => {
                document.getElementById('soccerKitForm').submit();
            }, 3000);
            return false;
        }
    }
    
    // Validate at least one player row exists
    const playerRows = document.querySelectorAll('#details-wrapper tbody tr');
    if (playerRows.length === 0) {
        e.preventDefault();
        alert('Please add at least one player.');
        return false;
    }
    
    return true;
});

// Auto-save design when shirt is selected
document.addEventListener('click', function(e) {
    if (e.target.classList.contains('shirt')) {
        // Auto-save design after a short delay when shirt is selected
        setTimeout(saveDesign, 500);
    }
});
</script>
@endsection