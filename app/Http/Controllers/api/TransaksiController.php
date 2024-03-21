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
        return TransaksiModel::get();
    }

    public function createTransaksi(Request $request)
    {
        try {
            // cari produk id
            $produk = ProdukModel::find($request->idProduk);

            // data-pembayaran
            $data = [[
                "name" => $produk->nama,
                "price" => $produk->harga,
                "quantity" => 1,
            ]];

            $callback_url = "";

            $return_url = env("APP_URL") . "/pembayaran-success=" . $produk->id;

            $response = Tripay::generate("QRIS", $produk->harga, $data, $callback_url, $return_url);

            TransaksiModel::create([
                "data_produk" => json_encode($response),
                "produk_id" => $request->idProduk,
                "qr" => Response::uuid(),
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

            $produk = ProdukModel::find($id);
            TransaksiModel::where("produk_id", $id)->update(["status" => 1]);
            $produk->decrement("stok");
            $ip = PengaturanModel::first()->ip;
            event(new Pusher("transaksi", "transaksi.baru", compact("ip")));
        } catch (\Throwable $th) {
            return redirect()->to("/");
            // return halaman transaksi gagal, tidak dapat menemukan produk
        }
    }

    public function simulasi()
    {
        $ip = PengaturanModel::first()->ip;
        event(new Pusher("simulasi", "simulasi", compact("ip")));
        return PengaturanModel::first()->ip;
    }
}
