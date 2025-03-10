<?php

namespace App\Http\Repositories\Interfaces;

/**
 * Базовый интерфейс для всех репозиториев.
 * Определяет метод создания записи, без возврата результата — просто записываем и забываем.
 */
interface BaseRepositoryInterface
{
    /**
     * Создаёт новую запись в базе данных.
     *
     * @param array $data Данные для вставки.
     * @return void Ничего не возвращает, просто делает свою работу.
     */
    public function create(array $data): void;
}
