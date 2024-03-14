<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return [
            "countProduk" => ProdukModel::count(),
            "countTransaksi" => TransaksiModel::count(),
        ];
    }
}
