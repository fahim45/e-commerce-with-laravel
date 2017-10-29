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
    Manage Category || Dashboard
@endsection
@section('breadcrumb')
    Category
@endsection
@section('activeBreadcrumb')
    Manage Category
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Manage Category</h1>
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
                                <th>Category Name</th>
                                <th>Category Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{!! $category->category_description !!}</td>
                                    <td>{{ $category->publication_status==1? 'Published':'Unpublished' }}</td>
                                    <td>
                                        @if($category-> publication_status == 1)
                                        <a href="{{ url('/category/unpublished-category/'.$category->id) }}" title="Published"
                                           class="btn btn-info btn-xs">
                                            <span class="fa fa-fw fa-arrow-up"></span>
                                        </a>
                                        @else
                                        <a href="{{ url('/category/published-category/'.$category->id) }}" title="Unpublished"
                                           class="btn btn-warning btn-xs">
                                            <span class="fa fa-fw fa-arrow-down"></span>
                                        </a>
                                        @endif
                                        <a href="{{ url('/category/edit-category/'.$category->id) }}" title="Edit"
                                           class="btn btn-success btn-xs">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a href="{{ url('/category/delete-category/'.$category->id) }}" title="Delete"
                                           onclick="return confirm('Are you sure to delete this?');"
                                           class="btn btn-danger btn-xs">
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
