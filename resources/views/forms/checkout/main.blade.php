<form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
    @csrf

    @include('forms.checkout.billing')

    @include('forms.checkout.payment')

    <button type="submit" class="site-btn btn-block" id="complete-order">PLACE ORDER</button>
</form>
