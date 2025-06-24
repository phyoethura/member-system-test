@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Member Details</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        @if($member->profile_picture)
                            <img src="{{ asset('storage/' . $member->profile_picture) }}" 
                                 alt="Profile" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                        @else
                            <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center mb-3 mx-auto" 
                                 style="width: 150px; height: 150px;">
                                <span class="text-white fs-1">{{ substr($member->name, 0, 1) }}</span>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table table-borderless">
                            <tr>
                                <th>Full Name:</th>
                                <td>{{ $member->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td>{{ $member->date_of_birth->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <th>Age:</th>
                                <td>{{ $member->age }} years</td>
                            </tr>
                            <tr>
                                <th>Created:</th>
                                <td>{{ $member->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Last Updated:</th>
                                <td>{{ $member->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ route('members.index') }}" class="btn btn-secondary me-2">Back to List</a>
                    <a href="{{ route('members.edit', $member) }}" class="btn btn-warning me-2">Edit</a>
                    <form method="POST" action="{{ route('members.destroy', $member) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" 
                                onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection