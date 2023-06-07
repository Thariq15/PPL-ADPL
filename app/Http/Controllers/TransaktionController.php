<?php

namespace App\Http\Controllers;

use App\Models\Transaktion;
use Illuminate\Support\Facades\Auth;

class TransaktionController extends Controller
{
    public function index(){
        $data = Transaktion::with('detail_transaktions')->where('status','!=', 'done')->where('role', Auth::user()->position)->get();
        return view('dashboard.admin.transaction.index', ['data' => $data]);
    }

    public function riwayat(){
        $data = Transaktion::with('detail_transaktions')->where('status', 'done')->where('role', Auth::user()->position)->get();
        return view('dashboard.admin.transaction.riwayat', ['data' => $data]);
    }
}
