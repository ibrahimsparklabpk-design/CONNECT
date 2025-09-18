@extends('backend.layout.master')
@section('main-content')

<!-- Navbar Ends -->



<!-- Main Section Starts-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form id="payment-form" action="{{ route('order.store') }}" method="POST">
    @csrf

    <!-- Contact Section -->
    <h2>Contact</h2>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <div>
        <input type="checkbox" id="news_offers" name="news_offers" value="1">
        <label for="news_offers">Email me with news and offers</label>
    </div>

    <!-- Delivery Section -->
    <h2>Delivery</h2>

    <label for="country">Country</label>
    <select id="country" name="country" required>
        <option value="united states">United States</option>
        <option value="canada">Canada</option>
        <option value="mexico">Mexico</option>
        <option value="other">Other</option>
    </select>

    <div class="name-fields">
        <div class="field">
            <label for="first_name">First name</label>
            <input type="text" id="first_name" name="first_name" required>
        </div>

        <div class="field">
            <label for="last_name">Last name</label>
            <input type="text" id="last_name" name="last_name" required>
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
            <label for="zip_code">ZIP code</label>
            <input type="text" id="zip_code" name="zip_code" required>
        </div>
    </div>

    <label for="phone">Phone</label>
    <input type="tel" id="phone" name="phone" required>

    <!-- Payment Section -->
    <h2>Payment</h2>
    <p>All transactions are secure and encrypted.</p>

    <label for="account_holder_name">Account Holder Name</label>
    <input type="text" id="account_holder_name" name="account_holder_name" required>

    <!-- Card Element for Stripe -->
    <label for="card-element">Credit Card / Debit Card</label>
    <div id="card-element"></div> <!-- Stripe will insert the card input here -->


    <div id="card-errors" role="alert"></div>

    <div>
        <input type="checkbox" id="billing_same" name="billing_same" value="1" checked>
        <label for="billing_same">Use shipping address as billing address</label>
    </div>

    <!-- Billing Address Section -->
    <h2>Billing Address</h2>

    <div class="name-fields">
        <div class="field">
            <label for="billing_first_name">First name</label>
            <input type="text" id="billing_first_name" name="billing_first_name">
        </div>

        <div class="field">
            <label for="billing_last_name">Last name</label>
            <input type="text" id="billing_last_name" name="billing_last_name">
        </div>
    </div>

    <label for="billing_company">Company (optional)</label>
    <input type="text" id="billing_company" name="billing_company">

    <label for="billing_address">Address</label>
    <input type="text" id="billing_address" name="billing_address">

    <label for="billing_apartment">Apartment, suite, etc. (optional)</label>
    <input type="text" id="billing_apartment" name="billing_apartment">

    <div class="location-fields">
        <div class="field">
            <label for="billing_city">City</label>
            <input type="text" id="billing_city" name="billing_city">
        </div>

        <div class="field">
            <label for="billing_state">State</label>
            <input type="text" id="billing_state" name="billing_state">
        </div>

        <div class="field">
            <label for="billing_zip">ZIP code</label>
            <input type="text" id="billing_zip" name="billing_zip">
        </div>
    </div>

    <label for="billing_phone">Phone (optional)</label>
    <input type="tel" id="billing_phone" name="billing_phone">

    <!-- Save Info -->
    <div>
        <input type="checkbox" id="save_info" name="save_info" value="1">
        <label for="save_info">Save my information for a faster checkout</label>
    </div>

    <!-- Submit Button -->
    <button type="submit">Pay now</button>
</form>


<!-- Include Stripe.js -->
{{-- <script src="https://js.stripe.com/v3/"></script> --}}









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
                    <a href="#"><i class="fa-solid fa-angles-right"
                            style="font-size: 12px">&nbsp;</i>Professional
                        Networking</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right"
                            style="font-size: 12px">&nbsp;</i>Consulting
                        Services</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right" style="font-size: 12px">&nbsp;</i>Workshops
                        &
                        Events</a>
                </li>
                <li>
                    <a href="#"><i class="fa-solid fa-angles-right"
                            style="font-size: 12px">&nbsp;</i>Partnership
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

@endsection
