@extends('frontend.master')
@section('title')
    Login Form
@endsection

@section('body')
    <div class="container" >
        <div class="row">
            <div class="bg-warning text-danger" id="alert">
                <div class="text-center alert-content">{{$message}}</div>
                <div class="alert-close">
                    <a href="#" class="text-danger" id="alert-close">
                        <i class="fa fa-close"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container" id="login_options">
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
                    {{Form::open(['route'=>'front-user-login','method'=>'POST','class'=>'form'])}}
                        <div class="col-lg-12 form-group">
                            <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুকের সঙ্গে চলুক</a>
                        </div>
                        <div class="text-center"><h5>অথবা</h5></div>
                        <div class="col-lg-12 form-group">
                            <input type="email" name="email" class="form-control" placeholder="ইমেইল" required >
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn btn-success btn-block"> লগ ইন</button>
                        </div>

                        <div class="text-center"><a>পাসওয়ার্ড ভুলে গেছেন?</a></div>
                    {{Form::close()}}
                    <hr/>
                    <div class="text-center">
                        <h4>এখনো কোনো অ্যাকাউন্ট নেই আপনার?</h4>
                        <a href="{{route('signup-options')}}" class="btn btn-default btn-lg" >সাইন আপ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection