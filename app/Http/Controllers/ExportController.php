<?php

namespace App\Http\Controllers;

use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class ExportController extends Controller
{
    public function index(){
        $data = Keuangan::where('role', Auth::user()->position)->get();
        $pengeluaran =  Keuangan::where('role', Auth::user()->position)->where('jenis', 'pengeluaran')->get()->sum('nominal');
        $pemasukan =  Keuangan::where('role', Auth::user()->position)->where('jenis', 'pemasukan')->get()->sum('nominal');

        $pdf = PDF::loadView('keuangan', array('data' =>  $data,  'total' => $pemasukan - $pengeluaran))
        ->setPaper('a4', 'portrait');

        return $pdf->download('keuanagan-details.pdf');  
        // download PDF file with download method

    }
}
