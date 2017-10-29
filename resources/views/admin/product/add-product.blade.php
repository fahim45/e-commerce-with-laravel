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
    Add Product || Dashboard
@endsection
@section('breadcrumb')
    Product
@endsection
@section('activeBreadcrumb')
    Add Product
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Add Product</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    @if($message = Session::get('message'))
                        <h2 class="text-center text-success">{{$message}}</h2>
                    @endif
                    <form class="form-horizontal" action="{{url('/product/new-product')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_name" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_name'?$errors->first('product_name'):'') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control">
                                    <option>Select Category Name</option>
                                    @foreach($publishedCategories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Brand Name</label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="" class="form-control">
                                    <option>Select Brand Name</option>
                                    @foreach($publishedBrands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="product_price" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_price')?$errors->first('product_price'):'' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="product_quantity" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" class="tinymce" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" class="tinymce" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Main Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="product_image" accept="image/*"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Sub Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="sub_image[]" accept="image/*" multiple/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Publication Status</label>
                            <div class="col-sm-9">
                                <select name="publication_status" id="" class="form-control">
                                    <option>Select Publication Status</option>
                                    <option value="1">Published</option>
                                    <option value="0">Unpublished</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Product Info" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
