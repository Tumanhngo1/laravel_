@extends('users.layouts.home')

@section('content')
<div id='nav-search'>
    <form action='/products/?search' class='search-form' role='search'>
    <input autocomplete='off' class='search-input' name='search' placeholder='Search this blog' type='search' value=''/>
    <span class='hide-search'></span>
    </form>
</div>
<table class="table">
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
         @foreach (Session::get('cart') as $id => $cart)
         @php
            $total += $cart['price']*$cart['quantity'];   
        @endphp
            <tr>
                <th scope="row">{{$id}}</th>
                <td style="width: 30%">
                    <img style="width:30%" src="{{ asset('storage/'.$cart['image']) }}" alt="">
                 </td>
                <td style="width: 20%">{{$cart['name']}}</td>
                <td>{{number_format($cart['price']) }} VND</td>
                <td><input type="number" value="{{$cart['quantity']}}" min="0" 
                    class="update-cart" data-url="{{route('update')}}"  ></td>
                <td>
                    {{number_format($cart['price']*$cart['quantity'])}} VND
                </td>
                <td>
                    <a class="update" data-id="{{$id}}" href=""><i class="fa-solid fa-square-pen"></i></a>
                    <a class="delete" data-url="{{route('delete')}}" data-id="{{$id}}" href=""><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            @endforeach
    </tbody>
    @endif
  </table>
  <div class="col-12">
      <h3>Total: {{ number_format($total)}} VND</h3>
  </div>

@if(Session::has('resent_products'))
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
@endif


@endsection