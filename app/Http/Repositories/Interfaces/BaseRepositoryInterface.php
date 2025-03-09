<?php

namespace App\Http\Repositories\Interfaces;

interface BaseRepositoryInterface
{
    public function updateOrCreate(array $conditions, array $data): void;
}

