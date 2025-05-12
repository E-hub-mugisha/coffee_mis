@extends('layouts.buyer')
@section('title', 'Track Order')

@section('content')
<div class="container mt-4">
    <h4>Tracking Order #{{ $order->id }}</h4>
    <p>Status: <strong>{{ ucfirst($order->delivery_status ?? 'Pending') }}</strong></p>
</div>
@endsection
