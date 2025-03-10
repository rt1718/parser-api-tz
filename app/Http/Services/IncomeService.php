<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Http\Repositories\IncomeRepository;

class IncomeService
{
    protected IncomeRepository $incomeRepository;
    protected string $apiUrl = 'http://89.108.115.241:6969/api/incomes';
    protected string $apiKey = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';

    public function __construct(IncomeRepository $incomeRepository)
    {
        $this->incomeRepository = $incomeRepository;
    }

    public function parseIncomes(string $dateFrom, string $dateTo): void
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
                $this->incomeRepository->updateOrCreate(
                    ['income_id' => $item['income_id']],
                    [
                        'number' => $item['number'] ?? null,
                        'date' => $item['date'] ?? null,
                        'income_id' => $item['income_id'] ?? null,
                        'last_change_date' => $item['last_change_date'] ?? null,
                        'supplier_article' => $item['supplier_article'] ?? null,
                        'tech_size' => $item['tech_size'] ?? null,
                        'barcode' => $item['barcode'] ?? null,
                        'quantity' => $item['quantity'] ?? 0,
                        'total_price' => $item['total_price'] ?? 0,
                        'date_close' => $item['date_close'] ?? null,
                        'warehouse_name' => $item['warehouse_name'] ?? null,
                        'nm_id' => $item['nm_id'] ?? null,
                    ]
                );
            }

            $page++;

        } while (count($data) === $limit);
    }
}
