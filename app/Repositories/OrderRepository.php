<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    protected $model;

    public function __construct(Order $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->with('concessions')->get();
    }

    public function create(array $data, array $concessions)
    {
        $order = $this->model->create($data);
        $order->concessions()->attach($concessions);
        return $order;
    }

    public function find($id)
    {
        return $this->model->with('concessions')->findOrFail($id);
    }

    public function delete($id)
    {
        $order = $this->find($id);
        $order->delete();
    }

    public function updateStatus($id, $status)
    {
        $order = $this->find($id);
        $order->update(['status' => $status]);
        return $order;
    }

    public function getKitchenOrders()
    {
        return $this->model->with('concessions')->whereIn('status', ['In-Progress', 'Completed'])->get();
    }
}