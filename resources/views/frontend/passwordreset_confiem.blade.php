@extends('frontend.master')
@section('title')
    Reset password
@endsection

@section('body')
    @include('frontend.includes.notification')

    <div class="container" id="signup_from">
        <div class="col-md-12">
            {{Form::open(['route'=>'passwordreset_confirm_save','method'=>'POST','class'=>'form'])}}
            <div class="col-md-12">
                <h3>পাসওয়ার্ড পরিবর্তন করুন</h3> <hr><br/>
            </div>

            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>নতুন পাসওয়ার্ড</label>
                    <input type="password" name="new_password" class="form-control" placeholder="নতুন পাসওয়ার্ড" >
                    <span class="text-danger">{{$errors->has('new_password') ? $errors->first('new_password'):' '}}</span>
                    <input type="hidden" value="{{$user->id}}" name="front_user_id" class="form-control"/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group col-md-12">
                    <label>আর একবার নতুন পাসওয়ার্ড টাইপ করুন</label>
                    <input type="password" name="new_password_confirmation" class="form-control" placeholder="নতুন পাসওয়ার্ড নিশ্চিত করুন" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-warning btn-block btn-lg">এখনি পাসওয়ার্ড সেঞ্জ করছি</button>
                </div>

            </div>
            {{Form::close()}}
        </div>
    </div>
@endsection