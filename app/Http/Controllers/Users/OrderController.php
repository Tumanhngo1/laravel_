<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(){
        return view('users.orders.order');
    }
    public function store(){
        dd(request()->all());
        foreach(session()->get('cart') as $id => $cart){
        // $cart->name;
        // dd($cart['name']);
        }
       
        // return 'hihi';
    }
}
