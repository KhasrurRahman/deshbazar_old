@extends('frontend.master')
@section('title')
    সকল বিজ্ঞাপন
@endsection

@section('body')

    <!--body menu start-->
    <div id="body_menu">
        <div class="container">
            <div class="row well">
                <div class="col-md-12">
                    <form class="form-inline" action="{{route('ad-search')}}" method="POST">
                        {{csrf_field()}}
                        <div class="col-md-3 menu_col">
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#location_modal">
                                <i class="fa fa-location-arrow"></i>
                                {{$div->division_name}}</button>
                        </div>
                        <div class="col-md-3 menu_col">
                            <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#category_modal">
                                <i class="fa fa-tag"></i>
                                {{$subCategory->subcategory_name}}</button>
                        </div>
                        <div class=" col-md-6 menu_col">
                            <div class="input-group btn-block">
                                <input type="text" class="form-control" placeholder="আপনি কী খুঁজছেন?" name="search">
                                <div class="input-group-btn ">
                                    <button class="btn btn-default btn-block" type="submit">
                                        <i class="fa fa-search"></i>অনুসন্ধান
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--body menu end-->

    <!--main body star-->
    <div id="collapse">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
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
                                        <li><a href="{{route('all-ad')}}">সকল শ্রেণী </a>
                                            <ul>
                                                <li class="media">
                                                    <a href="{{route('category-product',['id'=>$cat->id])}}">
                                                        <div class="media-object media-left">
                                                            <img src="{{asset($cat->category_image)}}" alt="Category Image" style="width: 25px;height: 25px;"/>
                                                        </div>
                                                        <div class="media-body">{{$cat->category_name}}</div>
                                                    </a>
                                                </li>
                                                <li class="media">
                                                    <a href="{{route('subcategory-with-division',[
                                                    'subcategoryId'=>$subCategory->id,
                                                    'divisionId'=>$div->id,
                                                    ])}}">
                                                        <div class="media-object media-left">

                                                        </div>
                                                        <div class="media-body">{{$subCategory->subcategory_name}}</div>
                                                    </a>
                                                </li>
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
                                    <a data-toggle="collapse" href="#collapse_manu2">অবস্থান:</a>
                                </h4>
                            </div>
                            <div id="collapse_manu2" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <ul>
                                        <li><a href="{{route('all-ad')}}">বাংলাদেশ-এর সবগুলো বিভাগ</a>
                                            <ul>
                                                <li class="media">
                                                    <a href="{{route('divisional-product',['id'=>$div->id])}}">
                                                        <div class="media-object media-left">

                                                        </div>
                                                        <div class="media-body">{{$div->division_name}} > </div>
                                                    </a>
                                                </li>
                                                @foreach($districts as $district)
                                                    <li class="media">
                                                        <a href="{{route('subcategory-with-district',[
                                                        'subcategoryId'=>$subCategory->id,
                                                        'districtId'=>$district->id,
                                                        ])}}">
                                                            <div class="media-object media-left">

                                                            </div>
                                                            <div class="media-body">{{$district->district_name}}
                                                                @if( isset($district->subcategory1_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory1_products_count}})</span>
                                                                @elseif(isset($district->subcategory2_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory2_products_count}})</span>
                                                                @elseif(isset($district->subcategory3_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory3_products_count}})</span>
                                                                @elseif(isset($district->subcategory4_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory4_products_count}})</span>
                                                                @elseif(isset($district->subcategory5_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory5_products_count}})</span>
                                                                @elseif(isset($district->subcategory6_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory6_products_count}})</span>
                                                                @elseif(isset($district->subcategory7_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory7_products_count}})</span>
                                                                @elseif(isset($district->subcategory8_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory8_products_count}})</span>
                                                                @elseif(isset($district->subcategory9_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory9_products_count}})</span>
                                                                @elseif(isset($district->subcategory10_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory10_products_count}})</span>
                                                                @elseif(isset($district->subcategory11_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory11_products_count}})</span>
                                                                @elseif(isset($district->subcategory12_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory12_products_count}})</span>
                                                                @elseif(isset($district->subcategory13_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory13_products_count}})</span>
                                                                @elseif(isset($district->subcategory14_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory14_products_count}})</span>
                                                                @elseif(isset($district->subcategory15_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory15_products_count}})</span>
                                                                @elseif(isset($district->subcategory16_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory16_products_count}})</span>
                                                                @elseif(isset($district->subcategory17_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory17_products_count}})</span>
                                                                @elseif(isset($district->subcategory18_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory18_products_count}})</span>
                                                                @elseif(isset($district->subcategory19_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory19_products_count}})</span>
                                                                @elseif(isset($district->subcategory20_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory20_products_count}})</span>
                                                                @elseif(isset($district->subcategory21_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory21_products_count}})</span>
                                                                @elseif(isset($district->subcategory22_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory22_products_count}})</span>
                                                                @elseif(isset($district->subcategory23_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory23_products_count}})</span>
                                                                @elseif(isset($district->subcategory24_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory24_products_count}})</span>
                                                                @elseif(isset($district->subcategory25_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory25_products_count}})</span>
                                                                @elseif(isset($district->subcategory26_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory26_products_count}})</span>
                                                                @elseif(isset($district->subcategory27_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory27_products_count}})</span>
                                                                @elseif(isset($district->subcategory28_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory28_products_count}})</span>
                                                                @elseif(isset($district->subcategory29_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory29_products_count}})</span>
                                                                @elseif(isset($district->subcategory30_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory30_products_count}})</span>
                                                                @elseif(isset($district->subcategory31_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory31_products_count}})</span>
                                                                @elseif(isset($district->subcategory32_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory32_products_count}})</span>
                                                                @elseif(isset($district->subcategory33_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory33_products_count}})</span>
                                                                @elseif(isset($district->subcategory34_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory34_products_count}})</span>
                                                                @elseif(isset($district->subcategory35_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory35_products_count}})</span>
                                                                @elseif(isset($district->subcategory36_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory36_products_count}})</span>
                                                                @elseif(isset($district->subcategory37_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory37_products_count}})</span>
                                                                @elseif(isset($district->subcategory38_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory38_products_count}})</span>
                                                                @elseif(isset($district->subcategory39_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory39_products_count}})</span>
                                                                @elseif(isset($district->subcategory40_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory40_products_count}})</span>
                                                                @elseif(isset($district->subcategory41_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory41_products_count}})</span>
                                                                @elseif(isset($district->subcategory42_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory42_products_count}})</span>
                                                                @elseif(isset($district->subcategory43_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory43_products_count}})</span>
                                                                @elseif(isset($district->subcategory44_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory44_products_count}})</span>
                                                                @elseif(isset($district->subcategory45_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory45_products_count}})</span>
                                                                @elseif(isset($district->subcategory46_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory46_products_count}})</span>
                                                                @elseif(isset($district->subcategory47_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory47_products_count}})</span>
                                                                @elseif(isset($district->subcategory48_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory48_products_count}})</span>
                                                                @elseif(isset($district->subcategory49_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory49_products_count}})</span>
                                                                @elseif(isset($district->subcategory50_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory50_products_count}})</span>
                                                                @elseif(isset($district->subcategory51_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory51_products_count}})</span>
                                                                @elseif(isset($district->subcategory52_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory52_products_count}})</span>
                                                                @elseif(isset($district->subcategory53_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory53_products_count}})</span>
                                                                @elseif(isset($district->subcategory54_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory54_products_count}})</span>
                                                                @elseif(isset($district->subcategory55_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory55_products_count}})</span>
                                                                @elseif(isset($district->subcategory56_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory56_products_count}})</span>
                                                                @elseif(isset($district->subcategory57_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory57_products_count}})</span>
                                                                @elseif(isset($district->subcategory58_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory58_products_count}})</span>
                                                                @elseif(isset($district->subcategory59_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory59_products_count}})</span>
                                                                @elseif(isset($district->subcategory60_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory60_products_count}})</span>
                                                                @elseif(isset($district->subcategory61_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory61_products_count}})</span>
                                                                @elseif(isset($district->subcategory62_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory62_products_count}})</span>
                                                                @elseif(isset($district->subcategory63_products_count))
                                                                    <span style="color:darkslategray;">({{$district->subcategory63_products_count}})</span>
                                                                @endif
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


                <div id="custo_add">

                    <div class="col-md-7 well">

                        <p><a href="{{route('/')}}">হোমপেজ</a> -> <a href="{{route('all-ad')}}">সকল বিজ্ঞাপন</a> -> <a href="{{route('divisional-product',['id'=>$div->id])}}"> {{$div->division_name}} </a> -> <a href="{{route('category-product',['id'=>$cat->id])}}"> {{$cat->category_name}} </a> -> <a href="{{route('subcategory-product',['id'=>$subCategory->id])}}"> {{$subCategory->subcategory_name}} </a> </p>
                        <p><i>১৭৩,৬১১ টি বিজ্ঞাপনের মধ্যে ১-২০ টি দেখাচ্ছে</i><p>

                            <table class="table-hover">
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <div class="media">
                                                <div class="media-object media-left">
                                                    @if( isset($product->product_image1))
                                                        <img src="{{asset($product->product_image1)}}" alt="Product Image" style="width:150px;height: 150px;"/>
                                                    @elseif(isset($product->company_logo))
                                                        <img src="{{asset($product->company_logo)}}" alt="Company Logo" style="width:150px;height: 150px;"/>
                                                    @endif

                                                </div>
                                                <div class="media-body">
                                                    @if(isset($product->company_name ))
                                                        <h3 class="media-heading">
                                                            <a href="{{route('single-job-view',['id'=>$product->id])}}">{{$product->ad_title}}</a>
                                                        </h3>
                        <p><i>{{$product->company_name }}</i></p>
                        <p><i>{{$product->district_name}}</i></p>
                        @elseif(isset($product->property_price))
                            <h3 class="media-heading">
                                <a href="{{route('single-property-view',['id'=>$product->id])}}">{{$product->ad_title}}</a>
                            </h3>
                            <p><i>{{$product->district_name}}, {{$product->subcategory_name}}</i></p>
                            <span>TK. {{$product->property_price}}</span>
                        @elseif(isset($product->product_price))
                            <h3 class="media-heading">
                                <a href="{{route('single-product-view',['id'=>$product->id])}}">{{$product->ad_title}}</a>
                            </h3>
                            <p><i>{{$product->district_name}}, {{$product->subcategory_name}}</i></p>
                            <span>TK. {{$product->product_price}}</span>
                        @endif
                        <p style="padding-bottom: 25px;"></p>
                        <p class="text-right">{{Carbon\Carbon::parse($product->updated_at)->diffForHumans()}}</p>
                    </div>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
                </table>
                <div class="text-center">
                    {{$products->render()}}
                </div>

            </div>

            <div class="col-md-2 well text-center">
                <div class="media">
                    <img src="{{asset('/') }}front/images/add.png" alt=""/>
                    <div class="media-body">
                        <h4 class="media-heading">Ghoreyboshe.com-এ নিরাপদ থাকুন</h4>
                        <p>নিরাপদে লেনদেন করার নির্দেশনাবলী জেনে নিন।</p>
                    </div>
                    <a href="#"><h4>আরও জানুন <i class="fa fa-angle-right"></i></h4></a>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center" id="adds">
                <div>
                    <h2>বিক্রি করার জন্য আপনার কি কিছু আছে?</h2>
                    <h4>Ghoreyboshe.com--এ আপনার বিজ্ঞাপন পোস্ট করুন।</h4>
                    <i class="fa fa-hand-o-down"></i>
                </div>
                <a href="{{route('post-ad')}}" class="btn btn-danger btn-lg">এখনই বিজ্ঞাপন পোস্ট করুন!</a>
            </div>
        </div>
    </div>

@endsection