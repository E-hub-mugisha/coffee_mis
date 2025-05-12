@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0 rounded">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Complete Your Payment</h3>
                </div>

                <div class="card-body text-center">
                    <p class="fs-5 mb-4">Please confirm your payment to complete your order.</p>

                    <div class="mb-4">
                        <h4>Total Amount</h4>
                        <h2 class="text-success fw-bold">RWF {{ number_format($order->total_amount) }}</h2>
                    </div>

                    <button class="btn btn-lg btn-success px-5 py-2" onclick="makePayment()">
                        <i class="fa fa-credit-card"></i> Pay Now
                    </button>

                    <p class="mt-4 text-muted">Powered by Flutterwave</p>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://checkout.flutterwave.com/v3.js"></script>

<script>
    function makePayment() {
        FlutterwaveCheckout({
            public_key: "{{ env('FLW_PUBLIC_KEY') }}",
            tx_ref: "{{ $order->id . '-' . uniqid() }}",
            amount: {{ $order->total_amount }},
            currency: "RWF",
            payment_options: "card, mobilemoneyrwanda, ussd",
            customer: {
                email: "{{ auth()->user()->email }}",
                name: "{{ auth()->user()->name }}",
            },
            callback: function (data) {
                window.location.href = "/payment/callback?transaction_id=" + data.transaction_id + "&status=" + data.status + "&tx_ref=" + data.tx_ref;
            },
            onclose: function () {
                alert('Payment process was closed.');
            },
            customizations: {
                title: "CoffeeFarmMIS Payment",
                description: "Order Payment for Coffee",
                logo: "{{ asset('images/logo.png') }}",
            },
        });
    }
</script>
@endsection
