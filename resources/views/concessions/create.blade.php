@extends('layouts.app')

@section('content')
    <h1>Add New Food</h1>
    <form action="{{ route('concessions.store') }}" method="POST" enctype="multipart/form-data" id="concessionForm">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Food Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="e.g., Burger" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" placeholder="e.g., Tasty burger with cheese"></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Food Picture</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
            <img id="imagePreview" class="mt-2" style="max-width: 200px; display: none;">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" placeholder="e.g., 9.99" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Food</button>
    </form>
@endsection