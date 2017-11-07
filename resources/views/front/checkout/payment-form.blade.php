<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 30-Oct-17
 * Time: 6:02 PM
 */
?>
@extends('front.master')
@section('title')
    Payment Info
@endsection
@section('body')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success">Welcome <b>{{ Session::get('customerName') }}</b>. You have to give us product payment info to complete your
                    valuable order. Thanks.</h3>
            </div>

            <div class="col-md-12 register">
                <br/><br/>
                <h1 class="text-center">Payment From</h1>
                <form action="{{ url('/new-order') }}" method="post">
                    {{ csrf_field() }}
                    <table class="table table-bordered">
                        <tr>
                            <th>Cash On Delivery</th>
                            <td><input type="radio" name="payment_type" value="Cash On Delivery"></td>
                        </tr>
                        <tr>
                            <th>bKash</th>
                            <td><input type="radio" name="payment_type" value="bKash"></td>
                        </tr>
                        <tr>
                            <th>Paypal</th>
                            <td><input type="radio" name="payment_type" value="Paypal"></td>
                        </tr>
                    </table>
                    <div class="text-center">
                        <input type="submit" value="Confirm Order" class="btn btn-success">
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
