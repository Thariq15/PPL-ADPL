<?php

namespace App\Http\Controllers;

use App\Models\Transaktion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaktionController extends Controller
{
    public function index(){
        $data = Transaktion::with('detail_transaktions')->where('role', Auth::user()->position)->get();
        // dd($data);
        return view('dashboard.admin.transaction.index', ['data' => $data]);
    }
}
