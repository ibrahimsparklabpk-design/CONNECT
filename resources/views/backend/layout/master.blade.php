<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Soccer Kit</title>
    <link rel="stylesheet" href="{{ asset('assets/customizable/styles.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/styles.css"> -->


    <link rel="shortcut icon" href="{{ asset('assets/images/whitelogo2.png') }}">






    <link rel="stylesheet" href="{{ asset('https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js') }}"></script>

    <!--font awsome icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!--for font karla -->
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">



    <style>
        #staff-kit-group,
        #staff-fit-type-group,
        #staff-collar-type-group {
            display: block;
            /* Set this to 'none' if you want to hide them initially */
        }

        .add-row-btn1 {
            background: black !important;
            color: white;
            padding: 10px 15px;
            border-radius: 23px;
            border: none;
            font-size: 16px;

        }

        
#staff-kit-group,
#staff-fit-type-group,
#staff-collar-type-group {
    display: block;
}

.add-row-btn1 {
    background: black !important;
    color: white;
    padding: 10px 15px;
    border-radius: 23px;
    border: none;
    font-size: 16px;
}

canvas {
    display: block;
    margin: 10px auto;
    border: 1px solid #ccc;
}

.color-picker-label {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
    cursor: pointer;
    margin: 8px 0;
    font-family: Arial, sans-serif;
}

/* Logos Grid */
.logos-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(80px, 1fr));
    gap: 10px;
    justify-items: center;
    align-items: center;
    padding: 10px 0;
}

.logos-container .logo {
    width: 70px;
    height: auto;
    cursor: pointer;
    transition: transform 0.2s;
}

.logos-container .logo:hover {
    transform: scale(1.1);
}


@media (max-width: 786px) {
    #shirt-canvas {
        height: 30rem;
        margin-top: -11rem;
    }
}

    </style>

    


</head>

<body>


    <!-- start test -->
    <!-- end test -->



    <!-- Navbar starts -->

    <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
            <img src="{{ asset('assets/logo.png')}}" style="width:85px;">
            <!-- <img src="{{ asset('assets/logo.png') }}" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="index">HOME</a></li>
            <li><a href="directoryadd">DIRECTORY</a></li>
            <!--<li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>-->
            <li><a href="shop">SHOP</a></li>
            <!--<li><a href="services">SERVICES</a></li>-->
            <li><a href="{{ route('static.index') }}">CUSTOM UNIFORMS</a></li>


        </ul>

        <!-- Check if user is logged in -->
        @if (session('user'))
            <div class="dropdown">
                <button class="profile-btn">
                    <i class="fa fa-user"></i> Profile &#9662;
                </button>
                <ul class="dropdown-content">
                    @if (session('role') === 'admin')
                        <li><a href="admin_dashboard">Admin Dashboard</a></li>
                    @else
                        <li><a href="dashboard">Dashboard</a></li>
                    @endif
                    <li><a href="logout">Logout</a></li>
                </ul>
            </div>
        @else
            <div class="auth-links" style="text-align: center;">
                <a href="#" class="help">Help</a>

                <a href="login" class="auth-button">Login</a>

                <a href="register" class="auth-button">Sign Up</a>

            </div>


        @endif
    </nav>

    <!-- Navbar Ends -->




    <!-- Staff Management Guide Ends -->


    @yield('main-content')


    <!-- Staff Management Size Guide Ends -->


    <!-- Staff Management Section -->










    <!-- left per soccer ke shirt ko jub ma click karu to sida sida right per show ho jaye -->
<script>
    function selectShirt(src) {
        document.getElementById("selected-shirt").src = src;
    }

    function selectLogo(src) {
        let logo = document.getElementById("selected-logo");
        logo.src = src;
        logo.style.display = "block";
    }

    function selectPattern(src) {
        let pattern = document.getElementById("selected-pattern");
        pattern.src = src;
        pattern.style.display = "block";
    }

    // Open tabs
    function openTab(tabName) {
        let i, tabcontent;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        document.getElementById(tabName).style.display = "block";
    }
