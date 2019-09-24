@extends('frontend.master')
@section('title')
    Product Location
@endsection

@section('body')

    <div class="container" id="location">
        <div class="row">
            <div class="col-md-10 col-md-offset-1  panel panel-default">
                <div class="panel-body">
                    <h3>আপনার আইটেম বা সার্ভিসটি কোথায় অবস্থিত?</h3><hr/>
                    <div class="col-md-3">
                        <h3>দেশ নির্বাচন করুন</h3>
                        <ul>
                            @foreach($productCountries as $productCountry)
                                <li><a href="#{{$productCountry->id}}" data-toggle="pill"><span class=""></span>{{$productCountry->country_name}}<i class="fa fa-angle-right"></i></a>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <div class="tab-content">
                            @foreach($productCountries as $productCountry)
                                @php
                                    $i=$productCountry->id
                                @endphp
                                <div id="{{$productCountry->id}}" class="tab-pane fade">
                                    <h3>বিভাগ নির্বাচন করুন... </h3>
                                    <ul>

                                        @foreach($productDivisions as $productDivision)

                                            @if($productDivision->country_id==$i)
                                                <li><a href="#x{{$productDivision->id}}" data-toggle="pill"><span class=""></span>{{$productDivision->division_name}}<i class="fa fa-angle-right"></i></a></li>

                                            @endif

                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="tab-content">
                            @foreach($productDivisions as $productDivision)
                                @php
                                    $j=$productDivision->id
                                @endphp
                                <div id="x{{$productDivision->id}}" class="tab-pane fade">
                                    <h3>জেলা নির্বাচন করুন... </h3>
                                    <ul>

                                        @foreach($productDistricts as $productDistrict)

                                            @if($productDistrict->division_id==$j)
                                                <li><a href="{{route('product-description',[
                                                'categoryId'=>$categoryId,
                                                'subcategoryId'=>$subcategoryId,
                                                'countryId'=>$productDistrict->country_id,
                                                'divisionId'=>$productDistrict->division_id,
                                                'districtId'=>$productDistrict->id
                                                ])}}">{{$productDistrict->district_name}}<i class="fa fa-angle-right"></i></a></li>

                                            @endif

                                        @endforeach
                                    </ul>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="alert alert-warning">
                            <h4 class="text-center">সঠিক সময়ে সঠিক পদ্ধতি জেনে নিন, ঘরেবসে.কম এ বিজ্ঞাপন পোস্ট এর ক্ষেত্রে অবশ্যই নিয়েমের মধ্যে থাকতে হবে, আপনার বিজ্ঞাপন দেখানোর বিভাগটি নির্বাচন করুন,আপনার বিজ্ঞাপন সামগ্রী টাইপ করুন, আপনার একই বিজ্ঞাপনের একাধিক পোস্ট করবেন না,একই ছবি একাধিকবার আপলোড করবেন না, অবশ্যই আপনি অস্পষ্ট ছবি পোস্ট করবেন না, আপনি প্যাকেজের মধ্য দিয়ে আপনার বিজ্ঞাপন পোস্ট করুন। </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <!--location star End-->


    <!--rules start-->

    @include('frontend.includes.important-rules')

@endsection