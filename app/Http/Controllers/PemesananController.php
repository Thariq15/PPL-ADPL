<?php

namespace App\Http\Controllers;

use App\Models\Transaktion;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $data = Transaktion::get();
        return view('dashboard.kasir.pesanan.index', ["data" => $data]);
    }
}
