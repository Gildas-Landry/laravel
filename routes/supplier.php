<?php

use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
|*/
Route::prefix('supplier')->group(function (){
    Route::post('/create', [SupplierController::class, 'store']);
    Route::get('', [SupplierController::class, 'index']);
    Route::put('/update/{id}', [SupplierController::class, 'update']);
    Route::delete('/delete/{id}', [SupplierController::class, 'destroy']);
});

