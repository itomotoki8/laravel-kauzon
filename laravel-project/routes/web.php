<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\WebhookController;

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

// ログインしなくても閲覧可能
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/item/{id}',[ItemController::class,'index'])->name('item');
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('stripe/webhook',[WebhookController::class,'handleWebhook']);

Route::get('/create',[ItemController::class,'create'])->name('create');

Route::post('/create/confirmation',[ItemController::class,'create_confirmation'])->name('create_confirmation');

Route::post('/item/add',[ItemController::class,'add'])->name('add');

Route::get('/review',[ReviewController::class,'reviews']);

Route::get('/category/{id}',[CategoryController::class,'index'])->name('category');

Route::get('/search',[ItemController::class,'search']);

Route::get('/category_search',[CategoryController::class,'category_search'])->name('category_search');

Route::get('/no_category',[CategoryController::class,'no_category'])->name('no_category');


// ログインしなければ閲覧不可
Route::middleware('auth')->group(function () {
        
    Route::get('/cart',[CartController::class,'index'])->name('cart');

    Route::post('/cart/{id}',[CartController::class,'delete'])->name('cart_delete');

    Route::get('/total_count',[CartController::class,'total_count'])->name('total_count');

    Route::post('/checkout',[CartController::class,'checkout'])->name('checkout');

    Route::get('/success',[CartController::class,'success'])->name('success');

    Route::get('/success2',[CartController::class,'success2'])->name('success2');

    Route::get('/history',[HistoryController::class,'index'])->name('history');

    Route::get('/item/review/{id}',[ItemController::class,'review'])->name('review');    
    
    Route::post('/item/review/{id}',[ReviewController::class,'readReview']);

    Route::get('/compreate',[ReviewController::class,'compreate']);
});

require __DIR__.'/auth.php';
