@extends('layouts.app')

@section('title', 'Edit Package')

@section('content')
<div class="container">
    <h2>Edit Package</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label for="category_id">Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $cat->id == $package->category_id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="title">Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $package->title) }}">
        </div>

        <div class="form-group mb-3">
            <label for="description">Description</label>
            <textarea name="description" rows="4" class="form-control">{{ old('description', $package->description) }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label for="location">Location <span class="text-danger">*</span></label>
            <input type="text" name="location" class="form-control" required value="{{ old('location', $package->location) }}">
        </div>

        <div class="form-group mb-3">
            <label for="price">Price <span class="text-danger">*</span></label>
            <input type="number" name="price" class="form-control" required value="{{ old('price', $package->price) }}">
        </div>

        <div class="form-group mb-3">
            <label for="duration_days">Duration Days <span class="text-danger">*</span></label>
            <input type="number" name="duration_days" class="form-control" required value="{{ old('duration_days', $package->duration_days) }}">
        </div>

        <div class="form-group mb-3">
            <label for="available_from">Available From</label>
            <input type="date" name="available_from" class="form-control" value="{{ old('available_from', $package->available_from) }}">
        </div>

        <div class="form-group mb-3">
            <label for="available_to">Available To</label>
            <input type="date" name="available_to" class="form-control" value="{{ old('available_to', $package->available_to) }}">
        </div>

        <div class="form-group mb-3">
            <label for="image">Package Image</label>
            <input type="file" name="image" class="form-control">
            @if($package->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $package->image) }}" width="120" class="img-thumbnail">
                </div>
            @else
                <p class="text-muted">No image available</p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
