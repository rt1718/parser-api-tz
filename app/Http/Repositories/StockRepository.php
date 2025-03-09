<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Stock;

class StockRepository implements BaseRepositoryInterface
{
    protected Stock $stock;

    public function __construct(Stock $stock)
    {
        $this->stock = $stock;
    }

    public function updateOrCreate(array $conditions, array $data): void
    {
        $this->stock->updateOrCreate($conditions, $data);
    }
}
