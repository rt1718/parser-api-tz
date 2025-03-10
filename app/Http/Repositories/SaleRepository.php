<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Sale;

class SaleRepository implements BaseRepositoryInterface
{
    public function create(array $data): void
    {
        Sale::create($data);
    }
}
