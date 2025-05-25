@extends('layouts.app')

@section('title', 'Create Package')

@section('content')
<div class="container">
    <h2>Create Package</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.packages.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group mb-3">
            <label>Category <span class="text-danger">*</span></label>
            <select name="category_id" class="form-control" required>
                <option value="">Select</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Title <span class="text-danger">*</span></label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>

        <div class="form-group mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>

        <div class="form-group mb-3">
            <label>Location <span class="text-danger">*</span></label>
            <input type="text" name="location" class="form-control" required value="{{ old('location') }}">
        </div>

        <div class="form-group mb-3">
            <label>Price <span class="text-danger">*</span></label>
            <input type="number" name="price" class="form-control" required value="{{ old('price') }}">
        </div>

        <div class="form-group mb-3">
            <label>Duration Days <span class="text-danger">*</span></label>
            <input type="text" name="duration_days" class="form-control" required value="{{ old('duration_days') }}">
        </div>

        <div class="form-group mb-3">
            <label>Available From</label>
            <input type="date" name="available_from" class="form-control" value="{{ old('available_from') }}">
        </div>

        <div class="form-group mb-3">
            <label>Available To</label>
            <input type="date" name="available_to" class="form-control" value="{{ old('available_to') }}">
        </div>

        <div class="form-group mb-3">
            <label>Package Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Create</button>
        <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
