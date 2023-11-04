<?php

use App\Http\Controllers\SaleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------

|
*/
Route::prefix('sale')->group(function (){

    Route::get('', [SaleController::class, 'index']);
    Route::post('/create', [SaleController::class, 'store']);
    Route::put('/update/{id}', [SaleController::class, 'update']);
    Route::delete('/delete/{id}', [SaleController::class, 'destroy']);

});
