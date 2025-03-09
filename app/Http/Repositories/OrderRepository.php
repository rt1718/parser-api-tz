<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Order;

class OrderRepository implements BaseRepositoryInterface
{
    protected Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function updateOrCreate(array $conditions, array $data): void
    {
        $this->order->updateOrCreate($conditions, $data);
    }
}
