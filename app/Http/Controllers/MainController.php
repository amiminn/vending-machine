<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    public function dashboard()
    {
        return Inertia::render("admin/dashboard");
    }

    public function index()
    {
        return Inertia::render("utama/index");
    }
}
