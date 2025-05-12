@extends('layouts.buyer')
@section('title', 'Coffee Products')

@section('content')
<div class="container mt-4">
    <h4>Coffee Products</h4>


    <table class="table table-bordered"  id="dataTables-example" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Cooperative</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ Str::limit($product->description, 30) }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->cooperative->name ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('coffee.product.show', $product->id )}}" class="btn btn-sm btn-warning" target="_blank">Order product</button>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
  

</div>

@endsection