@extends('layouts.app')

@section('title', '| Wishlist')

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Wishlist</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <a href="{{ route('cart.index') }}">Shopping Cart</a>
                            <span>Wishlist</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="shopping-cart spad">

        <div class="container">

            <div class="row bg-light p-3">

                <div class="col-lg-12">

                    <div class="shopping__cart__table">

                        @if(Cart::instance('wishlist')->count() > 0)

                            <h5 class="font-weight-bold">{{ Cart::instance('wishlist')->count() }} Item(s) Saved For Later</h5>

                            <br>

                            <table>
                                <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(Cart::instance('wishlist')->content() as $item)
                                    <tr>
                                        <td class="product__cart__item" style="width: 50%">
                                            <div class="product__cart__item__pic">
                                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                                    <img src="{{ asset('img/shopping-cart/cart-1.jpg') }}" alt="">
                                                </a>
                                            </div>
                                            <div class="product__cart__item__text">
                                                <a href="{{ route('shop.show', $item->model->slug) }}">
                                                    <h6>{{ $item->model->name }}</h6>
                                                </a>
                                                <small>{{ $item->model->details }}</small>
                                            </div>
                                        </td>
                                        <td class="cart__price" style="width: 10%">{{ $item->model->priceFormat() }}</td>
                                        <td style="width: 15%">
                                    <div class="list-inline">
                                        @include('forms.wishlist.destroy')
                                        @include('forms.wishlist.move-to-cart')
                                    </div>
                                </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                    @else
                        <div class="text-center">
                            <br>
                            No Item(s) in Wishlist!
                            <div class="continue__btn btn-sm mt-2">
                                <a href="{{ route('shop.index') }}">Shop Now</a>
                            </div>
                        </div>
                    @endif

                    </div>

                </div>

        </div>

    </section>

@endsection
