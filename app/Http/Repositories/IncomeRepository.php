<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\BaseRepositoryInterface;
use App\Models\Income;

/**
 * Репозиторий для работы с доходами.
 * Просто создаём записи.
 */
class IncomeRepository implements BaseRepositoryInterface
{
    /**
     * Создаёт запись в таблице доходов.
     *
     * @param array $data Данные для создания записи.
     * @return void Просто вставляет данные, ничего не возвращает.
     */
    public function create(array $data): void
    {
        Income::create($data);
    }
}
