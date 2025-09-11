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
    box-shadow: 0 3px 12px rgba(0,0,0,0.1);
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
    box-shadow: 0 0 5px rgba(0,123,255,0.3);
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
        <div class="left-section">
            <div class="icon-list">
                <div class="icon" onclick="openTab('categories')">
                    <img src="{{ asset('assets/categories-icon.png') }}" alt="categories Icon" class="tab-icon" width="50px" />

                    <span class="tab-label"></span>
                </div>

                <div class="icon" onclick="openTab('Shirts')">
                    <img src="{{ asset('assets/style.png') }}" alt="Shirts Icon" class="tab-icon" width="50px" />

                    <span class="tab-label"></span>
                </div>
                <div class="icon" onclick="openTab('Logos')">
                    <img src="{{ asset('assets/c-logo.png') }}" alt="Logos Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>
                <div class="icon" onclick="openTab('Text')">
                    <img src="{{ asset('assets/text.png') }}" alt="Text Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>


                <!--<div class="icon" onclick="openTab('SocksColor')">-->
                <!--    <img src="{{ asset('assets/colors.png') }}" alt="Socks Color Icon" class="tab-icon" width="50px" />-->
                <!--    <span class="tab-label"></span>-->
                <!--</div>-->

                <div class="icon" onclick="openTab('colorpicker')">
                    <img src="{{ asset('assets/colorbucketicon.png') }}" alt="Socks Color Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>


                <div class="icon" onclick="openTab('Patterns')">
                    <img src="{{ asset('assets/pattern-icon.png') }}" alt="Patterns Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>
                <!-- save button -->
                <div class="icon" onclick="captureFullRightSection()">
                    <img src="{{ asset('assets/savedesignicon.png') }}" alt="Patterns Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>


                <!-- Save button script -->
                <script>
                    function captureFullRightSection() {
                        const rightSection = document.querySelector(".right-section");
                        const shirtImage = document.getElementById("selected-shirt");
                        const patternOverlay = document.getElementById("selected-pattern");
                        const logoImage = document.getElementById("selected-logo");
                        const logoContainer = document.getElementById("logo-container");
                        const textDisplay = document.getElementById("text-display");

                        const hueRotation = getComputedStyle(shirtImage).filter.match(/hue-rotate\(([^)]+)\)/) ?
                            parseInt(getComputedStyle(shirtImage).filter.match(/hue-rotate\(([^)]+)\)/)[1]) :
                            0;

                        const canvas = document.createElement("canvas");
                        const context = canvas.getContext("2d");

                        canvas.width = rightSection.offsetWidth;
                        canvas.height = rightSection.offsetHeight;

                        const img = new Image();
                        img.src = shirtImage.src;

                        img.onload = () => {
                            context.filter = `hue-rotate(${hueRotation}deg)`;
                            context.drawImage(img, 0, 0, shirtImage.width, shirtImage.height);

                            // Draw pattern overlay if available
                            if (patternOverlay.style.display !== "none") {
                                context.drawImage(patternOverlay, 0, 0, patternOverlay.width, patternOverlay.height);
                            }

                            // Draw logo if available
                            if (logoImage.src) {
                                context.drawImage(
                                    logoImage,
                                    logoContainer.offsetLeft,
                                    logoContainer.offsetTop,
                                    logoImage.width,
                                    logoImage.height
                                );
                            }

                            // Draw text if available
                            if (textDisplay && textDisplay.innerText) {
                                context.font = "30px Arial"; // Set font size and family for the text
                                context.fillStyle = "white"; // Text color (adjust as needed)
                                context.textAlign = "center"; // Center the text
                                context.textBaseline = "middle"; // Align text vertically in the center

                                const textX = textDisplay.offsetLeft + (textDisplay.offsetWidth / 2);
                                const textY = textDisplay.offsetTop + (textDisplay.offsetHeight / 2);

                                context.fillText(textDisplay.innerText, textX, textY); // Draw the text on the canvas
                            }

                            // Capture image as Base64
                            const imgData = canvas.toDataURL("image/png");

                            // Send image to backend using fetch
                            console.log("Sending image to the server...");
                            fetch('/save-image', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                            .getAttribute('content'),
                                    },
                                    body: JSON.stringify({
                                        image: imgData
                                    }),
                                })
                                .then(response => response.json())
                                .then(data => {
                                    console.log("Image saved:", data);
                                    if (data.path) {
                                        document.getElementById("custom_image_input").value = data.path;
                                        alert("Design saved successfully!");
                                    }
                                })
                                .catch(error => console.error("Image save error:", error));



                        };
                    }
                </script>

































                <!-- Add more icons for other categories -->
            </div>
            <div class="items-list">
                <div class="tabcontent" id="Shirts">

                    <img src="{{ asset('assets/soccer-shirts/FRONTPNG.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/FRONTPNG.png')" alt="Shirt 1" />
                    <!--
        <img  src="./assets/soccer-shirts/shirt2.jpg" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt2.jpg')" alt="Shirt 2" />


        <img src="assets/soccer-shirts/shirt3.jpg" class="shirt"
          onclick="selectShirt('./assets/soccer-shirts/shirt3.jpg')" alt="Shirt 3" /> -->

                    <img src="{{ asset('assets/soccer-shirts/shirt4.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt4.png')" alt="Shirt 4" />

                    <img src="{{ asset('assets/soccer-shirts/shirt5.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt5.png')" alt="Shirt 5" />

                    <img src="{{ asset('assets/soccer-shirts/shirt6.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt6.png')" alt="Shirt 6" />

                    <img src="{{ asset('assets/soccer-shirts/shirt7.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt7.png')" alt="Shirt 7" />

                    <img src="{{ asset('assets/soccer-shirts/shirt8.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt8.png')" alt="Shirt 8" />

                    <img src="{{ asset('assets/soccer-shirts/shirt9.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt9.png')" alt="Shirt 9" />

                    <img src="{{ asset('assets/soccer-shirts/shirt10.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt10.png')" alt="Shirt 10" />

                    <img src="{{ asset('assets/soccer-shirts/shirt11.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt11.png')" alt="Shirt 11" />


                    <img src="{{ asset('assets/soccer-shirts/shirt12.png') }}" class="shirt"
                        onclick="selectShirt('./assets/soccer-shirts/shirt12.png')" alt="Shirt 12" />



              
                </div>

                <div class="tabcontent" id="Logos" style="display: none">
                    <img src="{{ asset('assets/Logos/p-logo1.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo1.png')" alt="Logo 1" />

                    <img src="{{ asset('assets/Logos/p-logo2.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo2.png')" alt="Logo 2" />

                    <img src="{{ asset('assets/Logos/p-logo3.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo3.png')" alt="Logo 3" />

                    <img src="{{ asset('assets/Logos/p-logo4.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo4.png')" alt="Logo 4" />

                    <img src="{{ asset('assets/Logos/p-logo5.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo5.png')" alt="Logo 5" />

                    <img src="{{ asset('assets/Logos/p-logo6.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo6.png')" alt="Logo 6" />

                    <img src="{{ asset('assets/Logos/p-logo7.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo7.png')" alt="Logo 7" />

                    <img src="{{ asset('assets/Logos/p-logo8.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo8.png')" alt="Logo 8" />

                    <img src="{{ asset('assets/Logos/p-logo9.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo9.png')" alt="Logo 9" />

                    <img src="{{ asset('assets/Logos/p-logo10.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo10.png')" alt="Logo 10" />

                    <img src="{{ asset('assets/Logos/p-logo11.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo11.png')" alt="Logo 11" />

                    <img src="{{ asset('assets/Logos/p-logo12.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo12.png')" alt="Logo 12" />

                    <img src="{{ asset('assets/Logos/p-logo13.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo13.png')" alt="Logo 13" />

                    <img src="{{ asset('assets/Logos/p-logo14.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo14.png')" alt="Logo 14" />

                    <img src="{{ asset('assets/Logos/p-logo15.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo15.png')" alt="Logo 15" />

                    <img src="{{ asset('assets/Logos/p-logo16.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo16.png')" alt="Logo 16" />

                    <img src="{{ asset('assets/Logos/p-logo17.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo17.png')" alt="Logo 17" />

                    <img src="{{ asset('assets/Logos/p-logo18.png') }}" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo18.png')" alt="Logo 18" />
                </div>

                <!-- <div class="tabcontent" id="Text" style="display: none">
        <input type="text" id="customText" placeholder="Enter your text" oninput="updateText()" />
      </div> -->


                <div class="tabcontent" id="Text" style="display: none">
                    <label for="custom-text">Enter Your Text</label>
                    <textarea id="custom-text" name="custom-text" rows="4" cols="36"></textarea><br><br>



                    <label for="font-style">Font Style</label>
                    <select id="font-style" name="font-style" style="width: 87%;">
                        <option value="Impact" selected>Impact</option>
                        <option value="Arial">Arial</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        <option value="Trebuchet MS">Trebuchet MS</option>
                        <option value="Lucida Sans">Lucida Sans</option>
                        <option value="Palatino Linotype">Palatino Linotype</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Garamond">Garamond</option>

                        <option value="Helvetica">Helvetica</option>
                        <option value="Century Gothic">Century Gothic</option>
                        <option value="Calibri">Calibri</option>

                        <option value="Brush Script MT">Brush Script MT</option>
                    </select><br><br>

                    <label for="font-size">Font Size </label>
                    <input type="number" id="font-size" name="font-size" value="30" min="1"
                        style="padding: 10px; width: 20%;"><br>

                    <button id="update-text" style="margin-top: 10px;">Update Text</button>
                </div>




                <div class="tabcontent" id="categories" style="display: none">



                    <div class="cat-row ">
                        <div class="cat-col">

                            <a href="soccer">0<img src="{{ asset('assets/soccer-icon.png') }}" />
                            </a>
                            <h1>
                                soccer
                            </h1>
                        </div>

                        <div class="cat-col">

                            <a href="cricket">0<img src="{{ asset('assets/Cricketkit.png') }}" />
                            </a>
                            <h1>
                                Cricket
                            </h1>
                        </div>

                        <div class="cat-col">

                            <a href="basketball">0<img src="{{ asset('assets/basketball-kit.png') }}" />
                            </a>
                            <h1>
                                Basketball
                            </h1>
                        </div>


                    </div>


                    <div class="cat-row ">
                        <div class="cat-col">

                            {{-- <a href="goalkeeper">0<img src="{{ asset('assets/goalkeeper-1.png') }}" /> --}}
                            </a>
                            <h1>
                                Goal Keeper
                            </h1>
                        </div>

                        <div class="cat-col">

                            {{-- <a href="staffmanagment">0<img src="{{ asset('assets/sfat-managment12.png') }}" /> --}}
                            </a>
                            <h1>
                                Other/ Staff/ Management
                            </h1>
                        </div>




                    </div>









                    <!--goal keeper-->





                </div>

                <div class="tabcontent" id="SocksColor" style="display: none">

                    <img src="{{ asset('assets/clr/skyblue.png') }}" alt="" />
                    <img src="{{ asset('assets/clr/black.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/gray.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/lightgreen.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/red.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/purple.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/brown.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/green.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/blue.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/yellow.jpg') }}" alt="" />
                    <img src="{{ asset('assets/clr/lightblue.png') }}" alt="" />
                    <img src="{{ asset('assets/clr/orange.png') }}" alt="" />
                </div>



                <div class="tabcontent" id="colorpicker" style="display: none">

                    <div class="picker-div">
                        <label for="color-picker">Choose a Shirt color: &nbsp; &nbsp;</label>
                        <input type="color" id="color-picker" onchange="updateShirtColor(this.value)"><br>
                    </div>

                    <div class="picker-div">
                        <label for="pattern-color-picker">Choose a Pattern color:</label>
                        <input type="color" id="pattern-color-picker" onchange="updatePatternColor(this.value)" />
                    </div>

                </div>


                <div class="tabcontent" id="Patterns" style="display: none;">
                    <h3></h3>
                    <div class="pattern-options">
                        <img src="{{ asset('assets/soccer-shirts/pattern1.png') }}" alt="Pattern 1" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern1.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern2.png') }}" alt="Pattern 2" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern2.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern3.png') }}" alt="Pattern 3" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern3.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern4.png') }}" alt="Pattern 4" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern4.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern5.png') }}" alt="Pattern 5" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern5.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern6.png') }}" alt="Pattern 6" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern6.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern7.png') }}" alt="Pattern 7" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern7.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern8.png') }}" alt="Pattern 8" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern8.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern9.png') }}" alt="Pattern 9" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern9.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern10.png') }}" alt="Pattern 10" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern10.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern11.png') }}" alt="Pattern 11" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern11.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern12.png') }}" alt="Pattern 12" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern12.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern13.png') }}" alt="Pattern 13" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern13.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern14.png') }}" alt="Pattern 14" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern14.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern15.png') }}" alt="Pattern 15" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern15.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern16.png') }}" alt="Pattern 16" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern16.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern17.png') }}" alt="Pattern 17" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern17.png')" />

                        <img src="{{ asset('assets/soccer-shirts/pattern18.png') }}" alt="Pattern 18" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern18.png')" />
                        <!-- Add more patterns as needed -->
                    </div>
                </div>









            </div>



            <!-- This section will dynamically show items (product thumbnails) when an icon is clicked -->
        </div>

        <!-- Right Section -->
        <div class="right-section">
            <div class="item-display" style="position: relative;">
                <!-- Add position: relative here -->
                <!-- Display the selected shirt -->
                <div id="text-display" style="position: absolute; z-index: 5;"></div>

                <img id="selected-shirt" src="{{ asset('assets/soccer-shirts/FRONTPNG.png') }}" alt="Selected Shirt" />



                <!-- Pattern overlay -->
                <img id="selected-pattern" src="./assets/soccer-shirts/Realshirts/pattern1.png') }}" alt="Pattern Overlay"
                    class="pattern-overlay" style="display: none;" />





                <!-- Draggable and Resizable Logo with Handles -->
                <div id="logo-container" class="resizable-draggable">
                    <img id="selected-logo" src="" alt="" class="draggable" />
                    <div class="resizing-handle top-left"></div>
                    <div class="resizing-handle top-right"></div>
                    <div class="resizing-handle bottom-left"></div>
                    <div class="resizing-handle bottom-right"></div>
                </div>
            </div>
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
<form action="{{ route('soccer.store') }}" method="POST">
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
    <table class="table table-bordered team-roster-table" id="playersTable">
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
                    <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
                </td>
                <td>
                    <input type="number" name="number[]" class="form-control" placeholder="0" min="1" required>
                </td>
                <td>
                    <select name="shirt_size[]" class="form-control" required>
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                 <td class="hide-on-shirt-only">
                            <select class="short-size" name="short_size[]" require>
                                <option value="">Select</option>
                                   @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                            </select>
                    </td>
                <td>
                    <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" required>
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
        <label for="staff-other">Staff/Other</label>
        <select id="staff-other" name="staff-other" onchange="toggleStaffFields()">
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
                <label for="staff-kit">Staff Kit</label>
                <select id="staff-kit" name="staff-kit">
                    <option value="">Select Kit Option</option>
                    <option value="yes">Full Kit</option>
                    <option value="no">Shirt Only</option>
                </select>
            </div>

            <div class="form-group" id="playersTable">
                <label for="staff-fit-type">Staff Fit Type</label>
                <select id="staff-fit-type" name="staff-fit-type">
                    <option value="">Select Fit Type</option>
                    <option value="slim">Men</option>
                    <option value="regular">Women</option>
                    <option value="loose">Youth</option>
                </select>
            </div>
        </div>

        <!-- Right Column -->
        <div class="form-column">
            <div class="form-group" id="playersTable">
                <label for="staff-collar-type">Staff Collar Type</label>
                <select id="staff-collar-type" name="staff-collar-type">
                    <option value="">Select Collar Type</option>
                    <option value="round">Round Neck</option>
                    <option value="vneck">V Neck</option>
                    <option value="polo-style">Polo Style</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Table -->
   <div class="team-form-container">
    <table class="table table-bordered team-roster-table">
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
        <tbody class="players-body">
            <!-- First Row -->
            <tr>
                <td>
                    <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
                </td>
                <td>
                    <input type="number" name="number[]" class="form-control" placeholder="0" min="1" required>
                </td>
                <td>
                    <select name="shirt_size[]" class="form-control" required>
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td class="hide-on-shirt-only">
                    <select class="short-size" name="short_size[]" required>
                        <option value="">Select</option>
                        @foreach(['xs','s','m','l','xl','2xl','3xl'] as $opt)
                            <option value="{{ $opt }}">{{ strtoupper($opt) }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" required>
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

<!-- Script -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const addRowBtn = document.querySelector(".add-player-row");
    const playersBody = document.querySelector(".players-body");

    // Add Row
    addRowBtn.addEventListener("click", function () {
        const newRow = document.createElement("tr");

        newRow.innerHTML = `
            <td>
                <input type="text" name="name[]" class="form-control" placeholder="Enter name" required>
            </td>
            <td>
                <input type="number" name="number[]" class="form-control" placeholder="0" min="1" required>
            </td>
            <td>
                <select name="shirt_size[]" class="form-control" required>
                    <option value="">Select</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="2xl">2XL</option>
                    <option value="3xl">3XL</option>
                </select>
            </td>
            <td class="hide-on-shirt-only">
                <select class="short-size" name="short_size[]" required>
                    <option value="">Select</option>
                    <option value="xs">XS</option>
                    <option value="s">S</option>
                    <option value="m">M</option>
                    <option value="l">L</option>
                    <option value="xl">XL</option>
                    <option value="2xl">2XL</option>
                    <option value="3xl">3XL</option>
                </select>
            </td>
            <td>
                <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" required>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-player-row" title="Remove Row" 
                    style="padding: 7px; background: red; color: white; border: none; border-radius: 6px;">
                    ✖
                </button>
            </td>
        `;

        playersBody.appendChild(newRow);
    });

    // Remove Row
    playersBody.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("remove-player-row")) {
            // kam se kam 1 row rehni chahiye
            if (playersBody.querySelectorAll("tr").length > 1) {
                e.target.closest("tr").remove();
            } else {
                alert("At least one row is required!");
            }
        }
    });
});
</script>

</div>

        <div class="btn_box">

            <button type="submit" class="addtocart_btn">Add to cart</button>


        </div>
  
</form>


 @endsection