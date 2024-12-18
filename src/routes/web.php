<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



// 検索処理
Route::get("/products/search",[ProductController::class,"search"])->name("products.search");

// 商品一覧画面表示
Route::get("/products",[ProductController::class,"index"])->name("products.index");

// 商品登録画面表示
Route::get("/products/register",[ProductController::class,"create"])->name("products.create");

// 商品登録処理
Route::post("/products/register",[ProductController::class,"store"])->name("products.store");

// 商品詳細画面表示
Route::get("/products/{productId}",[ProductController::class,"edit"])->name("products.edit");

// 商品更新処理
Route::patch("/products/{productId}/update",[ProductController::class,"update"])->name("products.update");

// 削除処理
Route::get("/products/{productId}/delete",[ProductController::class,"destroy"])->name("product.destroy");



