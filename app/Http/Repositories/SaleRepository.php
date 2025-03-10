<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Sale;

/**
 * Репозиторий для работы с продажами.
 * Добавляем новые продажи в базу.
 */
class SaleRepository implements BaseRepositoryInterface
{
    /**
     * Создаёт запись в таблице продаж.
     *
     * @param array $data Данные для создания записи.
     * @return void
     */
    public function create(array $data): void
    {
        Sale::create($data);
    }
}
