@extends('front.master')
@section('title')
    Checkout
@endsection
@section('body')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success">Welcome <b>{{ Session::get('customerName') }}</b>. You have to give us product shipping info to complete your
                    valuable order. If your billing info and shipping info are same then just press on save shipping info button. Thanks.</h3>
            </div>

            <div class="col-md-12 register">
                <hr>
                <h1 class="text-center">Shipping From Here</h1>
                <hr>
                <form class="form-horizontal" action="{{ url('/new-shipping') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">Full Name<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="full_name" value="{{ $customer->first_name.' '.$customer->last_name }}" class="form-control">
                            <span class="text-danger">{{ $errors->has('full_name')?$errors->first('full_name'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Email Address<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" name="email" value="{{ $customer->email }}" class="form-control">
                            <span class="text-danger">{{ $errors->has('email')?$errors->first('email'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3"> Phone No<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" name="phone_no" value="{{ $customer->phone_no }}" class="form-control">
                            <span class="text-danger">{{ $errors->has('phone_no')?$errors->first('phone_no'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3"> Address<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="address" class="form-control" style="resize: vertical">{{ $customer->address }}</textarea>
                            <span class="text-danger">{{ $errors->has('address')?$errors->first('address'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="submit" name="btn" class="btn btn-success" value="Save Shipping Info">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection