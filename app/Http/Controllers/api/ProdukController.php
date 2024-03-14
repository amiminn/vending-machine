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
                "harga" => $request->harga,
                "gambar" => $gambar,
                "stok" => $request->stok,
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
        //
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
