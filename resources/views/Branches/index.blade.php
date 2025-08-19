@extends('layouts.app')

@section('content')
<h2>Branches <a href="{{ route('branches.create') }}" class="btn btn-primary btn-sm">Add Branch</a></h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Logo</th><th>Actions</th>
    </tr>
    @foreach($branches as $branch)
    <tr>
        <td>{{ $branch->id }}</td>
        <td>{{ $branch->name }}</td>
        <td>{{ $branch->email }}</td>
        <td>{{ $branch->phone }}</td>
        <td>
            @if($branch->logo)
                <img src="{{ asset('uploads/branches/'.$branch->logo) }}" width="50">
            @endif
        </td>
        <td>
            <a href="{{ route('branches.edit', $branch->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('branches.destroy', $branch->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this branch?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
