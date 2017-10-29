<?php
/**
 * Created by PhpStorm.
 * User: fahim foysal kamal
 * Date: 19-Oct-17
 * Time: 9:55 PM
 */
?>

@extends('admin.master')
@section('title')
    View Product || Dashboard
@endsection
@section('breadcrumb')
    Product
@endsection
@section('activeBreadcrumb')
    View Product
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In View Product</h1>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="well" style="background-color: #ffffff">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Product ID</th>
                                <td>{{$product->id}}</td>
                            </tr>
                            <tr>
                                <th>Product Name</th>
                                <td>{{$product->product_name}}</td>
                            </tr>
                            <tr>
                                <th>Category Name</th>
                                <td>{{$product->category_name}}</td>
                            </tr>
                            <tr>
                                <th>Brand Name</th>
                                <td>{{$product->brand_name}}</td>
                            </tr>
                            <tr>
                                <th>Product Price</th>
                                <td>{{$product->product_price}}</td>
                            </tr>
                            <tr>
                                <th>Product Quantity</th>
                                <td>{{$product->product_quantity}}</td>
                            </tr>
                            <tr>
                                <th>Product Short Description</th>
                                <td>{!! $product->short_description!!}</td>
                            </tr>
                            <tr>
                                <th>Product Long Description</th>
                                <td>{!!$product->long_description!!}</td>
                            </tr>
                            <tr>
                                <th>Product Image</th>
                                <td><img src="{{asset($product->product_image)}}" alt="{{$product->product_name}}" style="height: 255px;"></td>
                            </tr>
                            <tr>
                                <th>Product Sub Images</th>
                                <td>
                                    @foreach($product as $subImages)
                                    <img src="{{asset($subImages->sub_image)}}" alt="{{$subImages->sub_image}}" style="height: 255px;">
                                        @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Publication Status</th>
                                <td>{{$product->publication_status==1? 'Published':'Unpublished'}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
