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
    Edit Brand || Dashboard
@endsection
@section('breadcrumb')
    Brand
@endsection
@section('activeBreadcrumb')
    Edit Brand
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Edit Brand</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <form class="form-horizontal" action="{{url('/brand/update-brand')}}" method="post" name="editBrand">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="" class="col-sm-3">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="brand_name" value="{{ $brand->brand_name }}" class="form-control"/>
                                <input type="hidden" name="brand_id" value="{{ $brand->id }}" class="form-control">
                                {{--<span class="text-danger">{{ $errors->has('brand_name'?$errors->first('brand_name'):'') }}</span>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Brand Description</label>
                            <div class="col-sm-9">
                                <textarea name="brand_description" class="tinymce" id="" cols="30" rows="10"> {{ $brand->brand_description }}</textarea>
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
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Brand Info" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.forms['editBrand'].elements['publication_status'].value='{{ $brand->publication_status }}';
    </script>
@endsection
