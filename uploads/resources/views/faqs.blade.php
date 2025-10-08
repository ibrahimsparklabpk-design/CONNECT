<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connect 767</title>



    <link rel="stylesheet" href="{{ asset('assets/showDirectories/searchpage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/showDirectories/styles.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">
    
     <link rel="stylesheet" href="{{ asset('assets/css/faqs.css') }}">
   









    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200..800;1,200..800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   <!--favicon-->
          <link rel="shortcut icon" href="assets/images/whitelogo2.png">
          
          
    <style>
    
     .faq-hero-section {
            position: relative;
            /* Make the section position relative to apply overlay */
            background-image: url('assets/images/faqs.jpg');
            /* Background Image */
            background-size: cover;
            /* Ensure the image covers the entire section */
            background-position: center;
            /* Center the background image */
            height: 400px;
            /* Set the height of the hero section */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            padding: 20px 0;
     }
           
            
            
             /* Overlay */
        .faq-hero-section::before {
            content: '';
            /* Empty content */
            position: absolute;
            /* Position the overlay on top of the background image */
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.6);
            /* Black overlay with 50% transparency */
            z-index: 0;
            /* Place overlay below the text */
        }

        .faq-hero-content {
            z-index: 1;
            /* Ensures content stays on top of the background image */
        }

        .faq-hero-section h1 {
            font-size: 3em;
            margin: 0;
            font-family: "Karla", Sans-serif !important;
        }

        .faq-hero-section p {
            font-size: 1.2em;
            font-family: "Karla", Sans-serif !important;
        }
        
    </style>
 




</head>

