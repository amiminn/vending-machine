<?php

namespace App\Http\Controllers\api;

use Amiminn\Support\Response;
use App\Http\Controllers\Controller;
use App\Models\PengaturanModel;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    public function index()
    {
        return PengaturanModel::first();
    }

    public function updatePengaturan(Request $request)
    {
        try {
            $data = PengaturanModel::first();
            $data->update([
                "ip" => $request->ip
            ]);
            return Response::success("pengaturan berhasil diperbarui.");
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
