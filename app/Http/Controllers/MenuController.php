<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    // VIEW METHOD
    public function index()
    {
        $menus = Menu::get();
        return view('dashboard.menu.index', ["data" => $menus]);
    }

    public function add()
    {
        return view('dashboard.menu.add');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('dashboard.menu.edit', ["menu" => $menu]);
    }

    public function supply()
    {
        $data = Product::get();
        return view('dashboard.menu', ['data' => $data]);
    }

    // PROCCESS METHOD
    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:30', 'min:3'],
            "price" => ['required', 'numeric'],
            "description" => ['required'],
            "status" => ['required'],
            "image" => ['required']
        ]);

        $file = $request->file('image');
        $random = Str::random(8);
        $extension = $file->getClientOriginalExtension();
        $name = $random . '.' . $extension;
        $destiny = 'assets/img/menu';
        $file->move($destiny, $name);
        $path = $destiny . "/" . $name;

        $user = new Menu();
        $user->name = $request->name;
        $user->image = $path;
        $user->description = $request->description;
        $user->price = $request->price;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('menu.add')->with('success-add', 'Menu telah berhasil ditambah didaftar menu');
    }

    public function update(Request $request)
    {
        $request->validate([
            "name" => ['required', 'max:30', 'min:3'],
            "price" => ['required', 'numeric'],
            "description" => ['required'],
            "status" => ['required'],
        ]);

        $user = Menu::find($request->id);
        $user->name = $request->name;
        if($request->file('image')){
            $file = $request->file('image');
            $random = Str::random(8);
            $extension = $file->getClientOriginalExtension();
            $name = $random . '.' . $extension;
            $destiny = 'assets/img/menu';
            $file->move($destiny, $name);
            $path = $destiny . "/" . $name;
            $user->image = $path;
        }
        $user->description = $request->description;
        $user->price = $request->price;
        $user->status = $request->status;
        $user->save();

        return redirect()->route('menu.edit', $request->id)->with('success-updated', 'Menu telah berhasil diupdate didaftar menu');
    }
}
