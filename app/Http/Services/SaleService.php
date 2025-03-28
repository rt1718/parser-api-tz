<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Http\Repositories\SaleRepository;

/**
 * Сервис для парсинга и сохранения данных о продажах.
 */
class SaleService
{
    /**
     * @var SaleRepository Репозиторий для работы с продажами.
     */
    protected SaleRepository $saleRepository;

    /**
     * @var string URL API для получения данных о продажах.
     */
    protected string $apiUrl = 'http://89.108.115.241:6969/api/sales';

    /**
     * @var string API-ключ для авторизации в сервисе.
     */
    protected string $apiKey = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';

    /**
     * Конструктор сервиса.
     *
     * @param SaleRepository $saleRepository Репозиторий для продаж.
     */
    public function __construct(SaleRepository $saleRepository)
    {
        $this->saleRepository = $saleRepository;
    }

    /**
     * Парсит данные о продажах за указанный период и сохраняет в БД.
     *
     * @param string $dateFrom Начальная дата в формате Y-m-d.
     * @param string $dateTo Конечная дата в формате Y-m-d.
     */
    public function parseSales(string $dateFrom, string $dateTo): void
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
                $this->saleRepository->create(
                    [
                        'nm_id' => $item['nm_id'] ?? null,
                        'income_id' => $item['income_id'] ?? null,
                        'discount_percent' => $item['discount_percent'] ?? 0,
                        'price_with_disc' => $item['price_with_disc'] ?? 0,
                        'for_pay' => $item['for_pay'] ?? 0,
                        'finished_price' => $item['finished_price'] ?? 0,
                        'warehouse_name' => $item['warehouse_name'] ?? null,
                        'country_name' => $item['country_name'] ?? null,
                        'oblast_okrug_name' => $item['oblast_okrug_name'] ?? null,
                        'region_name' => $item['region_name'] ?? null,
                        'is_supply' => $item['is_supply'] ?? false,
                        'is_realization' => $item['is_realization'] ?? false,
                        'spp' => $item['spp'] ?? null,
                        'promo_code_discount' => $item['promo_code_discount'] ?? null,
                        'is_storno' => $item['is_storno'] ?? null,
                        'date' => $item['date'] ?? null,
                        'last_change_date' => $item['last_change_date'] ?? null,
                    ]
                );
            }

            $page++;

        } while (count($data) === $limit);
    }
}