</script>


<!--add row script-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let addRowBtn = document.getElementById("addRowBtn");
    let playersTable = document.getElementById("playersTable").getElementsByTagName("tbody")[0];

    // Add row
    addRowBtn.addEventListener("click", function () {
        let newRow = `
            <tr>
                <td><input type="text" name="name[]" class="form-control" placeholder="Enter name" style="padding: 9px"></td>
                <td><input type="number" name="number[]" class="form-control" placeholder="0" min="1" style="padding: 9px"></td>
                <td>
                    <select name="shirt_size[]" class="form-control" style="padding: 9px">
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
                <td><input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" style="padding: 9px"></td>
                <td class="text-center">
                     <button type="button" class="btn btn-danger btn-sm remove-row" title="Remove Row" style="padding: 7px;  background: red; color: white; border: none; border-radius: 6px;">
                        ✖
                    </button>
                </td>
            </tr>
        `;
        playersTable.insertAdjacentHTML("beforeend", newRow);
    });

    // Remove row (event delegation)
    playersTable.addEventListener("click", function (e) {
        if (e.target && e.target.classList.contains("remove-row")) {
            e.target.closest("tr").remove();
        }
    });
});
</script>


<!--jub shoes ka drop down per yes ho to side ma dusri field open ho jaye-->
<script>
document.addEventListener("DOMContentLoaded", function () {
    let socksSelect = document.getElementById("outfield_players_socks");
    let socksColorWrapper = document.getElementById("socksColorWrapper");

    function toggleSocksColor() {
        if (socksSelect.value === "yes") {
            socksColorWrapper.style.display = "block";
        } else {
            socksColorWrapper.style.display = "none";
            document.getElementById("socks-color").value = ""; // reset color if hidden
        }
    }

    // Run on page load (in case old value = yes)
    toggleSocksColor();

    // Run on change
    socksSelect.addEventListener("change", toggleSocksColor);
});
</script>


<!--jub gollkeper ka drop down per yes ho to nicha  dusri field open ho jaye-->
<script>
    function toggleGoalkeeperFields() {
        let select = document.getElementById("goalkeeper_kit");
        let fields = document.getElementById("goalkeeper_fields");
        if (select.value === "yes") {
            fields.style.display = "block";
        } else {
            fields.style.display = "none";
        }
    }

    // Run once on page load
    window.addEventListener("DOMContentLoaded", function () {
        toggleGoalkeeperFields();
    });
</script>


<!--staff/other-->
<script>
function toggleStaffFields() {
    const staffOther = document.getElementById("staff-other").value;
    const staffSection = document.getElementById("staff-section");

    if (staffOther === "yes") {
        staffSection.style.display = "block"; // poora section including fields show
    } else {
        staffSection.style.display = "none";  // hide kar do
    }
}
</script>

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
                <input type="text" name="name[]" class="form-control" placeholder="Enter name" style="padding: 9px">
            </td>
            <td>
                <input type="number" name="number[]" class="form-control" placeholder="0" min="1" style="padding: 9px">
            </td>
            <td>
                <select name="shirt_size[]" class="form-control" style="padding: 9px">
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
                <select class="short-size" name="short_size[]" style="padding: 9px">
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
                <input type="number" name="quantity[]" class="form-control" placeholder="0" min="1" style="padding: 9px">
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
                alert("At least one row is style="padding: 9px"!");
            }
        }
    });
});
</script>



<!--custome-uniform-->
<script>
// =================== TAB SWITCH ===================
function openTab(tabName){
    document.querySelectorAll(".tabcolor, .tabcontent").forEach(tab=>tab.style.display="none");
    const tabEl = document.getElementById(tabName);
    if(tabEl) tabEl.style.display="block";
    tabEl.querySelectorAll(".tabcontent").forEach(child=>child.style.display="block");
}

