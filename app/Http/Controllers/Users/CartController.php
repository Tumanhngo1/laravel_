<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class CartController extends Controller
{
    public function index(){
        $carts = session()->get('cart');
        return view('users.carts.home',compact('carts'));
    }
    
    public function show($id){
  
        $product = Product::findOrFail($id);
        $cart = session()->get('cart');
         if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] =  [
                'name' => $product['title'],
                'price' => $product['price'],
                'image' => $product['image'],
                'quantity' => 1
            ] ; 
        }
        session()->put('cart',$cart);
    
        return  view('users.carts.viewRend')->render();
  
    }

    public function update(){
        
        if(request()->id && request()->quantity){
            $carts = session()->get('cart');
            $carts[request()->id]['quantity'] = request()->quantity;
            session()->put('cart',$carts);
        }
        elseif(request()->id && request()->quantity <= 0 && !is_float(request()->quantity)){
            $this->destroy();
        }
        return view('users.carts.row');
    }



    public function destroy(){
       if(request()->id){
           $carts = session()->get('cart');
           unset($carts[request()->id]);
           session()->put('cart',$carts);
       }
       return view('users.carts.delete')->render();
    }

    public function testMail(){
        Mail::send('email.test',['name'=>'Ngo Manh Tu'],function($email){
            $email->to('tublue32@gmail.com',"Ngo Manh Tu");
            $email->subject('demo test');
        });
    }
}
