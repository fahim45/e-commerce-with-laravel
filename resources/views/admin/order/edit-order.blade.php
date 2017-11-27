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
    Edit Order || Dashboard
@endsection
@section('breadcrumb')
    Order
@endsection
@section('activeBreadcrumb')
    Edit Order
@endsection
@section('content')
    <br/>
    <div class="col-lg-6">
        <form action="{{ url('/order/update-order') }}" method="post" class="form-horizontal">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="col-sm-3">Order Status</label>
                <div class="col-sm-9">
                    <select name="order_status" class="form-control">
                        <option>Pending</option>
                        <option>Cancel</option>
                        <option>Successfully</option>
                    </select>
                    <input type="hidden" name="id" value="{{ $order->id }}"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3">Payment Status</label>
                <div class="col-sm-9">
                    <select name="payment_status" class="form-control">
                        <option>Pending</option>
                        <option>Cancel</option>
                        <option>Successfully</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="submit" name="btn" class="btn btn-default">Update Order</button>
                </div>
            </div>
        </form>
    </div>
@endsection


