<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaktion;
use App\Models\Product;
use App\Models\Transaktion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    protected $req;
    /**
     * Display a listing of the resource.
     */
    public function add()
    {
        $data = Product::get();
        return view('dashboard.caffe.supply.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function index()
    {
        $data = Transaktion::with('detail_transaktions')->where('role', 'Admin Kopi')->get();
        // dd($data[0]->detail_transaktions);
        return view('dashboard.caffe.supply.table', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "stock" => ['required'],
            "name" => ['required'],
            "price" => ['required'],
        ]);
        $this->req = $request;
        DB::transaction(function(){
            $transaksion = Transaktion::create([
                "buyer" => "Caffe Ngopisedoyo",
                "role" => 'Admin Kopi',
            ]);
    
            DetailTransaktion::create([
                'transaktion_id' => $transaksion->id,
                'name' => $this->req->name,
                'price' => $this->req->price,
                'count' => $this->req->stock,
                'amount' => $this->req->price * $this->req->stock
            ]);

            $produk = Product::find($this->req->id);
            // dd($this->req->id);
            $produk->stock = $produk->stock - $this->req->stock;
            $produk->save();
        });

        return redirect()->route('supply')->with('success-add', 'Berhasil pesan');
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
    public function update(Request $request)
    {
        // dd($request->stock);
        $supply = DetailTransaktion::find($request->id);
  
        $supply->count = $request->stock;
        $supply->amount = $request->stock * $supply->price;
        $supply->save();

        return redirect()->route('supply')->with('success-updated', 'Anda berhasil mengubah data.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
