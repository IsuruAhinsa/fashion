<br>

<h6 class="checkout__title">Payment Details</h6>

<div class="checkout__input">
    <p>Name on Card<span>*</span></p>
    <label for="name_on_card" class="d-none">Name on Card</label>
    <input type="text" placeholder="Name on Card" class="checkout__input__add" name="name_on_card" id="name_on_card">
</div>

<div class="checkout__input">

    <label for="card-element">
        Credit or Debit card
    </label>

    <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
    </div>

    <!-- Used to display form errors. -->
    <div id="card-errors" role="alert"></div>

</div>
