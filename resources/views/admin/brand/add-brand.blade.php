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
    Add Brand || Dashboard
@endsection
@section('breadcrumb')
    Brand
@endsection
@section('activeBreadcrumb')
    Add Brand
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Add Brand</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    @if($message = Session::get('message'))
                        <h2 class="text-center text-success">{{$message}}</h2>
                    @endif
                    <form class="form-horizontal" action="{{url('/brand/new-brand')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="" class="col-sm-3">Brand Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="brand_name" class="form-control"/>
                                <span class="text-danger">{{ $errors->has('brand_name'?$errors->first('brand_name'):'') }}</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Brand Description</label>
                            <div class="col-sm-9">
                                <textarea name="brand_description" class="tinymce" id="" cols="30" rows="10"></textarea>
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
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Save Brand Info" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
