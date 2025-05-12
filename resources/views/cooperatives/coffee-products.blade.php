@extends('layouts.admin')
@section('title', 'Coffee Products')

@section('content')
<div class="container mt-4">
    <h4>Coffee Products</h4>

    <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add Product</button>

    <table class="table table-bordered" id="dataTables-example" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Cooperative</th>
                <th>Harvest</th>
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
                <td>{{ $product->harvest->farmer->id ?? 'N/A' }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $product->id }}">Edit</button>
                    <form action="{{ route('coffee-products.destroy', $product) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            {{-- Edit Modal --}}
            <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('coffee-products.update', $product) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Edit Product</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" value="{{ $product->name ?? '' }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea name="description" class="form-control" required>{{ $product->description ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Price</label>
                                    <input type="number" step="0.01" name="price" value="{{ $product->price ?? '' }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" value="{{ $product->quantity ?? '' }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Cooperative</label>
                                    <select name="cooperative_id" class="form-select" required>
                                        <option value="">Select Cooperative</option>
                                        @foreach($cooperatives as $cooperative)
                                        <option value="{{ $cooperative->id }}" {{ isset($product) && $product->cooperative_id == $cooperative->id ? 'selected' : '' }}>
                                            {{ $cooperative->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>harvest</label>
                                    <select name="harvest_id" class="form-select" required>
                                        <option value="">Select harvest</option>
                                        @foreach($harvests as $harvest)
                                        <option value="{{ $harvest->id }}" {{ isset($product) && $product->harvest_id == $harvest->id ? 'selected' : '' }}>
                                            {{ $harvest->harvest_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

{{-- Add Modal --}}
<div class="modal fade" id="addProductModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('coffee-products.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Product</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Price</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Cooperative</label>
                        <select name="cooperative_id" class="form-select" required>
                            <option value="">Select Cooperative</option>
                            
                            @foreach($cooperatives as $cooperatives)
                            <option value="{{ $cooperatives->id }}">
                                {{ $cooperatives->name }}
                            </option>
                            @endforeach 

                        </select>
                    </div>
                    <div class="mb-3">
                        <label>harvest</label>
                        <select name="harvest_id" class="form-select" required>
                            <option value="">Select harvest</option>
                            @foreach($harvests as $harvest)
                            <option value="{{ $harvest->id }}">
                                {{ $harvest->harvest_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary">Add</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection