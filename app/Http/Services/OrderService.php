<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;
use App\Http\Repositories\OrderRepository;

class OrderService
{
    protected OrderRepository $orderRepository;
    protected string $apiUrl = 'http://89.108.115.241:6969/api/orders';
    protected string $apiKey = 'E6kUTYrYwZq2tN4QEtyzsbEBk3ie';

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function parseOrders(string $dateFrom, string $dateTo): void
    {
        $page = 1;
        $limit = 100;

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
                $this->orderRepository->create(
                    [
                        'date' => $item['date'] ?? null,
                        'g_number' => $item['g_number'] ?? null,
                        'last_change_date' => $item['last_change_date'] ?? null,
                        'supplier_article' => $item['supplier_article'] ?? null,
                        'tech_size' => $item['tech_size'] ?? null,
                        'barcode' => $item['barcode'] ?? null,
                        'total_price' => $item['total_price'] ?? null,
                        'discount_percent' => $item['discount_percent'] ?? null,
                        'warehouse_name' => $item['warehouse_name'] ?? null,
                        'oblast' => $item['oblast'] ?? null,
                        'income_id' => $item['income_id'] ?? null,
                        'nm_id' => $item['nm_id'] ?? null,
                        'subject' => $item['subject'] ?? null,
                        'category' => $item['category'] ?? null,
                        'brand' => $item['brand'] ?? null,
                        'is_cancel' => $item['is_cancel'] ?? false,
                        'cancel_dt' => $item['cancel_dt'] ?? null,
                    ]
                );
            }

            $page++;

        } while (count($data) === $limit);
    }
}
