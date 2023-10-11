<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('category')->group(function (){
    Route::get('', [CategoryController::class, 'index']);
    Route::post('/create', [CategoryController::class, 'store']);
    Route::put('/update/{id}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
});
