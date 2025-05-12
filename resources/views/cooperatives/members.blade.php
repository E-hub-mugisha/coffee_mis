@extends('layouts.admin')

@section('content')
<div class="container">
  <h2>Members</h2>
  <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createMemberModal">Add Member</button>

  <table class="table table-bordered"  id="dataTables-example" width="100%">
    <thead>
      <tr>
        <th>Full Name</th>
        <th>National ID</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($members as $member)
      <tr>
        <td>{{ $member->full_name }}</td>
        <td>{{ $member->national_id }}</td>
        <td>{{ $member->phone }}</td>
        <td>{{ ucfirst($member->role) }}</td>
        <td>
          <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#showMemberModal{{ $member->id }}">View</button>
          <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editMemberModal{{ $member->id }}">Edit</button>
        </td>
      </tr>

      <!-- Show Modal -->
      <div class="modal fade" id="showMemberModal{{ $member->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Member Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
              <p><strong>Full Name:</strong> {{ $member->full_name }}</p>
              <p><strong>National ID:</strong> {{ $member->national_id }}</p>
              <p><strong>Phone:</strong> {{ $member->phone }}</p>
              <p><strong>Role:</strong> {{ ucfirst($member->role) }}</p>
              <p><strong>Gender:</strong> {{ ucfirst($member->gender) }}</p>
              <p><strong>Address:</strong> {{ $member->address }}</p>
              <p><strong>Join Date:</strong> {{ $member->join_date }}</p>
              @if($member->profile_photo)
              <img src="{{ asset('storage/' . $member->profile_photo) }}" alt="Profile Photo" class="img-thumbnail mt-2" style="max-width: 100px;">
              @endif
            </div>
          </div>
        </div>
      </div>

      <!-- Edit Modal -->
      <div class="modal fade" id="editMemberModal{{ $member->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form action="{{ route('members.update', $member->id) }}" method="POST" class="modal-content" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="modal-header">
                <h5 class="modal-title">Edit Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="full_name" class="form-label">Full Name</label>
                  <input type="text" name="full_name" class="form-control" value="{{ $member->full_name }}" required>
                </div>

                <div class="mb-3">
                  <label for="national_id" class="form-label">National ID</label>
                  <input type="text" name="national_id" class="form-control" value="{{ $member->national_id }}" required>
                </div>

                <div class="mb-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{ $member->phone }}">
                </div>

                <div class="mb-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select name="gender" class="form-control">
                    <option value="male" {{ $member->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $member->gender == 'female' ? 'selected' : '' }}>Female</option>
                    <option value="other" {{ $member->gender == 'other' ? 'selected' : '' }}>Other</option>
                  </select>
                </div>


                <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select name="role" class="form-control">
                    <option value="producer" {{ $member->role == 'producer' ? 'selected' : '' }}>Producer</option>
                    <option value="manager" {{ $member->role == 'manager' ? 'selected' : '' }}>Manager</option>
                    <option value="other" {{ $member->role == 'other' ? 'selected' : '' }}>Other</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" name="address" class="form-control" value="{{ $member->address }}">
                </div>

                <div class="mb-3">
                  <label for="join_date" class="form-label">Join Date</label>
                  <input type="date" name="join_date" class="form-control" value="{{ $member->join_date }}">
                </div>

                <div class="mb-3">
                  <label for="profile_photo" class="form-label">Profile Photo</label>
                  <input type="file" name="profile_photo" class="form-control">
                  @if($member->profile_photo)
                  <img src="{{ asset('storage/' . $member->profile_photo) }}" alt="Profile Photo" class="img-thumbnail mt-2" style="max-width: 100px;">
                  @endif
                </div>
              </div>
              <div class="modal-footer">
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

<!-- Create Modal -->
<div class="modal fade" id="createMemberModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('members.store') }}" method="POST" class="modal-content" enctype="multipart/form-data">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title">Add Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label for="full_name" class="form-label">Full Name</label>
          <input type="text" name="full_name" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="national_id" class="form-label">National ID</label>
          <input type="text" name="national_id" class="form-control" required>
        </div>

        <div class="mb-3">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" name="phone" class="form-control">
        </div>

        <div class="mb-3">
          <label for="gender" class="form-label">Gender</label>
          <select name="gender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>


        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select name="role" class="form-control">
            <option value="producer">Producer</option>
            <option value="manager">Manager</option>
            <option value="other">Other</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="address" class="form-label">Address</label>
          <input type="text" name="address" class="form-control">
        </div>

        <div class="mb-3">
          <label for="join_date" class="form-label">Join Date</label>
          <input type="date" name="join_date" class="form-control">
        </div>

        <div class="mb-3">
          <label for="profile_photo" class="form-label">Profile Photo</label>
          <input type="file" name="profile_photo" class="form-control">
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
</div>
@endsection