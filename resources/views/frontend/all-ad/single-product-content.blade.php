@extends('frontend.master')

@section('head')
    <meta property="og:url" content="https://ghoreyboshe.com/single-product-view/{{$product->id}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $product->ad_title }}" />
    <meta property="og:description" content="{{ $product->product_description }}" />
    <meta property="og:image" content="https://ghoreyboshe.com/{{$product->product_image1}}" />
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
    Single Product View
@endsection

@section('body')

    <div id="products_dtailes" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="{{route('/')}}">হোমপেজ</a> -> <a href="{{route('all-ad')}}">সকল বিজ্ঞাপন</a> -> <a href="{{route('divisional-product',['id'=>$div->id])}}"> {{$div->division_name}} </a> -> <a href="{{route('district-ad',['id'=>$district->id])}}"> {{$district->district_name}}</a> -> <a href="{{route('category-product',['id'=>$cat->id])}}"> {{$cat->category_name}} </a> -> <a href="{{route('subcategory-product',['id'=>$subCategory->id])}}"> {{$subCategory->subcategory_name}} </a> ->{{$product->ad_title}} </p>
                </div>
                <div class="col-md-6 prod_img">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{asset($product->product_image1) }}">
                                <div class=""> <img src="{{asset($product->product_image1) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            <li data-thumb="{{asset($product->product_image2) }}">
                                <div class=""> <img src="{{asset($product->product_image2) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            <li data-thumb="{{asset($product->product_image3) }}">
                                <div class=""> <img src="{{asset($product->product_image3) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                        </ul>
                    </div><br/>
                    <div class="media-body">
                        <h4 class="media-heading"><i>Description</i></h4><br/>
                        <!-- <p class="text-justify"> -->
                            @php
                                $string = $product->product_description;
                                if (strlen($string) > 300) {
                                    $trimstring = substr($string, 0, 300);
                                    $trim = substr($string, 300);
                                    echo '<span class="teaser">';
                                        echo $trimstring;
                                    echo '</span>';
                                    echo '<span class="complete">';
                                        echo $trim;
                                    echo '</span>';
                                    echo '<span class="more">more...</span>';
                                }else {
                                echo $string;
                                }
                            @endphp
                        <!-- </p> -->

                        <style>
                            .complete{
                                display:none;
                            }

                            .more{
                                background:lightblue;
                                color:navy;
                                font-size:13px;
                                padding:3px;
                                cursor:pointer;
                            }
                        </style>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 prod_dtls">
                    <h2 class="">{{$product->ad_title}}</h2>
                    <p><i>{{$product->name}} এর মাধ্যমে বিক্রির জন্য   </i></p>
                    <p>{{Carbon\Carbon::parse($product->updated_at)->format("F j, Y, g:i A")}}, {{$product->location}}, {{$product->district_name}}</p>
                    <hr/>
                    <table class="table">
                        <tr class="success">
                            <th>মূল্য (৳)</th>
                            <td>{{$product->product_price}} <br />{{$product->product_price_check}}</td>
                        </tr>
                        <tr class="danger">
                            <th>কন্ডিশন</th>
                            <td>{{$product->product_condition}}</td>
                        </tr>
                        @if($product->product_brand)
                        <tr class="warning">
                            <th>ব্র্যান্ড</th>
                            <td>{{$product->product_brand}}</td>
                        </tr>
                        @endif
                        @if($product->product_model)
                            <tr class="info">
                                <th>মডেল</th>
                                <td>{{$product->product_model}}</td>
                            </tr>
                        @endif
                    </table>

                    <hr/>
                    <h3>যোগাযোগ করুন</h3>
                    <table class="table">
                        <tr class="bg-success">
                            <th><h3><i class="fa fa-phone"></i></h3></th>
                            <th><h3>{{$product->phone_number}}</h3></th>
                        </tr>
                        <tr class="bg-danger">
                            <th><h3><a href="#"><i class="fa fa-comment"></i></a></h3></th>
                            <th><a href="#"><h3>চ্যাট</h3></a></th>
                        </tr>
                    </table>
                    {{--<h3>এই সদস্যর বিজ্ঞাপন ভিজিট করুন।</h3><hr/>--}}
                    {{--<a href="#"><h4>JONH IPS( Munna AD)</h4></a>--}}
                    {{--<p>JONH IPS & UPS আপনার নির্ভরযোগ্য বন্ধু</p><hr/>--}}
                    <a href="{{route('promote-ad',['id'=>$product->id,'infoId'=>$product->information_id])}}" class="btn btn-ad-post btn-block text-danger">আপনার মূল্যবান বিজ্ঞাপন প্রচার করুন।</a>
                    <hr />
                    <h4>বিজ্ঞাপনটি শেয়ার করুন</h4>

                    <a href="https://www.facebook.com/sharer/sharer.php?u=ghoreyboshe.com/single-product-view/{{$product->id}}" target="_blank" class="share-icon facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=https://ghoreyboshe.com/single-product-view/{{$product->id}}&text={{ $product->ad_title}} বিস্তারিত দেখতে ক্লিক করুন " target="_blank" class="share-icon twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://plus.google.com/share?url=ghoreyboshe.com/single-product-view/{{$product->id}}" target="_blank" class="share-icon gplus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <hr />
                </div>
            </div>
        </div>



        <div class="container">
            <div class="col-sm-12 col-lg-8 col-md-12  ">
                <h3>যোগাযোগ করুন</h3>
                <table class="table">
                    <tr class="active">
                        <th scope="col"><h3><i class="fa fa-phone"></i></h3></th>
                        <th scope="col"><h3>{{$product->phone_number}}</h3></th>
                    </tr>
                    <tr class="active">
                        <th scope="col"><h3><a href="#"><i class="fa fa-comment"></i></a></h3></th>
                        <th scope="col"><a href="#"><h3>চ্যাট</h3></a></th>
                    </tr>
                </table>
            </div>

            <div class="col-sm-12 col-lg-4 col-md-12">
                <img src="{{asset('/') }}front/images/ResizerImage336X280.jpg" class="img-fluid img-thumbnail">
            </div>
        </div>

    </div>

    <!--        products details end-->








    <!--        related products start-->

    <div id="related_products">
        <div class="container text-center">
            <div class="row">
                <h3>Related Products</h3>
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
                                    <img src="{{asset($similarAd1->product_image1)}}" alt="" style="width:200px;height: 200px;"/>
                                    <a href="{{route('single-product-view',['id'=>$similarAd1->id])}}">
                                        <div class="caption">
                                            <h4>{{$similarAd1->ad_title}}</h4>
                                        </div>
                                    </a>
                                    <p>{{$similarAd1->subcategory_name}}, {{$similarAd1->district_name}}</p>
                                    <p><span>৳ {{$similarAd1->product_price}}</span></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach($similarAds2 as $similarAd2)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd2->product_image1)}}" alt="" style="width:200px;height: 200px;"/>
                                        <a href="{{route('single-product-view',['id'=>$similarAd2->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd2->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p>{{$similarAd2->subcategory_name}}, {{$similarAd2->district_name}}</p>
                                        <p><span>৳ {{$similarAd2->product_price}}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach($similarAds3 as $similarAd3)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd3->product_image1)}}" alt="" style="width:200px;height: 200px;"/>
                                        <a href="{{route('single-product-view',['id'=>$similarAd3->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd3->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p>{{$similarAd3->subcategory_name}}, {{$similarAd3->district_name}}</p>
                                        <p><span>৳ {{$similarAd3->product_price}}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    $(".more").toggle(function(){
        $(this).text("less..").siblings(".complete").show();
    }, function(){
        $(this).text("more..").siblings(".complete").hide();
    });
</script>
    
@endsection