<?php

namespace App\Http\Controllers;

use App\Models\Transaktion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [];
        if(Auth::user()->position == 'Karyawan'){
            $data['kerja'] = [];
            $data['absensi'] = [];
            $data["pesanan"] = Transaktion::with('detail_transaktions')->get();
        }

        return view('dashboard.index', [
            "title" => "Dashboard",
            "data" => $data,
        ]);
    }
}
