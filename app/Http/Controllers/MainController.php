<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function login()
    {
        return Inertia::render("auth/login");
    }

    public function dashboard()
    {
        return Inertia::render("admin/dashboard");
    }

    public function penjualan()
    {
        return Inertia::render("admin/penjualan");
    }

    public function produk()
    {
        return Inertia::render("admin/produk");
    }

    public function tambahproduk()
    {
        return Inertia::render("admin/tambahproduk");
    }

    public function index()
    {
        return Inertia::render("utama/index");
    }
}
