<?php

use App\Http\Controllers\ProductSoldController;
use App\Http\Controllers\ProductSuppliedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('profit', [ProductSoldController::class, 'profit']);
Route::prefix('purchase')->group(function (){
    Route::get('', [ProductSoldController::class, 'index']);
    Route::post('create', [ProductSoldController::class, 'store']);
    Route::get('mearning',[ProductSoldController::class, 'monthlyEarnings']);
    Route::delete('/delete/{id}', [ProductSoldController::class, 'destroy']);
});

Route::prefix('delivery')->group(function (){
    Route::get('', [ProductSuppliedController::class, 'allProductSupplied']);
    // Route::put('/update/{id}', [ProductSuppliedController::class, 'update']);
    Route::delete('/delete/{id}', [ProductSuppliedController::class, 'destroy']);
});
