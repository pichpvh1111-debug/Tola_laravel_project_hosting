@extends('layouts.app')

@section('content')
<h2>Edit Branch</h2>
<form action="{{ route('branches.update', $branch->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $branch->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $branch->email }}" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $branch->phone }}" required>
    </div>
    <div class="mb-3">
        <label>Logo</label>
        <input type="file" name="logo" class="form-control">
        @if($branch->logo)
            <img src="{{ asset('uploads/branches/'.$branch->logo) }}" width="50">
        @endif
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
