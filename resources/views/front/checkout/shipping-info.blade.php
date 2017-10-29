@extends('front.master')
@section('title')
    Checkout
@endsection
@section('body')
    <div class="men">
        <div class="container">
            <div class="col-md-12 register">
                <h3 class="text-center text-success">Welcome to checkout process. You have to login to complete your
                    valuable order. If you are not registered then please register first. Thanks.</h3>
            </div>
            <div class="col-md-12 register">
                <h1 class="text-center">Login From Here</h1>
                <form action="" method="post">
                    {{ csrf_field() }}
                    <div class="register-top-grid">
                        <div>
                            <span>Email Address<label style="color:red;">*</label></span>
                            <input type="text" name="email">
                        </div>
                        <div>
                            <span>Password<label style="color:red;">*</label></span>
                            <input type="text" name="password">
                        </div>
                        <div>
                            <input type="submit" name="btn" value="Login" class="btn btn-success">
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
            <hr/>
            <p>
                ===========================================================================================================================================================</p>
            <hr/>
            <div class="col-md-12 register">
                <h1 class="text-center">Registration From Here</h1>
                <form class="form-horizontal" action="{{ url('/new-customer') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-3">First Name<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" class="form-control">
                            <span class="text-danger">{{ $errors->has('first_name')?$errors->first('first_name'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Last Name<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" class="form-control">
                            <span class="text-danger">{{ $errors->has('last_name')?$errors->first('last_name'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Email Address<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="email" name="email" class="form-control">
                            <span class="text-danger">{{ $errors->has('email')?$errors->first('email'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3">Password<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="password" name="password" class="form-control">
                            <span class="text-danger">{{ $errors->has('password')?$errors->first('password'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3"> Phone No<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <input type="number" name="phone_no" class="form-control">
                            <span class="text-danger">{{ $errors->has('phone_no')?$errors->first('phone_no'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3"> Address<span style="color: red;">*</span></label>
                        <div class="col-sm-9">
                            <textarea name="address" class="form-control" style="resize: vertical"></textarea>
                            <span class="text-danger">{{ $errors->has('address')?$errors->first('address'):'' }}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input type="submit" name="btn" class="btn btn-success">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
@endsection