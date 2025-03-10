<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Order;

/**
 * Репозиторий для работы с заказами.
 * Добавляем новые заказы в базу.
 */
class OrderRepository implements BaseRepositoryInterface
{
    /**
     * Создаёт запись в таблице заказов.
     *
     * @param array $data Данные для создания записи.
     * @return void Просто добавляет заказ в БД, без лишних вопросов.
     */
    public function create(array $data): void
    {
        Order::create($data);
    }
}