document.addEventListener("DOMContentLoaded", function(){
    openTab("Shirts");
    initCanvas();
    setupColorPickers();
    setupTextListeners();
});

// =================== CANVAS INIT ===================
let canvas, ctx;
let collarImage, bodyImage, sleeveImage, trouserImage, shocksImage, shoesImage;

// LOGO & PATTERN
let selectedLogo = null, logoX=300, logoY=200, logoScale=1, logoAngle=0;
let selectedPattern = null, patternX=300, patternY=200, patternScale=1, patternAngle=0;

// PLAYER TEXT
let selectedText = true, textX=0, textY=0, textScale=1, textAngle=0;

// ACTION HANDLERS
let activeSelection = null;
let dragStart={x:0,y:0}, isDragging=false, isResizing=false, isTextDragging=false, isTextResizing=false, currentAction=null;

const colors = { collar:"#ffffff", body:"#ffffff", sleeve:"#ffffff", trouser:"#ffffff", shocks:"#ffffff", pattern:"#ffffff" };
const recycleBin = new Image(); recycleBin.src="https://img.icons8.com/ios-filled/50/000000/recycle-bin.png";

// =================== INIT CANVAS ===================
function initCanvas(){
    canvas = document.getElementById("shirt-canvas");
    ctx = canvas.getContext("2d");

    collarImage = document.getElementById("shirt-collar");
    bodyImage = document.getElementById("shirt-body");
    sleeveImage = document.getElementById("shirt-sleeve");
    trouserImage = document.getElementById("shirt-trouser");
    shocksImage = document.getElementById("shirt-shocks");
    shoesImage = document.getElementById("shirt-shoes");

    const imgs = [collarImage, bodyImage, sleeveImage, trouserImage, shocksImage, shoesImage];
    let loaded = 0;
    imgs.forEach(img => {
        if(img.complete) loaded++;
        else img.onload = () => {
            loaded++; 
            if(loaded === imgs.length){
                const TARGET_W = 600;
                const scale = TARGET_W / bodyImage.naturalWidth;
                const TARGET_H = Math.round(bodyImage.naturalHeight * scale);
                canvas.width = TARGET_W;
                canvas.height = TARGET_H;

                textX = canvas.width / 2;
                textY = canvas.height / 2;
                drawKit();
            }
        };
    });
    if(loaded === imgs.length){
        const TARGET_W = 600;
        const scale = TARGET_W / bodyImage.naturalWidth;
        const TARGET_H = Math.round(bodyImage.naturalHeight * scale);
        canvas.width = TARGET_W;
        canvas.height = TARGET_H;

        textX = canvas.width / 2;
        textY = canvas.height / 2; 
        drawKit();
    }

    canvas.addEventListener("mousedown", startAction);
    canvas.addEventListener("mousemove", performAction);
    canvas.addEventListener("mouseup", endAction);
    canvas.addEventListener("mouseleave", endAction);

    canvas.addEventListener("wheel", e => {
        if(activeSelection === "logo" && selectedLogo){
            e.ctrlKey ? logoAngle += e.deltaY * 0.01 : logoScale = Math.max(0.2, logoScale + e.deltaY * -0.001);
            drawKit();
        }
        if(activeSelection === "pattern" && selectedPattern){
            e.ctrlKey ? patternAngle += e.deltaY * 0.01 : patternScale = Math.max(0.2, patternScale + e.deltaY * -0.001);
            drawKit();
        }
        if(activeSelection === "text" && selectedText){
            e.ctrlKey ? textAngle += e.deltaY * 0.01 : textScale = Math.max(0.2, textScale + e.deltaY * -0.001);
            drawKit();
        }
        e.preventDefault();
    });
}

// =================== HELPER FUNCTIONS ===================
function isInsideHandle(px, py, objX, objY, w, h, handleSize=12){
    const handleX = objX + w/2;
    const handleY = objY + h/2;
    return Math.hypot(px-handleX, py-handleY) <= handleSize;
}

