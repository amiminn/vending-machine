<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\ProdukModel;
use App\Models\TransaksiModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return [
            "countProduk" => ProdukModel::count(),
            "countTransaksi" => TransaksiModel::count(),
            "countPendapatan" => TransaksiModel::sum("total"),
        ];
    }

    public function dataChart()
    {
        return self::value_bulan();
    }

    private static function value_bulan()
    {
        return collect(self::bulan())->map(function ($data) {
            return ["x" => $data["bulan"], "y" => TransaksiModel::where('created_at', 'like', $data["format"] . '%')->sum('total')];
        });
    }

    private static function bulan()
    {
        return collect(TransaksiModel::whereYear("created_at", date('Y'))->get("created_at"))->map(function ($data) {
            $myDate = Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('Y-m-d');
            $date = Carbon::createFromFormat('Y-m-d', $myDate);
            return [
                "bulan" => $date->format('F'),
                "format" => $date->format('Y-m')
            ];
        })->unique()->values();
    }
}
