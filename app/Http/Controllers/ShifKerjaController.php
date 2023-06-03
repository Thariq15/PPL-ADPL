<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShifKerjaController extends Controller
{
    public function index(){
        $data = Shift::get();
        return view('dashboard.sift.index', ['data' => $data]);
    }

    public function add(){
        return view('dashboard.sift.add');
    }

    public function edit($id){
        $data = Shift::find($id);
        return view('dashboard.sift.edit', ['data' => $data]);
    }

    public function store(Request $request){
        $request->validate([
            "judul" => ['required'],
            "start" => ['required'],
            "end" => ['required'],
        ]);
        Shift::create([
            "judul" => $request->judul,
            "start" => $request->start,
            "end" => $request->end,
        ]);
        return redirect()->route('shift.add')->with('success-add', 'Shift Kerja berhasil ditambah');
    }

    public function update(Request $request){
        $request->validate([
            "judul" => ['required'],
            "start" => ['required'],
            "end" => ['required'],
        ]);
        $shift = Shift::find($request->id);
        $shift->judul = $request->judul;
        $shift->start = $request->start;
        $shift->end = $request->end;
        $shift->save();
        return redirect()->route('shift.edit', $request->id)->with('success-updated', 'Shift Kerja diupdate ditambah');
    }

    public function delete(){
        return view('dashboard.sift.index');
    }
}
