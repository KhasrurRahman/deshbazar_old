@extends('frontend.master')
@section('title')
    Reset password
@endsection

@section('body')
    @include('frontend.includes.notification')

    <div class="container" id="signup_from">
        <div class="row ">
            <div class="col-md-2"></div>


            <div class="col-md-8 well" style="box-shadow: 5px 8px 12px;">
                <div class="col-md-6 left_containte">
                    <h4>Reset password</h4>

                    <ol class="mb" type="1">
                        <li>please Enter Your Email</li>
                        <li>If you are a verified User Then You Will Get A Email </li>
                        <li>Please check your mail Box</li>
                        <li>Click on the password reset link</li>
                        <li>Now type old password </li>
                    </ol>

                </div>

                <div class="col-md-6">

                    {{Form::open(['route'=>'password_reset_check','method'=>'POST','class'=>'form'])}}
                    <div class="col-lg-12 form-group">
                        <label>Please Enter Your Email:</label>
                        <input type="email" name="email" class="form-control" placeholder="email" required >
                    </div>
                    <div class="col-lg-12 form-group">
                        <button type="submit" name="btn" class="btn btn-success btn-block">Reset Password</button>
                    </div>
                    {{Form::close()}}


                </div>
            </div>

            <div class="col-md-2"></div>

        </div>
    </div>
@endsection