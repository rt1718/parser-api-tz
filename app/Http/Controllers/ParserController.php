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

    public function fetchAll(): JsonResponse
    {
        $dateFrom = Carbon::create(2024, 3, 9)->toDateString();
        $dateTo = now()->toDateString();
        $dateStocks = Carbon::create(2025, 3, 9)->toDateString();

        $this->incomeService->parseIncomes($dateFrom, $dateTo);
        sleep(3);
        $this->stockService->parseStocks($dateStocks, $dateTo);
        $this->orderService->parseOrders($dateFrom, $dateTo);
        $this->saleService->parseSales($dateFrom, $dateTo);

        return response()->json(['message' => 'Данные успешно загружены!']);
    }
}
