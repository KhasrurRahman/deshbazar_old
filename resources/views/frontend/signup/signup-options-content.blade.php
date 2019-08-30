@extends('frontend.master')
@section('title')
    Signup Options
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
                    <h4>ঘরেবসে.কম বিজ্ঞাপন পোস্ট করতে লগইন করুন।</h4>
                    <p>আপনার বিজ্ঞাপন এবং অ্যাকাউন্টের বিস্তারিত দেখতে আপনার ঘরেবসে.কম  অ্যাকাউন্টে লগইন করুন।</p>
                    <ol class="mb" type="1">
                        <li>আপনি আপনার মূল্যবান বিজ্ঞাপন পোস্ট করুন।</li>
                        <li>আপনি আপনার মূল্যবান বিজ্ঞাপন পোস্ট করুন।</li>
                        <li>আপনি আপানার বিজ্ঞাপন এডিট ও আপডেট করতে পারবেন ।</li>
                        <li>আপনি আপানার বিজ্ঞাপন এডিট ও আপডেট করতে পারবেন ।</li>
                        <li>সহজ ভাবে টাকা উপার্জন করুন।</li>
                        <li>আপনার বিজ্ঞাপন, আপনার ফেসবুক.কম আইডি তে শেয়ার করুন।</li>
                        <li>আপনি লগইন বা বিজ্ঞাপন পোস্ট করতে পারচ্ছেন না ? আমাদের সাথে যোগাযোগ করুন।</li>
                    </ol>

                </div>

                <div class="col-md-6">
                    <form class="form">
                        <div class="col-lg-12 form-group">
                            <a href="{{url('/redirect')}}" class="btn btn-primary btn-block"><i class="fa fa-facebook-official"></i>ফেসবুকের সঙ্গে চলুক</a>
                        </div>
                        <div class="col-lg-12 form-group">
                            <a href="{{route('signup')}}" class="btn btn-success btn-block">ইমেইল এর সাথে লগইন করুন</a>
                        </div>
                        <div class="text-center"><p>এখন আপনার অ্যাকাউন্ট সাইন আপ করে বিজ্ঞাপন পোস্ট করবেন। <a href="{{route('terms')}}">আমাদের  নির্দেশনাসমূহ পড়ুন</a> </p></div>
                    </form>
                    <hr/>
                    <div class="text-center">
                        <h4>আপনার ঘরেবসে.কম এ অ্যাকাউন্ট আছে কি? না? নিছের সাইনআপ বাটোন এ ক্লিক করুন।</h4>
                        <a href="{{route('login-form')}}" class="btn btn-default btn-lg" style="background: #5cb85c">লগইন করুন</a>
                    </div>
                </div>
            </div>

            <div class="col-md-2"></div>

        </div>
    </div>

@endsection