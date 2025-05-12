@extends('layouts.buyer')
@section('title', 'My Orders')

@section('content')
<div class="container mt-4">
    <h3>Recent Orders</h3>
    <table class="table table-striped mt-3"  id="dataTables-example" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Track</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>#{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d M Y') }}</td>
                <td>RWF {{ number_format($order->total_amount) }}</td>
                <td>{{ ucfirst($order->payment_status) }}</td>
                <td><a href="{{ route('buyer.tracking', $order->id) }}" class="btn btn-sm btn-outline-primary">Track</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
