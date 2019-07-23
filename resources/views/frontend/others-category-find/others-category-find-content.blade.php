@extends('frontend.master')
@section('title')
  Others category find
@endsection

@section('body')

    <div class="container" id="category">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>কোনো পণ্য বা সেবা বিক্রি করুন</h3><hr/>

                    <div class="col-md-5">
                        <h3>একটি শ্রেণী নির্বাচন করুন...</h3>
                        <ul>
                            <li><a href="#menu" data-toggle="pill"><span class=""></span>ইলেকট্রনিক্স<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu1" data-toggle="pill"><span class=""></span>গাড়ি ও অন্যান্য যানবাহন<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu2" data-toggle="pill"><span class=""></span>প্রপার্টি<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu3" data-toggle="pill"><span class=""></span>সার্ভিস<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu4" data-toggle="pill"><span class=""></span>ঘর ও বাগানের সামগ্রী<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu5" data-toggle="pill"><span class=""></span>পোশাক, স্বাস্থ্য ও সৌন্দর্য্য<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu6" data-toggle="pill"><span class=""></span>শখ, খেলাধুলা এবং শিশু<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu7" data-toggle="pill"><span class=""></span>ব্যবসা ও শিল্পকারখানা<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu8" data-toggle="pill"><span class=""></span>শিক্ষা<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu9" data-toggle="pill"><span class=""></span>পোষা প্রাণী ও জীবজন্তু<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu10" data-toggle="pill"><span class=""></span>কৃষি এবং খাদ্যদ্রব্য<i class="fa fa-angle-right"></i></a>
                            <li><a href="#menu11" data-toggle="pill"><span class=""></span>অন্যান্য<i class="fa fa-angle-right"></i></a>

                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-content">
                            <div id="menu" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন... </h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">মোবাইল ফোন<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">মোবাইল ফোন এক্সেসরিজ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">কম্পিউটার এবং ট্যাবলেট<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">টিভি ও ভিডিওর আনুষঙ্গিক যন্ত্রপাতি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ক্যামেরা ও ভিডিও ক্যামেরা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ভিডিও গেম ও কনসোল<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অন্যান্য ইলেকট্রনিক্স<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>

                            <div id="menu1" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">গাড়ি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">মোটরবাইক ও স্কুটার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">সিএনজি ও সাইকেল<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">বাস, ট্রাক ও ভ্যান<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ট্র্যাক্টর এবং হেভি-ডিউটি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অটো পার্টস ও এক্সেসরিজ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">নৌকা ও জল পরিবহন<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অটো সার্ভিস<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu2" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">ফ্ল্যাট ও এ্যাপার্টমেন্ট<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">নতুন ডেভেলপমেন্ট<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">বাড়ি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">প্লট ও জমি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">গ্যারেজ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">কমার্শিয়াল স্পেস<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu3" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">ব্যবসা ও কারিগরি সার্ভিস<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ভ্রমণ ও ভিসা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">টিকেট<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ইভেন্ট ও আতিথেয়তা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">পারিবারিক ও ব্যক্তিগত<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">স্বাস্থ্য ও লাইফস্টাইল<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu4" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">আসবাবপত্র<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ঘরের দ্রব্যসামগ্রী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">বিদ্যুৎ, এসি, বাথরুম এবং বাগান<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ঘরের অন্যান্য জিনিসপত্র<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu5" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">পোশাক<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">জুতা - স্যান্ডেল<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">জুয়েলারী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অপটিক্যাল আইটেম<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ঘড়ি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অন্যান্য ফ্যাশনের সামগ্রী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">স্বাস্থ্য ও সৌন্দর্য পণ্য<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অন্যান্য ব্যক্তিগত সামগ্রী<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu6" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">বাদ্যযন্ত্র<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">খেলার সামগ্রী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">হস্তশিল্প এবং সাজসজ্জা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">প্রাচীন জিনিসপত্র, শিল্প ও সংগ্রহ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">সঙ্গীত, বই এবং চলচ্চিত্র<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">বাচ্চাদের জামাকাপড় ও খেলনা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">শখ, খেলাধুলা এবং শিশুদের অন্যান্য পণ্য<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu7" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}"> অফিস সরবরাহ এবং ষ্টেশনারী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}"> কারখানার মেশিন ও যন্ত্রপাতি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">   কাঁচামাল এবং কারখানার সরবরাহ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">  লাইসেন্স, মালিকানা এবং দরপত্র<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}"> মেডিকেল সরঞ্জাম ও সরবরাহ<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu8" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">পাঠ্য বই<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">টিউশন<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">বিদেশে শিক্ষা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অন্যান্য শিক্ষা<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu9" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">পোষা প্রাণী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">গবাদি পশু<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">পোষা প্রাণীর বিভিন্ন উপকরণ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অন্যান্য পোষা প্রাণী ও জীবজন্তু<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu10" class="tab-pane fade">
                                <h3>উপশ্রেণী নির্বাচন করুন...</h3>
                                <ul>
                                    <li><a href="{{route('location_for_others')}}">খাদ্যদ্রব্য<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">ফসল, বীজ এবং গাছ-গাছালি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">খামারের যন্ত্রপাতি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('location_for_others')}}">অন্যান্য কৃষি এবং খাদ্যদ্রব্য<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="menu11" class="tab-pane fade">

                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="alert alert-warning">
                            <h4 class="text-center"> <strong>সঠিক!</strong> শ্রেণীতে পোস্ট করা নিশ্চিত করুন</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
@endsection