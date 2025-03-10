<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use App\Http\Services\StockService;
use App\Http\Services\SaleService;
use App\Http\Services\OrderService;
use App\Http\Services\IncomeService;

class ParserController extends Controller
{
    protected StockService $stockService;
    protected SaleService $saleService;
    protected OrderService $orderService;
    protected IncomeService $incomeService;

    public function __construct(
        StockService  $stockService,
        SaleService   $saleService,
        OrderService  $orderService,
        IncomeService $incomeService
    )
    {
        $this->stockService = $stockService;
        $this->saleService = $saleService;
        $this->orderService = $orderService;
        $this->incomeService = $incomeService;
    }


    public function parseIncomes(): JsonResponse
    {
        $dateFrom = Carbon::create(2024, 3, 10)->toDateString();
        $dateTo = now()->toDateString();

        $this->incomeService->parseIncomes($dateFrom, $dateTo);

        return response()->json(['message' => 'Данные успешно загружены!']);
    }

    public function parseOrders(): JsonResponse
    {
        $dateFrom = Carbon::create(2024, 3, 10)->toDateString();
        $dateTo = now()->toDateString();

        $this->orderService->parseOrders($dateFrom, $dateTo);

        return response()->json(['message' => 'Данные успешно загружены!']);
    }

    public function parseSales(): JsonResponse
    {
        $dateFrom = Carbon::create(2024, 3, 10)->toDateString();
        $dateTo = now()->toDateString();

        $this->saleService->parseSales($dateFrom, $dateTo);

        return response()->json(['message' => 'Данные успешно загружены!']);
    }

    public function parseStocks(): JsonResponse
    {
        $dateFrom = Carbon::create(2024, 3, 10)->toDateString();
        $dateTo = now()->toDateString();

        $this->stockService->parseStocks($dateFrom, $dateTo);

        return response()->json(['message' => 'Данные успешно загружены!']);
    }
}
