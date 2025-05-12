@extends('layouts.buyer')
@section('title', 'Coffee Product Feedback')

@section('content')
<div class="container mt-4">
    <h3>Feedback</h3>
    <div class="table-responsive mt-3">
        <table class="table table-striped"  id="dataTables-example" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    <th>cooperative</th>
                    <th>Rating</th>
                    <th>Feedback</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($feedbacks as $feedback)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feedback->coffeeProduct->name }}</td>
                    <td>{{ $feedback->coffeeProduct->cooperative->name }}</td>
                    <td>
                        @for($i = 1; $i <= 5; $i++)
                        <span class="fa fa-star{{ $i <= $feedback->rating ? '' : '-o' }}"></span>
                        @endfor
                    </td>
                    <td>{{ $feedback->comment }}</td>
                    <td>{{ $feedback->created_at->format('d M Y') }}</td>
                    <td>
                        <form action="{{ route('buyer.feedback.delete', $feedback->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <h4 class="mt-4">Leave Feedback</h4>
    <p>We value your feedback! Please share your thoughts about our products.</p>
    <form action="{{ route('buyer.feedback.create') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product">Select Product</label>
            <select name="coffee_product_id" id="product" class="form-control" required>
                <option value="">Select a product</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="rating">Rating</label>
            <select name="rating" id="rating" class="form-control" required>
                <option value="">Select a rating</option>
                @for($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}">{{ $i }} Star{{ $i > 1 ? 's' : '' }}</option>
                @endfor
            </select>
        </div>
        <div class="form-group">
            <label>Feedback</label>
            <textarea name="comment" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Send</button>
    </form>
</div>
@endsection
