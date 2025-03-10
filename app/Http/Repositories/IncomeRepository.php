<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Income;

class IncomeRepository implements BaseRepositoryInterface
{
    public function create(array $data): void
    {
        Income::create($data);
    }
}
