<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Order;

class OrderRepository implements BaseRepositoryInterface
{
    public function create(array $data): void
    {
        Order::create($data);
    }
}
