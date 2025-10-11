@extends('backend.layout.master')


@section('main-content')

    <style>
        /* Container for the form */
#payment-form {
    max-width: 700px;
    margin: 2rem auto;
    padding: 2rem;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Form headings */
#payment-form h2 {
    font-size: 1.8rem;
    margin-bottom: 1rem;
    color: #333;
    border-bottom: 2px solid #f0f0f0;
    padding-bottom: 0.5rem;
}

/* Labels */
#payment-form label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 600;
    color: #555;
}

/* Inputs */
#payment-form input[type="text"],
#payment-form input[type="email"],
#payment-form input[type="number"],
#payment-form input[type="checkbox"] {
    width: 100%;
    padding: 0.65rem 0.8rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 1rem;
    transition: border-color 0.3s, box-shadow 0.3s;
}

/* Checkbox styling */
#payment-form input[type="checkbox"] {
    width: auto;
    margin-right: 0.5rem;
}

/* Input focus effect */
#payment-form input:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.3);
    outline: none;
}

/* Button styling */
#payment-form button {
    display: inline-block;
    background: #007bff;
    color: #fff;
    font-weight: 600;
    padding: 0.75rem 1.5rem;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1rem;
    transition: background 0.3s, transform 0.2s;
}

/* Button hover */
#payment-form button:hover {
    background: #0056b3;
    transform: translateY(-2px);
}

/* Error messages */
.alert {
    background-color: #ffe6e6;
    color: #cc0000;
    border: 1px solid #cc0000;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 1rem;
}

/* Card element styling */
#card-element {
    padding: 0.65rem 0.8rem;
    border: 1px solid #ccc;
    border-radius: 8px;
    margin-bottom: 1rem;
}

/* Card error message */
#card-errors {
    color: #cc0000;
    margin-bottom: 1rem;
    font-weight: 500;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    #payment-form {
        padding: 1.5rem;
        margin: 1rem;
    }
}   
    </style>



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
<form id="payment-form" action="{{ route('custom-order.store') }}" method="POST">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
    </div>

    <div>
        <input type="checkbox" id="news-offers" name="news_offers" value="1" {{ old('news_offers') ? 'checked' : '' }}>
        <label for="news-offers">Email me with news and offers</label>
    </div>

    <div>
        <label>Country</label>
        <input type="text" name="country" value="{{ old('country') }}" class="form-control" required>
    </div>

    <div>
        <label>First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required>
    </div>

    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required>
    </div>

    <div>
        <label>Company</label>
        <input type="text" name="company" value="{{ old('company') }}" class="form-control">
    </div>

    <div>
        <label>Address</label>
        <input type="text" name="address" value="{{ old('address') }}" class="form-control" required>
    </div>

    <div>
        <label>Apartment</label>
        <input type="text" name="apartment" value="{{ old('apartment') }}" class="form-control">
    </div>

    <div>
        <label>City</label>
        <input type="text" name="city" value="{{ old('city') }}" class="form-control" required>
    </div>

    <div>
        <label>State</label>
        <input type="text" name="state" value="{{ old('state') }}" class="form-control" required>
    </div>

    <!-- Payment Section -->
    <h2>Payment</h2>
    <p>All transactions are secure and encrypted.</p>

    <div>
        <label for="account_holder_name">Account Holder Name</label>
        <!-- NOTE: single field name "account_holder_name" - use this name in controller too -->
        <input type="text" id="account_holder_name" name="account_holder_name" value="{{ old('account_holder_name') }}" class="form-control" required>
    </div>
{{-- <label for="amount">Amount</label> --}}
 <input type="hidden" name="total_amount" value="{{ $totalPrice }}">
    <!-- Single Card Element placeholder -->
     {{-- <div>
        <label>Card Number</label>
        <input type="text" id="card_number" class="form-control" placeholder="4242 4242 4242 4242" required>
    </div>

    <div>
        <label>Expiry Month</label>
        <input type="text" id="exp_month" class="form-control" placeholder="12" required>
    </div>

    <div>
        <label>Expiry Year</label>
        <input type="text" id="exp_year" class="form-control" placeholder="34" required>
    </div>

    <div>
        <label>CVC</label>
        <input type="text" id="cvc" class="form-control" placeholder="123" required>
    </div> --}}

    <!-- Hidden field for Stripe token -->
    {{-- <input type="hidden" name="stripeToken" id="stripeToken"> --}}
    <!-- rest of billing fields -->
    <div>
        <label>Zip Code</label>
        <input type="text" name="zip_code" value="{{ old('zip_code') }}" class="form-control">
    </div>

    <div>
        <label>Phone</label>
        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" required>
    </div>

    <div>
    <label>Billing Same</label>
    <input type="hidden" name="billing_same" value="0"> <!-- always submit -->
    <input type="checkbox" name="billing_same" value="1" {{ old('billing_same') ? 'checked' : '' }}>
</div>

    <div>
        <label>Billing First Name</label>
        <input type="text" name="billing_first_name" value="{{ old('billing_first_name') }}" class="form-control">
    </div>

    <div>
        <label>Billing Last Name</label>
        <input type="text" name="billing_last_name" value="{{ old('billing_last_name') }}" class="form-control">
    </div>

    <div>
        <label>Billing Company</label>
        <input type="text" name="billing_company" value="{{ old('billing_company') }}" class="form-control">
    </div>

    <div>
        <label>Billing Address</label>
        <input type="text" name="billing_address" value="{{ old('billing_address') }}" class="form-control">
    </div>

    <div>
        <label>Billing Apartment</label>
        <input type="text" name="billing_apartment" value="{{ old('billing_apartment') }}" class="form-control">
    </div>

    <div>
        <label>Billing City</label>
        <input type="text" name="billing_city" value="{{ old('billing_city') }}" class="form-control">
    </div>

    <div>
        <label>Billing State</label>
        <input type="text" name="billing_state" value="{{ old('billing_state') }}" class="form-control">
    </div>

    <div>
        <label>Billing Zip</label>
        <input type="text" name="billing_zip" value="{{ old('billing_zip') }}" class="form-control">
    </div>

    <div>
        <label>Billing Phone</label>
        <input type="text" name="billing_phone" value="{{ old('billing_phone') }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
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
    {{-- <script src="https://js.stripe.com/v3/"></script> --}}
    
{{-- <script>
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
    </script> --}}

    <script src="https://js.stripe.com/v3/"></script>
<!-- include stripe.js -->
<script src="https://js.stripe.com/v3/"></script>

<script>
    // Replace with your publishable key from .env
    const stripe = Stripe("{{ env('STRIPE_KEY') }}");
    const elements = stripe.elements();

    const style = {
        base: {
            fontSize: '16px',
            color: '#32325d',
            '::placeholder': { color: '#aab7c4' },
        }
    };

    // create & mount single card element
    const card = elements.create('card', { style: style });
    card.mount('#card-element');

    // display realtime errors
    card.on('change', function(event) {
        const displayError = document.getElementById('card-errors');
        displayError.textContent = event.error ? event.error.message : '';
    });

    // handle form submit -> create token -> append hidden input -> submit
    const form = document.getElementById('payment-form');
    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        // optional: disable submit button here to prevent double submit

        const accountHolderName = document.getElementById('account_holder_name').value || '';
        const { token, error } = await stripe.createToken(card, {
            name: accountHolderName
        });

        if (error) {
            // show error and re-enable submit if disabled
            document.getElementById('card-errors').textContent = error.message;
        } else {
            // append token to form and submit
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            form.submit();
        }
    });
</script>


@endsection
