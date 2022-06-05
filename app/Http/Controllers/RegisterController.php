<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index', [
            "title" => "Register",
            "active" => "register"
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            "name" => "required|max:255",
            "email" => "required|email:dns|max:255",
            "password" => "required|min:5|max:255"
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registration successfull!! Please login.');

        return redirect('/login');
    }
}
