@extends('layouts.app')

@section('content')

    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-offset-3">
                    <div class="block text-center">
                        <i class="fa fa-check-circle fa-5x text-success"></i>
                        <h2 class="text-center">Thank you! For your order.</h2>
                        <br>
                        <p>A Confirmation email was sent.</p>
                        <br>
                        <a href="{{ route('shop.index') }}" class="site-btn">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
