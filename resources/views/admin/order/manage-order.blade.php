<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 05-Nov-17
 * Time: 6:59 PM
 */
?>

@extends('admin.master')
@section('title')
    Manage Order || Dashboard
@endsection
@section('breadcrumb')
    Order
@endsection
@section('activeBreadcrumb')
    Manage Order
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Manage Order</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                @if($message = Session::get('message'))
                    <h3 class="text-center text-success">{{ $message }}</h3>
                @endif
                <div class="well" style="background-color: #ffffff">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr class="bg-info">
                                <th>SL No</th>
                                <th>Order Id</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>Payment Type</th>
                                <th>Payment Status</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->first_name.' '.$order->last_name }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>{{ $order->payment_type }}</td>
                                    <td>{{ $order->payment_status }}</td>
                                    <td>{{ date('F d Y', strtotime( $order->created_at )) }}</td>
                                    <td>
                                        <a href="{{ url('/order/view-order-details/'.$order->id) }}" title="View Order Details" class="btn btn-info btn-xs">
                                            <span class="fa fa-fw fa-eye-slash"></span>
                                        </a>
                                        <a href="{{ url('/order/view-order-invoice/'.$order->id) }}" title="View Order Invoice" class="btn btn-warning btn-xs">
                                            <span class="fa fa-fw fa-eye"></span>
                                        </a>
                                        <a href="{{ url('/pdf/'.$order->id) }}" title="Download Invoice" class="btn btn-success btn-xs">
                                            <span class="fa fa-fw fa-download"></span>
                                        </a>
                                        <a href="{{ url('/order/edit-order/'.$order->id) }}" title="Edit Order" class="btn btn-primary btn-xs">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a href="{{ url('/order/delete-order/'.$order->id) }}" title="Delete Order" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-xs">
                                            <span class="fa fa-fw fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

