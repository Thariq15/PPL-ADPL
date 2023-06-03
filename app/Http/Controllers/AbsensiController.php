<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function absen(){
        if(Auth::user()->positon == 'Karyawan'){
            $data = Absensi::with('shift')->where('user_id', Auth::user()->id)->get();
        }else{
            $data = Absensi::with('shift')->with('user')->get();
        }
        // dd($data);
        return view('dashboard.kasir.absensi.index', ['data' => $data]);
    }

    public function add(){
        $dateNow = date('D');
        $day = 'senin';
        switch ($dateNow){
            case 'Sun':
                $day = 'minggu';
                break;
            case 'Mon':
                $day = 'senin';
                break;
            case 'Tue':
                $day = 'selasa';
                break;
            case 'Thu':
                $day = 'rabu';
                break;
            case 'Wed':
                $day = 'kamis';
                break;
            case 'Fri':
                $day = 'jum\'at';
                break;    
            case 'Sat':
                $day = 'sabtu';
                break;     
        }
            
        $shift = Shift::where('hari', $day)->get();
        return view('dashboard.kasir.absensi.absensi', ['shift' => $shift]);
    }

    public function addCaffe(){
        $shift = Shift::get();
        return view('dashboard.caffe.absensi.add', ['shift' => $shift]);
    }

    public function storeCaffe(Request $request){
        $request->validate([
            'status' => ['required'],
            'shift' => ['required'],
        ]);
        
        Absensi::create([
            'status' => $request->status,
            'shift_id' => $request->shift,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('absensi.add')->with('success-add', 'Absensi berhasil ditambah');
    }
}
