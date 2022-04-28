<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        $attributes = request()->validate([
            'name'=>'required',
            'username'=>'required|alpha',
            'email'=>'required|email|unique:users,email,id',
            'password'=>'required',
        ]);

        User::create($attributes);
        return  redirect('/login');//->with('success','okela day');
    }
}
