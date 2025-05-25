@extends('layouts.app')

@section('title', 'Packages')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Packages</h2>
        <a href="{{ route('admin.packages.create') }}" class="btn btn-primary">Add New Package</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Price</th>
                <th>Location</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($packages as $package)
                <tr>
                    <td>{{ $package->title }}</td>
                    <td>{{ $package->category->name }}</td>
                    <td>₹{{ number_format($package->price, 2) }}</td>
                    <td>{{ $package->location }}</td>
                    <td>
                        @if($package->image)
                            <img src="{{ asset('storage/' . $package->image) }}" width="80">
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.packages.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No Packages found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
