<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    // VIEW METHOD
    public function index()
    {
        $data = Product::get();
        return view('dashboard.product.index', ["data" => $data]);
    }

    public function add()
    {
        return view('dashboard.product.add');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('dashboard.product.edit', ["product" => $product]);
    }

    // PROCCESS METHOD
    public function update(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:30', 'min:3'],
            "price" => ['required', 'numeric'],
            "description" => ['required'],

        ]);


        $user = Product::find($request->id);
        $user->name = $request->name;
        if($request->file('image')){

            $file = $request->file('image');
            $random = Str::random(8);
            $extension = $file->getClientOriginalExtension();
            $name = $random . '.' . $extension;
            $destiny = 'assets/img/product';
            $file->move($destiny, $name);
            $path = $destiny . "/" . $name;
            $user->image = $path;
        }



        $user->description = $request->description;
        $user->price = $request->price;
        $user->stock = $request->stock;
        $user->save();

        return redirect()->route('product.edit', $request->id)->with('success-updated', 'Menu telah berhasil diubah didaftar menu');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:30', 'min:3'],
            "price" => ['required', 'numeric'],
            "description" => ['required'],
            "stock" => ['required'],
            "image" => ['required']
        ]);

        $file = $request->file('image');
        $random = Str::random(8);
        $extension = $file->getClientOriginalExtension();
        $name = $random . '.' . $extension;
        $destiny = 'assets/img/product';
        $file->move($destiny, $name);
        $path = $destiny . "/" . $name;

        $user = new Product();
        $user->name = $request->name;
        $user->image = $path;
        $user->description = $request->description;
        $user->price = $request->price;
        $user->stock = $request->stock;
        $user->save();

        return redirect()->route('product.add')->with('success-add', 'Menu telah berhasil ditambah didaftar menu');
    }
}
