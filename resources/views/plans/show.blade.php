@extends('layouts.app')
@section('content')
@if( !Auth::user()->subscriptions()->active()->count() >= 1 )
<div class="login login-v1 ">
<div class=" login-container">       
            <div class="login-header">
                <div class="brand">
                <div class="d-flex align-items-center">
                    <span class="logo"></span> <b>Color</b> Admin
                    </div>
                    <small>You will be charged ${{ number_format($plan->cost, 2) }} for {{ $plan->name }} Plan</small>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>
            </div>
            <div class="card login-body">
                <div class="stripe-content fs-13px">
                    <form action="{{ route('subscription.create') }}" method="post" id="payment-form">
                        @csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" name="plan" value="{{ $plan->id }}" />
                            </div>
                        </div>
                        <div class="card-footer">
                        <button
                        id="card-button"
                        class="btn btn-dark"
                        type="submit"
                        data-secret="{{ $intent->client_secret }}"
                        > Pay </button>
                        </div>
                    </form>
                </div>
    </div>
</div>
</div>
@endsection
@push('scripts')
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: 'white',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
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

    const stripe = Stripe('{{ env("STRIPE_KEY") }}', { locale: 'en' }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
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

        stripe
            .handleCardSetup(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    // Send the token to your server.
                    stripeTokenHandler(result.setupIntent.payment_method);
                }
            });
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(paymentMethod) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'paymentMethod');
        hiddenInput.setAttribute('value', paymentMethod);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>
@endpush
@else
    <p>You already Subscribed! Your subscription ends at {{ auth()->user()->subscription($plan->slug)->trial_ends_at }} </p>
    <a href="{{ route('courses.choose') }}">Go to your dashboard</a>

@endif
