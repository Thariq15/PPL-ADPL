<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DetailTransaktion;
use App\Models\Transaktion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{
    protected $name;
    protected $dataReq;

    public function store(Request $request){
        $this->name  =$request->name;
        $this->dataReq = $request->data;
        DB::transaction(function (){
            $transaksi = Transaktion::create([
                "buyer" => $this->name,
                "status" => "proccess",
                "role" => 'Admin Caffe',
            ]);
    
            foreach($this->dataReq as $data){
                DetailTransaktion::create([
                    "transaktion_id" => $transaksi->id,
                    "name" => $data["name"],
                    "amount" => $data["amount"],
                    "price" => $data["price"],
                    "count" => $data["count"]
                ]);
            }
        });

        return response()->json([
            "msg" => "Data berhasil ditambah"
        ]);
    }
}
