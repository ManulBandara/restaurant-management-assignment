<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;

class KitchenController extends Controller
{
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->getKitchenOrders();
        return view('kitchen.index', compact('orders'));
    }

    public function updateStatus($id, $status)
    {
        $this->orderRepository->updateStatus($id, $status);
        return redirect()->route('kitchen.index')->with('success', 'Order status updated.');
    }
}