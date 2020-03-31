@extends('front-end.master')

@section('body')
    <!--banner-->
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Add to Cart</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <!--single-->
        <div class="single-wl3">
            <div class="container">
                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <h3 class="text-center text-success">My shopping cart</h3>
                        <hr/>
                        <table class="table table-bordered">
                            <tr class="bg-primary">
                                <th>No</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Action</th>
                            </tr>
                            @php($i = 1)
                            @php($sum = 0)
                            @foreach($cartItems as $cartItem)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{ $cartItem->name }}</td>
                                <td><img src="{{ asset($cartItem->options->img) }}" alt="" width="100" height="100"></td>
                                <td>{{ $cartItem->price }}</td>
                                <td >
                                    {{ Form::open(['route'=>'update-cart','method'=>'post']) }}
                                        <input type="number" name="qty" value="{{$cartItem->qty}}" min="1">
                                        <input type="hidden" name="rowId" value="{{$cartItem->rowId}}">
                                        <input type="submit" name="btn" value="Update">
                                    {{ Form::close() }}
                                </td>
                                <td>{{$total = $cartItem->price * $cartItem->qty}}</td>
                                <td>
                                    <a href="{{route('delete-cart-item',['id'=>$cartItem->rowId])}}" class="btn btn-danger btn-xs" title="Delete">
                                        <span class="fa fa-trash"></span>
                                    </a>
                                </td>
                            </tr>
                            <?php $sum = $sum+$total; ?>
                            @endforeach
                        </table>
                        <hr/>
                        <table class="table table-bordered text-center">
                            <tr>
                                <th class="text-center">Item Total (TK. )</th>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">VAT Total (TK. )</th>
                                <td>{{ $vat = $cartItem->price * 0.2 }}</td>
                            </tr>
                            <tr>
                                <th class="text-center">GRAND Total (TK. )</th>
                                <td>{{ $sum + $vat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <a href="{{route('checkout')}}" class="btn btn-success pull-right">Checkout</a>
                        <a href="#" class="btn btn-success">Continue Shopping</a>

                    </div>
                </div>


                <!--Product Description-->
            </div>
        </div>
        <!--single-->

        <!--new-arrivals-->
    </div>
    <!--content-->
@endsection
