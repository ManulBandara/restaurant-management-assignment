<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Repositories\ConcessionRepository;
use App\Repositories\OrderRepository;
use App\Jobs\SendOrderToKitchen;

class OrderController extends Controller
{
    protected $orderRepository;
    protected $concessionRepository;

    public function __construct(OrderRepository $orderRepository, ConcessionRepository $concessionRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->concessionRepository = $concessionRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $concessions = $this->concessionRepository->all();
        return view('orders.create', compact('concessions'));
    }

    public function store(StoreOrderRequest $request)
{
    $data = $request->validated();
    $concessions = $request->input('concessions', []);
    $total_cost = $this->concessionRepository->all()->whereIn('id', $concessions)->sum('price');
    $data['total_cost'] = $total_cost;

    $order = $this->orderRepository->create($data, $concessions);

    // Check if the send time is in the past or now
    $sendTime = \Carbon\Carbon::parse($data['send_to_kitchen_time']);
    if ($sendTime->isPast()) {
        $order->update(['status' => 'In-Progress']);
    }

    return redirect()->route('orders.index')->with('success', 'Order created successfully.');
}

    public function destroy($id)
    {
        $this->orderRepository->delete($id);
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }

    public function sendToKitchen($id)
{
    $order = $this->orderRepository->find($id);
    $order->update(['status' => 'In-Progress']);
    return redirect()->route('orders.index')->with('success', 'Order sent to kitchen.');
}
}