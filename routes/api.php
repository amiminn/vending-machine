<?php

use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\PengaturanController;
use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::apiResource("produk", ProdukController::class);
Route::get("dashboard", [DashboardController::class, "index"]);
Route::get("data-chart", [DashboardController::class, "dataChart"]);
Route::controller(TransaksiController::class)->group(function () {
    Route::get("transaksi", "index");
    Route::post("create-transaksi", "createTransaksi");
    Route::get("callback-transaksi={id}", "callback");
    Route::get("simulasi", "simulasi");
});
Route::controller(PengaturanController::class)->group(function () {
    Route::get("pengaturan", "index");
    Route::post("pengaturan", "updatePengaturan");
});

Route::get("success", function () {
    return response()->json(["success" => true]);
});
