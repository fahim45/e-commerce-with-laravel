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
    Edit Product || Dashboard
@endsection
@section('breadcrumb')
    Product
@endsection
@section('activeBreadcrumb')
    Edit Product
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Edit Product</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <form class="form-horizontal" action="{{url('/product/update-product')}}" method="post" name="editProduct" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control"/>
                                <input type="hidden" name="product_id" value="{{ $product->id }}" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_name')?$errors->first('product_name'):'' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Category Name</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="" class="form-control">
                                    <option>Select Category Name</option>
                                    @foreach($publishedCategories as $publishedCategory)
                                        <option value="{{ $publishedCategory->id }}">{{ $publishedCategory->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Brand Name</label>
                            <div class="col-sm-9">
                                <select name="brand_id" id="" class="form-control">
                                    <option>Select Brand Name</option>
                                    @foreach($publishedBrands as $publishedBrand)
                                        <option value="{{ $publishedBrand->id }}">{{ $publishedBrand->brand_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Price</label>
                            <div class="col-sm-9">
                                <input type="number" name="product_price" value="{{ $product->product_price }}" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('product_price')?$errors->first('product_price'):'' }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Quantity</label>
                            <div class="col-sm-9">
                                <input type="number" name="product_quantity" value="{{ $product->product_quantity }}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Short Description</label>
                            <div class="col-sm-9">
                                <textarea name="short_description" class="tinymce" id="" cols="30" rows="5">{!! $product->short_description !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Long Description</label>
                            <div class="col-sm-9">
                                <textarea name="long_description" class="tinymce" id="" cols="30" rows="10">{!! $product->long_description !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Main Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="product_image" accept="image/*"/>
                                <img src="{{ asset($product->product_image) }}" alt="" style="height: 80px; width: 80px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Product Sub Image</label>
                            <div class="col-sm-9">
                                <input type="file" name="sub_image[]" accept="image/*" multiple/>
                                @foreach($subImages as $subImage)
                                    <img class="img-bordered" src="{{ asset($subImage->sub_image)}}"
                                         alt="Image Not Found" height="80px" width="80px">
                                @endforeach
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

    <script>
        document.forms['editProduct'].elements['publication_status'].value='{{ $product->publication_status }}';
        document.forms['editProduct'].elements['category_id'].value='{{ $product->category_id }}';
        document.forms['editProduct'].elements['brand_id'].value='{{ $product->brand_id }}';
    </script>
@endsection
