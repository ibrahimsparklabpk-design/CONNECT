<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout</title>
    <link rel="stylesheet" href="assets/customizable/checkout.css">

    <link rel="icon" type="image/png" href="./assets/logo.png" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />




    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Assistant:wght@200..800&display=swap" rel="stylesheet">




    <!-- for strip -->
    <script src="https://js.stripe.com/v3/"></script>





</head>

<!-- Navbar starts -->

<nav class="navbar">
    <!-- Logo Section -->
    <div class="logo">
        <img src="./assets/logo.png" alt="Logo" />
    </div>

    <!-- Navigation Links -->
    <ul class="nav-links">
        <li><a href="{{route('index')}}">HOME</a></li>
        <li><a href="{{route('directoryadd')}}">DIRECTORY</a></li>
        <li><a href="https://shop.connect767.com/" target="_blank">SHOP</a></li>
        <li><a href="{{route('basketball')}}">CUSTOMIZABLE UNIFORMS</a></li>
    </ul>

    <!-- Check if user is logged in -->
    @if(session('user'))
    <!-- Profile Dropdown Button -->
    <div class="dropdown">
        <button class="profile-btn">Profile &#9662;</button>
        <ul class="dropdown-content">
            <!-- Check user role to show appropriate dashboard link -->
            @if(session('role') === 'admin')
            <li><a href="{{ route('admin_dashboard') }}">Admin Dashboard</a></li>
            @else
            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
            @endif
            <li><a href="{{ route('logout') }}">Logout</a></li>
        </ul>
    </div>
    @else
    <!-- Login Button -->
    <button class="login-btn">
        <a style="color:white" href="{{route('login')}}">Login</a> /
        <a style="color:white" href="{{ route('register') }}">Register</a>
    </button>
    @endif
</nav>

<!-- Navbar Ends -->



<!-- Main Section Starts-->

<form id="payment-form" action="{{ route('create-payment-intent') }}" method="POST">
    @csrf
    <!-- Contact Section -->
    <h2>Contact</h2>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <div>
        <input type="checkbox" id="news-offers" name="news-offers">
        <label for="news-offers">Email me with news and offers</label>
    </div>

    <!-- Delivery Section -->
    <h2>Delivery</h2>

    <!-- Shipping Address Section -->
    <label for="country">Country</label>
    <select id="country" name="country" required>
        <option value="united states">United States</option>
        <option value="canada">Canada</option>
        <option value="mexico">Mexico</option>
        <option value="other">Other</option>
    </select>

    <div class="name-fields">
        <div class="field">
            <label for="first-name">First name</label>
            <input type="text" id="first-name" name="first-name" required>
        </div>

        <div class="field">
            <label for="last-name">Last name</label>
            <input type="text" id="last-name" name="last-name" required>
        </div>
    </div>

    <label for="company">Company (optional)</label>
    <input type="text" id="company" name="company">

    <label for="address">Address</label>
    <input type="text" id="address" name="address" required>

    <label for="apartment">Apartment, suite, etc. (optional)</label>
    <input type="text" id="apartment" name="apartment">

    <div class="location-fields">
        <div class="field">
            <label for="city">City</label>
            <input type="text" id="city" name="city" required>
        </div>

        <div class="field">
            <label for="state">State</label>
            <input type="text" id="state" name="state" required>
        </div>

        <div class="field">
            <label for="zip">ZIP code</label>
            <input type="text" id="zip" name="zip-code" required>
        </div>
    </div>

    <label for="phone">Phone</label>
    <input type="tel" id="phone" name="phone" required>

    <!-- Payment Section -->
    <h2>Payment</h2>
    <p>All transactions are secure and encrypted.</p>

    <!-- Account Holder Name -->
    <label for="Account-Holder-Name">Account Holder Name</label>
    <input type="text" id="Account-Holder-Name" name="Account-Holder-Name" placeholder="" required>

    <!-- Card Element for Stripe -->
    <label for="card-element">Credit Card / Debit Card</label>
    <div id="card-element"></div> <!-- Stripe will insert the card input here -->

    <!-- Error Message -->
    <div id="card-errors" role="alert"></div>

    <div>
        <input type="checkbox" id="Billing address same as Delivery address " name="billing-same" checked>
        <label for="billing-same">Use shipping address as billing address</label>
    </div>

    <!-- Billing Address Section -->
    <h2>Billing Address</h2>
    <div class="name-fields">
        <div class="field">
            <label for="billing-first-name">First name</label>
            <input type="text" id="billing-first-name" name="billing-first-name" required>
        </div>

        <div class="field">
            <label for="billing-last-name">Last name</label>
            <input type="text" id="billing-last-name" name="billing-last-name" required>
        </div>
    </div>

    <label for="billing-company">Company (optional)</label>
    <input type="text" id="billing-company" name="billing-company">

    <label for="billing-address">Address</label>
    <input type="text" id="billing-address" name="billing-address" required>

    <label for="billing-apartment">Apartment, suite, etc. (optional)</label>
    <input type="text" id="billing-apartment" name="billing-apartment">

    <div class="location-fields">
        <div class="field">
            <label for="billing-city">City</label>
            <input type="text" id="billing-city" name="billing-city" required>
        </div>

        <div class="field">
            <label for="billing-state">State</label>
            <input type="text" id="billing-state" name="billing-state" required>
        </div>

        <div class="field">
            <label for="billing-zip">ZIP code</label>
            <input type="text" id="billing-zip" name="billing-zip" required>
        </div>
    </div>

    <label for="billing-phone">Phone (optional)</label>
    <input type="tel" id="billing-phone" name="billing-phone">

    <!-- Save Info Section -->
    <div>
        <input type="checkbox" id="save-info" name="save-info">
        <label for="save-info">Save my information for a faster checkout</label>
    </div>

    <!-- Submit Button -->
    <button type="submit">Pay now</button>
