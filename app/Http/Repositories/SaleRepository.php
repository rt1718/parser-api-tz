<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Sale;

class SaleRepository implements BaseRepositoryInterface
{
    protected Sale $sale;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
    }

    public function updateOrCreate(array $conditions, array $data): void
    {
        $this->sale->updateOrCreate($conditions, $data);
    }
}
