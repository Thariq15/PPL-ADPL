<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShifKerjaController extends Controller
{
    public function index(){
        return view('dashboard.sift.index');
    }

    public function add(){
        return view('dashboard.sift.add');
    }

    public function edit(){
        return view('dashboard.sift.edit');
    }

    public function store(){
        return view('dashboard.sift.index');
    }

    public function update(){
        return view('dashboard.sift.index');
    }

    public function delete(){
        return view('dashboard.sift.index');
    }
}
