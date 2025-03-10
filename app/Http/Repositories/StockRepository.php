<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Stock;

class StockRepository implements BaseRepositoryInterface
{
    public function create(array $data): void
    {
        Stock::create($data);
    }
}
