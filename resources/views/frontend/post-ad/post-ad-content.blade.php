@extends('frontend.master')
@section('title')
   Post Ad
@endsection

@section('body')
    @include('frontend.includes.notification')

    <div class="container"  id="post_add">
    <div class="row text-center">
        <div class="col-md-1"></div>
        <div class="col-md-10 well" style="box-shadow: 5px 8px 12px;">


            <div class="col-md12">
                <h3><strong>{{Session::get('frontUserName')}} </strong>, ঘরেবসে.কম এর পক্ষ থেকে আপনাকে স্বাগতম। এবার বিজ্ঞাপন পোস্ট করি। আপনার পছন্দমত নিচের ক্যাটাগরি ক্লিক করি।</h3>


                <div class="col-md-5 col-md-offset-1">
                    <div class="media">
                        <div class="media-body" >
                            <div class="media-object media-img_one">
                                <img src="{{asset('/') }}front/images/add1.png" alt="" height="40" width="40" />
                            </div>
                            <div class="media-heading">
                                <h3>এখনি বিক্রি করুন</h3><hr/>
                            </div>
                        </div>
                    </div>
                    <ul class="text-left">
                        <li><a href="{{route('products-category')}}"> ১। আপনার পন্য বিক্রি করুন।</a> <hr/></li>
                        <li><a href="{{route('property-category')}}">২। জমি, বাড়ী, ফ্লাট ভাড়ার বিজ্ঞাপন পোস্ট করুন। </a><hr/></li>
                        <li><a href="{{route('jobs-category')}}">   ৩। দেশের ও বাহিরের চাকরি ও নিয়োগ বিজ্ঞপ্তি  </a></li>
                    </ul>

                </div>


                <div class="col-md-5">
                    <div class="media ">
                        <div class="media-body">
                            <div class="media-object media-img_two">
                                <img src="{{asset('/') }}front/images/add2.png" alt="" height="40" width="40" />
                            </div>
                            <div class="media-heading">
                                <h3>এখনি কিছু খুজুন</h3>
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

                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('/') }}front/images/asdas.jpg" style="height: 112px">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn extra-info" style="width: 338px ;">আপনি প্রথমে বিজ্ঞাপন ফ্রি <br>পোস্ট করুন আমাদের বিজ্ঞাপন দেয়ার <br>নিয়মকানুন জেনে নিনি </button>
                                </div>
                                <div class="col-md-4" style="float: right">
                                    <p style="    background: #0bbf0b;
    height: 102px;
    width: 200px;
    float: right;
    border-radius: 3%;">বিভাগ, অবস্থান, কীওয়ার্ড, বিজ্ঞাপন আইডি, বা বিজ্ঞাপনের মালিকের নাম অনুসারে শ্রেণিবদ্ধ বিজ্ঞাপনগুলি<br> অনুসন্ধান করুন বা ব্রাউজ করুন।</p>
                                </div>

                            </div>
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