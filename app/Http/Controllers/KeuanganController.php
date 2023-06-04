<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaktion;
use App\Models\Keuangan;
use App\Models\Transaktion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Keuangan::where('role', Auth::user()->position)->get();
        $pengeluaran =  Keuangan::where('role', Auth::user()->position)->where('jenis', 'pengeluaran')->get()->sum('nominal');
        $pemasukan =  Keuangan::where('role', Auth::user()->position)->where('jenis', 'pemasukan')->get()->sum('nominal');
     
        return view('dashboard.admin.keuangan.index', ['data' => $data, 'total' => $pemasukan - $pengeluaran]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Transaktion::where('status', 'done')->where('status_rekap', 'belum')->where('role', 'Admin Caffe')->get();
        return view('dashboard.admin.keuangan.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::transaction(function(){
            $dt = Transaktion::with('detail_transaktions')->where('status_rekap', 'belum')->where('status', 'done')->where('role', 'Admin Caffe')->get();
            $jumlah = 0;
            foreach ($dt as $item) {
                $jumlah += $item->detail_transaktions->sum('amount');
                $tr = Transaktion::find($item->id);
                $tr->status_rekap = 'sudah';
                $tr->save();
            }
            $keuangan = Keuangan::create([
                'keterangan' => 'Rekap transaksi kasir',
                'nominal' => $jumlah,
                'tanggal' => Date('Y-m-d'),
                'jenis' => 'pemasukan',
                'role' => 'Admin Caffe'
            ]);
        });
        return redirect()->route('keuangan.add')->with('success-add', 'Rekap berhasil ditambah ke data keuangan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
