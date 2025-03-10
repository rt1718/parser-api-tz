<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Stock;

/**
 * Репозиторий для работы с остатками на складах.
 * Добавляем новые остатки в базу.
 */
class StockRepository implements BaseRepositoryInterface
{
    /**
     * Создаёт запись в таблице остатков.
     *
     * @param array $data Данные для создания записи.
     * @return void
     */
    public function create(array $data): void
    {
        Stock::create($data);
    }
}
