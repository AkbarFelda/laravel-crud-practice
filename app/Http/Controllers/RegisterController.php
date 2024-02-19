<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller

{
    public function index()
    {
        return view('register.index', [
            "title" => "Register"
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|max:255',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|max:255'
    //     ]);

    //     $validatedData['password'] = Hash::make($validatedData['password']);
    //     $result = User::create($validatedData);
    //     if ($result) {
    //         return redirect('/login/index')->with('success', 'Registration success! Please login.');
    //     }
    // }    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = User::create($validatedData);
        return redirect('/login/index')->with('success', 'Registration success! Please login.');
    }
}
