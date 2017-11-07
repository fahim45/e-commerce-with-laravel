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
    <form action="{{ url('/update-order') }}" method="post">
        {{ csrf_field() }}
        <table>
            <tr>
                <td>Order Status</td>
                <td>
                    <select name="" id="">
                        <option value="">Pending</option>
                        <option value="">Cancel</option>
                        <option value="">Successfully</option>
                    </select>
                    <input type="hidden" name="id" value="{{ $order->id }}" />
                </td>
            </tr>
            <tr>
                <td>Payment Status</td>
                <td>
                    <select name="" id="">
                        <option value="">Pending</option>
                        <option value="">Cancel</option>
                        <option value="">Successfully</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Order Status</td>
                <td>
                    <input type="submit" name="btn" value="Update Order" />
                </td>
            </tr>
        </table>
    </form>
@endsection


