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
                    <p><a href="{{route('/')}}">হোমপেজ</a> -> <a href="{{route('all-ad')}}">সর্ব প্রকার বিজ্ঞাপন</a> -> <a href="{{route('divisional-product',['id'=>$div->id])}}"> {{$div->division_name}} </a> -> <a href="{{route('district-ad',['id'=>$district->id])}}"> {{$district->district_name}}</a> -> <a href="{{route('category-product',['id'=>$cat->id])}}"> {{$cat->category_name}} </a> -> <a href="{{route('subcategory-product',['id'=>$subCategory->id])}}"> {{$subCategory->subcategory_name}} </a> ->{{$job->ad_title}} </p>
                </div>
                <div class="col-md-12" >
                    <div class="col-md-8">
                        <div class="media-object media-left">
                            <img src="{{asset($job->company_logo)}}" alt="Logo" style="    width: 55%;
    height: 53%;
    padding: 22px;"/>
                        </div>



                        <div class="col-md-12" style="padding: 21px;box-shadow: 0px 0px 10px seagreen;">
                            <div class="col-md-5">
                                <table class="table">
                                    <tr class="bg-success">
                                        <th>চাকরির অবস্থান</th>
                                        <td>{{$job->district_name}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি</th>
                                        <td>{{$job->company_name}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কাজের টাইপ</th>
                                        <td>{{$job->job_type}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কাজের বিভাগ</th>
                                        <td>{{$job->industry}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>চাকুরি অবস্তানের নাম</th>
                                        <td>{{$job->designation}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>শিক্ষাগত যোগ্যতা </th>
                                        <td>{{$job->minimum_requirement}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কাজের অভিজ্ঞতা</th>
                                        <td>{{$job->skill}}</td>
                                    </tr>
{{---------------}}


                                    <tr class="bg-success">
                                        <th>আবেদনকারীর বয়স:</th>
                                        <td>{{$job->candidate_age}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>জব লোকেশনঃ</th>
                                        <td>{{$job->job_location}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি সুযোগ সুবিধাঃ</th>
                                        <td>{{$job->company_facility}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>ককোম্পানি যানবাহন সুবিধাঃ</th>
                                        <td>{{$job->company_transport_facility}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি খাবারের ব্যাবস্থাঃ</th>
                                        <td>{{$job->company_food_facility}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি মোবাইল বিলঃ</th>
                                        <td>{{$job->company_mobile_bill}}</td>
                                    </tr>
                                </table>

                            </div>
                            <div class="col-md-1"></div>
                            <div class="col-md-5">
                                <table class="table">
                                    <tr class="bg-success">
                                        <th>মাসিক বেতন</th>
                                        @if($job->starting_range)
                                            <td>Tk. {{$job->starting_range}} - {{$job->ending_range}}</td>
                                        @else
                                            <td>Negotiable</td>
                                        @endif
                                    </tr>
                                    <tr class="bg-success">
                                        <th>পদের সংখ্যা</th>
                                        <td>{{$job->total_vacancies }}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>আবেদনকারীর বয়স</th>
                                        <td>{{$job->age_limit}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>জেন্ডার</th>
                                        <td>{{$job->gender}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>অভিজ্ঞতা</th>
                                        <td>{{$job->experience}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>শিক্ষাগত অভিজ্ঞতা </th>
                                        <td>{{$job->education_sector}}</td>
                                    </tr>

                                    <tr class="bg-success">
                                        <th>আবেদন করার শেষ তারিখ</th>
                                        <td>{{$job->expire_date}}</td>
                                    </tr>


{{--                                    -----------}}

                                    <tr class="bg-success">
                                        <th>কোম্পানি ফেস্টিভ্যাল বোনাসঃ</th>
                                        <td>{{$job->company_fastival_bonus}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি কি প্রকারঃ</th>
                                        <td>{{$job->company_fee_plan}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি বেতন ভাড়বেঃ</th>
                                        <td>{{$job->company_bill_incrase}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি ওভার টাইম সুবিধাঃ</th>
                                        <td>{{$job->company_full_time}}</td>
                                    </tr>
                                    <tr class="bg-success">
                                        <th>কোম্পানি ওভার টাইম সুবিধাঃ</th>
                                        <td>{{$job->company_full_time}}</td>
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




                            <div class="col-sm-12 col-lg-12 col-md-12  ">
                                <h3>যোগাযোগ করুন</h3>
                                <table class="table">
{{--                                    <tr class="active">--}}
{{--                                        <th scope="col"><h3><i class="fa fa-phone"></i></h3></th>--}}
{{--                                        <th scope="col"><h3>{{$job->phone_number}}</h3></th>--}}
{{--                                    </tr>--}}
                                    <tr class="active">
                                    <tr class="bg-danger">
                                        <th><h3><a href="#"><i class="fa fa-comment"></i></a></h3></th>
                                        @if(Session::get('frontUserId'))
                                            <th><a href="#chat" data-toggle="modal"><h3>ম্যাসেজ/চ্যাট করুন</h3></a></th>
                                        @else
                                            <th><a href="{{route('signup-options')}}" data-toggle="modal"><h3>ম্যাসেজ/চ্যাট করুন</h3></a></th>
                                        @endif
                                    </tr>
                                    </tr>
                                </table>
                            </div>

                        <div class="col-md-12" style="margin-top: 10px">
                            <h4>বিজ্ঞাপনটি শেয়ার করুন</h4><hr>
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

                        <div class="col-md-12">
                            <img src="{{asset('/') }}front/images/ResizerImage336X280.jpg" class="img-fluid img-thumbnail">
                        </div>

                        </div>



                    </div>
                </div>


            <div class="row">
                <div class="col-md-8">
                    <h3>কাজের বিবরণ</h3>
                    <p>{!! $job->description !!}</p>
                </div>



            </div>

            <div class="col-sm-12 col-lg-12 col-md-12" style="">
                <h3>পণ্য টি কিনতে আজই যোগাযোগ করুনঃ</h3>
                <img src="{{asset('/') }}front/img/payment.PNG" class="img-fluid img-thumbnail">
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




    {{--chat model here--}}
    <div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$job->ad_title}}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-md-3">
                            <img style="    height: 100px;width: 139px;margin-top: 30px;" src="{{asset($job->company_logo) }}"/>
                        </div>

                        <div class="col-md-9">
{{--                            <h3>{{$job->product_price}}Tk ,{{$job->product_price_check}}</h3>--}}
{{--                            <p>{!!str_limit($job->product_description,100)!!}</p>--}}
                        </div>
                    </div>

                </div>


                <form action="{{route('chat_user_create',$job->id)}}" method="get">
                    <div class="modal-body">
                        <input type="text" class="form-control" name="message" placeholder="ম্যাসেজ">
                        <input type="hidden" value="" name="sellerid">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection