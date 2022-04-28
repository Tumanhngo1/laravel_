@extends('users.layouts.home')

@section('content')
<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">
                    
                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="{{asset('storage/'. $product->image)}}" /></div>
                      <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
                      <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
                    </div>
                    <ul class="preview-thumbnail nav nav-tabs">
                      <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                      <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
                    </ul>
                    
                </div>
                <div class="details col-md-6">
                    <h3 class="product-title">{{$product->title}}</h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <span class="review-no">41 reviews</span>
                    </div>
                    <p class="product-description">{!!$product->description!!}</p>
                    <h4 class="price">current price: <span>{{number_format($product->price)}} VND</span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>
                    <div class="action">
                        <button class="add-to-cart btn btn-default" type="button">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="container">
    <div class="row">
        <div>
            <h3>San pham vua xem</h3>
        </div>
       
        @foreach (Session::get('resent_products') as $item)
        <div class="col-md-4">
                <div class="card">
                    <div class="img-container">
                        <div class="d-flex justify-content-between align-items-center p-2 first"> <span class="percent">-15%</span> 
                            <span class="wishlist"><i class="fa fa-heart"></i></span> </div> 
                            <img src="{{asset('storage/'. $product->image)}}" class="img-fluid">
                    </div>
                    <div class="product-detail-container">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">{{$item->title}}</h6> <span class="text-danger font-weight-bold">{{$item->price}}</span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="ratings"> <i class="fa fa-star"></i> <span>4.5</span> </div>
                            <div class="size"> <label class="radio"> <input type="radio" name="size2" value="small"> <span>S</span> </label> <label class="radio"> <input type="radio" name="size2" value="Medium" checked> <span>M</span> </label> <label class="radio"> <input type="radio" name="size2" value="Large"> <span>L</span> </label> </div>
                        </div>
                        <div class="mt-3"> <button class="btn btn-danger btn-block">Buy Now</button> </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>
</div>
@endsection