@extends('layouts.app')

@section('title', 'Purchase Cart')

@section('content')

<div class="title-banner">
    <div class="container-fluid">
        <img class="title-cup-img" src="assets/media/banner/title-img-1.png" alt="">
        <div class="title-text">
            <h1 class="color-primary">Product Cart</h1>
        </div>
    </div>
</div>

<!-- Customer Container Start -->
<div class="customer-container py-40">
    <div class="container-fluid">
        <div class="customer-wrapper">
            <div class="title-box">
                <h6 class="dark-gray fw-500">
                    Returning Coffee Product?
                    <a href="{{ route('coffee.products') }}" class="color-ter text-decoration-underline signin-button">Click here to Purchase More</a>
                </h6>
            </div>
        </div>
    </div>
</div>
<!-- Customer Container End -->

<!-- Billing Details Start -->
<section class="billing-detail pb-80">
    <div class="container-fluid">
        <div class="row row-gap-4">
            <div class="col-xl-8">
                <div class="title-row title-row-2 mb-16">
                    <h5 class="color-primary fw-700 mb-24">Coffee Order Summary</h5>
                </div>

                <div class="summary-container">
                    @if($cartItems->count())
                        @php
                            $subtotal = $cartItems->sum(fn($item) => $item->coffeeProduct->price * $item->quantity);
                        @endphp

                        @foreach($cartItems as $cartItem)
                            <div class="item-container mb-24">
                                <div class="left-box d-flex align-items-center gap-16">
                                    <div class="icon-box">
                                        <img src="{{ asset('front-pages/assets/media/images/item-1.png') }}" alt="{{ $cartItem->coffeeProduct->name }}">
                                    </div>
                                    <div>
                                        <a href="{{ route('coffee.product.show', $cartItem->coffeeProduct->id) }}" class="h6 fw-600 dark-gray">
                                            {{ $cartItem->coffeeProduct->name }}
                                        </a>
                                        <p class="small text-muted mb-0">Qty: {{ $cartItem->quantity }}</p>
                                    </div>
                                </div>

                                <div class="right-box d-flex align-items-center gap-3">
                                    <h6 class="fw-600 color-primary mb-0">${{ number_format($cartItem->coffeeProduct->price, 2) }}</h6>

                                    <!-- Remove from cart -->
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                            <div class="hr-line line-2 mb-24"></div>
                        @endforeach

                        <div class="d-flex align-items-center justify-content-between mb-24">
                            <h6 class="color-ter fw-700">Subtotal</h6>
                            <h6 class="color-primary fw-600">${{ number_format($subtotal, 2) }}</h6>
                        </div>

                        <div class="hr-line line-2 mb-24"></div>

                        <p class="light-gray mb-16">
                            Your personal data will be used to process your order, support your experience throughout this website,
                            and for other purposes described in our <span class="color-ter">privacy policy.</span>
                        </p>

                        <div class="col-md-12">
                            <div class="cus-checkBox mb-32">
                                <input type="checkbox" id="terms" required>
                                <label for="terms" class="text">I have read and agree to the website terms and conditions.</label>
                            </div>
                        </div>

                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf
                            <button type="submit" class="cus-btn primary">
                                <span class="text">Place Order</span>
                            </button>
                        </form>

                    @else
                        <div class="alert alert-warning">Your cart is currently empty.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Billing Details End -->

@endsection