</form>

<!-- Include Stripe.js -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe("{{ env('STRIPE_KEY') }}");
    var elements = stripe.elements();
    var cardElement = elements.create('card');
    cardElement.mount('#card-element');

    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        document.querySelector('button').disabled = true;

        // Backend ko call karte hain taake PaymentIntent ban jaye
        fetch("{{ route('create-payment-intent') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    email: document.querySelector('#email').value,
                    country: document.querySelector('#country').value,
                    first_name: document.querySelector('#first-name').value,
                    last_name: document.querySelector('#last-name').value,
                    company: document.querySelector('#company').value,


                    address: document.querySelector('#address').value,
                    apartment: document.querySelector('#apartment').value,
                    city: document.querySelector('#city').value,
                    state: document.querySelector('#state').value,
                    zip: document.querySelector('#zip').value,
                    phone: document.querySelector('#phone').value,
                    Account_Holder_Name: document.querySelector('#Account-Holder-Name').value,
                    billing_first_name: document.querySelector('#billing-first-name').value,
                    billing_last_name: document.querySelector('#billing-last-name').value,
                    billing_company: document.querySelector('#billing-company').value,
                    billing_address: document.querySelector('#billing-address').value,
                    billing_apartment: document.querySelector('#billing-apartment').value,
                    billing_city: document.querySelector('#billing-city').value,
                    billing_state: document.querySelector('#billing-state').value,
                    billing_zip: document.querySelector('#billing-zip').value,
                    billing_phone: document.querySelector('#billing-phone').value,

                })
            })
            .then(response => response.json())
            .then(data => {
                return stripe.confirmCardPayment(data.client_secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: document.querySelector('#Account-Holder-Name').value
                        }
                    }
                });
            })
            .then(function(result) {
                if (result.error) {
                    console.log(result.error.message);
                    alert("Payment failed: " + result.error.message);
                } else {
                    if (result.paymentIntent.status === 'succeeded') {
                        alert('Your payment has been successfully processed. Thank you for your purchase!');

                        // Jab payment success ho jaaye, backend ko data bhejte hain taake database mai store ho
                        fetch("{{ route('store-custom-product') }}", {
                                method: "POST",
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                                },
                                body: JSON.stringify({})
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    alert('Product successfully stored!');
                                } else {
                                    alert('Failed to store product: ' + data.error);
                                    console.error(data.error);
                                }
                            })
                            .catch(error => {
                                console.error("Error storing product:", error);
                            });
                    }
                }
            })
            .catch(function(error) {
                console.error("Error:", error);
                alert("Something went wrong: " + error.message);
            })
            .finally(function() {
                document.querySelector('button').disabled = false;
            });
    });
</script>








<!--end  javascript for payment -->


<!-- Main Section Ends-->








<!-- FOOTER STARTS FORM HERE -->

<footer class="custom-footer">
    <div class="footer-container">
        <!-- First Div: Logo and Summary -->
        <div class="footer-logo-summary">
            <img src="./assets/logo.png" alt="Logo" class="footer-logo" style="max-width: 100px" />
            <p class="footer-summary">
                CONNECT 767 unites professionals and business leaders to drive
                growth.
            </p>
        </div>

        <!-- Second Div: Quick Links -->
        <div class="footer-quick-links">
            <h4 class="footer-heading">Quick Links</h4>
            <ul class="footer-links-list">
                <li><a href="#">HOME</a></li>
                <li><a href="#">DIRECTORY</a></li>
                <li><a href="#">SHOP</a></li>
                <li><a href="#">CUSTOMIZABLE UNIFORMS</a></li>
            </ul>
        </div>

        <!-- Third Div: Our Services -->
        <div class="footer-services">
            <h4 class="footer-heading">Our Services</h4>
            <ul class="footer-links-list">
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Professional
                        Networking</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Consulting
                        Services</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Workshops &
                        Events</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Partnership
                        Programs</a>
                </li>
            </ul>
        </div>

        <!-- Fourth Div: Information with Social Media Icons -->
        <div class="footer-info">
            <h4 class="footer-heading">Information</h4>
            <ul class="footer-info-list">
                <li>
                    <i class="fa-solid fa-location-dot"></i>&nbsp;&nbsp;New York, NY,
                    10001
                </li>
                <li>
                    <i class="fa-solid fa-envelope"></i> &nbsp;<a
                        href="mailto:info@connect767.com">info@connect767.com</a>
                </li>
                <li>
                    <i class="fa-solid fa-phone"></i>&nbsp;&nbsp;Phone: 862-253-2076
                </li>
            </ul>
            <!-- Social Media Icons with a Different Class Name -->
            <div class="footer-social-media-icons">
                <a href="#" class="social-icon"><img src="./assets/fb.png" alt="Facebook"
                        style="border-radius: 100%" /></a>
                <a href="#" class="social-icon"><img src="./assets/twitter.png" alt="Twitter"
                        style="border-radius: 100%" /></a>
                <a href="#" class="social-icon"><img src="./assets/youtube.png" alt="YouTube"
                        style="border-radius: 100%" /></a>
                <a href="#" class="social-icon"><img src="./assets/Instagram.webp" alt="Instagram"
                        style="border-radius: 100%" /></a>
            </div>
        </div>
    </div>
</footer>

<!-- Copyright Section -->
<div class="footer-copyright">
    <p>&copy; Copyright 2024 NY Creative Studio All Rights Reserved</p>
</div>

<!-- FOOTER ENDS HERE -->





</body>

</html>