@extends('users.layouts.home')

@section('content')
<div id='nav-search'>
    <form action='/products/?search' class='search-form' role='search'>
    <input autocomplete='off' class='search-input' name='search' placeholder='Search this blog' type='search' value=''/>
    <span class='hide-search'></span>
    </form>
</div>
<span class="ajax-message" ></span>
    <a href="{{route('cart')}}">cart</a>
<div class="container-fluid mt-3 mb-3">
    <div class="row g-2">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first">
                         <span class="percent">-25%</span> <span class="wishlist">
                             <i class="fa fa-heart"></i></span> </div> <img src="{{asset('storage/'. $product->image)}}" class="img-fluid">
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="/products/{{$product->slug}}">
                            <h6 class="mb-0">{{$product->title}}</h6> <span class="text-danger font-weight-bold">
                        </a>
                            {{number_format($product->price,0,'.','.')}} đ</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                        <div class="">
                             <label class="size">Size:</label> 
                                <select name="size" id="">
                                    @foreach($product->sizes as $size)
                                     <option value="{{$size->id}}">{{$size->size}}</option>
                                     @endforeach
                                </select>                      
                        </div>
                    </div>
                    <div>
                    <a href="/products/{{$product->slug}}" class="btn btn-danger" style="color: #b4cbd7">Buy Now</a>
                    <a class="btn btn-info add-to-cart" data-id="{{ route('addToCart',$product->id) }}" href="#"><i class="fa-solid fa-cart-plus"></i></a>
                    </div>
                   
                   
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- @if(Session::has('resent_products'))

<div class="container">
    <div class="row">
        <div class="border text-center mt-5" style="margin: 0 auto; width:70%; background:#b4cbd7">
            <h3>San pham vua xem</h3>
        </div>
        @foreach (Session::get('resent_products') as $item)
        <div class="col-md-4">
                <div class="card">
                    <div class="img-container">
                        <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-15%</span> 
                            <span class="wishlist"><i class="fa fa-heart"></i></span> </div> 
                            <img src="{{asset('storage/'. $item->image)}}" class="img-fluid">
                    </div>
                    <div class="product-detail-container">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">{{$item->title}}</h6> <span class="text-danger font-weight-bold">{{number_format($item->price)}} VND</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                            <div class="size"> <label class="radio"> <input type="radio" name="size2" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size2" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size2" value="Large"> <span>L</span> </label> </div>
                        </div>
                        <div class="mt-3">
                            <a href="/products/{{$item->slug}}" class="btn btn-danger" style="color: #b4cbd7">Buy Now</a>
                           
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endif --}}
{{-- @if(Session::has('cart'))
<div class="container">
    <div class="row">
        <div class="border text-center mt-5" style="margin: 0 auto; width:70%; background:#b4cbd7">
            <h3>San pham vua xem</h3>
        </div>
        @foreach (Session::get('cart') as $key => $item)
        {{dd(Session::get('cart'))}}
        <div class="col-md-4">
                <div class="card">
                    <div class="img-container">
                        <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-15%</span> 
                            <span class="wishlist"><i class="fa fa-heart"></i></span> </div> 
                            <img src="{{asset('storage/'. $item->image)}}" class="img-fluid">
                    </div>
                    <div class="product-detail-container">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">{{$item->name}}</h6> <span class="text-danger font-weight-bold">{{number_format($item->price)}} VND</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                            <div class="size"> <label class="radio"> <input type="radio" name="size2" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size2" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size2" value="Large"> <span>L</span> </label> </div>
                        </div>
                        <div class="mt-3">
                            <a href="/products/{{$item->slug}}" class="btn btn-danger" style="color: #b4cbd7">Buy Now</a>
                           
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endif --}}

@endsection