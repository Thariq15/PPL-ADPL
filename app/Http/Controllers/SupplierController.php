<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaktion;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
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
        return view('dashboard.caffe.supply.table');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
