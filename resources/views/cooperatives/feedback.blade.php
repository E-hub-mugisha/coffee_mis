@extends('layouts.admin')
@section('title', 'Coffee Product Feedback')

@section('content')
<div class="container mt-4">
    <h3>Feedback</h3>
    <div class="table-responsive mt-3">
        <table class="table table-striped" id="dataTables-example" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
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
</div>
@endsection