<body>

 <nav class="navbar">
        <!-- Logo Section -->
        <div class="logo">

            <!--<img src="{{ asset('assets/connect1.png') }}" style="width:140px">-->
              <img src="{{ asset('assets/logo.png') }}" style="width:85px;">
            <!-- <img src="./assets/logo.png" alt="Logo" /> -->
        </div>

        <!-- Hamburger Menu for Mobile -->
        <div class="hamburger" onclick="toggleMenu()">
            &#9776;
            <!-- Hamburger Icon -->
        </div>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="{{route('index')}}">HOME</a></li>
            <li><a href="{{route('directoryadd')}}">DIRECTORY</a></li>
            <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
               <!--<li><a href="{{route('shop')}}">SHOP</a></li>-->
            <!--<li><a href="{{route('services')}}">SERVICES</a></li>-->
            <!--<li><a href= "{{route('soccer')}}">CUSTOM UNIFORMS</a></li> -->
            
           
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
            <a href="{{route('help')}}" class="help">Help</a>

            <a href="{{ route('login') }}" class="auth-button">Login</a>

            <a href="{{ route('register') }}" class="auth-button">Sign Up</a>

        </div>


        @endif
    </nav>
     <!-- Services Hero Section -->
    <section class="faq-hero-section">
        <div class="faq-hero-content">
            <h1>FAQs</h1>
            <p>This FAQ section provides answers to your most common questions about our platform.</p>
        </div>
    </section>
    <!-- Services Hero Section -->
    
    
     <div class="help-container">
        <!-- Sidebar -->
        <div class="help-sidebar">
            <div class="help-item active" data-content="General Principles">General Principles</div>
            <div class="help-item" data-content="Shipping">Shipping</div>
            <div class="help-item" data-content="Returns & Exchange">Returns & Exchange</div>
            <div class="help-item" data-content="Featured Professional & Business">Featured Professional & Business
            </div>
            <div class="help-item" data-content="Delivery Issues">Delivery Issues</div>
            <div class="help-item" data-content="Privacy & Data Collection">Privacy & Data Collection</div>
            <div class="help-item" data-content="Cookies & Website Usage">Cookies & Website Usage</div>
            <div class="help-item" data-content="Privacy Policy Updates">Privacy Policy Updates</div>
        </div>

        <!-- Content Area -->
        <div class="help-content">
            <h1 class="help-heading">Common Questions</h1>
            <div class="help-questions" id="help-questions">
                <!-- Initial content for "Home" -->
                <p>Welcome to the Help Center. Choose a topic from the left to get started.</p>
            </div>

            <div id="help-content" class="help-content">
                <!-- Existing help content -->

                <div class="faq-section">
                    <h2>FAQs</h2>

                    <!-- FAQ Item 1 -->
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do I search for businesses or professionals in the directory?</span>
                            <button class="faq-toggle">▼</button>

                        </div>
                        <div class="faq-answer">
                            <p>Use the search bar at the top of the page to enter keywords. You can filter results by
                                rating, category, country, state, industry, education, or experience to narrow down your
                                search.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How can I add my business or profile to the directory?</span>
                            <button class="faq-toggle">▼</button>
                        </div>
                        <div class="faq-answer">
                            <p>To add your business or profile, click on the "Stay Connected! Be a part of our
                                Directory" section and follow the instructions. You may need to provide details like
                                your business name, contact information, and a description of your services.</p>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="faq-item">
                        <div class="faq-question">
                            <span>How do I contact a listed business or professional?</span>
                            <button class="faq-toggle">▼</button>
                        </div>
                        <div class="faq-answer">
                            <p>Each listing includes contact information such as a phone number and email address. You
                                can click "Read More" on the listing for additional details and to directly connect with
                                the business or professional.</p>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </div>

    <script>
        // Selectors
        const helpItems = document.querySelectorAll(".help-item");
        const helpContentArea = document.querySelector(".help-content");

        // Define FAQs for each section
        const faqData = {
            "General Principles": `
        <div class="faq-item">
            <div class="faq-question">How is my personal information handled?</div>
            <div class="faq-answer" style="display: none;">Any information we gather is strictly for our intended use and is not shared with any other entity, public or private, for any reason. We do not sell or give away any lists or purchase such information from other sources.</div>
         <i class="faq-toggle fas fa-chevron-down"></i>
            </div>
        
    `,
            "Shipping": `
        <div class="faq-item">
            <div class="faq-question">How long does it take to ship my order?</div>
            <div class="faq-answer" style="display: none;"> Orders are shipped within 3-5 business days after payment verification.</div>
       <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

        <div class="faq-item">
            <div class="faq-question">What shipping methods do you use?</div>
            <div class="faq-answer" style="display: none;"> All continental US orders are shipped via USPS unless instructed otherwise. International orders may take up to 10 business days.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>
            <div class="faq-item">
            <div class="faq-question">What should I do if my order is delayed?</div>
            <div class="faq-answer" style="display: none;"> Contact us immediately, and we will help confirm the status of your order.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>
    `,
            "Returns & Exchange": `
        <div class="faq-item">
            <div class="faq-question">Can I return an item?</div>
            <div class="faq-answer" style="display: none;">Yes, we accept returns on eligible domestic orders within 15 days from the order date, provided the items are unworn, unwashed, and include all original packaging.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

        <div class="faq-item">
            <div class="faq-question">Who covers the return shipping cost?</div>
            <div class="faq-answer" style="display: none;">The buyer must pay return shipping costs. Original shipping charges are non-refundable.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

            <div class="faq-item">
            <div class="faq-question">How long does it take to process a refund?</div>
            <div class="faq-answer" style="display: none;">Refunds or store credits are processed within 5-7 business days after we receive the returned item(s).</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

    `,
            "Featured Professional & Business": `
        <div class="faq-item">
            <div class="faq-question">How can I become a featured professional?</div>
            <div class="faq-answer" style="display: none;">Sign up, edit your directory information in your account settings, purchase the featured professional package, and submit a short biography to <a href="mailto:info@connect767.com">info@connect767.com</a>.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

        <div class="faq-item">
            <div class="faq-question">How can I feature my business?</div>
            <div class="faq-answer" style="display: none;">Sign up, edit your directory information, and purchase the featured professional package.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

            

    `,
            "Delivery Issues": `
        <div class="faq-item">
            <div class="faq-question">What should I do if my order is damaged?</div>
            <div class="faq-answer" style="display: none;">Take a photo of the damaged item as proof and email it to <a href="mailto:orders@connect767.com">orders@connect767.com</a>.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

        <div class="faq-item">
            <div class="faq-question">What happens if my order is lost?</div>
            <div class="faq-answer" style="display: none;">We will open a formal inquiry. If your order is confirmed lost, we will resend it at no cost, subject to availability.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

            

    `,
            "Privacy & Data Collection": `
        <div class="faq-item">
            <div class="faq-question">What data is collected on the website?</div>
            <div class="faq-answer" style="display: none;">Our servers track IP addresses and referring pages to help with site maintenance. This data is used anonymously for statistical purposes.</a>.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

        <div class="faq-item">
            <div class="faq-question">Do you store sales information?</div>
            <div class="faq-answer" style="display: none;">No, except for payment-related data and the information from our "Directory" section to develop our digital directory of "Professionals" and "Businesses."</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
        </div>

        <div class="faq-item">
            <div class="faq-question">Can I request the removal of my personal information?</div>
            <div class="faq-answer" style="display: none;">Yes, you can request the removal of your information by emailing us.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
        </div>

            

    `,
            "Cookies & Website Usage": `
        <div class="faq-item">
            <div class="faq-question">What are cookies, and how do you use them?</div>
            <div class="faq-answer" style="display: none;">Cookies are small data files stored on your device. We use cookies to store your cart contents.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

        <div class="faq-item">
            <div class="faq-question">Can I disable cookies?</div>
            <div class="faq-answer" style="display: none;">Yes, you can disable cookies in your browser settings. However, this may affect the checkout functionality on our site.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
        </div>

    `,
            "Privacy Policy Updates": `
        <div class="faq-item">
            <div class="faq-question">When was this privacy policy last updated?</div>
            <div class="faq-answer" style="display: none;">This Privacy Policy is effective as of February 2, 2019, and any future changes will be posted on this page.</div>
        <i class="faq-toggle fas fa-chevron-down"></i>
            </div>

       

    `
        };

        // Add click event listener to each help menu item
        helpItems.forEach(item => {
            item.addEventListener("click", () => {
                // Remove "active" class from all items
                helpItems.forEach(i => i.classList.remove("active"));

                // Add "active" class to the clicked item
                item.classList.add("active");

                // Get the corresponding FAQ content
                const sectionKey = item.getAttribute("data-content");
                const faqContent = faqData[sectionKey] || `<p>No FAQs available for this section.</p>`;

                // Replace the help content area with the new FAQ content
                helpContentArea.innerHTML = `
            <h1 class="help-heading">${sectionKey.replace(/-/g, ' ')}</h1>
            <div id="help-questions">
                ${faqContent}
            </div>
        `;










                // Reinitialize FAQ functionality for the new content
                initializeFAQ();
            });
        });

        // Initialize FAQ functionality
        function initializeFAQ() {
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');
                const answer = item.querySelector('.faq-answer');

                question.addEventListener('click', () => {
                    // Toggle the current FAQ item
                    const isOpen = item.classList.contains('open');
                    if (isOpen) {
                        item.classList.remove('open');
                        answer.style.display = 'none';
                    } else {
                        item.classList.add('open');
                        answer.style.display = 'block';
                    }
                });
            });
        }

        // Set initial content
        helpContentArea.innerHTML = `
    <h1 class="help-heading">General Principles</h1>
    <div id="help-questions">
        ${faqData["General Principles"]}
    </div>
`;
        initializeFAQ();

    </script>







   





    @include('component.footer')