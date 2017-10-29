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
    Edit Category || Dashboard
@endsection
@section('breadcrumb')
    Category
@endsection
@section('activeBreadcrumb')
    Edit Category
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Edit Category</h1>
                <hr/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="well">
                    <form class="form-horizontal" action="{{url('/category/update-category')}}" method="post" name="editCategory">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="" class="col-sm-3">Category Name</label>
                            <div class="col-sm-9">
                                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control"/>
                                <input type="hidden" name="category_id" value="{{ $category->id }}" class="form-control">
                                {{--<span class="text-danger">{{ $errors->has('category_name')?$errors->first('category_name'):'' }}</span>--}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3">Category Description</label>
                            <div class="col-sm-9">
                                <textarea name="category_description" class="tinymce" id="" cols="30" rows="10"> {{ $category->category_description }}</textarea>
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
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.forms['editCategory'].elements['publication_status'].value='{{ $category->publication_status }}';
    </script>
@endsection
