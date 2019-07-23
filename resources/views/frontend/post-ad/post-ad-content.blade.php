@extends('frontend.master')
@section('title')
   Post Ad
@endsection

@section('body')
    @include('frontend.includes.notification')

    <div class="container"  id="post_add">
    <div class="row text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10 well">
            <div class="col-md12">
                <h3><strong>{{Session::get('frontUserName')}} </strong>, ঘরেবসে.কম এর পক্ষ থেকে আপনাকে স্বাগতম। এবার বিজ্ঞাপন পোস্ট করি। আপনার পছন্দমত নিচের ক্যাটাগরি ক্লিক করি।</h3>
                <div class="col-md-5 col-md-offset-1">
                    <div class="media">
                        <div class="media-body" >
                            <div class="media-object media-img_one">
                                <img src="{{asset('/') }}front/images/add1.png" alt="" height="40" width="40" />
                            </div>
                            <div class="media-heading">
                                <h3>বিক্রি করুন</h3><hr/>
                            </div>
                        </div>
                    </div>
                    <ul class="text-left">
                        <li><a href="{{route('products-category')}}"> ১। আপনার পন্য বিক্রি করুন।</a> <hr/></li>
                        <li><a href="{{route('property-category')}}">২। জমি, বাড়ী, ফ্লাট ভাড়ার বিজ্ঞাপন পোস্ট করুন। </a><hr/></li>
                        <li><a href="{{route('jobs-category')}}">   ৩। চাকুরীর বিজ্ঞপ্তি পোস্ট করুন। </a></li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <div class="media ">
                        <div class="media-body">
                            <div class="media-object media-img_two">
                                <img src="{{asset('/') }}front/images/add2.png" alt="" height="40" width="40" />
                            </div>
                            <div class="media-heading">
                                <h3>কিছু খুজুন</h3>
                            </div><hr/>
                        </div>
                    </div>
                    <ul class="text-left">
                        <li><a href="{{route('property-category')}}">১। জমি, বাড়ী, ফ্লাট ভাড়া খুজুন। </a> <hr/></li>
                        <li><a href="{{route('products-category')}}"> ২। আপনি কিছু কিনতে চান তাহলে খুজুন। </a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
            </div>
            <div class="col-md-12 text-center"><hr/>
                <div class="media">
                    <div class="media-body">
                        <div class="media-object">
                            <img src="{{asset('/') }}front/images/add3.png" alt="" height="40" width="40" />
                        </div>
                        <div class="media-heading">
                            {{--<h4>আপনি বিজ্ঞাপন ফ্রি পেতে চান ?</h4>--}}
                            {{--<h4>বিজ্ঞাপন পোস্ট করতে নিয়ম কানুন জেনে নিন। </h4>--}}
                            <p class="text-center mt"><button class="btn extra-info">আপনি প্রথমে বিজ্ঞাপন ফ্রি পোস্ট করুন <br />আমাদের বিজ্ঞাপন দেয়ার নিয়মকানুন জেনে নিনি </button></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    </div>



    <!--rules start-->

    @include('frontend.includes.important-rules')

    <!--rules end-->


@endsection