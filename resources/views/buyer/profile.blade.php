@extends('layouts.buyer')
@section('title', 'My Profile')

@section('content')
<div class="container mt-4">
    <h4>Account Details</h4>
    <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
</div>
@endsection
