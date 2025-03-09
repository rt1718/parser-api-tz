<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Income;

class IncomeRepository implements BaseRepositoryInterface
{
    protected Income $income;

    public function __construct(Income $income)
    {
        $this->income = $income;
    }

    public function updateOrCreate(array $conditions, array $data): void
    {
        $this->income->updateOrCreate($conditions, $data);
    }
}
