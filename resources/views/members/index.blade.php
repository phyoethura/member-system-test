@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Members</h1>
    <a href="{{ route('members.create') }}" class="btn btn-primary">Add New Member</a>
</div>

<div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="{{ route('members.index') }}">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or surname" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <a href="{{ route('members.index', ['sort' => 'age', 'direction' => request('direction') == 'asc' ? 'desc' : 'asc']) }}" 
           class="btn btn-outline-primary">
            Sort by Age {{ request('sort') == 'age' ? (request('direction') == 'asc' ? '↑' : '↓') : '' }}
        </a>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Profile</th>
                <th>Name</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($members as $member)
            <tr>
                <td>
                    @if($member->profile_picture)
                        <img src="{{ asset('storage/' . $member->profile_picture) }}" 
                             alt="Profile" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;">
                    @else
                        <div class="bg-secondary rounded-circle d-flex align-items-center justify-content-center" 
                             style="width: 50px; height: 50px;">
                            <span class="text-white">{{ substr($member->name, 0, 1) }}</span>
                        </div>
                    @endif
                </td>
                <td>{{ $member->full_name }}</td>
                <td>{{ $member->date_of_birth->format('d/m/Y') }}</td>
                <td>{{ $member->age }} years</td>
                <td>{{ $member->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('members.show', $member) }}" class="btn btn-sm btn-info">View</a>
                    <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form method="POST" action="{{ route('members.destroy', $member) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" 
                                onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No members found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $members->links() }}
@endsection