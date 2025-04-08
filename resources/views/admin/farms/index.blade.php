@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Farms</h1>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFarmModal">Add Farm</button>

    <table class="table table-bordered mt-3" id="farmsTable">
        <thead>
            <tr>
                <th>Farm Name</th>
                <th>Farmer name</th>
                <th>Location</th>
                <th>size_in_hectares</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($farms as $farm)
            <tr id="farm-{{ $farm->id }}">
                <td>{{ $farm->name }}</td>
                <td>{{ $farm->farmer->name }}</td>
                <td>{{ $farm->location }}</td>
                <td>{{ $farm->size_in_hectares }} acres</td>
                <td>
                    <!-- Show Farm Modal Trigger -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showFarmModal{{ $farm->id }}">Show</button>

                    <!-- Edit Farm Modal Trigger -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editFarmModal{{ $farm->id }}">Edit</button>

                    <!-- Delete Farm Form -->
                    <form action="{{ route('farms.destroy', $farm->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this farm?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Show Farm Modal -->
            <div class="modal fade" id="showFarmModal{{ $farm->id }}" tabindex="-1" aria-labelledby="showFarmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showFarmModalLabel">Farm Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Farm Name:</strong> {{ $farm->name }}</p>
                            <p><strong>Farmer Name:</strong> {{ $farm->farmer->name }}</p>
                            <p><strong>Location:</strong> {{ $farm->location }}</p>
                            <p><strong>size_in_hectares:</strong> {{ $farm->size_in_hectares }} acres</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Farm Modal -->
            <div class="modal fade" id="editFarmModal{{ $farm->id }}" tabindex="-1" aria-labelledby="editFarmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('farms.update', $farm->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editFarmModalLabel">Edit Farm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Farm Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $farm->name }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="farmer_id" class="form-label">Farmer</label>
                                    <select class="form-select" id="farmer_id" name="farmer_id" required>
                                        @foreach($farmers as $farmer)
                                            <option value="{{ $farmer->id }}" {{ $farm->farmer_id == $farmer->id ? 'selected' : '' }}>{{ $farmer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ $farm->location }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="size_in_hectares" class="form-label">size_in_hectares (in acres)</label>
                                    <input type="number" class="form-control" id="size_in_hectares" name="size_in_hectares" value="{{ $farm->size_in_hectares }}" required>
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

<!-- Add Farm Modal -->
<div class="modal fade" id="addFarmModal" tabindex="-1" aria-labelledby="addFarmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('farms.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addFarmModalLabel">Add Farm</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Farm Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="farmer_id" class="form-label">Farmer</label>
                        <select class="form-select" id="farmer_id" name="farmer_id" required>
                            @foreach($farmers as $farmer)
                                <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="location" class="form-label">Location</label>
                        <input type="text" class="form-control" id="location" name="location" required>
                    </div>
                    <div class="mb-3">
                        <label for="size_in_hectares" class="form-label">size_in_hectares (in acres)</label>
                        <input type="number" class="form-control" id="size_in_hectares" name="size_in_hectares" required>
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


<!-- Include jQuery and DataTables JS and CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#farmsTable').DataTable({
            "order": [[ 0, "asc" ]]
        });
    });
</script>
@endsection