function rotatePoint(px, py, cx, cy, angle){
    const s = Math.sin(-angle), c = Math.cos(-angle);
    px -= cx; py -= cy;
    const xnew = px*c - py*s;
    const ynew = px*s + py*c;
    return {x: xnew + cx, y: ynew + cy};
}

// =================== ACTION HANDLERS ===================
function startAction(e){
    dragStart={x:e.offsetX,y:e.offsetY};
    let clicked=false;

    const items = [
        {type:"logo", img:selectedLogo, x:logoX, y:logoY, getSize:getLogoSize, angle:logoAngle},
        {type:"pattern", img:selectedPattern, x:patternX, y:patternY, getSize:getPatternSize, angle:patternAngle},
        {type:"text", img:selectedText, x:textX, y:textY, getSize:getTextSize, angle:textAngle}
    ];

    for(let item of items){
        if(!item.img && item.type!=="text") continue;
        const {w,h} = item.getSize();
        const relX = e.offsetX - item.x;
        const relY = e.offsetY - item.y;

        // DELETE ICON (top-center)
        const iconX = 0;
        const iconY = -h/2 - 20;
        if(Math.hypot(relX-iconX, relY-iconY) <= 12){
            if(item.type==="logo") selectedLogo=null;
            else if(item.type==="pattern") selectedPattern=null;
            else if(item.type==="text"){
                document.getElementById("player-name").value="";
                document.getElementById("player-number").value="";
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
            if(item.type==="text") isTextResizing=true;
            else isResizing=true;
            clicked=true;
            return;
        }

        // DRAG (inside object)
        if(relX >= -w/2 && relX <= w/2 && relY >= -h/2 && relY <= h/2){
            currentAction="move";
            activeSelection=item.type;
            if(item.type==="text") isTextDragging=true;
            else isDragging=true;
            clicked=true;
            return;
        }
    }

    if(!clicked){
        activeSelection=null;
        drawKit();
    }
}

function performAction(e){
    const dx=e.offsetX-dragStart.x, dy=e.offsetY-dragStart.y;
    if(currentAction==="move"){
        if(activeSelection==="logo" && isDragging){ logoX+=dx; logoY+=dy; }
        if(activeSelection==="pattern" && isDragging){ patternX+=dx; patternY+=dy; }
        if(activeSelection==="text" && isTextDragging){ textX+=dx; textY+=dy; }
        dragStart={x:e.offsetX,y:e.offsetY}; drawKit();
    }
    if(currentAction==="resize"){
        if(activeSelection==="logo" && isResizing) logoScale=Math.max(0.2,logoScale+dx*0.005);
        if(activeSelection==="pattern" && isResizing) patternScale=Math.max(0.2,patternScale+dx*0.005);
        if(activeSelection==="text" && isTextResizing) textScale=Math.max(0.2,textScale+dx*0.005);
        dragStart={x:e.offsetX,y:e.offsetY}; drawKit();
    }
}

function endAction(){ 
    isDragging=false; isResizing=false; isTextDragging=false; isTextResizing=false; currentAction=null; 
}

// =================== SELECTION BOXES ===================
function drawSelections(){
    const items = [
        {type:"logo", img:selectedLogo, x:logoX, y:logoY, getSize:getLogoSize, angle:logoAngle},
        {type:"pattern", img:selectedPattern, x:patternX, y:patternY, getSize:getPatternSize, angle:patternAngle},
        {type:"text", img:selectedText, x:textX, y:textY, getSize:getTextSize, angle:textAngle}
    ];

    items.forEach(item=>{
        if(item.img || item.type==="text"){
            const {w,h}=item.getSize();
            ctx.save();
            ctx.translate(item.x,item.y);
            if(item.type!=="text") ctx.rotate(item.angle);
            ctx.strokeStyle="rgba(0,0,0,0.6)";
            ctx.strokeRect(-w/2,-h/2,w,h);

            // DELETE ICON (top-center)
            ctx.fillStyle="orange";
            ctx.beginPath(); ctx.arc(0,-h/2-20,12,0,Math.PI*2); ctx.fill();
            ctx.drawImage(recycleBin,-12,-h/2-32,24,24);

            // RESIZE HANDLE (bottom-right)
            ctx.fillStyle="blue";
            ctx.beginPath(); ctx.arc(w/2,h/2,8,0,Math.PI*2); ctx.fill();

            ctx.restore();
        }
    });
}

function endAction(){ 
    isDragging=false; isResizing=false; isTextDragging=false; isTextResizing=false; currentAction=null; 
}

// =================== SELECT LOGO/PATTERN ===================
function selectLogo(path){
    if(!bodyImage.naturalWidth) return;
    selectedLogo = new Image();
    selectedLogo.src=path;
    selectedLogo.onload=()=>{ logoX=150; logoY=200; logoScale=1; logoAngle=0; activeSelection="logo"; drawKit(); };
}

function selectPattern(path){
    if(!bodyImage.naturalWidth) return;
    selectedPattern = new Image();
    selectedPattern.src=path;
    selectedPattern.onload=()=>{ patternX=150; patternY=200; patternScale=1; patternAngle=0; activeSelection="pattern"; drawKit(); };
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
function getLogoSize(){ if(!selectedLogo) return {w:0,h:0}; const w=canvas.width*0.25*logoScale; const h=selectedLogo.height*(w/selectedLogo.width); return {w,h}; }
function getPatternSize(){ if(!selectedPattern) return {w:0,h:0}; const w=canvas.width*0.4*patternScale; const h=selectedPattern.height*(w/selectedPattern.width); return {w,h}; }
function getTextSize(){ 
    const scale = canvas.width/600*textScale;
    const ctxTemp=document.createElement("canvas").getContext("2d");
    const playerName = document.getElementById("player-name").value || "";
    const playerNumber = document.getElementById("player-number").value || "";
    ctxTemp.font = `${30*scale}px Arial Black`;
    const w = Math.max(ctxTemp.measureText(playerName).width, ctxTemp.measureText(playerNumber).width)+20;
    const h = 90*scale;
    return {w,h};
}

// =================== DRAW FUNCTIONS ===================
function drawPatternMasked(){
    if(!selectedPattern) return;
    const {w,h}=getPatternSize();
    const pCanvas=document.createElement("canvas"); pCanvas.width=canvas.width; pCanvas.height=canvas.height;
    const pctx=pCanvas.getContext("2d");
    pctx.save(); pctx.translate(patternX,patternY); pctx.rotate(patternAngle);
    const coloredPattern=createColoredCanvas(selectedPattern,colors.pattern,w,h);
    pctx.drawImage(coloredPattern,-w/2,-h/2,w,h); pctx.restore();
    pctx.globalCompositeOperation="destination-in";
    pctx.drawImage(bodyImage,0,0,canvas.width,canvas.height);
    ctx.drawImage(pCanvas,0,0);
}

function drawLogoMasked(){
    if(!selectedLogo) return;
    const {w,h}=getLogoSize();
    const logoCanvas=document.createElement("canvas"); logoCanvas.width=canvas.width; logoCanvas.height=canvas.height;
    const lctx=logoCanvas.getContext("2d"); lctx.save(); lctx.translate(logoX,logoY); lctx.rotate(logoAngle); lctx.drawImage(selectedLogo,-w/2,-h/2,w,h); lctx.restore();
    lctx.globalCompositeOperation="destination-in";
    lctx.drawImage(bodyImage,0,0,canvas.width,canvas.height);
    ctx.drawImage(logoCanvas,0,0);
}

// =================== PLAYER TEXT ===================
function drawPlayerText(){
    if(!bodyImage.naturalWidth || !selectedText) return;
    const playerName = document.getElementById("player-name").value;
    const nameColor = document.getElementById("player-name-color").value;
    const playerNumber = document.getElementById("player-number").value;
    const numberColor = document.getElementById("player-number-color").value;
    const scale = canvas.width / 600 * textScale;

    ctx.save();
    ctx.translate(textX, textY);
    ctx.rotate(textAngle);
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";

    if(playerName){
        ctx.fillStyle = nameColor;
        ctx.font = `${30 * scale}px Arial Black`;
        ctx.fillText(playerName.toUpperCase(), 0, -20 * scale);
    }
    if(playerNumber){
        ctx.fillStyle = numberColor;
        ctx.font = `${60 * scale}px Arial Black`;
        ctx.fillText(playerNumber, 0, 40 * scale);
    }
    ctx.restore();
}

// =================== DRAW KIT ===================
function drawKit(){
    if(!bodyImage.naturalWidth) return;
    const TARGET_W=600, scale=TARGET_W/bodyImage.naturalWidth, TARGET_H=Math.round(bodyImage.naturalHeight*scale);
    canvas.width=TARGET_W; canvas.height=TARGET_H;

    const bodyC=createColoredCanvas(bodyImage,colors.body,TARGET_W,TARGET_H);
    const sleeveC=createColoredCanvas(sleeveImage,colors.sleeve,TARGET_W,TARGET_H);
    const collarC=createColoredCanvas(collarImage,colors.collar,TARGET_W,TARGET_H);
    const trouserC=createColoredCanvas(trouserImage,colors.trouser,TARGET_W,TARGET_H);
    const shocksC=createColoredCanvas(shocksImage,colors.shocks,TARGET_W,TARGET_H);

    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.drawImage(trouserC,0,0); 
    ctx.drawImage(shocksC,0,0); 
    ctx.drawImage(bodyC,0,0); 
    ctx.drawImage(sleeveC,0,0); 
    ctx.drawImage(collarC,0,0);

    drawPatternMasked(); 
    drawLogoMasked(); 
    drawPlayerText(); 

    const shW=shoesImage.naturalWidth*scale, shH=shoesImage.naturalHeight*scale; 
    ctx.drawImage(shoesImage,0,0,shW,shH);

    drawSelections();
}

// =================== SELECTION BOXES ===================
function drawSelections(){
    const items = [
        {obj:"pattern", img:selectedPattern, x:patternX, y:patternY, getSize:getPatternSize},
        {obj:"logo", img:selectedLogo, x:logoX, y:logoY, getSize:getLogoSize},
        {obj:"text", img:selectedText, x:textX, y:textY, getSize:getTextSize}
    ];

    items.forEach(item=>{
        if(item.img && activeSelection===item.obj){
            const {w,h}=item.getSize();
            ctx.save(); ctx.translate(item.x,item.y);
            if(item.obj!=="text") ctx.rotate(item.obj==="logo"?logoAngle:patternAngle);
            ctx.strokeStyle="rgba(0,0,0,0.6)"; ctx.strokeRect(-w/2,-h/2,w,h);
            ctx.fillStyle="orange"; ctx.beginPath(); ctx.arc(w/2,h/2,8,0,Math.PI*2); ctx.fill();
            ctx.drawImage(recycleBin,-12,-h/2-32,24,24);
            ctx.restore();
        }
    });
}

// =================== COLOR PICKERS ===================
function setupColorPickers(){
    ["collar","body","sleeve","trouser","shocks","pattern"].forEach(p=>{
        const el = document.getElementById(p==="pattern"?"color-artboard":`color-${p}`);
        if(el) el.addEventListener("input", e=>{ colors[p]=e.target.value; drawKit(); });
    });
}

// =================== TEXT LISTENERS ===================
function setupTextListeners(){
    document.getElementById("player-name").addEventListener("input", drawKit);
    document.getElementById("player-number").addEventListener("input", drawKit);
    document.getElementById("player-name-color").addEventListener("input", drawKit);
    document.getElementById("player-number-color").addEventListener("input", drawKit);
}

// =================== SAVE DESIGN ===================
function saveDesign(){
    drawKit();
    const dataURL = canvas.toDataURL("image/png");
    const left = document.getElementById("saved-designs");
    if(!left) return;
    const wrap=document.createElement("div"); wrap.style.position="relative"; wrap.style.display="inline-block"; wrap.style.margin="5px";
    const img=document.createElement("img"); img.src=dataURL; img.style.width="100px"; img.style.display="block";
    const del=document.createElement("span"); del.innerHTML="&times;"; del.style.position="absolute"; del.style.top="0"; del.style.right="0"; del.style.background="red"; del.style.color="#fff"; del.style.cursor="pointer"; del.style.display="none";
    wrap.addEventListener("mouseenter",()=>del.style.display="block");
    wrap.addEventListener("mouseleave",()=>del.style.display="none");
    del.onclick=()=>wrap.remove();
    wrap.appendChild(img); wrap.appendChild(del); left.appendChild(wrap);
    openTab("capture");
}

const uploadedContainer = document.getElementById("uploaded-logos");

document.getElementById("upload-logo").addEventListener("change", function(e){
    const file = e.target.files[0];
    if(!file) return;

    const reader = new FileReader();
    reader.onload = function(event){
        // Wrapper div for image + delete button
        const wrap = document.createElement("div");
        wrap.style.position = "relative";
        wrap.style.width = "80px";
        wrap.style.height = "80px";

        // Uploaded logo image
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
        del.onclick = () => wrap.remove(); // Remove this logo from preview
        wrap.appendChild(del);

        // Click on image → add to kit
        img.onclick = () => {
            const logo = new Image();
            logo.src = img.src;
            logo.onload = function(){
                selectedLogo = logo;
                logoX = canvas.width/2;
                logoY = canvas.height/2;
                logoScale = 1;
                logoAngle = 0;
                activeSelection = "logo";
                drawKit();
            }
        };

        uploadedContainer.appendChild(wrap);
    };
    reader.readAsDataURL(file);

    // Reset input for uploading same file again
    e.target.value = "";
});

const uploadedPatternContainer = document.getElementById("uploaded-pattern");

document.getElementById("upload-patterns").addEventListener("change", function(e){
    const file = e.target.files[0];
    if(!file) return;

    const reader = new FileReader();
    reader.onload = function(event){
        // Wrapper for pattern + delete button
        const wrap = document.createElement("div");
        wrap.style.position = "relative";
        wrap.style.width = "80px";
        wrap.style.height = "80px";

        // Pattern image
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
        del.onclick = () => wrap.remove(); // Remove pattern
        wrap.appendChild(del);

        // Click on image → apply pattern to kit
        img.onclick = () => {
            const pattern = new Image();
            pattern.src = img.src;
            pattern.onload = function(){
                selectedPattern = pattern;
                patternX = canvas.width/2;
                patternY = canvas.height/2;
                patternScale = 1;
                patternAngle = 0;
                activeSelection = "pattern";
                drawKit();
            }
        };

        uploadedPatternContainer.appendChild(wrap);
    };
    reader.readAsDataURL(file);

    // Reset input to allow same file upload again
    e.target.value = "";
});
</script>



<script>
    // Jab user shirt select kare
   function selectShirt(imagePath) {
    // Hidden input update
    const hiddenInput = document.getElementById("selectedShirtInput");
    hiddenInput.value = imagePath;

    // Right section me base shirt image replace karo
    const shirtImg = document.getElementById("selected-shirt");
    if (shirtImg) {
        shirtImg.src = imagePath;
    }

    console.log("Selected Shirt Path:", imagePath); // Debugging
}
</script>

    <!-- FOOTER STARTS FORM HERE -->

    @include('component.footer')

    <!-- FOOTER ENDS HERE -->
