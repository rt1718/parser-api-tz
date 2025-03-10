<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Http\Repositories\StockRepository;

/**
 * Сервис для парсинга и сохранения данных о складах.
 */
class StockService
{
    /**
     * @var StockRepository Репозиторий для работы со складами.
     */
    protected StockRepository $stockRepository;

    /**
     * @var string URL API для получения данных о складах.
     */
    protected string $apiUrl = 'http://89.108.115.241:6969/api/stocks';

    /**
     * @var string API-ключ для авторизации в сервисе.
     */
    protected string $apiKey = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';

    /**
     * Конструктор сервиса.
     *
     * @param StockRepository $stockRepository Репозиторий для складов.
     */
    public function __construct(StockRepository $stockRepository)
    {
        $this->stockRepository = $stockRepository;
    }

    /**
     * Парсит данные о складах за указанный период и сохраняет в БД.
     *
     * @param string $dateFrom Начальная дата в формате Y-m-d.
     * @param string $dateTo Конечная дата в формате Y-m-d.
     */
    public function parseStocks(string $dateFrom, string $dateTo): void
    {
        $page = 1;
        $limit = 500;

        do {
            $response = Http::get($this->apiUrl, [
                'dateFrom' => $dateFrom,
                'dateTo' => $dateTo,
                'page' => $page,
                'limit' => $limit,
                'key' => $this->apiKey,
            ]);

            if (!$response->successful()) {
                break;
            }

            $data = $response->json()['data'] ?? [];

            foreach ($data as $item) {
                $this->stockRepository->create(
                    [
                        'date' => $item['date'] ?? null,
                        'last_change_date' => $item['last_change_date'] ?? null,
                        'supplier_article' => $item['supplier_article'] ?? null,
                        'tech_size' => $item['tech_size'] ?? null,
                        'barcode' => $item['barcode'] ?? null,
                        'quantity' => $item['quantity'] ?? 0,
                        'is_supply' => $item['is_supply'] ?? false,
                        'is_realization' => $item['is_realization'] ?? false,
                        'quantity_full' => $item['quantity_full'] ?? 0,
                        'warehouse_name' => $item['warehouse_name'] ?? null,
                        'in_way_to_client' => $item['in_way_to_client'] ?? 0,
                        'in_way_from_client' => $item['in_way_from_client'] ?? 0,
                        'nm_id' => $item['nm_id'],
                        'subject' => $item['subject'] ?? null,
                        'category' => $item['category'] ?? null,
                        'brand' => $item['brand'] ?? null,
                        'sc_code' => $item['sc_code'] ?? null,
                        'price' => $item['price'] ?? 0,
                        'discount' => $item['discount'] ?? 0,
                    ]
                );
            }

            $page++;

        } while (count($data) === $limit);
    }
}
