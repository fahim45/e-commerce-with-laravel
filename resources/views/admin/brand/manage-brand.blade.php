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
    Manage Brand || Dashboard
@endsection
@section('breadcrumb')
    Brand
@endsection
@section('activeBreadcrumb')
    Manage Brand
@endsection
@section('content')
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">In Manage Brand</h1>
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
                                <th>Brand Name</th>
                                <th>Brand Description</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            <?php $i=1; ?>
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{!! $brand->brand_description !!}</td>
                                    <td>@if($brand->publication_status==1)
                                            <span class="label label-success">{{ 'Published' }}</span>
                                        @else
                                            <span class="label label-warning">{{ 'Unpublished' }}</span>
                                            @endif
                                    </td>
                                    <td>
                                        @if($brand-> publication_status == 1)
                                            <a href="{{ url('/brand/unpublished-brand/'.$brand->id) }}" title="Published"
                                               class="btn btn-info btn-xs">
                                                <span class="fa fa-fw fa-arrow-up"></span>
                                            </a>
                                        @else
                                            <a href="{{ url('/brand/published-brand/'.$brand->id) }}" title="Unpublished"
                                               class="btn btn-warning btn-xs">
                                                <span class="fa fa-fw fa-arrow-down"></span>
                                            </a>
                                        @endif
                                        <a href="{{ url('/brand/edit-brand/'.$brand->id) }}" title="Edit"
                                           class="btn btn-success btn-xs">
                                            <span class="fa fa-fw fa-edit"></span>
                                        </a>
                                        <a href="{{ url('/brand/delete-brand/'.$brand->id) }}" title="Delete"
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
