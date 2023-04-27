<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }
    
    public function store(Request $request) 
    {
        $validData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255'
        ]);

        $validData['password'] = bcrypt($validData['password']);
        // $validData['password'] = Hash::make($validData['password']);

        User::create($validData);

        return redirect('/login')->with('success','Registration Succes! Please Login' );

    }
}
