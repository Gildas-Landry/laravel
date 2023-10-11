<?php

use App\Http\Controllers\ProductSuppliedController;
use Illuminate\Support\Facades\Route;

Route::get('delivery', [ProductSuppliedController::class, 'allProductSupplied']);
