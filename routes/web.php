<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\RestaurantController::class, 'index'])->name('home');
Route::resources([
    'restaurants' => App\Http\Controllers\RestaurantController::class,
    'foods' => App\Http\Controllers\FoodController::class,
]);

Route::post('items', [App\Http\Controllers\ItemController::class, 'store'])->name('items.store');
Route::put('items/{item}', [App\Http\Controllers\ItemController::class, 'update'])->name('items.update');

Route::get('items/orders', [App\Http\Controllers\ItemController::class, 'createOrder'])->name('items.createOrder')->middleware('auth');

Route::post('orders', [App\Http\Controllers\ItemController::class, 'storeOrder'])->name('items.storeOrder')->middleware('auth');
Route::delete('items/{item_id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('items.destroy')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is-admin'])->group(function(){
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

Auth::routes();
