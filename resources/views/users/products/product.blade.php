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
                        <select name="size" id="">
                            @foreach($product->sizes as $size)
                            <option value="{{$size->id}}">{{$size->size}}</option>
                            @endforeach
                        </select>
                        
                        {{-- <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span> --}}
                    </h5>
                    <h5 class="colors">colors:
                       
                        <div class="form-group">
                            @foreach($product->colors as $color) 
                            <input type="radio" class="form-control col-md-3" style="background: {{$color->color}}"  name="color{{$color->id}}" value="30">
                            {{-- <span style="color:  {{$color->color}}">x</span> --}}
                            @endforeach
                           
                        </div>
                       
                    </h5>
                    {{-- <div class="action"> --}}
                        <button class="btn btn-default add-to-cart " data="{{$product->id}}" data-id="{{ route('addToCart',$product->id) }}" type="button" data-toggle="modal" data-target="#myModal">add to cart</button>
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
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            
          </div>
          <div class="modal-body">
              <div class="view-render">

              </div>
            {{-- <table class="table" id="render">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">san pham</th>
                    <th scope="col">title</th>
                    <th scope="col">price</th>
                    <th scope="col">so luong</th>
                    <th scope="col">total</th>
                    <th scope="col">action</th>
                  </tr>
                </thead>
                @php
                $total = 0;   
                @endphp
                @if(Session::has('cart'))
                    <tbody>
                        @foreach ($carts as $id => $cart)
                    
                        <tr  data-id="{{$id}}">
                            <th scope="row">{{ $id }}</th>
                            <td style="width: 15%">
                                <img style="width:100%" src="{{ asset('storage/' . $cart['image']) }}" alt="">
                            </td>
                            <td style="width: 20%">{{ $cart['name'] }}</td>
                            <td id="price" price="{{ $cart['price'] }}">{{ number_format($cart['price'], '0', '.', '.') }}
                                VND
                            </td>
                            <td>
                                <div id="btn-qt">
                                    <button class="btn-qty discount update" data-id="{{ $id }}"
                                        data="{{ $id }}" id="add">-</button>
                                    <input type="number" data="{{ $id }}" id="qty_{{ $id }}"
                                        value="{{ $cart['quantity'] }}" min="0" class="update-cart"
                                        data-url="{{ route('update') }}">
                                    <button class="btn-qty increase update " data-id="{{ $id }}"
                                        data="{{ $id }}" id="add">+</button>
                                </div>
    
                            </td>
                            <td class="total" total-cart="{{ $cart['price'] * $cart['quantity'] }}">
                                {{ number_format($cart['price'] * $cart['quantity'], '0', '.', '.') }} VND
                            </td>
                            <td>
                                <a class="delete" data-url="{{ route('delete') }}" data-id="{{ $id }}"
                                    href=""><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                                    @php
                                        $total += $cart['price']*$cart['quantity'];   
                                    @endphp
                            @endforeach
                    </tbody>
                @endif
            </table>  --}}
            {{-- @include('users.carts.row') --}}
           
          
          <div class="modal-footer">
            <div>
                <a class="btn btn-success" style="color: white" href="{{route('cart')}}">di toi gio hang</a>
            </div>
            <button class="btn btn-info payment">Thanh toan</button>
          </div>
          <div style="display: none" class=" pay">
            <hr>
            @include('users.carts.payment')
            {{-- <form action="" method="POST">
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <h4>Thong tin mua hang</h4>
                            <div class="form-group">
                                
                                <input type="text" id="name" name="name" class="form-control" placeholder="Ho va Ten">
                            </div>
                            <div class="form-group">
                                
                                <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" class="form-control" rows="10"></textarea>
                               
                            </div>
                        </div>
                        <div class="col-6">
                            <h4>Thanh toan</h4>
                            <select name="pay" id="" class="form-control">
                                <option value="0">Thanh toan khi giao hang (COD)</option>
                                <option value="1">Chuyen khoan qua ngan hang</option>
                            </select>
                            
                        </div>
                      
                    </div>
                    <button type="submit" style="float: right" class="btn btn-success mb-3">Dat mua</button>
                </div>
                
            </form> --}}
          </div>
        </div>
      </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script>
    $('.btn-qty').click(function(){
        var key = $(this).attr('data');
        // var id = $('#id_' + key).val();
        var qty = $('#qty_' + key).val();
        // alert('id:'+id + 'qty: '+qty);
        if($(this).hasClass('discount')){
            $(this).parents('tr').find('input').val(parseInt(qty) - 1)
            //  updateCart(id,parseInt(qty) - 1 )
        }
        else if($(this).hasClass('increase')){
            $(this).parents('tr').find('input').val(parseInt(qty) + 1)
            //  updateCart(id,parseInt(qty) + 1 )
        }
    })

    function updateCart(){
        $('.update').click(function(){
        // event.preventDefault();
        var updateurl = $('.update-cart').data('url');
        // alert(updateurl);
        var id = $(this).data('id');
        var quantity = $(this).parents('tr').find('input').val();
        $.ajax({
            type: "GET",
            url: updateurl,
            data:{
                id: id,
                quantity: quantity  
            },
            success: function(data){
                // location.reload(); 
               },
               error : function(){
    
               }
        })
    })
    }

</script> --}}

@endsection