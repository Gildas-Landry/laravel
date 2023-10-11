<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------

|
*/
Route::prefix('product')->group(function (){

    Route::get('', [ProductController::class, 'index']);
    Route::post('/create', [ProductController::class, 'store']);
    Route::put('/update/{id}', [ProductController::class, 'update']);
    Route::delete('/delete/{id}', [ProductController::class, 'destroy']);


    Route::get('/export-x', [ProductController::class, 'exportExcel']);
    Route::post('/import', [ProductController::class,'importExcelCSV']);
    Route::get('/export-csv', [ProductController::class, 'exportCsv']);
});
