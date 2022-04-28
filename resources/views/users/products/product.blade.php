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
                <div class="border mt-4">
                    <p class="product-description">{!!$product->description!!}</p>
                </div>
            </div>
        </div>
    </div> 
</div>
<div class="container">
  <div class="border mt-2">
      @auth
        <form method="post" action="/products/{{$product->slug}}/comments">
            @csrf
            <header class="flex items-center">
                <h5 >{{ucfirst(auth()->user()->name)}}</h5>
            </header>
            <div class="form-group">
                <textarea name="body" id="" class="form-control" cols="" rows="" required></textarea>
            </div>
            @error('body')
            <span style="color: red">{{ $message }}</span>
            @enderror
            <div style="float: right">
                <button type="submit" class="btn btn-success mt-3">send</button>
            </div>
        </form>
      @endauth
      @foreach ($product->productcoments as $comment)
            <section>
                <article class="flex">
                    <div>
                        <span class="font-bold">{{ucfirst($comment->author->name)}} :</span>
                        <time class='post-date published' datetime='2018-06-27T20:23:00-07:00'>{{$comment->created_at->diffForHumans() }}</time>
                    </div>
                    <div>
                        <header>
                    
                        {{-- <p class="text-xs">{{$comment->created_at->diffForHumans()}}</p> --}}
                        </header>
                        <p>
                            {{ $comment->body }}
                        </p>
                    </div>
                </article>
            
            </section>
     @endforeach
  </div>
</div>

@endsection