@extends('frontend.master')
@section('title')
    Location for jobs foren
@endsection

@section('body')
    <div class="container" id="location">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>আপনি কোথায় আছেন?</h3><hr/>
                    <div class="col-md-5">
                        <h3>শহর বা বিভাগ নির্বাচন করুন</h3>
                        <p>শহর</p>
                        <ul>
                            <li><a href="#dhaka" data-toggle="pill">ঢাকা<i class="fa fa-angle-right"></i></a>
                            <li><a href="#chittagong" data-toggle="pill">চট্টগ্রাম<i class="fa fa-angle-right"></i></a>
                            <li><a href="#sylhat" data-toggle="pill">সিলেট<i class="fa fa-angle-right"></i></a>
                            <li><a href="#khulna" data-toggle="pill">খুলনা<i class="fa fa-angle-right"></i></a>
                            <li><a href="#borishal" data-toggle="pill">বরিশাল<i class="fa fa-angle-right"></i></a>
                            <li><a href="#rajshahi" data-toggle="pill">রাজশাহী<i class="fa fa-angle-right"></i></a>
                            <li><a href="#rangpur" data-toggle="pill">রংপুর<i class="fa fa-angle-right"></i></a>
                        </ul>
                        <p>বিভাগ</p>
                        <ul>
                            <li><a href="#dhaka" data-toggle="pill">ঢাকা বিভাগ<i class="fa fa-angle-right"></i></a>
                            <li><a href="#chittagong_div" data-toggle="pill">চট্টগ্রাম বিভাগ<i class="fa fa-angle-right"></i></a>
                            <li><a href="#sylhat_div" data-toggle="pill">সিলেট বিভাগ<i class="fa fa-angle-right"></i></a>
                            <li><a href="#khulna_div" data-toggle="pill">খুলনা বিভাগ<i class="fa fa-angle-right"></i></a>
                            <li><a href="#rajshahi_div" data-toggle="pill">রাজশাহী বিভাগ<i class="fa fa-angle-right"></i></a>
                            <li><a href="#rangpur_div" data-toggle="pill">রংপুর বিভাগ<i class="fa fa-angle-right"></i></a>
                            <li><a href="#borishal_div" data-toggle="pill">বরিশাল বিভাগ<i class="fa fa-angle-right"></i></a>
                        </ul>
                    </div>
                    <div class="col-md-5">
                        <div class="tab-content">
                            <div id="dhaka" class="tab-pane fade">
                                <h3>ঢাকা এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">মিরপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">উত্তরা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ধানমন্ডি<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">গুলশান<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">মোহাম্মদপুর<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>

                            <div id="chittagong" class="tab-pane fade">
                                <h3>চট্টগ্রাম এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">আগ্রাবাদ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">চকবাজার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">হালিশহর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নাসিরাবাদ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">কোতয়ালী<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="sylhat" class="tab-pane fade">
                                <h3>সিলেট এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">জিন্দা বাজার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">বন্দর বাজার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">আম্বরখানা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">সাউথ সুরমা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">উপশহর<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="khulna" class="tab-pane fade">
                                <h3>খুলনা এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">খুলনা সদর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">সোনাডাংগা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">খালিশপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">দৌলতপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">খান জাহান আলি<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="borishal" class="tab-pane fade">
                                <h3>বরিশাল  এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">সদর রোড<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নথুল্লাবাদ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নথুল্লাবাদ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নবগ্রাম রোড<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="rajshahi" class="tab-pane fade">
                                <h3>রাজশাহী   এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">সাহেববাজার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">মতিহার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">লক্ষ্মীপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">উপশহর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">কাজলা<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="rangpur" class="tab-pane fade">
                                <h3>রংপুর  এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">জাহাজ কোম্পানি মোড়<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ধাপ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">শাপলা চত্বর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">লালবাগ মোড়<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">সাত মাথা চত্বর<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>

                            <div id="dhaka_div" class="tab-pane fade">
                                <h3>ঢাকা বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">গাজীপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নারায়নগঞ্জ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ময়মনসিংহ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">টাঙ্গাইল<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নরসিংদী<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>

                            <div id="chittagong_div" class="tab-pane fade">
                                <h3>চট্টগ্রাম বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">কুমিল্লা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নোয়াখালী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ফেনী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ব্রাহ্মণবাড়িয়া<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">চাঁদপুর<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="sylhat_div" class="tab-pane fade">
                                <h3>সিলেট বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">মৌলভী বাজার<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">হবিগঞ্জ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">সুনামগঞ্জ<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="khulna_div" class="tab-pane fade">
                                <h3>খুলনা বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">যশোর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">কুষ্টিয়া<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ঝিনাইদাহ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">সাতক্ষীরা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">বাগেরহাট<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="borishal_div" class="tab-pane fade">
                                <h3>বরিশাল বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">পটুয়াখালী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ভোলা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">পিরোজপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">বরগুনা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ঝালকাঠি<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="rajshahi_div" class="tab-pane fade">
                                <h3>রাজশাহী বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">পাবনা<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">বগুড়া<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নাটোর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">সিরাজগঞ্জ<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নওগাঁ<i class="fa fa-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <div id="rangpur_div" class="tab-pane fade">
                                <h3>রংপুর বিভাগ এর মধ্যে একটি স্থানীয় এলাকা নির্বাচন করুন</h3>
                                <p>জনপ্রিয় এলাকাসমূহ</p>
                                <ul>
                                    <li><a href="{{route('post_from_job_ext')}}">দিনাজপুর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">কুড়িগ্রাম<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">ঠাকুরগাঁওর<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">নীলফামারী<i class="fa fa-angle-right"></i></a></li>
                                    <li><a href="{{route('post_from_job_ext')}}">গাইবান্ধার<i class="fa fa-angle-right"></i></a></li>
                                </ul>
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

    <div class="container" id="rules">
    <div class="row">
        <div class="col-md-1"></div>

        <div class="col-md-10 well">
            <h3>জরুরি নিয়ম</h3><hr/>
            <h4>Bikroy.com-এ পোস্ট হওয়া সকল বিজ্ঞাপন অবশ্যই আমাদের নিয়মাবলী অনুযায়ী হতে হবে:</h4>
            <div class="col-md-6">
                <ul>
                    <li>অবশ্যই বিজ্ঞাপনটি সঠিক শ্রেনী দিয়েছেন কিনা খেয়াল করুন।</li>
                    <li>একই বিজ্ঞাপন একবারের বেশি অথবা ৪৮ ঘন্টার মধ্যে আবার পোস্ট করবেন না।</li>
                    <li>জলছাপ যুক্ত ছবি আপলোড করবেন না।</li>
                </ul>
            </div>
            <div class="col-md-6">
                <ul>
                    <li>প্যাকেজ ডিল ছাড়া একই বিজ্ঞাপনে একের বেশী পণ্যের বিবরণ দিবেন না।</li>
                    <li>আপনার ইমেইল অ্যাড্রেস বা ফোন নাম্বার বিজ্ঞাপনের শিরোনাম বা বিবরনে ব্যবহার করবেন না।।</li>
                </ul>
            </div>

        </div>

        <div class="col-md-1"></div>
    </div>
    </div>
@endsection