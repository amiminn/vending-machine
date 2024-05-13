<?php

namespace App\Http\Controllers\api;

use App\Pusher;
use Amiminn\Support\Response;
use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Amiminn\Support\Tripay;
use App\Models\PengaturanModel;
use App\Models\ProdukModel;
use Illuminate\Support\Facades\Http;

class TransaksiController extends Controller
{
    public function index()
    {
        return TransaksiModel::orderByDesc("id")->get();
    }

    public function createTransaksi(Request $request)
    {
        try {
            $produk = ProdukModel::find($request->idProduk);
            $pengaturan = PengaturanModel::first();
            $data = [[
                "name" => $produk->nama,
                "price" => $produk->harga,
                "quantity" => 1,
            ]];
            $uuid = Response::uuid();
            $return_url = "http://" . $pengaturan->server . "/pembayaran-success=" . $uuid;
            $response = Tripay::generate("QRIS", $produk->harga, $data, "", $return_url);
            TransaksiModel::create([
                "data_produk" => json_encode($response),
                "produk_id" => $request->idProduk,
                "uuid" => $uuid,
                "total" => $produk->harga
            ]);
            return $response->data->checkout_url;
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public static function callback($id)
    {
        try {
            $transaksi = TransaksiModel::where("uuid", $id)->first();
            $produk = ProdukModel::find($transaksi->produk_id);
            $produk->decrement("stok");
            $transaksi->update(["status" => 1]);
            $ip = PengaturanModel::first()->ip;
            $hit = 'http://' . $ip . '/' . $produk->endpoint;
            event(new Pusher("transaksi", "transaksi.baru", compact("hit")));
        } catch (\Throwable $th) {
            return redirect()->to("/");
        }
    }
}
