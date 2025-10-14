<?php

use App\Http\Controllers\InventoryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [InventoryController::class, 'inventoryPageLoad']);
