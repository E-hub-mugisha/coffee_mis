@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Account Profile</h2>

    {{-- User Profile --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">User Information</div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>
    </div>

    {{-- Cooperative Profile --}}
    <div class="card mb-4">
        <div class="card-header bg-success text-white">Cooperative Information</div>
        <div class="card-body">
            <p><strong>Registration Number:</strong> {{ $cooperative->registration_number ?? 'N/A' }}</p>
            <p><strong>Phone:</strong> {{ $cooperative->phone ?? 'N/A' }}</p>
            <p><strong>Description:</strong> {{ $cooperative->description ?? 'N/A' }}</p>
            <p><strong>Established At:</strong> {{ $cooperative->established_at ? \Carbon\Carbon::parse($cooperative->established_at)->format('F d, Y') : 'N/A' }}</p>
            @if($cooperative->logo)
                <p><strong>Logo:</strong><br>
                    <img src="{{ asset('storage/' . $cooperative->logo) }}" alt="Logo" class="img-thumbnail" style="max-width: 120px;">
                </p>
            @endif
        </div>
    </div>

    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('cooperative.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Cooperative Info -->
                        <h5 class="mb-3">Cooperative Information</h5>

                        <div class="mb-3">
                            <label for="registration_number" class="form-label">Registration Number</label>
                            <input type="text" class="form-control" name="registration_number" value="{{ $cooperative->registration_number ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" value="{{ $cooperative->phone ?? '' }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{ $cooperative->description ?? '' }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control" name="logo">
                            @if($cooperative->logo ?? false)
                                <img src="{{ asset('storage/' . $cooperative->logo) }}" alt="Cooperative Logo" class="img-thumbnail mt-2" style="max-width: 100px;">
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="established_at" class="form-label">Established At</label>
                            <input type="date" class="form-control" name="established_at" value="{{ $cooperative->established_at ?? '' }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
