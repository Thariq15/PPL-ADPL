<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use App\Models\Transaktion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $data['produk'] = Product::get();
        $data['menu'] = Menu::get();
        return view('index', ['data' => $data]);
    }
}
