@extends('layouts.app')

@section('content')
<h2>Add Branch</h2>
<form action="{{ route('branches.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Logo</label>
        <input type="file" name="logo" class="form-control">
    </div>
    <button type="submit" class="btn btn-success">Save</button>
</form>
@endsection
