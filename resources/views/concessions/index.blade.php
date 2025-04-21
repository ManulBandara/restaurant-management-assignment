@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Food Menu</h1>
        <a href="{{ route('concessions.create') }}" class="btn btn-primary">Add New Food</a>
    </div>
    <div class="row">
        @foreach ($concessions as $concession)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $concession->image) }}" class="card-img-top" alt="{{ $concession->name }}" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $concession->name }}</h5>
                        <p class="card-text">{{ $concession->description ?? 'Yummy food!' }}</p>
                        <p class="card-text"><strong>Price:</strong> LKR{{ number_format($concession->price, 2) }}</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="{{ route('concessions.edit', $concession->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('concessions.destroy', $concession->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection