@extends('layouts.app')

@section('title', '| Checkout')

@push('extra-css')

    <style>
        /**
 * The CSS shown here will not be introduced in the Quickstart guide, but shows
 * how you can use CSS to style your Element's container.
 */
        .StripeElement {
            height: 50px;
            width: 100%;
            border: 1px solid #e1e1e1;
            color: #b7b7b7;
            padding: 15px 12px;
            margin-bottom: 20px;
            background-color: white;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('shop.index') }}">Shop</a>
                            <span>Check Out</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        @include('components.alert.success')
                        @include('components.alert.errors')
                        @include('forms.checkout.main')
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="checkout__order">
                            <h4 class="order__title">Your order</h4>
                            <div class="checkout__order__products">Product <span>Total</span></div>
                            <ul class="checkout__total__products">
                                @php $i = 1 @endphp
                                @foreach(Cart::content() as $item)
                                    <li>{{ $i }}. {{ $item->model->name }} ({{ $item->qty }}) <span>{{ $item->model->priceFormat() }}</span></li>
                                    @php $i++ @endphp
                                @endforeach
                            </ul>
                            <ul class="checkout__total__all">
                                <li>Subtotal <span>LKR {{ Cart::subtotal() }}</span></li>
                                @if(session()->has('coupon'))
                                    <li class="text-success">Discount ({{ session()->get('coupon')['name'] }}) @include('forms.checkout.coupon-remove') <span class="text-success">- LKR {{ number_format($discount, 2) }}</span></li>
                                    <li>New Subtotal<span>LKR {{ number_format($newSubTotal, 2) }}</span></li>
                                    <hr>
                                @endif
                                <li>Tax (24%) <span>+ LKR {{ number_format($newTax, 2) }}</span></li>
                                <hr>
                                <li>Total <span>LKR {{ number_format($newTotal, 2) }}</span></li>
                            </ul>
                            <div class="cart__discount">
                                <h6>Have a Coupon Code?</h6>
                                @include('forms.checkout.coupon')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

@endsection

@push('extra-js')

    <script>
        (function () {

            // Create a Stripe client.
            var stripe = Stripe('{{ config('services.stripe.publishable') }}');

            // Create an instance of Elements.
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    fontFamily: '"Nunito Sans", sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };

            // Create an instance of the card Element.
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>.
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });

            // Handle form submission.
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();

                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;

                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address_line1').value,
                    address_line2: document.getElementById('address_line2').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('state').value,
                    address_zip: document.getElementById('zip').value,
                }

                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        // Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            });

            // Submit the form with the token ID.
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);

                // Submit the form
                form.submit();
            }

        })();
    </script>

@endpush
