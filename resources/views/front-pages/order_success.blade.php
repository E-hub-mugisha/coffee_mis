@extends('layouts.app')

@section('title', 'Order Success')

@section('content')
<!-- Title Banner -->
<div class="title-banner py-4 bg-light border-bottom">
    <div class="container">
        <div class="text-center">
            <h1 class="color-primary">@yield('title')</h1>
        </div>
    </div>
</div>

<!-- Order Success Message -->
<div class="container text-center mt-5">
    <div class="alert alert-success shadow-sm py-4">
        <h2 class="mb-3">Order Placed Successfully!</h2>
        <p class="lead mb-4">Thank you for your purchase. Your coffee is on its way!</p>

        <div class="d-flex justify-content-center gap-3">
            <a href="#" class="btn btn-primary px-4">Home</a>
        </div>
    </div>
</div>
@endsection