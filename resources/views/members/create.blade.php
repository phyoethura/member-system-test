@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Add New Member</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('members.store') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <select name="title" id="title" class="form-select" required>
                            <option value="">Select Title</option>
                            <option value="Mr." {{ old('title') == 'Mr.' ? 'selected' : '' }}>Mr.</option>
                            <option value="Mrs." {{ old('title') == 'Mrs.' ? 'selected' : '' }}>Mrs.</option>
                            <option value="Miss" {{ old('title') == 'Miss' ? 'selected' : '' }}>Miss</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname</label>
                        <input type="text" name="surname" id="surname" class="form-control" value="{{ old('surname') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="date_of_birth" class="form-label">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture" class="form-control" accept="image/*">
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('members.index') }}" class="btn btn-secondary me-2">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Member</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection