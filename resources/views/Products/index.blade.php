@extends('layouts.app')

@section('content')
<h2>Products <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">Add Product</a></h2>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Price</th>
        <th>Category</th>
        <th>Branch</th>
        <th>Actions</th>
    </tr>
    @foreach($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->cost }}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->category->name ?? '' }}</td>
        <td>{{ $product->branch->name ?? '' }}</td>
        <td>
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this product?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
