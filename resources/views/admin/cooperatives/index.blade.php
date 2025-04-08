@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Cooperatives</h1>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCooperativeModal">Add Cooperative</button>
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">Cooperatives</div>
            <div class="card-body">
                <p class="card-title"></p>
                <table class="table table-bordered mt-3" id="cooperativesTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cooperatives as $cooperative)
                        <tr id="cooperative-{{ $cooperative->id }}">
                            <td>{{ $cooperative->name }}</td>
                            <td>{{ $cooperative->address }}</td>
                            <td>
                                <!-- Show Cooperative Modal Trigger -->
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showCooperativeModal{{ $cooperative->id }}">Show</button>

                                <!-- Edit Cooperative Modal Trigger -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editCooperativeModal{{ $cooperative->id }}">Edit</button>

                                <!-- Delete Cooperative Form -->
                                <form action="{{ route('cooperatives.destroy', $cooperative->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this cooperative?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Show Cooperative Modal -->
                        <div class="modal fade" id="showCooperativeModal{{ $cooperative->id }}" tabindex="-1" aria-labelledby="showCooperativeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="showCooperativeModalLabel">Cooperative Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Name:</strong> {{ $cooperative->name }}</p>
                                        <p><strong>address:</strong> {{ $cooperative->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Cooperative Modal -->
                        <div class="modal fade" id="editCooperativeModal{{ $cooperative->id }}" tabindex="-1" aria-labelledby="editCooperativeModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('cooperatives.update', $cooperative->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCooperativeModalLabel">Edit Cooperative</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $cooperative->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">address</label>
                                                <input class="form-control" id="address" name="address" rows="3" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Modal to Add Cooperative -->
            <div class="modal fade" id="addCooperativeModal" tabindex="-1" aria-labelledby="addCooperativeModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('cooperatives.store') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addCooperativeModalLabel">Add Cooperative</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">address</label>
                                    <input class="form-control" id="address" name="address" rows="3" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include jQuery first -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<!-- Initialize DataTable -->
<script>
    $(document).ready(function() {
        $('#cooperativesTable').DataTable();
    });
</script>
@endsection