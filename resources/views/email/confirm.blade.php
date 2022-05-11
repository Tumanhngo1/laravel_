<div>
   <p>Xin chào {{ $name }}</p> 

   <p>Đơn hàng của bạn đã được giao thành công.

    Vui lòng đăng nhập để xác nhận bạn đã nhận hàng và hài lòng với sản phẩm trong vòng 7 ngày.
    Nếu bạn không xác nhận trong khoảng thời gian này, chung toi cũng sẽ thanh toán cho Người bán.</p> 
    <p style="text-align: center">
        <a href="{{ route('confirm',['token'=>$customer->token, 'customer'=>$customer->id ]) }}" 
        style="display: inline-block; background:green; color:#ffff; padding:7px 25px">
        Xac nhan don hamg</a>
    </p>
</div>

<table class="table mt-5" id="render" border="1" cellspacing="0" cellpadding="10" style="width: 100%">
    <thead>
        <tr>
          
            <th scope="col">san pham</th>
            {{-- <th scope="col">title</th> --}}
            <th scope="col">price</th>
            <th scope="col">so luong</th>
            <th scope="col">total</th>
        </tr>
    </thead>
    @php
        $total = 0;
    @endphp
    @if (Session::has('cart'))
        <tbody>
            @foreach (Session::get('cart') as $id => $cart)
                <tr id="cart_update" data-id="{{ $id }}">
                <tr data-id="{{ $id }}">
            
                    {{-- <td style="width: 15%">
                        <img style="width:100%" src="{{ asset('storage/' . $cart['image']) }}" alt="">
                    </td> --}}
                    <td style="width: 20%">{{ $cart['name'] }}</td>
                    <td>
                        {{ number_format($cart['price'], '0', '.', '.') }} VND
                    </td>{{ $cart['quantity'] }}

                    </td>
                    <td>
                        {{ number_format($cart['price'] * $cart['quantity'], '0', '.', '.') }} VND
                    </td>
                </tr>
                @php
                    $total += $cart['price'] * $cart['quantity'];
                @endphp
            @endforeach

        </tbody>
    @endif


</table>

<div class="col-12" id="cart_total" style="text-align: right">
    <h3>Total: {{ number_format($total, '0', '.', '.') }} VND</h3>
</div>

<div>
    <p style="text-align: center">
        <a href="{{ route('confirm',['token'=>$customer->token, 'customer'=>$customer->id ]) }}" 
        style="display: inline-block; background:green; color:#ffff; padding:7px 25px">
        Xac nhan don hamg</a>
    </p>
</div>