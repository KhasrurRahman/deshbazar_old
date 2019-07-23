@extends('frontend.master')
@section('title')
    Sign up
@endsection

@section('body')
    <div class="container" id="signup_from">
        <div class="row ">
            <div class="col-md-2"></div>


            <div class="col-md-8 well">
                <div class="col-md-6 left_containte">
                    <h4>Ghoreyboshe-এ লগ ইন করুন</h4>
                    <p>আপনার এড এবং অ্যাকাউন্টের বিস্তারিত দেখতে আপনার Ghoreyboshe অ্যাকাউন্টে লগইন করুন।</p>
                    <ol class="mb" type="1">
                        <li>আপনি আপনার মূল্যবান বিজ্ঞাপন পোস্ট করুন।</li>
                        <li>আমাদের নিয়ম মেনে আপনার বিজ্ঞাপন পোস্ট করুন ।</li>
                        <li>আপনি আপানার বিজ্ঞাপন এডিট ও আপডেট করতে পারবেন ।</li>
                        <li>আপনার বিজ্ঞাপন ভাল ছবি দিয়ে পোস্ট করুন ।</li>
                    </ol>

                </div>

                <div class="col-md-6">
                    {{Form::open(['route'=>'front-user','method'=>'POST','class'=>'form'])}}
                        <div class="col-lg-12 form-group">
                            <input type="text" name="name" class="form-control" placeholder="নাম" required >
                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name'):' '}}</span>
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="email" name="email" class="form-control" placeholder="ইমেইল" required>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email'):' '}}</span>
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="text" name="phone_number" class="form-control" placeholder="ফোন নাম্বার" required>
                            <span class="text-danger">{{$errors->has('phone_number') ? $errors->first('phone_number'):' '}}</span>
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
                            <span class="text-danger">{{$errors->has('password') ? $errors->first('password'):' '}}</span>
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="পাসওয়ার্ড নিশ্চিত করুন" required>
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" name="btn" class="btn btn-success btn-block"> সাইন আপ</button>
                        </div>
                        <div class="text-center"><p>আপনি কি অ্যাকাউন্ট সাইন আপ করবেন আমাদের <a href="{{route('terms')}}">শর্তাবলী এবং নীতিমালা</a> যেনে নিন । </p></div>
                    {{Form::close()}}
                    <hr/>
                    <div class="text-center">
                        <h4>আপানার অ্যাকাউন্ট আছে কি ?</h4>
                        <a href="{{route('login-form')}}" class="btn btn-default btn-lg">লগ ইন</a>
                    </div>

                </div>
            </div>

            <div class="col-md-2"></div>

        </div>
    </div>
@endsection