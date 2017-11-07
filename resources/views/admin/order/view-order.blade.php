<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 05-Nov-17
 * Time: 8:34 PM
 */
?>

@extends('admin.master')
@section('title')
    View Order || Dashboard
@endsection
@section('breadcrumb')
    Order
@endsection
@section('activeBreadcrumb')
    View Order
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In View Order</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @if($message = Session::get('message'))
                    <h3 class="text-center text-success">{{ $message }}</h3>
                @endif
                <div class="well" style="background-color: #ffffff">
                    <h2>Customer Info For This Order</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Customer Name</th>
                                <td>{{ $customer->first_name.' '.$customer->last_name }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $customer->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $customer->phone_no }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $customer->address }}</td>
                            </tr>

                        </table>
                    </div>
                </div>

                <div class="well" style="background-color: #ffffff">
                    <h2>Shipping Info For This Order</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>Shipping Name</th>
                                <td>{{ $shipping->full_name }}</td>
                            </tr>
                            <tr>
                                <th>Email Address</th>
                                <td>{{ $shipping->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $shipping->phone_no }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $shipping->address }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="well" style="background-color: #ffffff">
                    <h2>Product Info For This Order</h2>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <th>SL No</th>
                                <th>Product Id</th>
                                <th>Product Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total Price</th>
                            </tr>
                            @php($i=1)
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $product->product_id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>TK. {{ $product->product_price }}</td>
                                    <td>{{ $product->product_quantity }}</td>
                                    <td>TK. {{ $product->product_price*$product->product_quantity }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


