<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('parse')->group(function () {
    Route::post('/incomes', [ParserController::class, 'parseIncomes']);
    Route::post('/orders', [ParserController::class, 'parseOrders']);
    Route::post('/sales', [ParserController::class, 'parseSales']);
    Route::post('/stocks', [ParserController::class, 'parseStocks']);
});
