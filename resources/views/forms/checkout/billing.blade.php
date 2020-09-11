<h6 class="checkout__title">Billing Details</h6>

<div class="row">

    <div class="col-lg-6">

        <div class="checkout__input">
            <p>Fist Name<span>*</span></p>
            <input type="text" name="first_name" value="{{ old('first_name') }}" required>
        </div>

    </div>

    <div class="col-lg-6">

        <div class="checkout__input">
            <p>Last Name<span>*</span></p>
            <input type="text" name="last_name" value="{{ old('last_name') }}" required>
        </div>

    </div>

</div>

<div class="checkout__input">

    <p>Address<span>*</span></p>
    <input type="text" placeholder="Street Address" class="checkout__input__add" name="address_line1" id="address_line1" value="{{ old('address_line1') }}" required>
    <input type="text" placeholder="Apartment, suite, unite ect (optional)" name="address_line2" id="address_line2" value="{{ old('address_line2') }}">

</div>

<div class="checkout__input">

    <p>Town/City<span>*</span></p>
    <input type="text" name="city" id="city" value="{{ old('city') }}" required>

</div>

<div class="checkout__input">

    <p>Country/State<span>*</span></p>
    <input type="text" name="state" id="state" value="{{ old('state') }}" required>

</div>

<div class="checkout__input">

    <p>Postcode / ZIP<span>*</span></p>
    <input type="text" name="zip" id="zip" value="{{ old('zip') }}" required>

</div>

<div class="row">

    <div class="col-lg-6">

        <div class="checkout__input">
            <p>Phone<span>*</span></p>
            <input type="text" name="phone" id="phone" value="{{ old('phone') }}" required>
        </div>

    </div>

    <div class="col-lg-6">

        <div class="checkout__input">
            <p>Email<span>*</span></p>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        </div>

    </div>

</div>
