@extends('layouts.admin')

@section('content')

<div class="container">
    <div class="col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">Farmers
                <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addFarmerModal">Add Farmer</button>
            </div>
            <div class="card-body">
                <p class="card-title"></p>

                <table class="table table-bordered mt-3" id="farmersTable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Cooperative</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($farmers as $farmer)
                        <tr id="farmer-{{ $farmer->id }}">
                            <td>{{ $farmer->name }}</td>
                            <td>{{ $farmer->email }}</td>
                            <td>{{ $farmer->phone }}</td>
                            <td>{{ $farmer->address }}</td>
                            <td>{{ $farmer->cooperative ? $farmer->cooperative->name : 'N/A' }}</td>
                            <td>
                                <!-- Show Farmer Modal Trigger -->
                                <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showFarmerModal{{ $farmer->id }}">Show</button>

                                <!-- Edit Farmer Modal Trigger -->
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFarmerModal{{ $farmer->id }}">Edit</button>

                                <!-- Delete Farmer Form -->
                                <form action="{{ route('farmers.destroy', $farmer->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this farmer?')">Delete</button>
                                </form>
                            </td>
                        </tr>

                        <!-- Show Farmer Modal -->
                        <div class="modal fade" id="showFarmerModal{{ $farmer->id }}" tabindex="-1" aria-labelledby="showFarmerModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="showFarmerModalLabel">Farmer Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Name:</strong> {{ $farmer->name }}</p>
                                        <p><strong>Email:</strong> {{ $farmer->email }}</p>
                                        <p><strong>Phone:</strong> {{ $farmer->phone }}</p>
                                        <p><strong>Address:</strong> {{ $farmer->address }}</p>
                                        <p><strong>Cooperative:</strong> {{ $farmer->cooperative ? $farmer->cooperative->name : 'N/A' }}</p>
                                        <p><strong>Created At:</strong> {{ $farmer->created_at->format('d-m-Y H:i') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Edit Farmer Modal -->
                        <div class="modal fade" id="editFarmerModal{{ $farmer->id }}" tabindex="-1" aria-labelledby="editFarmerModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('farmers.update', $farmer->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editFarmerModalLabel">Edit Farmer</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="name" name="name" value="{{ $farmer->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ $farmer->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $farmer->phone }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address" name="address" value="{{ $farmer->address }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="cooperative_id" class="form-label">Cooperative</label>
                                                <select class="form-select" id="cooperative_id" name="cooperative_id">
                                                    <option value="">Select Cooperative</option>
                                                    @foreach($cooperatives as $cooperative)
                                                    <option value="{{ $cooperative->id }}" {{ $farmer->cooperative_id == $cooperative->id ? 'selected' : '' }}>{{ $cooperative->name }}</option>
                                                    @endforeach
                                                </select>
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

            <!-- Add Farmer Modal -->
            <div class="modal fade" id="addFarmerModal" tabindex="-1" aria-labelledby="addFarmerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('farmers.store') }}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="addFarmerModalLabel">Add Farmer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <label for="cooperative_id" class="form-label">Cooperative</label>
                                    <select class="form-select" id="cooperative_id" name="cooperative_id">
                                        <option value="">Select Cooperative</option>
                                        @foreach($cooperatives as $cooperative)
                                        <option value="{{ $cooperative->id }}">{{ $cooperative->name }}</option>
                                        @endforeach
                                    </select>
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
<script>
    $(document).ready(function() {
        $('#farmersTable').DataTable({
            "language": {
                "lengthMenu": "Show _MENU_ entries",
                "zeroRecords": "No matching records found",
                "info": "Showing page _PAGE_ of _PAGES_",
                "infoEmpty": "No entries available",
                "infoFiltered": "(filtered from _MAX_ total entries)"
            }
        });
    });
</script>
@endsection