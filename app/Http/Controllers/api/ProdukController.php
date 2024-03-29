<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Amiminn\Support\Response;
use Amiminn\Support\FileService;
use App\Models\ProdukModel;

class ProdukController extends Controller
{

    public function index()
    {
        return ProdukModel::get();
    }

    public function store(Request $request)
    {
        try {
            $gambar = FileService::saveOnetoAsset($request, "gambar", "produk");
            $data = [
                "nama" => $request->nama,
                "deskripsi" => $request->deskripsi,
                "harga" => $request->harga,
                "gambar" => $gambar,
                "stok" => $request->stok,
                "endpoint" => $request->endpoint,
            ];
            ProdukModel::create($data);
            return Response::success("produk berhasil tambahkan.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function show(string $id)
    {
        return ProdukModel::find($id);
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = [
                "nama" => $request->nama,
                "deskripsi" => $request->deskripsi,
                "harga" => $request->harga,
                "stok" => $request->stok,
            ];
            ProdukModel::find($id)->update($data);
            return Response::success("data produk berhasil diubah.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function destroy(string $id)
    {
        try {
            ProdukModel::find($id)->delete();
            return Response::success("produk berhasil dihapus.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
