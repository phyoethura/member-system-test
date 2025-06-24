@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Edit Member</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('members.update', $member) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <select name="title" id="title" class="form-select" required>
                            <option value="">Select Title</option>
                            <option value="Mr." {{ old('title', $member->title) == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                            <option value="Mrs." {{ old('title', $member->title) == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                            <option value="Miss" {{ old('title', $member->title) == 'Miss' ? 'selected' : '' }}>Miss</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $member->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname', $member->surname) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" 
                               value="{{ old('date_of_birth', $member->date_of_birth->format('Y-m-d')) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        @if($member->profile_picture)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $member->profile_picture) }}" 
                                     alt="Current Profile" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                            </div>
                        @endif
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('members.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Update Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection