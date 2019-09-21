@extends('frontend.master')
@section('title')
    Home
@endsection

@section('body')
    @include('frontend.includes.notification')


    <div class="container"><img src="{{asset('/') }}front/images/after_logo.jpg" style="width: 100%"> </div>

    <div id="welcome">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="media">
                        <div class="media-heading">
                            <p class="text-success"> <marquee>ধন্যবাদ আপনাকে , {{$websiteInformation ->site_name}} এ খুব সহজে কিছু বিক্রি বা কিনতে পারেন । এটি বাংলাদেশের সবচেয়ে বড় অনলাইন মার্কেট। </marquee> </p>
                        </div>
                        <div class="media-body">
                            <p class="text-justify"> {!! $websiteInformation->description !!} </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 well text-center">
                    <div class="row">
                        <div class="media col-md-12"style="background: #e7edee">
                            <div class="media-object media-left">
                                <i class="fa fa-facebook-official"></i>
                            </div>
                            <div class="media-body">
                                <a href="https://www.facebook.com/ghoreyboshe/">GhoreyBoshe.com পেজে লাইক দিন</a>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <p style="    font-weight: bold;color: red;font-size: 19px;">ঢাকা বিভাগে ১৭ টা জেলাঃ</p>
                            <div class="owl-carousel">
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                                <div> <img src="{{asset('/') }}front/images/city.jpg" style="width: 100%"> </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--       welcome end-->

    <div class="container" style="margin-bottom: 10px">
        <div class="row">
            <div class="col-md-9 col-sm-12">

                    <p style="    font-size: 15px;
    font-weight: bold;">বাংলাদেশ-এর সবগুলো বিভাগ:</p>
                        <ul>
                            @foreach($divisions as $division)
                                <li class="media" style="float: left;
    margin-left: 5px;
    height: 36px;
    width: 86px;
    border: 1px solid  #5a00ff;;
    text-align: center;
    background: #a5cd4f;
    border-radius: 14%;
    padding: 7px;
    color: black;
    margin-top: 10px;">
                                    <a href="{{route('divisional-product',['id'=>$division->id])}}" style="    color: black;font-size: 13px">
                                       {{$division->division_name}}
                                            <span style="color:darkslategray;">({{$division->divisional_products_count}})</span>

                                    </a>
                                </li>
                            @endforeach
                        </ul>
            </div>
            <div class="col-md-3 col-sm-12">
                <img src="{{asset('/') }}front/images/ResizerImage320X100.jpg" class="img-fluid img-thumbnail">
            </div>
        </div>


    </div>





    <!-- slider start-->
    <div id="slider">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 my_slider">
                    <div class="carousel slide" id="myCarousel" data-ride="carousel" data-interval="2500">
                        <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                            {{--<li data-target="#myCarousel" data-slide-to="4"></li>--}}
                        </ol>

                        <div class="carousel-inner">
                            <div class="item active">
                                <a href="{{$firstbanner->banner_url}}"><img src="{{asset($firstbanner->banner_image) }}" alt=""/></a>
                            </div>
                            @foreach($bannerAds as $bannerAd)
                            <div class="item">
                                <a href="{{$bannerAd->banner_url}}"><img src="{{asset($bannerAd->banner_image) }}" alt=""/></a>
                            </div>
                            @endforeach
                        </div>
                        <a href="#myCarousel" class="carousel-control left" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#myCarousel" class="carousel-control right" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- slider end-->

    <!--main body star-->
    <div id="collapse">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="well text-center">
                        <div class="media">
                            <img src="{{asset('/') }}front/images/add.png" alt=""/>
                            <div class="media-body">
                                <h4 class="media-heading">GhoreyBoshe.com ব্যবহার এ আশংকামুক্ত থাকুন। </h4>
                                <p>GhoreyBoshe.com এ বিভিন্ন ধরনের ঝামেলা ছাড়া অর্থ আদান-প্রদান করুন এবং শর্তগুলো জেনে নিন।</p>
                            </div>
                            {{--<a href="#"><h4>আরও জানুন <i class="fa fa-angle-right"></i></h4></a>--}}
                        </div>
                    </div>
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse_manu">শ্রেণী:</a>
                                </h4>
                            </div>
                            <div id="collapse_manu" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">সকল শ্রেণী</a>
                                            <ul>
                                                @foreach($categories as $category)
                                                    <li class="media">
                                                        <a href="{{route('category-product',['id'=>$category->id])}}" >
                                                            <div class="media-object media-left">
                                                                <img src="{{asset($category->category_image)}}" alt="Category Image" style="width: 25px;height: 25px;"/>
                                                            </div>
                                                            <div class="media-body">{{$category->category_name}}
                                                                <span style="color:darkslategray;">({{$category->products_count}})</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse_manu2"></a>
                                </h4>
                            </div>
                            <div id="collapse_manu2" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="#">জেলা নির্বাচন করুন</a>
                                            <ul>
                                                @foreach($divisions as $division)
                                                    <li class="media">
                                                        <a href="{{route('divisional-product',['id'=>$division->id])}}">
                                                            <div class="media-object media-left">

                                                            </div>
                                                            <div class="media-body">{{$division->division_name}}
                                                                <span style="color:darkslategray;">({{$division->divisional_products_count}})</span>
                                                            </div>
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="col-md-12">
                        <div class="col-md-6 text-center">
                            <div class="jumbotron">
                                <h3><a href="{{route('terms')}}" style="font-size: 16px">GhoreyBoshe.com এর নির্দেশনাসমূহ পড়ুন</a></h3>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="jumbotron">
                                <h3><a href="#complain_modal" data-toggle="modal">অভিযোগ করুন</a></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12  well">
                        <div class="body_containt text-center">
                            @foreach($categories as $category)
                            <div class="col-md-6 equal-div">
                                <div class="media">
                                    <a href="{{route('category-product',['id'=>$category->id])}}">
                                        <div class="media-object">
                                            <img src="{{asset($category->category_image)}}" />
                                        </div>
                                        <div class="media-heading">{{$category->category_name}}
                                            <span style="color:darkslategray;">({{$category->products_count}})</span>
                                        </div>
                                    </a>
                                    <div class="media-body">
                                        {!! $category->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!--main body end-->

    <div id="custo_add">
        <div class="container">
            <div class="row well">
                <div class="col-md-12 ">
                    <p>হোমপেজ -> Top Ad</p>
                    <p><i>{{$topAds->total()}} টি বিজ্ঞাপনের মধ্যে {{($topAds->currentPage()-1)* $topAds->perPage() + 1}} -
                            @if((($topAds->currentPage()-1)* $topAds->perPage() + $topAds->perPage()) > $topAds->total() )
                                {{--@if($currentPage == $products->lastPage())--}}
                                {{ $topAds->total() }}
                            @else
                                {{ ($topAds->currentPage()-1)* $topAds->perPage() + $topAds->perPage() }}
                            @endif
                            টি দেখাচ্ছে</i><p>

                        <table class="table-hover bg-danger">
                            <tbody>
                            @foreach($topAds as $topAd)
                                <tr>
                                    <td>
                                        <div class="media">
                                            <div class="media-object media-left">
                                                @if( isset($topAd->product_image1))
                                                    <img src="{{asset($topAd->product_image1)}}" alt="Product Image" style="width:150px;height: 150px;"/>
                                                @elseif(isset($topAd->company_logo))
                                                    <img src="{{asset($topAd->company_logo)}}" alt="Company Logo" style="width:150px;height: 150px;"/>
                                                @endif

                                            </div>
                                            <div class="media-body">
                                                @if(isset($topAd->company_name ))
                                                    <h3 class="media-heading">
                                                        <a href="{{route('single-job-view',['id'=>$topAd->id])}}">{{$topAd->ad_title}}</a>
                                                    </h3>
                    <p><i>{{$topAd->company_name }}</i></p>
                    <p><i>{{$topAd->district_name}}</i></p>
                    @elseif(isset($topAd->property_price))
                        <h3 class="media-heading">
                            <a href="{{route('single-property-view',['id'=>$topAd->id])}}">{{$topAd->ad_title}}</a>
                        </h3>
                        <p><i>{{$topAd->district_name}}, {{$topAd->subcategory_name}}</i></p>
                        <span>TK. {{$topAd->property_price}}</span>
                    @elseif(isset($topAd->product_price))
                        <h3 class="media-heading">
                            <a href="{{route('single-product-view',['id'=>$topAd->id])}}">{{$topAd->ad_title}}</a>
                        </h3>
                        <p><i>{{$topAd->district_name}}, {{$topAd->subcategory_name}}</i></p>
                        <span>TK. {{$topAd->product_price}}</span>
                    @endif
                    <p style="padding-bottom: 15px;"></p>
                    <p class="text-right"><button type="button" class="btn btn-primary">Top Ad</button></p>
                </div>
            </div>
            </td>
            </tr>
            @endforeach
            </tbody>
            </table>

            <div class="text-center">
                {{$topAds->render()}}
            </div>

        </div>
    </div>


    @include('frontend.includes.ad-post')


@endsection

