


    <form action="{{route('payment')}}" method="POST">
        @csrf
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
                @if(Session::has('cart'))
                @foreach (Session::get('cart') as $id => $cart)
                
                <input type="hidden" name="title" value="{{$cart['name']}}">
                <input type="hidden" name="price" id="" value="{{$cart['price']}}">
                <input type="hidden" name="quantity" id="" value="{{request('quantity')}}">
                <input type="hidden" name="total-cart" id="" value="{{$cart['price']*$cart['quantity']}}">
                <input type="hidden" name="total" value="{{ $total }}">

                @endforeach
                @endif
            </div>
            <div>
                <button type="submit" style="float: right" class="btn btn-success mb-3">Dat mua</button>
            </div>

        </div> 

    </form>


