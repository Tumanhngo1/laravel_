@extends('users.layouts.home')

@section('content')
<div id='nav-search'>
    <form action='/products/?search' class='search-form' role='search'>
    <input autocomplete='off' class='search-input' name='search' placeholder='Search this blog' type='search' value=''/>
    <span class='hide-search'></span>
    </form>
    </div>
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
                        <div class="size"> <label class="radio"> <input type="radio" name="size1" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size1" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size1" value="Large"> <span>L</span> </label> </div>
                    </div>
                    <div>
                    <a href="/products/{{$product->slug}}" class="btn btn-danger" style="color: #b4cbd7">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
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
@endsection