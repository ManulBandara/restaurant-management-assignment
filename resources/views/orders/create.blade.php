@extends('layouts.app')

@section('content')
    <h1>New Order</h1>
    <form action="{{ route('orders.store') }}" method="POST" id="orderForm">
        @csrf
        <div class="mb-3">
            <label for="concessions" class="form-label">Pick Foods</label>
            <select name="concessions[]" id="concessions" class="form-control" multiple required>
                @foreach ($concessions as $concession)
                    <option value="{{ $concession->id }}">{{ $concession->name }} (${{ number_format($concession->price, 2) }})</option>
                @endforeach
            </select>
            <small>Hold Ctrl (Windows) or Cmd (Mac) to pick more than one!</small>
            @error('concessions')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="send_to_kitchen_time" class="form-label">When to Send to Kitchen</label>
            <input type="datetime-local" name="send_to_kitchen_time" id="send_to_kitchen_time" class="form-control" required>
            @error('send_to_kitchen_time')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
@endsection