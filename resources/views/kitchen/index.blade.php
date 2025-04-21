@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Kitchen</h1>
        <button class="btn btn-primary" onclick="refreshOrders()">Refresh</button>
    </div>
    <table class="table table-hover" id="kitchenTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Foods</th>
                <th>Total Cost</th>
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
                    <td>
                        <span class="badge bg-{{ $order->status == 'In-Progress' ? 'info' : 'success' }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>
                        @if ($order->status == 'In-Progress')
                            <a href="{{ route('kitchen.update-status', ['id' => $order->id, 'status' => 'Completed']) }}" class="btn btn-sm btn-success">Done!</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection