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
    Manage Product || Dashboard
@endsection
@section('breadcrumb')
    Product
@endsection
@section('activeBreadcrumb')
    Manage Product
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Manage Product</h1>
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
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Brand Name</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->brand_name }}</td>
                                <td>{{ $product->product_price }}</td>
                                <td>{{ $product->product_quantity }}</td>
                                <td>{{ $product->publication_status ==1? 'Published':'Unpublished' }}</td>
                                <td>
                                    <a href="{{ url('/product/view-product/'.$product->id) }}" class="btn btn-primary btn-xs" title="View">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    @if($product->publication_status==1)
                                    <a href="{{ url('/product/unpublished-product/'.$product->id) }}" title="Published" class="btn btn-info btn-xs">
                                        <span class="fa fa-fw fa-arrow-up"></span>
                                    </a>
                                    @else
                                    <a href="{{ url('/product/published-product/'.$product->id) }}" title="Unpublished" class="btn btn-warning btn-xs">
                                        <span class="fa fa-fw fa-arrow-down"></span>
                                    </a>
                                    @endif
                                    <a href="{{ url('/product/edit-product/'.$product->id) }}" title="Edit" class="btn btn-success btn-xs">
                                        <span class="fa fa-fw fa-edit"></span>
                                    </a>
                                    <a href="{{ url('/product/delete-product/'.$product->id) }}" title="Delete" onclick="return confirm('Are you sure to delete this?');" class="btn btn-danger btn-xs">
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
