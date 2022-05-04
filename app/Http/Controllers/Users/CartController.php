<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        
        return view('users.carts.home');
    }
    
    public function show($id){
  
        $product = Product::find($id);
        $cart = session()->get('cart');
         if (isset($cart[$id])) {
            $cart[$id]['quantity'] ++;
        } else {
            $cart[$id] =  [
                'name' => $product['title'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ] ; 
        }
        session()->put('cart',$cart);
        return response()->json([
            'code' => 200,
        ],200);
    }

    public function update(){
        // if(request()->id == false){
        //     return "hihi";
        // }
        if(request()->id && request()->quantity){
            $carts = session()->get('cart');
            $carts[request()->id]['quantity'] = request()->quantity;
            session()->put('cart',$carts);
        }
        elseif(request()->id && request()->quantity == 0){
            $carts = session()->get('cart');
           unset($carts[request()->id]);
           session()->put('cart',$carts);
        }
    }

    public function destroy(){
       if(request()->id){
           $carts = session()->get('cart');
           unset($carts[request()->id]);
           session()->put('cart',$carts);
       }
    }
}
