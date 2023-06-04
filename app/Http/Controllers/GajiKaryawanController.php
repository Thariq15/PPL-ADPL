<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Keuangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class GajiKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Gaji::with('user')->get();
    
        return view('dashboard.caffe.penggajian.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = User::where('position', 'Karyawan')->get();
        return view('dashboard.caffe.penggajian.add', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Gaji::create([
            "user_id" => $request->user_id,
            "gaji" => $request->gaji,
            "bulan" => $request->month,
        ]);

        Keuangan::create([
            'keterangan' => 'Keterangan gaji',
            'nominal' => $request->gaji,
            'jenis' => 'pengeluaran',
            'tanggal' => Date('Y-m-d'),
            'role' => 'Admin Caffe'
        ]);

        return redirect()->route('gaji.add')->with('success-add', 'Gaji Berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['user'] = User::get();
        $data['gaji'] = Gaji::find($id); 
        return view('dashboard.caffe.penggajian.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $gaji = Gaji::find($request->id);
        $gaji->bulan = $request->bulan;
        $gaji->gaji = $request->gaji;
        $gaji->save();

        return redirect()->route('gaji.edit', $request->id)->with('success-updated', 'Gaji Berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
