<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaktion;
use App\Models\Transaktion;
use Illuminate\Http\Request;

class KasirController extends Controller
{
    public function store(Request $request){
      
        $transaksi = Transaktion::create([
            "buyer" => $request->name,
            "status" => "proccess",
            "amount" => $request->amount
        ]);

        foreach($request->data as $data){
            DetailTransaktion::create([
                "transaktion_id" => $transaksi->id,
                "name" => $data["name"],
                "amount" => $data["amount"],
                "price" => $data["price"],
                "count" => $data["count"]
            ]);
        }

        return response()->json([
            "msg" => "Data berhasil ditambah"
        ]);
    }
}
