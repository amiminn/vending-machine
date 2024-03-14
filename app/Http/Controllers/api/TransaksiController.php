<?php

namespace App\Http\Controllers\api;

use Amiminn\Support\Response;
use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Http\Request;
use Amiminn\Support\Tripay;
use App\Models\ProdukModel;

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

            $callback_url = env("APP_URL") . "/api/callback-transaksi=" . $produk->id;

            $return_url = env("APP_URL") . "/pembayaran-success";

            // $response = Tripay::generate("QRIS", $produk->harga, $data, $callback_url, $return_url);
            $response = self::jsonDummy();

            TransaksiModel::create([
                "data_produk" => json_encode($response),
                "produk_id" => $request->idProduk,
                "qr" => Response::uuid(),
                "total" => $produk->harga
            ]);

            return $response["data"]["checkout_url"];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function callback($id)
    {
        // cari id
        $produk = ProdukModel::find($id);
        // ubah status transaksi
        TransaksiModel::where("produk_id", $id)->update(["status" => 1]);
        // kurangi stok produk
        $produk->decrement("stok");
    }

    public static function jsonDummy()
    {
        return [
            "success" => true,
            "message" => "",
            "data" => [
                "reference" => "DEV-T30149147601QY3HP",
                "merchant_ref" => "INV14032024-157",
                "payment_selection_type" => "static",
                "payment_method" => "QRIS",
                "payment_name" => "QRIS by ShopeePay",
                "customer_name" => "vmme-commerce",
                "customer_email" => "cs@vmme.fund",
                "customer_phone" => null,
                "callback_url" => "http://127.0.0.1:8000/api/callback-transaksi=1710422851683",
                "return_url" => "http://127.0.0.1:8000/pembayaran-success",
                "amount" => 5800,
                "fee_merchant" => 791,
                "fee_customer" => 0,
                "total_fee" => 791,
                "amount_received" => 5009,
                "pay_code" => null,
                "pay_url" => null,
                "checkout_url" => "https://tripay.co.id/checkout/DEV-T30149147601QY3HP",
                "status" => "UNPAID",
                "expired_time" => 1710427191,
                "order_items" => [
                    [
                        "sku" => null,
                        "name" => "Sprite",
                        "price" => 5800,
                        "quantity" => 1,
                        "subtotal" => 5800,
                        "product_url" => null,
                        "image_url" => null
                    ]
                ],
                "instructions" => [
                    [
                        "title" => "Pembayaran via QRIS (ShopeePay)",
                        "steps" => [
                            "Masuk ke aplikasi dompet digital Anda yang telah mendukung QRIS",
                            "Pindai/Scan QR Code yang tersedia",
                            "Akan muncul detail transaksi. Pastikan data transaksi sudah sesuai",
                            "Selesaikan proses pembayaran Anda",
                            "Transaksi selesai. Simpan bukti pembayaran Anda"
                        ]
                    ],
                    [
                        "title" => "Pembayaran via QRIS (Mobile)",
                        "steps" => [
                            "Download QR Code pada invoice",
                            "Masuk ke aplikasi dompet digital Anda yang telah mendukung QRIS",
                            "Upload QR Code yang telah di download tadi",
                            "Akan muncul detail transaksi. Pastikan data transaksi sudah sesuai",
                            "Selesaikan proses pembayaran Anda",
                            "Transaksi selesai. Simpan bukti pembayaran Anda"
                        ]
                    ]
                ],
                "qr_string" => "SANDBOX MODE",
                "qr_url" => "https://tripay.co.id/qr/DEV-T30149147601QY3HP"
            ]
        ];
    }
}
