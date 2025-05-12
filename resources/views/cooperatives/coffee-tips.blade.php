@extends('layouts.admin')
@section('title', 'Coffee Tips')

@section('content')
<div class="container mt-4">
    <h4>Coffee Tips</h4>

    <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#addTipModal">Add Tips</button>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <table class="table table-bordered" id="dataTables-example" width="100%">
        <thead>
            <tr>
                <th>title</th>
                <th>content</th>
                <th>season</th>
                <th>category</th>
                <th>Image</th>
                <th>User</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tips as $tip)
            <tr>
                <td>{{ $tip->title }}</td>
                <td>{{ Str::limit($tip->content, 30) }}</td>
                <td>{{ $tip->season }}</td>
                <td>{{ $tip->category }}</td>
                <td>
                    @if($tip->image)
                    <img src="{{ asset('image/coffee-tips/' . $tip->image) }}" width="60" alt="Tip Image">
                    @else
                    N/A
                    @endif
                </td>
                <td>{{ $tip->user->name ?? 'N/A' }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $tip->id }}">Edit</button>
                    <form action="{{ route('coop.coffee-tips.destroy', $tip ) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            {{-- Edit Modal --}}
            <div class="modal fade" id="editModal{{ $tip->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <form action="{{ route('coop.coffee-tips.update', $tip) }}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Edit tip</h5>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>title</label>
                                    <input type="text" name="title" value="{{ $tip->title ?? '' }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>content</label>
                                    <textarea name="content" class="form-control" required>{{ $tip->content ?? '' }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label>season</label>
                                    <input type="text" name="season" value="{{ $tip->season ?? '' }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>category</label>
                                    <input type="text" name="category" value="{{ $tip->category ?? '' }}" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Image</label>
                                    <input type="file" name="image" class="form-control" required>
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
<div class="modal fade" id="addTipModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('coop.coffee-tips.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Add New Tip</h5>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label>title</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>content</label>
                        <textarea name="content" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label>season</label>
                        <input type="text" name="season" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>category</label>
                        <input type="text" name="category" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" required>
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