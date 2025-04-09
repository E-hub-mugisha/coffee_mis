@extends('layouts.app')

@section('content')
<div class="container text-center mt-5">
    <h2 class="text-success">🎉 Order Placed Successfully!</h2>
    <p>Thank you for your purchase. Your coffee is on its way! ☕</p>
    <a href="{{ route('invoice.download', $order->id) }}" class="cus-btn primary">Download Invoice PDF</a>

    <a href="{{ route('home') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>
@endsection
