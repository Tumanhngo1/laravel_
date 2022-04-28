<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class ProductController extends Controller
{
    public function index(){
        return view('users.products.products',[
          'products' => Product::latest()->filter(request(['search','category']))
          ->paginate(7)->withQueryString(),
        ]);
    }

    
    public function show($slug, Store $session){
        $product = Product::where('slug',$slug)->first();

        $recentPros = $session->get('resent_products',[]);
        $recentPros[] = $product;
        if(count($recentPros) > 3){
            array_shift($recentPros);
        }
        $session->put('resent_products',$recentPros);

        return view('users.products.product',[
            'product' => $product
        ]);
    }
}
