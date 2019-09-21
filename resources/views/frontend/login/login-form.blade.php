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
            <div class="col-md-8 well" style="box-shadow: 5px 8px 12px;">
                <div class="col-md-6 left_containte">
                    <h4>ঘরেবসে.কম এ লগ ইন করুন</h4>
                    <p>আপনার এড এবং অ্যাকাউন্টের বিস্তারিত দেখতে আপনার ঘরেবসে.কম এ  অ্যাকাউন্টে লগইন করুন।</p>
                    <ol class="mb" type="1">
                        <li>ঘরেবসে.কম এ আপনি প্রতিদিন বিনামুল্যে শত শত বিজ্ঞাপন পোস্ট করতে পারেন।</li>
                        <li>ঘরেবসে.কম এ আপনি একজন স্বেচ্ছাসেবক হিসেবে কাজ করে টাকা উপার্জন করতে পারেন।</li>
                        <li>বিভিন্ন ধরনের ঝামেলা ছাড়া অর্থ আদান-প্রদান করুন,কেনা ও বেচার সময় ঘরেবসে.কম এর সাথে যোগাযোগ করুন? প্রতারণা শিকার থেকে ঝামেলা থাকুন। </li>
                    </ol>

                </div>

                <div class="col-md-6">
                    {{Form::open(['route'=>'front-user-login','method'=>'POST','class'=>'form'])}}
                        <div class="col-lg-12 form-group">
                            <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুকের সঙ্গে চলুক</a>
                        </div>
                    <div class="col-lg-12 form-group">
                        <a href="{{url('/redirect')}}" class="btn btn-primary btn-block" style="background: #d94f45"><i class="fa fa-envelope-open"></i>   ইমেইল এর সাথে চলুক</a>
                    </div>
                        <div class="col-lg-12 form-group">
                            <input type="email" name="email" class="form-control" placeholder="ইমেইল" required >
                        </div>
                        <div class="col-lg-12 form-group">
                            <input type="password" name="password" class="form-control" placeholder="পাসওয়ার্ড" required>
                        </div>
                        <div class="col-lg-12 form-group">
                            <button type="submit" class="btn btn-success btn-block"> লগ ইন</button>
                        </div>

                    <div class="text-center"><p>আপনি আপনার পাস্বরদ মনে করতে পারছেন না? রিকভারি করতে চান? </p><a href="{{route('password_reset')}}">এখানে ক্লিক করুন।</a></div>
                    {{Form::close()}}
                    <hr/>
                    <div class="text-center">
                        <h5>আপনার ঘরেবসে.কম এ অ্যাকাউন্ট আছে কি? না? নিছের সাইনআপ বাটোন এ ক্লিক করুন।</h5>
                        <a href="{{route('signup-options')}}" class="btn btn-default btn-lg" style="background: #5cb85c">সাইন আপ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection