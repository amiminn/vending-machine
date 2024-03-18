<?php

use App\Http\Controllers\api\DashboardController;
use App\Http\Controllers\api\PengaturanController;
use App\Http\Controllers\api\ProdukController;
use App\Http\Controllers\api\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::apiResource("produk", ProdukController::class);
Route::get("dashboard", [DashboardController::class, "index"]);
Route::get("data-chart", [DashboardController::class, "dataChart"]);
Route::controller(TransaksiController::class)->group(function () {
    Route::get("transaksi", "index");
    Route::post("create-transaksi", "createTransaksi");
    Route::get("callback-transaksi={id}", "callback");
});
Route::controller(PengaturanController::class)->group(function () {
    Route::get("pengaturan", "index");
    Route::post("pengaturan", "updatePengaturan");
});

Route::get("simulasi", [TransaksiController::class, "simulasi"]);
