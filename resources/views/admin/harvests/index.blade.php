@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="my-4">Harvests</h1>

    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHarvestModal">Add Harvest</button>

    <table class="table table-bordered mt-3" id="harvestsTable">
        <thead>
            <tr>
                <th>Farmer</th>
                <th>Quantity</th>
                <th>Coffee Grade</th>
                <th>Harvest Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($harvests as $harvest)
            <tr id="harvest-{{ $harvest->id }}">
                <td>{{ $harvest->farmer->name }}</td>
                <td>{{ $harvest->quantity }}</td>
                <td>{{ $harvest->coffee_grade }}</td>
                <td>{{ $harvest->harvest_date }}</td>
                <td>
                    <!-- Show Harvest Modal Trigger -->
                    <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showHarvestModal{{ $harvest->id }}">Show</button>

                    <!-- Edit Harvest Modal Trigger -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editHarvestModal{{ $harvest->id }}">Edit</button>

                    <!-- Delete Harvest Form -->
                    <form action="{{ route('harvests.destroy', $harvest->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this harvest?')">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Show Harvest Modal -->
            <div class="modal fade" id="showHarvestModal{{ $harvest->id }}" tabindex="-1" aria-labelledby="showHarvestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showHarvestModalLabel">Harvest Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p><strong>Farmer:</strong> {{ $harvest->farmer->name }}</p>
                            <p><strong>quantity:</strong> {{ $harvest->quantity }}</p>
                            <p><strong>Coffee Grade:</strong> {{ $harvest->coffee_grade }}</p>
                            <p><strong>Harvest Date:</strong> {{ $harvest->harvest_date }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Harvest Modal -->
            <div class="modal fade" id="editHarvestModal{{ $harvest->id }}" tabindex="-1" aria-labelledby="editHarvestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="POST" action="{{ route('harvests.update', $harvest->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="editHarvestModalLabel">Edit Harvest</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="farmer_id" class="form-label">Farmer</label>
                                    <select class="form-control" id="farmer_id" name="farmer_id" required>
                                        @foreach($farmers as $farmer)
                                        <option value="{{ $farmer->id }}" {{ $farmer->id == $harvest->farmer_id ? 'selected' : '' }}>{{ $farmer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label">quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $harvest->quantity }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="coffee_grade" class="form-label">Coffee Grade</label>
                                    <input type="text" class="form-control" id="coffee_grade" name="coffee_grade" value="{{ $harvest->coffee_grade }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Harvest Date</label>
                                    <input type="date" class="form-control" id="harvest_date" name="harvest_date" value="{{ $harvest->harvest_date }}" required>
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

<!-- Add Harvest Modal -->
<div class="modal fade" id="addHarvestModal" tabindex="-1" aria-labelledby="addHarvestModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('harvests.store') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="addHarvestModalLabel">Add Harvest</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="farmer_id" class="form-label">Farmer</label>
                        <select class="form-control" id="farmer_id" name="farmer_id" required>
                            @foreach($farmers as $farmer)
                            <option value="{{ $farmer->id }}">{{ $farmer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="coffee_grade" class="form-label">Coffee Grade</label>
                        <input type="text" class="form-control" id="coffee_grade" name="coffee_grade" required>
                    </div>
                    <div class="mb-3">
                        <label for="harvest_date" class="form-label">Harvest Date</label>
                        <input type="date" class="form-control" id="harvest_date" name="harvest_date" required>
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

<!-- Include jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#harvestsTable').DataTable({
            "order": [
                [2, "desc"]
            ]
        });
    });
</script>
@endsection