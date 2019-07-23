@extends('frontend.master')

@section('head')
    <meta property="og:url" content="https://ghoreyboshe.com/single-job-view/{{$job->id}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $job->ad_title }}" />
    <meta property="og:description" content="{{ $job->description }}" />
    <meta property="og:image" content="https://ghoreyboshe.com/{{$job->company_logo}}" />
    <div id="fb-root"></div>
    <script>
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=2571668073057524';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
@endsection

@section('title')
    Single Job View
@endsection

@section('body')
    <div id="products_dtailes" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="{{route('/')}}">হোমপেজ</a> -> <a href="{{route('all-ad')}}">সকল বিজ্ঞাপন</a> -> <a href="{{route('divisional-product',['id'=>$div->id])}}"> {{$div->division_name}} </a> -> <a href="{{route('district-ad',['id'=>$district->id])}}"> {{$district->district_name}}</a> -> <a href="{{route('category-product',['id'=>$cat->id])}}"> {{$cat->category_name}} </a> -> <a href="{{route('subcategory-product',['id'=>$subCategory->id])}}"> {{$subCategory->subcategory_name}} </a> ->{{$job->ad_title}} </p>
                </div>
                <div class="col-md-12">
                    <div class="col-md-8">
                        <div class="media-object media-left">
                            <img src="{{asset($job->company_logo)}}" alt="Logo" style="width:200px;height: 200px;"/>
                        </div>
                        <div class="col-md-12">
                            <div class="col-md-5">
                                <table class="table">
                                    <tr>
                                        <th>চাকরির অবস্থান</th>
                                        <td>{{$job->district_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>কোম্পানি</th>
                                        <td>{{$job->company_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>কাজের টাইপ</th>
                                        <td>{{$job->job_type}}</td>
                                    </tr>
                                    <tr>
                                        <th>কাজের বিভাগ</th>
                                        <td>{{$job->industry}}</td>
                                    </tr>
                                    <tr>
                                        <th>চাকুরি অবস্তানের নাম</th>
                                        <td>{{$job->designation}}</td>
                                    </tr>
                                    <tr>
                                        <th>শিক্ষাগত যোগ্যতা </th>
                                        <td>{{$job->minimum_requirement}}</td>
                                    </tr>
                                    <tr>
                                        <th>কাজের অভিজ্ঞতা</th>
                                        <td>{{$job->skill}}</td>
                                    </tr>


                                </table>

                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <table class="table">
                                    <tr>
                                        <th>মাসিক বেতন</th>
                                        @if($job->starting_range)
                                            <td>Tk. {{$job->starting_range}} - {{$job->ending_range}}</td>
                                        @else
                                            <td>Negotiable</td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>পদের সংখ্যা</th>
                                        <td>{{$job->total_vacancies }}</td>
                                    </tr>
                                    <tr>
                                        <th>আবেদনকারীর বয়স</th>
                                        <td>{{$job->age_limit}}</td>
                                    </tr>
                                    <tr>
                                        <th>জেন্ডার</th>
                                        <td>{{$job->gender}}</td>
                                    </tr>
                                    <tr>
                                        <th>অভিজ্ঞতা</th>
                                        <td>{{$job->experience}}</td>
                                    </tr>
                                    <tr>
                                        <th>শিক্ষাগত অভিজ্ঞতা </th>
                                        <td>{{$job->education_sector}}</td>
                                    </tr>

                                    <tr>
                                        <th>আবেদন করার শেষ তারিখ</th>
                                        <td>{{$job->expire_date}}</td>
                                    </tr>

                                </table>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 prod_dtls">
                        <div class="media-heading">
                            <h3>{{$job->ad_title}}</h3>
                            <p><i>{{$job->name}} এর মাধ্যমে পোস্ট করা হয়েছে  </i></p>
                            <p>{{Carbon\Carbon::parse($job->updated_at)->format("F j, Y, g:i A")}}</p>
                            <hr/>
                        </div>
                        <h3>যোগাযোগ করুন</h3>
                        <a href="#"><h3><i class="fa fa-phone"></i> {{$job->phone_number}}</h3></a><hr/>
                        <a href="#">
                            <img src="{{asset('/') }}front/images/cat.png" alt=""/>
                            চ্যাট</a><hr/>
                        <a href="{{route('promote-ad',['id'=>$job->id,'infoId'=>$job->information_id])}}" class="btn btn-ad-post btn-block text-danger">আপনার মূল্যবান বিজ্ঞাপন প্রচার করুন।</a>
                        <hr />
                        <h4>বিজ্ঞাপনটি শেয়ার করুন</h4>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=ghoreyboshe.com/single-job-view/{{$job->id}}" target="_blank" class="share-icon facebook">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=https://ghoreyboshe.com/single-job-view/{{$job->id}}&text={{ $job->ad_title}} বিস্তারিত দেখতে ক্লিক করুন " target="_blank" class="share-icon twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://plus.google.com/share?url=ghoreyboshe.com/single-job-view/{{$job->id}}" target="_blank" class="share-icon gplus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <hr />
                    </div>
                </div>


                <div class="col-md-12">
                    <h3>কাজের বিবরণ</h3>
                    <p>{!! $job->description !!}</p>
                </div>

            </div>
        </div>
    </div>

    <!--        related jobs start-->

    <div id="related_products">
        <div class="container text-center">
            <div class="row">
                <h3>Related Jobs</h3>
            </div>
        </div>
    </div>


    <!-- slider start-->
    <div id="related_slider">
        <div class="container">
            <div class="row">
                <div class="carousel slide" id="myCarousel" data-ride="" data-interval="2500">
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            @foreach($similarAds1 as $similarAd1)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd1->company_logo)}}" alt="" style="width:200px;height: 200px;"/>
                                        <a href="{{route('single-job-view',['id'=>$similarAd1->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd1->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p><span>{{$similarAd1->company_name}}</span></p>
                                        <p>{{$similarAd1->subcategory_name}}, {{$similarAd1->district_name}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach($similarAds2 as $similarAd2)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd2->company_logo)}}" alt="" style="width:200px;height: 200px;"/>
                                        <a href="{{route('single-job-view',['id'=>$similarAd2->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd2->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p><span>{{$similarAd2->company_name}}</span></p>
                                        <p>{{$similarAd2->subcategory_name}}, {{$similarAd2->district_name}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach($similarAds3 as $similarAd3)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd3->company_logo)}}" alt="" style="width:200px;height: 200px;"/>
                                        <a href="{{route('single-job-view',['id'=>$similarAd3->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd3->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p><span>{{$similarAd3->company_name}}</span></p>
                                        <p>{{$similarAd3->subcategory_name}}, {{$similarAd3->district_name}}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection