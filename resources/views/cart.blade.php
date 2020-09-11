@extends('layouts.app')

@section('title', '| Shopping Cart')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Shopping Cart</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('shop.index') }}">Shop</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @include('components.alert.success')
                    @include('components.alert.errors')

                    <div class="shopping__cart__table">
                        <table>
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(Cart::count() > 0)

                                    @foreach(Cart::content() as $item)
                                        <tr>
                                            <td class="product__cart__item">
                                                <div class="product__cart__item__pic">
                                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                                        <img src="{{ asset('img/shopping-cart/cart-1.jpg') }}" alt="">
                                                    </a>
                                                </div>
                                                <div class="product__cart__item__text">
                                                    <a href="{{ route('shop.show', $item->model->slug) }}">
                                                        <h6>{{ $item->model->name }}</h6>
                                                    </a>
                                                    <h6>{{ $item->model->priceFormat() }}</h6>
                                                    @include('forms.cart.move-to-wishlist')
                                                </div>
                                            </td>
                                            <td class="quantity__item">
                                                <select name="" id="" class="qty custom-select custom-select-sm w-50" data-id="{{ $item->rowId }}">
                                                    @for($i = 1; $i < 10 + 1; $i++)
                                                        <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                                    @endfor
                                                </select>
                                            </td>
                                            <td class="cart__price">LKR {{ $item->subtotal() }}</td>
                                            <td>
                                                @include('forms.cart.destroy')
                                            </td>
                                        </tr>
                                    @endforeach

                                @else

                                    <tr>
                                       <td colspan="5" class="text-center">
                                           No Item(s) in Shopping Cart!
                                           <div class="continue__btn btn-sm mt-2">
                                               <a href="{{ route('shop.index') }}">Shop Now</a>
                                           </div>
                                       </td>
                                    </tr>

                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            @if(Cart::count() != 0)
                                <div class="continue__btn">
                                    <a href="{{ route('shop.index') }}">Continue Shopping</a>
                                </div>
                            @endif
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 text-right">
                            <small>{{ Cart::count() }} Item(s) in shopping cart.</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart__total">
                        <h6>Cart total</h6>
                        <ul>
                            <li>Subtotal <span>LKR {{ Cart::subtotal() }}</span></li>
                            <li>Tax (24%) <span>LKR {{ Cart::tax() }}</span></li>
                            <li>Total <span>LKR {{ Cart::total() }}</span></li>
                        </ul>
                        <a href="{{ route('checkout.index') }}" class="primary-btn">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

@endsection

@push('extra-js')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>

        (function () {

            const classname = document.querySelectorAll('.qty')

            Array.from(classname).forEach(function (element) {
                element.addEventListener('change', function() {
                    const id = element.getAttribute('data-id')
                    axios.patch(`/cart/${id}`, {
                        quantity: this.value,
                        //productQuantity: productQuantity
                    })
                        .then(function (response) {
                            // console.log(response);
                            window.location.href = '{{ route('cart.index') }}'
                        })
                        .catch(function (error) {
                            // console.log(error);
                            window.location.href = '{{ route('cart.index') }}'
                        });
                })
            })

        })();
    </script>

@endpush
