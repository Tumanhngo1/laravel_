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
                    <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                </div>
            </div>
        </div>
        @endforeach
        
        {{-- <div class="col-md-4">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-15%</span> <span class="wishlist"><i class="fa fa-heart"></i></span> </div> <img src="https://i.imgur.com/gGyOciQ.jpg" class="img-fluid">
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Black top caps</h6> <span class="text-danger font-weight-bold">$1.99</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                        <div class="size"> <label class="radio"> <input type="radio" name="size2" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size2" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size2" value="Large"> <span>L</span> </label> </div>
                    </div>
                    <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-35%</span> <span class="wishlist"><i class="fa fa-heart"></i></span> </div> <img src="https://i.imgur.com/3VuD1Ij.jpg" class="img-fluid">
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Kiton sui suit</h6> <span class="text-danger font-weight-bold">$3.99</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                        <div class="size"> <label class="radio"> <input type="radio" name="size3" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size3" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size3" value="Large"> <span>L</span> </label> </div>
                    </div>
                    <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-25%</span> <span class="wishlist"><i class="fa fa-heart"></i></span> </div> <img src="https://i.imgur.com/psvQPza.jpg" class="img-fluid">
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Long red shirt</h6> <span class="text-danger font-weight-bold">$4.99</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                        <div class="size"> <label class="radio"> <input type="radio" name="size4" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size4" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size4" value="Large"> <span>L</span> </label> </div>
                    </div>
                    <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-25%</span> <span class="wishlist"><i class="fa fa-heart"></i></span> </div> <img src="https://i.imgur.com/5l1bL3Y.jpg" class="img-fluid">
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">Long black t-shirt</h6> <span class="text-danger font-weight-bold">$3.99</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                        <div class="size"> <label class="radio"> <input type="radio" name="size5" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size5" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size5" value="Large"> <span>L</span> </label> </div>
                    </div>
                    <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="img-container">
                    <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-25%</span> <span class="wishlist"><i class="fa fa-heart"></i></span> </div> <img src="https://i.imgur.com/9StAn6x.jpg" class="img-fluid">
                </div>
                <div class="product-detail-container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="mb-0">TINONG white specs</h6> <span class="text-danger font-weight-bold">$3.99</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                        <div class="size"> <label class="radio"> <input type="radio" name="size6" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size6" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size6" value="Large"> <span>L</span> </label> </div>
                    </div>
                    <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection