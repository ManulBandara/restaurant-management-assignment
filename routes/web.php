<?php

use App\Http\Controllers\ConcessionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\KitchenController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('concessions.index'));

Route::resource('concessions', ConcessionController::class);
Route::resource('orders', OrderController::class)->except(['edit', 'update']);
Route::post('orders/{id}/send-to-kitchen', [OrderController::class, 'sendToKitchen'])->name('orders.send-to-kitchen');
Route::get('kitchen', [KitchenController::class, 'index'])->name('kitchen.index');
Route::get('kitchen/{id}/status/{status}', [KitchenController::class, 'updateStatus'])->name('kitchen.update-status');