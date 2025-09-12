@extends("backend.layout.master");



@section("main-content")
 <div class="main-section">
        <div class="left-section">
            <div class="icon-list">
                <div class="icon" onclick="openTab('categories')">
                    <img src="./assets/categories-icon.png" alt="categories Icon" class="tab-icon" width="50px" />

                    <span class="tab-label"></span>
                </div>

                <div class="icon" onclick="openTab('Shirts')">
                    <img src="./assets/style.png" alt="Shirts Icon" class="tab-icon" width="50px" />

                    <span class="tab-label"></span>
                </div>
                <div class="icon" onclick="openTab('Logos')">
                    <img src="./assets/c-logo.png" alt="Logos Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>



                <div class="icon" onclick="openTab('Text')">
                    <img src="./assets/text.png" alt="Text Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>






                <div class="icon" onclick="openTab('SocksColor')">
                    <img src="./assets/colors.png" alt="Socks Color Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>

                <div class="icon" onclick="openTab('colorpicker')">
                    <img src="./assets/colorbucketicon.png" alt="Socks Color Icon" class="tab-icon" width="50px" />
                    <span class="tab-label"></span>
                </div>
                <!-- save button -->
                <div class="icon" onclick="captureFullRightSection()">
                    <img src="./assets/savedesignicon.png" alt="Patterns Icon" class="tab-icon" width="50px" />
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
                                        .getAttribute(
                                            'content'),
                                },
                                body: JSON.stringify({
                                    image: imgData
                                }),
                            })
                            .then(response => response.json())
                            .then(data => console.log("Response Data:", data))
                            .catch(error => console.error("Error:", error));
                    };
                }
                </script>



                <!-- <div class="icon" onclick="openTab('Patterns')">
          <img src="./assets/pattern-icon.png" alt="Patterns Icon" class="tab-icon" width="50px" />
          <span class="tab-label"></span>
        </div> -->

                <!-- Add more icons for other categories -->
            </div>
            <div class="items-list">
                <div class="tabcontent" id="Shirts">
                    <img src="./assets/cricket-kit/cricket-kit-1.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-1.png')" alt="Shirt 1" />
                    <img src="./assets/cricket-kit/cricket-kit-2.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-2.png')" alt="Shirt 2" />
                    <img src="./assets/cricket-kit/cricket-kit-3.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-3.png')" alt="Shirt 3" />

                    <img src="./assets/cricket-kit/cricket-kit-4.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-4.png')" alt="Shirt 4" />

                    <img src="./assets/cricket-kit/cricket-kit-5.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-5.png')" alt="Shirt 5" />

                    <img src="./assets/cricket-kit/cricket-kit-6.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-6.png')" alt="Shirt 6" />

                    <img src="./assets/cricket-kit/cricket-kit-7.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-7.png')" alt="Shirt 7" />

                    <img src="./assets/cricket-kit/cricket-kit-8.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-8.png')" alt="Shirt 8" />

                    <img src="./assets/cricket-kit/cricket-kit-9.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-9.png')" alt="Shirt 9" />

                    <img src="./assets/cricket-kit/cricket-kit-10.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-10.png')" alt="Shirt 10" />

                    <img src="./assets/cricket-kit/cricket-kit-11.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-11.png')" alt="Shirt 11" />

                    <img src="./assets/cricket-kit/cricket-kit-12.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-12.png')" alt="Shirt 12" />

                    <img src="./assets/cricket-kit/cricket-kit-13.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-13.png')" alt="Shirt 13" />

                    <img src="./assets/cricket-kit/cricket-kit-14.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-14.png')" alt="Shirt 14" />

                    <img src="./assets/cricket-kit/cricket-kit-15.png" class="shirt"
                        onclick="selectShirt('./assets/cricket-kit/cricket-kit-15.png')" alt="Shirt 15" />
                </div>

                <div class="tabcontent" id="Logos" style="display: none">
                    <img src="./assets/Logos/p-logo1.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo1.png')" alt="Logo 1" />

                    <img src="./assets/Logos/p-logo2.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo2.png')" alt="Logo 2" />

                    <img src="./assets/Logos/p-logo3.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo3.png')" alt="Logo 3" />

                    <img src="./assets/Logos/p-logo4.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo4.png')" alt="Logo 4" />

                    <img src="./assets/Logos/p-logo5.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo5.png')" alt="Logo 5" />

                    <img src="./assets/Logos/p-logo6.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo6.png')" alt="Logo 6" />

                    <img src="./assets/Logos/p-logo7.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo7.png')" alt="Logo 7" />

                    <img src="./assets/Logos/p-logo8.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo8.png')" alt="Logo 8" />

                    <img src="./assets/Logos/p-logo9.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo9.png')" alt="Logo 9" />

                    <img src="./assets/Logos/p-logo10.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo10.png')" alt="Logo 10" />

                    <img src="./assets/Logos/p-logo11.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo11.png')" alt="Logo 11" />

                    <img src="./assets/Logos/p-logo12.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo12.png')" alt="Logo 12" />

                    <img src="./assets/Logos/p-logo13.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo13.png')" alt="Logo 13" />

                    <img src="./assets/Logos/p-logo14.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo14.png')" alt="Logo 14" />

                    <img src="./assets/Logos/p-logo15.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo15.png')" alt="Logo 15" />

                    <img src="./assets/Logos/p-logo16.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo16.png')" alt="Logo 16" />

                    <img src="./assets/Logos/p-logo17.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo17.png')" alt="Logo 17" />

                    <img src="./assets/Logos/p-logo18.png" class="logo"
                        onclick="selectLogo('./assets/Logos/p-logo18.png')" alt="Logo 18" />
                </div>


                <script>
                function updateShirtColor(color) {
                    const selectedShirt = document.getElementById('selected-shirt'); // Select the specific shirt by ID
                    selectedShirt.style.filter = `hue-rotate(${getHueFromColor(color)}deg)`; // Update the filter
                }

                function getHueFromColor(color) {
                    const hex = color.slice(1); // Remove the '#' from the color
                    const r = parseInt(hex.substring(0, 2), 16);
                    const g = parseInt(hex.substring(2, 4), 16);
                    const b = parseInt(hex.substring(4, 6), 16);

                    // Convert RGB to HSL and get the Hue
                    const max = Math.max(r, g, b);
                    const min = Math.min(r, g, b);
                    let hue;

                    if (max === min) {
                        hue = 0; // Achromatic
                    } else if (max === r) {
                        hue = (60 * (g - b) / (max - min) + 360) % 360;
                    } else if (max === g) {
                        hue = (60 * (b - r) / (max - min) + 120) % 360;
                    } else {
                        hue = (60 * (r - g) / (max - min) + 240) % 360;
                    }

                    return hue;
                }
                </script>

                <div class="tabcontent" id="Text" style="display: none">
                    <label for="custom-text">Enter Your Text</label>
                    <textarea id="custom-text" name="custom-text" rows="4" cols="36"></textarea><br><br>



                    <label for="font-style">Font Style</label>
                    <select id="font-style" name="font-style" style="width: 87%;">
                        <option value="Arial" selected>Arial</option>
                        <option value="Times New Roman">Times New Roman</option>
                        <option value="Courier New">Courier New</option>
                        <option value="Georgia">Georgia</option>
                        <option value="Comic Sans MS">Comic Sans MS</option>
                        <option value="Trebuchet MS">Trebuchet MS</option>
                        <option value="Lucida Sans">Lucida Sans</option>
                        <option value="Palatino Linotype">Palatino Linotype</option>
                        <option value="Tahoma">Tahoma</option>
                        <option value="Garamond">Garamond</option>
                        <option value="Impact">Impact</option>
                        <option value="Helvetica">Helvetica</option>
                        <option value="Century Gothic">Century Gothic</option>
                        <option value="Calibri">Calibri</option>

                        <option value="Brush Script MT">Brush Script MT</option>
                    </select><br><br>

                    <label for="font-size">Font Size </label>
                    <input type="number" id="font-size" name="font-size" value="22" min="1"
                        style="padding: 10px; width: 20%;"><br>

                    <button id="update-text" style="margin-top: 10px;">Update Text</button>
                </div>

                <script>
                $(function() {
                    // Update the text in #text-display when the button is clicked
                    $("#update-text").click(function() {
                        var enteredText = $("#custom-text").val();
                        $("#text-display").text(enteredText);

                        // Update font size based on input
                        var fontSize = $("#font-size").val();
                        $("#text-display").css("font-size", fontSize + "px");

                        // Update font style based on selection
                        var fontStyle = $("#font-style").val();
                        $("#text-display").css("font-family", fontStyle);
                    });
                });
                </script>

                <div class="tabcontent" id="Color" style="display: none">
                    <input type="color" id="colorPicker" onchange="updateColor(this.value)" />
                </div>

                 <div class="tabcontent" id="categories" style="display: none">


                   
                    <div class="cat-row ">
                        <div class="cat-col">
                            
                             <a href="{{route('soccer')}}"><img src="./assets/soccer-icon.png" />
                             </a>
                             <h1>
                                 soccer
                             </h1>
                        </div>
                        
                        <div class="cat-col">
                            
                              <a href="{{route('cricket')}}"><img src="./assets/Cricketkit.png" />
                             </a>
                             <h1>
                               Cricket
                             </h1>
                        </div>
                        
                        <div class="cat-col">
                            
                                 <a href="{{route('basketball')}}"><img src="./assets/basketball-kit.png" />
                                 </a>
                             <h1>
                              Basketball
                             </h1>
                        </div>
                        
                        
                    </div>
                    
                    
                      <div class="cat-row ">
                        <div class="cat-col">
                            
                               {{-- <a href="{{route('goalkeeper')}}"><img src="./assets/goalkeeper-1.png" /> --}}
                                </a>
                             <h1>
                                 Goal Keeper
                             </h1>
                        </div>
                        
                        <div class="cat-col">
                            
                             {{-- <a href="{{route('staffmanagment')}}"><img src="./assets/sfat-managment12.png" /> --}}
                            </a>
                             <h1>
                               Other/ Staff/ Management
                             </h1>
                        </div>
                        
                        
                        
                        
                    </div>
                    
                    


                   


                 
                    
                    <!--goal keeper-->

              
                  


                </div>

                <div class="tabcontent" id="SocksColor" style="display: none">
                    <img src="./assets/clr/skyblue.png" alt="" />
                    <img src="./assets/clr/black.jpg" alt="" />
                    <img src="./assets/clr/gray.jpg" alt="" />
                    <img src="./assets/clr/lightgreen.jpg" alt="" />
                    <img src="./assets/clr/red.jpg" alt="" />
                    <img src="./assets/clr/purple.jpg" alt="" />
                    <img src="./assets/clr/brown.jpg" alt="" />
                    <img src="./assets/clr/green.jpg" alt="" />
                    <img src="./assets/clr/blue.jpg" alt="" />
                    <img src="./assets/clr/yellow.jpg" alt="" />
                    <img src="./assets/clr/lightblue.png" alt="" />
                    <img src="./assets/clr/orange.png" alt="" />
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
                        <img src="./assets/soccer-shirts/pattern1.png" alt="Pattern 1" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern1.png')" />
                        <img src="./assets/soccer-shirts/pattern2.png" alt="Pattern 2" class="pattern-option"
                            onclick="selectPattern('./assets/soccer-shirts/pattern2.png')" />


                        <!-- Add more patterns as needed -->
                    </div>
                </div>

            </div>

            <script>
            function selectPattern(patternPath) {
                const selectedPattern = document.getElementById('selected-pattern');
                selectedPattern.src = patternPath; // Change the source of the pattern image
                selectedPattern.style.display = 'block'; // Show the pattern overlay if hidden
            }


            function openTab(tabName) {
                const tabcontents = document.querySelectorAll('.tabcontent');
                tabcontents.forEach((tab) => {
                    tab.style.display = 'none'; // Hide all tab contents
                });
                document.getElementById(tabName).style.display = 'block'; // Show the selected tab
            }
            </script>


            <script>
            function updatePatternColor(color) {
                const selectedPattern = document.getElementById('selected-pattern'); // Select the pattern by ID
                const hueValue = getHueFromColor(color); // Convert the selected color to hue value
                selectedPattern.style.filter =
                    `hue-rotate(${hueValue}deg) saturate(1)`; // Apply hue-rotate and other filters as needed
            }

            // Function to convert the selected color to a hue value for the hue-rotate filter
            function getHueFromColor(color) {
                const hex = color.slice(1); // Remove the '#' from the color code
                const r = parseInt(hex.substring(0, 2), 16);
                const g = parseInt(hex.substring(2, 4), 16);
                const b = parseInt(hex.substring(4, 6), 16);

                // Convert RGB to HSL and extract the Hue
                const max = Math.max(r, g, b);
                const min = Math.min(r, g, b);
                let hue;

                if (max === min) {
                    hue = 0; // Achromatic
                } else if (max === r) {
                    hue = (60 * ((g - b) / (max - min)) + 360) % 360;
                } else if (max === g) {
                    hue = (60 * ((b - r) / (max - min)) + 120) % 360;
                } else {
                    hue = (60 * ((r - g) / (max - min)) + 240) % 360;
                }

                return hue;
            }
            </script>






            <!-- This section will dynamically show items (product thumbnails) when an icon is clicked -->
        </div>

        <!-- Right Section -->
        <!-- Right Section -->
        <div class="right-section">
            <div class="item-display" style="position: relative;">
                <!-- Add position: relative here -->
                <!-- Display the selected shirt -->
                <div id="text-display" style="position: absolute; z-index: 5;"></div>

                <img id="selected-shirt" src="assets/cricket-kit/cricket-kit-1.png" alt="Selected Shirt" />



                <!-- Pattern overlay -->
                <img id="selected-pattern" src="./assets/soccer-shirts/Realshirts/pattern1.png" alt="Pattern Overlay"
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
@endsection