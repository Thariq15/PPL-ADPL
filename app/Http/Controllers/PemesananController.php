<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaktion;
use App\Models\Transaktion;
use Illuminate\Http\Request;
use App\Models\Menu;

class PemesananController extends Controller
{
    public function index()
    {
        $data = Transaktion::with('detail_transaktions')->where('status', '!=', 'cancel')->where('status', '!=','done')->get();
        // dd($data);
        return view('dashboard.kasir.pesanan.index', ["data" => $data]);
    }

    public function riwayat()
    {
        $data = Transaktion::with('detail_transaktions')->where('status', 'done')->get();
        // dd($data);
        return view('dashboard.kasir.pesanan.index', ["data" => $data]);
    }

    public function update(Request $req)
    {
        $transaksi = Transaktion::find($req->id);
        $transaksi->status = $req->status;
        $transaksi->save();

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
        // dd($data);
        return view('dashboard.kasir.pesanan.tambah', ['data' => $data]);
    }

}
