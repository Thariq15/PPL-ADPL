<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    public function absen(){
        return view('dashboard.kasir.absensi.index');
    }

    public function add(){
        return view('dashboard.kasir.absensi.absensi');
    }
}
