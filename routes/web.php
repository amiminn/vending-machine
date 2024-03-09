<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::controller(MainController::class)->group(function () {
    // user
    Route::get("/", "index");

    // admin
    Route::get("dashboard", "dashboard");
    Route::get("penjualan", "penjualan");
    Route::get("product", "produk");
    Route::get("tambah-product", "tambahproduk");

    Route::get("login", "login");
});
