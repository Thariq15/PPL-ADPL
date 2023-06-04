<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaktion;
use App\Models\Keuangan;
use App\Models\Transaktion;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index()
    {
        $data = Transaktion::with('detail_transaktions')->where('status', '!=', 'cancel')->where('status', '!=','done')->get();
        return view('dashboard.kasir.pesanan.index', ["data" => $data]);
    }

    public function riwayat()
    {
        $data = Transaktion::with('detail_transaktions')->where('status', 'done')->get();
        return view('dashboard.kasir.pesanan.index', ["data" => $data]);
    }

    public function update(Request $req)
    {
        $transaksi = Transaktion::find($req->id);
        $transaksi->status = $req->status;
        $transaksi->save();
        if(Auth::user()->position == 'Admin Kopi'){
            if($req->status == 'done'){
                Keuangan::create([
                    'keterangan' => 'Membayar barang habis supply',
                    'role' => 'Admin Caffe',
                    'nominal' => $req->nominal,
                    'jenis' => 'pengeluaran',
                    'tanggal' => date('Y-m-d')
                ]);

                Keuangan::create([
                    'keterangan' => 'kopi terjual',
                    'role' => 'Admin Kopi',
                    'nominal' => $req->nominal,
                    'jenis' => 'pemasukan',
                    'tanggal' => date('Y-m-d')
                ]);
            }
            return redirect()->route('transaksi')->with('updated', "Data berhasil dirubah");
        }
    
    
        return redirect()->route('kasir')->with('updated', "Data " . $transaksi->buyer . " berhasil dirubah");
    }

    public function deleteDetail(Request $req)
    {
        $id = $req->id;
        DetailTransaktion::destroy($id);
        return redirect()->route('kasir')->with('deleted', "Data berhasil dihapus");
    }

    public function add(){
        $data = Menu::get();
        return view('dashboard.kasir.pesanan.tambah', ['data' => $data]);
    }

}
