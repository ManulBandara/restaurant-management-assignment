@extends('layouts.app')

@section('content')
    <h1>Edit Food</h1>
    <form action="{{ route('concessions.update', $concession->id) }}" method="POST" enctype="multipart/form-data" id="concessionForm">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Food Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $concession->name }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $concession->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Food Picture</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            <img src="{{ asset('storage/' . $concession->image) }}" class="mt-2" style="max-width: 200px;">
            <img id="imagePreview" class="mt-2" style="max-width: 200px; display: none;">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" name="price" id="price" class="form-control" step="0.01" value="{{ $concession->price }}" required>
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Food</button>
    </form>
@endsection