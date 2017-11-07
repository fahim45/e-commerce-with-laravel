@extends('front.master')
@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <br/>
                <h1 class="text-center text-success">My Shopping Cart</h1>
            </div>
            <div class="col-sm-12">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>SL No</th>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Product Image</th>
                            <th>Product Price</th>
                            <th>Product Quantity</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        @php($i=1)
                        @php($sum=0)
                        @forelse($cartProducts as $cartProduct)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $cartProduct->id }}</td>
                            <td>{{ $cartProduct->name }}</td>
                            <td><img src="{{ asset($cartProduct->options->image) }}" alt="" style="width: 50px; height:50px;"></td>
                            <td>TK. {{ $cartProduct->price }}</td>
                            <td>
                                <form action="{{ url('/update-cart-product') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="number" name="qty" value="{{ $cartProduct->qty }}" min="1">
                                    <input type="hidden" name="rowId" value="{{ $cartProduct->rowId }}">
                                    <input type="submit" name="btn" value="Update">
                                </form>
                            </td>
                            <td>TK. {{ $total = $cartProduct->price*$cartProduct->qty }}</td>
                            <td>
                                <a href="{{ url('/delete-cart-product/'.$cartProduct->rowId) }}" class="btn btn-danger btn-xs" title="Delete Cart Product">Delete</a>
                            </td>
                        </tr>
                            @php($sum=$sum+$total)
                            @empty
                            <h1>No Product Available</h1>
                            @endforelse
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <th>Sub Total</th>
                            <td>TK. {{$sum}}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>TK. {{ $discount = 0 }}</td>
                        </tr>
                        <tr>
                            <th>Tax</th>
                            <td>TK. {{ $tax = 0 }}</td>
                        </tr>
                        <tr>
                            <th>Grand Total</th>
                            <td>TK. {{ $grandTotal = ($sum - $discount) + $tax }}</td>
                            {{ Session::put('grandTotal', $grandTotal) }}
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
                            </td>
                            <td>
                                @if(Session::get('customerId'))
                                <a href="{{ url('/shipping-info') }}" class="btn btn-primary">Checkout</a>
                                @else
                                    <a href="{{ url('/checkout') }}" class="btn btn-primary">Checkout</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endsection