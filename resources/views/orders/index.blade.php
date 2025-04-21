@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Orders</h1>
        <a href="{{ route('orders.create') }}" class="btn btn-primary">New Order</a>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foods</th>
                <th>Total Cost</th>
                <th>Kitchen Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->concessions->pluck('name')->implode(', ') }}</td>
                    <td>${{ number_format($order->total_cost, 2) }}</td>
                    <td>{{ $order->send_to_kitchen_time->format('Y-m-d H:i') }}</td>
                    <td>
                        <span class="badge bg-{{ $order->status == 'Pending' ? 'warning' : ($order->status == 'In-Progress' ? 'info' : 'success') }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>
                        @if ($order->status == 'Pending')
                            <form action="{{ route('orders.send-to-kitchen', $order->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Send to Kitchen</button>
                            </form>
                        @endif
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection