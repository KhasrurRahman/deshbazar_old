@extends('frontend.master')

@section('head')
    <meta property="og:url" content="https://ghoreyboshe.com/single-property-view/{{$property->id}}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $property->ad_title }}" />
    <meta property="og:description" content="{{ $property->description }}" />
    <meta property="og:image" content="https://ghoreyboshe.com/{{$property->product_image1}}" />
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
   Single Property View
@endsection

@section('body')

    <div id="products_dtailes" style="background: #fff">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><a href="{{route('/')}}">হোমপেজ</a> -> <a href="{{route('all-ad')}}">সর্ব প্রকার বিজ্ঞাপন</a> -> <a href="{{route('divisional-product',['id'=>$div->id])}}"> {{$div->division_name}} </a> -> <a href="{{route('district-ad',['id'=>$district->id])}}"> {{$district->district_name}}</a> -> <a href="{{route('category-product',['id'=>$cat->id])}}"> {{$cat->category_name}} </a> -> <a href="{{route('subcategory-product',['id'=>$subCategory->id])}}"> {{$subCategory->subcategory_name}} </a> ->{{$property->ad_title}} </p>
                </div>
                <div class="col-md-6 prod_img">
                    <div class="flexslider">
                        <ul class="slides">
                            <li data-thumb="{{asset($property->product_image1) }}">
                                <div class=""> <img src="{{asset($property->product_image1) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            <li data-thumb="{{asset($property->product_image2) }}">
                                <div class=""> <img src="{{asset($property->product_image2) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                            <li data-thumb="{{asset($property->product_image3) }}">
                                <div class=""> <img src="{{asset($property->product_image3) }}" data-imagezoom="true" class="img-responsive" alt=""> </div>
                            </li>
                        </ul>
                    </div><br/>
                    <div class="media-body">
                        <h4 class="media-heading"><i>Description</i></h4><br/>
                        <p class="text-justify">
                            @php
                                $string = $property->description;
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
                        </p>

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
                    <h2 class="">{{$property->ad_title}}</h2>
                    <p><i>{{$property->name}} এর মাধ্যমে বিক্রির জন্য   </i></p>
                    <p>{{Carbon\Carbon::parse($property->updated_at)->format("F j, Y, g:i A")}}, {{$property->location}}, {{$property->district_name}}</p>
                    <hr/>
                    <table class="table">
                        <tr class="success">
                            <th>মূল্য (৳)</th>
                            <td>{{$property->property_price}} <br />{{$property->property_price_check}}</td>
                        </tr>
                        @if($property->bed)
                            <tr class="success">
                                <th>বেড</th>
                                <td>{{$property->bed}}</td>
                            </tr>
                        @endif
                        @if($property->bath)
                            <tr class="success">
                                <th>বাথ</th>
                                <td>{{$property->bath}}</td>
                            </tr>
                        @endif
                        @if($property->home_area)
                            <tr class="success">
                                <th>ফ্ল্যাট / বাড়ির আয়তন</th>
                                <td>{{$property->home_area}}  {{$property->home_area_unit}}  </td>
                            </tr>
                        @endif
                        @if($property->land_area)
                            <tr class="success">
                                <th>জমির আয়তন</th>
                                <td>{{$property->land_area}}  {{$property->land_area_unit}}  </td>
                            </tr>
                        @endif

                        @if($property->palce_type)
                            <tr class="success">
                                <th>জমির ধরন</th>
                                <td>{{$property->palce_type}}</td>
                            </tr>
                        @endif
                        @if($property->location_point)
                            <tr class="success">
                                <th>ঠিকানা</th>
                                <td>{{$property->location_point}}</td>
                            </tr>
                        @endif
                        @if($property->village_word)
                            <tr class="success">
                                <th>গ্রাম ও ওয়ার্ড</th>
                                <td>{{$property->village_word}}</td>
                            </tr>
                        @endif
                    </table>

                    <hr/>
                    <h3>যোগাযোগ করুন</h3>
                    <table class="table">
                        <tr class="bg-success">
                            <th><h3><i class="fa fa-phone"></i></h3></th>
                            <th><h3>{{$property->phone_number}}</h3></th>
                        </tr>
                        <tr class="bg-danger">
                            <th><h3><a href="#"><i class="fa fa-comment"></i></a></h3></th>
                            @if(Session::get('frontUserId'))
                                <th><a href="#chat" data-toggle="modal"><h3>ম্যাসেজ/চ্যাট করুন</h3></a></th>
                            @else
                                <th><a href="{{route('signup-options')}}" data-toggle="modal"><h3>ম্যাসেজ/চ্যাট করুন</h3></a></th>
                            @endif
                        </tr>
                    </table>








                    <a href="{{route('promote-ad',['id'=>$property->id,'infoId'=>$property->information_id])}}" class="btn btn-success btn-block text-danger">আপনার বিশেষভাবে আকর্ষণীয় করুন</a>
                    <hr />
                    <h4>বিজ্ঞাপনটি শেয়ার করুন</h4>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=ghoreyboshe.com/single-property-view/{{$property->id}}" target="_blank" class="share-icon facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=https://ghoreyboshe.com/single-property-view/{{$property->id}}&text={{ $property->ad_title}} বিস্তারিত দেখতে ক্লিক করুন " target="_blank" class="share-icon twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="https://plus.google.com/share?url=ghoreyboshe.com/single-property-view/{{$property->id}}" target="_blank" class="share-icon gplus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <hr />
                </div>
            </div>
        </div>
    </div>

    <!--        products details end-->

    <div class="container">
        <div class="col-sm-12 col-lg-8 col-md-12  ">
            <h3>যোগাযোগ করুন</h3>
            <table class="table">
                <tr class="active">
                    <th scope="col"><h3><i class="fa fa-phone"></i></h3></th>
                    <th scope="col"><h3>{{$property->phone_number}}</h3></th>
                </tr>
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

        <div class="col-sm-12 col-lg-4 col-md-4">
            <img src="{{asset('/') }}front/images/ResizerImage336X280.jpg" class="img-fluid img-thumbnail">
        </div>
        <div class="col-sm-12 col-lg-12 col-md-12" style="margin-top: -70px">
            <h3>পণ্য টি কিনতে আজই যোগাযোগ করুনঃ</h3>
            <img src="{{asset('/') }}front/img/payment.PNG" class="img-fluid img-thumbnail">
        </div>
    </div>

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
                                    <img src="{{asset($similarAd1->product_image1)}}" alt="" style="width: 100%"/>
                                    <a href="{{route('single-property-view',['id'=>$similarAd1->id])}}">
                                        <div class="caption">
                                            <h4>{{$similarAd1->ad_title}}</h4>
                                        </div>
                                    </a>
                                    <p>{{$similarAd1->subcategory_name}}, {{$similarAd1->district_name}}</p>
                                    <p><span>৳ {{$similarAd1->property_price}}</span></p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach($similarAds2 as $similarAd2)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd2->product_image1)}}" alt="" style="width: 100%"/>
                                        <a href="{{route('single-property-view',['id'=>$similarAd2->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd2->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p>{{$similarAd2->subcategory_name}}, {{$similarAd2->district_name}}</p>
                                        <p><span>৳ {{$similarAd2->property_price}}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="item">
                            @foreach($similarAds3 as $similarAd3)
                                <div class="col-md-3 text-center">
                                    <div class="">
                                        <img src="{{asset($similarAd3->product_image1)}}" alt="" style="width: 100%"/>
                                        <a href="{{route('single-property-view',['id'=>$similarAd3->id])}}">
                                            <div class="caption">
                                                <h4>{{$similarAd3->ad_title}}</h4>
                                            </div>
                                        </a>
                                        <p>{{$similarAd3->subcategory_name}}, {{$similarAd3->district_name}}</p>
                                        <p><span>৳ {{$similarAd3->property_price}}</span></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--    chat nodel here--}}
    {{--chat model here--}}
    <div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">{{$property->ad_title}}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="row">
                        <div class="col-md-3">
                            <img style="    height: 100px;width: 139px;margin-top: 30px;" src="{{asset($property->product_image1) }}"/>
                        </div>

                        <div class="col-md-9">
                            <h3>{{$property->property_price}}Tk ,{{$property->property_price_check}}</h3>
                            <p>{!!str_limit($property->description,100)!!}</p>
                        </div>
                    </div>

                </div>


                <form action="{{route('chat_user_create',$property->id)}}" method="get">
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
<script>
    $(".more").toggle(function(){
        $(this).text("less..").siblings(".complete").show();
    }, function(){
        $(this).text("more..").siblings(".complete").hide();
    });
</script>
    
@endsection