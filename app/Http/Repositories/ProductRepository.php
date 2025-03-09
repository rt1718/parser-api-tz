<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Product;

class ProductRepository implements BaseRepositoryInterface
{
    protected Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function updateOrCreate(array $conditions, array $data): void
    {
        $this->product->updateOrCreate($conditions, $data);
    }
}
