   <div class="footer-wrapper">


       <footer class="custom-footer">
           <div class="footer-container">
               <!-- First Div: Logo and Summary -->
               <!-- <div class="footer-logo-summary">
                <img src="./assets/logo.png" alt="Logo" class="footer-logo" style="max-width: 100px;">
                <p class="footer-summary">
                    CONNECT 767 unites professionals and business leaders to drive growth.
                </p>
            </div> -->

               <div class="form-container">

                   <div class="form-box">
                   <form class="custom-contact-form">
                       <h4 class="footer-heading" style="text-align:center;">SUBSCRIBE TO OUR NEWSLETTER </h4>
                       <div class="custom-form-group">
                           <!-- <input type="text" id="name" name="name" placeholder="Name" required> -->
                           <input type="email" id="email" name="email" placeholder="Email" required>
                       </div>


                       <div class="button-container">
                           <button type="submit" class="custom-submit-btn">
                              Subscribe
                           </button>
                       </div>
                   </form>
               </div>
               </div>

               <!-- Second Div: Quick Links -->
               <div class="footer-quick-links">
                   <h4 class="footer-heading">QUICK LINKS</h4>
                   <ul class="footer-links-list">
                       <li><a href="{{route('index')}}">Home</a></li>


                       <li><a href="https://shop.connect767.com/">Shop</a></li>
                       <!-- <li><a href="{{route('services')}}">Services</a></li> -->
                       <!-- <li><a href="{{route('basketball')}}">Custom Uniforms</a></li> -->
                       <li><a href="{{route('services')}}#about">About Us</a></li>
                          <!--<li><a href="{{route('faqs')}}">FAQs</a></li>-->
                            <li><a href="{{route('help')}}#faqs">FAQs</a></li>

                   </ul>
               </div>

               <!-- Third Div: Our Services -->
               <div class="footer-services">
                   <h4 class="footer-heading">OUR SERVICES</h4>
                   <ul class="footer-links-list">
                       <li>
                           <a href="{{ route('services') }}#professional-networking">Professional Networking</a>
                       </li>
                       <li>
                           <a href="{{ route('services') }}#consulting-services">Consulting Services</a>
                        </li>
                       <li>
                           <a href="{{ route('services') }}#manufacturing-services">Manufacturing Services</a>
                        </li>
                       <li><a href="{{ route('services') }}#partnership-programs">Partnership Programs</a>
                        </li>
                   </ul>
               </div>

               <!-- Fourth Div: Information with Social Media Icons -->
               <div class="footer-info">
                   <h4 class="footer-heading">CONTACT US</h4>
                   <ul class="footer-info-list">
                       <!-- <li><i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;New York, NY, 10001</li> -->
                       <li>
                            <i class="fa-solid fa-envelope"></i> &nbsp;
                            <a href="mailto:info@connect767.com">info@connect767.com</a>
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i>&nbsp;&nbsp;
                            <a href="tel:8622532076">Phone: 862-253-2076</a>
                        </li>
                   </ul>
                   <!-- Social Media Icons with a Different Class Name -->
                   <!-- <div class="footer-social-media-icons">
                    <a href="https://www.facebook.com/connect767" target="_blank" class="social-icon"><img
                            src="./assets/fb.png" alt="Facebook" style="border-radius: 100%;"></a>
                    <a href="#" class="social-icon"><img src="./assets/twitter.png" alt="Twitter"
                            style="border-radius: 100%;"></a>
                    <a href="#" class="social-icon"><img src="./assets/youtube.png" alt="YouTube"
                            style="border-radius: 100%;"></a>
                    <a href="https://www.instagram.com/connect767llc/" target="_blank" class=" social-icon"><img
                            src="./assets/Instagram.webp" alt="Instagram" style="border-radius: 100%;"></a>
                </div> -->


                   <div class="footer-social-media-icons">
                       <a href="https://www.facebook.com/connect767" target="_blank" class="social-icon">
                           <img src="{{ asset('assets/fb.png') }}" alt="Facebook" style="border-radius: 100%;">
                       </a>

                       <a href="https://www.youtube.com/@connect7678" target="_blank" class="social-icon">
                           <img src="{{ asset('assets/youtube.png') }}" alt="YouTube" style="border-radius: 100%;">
                       </a>
                       <a href="https://www.instagram.com/connect767llc/" target="_blank" class="social-icon">
                           <img src="{{ asset('assets/Instagram.webp') }}" alt="Instagram" style="border-radius: 100%;">
                       </a>
                   </div>
               </div>
           </div>
       </footer>
   </div>

   <!-- Copyright Section -->
   <div class="footer-copyright">
       <p style="font-size:16px !important;">&copy; Copyright 2024 Connect767 All Rights Reserved</p>
   </div>


   <!-- // Read more page select stars script -->
   <script>
       document.querySelectorAll('.star-rating input').forEach(star => {
           star.addEventListener('change', function() {
               document.getElementById('review_stars').value = this
                   .value; // Store selected star rating value
           });
       });
   </script>



   <!-- Hamburger Script -->
   <script>
       function toggleMenu() {
           const navLinks = document.querySelector('.nav-links');
           navLinks.classList.toggle('active'); // Active class toggle karega
       }
   </script>


   </body>

   </html